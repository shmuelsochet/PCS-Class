<?php
    $action = "home";
    if(!empty($_GET['action'])){
        $action = $_GET['action'];
    }

    switch($action){
        case 'home':
            include 'controllers/homeController.php';
            //some say the controller can load the model and view. And some say this page can load them
            include "models/homeModel.php";
            include "views/homeView.php";

            exit;
        case 'addBook':
            include 'controllers/addBookController.php';
            exit;
        case 'deleteBook':
            include 'controllers/deleteBookController.php';
            include "models/deleteBookModel.php";
            include "views/deleteBookView.php";
            exit;
            
        default:
            $error = "Don't know how to $action";
            include 'views/error.php';
            exit;
    }
?>