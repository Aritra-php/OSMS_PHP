-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2021 at 01:08 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `osms_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin_tb`
--

CREATE TABLE `adminlogin_tb` (
  `aEmail` varchar(80) NOT NULL,
  `aPass` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminlogin_tb`
--

INSERT INTO `adminlogin_tb` (`aEmail`, `aPass`) VALUES
('admin@gmail.com', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `assignwork_tb`
--

CREATE TABLE `assignwork_tb` (
  `rId` int(10) NOT NULL,
  `rProName` varchar(200) NOT NULL,
  `rProDesc` varchar(200) NOT NULL,
  `rName` varchar(200) NOT NULL,
  `rAddress` varchar(200) NOT NULL,
  `rEmail` varchar(200) NOT NULL,
  `rDate` varchar(200) NOT NULL,
  `rCity` varchar(200) NOT NULL,
  `rState` varchar(200) NOT NULL,
  `rPhone` varchar(200) NOT NULL,
  `rPin` varchar(200) NOT NULL,
  `rTechnician` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assignwork_tb`
--

INSERT INTO `assignwork_tb` (`rId`, `rProName`, `rProDesc`, `rName`, `rAddress`, `rEmail`, `rDate`, `rCity`, `rState`, `rPhone`, `rPin`, `rTechnician`) VALUES
(1, 'Dell Inspiron 3567', 'Laptop Keyboard Not Working Properly', 'Ram Das', '6/1 Sepco Township', 'ramdas@gmail.com', '2021-02-01', 'Durgapur', 'West Bengal', '9876543210', '713205', 'Technician-1'),
(2, 'Samsung Galaxy 45', 'Mobile Screen Broken', 'Laxman Das', '6/5 Chandidas', 'laxman@gmail.com', '2021-02-01', 'Ranchi', 'Jharkhand', '9873243210', '713234', 'Technician-2'),
(3, 'VIVO F12', 'Mobile Battery is Not Taking Charge', 'Sita Chatterjee', '6/5 Sector -5 Salt Laka', 'sita@gmail.com', '2021-02-01', 'Kolkata', 'West Bengal', '9836543210', '713223', 'Technician-3');

-- --------------------------------------------------------

--
-- Table structure for table `feedback_tb`
--

CREATE TABLE `feedback_tb` (
  `rId` int(10) NOT NULL,
  `rFeedback` text NOT NULL,
  `rEmail` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback_tb`
--

INSERT INTO `feedback_tb` (`rId`, `rFeedback`, `rEmail`) VALUES
(1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. \r\nUt enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. \r\n', 'ramdas@gmail.com'),
(2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. \r\nUt enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. \r\n', 'laxman@gmail.com'),
(3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. \r\nUt enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. \r\n', 'sita@gmail.com'),
(4, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. \r\nUt enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. \r\n', 'momo@gmail.com'),
(5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. \r\nUt enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. \r\n', 'jayanta@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `product_tb`
--

CREATE TABLE `product_tb` (
  `pId` int(10) NOT NULL,
  `pName` varchar(50) NOT NULL,
  `pDate` varchar(50) NOT NULL,
  `pStock` int(10) NOT NULL,
  `pCostPrice` decimal(50,0) NOT NULL,
  `pSellPrice` decimal(50,0) NOT NULL,
  `cEmail` varchar(50) NOT NULL,
  `pImage` varchar(255) NOT NULL,
  `pISBNNo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_tb`
--

INSERT INTO `product_tb` (`pId`, `pName`, `pDate`, `pStock`, `pCostPrice`, `pSellPrice`, `cEmail`, `pImage`, `pISBNNo`) VALUES
(1, 'Keyboard', '2021-02-01', 10, '1000', '1200', 'ramdas@gmail.com', 'keyboard.jpg', '151810100044621'),
(2, 'Mobile Screen', '2021-01-29', 14, '800', '890', 'sitadas@gmail.com', 'screen.jpg', '151823450044621');

-- --------------------------------------------------------

--
-- Table structure for table `submitrequest_tb`
--

CREATE TABLE `submitrequest_tb` (
  `rId` int(10) NOT NULL,
  `rProName` varchar(80) NOT NULL,
  `rProDesc` varchar(80) NOT NULL,
  `rName` varchar(80) NOT NULL,
  `rAddress` varchar(80) NOT NULL,
  `rEmail` varchar(80) NOT NULL,
  `rDate` varchar(80) NOT NULL,
  `rCity` varchar(80) NOT NULL,
  `rState` varchar(80) NOT NULL,
  `rPhone` varchar(15) NOT NULL,
  `rPin` int(15) NOT NULL,
  `pImage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `submitrequest_tb`
--

INSERT INTO `submitrequest_tb` (`rId`, `rProName`, `rProDesc`, `rName`, `rAddress`, `rEmail`, `rDate`, `rCity`, `rState`, `rPhone`, `rPin`, `pImage`) VALUES
(1, 'Dell Inspiron 3567', 'Laptop Keyboard Not Working Properly', 'Ram Das', '6/1 Sepco Township', 'ramdas@gmail.com', '2021-02-01', 'Durgapur', 'West Bengal', '9876543210', 713205, 'pro5.jpg'),
(2, 'Samsung Galaxy 45', 'Mobile Screen Broken', 'Laxman Das', '6/5 Chandidas', 'laxman@gmail.com', '2021-02-01', 'Ranchi', 'Jharkhand', '9873243210', 713234, 'pro1.jpg'),
(3, 'VIVO F12', 'Mobile Battery is Not Taking Charge', 'Sita Chatterjee', '6/5 Sector -5 Salt Laka', 'sita@gmail.com', '2021-02-01', 'Kolkata', 'West Bengal', '9836543210', 713223, 'pro3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `technician_tb`
--

CREATE TABLE `technician_tb` (
  `tId` int(10) NOT NULL,
  `tName` varchar(100) NOT NULL,
  `tAddress` varchar(100) NOT NULL,
  `tQualification` varchar(100) NOT NULL,
  `tEmail` varchar(100) NOT NULL,
  `tGender` varchar(100) NOT NULL,
  `tCity` varchar(30) NOT NULL,
  `tContact` varchar(100) NOT NULL,
  `tExpertize` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `technician_tb`
--

INSERT INTO `technician_tb` (`tId`, `tName`, `tAddress`, `tQualification`, `tEmail`, `tGender`, `tCity`, `tContact`, `tExpertize`) VALUES
(1, 'Technician-1', 'Benachity', 'BA', 'one@gmail.com', 'Male', 'Durgapur', '9876543210', 'Fridge,Washing Machine,TV'),
(3, 'Technician-2', 'Benachity', 'Bsc', 'two@gmail.com', 'Female', 'Ranchi', '9876543210', 'Fridge,Washing Machine,TV,Laptop');

-- --------------------------------------------------------

--
-- Table structure for table `userregistration_tb`
--

CREATE TABLE `userregistration_tb` (
  `rId` int(10) NOT NULL,
  `rName` varchar(60) NOT NULL,
  `rEmail` varchar(60) NOT NULL,
  `rPass` varchar(60) NOT NULL,
  `rConPass` varchar(60) NOT NULL,
  `rGender` varchar(60) NOT NULL,
  `rImage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userregistration_tb`
--

INSERT INTO `userregistration_tb` (`rId`, `rName`, `rEmail`, `rPass`, `rConPass`, `rGender`, `rImage`) VALUES
(1, 'Ram Das', 'ramdas@gmail.com', '12345', '12345', 'Male', 'student4.jpg'),
(2, 'Laxman Das', 'laxman@gmail.com', '12345', '12345', 'Male', 'student1.jpg'),
(3, 'Sita Chatterjee', 'sita@gmail.com', '123456', '123456', 'Female', 'student3.jpg'),
(4, 'Moumita Dey', 'momo@gmail.com', '12345678', '12345678', 'Female', 'student2.jpg'),
(5, 'Jayanta Mondal', 'jayanta@gmail.com', '123456', '123456', 'Male', 'shaktiman.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignwork_tb`
--
ALTER TABLE `assignwork_tb`
  ADD PRIMARY KEY (`rId`);

--
-- Indexes for table `feedback_tb`
--
ALTER TABLE `feedback_tb`
  ADD PRIMARY KEY (`rId`);

--
-- Indexes for table `product_tb`
--
ALTER TABLE `product_tb`
  ADD PRIMARY KEY (`pId`);

--
-- Indexes for table `submitrequest_tb`
--
ALTER TABLE `submitrequest_tb`
  ADD PRIMARY KEY (`rId`);

--
-- Indexes for table `technician_tb`
--
ALTER TABLE `technician_tb`
  ADD PRIMARY KEY (`tId`);

--
-- Indexes for table `userregistration_tb`
--
ALTER TABLE `userregistration_tb`
  ADD PRIMARY KEY (`rId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assignwork_tb`
--
ALTER TABLE `assignwork_tb`
  MODIFY `rId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `feedback_tb`
--
ALTER TABLE `feedback_tb`
  MODIFY `rId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product_tb`
--
ALTER TABLE `product_tb`
  MODIFY `pId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `submitrequest_tb`
--
ALTER TABLE `submitrequest_tb`
  MODIFY `rId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `technician_tb`
--
ALTER TABLE `technician_tb`
  MODIFY `tId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `userregistration_tb`
--
ALTER TABLE `userregistration_tb`
  MODIFY `rId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
