-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2024 at 06:05 PM
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
-- Database: `db_erni`
--

-- --------------------------------------------------------

--
-- Table structure for table `table_distributor`
--

CREATE TABLE `table_distributor` (
  `id` varchar(255) NOT NULL,
  `distributor` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `no_tlp` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `table_kriteria`
--

CREATE TABLE `table_kriteria` (
  `id` int(11) NOT NULL,
  `k_kriteria` varchar(45) NOT NULL,
  `n_kriteria` varchar(45) NOT NULL,
  `p_kriteria` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `table_penilaian_distributor`
--

CREATE TABLE `table_penilaian_distributor` (
  `id` int(11) NOT NULL,
  `kode_distributor` varchar(255) NOT NULL,
  `N1` varchar(50) NOT NULL,
  `N2` varchar(50) NOT NULL,
  `N3` varchar(50) NOT NULL,
  `N4` varchar(50) NOT NULL,
  `N5` varchar(50) NOT NULL,
  `N_akhir` varchar(50) NOT NULL,
  `N_ket` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `table_user`
--

CREATE TABLE `table_user` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table_user`
--

INSERT INTO `table_user` (`username`, `password`) VALUES
('erni', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `table_vektor`
--

CREATE TABLE `table_vektor` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `N1` varchar(50) NOT NULL,
  `N2` varchar(50) NOT NULL,
  `N3` varchar(50) NOT NULL,
  `N4` varchar(50) NOT NULL,
  `N5` varchar(50) NOT NULL,
  `N_akhir` varchar(50) NOT NULL,
  `prioritas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `table_distributor`
--
ALTER TABLE `table_distributor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_kriteria`
--
ALTER TABLE `table_kriteria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_penilaian_distributor`
--
ALTER TABLE `table_penilaian_distributor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_user`
--
ALTER TABLE `table_user`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `table_vektor`
--
ALTER TABLE `table_vektor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `table_kriteria`
--
ALTER TABLE `table_kriteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `table_penilaian_distributor`
--
ALTER TABLE `table_penilaian_distributor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `table_vektor`
--
ALTER TABLE `table_vektor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
