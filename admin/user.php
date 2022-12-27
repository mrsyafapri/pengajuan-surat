<?php
include "../connect/koneksi.php";
include "../proses_login/session_login.php";
$username = $_SESSION["username"];
$user = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM user where username='$username'"));
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin | User</title>

    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="../assets/img/logo.png" rel="icon">
    <link href="../assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body id="page-top">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <div id="wrapper">
        <?php include "../templates/sidebar_admin.php"; ?>
        <?php include "../templates/navbar_admin.php"; ?>
        <?php
        if (isset($_SESSION["pesan"])) {
            if ($_SESSION["pesan"] == "sukses_hapus") { ?>
                <script>
                    Swal.fire('SUKSES', 'BERHASIL DI HAPUS', 'success')
                </script>
            <?php unset($_SESSION["pesan"]);
            } elseif ($_SESSION["pesan"] == "gagal_hapus") { ?>
                <script>
                    Swal.fire('ERROR', 'GAGAL DI HAPUS ', 'error')
                </script>
            <?php
                unset($_SESSION["pesan"]);
            } elseif ($_SESSION["pesan"] == "sukses_edit") { ?>
                <script>
                    Swal.fire('SUKSES', 'BERHASIL DI UPDATE ', 'success')
                </script>
            <?php
                unset($_SESSION["pesan"]);
            } elseif ($_SESSION["pesan"] == "gagal_edit") { ?>
                <script>
                    Swal.fire('ERROR', 'GAGAL DI UPDATE', 'error')
                </script>
            <?php
                unset($_SESSION["pesan"]);
            } elseif ($_SESSION["pesan"] == "sukses_tambah") { ?>
                <script>
                    Swal.fire('SUKSES', 'BERHASIL DI TAMBAHKAN', 'success')
                </script>
            <?php
                unset($_SESSION["pesan"]);
            } elseif ($_SESSION["pesan"] == "gagal_tambah") { ?>
                <script>
                    Swal.fire('ERROR', 'GAGAL DI TAMBAHKAN', 'error')
                </script>
        <?php
                unset($_SESSION["pesan"]);
            }
        }
        ?>

        <!-- Awal Isi Konten -->
        <div class="container-fluid">
            <!-- Halaman kepala -->
            <h1 class="h3 mb-2 text-gray-800">User</h1>
            <!-- Data Tabel -->
            <div class="card shadow mb-4">
                <div class="card-header">
                    <div class="d-sm-flex align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Daftar Akun Siswa</h6>
                        <a href="../create/user.php" class="btn btn-primary">
                            <i class="fas fa-plus"></i> Tambah Data
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Username</th>
                                    <th>Nama Lengkap</th>
                                    <th>Tempat Lahir</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Agama</th>
                                    <th>Alamat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php include "../db/data_user.php" ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <?php include "../templates/footer_admin.php"; ?>
    </div>

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

    <script>
        $('.tombol-hapus').on('click', function(e) {
            e.preventDefault();
            const href = $(this).attr('href');
            const id = $(this).attr('data-id');
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Data akan di hapus",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Hapus Data'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.location.href = "../delete/user.php?id_user=" + id;
                }
            })
        });
    </script>
</body>

</html>