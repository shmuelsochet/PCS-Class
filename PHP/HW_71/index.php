<?php

    $action = "store";

    if(!empty($_GET['action'])){
        $action = $_GET['action'];
    }

    switch($action){
        case "add":
            include "add.php";
            //if you're code for adding to cart is in a separate file you can use this to redirect
            header("Location: index.php?action=store");
            exit; // comment out exit to fall through and load the store when adding to cart.
        case  "store":
            include "store.php";
            exit;
        case "viewCart":
            include "viewCart.php";
            exit;
        case "remove":
            include "remove.php";
            header("Location: index.php?action=viewCart");
            
        default:
            die("Don't know how to $action");
    }
?>