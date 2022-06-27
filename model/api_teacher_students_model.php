<?php

require './includes/connect.php';
class ApiTeacherStudentsModel
{
    private $db;

    //We use the constructor to connect to the database
    public function __construct()
    {

        $this->db = Connect::connection();
    }

    public function getYears()
    {
        $sql = "SELECT * FROM years";
        $query = $this->db->prepare($sql);
        $query->execute();
        $row = $query->fetchAll(PDO::FETCH_CLASS);
        $query->closeCursor();

        return $row;
    }

    public function getCoursesByYear($userRoleId, $yearID)
    {
        $sql = "SELECT id, name FROM course WHERE year_id = :year_id AND id IN (SELECT course_id FROM enrol WHERE user_rol_id = :user_id)";
        $query = $this->db->prepare($sql);
        $query->bindParam(':year_id', $yearID);
        $query->bindParam(':user_id', $userRoleId);
        $query->execute();
        $row = $query->fetchAll(PDO::FETCH_CLASS);
        $query->closeCursor();

        return $row;
    }

    public function consultStudentsByCourse($courseID)
    {
        $sql = "SELECT user_rol.id, users.picture, concat_ws(' ', users.user_name, users.last_name) as name, users.identity_card, enrol.start_date
        FROM enrol 
        INNER JOIN user_rol ON enrol.user_rol_id = user_rol.id
        INNER JOIN users ON user_rol.user_id = users.id
        WHERE enrol.course_id = :course_id AND user_rol.role_id = '1'";
        $query = $this->db->prepare($sql);
        $query->bindParam(':course_id', $courseID);
        $query->execute();
        $row = $query->fetchAll(PDO::FETCH_CLASS);
        $query->closeCursor();

        return $row;
    }

}