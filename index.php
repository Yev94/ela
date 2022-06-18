<?php

require 'src/router.php';
require 'src/controller/login_admin_controller.php';
require 'src/controller/logout_controller.php';
require 'src/controller/api_users_controller.php';
require 'includes/config.php';
require 'includes/user_session.php';
//From includes/user_session.php
new UserSession();

//From src/router.php
$router = new Router();
$base = DOMAIN;

//From src/router.php
$router->get($base, function(){
    require_once './view/home.php';
});

//From src/router.php
// $router->get($base . 'about', function($params){
//     if(isset($params['name'])){
//         $name = $params['name'];
//     } else {
//         $name = 'Gest';
//     }
//     echo '<h1> Hello ' . $name. '</h1>';
// });

//From src/router.php
//From src/controller/login_admin_controller.php
$router->get($base . 'admin', LoginAdminController::class . '::executeGet');
$router->post($base . 'admin',  LoginAdminController::class . '::executePost');

//From src/router.php
//From src/controller/logout_controller.php
$router->get($base . 'logout',  LogoutController::class . '::execute');

//From src/router.php
//From src/controller/api_users_controller.php
$router->get($base . 'api', function($params) {new ApiUsersController($params);});
$router->put($base . 'api', function($params) {new ApiUsersController($params);});
$router->delete($base . 'api', function($params) {new ApiUsersController($params);});

//From src/router.php
$router->addNotFoundController(function(){
    require_once './view/404.php';
});

$router->run();
