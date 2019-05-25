-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2019 at 04:39 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bis`
--

-- --------------------------------------------------------

--
-- Table structure for table `brgy_official`
--

CREATE TABLE `brgy_official` (
  `off_id` int(3) NOT NULL,
  `off_fname` varchar(30) NOT NULL,
  `off_mname` varchar(30) NOT NULL,
  `off_lname` varchar(30) NOT NULL,
  `off_position` varchar(40) NOT NULL,
  `off_gender` varchar(10) NOT NULL,
  `off_age` int(3) NOT NULL,
  `address` text NOT NULL,
  `contact_no` text NOT NULL,
  `pos_id` int(3) NOT NULL,
  `pp` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brgy_official`
--

INSERT INTO `brgy_official` (`off_id`, `off_fname`, `off_mname`, `off_lname`, `off_position`, `off_gender`, `off_age`, `address`, `contact_no`, `pos_id`, `pp`) VALUES
(1, 'jose', 'C.', 'Pedro', 'President', 'Male', 50, 'Sa Bahay lng po', '09482111008', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `certificate`
--

CREATE TABLE `certificate` (
  `cer_id` int(3) NOT NULL,
  `cFname` text NOT NULL,
  `cMname` text NOT NULL,
  `cLname` text NOT NULL,
  `cAge` int(3) NOT NULL,
  `cGender` text NOT NULL,
  `cAddress` text NOT NULL,
  `cDate` date NOT NULL,
  `cTime` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `certificate`
--

INSERT INTO `certificate` (`cer_id`, `cFname`, `cMname`, `cLname`, `cAge`, `cGender`, `cAddress`, `cDate`, `cTime`) VALUES
(1, 'Loui John', 'Patoc', 'Maghari', 19, 'Male', 'Victorias city', '2019-01-01', '00:00:00'),
(2, 'Chayann Marie', '', 'Consemino', 20, 'Female', 'Bacolod City', '2019-01-01', '00:00:00'),
(5, 'Jezru', '', 'Tuzon', 0, 'Male', '', '2019-01-01', '00:00:00'),
(7, 'Jezru', '', 'Tuzon', 20, 'Male', 'ghfhfgh', '2019-01-01', '00:00:00'),
(13, 'Loui John', '', 'Maghari', 19, 'Male', 'Victorias city', '2019-01-01', '00:00:00'),
(15, 'Joven', '', 'Ticao', 16, 'Male', '1', '2019-01-02', '10:45:51'),
(16, 'Loui John', '', 'Maghari2', 0, 'Male', '', '2019-01-04', '14:12:47'),
(17, 'Stevenson', '', 'Jordan', 0, 'Male', '', '2019-01-04', '14:13:28'),
(18, '', '', '', 0, '', '', '2019-01-04', '14:30:31'),
(19, 'Loui John', '', 'Maghari', 19, 'Male', '2', '2019-01-04', '14:30:47'),
(20, 'Loui John', '', 'Maghari', 0, 'Male', '1', '2019-01-04', '18:00:31');

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `pos_id` int(3) NOT NULL,
  `position` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`pos_id`, `position`) VALUES
(1, 'Punong Barangay'),
(2, 'position 2'),
(3, 'position 3'),
(4, 'position 4'),
(5, 'position 5'),
(6, 'position 6'),
(7, 'position 7'),
(8, 'position 8'),
(9, 'position 9'),
(10, 'position 10'),
(11, 'position 11'),
(12, 'position 12'),
(13, 'position 13'),
(14, 'position 14'),
(15, 'position 15'),
(16, 'position 16');

-- --------------------------------------------------------

--
-- Table structure for table `resident`
--

CREATE TABLE `resident` (
  `res_id` int(3) NOT NULL,
  `rFname` text NOT NULL,
  `rMname` text NOT NULL,
  `rLname` text NOT NULL,
  `rAge` int(3) NOT NULL,
  `rGender` text NOT NULL,
  `rAddress` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resident`
--

INSERT INTO `resident` (`res_id`, `rFname`, `rMname`, `rLname`, `rAge`, `rGender`, `rAddress`) VALUES
(1, 'Loui John', '', 'Maghari', 0, 'Male', '1'),
(2, 'Chayann Marie', '', 'Consemino', 20, 'Female', 'Bacolod City'),
(5, 'Jezru', '', 'Tuzon', 20, 'Male', 'Talisay City'),
(10, 'Joven', '', 'Ticao', 16, 'Male', '1'),
(11, 'Loui John', '', 'Maghari2', 0, 'Male', ''),
(12, 'Stevenson', '', 'Jordan', 0, 'Male', ''),
(13, '', '', '', 0, '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brgy_official`
--
ALTER TABLE `brgy_official`
  ADD PRIMARY KEY (`off_id`);

--
-- Indexes for table `certificate`
--
ALTER TABLE `certificate`
  ADD PRIMARY KEY (`cer_id`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`pos_id`);

--
-- Indexes for table `resident`
--
ALTER TABLE `resident`
  ADD PRIMARY KEY (`res_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brgy_official`
--
ALTER TABLE `brgy_official`
  MODIFY `off_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `certificate`
--
ALTER TABLE `certificate`
  MODIFY `cer_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `pos_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `resident`
--
ALTER TABLE `resident`
  MODIFY `res_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
