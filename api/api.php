<?php
   include_once '../models/model.php';
      
   class Api { 
     public $model;
    public static function get(){
      $model = new Model();
      $products['products'] = $model->selectAll();
      echo json_encode($products);     
    }
    public static function delete($array){
      $model = new Model();
      foreach($array as $product){
        $model->delete($product);
      }
      return 'OK';
    }
   }
   ?>