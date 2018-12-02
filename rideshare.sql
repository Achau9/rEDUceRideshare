-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2018 at 06:54 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rideshare`
--

-- --------------------------------------------------------

--
-- Table structure for table `riders`
--

CREATE TABLE `riders` (
  `id` int(11) NOT NULL,
  `username` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `riders`
--

INSERT INTO `riders` (`id`, `username`, `state`, `city`, `date`) VALUES
(4, 'bob', 'Troy', 'NY', '0000-00-00'),
(5, 'bob', 'Troy', 'NY', '0000-00-00'),
(6, 'bob', 'Troy', 'NY', '0000-00-00'),
(7, 'bob', 'Troy', 'NY', '0000-00-00'),
(8, 'bob', 'Troy', 'NY', '1998-02-01'),
(9, 'bob', 'Troy', 'NY', '1998-01-01'),
(10, 'bob', 'Troy', 'NY', '0000-00-00'),
(11, 'bob', 'Troy', 'NY', '2018-12-19'),
(12, 'bob', 'jf', 'fasd', '2018-12-07'),
(13, 'bob', 'hhsg', 'nu', '2018-12-06'),
(14, 'bob', 'hhsg', 'nu', '2018-12-06');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `firstname` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `pic` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `riders`
--
ALTER TABLE `riders`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `riders`
--
ALTER TABLE `riders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
