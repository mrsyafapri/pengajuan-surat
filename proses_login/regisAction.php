<?php
include "../connect/koneksi.php";
if (isset($_POST["button"])) {
    $nama_lengkap = $_POST["nama_lengkap"];
    $tempat_lahir = $_POST["tempat_lahir"];
    $tanggal_lahir = $_POST["tanggal_lahir"];
    $gender = $_POST["gender"];
    $agama = $_POST["agama"];
    $alamat = $_POST["alamat"];
    $username = $_POST["username"];
    $password = md5($_POST["password"]);

    if ($nik and $nama_lengkap and $tempat_lahir and $tanggal_lahir and $gender and $agama and $alamat and $username and $password) {
        $insert = mysqli_query($koneksi, "INSERT INTO user (nama_lengkap, tempat_lahir, tanggal_lahir, gender, agama, alamat, username, password) 
                                VALUES ('$nama_lengkap', '$tempat_lahir', '$tanggal_lahir', '$gender', '$agama', '$alamat', '$username', '$password')");

        if ($insert) { ?>
            <script>
                location.href = "login.php"
            </script>
    <?php } else {
            header("Location: register.php");
        }
    } else ?>
    <div style="color: red; margin: 5px;"><i>
            <?= "Inputan Tidak Boleh Kosong"; ?>
        </i></div>
<?php } ?>