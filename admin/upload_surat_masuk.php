<?php
include "../connect/koneksi.php";
include "../proses_login/session_login.php";
$username = $_SESSION["username"];
$user = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM user where username='$username'"));
$nama = $user["nama_lengkap"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Dashboard</title>

    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="../assets/img/logo.png" rel="icon">
    <link href="../assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php include "../templates/sidebar_admin.php"; ?>
    <?php include "../templates/navbar_admin.php"; ?>

    <!-- Awal Isi Konten -->
    <div class="container-fluid">
        <!-- Data Tabel -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Surat Masuk</h6>
            </div>
            <div class="card-body">
                <form action="../tambah_data/tambah_surat_masuk.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label for="input_nama_barang" class="col-sm-2 col-form-label">Nomor Surat</label>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="nomor_surat" placeholder="Masukkan Nomor Surat">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="jenis_surat" class="col-sm-2 col-form-label">Jenis Surat</label>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="jenis_surat" placeholder="Masukkan Jenis Surat">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tgl_surat_masuk" class="col-sm-2 col-form-label">Tanggal Surat Masuk</label>
                        <div class="col-md-3">
                            <input type="date" class="form-control" name="tgl_surat_masuk" placeholder="Masukkan Nama">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="file" class="col-sm-2 col-form-label">File Surat</label>
                        <div class="col-md-3">
                            <input type="file" class="form-control" name="file" placeholder="Masukkan file">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary" name="tambah_data">Tambah</button>
                            <a href="../admin/surat_masuk.php"><button type="button" class="btn btn-danger" name="batal">Batal</button></a>
                        </div>
                    </div>
                    <?php
                    if (isset($_SESSION["pesan"])) {
                        if ($_SESSION["pesan"] == "sukses") { ?>
                            <script>
                                Swal.fire('SUKSES', 'DATA BERHASIL DI TAMBAHKAN', 'success')
                            </script>
                        <?php unset($_SESSION["pesan"]);
                        } elseif ($_SESSION["pesan"] == "gagal") { ?>
                            <script>
                                Swal.fire('ERROR', 'DATA GAGAL DI TAMBAHKAN', 'error')
                            </script>
                    <?php
                            unset($_SESSION["pesan"]);
                        }
                    }
                    ?>
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