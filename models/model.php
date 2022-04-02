<?php
  include '../config/database.php';

  class Model extends Database {
    
    public function selectAll(){
      $db = new Database();
      $conn = $db->connect();
      $stmt = $conn->prepare("SELECT * FROM products p 
                              LEFT JOIN forniture f ON f.forniture_id = p.id
                              LEFT JOIN book b ON b.book_id = p.id
                              LEFT JOIN dvd d ON d.dvd_id = p.id ORDER BY p.id");
      $stmt->execute();
      $elemts = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $elemts;
    }

    public function delete($element_id){
      $db = new Database();
      $conn = $db->connect();
      $stmt = $conn->prepare("DELETE FROM products WHERE id = {$element_id}");
      $stmt->execute();      
    }
  }
?>