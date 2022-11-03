-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 09, 2022 at 01:48 PM
-- Server version: 5.7.34
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `car_rental`
--

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

DROP TABLE IF EXISTS `car`;
CREATE TABLE `car` (
  `carIdNo` int(11) NOT NULL,
  `carType` enum('compact','medium','large','suv','truck','van') DEFAULT NULL,
  `carVehicleId` int(5) DEFAULT NULL,
  `carYear` varchar(255) DEFAULT NULL,
  `carModelMake` varchar(255) DEFAULT NULL,
  `carDailyRate` decimal(19,2) DEFAULT NULL,
  `carWeeklyRate` decimal(19,2) DEFAULT NULL,
  `dateEntered` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`carIdNo`, `carType`, `carVehicleId`, `carYear`, `carModelMake`, `carDailyRate`, `carWeeklyRate`, `dateEntered`) VALUES
(1, 'compact', 1001, '2004', 'Camry', '2000.00', '1500.00', '2022-05-09 05:11:47'),
(2, 'medium', 1002, '2004', 'May Bach', '5000.00', '25000.00', '2022-05-09 11:54:28'),
(3, 'medium', 1002, '2004', 'May Bach', '5000.00', '25000.00', '2022-05-09 11:55:13'),
(4, 'medium', 1002, '2004', 'May Bach', '5000.00', '25000.00', '2022-05-09 11:55:24');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE `customer` (
  `customerIdNo` int(11) NOT NULL,
  `customerName` varchar(50) DEFAULT NULL,
  `customerPhone` varchar(12) DEFAULT NULL,
  `dateEntered` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customerIdNo`, `customerName`, `customerPhone`, `dateEntered`) VALUES
(1, 'G Randle', '0340340343', '2022-05-09 05:12:25'),
(2, 'ad asd sdas', 'asd as das d', '2022-05-09 12:11:09'),
(3, 'K Phonel', '21323221321', '2022-05-09 12:12:06'),
(4, 'd dsf dds', '123123123123', '2022-05-09 12:12:56');

-- --------------------------------------------------------

--
-- Table structure for table `rentals`
--

DROP TABLE IF EXISTS `rentals`;
CREATE TABLE `rentals` (
  `rentalId` int(7) NOT NULL,
  `duration` int(7) DEFAULT NULL,
  `durationType` enum('daily','weekly') DEFAULT NULL,
  `startDate` date DEFAULT NULL,
  `endDate` date DEFAULT NULL,
  `carIdNo` int(7) DEFAULT NULL,
  `customerIdNo` int(7) DEFAULT NULL,
  `dateEntered` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rentals`
--

INSERT INTO `rentals` (`rentalId`, `duration`, `durationType`, `startDate`, `endDate`, `carIdNo`, `customerIdNo`, `dateEntered`) VALUES
(1, 2, 'daily', '2022-05-08', '2022-05-10', 1, 1, '2022-05-08 23:10:13'),
(2, 9, 'weekly', '2022-05-09', '2022-07-11', 1, 1, '2022-05-09 10:54:15'),
(3, 9, 'weekly', '2022-05-09', '2022-07-11', 1, 1, '2022-05-09 10:55:11'),
(4, 2, 'daily', '2022-05-09', '2022-05-11', 1, 1, '2022-05-09 10:55:49');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `about` text,
  `address` text,
  `user_type` enum('staff','supervisor','director','admin','manager') DEFAULT NULL,
  `department` int(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `access_level` int(11) DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `status` enum('active','deactive') DEFAULT NULL,
  `date_registered` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `email`, `phone`, `profile_picture`, `designation`, `about`, `address`, `user_type`, `department`, `username`, `password`, `access_level`, `last_login`, `status`, `date_registered`) VALUES
(12, 'Admin', 'Admin', 'admin@admin.com', '1231231231', NULL, 'Administrator', NULL, NULL, 'admin', 0, 'admin', 'admin@#', 0, NULL, 'active', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`carIdNo`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customerIdNo`);

--
-- Indexes for table `rentals`
--
ALTER TABLE `rentals`
  ADD PRIMARY KEY (`rentalId`),
  ADD KEY `carIdNo` (`carIdNo`),
  ADD KEY `customerIdNo` (`customerIdNo`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `car`
--
ALTER TABLE `car`
  MODIFY `carIdNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customerIdNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rentals`
--
ALTER TABLE `rentals`
  MODIFY `rentalId` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rentals`
--
ALTER TABLE `rentals`
  ADD CONSTRAINT `carIdNo` FOREIGN KEY (`carIdNo`) REFERENCES `car` (`carIdNo`),
  ADD CONSTRAINT `customerIdNo` FOREIGN KEY (`customerIdNo`) REFERENCES `customer` (`customerIdNo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
