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

            //print_r($bookNames);
            

        }catch(PDOException $ex){
                die("Something went wrong" . $ex ->getMessage());
        }

        //not working says book not valid when valid, because I didn't use where id = in statment
        // $selectedBook = $results -> fetch();
        // if(empty($selectedBook)){
        //      $errors[] = "{$_GET['book']} is not a valid or available book";
        // }
        $isInArray = false;
        foreach($bookNames as $myBook){
            // echo "I am printing myBook";
            // print_r($myBook);
            if( in_array($_GET['book'], $myBook)){    
                
                $isInArray = true;
            }
               
        }
        if(! $isInArray){
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

        
        if(!empty($_GET['book'])){
        
            try{
                $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
                $db = new PDO($cs, $user, $password, $options);
                // $query = "SELECT price FROM books WHERE name = '{$_GET['book']}'";
                // $results = $db ->query($query);

                //to prevent sql injection use a prepared statment
                $query = "SELECT price FROM books WHERE name = :theId";
                //$query = "SELECT price FROM books WHERE name = :theId OR :anotherId";
                //$query = "SELECT price FROM books WHERE name = ? OR ?";
                $statement = $db -> prepare($query);
                //for statment with id
                $statement -> bindValue('theId', $_GET['book']);
               // $statement -> bindValue('anotherId', 53);

                //for statement with "?"
                //$statement -> bindValue(1, $_GET['book']);
                //$statement -> bindValue(2,53);
                $statement -> execute();
                
                //$bookPrices = $results ->fetchAll();
                $bookPrices = $statement ->fetchAll();
                
                //$results ->closeCursor();
                $statement ->closeCursor();
                
                $allBookPrices = "";
                foreach($bookPrices as $bookPrice ){
                    $allBookPrices .= "{$bookPrice['price']}";
                }
                return $allBookPrices;

            }catch(PDOException $ex){
                    die("Something went wrong" . $ex ->getMessage());
                }

            }else{
                $errors[] = "You must choose a book";
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