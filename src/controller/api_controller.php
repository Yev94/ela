<?php
class ApiController
{

    private $param = [
        'reed' => 'reed',
        'create' => 'create',
        'consult' => 'consult',
        'update' => 'update',
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
        if (in_array($userRole, $this->authorizedRole)) {
            require $this->modelRoute;
            $this->tableValues = new ApiUsersModel();
            //TODO: Apuntar que se puede llamar a una función por su string
            $func = $this->param[$this->params['type'] ?? 'error'];
            $this->$func();
        } else {
            $this->json['status'] = '401';
            $this->json['result'] = 'Unauthorized';
            echo json_encode($this->json);
        }
    }



    private function reed()
    {
        // echo $_SESSION['user']['userNickname'];
        $response = $this->tableValues->reed();
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

    private function consult()
    {
        $response = $this->tableValues->consult($this->params['id']);
        $this->sendResponse($response);
    }

    private function update()
    {
        $response = $this->tableValues->update($this->params['id']);
        $this->updateAndSendResponse($response);
    }

    private function delete()
    {
        $response = $this->tableValues->delete($this->params['id']);
        $this->sendResponse($response);
    }

    private function updateAndSendResponse($response)
    {
        $response ?
            $this->reed() :
            $this->error();
    }

    private function sendResponse($response)
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
