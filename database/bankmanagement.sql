-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2022 at 01:16 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bankmanagement`
--

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` int(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` int(10) NOT NULL,
  `cash` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `name`, `address`, `phone`, `cash`) VALUES
(1, 'kkkk', 'wertd', 12346, 123457),
(2, '', '', 0, 0),
(3, 'qwerty', 'qwert', 12345678, 12345),
(4, 'qwerty', 'qwert', 12345678, 12345);

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE `currency` (
  `id` int(3) NOT NULL,
  `sell` double NOT NULL,
  `preacher` double NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`id`, `sell`, `preacher`, `name`) VALUES
(1, 1234, 1234, 'sdg'),
(2, 1234, 14234, 'usd'),
(3, 12, 123, 'aaa');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) NOT NULL,
  `customerFirstName` varchar(20) NOT NULL,
  `customerSecondName` varchar(20) NOT NULL,
  `customerThirdName` varchar(20) NOT NULL,
  `customerForthName` varchar(20) NOT NULL,
  `customerDateOfBearth` date NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `customerAddress` varchar(100) NOT NULL,
  `customerPhoneNumber` int(10) NOT NULL,
  `customerEmail` varchar(50) NOT NULL,
  `customerBranchId` int(5) NOT NULL,
  `customerBalance` double NOT NULL,
  `currency` int(3) NOT NULL,
  `password` varchar(255) NOT NULL,
  `customerAccountId` varchar(10) NOT NULL,
  `nationalId` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `customerFirstName`, `customerSecondName`, `customerThirdName`, `customerForthName`, `customerDateOfBearth`, `date`, `customerAddress`, `customerPhoneNumber`, `customerEmail`, `customerBranchId`, `customerBalance`, `currency`, `password`, `customerAccountId`, `nationalId`) VALUES
(21, 'someone', 'someone', 'someone', 'someone', '2022-09-23', '2022-09-23 07:29:00', 'someone', 1234, 'someone', 123, 1234, 2, 'someone', '2309222100', ''),
(22, '1234', '1234', '`1234', '1234', '2022-09-22', '0000-00-00 00:00:00', '12345', 1234, 'asdf@asd.com', 0, 2249, 1, '', '2409222200', '1234'),
(23, '1234567', '2345678', '78', '6789', '2022-09-14', '0000-00-00 00:00:00', '12345', 2345678, 'asdf@asd.com', 0, 12345, 1, '', '2409222300', '23456'),
(24, '1234567', '2345678', '78', '6789', '2022-09-14', '0000-00-00 00:00:00', '12345', 2345678, 'asdf@asd.com', 0, 12345, 1, '', '2409222400', '23456'),
(25, '1234567', '2345678', '78', '6789', '2022-09-14', '0000-00-00 00:00:00', '12345', 2345678, 'asdf@asd.com', 0, 11604, 1, '', '2409222500', '23456');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(5) NOT NULL,
  `jopId` int(5) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `barachId` int(5) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `jopId`, `name`, `password`, `address`, `phone`, `email`, `barachId`, `date`) VALUES
(1, 1, 'someone', '1234', 'sdfghjkl', '12345678', 'someone@someone.com', 1, '2022-09-24 03:30:02');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(5) NOT NULL,
  `jobTitle` varchar(20) NOT NULL,
  `jobDescription` varchar(100) NOT NULL,
  `salary` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `jobTitle`, `jobDescription`, `salary`) VALUES
(1, 'manager', 'this is a admin page', 123456),
(2, 'wert', 'wskcx', 12345);

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `id` int(10) NOT NULL,
  `sericeName` varchar(20) NOT NULL,
  `beneficiary` int(10) NOT NULL,
  `intrest` double NOT NULL DEFAULT 50,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `money` double NOT NULL,
  `category` int(3) NOT NULL,
  `currency` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `servicecategories`
--

CREATE TABLE `servicecategories` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(10) NOT NULL,
  `beneficary` int(10) NOT NULL,
  `intrest` double NOT NULL DEFAULT 50,
  `fromAccountId` varchar(15) NOT NULL,
  `Cashhold` varchar(50) NOT NULL,
  `money` double NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `currency` int(3) NOT NULL,
  `cashholdNId` int(11) NOT NULL,
  `serviceID` int(10) NOT NULL DEFAULT 0,
  `reportId` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `beneficary`, `intrest`, `fromAccountId`, `Cashhold`, `money`, `date`, `currency`, `cashholdNId`, `serviceID`, `reportId`) VALUES
(1, 0, 50, '2147483647', '', 123, '0000-00-00 00:00:00', 1, 0, 0, '1234567890'),
(2, 0, 50, '2409222500', '', 234, '0000-00-00 00:00:00', 1, 0, 0, '1234567890'),
(3, 0, 50, '2409222500', '', 234, '0000-00-00 00:00:00', 1, 0, 0, '1234567890'),
(4, 0, 50, '2409222200', '', 1212, '0000-00-00 00:00:00', 1, 0, 0, '123456'),
(5, 0, 50, '2409222200', '', 1212, '0000-00-00 00:00:00', 1, 0, 0, '123456'),
(6, 0, 50, '2409222200', '', 1212, '0000-00-00 00:00:00', 1, 0, 0, '123456'),
(7, 0, 50, '2409222200', '', 1212, '0000-00-00 00:00:00', 1, 0, 0, '123456'),
(8, 0, 50, '2409222200', '', 1212, '0000-00-00 00:00:00', 1, 0, 0, '123456'),
(9, 0, 50, '2409222200', '', 1212, '0000-00-00 00:00:00', 1, 0, 0, '123456'),
(10, 0, 50, '2409222200', '', 1212, '0000-00-00 00:00:00', 1, 0, 0, '123456'),
(11, 0, 50, '2409222200', '', 1212, '0000-00-00 00:00:00', 1, 0, 0, '123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `servicecategories`
--
ALTER TABLE `servicecategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `currency`
--
ALTER TABLE `currency`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `servicecategories`
--
ALTER TABLE `servicecategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
