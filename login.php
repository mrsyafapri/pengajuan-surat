<?php
session_start();
include "connect/koneksi.php";
include "proses_login/verif_login.php";
// di gunakan agar tidak dapat masuk ke tampilan user maupun admin
if (isset($_SESSION['username'])) {
  if ($_SESSION["username"] == "admin") {
    header('Location: admin/dashboard.php');
    exit;
  } else if ($_SESSION["username"] != "admin") {
    header('Location: user/home.php');
    exit;
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="description">
  <meta content="" name="keywords">

  <title>Login</title>

  <script src="https://kit.fontawesome.com/7edde9a01a.js" crossorigin="anonymous"></script>

  <!-- Favicons -->
  <link href="assets/img/logo.png" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex justify-content-between align-items-center">
      <div class="logo">
        <h1><a href="index.php">SMAN 15 Pekanbaru</a></h1>
      </div>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="#">Informasi</a></li>
          <li><a href="#">Pelayanan</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
    </div>
  </header>

  <section id="hero">
    <div class="fix">
      <div class="container">
        <div class="card" style="width: 28rem; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
          <div class="card-body">
            <img src="assets/img/logo.png" alt="" style="width: 100px; margin-left: 35%; margin-bottom: 5%;">
            <h5 class="card-title text-center">Silakan Login</h5>
            <hr>
            <form method="POST">
              <div class="form-group">
                <label for="" style="margin-bottom: 5px;">Username</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text " style="height: 38px;"><i class="fas fa-user"></i></div>
                  </div>
                  <input type="text" name="username" class="form-control" placeholder="Masukkan username" style="margin-bottom: 5px;" autofocus required>
                </div>
              </div>
              <div class="form-group">
                <label for="" style="margin-bottom: 5px;">Password</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text " style="height: 38px;"><i class="fas fa-lock"></i></div>
                  </div>
                  <input type="password" name="password" class="form-control" placeholder="Masukkan password" style="margin-bottom: 5px;" required>
                </div>
              </div>
              <button type="submit" name="button" class="btn btn-get-started">Masuk</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Hero -->

  <?php include "templates/footer.php" ?>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
</body>

</html>