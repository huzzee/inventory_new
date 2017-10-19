-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 19, 2017 at 09:51 PM
-- Server version: 5.7.11
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_invento`
--

-- --------------------------------------------------------

--
-- Table structure for table `grn_details`
--

CREATE TABLE `grn_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `grn_master_id` int(10) UNSIGNED NOT NULL,
  `item_id` int(10) UNSIGNED NOT NULL,
  `recieved_qnt` decimal(15,3) NOT NULL,
  `per_unit_rate` double(15,3) NOT NULL,
  `total_amount` double(15,3) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `grn_details`
--

INSERT INTO `grn_details` (`id`, `grn_master_id`, `item_id`, `recieved_qnt`, `per_unit_rate`, `total_amount`, `created_at`, `updated_at`) VALUES
(51, 47, 18, '20.000', 120000.000, 2400000.000, '2017-10-19 16:06:27', '2017-10-19 16:06:27'),
(52, 48, 19, '10.000', 110000.000, 1100000.000, '2017-10-19 16:15:48', '2017-10-19 16:15:48'),
(53, 48, 20, '23.000', 60000.000, 1380000.000, '2017-10-19 16:15:48', '2017-10-19 16:15:48'),
(54, 48, 21, '56.000', 55000.000, 3080000.000, '2017-10-19 16:15:48', '2017-10-19 16:15:48'),
(55, 49, 18, '50.000', 110000.000, 5500000.000, '2017-10-19 16:50:23', '2017-10-19 16:50:23'),
(56, 49, 19, '10.000', 130000.000, 1300000.000, '2017-10-19 16:50:23', '2017-10-19 16:50:23'),
(57, 49, 20, '21.000', 70000.000, 1470000.000, '2017-10-19 16:50:23', '2017-10-19 16:50:23'),
(58, 49, 21, '15.000', 5000.000, 75000.000, '2017-10-19 16:50:23', '2017-10-19 16:50:23');

-- --------------------------------------------------------

--
-- Table structure for table `grn_masters`
--

CREATE TABLE `grn_masters` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `supplier_id` int(10) UNSIGNED NOT NULL,
  `purchase_order_id` int(10) UNSIGNED NOT NULL,
  `dn_code` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `grn_masters`
--

