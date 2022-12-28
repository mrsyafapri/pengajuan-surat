-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2022 at 06:04 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_surat`
--

-- --------------------------------------------------------

--
-- Table structure for table `arsip_surat`
--

CREATE TABLE `arsip_surat` (
  `nomor_surat` varchar(50) NOT NULL,
  `id_pengajuan` int(11) NOT NULL,
  `file_surat` varchar(255) DEFAULT NULL,
  `tgl_surat` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `arsip_surat`
--

INSERT INTO `arsip_surat` (`nomor_surat`, `id_pengajuan`, `file_surat`, `tgl_surat`) VALUES
('01/SKA/SMAN.15/12/2022', 14, '14-M. Faizen Kamil-Surat Keterangan Aktif.docx', '2022-12-28'),
('02/SKBB/SMAN.15/12/2022', 16, '16-M. Faizen Kamil-Surat Keterangan Berkelakuan Baik.docx', '2022-12-28'),
('03/SKA/SMAN.15/12/2022', 17, '17-Salsabila Putri-Surat Keterangan Aktif.docx', '2022-12-28'),
('04/SKA/SMAN.15/12/2022', 19, '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan`
--

CREATE TABLE `pengajuan` (
  `id_pengajuan` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `kode_surat` varchar(5) DEFAULT NULL,
  `tgl_pengajuan` datetime DEFAULT NULL,
  `keperluan` varchar(200) DEFAULT NULL,
  `jenis_pengajuan` varchar(50) DEFAULT NULL,
  `status_pengajuan` enum('Menunggu','Di Terima','Di Tolak','Revisi Di Terima','Revisi Selesai') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengajuan`
--

INSERT INTO `pengajuan` (`id_pengajuan`, `id_user`, `kode_surat`, `tgl_pengajuan`, `keperluan`, `jenis_pengajuan`, `status_pengajuan`) VALUES
(14, 5, 'SKA', '2022-12-28 11:25:23', 'salah nama ibu', 'Revisi', 'Revisi Di Terima'),
(15, 5, 'SKL', '2022-12-28 11:27:06', 'daftar ulang SNMPTN', 'Baru', 'Di Tolak'),
(16, 5, 'SKBB', '2022-12-28 11:32:30', 'daftar kuliah', 'Baru', 'Di Terima'),
(17, 6, 'SKA', '2022-12-28 11:41:28', 'ikut olimpiade', 'Baru', 'Di Terima'),
(18, 6, 'SL', '2022-12-28 11:43:25', 'beasiswa bidikmisi', 'Baru', 'Di Tolak'),
(19, 2, 'SKA', '2022-12-28 11:50:04', 'beasiswa provinsi Riau', 'Baru', 'Di Terima');

-- --------------------------------------------------------

--
-- Table structure for table `surat`
--

CREATE TABLE `surat` (
  `kode_surat` char(5) NOT NULL,
  `jenis_surat` varchar(50) NOT NULL,
  `surat_keluar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `surat`
--

INSERT INTO `surat` (`kode_surat`, `jenis_surat`, `surat_keluar`) VALUES
('SKA', 'Surat Keterangan Aktif', 3),
('SKBB', 'Surat Keterangan Berkelakuan Baik', 1),
('SKL', 'Surat Keterangan Lulus', 0),
('SL', 'Surat Lainnya', 0);

-- --------------------------------------------------------

--
-- Table structure for table `surat_masuk`
--

CREATE TABLE `surat_masuk` (
  `nomor_surat` varchar(50) NOT NULL,
  `id_user` int(11) NOT NULL,
  `jenis_surat` varchar(100) DEFAULT NULL,
  `file_surat` varchar(255) NOT NULL,
  `tgl_surat_masuk` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `surat_masuk`
--

INSERT INTO `surat_masuk` (`nomor_surat`, `id_user`, `jenis_surat`, `file_surat`, `tgl_surat_masuk`) VALUES
('23490', 1, 'Surat Dinas', '23490-Surat Dinas-2022-12-12.docx', '2022-12-12'),
('23590', 1, 'Surat Cuti', '23590-Surat Cuti-2022-12-09.docx', '2022-12-09');

-- --------------------------------------------------------

--
-- Table structure for table `s_aktif`
--

CREATE TABLE `s_aktif` (
  `id_pengajuan_ska` int(11) NOT NULL,
  `kode_surat` varchar(5) DEFAULT NULL,
  `nisn` varchar(10) DEFAULT NULL,
  `nis` varchar(5) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `tempat_lahir` varchar(20) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `nama_ayah` varchar(100) DEFAULT NULL,
  `nama_ibu` varchar(100) DEFAULT NULL,
  `pekerjaan_ayah` varchar(100) DEFAULT NULL,
  `pekerjaan_ibu` varchar(100) DEFAULT NULL,
  `alamat` varchar(200) DEFAULT NULL,
  `kelas` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `s_aktif`
--

INSERT INTO `s_aktif` (`id_pengajuan_ska`, `kode_surat`, `nisn`, `nis`, `nama`, `tempat_lahir`, `tgl_lahir`, `gender`, `nama_ayah`, `nama_ibu`, `pekerjaan_ayah`, `pekerjaan_ibu`, `alamat`, `kelas`) VALUES
(14, 'SKA', '0053996804', '1117', 'M. Faizen Kamil', 'Pekanbaru', '2005-02-02', 'Laki-Laki', 'Junidi', 'Juliani', 'Wiraswasta', 'IRT', 'Jalan Amilin', 'XII IPS 1'),
(17, 'SKA', '0020123456', '1278', 'Salsabila Putri', 'Padang', '2004-01-02', 'Perempuan', 'Rozak', 'Santi', 'Programmer', 'Kasir', 'Jl. Cipta Karya', 'XI IPA 8'),
(19, 'SKA', '001109910', '1898', 'Muhammad Rizki Syafapri', 'Tembilahan', '2002-04-23', 'Laki-Laki', 'Budi', 'Wiwit', 'Pedagang', 'IRT', 'Jalan Melayu 1', 'XII IPA 3');

-- --------------------------------------------------------

--
-- Table structure for table `s_berkelakuan_baik`
--

CREATE TABLE `s_berkelakuan_baik` (
  `id_pengajuan_skbb` int(11) NOT NULL,
  `kode_surat` varchar(5) DEFAULT NULL,
  `nisn` varchar(10) DEFAULT NULL,
  `nis` varchar(5) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `tempat_lahir` varchar(20) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `nama_ayah` varchar(100) DEFAULT NULL,
  `nama_ibu` varchar(100) DEFAULT NULL,
  `pekerjaan_ayah` varchar(100) DEFAULT NULL,
  `pekerjaan_ibu` varchar(100) DEFAULT NULL,
  `alamat` varchar(200) DEFAULT NULL,
  `kelas` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `s_berkelakuan_baik`
--

INSERT INTO `s_berkelakuan_baik` (`id_pengajuan_skbb`, `kode_surat`, `nisn`, `nis`, `nama`, `tempat_lahir`, `tgl_lahir`, `gender`, `nama_ayah`, `nama_ibu`, `pekerjaan_ayah`, `pekerjaan_ibu`, `alamat`, `kelas`) VALUES
(16, 'SKBB', '0020312365', '1190', 'M. Faizen Kamil', 'Pekanbaru', '2005-02-02', 'Laki-Laki', 'Junidi', 'Juliani', 'Wiraswasta', 'IRT', 'Jalan Amilin', 'XII IPS 1');

-- --------------------------------------------------------

--
-- Table structure for table `s_lainnya`
--

CREATE TABLE `s_lainnya` (
  `id_pengajuan_sl` int(11) NOT NULL,
  `kode_surat` varchar(5) DEFAULT NULL,
  `nisn` varchar(10) DEFAULT NULL,
  `nis` varchar(5) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `tempat_lahir` varchar(20) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `nama_ayah` varchar(100) DEFAULT NULL,
  `nama_ibu` varchar(100) DEFAULT NULL,
  `pekerjaan_ayah` varchar(100) DEFAULT NULL,
  `pekerjaan_ibu` varchar(100) DEFAULT NULL,
  `alamat` varchar(200) DEFAULT NULL,
  `kelas` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `s_lainnya`
--

INSERT INTO `s_lainnya` (`id_pengajuan_sl`, `kode_surat`, `nisn`, `nis`, `nama`, `tempat_lahir`, `tgl_lahir`, `gender`, `nama_ayah`, `nama_ibu`, `pekerjaan_ayah`, `pekerjaan_ibu`, `alamat`, `kelas`) VALUES
(18, 'SL', '00108921', '1288', 'Salsabila Putri', 'Padang', '2004-01-02', 'Perempuan', 'Yanto', 'Santi', 'Programmer', 'IRT', 'Jl. Cipta Karya', 'X IPA 2');

-- --------------------------------------------------------

--
-- Table structure for table `s_lulus`
--

CREATE TABLE `s_lulus` (
  `id_pengajuan_skl` int(11) NOT NULL,
  `kode_surat` varchar(5) DEFAULT NULL,
  `nisn` varchar(10) DEFAULT NULL,
  `nis` varchar(5) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `tempat_lahir` varchar(20) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `nama_ayah` varchar(100) DEFAULT NULL,
  `nama_ibu` varchar(100) DEFAULT NULL,
  `pekerjaan_ayah` varchar(100) DEFAULT NULL,
  `pekerjaan_ibu` varchar(100) DEFAULT NULL,
  `alamat` varchar(200) DEFAULT NULL,
  `kelas` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `s_lulus`
--

INSERT INTO `s_lulus` (`id_pengajuan_skl`, `kode_surat`, `nisn`, `nis`, `nama`, `tempat_lahir`, `tgl_lahir`, `gender`, `nama_ayah`, `nama_ibu`, `pekerjaan_ayah`, `pekerjaan_ibu`, `alamat`, `kelas`) VALUES
(15, 'SKL', '0020371234', '1121', 'M. Faizen Kamil', 'Pekanbaru', '2005-02-02', 'Laki-Laki', 'Junidi', 'Juliani', 'Wiraswasta', 'IRT', 'Jalan Amilin', 'XII IPS 1');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `gender` varchar(50) NOT NULL,
  `agama` varchar(50) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `role_user` enum('Siswa','Admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama_lengkap`, `tempat_lahir`, `tanggal_lahir`, `gender`, `agama`, `alamat`, `role_user`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Staf TU', 'Pekanbaru', '2022-12-01', 'Laki-Laki', 'Islam', 'Jalan Melayu', 'Admin'),
(2, 'mrsyafapri', 'fae3259e1f31f02000336687c6543a55', 'Muhammad Rizki Syafapri', 'Tembilahan', '2002-04-23', 'Laki-Laki', 'Islam', 'Jalan Melayu 1', 'Siswa'),
(5, 'faizen', '3940b698f90f7ad91b7154c4c74e7f9b', 'M. Faizen Kamil', 'Pekanbaru', '2005-02-02', 'Laki-Laki', 'Islam', 'Jalan Amilin', 'Siswa'),
(6, 'salsabila', 'fe1e33bb1f71656d0d06d68e0dd2f8f0', 'Salsabila Putri', 'Padang', '2004-01-02', 'Perempuan', 'Kristen Protestan', 'Jl. Cipta Karya', 'Siswa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `arsip_surat`
--
ALTER TABLE `arsip_surat`
  ADD PRIMARY KEY (`nomor_surat`),
  ADD KEY `id_pengajuan` (`id_pengajuan`);

--
-- Indexes for table `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD PRIMARY KEY (`id_pengajuan`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `kode_surat` (`kode_surat`);

--
-- Indexes for table `surat`
--
ALTER TABLE `surat`
  ADD PRIMARY KEY (`kode_surat`);

--
-- Indexes for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  ADD PRIMARY KEY (`nomor_surat`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `s_aktif`
--
ALTER TABLE `s_aktif`
  ADD PRIMARY KEY (`id_pengajuan_ska`);

--
-- Indexes for table `s_berkelakuan_baik`
--
ALTER TABLE `s_berkelakuan_baik`
  ADD PRIMARY KEY (`id_pengajuan_skbb`);

--
-- Indexes for table `s_lainnya`
--
ALTER TABLE `s_lainnya`
  ADD PRIMARY KEY (`id_pengajuan_sl`);

--
-- Indexes for table `s_lulus`
--
ALTER TABLE `s_lulus`
  ADD PRIMARY KEY (`id_pengajuan_skl`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pengajuan`
--
ALTER TABLE `pengajuan`
  MODIFY `id_pengajuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `s_aktif`
--
ALTER TABLE `s_aktif`
  MODIFY `id_pengajuan_ska` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `s_berkelakuan_baik`
--
ALTER TABLE `s_berkelakuan_baik`
  MODIFY `id_pengajuan_skbb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `s_lainnya`
--
ALTER TABLE `s_lainnya`
  MODIFY `id_pengajuan_sl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `s_lulus`
--
ALTER TABLE `s_lulus`
  MODIFY `id_pengajuan_skl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `arsip_surat`
--
ALTER TABLE `arsip_surat`
  ADD CONSTRAINT `arsip_surat_ibfk_2` FOREIGN KEY (`id_pengajuan`) REFERENCES `pengajuan` (`id_pengajuan`);

--
-- Constraints for table `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD CONSTRAINT `pengajuan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `pengajuan_ibfk_2` FOREIGN KEY (`kode_surat`) REFERENCES `surat` (`kode_surat`);

--
-- Constraints for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  ADD CONSTRAINT `surat_masuk_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `s_aktif`
--
ALTER TABLE `s_aktif`
  ADD CONSTRAINT `s_aktif_ibfk_1` FOREIGN KEY (`id_pengajuan_ska`) REFERENCES `pengajuan` (`id_pengajuan`);

--
-- Constraints for table `s_berkelakuan_baik`
--
ALTER TABLE `s_berkelakuan_baik`
  ADD CONSTRAINT `sktm_ibfk_1` FOREIGN KEY (`id_pengajuan_skbb`) REFERENCES `pengajuan` (`id_pengajuan`);

--
-- Constraints for table `s_lainnya`
--
ALTER TABLE `s_lainnya`
  ADD CONSTRAINT `sl_ibfk_1` FOREIGN KEY (`id_pengajuan_sl`) REFERENCES `pengajuan` (`id_pengajuan`);

--
-- Constraints for table `s_lulus`
--
ALTER TABLE `s_lulus`
  ADD CONSTRAINT `skl_ibfk_1` FOREIGN KEY (`id_pengajuan_skl`) REFERENCES `pengajuan` (`id_pengajuan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
