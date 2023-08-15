-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2023 at 09:50 AM
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
('CSE', 12345, 'Sadia Kazi', 'cse@bracu.com', 'dept');

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
  `club_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`event_id`, `name`, `cost`, `date`, `capacity`, `vanue`, `oca_id`, `club_name`) VALUES
(1, 'Robo Carnival', 10000, '2023-08-22', 1000, 'UB2', 2, 'robu'),
(3, 'Lets Dance', 5000, '2023-08-15', 200, 'UB3', 2, 'BULDF');

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
  `contact_no` int(11) NOT NULL,
  `oca_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`student_id`, `name`, `designation`, `email`, `dob`, `department`, `gender`, `club`, `pin`, `contact_no`, `oca_id`) VALUES
(1, 'ikramul', 'executive', 'ikramul@bra', '2003-08-01', 'cse', 'male', 'BULDF', 12345, 1994225023, 1),
(2, 'Mo', 'general', 'mo@bracu.co', '2023-08-01', 'cse', 'female', 'BULDF', 12345, 1994225023, 1),
(0, 'abira', 'executive', 'abira@gmail.com', '2023-08-01', 'cse', 'female', 'BUCC', 12345, 1994225023, 1),
(21, 'Vader', 'president', 'president@gmail.com', '2015-08-05', 'cse', 'male', 'BUCC', 12345, 1994225024, 1);

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
 PRIMARY KEY (`Bank_account`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ;
    
--
-- Dumping data for table `advisor`
--

INSERT INTO `advisor` (`email`, `name`, `pin`, `id`, `Bank_account`) VALUES ('Kazi@gmail.com', 'Kazi Ahmed', '12345', '1', '12345678');
-- --------------------------------------------------------

--
-- Table structure for table `oca`
--


CREATE TABLE `oca` (
  `employee_id` int(100) NOT NULL,
  `pin` int(100) NOT NULL,
  `contact_no` int(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(0, 1),
(0, 3),
(0, 1),
(1, 1),
(0, 1),
(0, 3),
(0, 1),
(0, 3);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
