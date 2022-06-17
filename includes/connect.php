<?php

class Connect
{

    public static function connection()
    {
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
}

?>