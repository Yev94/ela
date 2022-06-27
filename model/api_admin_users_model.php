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
        require './includes/upload_image.php';

        $this->db = Connect::connection();
    }

    public function reed()
    {
        // get all users
        $sql = "SELECT id, picture, concat_ws(' ', user_name, last_name) as user_name, identity_card FROM users ORDER By id";
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
        // $img = new UploadImage();
        $user_name = $data->name ?? '';
        $last_name = $data->lastName ?? '';
        $identity_card = $data->identityCard ?? '';
        $img = $data->img;
        $user_nickname = $data->userNickname ?? '';
        $password = md5($data->userPassword ?? '');


        if (!empty($password)) {
            $password = md5($password);
            $sql = "INSERT INTO users(user_name,last_name, identity_card, picture, user_nickname, password) 
            VALUES (:user, :last_name, :identity_card, :picture, :user_nickname, :password)";
            $query = $this->db->prepare($sql);
            $query->bindParam(':password', $password);
        } else {
            $sql = "INSERT INTO users(user_name,last_name, identity_card, picture, user_nickname) 
            VALUES (:user, :last_name, :identity_card, :picture, :user_nickname)";
            $query = $this->db->prepare($sql);
        }

        $query->bindParam(':user', $user_name);
        $query->bindParam(':last_name', $last_name);
        $query->bindParam(':identity_card', $identity_card);
        $query->bindParam(':picture', $img);
        $query->bindParam(':user_nickname', $user_nickname);
        $query->execute();
        $query->closeCursor();
        return $this->querySuccess($query);
    }

    public function consult($id)
    {
        // Consult user by id
        $sql = "SELECT id, user_name, last_name, identity_card, user_nickname, picture FROM users WHERE id= :id";
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
        $data = json_decode(file_get_contents("php://input"));

        $user_name = $data->inputNameUpdate ?? '';
        $last_name = $data->inputLastNameUpdate ?? '';
        $identity_card = $data->inputIdentityCardUpdate ?? '';
        $img = $data->inputImgUpdate;
        $user_nickname = $data->inputNicknameUpdate ?? '';
        //if password is empty, don't update it
        $password = $data->inputPasswordUpdate ?? '';

        if (!empty($password)) {
            $password = md5($password);
            if (!empty($img)) {
                $sql = "UPDATE users 
                SET user_name=:user, last_name=:last_name, identity_card =:identity_card, picture=:picture, user_nickname=:user_nickname, password=:password
                WHERE id=:id";
                $query = $this->db->prepare($sql);
                $query->bindParam(':picture', $img);
            } else {
                $sql = "UPDATE users 
                SET user_name=:user, last_name=:last_name, identity_card =:identity_card, user_nickname=:user_nickname, password=:password
                WHERE id=:id";
                $query = $this->db->prepare($sql);
            }
            $query->bindParam(':password', $password);
        } else {
            if (!empty($img)) {
                $sql = "UPDATE users
                SET user_name=:user, last_name=:last_name, identity_card =:identity_card, picture=:picture, user_nickname=:user_nickname
                WHERE id=:id";
                $query = $this->db->prepare($sql);
                $query->bindParam(':picture', $img);
            } else {
                $sql = "UPDATE users
                SET user_name=:user, last_name=:last_name, identity_card =:identity_card, user_nickname=:user_nickname
                WHERE id=:id";
                $query = $this->db->prepare($sql);
            }
        }

        $query->bindParam(':user', $user_name);
        $query->bindParam(':last_name', $last_name);
        $query->bindParam(':identity_card', $identity_card);
        $query->bindParam(':user_nickname', $user_nickname);
        $query->bindParam(':id', $id);
        $query->execute();
        $query->closeCursor();
        return $this->querySuccess($query);
        // }
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

    private function querySuccess($query)
    {
        if ($query->rowCount() > 0) return true;
        else return false;
    }
}
