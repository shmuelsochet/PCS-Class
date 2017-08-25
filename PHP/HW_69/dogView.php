<?php

spl_autoload_register(function($className){
    echo "Looking for $className . Requiring " . lcfirst($className) . '.php<br>';
    require lcfirst($className) . '.php';
});

include "top.php";

$lassie = new Dog("Dog", "Lassie", "Woof","Meat","Scotch Collie");
?>

<a href="index.php" class="btn btn-primary">Animals</a>
<h1> <?=  $lassie ?> </h1>

<?php include "bottom.php" ?>