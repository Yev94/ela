<?php

class ApiTeacherStudentsController
{
    private $param = [
        'consultByYear' => 'getCoursesByYear',
        'consultStudentsByCourse' => 'consultStudentsByCourse',
        'consultByIdUser' => 'consultByIdUser',
        'error' => 'error',
    ];

    private $json = array(
        'status' => '400',
        'result' => 'Bad Request'
    );

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
            $this->json['status'] = '401';
            $this->json['result'] = 'Unauthorized';
            echo json_encode($this->json);
        }
    }

    public function getCoursesByYear()
    {
        $sessionUser = new UserSession();
        $userRoleId = $sessionUser->getUserRoleId();
        $response = $this->tableValues->getCoursesByYear($userRoleId, $this->params['id']);
        if (!empty($response)) {
            echo json_encode($response);
        } else {
            $this->sendResponse($response);
        }
    }


    private function consultStudentsByCourse()
    {
        $response = $this->tableValues->consultStudentsByCourse($this->params['id']);
        if (!empty($response)) {
            echo json_encode($response);
        } else {
            $this->sendResponse($response);
        }
    }

    public function sendResponse($response)
    {
        if (!empty($response)) {
            echo json_encode($response);
        } else {
            $this->json = array(
                'status' => '404',
                'result' => 'Not Found'
            );
            $this->error();
        }
    }

    private function error()
    {
        echo json_encode($this->json, http_response_code($this->json["status"]));
    }
}
?>