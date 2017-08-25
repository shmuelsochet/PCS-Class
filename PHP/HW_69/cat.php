<?php
    
    require_once "animal.php";
    
    class Cat extends Animal{
        public $color;

        public function __construct($type, $name, $sound, $eats, $color){
            parent::__construct($type, $name, $sound, $eats);
            $this->color = $color;
        }
        
        public function setColor($color){
                $this->color($color) ;
            
        }
        public function getColor(){
            return $this->color;
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