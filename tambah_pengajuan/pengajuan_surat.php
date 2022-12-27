<?php
include "../connect/koneksi.php";
session_start();
if (isset($_POST["button"])) {
  $keperluan = $_POST["keperluan"];
  $nisn = $_POST["nisn"];
  $nis = $_POST["nis"];
  $nama = $_POST["nama"];
  $tempat_lahir = $_POST["tempat_lahir"];
  $tgl_lahir = $_POST["tgl_lahir"];
  $gender = $_POST["gender"];
  $alamat = $_POST["alamat"];
  $kelas = $_POST["kelas"];
  $tgl = $_POST['waktu_pengajuan'];
  $nama_ayah = $_POST["nama_ayah"];
  $nama_ibu = $_POST["nama_ibu"];
  $pekerjaan_ayah = $_POST["pekerjaan_ayah"];
  $pekerjaan_ibu = $_POST["pekerjaan_ibu"];
  $id_user = $_SESSION['id_user'];
  $kode_surat = $_GET["kode_surat"];

  // set jam asia di jakarta
  date_default_timezone_set('Asia/Jakarta');
  $tgl = date('y-m-d H:i:s'); //mengambil jam dan tgl sekarang

  $tb_pengajuan = mysqli_query($koneksi, "INSERT INTO pengajuan(id_user, kode_surat, tgl_pengajuan, keperluan, jenis_pengajuan, status_pengajuan) VALUES($id_user,'$kode_surat','$tgl', '$keperluan', 'Baru', 'Menunggu')");
  if ($tb_pengajuan) {
    header("location: ../tambah_data/tambah_surat.php?nisn=$nisn&nis=$nis&nama=$nama&tempat_lahir=$tempat_lahir&tgl_lahir=$tgl_lahir&gender=$gender&alamat=$alamat&kelas=$kelas&nama_ayah=$nama_ayah&nama_ibu=$nama_ibu&pekerjaan_ayah=$pekerjaan_ayah&pekerjaan_ibu=$pekerjaan_ibu&kode_surat=$kode_surat&tgl=$tgl");
  }
}
