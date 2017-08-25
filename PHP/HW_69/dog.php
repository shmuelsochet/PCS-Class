<?php

    require_once "animal.php";
    
    class Dog extends Animal{
        public $breed;

        public function __construct($type, $name, $sound, $eats, $breed){
            parent::__construct($type, $name, $sound, $eats);
            $this->breed = $breed;
        }
        
        public function setBreed($breed){
                $this->breed($breed) ;
            
        }
        public function getBreed(){
            return $this->breed;
        }

        public function printIt(){
            $ret = '';
            foreach($this as $key => $value){
                $ret .= "$key: $value<br/>";
            }
            return parent::printIt() . $ret;
        }

        


    }

?>