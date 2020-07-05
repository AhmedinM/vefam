-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2020 at 12:40 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fantasym`
--

-- --------------------------------------------------------

--
-- Table structure for table `clubs`
--

CREATE TABLE `clubs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(128) COLLATE utf8mb4_croatian_ci NOT NULL,
  `league` varchar(256) COLLATE utf8mb4_croatian_ci NOT NULL,
  `_condition` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_croatian_ci;

--
-- Dumping data for table `clubs`
--

INSERT INTO `clubs` (`id`, `name`, `league`, `_condition`) VALUES
(21, 'hh', 'dhfh', 34);

-- --------------------------------------------------------

--
-- Table structure for table `cups`
--

CREATE TABLE `cups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `phase` int(10) UNSIGNED NOT NULL,
  `_group` int(10) UNSIGNED NOT NULL,
  `sum` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_croatian_ci;

--
-- Dumping data for table `cups`
--

INSERT INTO `cups` (`id`, `team_id`, `phase`, `_group`, `sum`) VALUES
(8, 2, 3, 2, 25),
(10, 2, 3, 3, 25),
(11, 1, 3, 3, 26),
(12, 3, 1, 1, 27),
(13, 4, 1, 1, 27),
(15, 1, 1, 2, 45),
(16, 2, 1, 2, 34),
(17, 3, 1, 3, 38),
(18, 4, 1, 3, 27),
(19, 2, 1, 4, 27),
(20, 1, 1, 4, 38),
(21, 3, 1, 5, 43),
(22, 2, 1, 5, 43),
(23, 4, 1, 6, 54),
(24, 2, 1, 6, 43),
(25, 1, 1, 7, 16),
(26, 3, 1, 7, 43),
(27, 3, 1, 8, 65),
(28, 1, 1, 8, 44),
(30, 3, 4, 1, 24),
(31, 2, 4, 1, 45),
(32, 3, 3, 1, 32),
(33, 4, 3, 2, 34),
(34, 4, 3, 1, 32),
(36, 6, 1, 1, 22),
(37, 6, 1, 1, 22),
(38, 6, 1, 2, 22),
(39, 6, 1, 2, 22),
(40, 6, 1, 3, 22),
(41, 14, 2, 1, 1),
(42, 14, 2, 1, 1),
(43, 14, 2, 1, 1),
(44, 14, 2, 2, 1),
(45, 14, 2, 2, 1),
(46, 14, 2, 3, 1),
(47, 14, 2, 3, 1),
(48, 14, 2, 4, 1),
(49, 14, 2, 4, 1),
(50, 14, 2, 5, 1),
(51, 14, 2, 5, 1),
(52, 14, 2, 6, 1),
(53, 14, 2, 6, 1),
(54, 14, 2, 7, 1),
(55, 14, 2, 7, 1),
(56, 14, 2, 8, 1),
(57, 14, 2, 8, 1),
(58, 14, 3, 4, 1),
(59, 14, 3, 4, 1),
(60, 14, 4, 2, 1),
(61, 14, 4, 2, 1),
(62, 14, 5, 1, 1),
(63, 14, 5, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `leagues`
--

CREATE TABLE `leagues` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(256) COLLATE utf8mb4_croatian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_croatian_ci;

--
-- Dumping data for table `leagues`
--

INSERT INTO `leagues` (`id`, `name`) VALUES
(33, 'EPL');

-- --------------------------------------------------------

--
-- Table structure for table `matches`
--

CREATE TABLE `matches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `home` bigint(20) UNSIGNED NOT NULL,
  `away` bigint(20) UNSIGNED NOT NULL,
  `round` int(38) UNSIGNED NOT NULL,
  `r1` int(30) UNSIGNED NOT NULL,
  `r2` int(30) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_croatian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` bigint(20) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE `players` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(100) COLLATE utf8mb4_croatian_ci NOT NULL,
  `mark` int(10) UNSIGNED NOT NULL,
  `value` float UNSIGNED NOT NULL,
  `_condition` int(10) UNSIGNED NOT NULL,
  `sum_points` int(11) NOT NULL,
  `last_points` int(11) NOT NULL,
  `club` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_croatian_ci;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`id`, `name`, `position`, `mark`, `value`, `_condition`, `sum_points`, `last_points`, `club`) VALUES
(194, 'retdg gdfgfgf', 'Forward', 34, 34, 436, 4, 3, 21),
(195, 'retdg gdfgfgf', 'Forward', 34, 34, 436, 4, 3, 21),
(196, 'retdg gdfgfgf', 'Forward', 34, 34, 436, 4, 3, 21),
(197, 'retdg gdfgfgf', 'Forward', 34, 34, 436, 4, 3, 21),
(198, 'bgbgg', 'Midfielder', 34, 12, 34, 0, 3, 21),
(199, 'bgbgg', 'Midfielder', 34, 12, 34, 0, 3, 21),
(200, 'bgbgg', 'Midfielder', 34, 12, 34, 0, 3, 21),
(201, 'bgbgg', 'Midfielder', 34, 12, 34, 0, 3, 21),
(202, 'bgbgg', 'Midfielder', 34, 12, 34, 0, 3, 21),
(203, 'bgbgg', 'Midfielder', 34, 12, 34, 0, 3, 21),
(204, 'sjdfhsdj', 'Defender', 23, 34, 123, 3333, 3, 21),
(205, 'abcd', 'Goalkeeper', 78, 8, 102, 11, 2, 21),
(206, 'abcd', 'Defender', 78, 8, 102, 11, 2, 21),
(207, 'abcd', 'Defender', 78, 8, 102, 11, 2, 21),
(208, 'abcd', 'Defender', 78, 8, 102, 11, 2, 21),
(209, 'abcd', 'Defender', 78, 8, 102, 11, 2, 21);

-- --------------------------------------------------------

--
-- Table structure for table `round`
--

CREATE TABLE `round` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_croatian_ci;

--
-- Dumping data for table `round`
--

INSERT INTO `round` (`id`, `number`) VALUES
(1, 23);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(200) COLLATE utf8mb4_croatian_ci NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_croatian_ci NOT NULL,
  `password` varchar(200) COLLATE utf8mb4_croatian_ci NOT NULL,
  `league` tinyint(10) UNSIGNED NOT NULL,
  `league_one` int(10) UNSIGNED NOT NULL,
  `league_two` int(10) UNSIGNED NOT NULL,
  `cup` int(11) NOT NULL,
  `admin` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_croatian_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `league`, `league_one`, `league_two`, `cup`, `admin`) VALUES
(1, 'ahmedinm', 'aaa', '900150983cd24fb0d6963f7d28e17f72', 1, 0, 0, 0, 1),
(2, 'sadsds', 'korisnik@test.com', 'lozinka123', 1, 0, 0, 0, 0),
(3, 'dsfdsfdg', 'ole.gs20@gmail.com', 'df5e8c760f430ff37c1384098bd7e806', 1, 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_players`
--

