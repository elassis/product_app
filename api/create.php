<?php
  include_once 'api.php';

  if(isset($_POST['product'])){
    $response = Api::create($_POST['product']);
    echo $response;
  }
?>