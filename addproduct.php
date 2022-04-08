<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="./stylesheets/styles.css">
  <title>Add Product</title>
</head>
<body>
<nav class="navbar navbar-expand bg-light">
    <div class="container-fluid">
      <div class="text">
        <p class="h2">product add</p>
      </div>
      <div class="buttons">
        <button type="submit" class="btn btn-primary" id="save-button">Save</button>
        <button class="btn btn-danger delete-btn" id="cancel">Cancel</button>
      </div>
  </div>
  </nav>
  <main>
    <div class="notification hidden"></div>
    <form action="" method="post" id="product_form">
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">SKU*</label>
        <input type="text" class="form-control" id="sku">
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Name*</label>
        <input type="text" class="form-control" id="name">
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Price*</label>
        <input type="number" class="form-control" id="price">
      </div>
      <select class="form-select" aria-label="Default select example" id="productType">
        <option value="ts" selected>Type Switcher</option>
        <option value="book">Book</option>
        <option value="dvd">DVD</option>
        <option value="furniture">Furniture</option>
      </select>
      <div id="template-container"></div>  
    </form>
  </main>
</body>
<script type="module" src="js/addProductHandlers.js"></script>
</html>