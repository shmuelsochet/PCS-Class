<?php
    
    include 'filterHelper.php';

    if(($_SERVER['REQUEST_METHOD'] === "POST") && !empty($_POST['price']) && !empty($_POST['address']) && !empty($_POST['city']) && !empty($_POST['state']) && !empty($_POST['zip']) && (!empty($_POST['pictureFile']) || !empty($_POST['pictureURL'])) && isset($_POST['notes']) ){
        if(is_numeric($_POST['price'])) {
            $priceUpdate =  $_POST['price'];
        }else{
            $errors[] = "Price must be numeric!";
        }
                
        $address = $_POST['address'];
        $city = $_POST['city'];
        $state = $_POST['state'];
       
        if(is_numeric($_POST['zip'])){
            $zipUpdate = $_POST['zip'];
        }else{
            $errors[] = "Zip must be numeric!";
        }
         
        $stringDir = "../../../images/";
        if(empty($_POST['pictureURL']) && in_array($_POST['pictureFile'] , scandir($stringDir))){
            $picture = $stringDir . $_POST['pictureFile'];
         
        }elseif(substr($_POST['pictureURL'],0,6) === "https:"){
            $picture = $_POST['pictureURL'];
        
        }else{
            $errors[] = "A picture can only be chosen from the folder- C:\\xampp\htdocs\class\images or from a valid URL";
        }
              
        $notes = $_POST['notes']; 
        $idUpdate = $_POST['id']; 

    

    }elseif(($_SERVER['REQUEST_METHOD'] === "POST") && ( empty($_POST['price']) || empty($_POST['address']) || empty($_POST['city']) || empty($_POST['state']) || empty($_POST['zip']) || (empty($_POST['pictureFile']) && empty($_POST['pictureURL']))  || !isset($_POST['notes'])) ){
        $errors[] = "You must submit a price, address, city, state, zip and picture.";

    }
    include 'models/updateHouseModel.php';
    include 'views/UpdateHouseView.php';
?>

