-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2022 at 09:21 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `challan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Name` varchar(200) NOT NULL,
  `Password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Name`, `Password`) VALUES
('admin', 'group9'),
('admin', 'group9');

-- --------------------------------------------------------

--
-- Table structure for table `challan_generation`
--

CREATE TABLE `challan_generation` (
  `chno` varchar(20) NOT NULL,
  `dlno` varchar(20) NOT NULL,
  `vn` varchar(20) NOT NULL,
  `dn` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `ddate` date NOT NULL,
  `Location` varchar(50) NOT NULL,
  `vitype` varchar(100) NOT NULL,
  `fine` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `challan_generation`
--

INSERT INTO `challan_generation` (`chno`, `dlno`, `vn`, `dn`, `phone`, `ddate`, `Location`, `vitype`, `fine`) VALUES
('10801', '12345', '12345', 'Admin', '9876543210', '2022-02-07', 'cbe', 'Sec-177-General', 'S177-Rs.100'),
('10801', '12345', '12345', 'Admin', '9876543210', '2022-02-07', 'cbe', 'Sec-177-General', 'S177-Rs.100'),
('10802', '123456', 'TN41Y1111', 'nnn', '9876543333', '2022-02-06', 'cbe', 'Sec-129-Driving Without Helmet', 'S129-Rs.1000'),
('10801234', 'TN41Y1234567', 'TN41Y1456', 'AAAA', '9876543666', '2022-02-08', 'cbe', 'Sec-179-Disobedience of orders of authorities', 'S179-Rs.500'),
('', '', '', '', '', '0000-00-00', '', '', ''),
('', '', '', '', '', '0000-00-00', '', '', ''),
('', '', '', '', '', '0000-00-00', '', '', ''),
('', '', '', '', '', '0000-00-00', '', '', ''),
('', '', '', '', '', '0000-00-00', '', 'speeding', ''),
('', '', '', '', '', '0000-00-00', '', '', ''),
('', '', '', '', '', '0000-00-00', '', '', ''),
('', '', '', '', '', '0000-00-00', '', '', ''),
('', '', '', '', '', '0000-00-00', '', '', ''),
('', '', '', '', '', '0000-00-00', '', '', ''),
('', '', '', '', '', '0000-00-00', '', '', ''),
('10801', 'TN41Y12', '12345', 'admin', '9876543210', '2022-02-16', 'cbe', '', ''),
('10801', 'TN41Y12', '12345', 'admin', '9876543210', '2022-02-16', 'cbe', '', ''),
('10801', 'TN41Y12', '12345', 'admin', '9876543210', '2022-02-16', 'cbe', '', ''),
('1080TI1', 'TN41Y12', '12345', 'admin', '9876543210', '2022-02-17', 'cbe', '', ''),
('10801', 'TN41Y12', 'TN41Y1111', 'admin', '9876543210', '2022-02-12', 'cbe', '', ''),
('', '98765', '98765', 'navin', '9087654321', '2022-02-01', 'cbe', 'b', '500'),
('', '132', '98765', 'navin', '9876543210', '2022-02-12', 'cbe', 'a', '100'),
('', '132', '98765', 'navin', '9876543210', '2022-02-12', 'cbe', 'a', '100'),
('', 'TN66 2019 1000050', 'TN 36 A 1365', 'Navin', '9876543210', '0000-00-00', 'Coimbatore', '', ''),
('', '12345786', 'TN 36 A 1365', 'Admin', '8508884488', '0000-00-00', 'Coimbatore', '', ''),
('', '12345786', 'TN 36 A 1365', 'Admin', '8508884488', '0000-00-00', 'Coimbatore', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

CREATE TABLE `complaint` (
  `dlno` varchar(256) NOT NULL,
  `chno` varchar(256) NOT NULL,
  `Name` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `Description` varchar(256) NOT NULL,
  `file` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complaint`
--

INSERT INTO `complaint` (`dlno`, `chno`, `Name`, `email`, `Description`, `file`) VALUES
('12345', 'd1', 'N', 'n@gmail,com', 'not paid', ''),
('1111', 'd2', 'AAA', 'n1@gmail.com', 'not paid', 'add.txt'),
('46778', '10801AAA', 'AAAA', 'n@gmail,com', 'not paid', ''),
('TN41Y12', '10801', 'BBBBB', 'n@gmail,com', 'not paid', ''),
('TN41Y12', '10801', 'BBBBB', 'n@gmail,com', 'not paid', ''),
('12345', '10801', 'NN', 'n@gmail,com', 'not paid', ''),
('12345', '10801', 'NN', 'n@gmail,com', 'not paid', ''),
('TN41Y12', '10801', 'AAA', 'n@gmail,com', 'not paid', ''),
('TN41Y12', '10801', 'AAA', 'n@gmail,com', 'not paid', ''),
('TN41Y12', 'd1', 'AAA', '21mx116@psgtech.ac.in', 'not paid', ''),
('TN41Y12', 'd1', 'AAA', '21mx116@psgtech.ac.in', 'not paid', ''),
('TN41Y12', '10801', 'END', 'n@gmail,com', 'not paid', ''),
('12345', 'd1', 'END', 'n@gmail,com', 'not paid', ''),
('TN41Y12', '10801', 'END', '21mx116@psgtech.ac.in', 'not paid', ''),
('132', '132', 'np', 'n@gmail.com', 'not paid', ''),
('5464231', 'TN 36 A 1000', 'Navin', 'n@gmail,com', 'not paid', ''),
('5464231', 'TN 36 A 1000', 'Navin', 'n@gmail,com', 'not paid', ''),
('12345678', '10801', 'AAA', 'n1@gmail.com', 'not paid', ''),
('9876543', '12334567', 'Rath', 'rath@gmail.com', 'no due', ''),
('12345689', '10801', 'END', '21mx116@psgtech.ac.in', 'not paid', ''),
('98877657', '12334455', 'rath', 'n2@gmail.com', 'not paid', ''),
('12345689', '1080TI1', 'NN', 'n@gmail,com', 'not paid', ''),
('12345875', '10801', 'END', '21mx116@psgtech.ac.in', 'not paid', '');

-- --------------------------------------------------------

--
-- Table structure for table `policelogin`
--

CREATE TABLE `policelogin` (
  `ID` int(11) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `policelogin`
--

INSERT INTO `policelogin` (`ID`, `Username`, `pass`) VALUES
(0, 'admin', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

CREATE TABLE `tblusers` (
  `ID` int(10) NOT NULL,
  `Name` varchar(200) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`ID`, `Name`, `Password`, `CreationDate`) VALUES
(11, 'np1', 'qwerty', '2022-02-16 20:23:33'),
(12, 'admin', '12345', '2022-02-17 12:12:41'),
(13, 'navin1', 'q123', '2022-02-22 11:41:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblusers`
--
ALTER TABLE `tblusers`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblusers`
--
ALTER TABLE `tblusers`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
