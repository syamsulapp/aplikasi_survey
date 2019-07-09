-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2019 at 02:14 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `survey`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_foto`
--

CREATE TABLE `tbl_foto` (
  `id` int(11) NOT NULL,
  `nama_foto` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jawab_survey`
--

CREATE TABLE `tbl_jawab_survey` (
  `id_user` int(4) NOT NULL,
  `id_survey` int(11) NOT NULL,
  `jawaban` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_status`
--

CREATE TABLE `tbl_status` (
  `id_status` int(11) NOT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_status_survey`
--

CREATE TABLE `tbl_status_survey` (
  `id` int(11) NOT NULL,
  `status` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_survey`
--

CREATE TABLE `tbl_survey` (
  `id` int(11) NOT NULL,
  `pertanyaan` varchar(100) DEFAULT NULL,
  `id_status_survey` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(4) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `no_hp` varchar(12) DEFAULT NULL,
  `id_status` int(11) NOT NULL,
  `tbl_foto_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_foto`
--
ALTER TABLE `tbl_foto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_jawab_survey`
--
ALTER TABLE `tbl_jawab_survey`
  ADD PRIMARY KEY (`id_user`,`id_survey`),
  ADD KEY `fk_tbl_user_has_tbl_survey_tbl_survey2_idx` (`id_survey`),
  ADD KEY `fk_tbl_user_has_tbl_survey_tbl_user1_idx` (`id_user`);

--
-- Indexes for table `tbl_status`
--
ALTER TABLE `tbl_status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `tbl_status_survey`
--
ALTER TABLE `tbl_status_survey`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_survey`
--
ALTER TABLE `tbl_survey`
  ADD PRIMARY KEY (`id`,`id_status_survey`),
  ADD KEY `fk_tbl_survey_tbl_status_survey1_idx` (`id_status_survey`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`,`id_status`,`tbl_foto_id`),
  ADD KEY `fk_tbl_user_tbl_status1_idx` (`id_status`),
  ADD KEY `fk_tbl_user_tbl_foto1_idx` (`tbl_foto_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_jawab_survey`
--
ALTER TABLE `tbl_jawab_survey`
  ADD CONSTRAINT `fk_tbl_user_has_tbl_survey_tbl_survey2` FOREIGN KEY (`id_survey`) REFERENCES `tbl_survey` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_user_has_tbl_survey_tbl_user1` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_survey`
--
ALTER TABLE `tbl_survey`
  ADD CONSTRAINT `fk_tbl_survey_tbl_status_survey1` FOREIGN KEY (`id_status_survey`) REFERENCES `tbl_status_survey` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD CONSTRAINT `fk_tbl_user_tbl_foto1` FOREIGN KEY (`tbl_foto_id`) REFERENCES `tbl_foto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_user_tbl_status1` FOREIGN KEY (`id_status`) REFERENCES `tbl_status` (`id_status`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
