<?php

use FontLib\Table\Type\loca;

class PdfTeacherStudentController
{
    private $param = [
        'generatePdfByCourse' => 'generatePdfByCourse',
        'error' => 'error',
    ];

    private $tableValues;
    private $params;
    private $sessionUser;
    protected $authorizedRole;
    protected $modelRoute;

    public function __construct($params)
    {
        $this->sessionUser = new UserSession();
        $userRoleId = $this->sessionUser->getRoleId();
        $this->params = $params;
        $this->modelRoute = './model/api_teacher_students_model.php';
        $this->authorizedRole = ['2'];

        if (in_array($userRoleId, $this->authorizedRole)) {
            require $this->modelRoute;
            $this->tableValues = new ApiTeacherStudentsModel();
            $func = $this->param[$this->params['type'] ?? 'error'];
            $this->$func();
        } else {
            echo '🔒🤷🏻‍♂️';
        }
    }

    private function generatePdfByCourse()
    {
        $response = $this->tableValues->consultStudentsByCourse($this->params['id']);
        if (!empty($response)) {
            $arrTableStudents = $response;
            require './view/pdf/pdf_teacher_students_view.php';
        } else {
            header('Location: http://localhost/ela/panel?db=students');
        }
    }

    private function error()
    {
        echo '😐';
    }

}


?>