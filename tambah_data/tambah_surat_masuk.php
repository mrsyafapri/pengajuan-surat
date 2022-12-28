<?php
include "../connect/koneksi.php";
session_start();
$username = $_SESSION["username"];
$user = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM user where username='$username'"));
$id_user = $user["id_user"];
$nomor_surat = $_POST["nomor_surat"];
$jenis_surat = $_POST["jenis_surat"];
$tgl = $_POST["tgl_surat_masuk"];
$nama_file = $_FILES["file"]["name"];
$size = $_FILES["file"]["size"];
$lokasi = $_FILES["file"]["tmp_name"];
$error = $_FILES["file"]["error"];
$pemisah = explode('.', $nama_file);
$ekstention = strtolower(end($pemisah));
$namaBaru = $nomor_surat . '-' . $jenis_surat . '-' . $tgl . '.' . $ekstention;

if (in_array($ekstention, ['doc', 'docx', 'pdf']) and $size <= 10000000 and $error == 0) {
    if (move_uploaded_file($lokasi, "../surat_masuk/" . $namaBaru)) {
        $tambah = mysqli_query($koneksi, "INSERT INTO surat_masuk(nomor_surat, id_user, jenis_surat, file_surat, tgl_surat_masuk)VALUES('$nomor_surat', '$id_user','$jenis_surat', '$namaBaru', '$tgl')");
        if ($tambah) {
            header("Location: ../admin/surat_masuk.php");
            $_SESSION["pesan"] = "sukses";
            echo "Berhasil";
        } else {
            header("Location: ../admin/surat_masuk.php");
            $_SESSION["pesan"] = "gagal";
            echo "Gagal";
        }
    } else {
        header("Location: ../admin/surat_masuk.php");
        $_SESSION["pesan"] = "gagal";
        echo "Gagal";
    }
} else {
    header("Location: ../admin/surat_masuk.php");
    $_SESSION["pesan"] = "gagal";
    echo "Gagal";
}
