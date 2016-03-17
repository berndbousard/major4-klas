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

$app->post('/admin', function ($request, $response, $args) {

    // $data = $request->getParsedBody();

    // var_dump($data);

    print('login');

    // $userDAO = new UserDAO();

    // $user = array(
    // "email" => "bernd.bousard@gmail.com",
    // "password" => "password"
    // );

    // $existingUser = $userDAO->selectByEmail($data['email']);


    // // $existingUser = $userDAO->selectByEmail($data['email']);

    // if(empty($existingUser)){
    //     $response = $response->withStatus(404);
    // }else{
    //     $response = $response->withStatus(201);
    // }
    // $response = $response->write(json_encode($existingUser));
    // $response = $response->withHeader('Content-Type','application/json');

    // return $response;
});

$app->get('/admin', function ($request, $response, $args) {
  $view = new \Slim\Views\PhpRenderer('view/');
  $basePath = $request->getUri()->getBasePath();

  return $view->render($response, 'home.php', ['basePath' => $basePath]);
});

$app->run();
