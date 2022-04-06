<?php
//namespace ProductsModel;
include '../OOP/products.php';
include_once '../config/database.php';


class DvdModel extends OOP\DVD {
  public function __construct($sku, $name, $price, $size){
    $this->sku = $sku;
    $this->name = $name;
    $this->price = $price;
    $this->size = $size;
  }

  public function save(){
    $db = new Database();
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
}

class BookModel extends OOP\Book {
  public function __construct($sku, $name, $price, $weight){
    $this->sku = $sku;
    $this->name = $name;
    $this->price = $price;
    $this->weight = $weight;
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
}

class FornitureModel extends OOP\Forniture {
  public function __construct($sku, $name, $price, $height, $width, $length){
    $this->sku = $sku;
    $this->name = $name;
    $this->price = $price;
    $this->height = $height;
    $this->width = $width;
    $this->length = $length;
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
}
?>