<?php include "../proses_login/session_login.php"; ?>
<?php include "../connect/koneksi.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="description">
  <meta content="" name="keywords">

  <title>Beranda</title>

  <!-- Favicons -->
  <link href="../assets/img/logo.png" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">
</head>

<body>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <?php include "../templates/navbar.php" ?>

  <!-- ======= Hero Section ======= -->
  <?php
  if (isset($_SESSION["pesan"])) {
    if ($_SESSION["pesan"] == "sukses") { ?>
      <script>
        Swal.fire('SUKSES', 'PENGAJUAN SUKSES', 'success')
      </script>
    <?php unset($_SESSION["pesan"]);
    } elseif ($_SESSION["pesan"] == "gagal") { ?>
      <script>
        Swal.fire('ERROR', 'PENGAJUAN GAGAL', 'error')
      </script>
  <?php
      unset($_SESSION["pesan"]);
    }
  }
  ?>

  <main id="main">
    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container">
        <img src="../assets/img/logo.png" alt="" class="img-fluid" style="width: 8%; margin-top: 25PX; margin-bottom: 15px;">
        <h1 style="text-align: center; margin-top: -100px; margin-left: 50px; margin-bottom: 40px;">Layanan Surat
          Online SMAN 15 Pekanbaru</h1>

        <div class="row">
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
            <a href="../form_input/form_pengajuan.php?kode_surat=SKA" style="color:black">
              <div class="icon-box">
                <div class="icon"><i class="bx bx-world"></i></div>
                <h4>Surat Keterangan Aktif</h4>
                <p>Pengajuan Surat Keterangan Aktif SMAN 15 Pekanbaru</p>
              </div>
            </a>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
            <a href="../form_input/form_pengajuan.php?kode_surat=SKL" style="color:black">
              <div class="icon-box">
                <div class="icon"><i class="bx bx-arch"></i></div>
                <h4>Surat Keterangan Lulus</h4>
                <p>Pengajuan Surat Keterangan Lulus SMAN 15 Pekanbaru</p>
              </div>
            </a>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
            <a href="../form_input/form_pengajuan.php?kode_surat=SKBB" style="color:black">
              <div class="icon-box">
                <div class="icon"><i class="bx bx-file"></i></div>
                <h4>Surat Keterangan Berkelakuan Baik</h4>
                <p>Pengajuan Surat Keterangan Berkelakuan Baik SMAN 15 Pekanbaru</p>
              </div>
            </a>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
            <a href="../form_input/form_pengajuan.php?kode_surat=SL" style="color:black">
              <div class="icon-box">
                <div class="icon"><i class='bx bx-chalkboard'></i></div>
                <h4>Surat Lainnya</h4>
                <p>Pengajuan Surat Lainnya SMAN 15 Pekanbaru</p>
              </div>
            </a>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include "../templates/footer.php" ?>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/jquery/jquery.min.js"></script>
  <script src="../assets/vendor/purecounter/purecounter.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="../assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>
</body>

</html>