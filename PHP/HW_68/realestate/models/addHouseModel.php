<?php

    if(empty($picture)){
        $picture = "";
    }   
    
    include 'utils/database.php';
    if(!empty($price) && !empty($address) && !empty($city) && !empty($state) && !empty($zip) && !empty($picture) && isset($notes)){
            try{
                    
                    $query = "INSERT INTO houses (price, address, city, state, zip, picture, notes) VALUES ( :price, :address, :city, :state, :zip, :picture, :notes )";
                    
                    $myDatabase = Database::getInstance();

                    $statement = $myDatabase->getDb()->prepare($query);
                    $statement->bindValue('price', $price);
                    $statement->bindValue('address', $address);
                    $statement->bindValue('city', $city);
                    $statement->bindValue('state', $state);
                    $statement->bindValue('zip', $zip);
                    $statement->bindValue('picture', $picture);
                    $statement->bindValue('notes', $notes);
                    $statement->execute();
                    $statement->closeCursor();               

            }catch(PDOException $ex){
                    $error = "Something went wrong" . $ex ->getMessage();
            }
    }else{
            $errors[] = "You must submit a valid price, address, city, state, zip, and picture.";
    }
        
        
    
?>