-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 13, 2018 at 05:10 PM
-- Server version: 5.7.21-0ubuntu0.16.04.1
-- PHP Version: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loginTut`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `online` int(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `active` int(1) NOT NULL,
  `rtime` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `online`, `email`, `active`, `rtime`) VALUES
(1, 'testing', 'testing', 1518529797, 'fake@noemail.co.uk', 1, 0),
(2, 'aaaaaa', '0b4e7a0e5fe84ad35fb5f95b9ceeac79', 1518527194, 'aa@s.lt', 1, 1518527194),
(3, 'marijus', '594f803b380a41396ed63dca39503542', 1518527450, 'marijus.romanovas@hotmail.com', 1, 1518527450),
(4, 'aaaaaaa', '5d793fc5b00a2348c3fb9ab59e5ca98a', 1518529637, 'test@test.one.lt', 1, 1518529637),
(5, 'aaaaaaaa', '3dbe00a167653a1aaee01d93e77e730e', 1518533879, 'aa@s.lta', 1, 1518529712),
(6, 'testinga', 'c0a397dbeeac0c1276b14ff6110658d5', 1518531549, 'aa@s.ltaa', 1, 1518529747);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
