<?php

class ApiAdminUsersController extends ApiCrudController
{
    public function __construct($params)
    {
        $this->modelRoute = './model/api_admin_users_model.php';
        $this->authorizedRole = ['3'];
        parent::__construct($params);
    }
}
?>