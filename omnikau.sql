-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2023 at 07:12 AM
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
-- Database: `omnikau`
--
CREATE DATABASE /*!32312 IF NOT EXISTS*/`omnikau` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `omnikau`;
-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `email` varchar(64) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `school_name` varchar(32) NOT NULL,
  `program_name` varchar(32) NOT NULL,
  `avg_rating` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`email`, `username`, `password`, `school_name`, `program_name`, `avg_rating`, `active`) VALUES
('bob420@edu.vaniercollege.qc.ca', 'bob', '7ea90972cc909f2117a228b33b0b3f00', 'Vanier', 'Computer Science', 4, 1),
('loser@edu.vaniercollege.qc.ca', 'loser', '9d6b18466e285e0ee7b5c30c1c91d4dc', 'Dawson', 'loser', 3, 1),
('mike12@edu.vaniercollege.qc.ca', 'mike12', 'ff040a1ec0eb0f83451defb3ae2f068f', 'Vanier', 'Computer Science', 6, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`),
  ADD KEY `fk_Users_School_school_name` (`school_name`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_Users_School_school_name` FOREIGN KEY (`school_name`) REFERENCES `school` (`school_name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
