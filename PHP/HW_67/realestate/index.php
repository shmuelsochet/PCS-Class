<?php

//things to add to web page
//should be able to sort by price, zip,. Pass in column to sort by. Protect against sql injection, have array of columns
//and is not in array can't sort by that column. 
//user should be able to choose how many per page

$action = "home";
if(!empty($_GET['action'])) {
    $action = $_GET['action'];
}

switch($action) {
    case 'home':
        include 'controllers/homeController.php';
        include 'models/housesModel.php';
        include 'views/homeView.php';
        exit;
    case 'table':
        include 'controllers/housesTableController.php';
        exit;
    case 'details':
        include 'controllers/houseDetailsController.php';
        exit;
    default:
        $error = "Dont know how to $action";
        include 'views/error.php';
        exit;
}

?>