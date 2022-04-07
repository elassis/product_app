<?php
  namespace Libs\Models;
  require_once '../vendor/autoload.php';
  use Libs\Products;
  use Libs\Config\Database;
 
  class Book extends Products\Book {
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

 

 
?>