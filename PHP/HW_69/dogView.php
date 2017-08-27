<?php

require_once "view.php";

class DogView extends View{

        
        
   
    function printPage($page){
                echo "<a href=\"index.php\" class=\"btn btn-primary\">Animals</a>
                        <h1>   $page  </h1>";
    }
       

}

spl_autoload_register(function($className){
    echo "Looking for $className . Requiring " . lcfirst($className) . '.php<br>';
    require lcfirst($className) . '.php';
});

$lassie = new Dog("Dog", "Lassie", "Woof","Meat","Scotch Collie");
       
$dv = new DogView();
  
$dv->printView($lassie);
       
?>




