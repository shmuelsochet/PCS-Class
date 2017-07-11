<?php

    $book = "";
    if(!empty($_GET['book'])){
       
            $cs = "mysql:host=localhost;dbname=books";
            $user = "test";
            $password = "test";

            try{
                $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
                $db = new PDO($cs, $user, $password, $options);
                $query = "SELECT name FROM books";
                $results = $db ->query($query);
                $bookNames = $results ->fetchAll();
                $results ->closeCursor();
                

            }catch(PDOException $ex){
                    die("Something went wrong" . $ex ->getMessage());
                }
        if(! in_array("{$_GET['book']}", $bookNames)){
            $errors[] = "{$_GET['book']} is not a valid or available book";
        }
        $book = $_GET['book'];

    }else{
        $errors[] = "You must choose a book";
    }
    


    function getBookPrice(){
        global $book;
        $cs = "mysql:host=localhost;dbname=books";
        $user = "test";
        $password = "test";

        

        try{
            $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
            $db = new PDO($cs, $user, $password, $options);
            $query = "SELECT price FROM books WHERE name = '{$_GET['book']}'";
            $results = $db ->query($query);
            $bookPrices = $results ->fetchAll();
            $results ->closeCursor();
            $allBookPrices = "";
            foreach($bookPrices as $bookPrice ){
                $allBookPrices .= "{$bookPrice['price']}";
            }
            return $allBookPrices;

        }catch(PDOException $ex){
                die("Something went wrong" . $ex ->getMessage());
            }

        }
  
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Price of Book</title>
    <link href="/bootstrap-3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .well:first-of-type {
            background-color: transparent;
            border: none;
            box-shadow: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="jumbotron text-center">
            <h1>Price</h1>
            
        </div>

        <div class="container">
            <?php if (!empty($errors)) : ?>
            <div class="alert alert-danger">
                <ul>
                    <?php foreach($errors as $error) echo "<li>$error</li>" ?>
                </ul>
                <?php endif ?>
            </div>
        </div>
       
        <div class="container">
            <div>
                <div class="row">
                <div class="well col-sm-2 col-sm-offset-2 text-right">Book</div>
                <div class="col-sm-4 well text-center"><?= $book ?></div>
            </div>
            <div class="row">
               
                <div class="well col-sm-2 col-sm-offset-2 text-right">Price</div>
                <div class="col-sm-4 well text-center">$<?= getBookPrice() ?></div>
            </div>
        </div>

    </div>
    
</body>

</html>