INSERT INTO `grn_masters` (`id`, `user_id`, `supplier_id`, `purchase_order_id`, `dn_code`, `created_at`, `updated_at`) VALUES
(47, 1, 3, 6, 1321321, '2017-10-19 16:06:27', '2017-10-19 16:06:27'),
(48, 1, 1, 7, 123213, '2017-10-19 16:15:48', '2017-10-19 16:15:48'),
(49, 1, 1, 5, 123124124, '2017-10-19 16:50:23', '2017-10-19 16:50:23');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(10) UNSIGNED NOT NULL,
  `catagory_id` int(10) UNSIGNED NOT NULL,
  `type_id` int(10) UNSIGNED NOT NULL,
  `item_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_code` bigint(20) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `item_unit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `opening_qnt` int(11) NOT NULL DEFAULT '0',
  `current_qnt` int(11) NOT NULL DEFAULT '0',
  `min_qnt` int(11) NOT NULL DEFAULT '0',
  `item_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit_price` double(15,3) NOT NULL DEFAULT '0.000',
  `last_purchase_rate` double(15,3) NOT NULL DEFAULT '0.000',
  `is_saleable` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `sort_order` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `catagory_id`, `type_id`, `item_name`, `item_code`, `description`, `item_unit`, `opening_qnt`, `current_qnt`, `min_qnt`, `item_image`, `unit_price`, `last_purchase_rate`, `is_saleable`, `status`, `sort_order`, `created_at`, `updated_at`) VALUES
(18, 5, 12, 'I Phone 8', 897652, 'Color Black', 'Box', 50, 70, 30, 'I Phone 8_5.JPG', 110000.000, 120000.000, 1, 1, 0, '2017-10-19 10:46:03', '2017-10-19 16:50:23'),
(19, 5, 12, 'I Phone X', 879431, 'Color Red', 'Box', 50, 60, 30, 'I Phone X_5.jpg', 130000.000, 110000.000, 1, 1, 0, '2017-10-19 10:48:25', '2017-10-19 16:50:23'),
(20, 5, 12, 'Samsung S8', 184536, 'Color White,black,red,blue,skin,brown', 'Box', 40, 63, 30, 'Samsung S8_5.jpg', 70000.000, 60000.000, 1, 1, 0, '2017-10-19 10:49:31', '2017-10-19 16:50:23'),
(21, 5, 12, 'Samsung S7', 462722, 'Color Black,white,purple,blue', 'Box', 60, 116, 50, 'Samsung S7_5.jpg', 5000.000, 55000.000, 1, 1, 0, '2017-10-19 10:50:40', '2017-10-19 16:50:23');

-- --------------------------------------------------------

--
-- Table structure for table `item_categories`
--

CREATE TABLE `item_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `item_cat_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `item_categories`
--

INSERT INTO `item_categories` (`id`, `item_cat_name`, `status`, `created_at`, `updated_at`) VALUES
(3, 'test', 1, '2017-10-09 17:21:12', '2017-10-09 17:21:12'),
(4, 'Electronics', 1, '2017-10-12 08:26:10', '2017-10-12 08:26:10'),
(5, 'Mobiles', 1, '2017-10-12 08:26:26', '2017-10-12 08:26:26'),
(6, 'Stationary', 1, '2017-10-12 08:27:01', '2017-10-12 08:27:01'),
(7, 'Clothes', 1, '2017-10-14 07:24:40', '2017-10-14 07:24:40');

-- --------------------------------------------------------

--
-- Table structure for table `item_types`
--

CREATE TABLE `item_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `item_type_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `item_types`
--

INSERT INTO `item_types` (`id`, `item_type_name`, `status`, `created_at`, `updated_at`) VALUES
(8, 'General Items', 1, '2017-10-09 17:33:02', '2017-10-09 17:33:02'),
(11, 'Raw Material', 1, '2017-10-09 17:35:05', '2017-10-09 17:35:05'),
(12, 'Readymade Items', 1, '2017-10-12 08:25:05', '2017-10-12 08:25:05'),
(13, 'Special Parts', 1, '2017-10-12 08:25:37', '2017-10-12 08:25:37');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `menu_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `menu_slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_menu_id` int(11) DEFAULT NULL,
  `order` int(11) NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `menu_route` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` int(11) NOT NULL,
  `hidden` int(11) NOT NULL,
  `sort_order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `menu_name`, `menu_slug`, `parent_menu_id`, `order`, `icon`, `menu_route`, `active`, `hidden`, `sort_order`, `created_at`, `updated_at`) VALUES
