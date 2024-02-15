-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2024 at 09:07 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `7todo`
--

-- --------------------------------------------------------

--
-- Table structure for table `folders`
--

CREATE TABLE `folders` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(256) NOT NULL,
  `user_id` int(11) NOT NULL,
  `creared_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `folders`
--

INSERT INTO `folders` (`id`, `name`, `user_id`, `creared_at`) VALUES
(1, 'personal', 1, '2024-02-10 07:51:20'),
(23, 'work2', 2, '2024-02-12 09:48:45'),
(24, 'test2', 2, '2024-02-12 09:48:45'),
(25, 'work', 1, '2024-02-12 09:49:09'),
(31, 'My Day', 1, '2024-02-12 11:07:48'),
(32, 'dff', 1, '2024-02-13 06:07:21'),
(33, 'aqq', 1, '2024-02-13 06:17:16'),
(38, 'LooL', 1, '2024-02-15 07:39:25'),
(39, 'second', 5, '2024-02-15 07:44:06'),
(40, 'ij', 5, '2024-02-15 07:45:06'),
(41, 'mohammaddeljoo', 5, '2024-02-15 07:46:11');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(512) CHARACTER SET utf8mb4 COLLATE utf8mb4_persian_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `folder_id` int(11) NOT NULL,
  `is_done` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `title`, `user_id`, `folder_id`, `is_done`, `created_at`) VALUES
(1, 'Firsst task', 1, 1, 0, '2024-02-10 08:03:05'),
(4, 'secand tasks', 1, 1, 0, '2024-02-12 07:22:18'),
(5, 'how working', 1, 1, 0, '2024-02-12 08:31:10'),
(33, 'quentity', 1, 31, 1, '2024-02-13 11:16:39'),
(34, 'a number of', 1, 31, 1, '2024-02-13 11:18:09'),
(35, 'a deal of', 1, 31, 0, '2024-02-13 11:18:39'),
(37, 'deal', 1, 31, 0, '2024-02-13 11:24:18'),
(39, 'this is', 1, 1, 0, '2024-02-13 11:26:27'),
(40, 'New Task', 1, 34, 0, '2024-02-13 11:30:39'),
(41, 'Secand Task', 1, 34, 0, '2024-02-13 11:31:56'),
(42, 'Now Yorrrrrrk', 1, 25, 0, '2024-02-13 11:36:54'),
(43, 'sds', 1, 31, 0, '2024-02-13 11:39:04'),
(44, 'mohammad', 1, 33, 0, '2024-02-13 11:39:15'),
(45, 'hello', 1, 25, 0, '2024-02-15 07:29:21'),
(46, 'LOOOOOOL', 1, 1, 0, '2024-02-15 07:30:15'),
(47, 'LOOOOOOL', 1, 31, 0, '2024-02-15 07:30:32'),
(48, 'Local', 1, 38, 1, '2024-02-15 07:39:45'),
(49, 'HOOOOL', 5, 39, 0, '2024-02-15 07:44:42'),
(50, 'Ahuraaaaaaaaa', 5, 39, 0, '2024-02-15 07:44:51'),
(51, 'Ahura', 5, 41, 0, '2024-02-15 07:46:39');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`) VALUES
(2, 'deljoo', 'efdf', '$2y$10$b5RFmV3.ekPHIXlZuZsZue5e.yjkBFy7mOAnUWNK8R/MEcJMCxAVy', '2024-02-14 11:00:36'),
(3, 'po', 'poww@gmail.com', '$2y$10$w9W0Vai.UOaf9.Extpdm.OaU5kKHSP6ZPLLdLTZR4opCBB2.inXPS', '2024-02-14 11:16:46'),
(4, 'ali', 'ali', '$2y$10$VIcom/K87QeEXv6GyIrKU.rpbcUeUpJX6CThjWXebP2fE6IFUOsq6', '2024-02-15 06:30:41'),
(5, 'aq', 'aq', '$2y$10$41jeSIJk06N0Y4stLvCYW.Q9b1mQpvntxbQET96YP2jUXCyDZ4cRa', '2024-02-15 06:33:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `folders`
--
ALTER TABLE `folders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `folders`
--
ALTER TABLE `folders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
