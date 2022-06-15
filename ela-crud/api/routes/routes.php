<?php

$routesArray = explode("/", $_SERVER['REQUEST_URI']); //Separa las palabras de la URL a partir del slag
$routesArray = array_filter($routesArray); //Filtra por aquellos que están vacíos


if (count($routesArray) == 0){
    $json = array(
        $status => '404',
        $result => 'Not Found'
    );
} else {
    $json = array(
        'status' => '200',
        'result' => 'OK'
    );
}
//Si hay algo en el array de las URL y viene con un un metodo (GET, POST, PUT, UPDATE) entonces:
if(count($routesArray) > 0 && isset($_SERVER['REQUEST_METHOD'])){
    if($_SERVER['REQUEST_METHOD'] == 'GET') require 'services/get.php';
    
    else if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $json = array(
            'status' => '200',
            'result' => 'OK'
        );
    } else if($_SERVER['REQUEST_METHOD'] == 'PUT'){
        $json = array(
            'status' => '200',
            'result' => 'OK'
        );
    } else if($_SERVER['REQUEST_METHOD'] == 'DELETE'){
        $json = array(
            'status' => '200',
            'result' => 'OK'
        );
    } else {
        $json = array(
            $status => '404',
            $result => 'Not Found'
        );
    }
}

// echo json_encode($routesArray, http_response_code($json["status"]));
// echo '<pre>';  print_r($_SERVER['REQUEST_METHOD']); echo  '</pre>';
?>