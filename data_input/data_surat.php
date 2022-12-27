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
    <title>Admin | Inputan SKA</title>

    <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="../assets/img/logo.png" rel="icon">
    <link href="../assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body>
    <?php include "../templates/sidebar_admin.php"; ?>
    <?php include "../templates/navbar_admin.php"; ?>
    <?php
    $id_pengajuan = $_GET["id_pengajuan"];
    $kode_surat = $_GET["kode_surat"];
    if ($kode_surat == "SKA") {
        $tb_name = "s_aktif";
        $id_col = "id_pengajuan_ska";
    } else if ($kode_surat == "SKBB") {
        $tb_name = "s_berkelakuan_baik";
        $id_col = "id_pengajuan_skbb";
    } else if ($kode_surat == "SKL") {
        $tb_name = "s_lulus";
        $id_col = "id_pengajuan_skl";
    } else if ($kode_surat == "SL") {
        $tb_name = "s_lainnya";
        $id_col = "id_pengajuan_sl";
    }
    $data_surat = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM $tb_name, pengajuan where $id_col=$id_pengajuan"));
    ?>
    <div class="container-fluid">
        <!-- Data Tabel -->
        <div class="card shadow mb-4">
            <div class="card-header">
                <div class="d-sm-flex align-items-center justify-content-between">
                    <h4 class="m-0 font-weight-bold text-primary">Data Siswa Untuk Surat Keterangan
                        <?php
                        if ($kode_surat == "SKA") {
                            echo "Aktif";
                        } else if ($kode_surat == "SKBB") {
                            echo "Berkelakuan Baik";
                        } else if ($kode_surat == "SKL") {
                            echo "Lulus";
                        } else if ($kode_surat == "SL") {
                            echo "Lainnya";
                        }
                        ?>
                    </h4>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Jenis Data</th>
                                <th>Inputan Siswa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1.</td>
                                <td>Nama Lengkap</td>
                                <td><?= $data_surat["nama"]; ?></td>
                            </tr>
                            <tr>
                                <td>2.</td>
                                <td>Tempat/Tanggal Lahir</td>
                                <td><?= $data_surat["tempat_lahir"]; ?>, <?php
                                                                            $date = date_create($data_surat["tgl_lahir"]);
                                                                            echo date_format($date, "d F Y");
                                                                            ?></td>
                            </tr>
                            <tr>
                                <td>3.</td>
                                <td>NISN/NIS</td>
                                <td><?= $data_surat["nisn"]; ?> / <?= $data_surat["nis"]; ?></td>
                            </tr>
                            <tr>
                                <td>4.</td>
                                <td>Jenis Kelamin</td>
                                <td><?= $data_surat["gender"]; ?></td>
                            </tr>
                            <tr>
                                <td>5.</td>
                                <td>Kelas</td>
                                <td><?= $data_surat["kelas"]; ?></td>
                            </tr>
                            <tr>
                                <td>6.</td>
                                <td>Alamat Rumah</td>
                                <td><?= $data_surat["alamat"]; ?></td>
                            </tr>
                            <tr>
                                <td>7.</td>
                                <td>Nama Ayah</td>
                                <td><?= $data_surat["nama_ayah"]; ?></td>
                            </tr>
                            <tr>
                                <td>8.</td>
                                <td>Nama Ibu</td>
                                <td><?= $data_surat["nama_ibu"]; ?></td>
                            </tr>
                            <tr>
                                <td>9.</td>
                                <td>Pekerjaan Ayah</td>
                                <td><?= $data_surat["pekerjaan_ayah"]; ?></td>
                            </tr>
                            <tr>
                                <td>10.</td>
                                <td>Pekerjaan Ibu</td>
                                <td><?= $data_surat["pekerjaan_ibu"]; ?></td>
                            </tr>
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