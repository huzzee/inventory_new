-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 21, 2017 at 10:33 PM
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
  `recieved_qnt` double(15,3) NOT NULL,
  `per_unit_rate` double(15,3) NOT NULL,
  `total_amount` double(15,3) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

-- --------------------------------------------------------

--
-- Table structure for table `issuance_details`
--

CREATE TABLE `issuance_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `issuance_master_id` int(10) UNSIGNED NOT NULL,
  `item_id` int(10) UNSIGNED NOT NULL,
  `issued_qnt` double(15,3) NOT NULL DEFAULT '0.000',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `issuance_masters`
--

CREATE TABLE `issuance_masters` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `requisition_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(18, 5, 12, 'I Phone 8', 897652, 'Color Black', 'Box', 50, 94, 30, 'I Phone 8_5.JPG', 100000.000, 110000.000, 1, 1, 0, '2017-10-19 10:46:03', '2017-10-20 13:42:01'),
(19, 5, 12, 'I Phone X', 879431, 'Color Red', 'Box', 50, 200, 30, 'I Phone X_5.jpg', 110000.000, 130000.000, 1, 1, 0, '2017-10-19 10:48:25', '2017-10-20 13:42:01'),
(20, 5, 12, 'Samsung S8', 184536, 'Color White,black,red,blue,skin,brown', 'Box', 40, 180, 30, 'Samsung S8_5.jpg', 60000.000, 70000.000, 1, 1, 0, '2017-10-19 10:49:31', '2017-10-20 13:42:01'),
(21, 5, 12, 'Samsung S7', 462722, 'Color Black,white,purple,blue', 'Box', 60, 470, 50, 'Samsung S7_5.jpg', 45000.000, 5000.000, 1, 1, 0, '2017-10-19 10:50:40', '2017-10-20 13:42:01');

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
(8, 'Add Users', 'users/create', 7, 3, NULL, 'users.create', 1, 0, 3, NULL, NULL),
(9, 'Users List', 'users', 7, 4, NULL, 'users.index', 1, 0, 3, NULL, NULL),
(10, 'Edit', NULL, 7, 5, NULL, 'users.edit', 1, 1, 4, NULL, NULL),
(11, 'Users Profile', NULL, 7, 6, NULL, 'users.show', 1, 1, 5, NULL, NULL),
(12, 'Delete', NULL, 7, 7, NULL, 'users.delete', 1, 1, 6, NULL, NULL),
(13, 'Items/Products', NULL, NULL, 0, 'mdi mdi-note-plus-outline', NULL, 1, 0, 7, NULL, NULL),
(14, 'Item Type', 'item_types', 13, 1, NULL, 'item_types.index', 1, 0, 10, NULL, NULL),
(15, 'Item Category', 'item_categories', 13, 2, NULL, 'item_categories.index', 1, 0, 11, NULL, NULL),
(16, 'Add Items', 'items/create', 13, 4, NULL, 'items.create', 1, 0, 8, NULL, NULL),
(17, 'Items List', 'items', 13, 5, NULL, 'items.index', 1, 0, 9, NULL, NULL),
(18, 'Suppliers', NULL, NULL, 0, 'mdi mdi-playlist-plus', NULL, 1, 0, 12, NULL, NULL),
(19, 'Add Supplier', 'suppliers/create', 18, 1, NULL, 'suppliers.create', 1, 0, 13, NULL, NULL),
(20, 'Suppliers List', 'suppliers', 18, 2, NULL, 'suppliers.index', 1, 0, 14, NULL, NULL),
(21, 'Department', 'departments', 7, 1, NULL, 'departments.index', 1, 0, 2, NULL, NULL),
(22, 'Requisitions', NULL, NULL, 0, 'mdi mdi-note-text', NULL, 1, 0, 15, NULL, NULL),
(23, 'Make Requests', 'requisitions/create', 22, 1, NULL, 'requisitions.create', 1, 0, 16, NULL, NULL),
(24, 'Pending Requests', 'requisitions', 22, 2, NULL, 'requisition.index', 1, 0, 17, NULL, NULL),
(25, 'Purchase Order', NULL, NULL, 0, 'mdi mdi-cart', NULL, 1, 0, 18, NULL, NULL),
(26, 'Make Purchase Order', 'purchase/create', 25, 1, NULL, 'purchase.create', 1, 0, 19, NULL, NULL),
(27, 'Orders Request', 'purchase', 25, 2, NULL, 'purchase.index', 1, 0, 20, NULL, NULL),
(28, 'Good Receiving Note ', NULL, NULL, 0, ' mdi mdi-shape-rectangle-plus', NULL, 1, 0, 21, NULL, NULL),
(29, 'Make G.R.N', 'grn/create', 28, 1, NULL, 'grn.create', 1, 0, 22, NULL, NULL),
(30, 'G.R.N List', 'grn', 28, 2, NULL, 'grn', 1, 0, 23, NULL, NULL),
(31, 'Approved Requests', 'requisitions_complete', 22, 3, NULL, 'complete', 1, 0, 17, NULL, NULL),
(32, 'Approved Orders', 'approved_puchase', 25, 3, NULL, 'order', 1, 0, 20, NULL, NULL),
(33, 'Issuance Slip', NULL, NULL, 0, 'mdi mdi-shape-rectangle-plus', NULL, 1, 0, 24, NULL, NULL),
(34, 'Make Issuance Slip ', 'issuance/create', 33, 1, NULL, 'issuance.create', 1, 0, 25, NULL, NULL),
(35, 'Issuance Slip', 'issuance', 33, 2, NULL, 'issuance.index', 1, 0, 26, NULL, NULL),
(36, 'Designation', 'roles', 7, 2, NULL, 'roles.index', 1, 0, 1, NULL, NULL);

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
(46, '2017_10_12_210110_create_users_table', 7),
(47, '2017_10_12_221537_create_requisitions_table', 7),
(48, '2017_10_13_162126_create_requisition_details_table', 7),
(49, '2017_10_15_112938_create_purchase_order_masters_table', 7),
(50, '2017_10_15_113103_create_purchase_order_details_table', 7),
(51, '2017_10_16_193752_create_grn_masters_table', 7),
(52, '2017_10_16_194009_create_grn_details_table', 7),
(53, '2017_10_20_155643_create_issuance_masters_table', 7),
(54, '2017_10_20_161007_create_issuance_details_table', 7),
(55, '2017_10_21_101541_create_permissions_table', 8);

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `menu_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `menu_id`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(481, 35, 6, 0, '2017-10-21 17:26:47', '2017-10-21 17:26:47'),
(482, 34, 6, 0, '2017-10-21 17:26:47', '2017-10-21 17:26:47'),
(483, 33, 6, 0, '2017-10-21 17:26:47', '2017-10-21 17:26:47'),
(484, 30, 6, 0, '2017-10-21 17:26:47', '2017-10-21 17:26:47'),
(485, 29, 6, 0, '2017-10-21 17:26:47', '2017-10-21 17:26:47'),
(486, 28, 6, 0, '2017-10-21 17:26:47', '2017-10-21 17:26:47'),
(487, 27, 6, 0, '2017-10-21 17:26:47', '2017-10-21 17:26:47'),
(488, 32, 6, 0, '2017-10-21 17:26:47', '2017-10-21 17:26:47'),
(489, 26, 6, 0, '2017-10-21 17:26:47', '2017-10-21 17:26:47'),
(490, 25, 6, 0, '2017-10-21 17:26:47', '2017-10-21 17:26:47'),
(491, 24, 6, 0, '2017-10-21 17:26:47', '2017-10-21 17:26:47'),
(492, 31, 6, 0, '2017-10-21 17:26:47', '2017-10-21 17:26:47'),
(493, 23, 6, 0, '2017-10-21 17:26:47', '2017-10-21 17:26:47'),
(494, 22, 6, 0, '2017-10-21 17:26:47', '2017-10-21 17:26:47'),
(495, 20, 6, 1, '2017-10-21 17:26:47', '2017-10-21 17:26:48'),
(496, 19, 6, 1, '2017-10-21 17:26:47', '2017-10-21 17:26:47'),
(497, 18, 6, 1, '2017-10-21 17:26:47', '2017-10-21 17:26:47'),
(498, 15, 6, 1, '2017-10-21 17:26:47', '2017-10-21 17:26:47'),
(499, 14, 6, 1, '2017-10-21 17:26:47', '2017-10-21 17:26:47'),
(500, 17, 6, 1, '2017-10-21 17:26:47', '2017-10-21 17:26:47'),
(501, 16, 6, 1, '2017-10-21 17:26:47', '2017-10-21 17:26:47'),
(502, 13, 6, 1, '2017-10-21 17:26:47', '2017-10-21 17:26:47'),
(503, 12, 6, 1, '2017-10-21 17:26:47', '2017-10-21 17:26:47'),
(504, 11, 6, 1, '2017-10-21 17:26:47', '2017-10-21 17:26:47'),
(505, 10, 6, 1, '2017-10-21 17:26:47', '2017-10-21 17:26:47'),
(506, 8, 6, 1, '2017-10-21 17:26:47', '2017-10-21 17:26:47'),
(507, 9, 6, 1, '2017-10-21 17:26:47', '2017-10-21 17:26:47'),
(508, 21, 6, 1, '2017-10-21 17:26:47', '2017-10-21 17:26:47'),
(509, 36, 6, 1, '2017-10-21 17:26:47', '2017-10-21 17:26:47'),
(510, 7, 6, 1, '2017-10-21 17:26:47', '2017-10-21 17:26:47');

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
  `created_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `requisitions`
