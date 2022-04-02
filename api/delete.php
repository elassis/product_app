<?php
  include_once 'api.php';

  if(isset($_POST['element_delete'])){
    $response = Api::delete($_POST['element_delete']);
    echo $response;
  }
?>