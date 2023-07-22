-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2023 at 11:27 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbmovies`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `bookingid` int(11) NOT NULL,
  `theaterid` int(11) NOT NULL,
  `bookingdate` date NOT NULL,
  `person` varchar(50) NOT NULL,
  `userid` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`bookingid`, `theaterid`, `bookingdate`, `person`, `userid`, `status`) VALUES
(1, 1, '2023-07-27', '5', 5, 0),
(2, 1, '2023-07-27', '2', 6, 0),
(3, 2, '2023-07-29', '4', 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `catid` int(11) NOT NULL,
  `catname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`catid`, `catname`) VALUES
(1, 'Hollywood'),
(2, 'Bollywood');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `classid` int(11) NOT NULL,
  `classname` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `movieid` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL,
  `releasedate` date NOT NULL,
  `image` varchar(1000) NOT NULL,
  `trailer` varchar(1000) NOT NULL,
  `movie` varchar(10000) NOT NULL,
  `rating` varchar(50) NOT NULL,
  `catid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`movieid`, `title`, `description`, `releasedate`, `image`, `trailer`, `movie`, `rating`, `catid`) VALUES
(2, 'ABC Bollywood Movie', 'abc movie desciption', '2023-07-20', 'download (1).jpeg', 'mov_bbb.mp4', 'mov_bbb.mp4', '', 2),
(3, 'XYZ Bollywood movie', 'XYZ Bollywood movie', '2023-07-27', 'ghayal-once-again-movie-poster-3.jpg', 'smart phone mode.mp4', 'smart phone mode.mp4', '', 2),
(4, 'tear of the sun', 'tear of the sun', '2023-07-27', 'download.jpeg', 'mov_bbb.mp4', 'mov_bbb.mp4', '', 1),
(5, 'The Foreigner', 'Foreigner the chapter', '2023-07-06', 'desktop-wallpaper-hollywood-gun-action-movies-poster-hollywood-poster.jpg', 'mov_bbb.mp4', 'mov_bbb.mp4', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `theater`
--

CREATE TABLE `theater` (
  `theaterid` int(11) NOT NULL,
  `theater_name` varchar(100) NOT NULL,
  `timing` varchar(50) NOT NULL,
  `days` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `price` int(11) NOT NULL,
  `location` varchar(100) NOT NULL,
  `movieid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `theater`
--

INSERT INTO `theater` (`theaterid`, `theater_name`, `timing`, `days`, `date`, `price`, `location`, `movieid`) VALUES
(1, 'Royal Theater', '14:00', 'Monday', '2023-07-18', 1500, 'Gulshan Karachi', 5),
(2, 'Prince Theater', '15:30', 'Thursday', '2023-07-21', 3000, 'Malir Karachi', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `roteype` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `name`, `email`, `password`, `roteype`) VALUES
(1, 'admin', 'admin@gmail.com', '123', 1),
(2, 'Usman', 'usman@gmail.com', '321', 2),
(3, 'Muhammad Aqib', 'maqib1055@gmail.com', '123', 2),
(4, 'saqib', 'saqib@gmail.com', '123', 2),
(5, 'newuser', 'newuser@gmail.com', '123', 2),
(6, 'anas', 'anas@gmail.com', '123', 2),
(7, 'yasir', 'yasir@gmail.com', '123', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`bookingid`),
  ADD KEY `FK_booking_users` (`userid`),
  ADD KEY `FK_booking` (`theaterid`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`catid`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`classid`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`movieid`),
  ADD KEY `FK_movies` (`catid`);

--
-- Indexes for table `theater`
--
ALTER TABLE `theater`
  ADD PRIMARY KEY (`theaterid`),
  ADD KEY `FK_theater` (`movieid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `bookingid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `catid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `classid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `movieid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `theater`
--
ALTER TABLE `theater`
  MODIFY `theaterid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `FK_booking` FOREIGN KEY (`theaterid`) REFERENCES `theater` (`theaterid`),
  ADD CONSTRAINT `FK_booking_users` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`);

--
-- Constraints for table `movies`
--
ALTER TABLE `movies`
  ADD CONSTRAINT `FK_movies` FOREIGN KEY (`catid`) REFERENCES `categories` (`catid`);

--
-- Constraints for table `theater`
--
ALTER TABLE `theater`
  ADD CONSTRAINT `FK_theater` FOREIGN KEY (`movieid`) REFERENCES `movies` (`movieid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
