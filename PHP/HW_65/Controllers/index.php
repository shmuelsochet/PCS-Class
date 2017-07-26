<?php

    if(isset($_GET["book"])) {
        if(empty($_GET["book"] || !is_numeric($_GET["book"]))){
            
            $errors[] = "You must choose a valid book";
            
        }else{
            

            $theId = "{$_GET['book']}";

        }
    }
    include "../Models/bookPriceModel.php";
    include "../Views/bookPriceView.php";

?>