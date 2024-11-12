-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2024 at 07:24 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database_kendaraan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_kendaraan`
--

CREATE TABLE `tb_kendaraan` (
  `no_data` int(11) NOT NULL,
  `nomor_registrasi_kendaraan` varchar(50) DEFAULT NULL,
  `nama_pemilik` varchar(100) NOT NULL,
  `alamat` text DEFAULT NULL,
  `merk_kendaraan` varchar(50) DEFAULT NULL,
  `tahun_pembuatan` int(4) DEFAULT NULL,
  `kapasitas_silinder` int(11) DEFAULT NULL,
  `warna_kendaraan` enum('Merah','Hitam','Biru','Abu-Abu','Hijau','Pink') DEFAULT NULL,
  `bahan_bakar` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_kendaraan`
--

INSERT INTO `tb_kendaraan` (`no_data`, `nomor_registrasi_kendaraan`, `nama_pemilik`, `alamat`, `merk_kendaraan`, `tahun_pembuatan`, `kapasitas_silinder`, `warna_kendaraan`, `bahan_bakar`) VALUES
(1, 'B-7763-TXY', 'Lionel Messi', 'JL. Kebon Jeruk', 'Honda PCX', 2018, 150, 'Hitam', 'Bensin'),
(2, 'B-1678-BDG', 'Cristian Ronaldo', 'JL. Bojong Gede', 'Honda Vario', 2020, 150, 'Merah', 'Bensin'),
(3, 'B-3461-UPQ', 'Bambang Pamungkas', 'JL. Cilebut 2', 'Honda Beat', 2019, 125, 'Biru', 'Bensin'),
(4, 'B-3110-BGT', 'Natasha Romanov', 'Jl. Pamulang', 'Honda Scoopy', 2020, 125, 'Hitam', 'Bensin'),
(5, 'B-7829-TYP', 'Entis Siti Jubaidah', 'JL. Tambun Raya ', 'Honda Beat', 2019, 125, 'Merah', 'Bensin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_kendaraan`
--
ALTER TABLE `tb_kendaraan`
  ADD PRIMARY KEY (`no_data`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_kendaraan`
--
ALTER TABLE `tb_kendaraan`
  MODIFY `no_data` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
