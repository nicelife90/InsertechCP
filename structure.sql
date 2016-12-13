-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2016 at 09:18 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ced`
--

-- --------------------------------------------------------

--
-- Table structure for table `screen`
--

CREATE TABLE `screen` (
  `id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `model` tinytext COLLATE utf8_unicode_ci,
  `size` tinytext COLLATE utf8_unicode_ci,
  `resolution` tinytext COLLATE utf8_unicode_ci,
  `revision` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `finition` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `technologie` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `connector` tinytext COLLATE utf8_unicode_ci,
  `connector_position` tinytext COLLATE utf8_unicode_ci,
  `grade` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8_unicode_ci,
  `user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `screen`
--

INSERT INTO `screen` (`id`, `date`, `model`, `size`, `resolution`, `revision`, `finition`, `technologie`, `connector`, `connector_position`, `grade`, `image`, `user`) VALUES
(1, '2016-12-10 02:25:46', 'LP133WX2', '13.3', '1280 x 800', 'TLA1', 'Mat', 'LED', '40', 'Bas Droite', 'A', NULL, NULL),
(2, '2016-12-13 19:12:09', 'FWEFWE', '12.1', '1152 x 864', 'FWEFEW', 'Brillant', 'LED', 'fwefewfew', 'Haut Gauche', 'A', 'uploads/585048090f13a_img0185.jpg', NULL),
(3, '2016-12-13 19:51:46', 'FWEFWE', '12.1', '1280 x 768', 'FWEFEW', 'Brillant', 'LCD', 'fwefewfew', 'Haut Droite', 'A', 'uploads/58505152c89fa_img0178.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(30) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `username` varchar(32) DEFAULT NULL,
  `pwd_hash` varchar(100) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `last_con` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `last_ip` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `pwd_hash`, `email`, `last_con`, `last_ip`) VALUES
(2, 'Compte', 'Admin', 'admin', '87c45b34c7447dd9ed4a0ea248e17653c5a3e59b', 'admin@admin.com', '2016-11-15 02:26:54', '::1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `screen`
--
ALTER TABLE `screen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `screen`
--
ALTER TABLE `screen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
