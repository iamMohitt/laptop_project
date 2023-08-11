-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3308
-- Generation Time: Aug 12, 2023 at 01:50 AM
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
-- Database: `laptopdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `laptop`
--

CREATE TABLE `laptop` (
  `id` int(11) NOT NULL,
  `laptopname` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `color` varchar(100) NOT NULL,
  `weight` int(100) NOT NULL,
  `memory` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `laptop`
--

INSERT INTO `laptop` (`id`, `laptopname`, `type`, `price`, `color`, `weight`, `memory`) VALUES
(1, 'Mackbook air', 'IOS', 1200, 'Balck', 700, 1367),
(3, 'Lenevo Thinkpad', 'Windows', 900, 'gray', 450, 789),
(5, 'ALEM', 'Windows', 1234, 'PURPLE', 123, 512);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`) VALUES
(1, 'Dilroop', 'dilroop.singh@gmail.com', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `laptop`
--
ALTER TABLE `laptop`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `laptop`
--
ALTER TABLE `laptop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
