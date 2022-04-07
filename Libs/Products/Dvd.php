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

    public function save(){
     
      $conn = $db->connect();
      try {
        $stmt = $conn->prepare("INSERT INTO products (id, sku, name, price) VALUES ('', :sku, :name, :price)");
        $stmt->execute(array(':sku'=>$this->getSku(),':name'=>$this->getName(),':price'=>$this->getPrice()));
        
        $lastId = $db->getLastId();
        $stmt2 = $conn->prepare("INSERT INTO dvd (dvd_id, size) VALUES (:id, :size)");
        $stmt2->execute(array(':id'=>$lastId[0],':size'=>$this->getSize()));
        echo 'OK';
        exit;
      } catch (PDOException $e) {
        throw $e;
      }
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