<?php
include 'utils/database.php';

if(empty($priceUpdate)){
    $priceUpdate = '';
}

if(empty($address)){
    $address = '';
}

if(empty($city)){
    $city = '';
}

if (empty($state)) {
    $state = '';
}

if (empty($zipUpdate)) {
    $zipUpdate = '';
}

if (empty($picture)) {
    $picture = '';
}

if (empty($notes)) {
    $notes = '';
}

if (empty($zip)) {
    $zip = '';
}

if (empty($idUpdate)) {
    $idUpdate = '';
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
    if(($_SERVER['REQUEST_METHOD'] === "POST") && empty($errors) ){
        
        $query =  "UPDATE houses SET price = :priceUpdate, address = :address, city = :city, state = :state, zip = :zipUpdate, picture = :picture, notes = :notes WHERE id = :idUpdate";
        
        $myDatabase = Database::getInstance();

        $statement = $myDatabase->getDb()->prepare($query);
        $statement->bindValue('priceUpdate', $priceUpdate);
        $statement->bindValue('address', $address);
        $statement->bindValue('city', $city);
        $statement->bindValue('state', $state);
        $statement->bindValue('zipUpdate', $zipUpdate);
        $statement->bindValue('picture', $picture);
        $statement->bindValue('notes', $notes);
        $statement->bindValue('idUpdate', $idUpdate);
        $statement->execute();
        $statement->closeCursor();
    }
    

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