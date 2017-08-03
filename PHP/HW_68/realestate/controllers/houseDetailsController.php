<?php
    if (!empty($_GET['houseId'])) {
        $houseId = $_GET['houseId'];
 
        include 'models/houseModel.php';
        include 'views/houseDetailsView.php';
    } else {
        $error = "houseId is a required param";
    }
?>