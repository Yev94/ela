<?php

//Create class do LoginAdmin model
class LoginAdminModel
{
    private $db;
    private $userName;
    private $userNickname;

    public function __construct()
    {
        require_once './includes/connect.php';

        $this->db = Connect::connection();
    }

    //Create function to login admin
    public function loginAdmin(string $user, string $password, string $rol)
    {
        $md5pass = md5($password);
        $sql = " SELECT * FROM users INNER JOIN user_rol ON users.id = user_rol.user_id WHERE users.user_nickname = :user AND users.password = :password AND user_rol.role_id = :rol;";
        //From includes/connect.php
        $query = $this->db->prepare($sql);

        $query->bindParam(':user', $user);
        $query->bindParam(':password', $md5pass);
        $query->bindParam(':rol', $rol);

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
        //From includes/connect.php
        $query = $this->db->prepare($sql);
        $query->bindParam(':user', $user);
        $query->execute();
        $row = $query->fetchAll(PDO::FETCH_CLASS);
        $query->closeCursor();

        foreach ($row as $currentUser) {
            $this->userName = $currentUser->user_name;
            $this->userNickname = $currentUser->user_nickname;
        }
    }

    public function getNickname(){
        return $this->userNickname;
    }

    public function getName(){
        return $this->userName;
    }

}
?>