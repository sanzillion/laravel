-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 29, 2017 at 11:28 PM
-- Server version: 5.7.19-0ubuntu0.16.04.1
-- PHP Version: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cpstn`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` bigint(20) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `phone_number`, `email`, `level`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'master', 639074239571, 'master@dev.com', 'superuser', '$2y$10$FKgp7q9arFUCrrp4Al668.8O7fh2Tu535loqQY.sSB1N9pO74.p8a', 'Z1BUbc693V1LynVFegWAa06RCdGDzwhlyciIAoLPCkDiq6wm6I3BqjU9lr1L', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `body` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(10) UNSIGNED NOT NULL,
  `uploader` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `filename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `extension` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `folder_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `folders`
--

CREATE TABLE `folders` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_09_16_084359_create_posts_table', 1),
(4, '2017_09_18_092729_create_comments_table', 1),
(5, '2017_09_21_043903_create_tags_table', 1),
(6, '2017_09_22_234526_create_admins_table', 1),
(7, '2017_09_27_100701_create_files_table', 1),
(8, '2017_10_04_061531_create_folders_table', 1),
(9, '2017_10_04_062027_create_sms_table', 1),
(10, '2017_10_19_122245_create_stats_table', 1),
(11, '2017_10_19_122310_create_trackers_table', 1),
(12, '2017_10_29_024847_create_msgs_table', 1),
(13, '2017_10_29_132435_create_sessions_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `msgs`
--

CREATE TABLE `msgs` (
  `id` int(10) UNSIGNED NOT NULL,
  `from` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `to` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `msg` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `pending_posts`
--

CREATE TABLE `pending_posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pending_users`
--

CREATE TABLE `pending_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` bigint(20) NOT NULL,
  `institution` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post_tag`
--

CREATE TABLE `post_tag` (
  `post_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('5rM1gMZ54uzsn85SENbBTWnknvUKnqQuJhMM3I3X', NULL, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 'YTo3OntzOjU6InZpc2l0IjtzOjM6InllcyI7czo2OiJfdG9rZW4iO3M6NDA6ImtjZ05kWDIwSnhxWGxFdnd6ZEtkMEh1N1lBQ2FXSmRqRHpENm52cVQiO3M6NDoicGFnZSI7czo0OiJuZXdzIjtzOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoxNToiaHR0cDovL2Rldjo4MDAwIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo0OiJtZW51IjtzOjY6ImFjdGl2ZSI7czo5OiJhcHBTdGF0dXMiO3M6OToidW5kZWZpbmVkIjt9', 1509289739),
('7nwzyQX0Iz1nUA8poRSCL52y4N55M4fdIJaxZr3t', NULL, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 'YTo1OntzOjU6InZpc2l0IjtzOjM6InllcyI7czo2OiJfdG9rZW4iO3M6NDA6Imh1Nndqbkg2MHlrZEdkNEtBQ3JJaGpqbHd1WjZoQmQzYndzbEZkT0ciO3M6NDoicGFnZSI7czo1OiJhYm91dCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly9kZXY6ODAwMC9hYm91dCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1509290063),
('fjvhTqbENqLpW5NYH0g1t531Ew7HU1r4hEn10c0j', NULL, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiWmlyMU8wUEVMTjlmM1ZleFVOYThYOWt5NWJqTzlHVnlGOG9ZVURiViI7czo0OiJwYWdlIjtzOjQ6Im5ld3MiO3M6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjE1OiJodHRwOi8vZGV2OjgwMDAiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjQ6Im1lbnUiO3M6NjoiYWN0aXZlIjtzOjk6ImFwcFN0YXR1cyI7czo5OiJ1bmRlZmluZWQiO30=', 1509284058),
('FZvNlv5H06DBesCjWDzHrYal418V98OfSgR3U7Ak', NULL, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 'YToxMjp7czo3OiJ2aXNpdGVkIjtzOjM6InllcyI7czo0OiJ0ZXN0IjtzOjQ6ImZ1Y2siO3M6NjoiX3Rva2VuIjtzOjQwOiJaZEc0ajFGZHdqc3d4YmZ5VUwxMFZteUJkdXRVY2xvVnlGUVpvQXRJIjtzOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoxNToiaHR0cDovL2Rldjo4MDAwIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo0OiJwYWdlIjtzOjQ6Im5ld3MiO3M6MzoidXJsIjthOjE6e3M6ODoiaW50ZW5kZWQiO3M6MjE6Imh0dHA6Ly9kZXY6ODAwMC9hZG1pbiI7fXM6NTI6ImxvZ2luX2FkbWluXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjQ6Im1lbnUiO3M6NjoiYWN0aXZlIjtzOjk6ImFwcFN0YXR1cyI7czo5OiJ1bmRlZmluZWQiO3M6NToidG9rZW4iO3M6NDoibm9uZSI7czo0OiJub25lIjtzOjQwOiJaZEc0ajFGZHdqc3d4YmZ5VUwxMFZteUJkdXRVY2xvVnlGUVpvQXRJIjt9', 1509288137),
('Ice19WbuVXNdRAS1CFTf8IoHeiLMycApBm08HmG8', NULL, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 'YTo1OntzOjU6InZpc2l0IjtzOjM6InllcyI7czo2OiJfdG9rZW4iO3M6NDA6IjFaVVVFSGYwYUN3NG5Ca24zWEp3TXQ5TExmZzlLTUFoRzRRSFJsWWkiO3M6NDoicGFnZSI7czo3OiJzdG9yaWVzIjtzOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyMzoiaHR0cDovL2Rldjo4MDAwL3N0b3JpZXMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1509289834),
('IKveNHLgwzss0FwlQBGwKRWqs7KjxjCljw2XGK8r', NULL, '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:56.0) Gecko/20100101 Firefox/56.0', 'YTo1OntzOjU6InZpc2l0IjtzOjM6InllcyI7czo2OiJfdG9rZW4iO3M6NDA6IklmZzYxNk9RT0RyeEw3dTFBcnFkc1RadE9CcUh2TU9rTmVSeGZTUXYiO3M6NDoicGFnZSI7czo3OiJzdG9yaWVzIjtzOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyMzoiaHR0cDovL2Rldjo4MDAwL3N0b3JpZXMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1509289786),
('pXoG4Jc4dA66QQPt8xe6gpaqfEMfn4guQ0jft8SM', NULL, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 'YTo4OntzOjc6InZpc2l0ZWQiO3M6MzoieWVzIjtzOjY6Il90b2tlbiI7czo0MDoibUxpVU1zVkFLVG9FWEU5d0ExWG10WktZTmdOOGpWWUdLaHh1ZmtnRiI7czo0OiJwYWdlIjtzOjU6ImFib3V0IjtzOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyMToiaHR0cDovL2Rldjo4MDAwL2Fib3V0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo0OiJtZW51IjtzOjY6ImFjdGl2ZSI7czo5OiJhcHBTdGF0dXMiO3M6OToidW5kZWZpbmVkIjtzOjU6InZpc2l0IjtzOjM6InllcyI7fQ==', 1509289502),
('r3794vWuDCjwbCMD8CcEbzogThwcbCVP4eScu8Fh', NULL, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiamZqcnlzdWxqaWVMa3hnUUJZQXZGc09haEVaM2pjZFJuQ2hGM0l1OCI7czo0OiJwYWdlIjtzOjg6InJlZ2lzdGVyIjtzOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyNDoiaHR0cDovL2Rldjo4MDAwL3JlZ2lzdGVyIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1OiJ2aXNpdCI7czozOiJ5ZXMiO30=', 1509289567),
('V4V3YGe8Q72Iy5lGzB2JxDFzcm9hjDFS33W0YBmU', NULL, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 'YTo1OntzOjU6InZpc2l0IjtzOjM6InllcyI7czo2OiJfdG9rZW4iO3M6NDA6Im1EbmhTa3V2azBlcXc3dmJhV2p1WTBGVGd0MHEyZ1Y2bEc3WXdDRjYiO3M6NDoicGFnZSI7czo1OiJhYm91dCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly9kZXY6ODAwMC9hYm91dCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1509289665),
('yau41K2yfuOsaeoLPXcOMnAnS94seF7gxI5KEx0w', NULL, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoidHcxVzVYMkMyNnJ6SEkxckpZT3NMYVNuU3NYTWJsTmR2bm9Cclh6RiI7czo0OiJwYWdlIjtzOjc6InN0b3JpZXMiO3M6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjIzOiJodHRwOi8vZGV2OjgwMDAvc3RvcmllcyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NToidmlzaXQiO3M6MzoieWVzIjt9', 1509290313);

-- --------------------------------------------------------

--
-- Table structure for table `ship`
--

CREATE TABLE `ship` (
  `id` int(10) UNSIGNED NOT NULL,
  `sender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `recipient` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sms`
--

CREATE TABLE `sms` (
  `id` int(10) UNSIGNED NOT NULL,
  `sender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `recipient` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sms`
--

INSERT INTO `sms` (`id`, `sender`, `recipient`, `body`, `code`, `created_at`, `updated_at`) VALUES
(1, 'SOSnetwork App', 'All', 'This is a test message for Everyone!', '100', NULL, NULL),
(2, 'SOSnetwork App', 'Admins', 'This is a test message for Admins!', '200', NULL, NULL),
(3, 'SOSnetwork App', 'Users', 'This is a test message for Users!', '300', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `stats`
--

CREATE TABLE `stats` (
  `id` int(10) UNSIGNED NOT NULL,
  `month` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `visitor` int(11) NOT NULL,
  `m_log` int(11) NOT NULL,
  `a_log` int(11) NOT NULL,
  `apply` int(11) NOT NULL,
  `approve` int(11) NOT NULL,
  `download` int(11) NOT NULL,
  `sms` int(11) NOT NULL,
  `uptime` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stats`
--

INSERT INTO `stats` (`id`, `month`, `visitor`, `m_log`, `a_log`, `apply`, `approve`, `download`, `sms`, `uptime`, `created_at`, `updated_at`) VALUES
(1, 'January', 10, 5, 25, 15, 20, 10, 5, 10, NULL, NULL),
(2, 'February', 35, 20, 25, 15, 20, 10, 5, 20, NULL, NULL),
(3, 'March', 23, 15, 25, 15, 20, 10, 5, 25, NULL, NULL),
(4, 'April', 58, 45, 25, 15, 20, 10, 5, 80, NULL, NULL),
(5, 'May', 65, 39, 25, 15, 20, 10, 5, 67, NULL, NULL),
(6, 'June', 77, 65, 25, 15, 20, 10, 5, 34, NULL, NULL),
(7, 'July', 43, 23, 25, 15, 20, 10, 5, 54, NULL, NULL),
(8, 'August', 56, 38, 25, 15, 20, 10, 5, 22, NULL, NULL),
(9, 'September', 90, 60, 25, 15, 20, 10, 5, 20, NULL, NULL),
(10, 'October', 150, 45, 30, 15, 20, 10, 5, 122, NULL, '2017-10-29 07:15:35'),
(11, 'November', 67, 54, 25, 15, 20, 10, 5, 93, NULL, NULL),
(12, 'December', 74, 66, 25, 15, 20, 10, 5, 77, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `trackers`
--

CREATE TABLE `trackers` (
  `id` int(10) UNSIGNED NOT NULL,
  `user` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `action` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trackers`
--

INSERT INTO `trackers` (`id`, `user`, `type`, `action`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 'admin', 'Admin Logout', 'None', '2017-10-29 05:29:21', '2017-10-29 05:29:21'),
(2, 1, 'admin', 'Admin Login', 'Attempt: 1', '2017-10-29 05:29:43', '2017-10-29 05:29:43'),
(3, 1, 'admin', 'Admin Logout', 'None', '2017-10-29 05:31:47', '2017-10-29 05:31:47'),
(4, 1, 'admin', 'Admin Login', 'Attempt: 1', '2017-10-29 05:32:11', '2017-10-29 05:32:11'),
(5, 1, 'admin', 'Admin Logout', 'None', '2017-10-29 05:32:22', '2017-10-29 05:32:22'),
(6, 1, 'admin', 'Admin Login', 'Attempt: 1', '2017-10-29 06:11:23', '2017-10-29 06:11:23'),
(7, 1, 'admin', 'Admin Login', 'Attempt: 1', '2017-10-29 06:47:47', '2017-10-29 06:47:47'),
(8, 1, 'admin', 'Admin Logout', 'None', '2017-10-29 06:49:45', '2017-10-29 06:49:45'),
(9, 1, 'admin', 'Admin Login', 'Attempt: 1', '2017-10-29 07:08:43', '2017-10-29 07:08:43'),
(10, 1, 'admin', 'Admin Logout', 'None', '2017-10-29 07:08:48', '2017-10-29 07:08:48');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` bigint(20) NOT NULL,
  `institution` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `folders`
--
ALTER TABLE `folders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `folders_name_unique` (`name`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `msgs`
--
ALTER TABLE `msgs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pending_posts`
--
ALTER TABLE `pending_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pending_users`
--
ALTER TABLE `pending_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pending_users_email_unique` (`email`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_tag`
--
ALTER TABLE `post_tag`
  ADD PRIMARY KEY (`post_id`,`tag_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD UNIQUE KEY `sessions_id_unique` (`id`);

--
-- Indexes for table `ship`
--
ALTER TABLE `ship`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sms`
--
ALTER TABLE `sms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stats`
--
ALTER TABLE `stats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tags_name_unique` (`name`);

--
-- Indexes for table `trackers`
--
ALTER TABLE `trackers`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `folders`
--
ALTER TABLE `folders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `msgs`
--
ALTER TABLE `msgs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pending_posts`
--
ALTER TABLE `pending_posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pending_users`
--
ALTER TABLE `pending_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ship`
--
ALTER TABLE `ship`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sms`
--
ALTER TABLE `sms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `stats`
--
ALTER TABLE `stats`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `trackers`
--
ALTER TABLE `trackers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
