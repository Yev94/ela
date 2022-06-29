<?php
// header("Access-Control-Allow-Origin: *");
// header("Access-Control-Allow-Headers: access");
// header("Access-Control-Allow-Methods: GET,POST");
// header("Content-Type: application/json; charset=UTF-8");
// header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

class ApiAdminModel
{
    private $db;

    //We use the constructor to connect to the database
    public function __construct()
    {
        require './includes/connect.php';

        $this->db = Connect::connection();
    }

    public function reed()
    {
        // get all courses
        $sql = "SELECT course.id, course.short_name, course.long_name, (SELECT year FROM years WHERE course.year_id = years.id) as year FROM course ORDER By course.id";
        $query = $this->db->prepare($sql);
        $query->execute();
        $row = $query->fetchAll(PDO::FETCH_CLASS);
        $query->closeCursor();

        return $row;
    }

    public function create()
    {
        //Insert user in database with POST method
        $data = json_decode(file_get_contents("php://input"));

        $short_name = $data->inputShortName ?? '';
        $long_name = $data->inputLongName ?? '';
        $year_id = $data->inputYear ?? '';

        // if (!empty($name) && !empty($year_id)) {
            $sql = "INSERT INTO course(short_name, long_name, year_id) VALUES (:name, :year_id)";

            $query = $this->db->prepare($sql);
            $query->bindParam(':short_name', $short_name);
            $query->bindParam(':long_name', $long_name);
            $query->bindParam(':year_id', $year_id);
            $query->execute();
            $query->closeCursor();
            return $this->querySuccess($query);
        // }
    }

    public function consult($id)
    {
        // Consult user by id
        $sql = "SELECT id, short_name, long_name, year_id FROM course WHERE id= :id";
        $query = $this->db->prepare($sql);
        $query->bindParam(':id', $id);
        $query->execute();
        $row = $query->fetchAll(PDO::FETCH_CLASS);
        $query->closeCursor();
        return $row;
    }

    public function update($id)
    {
        // Update user by id
        $data = json_decode(file_get_contents("php://input"));;

        $short_name = $data->inputShortNameUpdate ?? '';
        $long_name = $data->inputLongNameUpdate ?? '';
        $year_id = $data->inputYearUpdate  ?? '';

        // if (!empty($name) && !empty($year_id)) {
            $sql = "UPDATE course SET short_name=:short_name, long_name=:long_name, year_id=:year_id WHERE id=:id";
            $query = $this->db->prepare($sql);
            $query->bindParam(':short_name', $short_name);
            $query->bindParam(':long_name', $long_name);
            $query->bindParam(':year_id', $year_id);
            $query->bindParam(':id', $id);
            $query->execute();
            $query->closeCursor();
            return $this->querySuccess($query);
        // }
    }

    public function delete($id)
    {
        // delete user by id
        $sql = "DELETE FROM course WHERE id = :id";
        $query = $this->db->prepare($sql);
        $query->bindParam(':id', $id);
        $query->execute();
        $query->closeCursor();

        return $this->querySuccess($query);
    }

    public function getCoursesByYear($yearID)
    {
        $sql = "SELECT * FROM course WHERE year_id = :year_id";
        $query = $this->db->prepare($sql);
        $query->bindParam(':year_id', $yearID);
        $query->execute();
        $row = $query->fetchAll(PDO::FETCH_CLASS);
        $query->closeCursor();

        return $row;
    }

    private function querySuccess($query){
        if ($query->rowCount() > 0) return true;
            else return false;
    }
}