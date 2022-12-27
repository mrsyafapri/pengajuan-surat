<?php include "../proses_login/session_login.php"; ?>
<?php include "../connect/koneksi.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Riwayat</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

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
  <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

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

  $id_user = $_SESSION['id_user'];

  $data_pengajuan = mysqli_query($koneksi, "SELECT pengajuan.id_pengajuan, pengajuan.status_pengajuan, pengajuan.tgl_pengajuan, pengajuan.jenis_pengajuan, surat.jenis_surat FROM pengajuan INNER JOIN surat USING(kode_surat) WHERE pengajuan.id_user = '$id_user'");
  ?>

  <main id="main" style="overflow: hidden;">
    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container" style="margin-top: 40PX;">
        <img src="../assets/img/logo.png" alt="" class="img-fluid" style="width: 10%; margin-top: 15PX; margin-bottom: 15px; margin-left:180px">
        <h1 style="text-align: center; margin-top: -110px; margin-left: -75px; margin-bottom: 40px; margin-right:-140px">Riwayat Pengajuan Surat</h1>
      </div>
      <div class="container" style="margin:100px; margin-top:100px">
        <?php
        if (mysqli_fetch_assoc($data_pengajuan) == NULL) {
          echo '<h1>Tidak Ada Pengajuan Surat<h1>';
        } else {
          $y = 0;
          foreach ($data_pengajuan as $row) {
            $id_pengajuan = $row['id_pengajuan'];
            $data_arsip_surat = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM arsip_surat INNER JOIN pengajuan USING(id_pengajuan) INNER JOIN user USING(id_user) WHERE user.id_user= '$id_user' and pengajuan.id_pengajuan = $id_pengajuan "));
            $tanggal_start = $row["tgl_pengajuan"];
            $tanggal_end = date("Y-m-d h:i:sa");
            $datetime1 = new DateTime($tanggal_start);
            $datetime2 = new DateTime($tanggal_end);
            $durasi = $datetime1->diff($datetime2);
            if ($row['status_pengajuan'] == 'Di Terima' || $row['status_pengajuan'] == 'Revisi Di Terima' || $row['status_pengajuan'] == 'Revisi Selesai') {
              if ($data_arsip_surat['file_surat'] != '') {
                if ($row['jenis_pengajuan'] == 'Baru') { ?>
                  <div class="card w-70" style="margin-bottom: 15px;">
                    <div class="card-body" style="background-color:lavender;">
                      <h5 class="card-title"><?= $row['jenis_surat'] ?></h5>
                      <h5 class="card-title" style="text-align: right;">
                        <span class="badge bg-success">Pengajuan Surat Selesai</span>
                      </h5>
                      <p>Tanggal pengajuan : <?= $tanggal_start; ?></p>
                      <a href="../surat_keluar/<?= $data_arsip_surat['file_surat'] ?>" class="btn btn-primary">
                        <i class="fas fa-download"></i> Download Surat</a>
                      </a>
                      <a href="../form_input/form_revisi.php?id_pengajuan=<?= $row['id_pengajuan'] ?>" class="btn btn-primary">
                        <i class="fas fa-edit"></i> Ajukan Revisi</a>
                      </a>
                    </div>
                  </div>
                  <?php } else {
                  if ($row['status_pengajuan'] == 'Revisi Di Terima') { ?>
                    <div class="card w-70" style="margin-bottom: 15px;">
                      <div class="card-body" style="background-color:lavender;">
                        <h5 class="card-title"><?= $row['jenis_surat'] ?></h5>
                        <small>Surat Sedang Di Revisi</small>
                        <h5 class="card-title" style="text-align: right;">
                          <span class="badge bg-warning">Pengajuan Revisi Di Terima</span>
                        </h5>
                        <p>Tanggal pengajuan : <?= $tanggal_start; ?></p>
                        <p>Durasi Pengerjaan Surat :<?= $durasi->format('%Y tahun %m bulan %d hari %H : %i : %s'); ?></p>
                        <a href="../surat_keluar/<?= $data_arsip_surat['file_surat'] ?>" class="btn btn-primary">
                          <i class="fas fa-download"></i> Download Surat Sebelumnya
                        </a>
                      </div>
                    </div>
                  <?php } else if ($row['status_pengajuan'] == 'Revisi Selesai') { ?>
                    <div class="card w-70" style="margin-bottom: 15px;">
                      <div class="card-body" style="background-color:lavender;">
                        <h5 class="card-title"><?= $row['jenis_surat'] ?></h5>
                        <h5 class="card-title" style="text-align: right;">
                          <span class="badge bg-success">Pengajuan Revisi Selesai</span>
                        </h5>
                        <p>Tanggal pengajuan : <?= $tanggal_start; ?></p>
                        <a href="../surat_keluar/<?= $data_arsip_surat['file_surat'] ?>" class="btn btn-primary">
                          <i class="fas fa-download"></i> Download Surat</a>
                        </a>
                        <a href="../form_input/form_revisi.php?id_pengajuan=<?= $row['id_pengajuan'] ?>" class="btn btn-primary">
                          <i class="fas fa-edit"></i> Ajukan Revisi</a>
                        </a>
                      </div>
                    </div>
                <?php }
                }
              } else { ?>
                <div class="card w-70" style="margin-bottom: 15px;">
                  <div class="card-body" style="background-color:lavender;">
                    <h5 class="card-title"><?= $row['jenis_surat'] ?></h5>
                    <small>Surat Sedang Dalam Proses Pembuatan</small>
                    <h5 class="card-title" style="text-align: right;">
                      <span class="badge bg-warning">Pengajuan Di Terima</span>
                    </h5>
                    <p>Tanggal pengajuan : <?= $tanggal_start; ?></p>
                    <p>Durasi Pengerjaan Surat : <?= $durasi->format('%Y tahun %m bulan %d hari %H : %i : %s'); ?></p>
                    <small class="text-danger">Nb : Mohon cek secara berkala untuk mengetahui surat telah siap diunduh</small>
                  </div>
                </div>
              <?php }
            } elseif ($row['status_pengajuan'] == 'Menunggu') {
              if ($row['jenis_pengajuan'] == 'Baru') { ?>
                <div class="card w-70" style="margin-bottom: 15px;">
                  <div class="card-body" style="background-color:lavender;">
                    <h5 class="card-title"><?= $row['jenis_surat'] ?></h5>
                    <small>Surat Sedang Dalam Proses Pengajuan Mohon Di Tunggu</small>
                    <h5 class="card-title" style="text-align: right;">
                      <span class="badge bg-warning">Proses Pengajuan</span>
                    </h5>
                    <p>Tanggal pengajuan : <?= $tanggal_start; ?></p>
                    <p>Durasi Pengerjaan Surat : <?= $durasi->format('%Y tahun %m bulan %d hari %H : %i : %s'); ?></p>
                    <small class="text-danger">Nb : Mohon cek secara berkala untuk mengetahui surat telah siap diunduh</small>
                  </div>
                </div>
              <?php } else { ?>
                <div class="card w-70" style="margin-bottom: 15px;">
                  <div class="card-body" style="background-color:lavender;">
                    <h5 class="card-title"><?= $row['jenis_surat'] ?></h5>
                    <small>Surat Sedang Dalam Proses Pengajuan Revisi</small>
                    <h5 class="card-title" style="text-align: right;">
                      <span class="badge bg-warning">Proses Pengajuan Revisi</span>
                    </h5>
                    <p>Tanggal pengajuan : <?= $tanggal_start; ?></p>
                    <p>Durasi Pengerjaan Surat : <?= $durasi->format('%Y tahun %m bulan %d hari %H : %i : %s'); ?></p>
                    <a href="../surat_keluar/<?= $data_arsip_surat['file_surat'] ?>" class="btn btn-primary">
                      <i class="fas fa-download"></i> Download Surat Sebelumnya
                    </a>
                  </div>
                </div>
              <?php } ?>
            <?php } elseif ($row['status_pengajuan'] == 'Di Tolak') { ?>
              <div class="card w-70" style="margin-bottom: 15px;">
                <div class="card-body" style="background-color:lavender;">
                  <h5 class="card-title"><?= $row['jenis_surat'] ?></h5>
                  <small>Pengajuan Surat Anda Di Tolak Mohon Memasukkan Data Diri Dengan Benar</small>
                  <h5 class="card-title" style="text-align: right;">
                    <span class="badge bg-danger">Pengajuan Di Tolak</span>
                  </h5>
                  <p>Tanggal pengajuan : <?= $tanggal_start; ?></p>
                </div>
              </div>
            <?php } ?>
        <?php $y++;
          }
        } ?>
      </div>
    </section><!-- End Services Section -->
  </main><!-- End #main -->

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