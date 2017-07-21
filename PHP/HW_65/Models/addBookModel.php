<?php

       
        include '../db.php';
        
        try{
            
            
                $query = "INSERT INTO books (name,price) VALUES ( :theName, :thePrice )";
                //$query = "SELECT name, price FROM books WHERE name = :theName AND price =  :thePrice )";
                $statement = $db ->prepare($query);
                $statement -> bindValue('theName', $theName);
                $statement -> bindValue('thePrice', $thePrice);
                $statement -> execute();
                $statement ->closeCursor();        

        }catch(PDOException $ex){
                die("Something went wrong" . $ex ->getMessage());
            }
    
    
?>