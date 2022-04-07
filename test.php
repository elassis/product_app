<?php
require_once 'vendor/autoload.php';
class Model extends Libs\Config\Database {
      
  public function index(){      
    $conn = $this->connect();
    $stmt = $conn->prepare("SELECT * FROM products p 
                            LEFT JOIN forniture f ON f.forniture_id = p.id
                            LEFT JOIN book b ON b.book_id = p.id
                            LEFT JOIN dvd d ON d.dvd_id = p.id ORDER BY p.id");
    $stmt->execute();
    $elemts = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $elemts;
  }

  public function delete($element_id){
    $conn = $this->connect();
    $stmt = $conn->prepare("DELETE FROM products WHERE id = {$element_id}");
    $stmt->execute();      
  }

  public function create($product){
    if($product['type'] == 'dvd'){
      $dvd = new Libs\Models\ModelDvd($product['sku'], $product['name'], $product['price'], $product['size']);
      $dvd->save();
    }
    if($product['type'] == 'book'){
      $book = new Libs\Models\ModelBook($product['sku'], $product['name'], $product['price'], $product['weight']);
      $book->save();
    } 
    if($product['type'] == 'forniture'){
      $forniture = new Libs\Models\ModelForniture($product['sku'], $product['name'], $product['price'], $product['height'],
      $product['width'],$product['length']);
      $forniture->save();
    }    
  }
}
?>