<?php
    class Animal{

        public $type;
        public $name;
        public $sound;
        public $eats;

        public function __construct($type, $name, $sound, $eats){
            $this->type = $type;
            $this->name = $name;
            $this->sound = $sound;
            $this->eats = $eats;
        }

        public function setColor($type){
            $this->type($type) ;
        
        }
        public function getColor(){
            return $this->type;
        }

        public function setName($name){
            $this->name($name) ;
        
        }
        public function getName(){
            return $this->name;
        }

        public function setSound($sound){
            $this->color($sound) ;

        }
        public function getSound(){
        return $this->sound;
        }

        public function setEats($eats){
            $this->eats($eats) ;

        }
        public function getEats(){
        return $this->eats;
        }

        public function printIt(){
            $ret = '';
            foreach($this as $key => $value){
                $ret .= "$key: $value<br>";
            }
        }
        public function __toString(){
            return $this->printIt(); 
        }

    }


?>