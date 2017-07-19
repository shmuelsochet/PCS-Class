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

            if(!empty($_POST['book'])){
                $theName = "{$_POST['book']}";
                $query = "DELETE FROM books WHERE name = :theName";;
                $statement = $db ->prepare($query);
                $statement -> bindValue('theName', $theName);
                $statement -> execute();
                $statement ->closeCursor();

                $isInArray = false;
                foreach($bookNames as $myBook){
            
                    if( in_array($_POST['book'], $myBook)){    
                        
                        $isInArray = true;
                    }
               
                }
                if(! $isInArray){
                    $errors[] = "{$_POST['book']} is not a valid or available book";
                }
                $book = $_POST['book'];

                $query = "";
                
           
                

            }else{
                $errors[] = "You must choose a book";
            }

            $allBookNames = "";
            foreach($bookNames as $bookName ){
                    $selected = "";
                    if(!empty($_POST['book']) && $bookName['name'] === $_POST['book'] ){
                        $selected = "selected";
                    }
                    $allBookNames .= "<option $selected >{$bookName['name']}</option>";
                }
            
        }catch(PDOException $ex){
                die("Something went wrong" . $ex ->getMessage());
            }
    

    include "top.php"
?>

            <h1>Delete a Book</h1>
            <ul class="list-unstyled list-inline">
                <li><h2><a class="btn btn-danger" href="addBook.php">Delete a Book</a></h2></li>
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

            <form class="form-horizontal" action="" method="post" >
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
                        
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-offset-4 col-sm-8">
                           
                           
                           <button type="submit" class="btn btn-danger">Delete</button> 
                        
                        </div>    
                        
                        
                            
                        
                    </div>
                </div>
            </form>
    
        </div>
<?php include "bottom.php" ?>