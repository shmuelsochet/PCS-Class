<?php
    
    if(!empty($_POST['book']) && !empty($_POST['price'])){
        $theName =  $_POST['book'];
        $thePrice = $_POST['price'];
        $book = $_POST['book'];
        $price = $_POST['price']; 
        
        include '../Models/addBookModel.php';
        

    }elseif(($_SERVER['REQUEST_METHOD'] === "POST") && ( empty($_POST['book']) || empty($_POST['price'])) ){
            $errors[] = "You must submit a book and a price";
    }
    
    include '../Views/addBookView.php';
    
    
    
?>