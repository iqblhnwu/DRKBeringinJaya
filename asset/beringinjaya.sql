-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2026 at 07:29 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `beringinjaya`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id` int(11) NOT NULL,
  `nama` varchar(25) DEFAULT NULL,
  `pass` text DEFAULT NULL,
  `passmd5` text DEFAULT NULL,
  `peran` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `daftarkamar`
--

CREATE TABLE `daftarkamar` (
  `no_kamar` varchar(3) NOT NULL,
  `penghuni` int(11) DEFAULT NULL,
  `pass` varchar(25) NOT NULL,
  `passmd5` text NOT NULL,
  `biaya` int(11) NOT NULL,
  `status_kamar` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `daftarkamar`
--

INSERT INTO `daftarkamar` (`no_kamar`, `penghuni`, `pass`, `passmd5`, `biaya`, `status_kamar`) VALUES
('001', NULL, '', '', 0, 'Non-Aktif'),
('002', NULL, '', '', 0, 'Non-Aktif'),
('003', NULL, '', '', 0, 'Non-Aktif'),
('004', NULL, '', '', 0, 'Non-Aktif'),
('005', NULL, '', '', 0, 'Non-Aktif'),
('006', NULL, '', '', 0, 'Non-Aktif'),
('007', NULL, '', '', 0, 'Non-Aktif'),
('008', NULL, '', '', 0, 'Non-Aktif'),
('009', NULL, '', '', 0, 'Non-Aktif'),
('010', NULL, '', '', 0, 'Non-Aktif'),
('011', NULL, '', '', 0, 'Non-Aktif'),
('012', NULL, '', '', 0, 'Non-Aktif'),
('013', NULL, '', '', 0, 'Non-Aktif'),
('014', NULL, '', '', 0, 'Non-Aktif'),
('015', NULL, '', '', 0, 'Non-Aktif'),
('016', NULL, '', '', 0, 'Non-Aktif'),
('017', NULL, '', '', 0, 'Non-Aktif'),
('018', NULL, '', '', 0, 'Non-Aktif'),
('019', NULL, '', '', 0, 'Non-Aktif'),
('020', NULL, '', '', 0, 'Non-Aktif'),
('021', NULL, '', '', 0, 'Non-Aktif'),
('022', NULL, '', '', 0, 'Non-Aktif'),
('023', NULL, '', '', 0, 'Non-Aktif'),
('024', NULL, '', '', 0, 'Non-Aktif'),
('025', NULL, '', '', 0, 'Non-Aktif'),
('026', NULL, '', '', 0, 'Non-Aktif'),
('101', NULL, '', '', 0, 'Non-Aktif'),
('102', NULL, '', '', 0, 'Non-Aktif'),
('103', NULL, '', '', 0, 'Non-Aktif'),
('104', NULL, '', '', 0, 'Non-Aktif'),
('105', NULL, '', '', 0, 'Non-Aktif'),
('106', NULL, '', '', 0, 'Non-Aktif'),
('107', NULL, '', '', 0, 'Non-Aktif'),
('108', NULL, '', '', 0, 'Non-Aktif'),
('109', NULL, '', '', 0, 'Non-Aktif'),
('110', NULL, '', '', 0, 'Non-Aktif'),
('111', NULL, '', '', 0, 'Non-Aktif'),
('112', NULL, '', '', 0, 'Non-Aktif'),
('113', NULL, '', '', 0, 'Non-Aktif'),
('114', NULL, '', '', 0, 'Non-Aktif'),
('115', NULL, '', '', 0, 'Non-Aktif'),
('116', NULL, '', '', 0, 'Non-Aktif'),
('117', NULL, '', '', 0, 'Non-Aktif'),
('118', NULL, '', '', 0, 'Non-Aktif'),
('119', NULL, '', '', 0, 'Non-Aktif'),
('120', NULL, '', '', 0, 'Non-Aktif'),
('121', NULL, '', '', 0, 'Non-Aktif'),
('122', NULL, '', '', 0, 'Non-Aktif'),
('123', NULL, '', '', 0, 'Non-Aktif'),
('124', NULL, '', '', 0, 'Non-Aktif'),
('125', NULL, '', '', 0, 'Non-Aktif'),
('126', NULL, '', '', 0, 'Non-Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `daftarpenyewa`
--

CREATE TABLE `daftarpenyewa` (
  `id` int(11) NOT NULL,
  `nama` varchar(250) DEFAULT NULL,
  `asal_daerah` varchar(250) DEFAULT NULL,
  `nohp` varchar(13) DEFAULT NULL,
  `nohp_ortu` varchar(13) DEFAULT NULL,
  `tujuan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `keuangan`
--

CREATE TABLE `keuangan` (
  `id` int(11) NOT NULL,
  `penghuni` int(11) DEFAULT NULL,
  `nominal` int(11) DEFAULT NULL,
  `detail_pembayaran` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daftarkamar`
--
ALTER TABLE `daftarkamar`
  ADD PRIMARY KEY (`no_kamar`),
  ADD KEY `fk_penyewa` (`penghuni`);

--
-- Indexes for table `daftarpenyewa`
--
ALTER TABLE `daftarpenyewa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keuangan`
--
ALTER TABLE `keuangan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pembayaran` (`penghuni`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `daftarpenyewa`
--
ALTER TABLE `daftarpenyewa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `daftarkamar`
--
ALTER TABLE `daftarkamar`
  ADD CONSTRAINT `fk_penyewa` FOREIGN KEY (`penghuni`) REFERENCES `daftarpenyewa` (`id`);

--
-- Constraints for table `keuangan`
--
ALTER TABLE `keuangan`
  ADD CONSTRAINT `fk_pembayaran` FOREIGN KEY (`penghuni`) REFERENCES `daftarpenyewa` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
