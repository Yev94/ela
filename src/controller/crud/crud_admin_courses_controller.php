<?php
require './model/crud_courses_model.php';
class CrudAdminCoursesController
{
    
    //We use the constructor to connect to the database
    public function __construct()
    {
        $arrTableYears = $this->getYears();
        require './view/ela_admin/crud_admin_courses_view.php';
    }

    private function getYears()
    {
        $tableYears = new CrudCoursesModel();
        return $tableYears->getYears();
    }

}

?>