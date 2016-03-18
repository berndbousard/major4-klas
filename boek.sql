-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Mar 18, 2016 at 04:32 PM
-- Server version: 5.5.38
-- PHP Version: 5.5.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `boek`
--

-- --------------------------------------------------------

--
-- Table structure for table `boek_participations`
--

CREATE TABLE `boek_participations` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pdf` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `boek_participations`
--

INSERT INTO `boek_participations` (`id`, `user_id`, `pdf`, `photo`, `created`) VALUES
(1, 5, 'boekbespreking1', 'klasfoto1', '2016-03-18 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `boek_users`
--

CREATE TABLE `boek_users` (
`id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cardId` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `school` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `class` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `verified` tinyint(2) NOT NULL,
  `is_admin` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `boek_users`
--

INSERT INTO `boek_users` (`id`, `name`, `email`, `password`, `cardId`, `school`, `class`, `created`, `verified`, `is_admin`) VALUES
(2, 'admin', 'admin', '$2y$12$9hmTf28ckQErfbPk64eqm.674X6olJ4oOfb3wnKIUvyf32g2sOaoO', 'admin', 'admin', 'admin', '2016-03-18 11:33:17', 1, 1),
(5, 'bernd', 'bernd', 'bernd', 'bernd', 'bernd', 'bernd', '2016-03-18 05:20:39', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `boek_participations`
--
ALTER TABLE `boek_participations`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `boek_users`
--
ALTER TABLE `boek_users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `boek_participations`
--
ALTER TABLE `boek_participations`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `boek_users`
--
ALTER TABLE `boek_users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
