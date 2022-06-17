<?php

require 'src/router.php';
require 'src/handler/login_admin.php';
require 'src/handler/logout.php';
require 'includes/config.php';
require 'includes/user_session.php';

//From includes/user_session.php
new UserSession();

//From src/router.php
$router = new Router();
$base = '/ela/';

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
//From src/handler/login_admin.php
$router->get($base . 'admin', LoginAdmin::class . '::executeGet');
$router->post($base . 'admin',  LoginAdmin::class . '::executePost');

//From src/router.php
//From src/handler/logout.php
$router->get($base . 'logout',  Logout::class . '::execute');

//From src/router.php
$router->addNotFoundHandler(function(){
    require_once './view/404.php';
});

$router->run();

?>