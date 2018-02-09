-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 09, 2018 at 04:51 PM
-- Server version: 5.7.21-0ubuntu0.16.04.1
-- PHP Version: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `movies`
--

-- --------------------------------------------------------

--
-- Table structure for table `Comments`
--

CREATE TABLE `Comments` (
  `id` int(11) NOT NULL,
  `film_id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `comments` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Comments`
--

INSERT INTO `Comments` (`id`, `film_id`, `name`, `comments`) VALUES
(1, 1, 'Skagen 21', 'Stavanger'),
(2, 1, 'Skagen 21', 'Stavanger'),
(3, 1, 'Skagen 21', 'Stavanger'),
(4, 1, 'Skagen 21', 'Stavanger');

-- --------------------------------------------------------

--
-- Table structure for table `filmai`
--

CREATE TABLE `filmai` (
  `id` int(11) NOT NULL,
  `title` varchar(256) NOT NULL,
  `quality` varchar(256) NOT NULL,
  `duration` int(11) NOT NULL,
  `year` year(4) DEFAULT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL,
  `trailer` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `filmai`
--

INSERT INTO `filmai` (`id`, `title`, `quality`, `duration`, `year`, `description`, `image`, `trailer`) VALUES
(1, 'Peledu kalnas', '1920*1080', 122, 2017, '', 'http://vilkkc.lt.angis.serveriai.lt/vilkkc-content/uploads/2018/01/Peledu-kalnas-filmas-1140x1618.jpg', 'https://www.youtube.com/embed/agtIGgruFLA'),
(3, 'American Beauty', 'Full HD', 122, 1994, 'A sexually frustrated suburban father has a mid-life crisis after becoming infatuated with his daughter\'s best friend.', 'https://images-na.ssl-images-amazon.com/images/M/MV5BNTBmZWJkNjctNDhiNC00MGE2LWEwOTctZTk5OGVhMWMyNmVhXkEyXkFqcGdeQXVyMTMxODk2OTU@._V1_UX182_CR0,0,182,268_AL_.jpg', 'https://www.youtube.com/embed/3ycmmJ6rxA8'),
(6, 'Inception', 'HD', 148, 2010, 'A thief, who steals corporate secrets through the use of dream-sharing technology, is given the inverse task of planting an idea into the mind of a CEO. ', 'https://images-na.ssl-images-amazon.com/images/M/MV5BMjAxMzY3NjcxNF5BMl5BanBnXkFtZTcwNTI5OTM0Mw@@._V1_SY1000_CR0,0,675,1000_AL_.jpg', 'https://www.youtube.com/embed/8hP9D6kZseM'),
(11, 'test', 'HD', 122, 2000, 'tt', 'tt', 'rr');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Comments`
--
ALTER TABLE `Comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `filmai`
--
ALTER TABLE `filmai`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Comments`
--
ALTER TABLE `Comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `filmai`
--
ALTER TABLE `filmai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
