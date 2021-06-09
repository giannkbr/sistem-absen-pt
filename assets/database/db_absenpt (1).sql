-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 09, 2021 at 05:13 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_absenpt`
--

-- --------------------------------------------------------

--
-- Table structure for table `absen`
--

CREATE TABLE `absen` (
  `id_absen` int(11) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `nama` varchar(80) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `keterangan` varchar(100) NOT NULL,
  `keterangan_kerja` varchar(90) NOT NULL,
  `maps_absen` varchar(90) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `status_absen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `absen`
--

INSERT INTO `absen` (`id_absen`, `nip`, `nama`, `waktu`, `keterangan`, `keterangan_kerja`, `maps_absen`, `deskripsi`, `status_absen`) VALUES
(32, '2313', 'Gian Akbar', '2021-06-06 22:16:47', 'masuk', '1', '', 'position.coords.latitude + \", \" + position.coords.longitude;', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cuti`
--

CREATE TABLE `cuti` (
  `id_cuti` int(11) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `jenis_cuti` enum('cuti','izin','sakit') NOT NULL,
  `bukti` varchar(254) DEFAULT NULL,
  `alasan` text NOT NULL,
  `status` enum('diajukan','diterima','ditolak') NOT NULL,
  `waktu_pengajuan` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cuti`
--

INSERT INTO `cuti` (`id_cuti`, `nip`, `jenis_cuti`, `bukti`, `alasan`, `status`, `waktu_pengajuan`) VALUES
(5, '2313', 'sakit', 'w.png', 'sdad', 'diterima', '2021-05-28 15:07:42'),
(6, '2313', 'sakit', 'w.png', 'sakit cok', 'diterima', '2021-05-28 15:08:20'),
(7, '2313', 'sakit', 'Resume.jpg', 'latitude=-6.2087634&longitude=106.84559899999999', 'diterima', '2021-06-06 19:52:39');

-- --------------------------------------------------------

--
-- Table structure for table `detailcuti`
--

CREATE TABLE `detailcuti` (
  `id_detail` int(11) NOT NULL,
  `id_cuti` int(11) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detailcuti`
--

INSERT INTO `detailcuti` (`id_detail`, `id_cuti`, `tanggal`) VALUES
(1, 1, '2021-01-15'),
(2, 1, '2021-01-16'),
(3, 2, '2021-05-29'),
(4, 2, '2021-05-30'),
(5, 3, '2021-05-22'),
(6, 3, '2021-05-23'),
(7, 3, '2021-05-24'),
(8, 3, '2021-05-25'),
(9, 3, '2021-05-26'),
(10, 3, '2021-05-27'),
(11, 3, '2021-05-28'),
(12, 3, '2021-05-29'),
(13, 3, '2021-05-30'),
(14, 3, '2021-05-31'),
(15, 3, '2021-06-01'),
(16, 3, '2021-06-02'),
(17, 3, '2021-06-03'),
(18, 3, '2021-06-04'),
(19, 4, '2021-05-29'),
(20, 4, '2021-05-30'),
(21, 4, '2021-05-31'),
(22, 4, '2021-06-01'),
(23, 4, '2021-06-02'),
(24, 5, '2021-05-29'),
(25, 6, '2021-05-21'),
(26, 6, '2021-05-22'),
(27, 6, '2021-05-23'),
(28, 6, '2021-05-24'),
(29, 6, '2021-05-25'),
(30, 6, '2021-05-26'),
(31, 6, '2021-05-27'),
(32, 6, '2021-05-28'),
(33, 6, '2021-05-29'),
(34, 6, '2021-05-30'),
(35, 6, '2021-05-31'),
(36, 6, '2021-06-01'),
(37, 6, '2021-06-02'),
(38, 7, '2021-06-29');

-- --------------------------------------------------------

--
-- Table structure for table `detailovertime`
--

CREATE TABLE `detailovertime` (
  `id_detail` int(11) NOT NULL,
  `id_overtime` int(11) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detailovertime`
--

INSERT INTO `detailovertime` (`id_detail`, `id_overtime`, `tanggal`) VALUES
(26, 6, '2021-05-22'),
(27, 6, '2021-05-23'),
(28, 6, '2021-05-24'),
(29, 6, '2021-05-25'),
(30, 6, '2021-05-26'),
(31, 6, '2021-05-27'),
(32, 6, '2021-05-28'),
(33, 6, '2021-05-29'),
(34, 6, '2021-05-30'),
(35, 6, '2021-05-31'),
(36, 6, '2021-06-01'),
(37, 6, '2021-06-02'),
(38, 7, '2021-06-02'),
(39, 8, '2021-06-02'),
(40, 9, '2021-06-02');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `jabatan_id` int(11) NOT NULL,
  `jabatan_nama` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`jabatan_id`, `jabatan_nama`) VALUES
(1, 'Barang dan Jasa Keuangan'),
(11, 'Keuangan'),
(12, 'Testing');

-- --------------------------------------------------------

--
-- Table structure for table `overtime`
--

CREATE TABLE `overtime` (
  `id_overtime` int(11) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `bukti` varchar(254) DEFAULT NULL,
  `status` enum('diajukan','diterima','ditolak') NOT NULL,
  `mulai` time NOT NULL,
  `selesai` time NOT NULL,
  `waktu_pengajuan` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `overtime`
--

INSERT INTO `overtime` (`id_overtime`, `nip`, `bukti`, `status`, `mulai`, `selesai`, `waktu_pengajuan`) VALUES
(9, '2313', 'WhatsApp_Image_2021-05-29_at_02_45_47.jpeg', 'diterima', '17:32:00', '18:38:00', '2021-06-02 07:35:27');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `status_setting` int(1) NOT NULL DEFAULT 0,
  `nama_instansi` varchar(255) NOT NULL,
  `jumbotron_lead_set` varchar(125) NOT NULL,
  `nama_app_absensi` varchar(20) NOT NULL DEFAULT 'Absensi Online',
  `logo_instansi` varchar(255) NOT NULL,
  `timezone` varchar(35) NOT NULL,
  `absen_mulai` varchar(13) NOT NULL,
  `absen_mulai_to` varchar(13) NOT NULL,
  `absen_pulang` varchar(13) NOT NULL,
  `maps_use` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`status_setting`, `nama_instansi`, `jumbotron_lead_set`, `nama_app_absensi`, `logo_instansi`, `timezone`, `absen_mulai`, `absen_mulai_to`, `absen_pulang`, `maps_use`) VALUES
(1, '[Ubah Nama Instansi]', '[Ubah Text Berjalan Halaman Depan Disini Pada Setting Aplikasi]', 'Absensi Online', 'default-logo.png', 'Asia/Jakarta', '06:00:00', '11:00:00', '16:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `nip` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role_id` enum('1','2') NOT NULL,
  `photo` varchar(120) DEFAULT NULL,
  `jabatan_id` int(11) NOT NULL,
  `waktu_masuk` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`nip`, `nama`, `jenis_kelamin`, `email`, `password`, `role_id`, `photo`, `jabatan_id`, `waktu_masuk`) VALUES
(123, 'Administrator', 'L', 'admin@gmail.com', '$2y$10$VqvV0UfbaEhwfR0v1nQUOOz0SY461B3Q41cwaHiqocwfN5uG9lUge', '1', 'default.png', 10, '2021-05-10'),
(2313, 'Gian Akbar', 'L', 'adminku@gmail.com', '$2y$10$VqvV0UfbaEhwfR0v1nQUOOz0SY461B3Q41cwaHiqocwfN5uG9lUge', '2', 'default.png', 0, '2019-04-09'),
(12312, 'Teman tugas', 'P', 'adminku12@gmail.com', '$2y$10$ekUM4T50kyYteL/Hc.REReeSR0HNR8sKicQQFqmgrspfyBUqXTBz6', '2', '1068538.jpg', 12, '2021-06-20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absen`
--
ALTER TABLE `absen`
  ADD PRIMARY KEY (`id_absen`);

--
-- Indexes for table `cuti`
--
ALTER TABLE `cuti`
  ADD PRIMARY KEY (`id_cuti`);

--
-- Indexes for table `detailcuti`
--
ALTER TABLE `detailcuti`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `detailovertime`
--
ALTER TABLE `detailovertime`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`jabatan_id`);

--
-- Indexes for table `overtime`
--
ALTER TABLE `overtime`
  ADD PRIMARY KEY (`id_overtime`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`nip`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absen`
--
ALTER TABLE `absen`
  MODIFY `id_absen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `cuti`
--
ALTER TABLE `cuti`
  MODIFY `id_cuti` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `detailcuti`
--
ALTER TABLE `detailcuti`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `detailovertime`
--
ALTER TABLE `detailovertime`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `jabatan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `overtime`
--
ALTER TABLE `overtime`
  MODIFY `id_overtime` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
