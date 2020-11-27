-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2020 at 08:58 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_livechat`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `from` bigint(20) NOT NULL,
  `to` bigint(20) NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_read` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `from`, `to`, `message`, `is_read`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'hi', 1, '2020-11-27 01:48:22', '2020-11-27 01:54:47'),
(2, 2, 1, 'hlw', 1, '2020-11-27 01:48:29', '2020-11-27 01:49:18'),
(3, 1, 2, 'how are you?', 1, '2020-11-27 01:48:41', '2020-11-27 01:54:47'),
(4, 2, 1, 'i a, good', 1, '2020-11-27 01:48:53', '2020-11-27 01:49:18'),
(5, 1, 2, 'ohh what are you doing now?', 1, '2020-11-27 01:49:07', '2020-11-27 01:54:47'),
(6, 2, 1, 'nothing... you?', 1, '2020-11-27 01:49:17', '2020-11-27 01:49:18'),
(7, 3, 1, 'Hi joton!', 1, '2020-11-27 01:50:40', '2020-11-27 01:51:49'),
(8, 1, 3, 'Hlw dear!', 1, '2020-11-27 01:51:05', '2020-11-27 01:54:36'),
(9, 3, 1, '❤❤❤', 1, '2020-11-27 01:51:25', '2020-11-27 01:51:49'),
(10, 1, 3, 'okk tata', 1, '2020-11-27 01:51:42', '2020-11-27 01:54:36'),
(11, 3, 1, 'ok bbye', 1, '2020-11-27 01:51:48', '2020-11-27 01:51:49'),
(12, 3, 2, 'hi hasib!', 1, '2020-11-27 01:52:02', '2020-11-27 01:54:06'),
(13, 2, 3, 'hi mehedi', 1, '2020-11-27 01:52:44', '2020-11-27 01:54:39'),
(14, 2, 3, 'how are you?', 1, '2020-11-27 01:52:58', '2020-11-27 01:54:39'),
(15, 3, 2, 'i am good', 1, '2020-11-27 01:53:06', '2020-11-27 01:54:06'),
(16, 3, 2, 'what  are you doing?', 1, '2020-11-27 01:53:41', '2020-11-27 01:54:06'),
(17, 2, 3, 'nothing', 1, '2020-11-27 01:53:54', '2020-11-27 01:54:39'),
(18, 2, 3, 'you?', 1, '2020-11-27 01:54:05', '2020-11-27 01:54:39');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(9, '2014_10_12_000000_create_users_table', 1),
(10, '2014_10_12_100000_create_password_resets_table', 1),
(11, '2019_08_19_000000_create_failed_jobs_table', 1),
(12, '2020_11_26_200825_create_messages_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '/img/avatar.png',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `avatar`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Joton sutradhar', '/img/avatar.png', 'jotonsutradharjoy@gmail.com', NULL, '$2y$10$pKPfHBKKSC6rB7zon6Z8BeIj4U3rgQUVWYuyd67PXD/JpvFP9eIIa', NULL, '2020-11-27 01:47:17', '2020-11-27 01:47:17'),
(2, 'Hasib Hossain', '/img/avatar.png', 'a@gmail.com', NULL, '$2y$10$JRGapeFK7uLkCc1AE5QhVuXlTHYSzcUKCplzqlO5v4M6CU1Ipy/qi', NULL, '2020-11-27 01:48:03', '2020-11-27 01:48:03'),
(3, 'Mehedi Hossain', '/img/avatar.png', 'b@gmail.com', NULL, '$2y$10$zMDTg5Rey/nMkBIKEeT1nOQvk3Xo2381gND6fafK6o/k61Dz6fZQC', NULL, '2020-11-27 01:50:14', '2020-11-27 01:50:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
