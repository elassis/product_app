<?php
  namespace Libs\Models;
  require_once '../vendor/autoload.php';
  use Libs\Products;
  use Libs\Config\Database;

  class Furniture extends Products\Furniture {
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
        $stmt = $conn->prepare("INSERT INTO products (id, sku, name, price) VALUES (null, :sku, :name, :price)");
        $stmt->execute(array(':sku'=>$this->getSku(),':name'=>$this->getName(),':price'=>$this->getPrice()));
        
        $lastId = $db->getLastId();
        $stmt2 = $conn->prepare("INSERT INTO furniture (furniture_id, height, width, length) 
        VALUES (:id, :height, :width, :length)");

        $stmt2->execute(array(':id'=>$lastId[0],':height'=>$this->getHeight(),':width'=>$this->getWidth(),
        ':length'=>$this->getLength()));
      } catch (PDOException $e) {
        echo $e->getMessage();
      }
      echo 'OK';
      exit;

    }
  }

 
?>