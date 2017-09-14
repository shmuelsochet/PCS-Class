<?php
    //this does not work yet, possibly because of the php before the viewCart page. 
    include "cart.php";

    $cart = new Cart();
    if(!empty($_POST['item']) ){
        $cart->removeItem($_POST['item']);
    }
   
?>