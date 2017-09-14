<?php

    include "database.php";
    try {
        if($_SERVER['REQUEST_METHOD']==="POST"){
         
            $hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $query = "INSERT INTO users(id, user, password) VALUES (null,'{$_POST['user']}','$hash')";
            $myDatabase = Database::getInstance();
            $statement = $myDatabase->getDb()->prepare($query);    
            $statement->execute();
            $statement->closecursor();
        }
    }catch(PDOException $e) {
        die("Something went wrong " . $e->getMessage());
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        button a {
            color:inherit;
            text-decoration:inherit;
        }
    </style>
    <title>Document</title>
</head>
<body>
    <form action="index.php" method="post">
        <label for="user">User Name:</label>
        <input type="text" id="user" name="user" placeholder="User Name"/>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" placeholder="Password"/>
        <input type="submit" value="Register"/>
    </form>
    <button><a type="button" href="login.php" role="button">Log in</a></button>
</body>
</html>