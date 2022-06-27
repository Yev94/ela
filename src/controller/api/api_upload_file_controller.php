<?php

class ApiUploadFileController
{
    private $json = array(
        'status' => '400',
        'result' => 'Bad Request'
    );

    public function executePost()
    {
        require './includes/upload_image.php';
        if (isset($_FILES['file'])) {
            $image = $_FILES['file'];
            $uploadImage = new UploadImage($image);
            $imageName = $uploadImage->upload();
            if (!empty($imageName)) {
                $this->json['status'] = '200';
                $this->json['result'] = $imageName;
                $this->sendResponse($this->json);
            } else {
                $this->sendResponse($imageName);
            }
        } else {
            $this->json['result'] = null;
            $this->sendResponse($this->json);
        }
    }

    public function sendResponse($response)
    {
        if (!empty($response)) {
            echo json_encode($response);
        } else {
            $this->json = array(
                'status' => '500',
                'result' => 'Internal Server Error'
            );
            $this->error();
        }
    }

    private function error()
    {
        echo json_encode($this->json, http_response_code($this->json["status"]));
    }
}