(7, 'Users', NULL, NULL, 0, 'mdi mdi-account', NULL, 1, 0, 0, NULL, NULL),
(8, 'Add Users', 'users/create', 7, 1, NULL, 'users.create', 1, 0, 1, NULL, NULL),
(9, 'Users List', 'users', 7, 2, NULL, 'users.index', 1, 0, 2, NULL, NULL),
(10, 'Edit', NULL, 7, 3, NULL, 'users.edit', 1, 1, 4, NULL, NULL),
(11, 'Users Profile', NULL, 7, 4, NULL, 'users.show', 1, 1, 5, NULL, NULL),
(12, 'Delete', NULL, 7, 5, NULL, 'users.delete', 1, 1, 6, NULL, NULL),
(13, 'Items/Products', NULL, NULL, 0, 'mdi mdi-note-plus-outline', NULL, 1, 0, 7, NULL, NULL),
(14, 'Item Type', 'item_types', 13, 1, NULL, 'item_types.index', 1, 0, 10, NULL, NULL),
(15, 'Item Category', 'item_categories', 13, 2, NULL, 'item_categories.index', 1, 0, 11, NULL, NULL),
(16, 'Add Items', 'items/create', 13, 4, NULL, 'items.create', 1, 0, 8, NULL, NULL),
(17, 'Items List', 'items', 13, 5, NULL, 'items.index', 1, 0, 9, NULL, NULL),
(18, 'Suppliers', NULL, NULL, 0, 'mdi mdi-playlist-plus', NULL, 1, 0, 12, NULL, NULL),
(19, 'Add Supplier', 'suppliers/create', 18, 1, NULL, 'suppliers.create', 1, 0, 13, NULL, NULL),
(20, 'Suppliers List', 'suppliers', 18, 2, NULL, 'suppliers.index', 1, 0, 14, NULL, NULL),
(21, 'Department', 'departments', 7, 4, NULL, 'departments.index', 1, 0, 2, NULL, NULL),
(22, 'Requisitions', NULL, NULL, 0, 'mdi mdi-note-text', NULL, 1, 0, 15, NULL, NULL),
(23, 'Make Requests', 'requisitions/create', 22, 1, NULL, 'requisitions.create', 1, 0, 16, NULL, NULL),
(24, 'Requests List', 'requisitions', 22, 2, NULL, 'requisition.index', 1, 0, 17, NULL, NULL),
(25, 'Purchase Order', NULL, NULL, 0, 'mdi mdi-cart', NULL, 1, 0, 18, NULL, NULL),
(26, 'Make Purchase Order', 'purchase/create', 25, 1, NULL, 'purchase.create', 1, 0, 19, NULL, NULL),
(27, 'Orders Request', 'purchase', 25, 2, NULL, 'purchase.index', 1, 0, 20, NULL, NULL),
(28, 'Good Receiving Note ', NULL, NULL, 0, ' mdi mdi-shape-rectangle-plus', NULL, 1, 0, 21, NULL, NULL),
(29, 'Make G.R.N', 'grn/create', 28, 1, NULL, 'grn.create', 1, 0, 22, NULL, NULL),
(30, 'G.R.N List', 'grn', 28, 2, NULL, 'grn', 1, 0, 23, NULL, NULL),
(31, 'Issued Requests', 'requisitions_complete', 22, 3, NULL, 'complete', 1, 0, 17, NULL, NULL),
(32, 'Approved Orders', 'approved_puchase', 25, 3, NULL, 'order', 1, 0, 20, NULL, NULL);

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_10_06_200021_create_roles_table', 1),
(4, '2017_10_07_092102_create_menus_table', 2),
(10, '2017_10_07_110820_create_item_types_table', 3),
(16, '2017_10_07_110933_create_item_categories_table', 4),
(17, '2017_10_07_133115_create_items_table', 4),
(20, '2017_10_09_161540_create_suppliers_table', 5),
(22, '2017_10_12_203855_create_my_departments_table', 6),
(24, '2017_10_12_210110_create_users_table', 7),
(30, '2017_10_12_221537_create_requisitions_table', 8),
(31, '2017_10_13_162126_create_requisition_details_table', 8),
(32, '2017_10_15_112938_create_purchase_order_masters_table', 9),
(33, '2017_10_15_113103_create_purchase_order_details_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `my_departments`
--

CREATE TABLE `my_departments` (
  `id` int(10) UNSIGNED NOT NULL,
  `department_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `my_departments`
--

INSERT INTO `my_departments` (`id`, `department_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Admin Department', 1, '2017-10-12 16:09:17', '2017-10-12 16:09:17'),
(2, 'Sales Department', 1, '2017-10-12 15:47:02', '2017-10-12 15:47:02');

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
-- Table structure for table `purchase_order_details`
--

CREATE TABLE `purchase_order_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `purchase_order_master_id` int(10) UNSIGNED NOT NULL,
  `item_id` int(10) UNSIGNED NOT NULL,
  `order_qnt` int(11) NOT NULL,
  `item_rate` double(15,3) NOT NULL,
  `total_amount` double(15,3) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_order_details`
--

INSERT INTO `purchase_order_details` (`id`, `purchase_order_master_id`, `item_id`, `order_qnt`, `item_rate`, `total_amount`, `created_at`, `updated_at`) VALUES
(7, 5, 18, 50, 110000.000, 5500000.000, '2017-10-19 10:52:41', '2017-10-19 10:52:41'),
(8, 5, 19, 10, 130000.000, 1300000.000, '2017-10-19 10:52:41', '2017-10-19 10:52:41'),
(9, 5, 20, 21, 70000.000, 1470000.000, '2017-10-19 10:52:41', '2017-10-19 10:52:41'),
(10, 5, 21, 15, 5000.000, 75000.000, '2017-10-19 10:52:41', '2017-10-19 10:52:41'),
(11, 6, 18, 20, 120000.000, 2400000.000, '2017-10-19 11:38:38', '2017-10-19 11:38:38'),
(12, 7, 19, 10, 110000.000, 1100000.000, '2017-10-19 16:10:06', '2017-10-19 16:10:06'),
(13, 7, 20, 23, 60000.000, 1380000.000, '2017-10-19 16:10:06', '2017-10-19 16:10:06'),
(14, 7, 21, 56, 55000.000, 3080000.000, '2017-10-19 16:10:06', '2017-10-19 16:10:06');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order_masters`
--

CREATE TABLE `purchase_order_masters` (
  `id` int(10) UNSIGNED NOT NULL,
  `requisition_id` int(10) UNSIGNED DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `supplier_id` int(10) UNSIGNED NOT NULL,
  `purchase_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quatation_nmbr` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approval_by` int(10) UNSIGNED DEFAULT NULL,
  `approved` tinyint(1) NOT NULL DEFAULT '0',
  `rejected` tinyint(1) NOT NULL DEFAULT '0',
  `printed` tinyint(1) NOT NULL DEFAULT '0',
  `approval_date` timestamp NULL DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_order_masters`
--

INSERT INTO `purchase_order_masters` (`id`, `requisition_id`, `user_id`, `supplier_id`, `purchase_code`, `quatation_nmbr`, `approval_by`, `approved`, `rejected`, `printed`, `approval_date`, `created_date`, `created_at`, `updated_at`) VALUES
(5, NULL, 1, 1, '22800741', NULL, 1, 1, 0, 1, '2017-10-19 10:52:51', '2017-10-19', '2017-10-19 10:52:41', '2017-10-19 10:53:09'),
(6, NULL, 1, 3, '99579039', NULL, 1, 1, 0, 1, '2017-10-19 11:38:48', '2017-10-19', '2017-10-19 11:38:38', '2017-10-19 11:39:34'),
(7, NULL, 1, 1, '93320113', NULL, 1, 1, 0, 1, '2017-10-19 16:10:26', '2017-10-20', '2017-10-19 16:10:06', '2017-10-19 16:11:41');

-- --------------------------------------------------------

--
-- Table structure for table `requisitions`
--

CREATE TABLE `requisitions` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `department_id` int(11) NOT NULL,
  `reason` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `approval_by` int(11) DEFAULT NULL,
  `approved` tinyint(1) NOT NULL DEFAULT '0',
  `issued` tinyint(1) NOT NULL DEFAULT '0',
  `rejected` tinyint(1) NOT NULL DEFAULT '0',
  `approval_date` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `requisition_details`
--

CREATE TABLE `requisition_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `requisition_id` int(10) UNSIGNED NOT NULL,
  `item_id` int(10) UNSIGNED NOT NULL,
  `required_qnt` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', NULL, NULL),
(2, 'Users', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(10) UNSIGNED NOT NULL,
  `sup_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sup_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sup_phone` bigint(20) DEFAULT NULL,
  `sup_account` bigint(20) DEFAULT NULL,
  `sup_address` text COLLATE utf8mb4_unicode_ci,
  `sup_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `sup_name`, `sup_email`, `sup_phone`, `sup_account`, `sup_address`, `sup_image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Huzaifa Jr', 'supplier1@gmail.com', 121242142, NULL, 'test', 'supplier1@gmail.com.jpg', 0, '2017-10-11 05:19:22', '2017-10-14 07:30:19'),
(3, 'Huzaifa', 'huzii@gmail.com', 3112088793, NULL, 'Dastageer 15 number , near Park , house No UNKNOWN', 'huzii@gmail.com.jpg', 1, '2017-10-14 05:56:57', '2017-10-14 05:57:30');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `department_id` int(10) UNSIGNED NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `role_id`, `department_id`, `password`, `profile_image`, `status`, `gender`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Ad', 'admin', 1, 1, '$2y$10$K6P98ls7jpg1K9wDl.7ew.512MbRPP6wLH813997YMwi5OQOwPZVm', 'avatar.png', 1, 1, 'YZH9tAtsK1J7YPg1UaTFQ2S2t3DKLPB1XRUZaJxt9j3G7yVeaTqNfDyA5lcl', NULL, NULL),
(2, 'User1', 'User1', 'user_1', 2, 2, '$2y$10$K6P98ls7jpg1K9wDl.7ew.512MbRPP6wLH813997YMwi5OQOwPZVm', 'avatar.png', 1, 1, 'fvE9YSyCfdmAC7V9NgB3KgF3Vv3FYypf2scaug8p5iNbLhrbXQA5tUMAFT3h', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `grn_details`
--
ALTER TABLE `grn_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grn_masters`
--
ALTER TABLE `grn_masters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `items_catagory_id_foreign` (`catagory_id`),
  ADD KEY `items_type_id_foreign` (`type_id`);

--
-- Indexes for table `item_categories`
--
ALTER TABLE `item_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_types`
--
ALTER TABLE `item_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `my_departments`
--
ALTER TABLE `my_departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `purchase_order_details`
--
ALTER TABLE `purchase_order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchase_order_details_purchase_master_id_foreign` (`purchase_order_master_id`),
  ADD KEY `purchase_order_details_item_id_foreign` (`item_id`);

--
-- Indexes for table `purchase_order_masters`
--
ALTER TABLE `purchase_order_masters`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchase_order_masters_requisition_id_foreign` (`requisition_id`),
  ADD KEY `purchase_order_masters_user_id_foreign` (`user_id`),
  ADD KEY `purchase_order_masters_supplier_id_foreign` (`supplier_id`),
  ADD KEY `purchase_order_masters_approval_by_foreign` (`approval_by`);

--
-- Indexes for table `requisitions`
--
ALTER TABLE `requisitions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `requisitions_user_id_foreign` (`user_id`);

--
-- Indexes for table `requisition_details`
--
ALTER TABLE `requisition_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `requisition_details_item_id_foreign` (`item_id`),
  ADD KEY `requisition_details_requisition_id_foreign` (`requisition_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
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
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD KEY `users_role_id_foreign` (`role_id`),
  ADD KEY `users_department_id_foreign` (`department_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `grn_details`
--
ALTER TABLE `grn_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT for table `grn_masters`
--
ALTER TABLE `grn_masters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `item_categories`
--
ALTER TABLE `item_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `item_types`
--
ALTER TABLE `item_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `my_departments`
--
ALTER TABLE `my_departments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `purchase_order_details`
--
ALTER TABLE `purchase_order_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `purchase_order_masters`
--
ALTER TABLE `purchase_order_masters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `requisitions`
--
ALTER TABLE `requisitions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `requisition_details`
--
ALTER TABLE `requisition_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_catagory_id_foreign` FOREIGN KEY (`catagory_id`) REFERENCES `item_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `items_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `item_types` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `purchase_order_details`
--
ALTER TABLE `purchase_order_details`
  ADD CONSTRAINT `purchase_order_details_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`),
  ADD CONSTRAINT `purchase_order_details_purchase_master_id_foreign` FOREIGN KEY (`purchase_order_master_id`) REFERENCES `purchase_order_masters` (`id`);

--
-- Constraints for table `purchase_order_masters`
--
ALTER TABLE `purchase_order_masters`
  ADD CONSTRAINT `purchase_order_masters_approval_by_foreign` FOREIGN KEY (`approval_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `purchase_order_masters_requisition_id_foreign` FOREIGN KEY (`requisition_id`) REFERENCES `requisitions` (`id`),
  ADD CONSTRAINT `purchase_order_masters_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`),
  ADD CONSTRAINT `purchase_order_masters_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `requisitions`
--
ALTER TABLE `requisitions`
  ADD CONSTRAINT `requisitions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `requisition_details`
--
ALTER TABLE `requisition_details`
  ADD CONSTRAINT `requisition_details_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `requisition_details_requisition_id_foreign` FOREIGN KEY (`requisition_id`) REFERENCES `requisitions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `my_departments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
