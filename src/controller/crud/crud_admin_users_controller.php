<?php

class CrudAdminUsersController
{
    
    //We use the constructor to connect to the database
    public function __construct()
    {
        $arrTableYears = $this->getYears();
        $arrTableNationality = $this->getNationality();
        require './view/ela_admin/crud_admin_users_view.php';
    }
    
    private function getYears()
    {
        require './model/crud_courses_model.php';
        $tableYears = new CrudCoursesModel();
        return $tableYears->getYears();
    }
    
    private function getNationality()
    {
        require './model/crud_admin_users_info_model.php';
        $tableNationality = new CrudAdminUsersInfoModel();
        return $tableNationality->getNationality();
    }

}

?>