<?php
include "../connect/koneksi.php";

$nisn = $_POST["nisn"];

$cek_nisn = mysqli_query($koneksi, "SELECT * FROM siswa WHERE nisn = '$nisn'");

while ($row = mysqli_fetch_array($cek_nisn)) {
    if ($row["nisn"] == $nisn) {
        echo "NISN sudah terdaftar";
        echo "<br>";
        echo "Nama: " . $row["nama"];
    } else {
        echo "NISN belum terdaftar";
    }
}
