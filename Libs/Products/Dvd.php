<?php
  namespace Libs\Products;
  use Libs\Products\Product;
  
    class DVD extends Product {
    public $size;

    public function __construct($sku, $name, $price, $size){
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

  
?>