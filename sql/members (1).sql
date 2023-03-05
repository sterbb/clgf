-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2022 at 02:48 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clgf`
--

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `memID` text NOT NULL,
  `fname` text NOT NULL,
  `mname` text NOT NULL,
  `lname` text NOT NULL,
  `suffix` text NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `address` text NOT NULL,
  `stats` text NOT NULL,
  `age` int(3) NOT NULL,
  `dob` text NOT NULL,
  `gender` text NOT NULL,
  `email` text NOT NULL,
  `phone` text NOT NULL,
  `category` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `memID`, `fname`, `mname`, `lname`, `suffix`, `fullname`, `address`, `stats`, `age`, `dob`, `gender`, `email`, `phone`, `category`) VALUES
(1, 'C0001', 'jan', '', '', '', '', '', '', 0, '', '', '', '', ''),
(2, 'C0002', 'ASD', '', '', '', '', '', '', 0, '', '', '', '', ''),
(3, 'C0003', 'JAY COBB', '', '', '', '', '', '', 0, '', '', '', '', ''),
(4, 'C0004', 'JAY COBB', '', '', '', '', '', '', 0, '', '', '', '', ''),
(5, 'C0005', 'KALBO', '', '', '', '', '', '', 0, '', '', '', '', ''),
(6, 'C0006', 'TOOTOO', '', '', '', '', '', '', 0, '', '', '', '', ''),
(7, 'C0007', '', '', '', '', '', '', '', 0, '', '', '', '', ''),
(8, 'C0008', '', '', '', '', '', '', '', 0, '', '', '', '', ''),
(9, 'C0009', 'asd', '', '', '', '', '', '', 0, '', '', '', '', ''),
(10, 'C0010', 'asd', '', '', '', '', '', '', 0, '', '', '', '', ''),
(11, 'C0011', 'Zairie', '', '', '', '', '', '', 0, '', '', '', '', ''),
(12, 'C0012', 'gojo', '', '', '', '', '', '', 0, '', '', '', '', ''),
(13, 'C0013', 'Therez', '', '', '', '', '', '', 0, '', '', '', '', ''),
(14, 'C0014', 'jeeeeee', '', '', '', '', '', '', 0, '', '', '', '', ''),
(15, 'C0015', 'dsf', '', '', '', '', '', '', 0, '2022-09-21', '', '', '', ''),
(16, 'C0016', 'eyyy', '', '', '', '', '', '', 0, '2022-10-25', '', '', '', ''),
(17, 'C0017', 'qqq', '', '', '', '', '', '', 0, '', '', '', '', 'hype'),
(18, 'HYP0018', 'ako', '', '', '', '', '', '', 0, '', '', '', '', 'hype'),
(19, 'C0019', 'ataol', '', '', '', '', '', '', 0, '', '', '', '', 'jkids');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
