<?php

require_once 'Model/users_model.php';
//En general hacemos una llamada a la clase users_model, usamos una de sus funciones según convenga y llamamos al archivo view que queremos mostrar
class Users_Controller {

    static function index() {
        $consultar = $_GET['consultar'];
        
        if(isset($consultar)){
            $table = new Users_model();
            $arrTable = $table->select($consultar);
            require_once 'view/users_view.php';
        }
    }

    static function insert() {
        require_once 'view/users_view.php';
        $insertarEmpleado = new Users_model();
        $insertarEmpleado->insert($_POST['usuario'], $_POST['password']);
        //A pesar que en el formulario este se hace una llamada a sí mismo, lo hacemos así para que recargue la página y se vea la actualización de la tabla
        header('Location: index.php');
    }

    static function delete() {  
        $deleteEmpleado = new Users_model();
        $deleteEmpleado->delete($_GET['id']);
        header('Location: index.php');
    }

    static function edit() {
        $usuario = new Users_model();
        $id = $_GET['id'];
        $arrTable = $usuario->select($id);
        require_once 'view/edit.php';
    }

    static function update() {
        $updateEmpleado = new Users_model();
        $updateEmpleado->update($_POST['usuario'], $_POST['password'], $_GET['id']);
        header('Location: index.php');
    }
}

?>