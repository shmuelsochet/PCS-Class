<?php
    
        
        include '../db.php';

        try{
            


            $query = "SELECT id, name FROM books";
            $statement = $db ->prepare($query);
            $statement -> execute();
            $bookNames = $statement ->fetchAll();
            $statement ->closeCursor();
            
            
            if(isset($theId)) {
                
                    $query = "SELECT price FROM books WHERE id = :theId ";
                    $statement = $db ->prepare($query);
                    $statement -> bindValue('theId', $theId);
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
 
                }
            
            $allBookNames = "";
            foreach($bookNames as $bookName ){
                $selected = "";
                if(!empty($_GET['book']) && $bookName['id'] === $_GET['book'] ){
                    $selected = "selected";
                }
                $allBookNames .= "<option value={$bookName['id']} $selected >{$bookName['name']}</option>";
            }
               
  

        }catch(PDOException $ex){
                die("Something went wrong" . $ex ->getMessage());
            }
    

    include "../top.php"
?>