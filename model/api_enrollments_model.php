<?php

class ApiEnrollmentsModel{
    private $db;

    //We use the constructor to connect to the database
    public function __construct()
    {
        require './includes/connect.php';

        $this->db = Connect::connection();
    }

    public function consultByYear($yearId)
    {
        // Consult user by id
        $sql = "SELECT id, name FROM course WHERE year_id= :yearId";
        $query = $this->db->prepare($sql);
        $query->bindParam(':yearId', $yearId);
        $query->execute();
        $row = $query->fetchAll(PDO::FETCH_CLASS);
        $query->closeCursor();
        return $row;
    }

    public function consultByIdUser($userId)
    {
        // get all courses
        $sql = "SELECT enrol.id, course.name, years.year, roles.rol, enrol.start_date 
            FROM enrol
            INNER JOIN course ON course.id = course_id 
            INNER JOIN years ON years.id = course.year_id
            INNER JOIN user_rol ON user_rol.id = enrol.user_rol_id 
            INNER JOIN roles ON roles.id = user_rol.role_id
            WHERE user_rol.user_id = :userId
            ORDER BY enrol.id DESC";
        
        $query = $this->db->prepare($sql);
        $query->bindParam(':userId', $userId);
        $query->execute();
        $row = $query->fetchAll(PDO::FETCH_CLASS);
        $query->closeCursor();
        return $row;
    }

    public function create()
    {
        //Insert user in database with POST method
        $data = json_decode(file_get_contents("php://input"));

        $id_user = $data->idUser ?? '';
        $course_id = $data->selectEnrollment ?? '';
        $role_id = $data->selectTypeUser ?? '';
        $start_date = $data->selectDateEnrollment ?? '';

        if($role_id != 3){
            do{
                $sql = "SELECT id FROM user_rol WHERE user_id= :id_user AND role_id= :role_id";
                $query = $this->db->prepare($sql);
                $query->bindParam(':id_user', $id_user);
                $query->bindParam(':role_id', $role_id);
                $query->execute();
                $row = $query->fetchAll(PDO::FETCH_CLASS);
                $query->closeCursor();
                if(!$this->querySuccess($query)){
                    $sql = "INSERT INTO user_rol(user_id, role_id) VALUES (:id_user, :role_id)";
                    $query = $this->db->prepare($sql);
                    $query->bindParam(':id_user', $id_user);
                    $query->bindParam(':role_id', $role_id);
                    $query->execute();
                    $query->closeCursor();
                }
            }   while(!$this->querySuccess($query));
            
            $userRolId = $row[0]->id;
            $sql = "INSERT INTO enrol(course_id, user_rol_id, start_date) VALUES (:course_id, :userRolId, :start_date)";
            $query = $this->db->prepare($sql);
            $query->bindParam(':course_id', $course_id);
            $query->bindParam(':userRolId', $userRolId);
            $query->bindParam(':start_date', $start_date);
            $query->execute();
            $query->closeCursor();
            return $this->querySuccess($query);
        }
        else
        {
            return false;
        }
    }

    public function delete($id)
    {
        // delete user by id
        $sql = "DELETE FROM enrol WHERE id = :id";
        $query = $this->db->prepare($sql);
        $query->bindParam(':id', $id);
        $query->execute();
        $query->closeCursor();

        return $this->querySuccess($query);
    }


    private function querySuccess($query){
        if ($query->rowCount() > 0) return true;
            else return false;
    }
}
