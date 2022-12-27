<?php
$koneksi = mysqli_connect('localhost', 'root', '', 'db_surat');
if (!$koneksi) {
    die('Koneksi Gagal: ' . mysqli_connect_error());
}
