<?php
  namespace OOP;
  
  abstract class Product {
    public $id;
    public $sku;
    public $name;
    public $price;
    public $size;
    public $weight;
    public $height;
    public $width;
    public $length;

    function __construct($id, $sku, $name, $price){
      $this->id = $id;
      $this->sku = $sku;
      $this->name = $name;
      $this->price = $price;
    } 

    function getId(){
      return $this->id;
    }

    function getSku(){
      return $this->sku;
    }

    function getName(){
      return $this->name;
    } 
    
    function getPrice(){
      return $this->price;
    }

    abstract public function setSize($size);
    abstract public function getSize();

    abstract public function setWeight($weight);
    abstract public function getWeight();
    
    abstract public function setHeight($height);
    abstract public function getHeight();
    
    abstract public function setWidth($width);
    abstract public function getWidth();
    
    abstract public function setLength($length);
    abstract public function getLength();

  }

  class DVD extends Product {
    public $size;

    public function __construct($id, $sku, $name, $price, $size){
      $this->id = $id;
      $this->sku = $sku;
      $this->name = $name;
      $this->price = $price;
      $this->size = $size;
    }
    
    public function setSize($size){}
    
    public function getSize(){
      return $this->size;
    }
    
     public function setWeight($weight){}
     public function getWeight(){}
    
     public function setHeight($height){}
     public function getHeight(){}
    
     public function setWidth($width){}
     public function getWidth(){}
    
     public function setLength($length){}
     public function getLength(){}
  }

  class Book extends Product {
    public $weight;

    public function __construct($id, $sku, $name, $price, $weight){
      $this->id = $id;
      $this->sku = $sku;
      $this->name = $name;
      $this->price = $price;
      $this->weight = $weight;
    }

    public function setWeight($weight){}
    
    public function getWeight(){
      return $this->weight;
    }
     
    public function setSize($size){}
    public function getSize(){}
    
    public function setHeight($height){}
    public function getHeight(){}
    
    public function setWidth($width){}
    public function getWidth(){}
    
    public function setLength($length){}
    public function getLength(){}
     
  }
 
  class Forniture extends Product {
    public $height;
    public $width;
    public $length;

    public function __construct($id, $sku, $name, $price, $height, $width, $length){
      $this->id = $id;
      $this->sku = $sku;
      $this->name = $name;
      $this->price = $price;
      $this->height = $height;
      $this->width = $width;
      $this->length = $length;
    }

    public function setHeight($height){}

    public function getHeight(){
      return $this->height;
    }
    public function setWidth($width){}

    public function getWidth(){
      return $this->width;
    }
    public function setLength($length){}

    public function getLength(){
      return $this->length;
    }

    public function setSize($size){}
    public function getSize(){}

    public function setWeight($weight){}
    public function getWeight(){}
  }
?>