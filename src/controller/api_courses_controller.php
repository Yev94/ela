<?php


class ApiCoursesController extends ApiController
{
    public function __construct($params)
    {
        $this->modelRoute = './model/api_courses_model.php';
        $this->authorizedRole = ['3'];
        parent::__construct($params);
    }
}
