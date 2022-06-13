<?php
require_once 'Model/get_model.php';
//We make a call to the users_model class, we use one of its functions according to the situation and call the view file we want to display
class GetController extends GetProperties
{
    private $tableValues;
    private $json = array(
        'status' => '400',
        'result' => 'Bad Request'
    );
    
    private function setGeneralPropertiesModel()
    {

        $this->tableValues = new GetModel();
        $this->tableValues->table = $this->table;
        $this->tableValues->columns = $this->columns;
        $this->setOrderColumnPropertiesModel();
    }

    private function testOrderColumnPropertiesModel()
    {
        if (isset($this->orderByColumn) && isset($this->orderType)) {
            //Revisamos el numero de campos y del tipo de orden sean iguales
            $this->orderByColumn = explode(",", $this->orderByColumn);
            $this->orderType = explode("_", $this->orderType);
            if (count($this->orderByColumn) != count($this->orderType)) {
                return false;
            }

            //Comprobamos que el tipo de orden esta bien escrito como ASC o DESC
            foreach ($this->orderType as $value) {
                $value = strtoupper($value);
                if ($value != "ASC" && $value != "DESC") {
                    $this->tableValues->orderByColumn = false;
                    $this->tableValues->orderType = false;
                    return false;
                }
            }

            return true;
        }
        return false;
    }

    private function setOrderColumnPropertiesModel()
    {
        if($this->testOrderColumnPropertiesModel()){
            $this->tableValues->orderByColumn = $this->orderByColumn;
            $this->tableValues->orderType = $this->orderType;
        }else{
            $this->tableValues->orderByColumn = false;
            $this->tableValues->orderType = false;
        }
    }

    public function getAll()
    {
        $this->setGeneralPropertiesModel();
        $arrTable = $this->tableValues->getAll();
        return $this->sendResponse($arrTable);
    }

    //We use getCustomData to get the data from a selected table, according to the parameters we pass
    public function getCustomData()
    {
        $this->setGeneralPropertiesModel();
        $this->tableValues->filterByColumn = explode(",", $this->filterByColumn);
        $this->tableValues->filterEqualTo = explode("_", $this->filterEqualTo);
        $this->tableValues->limitStartAt = $this->limitStartAt;
        $this->tableValues->limitNumValues = $this->limitNumValues;
        $arrTable = $this->tableValues->getCustom();
        return $this->sendResponse($arrTable);
    }

    //We use this function to send the response to the client
    public function sendResponse($response)
    {
        if (!empty($response)) {
            $json = array(
                'status' => '200',
                'result' => 'OK',
                'total' => count($response),
                'data' => $response
            );
        } else {
            $json = array(
                'status' => '404',
                'result' => 'No data found'
            );
        }

        echo json_encode($json, http_response_code($json["status"]));
    }

    static function insert()
    {
        require_once 'View/users_view.php';
        $insertarUser = new users_model();
        $insertarUser->insert($_POST['user'], $_POST['password']);
        //We call the view file again, so that the table is updated
        header('Location: index.php');
    }

    static function delete()
    {
        $deleteUser = new users_model();
        $deleteUser->delete($_GET['id']);
        header('Location: index.php');
    }

    static function edit()
    {
        $user = new users_model();
        $id = $_GET['id'];
        $arrTable = $user->select($id);
        require_once 'View/edit.php';
    }

    static function update()
    {
        $updateUser = new users_model();
        $updateUser->update($_POST['user'], $_POST['password'], $_GET['id']);
        header('Location: index.php');
    }
}
