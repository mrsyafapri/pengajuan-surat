<?php
include "../connect/koneksi.php";
include "../proses_login/session_login.php";
$username = $_SESSION["username"];
$user = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM user where username='$username'"));
if (isset($_GET['nisn'])) {
  $nisn = $_GET['nisn'];
  $nama_siswa = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT nama FROM siswa WHERE nisn = '$nisn'"));
  $nama = $nama_siswa['nama'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Form Pengajuan Surat</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/7edde9a01a.js" crossorigin="anonymous"></script>

  <!-- Favicons -->
  <link href="../assets/img/desa.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

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
  <?php include "../templates/navbar.php" ?>
  <div class="fix">
    <div class="container" style="margin-top: 40px; margin-bottom: 50px;">
      <h4 class="text-center">Form Pengajuan Surat Aktif</h4>
      <hr>
      <!-- Check NISN of students then fill the other field -->
      <form method="get">
        <div class="form-group">
          <label for="nisn" style="margin-bottom: 5px;">NISN</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <div class="input-group-text " style="height: 38px;"><i class="fas fa-address-card"></i></div>
            </div>
            <input type="number" id="nisn" name="nisn" class="form-control" placeholder="Masukan NISN" style="margin-bottom: 5px;" required>
          </div>
          <button type="submit" class="btn btn-primary" style="margin-top: 10px;">Cek NISN</button>
        </div>
      </form>
      <form action="../tambah_pengajuan/pengajuan_surat.php?kode_surat=SKA" method="POST">
        <div class="form-group">
          <label for="keperluan" style="margin-bottom: 5px;">Keperluan</label>
          <div class="input-group" style="margin-bottom: 5px;">
            <textarea class="form-control" id="keperluan" name="keperluan" rows="3" required autofocus></textarea>
          </div>

          <br>
          <h3>Data Siswa</h3>

          <label for="nis" style="margin-bottom: 5px;">NIS</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <div class="input-group-text " style="height: 38px;"><i class="fas fa-address-card"></i></div>
            </div>
            <input type="number" id="nis" name="nis" class="form-control" placeholder="Masukan NIS" style="margin-bottom: 5px;" required>
          </div>

          <label for="nama" style="margin-bottom: 5px;">Nama Lengkap</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <div class="input-group-text " style="height: 38px;"><i class="fas fa-user"></i></div>
            </div>
            <input type="text" id="nama" name="nama" class="form-control" value="<?php if (isset($_GET["nisn"])) {
                                                                                    echo $nama;
                                                                                  } ?>" placeholder="Masukan Nama" style="margin-bottom: 5px;" required>
          </div>

          <label for="tempat_lahir" style="margin-bottom: 5px;">Tempat Lahir</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <div class="input-group-text " style="height: 38px;"><i class="fas fa-location-arrow"></i></div>
            </div>
            <input type="text" id="tempat_lahir" name="tempat_lahir" value="<?= $user["tempat_lahir"]; ?>" class="form-control" placeholder="Masukan Tempat Lahir" style="margin-bottom: 5px;" required>
          </div>

          <label for="tgl_lahir" style="margin-bottom: 5px;">Tanggal Lahir</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <div class="input-group-text " style="height: 38px;"><i class="fas fa-calendar"></i></div>
            </div>
            <input type="date" id="tgl_lahir" name="tgl_lahir" value="<?= $user["tanggal_lahir"]; ?>" class="form-control" placeholder="Masukan Tanggal Lahir" style="margin-bottom: 5px;" required>
          </div>

          <label for="gender" style="margin-bottom: 5px;">Jenis Kelamin</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <div class="input-group-text " style="height: 38px;"><i class="fas fa-male"></i></div>
            </div>
            <select id="gender" class="form-control form-control" name="gender">
              <option selected>Pilih</option>
              <?php if ($user["gender"] == "Laki-Laki") : ?>
                <option value="Laki-Laki" selected>Laki-Laki</option>
                <option value="Perempuan">Perempuan</option>
              <?php else : ?>
                <option value="Laki-Laki">Laki-Laki</option>
                <option value="Perempuan" selected>Perempuan</option>
              <?php endif; ?>
            </select>
          </div>

          <label for="alamat" style="margin-bottom: 5px;">Alamat</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <div class="input-group-text " style="height: 38px;"><i class="fas fa-location-arrow"></i></div>
            </div>
            <input type="text" id="alamat" name="alamat" class="form-control" value="<?= $user["alamat"]; ?>" placeholder="Masukkan Alamat" style="margin-bottom: 5px;" required>
          </div>

          <label for="kelas" style="margin-bottom: 5px;">Kelas</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <div class="input-group-text " style="height: 38px;"><i class="fas fa-school"></i></div>
            </div>
            <input type="text" id="kelas" name="kelas" class="form-control" placeholder="Masukkan kelas" style="margin-bottom: 5px;" required>
          </div>

          <br>
          <h3>Data Orang Tua</h3>

          <label for="nama_ayah" style="margin-bottom: 5px;">Nama Ayah</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <div class="input-group-text " style="height: 38px;"><i class="fas fa-male"></i></div>
            </div>
            <input type="text" id="nama_ayah" name="nama_ayah" class="form-control" placeholder="Masukkan nama ayah" style="margin-bottom: 5px;" required>
          </div>

          <label for="nama_ibu" style="margin-bottom: 5px;">Nama Ibu</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <div class="input-group-text " style="height: 38px;"><i class="fas fa-female"></i></div>
            </div>
            <input type="text" id="nama_ibu" name="nama_ibu" class="form-control" placeholder="Masukkan nama ibu" style="margin-bottom: 5px;" required>
          </div>

          <label for="pekerjaan_ayah" style="margin-bottom: 5px;">Pekerjaan Ayah</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <div class="input-group-text " style="height: 38px;"><i class="fas fa-address-card"></i></div>
            </div>
            <input type="text" id="pekerjaan_ayah" name="pekerjaan_ayah" class="form-control" placeholder="Masukkan pekerjaan ayah" style="margin-bottom: 5px;" required>
          </div>

          <label for="pekerjaan_ibu" style="margin-bottom: 5px;">Pekerjaan Ibu</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <div class="input-group-text " style="height: 38px;"><i class="fas fa-address-card"></i></div>
            </div>
            <input type="text" id="pekerjaan_ibu" name="pekerjaan_ibu" class="form-control" placeholder="Masukkan pekerjaan ibu" style="margin-bottom: 5px;" required>
          </div>

          <button type="submit" name="button" class="btn btn-primary" style="margin-top: 5px;">Submit</button>
      </form>
    </div>
  </div>
  <!-- End Hero -->
  <?php include "../templates/footer.php" ?>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
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