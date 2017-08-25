<?php

class House {
    private $id;
    private $price;
    private $address;
    private $city;
    private $state;
    private $zip;
    private $picture;
    private $notes;



    public function __construct( $values){
        $this->id = $values['id'];
        $this->price = $values['price'];
        $this->address = $values['address'];
        $this->city = $values['city'];
        $this->state = $values['state'];
        $this->zip = $values['zip'];
        $this->picture = $values['picture'];
        $this->notes = $values['notes'];
    }

    public function getId(){
        return $this->id;
    }
    
    public function getPrice(){
        return $this->price;
    }

    public function getAddress(){
        return $this->address;
    }

    public function getCity(){
        return $this->city;
    }

    public function getState(){
        return $this->state;
    }

    public function getZip(){
        return $this->zip;
    }

    public function getPicture(){
        return $this->picture;
    }
    
    public function getNotes(){
        return $this->notes;
    }
}

?> 