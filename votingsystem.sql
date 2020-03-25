-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Mar 24, 2020 at 01:35 PM
-- Server version: 8.0.18
-- PHP Version: 7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `votingsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminhost`
--

DROP TABLE IF EXISTS `adminhost`;
CREATE TABLE IF NOT EXISTS `adminhost` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) NOT NULL,
  `IC` int(30) NOT NULL,
  `Gender` int(11) NOT NULL,
  `DoB` date NOT NULL,
  `PhoneNum` int(11) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Category` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `adminhost`
--

INSERT INTO `adminhost` (`ID`, `Name`, `IC`, `Gender`, `DoB`, `PhoneNum`, `Email`, `password`, `Address`, `Category`) VALUES
(1, 'admin', 1111111111, 1, '2020-03-17', 123456789, 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'Asia Pacific University', 1),
(2, 'host', 222222222, 1, '2020-02-05', 987654321, 'host@gmail.com', '67b3dba8bc6778101892eb77249db32e', 'Asia Pacific University', 2),
(7, 'testing hash', 2147483647, 2, '2000-02-15', 2147483647, 'hash@gmail.com', '0800fc577294c34e0b28ad2839435945', 'testing Hash', 2),
(8, 'admin2', 789654123, 1, '2000-05-12', 161122334, 'admin2@gmail.com', 'c84258e9c39059a89ab77d846ddab909', 'APU', 1);

-- --------------------------------------------------------

--
-- Table structure for table `onetimelink`
--

DROP TABLE IF EXISTS `onetimelink`;
CREATE TABLE IF NOT EXISTS `onetimelink` (
  `token` char(40) DEFAULT NULL,
  `voteremail` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `tstamp` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

DROP TABLE IF EXISTS `room`;
CREATE TABLE IF NOT EXISTS `room` (
  `roomID` int(11) NOT NULL AUTO_INCREMENT,
  `roomName` varchar(255) NOT NULL,
  `roomOwner` varchar(255) NOT NULL,
  `roomRequirement` varchar(255) NOT NULL,
  `roomtype` varchar(10) NOT NULL,
  `object1` varchar(255) NOT NULL,
  `object2` varchar(255) NOT NULL,
  `votesObject1` int(11) NOT NULL,
  `votesObject2` int(11) NOT NULL,
  `ID` int(11) NOT NULL,
  PRIMARY KEY (`roomID`),
  KEY `ID` (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`roomID`, `roomName`, `roomOwner`, `roomRequirement`, `roomtype`, `object1`, `object2`, `votesObject1`, `votesObject2`, `ID`) VALUES
(1, 'This is room 1', 'Host', 'testing', 'Public', 'test1', 'test2', 1, 1, 2),
(2, 'This is room 2', 'host', 'Testing private room', 'Private', 'test1', 'test2', 0, 0, 2),
(4, 'testing 3', 'testing hash', 'testing with hash account', 'Public', 'hash1', 'hash2', 1, 1, 7);

-- --------------------------------------------------------

--
-- Table structure for table `voter`
--

DROP TABLE IF EXISTS `voter`;
CREATE TABLE IF NOT EXISTS `voter` (
  `VoterIC` int(12) NOT NULL,
  `VoterName` varchar(255) NOT NULL,
  `VoterGender` varchar(255) NOT NULL,
  `VoterDoB` date NOT NULL,
  `VoterPhoneNum` int(11) NOT NULL,
  `VoterEmail` varchar(255) NOT NULL,
  `VoterAddress` varchar(255) NOT NULL,
  `roomID` int(11) NOT NULL,
  KEY `roomID` (`roomID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `voter`
--

INSERT INTO `voter` (`VoterIC`, `VoterName`, `VoterGender`, `VoterDoB`, `VoterPhoneNum`, `VoterEmail`, `VoterAddress`, `roomID`) VALUES
(623081111, 'Testing', '1', '2020-06-23', 0, 'voter1@gmail.com', 'KL', 1),
(2147483647, 'Voter function', '1', '2020-02-04', 0, 'voterfunction@gmail.com', 'APU', 1),
(147852369, 'voter2', '2', '2019-09-02', 123, 'voter2@gmail.com', 'APU', 4),
(2147483647, 'Voter function', '1', '2020-02-04', 0, 'voterfunction@gmail.com', 'APU', 4);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
