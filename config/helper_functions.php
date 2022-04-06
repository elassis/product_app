<?php
  include_once './OOP/products.php';

  function createInstance($product){
    if($product['dvd_id'] !== null) { 
      return new OOP\DVD($product['id'], $product['sku'], $product['name'], $product['price'], $product['size']);
    }
    
    if($product['book_id'] !== null) { 
      return new OOP\Book($product['id'], $product['sku'], $product['name'], $product['price'], $product['weight']);
    }
    
    if($product['forniture_id'] !== null) { 
      return new OOP\Forniture($product['id'], $product['sku'], $product['name'], $product['price'], $product['height'], $product['width'],$product['length']); 
    }
  }
  
?>