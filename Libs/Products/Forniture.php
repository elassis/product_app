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

    public function save(){
      $db = new Database();
      $conn = $db->connect();
      try {
        $stmt = $conn->prepare("INSERT INTO products (id, sku, name, price) VALUES ('', :sku, :name, :price)");
        $stmt->execute(array(':sku'=>$this->getSku(),':name'=>$this->getName(),':price'=>$this->getPrice()));
        
        $lastId = $db->getLastId();
        $stmt2 = $conn->prepare("INSERT INTO forniture (forniture_id, height, width, length) 
        VALUES (:id, :height, :width, :length)");

        $stmt2->execute(array(':id'=>$lastId[0],':height'=>$this->getHeight(),':width'=>$this->getWidth(),
        ':length'=>$this->getLength()));
        echo 'OK';
        exit;
      } catch (PDOException $e) {
        throw $e;
      }
    }

    public function setSize($size){}
    public function getSize(){}

    public function setWeight($weight){}
    public function getWeight(){}
  }
?>