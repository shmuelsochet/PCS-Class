<?php
require 'db.php';
$query = "SELECT * FROM recipes";
$stmt = $db->query($query);
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($rows);
?>