<?php 

require_once "view.php";

class HomeView extends View{    
                              
    function printPage($page){
        echo "<a href=\"dogView.php\" class=\"btn btn-primary\">Dogs </a>
                <a href=\"catView.php\" class=\"btn btn-primary\">Cats </a>";
    }
              
}

spl_autoload_register(function($className){
    echo "Looking for $className . Requiring " . lcfirst($className) . '.php<br>';
    require lcfirst($className) . '.php';
});




$cv = new HomeView();


$cv->printView($cv);

?>