<?php
ini_set('display_errors', true);
error_reporting(E_ALL);

session_start();

define('DS', DIRECTORY_SEPARATOR);
define('WWW_ROOT', __DIR__ . DS);

require 'dao/ParticipationDAO.php';
require 'dao/UserDAO.php';

require 'vendor/autoload.php';

$app = new \Slim\App([
    'settings' => [
        'displayErrorDetails' => true
    ]
]);

$app->post('/api/login', function ($request, $response, $args) {
  $userDAO = new UserDAO();

  $data = $request->getParsedBody();

  $existingUser = $userDAO->selectByEmail($data['email']);
  if($existingUser['password'] == $data['password']){
    $response = $response->write(json_encode($existingUser));
  }

  $response = $response->withHeader('Content-Type','application/json');

  return $response;
});

$app->get('/api/orders/{id}', function ($request, $response, $args) {
  $userDAO = new UserDAO();

  $orders = $userDAO->selectByVerified($args['id']);

  if(empty($orders)) {
    $response = $response->withStatus(404);
  } else {
    $response = $response->withStatus(201);
  }

  $response = $response->write(json_encode($orders));
  $response = $response->withHeader('Content-Type','application/json');

  return $response;

});

$app->get('/{anything:.*}', function ($request, $response, $args) {
  $view = new \Slim\Views\PhpRenderer('view/');
  $basePath = $request->getUri()->getBasePath();
  return $view->render($response, 'home.php', ['basePath' => $basePath]);
});

$app->run();
