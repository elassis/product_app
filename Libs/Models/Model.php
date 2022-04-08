<?php
  namespace Libs\Models;
  require_once '../vendor/autoload.php';
  
  use Libs\Config\Database;
  use Libs\Models;
  
  class Model extends Database{
    public function index(){        
      $conn = $this->connect();
      $stmt = $conn->prepare("SELECT * FROM products p 
                              LEFT JOIN furniture f ON f.furniture_id = p.id
                              LEFT JOIN book b ON b.book_id = p.id
                              LEFT JOIN dvd d ON d.dvd_id = p.id ORDER BY p.id");
      $stmt->execute();
      $elemts = $stmt->fetchAll(\PDO::FETCH_ASSOC);
      return $elemts;
    }

    public function delete($element_id){
      $conn = $this->connect();
      $stmt = $conn->prepare("DELETE FROM products WHERE id = {$element_id}");
      $stmt->execute();      
    }

    public function create($product){
      if($product['type'] == 'dvd'){
        $dvd = new Models\DVD($product['sku'], $product['name'], $product['price'], $product['size']);
        $dvd->save();
      }
      if($product['type'] == 'book'){
        $book = new Models\Book($product['sku'], $product['name'], $product['price'], $product['weight']);
        $book->save();
      } 
      if($product['type'] == 'furniture'){
        $furniture = new Models\furniture($product['sku'], $product['name'], $product['price'], $product['height'],
        $product['width'],$product['length']);
        $furniture->save();
      }    
    }
  }
?>