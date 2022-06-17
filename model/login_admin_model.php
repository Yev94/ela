<?php

//Create class do LoginAdmin model
class LoginAdminModel
{
    private $db;
    private $name;
    private $username;

    public function __construct()
    {
        require_once './includes/connect.php';

        $this->db = Connect::connection();
    }

    //Create function to login admin
    public function loginAdmin(string $user, string $password)
    {
        $md5pass = md5($password);
        $sql = "SELECT * FROM users WHERE user_nickname = :user AND password = :password";
        //From includes/connect.php
        $query = $this->db->prepare($sql);

        $query->bindParam(':user', $user);
        $query->bindParam(':password', $md5pass);

        $query->execute();

        $row = $query->fetch(PDO::FETCH_OBJ);

        $rowsAffected = $query->rowCount();
        $query->closeCursor();
    
        if ($rowsAffected > 0) {
            return true;
        } else {
            return false;
        }
    }
    
    public function setUser(string $user){
        $sql = "SELECT * FROM users WHERE user_nickname = :user";
        $query = $this->db->prepare($sql);
        $query->bindParam(':user', $user);
        $query->execute();
        $row = $query->fetchAll(PDO::FETCH_CLASS);
        $query->closeCursor();

        foreach ($row as $currentUser) {
            $this->name = $currentUser->user_name;
            $this->username = $currentUser->user_nickname;
        }
    }

    public function getName(){
        return $this->name;
    }

}
?>