<?php
require 'routes/get_properties.php';
class GetModel extends GetProperties
{
    private $db;
    //TODO: Ponerlo en el controlador
    private $json = array(
        'status' => '400',
        'result' => 'Bad Request'
    );

    //We use the constructor to connect to the database
    public function __construct()
    {
        require_once 'connect.php';

        $this->db = Connect::connection();
    }

    private function appendOrder()
    {
        //Si nos vienen con orden lo añadimos a la sentencia SQL
        if (isset($this->orderByColumn) && isset($this->orderType)) {
            if (!$this->orderByColumn && !$this->orderType) {
                echo json_encode($this->json, http_response_code($this->json["status"]));
                return false;
            }
            return $this->setOrder($this->orderByColumn, $this->orderType);
        }
    }

    private function setOrder($orderByColumn, $orderType)
    {
        $sql = " ORDER BY ";
        for ($i = 0; $i < count($orderByColumn); $i++) {
            $sql .= $orderByColumn[$i] . " " . $orderType[$i] . ", ";
        }
        $sql = substr($sql, 0, -2);
        return $sql;
    }

    // We use the method getAll() to get all the data from the table
    public function getAll()
    {
        $sql = "SELECT {$this->columns} FROM {$this->table}";

        //Si nos vienen con orden lo añadimos a la sentencia SQL
        $order = $this->appendOrder();
        if (!$order) {
            return;
        };

        $sql .= $order;
        $query = $this->db->prepare($sql);
        $query->execute();
        $row = $query->fetchAll(PDO::FETCH_CLASS);
        $query->closeCursor();
        return $row;
    }

    // We use the method getCustom() to get the data from the table, according to the parameters we pass
    public function getCustom()
    {
        if (count($this->filterByColumn) == count($this->filterEqualTo)) {
            $sql = "SELECT $this->columns FROM $this->table WHERE ";
            for ($i = 0; $i < count($this->filterByColumn); $i++) {
                $sql .= $this->filterByColumn[$i] . " = :" . $this->filterByColumn[$i] . "";
                if ($i < count($this->filterByColumn) - 1) {
                    //TODO: Convertir el AND en variable AND o OR
                    $sql .= " AND ";
                }
            }
            //Si nos vienen con orden lo añadimos a la sentencia SQL
            $order = $this->appendOrder();
            if (!$order) {
                return;
            };

            $sql .= $order;

            $query = $this->db->prepare($sql);
            foreach ($this->filterByColumn as $key => $value) {
                $query->bindParam(":$value", $this->filterEqualTo[$key], PDO::PARAM_STR);
            }
            
            $query->execute();
            $row = $query->fetchAll(PDO::FETCH_CLASS);
            $query->closeCursor();
            return $row;
        } else {
            echo json_encode(GetModel::$json, http_response_code(GetModel::$json["status"]));
            return;
        }
    }


    //-----------------------------------------------------------------------------------------

    public function insert($user, $password)
    {
        $sql = "INSERT INTO users (user, password) VALUES (:user, :password)";
        $query = $this->db->prepare($sql);
        $query->bindParam(':user', $user);
        $query->bindParam(':password', $password);
        $query->execute();
        $query->closeCursor();
    }

    public function delete($id)
    {
        $sql = "DELETE FROM users WHERE id = :id";
        $query = $this->db->prepare($sql);
        $query->bindParam(':id', $id);
        $query->execute();
        $query->closeCursor();
    }

    public function select($id)
    {
        $sql = "SELECT * FROM users WHERE id = :id";
        $query = $this->db->prepare($sql);
        $query->bindParam(':id', $id);
        $query->execute();
        $row = $query->fetch(PDO::FETCH_CLASS);
        $query->closeCursor();
        return $row;
    }

    public function update($user, $password, $id)
    {
        $sql = "UPDATE users SET user = :user, password = :password WHERE id = :id";
        $query = $this->db->prepare($sql);
        $query->bindParam(':user', $user);
        $query->bindParam(':password', $password);
        $query->bindParam(':id', $id);
        $query->execute();
        $query->closeCursor();
    }
}
