<?php

require 'src/router.php';
require 'src/controller/login_controller.php';
require 'src/controller/logged_controller.php';
require 'src/controller/logout_controller.php';
require 'src/controller/api_controller.php';
require 'src/controller/api_users_controller.php';
require 'src/controller/api_courses_controller.php';
require 'includes/config.php';
require 'includes/user_session.php';
//From includes/user_session.php
new UserSession();

//From src/router.php
$router = new Router();
$base = DOMAIN;

//Routes
$adminRoute = 'admin';
$usersRoute = '/users';
$coursesRoute = '/courses';
$api = 'api';
$apiUsersRoute = $api . $usersRoute;
$apiCoursesRoute = $api . $coursesRoute;

//From src/router.php
$router->get($base, function () {
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
$router->get($base . $adminRoute, LoginController::class . '::executeGet');
$router->post($base . $adminRoute,  LoginController::class . '::executePost');

//TODO: revisar cómo pasar el parámetro de la ruta
// $router->get($base . $adminRoute . $usersRoute, LoginUserController::class . '::executeGet');
// $router->get($base . $adminRoute . $coursesRoute, LoginUserController::class . '::executeGet');

$router->get($base . 'panel', function ($params) { new LoggedController($params); });
//From src/router.php
//From src/controller/logout_controller.php
$router->get($base . 'logout',  LogoutController::class . '::execute');

//From src/router.php
//From src/controller/api_users_controller.php
$router->get($base . $apiUsersRoute, function ($params) { new ApiUsersController($params); });
$router->put($base . $apiUsersRoute, function ($params) { new ApiUsersController($params); });
$router->delete($base . $apiUsersRoute, function ($params) { new ApiUsersController($params); });

$router->get($base . $apiCoursesRoute, function ($params) { new ApiCoursesController($params); });
$router->put($base . $apiCoursesRoute, function ($params) { new ApiCoursesController($params); });
$router->delete($base . $apiCoursesRoute, function ($params) { new ApiCoursesController($params); });

//From src/router.php
$router->addNotFoundController(function () {
    require_once './view/404.php';
});

$router->run();
