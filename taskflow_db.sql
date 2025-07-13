-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2025 at 07:34 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `taskflow_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `color` varchar(7) DEFAULT '#667eea',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `color`, `created_at`) VALUES
(1, 'Development', '#776eea', '2025-07-13 03:05:37'),
(2, 'Design', '#764ba2', '2025-07-13 03:05:37'),
(3, 'Testing', '#f5576c', '2025-07-13 03:05:37'),
(4, 'Deployment', '#4facfe', '2025-07-13 03:05:37'),
(5, 'Documentation', '#f093fb', '2025-07-13 03:05:37');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `priority` enum('low','medium','high') DEFAULT 'medium',
  `category` varchar(100) DEFAULT NULL,
  `status` enum('pending','in_progress','completed') DEFAULT 'pending',
  `due_date` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `title`, `description`, `priority`, `category`, `status`, `due_date`, `created_at`, `updated_at`) VALUES
(1, 'Setup Database', 'Create database schema and tables', 'high', 'Development', 'completed', '2025-07-10', '2025-07-13 03:22:11', '2025-07-13 03:22:11'),
(2, 'Design UI', 'Create responsive dashboard interface', 'medium', 'Design', 'pending', '2025-07-15', '2025-07-13 03:22:11', '2025-07-13 03:22:11'),
(3, 'Implement API', 'Create REST API endpoints', 'high', 'Development', 'in_progress', '2025-07-20', '2025-07-13 03:22:11', '2025-07-13 03:22:11'),
(4, 'Write Tests', 'Create unit tests for all components', 'medium', 'Testing', 'pending', '2025-07-25', '2025-07-13 05:02:59', '2025-07-13 05:02:59'),
(5, 'Deploy Application', 'Deploy to production server', 'high', 'Deployment', 'pending', '2025-07-30', '2025-07-13 05:02:59', '2025-07-13 05:02:59'),
(6, 'User Documentation', 'Create user manual and help docs', 'low', 'Documentation', 'pending', '2025-08-05', '2025-07-13 05:02:59', '2025-07-13 05:02:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
