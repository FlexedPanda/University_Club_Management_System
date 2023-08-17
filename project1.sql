-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2023 at 05:42 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project1`
--

-- --------------------------------------------------------

--
-- Table structure for table `advisor`
--

CREATE TABLE `advisor` (
  `email` varchar(40) NOT NULL,
  `name` varchar(40) NOT NULL,
  `pin` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `Bank_account` int(11) NOT NULL,
  `designation` varchar(20) NOT NULL,
  `balance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `advisor`
--

INSERT INTO `advisor` (`email`, `name`, `pin`, `id`, `Bank_account`, `designation`, `balance`) VALUES
('Kazi@gmail.com', 'Kazi Ahmed', 12345, 1, 12345678, 'advisor', 0);

-- --------------------------------------------------------

--
-- Table structure for table `club`
--

CREATE TABLE `club` (
  `name` varchar(50) NOT NULL,
  `president` varchar(50) NOT NULL,
  `established_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `club`
--

INSERT INTO `club` (`name`, `president`, `established_date`) VALUES
('BUAC', 'MNO', '2023-08-02'),
('BUCC', 'ABC', '2020-08-05'),
('BUEDF', 'XYZ', '2018-08-29');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `name` varchar(100) NOT NULL,
  `pin` int(100) NOT NULL,
  `head` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `designation` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`name`, `pin`, `head`, `email`, `designation`) VALUES
('CSE', 12345, 'Sadia Kazi', 'cse@bracu.com', 'dept'),
('MNS', 12345, 'Mostak Ahmed', 'mns@gmail.com', 'dept'),
('PHY', 12345, 'Yousuf Hyder', 'phy@gmail.com', 'dept');

-- --------------------------------------------------------

--
-- Table structure for table `departmentmessages`
--

CREATE TABLE `departmentmessages` (
  `departmentname` varchar(100) NOT NULL,
  `message` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `departmentmessages`
--

INSERT INTO `departmentmessages` (`departmentname`, `message`) VALUES
('CSE', 'This is a test message from CSE dept'),
('Pharmacy', 'We have a session in the next week'),
('CSE', 'Sample Message By Panda');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `event_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `cost` int(100) NOT NULL,
  `date` date NOT NULL,
  `capacity` int(100) NOT NULL,
  `vanue` varchar(100) NOT NULL,
  `oca_id` int(100) NOT NULL,
  `club_name` varchar(100) NOT NULL,
  `money_received` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`event_id`, `name`, `cost`, `date`, `capacity`, `vanue`, `oca_id`, `club_name`, `money_received`) VALUES
(1, 'Robo Carnival', 10000, '2023-08-22', 1000, 'UB2', 2, 'robu', 0),
(3, 'Lets Dance', 5000, '2023-08-15', 200, 'UB3', 2, 'BULDF', 0);

-- --------------------------------------------------------

--
-- Table structure for table `funding_request`
--

