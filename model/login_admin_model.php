<?php

//Create class do LoginAdmin model
class LoginAdminModel
{
    private $db;
    private $userName;
    private $userNickname;
    private $roleId;
    private $userId;
    private $userRoleId;

    private $sql;

    public function __construct()
    {
        require_once './includes/connect.php';

        $this->db = Connect::connection();
    }

    //Create function to login admin
    public function loginAdmin(string $user, string $password, string $rol)
    {
        
        $md5pass = md5($password);
        $this->sql = "SELECT users.id as id_user, users.user_name, users.user_nickname, user_rol.role_id, user_rol.id as user_role_id FROM users INNER JOIN user_rol ON users.id = user_rol.user_id WHERE users.user_nickname = :user AND users.password = :password AND user_rol.role_id = :role;";
        //From includes/connect.php
        $query = $this->db->prepare($this->sql);

        $query->bindParam(':user', $user);
        $query->bindParam(':password', $md5pass);
        $query->bindParam(':role', $rol);

        $query->execute();

        $row = $query->fetchAll(PDO::FETCH_CLASS);

        $rowsAffected = $query->rowCount();
        $query->closeCursor();

        if ($rowsAffected > 0) {
            $this->setUser($row);
            
            return true;
        } else {
            return false;
        }
    }
    
    private function setUser($row){
        foreach ($row as $currentUser) {
            $this->userId = $currentUser->id_user;
            $this->userName = $currentUser->user_name;
            $this->userNickname = $currentUser->user_nickname;
            $this->roleId = $currentUser->role_id;
            $this->userRoleId = $currentUser->user_role_id;
        }
    }

    public function getId(){
        return $this->userId;
    }

    public function getNickname(){
        return $this->userNickname;
    }

    public function getName(){
        return $this->userName;
    }

    public function getRoleId(){
        return $this->roleId;
    }

    public function getUserRoleId(){
        return $this->userRoleId;
    }

}
?>