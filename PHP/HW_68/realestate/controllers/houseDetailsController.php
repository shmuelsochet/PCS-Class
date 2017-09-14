<?php
    if (!empty($_GET['houseId'])) {
        $houseId = $_GET['houseId'];

        if(!empty($_POST['edit'])){
            $editPage = $_POST['edit'];
            print_r("editPage: = " . $editPage); 
        }else{
            $editPage = "false";
        }
 
        include 'models/houseModel.php';
        include 'views/houseDetailsView.php';
    } else {
        $error = "houseId is a required param";
    }
?>