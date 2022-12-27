<?php include "../proses_login/session_login.php"; ?>
<?php include "../connect/koneksi.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="description">
    <meta content="" name="keywords">

    <title>Jadwal Kerja</title>

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

    <main id="main" style="overflow: hidden;">
        <!-- ======= Services Section ======= -->
        <section id="services" class="services">
            <div class="container" style="margin-top: 40px;">
                <img src="../assets/img/logo.png" alt="" class="img-fluid" style="width: 10%; margin-top: 15px; margin-bottom: 15px; margin-left:100px">
                <h1 style="text-align: center; margin-top: -120px; margin-left: -75px; margin-bottom: 40px; margin-right:-200px">Jam Kerja Tata Usaha SMAN 15 Pekanbaru</h1>
            </div>
            <div class="contaiiner" style="margin:100px; margin-top:100px">
                <div class="card">
                    <div class="card-body" style="background-color:lavender;">
                        <h5 class="card-title"></h5>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Hari</th>
                                        <th scope="col">Buka</th>
                                        <th scope="col">Tutup</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Senin</td>
                                        <td>08.00</td>
                                        <td>16.00</td>
                                    </tr>
                                    <tr>
                                        <td>Selasa</td>
                                        <td>08.00</td>
                                        <td>16.00</td>
                                    </tr>
                                    <tr>
                                        <td>Rabu</td>
                                        <td>08.00</td>
                                        <td>16.00</td>
                                    </tr>
                                    <tr>
                                        <td>Kamis</td>
                                        <td>08.00</td>
                                        <td>16.00</td>
                                    </tr>
                                    <tr>
                                        <td>Jum'at</td>
                                        <td>08.00</td>
                                        <td>16.00</td>
                                    </tr>
                                    <tr>
                                        <td>Sabtu</td>
                                        <td>08.00</td>
                                        <td>13.00</td>
                                    </tr>
                                    <tr>
                                        <td>Minggu</td>
                                        <td colspan="2" align="center">Libur</td>
                                    </tr>
                                </tbody>
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