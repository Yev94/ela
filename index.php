<?php
$title = 'Modelo Vista Controlador';

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="./style/main.css?Version: 1.0.1">
</head>

<body>
    <h1><?php echo $title; ?></h1>
    <?php

    require_once 'Controller/users_controller.php';
    //Al pulsar cualquier botón de acción pasamos por la URL el método que queremos ejecutar
    $metodo = $_GET['m'] ?? '';
    //Si existe el método dentro clase, lo ejecuta, sino, muestra el formulario
    if (method_exists('Users_Controller', $metodo)):
        Users_Controller::{$metodo}();
    else :
        Users_Controller::index();
    endif;

    ?>
</body>

</html>