<?php

require_once "view.php";

class CatView extends View{    
                              
    function printPage($page){
        echo "<a href=\"index.php\" class=\"btn btn-primary\">Animals</a>
                <h1>   $page  </h1>";
    }
              
}

spl_autoload_register(function($className){
    echo "Looking for $className . Requiring " . lcfirst($className) . '.php<br>';
    require lcfirst($className) . '.php';
});


$garfield = new Cat("Cat", "Garfield","Meow","Fish","Orange");

$cv = new CatView();

$cv->printView($garfield);

?>
