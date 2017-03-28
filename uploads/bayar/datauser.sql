-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2017 at 04:00 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `seminar`
--

-- --------------------------------------------------------

--
-- Table structure for table `datauser`
--

CREATE TABLE `datauser` (
  `id_data` int(20) NOT NULL,
  `nama_aut` varchar(60) NOT NULL,
  `judul_abs` varchar(60) NOT NULL,
  `file_abs` varchar(60) NOT NULL,
  `keyword` varchar(50) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `author1` varchar(50) NOT NULL,
  `author1abs` varchar(20) NOT NULL,
  `author2` varchar(50) NOT NULL,
  `author2abs` varchar(20) NOT NULL,
  `author3` varchar(50) NOT NULL,
  `author3abs` varchar(20) NOT NULL,
  `author4` varchar(50) NOT NULL,
  `author4abs` varchar(20) NOT NULL,
  `author5` varchar(50) NOT NULL,
  `author5abs` varchar(20) NOT NULL,
  `tanggal_ditambahkan` datetime NOT NULL,
  `status_lolos` varchar(50) NOT NULL,
  `status_bayar` varchar(11) NOT NULL,
  `file_mak` varchar(200) NOT NULL,
  `status_mak` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `datauser`
--

INSERT INTO `datauser` (`id_data`, `nama_aut`, `judul_abs`, `file_abs`, `keyword`, `kategori`, `author1`, `author1abs`, `author2`, `author2abs`, `author3`, `author3abs`, `author4`, `author4abs`, `author5`, `author5abs`, `tanggal_ditambahkan`, `status_lolos`, `status_bayar`, `file_mak`, `status_mak`) VALUES
(1, '', 'tt', '0MTF02168.pdf', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', 'Lolos', '0', '', ''),
(2, '', 'saasx', 'Thema.docx', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', 'Lolos', 'sasas', '', ''),
(3, '', 'das', '0MTF02168.pdf 	', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', 'Lolos', 'sas', '', ''),
(4, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', 'Lolos', '', '', ''),
(5, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', 'Lolos', '', '', ''),
(6, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', 'Lolos', '', '', ''),
(19, '', 'kjshdk', 'Surat pernyataan.docx', 'askdjasld', 'In_tek', 'askdlkas', 'Tidak', 'askd', 'Tidak', 'asdsakdj', 'Tidak', 'askdjlk', 'Tidak', 'askdjlk', 'hadir', '2017-03-10 00:00:00', 'Belum diverifikasi', '', '', ''),
(20, '', 'askdj', 'aktif kul. dana kasih.docx', 'asjldkj', 'In_tek', 'aklsjdl', 'Tidak', 'dlkas;', 'Tidak', 'dskjdk', 'Tidak', 'asdkjl', 'Tidak', 'asdkj', 'Tidak', '2017-03-10 00:00:00', 'Belum diverifikasi', '', '', ''),
(21, '', 'aksldj', 'WhatsApp Image 2016-11-14 at 6.57.51 AM.jpeg', 'aksdjasl', 'In_tek', 'asmdlas', 'Tidak', 'as.dl', 'Tidak', 'asldkl', 'Tidak', 'asl;sad', 'hadir', 'askd;laskd', 'Tidak', '2017-03-10 00:00:00', 'Belum diverifikasi', '', '', ''),
(22, '', 'aksldj', 'WhatsApp Image 2016-11-14 at 6.57.51 AM.jpeg', 'aksdjasl', 'In_tek', 'asmdlas', 'Tidak', 'as.dl', 'Tidak', 'asldkl', 'Tidak', 'asl;sad', 'hadir', 'askd;laskd', 'Tidak', '2017-03-10 00:00:00', 'Belum diverifikasi', '', '', ''),
(23, '', 'askld', 'WhatsApp Image 2016-11-14 at 6.58.01 AM.jpeg', 'aslkasl;', '', 'l;ask', '', '', '', '', '', '', '', '', '', '2017-03-10 00:00:00', 'Belum diverifikasi', '', '', ''),
(24, '', 'a,jskl', 'WhatsApp Image 2016-11-14 at 6.57.51 AM.jpeg', 'as,a,s', '', '', '', '', '', '', '', '', '', '', '', '2017-03-10 00:00:00', 'Belum diverifikasi', '', '', ''),
(25, '', '', 'aktif kul. dana kasih.docx', '', '', '', '', '', '', '', '', '', '', '', '', '2017-03-10 00:00:00', 'Belum diverifikasi', '', '', ''),
(26, '', '', 'Surat pernyataan.docx', '', '', '', '', '', '', '', '', '', '', '', '', '2017-03-10 00:00:00', 'Belum diverifikasi', '', '', ''),
(27, '', '', 'aktif kul. dana kasih.docx', '', '', '', '', '', '', '', '', '', '', '', '', '2017-03-10 00:00:00', 'Belum diverifikasi', '', '', ''),
(28, '', '', 'Surat pernyataan.docx', '', '', '', '', '', '', '', '', '', '', '', '', '2017-03-10 00:00:00', 'Belum diverifikasi', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `datauser`
--
ALTER TABLE `datauser`
  ADD PRIMARY KEY (`id_data`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `datauser`
--
ALTER TABLE `datauser`
  MODIFY `id_data` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
