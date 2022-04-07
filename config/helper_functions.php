<?php
  include_once './OOP/products.php';

  function createInstance($product){
    if($product['dvd_id'] !== null) { 
      $newDvd = new OOP\DVD($product['sku'], $product['name'], $product['price'], $product['size']);
      $newDvd->setId($product['id']);
      return $newDvd;
    }
    
    if($product['book_id'] !== null) { 
      $newBook =  new OOP\Book($product['sku'], $product['name'], $product['price'], $product['weight']);
      $newBook->setId($product['id']);
      return $newBook;
    }
    
    if($product['forniture_id'] !== null) { 
      $newForniture = new OOP\Forniture($product['sku'], $product['name'], $product['price'], $product['height'],
      $product['width'],$product['length']); 
      $newForniture->setId($product['id']);
      return $newForniture;

    }
  }
  
?>