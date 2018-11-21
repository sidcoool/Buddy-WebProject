-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2018 at 09:58 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `buddys`
--

-- --------------------------------------------------------

--
-- Table structure for table `response`
--

CREATE TABLE `response` (
  `uid` int(11) NOT NULL,
  `qid` int(11) NOT NULL,
  `ans` varchar(2) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `response`
--

INSERT INTO `response` (`uid`, `qid`, `ans`, `name`) VALUES
(8, 3, 'A', 'nashedi'),
(8, 6, 'A', 'nashedi'),
(8, 10, 'A', 'nashedi'),
(8, 4, 'B', 'nashedi'),
(8, 5, 'B', 'nashedi'),
(8, 2, 'C', 'nashedi'),
(8, 7, 'C', 'nashedi'),
(8, 9, 'C', 'nashedi'),
(8, 1, 'D', 'nashedi'),
(8, 8, 'D', 'nashedi'),
(8, 7, 'A', 'pudiya'),
(8, 9, 'A', 'pudiya'),
(8, 1, 'B', 'pudiya'),
(8, 4, 'B', 'pudiya'),
(8, 6, 'B', 'pudiya'),
(8, 8, 'B', 'pudiya'),
(8, 10, 'B', 'pudiya'),
(8, 2, 'C', 'pudiya'),
(8, 3, 'C', 'pudiya'),
(8, 5, 'D', 'pudiya'),
(9, 1, 'A', 'hhii'),
(9, 26, 'B', 'hhii'),
(9, 5, 'C', 'hhii'),
(9, 19, 'C', 'hhii'),
(9, 20, 'C', 'hhii'),
(9, 21, 'C', 'hhii'),
(9, 1, 'A', 'dudu'),
(9, 5, 'B', 'dudu'),
(9, 2, 'C', 'dudu'),
(9, 26, 'C', 'dudu'),
(8, 7, 'A', 'harshit'),
(8, 6, 'D', 'harshit');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
