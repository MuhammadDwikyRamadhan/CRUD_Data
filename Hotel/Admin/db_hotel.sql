-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2024 at 10:19 AM
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
-- Database: `db_hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `ID_Admin` int(6) NOT NULL,
  `Nama` text NOT NULL,
  `Username` varchar(10) NOT NULL,
  `Password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`ID_Admin`, `Nama`, `Username`, `Password`) VALUES
(1, 'ALDRICH RYU DANENDRA1', 'ALDRICHRYU', 'RYU123456'),
(2, 'ALHIKAM DIRGA RAMADHAN', 'ALHIKAM', 'HIKAM34'),
(3, 'CITRA ANNISA TOURSINA TRIWIJAYA', 'CITRA', 'CITRA56'),
(5, 'FARRAS GHALYANDRA', 'UCUP', 'FARRAS910'),
(7, 'MUHAMMAD DWIKY RAMADHAN', 'DWIKY', 'DWIKY13');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jenis_kamar`
--

CREATE TABLE `tbl_jenis_kamar` (
  `ID_Kamar` int(9) NOT NULL,
  `Jenis_Kamar` text NOT NULL,
  `Harga` int(10) NOT NULL,
  `Keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_jenis_kamar`
--

INSERT INTO `tbl_jenis_kamar` (`ID_Kamar`, `Jenis_Kamar`, `Harga`, `Keterangan`) VALUES
(1, 'Standard', 1000000, 'Memiliki fasilitas seperti tempat tidur, AC, TV, perlengkapan mandi, dan air minum. ukuran kasur yang disediakan oleh Standard Room model single bed, queen size'),
(2, 'Superior', 1500000, '-'),
(3, 'Deluxe', 1800000, '-');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_penyewa`
--

CREATE TABLE `tbl_penyewa` (
  `ID_Sewa` int(11) NOT NULL,
  `Nama` text NOT NULL,
  `No_Identitas` int(11) NOT NULL,
  `No_HP` int(16) NOT NULL,
  `ID_Kamar` int(11) NOT NULL,
  `CheckIn` date NOT NULL,
  `CheckOut` date NOT NULL,
  `Jumlah_Kamar` int(5) NOT NULL,
  `Total` int(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_penyewa`
--

INSERT INTO `tbl_penyewa` (`ID_Sewa`, `Nama`, `No_Identitas`, `No_HP`, `ID_Kamar`, `CheckIn`, `CheckOut`, `Jumlah_Kamar`, `Total`) VALUES
(9, 'Bu Inah', 1212, 6281271, 3, '2024-06-10', '2024-06-12', 1, 3600000),
(10, 'Pak Somat', 1223, 136, 3, '2024-06-10', '2024-06-12', 1, 3600000),
(11, 'Pak Somat', 1212, 434343, 1, '2024-06-04', '2024-06-01', 1, 2400000),
(12, 'Pak RT', 9999, 62819, 3, '2024-06-10', '2024-06-12', 2, 7200000),
(13, 'abc', 123, 456, 1, '2024-06-03', '2024-06-05', 1, 2000000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`ID_Admin`);

--
-- Indexes for table `tbl_jenis_kamar`
--
ALTER TABLE `tbl_jenis_kamar`
  ADD PRIMARY KEY (`ID_Kamar`);

--
-- Indexes for table `tbl_penyewa`
--
ALTER TABLE `tbl_penyewa`
  ADD PRIMARY KEY (`ID_Sewa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `ID_Admin` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_jenis_kamar`
--
ALTER TABLE `tbl_jenis_kamar`
  MODIFY `ID_Kamar` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_penyewa`
--
ALTER TABLE `tbl_penyewa`
  MODIFY `ID_Sewa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
