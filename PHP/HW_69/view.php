<?php

    class View{
    
        public function printView($page){
            include "top.php";
            $this->printPage($page);
            include "bottom.php";
        }
        public function printPage($page){

        }

    }

?>