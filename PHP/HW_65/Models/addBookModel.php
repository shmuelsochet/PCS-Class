<?php

       
        include '../db.php';
        if(!empty($theName) && !empty($thePrice)){
                try{
                
                        
                        $query = "INSERT INTO books (name,price) VALUES ( :theName, :thePrice )";
                        $statement = $db ->prepare($query);
                        $statement -> bindValue('theName', $theName);
                        $statement -> bindValue('thePrice', $thePrice);
                        $statement -> execute();
                        $statement ->closeCursor();
                        
                                

                }catch(PDOException $ex){
                        die("Something went wrong" . $ex ->getMessage());
                }
        }else{
                $errors[] = "You must submit a book and a price";
        }
        
        
    
?>