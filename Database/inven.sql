-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2022 at 06:24 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inven`
--

-- --------------------------------------------------------

--
-- Table structure for table `device`
--

CREATE TABLE `device` (
  `idbarang` int(11) NOT NULL,
  `hostname` varchar(50) NOT NULL,
  `ipaddress` varchar(20) NOT NULL,
  `devicetype` varchar(50) NOT NULL,
  `deviceseries` varchar(50) NOT NULL,
  `serialnumber` varchar(20) NOT NULL,
  `portnumber` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `device`
--

INSERT INTO `device` (`idbarang`, `hostname`, `ipaddress`, `devicetype`, `deviceseries`, `serialnumber`, `portnumber`) VALUES
(39, 'Zhafran', '191.181.11.1', 'PC', 'Intel', '1234-1827-8123-7878', '11'),
(40, 'ipul', '191.181.11.2', 'Router', 'Telko', '1234-1827-8123-7879', '8'),
(41, 'adadaw', '191.181.11.3', 'PC', 'AMD', '1234-1827-8123-7880', '2'),
(42, 'wdadwa', '191.181.11.4', 'Switch', 'Cisco', '1234-1827-8123-7881', '3'),
(43, 'dio', '191.181.11.1', 'Switch', 'Cisco', '1234-1827-8123-7878', '12'),
(44, 'andi', '192-112-32-1', 'Router', 'Telko', '2341-8724-8926-8361', '12'),
(45, 'andi', '123-123-421-1', 'PC', 'Intel', '2341-8724-8926-8361', '12');

-- --------------------------------------------------------

--
-- Table structure for table `devicetype`
--

CREATE TABLE `devicetype` (
  `iddevice` int(11) NOT NULL,
  `device` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `devicetype`
--

INSERT INTO `devicetype` (`iddevice`, `device`) VALUES
(1, 'PC'),
(2, 'Router'),
(3, 'Switch');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `iduser` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`iduser`, `email`, `password`) VALUES
(1, 'admin1@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `prabu`
--

CREATE TABLE `prabu` (
  `idbarang` int(11) NOT NULL,
  `hostname` varchar(50) NOT NULL,
  `ipaddress` varchar(20) NOT NULL,
  `devicetype` varchar(50) NOT NULL,
  `deviceseries` varchar(50) NOT NULL,
  `serialnumber` varchar(20) NOT NULL,
  `portnumber` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prabu`
--

INSERT INTO `prabu` (`idbarang`, `hostname`, `ipaddress`, `devicetype`, `deviceseries`, `serialnumber`, `portnumber`) VALUES
(5215, '1', 'Zhafran', 'PC', 'PC', 'x11', '1234-1827-8123-7878'),
(5216, '2', 'ipul', 'sda', 'sdaw', 'wdaw', 'daw'),
(5217, '3', 'adadaw', 'dadadwadad', 'adada', 'adawda', 'ada'),
(5218, '4', 'wdadwa', 'wdad', 'awdad', 'adaw', 'ada'),
(5219, '5', 'dio', '191.181.11.1', 'RealMe', '13', '1234-1827-8123-7878'),
(5220, '6', 'andi', '192-112-32-1', '1', 'cisco x64', '2341-8724-8926-8361'),
(5221, '7', 'andi', '123-123-421-1', 'PC', 'cisco x64', '2341-8724-8926-8361'),
(5223, 'James', '192.192.11.1', 'Router', 'cisco x22', '1234-2138-2832-3232', '11'),
(5224, 'Zhafran', '191.181.11.1', 'PC', 'Intel', '1234-1827-8123-7878', '11'),
(5225, 'ipul', '191.181.11.2', 'Router', 'Telko', '1234-1827-8123-7879', '8'),
(5226, 'adadaw', '191.181.11.3', 'PC', 'AMD', '1234-1827-8123-7880', '2'),
(5227, 'wdadwa', '191.181.11.4', 'Switch', 'Cisco', '1234-1827-8123-7881', '3'),
(5228, 'dio', '191.181.11.1', 'Switch', 'Cisco', '1234-1827-8123-7878', '12'),
(5229, 'andi', '192-112-32-1', 'Router', 'Telko', '2341-8724-8926-8361', '12'),
(5230, 'andi', '123-123-421-1', 'PC', 'Intel', '2341-8724-8926-8361', '12'),
(5231, 'James', '123-563-34-2', 'PC', 'Intel', '1234-2138-2832-3232', '11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `device`
--
ALTER TABLE `device`
  ADD PRIMARY KEY (`idbarang`);

--
-- Indexes for table `devicetype`
--
ALTER TABLE `devicetype`
  ADD PRIMARY KEY (`iddevice`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`iduser`);

--
-- Indexes for table `prabu`
--
ALTER TABLE `prabu`
  ADD PRIMARY KEY (`idbarang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `device`
--
ALTER TABLE `device`
  MODIFY `idbarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `devicetype`
--
ALTER TABLE `devicetype`
  MODIFY `iddevice` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `prabu`
--
ALTER TABLE `prabu`
  MODIFY `idbarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5232;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
