-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 14, 2015 at 05:10 PM
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `picture_profile`
--

CREATE TABLE IF NOT EXISTS `picture_profile` (
  `picPro_id` int(11) NOT NULL,
  `picPro_name` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `picture_slide`
--

CREATE TABLE IF NOT EXISTS `picture_slide` (
  `picSlide_id` int(11) NOT NULL,
  `picSlide_name` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `table_teacher`
--

CREATE TABLE IF NOT EXISTS `table_teacher` (
  `table_id` int(11) NOT NULL,
  `table_trem` char(9) NOT NULL,
  `table_name` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `university`
--

CREATE TABLE IF NOT EXISTS `university` (
  `uni_id` int(11) NOT NULL,
  `uni_data` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

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
  MODIFY `file_docId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `picture_profile`
--
ALTER TABLE `picture_profile`
  MODIFY `picPro_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `picture_slide`
--
ALTER TABLE `picture_slide`
  MODIFY `picSlide_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `research`
--
ALTER TABLE `research`
  MODIFY `res_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `table_teacher`
--
ALTER TABLE `table_teacher`
  MODIFY `table_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `university`
--
ALTER TABLE `university`
  MODIFY `uni_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `username`
--
ALTER TABLE `username`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
