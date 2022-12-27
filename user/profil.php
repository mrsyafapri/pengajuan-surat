<?php include "../proses_login/session_login.php"; ?>
<?php include "../connect/koneksi.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="description">
    <meta content="" name="keywords">

    <title>Profil User</title>

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

    <?php $id_user = $_SESSION['id_user']; ?>

    <main id="main" style="overflow: hidden;">
        <!-- ======= Services Section ======= -->
        <section id="services" class="services">
            <div class="container" style="margin-top: 40PX;">
                <img src="../assets/img/logo.png" alt="" class="img-fluid" style="width: 10%; margin-bottom: 15px; margin-left:200px">
                <h1 style="text-align: center; margin-top: -110px; margin-left: -170px; margin-bottom: 40px; margin-right:-200px">
                    Profil Siswa</h1>
            </div>
            <div class="contaiiner" style="margin:80px; margin-top:100px">
                <div class="card">
                    <div class="card-body" style="background-color:lavender;">
                        <h5 class="card-title"></h5>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col" colspan="2">Identitas Diri</th>
                                    </tr>
                                </thead>
                                <?php
                                $query = mysqli_query($koneksi, "SELECT * FROM user where id_user='$id_user'");
                                while ($data = mysqli_fetch_array($query)) {
                                ?>
                                    <tr>
                                        <td class="fw-bold">Nama Lengkap</td>
                                        <td>
                                            <?php echo $data['nama_lengkap'] ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">Username</td>
                                        <td>
                                            <?php echo $data['username'] ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">Tempat Lahir</td>
                                        <td>
                                            <?php echo $data['tempat_lahir'] ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">Tanggal Lahir</td>
                                        <td>
                                            <?php echo $data['tanggal_lahir'] ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">Jenis Kelamin</td>
                                        <td>
                                            <?php echo $data['gender'] ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">Agama</td>
                                        <td>
                                            <?php echo $data['agama'] ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">Alamat</td>
                                        <td>
                                            <?php echo $data['alamat'] ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </table>
                        </div>
                    </div>
                </div>
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