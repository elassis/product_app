<?php
  require_once 'vendor/autoload.php';
  use Libs\Products;

  function createInstance($product){
    if($product['dvd_id'] !== null) { 
      $newDvd = new Products\DVD($product['sku'], $product['name'], $product['price'], $product['size']);
      $newDvd->setId($product['id']);
      return $newDvd;
    }
    
    if($product['book_id'] !== null) { 
      $newBook =  new Products\Book($product['sku'], $product['name'], $product['price'], $product['weight']);
      $newBook->setId($product['id']);
      return $newBook;
    }
    
    if($product['forniture_id'] !== null) { 
      $newForniture = new Products\Forniture($product['sku'], $product['name'], $product['price'], $product['height'],
      $product['width'],$product['length']); 
      $newForniture->setId($product['id']);
      return $newForniture;

    }
  }
  
?>