--

CREATE TABLE `requisitions` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `department_id` int(11) NOT NULL,
  `reason` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `req_code` bigint(20) NOT NULL,
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
  `superadmin` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_name`, `superadmin`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 1, 1, NULL, NULL),
(3, 'Manager', 0, 1, '2017-10-20 17:21:10', '2017-10-20 17:21:17');

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
(1, 'Admin', 'Abc', 'admin', 1, 1, '$2y$10$3c9d.jcZW.Nb41lOdNX6Le8fBbYEavG7RwKp0FKK/AP8sWoH5opAG', 'avatar.png', 1, 1, NULL, NULL, NULL),
(6, 'Test', 'tests', 'test24', 3, 2, '$2y$10$JGSw8hfxpRXkOT0/EYktLuIXhAQvt8L3DDvFj83YtsZDp1gdxAEFK', 'test24.jpg', 1, 0, NULL, '2017-10-21 17:23:44', '2017-10-21 17:23:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `grn_details`
--
ALTER TABLE `grn_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `grn_details_item_id_foreign` (`item_id`),
  ADD KEY `grn_details_grn_master_id_foreign` (`grn_master_id`);

--
-- Indexes for table `grn_masters`
--
ALTER TABLE `grn_masters`
  ADD PRIMARY KEY (`id`),
  ADD KEY `grn_masters_user_id_foreign` (`user_id`),
  ADD KEY `grn_masters_supplier_id_foreign` (`supplier_id`),
  ADD KEY `grn_masters_purchase_order_id_foreign` (`purchase_order_id`);

