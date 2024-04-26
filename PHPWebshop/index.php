<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/5c5946fe44.js" crossorigin="anonymous"></script>
    <title>Bookstore</title>
  </head>
  <body>

    <?php require "includes/header.php"; ?>
    <?php require "config/config.php"; ?>
    <?php
        $rows = $conn->query("SELECT * FROM products WHERE status = 1");
        $rows->execute();

        $allRows = $rows->fetchAll(PDO::FETCH_OBJ);
    ?>


    <div class="container">
        <div class="row mt-5">
            <?php foreach($allRows as $product) : ?>
            <div class="col-lg-4 col-md-6 col-sm-10 offset-md-0 offset-sm-1">
                <div class="card">
                    <img height="213px" class="card-img-top" src="admin-panel/products-admins/images/<?php echo $product->image; ?>">
                    <div class="card-body" >
                        <h5 class="d-inline"><b><?php echo $product->name; ?></b> </h5>
                        <h5 class="d-inline"><div class="text-muted d-inline">($<?php echo $product->price; ?>/item)</div></h5>
                        <p><?php echo substr($product->description, 0, 120); ?>...</p>
                         <a href="<?php APPURL; ?>/shopping/single.php?id=<?php echo $product->id; ?>"  class="btn btn-primary w-100 rounded my-2"> More<i class="fas fa-arrow-right"></i> </a>
     
                    </div>
                </div>
            </div>
            <br>
            <?php endforeach; ?>
        </div>
    </div>

    <?php require "includes/footer.php"; ?>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="" crossorigin="anonymous"></script>
  </body>
 
</html>