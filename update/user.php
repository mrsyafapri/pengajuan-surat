<?php
include "../connect/koneksi.php";
include "../proses_login/session_login.php";
$username = $_SESSION["username"];
$user = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM user where username='$username'"));
$nama = $user["nama_lengkap"];
$id_user = $user["id_user"]
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
  <link href="../assets/assets/img/desa.png" rel="icon">
  <link href="../assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body id="page-top">
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <?php include "../templates/sidebar_admin.php"; ?>
  <?php include "../templates/navbar_admin.php";
  $id_user = $_GET["id_user"];
  $data = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * from user where id_user='$id_user'"));
  ?>

  <!-- Awal Isi Konten -->
  <div class="container-fluid">
    <!-- Data Tabel -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit User</h6>
      </div>
      <div class="card-body">
        <form action="../update_data/update_user.php" method="POST">
          <div class="form-group row d-none">
            <label for="input_nama_barang" class="col-sm-2 col-form-label">ID</label>
            <div class="col-md-3">
              <input type="text" class="form-control" name="id_user" placeholder="Masukkan ID" value="<?= $data['id_user'] ?>">
            </div>
          </div>
          <div class="form-group row">
            <label for="input_nama_barang" class="col-sm-2 col-form-label">Username</label>
            <div class="col-md-3">
              <input type="text" class="form-control" name="username" placeholder="Masukkan Username" value="<?= $data['username'] ?>" autofocus required>
            </div>
          </div>
          <div class="form-group row">
            <label for="input_nama_barang" class="col-sm-2 col-form-label">Password</label>
            <div class="col-md-3">
              <input type="password" class="form-control" name="password" placeholder="Masukkan Password" value="<?= md5($data['password']) ?>" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="input_nama_barang" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-md-3">
              <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama" value="<?= $data['nama_lengkap'] ?>" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Tempat Lahir</label>
            <div class="col-md-3">
              <input type="text" class="form-control" name="tempat_lahir" placeholder="Masukkan Tempat Lahir" value="<?= $data['tempat_lahir'] ?>" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Tanggal Lahir</label>
            <div class="col-md-3">
              <input type="date" class="form-control" name="tanggal_lahir" placeholder="Masukkan Tanggal Lahir" value="<?= $data['tanggal_lahir'] ?>" required>
            </div>
          </div>

          <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Jenis Kelamin</label>
            <div class="col-md-3">
              <select name="gender" id="gender" class="form-control" placeholder="Pilih Jenis Kelamin" required>
                <?php if ($data["gender"] == "Laki-Laki") : ?>
                  <option value="Laki-Laki" selected>Laki-Laki</option>
                  <option value="Perempuan">Perempuan</option>
                <?php else : ?>
                  <option value="Laki-Laki">Laki-Laki</option>
                  <option value="Perempuan" selected>Perempuan</option>
                <?php endif; ?>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Agama</label>
            <div class="col-md-3">
              <select name="agama" id="agama" class="form-control" placeholder="Pilih Agama" required>
                <option value="Islam" <?php if ($data['agama'] == "Islam") echo "selected"; ?>>Islam</option>
                <option value="Kristen Protestan" <?php if ($data['agama'] == "Kristen Protestan") echo "selected"; ?>>Kristen Protestan</option>
                <option value="Kristen Katolik" <?php if ($data['agama'] == "Kristen Katolik") echo "selected"; ?>>Kristen Katolik</option>
                <option value="Hindu" <?php if ($data['agama'] == "Hindu") echo "selected"; ?>>Hindu</option>
                <option value="Buddha" <?php if ($data['agama'] == "Buddha") echo "selected"; ?>>Buddha</option>
                <option value="Konghucu" <?php if ($data['agama'] == "Konghucu") echo "selected"; ?>>Konghucu</option>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Alamat</label>
            <div class="col-md-3">
              <input type="text" class="form-control" name="alamat" placeholder="Masukkan Alamat" value="<?= $data['alamat'] ?>" required>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-10">
              <button type="submit" class="btn btn-primary" name="update_user">Update</button>
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