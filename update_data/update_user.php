<?php
session_start();
include "../connect/koneksi.php";
$id_user = $_POST["id_user"];
$nama = $_POST["nama"];
$username = $_POST["username"];
$password = md5($_POST["password"]);
$tempat_lahir = $_POST["tempat_lahir"];
$tanggal_lahir = $_POST["tanggal_lahir"];
$gender = $_POST["gender"];
$agama = $_POST["agama"];
$alamat = $_POST["alamat"];

$update = mysqli_query($koneksi, "UPDATE user SET username='$username', password='$password', nama_lengkap='$nama', tempat_lahir= '$tempat_lahir', tanggal_lahir= '$tanggal_lahir', gender= '$gender', agama='$agama', alamat='$alamat' WHERE id_user='$id_user'");
// cek data berhasil di masukkan atau tidak
if ($update) {
    header("location: ../admin/user.php");
    $_SESSION["pesan"] = "sukses_edit";
} else {
    header("location: ../admin/user.php");
    $_SESSION["pesan"] = "gagal_edit";
}
