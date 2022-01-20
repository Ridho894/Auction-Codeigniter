-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2022 at 02:36 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `codeigniter_auction`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_activation_attempts`
--

CREATE TABLE `auth_activation_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_activation_attempts`
--

INSERT INTO `auth_activation_attempts` (`id`, `ip_address`, `user_agent`, `token`, `created_at`) VALUES
(1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.93 Safari/537.36', 'c21d7b1ed42a8d4d950206787a99318e', '2021-12-13 19:19:11'),
(2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', '264e8e3dcca3dafd6e9cc3727ee26603', '2021-12-17 17:43:37'),
(3, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'd640c82347a0647efe92e7214bfa4d33', '2021-12-28 18:54:38'),
(4, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', '41d1a43c9fc0d708d0d78affa83bd5bc', '2022-01-05 01:12:36'),
(5, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', '934745ca50b215bd45b5ed0165a14d13', '2022-01-06 04:56:56'),
(6, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.71 Safari/537.36', '424f7f28f63c65ecb38a5c23196ec468', '2022-01-12 19:43:16'),
(7, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.71 Safari/537.36', '424f7f28f63c65ecb38a5c23196ec468', '2022-01-12 21:43:49'),
(8, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.71 Safari/537.36', '709b78fcedc1415329226c384146b162', '2022-01-16 19:15:14');

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups`
--

CREATE TABLE `auth_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_permissions`
--

CREATE TABLE `auth_groups_permissions` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_users`
--

CREATE TABLE `auth_groups_users` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_logins`
--

