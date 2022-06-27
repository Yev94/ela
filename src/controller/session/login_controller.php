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
        $this->userRole = $this->userSession->getRoleId();
        $this->user = new LoginAdminModel();
    }

    public function executeGet()
    {
        $uri = $_SERVER['REQUEST_URI'];
        if ($this->userRole == '3') {
            header('Location: ./panel');
        } else {
            $this->returnToBeginningPage();
        }
    }

    public function executePost()
    {
        
        //From model/login_admin_model.php
        $this->user->loginAdmin($_POST['user'], $_POST['password'], $_POST['roleId']);

        if ($this->user->loginAdmin($_POST['user'], $_POST['password'], $_POST['roleId'])) {
            //From includes/user_session.php
            $this->userSession->setUserId($this->user->getId());
            $this->userSession->setUserName($this->user->getName());
            $this->userSession->setUserNickname($this->user->getNickname());
            $this->userSession->setRoleId($this->user->getRoleId());
            $this->userSession->setUserRoleId($this->user->getUserRoleId());
            
            header('Location: ./panel');
        } else {
            $this->returnToBeginningPage(true);
        }
    }

    public function returnToBeginningPage($error = false){
        $uri = $_SERVER['REQUEST_URI'];
        
        
        if($error){
            $errorLogin = '<div class="alert alert-danger" role="alert"> Usuario o contraseña incorrectos </div>';
        }
        
        if ($uri == '/ela/login') {
            require './view/login.php';
        } elseif ($uri == '/ela/admin') {
            require './view/ela_admin/login_admin_view.php';
        } else{
            header('Location: ./');
        }
    }
}
