-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 10, 2023 at 04:22 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

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
-- Table structure for table `Contact`
--

CREATE TABLE `Contact` (
  `contact_type` varchar(32) NOT NULL,
  `email` varchar(64) NOT NULL,
  `contact_info` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Contact`
--

INSERT INTO `Contact` (`contact_type`, `email`, `contact_info`) VALUES
('Discord', 'mike12@edu.vaniercollege.qc.ca', 'mike12'),
('Instagram', 'bob420@edu.vaniercollege.qc.ca', 'Bob420');

-- --------------------------------------------------------

--
-- Table structure for table `Permissons`
--

CREATE TABLE `Permissons` (
  `permisson_id` int(11) NOT NULL,
  `permisson_desc` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Permissons`
--

INSERT INTO `Permissons` (`permisson_id`, `permisson_desc`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'buyer'),
(4, 'seller'),
(5, 'viewer');

-- --------------------------------------------------------

--
-- Table structure for table `Postings`
--

CREATE TABLE `Postings` (
  `posting_id` int(11) NOT NULL,
  `description` varchar(64) NOT NULL,
  `price` int(10) NOT NULL,
  `seller_email` varchar(64) NOT NULL,
  `date_posted` date NOT NULL,
  `visits` int(11) NOT NULL,
  `is_sold` char(1) NOT NULL,
  `post_type` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Postings`
--

INSERT INTO `Postings` (`posting_id`, `description`, `price`, `seller_email`, `date_posted`, `visits`, `is_sold`, `post_type`) VALUES
(1, 'Cool book', 4, 'bob420@edu.vaniercollege.qc.ca', '2023-11-03', 2, '0', 'Product'),
(2, 'working laptop', 300, 'mike12@edu.vaniercollege.qc.ca', '2023-11-04', 2, '0', 'Product'),
(3, 'Cool guitar ', 200, 'bob420@edu.vaniercollege.qc.ca', '2023-11-04', 2, '0', 'Product'),
(4, 'Guitar lessons', 15, 'bob420@edu.vaniercollege.qc.ca', '2023-11-04', 3, '0', 'Service'),
(5, 'piano lessons ', 15, 'mike12@edu.vaniercollege.qc.ca', '2023-11-04', 2, '0', 'Service'),
(6, 'math tutor', 10, 'mike12@edu.vaniercollege.qc.ca', '2023-11-04', 2, '0', 'Service');

-- --------------------------------------------------------

--
-- Table structure for table `Post_Type`
--

CREATE TABLE `Post_Type` (
  `post_type` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Post_Type`
--

INSERT INTO `Post_Type` (`post_type`) VALUES
('Product'),
('Service');

-- --------------------------------------------------------

--
-- Table structure for table `Ratings`
--

CREATE TABLE `Ratings` (
  `rating_id` int(11) NOT NULL,
  `posting_id` int(11) NOT NULL,
  `stars` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Ratings`
--

INSERT INTO `Ratings` (`rating_id`, `posting_id`, `stars`) VALUES
(1, 6, 5),
(2, 5, 4),
(3, 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `Reports`
--

CREATE TABLE `Reports` (
  `report_id` int(11) NOT NULL,
  `reported_email` varchar(64) NOT NULL,
  `reporter_email` varchar(64) NOT NULL,
  `description` varchar(256) NOT NULL,
  `viewed` char(1) NOT NULL,
  `ban_until` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Reports`
--

INSERT INTO `Reports` (`report_id`, `reported_email`, `reporter_email`, `description`, `viewed`, `ban_until`) VALUES
(1, 'bob420@edu.vaniercollege.qc.ca', 'loser@edu.vaniercollege.qc.ca', 'he is cool vanier student!', '0', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `School`
--

CREATE TABLE `School` (
  `school_name` varchar(32) NOT NULL,
  `email_template` varchar(32) NOT NULL,
  `loaction` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `School`
--

INSERT INTO `School` (`school_name`, `email_template`, `loaction`) VALUES
('Dawson', '@edu.dawsoncollege.qc.ca', 'Montreal'),
('Vanier', 'edu.vaniercollege.qc.ca', 'Montreal');

-- --------------------------------------------------------

--
-- Table structure for table `Transactions`
--

CREATE TABLE `Transactions` (
  `transactions_id` int(11) NOT NULL,
  `buyer_email` varchar(64) NOT NULL,
  `posting_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Transactions`
--

INSERT INTO `Transactions` (`transactions_id`, `buyer_email`, `posting_id`) VALUES
(1, 'bob420@edu.vaniercollege.qc.ca', 5),
(2, 'bob420@edu.vaniercollege.qc.ca', 6),
(3, 'mike12@edu.vaniercollege.qc.ca', 4);

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `email` varchar(64) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `school_name` varchar(32) NOT NULL,
  `program_name` varchar(32) NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`email`, `username`, `password`, `school_name`, `program_name`, `active`) VALUES
('bob420@edu.vaniercollege.qc.ca', 'bob', '7ea90972cc909f2117a228b33b0b3f00', 'Vanier', 'Computer Science', 1),
('loser@edu.vaniercollege.qc.ca', 'loser', '9d6b18466e285e0ee7b5c30c1c91d4dc', 'Dawson', 'loser', 1),
('mike12@edu.vaniercollege.qc.ca', 'mike12', 'ff040a1ec0eb0f83451defb3ae2f068f', 'Vanier', 'Computer Science', 1);

-- --------------------------------------------------------

--
-- Table structure for table `Users_Groups`
--

CREATE TABLE `Users_Groups` (
  `user_group` int(11) NOT NULL,
  `email` varchar(64) NOT NULL,
  `permisson_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Users_Groups`
--

INSERT INTO `Users_Groups` (`user_group`, `email`, `permisson_id`) VALUES
(1, 'bob420@edu.vaniercollege.qc.ca', 3),
(2, 'bob420@edu.vaniercollege.qc.ca', 4),
(3, 'loser@edu.vaniercollege.qc.ca', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Contact`
--
ALTER TABLE `Contact`
  ADD PRIMARY KEY (`contact_type`,`email`),
  ADD KEY `fk_Contact_Users_email` (`email`);

--
-- Indexes for table `Permissons`
--
ALTER TABLE `Permissons`
  ADD PRIMARY KEY (`permisson_id`);

--
-- Indexes for table `Postings`
--
ALTER TABLE `Postings`
  ADD PRIMARY KEY (`posting_id`),
  ADD KEY `fk_Postings_Users_email` (`seller_email`),
  ADD KEY `fk_Postings_Post_Type_post_type` (`post_type`);

--
-- Indexes for table `Post_Type`
--
ALTER TABLE `Post_Type`
  ADD PRIMARY KEY (`post_type`);

--
-- Indexes for table `Ratings`
--
ALTER TABLE `Ratings`
  ADD PRIMARY KEY (`rating_id`),
  ADD KEY `fk_Postings_Rating_posting_id` (`posting_id`);

--
-- Indexes for table `Reports`
--
ALTER TABLE `Reports`
  ADD PRIMARY KEY (`report_id`),
  ADD KEY `fk_Reports_Users_reported_email` (`reported_email`),
  ADD KEY `fk_Reports_Users_reporter_email` (`reporter_email`);

--
-- Indexes for table `School`
--
ALTER TABLE `School`
  ADD PRIMARY KEY (`school_name`);

--
-- Indexes for table `Transactions`
--
ALTER TABLE `Transactions`
  ADD PRIMARY KEY (`transactions_id`),
  ADD KEY `fk_Transactions_Postings_posting_id` (`posting_id`),
  ADD KEY `fk_Transactions_Users_email` (`buyer_email`);

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`email`),
  ADD KEY `fk_Users_School_school_name` (`school_name`);

--
-- Indexes for table `Users_Groups`
--
ALTER TABLE `Users_Groups`
  ADD PRIMARY KEY (`user_group`),
  ADD KEY `fk_Users_Group_Permissions_permisson_id` (`permisson_id`),
  ADD KEY `fk_Users_Group_Users_email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Permissons`
--
ALTER TABLE `Permissons`
  MODIFY `permisson_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `Postings`
--
ALTER TABLE `Postings`
  MODIFY `posting_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `Ratings`
--
ALTER TABLE `Ratings`
  MODIFY `rating_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Reports`
--
ALTER TABLE `Reports`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Transactions`
--
ALTER TABLE `Transactions`
  MODIFY `transactions_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Users_Groups`
--
ALTER TABLE `Users_Groups`
  MODIFY `user_group` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Contact`
--
ALTER TABLE `Contact`
  ADD CONSTRAINT `fk_Contact_Users_email` FOREIGN KEY (`email`) REFERENCES `User` (`email`);

--
-- Constraints for table `Postings`
--
ALTER TABLE `Postings`
  ADD CONSTRAINT `fk_Postings_Post_Type_post_type` FOREIGN KEY (`post_type`) REFERENCES `Post_Type` (`post_type`),
  ADD CONSTRAINT `fk_Postings_Users_email` FOREIGN KEY (`seller_email`) REFERENCES `User` (`email`);

--
-- Constraints for table `Ratings`
--
ALTER TABLE `Ratings`
  ADD CONSTRAINT `fk_Postings_Rating_posting_id` FOREIGN KEY (`posting_id`) REFERENCES `Postings` (`posting_id`);

--
-- Constraints for table `Reports`
--
ALTER TABLE `Reports`
  ADD CONSTRAINT `fk_Reports_Users_reported_email` FOREIGN KEY (`reported_email`) REFERENCES `User` (`email`),
  ADD CONSTRAINT `fk_Reports_Users_reporter_email` FOREIGN KEY (`reporter_email`) REFERENCES `User` (`email`);

--
-- Constraints for table `Transactions`
--
ALTER TABLE `Transactions`
  ADD CONSTRAINT `fk_Transactions_Postings_posting_id` FOREIGN KEY (`posting_id`) REFERENCES `Postings` (`posting_id`),
  ADD CONSTRAINT `fk_Transactions_Users_email` FOREIGN KEY (`buyer_email`) REFERENCES `User` (`email`);

--
-- Constraints for table `User`
--
ALTER TABLE `User`
  ADD CONSTRAINT `fk_Users_School_school_name` FOREIGN KEY (`school_name`) REFERENCES `School` (`school_name`);

--
-- Constraints for table `Users_Groups`
--
ALTER TABLE `Users_Groups`
  ADD CONSTRAINT `fk_Users_Group_Permissions_permisson_id` FOREIGN KEY (`permisson_id`) REFERENCES `Permissons` (`permisson_id`),
  ADD CONSTRAINT `fk_Users_Group_Users_email` FOREIGN KEY (`email`) REFERENCES `User` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
