<?php
ini_set('display_errors', true);
error_reporting(E_ALL);

session_start();

define('DS', DIRECTORY_SEPARATOR);
define('WWW_ROOT', __DIR__ . DS);

require_once WWW_ROOT .  'dao' . DS . 'ParticipationDAO.php';
require_once WWW_ROOT .  'dao' . DS . 'UserDAO.php';
require_once WWW_ROOT . 'phpass' . DS . 'Phpass.php';

require 'vendor/autoload.php';

$app = new \Slim\App([
    'settings' => [
        'displayErrorDetails' => true
    ]
]);

// Om alle participations op te halen
$app->get('/api/participations', function ($request, $response, $args) {
  $participationDAO = new ParticipationDAO();

  $participations = $participationDAO->selectAll();

  if(empty($participations)) {
    $response = $response->withStatus(404);
  } else {
    $response = $response->withStatus(201);
  }

  error_log( print_r($participations, true) );

  $response = $response->write(json_encode($participations));
  $response = $response->withHeader('Content-Type','application/json');

  return $response;
});

// Om een order met een id aan te passen naar een nieuwe verified state
$app->put('/api/orders/{id}', function ($request, $response, $args) {
  $userDAO = new UserDAO();

  $order = $userDAO->selectById($args['id']);
  $order['verified'] = $request->getQueryParams()['verified'];
  error_log( print_r($order, true) );

  $inserted_order = $userDAO->update($args['id'], $order);
  error_log( print_r($inserted_order, true) );
  // Probleem is dat hij geen inserted order terugkrijgt van de dao

  if(empty($inserted_order)) {
    $response = $response->withStatus(404);
  } else {
    $response = $response->withStatus(201);
  }

  return $response;
});


// Om de orders op te halen aan de hand van een id via de params meegaat
$app->get('/api/orders', function ($request, $response, $args) {
  $userDAO = new UserDAO();

  $orders = $userDAO->selectByVerified($request->getQueryParams()['verified']);

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
      $_SESSION['user'] = $existing_user;
      $response = $response->write(json_encode($_SESSION['user']));
      $response = $response->withStatus(200);
    } else {
      $response = $response->withStatus(404);
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

// Om de home in te laden als hij gewoon naar localhost surft
$app->get('/', function ($request, $response, $args) {
  $view = new \Slim\Views\PhpRenderer('view/');
  $basePath = $request->getUri()->getBasePath();
  return $view->render($response, 'home.php', ['basePath' => $basePath]);
});

// Als hij naar een andere pagina komt in de admin dan ga je gewoon naar admin.php
$app->get('/admin/{anything:.*}', function ($request, $response, $args) {
  $view = new \Slim\Views\PhpRenderer('view/');
  $basePath = $request->getUri()->getBasePath();
  return $view->render($response, 'admin.php', ['basePath' => $basePath]);
});

$app->run();
