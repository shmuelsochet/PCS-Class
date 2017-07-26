<?php

    function getBookNames(){
        $cs = "mysql:host=localhost;dbname=php";
        $user = "test";
        $password = "test";

        try{
            $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
            $db = new PDO($cs, $user, $password, $options);
            $query = "SELECT name FROM books";
            $results = $db ->query($query);
            $bookNames = $results ->fetchAll();
            $results ->closeCursor();
            $allBookNames = "";
            foreach($bookNames as $bookName ){
                $allBookNames .= "<option>{$bookName['name']}</option>";
            }
            return $allBookNames;

        }catch(PDOException $ex){
                die("Something went wrong" . $ex ->getMessage());
            }

        }


    
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../../../bootstrap-3.3.7/css/bootstrap.min.css">
    <title>Select Book</title>
</head>
<body>
    <div class="container">
        <div class="jumbotron text-center">
            <h1>Book Store</h1>
        </div>

        <div class="container">
        <?php if (!empty($errors)) : ?>
        <div class="alert alert-danger">
            <ul>
                <?php foreach($errors as $error) echo "<li>$error</li>" ?>
            </ul>
            <?php endif ?>
        </div>
        <form class="form-horizontal" action="price.php" method="get" >
            <div class="form-group">
                <label for="book" class="col-sm-offset-2 col-sm-2 control-label">Book</label>
                <div class="col-sm-4">
                    <select class="form-control " name="book" >
                        
                            <?= getBookNames(); ?>
                        
                    </select>
                </div>
            </div>
                    
            <div class="form-group">
                <div class="col-sm-offset-4 col-sm-8">
                <button type="submit" class="btn btn-primary">Price</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>