-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2015 at 10:41 AM
-- Server version: 5.6.24
-- PHP Version: 5.5.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kanisorn`
--

-- --------------------------------------------------------

--
-- Table structure for table `file_document`
--

CREATE TABLE IF NOT EXISTS `file_document` (
  `file_docId` int(11) NOT NULL,
  `file_subName` text NOT NULL,
  `file_docPath` text NOT NULL,
  `file_docDetail` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `file_document`
--

INSERT INTO `file_document` (`file_docId`, `file_subName`, `file_docPath`, `file_docDetail`) VALUES
(0, 'test update', '17_08_15_16_48_11document.pdf', 'ทดสอบการอัพเดท'),
(11, 'แก้ไขอัพโหลด', '17_08_15_15_02_121.jpg', 'แกไขการอัพโหลด');

-- --------------------------------------------------------

--
-- Table structure for table `research`
--

CREATE TABLE IF NOT EXISTS `research` (
  `res_id` int(11) NOT NULL,
  `res_name` text NOT NULL,
  `res_file` text NOT NULL,
  `res_pict` text NOT NULL,
  `res_detail` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `university`
--

CREATE TABLE IF NOT EXISTS `university` (
  `uni_id` int(11) NOT NULL,
  `uni_data` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `university`
--

INSERT INTO `university` (`uni_id`, `uni_data`) VALUES
(3, 'สาขาวิชาวิทยาการคอมพิวเตอร์ คณะวิทยาศาสตร์ มหาวิทยาลัยราชภัฏอุดรธานี'),
(6, 'สาขาวิชาเทคโนโลยีสารสนเทศ คณะวิทยาศาสตร์ มหาวิทยาลัยราชภัฏอุดรธานี'),
(7, 'สาขาวิชาคอมพิวเตอร์ศึกษา คณะครุศาสตร์ มหาวิทยาลัยราชภัฏอุดรธานี');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `file_document`
--
ALTER TABLE `file_document`
  ADD PRIMARY KEY (`file_docId`);

--
-- Indexes for table `research`
--
ALTER TABLE `research`
  ADD PRIMARY KEY (`res_id`);

--
-- Indexes for table `university`
--
ALTER TABLE `university`
  ADD PRIMARY KEY (`uni_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `file_document`
--
ALTER TABLE `file_document`
  MODIFY `file_docId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `research`
--
ALTER TABLE `research`
  MODIFY `res_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `university`
--
ALTER TABLE `university`
  MODIFY `uni_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
