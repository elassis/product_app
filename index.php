<?php  
  include_once './config/helper_functions.php';
 
  $url = 'http://localhost/products_app/api/index.php';
  $response = file_get_contents($url);
  $json_response = json_decode($response, true);
  $array_instances = array();

  foreach($json_response['products'] as $product){
    array_push($array_instances, createInstance($product));    
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="./stylesheets/styles.css">
  <title>Document</title>
</head>
<body>
  <nav class="navbar navbar-expand bg-light">
    <div class="container-fluid">
      <div class="text">
        <p>product list</p>
      </div>
      <div class="buttons">
        <button>add</button>
        <button class="delete-btn">mass delete</button>
      </div>
  </div>
  </nav>
  <main class="container row">
    <?php foreach($array_instances as $instance):?>
      <div class="product-container">
        <div class="row chk">
          <input type="checkbox" class="delete-checkbox" name="" id="<?php echo $instance->getId(); ?>">
        </div>
        <div class="row data">
          <p class="sku"><?php echo $instance->getSku(); ?></p>
          <p class="name"><?php echo $instance->getName(); ?></p>
          <p class="price"><?php echo $instance->getPrice(); ?> $</p>
          <?php if($instance->getSize()):?>
            <p class="size">size: <?php echo $instance->getSize(); ?> MB</p>
            <?php endif;?>
          <?php if($instance->getWeight()):?>
            <p class="weight">weight: <?php echo $instance->getWeight(); ?> KG</p>
          <?php endif;?>
          <?php if($instance->getHeight()):?>
            <p class="dimensions">Dimensions:
              <?php echo "{$instance->getHeight()}x{$instance->getWidth()}x{$instance->getLength()}" ?>
            </p>
            <?php endif;?>
        </div>
      </div>
      <?php endforeach;?>    
  </main>
  <footer></footer>
</body>
<script type="module" src="js/handlers.js"></script>
</script>
</html>