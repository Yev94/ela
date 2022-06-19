<?php

require './model/login_admin_model.php';
class LoginAdminController
{
    private $userSession;
    private $user;

    public function __construct()
    {
        $this->userSession = new UserSession();
        $this->user = new LoginAdminModel();
    }

    public function executeGet()
    {
        if (isset($_SESSION['user']['userName'])) {
            require './view/ela_admin/crud_users_view.php';
        } else {
            require './view/ela_admin/login_admin_view.php';
        }
    }

    public function executePost()
    {
    
        //From model/login_admin_model.php
        $this->user->setUser($_POST['user']);
        $this->user->loginAdmin($_POST['user'], $_POST['password'], $_POST['rol']);

        if ($this->user->loginAdmin($_POST['user'], $_POST['password'], $_POST['rol'])) {
            //From includes/user_session.php
            $this->userSession->setUserName($this->user->getName());
            $this->userSession->setUserNickname($this->user->getNickname());
            
            require './view/ela_admin/crud_users_view.php';
        } else {
            $errorLogin = '<div class="alert alert-danger" role="alert"> Usuario o contraseña incorrectos </div>';
            require './view/ela_admin/login_admin_view.php';
        }
    }
}
