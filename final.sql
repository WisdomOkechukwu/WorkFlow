-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2019 at 10:43 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `final`
--

-- --------------------------------------------------------

--
-- Table structure for table `checkin`
--

CREATE TABLE `checkin` (
  `id` int(11) NOT NULL,
  `WorkerID` int(50) NOT NULL,
  `WorkerName` varchar(50) NOT NULL,
  `Time` varchar(50) NOT NULL,
  `Day` varchar(32) NOT NULL,
  `Month` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `checkin`
--

INSERT INTO `checkin` (`id`, `WorkerID`, `WorkerName`, `Time`, `Day`, `Month`) VALUES
(1, 2, 'Samuel Oyewole', '09:23 pm', '01', '10'),
(2, 2, 'Samuel Oyewole', '12:25 am', '02', '10'),
(3, 3, 'Ayo Oluwa', '12:30 am', '02', '10'),
(4, 3, 'Ayo Oluwa', '10:34 pm', '03', '10');

-- --------------------------------------------------------

--
-- Table structure for table `logincredentials`
--

CREATE TABLE `logincredentials` (
  `id` int(11) NOT NULL,
  `FullName` varchar(50) NOT NULL,
  `BizName` varchar(50) NOT NULL,
  `BizAddress` varchar(100) NOT NULL,
  `Position` varchar(15) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `PhoneNo` varchar(20) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Category` varchar(20) NOT NULL,
  `BID` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `logincredentials`
--

INSERT INTO `logincredentials` (`id`, `FullName`, `BizName`, `BizAddress`, `Position`, `Email`, `PhoneNo`, `Password`, `Category`, `BID`) VALUES
(1, 'Wisdom Okechukwu', 'Sunesis Global Network', 'No 3 New York Street Nigeria', 'Owner', 'Wisdom@gmail.com', '09068982154', '1234', 'Owner', 0),
(2, 'Samuel Oyewole', '', '', 'Worker', 'samuel@gmail.com', '09068982154', '1234', 'Worker', 1),
(3, 'Ayo Oluwa', '', '', 'Worker', 'Ayo@gmail.com', '09068982154', '1234', 'Worker', 1);

-- --------------------------------------------------------

--
-- Table structure for table `monthlytracker`
--

CREATE TABLE `monthlytracker` (
  `id` int(11) NOT NULL,
  `Worker` varchar(50) NOT NULL,
  `Month` int(50) NOT NULL,
  `Done` int(50) NOT NULL,
  `Undone` int(32) NOT NULL,
  `BID` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `monthlytracker`
--

INSERT INTO `monthlytracker` (`id`, `Worker`, `Month`, `Done`, `Undone`, `BID`) VALUES
(1, 'Samuel Oyewole', 1, 0, 0, 1),
(2, 'Samuel Oyewole', 2, 0, 0, 1),
(3, 'Samuel Oyewole', 3, 0, 0, 1),
(4, 'Samuel Oyewole', 4, 0, 0, 1),
(5, 'Samuel Oyewole', 5, 0, 0, 1),
(6, 'Samuel Oyewole', 6, 0, 0, 1),
(7, 'Samuel Oyewole', 7, 0, 0, 1),
(8, 'Samuel Oyewole', 8, 0, 0, 1),
(9, 'Samuel Oyewole', 9, 0, 0, 1),
(10, 'Samuel Oyewole', 10, 83, 17, 1),
(11, 'Samuel Oyewole', 11, 0, 0, 1),
(12, 'Samuel Oyewole', 12, 0, 0, 1),
(13, 'Ayo Oluwa', 1, 0, 0, 1),
(14, 'Ayo Oluwa', 2, 0, 0, 1),
(15, 'Ayo Oluwa', 3, 0, 0, 1),
(16, 'Ayo Oluwa', 4, 0, 0, 1),
(17, 'Ayo Oluwa', 5, 0, 0, 1),
(18, 'Ayo Oluwa', 6, 0, 0, 1),
(19, 'Ayo Oluwa', 7, 0, 0, 1),
(20, 'Ayo Oluwa', 8, 0, 0, 1),
(21, 'Ayo Oluwa', 9, 0, 0, 1),
(22, 'Ayo Oluwa', 10, 75, 25, 1),
(23, 'Ayo Oluwa', 11, 0, 0, 1),
(24, 'Ayo Oluwa', 12, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `personal`
--

CREATE TABLE `personal` (
  `id` int(11) NOT NULL,
  `pid` int(100) NOT NULL,
  `Task` varchar(1000) NOT NULL,
  `Date` varchar(25) NOT NULL,
  `imp` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `personal`
--

INSERT INTO `personal` (`id`, `pid`, `Task`, `Date`, `imp`) VALUES
(1, 3, 'qd', '12:29 am', 'primary'),
(2, 3, 'qd', '12:29 am', 'primary');

-- --------------------------------------------------------

--
-- Table structure for table `taskgiven`
--

CREATE TABLE `taskgiven` (
  `id` int(11) NOT NULL,
  `Worker` varchar(50) NOT NULL,
  `WorkerID` int(100) NOT NULL,
  `Task` varchar(1000) NOT NULL,
  `WorkDone` varchar(50) NOT NULL,
  `Time` varchar(50) NOT NULL,
  `Day` varchar(50) NOT NULL,
  `Month` varchar(100) NOT NULL,
  `Year` varchar(100) NOT NULL,
  `BID` int(50) NOT NULL,
  `urgency` varchar(30) NOT NULL,
  `ucolour` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `taskgiven`
--

INSERT INTO `taskgiven` (`id`, `Worker`, `WorkerID`, `Task`, `WorkDone`, `Time`, `Day`, `Month`, `Year`, `BID`, `urgency`, `ucolour`) VALUES
(1, 'Samuel Oyewole', 2, 'Go to Hotel Presidential ', 'Yes', '08:40 pm', '01', '10', '2019', 1, 'Very Urgent', 'denied'),
(2, 'Samuel Oyewole', 2, 'Go to Hotel Presidential ', 'Yes', '08:40 pm', '01', '10', '2019', 1, 'Very Urgent', 'denied'),
(3, 'Samuel Oyewole', 2, 'knrohsrpgmr', 'Yes', '12:22 am', '02', '10', '2019', 1, 'Not Urgent', 'process'),
(4, 'Samuel Oyewole', 2, 'knrohsrpgmr', 'Yes', '12:22 am', '02', '10', '2019', 1, 'Not Urgent', 'process'),
(5, 'Samuel Oyewole', 2, 'knrohsrpgmr', 'Yes', '12:22 am', '02', '10', '2019', 1, 'Not Urgent', 'process'),
(6, 'Samuel Oyewole', 2, 'knrohsrpgmr', 'No', '12:22 am', '02', '10', '2019', 1, 'Not Urgent', 'process'),
(7, 'Ayo Oluwa', 3, 'vhvjfjneklb', 'Yes', '12:30 am', '02', '10', '2019', 1, 'Very Urgent', 'denied'),
(8, 'Ayo Oluwa', 3, 'ttj', 'Yes', '01:10 am', '03', '10', '2019', 1, 'Very Urgent', 'denied'),
(9, 'Ayo Oluwa', 3, 'ttj', 'No', '01:10 am', '03', '10', '2019', 1, 'Very Urgent', 'denied'),
(10, 'Ayo Oluwa', 3, 'ttj', 'Yes', '01:10 am', '03', '10', '2019', 1, 'Very Urgent', 'denied');

-- --------------------------------------------------------

--
-- Table structure for table `tasktracker`
--

CREATE TABLE `tasktracker` (
  `id` int(11) NOT NULL,
  `Worker` varchar(100) NOT NULL,
  `Done` int(50) NOT NULL,
  `Undone` int(50) NOT NULL,
  `Percentage` int(100) NOT NULL,
  `Day` varchar(32) NOT NULL,
  `Month` varchar(50) NOT NULL,
  `Year` varchar(50) NOT NULL,
  `Time` varchar(50) NOT NULL,
  `BID` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tasktracker`
--

INSERT INTO `tasktracker` (`id`, `Worker`, `Done`, `Undone`, `Percentage`, `Day`, `Month`, `Year`, `Time`, `BID`) VALUES
(1, 'Samuel Oyewole', 2, 0, 100, '01', '10', '2019', '09:23 pm', 1),
(2, 'Samuel Oyewole', 3, 1, 75, '02', '10', '2019', '12:30 am', 1),
(3, 'Ayo Oluwa', 1, 0, 100, '02', '10', '2019', '12:30 am', 1),
(4, 'Samuel Oyewole', 0, 0, 0, '03', '10', '2019', '10:34 pm', 1),
(5, 'Ayo Oluwa', 2, 1, 67, '03', '10', '2019', '10:34 pm', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `checkin`
--
ALTER TABLE `checkin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logincredentials`
--
ALTER TABLE `logincredentials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `monthlytracker`
--
ALTER TABLE `monthlytracker`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `taskgiven`
--
ALTER TABLE `taskgiven`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasktracker`
--
ALTER TABLE `tasktracker`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `checkin`
--
ALTER TABLE `checkin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `logincredentials`
--
ALTER TABLE `logincredentials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `monthlytracker`
--
ALTER TABLE `monthlytracker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `personal`
--
ALTER TABLE `personal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `taskgiven`
--
ALTER TABLE `taskgiven`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tasktracker`
--
ALTER TABLE `tasktracker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
