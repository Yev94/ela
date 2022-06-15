<?php

require 'controller/get_controller.php';
$query = new GetController;

//TODO: Hacer filter Like
$table = end($routesArray); //Recoge la ultima palabra de la URL
$query->table = explode("?", $table)[0]; //Divide cada palabra de la ultima palabra por el interrogante
$query->columns = $_GET["columns"] ?? "*"; //Si en la URL hay un select recoge su valor para pedir las columnas concretas
$query->orderByColumn = $_GET["orderByColumn"] ?? null; //Si en la URL hay un orderByColumn recoge su valor
$query->orderType = $_GET["orderType"] ?? 'ASC'; //Igualmente, si en la URL hay un orderType recoge su valor
$query->startAt = $_GET["startAt"] ?? null; //Si en la URL hay un startAt recoge su valor
$query->numValues = $_GET["numValues"] ?? null; //Si en la URL hay un limit recoge su valor
$query->filterByColumn = $_GET["filterByColumn"] ?? null; //Si en la URL hay un filterByColumn recoge su valor




if(isset($_GET["filterByColumn"]) && isset($_GET["filterEqualTo"])){
    $query->filterByColum = $_GET["filterByColumn"];
    $query->filterEqualTo = $_GET["filterEqualTo"];
    $query->getCustomData();
} else {
    $query->getAll();
}


// $json = array(
//     'status' => '200',
//     'result' => 'OK'
// );

// echo json_encode($json, http_response_code($json["status"]));

?>