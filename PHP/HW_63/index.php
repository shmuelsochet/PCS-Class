<?php

    
        $cs = "mysql:host=localhost;dbname=php";
        $user = "test";
        $password = "test";

        try{
            $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
            $db = new PDO($cs, $user, $password, $options);


            $query = "SELECT name FROM books";
            $statement = $db ->prepare($query);
            $statement -> execute();
            $bookNames = $statement ->fetchAll();
            $statement ->closeCursor();

            if(!empty($_GET['book'])){
                $theName = "{$_GET['book']}";
                $query = "SELECT price FROM books WHERE name = :theName ";
                $statement = $db ->prepare($query);
                $statement -> bindValue('theName', $theName);
                $statement -> execute();
                $bookPrices = $statement ->fetchAll();
                $statement ->closeCursor();
                $allBookPrices = "";
                foreach($bookPrices as $bookPrice ){
                    $allBookPrices .= "{$bookPrice['price']}";
                }


                $isInArray = false;
                foreach($bookNames as $myBook){
            
                    if( in_array($_GET['book'], $myBook)){    
                        
                        $isInArray = true;
                    }
               
                }
                if(! $isInArray){
                    $errors[] = "{$_GET['book']} is not a valid or available book";
                }
                $book = $_GET['book'];

                $query = "";
                
           
                

            }elseif(isset($_GET['book'])){
                $errors[] = "You must choose a book";
            }

            $allBookNames = "";
            foreach($bookNames as $bookName ){
                    $selected = "";
                    if(!empty($_GET['book']) && $bookName['name'] === $_GET['book'] ){
                        $selected = "selected";
                    }
                    $allBookNames .= "<option $selected >{$bookName['name']}</option>";
                }

            
            

        }catch(PDOException $ex){
                die("Something went wrong" . $ex ->getMessage());
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
        /* .well:first-of-type {
            background-color: transparent;
            border: none;
            box-shadow: none;
        } */
    </style>
    <title>Select Book</title>
</head>
<body>
    <div class="container">
        <div class="jumbotron text-center">
            <h1>Book Store</h1>
            <h2><a class="btn btn-success" href="addBook.php">Add a Book</a></h2>
        </div>

    </div>

        <div class="container">
            <?php if (!empty($errors)) : ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php foreach($errors as $error) echo "<li>$error</li>" ?>
                    </ul>
                </div>
            <?php endif ?>
                
        </div>

        <div class="container">

            <form class="form-horizontal" action="" method="get" >
                <div class="form-group">
                    <div class="row">
                        <label for="book" class="col-sm-offset-2 col-sm-2 control-label">Book</label>
                        <div class="col-sm-3">
                            <select class="form-control " name="book" >
                                
                                    <?= $allBookNames ?>
                                
                            </select>
                        </div>
                    </div>
                </div>

            <?php if(!empty($_GET['book'])) : ?>

                <div class="form-group">
                    <div class="row">
            
                        <label for="book" class="col-sm-offset-2 col-sm-2 control-label">Price</label>
                        <div class="col-sm-3 well text-center">$<?= $allBookPrices ?></div>
                    </div>
                </div>

            <?php endif ?>
    
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