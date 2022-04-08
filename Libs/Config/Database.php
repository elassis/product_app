<?php 
  namespace Libs\Config;

  class Database {
    private $server = 'localhost';
    private $database = 'id18749011_products';
    private $user = 'id18749011_root';
    private $pass = 'd_/8Q[U9Y!}x\DRK';

    public function connect(){
      try {
        $pdo = new \PDO("mysql:host={$this->server};dbname={$this->database}","{$this->user}","{$this->pass}");
        return $pdo;
      } catch (Exception $e) {
        echo $e->getMessage();
      }
    } 
    public function getLastId(){
      $conn = $this->connect();
      $stmt = $conn->prepare("SELECT MAX(id) FROM products");
      $stmt->execute();
      $id = $stmt->fetch();
      return $id;
    }
  }
?>