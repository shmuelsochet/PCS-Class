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

        public function removeItem($item){
            unset($_SESSION['cart'][$item]);
        }

        //Stephen used this to clear bec you only have to blow away the cart and not the whole session like I did with 
        //session destroy
        public function clear(){
            $_SESSION['cart'] = [];
        }

        public function getItems(){
    
            return $_SESSION['cart'];
        }
    }
?>