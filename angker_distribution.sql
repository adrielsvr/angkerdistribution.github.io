-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2022 at 05:26 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `angker_distribution`
--

-- --------------------------------------------------------

--
-- Table structure for table `hasil`
--

CREATE TABLE `hasil` (
  `no_hasil` int(13) NOT NULL,
  `id_user` int(10) NOT NULL,
  `no_interview` int(13) NOT NULL,
  `hasilakhir` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hasil`
--

INSERT INTO `hasil` (`no_hasil`, `id_user`, `no_interview`, `hasilakhir`) VALUES
(44457, 11128, 33346, 'Passed'),
(44458, 11131, 33347, 'Not Passed');

-- --------------------------------------------------------

--
-- Table structure for table `interview`
--

CREATE TABLE `interview` (
  `no_interview` int(13) NOT NULL,
  `no_pendaftaran` int(13) NOT NULL,
  `competency` int(2) NOT NULL,
  `character` int(2) NOT NULL,
  `attitude` int(2) NOT NULL,
  `grooming` int(2) NOT NULL,
  `communication` int(2) NOT NULL,
  `experience` int(2) NOT NULL,
  `antusiasme` int(2) NOT NULL,
  `skor` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `interview`
--

INSERT INTO `interview` (`no_interview`, `no_pendaftaran`, `competency`, `character`, `attitude`, `grooming`, `communication`, `experience`, `antusiasme`, `skor`) VALUES
(33346, 22251, 6, 7, 7, 8, 8, 8, 9, 7.57),
(33347, 22253, 6, 5, 9, 4, 5, 6, 6, 5.86);

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `no_pendaftaran` int(13) NOT NULL,
  `id_user` int(10) NOT NULL,
  `Posisi` varchar(20) NOT NULL,
  `dokumen_pendaftaran` varchar(200) NOT NULL,
  `keterangan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pendaftaran`
--

INSERT INTO `pendaftaran` (`no_pendaftaran`, `id_user`, `Posisi`, `dokumen_pendaftaran`, `keterangan`) VALUES
(22251, 11128, 'Data Analyst', 'https://drive.google.com/drive/folders/1koXkDQyd517tb3WD95kHk3fWlfZAfPeo?usp=sharing', 'Lulus'),
(22252, 11127, 'IT Support', 'https://meet.google.com/qxe-jkaq-pnm', 'Tidak Lulus'),
(22253, 11131, 'Data Analyst', 'linkgoogledrive', 'Lulus');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `tingkat` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `email`, `password`, `no_telp`, `tingkat`) VALUES
(11111, 'ADMIN', 'admin@gmail.com', 'admin12345', '0812434566', 'admin'),
(11112, 'Fisa', 'pisa@gmail.savero', 'pisa 098765', '081372749897', 'user'),
(11126, 'Khalid', 'saveroa4@gmail.com', 'aad12345', '081372749897', 'user'),
(11127, 'Alda', 'svradriel44@gmail.com', 'aad12345', '081372749897', 'user'),
(11128, 'adriel savero', 'svradriel46@gmail.com', 'clay.244', '081372749897', 'user'),
(11131, 'aad', 'adrielsvr11@gmail.com', 'aad12345', '081372749897', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hasil`
--
ALTER TABLE `hasil`
  ADD PRIMARY KEY (`no_hasil`),
  ADD UNIQUE KEY `no_interview` (`no_interview`),
  ADD UNIQUE KEY `id_user` (`id_user`);

--
-- Indexes for table `interview`
--
ALTER TABLE `interview`
  ADD PRIMARY KEY (`no_interview`),
  ADD UNIQUE KEY `no_pendaftaran` (`no_pendaftaran`);

--
-- Indexes for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`no_pendaftaran`),
  ADD UNIQUE KEY `id_user` (`id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hasil`
--
ALTER TABLE `hasil`
  MODIFY `no_hasil` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44459;

--
-- AUTO_INCREMENT for table `interview`
--
ALTER TABLE `interview`
  MODIFY `no_interview` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33348;

--
-- AUTO_INCREMENT for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `no_pendaftaran` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22254;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11132;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hasil`
--
ALTER TABLE `hasil`
  ADD CONSTRAINT `hasil_ibfk_1` FOREIGN KEY (`no_interview`) REFERENCES `interview` (`no_interview`),
  ADD CONSTRAINT `id_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `interview`
--
ALTER TABLE `interview`
  ADD CONSTRAINT `interview_ibfk_1` FOREIGN KEY (`no_pendaftaran`) REFERENCES `pendaftaran` (`no_pendaftaran`);

--
-- Constraints for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD CONSTRAINT `pendaftaran_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
