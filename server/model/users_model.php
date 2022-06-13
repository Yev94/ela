<?php

class users_model{
    private $db;
    
    public function __construct(){
        require_once 'connect.php';
        
        $this->db = Connect::connection();
        $this->table = array();
    }
    
    public function get_all(){
        $sql = "SELECT * FROM users";
        $query = $this->db->prepare($sql);
        $query->execute();
        $row = $query->fetchAll(PDO::FETCH_OBJ);
        $query->closeCursor();
        return $row;
    }

    public function insert($user, $password){
        $sql = "INSERT INTO users (user, password) VALUES (:user, :password)";
        $query = $this->db->prepare($sql);
        $query->bindParam(':user', $user);
        $query->bindParam(':password', $password);
        $query->execute();
        $query->closeCursor();
    }

    public function delete($id){
        $sql = "DELETE FROM users WHERE id = :id";
        $query = $this->db->prepare($sql);
        $query->bindParam(':id', $id);
        $query->execute();
        $query->closeCursor();
    }

    public function select($id){
        $sql = "SELECT * FROM users WHERE id = :id";
        $query = $this->db->prepare($sql);
        $query->bindParam(':id', $id);
        $query->execute();
        $row = $query->fetch(PDO::FETCH_OBJ);
        $query->closeCursor();
        return $row;
    }

    public function update($user, $password, $id){
        $sql = "UPDATE users SET user = :user, password = :password WHERE id = :id";
        $query = $this->db->prepare($sql);
        $query->bindParam(':user', $user);
        $query->bindParam(':password', $password);
        $query->bindParam(':id', $id);
        $query->execute();
        $query->closeCursor();
    }

}

?>