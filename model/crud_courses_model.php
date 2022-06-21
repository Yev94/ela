<?php

require './includes/connect.php';
class CrudCoursesModel
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

}
