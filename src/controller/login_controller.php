<?php
//We use this class to login admin page
require './model/login_admin_model.php';
class LoginController
{
    private $userSession;
    private $user;
    private $userRole;

    public function __construct()
    {
        $this->userSession = new UserSession();
        $this->userRole = $this->userSession->getUserRole();
        $this->user = new LoginAdminModel();
    }

    public function executeGet()
    {
        if ($this->userRole == '3') {
            header('Location: ./panel');
        } else {
            require './view/ela_admin/login_admin_view.php';
        }
    }

    public function executePost()
    {
    
        //From model/login_admin_model.php
        $this->user->loginAdmin($_POST['user'], $_POST['password'], $_POST['role']);

        if ($this->user->loginAdmin($_POST['user'], $_POST['password'], $_POST['role'])) {
            //From includes/user_session.php
            $this->userSession->setUserName($this->user->getName());
            $this->userSession->setUserNickname($this->user->getNickname());
            $this->userSession->setUserRole($this->user->getRole());
            
            header('Location: ./panel');
        } else {
            $errorLogin = '<div class="alert alert-danger" role="alert"> Usuario o contraseña incorrectos </div>';
            require './view/ela_admin/login_admin_view.php';
        }
    }
}
