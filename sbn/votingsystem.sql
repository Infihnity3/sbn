-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Apr 18, 2020 at 03:14 PM
-- Server version: 8.0.18
-- PHP Version: 7.3.12

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
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `adminhost`
--

INSERT INTO `adminhost` (`ID`, `Name`, `IC`, `Gender`, `DoB`, `PhoneNum`, `Email`, `password`, `Address`, `Category`) VALUES
(1, 'admin', 1111111111, 1, '2020-03-17', 123456789, 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'Asia Pacific University', 1),
(2, 'host', 222222222, 1, '2020-02-05', 987654321, 'host@gmail.com', '815ad1c058df1b7ba9c0998e2aa8a7b4', 'Asia Pacific University', 2),
(7, 'testing hash', 2147483647, 2, '2000-02-15', 2147483647, 'hash@gmail.com', '0800fc577294c34e0b28ad2839435945', 'testing Hash', 2),
(8, 'admin2', 789654123, 1, '2000-05-12', 161122334, 'admin2@gmail.com', 'c84258e9c39059a89ab77d846ddab909', 'APU', 1),
(9, 'Eddie', 2147483647, 2, '1111-01-12', 2147483647, 'eddie@gmail.com', 'f5bb0c8de146c67b44babbf4e6584cc0', 'No. 2, Jalan Pluto , Seksyen U5/142', 2),
(10, 'tewqte', 432432, 2, '2020-04-14', 23424, 'zackchow0306@yahoo.com', 'c400e38a930ea4922dee15e7c7c51a7f', '4eqwerw', 2),
(11, 'Jasper', 123456, 1, '2002-05-03', 21564894, 'Jasper1@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'ajzwe', 2);

-- --------------------------------------------------------

--
-- Table structure for table `one_time_link`
--

DROP TABLE IF EXISTS `one_time_link`;
CREATE TABLE IF NOT EXISTS `one_time_link` (
  `token` char(40) NOT NULL,
  `roomID` int(11) NOT NULL,
  `voteremail` varchar(255) NOT NULL,
  `tstamp` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`token`),
  KEY `roomID` (`roomID`)
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
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`roomID`, `roomName`, `roomOwner`, `roomRequirement`, `roomtype`, `object1`, `object2`, `votesObject1`, `votesObject2`, `ID`) VALUES
(1, 'This is room 1', 'Host', 'testing', 'Public', 'test1', 'test2', 1, 2, 2),
(2, 'This is room 2', 'host', 'Testing private room', 'Private', 'test1', 'test2', 1, 1, 2),
(4, 'testing 3', 'testing hash', 'testing with hash account', 'Public', 'hash1', 'hash2', 1, 2, 7),
(8, '1234', 'host', 'i have no idea', 'Public', 'abc', '123', 0, 0, 2),
(9, 'Presidential ', 'host', 'Which side do you support?', 'Public', 'Democrats', 'Republicans', 0, 0, 2),
(10, 'Best Country', 'host', 'Anyone', 'Public', 'United States of America', 'China', 0, 0, 2),
(11, 'Best Continent', 'host', 'Anyone', 'Public', 'Europe', 'Asia', 0, 0, 2),
(12, 'Best State in Malaysia', 'host', 'Anyone', 'Public', 'Selangor', 'Wilayah Persekutuan Kuala Lumpur', 0, 0, 2),
(13, '1234', 'host', 'dk', 'Private', '1', '2', 1, 0, 2),
(14, '5678', 'host', 'tewtew', 'Private', '123', '456', 0, 0, 2),
(15, 'Presidential ', 'tewqte', 'Sasd', 'Private', 'ASD', 'asd', 1, 0, 10);

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
(2147483647, 'Voter function', '1', '2020-02-04', 0, 'voterfunction@gmail.com', 'APU', 4),
(1523, 'Zack Chow', '1', '2020-03-28', 1321241, '43214@gmail.com', '41324', 1),
(12312312, 'fddsds', '1', '2020-03-13', 2412412, '41221@gmail.com', 'gfwfew112', 4),
(12312312, 'Zack Chow', '1', '2020-04-02', 126698893, 'burdengaming03@gmail.com', 'No. 2, Jalan Pluto , Seksyen U5/142', 0),
(123456, 'Zack Chow', '1', '2020-04-01', 126698893, 'zackchow0306@yahoo.com', 'No. 2, Jalan Pluto , Seksyen U5/142', 0),
(0, 'Zack Chow', '', '0000-00-00', 126698893, 'burdengaming03@gmail.comza', 'No. 2, Jalan Pluto , Seksyen U5/142', 0),
(12, '', '', '0000-00-00', 0, '', '', 0),
(1523, 'Zack Chow', '1', '2020-04-08', 126698893, 'fsdf@gmail.com', 'No. 2, Jalan Pluto , Seksyen U5/142', 2),
(0, 'Zack Chow', '', '0000-00-00', 126698893, 'burdengaming03@gmail.com', 'No. 2, Jalan Pluto , Seksyen U5/142', 1),
(0, 'Zack Chow', '', '0000-00-00', 126698893, '13@gmail.com', 'No. 2, Jalan Pluto , Seksyen U5/142', 2),
(0, 'Zack Chow', '', '0000-00-00', 126698893, 'burdengaming03@gmail.com', 'No. 2, Jalan Pluto , Seksyen U5/142', 14),
(12312312, 'Zack Chow', '1', '2020-04-08', 126698893, '123@gmail.com', 'No. 2, Jalan Pluto , Seksyen U5/142', 14),
(12212, 'Zack Chow', '', '0000-00-00', 126698893, '11@gmail.com', 'No. 2, Jalan Pluto , Seksyen U5/142', 14),
(12312312, 'Zack Chow', '', '0000-00-00', 126698893, 'burdengaming03@gmail.com', 'No. 2, Jalan Pluto , Seksyen U5/142', 13),
(22, 'Zack Chow', '', '0000-00-00', 126698893, '66@gmail.com', 'No. 2, Jalan Pluto , Seksyen U5/142', 2),
(223, 'Chow Zi Xuan', '', '0000-00-00', 126698893, '11@gmail.com', 'No. 2, Jalan Pluto , Seksyen U5/142', 2),
(66, 'Chow Zi Xuan', '', '0000-00-00', 126698893, '656@gmail.com', 'No. 2, Jalan Pluto , Seksyen U5/142', 1),
(55, 'yoyo', '1', '2020-04-09', 126698893, '11222@gmail.com', 'No. 2, Jalan Pluto , Seksyen U5/142', 2),
(124142, 'Zack Chow', '1', '0000-00-00', 126698893, '12144@gmail.com', 'No. 2, Jalan Pluto , Seksyen U5/142', 1),
(125488, 'James', '1', '2020-04-16', 126698893, '55568@gmail.com', 'No. 2, Jalan Pluto , Seksyen U5/142', 2),
(1323, 'Chow Zi Xuan', '1', '0000-00-00', 126698893, 'burdengaming03@gmail.com', 'No. 2, Jalan Pluto , Seksyen U5/142', 2),
(1523, 'Zack Chow', '1', '2020-04-09', 126698893, '122222222222@gmail.com', 'No. 2, Jalan Pluto , Seksyen U5/142', 13),
(22222, 'Zack Chow', '1', '2020-04-08', 126698893, '03@gmail.com', 'No. 2, Jalan Pluto , Seksyen U5/142', 13),
(2147483647, 'Chow Zi Xuan', '1', '0024-02-24', 126698893, 'burdengaming03@gmail.com', 'No. 2, Jalan Pluto , Seksyen U5/142', 15),
(432432, 'Zack Chow', '1', '2020-04-03', 423432, '423423@gmail.com', 'fwefe', 1),
(124142, 'Chow Zi Xuan', '1', '2020-04-09', 126698893, '44123@gmail.com', 'No. 2, Jalan Pluto , Seksyen U5/142', 2);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
