<?php
//We use this class to control the admin session
class LoggedController
{
    private $userSession;
    private $userRole;
    private $param = [
        'users' => 'getUsersView',
        'courses' => 'getCoursesView',
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

    private function getUsersView()
    {
        require './view/ela_admin/crud_users_view.php';
    }

    private function getCoursesView()
    {
        require './view/ela_admin/crud_courses_view.php';
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
