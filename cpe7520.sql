-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2020 at 07:15 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cpe_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `ceac_studentvolunteers`
--

CREATE TABLE `ceac_studentvolunteers` (
  `No` int(11) NOT NULL,
  `firstname` varchar(10) DEFAULT NULL,
  `middlename` varchar(10) DEFAULT NULL,
  `lastname` varchar(10) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `course` varchar(5) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `presentaddress` varchar(30) DEFAULT NULL,
  `permanentaddress` varchar(30) DEFAULT NULL,
  `homephone` bigint(20) DEFAULT NULL,
  `mobileno` bigint(20) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `schoolyear` int(11) DEFAULT NULL,
  `timein` time DEFAULT NULL,
  `timeout` time DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `accounttype` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ceac_tc`
--

CREATE TABLE `ceac_tc` (
  `No` int(11) NOT NULL,
  `firstname` varchar(10) DEFAULT NULL,
  `middlename` varchar(10) DEFAULT NULL,
  `lastname` varchar(10) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `course` varchar(5) DEFAULT NULL,
  `gradyear` int(11) DEFAULT NULL,
  `school` varchar(30) DEFAULT NULL,
  `schoolyear` int(11) DEFAULT NULL,
  `timein` time DEFAULT NULL,
  `timeout` time DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `accounttype` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ceac_tc`
--

INSERT INTO `ceac_tc` (`No`, `firstname`, `middlename`, `lastname`, `birthdate`, `course`, `gradyear`, `school`, `schoolyear`, `timein`, `timeout`, `username`, `password`, `accounttype`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', 'test', 'admin'),
(2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'officer', 'test', 'officer');

-- --------------------------------------------------------

--
-- Table structure for table `dml_studentvolunteers`
--

CREATE TABLE `dml_studentvolunteers` (
  `No` int(11) NOT NULL,
  `firstname` varchar(10) DEFAULT NULL,
  `middlename` varchar(10) DEFAULT NULL,
  `lastname` varchar(10) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `course` varchar(5) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `presentaddress` varchar(30) DEFAULT NULL,
  `permanentaddress` varchar(30) DEFAULT NULL,
  `homephone` bigint(20) DEFAULT NULL,
  `mobileno` bigint(20) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `schoolyear` int(11) DEFAULT NULL,
  `timein` time DEFAULT NULL,
  `timeout` time DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `accounttype` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `dml_tc`
--

CREATE TABLE `dml_tc` (
  `No` int(11) NOT NULL,
  `firstname` varchar(10) DEFAULT NULL,
  `middlename` varchar(10) DEFAULT NULL,
  `lastname` varchar(10) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `course` varchar(5) DEFAULT NULL,
  `gradyear` int(11) DEFAULT NULL,
  `timein` time DEFAULT NULL,
  `timeout` time DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `accounttype` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dml_tc`
--

INSERT INTO `dml_tc` (`No`, `firstname`, `middlename`, `lastname`, `birthdate`, `course`, `gradyear`, `timein`, `timeout`, `username`, `password`, `accounttype`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', 'test', 'admin'),
(2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'officer', 'test', 'officer');

-- --------------------------------------------------------

--
-- Table structure for table `ncr_studentvolunteers`
--

CREATE TABLE `ncr_studentvolunteers` (
  `No` int(11) NOT NULL,
  `firstname` varchar(10) DEFAULT NULL,
  `middlename` varchar(10) DEFAULT NULL,
  `lastname` varchar(10) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `course` varchar(5) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `presentaddress` varchar(30) DEFAULT NULL,
  `permanentaddress` varchar(30) DEFAULT NULL,
  `homephone` bigint(20) DEFAULT NULL,
  `mobileno` bigint(20) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `schoolyear` int(11) DEFAULT NULL,
  `timein` time DEFAULT NULL,
  `timeout` time DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `accounttype` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ncr_tc`
--

CREATE TABLE `ncr_tc` (
  `No` int(11) NOT NULL,
  `firstname` varchar(10) DEFAULT NULL,
  `middlename` varchar(10) DEFAULT NULL,
  `lastname` varchar(10) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `course` varchar(5) DEFAULT NULL,
  `gradyear` int(11) DEFAULT NULL,
  `timein` time DEFAULT NULL,
  `timeout` time DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `accounttype` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ncr_tc`
--

INSERT INTO `ncr_tc` (`No`, `firstname`, `middlename`, `lastname`, `birthdate`, `course`, `gradyear`, `timein`, `timeout`, `username`, `password`, `accounttype`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', 'test', 'admin'),
(2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'officer', 'test', 'officer');

-- --------------------------------------------------------

--
-- Table structure for table `pcb_studentvolunteers`
--

CREATE TABLE `pcb_studentvolunteers` (
  `No` int(11) NOT NULL,
  `firstname` varchar(10) DEFAULT NULL,
  `middlename` varchar(10) DEFAULT NULL,
  `lastname` varchar(10) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `course` varchar(5) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `presentaddress` varchar(30) DEFAULT NULL,
  `permanentaddress` varchar(30) DEFAULT NULL,
  `homephone` bigint(20) DEFAULT NULL,
  `mobileno` bigint(20) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `schoolyear` int(11) DEFAULT NULL,
  `timein` time DEFAULT NULL,
  `timeout` time DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `accounttype` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pcb_tc`
--

CREATE TABLE `pcb_tc` (
  `No` int(11) NOT NULL,
  `firstname` varchar(10) DEFAULT NULL,
  `middlename` varchar(10) DEFAULT NULL,
  `lastname` varchar(10) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `course` varchar(5) DEFAULT NULL,
  `gradyear` int(11) DEFAULT NULL,
  `timein` time DEFAULT NULL,
  `timeout` time DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `accounttype` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pcb_tc`
--

INSERT INTO `pcb_tc` (`No`, `firstname`, `middlename`, `lastname`, `birthdate`, `course`, `gradyear`, `timein`, `timeout`, `username`, `password`, `accounttype`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', 'test', 'admin'),
(2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'officer', 'test', 'officer');

-- --------------------------------------------------------

--
-- Table structure for table `secn_studentvolunteers`
--

CREATE TABLE `secn_studentvolunteers` (
  `No` int(11) NOT NULL,
  `firstname` varchar(10) DEFAULT NULL,
  `middlename` varchar(10) DEFAULT NULL,
  `lastname` varchar(10) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `course` varchar(5) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `presentaddress` varchar(30) DEFAULT NULL,
  `permanentaddress` varchar(30) DEFAULT NULL,
  `homephone` bigint(20) DEFAULT NULL,
  `mobileno` bigint(20) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `schoolyear` int(11) DEFAULT NULL,
  `timein` time DEFAULT NULL,
  `timeout` time DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `accounttype` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `secn_tc`
--

CREATE TABLE `secn_tc` (
  `No` int(11) NOT NULL,
  `firstname` varchar(10) DEFAULT NULL,
  `middlename` varchar(10) DEFAULT NULL,
  `lastname` varchar(10) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `course` varchar(5) DEFAULT NULL,
  `gradyear` int(11) DEFAULT NULL,
  `timein` time DEFAULT NULL,
  `timeout` time DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `accounttype` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `secn_tc`
--

INSERT INTO `secn_tc` (`No`, `firstname`, `middlename`, `lastname`, `birthdate`, `course`, `gradyear`, `timein`, `timeout`, `username`, `password`, `accounttype`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', 'test', 'admin'),
(2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'officer', 'test', 'officer');

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `No` int(11) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `labassign` varchar(20) NOT NULL,
  `typeofaccount` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`No`, `username`, `password`, `labassign`, `typeofaccount`) VALUES
(1, 'daven', 'test', 'dml', 'student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ceac_studentvolunteers`
--
ALTER TABLE `ceac_studentvolunteers`
  ADD PRIMARY KEY (`No`);

--
-- Indexes for table `ceac_tc`
--
ALTER TABLE `ceac_tc`
  ADD PRIMARY KEY (`No`);

--
-- Indexes for table `dml_studentvolunteers`
--
ALTER TABLE `dml_studentvolunteers`
  ADD PRIMARY KEY (`No`);

--
-- Indexes for table `dml_tc`
--
ALTER TABLE `dml_tc`
  ADD PRIMARY KEY (`No`);

--
-- Indexes for table `ncr_studentvolunteers`
--
ALTER TABLE `ncr_studentvolunteers`
  ADD PRIMARY KEY (`No`);

--
-- Indexes for table `ncr_tc`
--
ALTER TABLE `ncr_tc`
  ADD PRIMARY KEY (`No`);

--
-- Indexes for table `pcb_studentvolunteers`
--
ALTER TABLE `pcb_studentvolunteers`
  ADD PRIMARY KEY (`No`);

--
-- Indexes for table `pcb_tc`
--
ALTER TABLE `pcb_tc`
  ADD PRIMARY KEY (`No`);

--
-- Indexes for table `secn_studentvolunteers`
--
ALTER TABLE `secn_studentvolunteers`
  ADD PRIMARY KEY (`No`);

--
-- Indexes for table `secn_tc`
--
ALTER TABLE `secn_tc`
  ADD PRIMARY KEY (`No`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`No`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ceac_studentvolunteers`
--
ALTER TABLE `ceac_studentvolunteers`
  MODIFY `No` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ceac_tc`
--
ALTER TABLE `ceac_tc`
  MODIFY `No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `dml_studentvolunteers`
--
ALTER TABLE `dml_studentvolunteers`
  MODIFY `No` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dml_tc`
--
ALTER TABLE `dml_tc`
  MODIFY `No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ncr_studentvolunteers`
--
ALTER TABLE `ncr_studentvolunteers`
  MODIFY `No` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ncr_tc`
--
ALTER TABLE `ncr_tc`
  MODIFY `No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pcb_studentvolunteers`
--
ALTER TABLE `pcb_studentvolunteers`
  MODIFY `No` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pcb_tc`
--
ALTER TABLE `pcb_tc`
  MODIFY `No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `secn_studentvolunteers`
--
ALTER TABLE `secn_studentvolunteers`
  MODIFY `No` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `secn_tc`
--
ALTER TABLE `secn_tc`
  MODIFY `No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
