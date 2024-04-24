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
  if(isset($_POST['submit'])) {

      if(isset($_SESSION['username'])) {
          header("location: ".APPURL."");
      }
      if (empty($_POST['email']) or empty($_POST['password'])) {
          echo "<script>alert('one or more inputs missing');</script>";
      } else {
          $email = $_POST['email'];
          $password = $_POST['password'];

          $login = $conn->query("SELECT * FROM users WHERE email='$email'");
          $login->execute();

          $fetch = $login->fetch(PDO::FETCH_ASSOC);

          if($login->rowCount() > 0) {
              if(password_verify($password, $fetch['mypassword'])) {
                  $_SESSION['username'] = $fetch['username'];
                  $_SESSION['user_id'] = $fetch['id'];

                  header("location: ".APPURL."");

              } else {
                  echo "<script>alert('password or email is incorrect');</script>";
              }
          } else {
              echo "<script>alert('password or email is incorrect');</script>";
          }
      }
  }





  ?>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form class="form-control mt-5" method="POST" action="login.php">
                    <h4 class="text-center mt-3"> Login </h4>
                   
                    <div class="">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="">
                            <input type="email" name="email" class="form-control">
                        </div>
                    </div>
                    <div class="">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                        <div class="">
                            <input type="password" name="password" class="form-control" id="inputPassword">
                        </div>
                    </div>
                    <button class="w-100 btn btn-lg btn-primary mt-4 mb-4" name="submit" type="submit">login</button>

                </form>
            </div>
        </div>
        <?php require "../includes/footer.php"; ?>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="" crossorigin="anonymous"></script>
  </body>
 
</html>