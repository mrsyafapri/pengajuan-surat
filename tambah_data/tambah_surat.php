<?php
include "../connect/koneksi.php";
session_start();
$nisn = $_GET["nisn"];
$nis = $_GET["nis"];
$nama = $_GET["nama"];
$tempat_lahir = $_GET["tempat_lahir"];
$tgl_lahir = $_GET["tgl_lahir"];
$gender = $_GET["gender"];
$alamat = $_GET["alamat"];
$kelas = $_GET["kelas"];
$nama_ayah = $_GET["nama_ayah"];
$nama_ibu = $_GET["nama_ibu"];
$pekerjaan_ayah = $_GET["pekerjaan_ayah"];
$pekerjaan_ibu = $_GET["pekerjaan_ibu"];
$id_user = $_SESSION['id_user'];
$kode_surat = $_GET["kode_surat"];
$tgl = $_GET["tgl"];

$tb_pengajuan = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT pengajuan.id_pengajuan FROM pengajuan WHERE pengajuan.id_user='$id_user' AND pengajuan.tgl_pengajuan='$tgl'"));

$id_pengajuan = $tb_pengajuan["id_pengajuan"];
if ($kode_surat == "SKA") {
    $tambah = mysqli_query($koneksi, "INSERT INTO s_aktif(id_pengajuan_ska, kode_surat, nisn, nis, nama, tempat_lahir, tgl_lahir, gender, alamat, kelas, nama_ayah, nama_ibu, pekerjaan_ayah, pekerjaan_ibu) 
                            VALUES('$id_pengajuan', '$kode_surat', '$nisn', '$nis', '$nama', '$tempat_lahir', '$tgl_lahir', '$gender', '$alamat', '$kelas', '$nama_ayah', '$nama_ibu', '$pekerjaan_ayah', '$pekerjaan_ibu')");
} else if ($kode_surat == "SKBB") {
    $tambah = mysqli_query($koneksi, "INSERT INTO s_berkelakuan_baik(id_pengajuan_skbb, kode_surat, nisn, nis, nama, tempat_lahir, tgl_lahir, gender, alamat, kelas, nama_ayah, nama_ibu, pekerjaan_ayah, pekerjaan_ibu) 
    VALUES('$id_pengajuan', '$kode_surat', '$nisn', '$nis', '$nama', '$tempat_lahir', '$tgl_lahir', '$gender', '$alamat', '$kelas', '$nama_ayah', '$nama_ibu', '$pekerjaan_ayah', '$pekerjaan_ibu')");
} else if ($kode_surat == "SKL") {
    $tambah = mysqli_query($koneksi, "INSERT INTO s_lulus(id_pengajuan_skl, kode_surat, nisn, nis, nama, tempat_lahir, tgl_lahir, gender, alamat, kelas, nama_ayah, nama_ibu, pekerjaan_ayah, pekerjaan_ibu) 
                            VALUES('$id_pengajuan', '$kode_surat', '$nisn', '$nis', '$nama', '$tempat_lahir', '$tgl_lahir', '$gender', '$alamat', '$kelas', '$nama_ayah', '$nama_ibu', '$pekerjaan_ayah', '$pekerjaan_ibu')");
} else if ($kode_surat == "SL") {
    $tambah = mysqli_query($koneksi, "INSERT INTO s_lainnya(id_pengajuan_sl, kode_surat, nisn, nis, nama, tempat_lahir, tgl_lahir, gender, alamat, kelas, nama_ayah, nama_ibu, pekerjaan_ayah, pekerjaan_ibu) 
                            VALUES('$id_pengajuan', '$kode_surat', '$nisn', '$nis', '$nama', '$tempat_lahir', '$tgl_lahir', '$gender', '$alamat', '$kelas', '$nama_ayah', '$nama_ibu', '$pekerjaan_ayah', '$pekerjaan_ibu')");
}

if ($tambah) {
    $_SESSION["pesan"] = "sukses";
    header("location: ../user/home.php");
} else {
    $_SESSION["pesan"] = "gagal";
    header("location: ../user/home.php");
}
