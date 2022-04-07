<?php
  namespace Libs\Products;
  use Libs\Products\Product;

  class Forniture extends Product {
    public $height;
    public $width;
    public $length;

    public function __construct($sku, $name, $price, $height, $width, $length){
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