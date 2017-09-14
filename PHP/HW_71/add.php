<?php

    include "cart.php";

    $cart = new Cart();
    if(!empty($_POST['item']) && !empty($_POST['quantity'])){
        $cart->addItem($_POST['item'],$_POST['quantity']);
    }
  
  
    // if($_SERVER['REQUEST_METHOD']==="GET"){
    //     print_r($cart->getItems());
    // }
    


?>