<?php


class ApiAdminCoursesController extends ApiCrudController
{
    public function __construct($params)
    {
        $this->modelRoute = './model/api_admin_courses_model.php';
        
        $this->authorizedRole = ['3'];
        parent::__construct($params);
    }
}