CREATE TABLE `auth_logins` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_logins`
--

INSERT INTO `auth_logins` (`id`, `ip_address`, `email`, `user_id`, `date`, `success`) VALUES
(1, '::1', 'ridho', NULL, '2021-12-13 19:05:35', 0),
(2, '::1', 'ridho', 1, '2021-12-13 19:05:53', 0),
(3, '::1', 'ridhofauzi1@gmail.com', 2, '2021-12-13 19:06:46', 0),
(4, '::1', 'ridho', NULL, '2021-12-13 19:07:18', 0),
(5, '::1', 'ridho', NULL, '2021-12-13 19:07:23', 0),
(6, '::1', 'ridhofauzi1@gmail.com', 2, '2021-12-13 19:08:01', 0),
(7, '::1', 'ridhofauzi1@gmail.com', 2, '2021-12-13 19:08:55', 0),
(8, '::1', 'peserta1@gmail.com', 3, '2021-12-13 19:09:32', 0),
(9, '::1', 'ridho', NULL, '2021-12-13 19:19:14', 0),
(10, '::1', 'ridhofauzi1453@gmail.com', 5, '2021-12-13 19:19:33', 1),
(11, '::1', 'ridhofauzi1453@gmail.com', 5, '2021-12-13 19:27:18', 1),
(12, '::1', 'ridhofauzi1453@gmail.com', 5, '2021-12-13 16:34:59', 1),
(13, '::1', 'ridhofauzi1453@gmail.com', 5, '2021-12-13 16:38:21', 1),
(14, '::1', 'ridhofauzi1453@gmail.com', 5, '2021-12-13 16:50:38', 1),
(15, '::1', 'ridhofauzi1453@gmail.com', 5, '2021-12-14 04:27:51', 1),
(16, '::1', 'ridhofauzi1453@gmail.com', 5, '2021-12-14 04:29:50', 1),
(17, '::1', 'ridhofauzi1453@gmail.com', 5, '2021-12-14 04:39:24', 1),
(18, '::1', 'ridhofauzi1453@gmail.com', 5, '2021-12-14 05:50:54', 1),
(19, '::1', 'ridhofauzi1453@gmail.com', NULL, '2021-12-14 08:16:13', 0),
(20, '::1', 'ridhofauzi1453@gmail.com', 5, '2021-12-14 08:16:22', 1),
(21, '::1', 'ridhofauzi1453@gmail.com', 5, '2021-12-14 18:32:58', 1),
(22, '::1', 'ridho', NULL, '2021-12-14 20:51:41', 0),
(23, '::1', 'ridhofauzi1453@gmail.com', 5, '2021-12-14 20:54:20', 1),
(24, '::1', 'ridhofauzi1453@gmail.com', 5, '2021-12-15 18:28:24', 1),
(25, '::1', 'ridhofauzi1453@gmail.com', 5, '2021-12-15 21:35:17', 1),
(26, '::1', 'ridhofauzi1453@gmail.com', 5, '2021-12-15 22:05:32', 1),
(27, '::1', 'ridhofauzi1453@gmail.com', 5, '2021-12-15 22:06:28', 1),
(28, '::1', 'ridhofauzi1453@gmail.com', 5, '2021-12-15 22:06:48', 1),
(29, '::1', 'ridhofauzi1453@gmail.com', 5, '2021-12-15 22:09:06', 1),
(30, '::1', 'ridhofauzi1453@gmail.com', 5, '2021-12-15 22:10:51', 1),
(31, '::1', 'ridhofauzi1453@gmail.com', 5, '2021-12-16 20:13:21', 1),
(32, '::1', 'ridho', NULL, '2021-12-17 01:03:27', 0),
(33, '::1', 'ridhofauzi1453@gmail.com', 5, '2021-12-17 01:03:36', 1),
(34, '::1', 'ridhofauzi1453@gmail.com', 5, '2021-12-17 02:30:10', 1),
(35, '::1', 'ridhofa', NULL, '2021-12-17 06:30:27', 0),
(36, '::1', 'ridhofauzi1453@gmail.com', 5, '2021-12-17 06:30:35', 1),
(37, '::1', 'ridhofauzi1453@gmail.com', 5, '2021-12-17 17:36:53', 1),
(38, '::1', 'ridhofauzi1@gmail.com', NULL, '2021-12-17 17:42:02', 0),
(39, '::1', 'ridhofauzi1@gmail.com', 2, '2021-12-17 17:43:13', 0),
(40, '::1', 'ridhofauzi1@gmail.com', 2, '2021-12-17 17:43:49', 1),
(41, '::1', 'ridhofauzi1453@gmail.com', 5, '2021-12-17 17:50:29', 1),
(42, '::1', 'ridhofauzi1@gmail.com', 2, '2021-12-17 17:50:41', 1),
(43, '::1', 'ridhofauzi1453@gmail.com', 5, '2021-12-17 17:57:43', 1),
(44, '::1', 'ridhofauzi1453@gmail.com', 5, '2021-12-17 18:14:55', 1),
(45, '::1', 'ridhofauzi1@gmail.com', NULL, '2021-12-17 18:22:11', 0),
(46, '::1', 'ridhofauzi1453@gmail.com', 5, '2021-12-17 18:22:19', 1),
(47, '::1', 'ridhofauzi1453@gmail.com', 5, '2021-12-17 22:47:08', 1),
(48, '::1', 'ridhofauzi1453@gmail.com', 5, '2021-12-17 22:52:15', 1),
(49, '::1', 'ridhofauzi1453@gmail.com', 5, '2021-12-17 22:58:57', 1),
(50, '::1', 'ridhofauzi1453@gmail.com', 5, '2021-12-17 23:07:44', 1),
(51, '::1', 'ridhofauzi1453@gmail.com', 5, '2021-12-17 23:20:15', 1),
(52, '::1', 'ridhofauzi1453@gmail.com', 5, '2021-12-17 23:21:13', 1),
(53, '::1', 'ridhofauzi1453@gmail.com', 5, '2021-12-19 22:04:00', 1),
(54, '::1', 'ridhofauzi1453@gmail.com', 5, '2021-12-19 22:19:51', 1),
(55, '::1', 'ridho', NULL, '2021-12-19 22:33:23', 0),
(56, '::1', 'ridhofauzi1453@gmail.com', 5, '2021-12-19 22:33:28', 1),
(57, '::1', 'ridhofauzi1453@gmail.com', 5, '2021-12-20 02:49:58', 1),
(58, '::1', 'ridhofauzi1453@gmail.com', 5, '2021-12-20 07:49:26', 1),
(59, '::1', 'ridhofauzi1453@gmail.com', 5, '2021-12-20 21:20:46', 1),
(60, '::1', 'ridhofauzi1453@gmail.com', 5, '2021-12-21 02:09:59', 1),
(61, '::1', 'ridhofauzi1453@gmail.com', 5, '2021-12-22 15:15:55', 1),
(62, '::1', 'ridhofauzi1@gmail.com', 2, '2021-12-22 15:16:14', 1),
(63, '::1', 'ridhofauzi1453@gmail.com', 5, '2021-12-22 15:17:52', 1),
(64, '::1', 'ridhofauzi1@gmail.com', 2, '2021-12-22 15:18:11', 1),
(65, '::1', 'ridhofauzi1453@gmail.com', 5, '2021-12-22 15:20:48', 1),
(66, '::1', 'ridhofauzi1@gmail.com', 2, '2021-12-22 15:25:06', 1),
(67, '::1', 'ridhofauzi1453@gmail.com', 5, '2021-12-22 15:28:49', 1),
(68, '::1', 'ridhofauzi1@gmail.com', 2, '2021-12-22 15:29:18', 1),
(69, '::1', 'ridhofauzi1453@gmail.com', 5, '2021-12-22 15:31:18', 1),
(70, '::1', 'ridhofauzi1@gmail.com', 2, '2021-12-22 15:31:32', 1),
(71, '::1', 'ridho', NULL, '2021-12-22 22:36:47', 0),
(72, '::1', 'ridhofauzi1@gmail.com', 2, '2021-12-22 22:36:54', 1),
(73, '::1', 'ridhofauzi1453@gmail.com', 5, '2021-12-22 22:41:16', 1),
(74, '::1', 'ridho', NULL, '2021-12-22 23:17:34', 0),
(75, '::1', 'ridhofauzi1@gmail.com', 2, '2021-12-22 23:17:46', 1),
(76, '::1', 'ridhofauzi1@gmail.com', 2, '2021-12-22 23:18:03', 1),
(77, '::1', 'ridhofauzi1453@gmail.com', 5, '2021-12-27 01:35:44', 1),
(78, '::1', 'ridhofauzi1@gmail.com', 2, '2021-12-27 01:36:01', 1),
(79, '::1', 'ridhofauzi1453@gmail.com', 5, '2021-12-27 02:09:03', 1),
(80, '::1', 'ridhofauzi1453@gmail.com', 5, '2021-12-27 02:10:14', 1),
(81, '::1', 'ridhofauzi1@gmail.com', NULL, '2021-12-28 18:53:10', 0),
(82, '::1', 'ridhofauzi1@gmail.com', 6, '2021-12-28 18:54:52', 1),
(83, '::1', 'ridhofauzi1@gmail.com', 6, '2021-12-28 19:40:10', 1),
(84, '::1', 'ridhofauzi1453@gmail.com', 5, '2021-12-28 19:44:11', 1),
(85, '::1', 'ridhofauzi1453@gmail.com', 5, '2021-12-29 00:45:16', 1),
(86, '::1', 'ridhofauzi1453@gmail.com', 5, '2021-12-31 21:29:02', 1),
(87, '::1', 'ridhofauzi1453@gmail.com', 5, '2022-01-02 20:34:36', 1),
(88, '::1', 'ridhofauzi1453@gmail.com', 5, '2022-01-04 00:12:30', 1),
(89, '::1', 'ridhofauzi1453@gmail.com', 5, '2022-01-04 02:42:19', 1),
(90, '::1', 'ridhofauzi1453@gmail.com', 5, '2022-01-04 05:54:05', 1),
(91, '::1', 'ridhofauzi1453@gmail.com', 5, '2022-01-04 06:06:15', 1),
(92, '::1', 'ridhofauzi1@gmail.com', 6, '2022-01-04 06:07:37', 1),
(93, '::1', 'ridhofauzi1453@gmail.com', 5, '2022-01-04 06:16:25', 1),
(94, '::1', 'ridhofauzi1@gmail.com', 6, '2022-01-04 07:35:35', 1),
(95, '::1', 'ridhofauzi1453@gmail.com', 5, '2022-01-04 07:36:10', 1),
(96, '::1', 'ridhofauzi1@gmail.com', 6, '2022-01-04 17:13:53', 1),
(97, '::1', 'ridhofauzi1453@gmail.com', 5, '2022-01-04 17:15:19', 1),
(98, '::1', 'ridhofauzi1@gmail.com', 6, '2022-01-04 19:34:33', 1),
(99, '::1', 'ridhofauzi1453@gmail.com', 5, '2022-01-04 19:48:56', 1),
(100, '::1', 'ridhofauzi1@gmail.com', 6, '2022-01-04 19:51:31', 1),
(101, '::1', 'ridhofauzi1453@gmail.com', 5, '2022-01-04 20:09:26', 1),
(102, '::1', 'ridhofauzi1@gmail.com', 6, '2022-01-04 20:25:29', 1),
(103, '::1', 'ridhofauzi1453@gmail.com', 5, '2022-01-04 20:29:56', 1),
(104, '::1', 'ridhofauzi1453@gmail.com', 5, '2022-01-04 22:08:40', 1),
(105, '::1', 'ridhofauzi1@gmail.com', 6, '2022-01-04 22:09:56', 1),
(106, '::1', 'ridhofauzi1@students.amikom.ac.id', 7, '2022-01-05 01:12:49', 1),
(107, '::1', 'ridhofauzi1453@gmail.com', 5, '2022-01-05 01:13:47', 1),
(108, '::1', 'ridhofauzi1@gmail.com', NULL, '2022-01-05 01:20:08', 0),
(109, '::1', 'ridhofauzi1@gmail.com', 6, '2022-01-05 01:20:29', 1),
(110, '::1', 'ridhofauzi1@gmail.com', 6, '2022-01-05 08:02:08', 1),
(111, '::1', 'ridhofauzi1453@gmail.com', 5, '2022-01-05 08:03:09', 1),
(112, '::1', 'ridhofauzi1@students.amikom.ac.id', 7, '2022-01-05 08:11:16', 1),
(113, '::1', 'ridhofauzi1@gmail.com', 6, '2022-01-05 08:13:46', 1),
(114, '::1', 'ridhofauzi1453@gmail.com', 5, '2022-01-05 08:14:18', 1),
(115, '::1', 'ridhofauzi1@students.amikom.ac.id', 7, '2022-01-05 08:22:34', 1),
(116, '::1', 'ridhofauzi1@students.amikom.ac.id', 7, '2022-01-05 09:25:09', 1),
(117, '::1', 'ridhofauzi1@gmail.com', 6, '2022-01-05 21:45:35', 1),
(118, '::1', 'ridhofauzi1453@gmail.com', 5, '2022-01-05 21:45:59', 1),
(119, '::1', 'ridhofauzi1@students.amikom.ac.id', 7, '2022-01-05 21:46:41', 1),
(120, '::1', 'ridhofauzi1453@gmail.com', 8, '2022-01-06 04:57:10', 1),
(121, '::1', 'ridhofauzi1@gmail.com', 6, '2022-01-07 08:31:54', 1),
(122, '::1', 'ridhofauzi1453@gmail.com', 8, '2022-01-07 08:34:26', 1),
(123, '::1', 'ridhofauzi1@gmail.com', 6, '2022-01-07 08:34:38', 1),
(124, '::1', 'ridhofauzi1@students.amikom.ac.id', 7, '2022-01-07 08:34:52', 1),
(125, '::1', 'ridhofauzi1@gmail.com', 6, '2022-01-08 04:24:28', 1),
(126, '::1', 'ridhofauzi1@gmail.com', 6, '2022-01-08 11:31:22', 1),
(127, '::1', 'ridhofauzi1@gmail.com', 6, '2022-01-09 06:51:36', 1),
(128, '::1', 'ridhofauzi1@students.amikom.ac.id', 7, '2022-01-09 07:16:26', 1),
(129, '::1', 'ridhofauzi1@gmail.com', 6, '2022-01-09 18:53:20', 1),
(130, '::1', 'ridhofauzi1453@gmail.com', 8, '2022-01-09 18:54:47', 1),
(131, '::1', 'ridhofauzi1@gmail.com', 6, '2022-01-10 00:52:34', 1),
(132, '::1', 'ridhofauzi1@gmail.com', 6, '2022-01-11 14:25:44', 1),
(133, '::1', 'ridhofauzi1453@gmail.com', 8, '2022-01-11 14:31:40', 1),
(134, '::1', 'ridhofauzi1@gmail.com', 6, '2022-01-11 14:38:27', 1),
(135, '::1', 'ridhofauzi1@gmail.com', 6, '2022-01-11 21:13:35', 1),
(136, '::1', 'ridhofauzi1453@gmail.com', 8, '2022-01-11 21:20:52', 1),
(137, '::1', 'ridhofauzi1@gmail.com', 6, '2022-01-12 11:16:30', 1),
(138, '::1', 'ridhofauzi1453@gmail.com', 8, '2022-01-12 11:19:44', 1),
(139, '::1', 'ridhofauzi1@students.amikom.ac.id', 7, '2022-01-12 11:29:46', 1),
(140, '::1', 'ridhofauzi1@gmail.com', 6, '2022-01-12 11:30:21', 1),
(141, '::1', 'ridhofauzi1453@gmail.com', 8, '2022-01-12 11:32:05', 1),
(142, '::1', 'ridhofauzi1@students.amikom.ac.id', 7, '2022-01-12 11:45:49', 1),
(143, '::1', 'ridhofauzi1453@gmail.com', 8, '2022-01-12 11:49:37', 1),
(144, '::1', 'ridhofauzi1@gmail.com', 6, '2022-01-12 19:10:43', 1),
(145, '::1', 'ridhofauzi1453@gmail.com', 8, '2022-01-12 19:11:41', 1),
(146, '::1', 'ridhofauzi1@gmail.com', 6, '2022-01-12 19:19:01', 1),
(147, '::1', 'ridhofauzi1453@gmail.com', 8, '2022-01-12 19:34:41', 1),
(148, '::1', 'ridhofauzi1@gmail.com', 6, '2022-01-12 19:37:51', 1),
(149, '::1', 'ridhofauzi1@students.amikom.ac.id', 9, '2022-01-12 19:43:25', 1),
(150, '::1', 'ridhofauzi1@gmail.com', 6, '2022-01-12 19:48:07', 1),
(151, '::1', 'ridhofauzi1@gmail.com', 6, '2022-01-12 21:35:12', 1),
(152, '::1', 'ridhofauzi1453@gmail.com', 8, '2022-01-12 21:36:49', 1),
(153, '::1', 'ridhofauzi1@gmail.com', 11, '2022-01-16 19:15:30', 1),
(154, '::1', 'ridhofauzi1@gmail.com', 11, '2022-01-18 19:26:23', 1);

-- --------------------------------------------------------

--
-- Table structure for table `auth_permissions`
--

CREATE TABLE `auth_permissions` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_reset_attempts`
--

