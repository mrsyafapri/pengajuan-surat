<?php
include "../connect/koneksi.php";
session_start();
$id_pengajuan = $_GET["id_pengajuan"];
$update = mysqli_query($koneksi, "UPDATE pengajuan SET pengajuan.status_pengajuan='Di Tolak' where pengajuan.id_pengajuan=$id_pengajuan");

if ($update) {
    $_SESSION["pesan"] = "sukses1";
    header("location: ../admin/dashboard.php");
    echo "Berhasil";
} else {
    $_SESSION["pesan"] = "gagal1";
    header("location: ../admin/dashboard.php");
    echo "Gagal";
}
