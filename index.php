<?php
session_start();

ini_set('display_errors', true);
error_reporting(E_ALL);


define('DS', DIRECTORY_SEPARATOR);
define('WWW_ROOT', __DIR__ . DS);

require_once 'dao' . DS . 'ParticipationDAO.php';
require_once 'dao' . DS . 'UserDAO.php';
require_once 'phpass' . DS . 'Phpass.php';
require_once 'phpUtils' . DS . 'resizeCrop.php';

require 'vendor/autoload.php';

$app = new \Slim\App([
    'settings' => [
        'displayErrorDetails' => true
    ]
]);

// --------------------------------------------------------------------------- CMS

// Om alle participations op te halen
$app->get('/api/participations', function ($request, $response, $args) {
  $participationDAO = new ParticipationDAO();

  $participations = $participationDAO->selectAll();

  if(empty($participations)) {
    $response = $response->withStatus(404);
  } else {
    $response = $response->withStatus(201);
  }

  // error_log( print_r($participations, true) );

  $response = $response->write(json_encode($participations));
  $response = $response->withHeader('Content-Type','application/json');

  return $response;
});

// Om een order met een id aan te passen naar een nieuwe verified state
$app->put('/api/orders/{id}', function ($request, $response, $args) {
  $userDAO = new UserDAO();

  $order = $userDAO->selectById($args['id']);
  $order['verified'] = $request->getQueryParams()['verified'];

  $inserted_order = $userDAO->update($args['id'], $order);

  if(empty($inserted_order)) {
    $response = $response->withStatus(404);
  } else {
    $response = $response->withStatus(201);
  }

  $response = $response->write(true);
  $response = $response->withHeader('Content-Type','application/json');
  return $response;
});


// Om de orders op te halen aan de hand van een id via de params meegaat
$app->get('/api/orders', function ($request, $response, $args) {
  $userDAO = new UserDAO();

  $orders = $userDAO->selectAll();

  if(empty($orders)) {
    $response = $response->withStatus(404);
  } else {
    $response = $response->withStatus(201);
  }

  $response = $response->write(json_encode($orders));
  $response = $response->withHeader('Content-Type','application/json');

  return $response;

});

// Om een gebruiker in te loggen als hij naar api/login gaat
$app->post('/api/login', function ($request, $response, $args) {
  $data = $request->getParsedBody();

  // error_log( print_r($data, true) );

  // UserDAO aanmaken om te kijken of die bestaat.
  $userDAO = new UserDAO();

  $existing_user = $userDAO->selectByEmail($data['email']);
  if(!empty($existing_user)){
    // Om te kijken of de passwoorden wel overeen komen
    $hasher = new \Phpass\Hash;
    $password_check = $hasher->checkpassword($data['password'], $existing_user['password']);
    if(!empty($password_check)){
      // Hier zijn we zeker dat de gebruiker het juiste wachtwoord heeft ingevoerd
      if($existing_user['is_admin'] == 1){
        // Is de user wel admin?
        $_SESSION['user'] = $existing_user;
        $response = $response->write(json_encode($_SESSION['user']));
        $response = $response->withStatus(200);
      } else {
        $response = $response->withStatus(404);
      }
    }
  }

  $response = $response->withHeader('Content-Type','application/json');

  return $response;
});

// Om een admin aan te maken die een gehasht password krijgt
$app->get('/api/register', function ($request, $response, $args) {
  // register

  //Hasher aanmaken
  $hasher = new \Phpass\Hash;
  $userDAO = new UserDAO();

  // Een admin aanmaken
  $data = array();
  $data['name'] = 'admin';
  $data['email'] = 'admin';
  $data['password'] = $hasher->hashPassword('admin');
  $data['cardId'] = 'admin';
  $data['school'] = 'admin';
  $data['class'] = 'admin';
  $data['created'] = date('Y-m-d H:i:s');
  $data['verified'] = 1;
  $data['is_admin'] = 1;


  //Inserten in de database
  $insertedUser = $userDAO->insert($data);

  if(empty($insertedUser)) {
    $response = $response->withStatus(404);
  } else {
    $response = $response->withStatus(201);
  }

  $response = $response->write(json_encode($insertedUser));
  $response = $response->withHeader('Content-Type','application/json');

  return $response;
});

