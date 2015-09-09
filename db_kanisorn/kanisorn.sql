-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 09, 2015 at 05:09 PM
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `file_document`
--

INSERT INTO `file_document` (`file_docId`, `file_subName`, `file_docPath`, `file_docDetail`) VALUES
(0, 'test update', '17_08_15_16_48_11document.pdf', 'ทดสอบการอัพเดท'),
(3, 'dd', '06_09_15_22_01_47_.jpg', 'dd');

-- --------------------------------------------------------

--
-- Table structure for table `research`
--

CREATE TABLE IF NOT EXISTS `research` (
  `res_id` int(11) NOT NULL,
  `res_name` text NOT NULL,
  `res_file` text NOT NULL,
  `res_pict` text NOT NULL,
  `res_detail` text NOT NULL,
  `res_type` enum('national','international') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `research`
--

INSERT INTO `research` (`res_id`, `res_name`, `res_file`, `res_pict`, `res_detail`, `res_type`) VALUES
(14, 'national', '06_09_15_17_37.docx', '06_09_15_17_37_.png,06_09_15_17_37_1.png', 'national', 'national'),
(15, 'international', '06_09_15_17_371.docx', '06_09_15_17_37_2.png,06_09_15_17_37_3.png', 'international', 'international'),
(24, 'national test', '06_09_15_21_14.docx', '06_09_15_21_27_.jpg,06_09_15_21_27_1.jpg', 'national test', 'national'),
(25, 'national1', '09_09_15_17_06_.pdf', '06_09_15_22_30_.jpg,06_09_15_22_30_1.jpg', 'national1', 'national'),
(26, 'international test', '06_09_15_22_36_.PDF', '06_09_15_22_36_.jpg,06_09_15_22_36_1.jpg', 'international', 'international');

-- --------------------------------------------------------

--
-- Table structure for table `table_teacher`
--

CREATE TABLE IF NOT EXISTS `table_teacher` (
  `table_id` int(11) NOT NULL DEFAULT '0',
  `table_trem` char(9) NOT NULL,
  `table_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `table_teacher`
--

INSERT INTO `table_teacher` (`table_id`, `table_trem`, `table_name`) VALUES
(0, '1/2558', '07_09_15_15_49_08_.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `university`
--

CREATE TABLE IF NOT EXISTS `university` (
  `uni_id` int(11) NOT NULL,
  `uni_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `university`
--

INSERT INTO `university` (`uni_id`, `uni_data`) VALUES
(3, 'สาขาวิชาวิทยาการคอมพิวเตอร์ คณะวิทยาศาสตร์ มหาวิทยาลัยราชภัฏอุดรธานี'),
(6, 'สาขาวิชาเทคโนโลยีสารสนเทศ คณะวิทยาศาสตร์ มหาวิทยาลัยราชภัฏอุดรธานี'),
(7, 'สาขาวิชาคอมพิวเตอร์ศึกษา คณะครุศาสตร์ มหาวิทยาลัยราชภัฏอุดรธานี');

-- --------------------------------------------------------

--
-- Table structure for table `username`
--

CREATE TABLE IF NOT EXISTS `username` (
  `user_id` int(11) NOT NULL,
  `user_fb` char(20) NOT NULL,
  `user_fbName` text NOT NULL,
  `user_email` text NOT NULL,
  `user_status` enum('public','admin') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `username`
--

INSERT INTO `username` (`user_id`, `user_fb`, `user_fbName`, `user_email`, `user_status`) VALUES
(1, '1041856095832668', 'เต้ ไชยวัฒน์', 'mynameistecs51@gmail.com', 'admin');

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
-- Indexes for table `table_teacher`
--
ALTER TABLE `table_teacher`
  ADD PRIMARY KEY (`table_trem`);

--
-- Indexes for table `university`
--
ALTER TABLE `university`
  ADD PRIMARY KEY (`uni_id`);

--
-- Indexes for table `username`
--
ALTER TABLE `username`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `username`
--
ALTER TABLE `username`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
