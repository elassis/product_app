<?php
  namespace Libs\Models;
  require_once '../vendor/autoload.php';
  use Libs\Products;
  use Libs\Config\Database;

  class DVD extends Products\DVD {
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
        $stmt = $conn->prepare("INSERT INTO products (id, sku, name, price) VALUES (null, :sku, :name, :price)");
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
?>