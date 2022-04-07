<?php
   require_once '../vendor/autoload.php';
   
   class Api { 
     public $model;
      public static function get(){
        $model = new Libs\Models\Model();
        $products['products'] = $model->index();
        echo json_encode($products);     
      }
      public static function delete($array){
        $model = new Libs\Models\Model();
        foreach($array as $product){
          $model->delete($product);
        }
        return 'OK';
      }
      public static function create($obj){
        $model = new Libs\Models\Model();
        $model->create($obj);        
      }
   }
   ?>