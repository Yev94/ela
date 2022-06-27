<?php

require './model/crud_courses_model.php';
class CrudAdminUsersController
{
    
    //We use the constructor to connect to the database
    public function __construct()
    {
        $arrTableYears = $this->getYears();
        require './view/ela_admin/crud_admin_users_view.php';
    }

    private function getYears()
    {
        $tableYears = new CrudCoursesModel();
        return $tableYears->getYears();
    }

}

?>