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

    public function save(){
      $db = new Database();
      $conn = $db->connect();
      try {
        $stmt = $conn->prepare("INSERT INTO products (id, sku, name, price) VALUES ('', :sku, :name, :price)");
        $stmt->execute(array(':sku'=>$this->getSku(),':name'=>$this->getName(),':price'=>$this->getPrice()));
        
        $lastId = $db->getLastId();
        $stmt2 = $conn->prepare("INSERT INTO book (book_id, weight) VALUES (:id, :weight)");
        $stmt2->execute(array(':id'=>$lastId[0],':weight'=>$this->getweight()));
        echo 'OK';
        exit;
      } catch (PDOException $e) {
        throw $e;
      }
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