<?php
header("Access-Control-Allow-Origin: http://localhost");
require 'db.php';
if(! empty($_POST["id"])) {
    $id = $_POST["id"];
} 
else {
    http_response_code(400);
    exit("Id is required");
}
$query = "DELETE FROM CONTACTS WHERE Id = :id";
$statement = $db->prepare($query);
$statement->bindParam("id", $id);
$rowsDeleted = $statement->execute();
if(!$rowsDeleted) {
    http_response_code(500);
    exit("Unable to delete contact");
}