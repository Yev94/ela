<?php

require './model/login_admin_model.php';
class LoginAdmin
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
        if ($this->userSession->getCurrentUser() != null) {
            require './view/ela_admin/crud_users.php';
        } else {
            require './view/ela_admin/login/index.php';
        }
    }

    public function executePost()
    {
    
        //From includes/user_session.php
        $this->user->setUser($_POST['user']);
        $this->user->loginAdmin($_POST['user'], $_POST['password']);

        if ($this->user->loginAdmin($_POST['user'], $_POST['password'])) {
            $this->userSession->setCurrentUser($this->user->getName());
            setcookie('username', $this->user->getName(), time() + (86400 * 30), "/");
            require './view/ela_admin/crud_users.php';
        } else {
            $errorLogin = '<div class="alert alert-danger" role="alert"> Usuario o contraseña incorrectos </div>';
            require './view/ela_admin/login/index.php';
        }
    }
}
