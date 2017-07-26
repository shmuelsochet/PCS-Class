<?php
    if(isset($_POST["book"])) {
                if(empty($_POST["book"] || !is_numeric($_POST["book"]))){
                   
                    $errors[] = "You must choose a valid book";
                    
                }else{

                    $theId = "{$_POST['book']}";
                }
    }
    // include "models/deleteBookModel.php";
    // include "views/deleteBookView.php";

?>