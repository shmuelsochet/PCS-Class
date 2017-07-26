<?php
    
    if(!empty($_POST['book']) && !empty($_POST['price']) && !empty($_POST['category'])){
        $theName =  $_POST['book'];
        $thePrice = $_POST['price'];
        $theCategory = $_POST['category'];
        $book = $_POST['book'];
        $price = $_POST['price'];
        $category = $_POST['category']; 
        
        include 'models/addBookModel.php';
        
    }elseif(($_SERVER['REQUEST_METHOD'] === "POST") && ( empty($_POST['book']) || empty($_POST['price']) || empty($_POST['category'])) ){
            $errors[] = "You must submit a Book, and a Price and a Category";
    }
    
    include 'views/addBookView.php';
       
?>