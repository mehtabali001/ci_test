-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2023 at 06:19 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `todo_manager`
--

-- --------------------------------------------------------

--
-- Table structure for table `todo_lists`
--

CREATE TABLE `todo_lists` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `task` varchar(255) DEFAULT NULL,
  `completed` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `todo_lists`
--

INSERT INTO `todo_lists` (`id`, `user_id`, `title`, `description`, `task`, `completed`, `created_at`, `updated_at`) VALUES
(1, 1, 'task1', 'task1 desc', '', 0, '2023-06-22 20:49:32', '2023-06-22 20:49:32'),
(2, 1, 'task2', 'task2 desc', '', 0, '2023-06-22 20:49:32', '2023-06-22 20:49:32'),
(3, 1, 'to do first', 'to do first description', '', 0, '2023-06-22 22:07:25', '2023-06-22 22:07:25'),
(4, 1, 'to-do second', 'to-do second description', '', 0, '2023-06-22 22:09:31', '2023-06-22 22:09:31'),
(5, 1, 'third to do ', 'description of third to do', '', 0, '2023-06-22 23:30:59', '2023-06-22 23:30:59'),
(6, 1, 'dfdf', 'fdfd', '', 0, '2023-06-22 23:32:40', '2023-06-22 23:32:40'),
(7, 1, 'ghgfhgh', 'sdfd', '', 0, '2023-06-22 23:34:30', '2023-06-22 23:34:30'),
(8, 1, 'ttt', 'erere', '', 0, '2023-06-22 23:34:42', '2023-06-22 23:34:42'),
(9, 1, 'erer', 'rerere', '', 0, '2023-06-22 23:34:51', '2023-06-22 23:34:51'),
(10, 1, 'fhgh', 'dfdf', '', 0, '2023-06-22 23:35:02', '2023-06-22 23:35:02'),
(11, 1, 'dfsdf', 'dfsdf', 'gdfgf', 1, '2023-06-22 23:35:09', '2023-06-23 12:28:15'),
(23, 2, 'sdsds', 'sdsd', 'sdsd', 1, '2023-06-23 13:54:24', '2023-06-23 13:54:43');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$10$2dt/ns2osx5sRidmeJcCE.5n9v3CB174kI3tiDdKByTg7cBCq0dBa', 'admin', '2023-06-22 19:31:04', '2023-06-22 19:31:04'),
(2, 'user', '$2y$10$mM7FEE7g5igm.nxS10PdcOUtcCQ8OgURRfdBVMPZR4oF6PECkDkKK', 'user', '2023-06-23 00:04:15', '2023-06-23 00:04:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `todo_lists`
--
ALTER TABLE `todo_lists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `todo_lists`
--
ALTER TABLE `todo_lists`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `todo_lists`
--
ALTER TABLE `todo_lists`
  ADD CONSTRAINT `todo_lists_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