CREATE TABLE `user_players` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `player_id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_croatian_ci;

--
-- Dumping data for table `user_players`
--

INSERT INTO `user_players` (`id`, `player_id`, `team_id`) VALUES
(2, 209, 3),
(3, 209, 3),
(4, 204, 3),
(5, 209, 3),
(6, 203, 3),
(7, 203, 3),
(8, 203, 3),
(9, 197, 3),
(10, 197, 3),
(11, 197, 3),
(12, 209, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_teams`
--

CREATE TABLE `user_teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(150) COLLATE utf8mb4_croatian_ci NOT NULL,
  `league` tinyint(4) NOT NULL,
  `last` int(10) UNSIGNED NOT NULL,
  `sum` int(10) UNSIGNED NOT NULL,
  `money` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_croatian_ci;

--
-- Dumping data for table `user_teams`
--

INSERT INTO `user_teams` (`id`, `user_id`, `name`, `league`, `last`, `sum`, `money`) VALUES
(1, 1, 'tim1', 1, 1, 13, 321321),
(2, 3, 'real madrid', 1, 0, 15, 6),
(3, 2, 'barcelona', 0, 0, 16, 443242),
(4, 2, 'Liverpool', 0, 4, 23, 432432),
(6, 1, 'b', 1, 34, 232, 233),
(7, 1, 'b1', 1, 34, 232, 233),
(8, 1, 'b2', 1, 34, 232, 233),
(9, 1, 'b3', 1, 34, 232, 233),
(10, 1, 'b4', 1, 34, 232, 233),
(11, 1, 'b5', 1, 34, 232, 233),
(12, 1, 'b6', 1, 34, 232, 233),
(13, 1, 'b7', 1, 34, 232, 233),
(14, 1, 'b1', 1, 34, 232, 233),
(15, 1, 'b2', 1, 34, 232, 233),
(16, 1, 'b3', 1, 34, 232, 233),
(17, 1, 'b4', 1, 34, 232, 233),
(18, 1, 'b5', 1, 34, 232, 233),
(19, 1, 'b6', 1, 34, 232, 233),
(20, 1, 'b7', 1, 34, 232, 233),
(21, 1, 'b1', 1, 34, 232, 233),
(22, 1, 'b2', 1, 34, 232, 233),
(23, 1, 'b3', 1, 34, 232, 233),
(24, 1, 'b4', 1, 34, 232, 233),
(25, 1, 'b5', 1, 34, 232, 233),
(26, 1, 'b6', 1, 34, 232, 233),
(27, 1, 'b7', 1, 34, 232, 233),
(28, 1, 'b1', 1, 34, 232, 233),
(29, 1, 'b2', 1, 34, 232, 233),
(30, 1, 'b3', 1, 34, 232, 233),
(31, 1, 'b4', 1, 34, 232, 233),
(32, 1, 'b5', 1, 34, 232, 233),
(33, 1, 'b6', 1, 34, 232, 233),
(34, 1, 'b7', 1, 34, 232, 233),
(35, 1, 'b7', 1, 34, 232, 233),
(36, 1, 'b7', 0, 34, 232, 233),
(37, 1, 'b7', 0, 34, 232, 233),
(38, 1, 'b7', 0, 34, 232, 233),
(39, 1, 'b7', 0, 34, 232, 233),
(40, 1, 'b7', 0, 34, 232, 233),
(41, 1, 'b7', 0, 34, 232, 233),
(42, 1, 'b7', 0, 34, 232, 233),
(43, 1, 'b7', 0, 34, 232, 233),
(44, 1, 'b7', 0, 34, 232, 233),
(45, 1, 'b7', 0, 34, 232, 233),
(46, 1, 'b7', 0, 34, 232, 233),
(47, 1, 'b7', 0, 34, 232, 233),
(48, 1, 'b7', 0, 34, 232, 233);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clubs`
--
ALTER TABLE `clubs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cups`
--
ALTER TABLE `cups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `team_id` (`team_id`);

--
-- Indexes for table `leagues`
--
ALTER TABLE `leagues`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `matches`
--
ALTER TABLE `matches`
  ADD PRIMARY KEY (`id`),
  ADD KEY `home` (`home`),
  ADD KEY `away` (`away`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`id`),
  ADD KEY `players_ibfk_1` (`club`);

--
-- Indexes for table `round`
--
ALTER TABLE `round`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_players`
--
ALTER TABLE `user_players`
  ADD PRIMARY KEY (`id`),
  ADD KEY `player_id` (`player_id`),
  ADD KEY `team_id` (`team_id`);

