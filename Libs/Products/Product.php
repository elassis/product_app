<?php
  namespace Libs\Products;
  
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

    function __construct($sku, $name, $price){
      $this->sku = $sku;
      $this->name = $name;
      $this->price = $price;
    } 
    
    
    
    function setId($id){
      $this->id = $id;
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

    abstract public function save();

  }
?>