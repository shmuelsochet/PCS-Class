<?php

       
        include 'utils/db.php';
        if(!empty($theName) && !empty($thePrice) && !empty($theCategory)){
                try{
                
                        
                        $query = "INSERT INTO books (name,price, category) VALUES ( :theName, :thePrice, :theCategory )";
                        $statement = $db ->prepare($query);
                        $statement -> bindValue('theName', $theName);
                        $statement -> bindValue('thePrice', $thePrice);
                        $statement -> bindValue('theCategory', $theCategory);
                        $statement -> execute();
                        $statement ->closeCursor();
                        
                                

                }catch(PDOException $ex){
                        die("Something went wrong" . $ex ->getMessage());
                }
        }else{
                $errors[] = "You must submit a book, a price and a category";
        }
        
        
    
?>