--
-- Indexes for table `user_teams`
--
ALTER TABLE `user_teams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clubs`
--
ALTER TABLE `clubs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `cups`
--
ALTER TABLE `cups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `leagues`
--
ALTER TABLE `leagues`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `matches`
--
ALTER TABLE `matches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `players`
--
ALTER TABLE `players`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=210;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_players`
--
ALTER TABLE `user_players`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `user_teams`
--
ALTER TABLE `user_teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cups`
--
ALTER TABLE `cups`
  ADD CONSTRAINT `cups_ibfk_1` FOREIGN KEY (`team_id`) REFERENCES `user_teams` (`id`);

--
-- Constraints for table `matches`
--
ALTER TABLE `matches`
  ADD CONSTRAINT `matches_ibfk_1` FOREIGN KEY (`home`) REFERENCES `clubs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `matches_ibfk_2` FOREIGN KEY (`away`) REFERENCES `clubs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `players`
--
ALTER TABLE `players`
  ADD CONSTRAINT `players_ibfk_1` FOREIGN KEY (`club`) REFERENCES `clubs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_players`
--
ALTER TABLE `user_players`
  ADD CONSTRAINT `user_players_ibfk_1` FOREIGN KEY (`player_id`) REFERENCES `players` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_players_ibfk_2` FOREIGN KEY (`team_id`) REFERENCES `user_teams` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_teams`
--
ALTER TABLE `user_teams`
  ADD CONSTRAINT `user_teams_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
