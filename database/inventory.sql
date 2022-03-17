-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2022 at 07:20 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `access`
--

CREATE TABLE `access` (
  `acc_id` int(11) NOT NULL,
  `acc_uname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `acc_email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `acc_pass` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `acc_role` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `acc_fullname` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `access`
--

INSERT INTO `access` (`acc_id`, `acc_uname`, `acc_email`, `acc_pass`, `acc_role`, `acc_fullname`) VALUES
(2, 'ms1718001', 'jalal@um.edu.my', '0192023a7bbd73250516f069df18b500', '1', 'Logan'),
(3, '17122291', 'hazrina@um.edu.my', '0192023a7bbd73250516f069df18b500', '2', 'Shiva');

-- --------------------------------------------------------

--
-- Table structure for table `invalidproduct`
--

CREATE TABLE `invalidproduct` (
  `modelID` int(255) NOT NULL,
  `modelName` text NOT NULL,
  `modelBrand` varchar(10) NOT NULL,
  `modelCategory` varchar(255) DEFAULT NULL,
  `modelPrice` varchar(255) DEFAULT NULL,
  `modelQuantity` int(11) NOT NULL,
  `modelMax` int(11) NOT NULL,
  `modelSupplier` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invalidproduct`
--

INSERT INTO `invalidproduct` (`modelID`, `modelName`, `modelBrand`, `modelCategory`, `modelPrice`, `modelQuantity`, `modelMax`, `modelSupplier`) VALUES
(11, 'One Plus 9', '', 'Mobile Phone', '600', 550, 1000, 'ABC.sdn.bhd');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `modelID` int(255) NOT NULL,
  `modelName` text NOT NULL,
  `modelBrand` varchar(10) NOT NULL,
  `modelCategory` varchar(255) DEFAULT NULL,
  `modelPrice` varchar(255) DEFAULT NULL,
  `modelQuantity` int(11) NOT NULL,
  `modelMax` int(11) NOT NULL,
  `modelSupplier` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`modelID`, `modelName`, `modelBrand`, `modelCategory`, `modelPrice`, `modelQuantity`, `modelMax`, `modelSupplier`) VALUES
(0, 'Nokia N13', 'Nokia', 'Mobile Phone', '600', 400, 1000, 'ABC.sdn.bhd'),
(1, 'Apple 13', 'Apple', 'Mobile Phone', '100', 500, 1000, 'ABC.sdn.bhd'),
(2, 'Apple 12', 'Apple', 'Mobile Phone', '200', 200, 1000, 'ABC.sdn.bhd'),
(3, 'Apple 11', 'Apple', 'Mobile Phone', '300', 300, 1000, 'ABC.sdn.bhd'),
(4, 'Nokia N11', 'Nokia', 'Mobile Phone', '400', 400, 1000, 'ABC.sdn.bhd'),
(5, 'Nokia N12', 'Nokia', 'Mobile Phone', '500', 350, 1000, 'ABC.sdn.bhd'),
(6, 'Nokia N13', 'Nokia', 'Mobile Phone', '600', 200, 1000, 'ABC.sdn.bhd'),
(7, 'One Plus 9', 'One Plus', 'Mobile Phone', '600', 200, 1000, 'ABC.sdn.bhd'),
(12, 'Samsung Flip', 'Samsung', 'Mobile Phone', '600', 335, 1000, 'ABC.sdn.bhd');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access`
--
ALTER TABLE `access`
  ADD PRIMARY KEY (`acc_id`),
  ADD UNIQUE KEY `acc_uname` (`acc_uname`),
  ADD UNIQUE KEY `acc_email` (`acc_email`);

--
-- Indexes for table `invalidproduct`
--
ALTER TABLE `invalidproduct`
  ADD PRIMARY KEY (`modelID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`modelID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `access`
--
ALTER TABLE `access`
  MODIFY `acc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `invalidproduct`
--
ALTER TABLE `invalidproduct`
  MODIFY `modelID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
