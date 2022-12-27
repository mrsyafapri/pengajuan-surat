<?php
include "../connect/koneksi.php";
session_start();
$id_user = $_GET["id_user"];
$delete = mysqli_query($koneksi, "DELETE FROM user WHERE id_user = '$id_user'");
if ($delete) {
    $_SESSION["pesan"] = "sukses_hapus";
    header("Location: ../admin/user.php");
} else {
    $_SESSION["pesan"] = "gagal_hapus";
    header("Location: ../admin/user.php");
}
