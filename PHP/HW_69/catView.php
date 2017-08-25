<?php


include "top.php";

$garfield = new Cat("Cat", "Garfield","Meow","Fish","Orange");

?>

<a href="index.php" class="btn btn-primary">Animals</a>
<h1> <?=  $garfield ?> </h1>

<?php include "bottom.php" ?>