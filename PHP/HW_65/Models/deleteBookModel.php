<?php

    
        
        include '../db.php';
        try{
            
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
                
           
                

            }elseif(!empty($_GET['book']) && isset($_GET['book'])){
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
    

    include "../top.php"
?>