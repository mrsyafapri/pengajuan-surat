<?php
include "../connect/koneksi.php";
include "../proses_login/session_login.php";
$username = $_SESSION["username"];
$user = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM user where username='$username'"));
$data = mysqli_query($koneksi, "SELECT * FROM user where user.username is null")
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin | Dashboard</title>
  <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">
  <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="../assets/img/logo.png" rel="icon">
  <link href="../assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body id="page-top">
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <?php include "../templates/sidebar_admin.php"; ?>
  <?php include "../templates/navbar_admin.php"; ?>

  <!-- Awal Isi Konten -->
  <div class="container-fluid">
    <!-- Data Tabel -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tambah User</h6>
      </div>
      <div class="card-body">
        <form action="../proses_data/tambah_user.php" method="POST">
          <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Username</label>
            <div class="col-md-3">
              <input type="text" class="form-control" name="username" placeholder="Masukkan Username" autofocus required>
            </div>
          </div>
          <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Password</label>
            <div class="col-md-3">
              <input type="password" class="form-control" name="password" placeholder="Masukkan Password" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-md-3">
              <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Tempat Lahir</label>
            <div class="col-md-3">
              <input type="text" class="form-control" name="tempat_lahir" placeholder="Masukkan Tempat Lahir" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Tanggal Lahir</label>
            <div class="col-md-3">
              <input type="date" class="form-control" name="tanggal_lahir" placeholder="Masukkan Tanggal Lahir" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Jenis Kelamin</label>
            <div class="col-md-3">
              <select name="gender" id="gender" class="form-control" required>
                <option value="">Pilih Jenis Kelamin</option>
                <option value="Laki-Laki">Laki-Laki</option>
                <option value="Perempuan">Perempuan</option>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Agama</label>
            <div class="col-md-3">
              <select type="text" class="form-control" name="agama" id="agama" required>
                <option value="">Pilih Agama</option>
                <option value="Islam">Islam</option>
                <option value="Kristen Protestan">Kristen Protestan</option>
                <option value="Kristen Katolik">Kristen Katolik</option>
                <option value="Hindu">Hindu</option>
                <option value="Buddha">Buddha</option>
                <option value="Konghucu">Konghucu</option>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Alamat</label>
            <div class="col-md-3">
              <input type="text" class="form-control" name="alamat" placeholder="Masukkan Alamat" required>
            </div>
          </div>

          <div class="form-group row">
            <div class="col-sm-10">
              <button type="submit" class="btn btn-primary" name="tambah_data">Tambah</button>
              <a href="../admin/user.php"><button type="button" class="btn btn-danger" name="batal">Batal</button></a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  <?php include "../templates/footer_admin.php"; ?>

  <!-- Bootstrap core JavaScript-->
  <script src="../assets/vendor/jquery/jquery.min.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/js/js_sidebar.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../assets/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="../assets/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="../assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="../assets/js/demo/datatables-demo.js"></script>
</body>

</html>