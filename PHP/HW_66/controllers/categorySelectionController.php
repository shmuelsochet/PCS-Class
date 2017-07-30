<?php

    if(isset($_GET['category'])){
        if(empty($_GET['category'])){
            $error = "A valid category must be submitted";
        }else{
            $categoryFilter = $_GET['category'];
        }
    }

?>