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

    <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="../assets/img/logo.png" rel="icon">
    <link href="../assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- Grafik -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.3.0/Chart.bundle.js"></script>
    <style>
        .container {
            width: 50%;
            margin: 15px auto;
        }
    </style>
</head>

<body id="page-top">
    <?php include "../templates/sidebar_admin.php"; ?>
    <?php include "../templates/navbar_admin.php"; ?>
    <?php
    if (isset($_SESSION["pesan"])) {
        if ($_SESSION["pesan"] == "sukses") { ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>BERHASIL!!</strong> Pengajuan Berhasil Di Terima
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php unset($_SESSION["pesan"]);
        } elseif ($_SESSION["pesan"] == "gagal") { ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>GAGAL!!!</strong> Pengajuan Gagal Di Terima
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php
            unset($_SESSION["pesan"]);
        } elseif ($_SESSION["pesan"] == "sukses1") { ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>BERHASIL!!</strong> Pengajuan Berhasil Di Tolak
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php unset($_SESSION["pesan"]);
        } elseif ($_SESSION["pesan"] == "gagal1") { ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>GAGAL!!!</strong> Pengajuan Gagal Di Tolak
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
    <?php
            unset($_SESSION["pesan"]);
        }
    }
    $total_ska = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT surat.surat_keluar FROM surat where kode_surat='SKA'"));
    $total_skl = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT surat.surat_keluar FROM surat where kode_surat='SKL'"));
    $total_skbb = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT surat.surat_keluar FROM surat where kode_surat='SKBB'"));
    $total_sl = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT surat.surat_keluar FROM surat where kode_surat='SL'"));
    $total_surat = $total_ska["surat_keluar"] + $total_skl["surat_keluar"] + $total_skbb["surat_keluar"] + $total_sl["surat_keluar"];
    $total_pengajuan = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(pengajuan.status_pengajuan) AS total FROM pengajuan where pengajuan.status_pengajuan='Menunggu'"));
    ?>
    <!-- Awal Isi Konten -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <a href="cetak_laporan.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Cetak Laporan</a>
        </div>
        <!-- Grafik -->
        <?php
        $surat_ska = mysqli_query($koneksi, "SELECT kode_surat FROM pengajuan WHERE kode_surat = 'SKA' ");
        $surat_skl = mysqli_query($koneksi, "SELECT kode_surat FROM pengajuan WHERE kode_surat = 'SKL' ");
        $surat_skbb = mysqli_query($koneksi, "SELECT kode_surat FROM pengajuan WHERE kode_surat = 'SKBB' ");
        ?>
        <div class="container">
            <canvas id="myChart"></canvas>
        </div>
        <script>
            var ctx = document.getElementById("myChart");
            var myChart = new Chart(ctx, {
                // tipe chart
                type: 'bar',
                data: {
                    labels: ['SKA', 'SKL', 'SKBB'],
                    datasets: [{
                        label: 'Jumlah Surat',
                        data: [
                            <?= mysqli_num_rows($surat_ska); ?>,
                            <?= mysqli_num_rows($surat_skl); ?>,
                            <?= mysqli_num_rows($surat_skbb); ?>,
                        ],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(14, 262, 135, 0.2)',
                        ],
                        borderColor: [
                            'rgba(255,99,132,1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        </script>
        <!-- Content Row -->
        <div class="row">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total SURAT
                                    KETERANGAN AKTIF KELUAR</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?= $total_ska["surat_keluar"] ?> Surat
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-paperclip fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">TOTAL SURAT
                                    KETERANGAN LULUS KELUAR</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?= $total_skl["surat_keluar"] ?> Surat
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-paperclip fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">TOTAL SURAT
                                    BERKELAKUAN BAIK KELUAR</div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?= $total_skbb["surat_keluar"] ?> Surat
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-paperclip fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">TOTAL SURAT
                                    LAINNYA KELUAR</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?= $total_sl["surat_keluar"] ?> Surat
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-paperclip fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">TOTAL SEMUA SURAT
                                    KELUAR</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?= $total_surat ?> Surat
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-mail-bulk fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">TOTAL PENGAJUAN
                                    SURAT</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?= $total_pengajuan["total"] ?> Pengajuan
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-mail-bulk fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Content Row -->
    </div>
    <!-- Awal Isi Konten -->
    <div class="container-fluid">
        <!-- Data Tabel -->
        <div class="card shadow mb-4">
            <div class="card-header">
                <div class="d-sm-flex align-items-center justify-content-between">
                    <h4 class="m-0 font-weight-bold text-primary">Pengajuan Terbaru</h4>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nama Lengkap</th>
                                <th>Kode Surat</th>
                                <th>Jenis Surat</th>
                                <th>Waktu Pengajuan</th>
                                <th>Keperluan</th>
                                <th>Jenis Pengajuan</th>
                                <th>Data Siswa</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php include "../db/dashboard.php" ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <?php include "../templates/footer_admin.php"; ?>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

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