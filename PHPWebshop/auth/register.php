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

    <?php require "../includes/header.php"; ?>
    <?php require "../config/config.php"; ?>

    <?php
        if(isset($_SESSION['username'])) {
            header("location: ".APPURL."");
        }
        if(isset($_POST['submit'])) {

            if(empty($_POST['username']) OR empty($_POST['email']) OR empty($_POST['password']) OR empty($_POST['phonenr']) OR empty($_POST['address'])) {
                echo "<script>alert('one or more inputs missing');</script>";
            } else {
                $username = $_POST['username'];
                $phonenr = $_POST['phonenr'];
                $address = $_POST['address'];
                $email = $_POST['email'];
                $password = $_POST['password'];


                $insert = $conn->prepare(
                        "INSERT INTO users (username, phonenr, address, email, mypassword) 
                                VALUES (:username, :phonenr, :address, :email, :mypassword)");

                $insert->execute([
                        ':username' => $username,
                        ':phonenr' => $phonenr,
                        ':address' => $address,
                        ':email' => $email,
                        ':mypassword' => password_hash($password, PASSWORD_DEFAULT),
                ]);

                header("location: login.php");




            }
        }


    ?>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form class="form-control mt-5" method="POST" action="register.php">
                    <h4 class="text-center mt-3"> Register </h4>
                    <div class="">
                        <label for="" class="col-form-label">Name</label>
                        <div class="">
                            <input type="text" name="username" class="form-control" pattern="^[a-zA-Z\s]*$">
                        </div>
                    </div>
                    <div class="">
                        <label for="" class="col-form-label">Phone Number (8 Numbers)</label>
                        <div class="">
                            <input type="text" name="phonenr" class="form-control" pattern="[0-9]{8}">
                        </div>
                    </div>
                    <div class="">
                        <label for="" class="col-form-label">Address</label>
                        <div class="">
                            <input type="text" name="address" class="form-control">
                        </div>
                    </div>
                    <div class="">
                        <label for="staticEmail" class="col-form-label">Email</label>
                        <div class="">
                            <input type="email" name="email" class="form-control">
                        </div>
                    </div>
                    <div class="">
                        <label for="inputPassword" class="col-form-label" >Password (8 or more characters)</label>
                        <div class="">
                            <input type="password" name="password" class="form-control" id="inputPassword" pattern=".{8,}">
                        </div>
                    </div>
                    <button name="submit" class="w-100 btn btn-lg btn-primary mt-4 mb-4" type="submit">register</button>

                </form>
            </div>
        </div>
    </div>
    <?php require "../includes/footer.php"; ?>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="" crossorigin="anonymous"></script>
  </body>
 
</html>