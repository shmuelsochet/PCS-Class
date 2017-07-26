<?php

        //add link to go back to choose a book page.
        //add php validation. 
        // - if $_SERVER post then run else first time so don't validate
        //add msg for number of rows inserted. rowCount property on statment. 
        //add top and bottom
        
        //form to submit and user should not see what is happening during that submit
        //input type= "hidden" name="hiddenData" value="You can't see me"> or css display none(include id in hidden field)

        

        $cs = "mysql:host=localhost;dbname=php";
        $user = "test";
        $password = "test";

        try{
            $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
            $db = new PDO($cs, $user, $password, $options);


            if(!empty($_POST['book']) && !empty($_POST['price'])){
                $theName =  $_POST['book'];
                $thePrice = $_POST['price'];
                $query = "INSERT INTO books (name,price) VALUES ( :theName, :thePrice )";
                //$query = "SELECT name, price FROM books WHERE name = :theName AND price =  :thePrice )";
                $statement = $db ->prepare($query);
                $statement -> bindValue('theName', $theName);
                $statement -> bindValue('thePrice', $thePrice);
                $statement -> execute();
                $statement ->closeCursor();
                
               
                
               
                $book = $_POST['book'];
                $price = $_POST['price'];

                  

            }elseif(isset($_POST['book']) && isset($_POST['price'])){
                $errors[] = "You must submit a book and a price";
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
    
    <title>Add a Book</title>
</head>
<body>
    <div class="container">
        <div class="jumbotron text-center">
            <h1>Add a Book</h1>

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

            <form class="form-horizontal" action="" method="post" >
                <div class="form-group">
                    <div class="row">
                        <label for="book" class="col-sm-offset-2 col-sm-2 control-label">Book</label>  
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="book" id="book" placeholder="Book">
                        </div>                      
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label for="book" class="col-sm-offset-2 col-sm-2 control-label">Price</label>
                        <div class="col-sm-3">
                            <div class="input-group">
                            
                                <div class="input-group-addon">$</div>
                                <input type="number" name="price" class=" col-sm-3 form-control" id="exampleInputAmount" placeholder="Amount">
                            </div>
                        </div>
                    </div>
                </div>

            <?php if(!empty($_POST['book']) && !empty($_POST['price']) ) : ?>

                <div class="form-group">
                    <div class="row">
            
                        <label class="col-sm-offset-2 col-sm-2 control-label">You Submitted</label>
                        <div class="col-sm-3 well text-center"><?= "Name: " . $book . "</br>Price: $" . $price  ?></div>
                    </div>
                </div>

            <?php endif ?>
    
                </div>
                        
                <div class="form-group">
                    <div class="col-sm-offset-4 col-sm-8">
                        <button type="submit" class="btn btn-primary">Add Book</button>
                    </div>
                </div>
            </form>
        </div>
    
</body>
</html>