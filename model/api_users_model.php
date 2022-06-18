<?php
// header("Access-Control-Allow-Origin: *");
// header("Access-Control-Allow-Headers: access");
// header("Access-Control-Allow-Methods: GET,POST");
// header("Content-Type: application/json; charset=UTF-8");
// header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

class ApiUsersModel
{
    //We use the constructor to connect to the database
    public function __construct()
    {
        require './includes/connect.php';

        $this->db = Connect::connection();
    }

    public function reed()
    {
        // get all users
        $sql = "SELECT id, concat_ws(' ', user_name, last_name) as user_name, identity_card FROM users ORDER By id";
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

        $user_name = $data->inputName;
        $last_name = $data->inputLastName;

        if (!empty($last_name) && !empty($user_name)) {
            $sql = "INSERT INTO users(user_name,last_name) VALUES (:user, :password)";
            $query = $this->db->prepare($sql);
            $query->bindParam(':user', $user_name);
            $query->bindParam(':password', $last_name);
            $query->execute();
            $query->closeCursor();
            return $this->querySuccess($query);
        }
    }

    public function consult($id)
    {
        // Consult user by id
        $sql = "SELECT * FROM users WHERE id= :id";
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

        $user_name = $data->inputNameUpdate;
        $last_name = $data->inputLastNameUpdate;

        if (!empty($last_name) && !empty($user_name)) {
            $sql = "UPDATE users SET user_name=:user, last_name=:last_name WHERE id=:id";
            $query = $this->db->prepare($sql);
            $query->bindParam(':user', $user_name);
            $query->bindParam(':last_name', $last_name);
            $query->bindParam(':id', $id);
            $query->execute();
            $query->closeCursor();
            return $this->querySuccess($query);
        }
    }

    public function delete($id)
    {
        // delete user by id
        $sql = "DELETE FROM users WHERE id = :id";
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
