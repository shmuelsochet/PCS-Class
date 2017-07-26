<?php

     $cs = "mysql:host=localhost;dbname=php";
        $user = "test";
        $password = "test";

        try{
            $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
            $db = new PDO($cs, $user, $password, $options);
        }catch (PDOException $ex) {
        $error = "Something went wrong " . $ex->getMessage();
    }

?>