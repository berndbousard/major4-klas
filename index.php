<?php
// http://docs.slimframework.com/sessions/native/
session_start();
session_cache_limiter(false);

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
  if(!empty($_SESSION['user'])){
    if($_SESSION['user']['is_admin'] == 1){
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
    }
  }

  $response = $response->getBody()->write("U heeft niet de juiste rechten om deze pagina te bekijken");
  return $response;
});

// Om een order met een id aan te passen naar een nieuwe verified state
$app->put('/api/orders/{id}', function ($request, $response, $args) {
  if(!empty($_SESSION['user'])){
    if($_SESSION['user']['is_admin'] == 1){
      $userDAO = new UserDAO();

      $order = $userDAO->selectById($args['id']);
      $order['verified'] = $request->getQueryParams()['verified'];

      $inserted_order = $userDAO->updateOrder($args['id'], $order);

      if(empty($inserted_order)) {
        $response = $response->withStatus(404);
      } else {
        $response = $response->withStatus(201);
      }

      $response = $response->write(true);
      $response = $response->withHeader('Content-Type','application/json');
      return $response;
    }
  }

  $response = $response->getBody()->write("U heeft niet de juiste rechten om deze pagina te bekijken");
  return $response;
});

// Om alle orders op te halen. Deze worden gefiltered in de react app.
$app->get('/api/orders', function ($request, $response, $args) {
  if(!empty($_SESSION['user'])){
    if($_SESSION['user']['is_admin'] == 1){
      $userDAO = new UserDAO();

      $orders = $userDAO->selectAll();

      if(empty($orders)) {
        $response = $response->withStatus(404);
      } else {
        $response = $response->withStatus(201);
      }

      $response = $response->write(json_encode($orders));
      $response = $response->withHeader('Content-Type', 'application/json');

      return $response;
    }
  }

  $response = $response->getBody()->write("U heeft niet de juiste rechten om deze pagina te bekijken");

  return $response;
});

// // Om een gebruiker in te loggen als hij naar api/login gaat
// $app->get('/api/echosession', function ($request, $response, $args) {
//   print_r($_SESSION);
//   die();
// });

