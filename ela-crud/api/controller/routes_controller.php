<?php

class Routes_Controller {

    public static function index() {
        require_once 'routes/routes.php';
    }

    // public static function insert() {
    //     require_once 'View/routes_view.php';
    //     $insertarRuta = new routes_model();
    //     $insertarRuta->insert($_POST['ruta'], $_POST['descripcion']);
    //     //We call the view file again, so that the table is updated
    //     header('Location: index.php');
    // }

    // public static function delete() {
    //     $deleteRuta = new routes_model();
    //     $deleteRuta->delete($_GET['id']);
    //     header('Location: index.php');
    // }

    // public static function edit() {
    //     $ruta = new routes_model();
    //     $id = $_GET['id'];
    //     $arrTable = $ruta->select($id);
    //     require_once 'View/edit.php';
    // }

    // public static function update() {
    //     $updateRuta = new routes_model();
    //     $updateRuta->update($_POST['ruta'], $_POST['descripcion'], $_GET['id']);
    //     header('Location: index.php');
    // }
}

?>