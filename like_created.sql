-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 02, 2023 at 02:58 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yama`
--

-- --------------------------------------------------------

--
-- Table structure for table `like_created`
--

CREATE TABLE `like_created` (
  `id` int(20) NOT NULL,
  `user_id` int(20) NOT NULL,
  `mountain_id` int(20) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `like_created`
--

INSERT INTO `like_created` (`id`, `user_id`, `mountain_id`, `created_at`) VALUES
(29, 2, 5, '2023-02-02 01:58:56'),
(31, 2, 22, '2023-02-02 01:59:15'),
(32, 2, 13, '2023-02-02 01:59:16'),
(39, 2, 23, '2023-02-02 21:34:21'),
(40, 2, 21, '2023-02-02 21:34:22'),
(44, 2, 24, '2023-02-02 21:44:58'),
(46, 2, 7, '2023-02-02 21:45:00'),
(49, 5, 26, '2023-02-02 21:47:41'),
(50, 5, 25, '2023-02-02 22:32:06'),
(52, 3, 13, '2023-02-02 22:51:14'),
(53, 3, 11, '2023-02-02 22:51:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `like_created`
--
ALTER TABLE `like_created`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `like_created`
--
ALTER TABLE `like_created`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
