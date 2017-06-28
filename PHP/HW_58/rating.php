<?php
   
    
    $rating ="";
    
    
        if(isset($_POST['name'])) {
            if( empty($_POST['name']) || is_numeric($_POST['name'])) {
                $errors[] = "Name cannot be a number or Empty";
            }
           $name = $_POST['name']; //why set if it's a number?
        } else {
            $errors[] = "Name is a required field";
        }
        if(isset($_POST['email'])) {
             if(! preg_match( '+@+', $_POST['email'])) {
                $errors[] = "Email must have an @ in it.";
                //echo '<script>console.log("hi")</script>';            
            }
            $email = $_POST['email'];
        } else {
            $errors[] = "Email is a required field";
        }
        if(isset($_POST['age'])) {
             if(! is_numeric($_POST['age']) || $_POST['age'] < 1 ||  $_POST['age'] > 120) {
                $errors[] = "Age must be a number greater than 0 and less than 121";
            }
            $age = $_POST['age'];
        } else {
            $errors[] = "Age is a required field";
        }
         if(isset($_POST['rating'])) {
             if(! is_numeric($_POST['rating']) || $_POST['rating'] < 1 ||  $_POST['rating'] > 10) {
                $errors[] = "Rating must be a number greater than 0 and less than 11";
            }
            $rating = $_POST['rating'];
        } else {
            $errors[] = "Rating is a required field";
        }
        if(empty($errors)) {
            $rating= $_POST['rating'];
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../../../bootstrap-3.3.7/css/bootstrap.min.css">
     <style>
        .well:first-of-type {
            background-color: transparent;
            border: none;
            box-shadow: none;
        }
    </style>
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="jumbotron text-center">
            <h1>Rate Us</h1>
            <h2>Rating</h2>
        </div>
        <?php if (isset($errors)) : ?>
            <div class="well text-danger">
                <ul>
                    <?php foreach($errors as $error) : ?>
                        <li><?= $error ?></li>
                    <?php endforeach ?>
                </ul>
            </div>
        <?php endif ?>
    
        <div>
            <div class="row">
                <div class="well col-sm-2 text-right">Name</div>
                <div class="col-sm-8  well"><?= $name ?></div>         
            </div>
            <div class="row">
                <div class="well col-sm-2 text-right">Email</div>
                <div class="col-sm-8 well"><?= $email ?></div>
                
            </div>
            <div class="row">
                <div class="well col-sm-2 text-right">Age</div>
                <div class="col-sm-8 well"><?= $age ?></div>
                
            </div>
            <div class="row">
                <div class="well col-sm-2 text-right">Rating</div>
                <div class="col-sm-8 well"><?= $rating ?></div>            
            </div>    
        </div>

    </div> 
</body>
</html>
    