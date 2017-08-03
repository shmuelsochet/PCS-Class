<?php
include 'utils/database.php';

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
    $query = "SELECT * FROM houses WHERE (:zip = '' OR zip=:zip) AND (:min = '' OR price >= :min) AND (:max = '' OR price <= :max) 
    LIMIT :offset , :limitAmount ";

    $myDatabase = Database::getInstance();

    $statement = $myDatabase->getDb()->prepare($query);
    $statement->bindValue('zip', $zip);
    $statement->bindValue('min', $min);
    $statement->bindValue('max', $max);
    $statement->bindValue('offset', $offset, PDO::PARAM_INT);
    $statement->bindValue('limitAmount', $limitAmount, PDO::PARAM_INT );
    $statement->execute();
    $houses = $statement->fetchAll(PDO::FETCH_ASSOC);
    $statement->closeCursor();

    $query = "SELECT COUNT(id) FROM houses WHERE (:zip = '' OR zip=:zip) AND (:min = '' OR price >= :min) AND (:max = '' OR price <= :max)";
    $statement = $myDatabase->getDb()->prepare($query);
    $statement->bindValue('zip', $zip);
    $statement->bindValue('min', $min);
    $statement->bindValue('max', $max);
    
    $statement->execute();
    $housesCount = $statement->fetchAll(PDO::FETCH_COLUMN);
    $statement->closeCursor();

} catch (PDOException $e) {
    $error = "Something went wrong " . $e->getMessage();
    

}
?>