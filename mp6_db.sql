-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 26, 2019 at 12:59 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mp6_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `prof_id` int(11) NOT NULL,
  `prof_name` varchar(50) NOT NULL,
  `prof_apartment` varchar(50) NOT NULL,
  `prof_landlord` varchar(50) NOT NULL,
  `prof_address` varchar(100) NOT NULL,
  `prof_talents` varchar(150) NOT NULL,
  `prof_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`prof_id`, `prof_name`, `prof_apartment`, `prof_landlord`, `prof_address`, `prof_talents`, `prof_status`) VALUES
(1, 'Shammah Casumpang', 'Bahay ni Shammah', 'Malaking Kapatid', 'Bangkas A', 'Dancing, Singing, Coding', 'Deleted'),
(2, 'Shammae Supsup', 'Apartmenthol', 'Mr. Crab', 'Bangkas B', 'Dancing, Reading, Coding, Acting, Praying', 'Deleted'),
(3, 'hahaha', 'Bahay ni Shammah', 'Mr. Crab', 'NASIPIT, TALAMBAN, CEBU CITY', 'Dancing, Reading, Acting', 'Active'),
(4, 'Fritz Gerald Dumdum', 'Bahay ni Shammah', 'Mr. Crab', 'NASIPIT, TALAMBAN, CEBU CITY', 'Dancing, Reading, Coding', 'Active'),
(5, 'x', 'x', 'x', 'Bangkas A', 'Dancing, Reading, Singing, Acting', 'Deleted');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`prof_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `prof_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
