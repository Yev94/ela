<?php

require_once 'Model/users_model.php';
//We make a call to the users_model class, we use one of its functions according to the situation and call the view file we want to display
class users_Controller {

    static function index() {
        $table = new users_model();

        $arrTable = $table->get_all();
        require_once 'View/users_view.php';
    }

    static function insert() {
        require_once 'View/users_view.php';
        $insertarUser = new users_model();
        $insertarUser->insert($_POST['user'], $_POST['password']);
        //We call the view file again, so that the table is updated
        header('Location: index.php');
    }

    static function delete() {  
        $deleteUser = new users_model();
        $deleteUser->delete($_GET['id']);
        header('Location: index.php');
    }

    static function edit() {
        $user = new users_model();
        $id = $_GET['id'];
        $arrTable = $user->select($id);
        require_once 'View/edit.php';
    }

    static function update() {
        $updateUser = new users_model();
        $updateUser->update($_POST['user'], $_POST['password'], $_GET['id']);
        header('Location: index.php');
    }
}

?>