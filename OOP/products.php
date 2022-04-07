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