CREATE TABLE `auth_reset_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_reset_attempts`
--

INSERT INTO `auth_reset_attempts` (`id`, `email`, `ip_address`, `user_agent`, `token`, `created_at`) VALUES
(1, 'ridhofauzi1453@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', '6f8694d1fe06f5485a3a63635f768b65', '2021-12-14 04:27:31'),
(2, 'ridhofauzi1453@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', '7eae56661f94c4a1b9d912bb3e076d66', '2021-12-14 04:29:41'),
(3, 'ridhofauzi1@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'd9a7c366492c61500b958f2f95ba82ae', '2021-12-17 17:43:03'),
(4, 'ridhofauzi1453@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', '1c972106fa1c89ca672ceaea727e2075', '2021-12-19 22:19:45'),
(5, 'ridhofauzi1@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', '7f2eaf2066b8ac0d37e45fcb8b56acf3', '2021-12-27 02:10:07'),
(6, 'ridhofauzi1@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'd970515893dd080585c13c3f88342ece', '2022-01-04 06:07:28');

-- --------------------------------------------------------

--
-- Table structure for table `auth_tokens`
--

CREATE TABLE `auth_tokens` (
  `id` int(11) UNSIGNED NOT NULL,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `expires` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_users_permissions`
--

CREATE TABLE `auth_users_permissions` (
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `bid`
--

CREATE TABLE `bid` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `bid` int(255) NOT NULL,
  `product` varchar(255) NOT NULL,
  `status` varchar(30) NOT NULL DEFAULT 'WAITING...',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bid`
--

INSERT INTO `bid` (`id`, `username`, `bid`, `product`, `status`, `created_at`, `updated_at`) VALUES
(49, 'Ridho', 300000000, 'Rumah', 'GIVEN...', '2022-01-13 10:35:24', '2022-01-12 21:37:15');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2021-12-12-044044', 'App\\Database\\Migrations\\Orang', 'default', 'App', 1639284453, 1),
(2, '2017-11-20-223112', 'Myth\\Auth\\Database\\Migrations\\CreateAuthTables', 'default', 'Myth\\Auth', 1639442718, 2);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `price` int(10) NOT NULL,
  `description` varchar(255) NOT NULL,
  `sampul` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL DEFAULT 'INDONESIA',
  `created_by` varchar(255) NOT NULL DEFAULT 'ADMIN',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `judul`, `slug`, `price`, `description`, `sampul`, `address`, `created_by`, `created_at`, `updated_at`) VALUES
(79, 'Mobil Sport', 'mobil-sport', 50000000, 'Masih Mulus dan Bagus', '1642037833_1a183ddced754037540d.jpg', 'JAKARTA', 'ridho1453 edit', '2022-01-12 19:37:03', '2022-01-12 19:37:13'),
(82, 'Motor Harley', 'motor-harley', 2000000, 'Bagus', '1642041241_14f0a327487897d5c1ce.jpg', 'KEMANG', 'Ridho', '2022-01-12 20:33:50', '2022-01-12 20:34:01');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(11) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL DEFAULT 'Good',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `nama`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Ridho', 'Good', '2021-12-17 03:35:48', '2021-12-17 03:35:48'),
(2, 'Fahri', 'Good', '2021-12-17 03:35:48', '2021-12-17 03:35:48');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `phone_number` int(20) NOT NULL,
  `address` varchar(255) NOT NULL DEFAULT 'INDONESIA',
  `password_hash` varchar(255) NOT NULL,
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `phone_number`, `address`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`) VALUES
(11, 'ridhofauzi1@gmail.com', 'Ridho', 0, 'INDONESIA', '$2y$10$sTpV8jQ4w5RzVZa3eZuyserql0PS527KPUIBUyW4mXuawmTayzX4m', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2022-01-16 19:14:26', '2022-01-16 19:15:14', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups`
--
ALTER TABLE `auth_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `group_id_permission_id` (`group_id`,`permission_id`);

--
-- Indexes for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD KEY `auth_groups_users_user_id_foreign` (`user_id`),
  ADD KEY `group_id_user_id` (`group_id`,`user_id`);

--
-- Indexes for table `auth_logins`
--
ALTER TABLE `auth_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_tokens_user_id_foreign` (`user_id`),
  ADD KEY `selector` (`selector`);

--
-- Indexes for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `user_id_permission_id` (`user_id`,`permission_id`);

--
-- Indexes for table `bid`
--
ALTER TABLE `bid`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `auth_groups`
--
ALTER TABLE `auth_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_logins`
--
ALTER TABLE `auth_logins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;

--
-- AUTO_INCREMENT for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bid`
--
ALTER TABLE `bid`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
