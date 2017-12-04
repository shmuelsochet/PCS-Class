<?php
    $cs = "mysql:host=localhost;dbname=javascript";
    $user = "test";
    $password = 'test';
    try {
        $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
        $db = new PDO($cs, $user, $password, $options);
    } catch (PDOException $e) {
        $error = "Something went wrong " . $e->getMessage();
        http_response_code(500);
        echo $error;
    }
?>