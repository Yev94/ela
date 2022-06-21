<?php

class ApiUsersController extends ApiController
{
    public function __construct($params)
    {
        $this->modelRoute = './model/api_users_model.php';
        $this->authorizedRole = ['3'];
        parent::__construct($params);
    }
}
?>