// Om de admin pagina in te laden als je naar localhost/admin surft
$app->get('/admin', function ($request, $response, $args) {
  $view = new \Slim\Views\PhpRenderer('view/');
  $basePath = $request->getUri()->getBasePath();
  return $view->render($response, 'admin.php', ['basePath' => $basePath]);
});

// Als hij naar een andere pagina komt in de admin dan ga je gewoon naar admin.php
$app->get('/admin/{anything:.*}', function ($request, $response, $args) {
  $view = new \Slim\Views\PhpRenderer('view/');
  $basePath = $request->getUri()->getBasePath();
  return $view->render($response, 'admin.php', ['basePath' => $basePath]);
});

// --------------------------------------------------------------------------- WEBSITE

// Om de home in te laden als hij gewoon naar localhost surft
$app->post('/api/orders/create', function ($request, $response, $args) {
  $userDAO = new UserDAO();
  $hasher = new \Phpass\Hash;

  $data = $request->getParsedBody();
  $data['password'] = $hasher->hashPassword($data['password']);
  $data['school'] = 0;
  $data['class'] = 0;
  $data['created'] = date('Y-m-d H:i:s');
  $data['verified'] = 0;
  $data['is_admin'] = 0;
  error_log( print_r($data, true) );

  $inserted_order = $userDAO->insert($data);
  error_log( print_r($inserted_order, true) );
});

$app->post('/api/participations/create', function ($request, $response, $args) {
  $userDAO = new UserDAO();
  $participationDAO = new ParticipationDAO();
  $hasher = new \Phpass\Hash;


  $data = $request->getParsedBody();
  $data['pdf'] = $_FILES['pdf'];
  $data['photo'] = $_FILES['photo'];

  // Checken of user wel bestaat
    // email
    $existing_user = $userDAO->selectByEmail($data['email']);
    if($existing_user){
      // password
      $password_check = $hasher->checkpassword($data['password'], $existing_user['password']);
      if($password_check){
        // IMAGE CHECK
        if(!empty($data['photo'])){
          if(empty($data['photo']['error'])){
            $size = getimagesize($data['photo']['tmp_name']);
            if($size){
              $resizeCrop = new resizeCrop();
              $basePath = $request->getUri()->getBasePath();
              $ext = explode('.', $data['photo']['name']);
              $ext = $ext[sizeof($ext) - 1];
              $data['photo'] = uniqid() . '.' . $ext;
              // Komt uit de PHPUTILS maps
              // 320, 240
              // 480, 360 (x1.5)
              $resizeCrop->resizeCropImage($_FILES['photo']['tmp_name'],  WWW_ROOT . 'uploads' . DS . 'photo' . DS . $data['photo'], 480, 360);

              // De inschrijving in de database steken
              $data['user_id'] = $existing_user['id'];


              if(!empty($data['pdf'])){
                if(empty($data['pdf']['error']) && !empty($data['pdf']['size'])){
                  $ext = explode('.', $data['pdf']['name']);
                  $ext = $ext[sizeof($ext) - 1];
                  $data['pdf'] = uniqid() . '.' . $ext;
                  move_uploaded_file($data['pdf'], $basePath . 'uploads' . DS . 'pdf' . DS . $data['pdf']);

                  $participationDAO = new ParticipationDAO();

                  $data['created'] = date('Y-m-d H:i:s');
                  $inserted_participation = $participationDAO->insert($data);
                  error_log(print_r($inserted_participation, true));
                }
              }
            }
          }
        }
      }
    }

  // Checken of afbeelding juist is

  // Checken of PDF juist is

  // inserten
});

// Om de home in te laden als hij gewoon naar localhost surft
$app->get('/', function ($request, $response, $args) {
  $view = new \Slim\Views\PhpRenderer('view/');
  $basePath = $request->getUri()->getBasePath();
  return $view->render($response, 'home.php', ['basePath' => $basePath]);
});

$app->run();
