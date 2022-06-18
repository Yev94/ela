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

    public function destroySession(){
        session_unset();
        session_destroy();
    }
}

?>