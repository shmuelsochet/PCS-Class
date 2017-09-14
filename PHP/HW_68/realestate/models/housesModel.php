<?php
include 'utils/database.php';
require 'house.php';

if (empty($zip)) {
    $zip = '';
}

if (empty($min)) {
    $min = '';
}

if (empty($max)) {
    $max = '';
}

if(empty($offset)){
    $offset = 0;
}

if(empty($limitAmount)){
    $limitAmount = 4;
}


try {
    $myDatabase = Database::getInstance();
    if(!empty($_GET['delete']) ){
        
        $query = "DELETE FROM houses WHERE id = :id";

        $statement = $myDatabase->getDb()->prepare($query);
        $statement->bindValue('id', $_GET['delete']);
        $statement->execute();
        $statement->closeCursor();
    }
    
    $query = "SELECT * FROM houses WHERE (:zip = '' OR zip=:zip) AND (:min = '' OR price >= :min) AND (:max = '' OR price <= :max) 
    LIMIT :offset , :limitAmount ";

    

    $statement = $myDatabase->getDb()->prepare($query);
    $statement->bindValue('zip', $zip);
    $statement->bindValue('min', $min);
    $statement->bindValue('max', $max);
    $statement->bindValue('offset', $offset, PDO::PARAM_INT);
    $statement->bindValue('limitAmount', $limitAmount, PDO::PARAM_INT );
    $statement->execute();
    //$houses = $statement->fetchAll(PDO::FETCH_ASSOC);
    $houseData = $statement->fetchAll();
    $statement->closeCursor();

    $houses = [];
    foreach($houseData as $data){
        $houses[] = new House($data);
    }


    $query = "SELECT COUNT(id) FROM houses WHERE (:zip = '' OR zip=:zip) AND (:min = '' OR price >= :min) AND (:max = '' OR price <= :max)";
    $statement = $myDatabase->getDb()->prepare($query);
    $statement->bindValue('zip', $zip);
    $statement->bindValue('min', $min);
    $statement->bindValue('max', $max);
    
    $statement->execute();
    $housesCount = $statement->fetchAll(PDO::FETCH_COLUMN);
    

} catch (PDOException $e) {
    $error = "Something went wrong " . $e->getMessage();
    

}
?>