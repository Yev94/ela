<?php

class UserSession{

    public function __construct(){
        if(session_id() == '' || !isset($_SESSION)){
            session_start();
        }
    }

    public function setCurrentUser($user){
        $_SESSION['user'] = $user;
    }

    public function getCurrentUser(){
        if(isset($_SESSION['user'])){
            return $_SESSION['user'];
        }
    }

    public function destroySession(){
        session_unset();
        session_destroy();
        setcookie('username', '', time() - 1, "/");
    }
}

?>