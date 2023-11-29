-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2023 at 10:24 PM
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

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contact_type` varchar(32) NOT NULL,
  `email` varchar(64) NOT NULL,
  `contact_info` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contact_type`, `email`, `contact_info`) VALUES
('Discord', 'mike12@edu.vaniercollege.qc.ca', 'mike12'),
('Instagram', 'bob420@edu.vaniercollege.qc.ca', 'Bob420');

-- --------------------------------------------------------

--
-- Table structure for table `permissons`
--

CREATE TABLE `permissons` (
  `permisson_id` int(11) NOT NULL,
  `permisson_desc` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `permissons`
--

INSERT INTO `permissons` (`permisson_id`, `permisson_desc`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'buyer'),
(4, 'seller'),
(5, 'viewer');

-- --------------------------------------------------------

--
-- Table structure for table `postings`
--

CREATE TABLE `postings` (
  `posting_id` int(11) NOT NULL,
  `description` varchar(64) NOT NULL,
  `price` int(10) NOT NULL,
  `seller_email` varchar(64) NOT NULL,
  `date_posted` date NOT NULL DEFAULT current_timestamp(),
  `visits` int(11) NOT NULL,
  `is_sold` char(1) NOT NULL,
  `post_type` varchar(32) NOT NULL,
  `title` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `postings`
--

INSERT INTO `postings` (`posting_id`, `description`, `price`, `seller_email`, `date_posted`, `visits`, `is_sold`, `post_type`, `title`) VALUES
(2, 'working laptop', 300, 'mike12@edu.vaniercollege.qc.ca', '2023-11-04', 10, '1', 'Product', 'dell omnivox 3123'),
(3, 'Cool guitar. I broke the bottom E string. My bad', 200, 'bob420@edu.vaniercollege.qc.ca', '2023-11-04', 13, '1', 'Product', 'Gibson Firebird'),
(6, 'you know the vibes og', 10, 'mike12@edu.vaniercollege.qc.ca', '2023-11-04', 13, '1', 'Service', 'math tutoring (cheap)'),
(8, 'pojemento jvnfj vjfnvjnfdjivdf vjfnjvnfdn nfdvijfdnji', 0, 'mike12@edu.vaniercollege.qc.ca', '0000-00-00', 15, '0', 'Product', 'game boy color'),
(9, 'my father was a drinker... and a fiend..', 55, 'simon.menard@videotron.ca', '0000-00-00', 9, '1', 'Product', 'bicycle with 4 tires'),
(13, 'i didnt like the game', 40, 'bob420@edu.vaniercollege.qc.ca', '2023-11-24', 10, '0', 'Product', 'red dead redemption 2'),
(18, 'you know the vibes', 32, 'bob420@edu.vaniercollege.qc.ca', '2023-11-28', 8, '0', 'SERVICE', 'pyramid scheme'),
(19, 'one banana. property of Maximillian', 48, 'bob420@edu.vaniercollege.qc.ca', '2023-11-28', 63, '0', 'PRODUCT', 'Banana'),
(20, 'crack cocaine. lots of it.', 40, 'jimmy@jim.com', '2023-11-29', 1, '0', 'PRODUCT', 'crack'),
(21, 'mm yummy ham burger wawaweewa', 20, 'jimmy@jim.com', '2023-11-29', 5, '0', 'PRODUCT', 'hamburger');

-- --------------------------------------------------------

--
-- Table structure for table `post_type`
--

CREATE TABLE `post_type` (
  `post_type` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post_type`
--

INSERT INTO `post_type` (`post_type`) VALUES
('Product'),
('Service');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `rating_id` int(11) NOT NULL,
  `transaction_id` int(11) DEFAULT NULL,
  `stars` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`rating_id`, `transaction_id`, `stars`) VALUES
(0, NULL, 0),
(3, NULL, 4),
(4, 6, 3),
(5, 6, 3),
(7, 6, 3),
(8, 6, 5),
(11, 7, 4),
(12, 9, 5);

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `report_id` int(11) NOT NULL,
  `reported_email` varchar(64) NOT NULL,
  `reporter_email` varchar(64) NOT NULL,
  `description` varchar(256) NOT NULL,
  `viewed` char(1) NOT NULL,
  `ban_until` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`report_id`, `reported_email`, `reporter_email`, `description`, `viewed`, `ban_until`) VALUES
(1, 'bob420@edu.vaniercollege.qc.ca', 'loser@edu.vaniercollege.qc.ca', 'he is cool vanier student!', '0', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

CREATE TABLE `school` (
  `school_name` varchar(32) NOT NULL,
  `email_template` varchar(32) NOT NULL,
  `loaction` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `school`
--

INSERT INTO `school` (`school_name`, `email_template`, `loaction`) VALUES
('Dawson', '@edu.dawsoncollege.qc.ca', 'Montreal'),
('Vanier', 'edu.vaniercollege.qc.ca', 'Montreal');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `transaction_id` int(11) NOT NULL,
  `buyer_email` varchar(64) NOT NULL,
  `posting_id` int(11) NOT NULL,
  `rated` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`transaction_id`, `buyer_email`, `posting_id`, `rated`) VALUES
(2, 'bob420@edu.vaniercollege.qc.ca', 6, 0),
(4, 'bob420@edu.vaniercollege.qc.ca', 9, 0),
(5, 'bob420@edu.vaniercollege.qc.ca', 9, 0),
(6, 'bob420@edu.vaniercollege.qc.ca', 9, 1),
(7, 'bob420@edu.vaniercollege.qc.ca', 6, 1),
(8, 'bob420@edu.vaniercollege.qc.ca', 2, 0),
(9, 'jimmy@jim.com', 3, 1);

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
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`email`, `username`, `password`, `school_name`, `program_name`, `active`) VALUES
('bob420@edu.vaniercollege.qc.ca', 'bob', '7ea90972cc909f2117a228b33b0b3f00', 'Vanier', 'Computer Science', 1),
('jimmy@jim.com', 'jimmy', 'c2fe677a63ffd5b7ffd8facbf327dad0', 'Dawson', 'Comp Sci', 0),
('john@gmail.com', 'johnny', 'e6d96502596d7e7887b76646c5f615d9', 'Dawson', 'car', 0),
('loser@edu.vaniercollege.qc.ca', 'loser', '9d6b18466e285e0ee7b5c30c1c91d4dc', 'Dawson', 'loser', 1),
('mike12@edu.vaniercollege.qc.ca', 'mike12', 'ff040a1ec0eb0f83451defb3ae2f068f', 'Vanier', 'Computer Science', 1),
('simn.menard@videotron.ca', 'jef', '527bd5b5d689e2c32ae974c6229ff785', 'Dawson', 'Literature', 0),
('simon.menard@videotron.ca', 'simon', 'jefe', 'Vanier', '4cb3b778bf2af2b155aea8f59acb54b5', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `user_group` int(11) NOT NULL,
  `email` varchar(64) NOT NULL,
  `permission_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`user_group`, `email`, `permission_id`) VALUES
(1, 'bob420@edu.vaniercollege.qc.ca', 3),
(2, 'bob420@edu.vaniercollege.qc.ca', 4),
(3, 'loser@edu.vaniercollege.qc.ca', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_type`,`email`),
  ADD KEY `fk_Contact_Users_email` (`email`);

--
-- Indexes for table `permissons`
--
ALTER TABLE `permissons`
  ADD PRIMARY KEY (`permisson_id`);

--
-- Indexes for table `postings`
--
ALTER TABLE `postings`
  ADD PRIMARY KEY (`posting_id`),
  ADD KEY `fk_Postings_Users_email` (`seller_email`),
  ADD KEY `fk_Postings_Post_Type_post_type` (`post_type`);

--
-- Indexes for table `post_type`
--
ALTER TABLE `post_type`
  ADD PRIMARY KEY (`post_type`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`rating_id`),
  ADD KEY `fk_Postings_Rating_posting_id` (`transaction_id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`report_id`),
  ADD KEY `fk_Reports_Users_reported_email` (`reported_email`),
  ADD KEY `fk_Reports_Users_reporter_email` (`reporter_email`);

--
-- Indexes for table `school`
--
ALTER TABLE `school`
  ADD PRIMARY KEY (`school_name`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `fk_Transactions_Postings_posting_id` (`posting_id`),
  ADD KEY `fk_Transactions_Users_email` (`buyer_email`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `username_unique` (`username`),
  ADD KEY `fk_Users_School_school_name` (`school_name`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`user_group`),
  ADD KEY `fk_Users_Group_Permissions_permisson_id` (`permission_id`),
  ADD KEY `fk_Users_Group_Users_email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `permissons`
--
ALTER TABLE `permissons`
  MODIFY `permisson_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `postings`
--
ALTER TABLE `postings`
  MODIFY `posting_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `rating_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `user_group` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `fk_Contact_Users_email` FOREIGN KEY (`email`) REFERENCES `user` (`email`);

--
-- Constraints for table `postings`
--
ALTER TABLE `postings`
  ADD CONSTRAINT `fk_Postings_Post_Type_post_type` FOREIGN KEY (`post_type`) REFERENCES `post_type` (`post_type`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_Postings_email` FOREIGN KEY (`seller_email`) REFERENCES `user` (`email`);

--
-- Constraints for table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `fk_ratings_transactionid` FOREIGN KEY (`transaction_id`) REFERENCES `transactions` (`transaction_id`) ON DELETE CASCADE;

--
-- Constraints for table `reports`
--
ALTER TABLE `reports`
  ADD CONSTRAINT `fk_Reports_Users_reported_email` FOREIGN KEY (`reported_email`) REFERENCES `user` (`email`),
  ADD CONSTRAINT `fk_Reports_Users_reporter_email` FOREIGN KEY (`reporter_email`) REFERENCES `user` (`email`);

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `fk_transaction_email` FOREIGN KEY (`buyer_email`) REFERENCES `user` (`email`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_transaction_posting_id` FOREIGN KEY (`posting_id`) REFERENCES `postings` (`posting_id`) ON DELETE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_Users_School_school_name` FOREIGN KEY (`school_name`) REFERENCES `school` (`school_name`);

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_Users_Group_Permissions_permisson_id` FOREIGN KEY (`permission_id`) REFERENCES `permissons` (`permisson_id`),
  ADD CONSTRAINT `fk_Users_Group_Users_email` FOREIGN KEY (`email`) REFERENCES `user` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
