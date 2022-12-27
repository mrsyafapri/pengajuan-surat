<?php
include "../connect/koneksi.php";
session_start();
$nama = $_POST["nama"];
$username = $_POST["username"];
$password = md5($_POST["password"]);
$up = ucfirst($nama);
$tempat_lahir = $_POST["tempat_lahir"];
$tanggal_lahir = $_POST["tanggal_lahir"];
$gender = $_POST["gender"];
$agama = $_POST["agama"];
$alamat = $_POST["alamat"];

$cek_user = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username'");

if (mysqli_num_rows($cek_user) > 0) {
    $_SESSION["pesan"] = "gagal_tambah";
    header("location: ../admin/user.php");
} else {
    $insert = mysqli_query($koneksi, "INSERT INTO user (username, password, nama_lengkap, tempat_lahir, tanggal_lahir, gender, agama, alamat, role_user) VALUES ('$username', '$password', '$up', '$tempat_lahir', '$tanggal_lahir', '$gender', '$agama', '$alamat', 'Siswa')");
    if ($insert) {
        $_SESSION["pesan"] = "sukses_tambah";
        header("location: ../admin/user.php");
    } else {
        $_SESSION["pesan"] = "gagal_tambah";
        header("location: ../admin/user.php");
    }
}
