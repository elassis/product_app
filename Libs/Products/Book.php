<?php
  namespace Libs\Products;
  use Libs\Products\Product;
  
 
  class Book extends Product {
    public $weight;

    public function __construct($sku, $name, $price, $weight){
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
 
  
?>