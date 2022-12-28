<?php
ob_start();
include "../connect/koneksi.php";
require_once('../vendor/fpdf185/fpdf.php');
$tb_pengajuan = mysqli_query($koneksi, "SELECT * FROM user INNER JOIN pengajuan USING(id_user) INNER JOIN surat USING(kode_surat)");

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 10, 'Laporan Pengajuan Surat', 0, 0, 'C');
$pdf->Ln();
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(50, 10, 'Nama Lengkap');
$pdf->Cell(25, 10, 'Kode Surat');
$pdf->Cell(40, 10, 'Waktu Pengajuan');
$pdf->Cell(40, 10, 'Keperluan');
$pdf->Cell(40, 10, 'Status Pengajuan');
$pdf->Ln();
$pdf->SetFont('Arial', '', 11);
while ($row = mysqli_fetch_assoc($tb_pengajuan)) {
    $pdf->Cell(50, 10, $row["nama_lengkap"]);
    $pdf->Cell(25, 10, $row["kode_surat"]);
    $pdf->Cell(40, 10, $row["tgl_pengajuan"]);
    $pdf->Cell(40, 10, $row["keperluan"]);
    $pdf->Cell(40, 10, $row["status_pengajuan"]);
    $pdf->Ln();
}
// total pengajuan surat
$pdf->Ln();
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(0, 10, 'Total Pengajuan Surat', 0, 0, 'C');
$pdf->Ln();
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(70, 10, 'Jenis Surat');
$pdf->Cell(25, 10, 'Jumlah Pengajuan');
$pdf->Ln();
$pdf->SetFont('Arial', '', 11);
$jumlah_surat = mysqli_query($koneksi, "SELECT kode_surat, COUNT(kode_surat) AS jumlah_pengajuan FROM pengajuan GROUP BY kode_surat");
while ($row = mysqli_fetch_assoc($jumlah_surat)) {
    if ($row["kode_surat"] == "SKA") {
        $jenis_surat = "Surat Keterangan Aktif";
    } elseif ($row["kode_surat"] == "SKBB") {
        $jenis_surat = "Surat Keterangan Berkelakuan Baik";
    } elseif ($row["kode_surat"] == "SKL") {
        $jenis_surat = "Surat Keterangan Lulus";
    } else {
        $jenis_surat = "Surat Keterangan Lainnya";
    }
    $pdf->Cell(70, 10, $jenis_surat);
    $pdf->Cell(25, 10, $row["jumlah_pengajuan"]);
    $pdf->Ln();
}
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(70, 10, 'Total');
$pdf->Cell(25, 10, mysqli_num_rows($tb_pengajuan));
$pdf->Output();
ob_end_flush();
