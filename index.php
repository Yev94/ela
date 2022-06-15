<?php

require 'src/router.php';
require 'src/handler/contact.php';
require 'includes/config.php';

$router = new Router();
$base = '/ela/';

$router->get($base, function(){
    require_once './view/home.php';
});

$router->get($base . 'about', function($params){
    if(isset($params['name'])){
        $name = $params['name'];
    } else {
        $name = 'Gest';
    }
    echo '<h1> Hello ' . $name. '</h1>';
});

$router->get($base . 'contact', Contact::class . '::execute');
$router->post($base . 'contact', function($params){
    
});

$router->addNotFoundHandler(function(){
    require_once './view/404.php';
});

$router->run();

?>