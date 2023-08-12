-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2022 at 11:44 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `customer`
--

-- --------------------------------------------------------

--
-- Table structure for table `accountbalance`
--

CREATE TABLE `accountbalance` (
  `Id` int(11) NOT NULL,
  `CustomerId` int(11) NOT NULL,
  `Amount` varchar(255) NOT NULL,
  `Transaction` varchar(255) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accountbalance`
--

INSERT INTO `accountbalance` (`Id`, `CustomerId`, `Amount`, `Transaction`, `Date`) VALUES
(1, 1, '5000', 'Credit', '2022-03-30'),
(2, 2, '5000', 'Credit', '2022-03-30');

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `Id` int(11) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`Id`, `Username`, `Password`, `Status`) VALUES
(1, 'teller', '$2y$10$SfhYIDtn.iOuCW7zfoFLuuZHX6lja4lF4XA4JqNmpiH/.P3zB8JCa', 'teller'),
(2, 'manager', '$2y$10$SfhYIDtn.iOuCW7zfoFLuuZHX6lja4lF4XA4JqNmpiH/.P3zB8JCa', 'Manager');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `Id` int(11) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `DOB` date NOT NULL,
  `NID` varchar(255) NOT NULL,
  `Photo` varchar(255) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `Mobile` varchar(50) NOT NULL,
  `AccountNumber` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`Id`, `FirstName`, `LastName`, `DOB`, `NID`, `Photo`, `Address`, `Mobile`, `AccountNumber`) VALUES
(1, 'Victorhugo', 'Bisangwa', '2009-01-01', '1991202029200221', 'victor.jpg', 'Kanombe', '0789066369', '3068547129'),
(2, 'John', 'Doe', '2011-01-04', '1991202029207221', 'victor.jpg', 'Rwanda', '0789066369', '9842051637');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `Id` int(11) NOT NULL,
  `CustomerId` int(11) NOT NULL,
  `Transaction` varchar(255) NOT NULL,
  `Amount` varchar(255) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`Id`, `CustomerId`, `Transaction`, `Amount`, `Date`) VALUES
(1, 1, 'Credit', '5000', '2022-03-30'),
(2, 1, 'Debit', '1000', '2022-03-30'),
(3, 1, 'Debit', '3000', '2022-03-30'),
(4, 1, 'Credit', '5000', '2022-03-30'),
(5, 1, 'Debit', '1000', '2022-03-30'),
(6, 2, 'Credit', '5000', '2022-03-30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accountbalance`
--
ALTER TABLE `accountbalance`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `accountbalance_ibfk_1` (`CustomerId`);

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `CustomerId` (`CustomerId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accountbalance`
--
ALTER TABLE `accountbalance`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accountbalance`
--
ALTER TABLE `accountbalance`
  ADD CONSTRAINT `accountbalance_ibfk_1` FOREIGN KEY (`CustomerId`) REFERENCES `customer` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`CustomerId`) REFERENCES `customer` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
