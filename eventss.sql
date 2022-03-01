-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 31, 2021 at 10:55 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eventss`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `begin` varchar(200) NOT NULL,
  `country` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `end` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `description`, `begin`, `country`, `city`, `end`) VALUES
(1, 'Luju Festival', '', '2021-12-31T18:30', 'Swaziland', 'Manzini', '2022-01-03T03:00'),
(2, 'Mdavaso Oclock', 'Party of the century! \r\nCall your friends\r\nLets make it lit!!', '2022-01-08T17:30', 'South', 'Pretoria', '2022-01-08T00:00'),
(3, 'New years bash', 'Lets close off the year with a banger. Guest artistss include Cassper, Nasty C, AKA, Subxero, Jayonthebass, Black coffeee and many more!!!!!', '2021-12-31T20:35', 'Cyprus', 'Lefke', '2022-01-01T08:35'),
(4, 'A-listers', 'Blaq Diamond\r\nThe Muffinz', '2021-12-30T08:00', 'Sweden', 'Sphofaneni', '2021-12-31T20:00');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `event_id` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `accepted` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`event_id`, `user`, `accepted`) VALUES
(3, 'his@mail.com', 0),
(4, 'his@mail.com', 0),
(4, 'my@mail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(15) NOT NULL,
  `name` varchar(22) NOT NULL,
  `surname` varchar(20) DEFAULT NULL,
  `password` varchar(22) NOT NULL,
  `email` varchar(22) NOT NULL,
  `user_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `name`, `surname`, `password`, `email`, `user_type`) VALUES
(1, 'Sihle', NULL, '12345', 'sihle@gmail.com', 'admin'),
(2, 'Retha', NULL, 'abcd', 'retha@gmail.com', 'general user'),
(3, 'Ntokozo', 'Ndabandaba', '1234', 'ndabandaba31@gmail.com', 'admin'),
(4, 'Trevor', 'Gumbi', '12345', 'my@mail.com', 'general user'),
(5, 'Stan', '', '12345', 'his@mail.com', 'general user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`event_id`,`user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
