<?php
  include './OOP/products.php';
    $test = new OOP\Book(1,'0001','works',56,45);

    echo $test->getName();
?>