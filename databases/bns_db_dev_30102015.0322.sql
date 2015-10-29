-- phpMyAdmin SQL Dump
-- version 4.4.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 29, 2015 at 08:21 PM
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
(1, 'WUM1804', '1'),
(2, 'JNJ2911', '1'),
(3, 'PGJ1009', '1'),
(4, 'KBJ3319', '1');

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE IF NOT EXISTS `driver` (
  `dr_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `bu_id` int(11) NOT NULL,
  `dr_lat_lon` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`dr_id`, `u_id`, `bu_id`, `dr_lat_lon`) VALUES
(2, 3, 1, '2.267598,102.27927899999999'),
(3, 5, 2, ''),
(5, 6, 3, ''),
(6, 7, 4, '2.2676320999999997,102.2793028'),
(7, 8, 1, ''),
(8, 9, 2, ''),
(9, 10, 3, ''),
(10, 11, 4, ''),
(11, 12, 1, ''),
(12, 13, 2, ''),
(13, 14, 3, ''),
(14, 15, 4, '');

-- --------------------------------------------------------

--
-- Table structure for table `driver_location`
--

CREATE TABLE IF NOT EXISTS `driver_location` (
  `dl_id` int(11) NOT NULL,
  `dr_id` int(11) NOT NULL,
  `lo_id` int(11) NOT NULL,
  `dl_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `im_id` int(11) NOT NULL,
  `im_image` varchar(200) NOT NULL,
  `im_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE IF NOT EXISTS `location` (
  `lo_id` int(11) NOT NULL,
  `lo_name` varchar(200) NOT NULL,
  `lo_lat_lon` varchar(200) NOT NULL,
  `lt_id` int(11) NOT NULL,
  `lo_status` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`lo_id`, `lo_name`, `lo_lat_lon`, `lt_id`, `lo_status`) VALUES
(1, 'FTMK Bus Stop', '2.308800, 102.319150', 1, 1),
(2, 'PPP Bus Stop', '2.311179, 102.317989', 1, 1),
(3, 'Seri Utama Bus Stop', '2.268829, 102.277900', 4, 1),
(4, 'Emerald Park Bus Stop', '2.249141, 102.274071', 4, 1),
(5, 'Sport Centre Bus Stop', '2.317222, 102.320400', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `location_type`
--

CREATE TABLE IF NOT EXISTS `location_type` (
  `lt_id` int(11) NOT NULL,
  `lt_desc` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location_type`
--

INSERT INTO `location_type` (`lt_id`, `lt_desc`) VALUES
(1, 'Main Campus'),
(2, 'City Campus'),
(3, 'Technology Campus'),
(4, 'Hostel');

-- --------------------------------------------------------

--
-- Table structure for table `stats`
--

CREATE TABLE IF NOT EXISTS `stats` (
  `s_id` int(11) NOT NULL,
  `s_desc` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stats`
--

INSERT INTO `stats` (`s_id`, `s_desc`) VALUES
(1, 'Available'),
(2, 'Not Available');

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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `u_fullname`, `u_username`, `u_password`, `ut_id`, `u_status`) VALUES
(1, 'Administrator', 'admin', 'admin', 1, 1),
(3, 'Driver 1', 'driver', 'driver', 2, 1),
(4, 'Passenger 1', 'pass', 'pass', 3, 1),
(5, 'Driver 2', 'driver2', 'driver2', 2, 1),
(6, 'Driver 3', 'driver3', 'driver3', 2, 1),
(7, 'Driver 4', 'driver4', 'driver4', 2, 1),
(8, 'Driver 5', 'driver5', 'driver5', 2, 1),
(9, 'Driver 6', 'driver6', 'driver6', 2, 1),
(10, 'Driver 7', 'driver7', 'driver7', 2, 1),
(11, 'Driver 8', 'driver8', 'driver8', 2, 1),
(12, 'Driver 9', 'driver9', 'driver9', 2, 1),
(13, 'Driver 10', 'driver10', 'driver10', 2, 1),
(14, 'Driver 11', 'driver11', 'driver11', 2, 1),
(15, 'Driver 12', 'driver12', 'driver12', 2, 1);

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
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`im_id`);

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
-- Indexes for table `stats`
--
ALTER TABLE `stats`
  ADD PRIMARY KEY (`s_id`);

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
  MODIFY `dr_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `driver_location`
--
ALTER TABLE `driver_location`
  MODIFY `dl_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `im_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `lo_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `location_type`
--
ALTER TABLE `location_type`
  MODIFY `lt_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `stats`
--
ALTER TABLE `stats`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `ut_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
