<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="fonts/icomoon/style.css">

  <link rel="stylesheet" href="css/owl.carousel.min.css">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">

  <!-- Style -->
  <link rel="stylesheet" href="css/style.css">

  <title>Login #8</title>
</head>

<?php
if (isset($_POST['submit'])) {
  require_once 'dbkoneksi.php';

  $user = $dbh->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
  $user->execute([
    $_POST['email'], $_POST['password']
  ]);

  $count = $user->rowCount(); //untuk memastikan apakah user tersedia atau tidak.

  // Jika berhasil login
  if ($count > 0) {
    session_start();

    $_SESSION['user'] = $user->fetch();
    header("location:index.php");
  } else { //Jika gagal login
    header("location:login.php");
  }
}
?>

<body>
  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-6 order-md-2">
          <img src="images/undraw_file_sync_ot38.svg" alt="Image" class="img-fluid">
        </div>
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="mb-4">
                <h3>Sign In to <strong>Puskesmas SA</strong></h3>
                <p class="mb-4">Connect with Puskesmas SA</p>
              </div>
              <form action="" method="POST">
                <div class="form-group first">
                  <label for="">Email</label>
                  <input type="email" class="form-control" name="email" required>

                </div>
                <div class="form-group last mb-4">
                  <label for="">Password</label>
                  <input type="password" class="form-control" name="password" required>

                </div>

                <div class="d-flex mb-5 align-items-center">
                  <label class="control control--checkbox mb-0"><span class="caption">Remember me</span>
                    <input type="checkbox" checked="checked" />
                    <div class="control__indicator"></div>
                  </label>
                  <span class="ml-auto"><a href="#" class="forgot-pass">Forgot Password</a></span>
                </div>

                <button type="submit" name="submit" class="btn text-white btn-block btn-primary">Log In</button>


            </div>
            </form>
          </div>
        </div>

      </div>

    </div>
  </div>
  </div>


  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
</body>

</html>