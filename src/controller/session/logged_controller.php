<?php
//We use this class to control the admin session
class LoggedController
{
    private $userSession;
    private $userRole;
    private $param = [
        'users' => 'getUsersController',
        'courses' => 'getCoursesController',
        'noParameters' => 'getPanelView',
        'notFound' => 'getNotFoundView'
    ];

    public function __construct($params)
    {

        $this->userSession = new UserSession();
        $this->userRole = $this->userSession->getUserRole();

        if ($this->userRole == '3') {
            $func = $this->param[$params['db'] ?? 'noParameters'] ??
                $this->param['noParameters'];
            $this->$func();
        } else {
            header('Location: ./admin');
        }
    }

    private function getUsersController()
    {
        require './src/controller/crud/crud_users_controller.php';
        new CrudUsersController();
    }

    private function getCoursesController()
    { 
        require './src/controller/crud/crud_courses_controller.php';
        new CrudCoursesController();
        
    }

    private function getPanelView()
    {
        require './view/control_panel.php';
    }

    private function getNotFoundView()
    {
        require './view/404.php';
    }
}
