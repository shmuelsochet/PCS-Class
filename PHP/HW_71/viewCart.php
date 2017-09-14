<?php
    
    if(!empty($_GET['clear']) && $_GET['clear'] ==="true"){
        include "cart.php";
        $cart = new Cart();
        $cart = $_SESSION['cart'];
        session_destroy();
    }else{
        include "cart.php";
        $cart = new Cart();

        $cart = $_SESSION['cart'];
    }
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="jumbotron text-center">
            <h1>Welcome to PCS!</h1>
            <a href="index.php?action=store" class="btn btn-primary">Continue Shopping</a>
            <a href="index.php?action=viewCart&clear=true" class="btn btn-primary">Clear</a>
        </div>
        <div class="text-center">

            <?php if(!empty($_GET['clear']) && $_GET['clear'] ==="false") :if(!empty($cart)): foreach($cart as $key=>$value):?>
            
            <h1 class="text-center"><?= "Item: " . $key. " -". " Quantity: " . $value  ?></h1> 
            <a href="index.php?action=remove&item=<?=$key ?>">Remove</a>
            <?php endforeach; else: ?>
            <h1 class="text-center"><?= "You're cart is empty!" ?> </h1>
            <?php endif ?>
            
            <?php  else : /*foreach($cart as $key=>$value):*/ ?>
            <h1 class="text-center"><?= "You cleared your cart" /*. "Item: " . $key. " -". " Quantity: " . $value*/ ?> </h1>
            <?php /* endforeach;*/ endif ?>
                    
        </div>
      
    </div>

</body>
</html>