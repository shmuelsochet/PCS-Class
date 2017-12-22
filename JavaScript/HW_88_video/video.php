<?php

//this isn't hooked up yet
require 'db.php';
$query = "SELECT * FROM videos";
$stmt = $db->query($query);
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($rows);

?>