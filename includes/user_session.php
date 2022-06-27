<?php

class UserSession{

    public function __construct(){
        if(session_id() == '' || !isset($_SESSION)){
            session_start();
        }
    }

    public function setUserId($userId){
        $_SESSION['user']['userId'] = $userId;
    }

    public function setUserName($userName){
        $_SESSION['user']['userName'] = $userName;
    }

    public function setUserNickname($userNickname){
        $_SESSION['user']['userNickname'] = $userNickname;
    }

    public function setRoleId($roleId){
        $_SESSION['user']['roleId'] = $roleId;
    }

    public function setUserRoleId($userRoleId){
        $_SESSION['user']['userRoleId'] = $userRoleId;
    }

    public function getUserId(){
        if(isset($_SESSION['user']['userId'])){
            return $_SESSION['user']['userId'];
        }
        return null;
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

    public function getRoleId(){
        if(isset($_SESSION['user']['roleId'])){
            return $_SESSION['user']['roleId'];
        }
        return null;
    }

    public function getUserRoleId(){
        if(isset($_SESSION['user']['userRoleId'])){
            return $_SESSION['user']['userRoleId'];
        }
        return null;
    }

    public function destroySession(){
        session_unset();
        session_destroy();
    }
}

?>