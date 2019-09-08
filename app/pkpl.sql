-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 08, 2019 at 10:26 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pkpl`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota_ks`
--

CREATE TABLE `anggota_ks` (
  `id_ks` int(11) NOT NULL,
  `nim` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anggota_ks`
--

INSERT INTO `anggota_ks` (`id_ks`, `nim`) VALUES
(10, '10018005');

-- --------------------------------------------------------

--
-- Table structure for table `ks`
--

CREATE TABLE `ks` (
  `id_ks` int(11) NOT NULL,
  `nama_ks` varchar(100) NOT NULL,
  `jadwal_ks` varchar(50) NOT NULL,
  `dosen_pembimbing` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ks`
--

INSERT INTO `ks` (`id_ks`, `nama_ks`, `jadwal_ks`, `dosen_pembimbing`) VALUES
(10, 'KS AA', 'Senin 01:00 AM', 'Pak Fiftin'),
(11, 'A', 'Senin 12:30 AM', 'FA');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `jenis_kelamin` enum('pria','wanita') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama`, `tempat_lahir`, `tanggal_lahir`, `no_hp`, `jenis_kelamin`) VALUES
('10018005', 'Rino Abdurrozak', 'Indonesia', '2017-11-16', '-', 'pria'),
('10018038', 'Faisal Maghrazan', 'Indonesia', '2017-11-24', '-', 'pria'),
('1400018069', 'Naufal Afif', 'Palu', '1997-01-02', '081245937339', 'pria');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `sandi` varchar(100) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `email`, `sandi`, `nama`) VALUES
(1, 'naufal@gmail.com', '745de6038585a515fcd174f25ad92eef50de7b0a', 'Naufal Afif');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota_ks`
--
ALTER TABLE `anggota_ks`
  ADD KEY `id_ks` (`id_ks`),
  ADD KEY `nim` (`nim`);

--
-- Indexes for table `ks`
--
ALTER TABLE `ks`
  ADD PRIMARY KEY (`id_ks`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ks`
--
ALTER TABLE `ks`
  MODIFY `id_ks` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `anggota_ks`
--
ALTER TABLE `anggota_ks`
  ADD CONSTRAINT `anggota_ks_ibfk_1` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `anggota_ks_ibfk_2` FOREIGN KEY (`id_ks`) REFERENCES `ks` (`id_ks`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
