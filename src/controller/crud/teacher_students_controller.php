<?php
require './model/api_teacher_students_model.php';
class CrudTeacherStudentsController
{
    private $courses;
    public function __construct()
    {
        $this->courses = new ApiTeacherStudentsModel();

        $arrTableYears = $this->getYears();
        $firstIdYear = $arrTableYears[0]->id;
        $arrTableCourses = $this->getCoursesByYear($firstIdYear);
        require './view/ela_teacher/teacher_students_view.php';
    }
    
    private function getYears()
    {
        return $this->courses->getYears();
    }

    public function getCoursesByYear($yearId)
    {
        $sessionUser = new UserSession();
        $userRoleId = $sessionUser->getUserRoleId();
        return $this->courses->getCoursesByYear($userRoleId, $yearId);
    }
}

?>