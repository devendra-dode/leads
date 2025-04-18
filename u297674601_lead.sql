-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 18, 2025 at 11:39 AM
-- Server version: 10.11.10-MariaDB-log
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u297674601_lead`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `user_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `subject` varchar(200) DEFAULT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Devendra dode', 'test@gmail.com', 'SDFSDFASFAS', 'SFJKA LJFLKAS LKSJFLSJF', '2025-04-15 08:34:49', '2025-04-15 08:34:49'),
(2, 'TESTING', 'Firstbranch@Gmail.Com', 'How to Check If array Is Empty in Controller', 'FJSALFJSALFJASJFLASJF', '2025-04-15 08:39:58', '2025-04-15 08:39:58');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `pageId` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(100) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `short_description` text DEFAULT NULL,
  `detail` text DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `partners`
--

CREATE TABLE `partners` (
  `partnerId` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `partners`
--

INSERT INTO `partners` (`partnerId`, `name`, `logo`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Canera', 'https://paisaclick.com/public/uploads/partners/1744656033_1a8cfffe0afddbc769c4.png', 'active', '2025-04-14 18:36:29', '2025-04-14 18:40:33'),
(2, 'Tata Capital', 'https://paisaclick.com/public/uploads/partners/1744656141_67664d5f8d854ce784fa.png', 'active', '2025-04-14 18:42:21', '2025-04-14 18:42:21'),
(3, 'Aditya Birla', 'https://paisaclick.com/public/uploads/partners/1744656160_24d85eeae30feafc24f1.png', 'active', '2025-04-14 18:42:40', '2025-04-14 18:42:40'),
(4, 'HDFC', 'https://paisaclick.com/public/uploads/partners/1744656171_971cea0ae94c20181b96.png', 'active', '2025-04-14 18:42:51', '2025-04-14 18:42:51'),
(5, 'ICICI', 'https://paisaclick.com/public/uploads/partners/1744656182_859583643beac5a17424.png', 'active', '2025-04-14 18:43:02', '2025-04-14 18:43:02'),
(6, 'BOI', 'https://paisaclick.com/public/uploads/partners/1744656203_2144d27fb3513b87a8ca.png', 'active', '2025-04-14 18:43:23', '2025-04-14 18:43:23'),
(7, 'PNB', 'https://paisaclick.com/public/uploads/partners/1744656215_e6e5680bc13c10c90ed8.png', 'active', '2025-04-14 18:43:35', '2025-04-14 18:43:35'),
(8, 'SBI', 'https://paisaclick.com/public/uploads/partners/1744656227_743b8d942216c36aeb3c.png', 'active', '2025-04-14 18:43:47', '2025-04-14 18:43:47'),
(9, 'YES BANK', 'https://paisaclick.com/public/uploads/partners/1744656240_2bfab22d80d9bd1c14e5.png', 'active', '2025-04-14 18:44:00', '2025-04-14 18:44:00'),
(10, 'LendingKart', 'https://paisaclick.com/public/uploads/partners/1744656258_5d48dba7cbb124d1d5ae.png', 'active', '2025-04-14 18:44:18', '2025-04-14 18:44:18');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_access_matrix`
--

CREATE TABLE `tbl_access_matrix` (
  `id` int(11) NOT NULL,
  `access` text DEFAULT NULL,
  `roleId` int(11) NOT NULL,
  `isDeleted` tinyint(4) NOT NULL DEFAULT 0,
  `createdBy` int(11) NOT NULL,
  `createdDtm` datetime NOT NULL,
  `updatedBy` int(11) DEFAULT NULL,
  `updatedDtm` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `tbl_access_matrix`
--

INSERT INTO `tbl_access_matrix` (`id`, `access`, `roleId`, `isDeleted`, `createdBy`, `createdDtm`, `updatedBy`, `updatedDtm`) VALUES
(1, '[{\"module\":\"Task\",\"total_access\":0,\"list\":1,\"create_records\":0,\"edit_records\":0,\"delete_records\":0},{\"module\":\"Booking\",\"total_access\":0,\"list\":1,\"create_records\":0,\"edit_records\":0,\"delete_records\":0}]', 12, 0, 1, '2022-06-17 21:01:02', 1, '2022-06-18 20:50:58');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_blogs`
--

CREATE TABLE `tbl_blogs` (
  `blogId` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `short_description` text NOT NULL,
  `details` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `category` varchar(255) NOT NULL,
  `status` enum('draft','published','archived') DEFAULT 'draft',
  `published_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_blogs`
--

INSERT INTO `tbl_blogs` (`blogId`, `name`, `slug`, `short_description`, `details`, `image`, `category`, `status`, `published_at`, `created_at`, `updated_at`) VALUES
(1, 'Learn the best tips and tricks', 'first', 'Learn the best tips and tricks to save money smartly and achieve your financial goals faster.', '<p>&nbsp;</p>\r\n\r\n<p>In today\\&#39;s fast-paced digital world, learning smart tips and tricks can save you time, boost your productivity, and give you a competitive edge. Whether you\\&#39;re a student, professional, or business owner, having a few clever strategies up your sleeve can go a long way.</p>\r\n\r\n<h2>Productivity Hacks</h2>\r\n\r\n<ul><br />\r\n	<li><strong>Use the Pomodoro Technique</strong> &ndash; Work in focused 25-minute sessions followed by a 5-minute break to stay sharp.</li>\r\n	<br />\r\n	<li><strong>Plan Your Day the Night Before</strong> &ndash; Start your mornings with a clear plan and intention.</li>\r\n	<br />\r\n	<li>&nbsp; &nbsp; &nbsp;<strong>Declutter Your Workspace</strong> &ndash; A clean space leads to a clearer mind.</li>\r\n	<br />\r\n	&nbsp;\r\n</ul>\r\n\r\n<p><img alt=\"\" src=\"https://3catslabs.com/wp-content/uploads/2022/01/Social-Media-Image-Sizes-Guide-2022-Cover.jpg\" /></p>\r\n\r\n<h2>Tech Tips&nbsp;</h2>\r\n\r\n<ul><br />\r\n	<li><strong>Master Keyboard Shortcuts</strong> &ndash; Save hours weekly by learning basic shortcuts for your OS and favorite apps.</li>\r\n	<br />\r\n	<li><strong>Automate Repetitive Tasks</strong> &ndash; Tools like Zapier, IFTTT, or even browser extensions can automate your routine.</li>\r\n	<br />\r\n	<li><strong>Use Cloud Storage Efficiently</strong> &ndash; Keep your files organized in Google Drive or Dropbox for easy access anytime.</li>\r\n	<br />\r\n	<li>&nbsp;</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp; &nbsp;</p>\r\n\r\n<h2>Learning Tips</h2>\r\n\r\n<ul><br />\r\n	<li><strong>Learn by Teaching</strong> &ndash; If you can explain it to others, you truly understand it</li>\r\n	<br />\r\n	<li><strong>Microlearning</strong> &ndash; Learn in short bursts and stay consistent every day.</li>\r\n	<li><strong>Join Online Communities</strong> &ndash; Platforms like Reddit, Stack Overflow, and Discord are goldmines for insights and support.</li>\r\n	<br />\r\n	<li>&nbsp;</li>\r\n</ul>\r\n\r\n<p>With the right tips and tricks, your daily routine can become more efficient, your goals more achievable, and your life much simpler. Always be open to learning and experimenting &ndash; that&rsquo;s the ultimate trick to success!</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'https://paisaclick.com/public/uploads/blog/1744957243_db3bac7536540d096f11.png', 'Personal Loan', 'draft', NULL, '2025-03-22 18:57:28', '2025-04-18 06:52:16'),
(2, 'Explore the most practical passive income', 'second', 'Explore the most practical passive income ideas you can start today with little investment.', '<p>seon</p>\r\n', 'https://paisaclick.com/public/uploads/blog/1744957266_5d1caae780fa56e49e6e.png', 'Personal Loan', 'draft', NULL, '2025-03-22 19:06:58', '2025-04-18 06:21:06'),
(3, 'How to Save Money Effectively', 'how-to-save-money-effectively', 'Learn the best tips and tricks to save money smartly and achieve your financial goals faster', '<p>Learn the best tips and tricks to save money smartly and achieve your financial goals faster</p>\r\n', 'https://paisaclick.com/public/uploads/blog/1744957257_2554dfc639b605339c01.png', 'Home Loan', 'draft', NULL, '2025-04-17 11:12:57', '2025-04-18 06:20:57');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_followups`
--

CREATE TABLE `tbl_followups` (
  `followupId` int(10) UNSIGNED NOT NULL,
  `lead_id` int(10) UNSIGNED NOT NULL,
  `agent_id` int(10) UNSIGNED NOT NULL,
  `followup_date` date NOT NULL,
  `status` enum('pending','completed') DEFAULT 'pending',
  `remarks` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_last_login`
--

CREATE TABLE `tbl_last_login` (
  `id` bigint(20) NOT NULL,
  `userId` bigint(20) NOT NULL,
  `sessionData` varchar(2048) NOT NULL,
  `machineIp` varchar(1024) NOT NULL,
  `userAgent` varchar(128) NOT NULL,
  `agentString` varchar(1024) NOT NULL,
  `platform` varchar(128) NOT NULL,
  `createdDtm` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `tbl_last_login`
--

INSERT INTO `tbl_last_login` (`id`, `userId`, `sessionData`, `machineIp`, `userAgent`, `agentString`, `platform`, `createdDtm`) VALUES
(1, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\",\"isAdmin\":\"1\"}', '::1', 'Chrome 99.0.4844.84', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.84 Safari/537.36', 'Windows 7', '2022-04-04 22:19:07'),
(2, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\",\"isAdmin\":\"1\"}', '::1', 'Chrome 102.0.0.0', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', 'Windows 7', '2022-06-17 01:33:45'),
(3, 14, '{\"role\":\"11\",\"roleText\":\"Project Manager L6\",\"name\":\"Pml6\",\"isAdmin\":\"2\"}', '::1', 'Chrome 102.0.0.0', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', 'Windows 7', '2022-06-17 01:35:50'),
(4, 14, '{\"role\":\"11\",\"roleText\":\"Project Manager L6\",\"name\":\"Pml6\",\"isAdmin\":\"2\"}', '::1', 'Chrome 102.0.0.0', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', 'Windows 7', '2022-06-17 01:36:25'),
(5, 14, '{\"role\":\"11\",\"roleText\":\"Project Manager L6\",\"name\":\"Pml6\",\"isAdmin\":\"2\"}', '::1', 'Chrome 102.0.0.0', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', 'Windows 7', '2022-06-17 02:06:57'),
(6, 14, '{\"role\":\"11\",\"roleText\":\"Project Manager L6\",\"name\":\"Pml6\",\"isAdmin\":\"2\"}', '::1', 'Chrome 102.0.0.0', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', 'Windows 7', '2022-06-17 02:08:21'),
(7, 14, '{\"role\":\"11\",\"roleText\":\"Project Manager L6\",\"name\":\"Pml6\",\"isAdmin\":\"2\"}', '::1', 'Chrome 102.0.0.0', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', 'Windows 7', '2022-06-17 02:16:40'),
(8, 14, '{\"role\":\"11\",\"roleText\":\"Project Manager L6\",\"name\":\"Pml6\",\"isAdmin\":\"2\"}', '::1', 'Chrome 102.0.0.0', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', 'Windows 7', '2022-06-17 02:17:26'),
(9, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\",\"isAdmin\":\"1\"}', '::1', 'Chrome 102.0.0.0', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', 'Windows 7', '2022-06-17 02:30:21'),
(10, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\",\"isAdmin\":\"1\"}', '::1', 'Chrome 102.0.0.0', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', 'Windows 7', '2022-06-17 02:30:39'),
(11, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\",\"isAdmin\":\"1\"}', '::1', 'Chrome 102.0.0.0', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', 'Windows 7', '2022-06-17 23:49:29'),
(12, 14, '{\"role\":\"11\",\"roleText\":\"Project Manager L6\",\"name\":\"Pml6\",\"isAdmin\":\"2\"}', '::1', 'Chrome 102.0.0.0', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', 'Windows 7', '2022-06-18 01:41:39'),
(13, 14, '{\"role\":\"12\",\"roleText\":\"Data Entry Operator\",\"name\":\"Pml6\",\"isAdmin\":\"2\"}', '::1', 'Chrome 102.0.0.0', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', 'Windows 7', '2022-06-18 01:42:38'),
(14, 14, '{\"role\":\"12\",\"roleText\":\"Data Entry Operator\",\"name\":\"Pml6\",\"isAdmin\":\"2\"}', '::1', 'Chrome 102.0.0.0', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', 'Windows 7', '2022-06-18 01:51:18'),
(15, 14, '{\"role\":\"12\",\"roleText\":\"Data Entry Operator\",\"name\":\"Pml6\",\"isAdmin\":\"2\"}', '::1', 'Chrome 102.0.0.0', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', 'Windows 7', '2022-06-18 01:54:04'),
(16, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\",\"isAdmin\":\"1\"}', '::1', 'Chrome 102.0.0.0', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', 'Windows 7', '2022-06-18 02:15:01'),
(17, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\",\"isAdmin\":\"1\"}', '::1', 'Chrome 102.0.0.0', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', 'Windows 7', '2022-06-18 23:52:14'),
(18, 14, '{\"role\":\"12\",\"roleText\":\"Data Entry Operator\",\"name\":\"Pml6\",\"isAdmin\":\"2\"}', '::1', 'Chrome 102.0.0.0', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', 'Windows 7', '2022-06-18 23:53:41'),
(19, 14, '{\"role\":\"12\",\"roleText\":\"Data Entry Operator\",\"name\":\"Pml6\",\"isAdmin\":\"2\"}', '::1', 'Chrome 102.0.0.0', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', 'Windows 7', '2022-06-18 23:55:24'),
(20, 14, '{\"role\":\"12\",\"roleText\":\"Data Entry Operator\",\"name\":\"Pml6\",\"isAdmin\":\"2\"}', '::1', 'Chrome 102.0.0.0', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', 'Windows 7', '2022-06-18 23:57:25'),
(21, 14, '{\"role\":\"12\",\"roleText\":\"Data Entry Operator\",\"name\":\"Pml6\",\"isAdmin\":\"2\"}', '::1', 'Chrome 102.0.0.0', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', 'Windows 7', '2022-06-19 00:21:13');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_leads`
--

CREATE TABLE `tbl_leads` (
  `leadId` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `mobile` varchar(100) DEFAULT NULL,
  `loan_type` varchar(255) DEFAULT NULL,
  `loan_amount` decimal(10,2) NOT NULL,
  `last_remark` text DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `source` varchar(100) DEFAULT NULL,
  `assigned_to` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_leads`
--

INSERT INTO `tbl_leads` (`leadId`, `name`, `mobile`, `loan_type`, `loan_amount`, `last_remark`, `status`, `source`, `assigned_to`, `created_at`, `updated_at`) VALUES
(1, 'devendra', '8959560347', 'Personal Loan', 50000.00, NULL, 'new', NULL, NULL, '2025-03-19 18:48:02', '2025-03-19 18:48:02'),
(2, 'Banwari', '9039008961', 'Personal Loan', 50000.00, 'document lena 10 march', 'Process', NULL, NULL, '2025-03-19 18:48:19', '2025-04-13 14:27:38'),
(3, 'Devendra dode', '8959560347', 'Business Loan', 0.00, NULL, NULL, NULL, NULL, '2025-04-15 14:08:26', '2025-04-15 14:08:26'),
(4, 'Ganesh ', '8818839162', 'Personal Loan', 0.00, NULL, NULL, NULL, NULL, '2025-04-15 16:28:05', '2025-04-15 16:28:05'),
(5, 'Personal Loan', '8959560347', 'Personal Loan', 0.00, NULL, NULL, NULL, NULL, '2025-04-15 19:35:38', '2025-04-15 19:35:38'),
(6, 'Devendra dode', '8959560347', 'Personal Loan', 0.00, NULL, NULL, NULL, NULL, '2025-04-15 20:03:31', '2025-04-15 20:03:31'),
(7, 'Devendra dode', '8959560347', 'Personal Loan', 0.00, NULL, NULL, NULL, NULL, '2025-04-15 20:05:00', '2025-04-15 20:05:00'),
(8, 'Devendra dode', '8959560347', 'Personal Loan', 0.00, NULL, NULL, NULL, NULL, '2025-04-15 20:07:14', '2025-04-15 20:07:14'),
(9, 'Gggģg87 <script>', '8888888888', 'Education Loan', 0.00, NULL, NULL, NULL, NULL, '2025-04-16 06:35:47', '2025-04-16 06:35:47');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_leads_remarks`
--

CREATE TABLE `tbl_leads_remarks` (
  `id` int(11) NOT NULL,
  `lead_id` int(11) NOT NULL,
  `remark` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_leads_remarks`
--

INSERT INTO `tbl_leads_remarks` (`id`, `lead_id`, `remark`, `created_at`) VALUES
(1, 2, 'kal phone karna bhai', '2025-03-23 07:17:53'),
(2, 2, 'kal phone lagan', '2025-04-13 08:57:11'),
(3, 2, 'document lena 10 march', '2025-04-13 08:57:38');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reset_password`
--

CREATE TABLE `tbl_reset_password` (
  `id` bigint(20) NOT NULL,
  `email` varchar(128) NOT NULL,
  `activation_id` varchar(32) NOT NULL,
  `agent` varchar(512) NOT NULL,
  `client_ip` varchar(32) NOT NULL,
  `isDeleted` tinyint(4) NOT NULL DEFAULT 0,
  `createdBy` bigint(20) NOT NULL DEFAULT 1,
  `createdDtm` datetime NOT NULL,
  `updatedBy` bigint(20) DEFAULT NULL,
  `updatedDtm` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_roles`
--

CREATE TABLE `tbl_roles` (
  `roleId` tinyint(4) NOT NULL COMMENT 'role id',
  `role` varchar(50) NOT NULL COMMENT 'role text',
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `isDeleted` tinyint(4) NOT NULL DEFAULT 0,
  `createdBy` int(11) NOT NULL,
  `createdDtm` datetime NOT NULL,
  `updatedBy` int(11) DEFAULT NULL,
  `updatedDtm` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `tbl_roles`
--

INSERT INTO `tbl_roles` (`roleId`, `role`, `status`, `isDeleted`, `createdBy`, `createdDtm`, `updatedBy`, `updatedDtm`) VALUES
(1, 'System Administrator', 1, 0, 0, '2021-01-21 00:00:00', 1, '2022-06-17 20:21:46'),
(2, 'Customer', 1, 0, 1, '2022-06-17 20:57:22', 1, '2022-06-18 20:50:52');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_seo_metadata`
--

CREATE TABLE `tbl_seo_metadata` (
  `id` int(11) NOT NULL,
  `page_url` varchar(255) NOT NULL,
  `page_name` varchar(255) DEFAULT NULL,
  `page_type` varchar(255) DEFAULT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_description` text DEFAULT NULL,
  `meta_keywords` varchar(255) DEFAULT NULL,
  `og_title` varchar(255) DEFAULT NULL,
  `og_description` text DEFAULT NULL,
  `og_image` varchar(255) DEFAULT NULL,
  `twitter_title` varchar(255) DEFAULT NULL,
  `twitter_description` text DEFAULT NULL,
  `twitter_image` varchar(255) DEFAULT NULL,
  `schema_json` text DEFAULT NULL,
  `canonical_url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_seo_metadata`
--

INSERT INTO `tbl_seo_metadata` (`id`, `page_url`, `page_name`, `page_type`, `meta_title`, `meta_description`, `meta_keywords`, `og_title`, `og_description`, `og_image`, `twitter_title`, `twitter_description`, `twitter_image`, `schema_json`, `canonical_url`, `created_at`, `updated_at`) VALUES
(1, 'https://paisaclick.com/page/privacy-policy', 'Privacy Policy', 'page', 'Privacy Policy', 'Privacy Policy', 'Privacy Policy', 'Privacy Policy', 'Privacy Policy', NULL, 'Privacy Policy', 'Privacy Policy', NULL, NULL, 'http://localhost/lead/page/privacy-policy', '2025-04-13 18:53:01', '2025-04-13 19:54:45'),
(2, 'https://paisaclick.com/service/personal-loan', 'Personal Loan', 'service', 'Personal Loan', 'Personal Loan', 'Personal Loan', 'Personal Loan', 'Personal Loan', NULL, 'Personal Loan', 'Personal Loan', NULL, NULL, 'http://localhost/lead/service/personal-loan', '2025-04-13 18:54:42', '2025-04-13 19:54:52'),
(3, 'https://paisaclick.com/service/home-loan', 'Home Loan', 'service', 'Home Loan', 'Home Loan', 'Home Loan', 'Home Loan', 'Home Loan', NULL, 'Home Loan', 'Home Loan', NULL, NULL, 'https://paisaclick.com/service/home-loan', '2025-04-14 14:10:35', '2025-04-14 14:10:35'),
(4, 'https://paisaclick.com/service/education-loan', 'Education Loan', 'service', 'Education Loan', 'Education Loan', 'Education Loan', 'Education Loan', 'Education Loan', NULL, 'Education Loan', 'Education Loan', NULL, NULL, 'https://paisaclick.com/service/education-loan', '2025-04-14 14:15:17', '2025-04-14 14:15:17'),
(5, 'https://paisaclick.com/service/mortgage-loan', 'Mortgage Loan', 'service', 'Mortgage Loan', 'Mortgage Loan', 'Mortgage Loan', 'Mortgage Loan', 'Mortgage Loan', NULL, 'Mortgage Loan', 'Mortgage Loan', NULL, NULL, 'https://paisaclick.com/service/mortgage-loan', '2025-04-14 14:16:11', '2025-04-14 14:16:11'),
(6, 'https://paisaclick.com/service/business-loan', 'Business Loan', 'service', 'Business Loan', 'Business Loan', 'Business Loan', 'Business Loan', 'Business Loan', NULL, 'Business Loan', 'Business Loan', NULL, NULL, 'https://paisaclick.com/service/business-loan', '2025-04-14 14:17:41', '2025-04-14 14:17:41'),
(7, 'https://paisaclick.com/service/loan-transfer', 'Loan Transfer', 'service', 'Loan Transfer', 'Loan Transfer', 'Loan Transfer', 'Loan Transfer', 'Loan Transfer', NULL, 'Loan Transfer', 'Loan Transfer', NULL, NULL, 'https://paisaclick.com/service/loan-transfer', '2025-04-14 14:19:23', '2025-04-14 14:19:23'),
(8, 'https://paisaclick.com', 'home', 'home', 'home', 'home', 'home', 'home', 'Loan Transfer', NULL, 'Loan Transfer', 'Loan Transfer', NULL, NULL, 'https://paisaclick.com', '2025-04-14 14:19:23', '2025-04-14 14:19:23'),
(9, 'https://paisaclick.com/page/about-us', 'About Us', 'page', 'About Us', 'About Us', 'About Us', 'About Us', 'About Us', NULL, 'About Us', 'About Us', NULL, NULL, 'https://paisaclick.com/page/about-us', '2025-04-14 14:27:57', '2025-04-14 14:27:57'),
(10, 'https://paisaclick.com/page/contact-us', 'Contact us', 'page', 'Contact US', 'Contact US', 'Contact US', 'Contact US', 'Contact US', NULL, 'Contact US', 'Contact US', NULL, NULL, 'https://paisaclick.com/page/contact-us', '2025-04-14 20:25:13', '2025-04-14 20:25:13'),
(11, 'https://paisaclick.com/page/apply-now', 'Apply Now', 'page', 'Apply Now', 'Apply Now', 'Apply Now', 'Apply Now', 'Apply Now', NULL, 'Apply Now', 'Apply Now', NULL, NULL, 'https://paisaclick.com/page/apply-now', '2025-04-15 10:49:38', '2025-04-15 10:49:38'),
(12, 'https://paisaclick.com/blog/how-to-save-money-effectively', 'How to Save Money Effectively', 'blog', 'How to Save Money Effectively', '', '', 'How to Save Money Effectively', '', NULL, 'How to Save Money Effectively', '', NULL, NULL, 'https://paisaclick.com/blog/how-to-save-money-effectively', '2025-04-17 11:12:57', '2025-04-17 11:12:57'),
(13, 'https://paisaclick.com/page/terms-and-conditions', 'Terms and Conditions', 'page', 'Terms and Conditions', '', '', 'Terms and Conditions', '', NULL, 'Terms and Conditions', '', NULL, NULL, 'https://paisaclick.com/page/terms-and-conditions', '2025-04-18 07:21:09', '2025-04-18 07:21:09');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_services`
--

CREATE TABLE `tbl_services` (
  `serviceId` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `short_description` longtext DEFAULT NULL,
  `icon` varchar(100) DEFAULT NULL,
  `details` longtext DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `type` varchar(50) NOT NULL DEFAULT 'page',
  `slug` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_services`
--

INSERT INTO `tbl_services` (`serviceId`, `name`, `short_description`, `icon`, `details`, `status`, `created_at`, `type`, `slug`) VALUES
(1, 'Privacy Policy', 'Privacy Policy', NULL, '<div class=\"container\">\r\n<h3>Privacy Policy</h3>\r\n\r\n<hr />\r\n<p>At <strong>PaisaClick Finance</strong>, we understand that privacy is important to our customers. We are committed to protecting and respecting your privacy. This privacy policy outlines how we collect, use, and safeguard your personal information when you visit our website or use our services. By using our services, you agree to the collection and use of information in accordance with this policy.</p>\r\n\r\n<p>1. <strong>Information Collection</strong></p>\r\n\r\n<p>We collect personal information in several ways:</p>\r\n\r\n<ul>\r\n	<li>\r\n	<p><strong>Direct Information:</strong> We collect personal details such as your name, email address, phone number, and other information provided directly by you when you register, apply for a loan, or contact us.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Indirect Information:</strong> When you visit our website, we may collect non-personal information such as browser type, IP address, and browsing behavior to improve our services.</p>\r\n	</li>\r\n</ul>\r\n\r\n<p>2. <strong>How We Use Your Information</strong></p>\r\n\r\n<p>We use your information to provide you with the best possible services, including:</p>\r\n\r\n<ul>\r\n	<li>\r\n	<p>Processing loan applications</p>\r\n	</li>\r\n	<li>\r\n	<p>Sending important updates and notifications about your loan status</p>\r\n	</li>\r\n	<li>\r\n	<p>Offering customer support</p>\r\n	</li>\r\n	<li>\r\n	<p>Improving and customizing our website and services</p>\r\n	</li>\r\n	<li>\r\n	<p>Sending promotional content and offers (with your consent)</p>\r\n	</li>\r\n</ul>\r\n\r\n<p>3. <strong>Cookies</strong></p>\r\n\r\n<p>Our website uses cookies to enhance your browsing experience. Cookies are small files placed on your device that help us remember your preferences and improve website performance. You can manage cookie settings through your browser, but please note that disabling cookies may affect your experience on our site.</p>\r\n\r\n<p>4. <strong>Third-Party Service Providers</strong></p>\r\n\r\n<p>We may share your information with trusted third-party vendors to help us provide our services. These third-party providers include:</p>\r\n\r\n<ul>\r\n	<li>\r\n	<p><strong>Payment processors</strong> who handle transactions</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Email services</strong> to send updates and marketing materials</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Loan partner companies</strong> that may assist in processing your loan applications</p>\r\n	</li>\r\n</ul>\r\n\r\n<p>All third-party providers are required to maintain the confidentiality and security of your personal information.</p>\r\n\r\n<p>5. <strong>Data Security</strong></p>\r\n\r\n<p>We take reasonable precautions to protect your personal information from unauthorized access, disclosure, or alteration. We use secure protocols and encryption methods to safeguard sensitive data during transmission and storage.</p>\r\n\r\n<p>6. <strong>Your Rights</strong></p>\r\n\r\n<p>You have the right to:</p>\r\n\r\n<ul>\r\n	<li>\r\n	<p><strong>Access:</strong> You may request a copy of the personal data we hold about you.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Correction:</strong> You can request corrections to any inaccurate or incomplete data.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Deletion:</strong> You have the right to request the deletion of your data under certain circumstances.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Opt-out:</strong> You can opt-out of receiving marketing emails or updates at any time.</p>\r\n	</li>\r\n</ul>\r\n\r\n<p>To exercise any of these rights, please contact us at <strong>paisaclick1@gmail.com</strong>.</p>\r\n\r\n<p>7. <strong>Children’s Privacy</strong></p>\r\n\r\n<p>Our services are not intended for children under the age of 18, and we do not knowingly collect personal information from minors. If you believe we have inadvertently collected such data, please contact us immediately to have it removed.</p>\r\n\r\n<p>8. <strong>Changes to This Privacy Policy</strong></p>\r\n\r\n<p>We may update this privacy policy from time to time to reflect changes in our practices, legal requirements, or services. We encourage you to review this policy periodically to stay informed about how we are protecting your data.</p>\r\n\r\n<p>9. <strong>Contact Us</strong></p>\r\n\r\n<p>If you have any questions or concerns about this privacy policy or our practices, please feel free to contact us:</p>\r\n\r\n<p>???? <strong>Phone:</strong> +91 831 9242 411 ???? <strong>Email:</strong> paisaclick1@gmail.com</p>\r\n</div>\r\n', 'active', '2025-04-13 18:53:01', 'SidePage', 'privacy-policy'),
(2, 'Personal Loan', 'Personal Loan', 'fas fa-rupee-sign fa-2x', '<div class=\"container my-5\">\n  <section class=\"hero-section\">\n    <h2>Get Instant Personal Loan with Low Interest</h2>\n    <p>Up to ₹25 Lakhs | Instant Approval | No Collateral</p>\n    <a href=\"javascript:void(0)\" class=\"cta-btn open-loan-modal\">Apply Now</a>\n  </section>\n\n  <section class=\"features\">\n    <div>\n      <h3>Loan Amount</h3>\n      <p>Up to ₹25 Lakhs</p>\n    </div>\n    <div>\n      <h3>Interest Rate</h3>\n      <p>Starting from 10.99% p.a.</p>\n    </div>\n    <div>\n      <h3>No Collateral</h3>\n      <p>Loan without any security required</p>\n    </div>\n    <div>\n      <h3>Approval Time</h3>\n      <p>Instant approval within minutes</p>\n    </div>\n  </section>\n\n  <section class=\"eligibility\">\n    <div>\n      <h3>Age</h3>\n      <p>21 to 60 years</p>\n    </div>\n    <div>\n      <h3>Income</h3>\n      <p>₹15,000/month (minimum)</p>\n    </div>\n    <div>\n      <h3>Credit Score</h3>\n      <p>Preferably 700+</p>\n    </div>\n  </section>\n\n  <section class=\"documents\">\n    <div>\n      <h3>Required Documents</h3>\n      <ul>\n        <li>Aadhaar card</li>\n        <li>PAN card</li>\n        <li>Salary slips / Bank statements</li>\n        <li>Passport-size photo</li>\n      </ul>\n    </div>\n  </section>\n\n  <section class=\"rates\">\n    <h3>Interest Rates & Charges</h3>\n    <table class=\"rates-table\">\n      <thead>\n        <tr>\n          <th>Particulars</th>\n          <th>Details</th>\n        </tr>\n      </thead>\n      <tbody>\n        <tr>\n          <td>Interest Rate</td>\n          <td>Starting at 10.99% p.a.</td>\n        </tr>\n        <tr>\n          <td>Processing Fee</td>\n          <td>1% – 3% of loan amount</td>\n        </tr>\n        <tr>\n          <td>Late Payment Charges</td>\n          <td>₹500 – ₹1000</td>\n        </tr>\n        <tr>\n          <td>Pre-closure Charges</td>\n          <td>Nil after 6 months</td>\n        </tr>\n      </tbody>\n    </table>\n  </section>\n\n  <section class=\"cta-section\">\n    <h3>Apply for Your Personal Loan Now</h3>\n    <p>Quick approval, easy steps, and secure process.</p>\n    <a href=\"/apply-now\" class=\"cta-btn\">Apply Now</a>\n  </section>\n\n  <section class=\"faq-section\">\n    <h3>Frequently Asked Questions</h3>\n    <div class=\"faq-item\">\n      <h4>What is the maximum loan amount?</h4>\n      <p>You can borrow up to ₹25 Lakhs for a personal loan.</p>\n    </div>\n    <div class=\"faq-item\">\n      <h4>Can I foreclose my loan early?</h4>\n      <p>Yes, you can foreclose your loan after 6 months without any penalty.</p>\n    </div>\n    <div class=\"faq-item\">\n      <h4>Is a guarantor required?</h4>\n      <p>No, a guarantor is not required for personal loans.</p>\n    </div>\n  </section>\n</div>\n', 'active', '2025-04-13 18:54:42', 'Loan', 'personal-loan'),
(3, 'Personal Loan', '<div class=\"col-lg-8\">\r\n    <h1 class=\"display-4 mb-3 fw-bold fs-1\">\r\n        <span class=\"text1\">Empowering Your</span><br>\r\n        <span style=\"color: #2629ff;\">Personal</span> <span class=\"text3\" style=\"color: #6984ff;\">Loan Journey</span>\r\n    </h1>\r\n    <p class=\"h5 mb-4 fs-5\">Get Instant Personal Loan Solutions Tailored for Your Dreams and Financial Freedom</p>\r\n    <a href=\"/service/personal-loan\" class=\"btn btn-primary btn-lg rainbow\" >Know More</a>\r\n</div>\r\n', 'https://paisaclick.com/public/uploads/homeBanner/1744639474_48bc94fe186497b26560.png', '<h1>Empowering Your<br />\r\nPersonal Loan Journey</h1>\r\n\r\n<p>Get Instant Personal Loan Solutions Tailored for Your Dreams and Financial Freedom</p>\r\n\r\n<p><a href=\"personal-loan\">Know More</a></p>\r\n', 'active', '2025-04-14 14:04:34', 'HomeBanner', NULL),
(4, 'Business Loan', '<div class=\"col-lg-8\">\r\n    <h1 class=\"display-4 mb-3 fw-bold fs-1\">\r\n        <span class=\"text1\">Fueling Your</span><br>\r\n        <span style=\"color: #2629ff;\">Business</span> <span class=\"text3\" style=\"color: #6984ff;\">Aspirations</span>\r\n    </h1>\r\n    <p class=\"h5 mb-4 fs-5\">Get Smart Business Loan Solutions to Power Growth, Expansion, and Innovation</p>\r\n    <a href=\"/service/business-loan\" class=\"btn btn-primary btn-lg rainbow\" >Know More</a>\r\n</div>\r\n', 'https://paisaclick.com/public/uploads/homeBanner/1744639537_76f05cf19a15823c1b93.png', '<h1>Fueling Your<br />\r\nBusiness Aspirations</h1>\r\n\r\n<p>Get Smart Business Loan Solutions to Power Growth, Expansion, and Innovation</p>\r\n\r\n<p><a href=\"business-loan\">Know More</a></p>\r\n', 'active', '2025-04-14 14:05:37', 'HomeBanner', NULL),
(5, 'Home Loan', '<div class=\"col-lg-8\">\r\n    <h1 class=\"display-4 mb-3 fw-bold fs-1\">\r\n        <span class=\"text1\">Building Your</span><br>\r\n        <span style=\"color: #2629ff;\">Dream</span> <span class=\"text3\" style=\"color: #6984ff;\">Home</span>\r\n    </h1>\r\n    <p class=\"h5 mb-4 fs-5\">Explore Affordable Home Loan Options to Turn Your Dream Home Into Reality</p>\r\n    <a href=\"/service/home-loan\" class=\"btn btn-primary btn-lg rainbow\">Know More</a>\r\n</div>\r\n', 'https://paisaclick.com/public/uploads/homeBanner/1744639600_8198c3d857d0c6f67107.png', '<h1>Building Your<br />\r\nDream Home</h1>\r\n\r\n<p>Explore Affordable Home Loan Options to Turn Your Dream Home Into Reality</p>\r\n\r\n<p><a href=\"home-loan\">Know More</a></p>\r\n', 'active', '2025-04-14 14:06:40', 'HomeBanner', NULL),
(6, 'Education Loan', '<div class=\"col-lg-8\">\r\n    <h1 class=\"display-4 mb-3 fw-bold fs-1\">\r\n        <span class=\"text1\">Investing in Your</span><br>\r\n        <span style=\"color: #2629ff;\">Future</span> <span class=\"text3\" style=\"color: #6984ff;\">Education</span>\r\n    </h1>\r\n    <p class=\"h5 mb-4 fs-5\">Unlock the Path to Higher Education with Flexible and Affordable Education Loan Solutions</p>\r\n    <a href=\"/service/education-loan\" class=\"btn btn-primary btn-lg rainbow\">Know More</a>\r\n</div>\r\n', 'https://paisaclick.com/public/uploads/homeBanner/1744639643_c5040ed6215eedeac01f.png', '<h1>Investing in Your<br />\r\nFuture Education</h1>\r\n\r\n<p>Unlock the Path to Higher Education with Flexible and Affordable Education Loan Solutions</p>\r\n\r\n<p><a href=\"education-loan\">Know More</a></p>\r\n', 'active', '2025-04-14 14:07:23', 'HomeBanner', NULL),
(7, 'Mortgage Loan', '<div class=\"col-lg-8\">\r\n    <h1 class=\"display-4 mb-3 fw-bold fs-1\">\r\n        <span class=\"text1\">Unlock the Value of Your</span><br>\r\n        <span style=\"color: #2629ff;\">Property</span> <span class=\"text3\" style=\"color: #6984ff;\">with Confidence</span>\r\n    </h1>\r\n    <p class=\"h5 mb-4 fs-5\">Secure Funds with Ease Through Trusted Mortgage Loan Solutions Tailored to Your Needs</p>\r\n    <a href=\"/service/mortgage-loan\" class=\"btn btn-primary btn-lg rainbow\">Know More</a>\r\n</div>\r\n', 'https://paisaclick.com/public/uploads/homeBanner/1744639714_be2964721b8f78269e1d.png', '<h1>Unlock the Value of Your<br />\r\nProperty with Confidence</h1>\r\n\r\n<p>Secure Funds with Ease Through Trusted Mortgage Loan Solutions Tailored to Your Needs</p>\r\n\r\n<p><a href=\"mortgage-loan\">Know More</a></p>\r\n', 'active', '2025-04-14 14:08:34', 'HomeBanner', NULL),
(8, 'Home Loan', 'Home Loan', 'fas fa-home fa-2x ', '<div class=\"container my-5\">\r\n    <section class=\"hero-section\">\r\n        <h2>Get Affordable Home Loan with Low EMIs</h2>\r\n        <p>Up to ₹5 Crores | Low Interest Rates | Long Tenure Options</p>\r\n       <a href=\"javascript:void(0)\" class=\"cta-btn open-loan-modal\">Apply Now</a>\r\n    </section>\r\n\r\n    <section class=\"features\">\r\n        <div>\r\n            <h3>Loan Amount</h3>\r\n            <p>Up to ₹5 Crores</p>\r\n        </div>\r\n        <div>\r\n            <h3>Interest Rate</h3>\r\n            <p>Starting from 8.50% p.a.</p>\r\n        </div>\r\n        <div>\r\n            <h3>Loan Tenure</h3>\r\n            <p>Up to 30 years</p>\r\n        </div>\r\n        <div>\r\n            <h3>Approval Time</h3>\r\n            <p>Approval within 3–5 working days</p>\r\n        </div>\r\n    </section>\r\n\r\n    <section class=\"eligibility\">\r\n        <div>\r\n            <h3>Age</h3>\r\n            <p>21 to 65 years</p>\r\n        </div>\r\n        <div>\r\n            <h3>Income</h3>\r\n            <p>Stable monthly income (₹25,000+ preferred)</p>\r\n        </div>\r\n        <div>\r\n            <h3>Credit Score</h3>\r\n            <p>Preferably 750+</p>\r\n        </div>\r\n    </section>\r\n\r\n    <section class=\"documents\">\r\n        <div>\r\n            <h3>Required Documents</h3>\r\n            <ul>\r\n                <li>Identity Proof (Aadhaar/PAN/Passport)</li>\r\n                <li>Address Proof</li>\r\n                <li>Salary slips / Income Proof</li>\r\n                <li>Property documents</li>\r\n                <li>Bank statements (last 6 months)</li>\r\n            </ul>\r\n        </div>\r\n    </section>\r\n\r\n    <section class=\"rates\">\r\n        <h3>Interest Rates & Charges</h3>\r\n        <table class=\"rates-table\">\r\n            <thead>\r\n                <tr>\r\n                    <th>Particulars</th>\r\n                    <th>Details</th>\r\n                </tr>\r\n            </thead>\r\n            <tbody>\r\n                <tr>\r\n                    <td>Interest Rate</td>\r\n                    <td>Starting at 8.50% p.a.</td>\r\n                </tr>\r\n                <tr>\r\n                    <td>Processing Fee</td>\r\n                    <td>Up to 1% of loan amount</td>\r\n                </tr>\r\n                <tr>\r\n                    <td>Prepayment Charges</td>\r\n                    <td>Nil for floating rate loans</td>\r\n                </tr>\r\n                <tr>\r\n                    <td>Late Payment Charges</td>\r\n                    <td>₹500 – ₹2000</td>\r\n                </tr>\r\n            </tbody>\r\n        </table>\r\n    </section>\r\n\r\n    <section class=\"cta-section\">\r\n        <h3>Apply for Your Home Loan Today</h3>\r\n        <p>Lowest rates, transparent process, and expert support.</p>\r\n        <a href=\"/apply-now\">Apply Now</a>\r\n    </section>\r\n\r\n    <section class=\"faq-section\">\r\n        <h3>Frequently Asked Questions</h3>\r\n        <div class=\"faq-item\">\r\n            <h4>What is the maximum home loan I can get?</h4>\r\n            <p>You can get a loan of up to ₹5 Crores depending on your eligibility.</p>\r\n        </div>\r\n        <div class=\"faq-item\">\r\n            <h4>Can I apply jointly with a family member?</h4>\r\n            <p>Yes, you can apply with your spouse or other family member to increase loan eligibility.</p>\r\n        </div>\r\n        <div class=\"faq-item\">\r\n            <h4>Is prepayment allowed?</h4>\r\n            <p>Yes, prepayment is allowed and free of charge for floating rate home loans.</p>\r\n        </div>\r\n    </section>\r\n</div>\r\n', 'active', '2025-04-14 14:10:35', 'Loan', 'home-loan'),
(9, 'Education Loan', 'Education Loan', 'fas fa-graduation-cap fa-2x', '<div class=\"container my-5\">\r\n    <section class=\"hero-section\">\r\n        <h2>Get Easy Education Loan for Your Bright Future</h2>\r\n        <p>Up to ₹50 Lakhs | Quick Processing | Flexible Repayment</p>\r\n       <a href=\"javascript:void(0)\" class=\"cta-btn open-loan-modal\">Apply Now</a>\r\n    </section>\r\n\r\n    <section class=\"features\">\r\n        <div>\r\n            <h3>Loan Amount</h3>\r\n            <p>Up to ₹50 Lakhs</p>\r\n        </div>\r\n        <div>\r\n            <h3>Interest Rate</h3>\r\n            <p>Starting from 9.00% p.a.</p>\r\n        </div>\r\n        <div>\r\n            <h3>Moratorium Period</h3>\r\n            <p>Up to 1 year after course completion</p>\r\n        </div>\r\n        <div>\r\n            <h3>Repayment Tenure</h3>\r\n            <p>Up to 15 years</p>\r\n        </div>\r\n    </section>\r\n\r\n    <section class=\"eligibility\">\r\n        <div>\r\n            <h3>Age</h3>\r\n            <p>18 to 35 years</p>\r\n        </div>\r\n        <div>\r\n            <h3>Course</h3>\r\n            <p>Should be in a recognized institution (India or Abroad)</p>\r\n        </div>\r\n        <div>\r\n            <h3>Co-applicant</h3>\r\n            <p>Generally required (Parent/Guardian)</p>\r\n        </div>\r\n    </section>\r\n\r\n    <section class=\"documents\">\r\n        <div>\r\n            <h3>Required Documents</h3>\r\n            <ul>\r\n                <li>Admission Letter</li>\r\n                <li>Fee Structure of Institution</li>\r\n                <li>Academic Records</li>\r\n                <li>Identity & Address Proof</li>\r\n                <li>Co-applicant\'s Income Proof</li>\r\n            </ul>\r\n        </div>\r\n    </section>\r\n\r\n    <section class=\"rates\">\r\n        <h3>Interest Rates & Charges</h3>\r\n        <table class=\"rates-table\">\r\n            <thead>\r\n                <tr>\r\n                    <th>Particulars</th>\r\n                    <th>Details</th>\r\n                </tr>\r\n            </thead>\r\n            <tbody>\r\n                <tr>\r\n                    <td>Interest Rate</td>\r\n                    <td>Starting at 9.00% p.a.</td>\r\n                </tr>\r\n                <tr>\r\n                    <td>Processing Fee</td>\r\n                    <td>Up to 1.5% of loan amount</td>\r\n                </tr>\r\n                <tr>\r\n                    <td>Prepayment Charges</td>\r\n                    <td>Nil</td>\r\n                </tr>\r\n                <tr>\r\n                    <td>Late Payment Charges</td>\r\n                    <td>₹500 – ₹1500</td>\r\n                </tr>\r\n            </tbody>\r\n        </table>\r\n    </section>\r\n\r\n    <section class=\"cta-section\">\r\n        <h3>Apply for an Education Loan Now</h3>\r\n        <p>Support your dreams with affordable student loans and flexible options.</p>\r\n        <a href=\"/apply-now\">Apply Now</a>\r\n    </section>\r\n\r\n    <section class=\"faq-section\">\r\n        <h3>Frequently Asked Questions</h3>\r\n        <div class=\"faq-item\">\r\n            <h4>What expenses are covered?</h4>\r\n            <p>Tuition fees, books, hostel charges, travel, and other education-related costs.</p>\r\n        </div>\r\n        <div class=\"faq-item\">\r\n            <h4>Can I apply for foreign education?</h4>\r\n            <p>Yes, education loans are available for both domestic and international courses.</p>\r\n        </div>\r\n        <div class=\"faq-item\">\r\n            <h4>When do I start repayment?</h4>\r\n            <p>Repayment starts after course completion plus the moratorium period (usually 6–12 months).</p>\r\n        </div>\r\n    </section>\r\n</div>\r\n', 'active', '2025-04-14 14:15:17', 'Loan', 'education-loan'),
(10, 'Mortgage Loan', 'Mortgage Loan', 'fas fa-university fa-2x', '<div class=\"container my-5\">\r\n    <section class=\"hero-section\">\r\n        <h2>Apply for a Mortgage Loan with Attractive Rates</h2>\r\n        <p>Loan Against Property | Up to ₹5 Crores | Quick Processing</p>\r\n       <a href=\"javascript:void(0)\" class=\"cta-btn open-loan-modal\">Apply Now</a>\r\n    </section>\r\n\r\n    <section class=\"features\">\r\n        <div>\r\n            <h3>Loan Amount</h3>\r\n            <p>Up to ₹5 Crores</p>\r\n        </div>\r\n        <div>\r\n            <h3>Interest Rate</h3>\r\n            <p>Starting from 9.50% p.a.</p>\r\n        </div>\r\n        <div>\r\n            <h3>Loan Tenure</h3>\r\n            <p>Up to 15 years</p>\r\n        </div>\r\n        <div>\r\n            <h3>Loan Type</h3>\r\n            <p>Residential or commercial property mortgage</p>\r\n        </div>\r\n    </section>\r\n\r\n    <section class=\"eligibility\">\r\n        <div>\r\n            <h3>Age</h3>\r\n            <p>25 to 65 years</p>\r\n        </div>\r\n        <div>\r\n            <h3>Income</h3>\r\n            <p>Minimum ₹25,000/month</p>\r\n        </div>\r\n        <div>\r\n            <h3>Property Ownership</h3>\r\n            <p>Should be owned by the applicant or co-applicant</p>\r\n        </div>\r\n    </section>\r\n\r\n    <section class=\"documents\">\r\n        <div>\r\n            <h3>Required Documents</h3>\r\n            <ul>\r\n                <li>KYC documents (Aadhaar, PAN)</li>\r\n                <li>Income proof (ITR, salary slips)</li>\r\n                <li>Property documents with title deed</li>\r\n                <li>Bank statements (last 6 months)</li>\r\n            </ul>\r\n        </div>\r\n    </section>\r\n\r\n    <section class=\"rates\">\r\n        <h3>Interest Rates & Charges</h3>\r\n        <table class=\"rates-table\">\r\n            <thead>\r\n                <tr>\r\n                    <th>Particulars</th>\r\n                    <th>Details</th>\r\n                </tr>\r\n            </thead>\r\n            <tbody>\r\n                <tr>\r\n                    <td>Interest Rate</td>\r\n                    <td>Starting at 9.50% p.a.</td>\r\n                </tr>\r\n                <tr>\r\n                    <td>Processing Fee</td>\r\n                    <td>Up to 2% of loan amount</td>\r\n                </tr>\r\n                <tr>\r\n                    <td>Legal & Valuation Charges</td>\r\n                    <td>As applicable</td>\r\n                </tr>\r\n                <tr>\r\n                    <td>Foreclosure Charges</td>\r\n                    <td>Nil for individual borrowers with floating rate loans</td>\r\n                </tr>\r\n            </tbody>\r\n        </table>\r\n    </section>\r\n\r\n    <section class=\"cta-section\">\r\n        <h3>Get Funds with Your Property – Apply Now</h3>\r\n        <p>Leverage your property value to meet your financial needs quickly and securely.</p>\r\n        <a href=\"/apply-now\">Apply Now</a>\r\n    </section>\r\n\r\n    <section class=\"faq-section\">\r\n        <h3>Frequently Asked Questions</h3>\r\n        <div class=\"faq-item\">\r\n            <h4>What properties are eligible?</h4>\r\n            <p>Residential and commercial properties that are owned and have clear titles.</p>\r\n        </div>\r\n        <div class=\"faq-item\">\r\n            <h4>What is the repayment period?</h4>\r\n            <p>You can choose a tenure of up to 15 years based on your repayment capacity.</p>\r\n        </div>\r\n        <div class=\"faq-item\">\r\n            <h4>Do I need to transfer property ownership?</h4>\r\n            <p>No, you retain ownership. The property is mortgaged as collateral with the lender.</p>\r\n        </div>\r\n    </section>\r\n</div>\r\n', 'active', '2025-04-14 14:16:11', 'Loan', 'mortgage-loan'),
(11, 'Business Loan', 'Business Loan', 'fas fa-briefcase fa-2x', '<div class=\"container my-5\">\r\n    <section class=\"hero-section\">\r\n        <h2>Get Instant Business Loan with Flexible Repayment</h2>\r\n        <p>Up to ₹50 Lakhs | Quick Approval | No Collateral Required</p>\r\n       <a href=\"javascript:void(0)\" class=\"cta-btn open-loan-modal\">Apply Now</a>\r\n    </section>\r\n\r\n    <section class=\"features\">\r\n        <div>\r\n            <h3>Loan Amount</h3>\r\n            <p>Up to ₹50 Lakhs</p>\r\n        </div>\r\n        <div>\r\n            <h3>Interest Rate</h3>\r\n            <p>Starting from 12% p.a.</p>\r\n        </div>\r\n        <div>\r\n            <h3>No Collateral</h3>\r\n            <p>Business loan without any security required</p>\r\n        </div>\r\n        <div>\r\n            <h3>Approval Time</h3>\r\n            <p>Quick approval within 24-48 hours</p>\r\n        </div>\r\n    </section>\r\n\r\n    <section class=\"eligibility\">\r\n        <div>\r\n            <h3>Business Vintage</h3>\r\n            <p>Minimum 1 year of business operation</p>\r\n        </div>\r\n        <div>\r\n            <h3>Annual Turnover</h3>\r\n            <p>Minimum ₹10 Lakhs</p>\r\n        </div>\r\n        <div>\r\n            <h3>Credit Score</h3>\r\n            <p>Preferably 700+</p>\r\n        </div>\r\n    </section>\r\n\r\n    <section class=\"documents\">\r\n        <div>\r\n            <h3>Required Documents</h3>\r\n            <ul>\r\n                <li>PAN card (Individual/Business)</li>\r\n                <li>Aadhaar card</li>\r\n                <li>Business registration proof</li>\r\n                <li>Bank statements (last 6 months)</li>\r\n                <li>GST returns / ITR</li>\r\n            </ul>\r\n        </div>\r\n    </section>\r\n\r\n    <section class=\"rates\">\r\n        <h3>Interest Rates & Charges</h3>\r\n        <table class=\"rates-table\">\r\n            <thead>\r\n                <tr>\r\n                    <th>Particulars</th>\r\n                    <th>Details</th>\r\n                </tr>\r\n            </thead>\r\n            <tbody>\r\n                <tr>\r\n                    <td>Interest Rate</td>\r\n                    <td>Starting at 12% p.a.</td>\r\n                </tr>\r\n                <tr>\r\n                    <td>Processing Fee</td>\r\n                    <td>2% – 3% of loan amount</td>\r\n                </tr>\r\n                <tr>\r\n                    <td>Late Payment Charges</td>\r\n                    <td>₹500 – ₹1500</td>\r\n                </tr>\r\n                <tr>\r\n                    <td>Pre-closure Charges</td>\r\n                    <td>Nil after 6 months</td>\r\n                </tr>\r\n            </tbody>\r\n        </table>\r\n    </section>\r\n\r\n    <section class=\"cta-section\">\r\n        <h3>Apply for Your Business Loan Now</h3>\r\n        <p>Fast processing, minimal paperwork, and secure approval process.</p>\r\n        <a href=\"/apply-now\">Apply Now</a>\r\n    </section>\r\n\r\n    <section class=\"faq-section\">\r\n        <h3>Frequently Asked Questions</h3>\r\n        <div class=\"faq-item\">\r\n            <h4>How much loan can I get for my business?</h4>\r\n            <p>You can get up to ₹50 Lakhs based on eligibility and financials.</p>\r\n        </div>\r\n        <div class=\"faq-item\">\r\n            <h4>Is collateral required for a business loan?</h4>\r\n            <p>No, our business loans are unsecured and do not require any collateral.</p>\r\n        </div>\r\n        <div class=\"faq-item\">\r\n            <h4>When can I pre-close the loan?</h4>\r\n            <p>You can pre-close the loan anytime after 6 months with no extra charges.</p>\r\n        </div>\r\n    </section>\r\n</div>\r\n', 'active', '2025-04-14 14:17:41', 'Loan', 'business-loan'),
(12, 'Loan Transfer', 'Loan Transfer', 'fas fa-exchange-alt fa-2x', '<div class=\"container my-5\">\r\n    <section class=\"hero-section\">\r\n        <h2>Transfer Your Existing Loan & Save More</h2>\r\n        <p>Lower EMIs | Attractive Interest Rates | Quick Process</p>\r\n        <a href=\"/apply-now\" class=\"cta-btn\">Apply Now</a>\r\n    </section>\r\n\r\n    <section class=\"features\">\r\n        <div>\r\n            <h3>Loan Transfer</h3>\r\n            <p>Home Loan, Personal Loan, Business Loan & More</p>\r\n        </div>\r\n        <div>\r\n            <h3>Interest Rate</h3>\r\n            <p>Starting from 8.50% p.a.</p>\r\n        </div>\r\n        <div>\r\n            <h3>EMI Reduction</h3>\r\n            <p>Save on monthly installments</p>\r\n        </div>\r\n        <div>\r\n            <h3>Top-up Facility</h3>\r\n            <p>Eligible for additional loan on transfer</p>\r\n        </div>\r\n    </section>\r\n\r\n    <section class=\"eligibility\">\r\n        <div>\r\n            <h3>Age</h3>\r\n            <p>21 to 65 years</p>\r\n        </div>\r\n        <div>\r\n            <h3>Loan History</h3>\r\n            <p>Minimum 12 EMIs paid on current loan</p>\r\n        </div>\r\n        <div>\r\n            <h3>Credit Score</h3>\r\n            <p>Preferably 700+</p>\r\n        </div>\r\n    </section>\r\n\r\n    <section class=\"documents\">\r\n        <div>\r\n            <h3>Required Documents</h3>\r\n            <ul>\r\n                <li>Previous loan statement</li>\r\n                <li>ID & Address proof (Aadhaar, PAN)</li>\r\n                <li>Income proof (Salary slip/ITR)</li>\r\n                <li>Property documents (if applicable)</li>\r\n            </ul>\r\n        </div>\r\n    </section>\r\n\r\n    <section class=\"rates\">\r\n        <h3>Interest Rates & Charges</h3>\r\n        <table class=\"rates-table\">\r\n            <thead>\r\n                <tr>\r\n                    <th>Particulars</th>\r\n                    <th>Details</th>\r\n                </tr>\r\n            </thead>\r\n            <tbody>\r\n                <tr>\r\n                    <td>Interest Rate</td>\r\n                    <td>Starts from 8.50% p.a.</td>\r\n                </tr>\r\n                <tr>\r\n                    <td>Processing Fee</td>\r\n                    <td>Up to 1% of loan amount</td>\r\n                </tr>\r\n                <tr>\r\n                    <td>Foreclosure Charges</td>\r\n                    <td>Nil (on floating rate loans)</td>\r\n                </tr>\r\n                <tr>\r\n                    <td>Top-up Charges</td>\r\n                    <td>Applicable as per lender\'s policy</td>\r\n                </tr>\r\n            </tbody>\r\n        </table>\r\n    </section>\r\n\r\n    <section class=\"cta-section\">\r\n        <h3>Transfer Your Loan Today & Save Big</h3>\r\n        <p>Switch to better interest rates and reduce your EMIs easily.</p>\r\n        <a href=\"/apply-now\">Apply Now</a>\r\n    </section>\r\n\r\n    <section class=\"faq-section\">\r\n        <h3>Frequently Asked Questions</h3>\r\n        <div class=\"faq-item\">\r\n            <h4>What loans can I transfer?</h4>\r\n            <p>You can transfer home, personal, or business loans depending on your eligibility.</p>\r\n        </div>\r\n        <div class=\"faq-item\">\r\n            <h4>Can I get a top-up on transfer?</h4>\r\n            <p>Yes, top-up loan is available subject to eligibility.</p>\r\n        </div>\r\n        <div class=\"faq-item\">\r\n            <h4>Do I need to inform the current lender?</h4>\r\n            <p>Yes, a foreclosure letter from the current lender is required for processing.</p>\r\n        </div>\r\n    </section>\r\n</div>\r\n', 'active', '2025-04-14 14:19:23', 'Loan', 'loan-transfer'),
(13, 'About Us', '<div class=\"col-lg-8\">\r\n    <h1 class=\"display-4 mb-3 fw-bold fs-1\">\r\n        <span class=\"text1\">Who We Are</span><br>\r\n        <span style=\"color: #2629ff;\">Your Trusted</span> <span class=\"text3\" style=\"color: #6984ff;\">Loan Partner</span>\r\n    </h1>\r\n    <p class=\"h5 mb-4 fs-5\">\r\n        We are a team of finance professionals dedicated to helping individuals and businesses meet their goals with the right loan solutions. With transparency, trust, and expert support, we make borrowing simple and stress-free — every step of the way.\r\n    </p>\r\n    <a href=\"page/about-us\" class=\"btn btn-primary btn-lg\" style=\"background: #243771;\">Learn More</a>\r\n</div>\r\n', NULL, '  <div class=\"container\">\r\n    <h1><i class=\"fas fa-circle-info \"></i> About Us</h1>\r\n    <p><strong>Welcome to PaisaClick!</strong></p>\r\n\r\n    <p>PaisaClick is India’s emerging digital platform dedicated to simplifying the loan search and application process for individuals and businesses. We partner with multiple verified financial institutions to offer you a wide range of loan products — all under one roof.</p>\r\n\r\n    <h2><i class=\"fas fa-globe \"></i> What We Do</h2>\r\n    <p>Our goal is to help users compare, select, and apply for the best loan options from trusted vendors. Whether you need funds for personal needs, education, business expansion, or buying a home, PaisaClick brings you one step closer to achieving your financial goals.</p>\r\n\r\n    <h2><i class=\"fas fa-list-ul \"></i> Types of Loans We Facilitate</h2>\r\n    <ul>\r\n      <li><i class=\"fas fa-check-circle icon\"></i> Personal Loans</li>\r\n      <li><i class=\"fas fa-check-circle icon\"></i> Education Loans</li>\r\n      <li><i class=\"fas fa-check-circle icon\"></i> Business Loans</li>\r\n      <li><i class=\"fas fa-check-circle icon\"></i> Mortgage/Home Loans</li>\r\n      <li><i class=\"fas fa-check-circle icon\"></i> Car & Vehicle Loans</li>\r\n      <li><i class=\"fas fa-check-circle icon\"></i> Other customized loan offers</li>\r\n    </ul>\r\n\r\n    <h2><i class=\"fas fa-bullseye \"></i> Our Mission</h2>\r\n    <p>To provide a <strong>transparent, quick, and hassle-free</strong> loan discovery experience by combining technology with financial partnerships.</p>\r\n\r\n    <h2><i class=\"fas fa-shield-alt \"></i> Why Trust PaisaClick?</h2>\r\n    <ul>\r\n      <li><i class=\"fas fa-check icon\"></i> 100% secure and verified partner lenders</li>\r\n      <li><i class=\"fas fa-check icon\"></i> No hidden charges</li>\r\n      <li><i class=\"fas fa-check icon\"></i> Instant eligibility check</li>\r\n      <li><i class=\"fas fa-check icon\"></i> User-friendly loan comparison tools</li>\r\n      <li><i class=\"fas fa-check icon\"></i> Support at every step of the process</li>\r\n    </ul>\r\n\r\n    <h2><i class=\"fas fa-map-marker-alt \"></i> Where Are We Based?</h2>\r\n    <p>PaisaClick operates digitally and serves customers PAN India. We’re constantly expanding our network to onboard new lenders and offer you the best loan deals available in your city.</p>\r\n\r\n    <h2><i class=\"fas fa-envelope \"></i> Get in Touch</h2>\r\n    <p>Need help? Have questions? We’re just a click away.</p>\r\n    <ul>\r\n      <li><strong><i class=\"fas fa-envelope icon\"></i> Email:</strong> support@paisaclick.com</li>\r\n      <li><strong><i class=\"fas fa-link icon\"></i> Website:</strong> <a href=\"https://paisaclick.com\" target=\"_blank\">https://paisaclick.com</a></li>\r\n    </ul>\r\n\r\n    <p>Thank you for choosing <strong>PaisaClick</strong> – Your trusted loan partner! <i class=\"fas fa-money-bill-wave\"></i></p>\r\n  </div>', 'active', '2025-04-14 14:27:57', 'MainPage', 'about-us'),
(14, 'We provide all types of loans – Home, Business, Personal, Education, Mortgage & Loan Transfer | सभी प्रकार के लोन उपलब्ध – होम, बिज़नेस, पर्सनल, एजुकेशन, मॉर्गेज और लोन ट्रांसफर की सुविधाएं!', NULL, NULL, NULL, 'active', '2025-04-14 14:36:19', 'HomeTextSlider', NULL),
(15, 'Contact us', 'contact us', NULL, '<div class=\"container\">\r\n<h3>Contact Us</h3>\r\n<hr>  \r\n\r\n<p>We&rsquo;d love to hear from you! Whether you have a question, need assistance with your loan application, or want to learn more about our services, we&rsquo;re just a call or email away.</p>\r\n\r\n<p>1. <strong>How to Reach Us</strong></p>\r\n\r\n<p>You can get in touch with us through the following methods:</p>\r\n\r\n<ul>\r\n	<li>\r\n	<p><strong>Phone:</strong> \r\n	???? <strong>+91 831 9242 411</strong> \r\n	Feel free to call us for any queries, assistance with loan applications, or general information.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Email:</strong> \r\n	???? <strong>paisaclick1@gmail.com</strong> \r\n	If you prefer writing to us, send an email to the above address, and our team will get back to you promptly.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Online Inquiry Form:</strong> \r\n	For a faster response, you can fill out our online inquiry form <a href=\"#\">here</a>. Provide your details, and our team will reach out to you with the information you need.</p>\r\n	</li>\r\n</ul>\r\n\r\n<p>2. <strong>Our Office Location</strong></p>\r\n\r\n<p>We welcome you to visit us at our office location. Our team is ready to assist you personally:</p>\r\n\r\n<p>???? <strong>PaisaClick Finance</strong> \r\n[Your Office Address] \r\n[City, State, PIN Code]</p>\r\n\r\n<p>Please schedule an appointment by calling or emailing us in advance to ensure that the right team member is available to meet with you.</p>\r\n\r\n<p>3. <strong>Working Hours</strong></p>\r\n\r\n<p>Our team is available to assist you during the following business hours:</p>\r\n\r\n<ul>\r\n	<li>\r\n	<p><strong>Monday to Friday:</strong> 9:00 AM &ndash; 6:00 PM</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Saturday:</strong> 10:00 AM &ndash; 4:00 PM</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Sunday:</strong> Closed</p>\r\n	</li>\r\n</ul>\r\n\r\n<p>4. <strong>Why Contact Us?</strong></p>\r\n\r\n<p>We&rsquo;re here for you every step of the way. Whether you have questions regarding:</p>\r\n\r\n<ul>\r\n	<li>\r\n	<p><strong>Loan Applications:</strong> Get expert guidance on loan eligibility, documentation, and the application process.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Loan Products:</strong> Inquire about the types of loans we offer &mdash; from personal loans to business loans, and more.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Customer Support:</strong> Need help with your existing loan? Our team is here to assist with any issues, questions, or support you require.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>General Inquiries:</strong> Learn more about PaisaClick Finance, our mission, and our commitment to providing trustworthy and reliable financial solutions.</p>\r\n	</li>\r\n</ul>\r\n\r\n<p>5. <strong>Feedback and Suggestions</strong></p>\r\n\r\n<p>We value your feedback and suggestions as they help us improve our services. If you have any thoughts on how we can better serve you or enhance your loan experience, please don&rsquo;t hesitate to reach out.</p>\r\n\r\n<p>6. <strong>Social Media</strong></p>\r\n\r\n<p>Stay connected with us through our social media channels for updates, tips, and more:</p>\r\n\r\n<ul>\r\n	<li>\r\n	<p><strong>Facebook:</strong> <a href=\"#\">PaisaClick Finance</a></p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Twitter:</strong> <a href=\"#\">@PaisaClickFinance</a></p>\r\n	</li>\r\n	<li>\r\n	<p><strong>LinkedIn:</strong> <a href=\"#\">PaisaClick Finance</a></p>\r\n	</li>\r\n</ul>\r\n\r\n<p>We look forward to assisting you!</p>\r\n</div>\r\n', 'active', '2025-04-14 20:25:13', 'MainPage', 'contact-us'),
(16, 'Apply Now', 'Apply Now', NULL, '<p>Apply Now</p>\r\n', 'active', '2025-04-15 10:49:38', 'MainPage', 'apply-now'),
(17, 'Terms and Conditions', 'Terms and Conditions', NULL, '  <div class=\"container\">\r\n    <h1> Terms and Conditions</h1>\r\n    <p><strong>Effective Date:</strong> 18 April 2025 \r\n    <strong>Company Name:</strong> PaisaClick \r\n    <strong>Website:</strong> <a href=\"https://paisaclick.com\" target=\"_blank\">https://paisaclick.com</a></p>\r\n\r\n    <h2>1. Introduction</h2>\r\n    <p>Welcome to <strong>PaisaClick</strong>. By accessing or using our website and services, you agree to be bound by these Terms and Conditions. If you do not agree with any part of these terms, please refrain from using our platform.</p>\r\n\r\n    <h2>2. About Our Services</h2>\r\n    <p>PaisaClick is a <strong>loan aggregator platform</strong> that connects users with various third-party loan providers for:</p>\r\n    <ul>\r\n      <li>Personal Loans</li>\r\n      <li>Education Loans</li>\r\n      <li>Business Loans</li>\r\n      <li>Mortgage/Home Loans</li>\r\n      <li>Other financial products</li>\r\n    </ul>\r\n    <p>We <strong>do not directly provide loans</strong>. We only facilitate loan comparison and application submission to registered vendors or financial institutions.</p>\r\n\r\n    <h2>3. Eligibility Criteria</h2>\r\n    <p>To access our services, users must:</p>\r\n    <ul>\r\n      <li>Be at least 18 years old</li>\r\n      <li>Be an Indian resident</li>\r\n      <li>Have valid identification and address proof</li>\r\n      <li>Provide true and complete personal and financial information</li>\r\n      <li>Consent to data sharing with our partner lenders</li>\r\n    </ul>\r\n\r\n    <h2>4. Loan Approval Disclaimer</h2>\r\n    <ul>\r\n      <li>PaisaClick does <strong>not guarantee</strong> loan approval.</li>\r\n      <li>Final decision, processing time, interest rates, and other terms are decided solely by the lender.</li>\r\n      <li>Any agreement you enter with the lender is strictly between you and that lender.</li>\r\n    </ul>\r\n\r\n    <h2>5. Responsibilities of the User</h2>\r\n    <p>By using PaisaClick, you agree to:</p>\r\n    <ul>\r\n      <li>Use the platform lawfully and responsibly</li>\r\n      <li>Not misuse, manipulate, or disrupt our services</li>\r\n      <li>Keep your submitted data accurate and updated</li>\r\n      <li>Not impersonate another person or entity</li>\r\n      <li>Respect third-party rights and data usage terms</li>\r\n    </ul>\r\n\r\n    <h2>6. Data Collection and Privacy</h2>\r\n    <p>Your personal and financial data may be collected for eligibility checks and application processing.  \r\n    This data is securely shared only with verified financial partners.  \r\n    For full details on how your data is handled, please refer to our \r\n    <a href=\"https://paisaclick.com/page/privacy-policy\" target=\"_blank\">Privacy Policy</a>.</p>\r\n\r\n    <h2>7. Limitation of Liability</h2>\r\n    <p>PaisaClick shall not be held liable for:</p>\r\n    <ul>\r\n      <li>Any loan rejection or delay in approval/disbursal</li>\r\n      <li>Disputes between you and any lender</li>\r\n      <li>Any financial losses, interest charges, or penalties imposed by the lender</li>\r\n      <li>Inaccuracies in vendor listings or offers displayed on the website</li>\r\n    </ul>\r\n\r\n    <h2>8. Intellectual Property Rights</h2>\r\n    <p>All logos, text, branding, design, content, and technology used on \r\n    <a href=\"https://paisaclick.com\" target=\"_blank\">https://paisaclick.com</a> are the property of PaisaClick \r\n    and are protected by applicable intellectual property laws.</p>\r\n\r\n    <h2>9. Updates to Terms</h2>\r\n    <p>These Terms & Conditions may be updated from time to time. Any updates will be posted on this page \r\n    with a revised effective date. Continued use of the website indicates your agreement to the revised terms.</p>\r\n\r\n    <h2>10. Contact Us</h2>\r\n    <p>If you have any questions or concerns, feel free to reach out to us:</p>\r\n    <ul>\r\n      <li><strong>Email:</strong> paisaclick1@gmail.com</li>\r\n      <li><strong>Website:</strong> <a href=\"https://paisaclick.com\" target=\"_blank\">https://paisaclick.com</a></li>\r\n    </ul>\r\n  </div>', 'active', '2025-04-18 07:21:09', 'SidePage', 'terms-and-conditions');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `userId` int(11) NOT NULL,
  `email` varchar(128) DEFAULT NULL COMMENT 'login email',
  `password` varchar(128) DEFAULT NULL COMMENT 'hashed login password',
  `name` varchar(128) DEFAULT NULL COMMENT 'full name of user',
  `mobile` varchar(20) DEFAULT NULL,
  `roleId` tinyint(4) NOT NULL,
  `isAdmin` tinyint(4) NOT NULL DEFAULT 2,
  `isDeleted` tinyint(4) NOT NULL DEFAULT 0,
  `createdBy` int(11) NOT NULL,
  `createdDtm` datetime NOT NULL,
  `updatedBy` int(11) DEFAULT NULL,
  `updatedDtm` datetime DEFAULT NULL,
  `addhar_no` varchar(20) DEFAULT NULL,
  `pan_no` varchar(20) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `alternate_mobile` varchar(15) DEFAULT NULL,
  `office_address` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`userId`, `email`, `password`, `name`, `mobile`, `roleId`, `isAdmin`, `isDeleted`, `createdBy`, `createdDtm`, `updatedBy`, `updatedDtm`, `addhar_no`, `pan_no`, `address`, `alternate_mobile`, `office_address`) VALUES
(1, 'admin@admin.com', '$2y$10$jwaIjXMxZW7YW/0gt1TM3etfqyfpcaj3GDLF/2pPr/6S8KzHKL6sG', 'System Administrator', '9890098900', 1, 1, 0, 0, '2015-07-01 18:56:49', 1, '2021-06-01 16:17:08', NULL, NULL, NULL, NULL, NULL),
(2, 'manager@example.com', '$2y$10$6Y28WIo2Oz.p8xsEMYcCmuvvijXZU8.sRT3737ix.vN1CwGs3NJk6', 'Banwari', '9039008961', 2, 0, 0, 1, '2016-12-09 17:49:56', 1, '2025-04-13 14:26:58', '665544552255', 'ddslfjsldfjsa', 'fdgdsfgdsfgsdfgsdfg', '3214668978', 'fdfsafdsafsadf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `last_activity_idx` (`last_activity`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`pageId`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`partnerId`);

--
-- Indexes for table `tbl_access_matrix`
--
ALTER TABLE `tbl_access_matrix`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_blogs`
--
ALTER TABLE `tbl_blogs`
  ADD PRIMARY KEY (`blogId`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `tbl_followups`
--
ALTER TABLE `tbl_followups`
  ADD PRIMARY KEY (`followupId`);

--
-- Indexes for table `tbl_last_login`
--
ALTER TABLE `tbl_last_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_leads`
--
ALTER TABLE `tbl_leads`
  ADD PRIMARY KEY (`leadId`);

--
-- Indexes for table `tbl_leads_remarks`
--
ALTER TABLE `tbl_leads_remarks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lead_id` (`lead_id`);

--
-- Indexes for table `tbl_reset_password`
--
ALTER TABLE `tbl_reset_password`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  ADD PRIMARY KEY (`roleId`);

--
-- Indexes for table `tbl_seo_metadata`
--
ALTER TABLE `tbl_seo_metadata`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `page_url` (`page_url`);

--
-- Indexes for table `tbl_services`
--
ALTER TABLE `tbl_services`
  ADD PRIMARY KEY (`serviceId`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `pageId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `partners`
--
ALTER TABLE `partners`
  MODIFY `partnerId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_access_matrix`
--
ALTER TABLE `tbl_access_matrix`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_blogs`
--
ALTER TABLE `tbl_blogs`
  MODIFY `blogId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_followups`
--
ALTER TABLE `tbl_followups`
  MODIFY `followupId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_last_login`
--
ALTER TABLE `tbl_last_login`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_leads`
--
ALTER TABLE `tbl_leads`
  MODIFY `leadId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_leads_remarks`
--
ALTER TABLE `tbl_leads_remarks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_reset_password`
--
ALTER TABLE `tbl_reset_password`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  MODIFY `roleId` tinyint(4) NOT NULL AUTO_INCREMENT COMMENT 'role id', AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_seo_metadata`
--
ALTER TABLE `tbl_seo_metadata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_services`
--
ALTER TABLE `tbl_services`
  MODIFY `serviceId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_leads_remarks`
--
ALTER TABLE `tbl_leads_remarks`
  ADD CONSTRAINT `tbl_leads_remarks_ibfk_1` FOREIGN KEY (`lead_id`) REFERENCES `tbl_leads` (`leadId`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
