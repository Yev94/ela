<?php

class Contact
{

    public function execute(array $params = [])
    {
        $name = $params['name'] ?? 'Gest';
        require_once './view/contact.php';
    }
}

?>