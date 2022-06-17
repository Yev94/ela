<?php
class users_model{
    private $db;
    
    public function __construct(){
        require_once '/ela/includes/config/connect.php';
        
        $this->db = Connect::connection();
        $this->table = array();
    }
    
    public function get_all(){
        require 'paginacion.php';
        $sql = "SELECT * FROM users LIMIT $empezar_desde, $tamanio_paginas";
        $query = $this->db->prepare($sql);
        $query->execute();
        $row = $query->fetchAll(PDO::FETCH_OBJ);
        $query->closeCursor();
        return $row;
    }

    public function insert($empleado, $password){
        $sql = "INSERT INTO users (empleado, password) VALUES (:empleado, :password)";
        $query = $this->db->prepare($sql);
        $query->bindParam(':empleado', $empleado);
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

    public function update($empleado, $password, $id){
        $sql = "UPDATE users SET empleado = :empleado, password = :password WHERE id = :id";
        $query = $this->db->prepare($sql);
        $query->bindParam(':empleado', $empleado);
        $query->bindParam(':password', $password);
        $query->bindParam(':id', $id);
        $query->execute();
        $query->closeCursor();
    }

}

?>