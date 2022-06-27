<?php
//We use this class to control the admin session
class LoggedController
{
    private $userSession;
    private $roleId;
    private $param = [
        'users' => 'getUsersController',
        'courses' => 'getCoursesController',
        'students' => 'getStudentsController',
        'noParameters' => 'getPanelView',
        'notFound' => 'getNotFoundView'
    ];

    public function __construct($params)
    {

        $this->userSession = new UserSession();
        $this->roleId = $this->userSession->getRoleId();


        $users = ['1', '2', '3'];
        $checkValidUser = false;

        foreach ($users as $user) {
            if ($this->roleId == $user) {
                $checkValidUser = true;
            }
        }

        if ($checkValidUser) {
            $func = $this->param[$params['db'] ?? 'noParameters'] ??
                $this->param['noParameters'];
            $this->$func();
        } else {
            header('Location: ./');
        }
    }

    private function getUsersController()
    {
        if ($this->roleId == '3') {
            require './src/controller/crud/crud_admin_users_controller.php';
            new CrudAdminUsersController();
        } else {
            header('Location: ./panel');
        }
    }

    private function getCoursesController()
    {
        $arrUsers = [
            '1' => 'Student',
            '2' => 'Teacher',
            '3' => 'Admin'
        ];
        $directory = './src/controller/crud/crud_' . strtolower($arrUsers[$this->roleId]) . '_courses_controller.php';
        $classController = 'Crud' . $arrUsers[$this->roleId] . 'CoursesController';

        require $directory;
        new $classController();
    }

    private function getStudentsController()
    {
        if ($this->roleId == '2') {
            require './src/controller/crud/teacher_students_controller.php';
            new CrudTeacherStudentsController();
        } else {
            header('Location: ./panel');
        }
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
