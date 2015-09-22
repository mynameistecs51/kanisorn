-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 23, 2015 at 06:45 AM
-- Server version: 5.6.21
-- PHP Version: 5.5.19

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
  `file_docDetail` text NOT NULL,
  `subj_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `file_document`
--

INSERT INTO `file_document` (`file_docId`, `file_subName`, `file_docPath`, `file_docDetail`, `subj_id`) VALUES
(4, '', '16_09_15_07_25_341625580105.PDF', 'test', 1),
(5, '', '17_09_15_10_22_46scan1588.pdf', 'web', 1);

-- --------------------------------------------------------

--
-- Table structure for table `picture_profile`
--

CREATE TABLE IF NOT EXISTS `picture_profile` (
`picPro_id` int(11) NOT NULL,
  `picPro_name` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `picture_profile`
--

INSERT INTO `picture_profile` (`picPro_id`, `picPro_name`) VALUES
(18, '16_09_15_03_52_57_.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `picture_slide`
--

CREATE TABLE IF NOT EXISTS `picture_slide` (
`picSlide_id` int(11) NOT NULL,
  `picSlide_name` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `picture_slide`
--

INSERT INTO `picture_slide` (`picSlide_id`, `picSlide_name`) VALUES
(5, '16_09_15_03_53_.jpg,16_09_15_03_53_1.jpg,16_09_15_03_53_2.jpg');

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `research`
--

INSERT INTO `research` (`res_id`, `res_name`, `res_file`, `res_pict`, `res_detail`, `res_type`) VALUES
(1, 'test1', '22_09_15_22_58_.PDF', '22_09_15_22_58_.jpg,22_09_15_22_58_1.jpg,22_09_15_22_58_2.jpg', 'test1', 'national'),
(2, 'test2', '22_09_15_22_58_1.PDF', '22_09_15_22_58_3.JPG,22_09_15_22_58_4.jpg', 'test2', 'national'),
(3, 'test3', '', '22_09_15_22_59_.gif', 'test3', 'national');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE IF NOT EXISTS `subjects` (
`subj_id` int(11) NOT NULL,
  `subj_name` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`subj_id`, `subj_name`) VALUES
(1, 'network'),
(3, 'web');

-- --------------------------------------------------------

--
-- Table structure for table `table_teacher`
--

CREATE TABLE IF NOT EXISTS `table_teacher` (
`table_id` int(11) NOT NULL,
  `table_trem` char(9) NOT NULL,
  `table_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `university`
--

CREATE TABLE IF NOT EXISTS `university` (
`uni_id` int(11) NOT NULL,
  `uni_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `username`
--

INSERT INTO `username` (`user_id`, `user_fb`, `user_fbName`, `user_email`, `user_status`) VALUES
(2, '1041856095832668', 'เต้ ไชยวัฒน์', 'mynameistecs51@gmail.com', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `file_document`
--
ALTER TABLE `file_document`
 ADD PRIMARY KEY (`file_docId`);

--
-- Indexes for table `picture_profile`
--
ALTER TABLE `picture_profile`
 ADD PRIMARY KEY (`picPro_id`);

--
-- Indexes for table `picture_slide`
--
ALTER TABLE `picture_slide`
 ADD PRIMARY KEY (`picSlide_id`);

--
-- Indexes for table `research`
--
ALTER TABLE `research`
 ADD PRIMARY KEY (`res_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
 ADD PRIMARY KEY (`subj_id`);

--
-- Indexes for table `table_teacher`
--
ALTER TABLE `table_teacher`
 ADD PRIMARY KEY (`table_id`);

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
-- AUTO_INCREMENT for table `file_document`
--
ALTER TABLE `file_document`
MODIFY `file_docId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `picture_profile`
--
ALTER TABLE `picture_profile`
MODIFY `picPro_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `picture_slide`
--
ALTER TABLE `picture_slide`
MODIFY `picSlide_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `research`
--
ALTER TABLE `research`
MODIFY `res_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
MODIFY `subj_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `table_teacher`
--
ALTER TABLE `table_teacher`
MODIFY `table_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `university`
--
ALTER TABLE `university`
MODIFY `uni_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `username`
--
ALTER TABLE `username`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
