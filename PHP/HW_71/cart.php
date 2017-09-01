<?php

class Cart{
        

        public function __construct(){
            session_start();
            if(empty($_SESSION['cart'])){
                $_SESSION['cart'] = [];
            }
       
        }

        public function addItem($item, $quantity){
            if(!empty($_SESSION['cart'][$item])){
              
                $quantity += $_SESSION['cart'][$item];
            }
          
            $_SESSION['cart'][$item] = $quantity;
            
        }

        public function getItems(){
    
            return $_SESSION['cart'];
        }
    }
?>