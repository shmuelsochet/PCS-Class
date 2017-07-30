<?php
include 'utils/db.php';

if (empty($zip)) {
    $zip = '';
}

if (empty($min)) {
    $min = '';
}

if (empty($max)) {
    $max = '';
}

$offset = 0;
if(!empty($_GET['offset'])){
   $offset = $_GET['offset'];
   $offset = intval($offset);
  
   
}
$limitAmount = 4;

try {
    $query = "SELECT * FROM houses WHERE (:zip = '' OR zip=:zip) AND (:min = '' OR price >= :min) AND (:max = '' OR price <= :max) 
    LIMIT :offset , :limitAmount ";

    $statement = $db->prepare($query);
    $statement->bindValue('zip', $zip);
    $statement->bindValue('min', $min);
    $statement->bindValue('max', $max);
    $statement->bindValue('offset', $offset, PDO::PARAM_INT);
    $statement->bindValue('limitAmount', $limitAmount, PDO::PARAM_INT );
    $statement->execute();
    $houses = $statement->fetchAll(PDO::FETCH_ASSOC);
    $statement->closeCursor();

    $query = "SELECT COUNT(id) FROM houses";
    $statement = $db->prepare($query);
    $statement->execute();
    $housesCount = $statement->fetchAll(PDO::FETCH_COLUMN);
    $statement->closeCursor();

} catch (PDOException $e) {
    $error = "Something went wrong " . $e->getMessage();
    

}
?>