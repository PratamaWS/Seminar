-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2017 at 03:22 PM
-- Server version: 5.6.11
-- PHP Version: 5.5.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `seminar`
--
CREATE DATABASE IF NOT EXISTS `seminar` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `seminar`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nama` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `nama`) VALUES
(1, 'admin', 'admin', 'Yeye');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE IF NOT EXISTS `berita` (
  `berita_judul` varchar(50) NOT NULL,
  `berita_isi` text NOT NULL,
  `berita_tanggal` varchar(25) NOT NULL,
  `berita_id` int(20) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`berita_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`berita_judul`, `berita_isi`, `berita_tanggal`, `berita_id`) VALUES
('fdscx', 'wfdscx', '2017-03-10', 8),
('d', 'd', '2017-03-07', 19),
('a', 'a', '2017-03-10', 23),
('s', 's', '2017-03-10', 24),
('a', 'a', '2017-03-10', 25),
('s', 's', '2017-03-10', 29),
('s', 's', '2017-03-10', 30);

-- --------------------------------------------------------

--
-- Table structure for table `datauser`
--

CREATE TABLE IF NOT EXISTS `datauser` (
  `id_data` int(20) NOT NULL AUTO_INCREMENT,
  `nama_aut` varchar(30) NOT NULL,
  `judul_abs` varchar(60) NOT NULL,
  `file_abs` varchar(60) NOT NULL,
  `status_lolos` varchar(50) NOT NULL,
  `status_bayar` varchar(11) NOT NULL,
  PRIMARY KEY (`id_data`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `datauser`
--

INSERT INTO `datauser` (`id_data`, `nama_aut`, `judul_abs`, `file_abs`, `status_lolos`, `status_bayar`) VALUES
(1, 'yeye', 'tt', '0MTF02168.pdf', 'Lolos', '0'),
(2, 'sasad', 'saasx', 'Thema.docx', 'Lolos', 'sasas'),
(3, 'sa', 'das', '0MTF02168.pdf 	', 'Lolos', 'sas'),
(4, '', '', '', 'Lolos', ''),
(5, '', '', '', 'Lolos', ''),
(6, '', '', '', 'Lolos', '');

-- --------------------------------------------------------

--
-- Table structure for table `makalah`
--

CREATE TABLE IF NOT EXISTS `makalah` (
  `makalah_id` int(20) NOT NULL,
  `makalah_abstrak_file` varchar(20) NOT NULL,
  `makalah_file` varchar(20) NOT NULL,
  `makalah_status` varchar(20) NOT NULL,
  `makalah_create_date` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(20) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(60) DEFAULT NULL,
  `user_email` varchar(40) DEFAULT NULL,
  `user_password` varchar(30) DEFAULT NULL,
  `user_create_date` datetime(6) NOT NULL,
  `user_status` varchar(30) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
