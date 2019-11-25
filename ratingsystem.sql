-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2019 at 05:17 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `musiclydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `ratingsystem`
--

CREATE TABLE `ratingsystem` (
  `rating_id` int(11) NOT NULL,
  `rating` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `song_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ratingsystem`
--

INSERT INTO `ratingsystem` (`rating_id`, `rating`, `user_id`, `song_id`) VALUES
(1, 6, 3, 1),
(2, 8, 3, 1),
(3, 4, 3, 1),
(4, 0, 3, 1),
(5, 2, 3, 1),
(6, 8, 3, 1),
(7, 5, 3, 1),
(8, 9, 3, 2),
(9, 7, 3, 2),
(10, 9, 3, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ratingsystem`
--
ALTER TABLE `ratingsystem`
  ADD PRIMARY KEY (`rating_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ratingsystem`
--
ALTER TABLE `ratingsystem`
  MODIFY `rating_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
