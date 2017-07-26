<?php
    
        
    include 'utils/db.php';

    try{
        

        
        $query = "SELECT id, name FROM books";
        if(!empty($category)){
            $query .= " WHERE category = :category ";
        }
        
        $statement = $db ->prepare($query);

        if(! empty($category)){
            $statement -> bindValue('category', $category);
        }
        
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

    include "views/top.php";
     
?>