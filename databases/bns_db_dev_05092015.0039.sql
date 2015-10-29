-- phpMyAdmin SQL Dump
-- version 4.4.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 04, 2015 at 06:38 PM
-- Server version: 5.6.24
-- PHP Version: 5.5.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bns_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `bus`
--

CREATE TABLE IF NOT EXISTS `bus` (
  `bu_id` int(11) NOT NULL,
  `bu_plat` varchar(200) NOT NULL,
  `bu_status` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bus`
--

INSERT INTO `bus` (`bu_id`, `bu_plat`, `bu_status`) VALUES
(1, 'WUM1804', 'available'),
(2, 'MBN1342', 'available'),
(3, 'PGJ4423', 'available'),
(4, 'PWD1134', 'available');

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE IF NOT EXISTS `driver` (
  `dr_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `bu_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`dr_id`, `u_id`, `bu_id`) VALUES
(1, 3, 2),
(2, 3, 1),
(3, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `driver_location`
--

CREATE TABLE IF NOT EXISTS `driver_location` (
  `dl_id` int(11) NOT NULL,
  `dr_id` int(11) NOT NULL,
  `lo_id` int(11) NOT NULL,
  `dl_datetime` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `driver_location`
--

INSERT INTO `driver_location` (`dl_id`, `dr_id`, `lo_id`, `dl_datetime`) VALUES
(1, 1, 1, '2015-09-04 12:47:14'),
(2, 2, 1, '2015-09-04 12:47:34'),
(3, 2, 1, '2015-09-04 12:48:02'),
(4, 3, 1, '2015-09-04 18:35:07'),
(5, 2, 1, '2015-09-04 18:36:12'),
(6, 2, 1, '2015-09-04 18:36:31');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE IF NOT EXISTS `location` (
  `lo_id` int(11) NOT NULL,
  `lo_name` varchar(200) NOT NULL,
  `lt_id` int(11) NOT NULL,
  `lo_status` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`lo_id`, `lo_name`, `lt_id`, `lo_status`) VALUES
(1, 'Bus Stop FTMK', 1, 0),
(2, 'Bus Stop PPP', 1, 0),
(3, 'Bus Stop PPS', 1, 0),
(4, 'Bus Stop depan Ocean', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `location_type`
--

CREATE TABLE IF NOT EXISTS `location_type` (
  `lt_id` int(11) NOT NULL,
  `lt_desc` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location_type`
--

INSERT INTO `location_type` (`lt_id`, `lt_desc`) VALUES
(1, 'Main Campus'),
(2, 'City Campus'),
(3, 'Industry Campus');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `u_id` int(11) NOT NULL,
  `u_fullname` varchar(200) NOT NULL,
  `u_username` varchar(200) NOT NULL,
  `u_password` varchar(200) NOT NULL,
  `ut_id` int(11) NOT NULL,
  `u_status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `u_fullname`, `u_username`, `u_password`, `ut_id`, `u_status`) VALUES
(1, 'Administrator', 'admin', 'admin', 1, 1),
(3, 'Driver 1', 'driver', 'driver', 2, 1),
(4, 'Passenger 1', 'pass', 'pass', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE IF NOT EXISTS `user_type` (
  `ut_id` int(11) NOT NULL,
  `ut_desc` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`ut_id`, `ut_desc`) VALUES
(1, 'Admin'),
(2, 'Driver'),
(3, 'Passenger');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bus`
--
ALTER TABLE `bus`
  ADD PRIMARY KEY (`bu_id`);

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`dr_id`);

--
-- Indexes for table `driver_location`
--
ALTER TABLE `driver_location`
  ADD PRIMARY KEY (`dl_id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`lo_id`);

--
-- Indexes for table `location_type`
--
ALTER TABLE `location_type`
  ADD PRIMARY KEY (`lt_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`ut_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bus`
--
ALTER TABLE `bus`
  MODIFY `bu_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `driver`
--
ALTER TABLE `driver`
  MODIFY `dr_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `driver_location`
--
ALTER TABLE `driver_location`
  MODIFY `dl_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `lo_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `location_type`
--
ALTER TABLE `location_type`
  MODIFY `lt_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `ut_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
