<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
    <title>Admin Panel</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
     <link href="../styles/style.css" rel="stylesheet">
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>
<?php require "../layouts/header.php" ?>
<?php require "../../config/config.php" ?>

<?php

    if (isset($_POST['submit'])) {
        if (empty($_POST['name']) or empty($_POST['description']) OR empty($_POST['price'])) {
            echo "<scipts>alert('One or more inputs are empty')</scipts>";
        } else {

            $name = $_POST['name'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $image = $_FILES['image']['name'];
            $file = $_FILES['file']['name'];

            $dir_image = "images/" . basename($image);
            $dir_file = "books/" . basename($image);


            $insert = $conn->prepare("INSERT INTO products (name, price, description, image, file) VALUES (:name, :price, :description, :image, :file)");
            $insert->execute([
                    ":name" => $name,
                    ":price" => $price,
                    ":description" => $description,
                    ":image" => $image,
                    ":file" => $file,
            ]);

            if(move_uploaded_file($_FILES['image']['tmp_name'], $dir_image) AND move_uploaded_file($_FILES['file']['tmp_name'], $dir_file)) {
                header("location".ADMINURL."/products-admins/show-products.php");
            }
        }
    }

?>
       <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-5 d-inline">Create Products</h5>
              <form method="POST" action="create-products.php" enctype="multipart/form-data">
                <!-- Email input -->
                <div class="form-outline mb-4 mt-4">
                  <label>Name</label>

                  <input type="text" name="name" id="form2Example1" class="form-control" placeholder="name" />
                </div>

                <div class="form-outline mb-4 mt-4">
                    <label>Price</label>

                    <input type="text" name="price" id="form2Example1" class="form-control" placeholder="price" />
                </div>

                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Description</label>
                    <textarea name="description" placeholder="description" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>

                <div class="form-outline mb-4 mt-4">
                    <label>Image</label>

                    <input type="file" name="image" id="form2Example1" class="form-control" placeholder="image" />
                </div>

                <div class="form-outline mb-4 mt-4">
                    <label>File</label>
                    <input type="file" name="file" id="form2Example1" class="form-control" placeholder="file" />
                </div>

      
                <!-- Submit button -->
                <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">create</button>

          
              </form>

            </div>
          </div>
        </div>
      </div>
<?php require "../layouts/footer.php" ?>
</body>
</html>