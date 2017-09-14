<?php
    include 'utils/database.php';
    require 'house.php';

    if (! empty($houseId)) {
        try {
            $myDatabase = Database::getInstance();
            
            if($editPage === "true"){
                if(!empty($price) && !empty($address) && !empty($city) && !empty($state) && !empty($zip) && !empty($picture) && isset($notes)){
                   
                            
                    $query =  "UPDATE houses SET price = :priceUpdate, address = :address, city = :city, state = :state, zip = :zipUpdate, picture = :picture, notes = :notes WHERE id = :idUpdate";
                    
                    $statement = $myDatabase->getDb()->prepare($query);
                    $statement->bindValue('price', $price);
                    $statement->bindValue('address', $address);
                    $statement->bindValue('city', $city);
                    $statement->bindValue('state', $state);
                    $statement->bindValue('zip', $zip);
                    $statement->bindValue('picture', $picture);
                    $statement->bindValue('notes', $notes);
                    $statement->bindValue('houseId', $houseId);
                    $statement->execute();
                    $statement->closeCursor();               
        
                }
              else{
                    $errors[] = "You must submit a valid price, address, city, state, zip, and picture.";
            }
            }
 }
                       
            
            $query = "SELECT * FROM houses WHERE id = :id";
            $statement = $myDatabase->getDb()->prepare($query);
            $statement->bindValue('id', $houseId);
            $statement->execute();
            $statement->closeCursor();
            $house = $statement->fetch(PDO::FETCH_ASSOC);
            $thisHouse = new House($house);
            if (empty($house)) {
                $error = "Unable to find house $houseId";
            }
        } catch(PDOException $e) {
            $error = "Something went wrong " . $e->getMessage();
        }
    } else {
        $error = "No house id set to find";
    }
?>