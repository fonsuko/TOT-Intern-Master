-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 15, 2017 at 05:29 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `node`
--

-- --------------------------------------------------------

--
-- Table structure for table `markers`
--

CREATE TABLE `markers` (
  `id` int(11) NOT NULL,
  `name` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL,
  `Asset_Type` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `tube_placement` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `built_by` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `manufactured` varchar(5) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `markers`
--

INSERT INTO `markers` (`id`, `name`, `address`, `lat`, `lng`, `Asset_Type`, `type`, `tube_placement`, `built_by`, `manufactured`) VALUES
(1, 'TOT 2541', 'Available', 13.757740, 100.520157, '0', 'Tele', '', '', ''),
(2, 'TOT 2541', 'Available', 13.758030, 100.519852, '0', 'Tele', '', '', ''),
(3, 'ทศท 2541', 'Available', 13.759170, 100.518570, '0', 'Tele', '', '', ''),
(5, 'MH#001', '', 10.500057, 99.177071, 'Manhole', 'T-38', 'Double', 'TOT', '2533'),
(6, 'MH#002', '', 10.498531, 99.176331, 'Manhole', 'A-1', 'Double', 'TOT', '2533'),
(7, 'MH#003', '', 10.497170, 99.176689, 'Manhole', 'A-1', 'Double', 'TOT', '2533'),
(8, 'MH#004', '', 10.495062, 99.175827, 'Manhole', 'T3A', 'Double', 'TOT', '2533');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `markers`
--
ALTER TABLE `markers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `markers`
--
ALTER TABLE `markers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
