-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 06, 2022 at 09:45 AM
-- Server version: 5.7.33
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `invetory`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `created_at`, `updated_at`) VALUES
(19, 'New', '2022-01-23 04:39:37', '2022-01-23 04:39:37'),
(20, 'Old', '2022-01-24 22:38:15', '2022-01-24 22:38:15'),
(21, 'Phone', '2022-01-24 22:38:31', '2022-01-24 22:38:31'),
(22, 'Laptop', '2022-01-24 22:38:46', '2022-01-24 22:38:46'),
(23, 'HeadPhone', '2022-01-24 22:39:03', '2022-01-24 22:39:03');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `phone`, `address`, `photo`, `created_at`, `updated_at`) VALUES
(2, 'Shakil', 'shakil@gmail.com', '01637621452', 'Shyamoli,Dhaka', '0', '2022-01-26 22:34:17', '2022-01-26 22:46:49'),
(3, 'Xyla', 'suvyzi@mailinator.com', '+1 (497) 357-1365', 'Suscipit modi ea cor', '0', '2022-01-26 22:34:26', '2022-01-26 22:46:05'),
(4, 'Malik', 'hudur@mailinator.com', '+1 (115) 846-5145', 'Repellendus Adipisc', '0', '2022-01-26 22:41:47', '2022-01-26 22:41:47');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salary` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `join_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `email`, `phone`, `salary`, `address`, `photo`, `nid`, `join_date`, `created_at`, `updated_at`) VALUES
(1, 'Riyad', 'riyad@gmail.com', '34645623623', '500000', NULL, '0', '4653819658', '2022-01-20', '2022-01-20 02:57:20', '2022-01-23 01:06:34'),
(2, 'Emma', 'mofiwegeh@mailinator.com', '+1 (374) 954-9857', '10000', 'Sed fugiat fugiat', '0', 'Voluptates dolor sun', '2003-03-26', '2022-01-20 02:59:25', '2022-01-25 03:54:33'),
(4, 'Nishat', 'ddcnishat@gmail.com', '3466423646', '5000000000', 'DDC', '0', '463546546', '2022-01-13', '2022-01-20 03:44:58', '2022-01-20 03:44:58'),
(5, 'Nathaniel', 'bowy@mailinator.com', '+1 (977) 968-6368', '10000', 'Eum in obcaecati ess', '0', 'Cumque nisi non ut a', '2018-02-20', '2022-01-20 03:46:44', '2022-01-25 03:54:20'),
(6, 'Martin', 'ciwucodima@mailinator.com', '+1 (578) 615-3607', '100000', 'Natus pariatur Cumq', '0', '10000', '1991-12-03', '2022-01-20 03:50:53', '2022-01-25 03:54:26'),
(7, 'DDC', 'pegaq@mailinator.com', '+1 (413) 294-5976', '10000', 'Mohakhali', '0', '587663525', '1977-09-30', '2022-01-20 03:53:53', '2022-01-25 03:54:02'),
(9, 'Clayton', 'kilulubo@mailinator.com', '+1 (671) 203-3219', '10000', 'Velit optio quibusd', '0', 'Optio eius atque id', '1979-03-18', '2022-01-23 02:51:30', '2022-01-25 03:53:51');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expense_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `details`, `amount`, `expense_date`, `created_at`, `updated_at`) VALUES
(2, 'fdgdsfhsdh  ertwertw', '453523', '2022-01-02', '2022-01-25 00:43:48', '2022-01-25 00:43:48'),
(3, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum..................................', '1000', '2022-01-28', '2022-01-25 00:44:54', '2022-01-25 00:47:42');

-- --------------------------------------------------------

--
-- Table structure for table `extras`
--

CREATE TABLE `extras` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vat` int(11) DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `favicon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `addresss` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `extras`
--

INSERT INTO `extras` (`id`, `vat`, `logo`, `favicon`, `phone`, `email`, `addresss`, `created_at`, `updated_at`) VALUES
(1, 5, NULL, NULL, NULL, NULL, '', NULL, NULL);

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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(7, '2022_01_20_054736_create_employees_table', 2),
(9, '2022_01_23_082057_create_suppliers_table', 3),
(10, '2022_01_23_093614_create_categories_table', 4),
(11, '2022_01_25_034817_create_products_table', 5),
(12, '2022_01_25_060715_create_expenses_table', 6),
(13, '2022_01_25_070242_create_salaries_table', 7),
(14, '2022_01_27_034848_create_customers_table', 8),
(15, '2022_01_31_061735_create_pos_table', 9),
(16, '2022_01_31_100206_create_extras_table', 10);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pos`
--

CREATE TABLE `pos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_quantity` int(11) DEFAULT NULL,
  `product_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_total` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pos`
--

INSERT INTO `pos` (`id`, `product_id`, `product_name`, `product_quantity`, `product_price`, `sub_total`, `created_at`, `updated_at`) VALUES
(16, 22, 'Rama Spencer', 1, '978', '978', NULL, '2022-01-31 05:01:22'),
(17, 21, 'Ina Willis', 1, '556', '556', NULL, '2022-01-31 05:01:13'),
(18, 1, 'MI11', 1, '200', '200', NULL, '2022-01-31 04:25:02'),
(20, 14, 'jdsohfjohjdsj', 3, '32323', '96969', NULL, '2022-01-31 05:19:13'),
(21, 13, 'Althea Gill', 2, '193', '386', NULL, '2022-01-31 05:19:12');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `supplier_id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `root` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `buying_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `selling_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_quantity` int(11) NOT NULL,
  `buying_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `supplier_id`, `product_name`, `product_code`, `root`, `buying_price`, `selling_price`, `image`, `product_quantity`, `buying_date`, `created_at`, `updated_at`) VALUES
(1, 21, 3, 'MI11', '093485', 'Omnis ullamco nulla', '100', '200', '0', 500, '2005-09-19', '2022-01-24 23:18:07', '2022-01-26 21:26:30'),
(2, 19, 3, 'Velma Hood', '3445', 'Vitae facere volupta', '50', '255', '0', 20, '1987-07-16', '2022-01-26 21:09:37', '2022-01-26 21:26:23'),
(3, 22, 3, 'Honorato Marsh', 'Similique sed neque', 'Est pariatur Obcaec', '529', '135', '0', 864, '2003-08-12', '2022-01-27 00:26:48', '2022-01-27 00:26:48'),
(4, 23, 2, 'Adena Santos', 'Beatae qui quaerat c', 'Reprehenderit minim', '595', '376', '0', 921, '2015-07-08', '2022-01-27 00:28:18', '2022-01-27 00:28:18'),
(5, 19, 2, 'Noel Gaines', 'Libero aperiam ad do', 'Et enim velit enim', '789', '941', '0', 256, '2009-02-20', '2022-01-27 00:30:57', '2022-01-27 00:30:57'),
(6, 20, 2, 'Walker Rollins', 'Est ut molestiae vol', 'Eveniet libero id i', '590', '545', '0', 687, '1989-09-23', '2022-01-27 00:32:00', '2022-01-27 00:32:00'),
(7, 21, 3, 'Miriam Johnson', 'Quis ab dolore nulla', 'Enim aut voluptas vo', '390', '59', NULL, 891, '1974-11-30', '2022-01-27 00:48:30', '2022-01-27 00:48:30'),
(8, 21, 3, 'Rebekah King', 'Non laboris dolor co', 'Omnis quis in veniam', '81', '713', NULL, 198, '2012-06-07', '2022-01-27 00:49:33', '2022-01-27 00:49:33'),
(9, 19, 3, 'Anjolie Griffith', 'Cum laboris animi q', 'Aliquip maiores qui', '661', '741', 'backend/product/1643266286.jpeg', 821, '1991-07-01', '2022-01-27 00:51:26', '2022-01-27 00:51:26'),
(10, 22, 2, 'Avram Walsh', 'Porro eius dolore vo', 'Itaque voluptatem D', '342', '55', 'backend/product/1643266343.png', 7, '1993-08-23', '2022-01-27 00:52:24', '2022-01-27 00:52:24'),
(11, 21, 2, 'Duncan Puckett', 'Eveniet perspiciati', 'Dolore quibusdam con', '817', '152', '0', 398, '2007-02-10', '2022-01-27 01:16:20', '2022-01-27 01:16:20'),
(12, 21, 3, 'Sopoline Avila', 'Velit harum exceptur', 'Tempore nostrum lib', '1', '401', NULL, 941, '1975-04-20', '2022-01-27 04:53:23', '2022-01-27 04:53:23'),
(13, 22, 3, 'Althea Gill', 'Ut quis quis similiq', 'Omnis officia offici', '677', '193', NULL, 914, '2018-09-10', '2022-01-27 04:54:25', '2022-01-27 04:54:25'),
(14, 22, 3, 'jdsohfjohjdsj', '325523', NULL, NULL, '32323', '2022-01-27.jpg', 3, NULL, '2022-01-27 04:58:42', '2022-01-27 04:58:42'),
(15, 22, 3, 'jdsohfjohjdsj', '325523', NULL, NULL, '32323', '2022-01-27.jpg', 3, NULL, '2022-01-27 04:59:31', '2022-01-27 04:59:31'),
(16, 22, 3, 'jdsohfjohjdsj', '325523', NULL, NULL, '32323', '2022-01-27.jfif', 3, NULL, '2022-01-27 05:01:13', '2022-01-27 05:01:13'),
(17, 22, 3, 'jdsohfjohjdsj', '325523', NULL, NULL, '32323', 'jfif', 3, NULL, '2022-01-27 05:04:27', '2022-01-27 05:04:27'),
(18, 22, 3, 'jdsohfjohjdsj', '325523', NULL, NULL, '32323', 'jfif', 3, NULL, '2022-01-27 05:05:18', '2022-01-27 05:05:18'),
(19, 22, 3, 'jdsohfjohjdsj', '325523', NULL, NULL, '32323', 'jfif', 3, NULL, '2022-01-27 05:05:38', '2022-01-27 05:05:38'),
(20, 22, 3, 'jdsohfjohjdsj', '325523', NULL, NULL, '32323', '2022-01-27.jfif', 3, NULL, '2022-01-27 05:05:46', '2022-01-27 05:05:46'),
(21, 23, 2, 'Ina Willis', 'Anim laboris officia', 'Similique quo fuga', '824', '556', NULL, 84, '1971-08-19', '2022-01-30 21:12:45', '2022-01-30 21:12:45'),
(22, 20, 3, 'Rama Spencer', 'Cillum libero anim n', 'Est doloremque et mo', '907', '978', NULL, 9, '1970-09-16', '2022-01-30 21:13:30', '2022-01-30 21:13:30');

-- --------------------------------------------------------

--
-- Table structure for table `salaries`
--

CREATE TABLE `salaries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `salaries`
--

INSERT INTO `salaries` (`id`, `employee_id`, `amount`, `date`, `created_at`, `updated_at`) VALUES
(3, 2, '1000000', '2022-01-27', '2022-01-25 02:31:35', '2022-01-25 02:33:31'),
(4, 4, '10000', '2022-01-28', '2022-01-25 02:32:08', '2022-01-25 02:32:08'),
(5, 6, '100000', '2022-01-26', '2022-01-25 04:07:18', '2022-01-25 04:07:18'),
(6, 2, '10000', '2022-01-10', '2022-01-25 04:07:52', '2022-01-25 04:07:52'),
(7, 2, '10000', '2022-01-29', '2022-01-25 04:22:48', '2022-01-25 04:22:48'),
(8, 9, '10000', '2022-02-03', '2022-01-25 04:34:27', '2022-01-25 04:34:27'),
(9, 7, '10000', '2022-01-27', '2022-01-25 04:34:35', '2022-01-25 04:34:35'),
(10, 7, '10000', '2022-02-05', '2022-01-25 04:34:39', '2022-01-25 04:34:39'),
(11, 9, '10000', '2022-01-25', '2022-01-26 22:53:10', '2022-01-26 22:53:10');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shop_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `email`, `phone`, `address`, `photo`, `shop_name`, `created_at`, `updated_at`) VALUES
(2, 'Tamara', 'vezynafeju@mailinator.com', '+1 (344) 475-5176', 'Dignissimos velit do', '0', 'Leilani Faulkner', '2022-01-23 03:00:25', '2022-01-23 03:01:23'),
(3, 'Rifat', 'rifat@mailinator.com', '12341690289', 'DDC', '0', 'DDC ICT', '2022-01-23 03:00:30', '2022-01-23 03:01:55');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Lupe Turcotte', 'nona36@example.net', '2022-01-18 22:54:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'c0INRtf5Ov', '2022-01-18 22:54:47', '2022-01-18 22:54:47'),
(2, 'Carter Weimann', 'william.reinger@example.net', '2022-01-18 22:54:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'nXZz88ucr6', '2022-01-18 22:54:47', '2022-01-18 22:54:47'),
(3, 'Virginie Rodriguez', 'imaggio@example.net', '2022-01-18 22:54:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'HSXqkJhABX', '2022-01-18 22:54:47', '2022-01-18 22:54:47'),
(4, 'Dr. Kurt Thompson V', 'crooks.eden@example.org', '2022-01-18 22:54:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'y0YIw9oRdw', '2022-01-18 22:54:47', '2022-01-18 22:54:47'),
(5, 'Westley Kuphal', 'sweissnat@example.org', '2022-01-18 22:54:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'NfreqpFcOw', '2022-01-18 22:54:47', '2022-01-18 22:54:47'),
(6, 'Erick Bins', 'dayna.blick@example.net', '2022-01-18 22:54:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'nm8LoUmIQE', '2022-01-18 22:54:47', '2022-01-18 22:54:47'),
(7, 'Ms. Beth Halvorson', 'deanna.schuppe@example.com', '2022-01-18 22:54:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '5YaZdSn8gL', '2022-01-18 22:54:47', '2022-01-18 22:54:47'),
(8, 'Jon Kassulke', 'lacey36@example.net', '2022-01-18 22:54:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '9uXPIeZrON', '2022-01-18 22:54:47', '2022-01-18 22:54:47'),
(9, 'Jefferey Cummings', 'welch.rosa@example.org', '2022-01-18 22:54:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'U2DRu8pKVV', '2022-01-18 22:54:48', '2022-01-18 22:54:48'),
(10, 'Orion Keeling DDS', 'marquis.keeling@example.org', '2022-01-18 22:54:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'S5hXLMhHbI', '2022-01-18 22:54:48', '2022-01-18 22:54:48'),
(11, 'admin', 'admin@gmail.com', NULL, '$2y$10$q11.SIVVi/XIQG1axfLTIuwrIGuwNjBnh9UmBU0rSda/kAZrhaHbS', NULL, '2022-01-18 23:08:51', '2022-01-18 23:08:51'),
(12, 'shakil', 'shakil@gmail.com', NULL, '$2y$10$TMc69Flq3CZHgIjBxChzOemwWWyf.IhXpyaQXFKLUpjVpNSFhyYjm', NULL, '2022-01-18 23:17:26', '2022-01-18 23:17:26'),
(13, 'shakil', 'robin@gmail.com', NULL, '$2y$10$83aTH0TWNwtKeSd93jpHX..YCp7a070Kq6LSl3E//5r/nB3NKyGga', NULL, '2022-01-19 00:06:04', '2022-01-19 00:06:04'),
(14, 'Riyad', 'riyad@gmail.com', NULL, '$2y$10$Wx7s74XngzuftkRVTG93uOtzEsgAZxJfzOleMCLzS3wtcypzLLT4q', NULL, '2022-01-19 02:50:26', '2022-01-19 02:50:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `extras`
--
ALTER TABLE `extras`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `pos`
--
ALTER TABLE `pos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salaries`
--
ALTER TABLE `salaries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `extras`
--
ALTER TABLE `extras`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pos`
--
ALTER TABLE `pos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `salaries`
--
ALTER TABLE `salaries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
