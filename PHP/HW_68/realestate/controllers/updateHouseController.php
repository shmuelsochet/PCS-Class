<?php
    
    include 'filterHelper.php';

    if(($_SERVER['REQUEST_METHOD'] === "POST") && !empty($_POST['price']) && !empty($_POST['address']) && !empty($_POST['city']) && !empty($_POST['state']) && !empty($_POST['zip']) && !empty($_POST['picture']) && isset($_POST['notes']) ){
        $priceUpdate =  $_POST['price'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $zipUpdate = $_POST['zip'];
        
        $stringDir = "../../../images/";
        $inputtedPic = $_POST['picture'];
        if(in_array($_POST['picture'] , scandir($stringDir))){
            $picture = $stringDir . $_POST['picture'];
            

        }
              
        $notes = $_POST['notes']; 
        $idUpdate = $_POST['id']; 

    

    }elseif(($_SERVER['REQUEST_METHOD'] === "POST") && ( empty($_POST['price']) || empty($_POST['address']) || empty($_POST['city']) || empty($_POST['state']) || empty($_POST['zip']) || empty($_POST['picture']) || !isset($_POST['notes'])) ){
        $errors[] = "You must submit a price, address, city, state, zip and picture.";

    }
    include 'models/updateHouseModel.php';
    include 'views/UpdateHouseView.php';
?>

