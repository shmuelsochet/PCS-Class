<?php
    
        
        include '../db.php';
        
        try{
            


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
                
            }elseif(!empty($_GET['book']) && isset($_GET['book'])){
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
    

    include "../top.php"
?>