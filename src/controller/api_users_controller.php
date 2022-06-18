<?php
//TODO: Hacer que se ejecute cuando sea la sesión correcta
class ApiUsersController
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

    public function __construct($params)
    {
        $this->params = $params;
        require './model/api_users_model.php';
        $this->tableValues = new ApiUsersModel();
        //TODO: Apuntar que se puede llamar a una función por su string
        $func = $this->param[$this->params['type'] ?? 'error'];
        $this->$func();
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

    private function updateAndSendResponse($response){
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
