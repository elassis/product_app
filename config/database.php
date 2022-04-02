<?php

  class Database {
    private $server = 'localhost';
    private $database = 'products';
    private $user = 'root';
    private $pass = '';

    public function connect(){
      try {
        $pdo = new PDO("mysql:host={$this->server};dbname={$this->database}","{$this->user}","{$this->pass}");
        return $pdo;
      } catch (Exception $e) {
        echo $e->getMessage();
      }
    } 
  }
?>