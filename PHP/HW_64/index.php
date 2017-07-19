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
                
            }else(!empty($_GET['book']) && isset($_GET['book'])){
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
    

    include "top.php"
?>

            <h1>Book Store</h1>
            <ul class="list-unstyled list-inline">
                <li><h2><a class="btn btn-success" href="addBook.php">Add a Book</a></h2></li>
                <li><h2><a class="btn btn-danger" href="deleteBook.php">Delete a Book</a></h2></li>
            </ul>
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
                    <div class="row">
                        <div class="col-sm-offset-4 col-sm-8">
                           
                            <button  type="submit" class="btn btn-primary">Price</button>
                        
                        </div>                                     
                    </div>
                </div>
            </form>
    
        </div>
<?php include "bottom.php" ?>