<?php

include "database.php";
$isValid=false;
if(!empty($_POST['user']) && !empty($_POST['password'])){
    try {
          
            $query = "SELECT user,password FROM users";
            $myDatabase = Database::getInstance();
            $statement = $myDatabase->getDb()->prepare($query);
            
            $statement->execute();
            $users = $statement->fetchAll(PDO::FETCH_ASSOC);
            $statement->closecursor();
        }
    catch(PDOException $e) {
        die("Something went wrong " . $e->getMessage());
    }
   
    foreach($users as $user){
        //print_r($user);
        echo "<br/>";
        if($user['user'] !== $_POST['user'] || !password_verify($_POST['password'], $user['password'])){

            $isValid=false;
        }else{
            $isValid=true;
            break;
        }
    }  
}
if($isValid===false  ){
        die("Invalid password or User Name!");
    }
session_start();
$_SESSION['loggedIn'] = true;
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
    <h1>Welcome <?=$_POST['user']?> to our Site!</h1>
    <button><a href="index.php">Log Out</a></button>
</body>
</html>