<?php

    //use another table for a category and foreign keys. 
    //column should be required


    $action = 'home';
    if(!empty($_GET['action'])){
        $action = $_GET['action'];
    }
//another more dynamic way to do it. 
    if(file_exists("controllers/" . $action . "Controller.php")){
        include "controllers/" . $action . "Controller.php";

    }else{
        $error = "Don't know how to $action";
        include 'views/error.php';
    }
    

    // switch($action){
    //     case 'home':
    //         include 'controllers/homeController.php';
    //         //some say the controller can load the model and view. And some say this page can load them
    //         include 'models/homeModel.php';
    //         include 'views/homeView.php';

    //         exit;
    //     case 'addBook':
    //         include 'controllers/addBookController.php';
    //         exit;
    //     case 'deleteBook':
    //         include 'controllers/deleteBookController.php';
    //         include 'models/deleteBookModel.php';
    //         include 'views/deleteBookView.php';
    //         exit;
            
    //     default:
    //         $error = "Don't know how to $action";
    //         include 'views/error.php';
    //         exit;
    // }

    

?>