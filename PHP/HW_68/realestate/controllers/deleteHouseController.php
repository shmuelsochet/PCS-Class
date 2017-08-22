<?php
    include 'filterHelper.php';
    if(($_SERVER['REQUEST_METHOD'] === "POST") && !empty($_POST['delete']) && is_numeric($_POST['delete'])){
        $id = $_POST['delete'];

    }elseif(($_SERVER['REQUEST_METHOD'] === "POST") && empty($_POST['delete']) && !is_numeric($_POST['delete'])){
        $errors[] = "You must submit a valid numeric id!";

    }

    include 'models/deleteHouseModel.php';
    include 'views/deleteHouseView.php';
?>