// Om een gebruiker in te loggen als hij naar api/login gaat
$app->post('/api/login', function ($request, $response, $args) {
  $data = $request->getParsedBody();

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
        $_SESSION['user'] = $existing_user; //user
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

$app->get('/api/logout', function ($request, $response, $args) {
  // register
  if(!empty($_SESSION['user'])){
    $_SESSION['user'] = 0;
    $response = $response->withRedirect('/admin');
    return $response;
  }

  $response = $response->withHeader('Content-Type','application/json');
  return $response;
});

// Om de admin pagina in te laden als je naar localhost/admin surft
$app->get('/about', function ($request, $response, $args) {
  $view = new \Slim\Views\PhpRenderer('view/');
  $basePath = $request->getUri()->getBasePath();
  return $view->render($response, 'about.php', ['basePath' => $basePath]);
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

$app->post('/', function ($request, $response, $args) {
  $data = $request->getParsedBody();
  $userDAO = new UserDAO();
  $hasher = new \Phpass\Hash;
  $participationDAO = new ParticipationDAO();


  if($data['submit'] == 'the shining aanvragen'){

    $errors = array();

    if(empty($data['name'])){
      $errors['name'] = "Gelieve een naam in te vullen";
    }

    if(empty($data['password'])){
      $errors['password'] = "Gelieve een paswoord in te vullen";
    }

    if(empty($data['cardId'])){
      $errors['cardId'] = "Gelieve een cardID in te vullen";
    }

    if(!empty($data['email'])){
      $existing_user = $userDAO->selectByEmail($data['email']);
      if($existing_user && $existing_user['verified'] == 1){
        $errors['email'] = "We hebben een ebook reeds naar dit email adres verstuurd";
      }else if($existing_user && $existing_user['verified'] == 0){
        // Heeft al deelgenomen maar er wordt in de admin gecheckt of het wel een echte docent is
        $errors['email'] = "Je hebt je reeds geregistreerd, je ebook aanvraag is in behandeling";
      }
    }else{
      $errors['email'] = "Gelieve een email in te vullen";
    }

    if(empty($errors)){
      $userDAO = new UserDAO();
      $hasher = new \Phpass\Hash;

      $data['password'] = $hasher->hashPassword($data['password']);
      $data['school'] = 0;
      $data['class'] = 0;
      $data['created'] = date('Y-m-d H:i:s');
      $data['verified'] = 0;
      $data['is_admin'] = 0;

      $inserted_order = $userDAO->insert($data);
      return $response->withRedirect('/');
    } else {
      $view = new \Slim\Views\PhpRenderer('view/');
      $basePath = $request->getUri()->getBasePath();
      return $view->render($response, 'home.php', [
        'basePath' => $basePath,
        'errors' => $errors
      ]);
    }
  }

  if($data['submit'] == 'deelnemen aan de actie'){
    $data['email'] = $data['email_2'];
    $errors = array();

    // data aanvullen met de $_FILES
    $data['pdf'] = $_FILES['pdf'];
    $data['photo'] = $_FILES['photo'];

    if(!empty($data['email'])){
      $existing_user = $userDAO->selectByEmail($data['email']);
      if(empty($existing_user)){
        $errors['email_2'] = "Je hebt je nog niet opgegeven om deel te nemen";
      }else{
        $already_participated = $participationDAO->selectByUserId($existing_user['id']);
        if(!empty($already_participated)){
          $errors['email_2'] = "Om iedereen een kans te geven mag iedereen maar 1x deelnemen";
        }
      }

    }else{
      $errors['email_2'] = "Gelieve je email op te geven";
    }

    if(empty($data['password'])){
      $errors['password_2'] = "Gelieve je password op te geven";
    }else{
      $existing_user = $userDAO->selectByEmail($data['email']);
      $password_check = $hasher->checkpassword($data['password'], $existing_user['password']);
      if(empty($password_check)){
        $errors['password_2'] = "Het opgegeven paswoord is niet correct";
      }
    }

    if(empty($data['school'])){
      $errors['school'] = "Gelieve je school op te geven";
    }

    if(empty($data['class'])){
      $errors['class'] = "Gelieve je klas op te geven";
    }

    if(empty($data['photo']['name'])){
      $errors['photo'] = "Gelieve een image te selecteren";
    }

    if(empty($data['pdf']['name'])){
      $errors['pdf'] = "Gelieve een pdf te selecteren";
    }

    if(empty($errors)){
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
                $resizeCrop->resizeCropImage($_FILES['photo']['tmp_name'],  WWW_ROOT . 'uploads' . DS . 'photo' . DS . $data['photo'], 480, 360);

                if(!empty($data['pdf'])){
                  if(empty($data['pdf']['error']) && !empty($data['pdf']['size'])){
                    $ext = explode('.', $data['pdf']['name']);
                    $ext = $ext[sizeof($ext) - 1];
                    $data['pdf'] = uniqid() . '.' . $ext;
                    move_uploaded_file($data['pdf'], $basePath . 'uploads' . DS . 'pdf' . DS . $data['pdf']);

                    $participationDAO = new ParticipationDAO();

                    $data['created'] = date('Y-m-d H:i:s');
                    $inserted_participation = $participationDAO->insert($data);

                    // user updaten
                    $updated_user = $userDAO->update($existing_user['id'], $data);
                  }
                }
              }
            }
          }
        }
      }
    } else {
        $view = new \Slim\Views\PhpRenderer('view/');
        $basePath = $request->getUri()->getBasePath();
        return $view->render($response, 'home.php', [
          'basePath' => $basePath,
          'errors' => $errors
      ]);
    }
  }
  return $response->withRedirect('/');
});

// Om de home in te laden als hij gewoon naar localhost surft
$app->get('/', function ($request, $response, $args) {
  $view = new \Slim\Views\PhpRenderer('view/');
  $basePath = $request->getUri()->getBasePath();
  return $view->render($response, 'home.php', ['basePath' => $basePath]);
});

$app->run();
