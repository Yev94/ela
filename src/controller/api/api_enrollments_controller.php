<?php

class ApiEnrollmentsController
{
    private $param = [
        'consultByYear' => 'consultByYear',
        'reed' => 'reed',
        'create' => 'create',
        'consultByIdUser' => 'consultByIdUser',
        'delete' => 'delete',
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
        $userRole = $this->sessionUser->getUserRole();
        $this->params = $params;
        $this->authorizedRole = ['3'];
        $this->modelRoute = './model/api_enrollments_model.php';

        if (in_array($userRole, $this->authorizedRole)) {
            require $this->modelRoute;
            $this->tableValues = new ApiEnrollmentsModel();
            $func = $this->param[$this->params['type'] ?? 'error'];
            $this->$func();
        } else {
            $this->json['status'] = '401';
            $this->json['result'] = 'Unauthorized';
            echo json_encode($this->json);
        }
    }

    private function consultByYear()
    {
        $response = $this->tableValues->consultByYear($this->params['id']);
        if (!empty($response)) {
            echo json_encode($response);
        } else {
            $this->sendResponse($response);
        }
    }

    private function consultByIdUser()
    {
        $response = $this->tableValues->consultByIdUser($this->params['id']);
        if (!empty($response)) {
            echo json_encode($response);
        } else {
            $this->sendResponse($response);
        }
    }

    private function create()
    {
        $response = $this->tableValues->create();
        $this->updateAndSendResponse($response);
    }

    private function delete()
    {
        $response = $this->tableValues->delete($this->params['id']);
        $this->sendResponse($response);
    }

    private function updateAndSendResponse($response)
    {
        if ($response)
            {
                $this->json['status'] = '200';
                $this->json['result'] = 'OK';
                echo json_encode($this->json);
            } else{
                $this->error();
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