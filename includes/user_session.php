<?php

class UserSession{

    public function __construct(){
        if(session_id() == '' || !isset($_SESSION)){
            session_start();
        }
    }

    public function setUserName($userName){
        $_SESSION['user']['userName'] = $userName;
    }

    public function setUserNickname($userNickname){
        $_SESSION['user']['userNickname'] = $userNickname;
    }

    public function setUserRole($userRole){
        $_SESSION['user']['userRole'] = $userRole;
    }

    public function getUserName(){
        if(isset($_SESSION['user']['userName'])){
            return $_SESSION['user']['userName'];
        }
        return null;
    }

    public function getUserNickname(){
        if(isset($_SESSION['user']['userNickname'])){
            return $_SESSION['user']['userNickname'];
        }
        return null;
    }

    public function getUserRole(){
        if(isset($_SESSION['user']['userRole'])){
            return $_SESSION['user']['userRole'];
        }
        return null;
    }

    public function destroySession(){
        session_unset();
        session_destroy();
    }
}

?>