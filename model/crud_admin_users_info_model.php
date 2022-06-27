<?php

class CrudAdminUsersInfoModel
{
    private $db;

    //We use the constructor to connect to the database
    public function __construct()
    {

        $this->db = Connect::connection();
    }

    public function getNationality()
    {
        $sql = "SELECT id, nationality FROM country WHERE nationality IS NOT NULL ORDER BY nationality ASC";
        $query = $this->db->prepare($sql);
        $query->execute();
        $row = $query->fetchAll(PDO::FETCH_CLASS);
        $query->closeCursor();
        return $row;
    }

}