CREATE TABLE `funding_request` (
  `Sponsor_email` varchar(40) NOT NULL,
  `Event` varchar(40) NOT NULL,
  `Amount` int(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `funding_request`
--

INSERT INTO `funding_request` (`Sponsor_email`, `Event`, `Amount`) VALUES
('hasanul@xybank.org', 'Robo Carnival', 10000);

-- --------------------------------------------------------


--
-- Table structure for table `has`
--

CREATE TABLE `has` (
  `member_id` int(11) NOT NULL,
  `club_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `has`
--

INSERT INTO `has` (`member_id`, `club_name`) VALUES
(1, 'BULDF'),
(12, 'bucc'),
(12, 'bucc'),
(12, 'bucc'),
(18, 'BUCC'),
(44, 'BUCC'),
(49, 'BUCC'),
(50, 'BUCC'),
(51, 'BUCC'),
(17, 'BUCC');

-- --------------------------------------------------------

--
-- Table structure for table `incoming_request`
--

CREATE TABLE `incoming_request` (
  `student_id` int(11) NOT NULL,
  `name` varchar(110) NOT NULL,
  `designation` varchar(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `department` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `club` varchar(100) NOT NULL,
  `pin` int(100) NOT NULL,
  `contact_no` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `student_id` int(11) NOT NULL,
  `name` varchar(110) NOT NULL,
  `designation` varchar(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `department` varchar(11) NOT NULL,
  `gender` varchar(11) NOT NULL,
  `club` varchar(110) NOT NULL,
  `pin` int(11) NOT NULL,
  `contact_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`student_id`, `name`, `designation`, `email`, `dob`, `department`, `gender`, `club`, `pin`, `contact_no`) VALUES
(11, 'Abira', 'executive', 'abira@gmail.com', '2023-08-01', 'EEE', 'female', 'BUCC', 12345, 1994225023),
(12, 'Panda', 'executive', 'boysir7@gmail.com', '2000-07-12', 'EEE', 'male', 'bucc', 12345, 12222),
(17, 'FlexedPanda', 'executive', 'flexed@gmail.com', '2000-04-19', 'CSE', 'male', 'BUCC', 12345, 1987634),
(18, 'Panda', 'member', 'panda@gmail.com', '2000-07-12', 'CSE', 'male', 'BUCC', 12345, 12345),
(21, 'Vader', 'president', 'president@gmail.com', '2015-08-05', 'CSE', 'male', 'BUCC', 12345, 1994225024),
(44, 'John Wick', 'executive', 'john@gmail.com', '2005-01-10', 'LLB', 'male', 'BUCC', 12345, 91911),
(49, 'Riaz', 'general', 'riaz@gmail.com', '2000-03-05', 'EEE', 'male', 'BUCC', 12345, 1112220004),
(50, 'Rasel', 'general', 'rasel@gmail.com', '2001-05-06', 'BBA', 'male', 'BUCC', 12345, 7535335),
(51, 'Keka', 'general', 'keka@gmail.com', '1992-09-03', 'EEE', 'male', 'BUCC', 12345, 8938594),
(99, 'Riazul Karim', 'president', 'riazul.karim@g.bracu.ac.bd', '2023-08-10', 'CSE', 'Male', 'robu', 12345, 01812345789),
(98, 'Jon Snow The King In the North', 'president', 'jonsnow@beyondthewall.org', '2000-08-10', 'CSE', 'Male', 'BULDF', 12345, 01377434543);

-- --------------------------------------------------------

--
-- Table structure for table `oca`
--

CREATE TABLE `oca` (
  `Name` varchar(100) NOT NULL,
  `ID` int(100) NOT NULL,
  `Contact_No` int(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Pin` int(100) NOT NULL,
  `Designation` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `oca`
--

INSERT INTO `oca` (`Name`, `ID`, `Contact_No`, `Email`, `Pin`, `Designation`) VALUES
('mahmud', 1, 1345687, 'oca.mahmud@bracu.com', 12345, 'oca');

-- --------------------------------------------------------

--
-- Table structure for table `participate`
--

CREATE TABLE `participate` (
  `member_id` int(100) NOT NULL,
  `event_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `participate`
--

INSERT INTO `participate` (`member_id`, `event_id`) VALUES
(2, 1),
(2, 3),
(12, 1),
(12, 3),
(21, 1),
(21, 3),
(44, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sponsor`
--

CREATE TABLE `sponsor` (
  `Email` varchar(40) NOT NULL,
  `Pin` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `Designation` varchar(40) NOT NULL,
  `funding` int(11) NOT NULL,
  `advisor_account` int(11) NOT NULL,
  `oca_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sponsor`
--

INSERT INTO `sponsor` (`Email`, `Pin`, `name`, `Designation`, `funding`, `advisor_account`, `oca_id`) VALUES
('hasanul@xybank.org', 12345, 'XY Bank', 'sponsor', 30000, 12345678, 1);


--
-- Indexes for dumped tables
--

--
-- Indexes for table `advisor`
--
ALTER TABLE `advisor`
  ADD PRIMARY KEY (`Bank_account`);

--
-- Indexes for table `club`
--
ALTER TABLE `club`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`event_id`);
--
-- Indexes for table `funding_request`
--
ALTER TABLE `funding_request`
  ADD PRIMARY KEY (`Event`,`Sponsor_email`),
  ADD KEY `Test` (`Sponsor_email`);
--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`student_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `participate`
--
ALTER TABLE `participate`
  ADD PRIMARY KEY (`member_id`,`event_id`);

--
-- Indexes for table `sponsor`
--
ALTER TABLE `sponsor`
  ADD PRIMARY KEY (`Email`),
  ADD KEY `oca_id` (`oca_id`),
  ADD KEY `advisor_account` (`advisor_account`);
--
-- Constraints for table `funding_request`
--
ALTER TABLE `funding_request`
  ADD CONSTRAINT `Test` FOREIGN KEY (`Sponsor_email`) REFERENCES `sponsor` (`Email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
