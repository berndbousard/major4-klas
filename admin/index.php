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

$app->get('/api/orders/{id}', function ($request, $response, $args) {
  $userDAO = new UserDAO();
  $orders = $userDAO->selectByVerified($args['id']);

  $response = $response->write(json_encode($orders));
  $response = $response->withHeader('Content-Type','application/json');

  return $response;
});

// $app->get('/api/oneliners/{id}', function ($request, $response, $args) {
//   $onelinerDAO = new OnelinerDAO();
//   $oneliner = $onelinerDAO->selectById($args['id']);
//   $response = $response->write(json_encode($oneliner))
//     ->withHeader('Content-Type','application/json');
//   if(empty($oneliner)) {
//     $response = $response->withStatus(404);
//   }
//   return $response;
// });

// $app->delete('/api/oneliners/{id}', function ($request, $response, $args) {
//   //delete the comebacks
//   $comebackDAO = new ComebackDAO();
//   $comebackDAO->deleteByOnelinerId($args['id']);
//   //delete the onliners
//   $onelinerDAO = new OnelinerDAO();
//   $onelinerDAO->delete($args['id']);
//   return $response->write(true)
//     ->withHeader('Content-Type','application/json');
// });

// $app->post('/api/oneliners', function ($request, $response, $args) {
//   $onelinerDAO = new OnelinerDAO();
//   $oneliner = $request->getParsedBody();
//   $oneliner['created'] = date('Y-m-d H:i:s');
//   $insertedOneliner = $onelinerDAO->insert($oneliner);
//   $response = $response->write(json_encode($insertedOneliner))
//     ->withHeader('Content-Type','application/json');
//   if(empty($insertedOneliner)) {
//     $response = $response->withStatus(404);
//   } else {
//     $response = $response->withStatus(201);
//   }
//   return $response;
// });

// $app->put('/api/oneliners', function ($request, $response, $args) {
//   $onelinerDAO = new OnelinerDAO();
//   $oneliner = $request->getParsedBody();
//   $updatedOneliner = $onelinerDAO->update($oneliner['id'], $oneliner);
//   $response = $response->write(json_encode($updatedOneliner))
//     ->withHeader('Content-Type','application/json');
//   if(empty($updatedOneliner)) {
//     $response = $response->withStatus(404);
//   }
//   return $response;
// });

// $app->get('/api/comebacks', function ($request, $response, $args) {
//   $comebackDAO = new ComebackDAO();
//   $params = $request->getQueryParams();
//   if(!empty($params['oneliner_id'])) {
//     $comebacks = $comebackDAO->selectByOnelinerId($params['oneliner_id']);
//   } else {
//     $comebacks = $comebackDAO->selectAll();
//   }
//   return $response->write(json_encode($comebacks))
//     ->withHeader('Content-Type','application/json');
// });

// $app->post('/api/comebacks', function ($request, $response, $args) {
//   $comebackDAO = new ComebackDAO();
//   $comeback = $request->getParsedBody();
//   $comeback['created'] = date('Y-m-d H:i:s');
//   $comeback['oneliner_id'] = $comeback['onelinerId'];
//   $insertedComeback = $comebackDAO->insert($comeback);
//   $response = $response->write(json_encode($insertedComeback))
//     ->withHeader('Content-Type','application/json');
//   if(empty($insertedComeback)) {
//     $response = $response->withStatus(404);
//   } else {
//     $response = $response->withStatus(201);
//   }
//   return $response;
// });

// $app->delete('/api/comebacks/{id}', function ($request, $response, $args) {
//   //delete the comebacks
  // $comebackDAO = new ComebackDAO();
//   $comebackDAO->delete($args['id']);
//   return $response->write(true)
//     ->withHeader('Content-Type','application/json');
// });

$app->post('/api/login', function ($request, $response, $args) {

    $data = $request->getParsedBody();

    $userDAO = new UserDAO();

    $user = array(
    "email" => "bernd.bousard@gmail.com",
    "password" => "password"
    );

    $existingUser = $userDAO->selectByEmail($data['email']);


    // $existingUser = $userDAO->selectByEmail($data['email']);

    if(empty($existingUser)){
        $response = $response->withStatus(404);
    }else{
        $response = $response->withStatus(201);
    }
    $response = $response->write(json_encode($existingUser));
    $response = $response->withHeader('Content-Type','application/json');

    return $response;
});

// $app->post('/admin/api/login', function ($request, $response, $args) {

//     $data = $request->getParsedBody();
//     // $data = json_decode($request, true);

//     $userDAO = new UserDAO();

//     $user = array(
//     "email" => "bernd.bousard@gmail.com",
//     "password" => "password"
//     );

//     $existingUser = $userDAO->selectByEmail($user['email']);

//     if(empty($existingUser)){
//         $response = $response->withStatus(404);
//     }else{
//         $response = $response->withStatus(201);
//     }
//     $response = $response->write(json_encode($existingUser));
//     $response = $response->withHeader('Content-Type','application/json');

//     return $response;
// });

$app->get('/{anything:.*}', function ($request, $response, $args) {
  $view = new \Slim\Views\PhpRenderer('view/');
  $basePath = $request->getUri()->getBasePath();

  return $view->render($response, 'home.php', ['basePath' => $basePath]);
});

$app->run();
