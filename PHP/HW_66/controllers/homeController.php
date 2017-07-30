<?php
    include 'controllers/categorySelectionController.php';

    if(isset($_GET["book"])) {
        if((empty($_GET["book"]) || !is_numeric($_GET["book"])) ){
            
            $errors[] = "You must choose a valid book";
            
            
        }else{
            
            $theId = "{$_GET['book']}";
            
            

        }
        
    }else{
        //category controller brings this in
        // if(! empty($_GET['category'])){
        //         $category = "{$_GET['category']}";
        //     }
            
    }
    include 'models/categoryModel.php';
    include "models/homeModel.php";
    include "views/homeView.php";

?>