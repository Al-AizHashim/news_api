-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2020 at 10:44 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `news`
--

-- --------------------------------------------------------

--
-- Table structure for table `pnews`
--

CREATE TABLE `pnews` (
  `id` int(8) NOT NULL,
  `category` int(3) NOT NULL,
  `region` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `date` date NOT NULL,
  `info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pnews`
--

INSERT INTO `pnews` (`id`, `category`, `region`, `title`, `img`, `date`, `info`) VALUES
(1, 1, 'global', 'title with id=1 is updated', NULL, '2020-11-16', 'update the details of id1'),
(3, 1, 'global', 'title3', NULL, '0000-00-00', 'this is the details of globle news with title3'),
(4, 1, 'arabic', 'title4', NULL, '2020-11-17', 'this is the details of arabic news with title2'),
(5, 1, 'global', 'title5', NULL, '2020-11-17', 'this is the details of globle news with title3'),
(6, 1, 'local', 'title6', NULL, '2020-11-17', 'this is the details of local news with title4'),
(7, 1, 'global', 'title7', NULL, '2020-11-17', 'this is the details of globle news with title5'),
(8, 1, 'local', 'this is my title8', NULL, '2020-11-21', 'this is details of local news with title 8'),
(9, 2, 'Bundesliga', 'this is Bundesliga title', NULL, '2020-11-16', 'this is Bundesliga info'),
(10, 2, 'PremierLeague', 'this title of PremierLeague', NULL, '2020-11-17', 'this news of PremierLeague'),
(11, 3, 'oddity', 'title of Odds and oddity', NULL, '2020-11-17', 'info of Odds and oddity'),
(12, 2, 'NBA', 'this is NBA title', NULL, '2020-11-15', 'this is NBA info'),
(13, 2, 'local', 'title13', NULL, '2020-11-09', 'this title of id 13'),
(14, 3, 'oddity', 'title of oddity with id 14', NULL, '2020-11-22', 'this is the details of oddity news');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pnews`
--
ALTER TABLE `pnews`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pnews`
--
ALTER TABLE `pnews`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
