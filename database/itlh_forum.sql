-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2020 at 09:28 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `itlh_forum`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'Laravel', NULL, '2018-05-02 08:17:40'),
(2, 'C', '2018-09-20 07:36:39', '2018-09-20 07:36:39');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `flag` tinyint(1) NOT NULL DEFAULT '1',
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `context` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `flag`, `post_id`, `user_id`, `context`, `created_at`, `updated_at`) VALUES
(2, 1, 1, 1, 'okmo jsdnin pdijfn gipjeoi jdfkje nkj', '2018-04-30 14:24:35', '2018-04-30 14:24:35'),
(3, 1, 2, 2, 'ijnjvkfkv jn ekl-', '2018-04-30 14:47:30', '2018-04-30 18:27:19'),
(4, 1, 1, 2, 'oinfmnk mkm kmlk', '2018-04-30 14:47:45', '2018-04-30 14:47:45'),
(5, 1, 1, 2, 'okndslfkn  nokmk oiol-updated', '2018-04-30 15:05:29', '2018-05-02 07:06:26'),
(7, 1, 3, 1, 'new post?', '2018-05-02 07:07:17', '2018-05-02 07:07:17'),
(8, 1, 2, 1, 'hjgedbchjebd', '2018-05-22 06:50:21', '2018-05-22 06:50:21'),
(9, 1, 4, 2, 'k3iurdhu4r', '2018-05-22 06:52:38', '2018-05-22 06:52:38'),
(10, 1, 4, 2, 'this is a test', '2018-09-20 07:32:22', '2018-09-20 07:32:22');

-- --------------------------------------------------------

--
-- Table structure for table `invitations`
--

CREATE TABLE `invitations` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(35, '2014_10_12_000000_create_users_table', 1),
(36, '2014_10_12_100000_create_password_resets_table', 1),
(37, '2018_04_26_185702_create_posts_table', 1),
(38, '2018_04_26_191148_create_categories_table', 1),
(39, '2018_04_26_192007_create_comments_table', 1),
(40, '2018_04_26_192448_create_invitations_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `flag` tinyint(1) NOT NULL DEFAULT '1',
  `user_id` int(11) NOT NULL,
  `category` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `flag`, `user_id`, `category`, `title`, `content`, `image`, `created_at`, `updated_at`) VALUES
(1, 0, 1, 'Laravel', 'ijsnijfeijn', 'okmondkfj gwkpjrngp jwerngprnpg ijrnpijnpijn pij isjrn ijrtn ijrtn boijdrn boijrtn oijtrnbijrn toijrtn bijrni bnirjtbn eijntbijetnbeijrnboeijrnbiojerntpibjsribnid rb pis nipjb snrpi nrjn pijsnij', NULL, '2018-04-30 14:23:37', '2018-05-02 07:13:51'),
(2, 1, 2, 'Laravel', 'imi ijijoi ji', 'ijiji jiaji0 jmij 0ij oij oj oij oij oj oijo ijoij oaijfiwjepofwieiw-i j-w9j- iw-i -woi w -w98 w-9iw0k-0ij9 0iw wi 0iuw npoin 0iuuwn ijn0iun [po  ] o [ero ]] we ]rw wer [we\r\n poern piuwnw[]\r\n ]wbwijenoiweroiu npiu i pi piu bpiuer', NULL, '2018-04-30 14:46:54', '2018-05-01 16:03:07'),
(3, 1, 2, 'Laravel', 'kugku', 'jhgiukdeb', '', '2018-05-22 06:51:49', '2018-05-22 06:51:49'),
(4, 0, 2, 'Laravel', 'abcccc', 'abccccc', '1526971936.jpg', '2018-05-22 06:52:17', '2018-09-20 07:32:37'),
(5, 1, 2, 'Laravel', 'how to declare a variable in c', 'not able to assign values', NULL, '2018-09-20 07:33:20', '2018-09-20 07:33:20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch_name` int(11) NOT NULL,
  `picture` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact` bigint(20) DEFAULT NULL,
  `course` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `type`, `email`, `username`, `password`, `batch_name`, `picture`, `contact`, `course`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Chirag Obhan', 'admin', 'chirag@gmail.com', 'chirag', '$2y$10$btBEEHmzT2oGS6idPimcxucb38Q57k2NJCQNrOGCTSOEhZRiEI8s.', 2018, '1525246827.png', 654951, 'tp', 'Te9STgE4sXewaSj7Qz4AtGz4vzlDOSQXn0jRgnrZbldbe1QkpSASONqJgmil', '2018-04-30 14:22:59', '2018-05-02 07:40:27'),
(2, 'test', 'student', 'test2@test.com', 'test', '$2y$10$DrX1vzny8Xw.dNKBgqz.dut0n9A61mZ0VloK6rPWOPmVZyVhJSbzm', 2018, NULL, NULL, NULL, 'yDkNWENflZxLzDJncXH5vGNXE5RawX47bDmdsspaTCo2AZdFogLa7ty9k9vR', '2018-04-30 14:46:31', '2018-04-30 14:46:31'),
(3, 'Krishna', 'admin', 'krishna@test.com', 'krishna', '$2y$10$OzMEylHNkAZ8eS2gUNZ4Uuw4ytle3jJgIByXsfuOW73T7SK5NM74C', 2018, NULL, NULL, NULL, 'A3vOkeBULSDO4dTnZ38HTC85azhkeOgODjuXmUkhHTZI6jC9s2ZkZF8i7rU5', '2018-09-20 07:37:41', '2018-09-20 07:37:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invitations`
--
ALTER TABLE `invitations`
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
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `invitations`
--
ALTER TABLE `invitations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