--
-- Indexes for table `issuance_details`
--
ALTER TABLE `issuance_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `issuance_details_issuance_master_id_foreign` (`issuance_master_id`),
  ADD KEY `issuance_details_item_id_foreign` (`item_id`);

--
-- Indexes for table `issuance_masters`
--
ALTER TABLE `issuance_masters`
  ADD PRIMARY KEY (`id`),
  ADD KEY `issuance_masters_user_id_foreign` (`user_id`),
  ADD KEY `issuance_masters_requisition_id_foreign` (`requisition_id`);

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
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permissions_menu_id_foreign` (`menu_id`),
  ADD KEY `permissions_user_id_foreign` (`user_id`);

--
-- Indexes for table `purchase_order_details`
--
ALTER TABLE `purchase_order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchase_order_details_purchase_order_master_id_foreign` (`purchase_order_master_id`),
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `grn_masters`
--
ALTER TABLE `grn_masters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `issuance_details`
--
ALTER TABLE `issuance_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `issuance_masters`
--
ALTER TABLE `issuance_masters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT for table `my_departments`
--
ALTER TABLE `my_departments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=511;
--
-- AUTO_INCREMENT for table `purchase_order_details`
--
ALTER TABLE `purchase_order_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `purchase_order_masters`
--
ALTER TABLE `purchase_order_masters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `requisitions`
--
ALTER TABLE `requisitions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `requisition_details`
--
ALTER TABLE `requisition_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `grn_details`
--
ALTER TABLE `grn_details`
  ADD CONSTRAINT `grn_details_grn_master_id_foreign` FOREIGN KEY (`grn_master_id`) REFERENCES `grn_masters` (`id`),
  ADD CONSTRAINT `grn_details_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`);

--
-- Constraints for table `grn_masters`
--
ALTER TABLE `grn_masters`
  ADD CONSTRAINT `grn_masters_purchase_order_id_foreign` FOREIGN KEY (`purchase_order_id`) REFERENCES `purchase_order_masters` (`id`),
  ADD CONSTRAINT `grn_masters_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`),
  ADD CONSTRAINT `grn_masters_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `issuance_details`
--
ALTER TABLE `issuance_details`
  ADD CONSTRAINT `issuance_details_issuance_master_id_foreign` FOREIGN KEY (`issuance_master_id`) REFERENCES `issuance_masters` (`id`),
  ADD CONSTRAINT `issuance_details_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`);

--
-- Constraints for table `issuance_masters`
--
ALTER TABLE `issuance_masters`
  ADD CONSTRAINT `issuance_masters_requisition_id_foreign` FOREIGN KEY (`requisition_id`) REFERENCES `requisitions` (`id`),
  ADD CONSTRAINT `issuance_masters_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_catagory_id_foreign` FOREIGN KEY (`catagory_id`) REFERENCES `item_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `items_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `item_types` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `permissions`
--
ALTER TABLE `permissions`
  ADD CONSTRAINT `permissions_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `purchase_order_details`
--
ALTER TABLE `purchase_order_details`
  ADD CONSTRAINT `purchase_order_details_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`),
  ADD CONSTRAINT `purchase_order_details_purchase_order_master_id_foreign` FOREIGN KEY (`purchase_order_master_id`) REFERENCES `purchase_order_masters` (`id`);

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
