<?php

class UploadImage
{
    private $image;
    private $image_name;
    private $image_type;
    private $image_size;

    public function __construct($image)
    {
        $this->image = $image;
        $this->image_name = $image['name'];
        $this->image_type = $image['type'];
        $this->image_size = $image['size'];
    }
        
    public function upload()
    {
        if ($this->image_size > 0) {
            $this->checkExtension();
            $this->checkSize();
            $this->checkType();
            $this->checkName();
            $this->moveImage();
            return $this->image_name;
        } else {
            return false;
        }
    }

    private function checkExtension()
    {
        $extension = strtolower(pathinfo($this->image_name, PATHINFO_EXTENSION));
        if ($extension != 'jpg' && $extension != 'jpeg' && $extension != 'png') {
            return false;
        }
    }

    private function checkSize()
    {
        if ($this->image_size > 1000000) {
            return false;
        }
    }

    private function checkType()
    {
        if ($this->image_type != 'image/jpeg' && $this->image_type != 'image/png') {
            return false;
        }
    }


    private function checkName(){$this->image_name = uniqid() . '.' . $this->image_name;}

    private function moveImage(){move_uploaded_file($this->image['tmp_name'], './img/users/' . $this->image_name );}

    public function getImageName(){return $this->image_name;}


    public function getImageType(){return $this->image_type;}

    public function getImageSize(){return $this->image_size;}

    public function getImage(){return $this->image;}

    public function getImageTmpName(){return $this->image['tmp_name'];}

    public function getImagePath(){return '../img/' . $this->image_name;}

    public function getImageError(){return $this->image['error'];}

    public function getImageSizeError(){return $this->image['size'];}

    public function getImageTypeError(){return $this->image['type'];}

    public function getImageNameError(){return $this->image['name'];}

    public function getImageTmpNameError(){return $this->image['tmp_name'];}

    public function getImageErrorMsg(){return $this->image['error'];}

    public function getImageSizeErrorMsg(){return $this->image['size'];}

    public function getImageTypeErrorMsg(){return $this->image['type'];}

    public function getImageUrl(){return 'http://localhost/img/' . $this->image_name;}

    public function getImageNameWithoutExtension(){return pathinfo($this->image_name, PATHINFO_FILENAME);}

    public function getImageExtension(){return pathinfo($this->image_name, PATHINFO_EXTENSION);}

    public function getImageSizeInKb(){return $this->image_size / 1024;}

    

}
