<?php

// //Log Errors
// ini_set('display_errors', 1);
// ini_set('log_errors', 1);
// ini_set('error_log', dirname(__FILE__) . '/error_log.txt');

// //Requires
// require_once 'controller/routes_controller.php';
// $index = new Routes_Controller();
// $index->index();

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET,POST");
// header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

function connection()
{
    require_once 'config.php';
    try {
        $connection = new PDO(
            'mysql:host=' . DB_HOST .
                ';dbname=' . DB_NAME .
                ';charset=' . DB_CHARSET,
            DB_USER,
            DB_PASS
        );
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $connection->exec('SET CHARACTER SET ' . DB_CHARSET);
        return $connection;
    } catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage() . '<br>';
        echo 'Line error: ' . $e->getLine() . '<br>';
    }
}

// Consult user by id
if (isset($_GET["consult"])) {

    $sql = "SELECT * FROM users WHERE id= :id";
    $query = connection()->prepare($sql);
    $query->bindParam(':id', $_GET["consult"]);
    $query->execute();
    $row = $query->fetchAll(PDO::FETCH_CLASS);
    $rowsAffected = $query->rowCount();
    $query->closeCursor();

    if ($rowsAffected > 0) {
        echo json_encode($row);
        exit();
    } else {
        echo json_encode(["success" => 0]);
    }
}

// delete user by id
if (isset($_GET["delete"])) {

    $sql = "DELETE FROM users WHERE id = :id";
    $query = connection()->prepare($sql);
    $query->bindParam(':id', $_GET["delete"]);
    $query->execute();
    $rowsAffected = $query->rowCount();
    $query->closeCursor();

    if ($rowsAffected > 0) {
        echo json_encode(["success" => 1]);
        exit();
    } else {
        echo json_encode(["success" => 0]);
    }
}

//Insert user in database with POST method
if (isset($_GET["insert"])) {
    $data = json_decode(file_get_contents("php://input"));

    $user_name = $data->inputName;
    $last_name = $data->inputLastName;
    
    if (!empty($last_name) && !empty($user_name)) {
        $sql = "INSERT INTO users(user_name,last_name) VALUES (:user, :password)";
        $query = connection()->prepare($sql);
        $query->bindParam(':user', $user_name);
        $query->bindParam(':password', $last_name);
        $query->execute();
        $query->closeCursor();
        echo json_encode(["success" => 1]);
    }
    exit();
}

// Update user by id
if(isset($_GET["update"])){

    $data = json_decode(file_get_contents("php://input"));
    $id=(isset($data->id))?$data->id:$_GET["update"];

    $user_name=$data->inputNameUpdate;
    $last_name=$data->inputLastNameUpdate;

    if(!empty($last_name) && !empty($user_name)){
        $sql="UPDATE users SET user_name=:user, last_name=:last_name WHERE id=:id";
        $query=connection()->prepare($sql);
        $query->bindParam(':user',$user_name);
        $query->bindParam(':last_name',$last_name);
        $query->bindParam(':id',$id);
        $query->execute();
        $query->closeCursor();
        echo json_encode(["success"=>1]);
    }
    exit();
}

// get all users
$sql = "SELECT id, concat_ws(' ', user_name, last_name) as user_name FROM users ORDER By id";
$query = connection()->prepare($sql);
$query->execute();
$row = $query->fetchAll(PDO::FETCH_CLASS);
$query->closeCursor();

if (!empty($row)) {
    echo json_encode($row);
} else {
    echo json_encode([["success" => 0]]);
}
