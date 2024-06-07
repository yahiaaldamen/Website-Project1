-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2024 at 09:49 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `travel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `FirstName` varchar(50) DEFAULT NULL,
  `LastName` varchar(50) NOT NULL,
  `User` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_croatian_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`FirstName`, `LastName`, `User`, `Password`) VALUES
('admin', 'admin', 'a_dmin', '987654321');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `The starting point` varchar(30) NOT NULL,
  `Destination` varchar(30) NOT NULL,
  `How Many` varchar(20) NOT NULL,
  `Date of coming` date NOT NULL,
  `Date of going` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_croatian_ci;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`The starting point`, `Destination`, `How Many`, `Date of coming`, `Date of going`) VALUES
('Jordan', 'Turkey', '10 days', '2024-04-23', '2024-05-04'),
('Jordan', 'Saudi Arabia', '10 days', '2024-04-23', '2024-05-03'),
('Qatar', 'Jordan ', '20 days', '2024-06-19', '2024-07-09'),
('United Arab Emirates', 'France', '9 days', '2024-06-14', '2024-06-22'),
('Amsterdam', 'Korea', '2 weeks', '2024-05-05', '2024-05-18');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `User` varchar(50) NOT NULL,
  `Address` varchar(20) NOT NULL,
  `PhonNum` int(10) NOT NULL,
  `Password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_croatian_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`FirstName`, `LastName`, `User`, `Address`, `PhonNum`, `Password`) VALUES
('reem', 'hasanen', 'customer', 'Amman', 394973067, 'reem123'),
('yahia', 'aldamen', 'customer', 'Irbid', 347678343, 'y1234'),
('Haneen', 'sawalha', 'customer', 'Irbid', 56784930, 'hhhh123');

-- --------------------------------------------------------

--
-- Table structure for table `guide`
--

CREATE TABLE `guide` (
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(40) NOT NULL,
  `User` varchar(20) NOT NULL,
  `PhoneNumber` int(10) NOT NULL,
  `Address` varchar(20) NOT NULL,
  `Password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_croatian_ci;

--
-- Dumping data for table `guide`
--

INSERT INTO `guide` (`FirstName`, `LastName`, `User`, `PhoneNumber`, `Address`, `Password`) VALUES
('reem', 'hasanen', 'guide', 38746734, 'Amman', '667838');

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

CREATE TABLE `hotels` (
  `HName` varchar(20) NOT NULL,
  `Hotel_location` varchar(20) NOT NULL,
  `Hotel_price` int(20) NOT NULL,
  `Stars level` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_croatian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `ID` int(11) NOT NULL,
  `Email` varchar(40) NOT NULL,
  `Password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`ID`, `Email`, `Password`) VALUES
(1, 'reemhasanen@gmail.com', 'reem123'),
(2, 'suduis@gmai.com', '123456789');

-- --------------------------------------------------------

--
-- Table structure for table `sign up`
--

CREATE TABLE `sign up` (
  `ID` int(11) NOT NULL,
  `FullName` varchar(40) NOT NULL,
  `UserName` varchar(20) NOT NULL,
  `Password` varchar(25) NOT NULL,
  `PhonNum` int(20) NOT NULL,
  `Email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sign up`
--

INSERT INTO `sign up` (`ID`, `FullName`, `UserName`, `Password`, `PhonNum`, `Email`) VALUES
(1, 'reem hasanen', 'reem02', 'reem123', 778742813, 'reemhasanen@gmail.com'),
(88, 'yahia aldamen', 'yahia01', '4567890', 678299290, 'yahia@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sign up`
--
ALTER TABLE `sign up`
  ADD PRIMARY KEY (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
