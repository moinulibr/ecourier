-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 02, 2021 at 11:14 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `abutaleb_vai_courier`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_typies`
--

CREATE TABLE `account_typies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `name` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_verified` tinyint(4) NOT NULL DEFAULT 1,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `account_typies`
--

INSERT INTO `account_typies` (`id`, `branch_id`, `name`, `status`, `is_active`, `is_verified`, `deleted_at`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 1, 'Saving Account', 1, 1, 1, NULL, NULL, NULL, NULL),
(2, 1, 'Current Account', 1, 1, 1, NULL, NULL, NULL, NULL),
(3, 1, 'Others Account', 1, 1, 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `agents`
--

CREATE TABLE `agents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `office_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nidnumber` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `district_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `area_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nidcardpdf` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `companytradelicense` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fathernid` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_type` int(11) NOT NULL,
  `mbankingname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mbankingnumber` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bankname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bankbrunch` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accountname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accountnumber` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `agent_detail_informations`
--

CREATE TABLE `agent_detail_informations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_verified` tinyint(4) NOT NULL DEFAULT 1,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `areas`
--

CREATE TABLE `areas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `area_name` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `area_name_bn` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_city_type_id` int(11) DEFAULT NULL,
  `district_id` int(10) DEFAULT NULL,
  `division_id` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_verified` tinyint(4) NOT NULL DEFAULT 1,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `areas`
--

INSERT INTO `areas` (`id`, `area_name`, `area_name_bn`, `service_city_type_id`, `district_id`, `division_id`, `status`, `is_active`, `is_verified`, `deleted_at`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Dhanmondi', 'Dhanmondi', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Mohammadpur(Dhaka)', 'Mohammadpur(Dhaka)', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Gulshan', 'Gulshan', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Kallyanpur', 'Kallyanpur', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'Shyamoli', 'Shyamoli', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'Adabor', 'Adabor', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'Darussalam', 'Darussalam', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'Gabtoli', 'Gabtoli', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'Pallabi', 'Pallabi', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'Lalmatia', 'Lalmatia', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'Mirpur DOHS', 'Mirpur DOHS', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 'Kochukhet', 'Kochukhet', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 'Gudaraghat', 'Gudaraghat', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 'Agargaon', 'Agargaon', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 'Monipur', 'Monipur', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 'Sher-E-Bangla Nagar', 'Sher-E-Bangla Nagar', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 'Ibrahimpur', 'Ibrahimpur', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 'Dhaka Cantonment', 'Dhaka Cantonment', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 'Mirpur Cantonment', 'Mirpur Cantonment', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 'Kafrul', 'Kafrul', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 'Vashantek', 'Vashantek', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, 'Manikdi', 'Manikdi', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, 'Matikata', 'Matikata', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, 'M.E.S', 'M.E.S', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(26, 'Rupnagar Residential Area', 'Rupnagar Residential', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, 'Duaripara', 'Duaripara', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(28, 'Rainkhola', 'Rainkhola', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(29, 'Mirpur Diabari', 'Mirpur Diabari', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(30, 'Mazar Road', 'Mazar Road', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(31, 'Shagufta', 'Shagufta', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(32, 'Bawnia', 'Bawnia', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(33, 'Baigertek', 'Baigertek', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(34, 'Madina nagar', 'Madina nagar', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(35, 'Dewanpara', 'Dewanpara', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(36, 'Namapara', 'Namapara', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(37, 'Mastertek', 'Mastertek', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(38, 'Balughat', 'Balughat', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(39, 'Barontek', 'Barontek', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(40, 'Goltek', 'Goltek', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(41, 'Kurmitola', 'Kurmitola', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(42, 'Shewra', 'Shewra', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(43, 'Uttara', 'Uttara', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(44, 'Uttarkhan', 'Uttarkhan', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(45, 'Dakshinkhan', 'Dakshinkhan', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(46, 'Fayedabad', 'Fayedabad', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(47, 'Ashkona', 'Ashkona', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(48, 'Kuril', 'Kuril', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(49, 'Khilkhet', 'Khilkhet', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(50, 'Nikunja', 'Nikunja', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(51, 'Azampur', 'Azampur', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(52, 'Hajipara', 'Hajipara', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(53, 'Kawla', 'Kawla', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(54, 'Naddapara', 'Naddapara', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(55, 'Bashundhara R/A', 'Bashundhara R/A', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(56, 'Vatara', 'Vatara', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(57, 'Nadda', 'Nadda', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(58, 'Baridhara', 'Baridhara', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(59, 'Baridhara DOHS', 'Baridhara DOHS', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(60, 'Notun Bazar', 'Notun Bazar', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(61, 'Badda', 'Badda', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(62, 'Shahjadpur', 'Shahjadpur', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(63, 'Uttor Badda', 'Uttor Badda', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(64, 'Middle Badda', 'Middle Badda', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(65, 'South Badda', 'South Badda', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(66, 'Merul Badda', 'Merul Badda', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(67, 'Niketon', 'Niketon', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(68, 'Banani', 'Banani', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(69, 'Banani DOHS', 'Banani DOHS', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(70, 'Mohakhali', 'Mohakhali', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(71, 'Mohakhali DOHS', 'Mohakhali DOHS', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(72, 'South Monipur', 'South Monipur', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(73, 'Shah Ali Bag', 'Shah Ali Bag', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(74, 'Aziz Palli', 'Aziz Palli', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(75, 'Bashtola', 'Bashtola', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(76, 'South Baridhara', 'South Baridhara', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(77, 'Aftabnagar', 'Aftabnagar', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(78, 'Bijoy Shoroni', 'Bijoy Shoroni', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(79, 'Farmgate', 'Farmgate', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(80, 'Indira Road', 'Indira Road', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(81, 'Tejgaon', 'Tejgaon', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(82, 'Tejkunipara', 'Tejkunipara', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(83, 'Razabazar', 'Razabazar', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(84, 'Sukrabad', 'Sukrabad', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(85, 'Panthopath', 'Panthopath', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(86, 'Kalabagan', 'Kalabagan', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(87, 'Green Road', 'Green Road', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(88, 'Manik Mia Avenue', 'Manik Mia Avenue', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(89, 'Asad Avenue', 'Asad Avenue', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(90, 'West Dhanmondi', 'West Dhanmondi', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(91, 'Shankar', 'Shankar', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(92, 'Rayer Bazar', 'Rayer Bazar', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(93, 'Tallabag', 'Tallabag', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(94, 'Hazaribag', 'Hazaribag', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(95, 'Pilkhana', 'Pilkhana', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(96, 'Nawabgonj Puran Dhaka', 'Nawabgonj Puran Dhak', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(97, 'New Market', 'New Market', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(98, 'Azimpur', 'Azimpur', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(99, 'Nilkhet', 'Nilkhet', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(100, 'Lalbagh', 'Lalbagh', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(101, 'Chawkbazar (Dhaka)', 'Chawkbazar (Dhaka)', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(102, 'Naya Bazar', 'Naya Bazar', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(103, 'Tatibazar', 'Tatibazar', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(104, 'Luxmi Bazar', 'Luxmi Bazar', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(105, 'Puran Dhaka', 'Puran Dhaka', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(106, 'Siddique Bazar', 'Siddique Bazar', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(107, 'Tikatuly', 'Tikatuly', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(108, 'Motijheel', 'Motijheel', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(109, 'Nawabpur', 'Nawabpur', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(110, 'Kaptan Bazar', 'Kaptan Bazar', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(111, 'Gulistan', 'Gulistan', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(112, 'Bongo Bazar', 'Bongo Bazar', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(113, 'Chankarpul', 'Chankarpul', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(114, 'Palashi', 'Palashi', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(115, 'Dhakeshwari', 'Dhakeshwari', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(116, 'Kamalapur', 'Kamalapur', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(117, 'Wari', 'Wari', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(118, 'Narinda', 'Narinda', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(119, 'Dainik Bangla Mor', 'Dainik Bangla Mor', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(120, 'Fakirapul', 'Fakirapul', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(121, 'Kakrail', 'Kakrail', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(122, 'Naya Paltan', 'Naya Paltan', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(123, 'Bijoynagar', 'Bijoynagar', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(124, 'Press Club', 'Press Club', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(125, 'High Court', 'High Court', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(126, 'Dhaka University', 'Dhaka University', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(127, 'Dhaka Medical', 'Dhaka Medical', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(128, 'Bongo Bondhu Avenue', 'Bongo Bondhu Avenue', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(129, 'Kazi Nazrul Islam Avenue', 'Kazi Nazrul Islam Av', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(130, 'Kawran Bazar', 'Kawran Bazar', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(131, 'Ramna', 'Ramna', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(132, 'Shantinagar', 'Shantinagar', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(133, 'Shantibag', 'Shantibag', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(134, 'Baily Road', 'Baily Road', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(135, 'Minto Road', 'Minto Road', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(136, 'Old Elephant Road', 'Old Elephant Road', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(137, 'Eskaton Garden Road', 'Eskaton Garden Road', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(138, 'Eskaton', 'Eskaton', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(139, 'Moghbazar', 'Moghbazar', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(140, 'Mouchak', 'Mouchak', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(141, 'Malibag', 'Malibag', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(142, 'Rampura', 'Rampura', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(143, 'Shahbag', 'Shahbag', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(144, 'Katabon', 'Katabon', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(145, 'Hatirpool', 'Hatirpool', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(146, 'Bashabo', 'Bashabo', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(147, 'Khilgaon', 'Khilgaon', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(148, 'Middle Bashabo', 'Middle Bashabo', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(149, 'Goran', 'Goran', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(150, 'Madartek', 'Madartek', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(151, 'Manik Nagar', 'Manik Nagar', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(152, 'Shahjahanpur', 'Shahjahanpur', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(153, 'Banasree', 'Banasree', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(154, 'Meradia', 'Meradia', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(155, 'Khilbari Tek', 'Khilbari Tek', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(156, 'Bawaliapara', 'Bawaliapara', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(157, 'Mughdapara', 'Mughdapara', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(158, 'Golapbag (Dhaka)', 'Golapbag (Dhaka)', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(159, 'Jatrabari', 'Jatrabari', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(160, 'Hatirjheel', 'Hatirjheel', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(161, 'Banglamotor', 'Banglamotor', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(162, 'Paribag', 'Paribag', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(163, 'Bakshibazar', 'Bakshibazar', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(164, 'Elephant Road', 'Elephant Road', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(165, 'Kathalbagan', 'Kathalbagan', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(166, 'Malibagh Taltola', 'Malibagh Taltola', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(167, 'Central Road', 'Central Road', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(168, 'Sabujbag', 'Sabujbag', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(169, 'Shiddheswari', 'Shiddheswari', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(170, 'Dolaikhal', 'Dolaikhal', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(171, 'Shegunbagicha', 'Shegunbagicha', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(172, 'Rajarbag', 'Rajarbag', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(173, 'Babubazar', 'Babubazar', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(174, 'Islampur(Dhaka)', 'Islampur(Dhaka)', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(175, 'Imamgonj', 'Imamgonj', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(176, 'Nayabazar', 'Nayabazar', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(177, 'Zigatola', 'Zigatola', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(178, 'Kazipara', 'Kazipara', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(179, 'Shewrapara', 'Shewrapara', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(180, 'Kalshi', 'Kalshi', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(181, 'Sutrapur', 'Sutrapur', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(182, 'Purana Paltan', 'Purana Paltan', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(183, 'Shyampur', 'Shyampur', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(184, 'Dholaipar', 'Dholaipar', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(185, 'Monipuripara', 'Monipuripara', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(186, 'Bosila', 'Bosila', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(187, 'Shonir Akhra', 'Shonir Akhra', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(188, 'Mirpur(Dhaka)', 'Mirpur(Dhaka)', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(189, 'Bongshal', 'Bongshal', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(190, 'Siddweswari', 'Siddweswari', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(191, 'Nakhalpara', 'Nakhalpara', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(192, 'Dokshingaon', 'Dokshingaon', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(193, 'Joar Shahara', 'Joar Shahara', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(194, 'Science Lab', 'Science Lab', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(195, 'Sobhanbag', 'Sobhanbag', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(196, 'ECB Chattar', 'ECB Chattar', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(197, 'Arambag', 'Arambag', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(198, 'Armanitola', 'Armanitola', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(199, 'Islambag', 'Islambag', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(200, 'Kamarpara', 'Kamarpara', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(201, 'Mitford', 'Mitford', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(202, 'Shakhari Bazar', 'Shakhari Bazar', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(203, 'Katherpol', 'Katherpol', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(204, 'Bangla Bazar', 'Bangla Bazar', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(205, 'Patuatuly', 'Patuatuly', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(206, 'Nandipara', 'Nandipara', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(207, 'Nazira Bazar', 'Nazira Bazar', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(208, 'Gopibag', 'Gopibag', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(209, 'Shwamibag', 'Shwamibag', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(210, 'Sayedabad', 'Sayedabad', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(211, 'Sadarghat (Dhaka)', 'Sadarghat (Dhaka)', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(212, 'Kaltabazar', 'Kaltabazar', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(213, 'Jurain', 'Jurain', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(214, 'Gandaria', 'Gandaria', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(215, 'RayerBag', 'RayerBag', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(216, 'Faridabad', 'Faridabad', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(217, 'Matuail', 'Matuail', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(218, 'Donia', 'Donia', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(219, 'Postogola', 'Postogola', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(220, 'Konapara', 'Konapara', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(221, 'Dhaka Uddyan', 'Dhaka Uddyan', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(222, 'Shekhertek', 'Shekhertek', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(223, 'CWH', 'CWH', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(224, 'Mirpur Taltola', 'Mirpur Taltola', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(225, 'Manda(Dhaka)', 'Manda(Dhaka)', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(226, 'Shahjahanpur (Dhaka)', 'Shahjahanpur (Dhaka)', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(227, 'Haterrjheel', 'Haterrjheel', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(228, 'Dhaka uddan', 'Dhaka uddan', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(229, 'Nobodoy', 'Nobodoy', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(230, 'Chad Uddan', 'Chad Uddan', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(231, 'Mohammadia Housing', 'Mohammadia Housing', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(232, 'Ring Road', 'Ring Road', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(233, 'Tajmahal Road', 'Tajmahal Road', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(234, 'Nurjahan Road', 'Nurjahan Road', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(235, 'Rajia Sultana Road', 'Rajia Sultana Road', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(236, 'Uttara Sector-4', 'Uttara Sector-4', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(237, 'Goaltek', 'Goaltek', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(238, 'Chalabon', 'Chalabon', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(239, 'Mollapara', 'Mollapara', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(240, 'Azampur (East)', 'Azampur (East)', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(241, 'Uttara Sector 5', 'Uttara Sector 5', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(242, 'Uttara Sector 14', 'Uttara Sector 14', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(243, 'Uttara Sector 3', 'Uttara Sector 3', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(244, 'Uttara Sector 7', 'Uttara Sector 7', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(245, 'Uttara Sector 9', 'Uttara Sector 9', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(246, 'Uttara Sector 11', 'Uttara Sector 11', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(247, 'Nalbhog', 'Nalbhog', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(248, 'Azampur (West)', 'Azampur (West)', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(249, 'Phulbaria', 'Phulbaria', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(250, 'Dhour', 'Dhour', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(251, 'Bhatuliya', 'Bhatuliya', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(252, 'Bamnartek', 'Bamnartek', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(253, 'Turag', 'Turag', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(254, 'Kallanpur', 'Kallanpur', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(255, 'Lalkuthi', 'Lalkuthi', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(256, 'Mirpur 1', 'Mirpur 1', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(257, 'Tolarbag', 'Tolarbag', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(258, 'Ahmed Nagar', 'Ahmed Nagar', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(259, 'Paikpara', 'Paikpara', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(260, 'Pirerbag', 'Pirerbag', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(261, 'Taltola', 'Taltola', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(262, 'MES Colony', 'MES Colony', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(263, 'Zia Colony', 'Zia Colony', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(264, 'Ajiz Market', 'Ajiz Market', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(265, 'Aga Nagar', 'Aga Nagar', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(266, 'Kunipara', 'Kunipara', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(267, 'Babli Masjid', 'Babli Masjid', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(268, 'Kaderabad Housing', 'Kaderabad Housing', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(269, 'Kunia', 'Kunia', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(270, 'Gacha', 'Gacha', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(271, 'Boro Bari', 'Boro Bari', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(272, 'Board Bazar', 'Board Bazar', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(273, 'Kamarjuri', 'Kamarjuri', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(274, 'Dattapara', 'Dattapara', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(275, 'Ershadnagar', 'Ershadnagar', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(276, 'Sataish', 'Sataish', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(277, 'Apollo', 'Apollo', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(278, 'Nurer Chala', 'Nurer Chala', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(279, 'Bawaila Para', 'Bawaila Para', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(280, 'Satarkul', 'Satarkul', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(281, 'Khilbar Tek', 'Khilbar Tek', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(282, 'Buddho Mondir', 'Buddho Mondir', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(283, 'Sipahibag', 'Sipahibag', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(284, 'TT Para', 'TT Para', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(285, 'Eastern Housing', 'Eastern Housing', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(286, 'Teskunipara', 'Teskunipara', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(287, 'DHAKA TENARI MORE', 'DHAKA TENARI MORE', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(288, 'Shahidnagar', 'Shahidnagar', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(289, 'Jhigatola', 'Jhigatola', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(290, 'Polashi', 'Polashi', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(291, 'Satmoshjid Road', 'Satmoshjid Road', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(292, 'Shukrabad', 'Shukrabad', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(293, 'BNP Bazar', 'BNP Bazar', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(294, 'Kalachandpur', 'Kalachandpur', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(295, 'Jogonnathpur', 'Jogonnathpur', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(296, 'Kuratuli', 'Kuratuli', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(297, 'Alatunnessa School Road', 'Alatunnessa School R', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(298, 'Purbo Rampura', 'Purbo Rampura', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(299, 'Bou Bazar', 'Bou Bazar', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(300, 'Chairman Goli', 'Chairman Goli', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(301, 'Confidence Tower', 'Confidence Tower', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(302, 'Fuji Trade Center', 'Fuji Trade Center', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(303, 'Khil Barirtek', 'Khil Barirtek', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(304, 'Korail', 'Korail', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(305, 'Mahanogor', 'Mahanogor', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(306, 'Nimtola', 'Nimtola', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(307, 'Nurerchala', 'Nurerchala', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(308, 'Pastola Bazar', 'Pastola Bazar', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(309, 'Poschim Badda', 'Poschim Badda', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(310, 'Purbo Badda', 'Purbo Badda', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(311, 'Sat-tola Bazar', 'Sat-tola Bazar', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(312, 'Shaheenbagh', 'Shaheenbagh', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(313, 'Subastu', 'Subastu', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(314, 'ICDDRB', 'ICDDRB', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(315, 'Satrasta', 'Satrasta', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(316, 'Tekpara Adorsonagor', 'Tekpara Adorsonagor', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(317, 'Uttar Badda', 'Uttar Badda', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(318, 'Wireless', 'Wireless', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(319, 'Solmaid', 'Solmaid', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(320, '300 Feet', '300 Feet', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(321, 'Mirhazirbagh', 'Mirhazirbagh', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(322, 'Mahut Tuli', 'Mahut Tuli', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(323, 'Alubazar', 'Alubazar', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(324, 'Badam Toli', 'Badam Toli', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(325, 'Chamelibag', 'Chamelibag', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(326, 'Dholaikhal', 'Dholaikhal', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(327, 'Doyagonj', 'Doyagonj', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(328, 'Farashgong', 'Farashgong', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(329, 'Dholpur', 'Dholpur', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(330, 'Kodomtoli', 'Kodomtoli', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(331, 'Kotwali', 'Kotwali', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(332, 'Railway Colony', 'Railway Colony', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(333, 'Rajar Dewri', 'Rajar Dewri', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(334, 'Sat rowja', 'Sat rowja', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(335, 'Tantibazar', 'Tantibazar', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(336, 'Rosulbagh', 'Rosulbagh', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(337, 'Gopalpur', 'Gopalpur', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(338, 'College Gate', 'College Gate', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(339, 'Badekomelosshor', 'Badekomelosshor', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(340, 'Rail Station', 'Rail Station', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(341, 'Uttarkhan Mazar', 'Uttarkhan Mazar', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(342, 'Dakshinkhan Bazar', 'Dakshinkhan Bazar', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(343, 'Hajipara-Dakshinkhan', 'Hajipara-Dakshinkhan', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(344, 'Ranavola', 'Ranavola', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(345, 'Joynal Market', 'Joynal Market', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(346, 'Johura Market', 'Johura Market', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(347, 'Habib Market', 'Habib Market', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(348, 'BDR Market-House Building', 'BDR Market-House Bui', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(349, 'BDR Market-Sector 6', 'BDR Market-Sector 6', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(350, 'Moinartek', 'Moinartek', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(351, 'Atipara', 'Atipara', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(352, 'Kot Bari', 'Kot Bari', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(353, 'Abdullahpur', 'Abdullahpur', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(354, 'Mollartek', 'Mollartek', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(355, 'Gawair', 'Gawair', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(356, 'Kosaibari', 'Kosaibari', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(357, 'Prembagan', 'Prembagan', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(358, 'Kachkura', 'Kachkura', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(359, 'Helal Market', 'Helal Market', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(360, 'Chamur Khan', 'Chamur Khan', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(361, 'Society', 'Society', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(362, 'Ismailkholla', 'Ismailkholla', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(363, 'Masterpara', 'Masterpara', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(364, 'Munda', 'Munda', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(365, 'Barua', 'Barua', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(366, 'Namapara-Khilkhet', 'Namapara-Khilkhet', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(367, 'Ahalia-Uttara', 'Ahalia-Uttara', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(368, 'Ainusbag-Uttara', 'Ainusbag-Uttara', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(369, 'Diabari', 'Diabari', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(370, 'Habib Market-Uttara', 'Habib Market-Uttara', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(371, 'Pakuria-Uttara', 'Pakuria-Uttara', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(372, 'Aftab Nagar', 'Aftab Nagar', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(373, 'Gulbagh', 'Gulbagh', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(374, 'Meradiya Bazar', 'Meradiya Bazar', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(375, 'Mirbagh', 'Mirbagh', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(376, 'Modhubagh', 'Modhubagh', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(377, 'Rampura TV center', 'Rampura TV center', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(378, 'TV gate', 'TV gate', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(379, 'Ulan road', 'Ulan road', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(380, 'Mirpur 10', 'Mirpur 10', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(381, 'Gudaraghat-Mirpur', 'Gudaraghat-Mirpur', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(382, 'Namapara-Mirpur', 'Namapara-Mirpur', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(383, 'Oxygen', 'Oxygen', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(384, 'Technical', 'Technical', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(385, 'Mirpur:13', 'Mirpur:13', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(386, 'Benaroshi Polli', 'Benaroshi Polli', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(387, 'Beribadh-Mirpur', 'Beribadh-Mirpur', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(388, 'Buddhijibi Road', 'Buddhijibi Road', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(389, 'Cantonment', 'Cantonment', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(390, 'Mondir-Mirpur', 'Mondir-Mirpur', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(391, 'Palasnagor', 'Palasnagor', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(392, 'Purobi', 'Purobi', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(393, 'Rupnagor', 'Rupnagor', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(394, 'Senpara', 'Senpara', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(395, 'BRTA', 'BRTA', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(396, 'Zoo', 'Zoo', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(397, 'Address Problem', 'Address Problem', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(398, 'Savar', 'Savar', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(399, 'Savar Cantonment', 'Savar Cantonment', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(400, 'Demra', 'Demra', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(401, 'Ashulia', 'Ashulia', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(402, 'Amin Bazar', 'Amin Bazar', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(403, 'Kamrangichar', 'Kamrangichar', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(404, 'Keranigonj', 'Keranigonj', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(405, 'Dhamrai', 'Dhamrai', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(406, 'Kalatia', 'Kalatia', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(407, 'Baipayl', 'Baipayl', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(408, 'Birulia', 'Birulia', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(410, 'Kathuria', 'Kathuria', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(411, 'Goljarbag', 'Goljarbag', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(412, 'Nazirabag', 'Nazirabag', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(413, 'Kaliganj', 'Kaliganj', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(414, 'Nazarganj', 'Nazarganj', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(415, 'Zinzira', 'Zinzira', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(416, 'Auchpara', 'Auchpara', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(417, 'Cherag Ali', 'Cherag Ali', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(418, 'Tongi Bazar (Dhaka)', 'Tongi Bazar (Dhaka)', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(419, 'Bhuigarh-Narayangonj', 'Bhuigarh-Narayangonj', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(420, 'Hasnabad', 'Hasnabad', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(421, 'Khairtail', 'Khairtail', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(422, 'Bonomala', 'Bonomala', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(423, 'Morkun', 'Morkun', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(424, 'Bhadam', 'Bhadam', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(425, 'Boro Dewra Dakkhin Para', 'Boro Dewra Dakkhin P', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(426, 'Boardbazar', 'Boardbazar', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(427, 'Gazipura', 'Gazipura', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(428, 'Hossain Market (Tongi)', 'Hossain Market (Tong', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(429, 'Signboard', 'Signboard', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(430, 'Joydebpur', 'Joydebpur', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(431, 'Dhirasrom', 'Dhirasrom', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(432, 'Dattapara Road', 'Dattapara Road', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(433, 'Borobari', 'Borobari', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(434, 'Choidana', 'Choidana', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(435, 'Deger Chala', 'Deger Chala', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(436, 'Gazcha', 'Gazcha', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(437, 'Hariken', 'Hariken', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(438, 'Khartail', 'Khartail', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(439, 'Majukhan', 'Majukhan', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(440, 'Milgate', 'Milgate', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(441, 'National University', 'National University', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(442, 'Surtaranga', 'Surtaranga', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(443, 'Targach', 'Targach', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(444, 'Boro Dewra', 'Boro Dewra', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(445, 'Dohar', 'Dohar', 1, 1, 3, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(446, 'Nawabgonj (Dhaka)', 'Nawabgonj (Dhaka)', 2, 1, 8, 1, 1, 1, NULL, NULL, '0000-00-00 00:00:00', '2021-01-08 16:31:34'),
(447, 'Thakurgaon Sadar', 'ঠাকুরগাঁও সদর', 3, 33, 6, 1, 1, 1, NULL, NULL, '2021-01-08 16:32:16', '2021-01-08 16:32:16'),
(448, 'Baliadangi', 'বালিয়াডাঙ্গী', 3, 33, 6, 1, 1, 1, NULL, NULL, '2021-01-08 16:32:44', '2021-01-08 16:32:44'),
(449, 'Ranisongkol', 'রাণীসৈংকল', 3, 33, 6, 1, 1, 1, NULL, NULL, '2021-01-08 16:33:34', '2021-01-08 16:33:34'),
(450, 'Pirganj', 'পীরগঞ্জ', 3, 33, 6, 1, 1, 1, NULL, NULL, '2021-01-08 16:34:06', '2021-01-08 16:34:06'),
(451, 'Horipur', 'হরিপুর', 3, 33, 6, 1, 1, 1, NULL, NULL, '2021-01-08 16:34:43', '2021-01-08 16:34:43'),
(452, 'Mymensingh Sadar', 'ময়মনসিংহ  সদর', 1, 10, 8, 1, 1, 1, NULL, NULL, '2021-01-08 16:36:20', '2021-01-08 16:36:20'),
(453, 'Chattogram Sadar', 'চট্রগ্রাম', 1, 43, 2, 1, 1, 1, NULL, NULL, '2021-01-08 16:37:35', '2021-01-08 16:37:35'),
(454, 'Munshiganj', 'মুন্সিগঞ্জ', 3, 9, 3, 1, 1, 1, NULL, NULL, '2021-01-09 04:05:01', '2021-01-09 04:05:01');

-- --------------------------------------------------------

--
-- Table structure for table `area_branch`
--

CREATE TABLE `area_branch` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `area_id` int(11) DEFAULT NULL,
  `district_id` int(11) DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_verified` tinyint(4) NOT NULL DEFAULT 1,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `area_branch`
--

INSERT INTO `area_branch` (`id`, `area_id`, `district_id`, `branch_id`, `status`, `is_active`, `is_verified`, `deleted_at`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 453, 43, 2, 1, 1, 1, NULL, 1, '2021-01-08 16:41:23', '2021-01-08 16:41:23'),
(2, 452, 10, 3, 1, 1, 1, NULL, 1, '2021-01-08 16:42:41', '2021-01-08 16:42:41'),
(3, 1, 1, 1, 1, 1, 1, NULL, 1, '2021-01-09 13:13:34', '2021-01-09 13:13:34'),
(4, 2, 1, 1, 1, 1, 1, NULL, 1, '2021-01-09 13:53:35', '2021-01-09 13:53:35'),
(5, 4, 1, 1, 1, 1, 1, NULL, 1, '2021-01-09 13:53:44', '2021-01-09 13:53:44'),
(6, 5, 1, 1, 1, 1, 1, NULL, 1, '2021-01-09 13:53:54', '2021-01-09 13:53:54'),
(7, 6, 1, 1, 1, 1, 1, NULL, 1, '2021-01-09 13:54:03', '2021-01-09 13:54:03'),
(8, 7, 1, 1, 1, 1, 1, NULL, 1, '2021-01-09 13:54:12', '2021-01-09 13:54:12'),
(9, 8, 1, 1, 1, 1, 1, NULL, 1, '2021-01-09 13:54:24', '2021-01-09 13:54:24'),
(10, 9, 1, 1, 1, 1, 1, NULL, 1, '2021-01-09 13:54:35', '2021-01-09 13:54:35'),
(11, 10, 1, 1, 1, 1, 1, NULL, 1, '2021-01-09 13:54:45', '2021-01-09 13:54:45'),
(12, 11, 1, 1, 1, 1, 1, NULL, 1, '2021-01-09 13:54:57', '2021-01-09 13:54:57');

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_verified` tinyint(4) NOT NULL DEFAULT 1,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`id`, `branch_id`, `name`, `status`, `is_active`, `is_verified`, `deleted_at`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 1, 'AB Bank LTD', 1, 1, 1, '0000-00-00 00:00:00', 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 1, 'Agrani Bank LTD', 1, 1, 1, '0000-00-00 00:00:00', 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 1, 'Al-Arafah Islami Bank LTD', 1, 1, 1, '0000-00-00 00:00:00', 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 1, 'Ansar-VDP Unnayan Bank', 1, 1, 1, '0000-00-00 00:00:00', 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 1, 'Bangladesh Commerce Bank LTD', 1, 1, 1, '0000-00-00 00:00:00', 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 1, 'Bangladesh Development Bank LTD', 1, 1, 1, '0000-00-00 00:00:00', 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 1, 'Bangladesh Krishi Bank', 1, 1, 1, '0000-00-00 00:00:00', 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 1, 'Bangladesh Krishibank LTD', 1, 1, 1, '0000-00-00 00:00:00', 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 1, 'Bangladesh Samabaya Bank Ltd', 1, 1, 1, '0000-00-00 00:00:00', 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 1, 'Bank Al-Falah', 1, 1, 1, '0000-00-00 00:00:00', 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 1, 'Bank Asia LTD', 1, 1, 1, '0000-00-00 00:00:00', 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 1, 'BASIC Bank LTD', 1, 1, 1, '0000-00-00 00:00:00', 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 1, 'BDBL (Bangladesh Development Bank LTD)', 1, 1, 1, '0000-00-00 00:00:00', 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 1, 'BRAC Bank LTD', 1, 1, 1, '0000-00-00 00:00:00', 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 1, 'Citibank NA', 1, 1, 1, '0000-00-00 00:00:00', 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 1, 'Commercial Bank of Ceylon', 1, 1, 1, '0000-00-00 00:00:00', 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 1, 'Dhaka Bank LTD', 1, 1, 1, '0000-00-00 00:00:00', 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, 1, 'Dutch Bangla Bank LTD', 1, 1, 1, '0000-00-00 00:00:00', 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, 1, 'Dutch-Bangla Bank LTD', 1, 1, 1, '0000-00-00 00:00:00', 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, 1, 'Eastern Bank LTD', 1, 1, 1, '0000-00-00 00:00:00', 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, 1, 'EXIM Bank LTD', 1, 1, 1, '0000-00-00 00:00:00', 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(28, 1, 'Export Import Bank of Bangladesh LTD', 1, 1, 1, '0000-00-00 00:00:00', 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(29, 1, 'First Security Islami Bank LTD', 1, 1, 1, '0000-00-00 00:00:00', 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(31, 1, 'Grameen Bank', 1, 1, 1, '0000-00-00 00:00:00', 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(32, 1, 'Habib Bank LTD', 1, 1, 1, '0000-00-00 00:00:00', 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(34, 1, 'HSBC (The Hong Kong and Shanghai Banking Corporation Ltd.)', 1, 1, 1, '0000-00-00 00:00:00', 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(35, 1, 'ICB Islamic Bank LTD', 1, 1, 1, '0000-00-00 00:00:00', 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(37, 1, 'IFIC Bank LTD', 1, 1, 1, '0000-00-00 00:00:00', 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(39, 1, 'Islami Bank Bangladesh LTD', 1, 1, 1, '0000-00-00 00:00:00', 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(41, 1, 'Jamuna Bank LTD', 1, 1, 1, '0000-00-00 00:00:00', 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(43, 1, 'Janata Bank LTD', 1, 1, 1, '0000-00-00 00:00:00', 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(44, 1, 'Karmasangsthan Bank', 1, 1, 1, '0000-00-00 00:00:00', 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(45, 1, 'Meghna Bank Llimited', 1, 1, 1, '0000-00-00 00:00:00', 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(46, 1, 'Meghna Bank LTD', 1, 1, 1, '0000-00-00 00:00:00', 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(47, 1, 'Mercantile Bank LTD', 1, 1, 1, '0000-00-00 00:00:00', 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(49, 1, 'Midland Bank LTD', 1, 1, 1, '0000-00-00 00:00:00', 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(51, 1, 'Modhumoti Bank LTD', 1, 1, 1, '0000-00-00 00:00:00', 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(53, 1, 'Mutual Trust Bank LTD', 1, 1, 1, '0000-00-00 00:00:00', 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(55, 1, 'National Bank LTD', 1, 1, 1, '0000-00-00 00:00:00', 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(57, 1, 'National Bank of Pakistan', 1, 1, 1, '0000-00-00 00:00:00', 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(58, 1, 'NCC Bank LTD', 1, 1, 1, '0000-00-00 00:00:00', 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(59, 1, 'NRB Bank LTD', 1, 1, 1, '0000-00-00 00:00:00', 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(61, 1, 'NRB Commercial Bank Ltd', 1, 1, 1, '0000-00-00 00:00:00', 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(63, 1, 'NRB Global Bank LTD', 1, 1, 1, '0000-00-00 00:00:00', 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(65, 1, 'One Bank LTD', 1, 1, 1, '0000-00-00 00:00:00', 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(67, 1, 'Palli Sanchay Bank', 1, 1, 1, '0000-00-00 00:00:00', 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(68, 1, 'Prime Bank LTD', 1, 1, 1, '0000-00-00 00:00:00', 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(70, 1, 'Probashi Kallyan Bank', 1, 1, 1, '0000-00-00 00:00:00', 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(71, 1, 'Progoti Co-operative Land Development Bank LTD (Progoti Bank)', 1, 1, 1, '0000-00-00 00:00:00', 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(72, 1, 'Pubali Bank LTD', 1, 1, 1, '0000-00-00 00:00:00', 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(74, 1, 'Rajshahi Krishi Unnayan Bank', 1, 1, 1, '0000-00-00 00:00:00', 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(75, 1, 'Rupali Bank LTD', 1, 1, 1, '0000-00-00 00:00:00', 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(76, 1, 'SBAC Bank LTD', 1, 1, 1, '0000-00-00 00:00:00', 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(77, 1, 'Shahjalal Islami Bank LTD', 1, 1, 1, '0000-00-00 00:00:00', 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(79, 1, 'Simanto Bank LTD (proposed)', 1, 1, 1, '0000-00-00 00:00:00', 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(80, 1, 'Social Islami Bank LTD', 1, 1, 1, '0000-00-00 00:00:00', 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(82, 1, 'Sonali Bank LTD', 1, 1, 1, '0000-00-00 00:00:00', 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(84, 1, 'South Bangla Agriculture and Commerce Bank LTD (www.sbacbank.com)', 1, 1, 1, '0000-00-00 00:00:00', 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(85, 1, 'Southeast Bank LTD', 1, 1, 1, '0000-00-00 00:00:00', 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(87, 1, 'Standard Bank LTD', 1, 1, 1, '0000-00-00 00:00:00', 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(89, 1, 'Standard Chartered Bank', 1, 1, 1, '0000-00-00 00:00:00', 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(90, 1, 'Standard Chartered Bank LTD', 1, 1, 1, '0000-00-00 00:00:00', 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(91, 1, 'State Bank of India', 1, 1, 1, '0000-00-00 00:00:00', 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(92, 1, 'The City Bank LTD', 1, 1, 1, '0000-00-00 00:00:00', 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(94, 1, 'The Dhaka Mercantile co-operative Bank Ltd', 1, 1, 1, '0000-00-00 00:00:00', 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(95, 1, 'The Farmers Bank LTD', 1, 1, 1, '0000-00-00 00:00:00', 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(96, 1, 'The Premier Bank LTD', 1, 1, 1, '0000-00-00 00:00:00', 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(97, 1, 'Trust Bank LTD', 1, 1, 1, '0000-00-00 00:00:00', 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(99, 1, 'Union Bank LTD', 1, 1, 1, '0000-00-00 00:00:00', 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(101, 1, 'United Commercial Bank LTD', 1, 1, 1, '0000-00-00 00:00:00', 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(103, 1, 'Uttara Bank LTD', 1, 1, 1, '0000-00-00 00:00:00', 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(105, 1, 'Woori Bank', 1, 1, 1, '0000-00-00 00:00:00', 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `bank_accounts`
--

CREATE TABLE `bank_accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `payment_method_id` int(11) DEFAULT NULL,
  `bank_id` int(11) DEFAULT NULL,
  `account_name` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_no` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_type_id` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_verified` tinyint(4) NOT NULL DEFAULT 1,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `area_id` int(11) DEFAULT NULL,
  `branch_type_id` int(11) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `district_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_verified` tinyint(4) NOT NULL DEFAULT 1,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `company_name`, `area_id`, `branch_type_id`, `parent_id`, `district_id`, `status`, `is_active`, `is_verified`, `deleted_at`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Dakbd', 1, 1, 1, '1', 1, 1, 1, NULL, NULL, NULL, NULL),
(2, 'Chattogram Agent', 453, 4, 1, '43', 1, 1, 1, NULL, 1, '2021-01-08 16:39:49', '2021-01-08 16:39:49'),
(3, 'Mymensingh Agent', 452, 4, 1, '10', 1, 1, 1, NULL, 1, '2021-01-08 16:40:45', '2021-01-08 17:22:40');

-- --------------------------------------------------------

--
-- Table structure for table `branch_commissions`
--

CREATE TABLE `branch_commissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `branch_commission_setting_id` int(11) DEFAULT NULL,
  `branch_type_id` int(11) DEFAULT NULL,
  `branch_commission_type_id` int(11) DEFAULT NULL,
  `charge` decimal(20,2) DEFAULT NULL,
  `commission` decimal(20,2) DEFAULT NULL,
  `payment_status` tinyint(4) NOT NULL DEFAULT 1,
  `active_status` tinyint(4) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_verified` tinyint(4) NOT NULL DEFAULT 1,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `branch_commission_settings`
--

CREATE TABLE `branch_commission_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `branch_type_id` int(11) DEFAULT NULL,
  `create_and_pick_commission_type_id` int(11) NOT NULL DEFAULT 1,
  `create_and_pick_commission_amount` decimal(20,2) NOT NULL DEFAULT 0.00,
  `create_pick_and_delivery_commision_type_id` int(11) NOT NULL DEFAULT 1,
  `create_pick_and_delivery_commision_amount` decimal(20,2) NOT NULL DEFAULT 0.00,
  `receive_and_delivery_commision_type_id` int(11) NOT NULL DEFAULT 1,
  `receive_and_delivery_commision_amount` decimal(20,2) NOT NULL DEFAULT 0.00,
  `receive_as_media_commision_type_id` int(11) NOT NULL DEFAULT 1,
  `receive_as_media_commision_amount` decimal(20,2) NOT NULL DEFAULT 0.00,
  `sending_as_media_commision_type_id` int(11) NOT NULL DEFAULT 1,
  `sending_as_media_commision_amount` decimal(20,2) NOT NULL DEFAULT 0.00,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_verified` tinyint(4) NOT NULL DEFAULT 1,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `branch_commission_settings`
--

INSERT INTO `branch_commission_settings` (`id`, `branch_id`, `branch_type_id`, `create_and_pick_commission_type_id`, `create_and_pick_commission_amount`, `create_pick_and_delivery_commision_type_id`, `create_pick_and_delivery_commision_amount`, `receive_and_delivery_commision_type_id`, `receive_and_delivery_commision_amount`, `receive_as_media_commision_type_id`, `receive_as_media_commision_amount`, `sending_as_media_commision_type_id`, `sending_as_media_commision_amount`, `status`, `is_active`, `is_verified`, `deleted_at`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '10.00', 1, '40.00', 1, '20.00', 1, '2.00', 1, '2.00', 1, 1, 1, NULL, NULL, NULL, NULL),
(2, 2, 4, 1, '10.00', 1, '40.00', 1, '30.00', 1, '2.00', 1, '2.00', 1, 1, 1, NULL, NULL, NULL, NULL),
(3, 3, 4, 1, '10.00', 1, '40.00', 1, '30.00', 1, '2.00', 1, '2.00', 1, 1, 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `branch_commission_typies`
--

CREATE TABLE `branch_commission_typies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_verified` tinyint(4) NOT NULL DEFAULT 1,
  `deleted_at` datetime DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `branch_commission_typies`
--

INSERT INTO `branch_commission_typies` (`id`, `name`, `status`, `is_active`, `is_verified`, `deleted_at`, `branch_id`, `created_at`, `updated_at`) VALUES
(1, 'Create And Pickup Commission', 1, 1, 1, NULL, NULL, NULL, NULL),
(2, 'Create Pickup and Delivery Commission', 1, 1, 1, NULL, NULL, NULL, NULL),
(3, 'Receive And Delivery Commission', 1, 1, 1, NULL, NULL, NULL, NULL),
(4, 'Receive As Media Commission', 1, 1, 1, NULL, NULL, NULL, NULL),
(5, 'Sending As Media Commission', 1, 1, 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `branch_pay_to_merchant_client_invoices`
--

CREATE TABLE `branch_pay_to_merchant_client_invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `payment_invoice_no` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from_branch_id` int(11) DEFAULT NULL,
  `payment_amount` decimal(20,2) DEFAULT NULL,
  `payment_method_id` int(11) DEFAULT NULL,
  `payment_status_id` int(11) NOT NULL DEFAULT 1,
  `payment_by` int(11) DEFAULT NULL,
  `payment_at` datetime DEFAULT NULL,
  `parcel_owner_type_id` int(11) DEFAULT NULL,
  `pay_to_merchant_client_id` int(11) DEFAULT NULL,
  `payment_received_by` int(11) DEFAULT NULL,
  `payment_received_at` datetime DEFAULT NULL,
  `payment_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_note` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_verified` tinyint(4) NOT NULL DEFAULT 1,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `branch_pay_to_merchant_client_invoice_details`
--

CREATE TABLE `branch_pay_to_merchant_client_invoice_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `branch_pay_to_merchant_client_invoice_id` int(11) DEFAULT NULL,
  `parcel_owner_type_id` int(11) DEFAULT NULL,
  `paid_from_branch_id` int(11) DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL,
  `receive_amount_history_id` int(11) DEFAULT NULL,
  `receive_amount_type_id` int(11) DEFAULT NULL,
  `pay_to_merchant_client_id` tinyint(4) DEFAULT NULL,
  `amount` decimal(20,2) DEFAULT NULL,
  `service_charge` decimal(20,2) DEFAULT NULL,
  `cod_charge` decimal(20,3) DEFAULT NULL,
  `others_charge` decimal(20,2) DEFAULT NULL,
  `total_charge` decimal(20,2) DEFAULT NULL,
  `product_amount` decimal(20,2) DEFAULT NULL,
  `payment_method_id` int(11) DEFAULT NULL,
  `payment_status_id` int(11) DEFAULT NULL,
  `payment_by` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_verified` tinyint(4) NOT NULL DEFAULT 1,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `branch_profits`
--

CREATE TABLE `branch_profits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `branch_type_id` int(11) DEFAULT NULL,
  `commission_amount` decimal(20,2) DEFAULT NULL,
  `transportation_cost` decimal(20,2) DEFAULT NULL,
  `other_cost` decimal(20,2) DEFAULT NULL,
  `profit_amount` decimal(20,2) DEFAULT NULL,
  `payment_status` tinyint(4) NOT NULL DEFAULT 1,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_verified` tinyint(4) NOT NULL DEFAULT 1,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `branch_typies`
--

CREATE TABLE `branch_typies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_verified` tinyint(4) NOT NULL DEFAULT 1,
  `deleted_at` datetime DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `branch_typies`
--

INSERT INTO `branch_typies` (`id`, `name`, `status`, `is_active`, `is_verified`, `deleted_at`, `branch_id`, `created_at`, `updated_at`) VALUES
(1, 'Head Office', 1, 1, 1, NULL, NULL, NULL, NULL),
(2, 'Sub Office', 1, 1, 1, NULL, NULL, NULL, NULL),
(3, 'Hub', 1, 1, 1, NULL, NULL, NULL, NULL),
(4, 'Agent', 1, 1, 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `business_typies`
--

CREATE TABLE `business_typies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_verified` tinyint(4) NOT NULL DEFAULT 1,
  `deleted_at` datetime DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `business_typies`
--

INSERT INTO `business_typies` (`id`, `name`, `status`, `is_active`, `is_verified`, `deleted_at`, `branch_id`, `created_at`, `updated_at`) VALUES
(1, 'Both (Logistic & Courier)', 1, 1, 1, NULL, NULL, NULL, NULL),
(2, 'Courier', 1, 1, 1, NULL, NULL, NULL, NULL),
(3, 'Logistic', 1, 1, 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `commission_typies`
--

CREATE TABLE `commission_typies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_verified` tinyint(4) NOT NULL DEFAULT 1,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `commission_typies`
--

INSERT INTO `commission_typies` (`id`, `name`, `branch_id`, `status`, `is_active`, `is_verified`, `deleted_at`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Parcent', 1, 1, 1, 1, NULL, NULL, NULL, NULL),
(2, 'Fixed', 1, 1, 1, 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `company_profits`
--

CREATE TABLE `company_profits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `branch_type_id` int(11) DEFAULT NULL,
  `charge` decimal(20,2) DEFAULT NULL,
  `provided_commission` decimal(20,2) DEFAULT NULL,
  `transportation_cost` decimal(20,2) DEFAULT NULL,
  `other_cost` decimal(20,2) DEFAULT NULL,
  `total_cost` decimal(20,2) DEFAULT NULL,
  `profit_amount` decimal(20,2) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_verified` tinyint(4) NOT NULL DEFAULT 1,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_phone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `area_id` int(11) DEFAULT NULL,
  `district_id` int(11) DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_verified` tinyint(4) NOT NULL DEFAULT 1,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `customer_name`, `customer_phone`, `area_id`, `district_id`, `branch_id`, `address`, `status`, `is_active`, `is_verified`, `deleted_at`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Md Moinul Islam', '01712794033', 1, 1, 1, 'Mirpur-10\r\nMirpur-10', 1, 1, 1, NULL, NULL, '2021-02-01 11:12:06', '2021-02-01 11:12:06'),
(2, 'dhaka from chattagong', '323434', 2, 1, 1, 'dhaka from chattagong', 1, 1, 1, NULL, NULL, '2021-02-02 04:45:18', '2021-02-02 04:45:18');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_men`
--

CREATE TABLE `delivery_men` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mother_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nidnumber` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nidcardpage` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fathernid` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cvfile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `delivery_men`
--

INSERT INTO `delivery_men` (`id`, `name`, `father_name`, `mother_name`, `father_mobile`, `email`, `mobile`, `nidnumber`, `nidcardpage`, `fathernid`, `cvfile`, `address`, `status`, `created_at`, `updated_at`) VALUES
(2, 'customer_phone', 'asdfasdf', 'fasfdasdf', '0171722226', 'mahafuj@gmail.com', '0171722226', 'asdfasdf', 'public/images/users/5fed3a5241570.pdf', 'public/images/users/5fed3a5241987.pdf', 'public/images/users/5fed3a5241bef.pdf', 'Sylhet biani bazar', 1, '2020-12-31 02:41:22', '2020-12-31 02:41:22');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_otps`
--

CREATE TABLE `delivery_otps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `otp` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_status` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_verified` tinyint(4) NOT NULL DEFAULT 1,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `delivey_charge_typies`
--

CREATE TABLE `delivey_charge_typies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_verified` tinyint(4) NOT NULL DEFAULT 1,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `delivey_charge_typies`
--

INSERT INTO `delivey_charge_typies` (`id`, `name`, `status`, `is_active`, `is_verified`, `deleted_at`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Include Chagre', 1, 1, 1, NULL, NULL, NULL, NULL),
(2, 'Exclude Charge', 1, 1, 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `delivey_parcel_amount_typies`
--

CREATE TABLE `delivey_parcel_amount_typies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_verified` tinyint(4) NOT NULL DEFAULT 1,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `delivey_parcel_amount_typies`
--

INSERT INTO `delivey_parcel_amount_typies` (`id`, `name`, `status`, `is_active`, `is_verified`, `deleted_at`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Cash On Delivery', 1, 1, 1, NULL, NULL, NULL, NULL),
(2, 'Pre-paid', 1, 1, 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` int(2) UNSIGNED NOT NULL,
  `division_id` int(2) UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL,
  `bn_name` varchar(50) NOT NULL,
  `lat` double NOT NULL,
  `lon` double NOT NULL,
  `website` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `division_id`, `name`, `bn_name`, `lat`, `lon`, `website`) VALUES
(1, 3, 'Dhaka', 'ঢাকা', 23.7115253, 90.4111451, 'www.dhaka.gov.bd'),
(2, 3, 'Faridpur', 'ফরিদপুর', 23.6070822, 89.8429406, 'www.faridpur.gov.bd'),
(3, 3, 'Gazipur', 'গাজীপুর', 24.0022858, 90.4264283, 'www.gazipur.gov.bd'),
(4, 3, 'Gopalganj', 'গোপালগঞ্জ', 23.0050857, 89.8266059, 'www.gopalganj.gov.bd'),
(5, 8, 'Jamalpur', 'জামালপুর', 24.937533, 89.937775, 'www.jamalpur.gov.bd'),
(6, 3, 'Kishoreganj', 'কিশোরগঞ্জ', 24.444937, 90.776575, 'www.kishoreganj.gov.bd'),
(7, 3, 'Madaripur', 'মাদারীপুর', 23.164102, 90.1896805, 'www.madaripur.gov.bd'),
(8, 3, 'Manikganj', 'মানিকগঞ্জ', 0, 0, 'www.manikganj.gov.bd'),
(9, 3, 'Munshiganj', 'মুন্সিগঞ্জ', 0, 0, 'www.munshiganj.gov.bd'),
(10, 8, 'Mymensingh', 'ময়মনসিংহ', 0, 0, 'www.mymensingh.gov.bd'),
(11, 3, 'Narayanganj', 'নারায়াণগঞ্জ', 23.63366, 90.496482, 'www.narayanganj.gov.bd'),
(12, 3, 'Narsingdi', 'নরসিংদী', 23.932233, 90.71541, 'www.narsingdi.gov.bd'),
(13, 8, 'Netrokona', 'নেত্রকোণা', 24.870955, 90.727887, 'www.netrokona.gov.bd'),
(14, 3, 'Rajbari', 'রাজবাড়ি', 23.7574305, 89.6444665, 'www.rajbari.gov.bd'),
(15, 3, 'Shariatpur', 'শরীয়তপুর', 0, 0, 'www.shariatpur.gov.bd'),
(16, 8, 'Sherpur', 'শেরপুর', 25.0204933, 90.0152966, 'www.sherpur.gov.bd'),
(17, 3, 'Tangail', 'টাঙ্গাইল', 0, 0, 'www.tangail.gov.bd'),
(18, 5, 'Bogura', 'বগুড়া', 24.8465228, 89.377755, 'www.bogra.gov.bd'),
(19, 5, 'Joypurhat', 'জয়পুরহাট', 0, 0, 'www.joypurhat.gov.bd'),
(20, 5, 'Naogaon', 'নওগাঁ', 0, 0, 'www.naogaon.gov.bd'),
(21, 5, 'Natore', 'নাটোর', 24.420556, 89.000282, 'www.natore.gov.bd'),
(22, 5, 'Chapainawabganj', 'চাঁপাইনবাবগঞ্জ', 24.5965034, 88.2775122, 'www.chapainawabganj.gov.bd'),
(23, 5, 'Pabna', 'পাবনা', 23.998524, 89.233645, 'www.pabna.gov.bd'),
(24, 5, 'Rajshahi', 'রাজশাহী', 0, 0, 'www.rajshahi.gov.bd'),
(25, 5, 'Sirajgonj', 'সিরাজগঞ্জ', 24.4533978, 89.7006815, 'www.sirajganj.gov.bd'),
(26, 6, 'Dinajpur', 'দিনাজপুর', 25.6217061, 88.6354504, 'www.dinajpur.gov.bd'),
(27, 6, 'Gaibandha', 'গাইবান্ধা', 25.328751, 89.528088, 'www.gaibandha.gov.bd'),
(28, 6, 'Kurigram', 'কুড়িগ্রাম', 25.805445, 89.636174, 'www.kurigram.gov.bd'),
(29, 6, 'Lalmonirhat', 'লালমনিরহাট', 0, 0, 'www.lalmonirhat.gov.bd'),
(30, 6, 'Nilphamari', 'নীলফামারী', 25.931794, 88.856006, 'www.nilphamari.gov.bd'),
(31, 6, 'Panchagarh', 'পঞ্চগড়', 26.3411, 88.5541606, 'www.panchagarh.gov.bd'),
(32, 6, 'Rangpur', 'রংপুর', 25.7558096, 89.244462, 'www.rangpur.gov.bd'),
(33, 6, 'Thakurgaon', 'ঠাকুরগাঁও', 26.0336945, 88.4616834, 'www.thakurgaon.gov.bd'),
(34, 1, 'Barguna', 'বরগুনা', 0, 0, 'www.barguna.gov.bd'),
(35, 1, 'Barishal', 'বরিশাল', 0, 0, 'www.barisal.gov.bd'),
(36, 1, 'Bhola', 'ভোলা', 22.685923, 90.648179, 'www.bhola.gov.bd'),
(37, 1, 'Jhalokati', 'ঝালকাঠি', 0, 0, 'www.jhalakathi.gov.bd'),
(38, 1, 'Patuakhali', 'পটুয়াখালী', 22.3596316, 90.3298712, 'www.patuakhali.gov.bd'),
(39, 1, 'Pirojpur', 'পিরোজপুর', 0, 0, 'www.pirojpur.gov.bd'),
(40, 2, 'Bandarban', 'বান্দরবান', 22.1953275, 92.2183773, 'www.bandarban.gov.bd'),
(41, 2, 'Brahmanbaria', 'ব্রাহ্মণবাড়িয়া', 23.9570904, 91.1119286, 'www.brahmanbaria.gov.bd'),
(42, 2, 'Chandpur', 'চাঁদপুর', 23.2332585, 90.6712912, 'www.chandpur.gov.bd'),
(43, 2, 'Chattogram', 'চট্টগ্রাম', 22.335109, 91.834073, 'www.chittagong.gov.bd'),
(44, 2, 'Cumilla', 'কুমিল্লা', 23.4682747, 91.1788135, 'www.comilla.gov.bd'),
(45, 2, 'Cox\'s Bazar', 'কক্স বাজার', 0, 0, 'www.coxsbazar.gov.bd'),
(46, 2, 'Feni', 'ফেনী', 23.023231, 91.3840844, 'www.feni.gov.bd'),
(47, 2, 'Khagrachhari', 'খাগড়াছড়ি', 23.119285, 91.984663, 'www.khagrachhari.gov.bd'),
(48, 2, 'Lakshmipur', 'লক্ষ্মীপুর', 22.942477, 90.841184, 'www.lakshmipur.gov.bd'),
(49, 2, 'Noakhali', 'নোয়াখালী', 22.869563, 91.099398, 'www.noakhali.gov.bd'),
(50, 2, 'Rangamati', 'রাঙ্গামাটি', 0, 0, 'www.rangamati.gov.bd'),
(51, 7, 'Habiganj', 'হবিগঞ্জ', 24.374945, 91.41553, 'www.habiganj.gov.bd'),
(52, 7, 'Moulvibazar', 'মৌলভীবাজার', 24.482934, 91.777417, 'www.moulvibazar.gov.bd'),
(53, 7, 'Sunamganj', 'সুনামগঞ্জ', 25.0658042, 91.3950115, 'www.sunamganj.gov.bd'),
(54, 7, 'Sylhet', 'সিলেট', 24.8897956, 91.8697894, 'www.sylhet.gov.bd'),
(55, 4, 'Bagerhat', 'বাগেরহাট', 22.651568, 89.785938, 'www.bagerhat.gov.bd'),
(56, 4, 'Chuadanga', 'চুয়াডাঙ্গা', 23.6401961, 88.841841, 'www.chuadanga.gov.bd'),
(57, 4, 'Jashore', 'যশোর', 23.16643, 89.2081126, 'www.jessore.gov.bd'),
(58, 4, 'Jhenaidah', 'ঝিনাইদহ', 23.5448176, 89.1539213, 'www.jhenaidah.gov.bd'),
(59, 4, 'Khulna', 'খুলনা', 22.815774, 89.568679, 'www.khulna.gov.bd'),
(60, 4, 'Kushtia', 'কুষ্টিয়া', 23.901258, 89.120482, 'www.kushtia.gov.bd'),
(61, 4, 'Magura', 'মাগুরা', 23.487337, 89.419956, 'www.magura.gov.bd'),
(62, 4, 'Meherpur', 'মেহেরপুর', 23.762213, 88.631821, 'www.meherpur.gov.bd'),
(63, 4, 'Narail', 'নড়াইল', 23.172534, 89.512672, 'www.narail.gov.bd'),
(64, 4, 'Satkhira', 'সাতক্ষীরা', 0, 0, 'www.satkhira.gov.bd');

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE `divisions` (
  `id` int(2) UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL,
  `bn_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`id`, `name`, `bn_name`) VALUES
(1, 'Barishal', 'বরিশাল'),
(2, 'Chattogram', 'চট্টগ্রাম'),
(3, 'Dhaka', 'ঢাকা'),
(4, 'Khulna', 'খুলনা'),
(5, 'Rajshahi', 'রাজশাহী'),
(6, 'Rangpur', 'রংপুর'),
(7, 'Sylhet', 'সিলেট'),
(8, 'Mymensingh', 'ময়মনসিংহ');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `final_success_cancel_statuses`
--

CREATE TABLE `final_success_cancel_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_verified` tinyint(4) NOT NULL DEFAULT 1,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `final_success_cancel_statuses`
--

INSERT INTO `final_success_cancel_statuses` (`id`, `name`, `status`, `is_active`, `is_verified`, `deleted_at`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Deliverd Successfully', 1, 1, 1, NULL, NULL, NULL, NULL),
(2, 'Cancel by Customer', 1, 1, 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `general_customers`
--

CREATE TABLE `general_customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `area_id` int(11) DEFAULT NULL,
  `district_id` int(11) DEFAULT NULL,
  `verified_by` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_verified` tinyint(4) NOT NULL DEFAULT 1,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `general_customers`
--

INSERT INTO `general_customers` (`id`, `name`, `phone`, `email`, `password`, `branch_id`, `address`, `area_id`, `district_id`, `verified_by`, `status`, `is_active`, `is_verified`, `deleted_at`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Md Moinul Islam', '01712794033', NULL, NULL, 2, '', 453, 43, NULL, 1, 1, 1, NULL, NULL, '2021-02-01 11:12:06', '2021-02-01 11:12:06'),
(2, 'test to dhaka from chattagong', '34324', NULL, NULL, 2, '', 453, 43, NULL, 1, 1, 1, NULL, NULL, '2021-02-02 04:45:18', '2021-02-02 04:45:18');

-- --------------------------------------------------------

--
-- Table structure for table `head_office_pay_to_branch_invoices`
--

CREATE TABLE `head_office_pay_to_branch_invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `payment_invoice_no` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from_branch_id` int(11) DEFAULT NULL,
  `payment_amount` decimal(20,2) DEFAULT NULL,
  `payment_method_id` int(11) DEFAULT NULL,
  `payment_status_id` int(11) NOT NULL DEFAULT 1,
  `payment_by` int(11) DEFAULT NULL,
  `payment_at` datetime DEFAULT NULL,
  `payment_received_by` int(11) DEFAULT NULL,
  `received_branch_id` int(11) DEFAULT NULL,
  `payment_received_at` datetime DEFAULT NULL,
  `payment_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_note` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_verified` tinyint(4) NOT NULL DEFAULT 1,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `head_office_pay_to_branch_invoice_details`
--

CREATE TABLE `head_office_pay_to_branch_invoice_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `head_office_pay_to_branch_invoice_id` int(11) DEFAULT NULL,
  `receive_amount_history_id` int(11) DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL,
  `receive_amount_type_id` int(11) DEFAULT NULL,
  `amount` decimal(20,2) DEFAULT NULL,
  `payment_method_id` int(11) DEFAULT NULL,
  `received_branch_id` int(11) DEFAULT NULL,
  `parcel_amount_payment_status_id` int(11) DEFAULT NULL,
  `payment_status_id` int(11) DEFAULT NULL,
  `payment_by` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_verified` tinyint(4) NOT NULL DEFAULT 1,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hub_detail_informations`
--

CREATE TABLE `hub_detail_informations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_verified` tinyint(4) NOT NULL DEFAULT 1,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `instant_all_charge_received_statuses`
--

CREATE TABLE `instant_all_charge_received_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_verified` tinyint(4) NOT NULL DEFAULT 1,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `instant_all_charge_received_statuses`
--

INSERT INTO `instant_all_charge_received_statuses` (`id`, `name`, `status`, `is_active`, `is_verified`, `deleted_at`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Service Charge', 1, 1, 1, NULL, NULL, NULL, NULL),
(2, 'Service Charge & COD Charge', 1, 1, 1, NULL, NULL, NULL, NULL),
(3, 'COD Charge', 1, 1, 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `manpower_assign_to_areas`
--

CREATE TABLE `manpower_assign_to_areas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `area_id` int(11) DEFAULT NULL,
  `district_id` int(11) DEFAULT NULL,
  `manpower_id` int(11) DEFAULT NULL,
  `manpower_type_id` int(11) DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_verified` tinyint(4) NOT NULL DEFAULT 1,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `manpower_assign_to_areas`
--

INSERT INTO `manpower_assign_to_areas` (`id`, `area_id`, `district_id`, `manpower_id`, `manpower_type_id`, `branch_id`, `status`, `is_active`, `is_verified`, `deleted_at`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 453, 43, 4, 3, 1, 1, 1, 1, NULL, NULL, '2021-01-08 17:05:58', '2021-01-08 17:05:58'),
(2, 452, 10, 5, 3, 1, 1, 1, 1, NULL, NULL, '2021-01-08 17:07:31', '2021-01-08 17:07:31'),
(3, 380, 1, 6, 3, 1, 1, 1, 1, NULL, NULL, '2021-01-08 17:10:22', '2021-01-08 17:10:22'),
(4, 1, 1, 7, 3, 2, 1, 1, 1, NULL, NULL, '2021-01-08 17:11:56', '2021-01-08 17:11:56'),
(5, 5, 1, 8, 3, 1, 1, 1, 1, NULL, NULL, '2021-01-08 17:12:45', '2021-01-08 17:12:45'),
(6, 10, 1, 9, 3, 1, 1, 1, 1, NULL, NULL, '2021-01-09 04:46:13', '2021-01-09 04:46:13');

-- --------------------------------------------------------

--
-- Table structure for table `manpower_commission_settings`
--

CREATE TABLE `manpower_commission_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `manpower_id` int(11) DEFAULT NULL,
  `manpower_type_id` int(11) DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `branch_type_id` int(11) DEFAULT NULL,
  `pickup_commission_type_id` int(11) NOT NULL DEFAULT 1,
  `pickup_commission_amount` decimal(20,2) NOT NULL DEFAULT 0.00,
  `delivery_commission_type_id` int(11) NOT NULL DEFAULT 1,
  `delivery_commission_amount` decimal(20,2) NOT NULL DEFAULT 0.00,
  `return_commission_type_id` int(11) NOT NULL DEFAULT 1,
  `return_commission_amount_amount` decimal(20,2) NOT NULL DEFAULT 0.00,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_verified` tinyint(4) NOT NULL DEFAULT 1,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `manpower_commission_settings`
--

INSERT INTO `manpower_commission_settings` (`id`, `manpower_id`, `manpower_type_id`, `branch_id`, `branch_type_id`, `pickup_commission_type_id`, `pickup_commission_amount`, `delivery_commission_type_id`, `delivery_commission_amount`, `return_commission_type_id`, `return_commission_amount_amount`, `status`, `is_active`, `is_verified`, `deleted_at`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 4, 3, 2, 4, 1, '0.00', 1, '0.00', 1, '0.00', 1, 1, 1, NULL, NULL, '2021-01-08 17:05:41', '2021-01-08 17:05:41'),
(2, 5, 3, 3, 4, 1, '0.00', 1, '0.00', 1, '0.00', 1, 1, 1, NULL, NULL, '2021-01-08 17:07:18', '2021-01-08 17:07:18'),
(3, 6, 3, 1, 1, 1, '10.00', 1, '40.00', 1, '40.00', 1, 1, 1, NULL, NULL, '2021-01-08 17:10:22', '2021-01-08 17:10:50'),
(4, 7, 3, 2, 1, 1, '10.00', 1, '40.00', 1, '0.00', 1, 1, 1, NULL, NULL, '2021-01-08 17:11:56', '2021-01-08 17:11:56'),
(5, 8, 3, 1, 1, 1, '20.00', 1, '40.00', 1, '20.00', 1, 1, 1, NULL, NULL, '2021-01-08 17:12:45', '2021-01-08 17:12:45'),
(6, 9, 3, 1, 1, 1, '10.00', 1, '40.00', 1, '0.00', 1, 1, 1, NULL, NULL, '2021-01-09 04:46:13', '2021-01-09 04:46:13');

-- --------------------------------------------------------

--
-- Table structure for table `manpower_detail_informations`
--

CREATE TABLE `manpower_detail_informations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_verified` tinyint(4) NOT NULL DEFAULT 1,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `manpower_income_histories`
--

CREATE TABLE `manpower_income_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `manpower_id` int(11) DEFAULT NULL,
  `order_processing_type_id` int(11) DEFAULT NULL,
  `received_by` int(11) DEFAULT NULL,
  `amount` decimal(20,2) DEFAULT NULL,
  `received_from` int(11) DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `payment_status_id` tinyint(4) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_verified` tinyint(4) NOT NULL DEFAULT 1,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `manpower_typies`
--

CREATE TABLE `manpower_typies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_verified` tinyint(4) NOT NULL DEFAULT 1,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `manpower_typies`
--

INSERT INTO `manpower_typies` (`id`, `name`, `status`, `is_active`, `is_verified`, `deleted_at`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Delivery', 1, 1, 1, NULL, NULL, NULL, NULL),
(2, 'Pickup', 1, 1, 1, NULL, NULL, NULL, NULL),
(3, 'Pick & Delivery', 1, 1, 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `merchants`
--

CREATE TABLE `merchants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `office_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pickupaddress` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `division_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `area_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mbankingname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mbankingnumber` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bankname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bankbrunch` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accountname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accountnumber` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `merchants`
--

INSERT INTO `merchants` (`id`, `name`, `company_name`, `email`, `mobile`, `password`, `office_address`, `pickupaddress`, `division_id`, `district_id`, `area_id`, `payment_type`, `mbankingname`, `mbankingnumber`, `bankname`, `bankbrunch`, `accountname`, `accountnumber`, `account_type`, `status`, `created_at`, `updated_at`) VALUES
(1, 'customer_phone', '120', 'mahafuj@gmail.com', '0171722226', 'afsdfas', 'Sylhet biani bazar', 'Sylhet biani bazar', '3', '1', '4', '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2020-12-31 02:36:44', '2020-12-31 02:36:44');

-- --------------------------------------------------------

--
-- Table structure for table `merchant_settings`
--

CREATE TABLE `merchant_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `merchant_id` int(11) NOT NULL,
  `company_name` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_phone` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_charge_activate` tinyint(4) NOT NULL DEFAULT 0,
  `delivery_charge_same_city` decimal(20,2) NOT NULL DEFAULT 0.00,
  `delivery_charge_out_of_city` decimal(20,2) NOT NULL DEFAULT 0.00,
  `delivery_charge_other_city` decimal(20,2) NOT NULL DEFAULT 0.00,
  `return_charge_activate` tinyint(4) NOT NULL DEFAULT 0,
  `return_charge_same_city` decimal(20,2) NOT NULL DEFAULT 0.00,
  `return_charge_out_of_city` decimal(20,2) NOT NULL DEFAULT 0.00,
  `return_charge_other_city` decimal(20,2) NOT NULL DEFAULT 0.00,
  `cod_charge_activate` tinyint(4) NOT NULL DEFAULT 0,
  `cod_charge_type` enum('percent','fixed') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'percent',
  `cod_charge_same_city` decimal(20,2) NOT NULL DEFAULT 0.00,
  `cod_charge_out_of_city` decimal(20,2) NOT NULL DEFAULT 0.00,
  `cod_charge_other_city` decimal(20,2) NOT NULL DEFAULT 0.00,
  `others_charge` decimal(20,2) NOT NULL DEFAULT 0.00,
  `rca_order_return_parcent` decimal(20,2) NOT NULL DEFAULT 0.00,
  `delivery_otp_activate` tinyint(4) NOT NULL DEFAULT 0,
  `prepaid_delivery_otp` tinyint(4) NOT NULL DEFAULT 0,
  `cash_on_delivery_otp` tinyint(4) NOT NULL DEFAULT 0,
  `payment_receive_confirmation` tinyint(4) NOT NULL DEFAULT 0,
  `payment_method_id` int(11) DEFAULT NULL,
  `bank_account_id` int(11) DEFAULT NULL,
  `fb_fan_page` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_logo` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `area_id` int(11) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_verified` tinyint(4) NOT NULL DEFAULT 1,
  `deleted_at` datetime DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `merchant_settings`
--

INSERT INTO `merchant_settings` (`id`, `merchant_id`, `company_name`, `company_phone`, `delivery_charge_activate`, `delivery_charge_same_city`, `delivery_charge_out_of_city`, `delivery_charge_other_city`, `return_charge_activate`, `return_charge_same_city`, `return_charge_out_of_city`, `return_charge_other_city`, `cod_charge_activate`, `cod_charge_type`, `cod_charge_same_city`, `cod_charge_out_of_city`, `cod_charge_other_city`, `others_charge`, `rca_order_return_parcent`, `delivery_otp_activate`, `prepaid_delivery_otp`, `cash_on_delivery_otp`, `payment_receive_confirmation`, `payment_method_id`, `bank_account_id`, `fb_fan_page`, `website`, `company_logo`, `address`, `area_id`, `city_id`, `status`, `is_active`, `is_verified`, `deleted_at`, `branch_id`, `created_at`, `updated_at`) VALUES
(1, 3, 'Believe Store', '01755560204', 1, '5.00', '10.00', '10.00', 1, '0.00', '0.00', '0.00', 1, 'percent', '1.00', '1.00', '1.00', '0.00', '0.00', 1, 0, 0, 1, 1, 1, NULL, 'www.believestore.com', NULL, 'Mirpur', 10, 1, 1, 1, 1, NULL, 1, '2021-01-08 16:52:58', '2021-01-09 04:58:40'),
(2, 4, NULL, NULL, 0, '0.00', '0.00', '0.00', 0, '0.00', '0.00', '0.00', 1, 'percent', '1.00', '1.00', '1.00', '0.00', '0.00', 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, '2021-01-08 17:05:41', '2021-01-08 17:05:41'),
(3, 5, NULL, NULL, 0, '0.00', '0.00', '0.00', 0, '0.00', '0.00', '0.00', 1, 'percent', '1.00', '1.00', '1.00', '0.00', '0.00', 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, '2021-01-08 17:07:18', '2021-01-08 17:07:18'),
(4, 10, NULL, NULL, 1, '0.00', '0.00', '0.00', 1, '0.00', '0.00', '0.00', 1, 'percent', '1.00', '1.00', '1.00', '0.00', '0.00', 1, 0, 0, 1, 1, 1, NULL, NULL, NULL, NULL, 453, 43, 1, 1, 1, NULL, 1, '2021-01-09 05:03:49', '2021-01-09 05:36:22');

-- --------------------------------------------------------

--
-- Table structure for table `merchant_shops`
--

CREATE TABLE `merchant_shops` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `merchant_id` int(11) NOT NULL,
  `activate_status` tinyint(4) NOT NULL DEFAULT 0,
  `shop_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shop_address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pickup_address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `area_id` int(11) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `pickup_area_id` int(11) DEFAULT NULL,
  `pickup_city_id` int(11) DEFAULT NULL,
  `pickup_phone` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shop_email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_verified` tinyint(4) NOT NULL DEFAULT 1,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `merchant_shops`
--

INSERT INTO `merchant_shops` (`id`, `merchant_id`, `activate_status`, `shop_name`, `shop_address`, `pickup_address`, `area_id`, `city_id`, `pickup_area_id`, `pickup_city_id`, `pickup_phone`, `shop_email`, `branch_id`, `status`, `is_active`, `is_verified`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 'Believe store', 'house 4,road 9/1,mirpur 12E dhaka', 'house 4,road 9/1,mirpur 12E dhaka', 10, 1, 10, 1, '01755560225', 'believestorebd@gmail.com', 1, 1, 1, 1, NULL, '2021-01-08 16:54:00', '2021-01-08 16:54:00'),
(2, 3, 1, 'Fab&Hub', 'Mirpur 12E House No 10', 'Mirpur 12E House No 10', 380, 1, 380, 1, '01755560204', 'fabhub@gmail.com', 1, 1, 1, 1, NULL, '2021-01-08 16:55:05', '2021-01-08 16:55:05'),
(3, 3, 1, 'Dreambaz', 'Mirpur Dohs', 'Mirpur Dohs', 12, 1, 12, 1, '01723019478', 'dreambaz@gmail.com', 1, 1, 1, 1, NULL, '2021-01-09 04:51:42', '2021-01-09 04:51:42'),
(4, 10, 1, 'T-shirt Shop', 'House 01, Road -05, Chattagram', 'House 01, Road -05, Chattagram', 453, 43, 453, 43, '01988139009', 'tshirtshop@gmail.com', 1, 1, 1, 1, NULL, '2021-01-09 05:13:38', '2021-01-09 05:13:38');

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
(4, '2020_10_26_065212_create_roles_table', 1),
(5, '2020_10_26_065213_create_user_role_assignes_table', 2),
(6, '2020_10_26_065214_create_user_role_modules_table', 2),
(7, '2020_10_26_065215_create_user_role_module_actions_table', 2),
(8, '2020_10_26_065216_create_user_role_module_action_permitions_table', 2),
(9, '2020_10_26_065217_create_user_role_menu_titles_table', 2),
(10, '2020_10_26_065218_create_user_role_menu_title_permitions_table', 2),
(11, '2020_10_26_065219_create_user_role_menu_actions_table', 2),
(12, '2020_10_26_065220_create_user_role_menu_action_permitions_table', 2),
(13, '2020_12_02_122916_create_general_customers_table', 2),
(14, '2020_12_02_123009_create_user_approval_statuses_table', 2),
(15, '2020_12_02_123120_create_manpower_detail_informations_table', 2),
(16, '2020_12_02_123144_create_sub_office_detail_informations_table', 2),
(17, '2020_12_02_123209_create_hub_detail_informations_table', 2),
(18, '2020_12_02_123221_create_agent_detail_informations_table', 2),
(19, '2020_12_02_123324_create_merchant_shops_table', 2),
(20, '2020_12_02_123339_create_merchant_settings_table', 2),
(21, '2020_12_02_125017_create_branch_typies_table', 2),
(22, '2020_12_02_125040_create_branches_table', 2),
(23, '2020_12_02_125120_create_service_city_typies_table', 2),
(24, '2020_12_02_125144_create_areas_table', 2),
(25, '2020_12_02_125203_create_manpower_typies_table', 2),
(26, '2020_12_02_125234_create_manpower_assign_to_areas_table', 2),
(27, '2020_12_02_125333_create_area_branch_table', 2),
(28, '2020_12_02_125422_create_payment_methods_table', 2),
(29, '2020_12_02_125443_create_account_typies_table', 2),
(30, '2020_12_02_125542_create_banks_table', 2),
(31, '2020_12_02_125600_create_bank_accounts_table', 2),
(32, '2020_12_02_125640_create_transport_services_table', 2),
(33, '2020_12_02_125734_create_third_party_services_table', 2),
(34, '2020_12_02_125810_create_service_typies_table', 2),
(35, '2020_12_02_125825_create_parcel_typies_table', 2),
(36, '2020_12_02_125843_create_weights_table', 2),
(37, '2020_12_02_125904_create_service_charge_settings_table', 2),
(38, '2020_12_02_132755_create_delivey_charge_typies_table', 2),
(39, '2020_12_02_132902_create_delivey_parcel_amount_typies_table', 2),
(40, '2020_12_02_132954_create_parcel_categories_table', 2),
(41, '2020_12_02_133023_create_parce_owner_typies_table', 2),
(42, '2020_12_02_133112_create_customers_table', 2),
(43, '2020_12_02_133155_create_order_statuses_table', 2),
(44, '2020_12_02_133221_create_orders_table', 2),
(45, '2020_12_02_133303_create_order_descriptions_table', 2),
(46, '2020_12_02_133331_create_order_notes_table', 2),
(47, '2020_12_02_133412_create_order_processing_typies_table', 2),
(48, '2020_12_02_133456_create_order_processing_histories_table', 2),
(49, '2020_12_02_133549_create_order_receiving_sending_statuses_table', 2),
(50, '2020_12_02_133626_create_order_destinations_table', 2),
(51, '2020_12_02_133718_create_order_assigning_statuses_table', 2),
(52, '2020_12_02_133741_create_order_assigns_table', 2),
(53, '2020_12_02_133809_create_warehouses_table', 2),
(54, '2020_12_02_133852_create_parcel_in_warehouses_table', 2),
(55, '2020_12_02_133937_create_delivery_otps_table', 2),
(56, '2020_12_02_133938_create_final_success_cancel_statuses_table', 2),
(57, '2020_12_02_134002_create_order_sms_sendings_table', 2),
(58, '2020_12_02_134039_create_sms_authenticates_table', 2),
(59, '2020_12_02_134107_create_transports_table', 2),
(60, '2020_12_02_134108_create_parcel_in_transports_table', 2),
(61, '2020_12_02_134129_create_commission_typies_table', 2),
(62, '2020_12_02_134130_create_branch_commission_settings_table', 2),
(63, '2020_12_02_134344_create_manpower_commission_settings_table', 2),
(64, '2020_12_02_134414_create_branch_commissions_table', 2),
(65, '2020_12_02_134437_create_branch_profits_table', 2),
(66, '2020_12_02_134510_create_company_profits_table', 2),
(67, '2020_12_02_134557_create_order_third_parties_table', 2),
(68, '2020_12_24_175920_create_merchants_table', 3),
(69, '2020_12_24_180030_create_delivery_men_table', 3),
(70, '2020_12_24_180232_create_agents_table', 3),
(71, '2020_10_26_065211_create_business_typies_table', 4),
(72, '2021_01_02_070356_create_parcel_amount_payment_typies_table', 5),
(73, '2021_01_04_101443_create_parcel_amount_payment_statuses', 6),
(74, '2021_01_04_101625_create_service_charge_payment_statuses', 6),
(75, '2021_01_04_101707_create_service_cod_payment_statuses', 6),
(76, '2021_01_04_101721_create_service_delivery_payment_statuses', 6),
(77, '2021_01_12_205722_create_receive_amount_typies_table', 7),
(78, '2021_01_12_205723_create_receive_amount_histories_table', 7),
(79, '2021_01_16_210313_create_branch_commission_typies_table', 8),
(80, '2021_01_17_172453_create_manpower_income_histories_table', 9),
(81, '2021_01_18_141545_create_pay_to_head_office_invoices_table', 10),
(82, '2021_01_18_142325_create_pay_to_head_office_invoice_details_table', 10),
(83, '2021_01_18_142458_create_head_office_pay_to_branch_invoices_table', 10),
(84, '2021_01_18_142515_create_head_office_pay_to_branch_invoice_details_table', 10),
(85, '2021_01_18_142555_create_branch_pay_to_merchant_client_invoices_table', 11),
(86, '2021_01_18_142612_create_branch_pay_to_merchant_client_invoice_details_table', 11),
(87, '2021_01_27_181005_create_order_pickup_delivery_canceling_reasons_table', 12),
(88, '2021_01_27_181050_create_order_pickup_delivery_holding_reasons_table', 12),
(89, '2021_01_27_183406_create_order_pickup_delivery_reschedules_table', 12),
(90, '2021_01_27_214746_create_order_pickup_delivery_cancels_table', 13),
(91, '2021_01_31_110750_create_instant_all_charge_received_statuses_table', 14);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `merchant_invoice` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parcel_owner_type_id` int(11) NOT NULL DEFAULT 1,
  `merchant_id` int(11) DEFAULT NULL,
  `general_customer_id` int(11) DEFAULT NULL,
  `merchant_shop_id` int(11) DEFAULT NULL,
  `creating_branch_id` int(11) DEFAULT NULL,
  `creating_branch_type_id` int(11) DEFAULT NULL,
  `creating_area_id` int(11) DEFAULT NULL,
  `weight_id` int(11) DEFAULT NULL,
  `collect_amount` decimal(20,2) DEFAULT NULL,
  `delivery_charge_type_id` int(11) NOT NULL DEFAULT 2,
  `parcel_amount_payment_type_id` int(11) NOT NULL DEFAULT 2,
  `service_charge_setting_id` int(11) DEFAULT NULL,
  `service_charge` decimal(20,2) DEFAULT NULL,
  `cod_charge` decimal(20,2) DEFAULT NULL,
  `others_charge` decimal(20,2) DEFAULT NULL,
  `service_cod_payment_status_id` int(11) DEFAULT NULL,
  `service_delivery_payment_status_id` int(11) DEFAULT NULL,
  `parcel_amount_payment_status_id` int(11) DEFAULT NULL,
  `product_amount` decimal(20,2) DEFAULT NULL,
  `client_merchant_payable_amount` decimal(20,2) DEFAULT NULL,
  `instant_all_charge_received_status_id` tinyint(4) DEFAULT NULL,
  `net_product_amount` decimal(20,2) DEFAULT NULL,
  `net_amount` decimal(20,2) DEFAULT NULL,
  `parcel_category_id` int(11) DEFAULT 1,
  `service_type_id` int(11) DEFAULT 1,
  `parcel_type_id` int(11) DEFAULT 1,
  `customer_id` int(11) DEFAULT NULL,
  `destination_branch_id` int(11) DEFAULT NULL,
  `destination_city_id` int(11) DEFAULT NULL,
  `destination_area_id` int(11) DEFAULT NULL,
  `order_status_id` int(11) NOT NULL DEFAULT 1,
  `final_success_cancel_status_id` int(11) DEFAULT NULL,
  `order_status_changing_current_branch_id` int(11) DEFAULT NULL,
  `office_collect_amount_from_delivery_man` tinyint(4) DEFAULT NULL,
  `partial` tinyint(4) NOT NULL DEFAULT 0,
  `parcel_quantity` decimal(20,2) NOT NULL DEFAULT 1.00,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_verified` tinyint(4) NOT NULL DEFAULT 1,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_assigning_statuses`
--

CREATE TABLE `order_assigning_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_verified` tinyint(4) NOT NULL DEFAULT 1,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_assigning_statuses`
--

INSERT INTO `order_assigning_statuses` (`id`, `name`, `branch_id`, `status`, `is_active`, `is_verified`, `deleted_at`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Pending', 1, 1, 1, 1, NULL, NULL, NULL, NULL),
(2, 'Received/Accepted', 1, 1, 1, 1, NULL, NULL, NULL, NULL),
(3, 'Cancel', 1, 1, 1, 1, NULL, NULL, NULL, NULL),
(4, 'Rejected', 1, 1, 1, 1, NULL, NULL, NULL, NULL),
(5, 'Transfer', 1, 1, 1, 1, NULL, NULL, NULL, NULL),
(6, 'Hold by Customer', 1, 1, 1, 1, NULL, NULL, NULL, NULL),
(7, 'Deliverd Successfully', 1, 1, 1, 1, NULL, NULL, NULL, NULL),
(8, 'Cancel by Customer', 1, 1, 1, 1, NULL, NULL, NULL, NULL),
(9, 'Pickup Successfully', 1, 1, 1, 1, NULL, NULL, NULL, NULL),
(10, 'Office Receive Hold Parcel ', 1, 1, 1, 1, NULL, NULL, NULL, NULL),
(11, 'Office Receive Cancel Parcel', 1, 1, 1, 1, NULL, NULL, NULL, NULL),
(12, 'Pick Parcel From Office Successfully', 1, 1, 1, 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_assigns`
--

CREATE TABLE `order_assigns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `manpower_id` int(11) DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL,
  `order_processing_type_id` int(11) DEFAULT NULL,
  `assigner_id` int(11) DEFAULT NULL,
  `order_assigning_status_id` int(11) DEFAULT NULL,
  `collection_status` tinyint(4) NOT NULL DEFAULT 0,
  `branch_id` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_verified` tinyint(4) NOT NULL DEFAULT 1,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_descriptions`
--

CREATE TABLE `order_descriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `parcel_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_verified` tinyint(4) NOT NULL DEFAULT 1,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_destinations`
--

CREATE TABLE `order_destinations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `branch_type_id` int(11) DEFAULT NULL,
  `order_receiving_sending_status_id` int(11) DEFAULT NULL,
  `charge` decimal(20,2) NOT NULL DEFAULT 0.00,
  `receiving_commision` decimal(20,2) NOT NULL DEFAULT 0.00,
  `sending_commission` decimal(20,2) NOT NULL DEFAULT 0.00,
  `received_by` int(11) DEFAULT NULL,
  `received_at` datetime DEFAULT NULL,
  `send_by` int(11) DEFAULT NULL,
  `send_at` datetime DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_verified` tinyint(4) NOT NULL DEFAULT 1,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_notes`
--

CREATE TABLE `order_notes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `parcel_note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_verified` tinyint(4) NOT NULL DEFAULT 1,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_pickup_delivery_canceling_reasons`
--

CREATE TABLE `order_pickup_delivery_canceling_reasons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_verified` tinyint(4) NOT NULL DEFAULT 1,
  `deleted_at` datetime DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_pickup_delivery_canceling_reasons`
--

INSERT INTO `order_pickup_delivery_canceling_reasons` (`id`, `name`, `status`, `is_active`, `is_verified`, `deleted_at`, `branch_id`, `created_at`, `updated_at`) VALUES
(1, 'Merchant / Client Cancel Order', 1, 1, 1, NULL, 1, NULL, NULL),
(2, 'Client Cancel Order (Customer when delivery)', 1, 1, 1, NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_pickup_delivery_cancels`
--

CREATE TABLE `order_pickup_delivery_cancels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `manpower_id` int(11) DEFAULT NULL,
  `order_pickup_delivery_canceling_reason_id` int(11) DEFAULT NULL,
  `parcel_owner_type_id` int(11) DEFAULT NULL,
  `order_processing_type_id` int(11) DEFAULT NULL,
  `merchant_client_id` int(11) DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_verified` tinyint(4) NOT NULL DEFAULT 1,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_pickup_delivery_holding_reasons`
--

CREATE TABLE `order_pickup_delivery_holding_reasons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_verified` tinyint(4) NOT NULL DEFAULT 1,
  `deleted_at` datetime DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_pickup_delivery_holding_reasons`
--

INSERT INTO `order_pickup_delivery_holding_reasons` (`id`, `name`, `status`, `is_active`, `is_verified`, `deleted_at`, `branch_id`, `created_at`, `updated_at`) VALUES
(1, 'Merchant / Client didn\'t receive phone', 1, 1, 1, NULL, 1, NULL, NULL),
(2, 'Merchant / Client Out of Home', 1, 1, 1, NULL, 1, NULL, NULL),
(3, 'Merchant/client changed date by phone call', 1, 1, 1, NULL, 1, NULL, NULL),
(4, 'Client didn\'t receive phone (Customer when delivery)', 1, 1, 1, NULL, 1, NULL, NULL),
(5, 'Client Out of Home (Customer when delivery)', 1, 1, 1, NULL, 1, NULL, NULL),
(6, 'client changed date by phone call (Customer when delivery)', 1, 1, 1, NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_pickup_delivery_reschedules`
--

CREATE TABLE `order_pickup_delivery_reschedules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `manpower_id` int(11) DEFAULT NULL,
  `order_pickup_delivery_holding_reason_id` int(11) DEFAULT NULL,
  `parcel_owner_type_id` int(11) DEFAULT NULL,
  `order_processing_type_id` int(11) DEFAULT NULL,
  `merchant_client_id` int(11) DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `next_schedule` varchar(35) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_verified` tinyint(4) NOT NULL DEFAULT 1,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_processing_histories`
--

CREATE TABLE `order_processing_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `order_status_id` int(11) NOT NULL,
  `changing_status_branch_id` int(11) DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `status_changer_id` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_verified` tinyint(4) NOT NULL DEFAULT 1,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_processing_typies`
--

CREATE TABLE `order_processing_typies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_verified` tinyint(4) NOT NULL DEFAULT 1,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_processing_typies`
--

INSERT INTO `order_processing_typies` (`id`, `name`, `branch_id`, `status`, `is_active`, `is_verified`, `deleted_at`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Order Receiving (Parcel Pickup)', 1, 1, 1, 1, NULL, NULL, NULL, NULL),
(2, 'Order Delivery (Parcel Delivery)', 1, 1, 1, 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_receiving_sending_statuses`
--

CREATE TABLE `order_receiving_sending_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_verified` tinyint(4) NOT NULL DEFAULT 1,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_receiving_sending_statuses`
--

INSERT INTO `order_receiving_sending_statuses` (`id`, `name`, `branch_id`, `status`, `is_active`, `is_verified`, `deleted_at`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Pending', 1, 1, 1, 1, NULL, NULL, NULL, NULL),
(2, 'Received', 1, 1, 1, 1, NULL, NULL, NULL, NULL),
(3, 'Send', 1, 1, 1, 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_sms_sendings`
--

CREATE TABLE `order_sms_sendings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `sending_method` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sending_method_parameter` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sms_note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sms_count` tinyint(4) NOT NULL DEFAULT 1,
  `branch_id` int(11) DEFAULT NULL,
  `sms_delivery_status` tinyint(4) NOT NULL DEFAULT 0,
  `sms_payment_status` tinyint(4) NOT NULL DEFAULT 0,
  `payment_received_by` int(11) DEFAULT NULL,
  `paid_by` int(11) DEFAULT NULL,
  `sms_content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sms_lenght` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_verified` tinyint(4) NOT NULL DEFAULT 1,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_sms_sendings`
--

INSERT INTO `order_sms_sendings` (`id`, `order_id`, `sending_method`, `sending_method_parameter`, `sms_note`, `sms_count`, `branch_id`, `sms_delivery_status`, `sms_payment_status`, `payment_received_by`, `paid_by`, `sms_content`, `sms_lenght`, `status`, `is_active`, `is_verified`, `deleted_at`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 1, 'smsToCustomerWhenParcelBookedFromMerchant_HH', 'customer_name,invoice_no,company_name,collect_amount,delivery_charge_type_id', 'when parcel receive office', 1, 1, 0, 0, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, '2021-01-30 08:34:54', '2021-01-30 08:34:54'),
(2, 1, 'smsToMerchantWhenParcelDeliverySuccessful_HH', 'company_name,invoice_no,collect_only_product_amount', 'when Parcel is Delivered', 1, 1, 0, 0, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, '2021-01-30 08:45:37', '2021-01-30 08:45:37'),
(3, 2, 'smsToCustomerWhenParcelBookedFromMerchant_HH', 'customer_name,invoice_no,company_name,collect_amount,delivery_charge_type_id', 'when parcel receive office', 1, 1, 0, 0, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, '2021-01-30 09:00:55', '2021-01-30 09:00:55'),
(4, 2, 'smsToMerchantWhenParcelAssigningToManpowerForDelivery_HH', 'company_name,invoice_no,delivery_man_name,delivery_man_phone', 'when assign to delivery man', 1, 1, 0, 0, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, '2021-01-30 09:02:05', '2021-01-30 09:02:05'),
(5, 2, 'smsToCustomerWhenParcelAssigningToManpowerForDelivery_HH', 'customer_name,invoice_no,delivery_man_name,delivery_man_phone', 'when assign to delivery man', 1, 1, 0, 0, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, '2021-01-30 09:02:05', '2021-01-30 09:02:05'),
(6, 2, 'smsToMerchantWhenParcelDeliverySuccessful_HH', 'company_name,invoice_no,collect_only_product_amount', 'when Parcel is Delivered', 1, 1, 0, 0, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, '2021-01-30 09:06:09', '2021-01-30 09:06:09'),
(7, 3, 'smsToCustomerWhenParcelBookedFromMerchant_HH', 'customer_name,invoice_no,company_name,collect_amount,delivery_charge_type_id', 'when parcel receive office', 1, 1, 0, 0, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, '2021-01-30 10:14:26', '2021-01-30 10:14:26'),
(8, 3, 'smsToMerchantWhenParcelDeliverySuccessful_HH', 'company_name,invoice_no,collect_only_product_amount', 'when Parcel is Delivered', 1, 1, 0, 0, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, '2021-01-30 10:37:31', '2021-01-30 10:37:31'),
(9, 1, 'smsToCustomerWhenParcelBookedFromMerchant_HH', 'customer_name,invoice_no,company_name,collect_amount,delivery_charge_type_id', 'when parcel receive office', 1, 1, 0, 0, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, '2021-01-30 16:17:03', '2021-01-30 16:17:03'),
(10, 1, 'smsToMerchantWhenParcelAssigningToManpowerForDelivery_HH', 'company_name,invoice_no,delivery_man_name,delivery_man_phone', 'when assign to delivery man', 1, 1, 0, 0, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, '2021-01-30 16:19:04', '2021-01-30 16:19:04'),
(11, 1, 'smsToCustomerWhenParcelAssigningToManpowerForDelivery_HH', 'customer_name,invoice_no,delivery_man_name,delivery_man_phone', 'when assign to delivery man', 1, 1, 0, 0, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, '2021-01-30 16:19:04', '2021-01-30 16:19:04'),
(12, 1, 'smsToMerchantWhenParcelDeliverySuccessful_HH', 'company_name,invoice_no,collect_only_product_amount', 'when Parcel is Delivered', 1, 1, 0, 0, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, '2021-01-30 16:19:31', '2021-01-30 16:19:31'),
(13, 2, 'smsToCustomerWhenParcelBookedFromMerchant_HH', 'customer_name,invoice_no,company_name,collect_amount,delivery_charge_type_id', 'when parcel receive office', 1, 1, 0, 0, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, '2021-01-30 16:35:01', '2021-01-30 16:35:01'),
(14, 2, 'smsToMerchantWhenParcelAssigningToManpowerForDelivery_HH', 'company_name,invoice_no,delivery_man_name,delivery_man_phone', 'when assign to delivery man', 1, 1, 0, 0, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, '2021-01-30 16:35:59', '2021-01-30 16:35:59'),
(15, 2, 'smsToCustomerWhenParcelAssigningToManpowerForDelivery_HH', 'customer_name,invoice_no,delivery_man_name,delivery_man_phone', 'when assign to delivery man', 1, 1, 0, 0, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, '2021-01-30 16:35:59', '2021-01-30 16:35:59'),
(16, 2, 'smsToMerchantWhenParcelAssigningToManpowerForDelivery_HH', 'company_name,invoice_no,delivery_man_name,delivery_man_phone', 'when assign to delivery man', 1, 1, 0, 0, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, '2021-01-30 16:40:05', '2021-01-30 16:40:05'),
(17, 2, 'smsToCustomerWhenParcelAssigningToManpowerForDelivery_HH', 'customer_name,invoice_no,delivery_man_name,delivery_man_phone', 'when assign to delivery man', 1, 1, 0, 0, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, '2021-01-30 16:40:05', '2021-01-30 16:40:05'),
(18, 2, 'smsToMerchantWhenParcelDeliverySuccessful_HH', 'company_name,invoice_no,collect_only_product_amount', 'when Parcel is Delivered', 1, 1, 0, 0, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, '2021-01-30 16:55:40', '2021-01-30 16:55:40'),
(19, 2, 'smsToMerchantWhenParcelDeliverySuccessful_HH', 'company_name,invoice_no,collect_only_product_amount', 'when Parcel is Delivered', 1, 1, 0, 0, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, '2021-01-30 17:05:13', '2021-01-30 17:05:13'),
(20, 3, 'smsToCustomerWhenParcelBookedFromMerchant_HH', 'customer_name,invoice_no,company_name,collect_amount,delivery_charge_type_id', 'when parcel receive office', 1, 1, 0, 0, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, '2021-01-31 07:29:37', '2021-01-31 07:29:37'),
(21, 3, 'smsToMerchantWhenParcelAssigningToManpowerForDelivery_HH', 'company_name,invoice_no,delivery_man_name,delivery_man_phone', 'when assign to delivery man', 1, 1, 0, 0, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, '2021-01-31 08:06:36', '2021-01-31 08:06:36'),
(22, 3, 'smsToCustomerWhenParcelAssigningToManpowerForDelivery_HH', 'customer_name,invoice_no,delivery_man_name,delivery_man_phone', 'when assign to delivery man', 1, 1, 0, 0, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, '2021-01-31 08:06:36', '2021-01-31 08:06:36'),
(23, 3, 'smsToMerchantWhenParcelDeliverySuccessful_HH', 'company_name,invoice_no,collect_only_product_amount', 'when Parcel is Delivered', 1, 1, 0, 0, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, '2021-01-31 08:07:03', '2021-01-31 08:07:03'),
(24, 4, 'smsToCustomerWhenParcelBookedFromMerchant_HH', 'customer_name,invoice_no,company_name,collect_amount,delivery_charge_type_id', 'when parcel receive office', 1, 1, 0, 0, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, '2021-01-31 09:10:48', '2021-01-31 09:10:48'),
(25, 5, 'smsToCustomerWhenParcelBookedFromMerchant_HH', 'customer_name,invoice_no,company_name,collect_amount,delivery_charge_type_id', 'when parcel receive office', 1, 1, 0, 0, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, '2021-01-31 10:18:36', '2021-01-31 10:18:36'),
(26, 4, 'smsToMerchantWhenParcelAssigningToManpowerForDelivery_HH', 'company_name,invoice_no,delivery_man_name,delivery_man_phone', 'when assign to delivery man', 1, 1, 0, 0, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, '2021-01-31 10:25:10', '2021-01-31 10:25:10'),
(27, 4, 'smsToCustomerWhenParcelAssigningToManpowerForDelivery_HH', 'customer_name,invoice_no,delivery_man_name,delivery_man_phone', 'when assign to delivery man', 1, 1, 0, 0, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, '2021-01-31 10:25:10', '2021-01-31 10:25:10'),
(28, 4, 'smsToMerchantWhenParcelDeliverySuccessful_HH', 'company_name,invoice_no,collect_only_product_amount', 'when Parcel is Delivered', 1, 1, 0, 0, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, '2021-01-31 10:26:13', '2021-01-31 10:26:13'),
(29, 6, 'smsToCustomerWhenParcelBookedFromMerchant_HH', 'customer_name,invoice_no,company_name,collect_amount,delivery_charge_type_id', 'when parcel receive office', 1, 1, 0, 0, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, '2021-01-31 10:56:13', '2021-01-31 10:56:13'),
(30, 6, 'smsToMerchantWhenParcelAssigningToManpowerForDelivery_HH', 'company_name,invoice_no,delivery_man_name,delivery_man_phone', 'when assign to delivery man', 1, 1, 0, 0, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, '2021-01-31 11:01:19', '2021-01-31 11:01:19'),
(31, 6, 'smsToCustomerWhenParcelAssigningToManpowerForDelivery_HH', 'customer_name,invoice_no,delivery_man_name,delivery_man_phone', 'when assign to delivery man', 1, 1, 0, 0, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, '2021-01-31 11:01:19', '2021-01-31 11:01:19'),
(32, 6, 'smsToMerchantWhenParcelDeliverySuccessful_HH', 'company_name,invoice_no,collect_only_product_amount', 'when Parcel is Delivered', 1, 1, 0, 0, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, '2021-01-31 11:01:41', '2021-01-31 11:01:41'),
(33, 1, 'smsToCustomerWhenParcelBookedFromMerchant_HH', 'customer_name,invoice_no,company_name,collect_amount,delivery_charge_type_id', 'when parcel receive office', 1, 1, 0, 0, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, '2021-01-31 13:04:09', '2021-01-31 13:04:09'),
(34, 2, 'smsToCustomerWhenParcelBookedFromMerchant_HH', 'customer_name,invoice_no,company_name,collect_amount,delivery_charge_type_id', 'when parcel receive office', 1, 1, 0, 0, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, '2021-01-31 13:05:43', '2021-01-31 13:05:43'),
(35, 2, 'smsToMerchantWhenParcelAssigningToManpowerForDelivery_HH', 'company_name,invoice_no,delivery_man_name,delivery_man_phone', 'when assign to delivery man', 1, 1, 0, 0, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, '2021-01-31 13:09:26', '2021-01-31 13:09:26'),
(36, 2, 'smsToCustomerWhenParcelAssigningToManpowerForDelivery_HH', 'customer_name,invoice_no,delivery_man_name,delivery_man_phone', 'when assign to delivery man', 1, 1, 0, 0, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, '2021-01-31 13:09:26', '2021-01-31 13:09:26'),
(37, 2, 'smsToMerchantWhenParcelAssigningToManpowerForDelivery_HH', 'company_name,invoice_no,delivery_man_name,delivery_man_phone', 'when assign to delivery man', 1, 1, 0, 0, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, '2021-01-31 13:12:29', '2021-01-31 13:12:29'),
(38, 2, 'smsToCustomerWhenParcelAssigningToManpowerForDelivery_HH', 'customer_name,invoice_no,delivery_man_name,delivery_man_phone', 'when assign to delivery man', 1, 1, 0, 0, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, '2021-01-31 13:12:29', '2021-01-31 13:12:29'),
(39, 2, 'smsToMerchantWhenParcelDeliverySuccessful_HH', 'company_name,invoice_no,collect_only_product_amount', 'when Parcel is Delivered', 1, 1, 0, 0, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, '2021-01-31 13:15:42', '2021-01-31 13:15:42'),
(40, 1, 'smsToMerchantWhenParcelAssigningToManpowerForDelivery_HH', 'company_name,invoice_no,delivery_man_name,delivery_man_phone', 'when assign to delivery man', 1, 1, 0, 0, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, '2021-01-31 13:32:22', '2021-01-31 13:32:22'),
(41, 1, 'smsToCustomerWhenParcelAssigningToManpowerForDelivery_HH', 'customer_name,invoice_no,delivery_man_name,delivery_man_phone', 'when assign to delivery man', 1, 1, 0, 0, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, '2021-01-31 13:32:22', '2021-01-31 13:32:22'),
(42, 1, 'smsToMerchantWhenParcelAssigningToManpowerForDelivery_HH', 'company_name,invoice_no,delivery_man_name,delivery_man_phone', 'when assign to delivery man', 1, 1, 0, 0, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, '2021-01-31 13:35:00', '2021-01-31 13:35:00'),
(43, 1, 'smsToCustomerWhenParcelAssigningToManpowerForDelivery_HH', 'customer_name,invoice_no,delivery_man_name,delivery_man_phone', 'when assign to delivery man', 1, 1, 0, 0, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, '2021-01-31 13:35:00', '2021-01-31 13:35:00'),
(44, 1, 'smsToMerchantWhenParcelAssigningToManpowerForDelivery_HH', 'company_name,invoice_no,delivery_man_name,delivery_man_phone', 'when assign to delivery man', 1, 1, 0, 0, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, '2021-01-31 13:36:13', '2021-01-31 13:36:13'),
(45, 1, 'smsToCustomerWhenParcelAssigningToManpowerForDelivery_HH', 'customer_name,invoice_no,delivery_man_name,delivery_man_phone', 'when assign to delivery man', 1, 1, 0, 0, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, '2021-01-31 13:36:13', '2021-01-31 13:36:13'),
(46, 1, 'smsToMerchantWhenParcelAssigningToManpowerForDelivery_HH', 'company_name,invoice_no,delivery_man_name,delivery_man_phone', 'when assign to delivery man', 1, 1, 0, 0, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, '2021-01-31 13:39:25', '2021-01-31 13:39:25'),
(47, 1, 'smsToCustomerWhenParcelAssigningToManpowerForDelivery_HH', 'customer_name,invoice_no,delivery_man_name,delivery_man_phone', 'when assign to delivery man', 1, 1, 0, 0, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, '2021-01-31 13:39:25', '2021-01-31 13:39:25'),
(48, 1, 'smsToMerchantWhenParcelAssigningToManpowerForDelivery_HH', 'company_name,invoice_no,delivery_man_name,delivery_man_phone', 'when assign to delivery man', 1, 1, 0, 0, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, '2021-01-31 13:40:12', '2021-01-31 13:40:12'),
(49, 1, 'smsToCustomerWhenParcelAssigningToManpowerForDelivery_HH', 'customer_name,invoice_no,delivery_man_name,delivery_man_phone', 'when assign to delivery man', 1, 1, 0, 0, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, '2021-01-31 13:40:12', '2021-01-31 13:40:12'),
(50, 1, 'smsToMerchantWhenParcelDeliverySuccessful_HH', 'company_name,invoice_no,collect_only_product_amount', 'when Parcel is Delivered', 1, 1, 0, 0, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, '2021-01-31 13:43:47', '2021-01-31 13:43:47'),
(51, 2, 'smsToMerchantWhenParcelDeliverySuccessful_HH', 'company_name,invoice_no,collect_only_product_amount', 'when Parcel is Delivered', 1, 1, 0, 0, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, '2021-01-31 14:04:05', '2021-01-31 14:04:05'),
(52, 3, 'smsToCustomerWhenParcelBookedFromMerchant_HH', 'customer_name,invoice_no,company_name,collect_amount,delivery_charge_type_id', 'when parcel receive office', 1, 1, 0, 0, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, '2021-02-01 04:18:10', '2021-02-01 04:18:10'),
(53, 3, 'smsToMerchantWhenParcelAssigningToManpowerForDelivery_HH', 'company_name,invoice_no,delivery_man_name,delivery_man_phone', 'when assign to delivery man', 1, 1, 0, 0, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, '2021-02-01 04:18:51', '2021-02-01 04:18:51'),
(54, 3, 'smsToCustomerWhenParcelAssigningToManpowerForDelivery_HH', 'customer_name,invoice_no,delivery_man_name,delivery_man_phone', 'when assign to delivery man', 1, 1, 0, 0, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, '2021-02-01 04:18:51', '2021-02-01 04:18:51'),
(55, 3, 'smsToMerchantWhenParcelDeliverySuccessful_HH', 'company_name,invoice_no,collect_only_product_amount', 'when Parcel is Delivered', 1, 1, 0, 0, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, '2021-02-01 04:19:12', '2021-02-01 04:19:12'),
(56, 1, 'smsToCustomerWhenParcelBookedFromMerchant_HH', 'customer_name,invoice_no,company_name,collect_amount,delivery_charge_type_id', 'when parcel receive office', 1, 1, 0, 0, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, '2021-02-01 11:12:06', '2021-02-01 11:12:06'),
(57, 3, 'smsToCustomerWhenParcelBookedFromMerchant_HH', 'customer_name,invoice_no,company_name,collect_amount,delivery_charge_type_id', 'when parcel receive office', 1, 1, 0, 0, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, '2021-02-02 04:45:18', '2021-02-02 04:45:18'),
(58, 3, 'smsToMerchantWhenParcelAssigningToManpowerForDelivery_HH', 'company_name,invoice_no,delivery_man_name,delivery_man_phone', 'when assign to delivery man', 1, 1, 0, 0, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, '2021-02-02 04:56:25', '2021-02-02 04:56:25'),
(59, 3, 'smsToCustomerWhenParcelAssigningToManpowerForDelivery_HH', 'customer_name,invoice_no,delivery_man_name,delivery_man_phone', 'when assign to delivery man', 1, 1, 0, 0, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, '2021-02-02 04:56:25', '2021-02-02 04:56:25'),
(60, 2, 'smsToCustomerWhenParcelBookedFromMerchant_HH', 'customer_name,invoice_no,company_name,collect_amount,delivery_charge_type_id', 'when parcel receive office', 1, 1, 0, 0, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, '2021-02-02 04:58:09', '2021-02-02 04:58:09'),
(61, 2, 'smsToMerchantWhenParcelAssigningToManpowerForDelivery_HH', 'company_name,invoice_no,delivery_man_name,delivery_man_phone', 'when assign to delivery man', 1, 1, 0, 0, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, '2021-02-02 04:58:27', '2021-02-02 04:58:27'),
(62, 2, 'smsToCustomerWhenParcelAssigningToManpowerForDelivery_HH', 'customer_name,invoice_no,delivery_man_name,delivery_man_phone', 'when assign to delivery man', 1, 1, 0, 0, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, '2021-02-02 04:58:27', '2021-02-02 04:58:27'),
(63, 2, 'smsToMerchantWhenParcelDeliverySuccessful_HH', 'company_name,invoice_no,collect_only_product_amount', 'when Parcel is Delivered', 1, 1, 0, 0, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, '2021-02-02 04:59:19', '2021-02-02 04:59:19'),
(64, 3, 'smsToMerchantWhenParcelDeliverySuccessful_HH', 'company_name,invoice_no,collect_only_product_amount', 'when Parcel is Delivered', 1, 1, 0, 0, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, '2021-02-02 05:00:44', '2021-02-02 05:00:44'),
(65, 4, 'smsToCustomerWhenParcelBookedFromMerchant_HH', 'customer_name,invoice_no,company_name,collect_amount,delivery_charge_type_id', 'when parcel receive office', 1, 1, 0, 0, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, '2021-02-02 05:18:52', '2021-02-02 05:18:52'),
(66, 4, 'smsToMerchantWhenParcelAssigningToManpowerForDelivery_HH', 'company_name,invoice_no,delivery_man_name,delivery_man_phone', 'when assign to delivery man', 1, 1, 0, 0, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, '2021-02-02 05:19:32', '2021-02-02 05:19:32'),
(67, 4, 'smsToCustomerWhenParcelAssigningToManpowerForDelivery_HH', 'customer_name,invoice_no,delivery_man_name,delivery_man_phone', 'when assign to delivery man', 1, 1, 0, 0, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, '2021-02-02 05:19:32', '2021-02-02 05:19:32'),
(68, 4, 'smsToMerchantWhenParcelDeliverySuccessful_HH', 'company_name,invoice_no,collect_only_product_amount', 'when Parcel is Delivered', 1, 1, 0, 0, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, '2021-02-02 05:20:05', '2021-02-02 05:20:05');

-- --------------------------------------------------------

--
-- Table structure for table `order_statuses`
--

CREATE TABLE `order_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_status` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bangla_status` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active_status` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'english',
  `developer_condition` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `developer_status` tinyint(4) NOT NULL DEFAULT 1,
  `order_status_for_admin` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_status_for_merchant` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_status_for_admin_bangla` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_status_for_merchant_bangla` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_status_for_customer` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_status_for_customer_bangla` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_status_for_delivery_man_picker` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_status_for_delivery_man_picker_bangla` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_status` tinyint(4) NOT NULL DEFAULT 0,
  `merchant_status` tinyint(4) NOT NULL DEFAULT 0,
  `manpower_status` tinyint(4) NOT NULL DEFAULT 0,
  `customer_status` tinyint(4) NOT NULL DEFAULT 0,
  `branch_id` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_verified` tinyint(4) NOT NULL DEFAULT 1,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_statuses`
--

INSERT INTO `order_statuses` (`id`, `order_status`, `bangla_status`, `active_status`, `developer_condition`, `description`, `developer_status`, `order_status_for_admin`, `order_status_for_merchant`, `order_status_for_admin_bangla`, `order_status_for_merchant_bangla`, `order_status_for_customer`, `order_status_for_customer_bangla`, `order_status_for_delivery_man_picker`, `order_status_for_delivery_man_picker_bangla`, `admin_status`, `merchant_status`, `manpower_status`, `customer_status`, `branch_id`, `status`, `is_active`, `is_verified`, `deleted_at`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Pending (Created) Request ', NULL, 'english', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, 1, 1, 1, NULL, NULL, NULL, NULL),
(2, 'Office Accepted Request', NULL, 'english', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, 1, 1, 1, NULL, NULL, NULL, NULL),
(3, 'Assign Picker', NULL, 'english', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, 1, 1, 1, NULL, NULL, NULL, NULL),
(4, 'Pickup Parcel', NULL, 'english', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, 1, 1, 1, NULL, NULL, NULL, NULL),
(5, 'Office Received Parcel', NULL, 'english', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, 1, 1, 1, NULL, NULL, NULL, NULL),
(6, 'Send to Hub', NULL, 'english', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, 1, 1, 1, NULL, NULL, NULL, NULL),
(7, 'Hub Received Parcel', NULL, 'english', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, 1, 1, 1, NULL, NULL, NULL, NULL),
(8, 'Send to Branch', NULL, 'english', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, 1, 1, 1, NULL, NULL, NULL, NULL),
(9, 'Branch Received Parcel', NULL, 'english', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, 1, 1, 1, NULL, NULL, NULL, NULL),
(10, 'Send to Agent', NULL, 'english', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, 1, 1, 1, NULL, NULL, NULL, NULL),
(11, 'Agent Received Parcel', NULL, 'english', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, 1, 1, 1, NULL, NULL, NULL, NULL),
(12, 'Preparing for Assign To Delivery', NULL, 'english', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, 1, 1, 1, NULL, NULL, NULL, NULL),
(13, 'Assign To Delivery Man', NULL, 'english', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, 1, 1, 1, NULL, NULL, NULL, NULL),
(14, 'Assign Request Accepted By Delivery Man', NULL, 'english', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, 1, 1, 1, NULL, NULL, NULL, NULL),
(15, 'Assign Request Accepted', NULL, 'english', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, 1, 1, 1, NULL, NULL, NULL, NULL),
(16, 'On the Way', NULL, 'english', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, 1, 1, 1, NULL, NULL, NULL, NULL),
(17, 'Delivery Processing', NULL, 'english', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, 1, 1, 1, NULL, NULL, NULL, NULL),
(18, 'Successfully Delivered', NULL, 'english', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, 1, 1, 1, NULL, NULL, NULL, NULL),
(19, 'Hold Delivery', NULL, 'english', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, 1, 1, 1, NULL, NULL, NULL, NULL),
(20, 'Parcel Amout Send To Head Office', NULL, 'english', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, 1, 1, 1, NULL, NULL, NULL, NULL),
(21, 'Parcel Amout Received Head Office', NULL, 'english', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, 1, 1, 1, NULL, NULL, NULL, NULL),
(22, 'Head Office Send To Branch', NULL, 'english', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, 1, 1, 1, NULL, NULL, NULL, NULL),
(23, 'Branch Received Parcel Amount From Head Office', NULL, 'english', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, 1, 1, 1, NULL, NULL, NULL, NULL),
(24, 'Send To Client/Merchant', NULL, 'english', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, 1, 1, 1, NULL, NULL, NULL, NULL),
(25, 'Client/Merchant Received Parcel Amount', NULL, 'english', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, 1, 1, 1, NULL, NULL, NULL, NULL),
(26, 'Delivery Cycle Successfully Completed', NULL, 'english', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, 1, 1, 1, NULL, NULL, NULL, NULL),
(27, 'Delivery Canceling', NULL, 'english', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, 1, 1, 1, NULL, NULL, NULL, NULL),
(28, 'Delivery Canceled', NULL, 'english', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, 1, 1, 1, NULL, NULL, NULL, NULL),
(29, 'Office Received Cancel Parcel', NULL, 'english', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, 1, 1, 1, NULL, NULL, NULL, NULL),
(30, 'Send to Hub', NULL, 'english', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, 1, 1, 1, NULL, NULL, NULL, NULL),
(31, 'Received Hub', NULL, 'english', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, 1, 1, 1, NULL, NULL, NULL, NULL),
(32, 'Send to Head Office ', NULL, 'english', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, 1, 1, 1, NULL, NULL, NULL, NULL),
(33, 'Head Office Received', NULL, 'english', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, 1, 1, 1, NULL, NULL, NULL, NULL),
(34, 'Send To Branch', NULL, 'english', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, 1, 1, 1, NULL, NULL, NULL, NULL),
(35, 'Received Branch', NULL, 'english', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, 1, 1, 1, NULL, NULL, NULL, NULL),
(36, 'Preparing Return Parcel', NULL, 'english', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, 1, 1, 1, NULL, NULL, NULL, NULL),
(37, 'Assigned a Person For Return', NULL, 'english', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, 1, 1, 1, NULL, NULL, NULL, NULL),
(38, 'On the Way For Return Parcel', NULL, 'english', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, 1, 1, 1, NULL, NULL, NULL, NULL),
(39, 'Processing To Return Parcel', NULL, 'english', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, 1, 1, 1, NULL, NULL, NULL, NULL),
(40, 'Merchant/Client Received Cancel Parcel', NULL, 'english', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, 1, 1, 1, NULL, NULL, NULL, NULL),
(41, 'Send to Head Office', NULL, 'english', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, 1, 1, 1, NULL, NULL, NULL, NULL),
(42, 'Head Office Received Parcel', NULL, 'english', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, 1, 1, 1, NULL, NULL, NULL, NULL),
(43, 'Order Cancel by Merchant/Client when Pickup Parcel', NULL, 'english', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, 1, 1, 1, NULL, NULL, NULL, NULL),
(44, 'Order Hold by Merchant / Client , when Pickup Parcel', NULL, 'english', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, 1, 1, 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_third_parties`
--

CREATE TABLE `order_third_parties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `third_party_service_id` int(11) DEFAULT NULL,
  `cservice_charge_type` enum('percent','fixed') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'fixed',
  `service_charge` decimal(20,2) NOT NULL DEFAULT 0.00,
  `serive_charge_payment_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `third_party_charge` decimal(20,2) NOT NULL DEFAULT 0.00,
  `third_party_charge_payment_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_charge_received_by` int(11) DEFAULT NULL,
  `third_party_charge_received_by` int(11) DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `branch_type_id` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_verified` tinyint(4) NOT NULL DEFAULT 1,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `parcel_amount_payment_statuses`
--

CREATE TABLE `parcel_amount_payment_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_verified` tinyint(4) NOT NULL DEFAULT 1,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `parcel_amount_payment_statuses`
--

INSERT INTO `parcel_amount_payment_statuses` (`id`, `name`, `branch_id`, `status`, `is_active`, `is_verified`, `deleted_at`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Delivery man received', NULL, 1, 1, 1, NULL, NULL, NULL, NULL),
(2, 'Delivery man submit to branch', NULL, 1, 1, 1, NULL, NULL, NULL, NULL),
(3, 'Branch received from delivery man', NULL, 1, 1, 1, NULL, NULL, NULL, NULL),
(4, 'Branch send to head office', NULL, 1, 1, 1, NULL, NULL, NULL, NULL),
(5, 'Head office received from branch', NULL, 1, 1, 1, NULL, NULL, NULL, NULL),
(6, 'Head office send to branch', NULL, 1, 1, 1, NULL, NULL, NULL, NULL),
(7, 'Branch received from head office', NULL, 1, 1, 1, NULL, NULL, NULL, NULL),
(8, 'Branch received Amount And Preparing ', NULL, 1, 1, 1, NULL, NULL, NULL, NULL),
(9, 'Pay to Merchant/Client Parcel Amount', NULL, 1, 1, 1, NULL, NULL, NULL, NULL),
(10, 'Client/merchant received parcel amount', NULL, 1, 1, 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `parcel_amount_payment_typies`
--

CREATE TABLE `parcel_amount_payment_typies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_verified` tinyint(4) NOT NULL DEFAULT 1,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `parcel_amount_payment_typies`
--

INSERT INTO `parcel_amount_payment_typies` (`id`, `name`, `status`, `is_active`, `is_verified`, `deleted_at`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Customer Pay Delivery charge & Product Price', 1, 1, 1, NULL, NULL, NULL, NULL),
(2, 'Customer Pay Delivery charge & Product Price with COD Charge', 1, 1, 1, NULL, NULL, NULL, NULL),
(3, 'Customer Pay Only Product Price', 1, 1, 1, NULL, NULL, NULL, NULL),
(4, 'Customer Pay Only Product Price with COD Charge', 1, 1, 1, NULL, NULL, NULL, NULL),
(5, 'Customer Pay Only Service (Delivery) Charge', 1, 1, 1, NULL, NULL, NULL, NULL),
(6, 'Customer Pay Only Service (Delivery) Charge with COD Charge', 1, 1, 1, NULL, NULL, NULL, NULL),
(7, 'Customer Nothing To Pay (Already Paid)', 1, 1, 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `parcel_categories`
--

CREATE TABLE `parcel_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_verified` tinyint(4) NOT NULL DEFAULT 1,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `parcel_categories`
--

INSERT INTO `parcel_categories` (`id`, `name`, `status`, `is_active`, `is_verified`, `deleted_at`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Non-Liquid / hard', 1, 1, 1, NULL, NULL, NULL, NULL),
(2, 'Liquid', 1, 1, 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `parcel_in_transports`
--

CREATE TABLE `parcel_in_transports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `car_id` int(11) DEFAULT NULL,
  `parcel_in_or_out_car_status` tinyint(4) NOT NULL DEFAULT 1,
  `branch_id` int(11) DEFAULT NULL,
  `parcel_in_car_assigner_id` int(11) DEFAULT NULL,
  `parcel_out_car_assigner_id` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_verified` tinyint(4) NOT NULL DEFAULT 1,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `parcel_in_warehouses`
--

CREATE TABLE `parcel_in_warehouses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `warehouse_id` int(11) DEFAULT NULL,
  `parcel_in_or_out_warehouse_status` tinyint(4) NOT NULL DEFAULT 1,
  `branch_id` int(11) DEFAULT NULL,
  `parcel_in_warehouse_assigner_id` int(11) DEFAULT NULL,
  `parcel_out_warehouse_assigner_id` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_verified` tinyint(4) NOT NULL DEFAULT 1,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `parcel_typies`
--

CREATE TABLE `parcel_typies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_verified` tinyint(4) NOT NULL DEFAULT 1,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `parcel_typies`
--

INSERT INTO `parcel_typies` (`id`, `name`, `status`, `is_active`, `is_verified`, `deleted_at`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Parcel', 1, 1, 1, NULL, NULL, NULL, NULL),
(2, 'Document', 1, 1, 1, NULL, NULL, NULL, NULL),
(3, 'Money', 1, 1, 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `parce_owner_typies`
--

CREATE TABLE `parce_owner_typies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_verified` tinyint(4) NOT NULL DEFAULT 1,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `parce_owner_typies`
--

INSERT INTO `parce_owner_typies` (`id`, `name`, `status`, `is_active`, `is_verified`, `deleted_at`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Merchant', 1, 1, 1, NULL, NULL, NULL, NULL),
(2, 'General Customer', 1, 1, 1, NULL, NULL, NULL, NULL);

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
-- Table structure for table `payment_methods`
--

CREATE TABLE `payment_methods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_verified` tinyint(4) NOT NULL DEFAULT 1,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_methods`
--

INSERT INTO `payment_methods` (`id`, `branch_id`, `name`, `status`, `is_active`, `is_verified`, `deleted_at`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 1, 'Bank Account', 1, 1, 1, NULL, NULL, NULL, NULL),
(2, 1, 'Mobile Banking', 1, 1, 1, NULL, NULL, NULL, NULL),
(3, 1, 'Cash Payment', 1, 1, 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pay_to_head_office_invoices`
--

CREATE TABLE `pay_to_head_office_invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `payment_invoice_no` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from_branch_id` int(11) DEFAULT NULL,
  `payment_amount` decimal(20,2) DEFAULT NULL,
  `payment_method_id` int(11) DEFAULT NULL,
  `payment_status_id` int(11) NOT NULL DEFAULT 1,
  `payment_by` int(11) DEFAULT NULL,
  `payment_at` datetime DEFAULT NULL,
  `payment_received_by` int(11) DEFAULT NULL,
  `received_branch_id` int(11) DEFAULT NULL,
  `payment_received_at` datetime DEFAULT NULL,
  `payment_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_note` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_verified` tinyint(4) NOT NULL DEFAULT 1,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pay_to_head_office_invoice_details`
--

CREATE TABLE `pay_to_head_office_invoice_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pay_to_head_office_invoice_id` int(11) DEFAULT NULL,
  `receive_amount_history_id` int(11) DEFAULT NULL,
  `from_branch_id` int(11) DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL,
  `receive_amount_type_id` int(11) DEFAULT NULL,
  `amount` decimal(20,2) DEFAULT NULL,
  `payment_method_id` int(11) DEFAULT NULL,
  `payment_status_id` int(11) DEFAULT NULL,
  `payment_by` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_verified` tinyint(4) NOT NULL DEFAULT 1,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `receive_amount_histories`
--

CREATE TABLE `receive_amount_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `parcel_owner_type_id` int(11) DEFAULT NULL,
  `receive_amount_type_id` int(11) DEFAULT NULL,
  `received_by` int(11) DEFAULT NULL,
  `amount` decimal(20,2) DEFAULT NULL,
  `received_from` int(11) DEFAULT NULL,
  `received_from_user_role_id` int(11) DEFAULT NULL,
  `creating_branch_id` int(11) DEFAULT NULL,
  `received_amount_branch_id` int(11) DEFAULT NULL,
  `creating_branch_type_id` int(11) DEFAULT NULL,
  `received_branch_type_id` int(11) DEFAULT NULL,
  `destination_branch_id` int(11) DEFAULT NULL,
  `parcel_amount_payment_status_id` int(11) DEFAULT NULL,
  `service_cod_payment_status_id` int(11) DEFAULT NULL,
  `service_delivery_payment_status_id` int(11) DEFAULT NULL,
  `activate_status_id` tinyint(4) NOT NULL DEFAULT 1,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_verified` tinyint(4) NOT NULL DEFAULT 1,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `receive_amount_typies`
--

CREATE TABLE `receive_amount_typies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_verified` tinyint(4) NOT NULL DEFAULT 1,
  `deleted_at` datetime DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `receive_amount_typies`
--

INSERT INTO `receive_amount_typies` (`id`, `name`, `status`, `is_active`, `is_verified`, `deleted_at`, `branch_id`, `created_at`, `updated_at`) VALUES
(1, 'Service Charge', 1, 1, 1, NULL, NULL, NULL, NULL),
(2, 'COD Charge', 1, 1, 1, NULL, NULL, NULL, NULL),
(3, 'Others Charge', 1, 1, 1, NULL, NULL, NULL, NULL),
(4, 'Parcel Amount', 1, 1, 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_verified` tinyint(4) NOT NULL DEFAULT 1,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `is_deleted` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `branch_id`, `status`, `is_active`, `is_verified`, `deleted_at`, `is_deleted`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin	', 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL),
(4, 'Admin', 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL),
(5, 'Merchant', 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL),
(6, 'Delivery Man', 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL),
(7, 'Staff', 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL),
(8, 'Hub Admin', 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL),
(9, 'Agent', 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `service_charge_payment_statuses`
--

CREATE TABLE `service_charge_payment_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_verified` tinyint(4) NOT NULL DEFAULT 1,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_charge_payment_statuses`
--

INSERT INTO `service_charge_payment_statuses` (`id`, `name`, `branch_id`, `status`, `is_active`, `is_verified`, `deleted_at`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Branch received from client/merchant', NULL, 1, 1, 1, NULL, NULL, NULL, NULL),
(2, 'Branch send to head office', NULL, 1, 1, 1, NULL, NULL, NULL, NULL),
(3, 'Head office received from branch', NULL, 1, 1, 1, NULL, NULL, NULL, NULL),
(4, 'Head office send branch commission to branch', NULL, 1, 1, 1, NULL, NULL, NULL, NULL),
(5, 'Branch received branch commssion from head office', NULL, 1, 1, 1, NULL, NULL, NULL, NULL),
(6, 'Head Office Receive commission of his own branch\r\n', NULL, 1, 1, 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `service_charge_settings`
--

CREATE TABLE `service_charge_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_type_id` int(11) DEFAULT NULL,
  `parcel_category_id` int(11) DEFAULT NULL,
  `parcel_type_id` int(11) DEFAULT NULL,
  `weight_id` int(11) DEFAULT NULL,
  `service_city_type_id` int(11) DEFAULT NULL,
  `charge` decimal(20,2) NOT NULL DEFAULT 60.00,
  `third_party_charge` decimal(20,2) NOT NULL DEFAULT 30.00,
  `return_charge` decimal(20,2) NOT NULL DEFAULT 0.00,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_verified` tinyint(4) NOT NULL DEFAULT 1,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_charge_settings`
--

INSERT INTO `service_charge_settings` (`id`, `service_type_id`, `parcel_category_id`, `parcel_type_id`, `weight_id`, `service_city_type_id`, `charge`, `third_party_charge`, `return_charge`, `status`, `is_active`, `is_verified`, `deleted_at`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, 1, '60.00', '100.00', '100.00', 1, 1, 1, NULL, NULL, NULL, '0000-00-00 00:00:00'),
(2, 1, 1, 1, 2, 1, '60.00', '60.00', '60.00', 1, 1, 1, NULL, NULL, NULL, '2021-01-08 16:44:29'),
(3, 1, 1, 1, 3, 1, '72.00', '72.00', '72.00', 1, 1, 1, NULL, NULL, NULL, '2021-01-08 16:44:49'),
(4, 1, 1, 1, 4, 1, '72.00', '72.00', '72.00', 1, 1, 1, NULL, NULL, NULL, '2021-01-08 16:45:23'),
(5, 1, 1, 1, 5, 1, '84.00', '84.00', '84.00', 1, 1, 1, NULL, NULL, NULL, '2021-01-08 16:46:02'),
(6, 1, 1, 1, 6, 1, '84.00', '84.00', '84.00', 1, 1, 1, NULL, NULL, NULL, '2021-01-08 16:46:19'),
(7, 1, 1, 1, 7, 1, '96.00', '96.00', '96.00', 1, 1, 1, NULL, NULL, NULL, '2021-01-08 16:46:42'),
(8, 1, 1, 1, 1, 2, '120.00', '120.00', '120.00', 1, 1, 1, NULL, NULL, NULL, '2021-01-08 16:47:22'),
(9, 1, 1, 1, 2, 2, '120.00', '120.00', '120.00', 1, 1, 1, NULL, NULL, NULL, '2021-01-08 16:47:36'),
(10, 1, 1, 1, 3, 2, '130.00', '130.00', '130.00', 1, 1, 1, NULL, NULL, NULL, '2021-01-08 16:48:54'),
(11, 1, 1, 1, 4, 2, '130.00', '130.00', '130.00', 1, 1, 1, NULL, NULL, NULL, '2021-01-08 16:49:24'),
(12, 1, 1, 1, 5, 2, '140.00', '140.00', '140.00', 1, 1, 1, NULL, NULL, NULL, '2021-01-08 16:49:44'),
(13, 1, 1, 1, 6, 2, '140.00', '140.00', '140.00', 1, 1, 1, NULL, NULL, NULL, '2021-01-08 16:50:17'),
(14, 1, 1, 1, 7, 2, '150.00', '150.00', '150.00', 1, 1, 1, NULL, NULL, NULL, '2021-01-08 16:50:38'),
(15, 1, 1, 1, 1, 3, '120.00', '120.00', '120.00', 1, 1, 1, NULL, NULL, NULL, '2021-01-08 17:15:15'),
(16, 1, 1, 1, 2, 3, '120.00', '120.00', '120.00', 1, 1, 1, NULL, NULL, NULL, '2021-01-08 17:15:40'),
(17, 1, 1, 1, 3, 3, '130.00', '130.00', '130.00', 1, 1, 1, NULL, NULL, NULL, '2021-01-08 17:16:04'),
(18, 1, 1, 1, 4, 3, '130.00', '130.00', '130.00', 1, 1, 1, NULL, NULL, NULL, '2021-01-08 17:16:37'),
(19, 1, 1, 1, 5, 3, '140.00', '140.00', '140.00', 1, 1, 1, NULL, NULL, NULL, '2021-01-08 17:16:56'),
(20, 1, 1, 1, 6, 3, '140.00', '140.00', '140.00', 1, 1, 1, NULL, NULL, NULL, '2021-01-08 17:17:13'),
(21, 1, 1, 1, 7, 3, '150.00', '150.00', '150.00', 1, 1, 1, NULL, NULL, NULL, '2021-01-08 17:17:54'),
(22, 2, 1, 1, 1, 1, '60.00', '60.00', '60.00', 1, 1, 1, NULL, NULL, NULL, NULL),
(23, 2, 1, 1, 2, 1, '60.00', '30.00', '0.00', 1, 1, 1, NULL, NULL, NULL, NULL),
(24, 2, 1, 1, 3, 1, '60.00', '30.00', '0.00', 1, 1, 1, NULL, NULL, NULL, NULL),
(25, 2, 1, 1, 4, 1, '60.00', '30.00', '0.00', 1, 1, 1, NULL, NULL, NULL, NULL),
(26, 2, 1, 1, 5, 1, '60.00', '30.00', '0.00', 1, 1, 1, NULL, NULL, NULL, NULL),
(27, 2, 1, 1, 6, 1, '60.00', '30.00', '0.00', 1, 1, 1, NULL, NULL, NULL, NULL),
(28, 2, 1, 1, 7, 1, '60.00', '30.00', '0.00', 1, 1, 1, NULL, NULL, NULL, NULL),
(29, 2, 1, 1, 1, 2, '60.00', '60.00', '60.00', 1, 1, 1, NULL, NULL, NULL, NULL),
(30, 2, 1, 1, 2, 2, '60.00', '30.00', '0.00', 1, 1, 1, NULL, NULL, NULL, NULL),
(31, 2, 1, 1, 3, 2, '60.00', '30.00', '0.00', 1, 1, 1, NULL, NULL, NULL, NULL),
(32, 2, 1, 1, 4, 2, '60.00', '30.00', '0.00', 1, 1, 1, NULL, NULL, NULL, NULL),
(33, 2, 1, 1, 5, 2, '60.00', '30.00', '0.00', 1, 1, 1, NULL, NULL, NULL, NULL),
(34, 2, 1, 1, 6, 2, '60.00', '30.00', '0.00', 1, 1, 1, NULL, NULL, NULL, NULL),
(35, 2, 1, 1, 7, 2, '60.00', '30.00', '0.00', 1, 1, 1, NULL, NULL, NULL, NULL),
(36, 2, 1, 1, 1, 3, '60.00', '60.00', '60.00', 1, 1, 1, NULL, NULL, NULL, NULL),
(37, 2, 1, 1, 2, 3, '60.00', '30.00', '0.00', 1, 1, 1, NULL, NULL, NULL, NULL),
(38, 2, 1, 1, 3, 3, '60.00', '30.00', '0.00', 1, 1, 1, NULL, NULL, NULL, NULL),
(39, 2, 1, 1, 4, 3, '60.00', '30.00', '0.00', 1, 1, 1, NULL, NULL, NULL, NULL),
(40, 2, 1, 1, 5, 3, '60.00', '30.00', '0.00', 1, 1, 1, NULL, NULL, NULL, NULL),
(41, 2, 1, 1, 6, 3, '60.00', '30.00', '0.00', 1, 1, 1, NULL, NULL, NULL, NULL),
(42, 2, 1, 1, 7, 3, '60.00', '100.00', '100.00', 1, 1, 1, NULL, NULL, NULL, '2020-12-28 13:38:31');

-- --------------------------------------------------------

--
-- Table structure for table `service_city_typies`
--

CREATE TABLE `service_city_typies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_verified` tinyint(4) NOT NULL DEFAULT 1,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_city_typies`
--

INSERT INTO `service_city_typies` (`id`, `name`, `status`, `is_active`, `is_verified`, `deleted_at`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Same City', 1, 1, 1, NULL, NULL, NULL, NULL),
(2, 'Out Off City', 1, 1, 1, NULL, NULL, NULL, NULL),
(3, 'Other City', 1, 1, 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `service_cod_payment_statuses`
--

CREATE TABLE `service_cod_payment_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_verified` tinyint(4) NOT NULL DEFAULT 1,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_cod_payment_statuses`
--

INSERT INTO `service_cod_payment_statuses` (`id`, `name`, `branch_id`, `status`, `is_active`, `is_verified`, `deleted_at`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Branch received from client/merchant', NULL, 1, 1, 1, NULL, NULL, NULL, NULL),
(2, 'Branch send to head office', NULL, 1, 1, 1, NULL, NULL, NULL, NULL),
(3, 'Head office received from branch', NULL, 1, 1, 1, NULL, NULL, NULL, NULL),
(4, 'Head office send branch commission to branch', NULL, 1, 1, 1, NULL, NULL, NULL, NULL),
(5, 'Branch received branch commssion from head office', NULL, 1, 1, 1, NULL, NULL, NULL, NULL),
(6, 'Head Office Receive commission of his own branch', NULL, 1, 1, 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `service_delivery_payment_statuses`
--

CREATE TABLE `service_delivery_payment_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_verified` tinyint(4) NOT NULL DEFAULT 1,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_delivery_payment_statuses`
--

INSERT INTO `service_delivery_payment_statuses` (`id`, `name`, `branch_id`, `status`, `is_active`, `is_verified`, `deleted_at`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Branch received from client/merchant', NULL, 1, 1, 1, NULL, NULL, NULL, NULL),
(2, 'Branch send to head office', NULL, 1, 1, 1, NULL, NULL, NULL, NULL),
(3, 'Head office received from branch', NULL, 1, 1, 1, NULL, NULL, NULL, NULL),
(4, 'Head office send branch commission to branch', NULL, 1, 1, 1, NULL, NULL, NULL, NULL),
(5, 'branch received branch commssion from head office', NULL, 1, 1, 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `service_typies`
--

CREATE TABLE `service_typies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_verified` tinyint(4) NOT NULL DEFAULT 1,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_typies`
--

INSERT INTO `service_typies` (`id`, `name`, `status`, `is_active`, `is_verified`, `deleted_at`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Normal   ', 1, 1, 1, NULL, NULL, NULL, NULL),
(2, 'Urgent', 1, 1, 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sologan` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hotlinenumber` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `callcenter` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `company_name`, `sologan`, `phone`, `email`, `address`, `hotlinenumber`, `callcenter`, `website`, `logo`, `created_at`, `updated_at`) VALUES
(1, 'Dakbd Courier And Parcel Service', 'Easy to delivery', '01779325718', 'info@dakbd.com', 'Dhaka', '01779325718', '01779325718', 'www.dakbd.com', 'public/images/5ff4348d770ad.png', '2021-01-05 09:12:09', '2021-01-05 09:42:37');

-- --------------------------------------------------------

--
-- Table structure for table `sms_authenticates`
--

CREATE TABLE `sms_authenticates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sending_method` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sending_method_parameter` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sms_note` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sms_from` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `sms_count` tinyint(4) NOT NULL DEFAULT 1,
  `branch_id` int(11) DEFAULT NULL,
  `sms_delivery_status` tinyint(4) NOT NULL DEFAULT 0,
  `sms_payment_status` tinyint(4) NOT NULL DEFAULT 0,
  `payment_received_by` int(11) DEFAULT NULL,
  `paid_by` int(11) DEFAULT NULL,
  `sms_content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sms_lenght` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_verified` tinyint(4) NOT NULL DEFAULT 1,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sms_authenticates`
--

INSERT INTO `sms_authenticates` (`id`, `sending_method`, `sending_method_parameter`, `sms_note`, `sms_from`, `user_id`, `sms_count`, `branch_id`, `sms_delivery_status`, `sms_payment_status`, `payment_received_by`, `paid_by`, `sms_content`, `sms_lenght`, `status`, `is_active`, `is_verified`, `deleted_at`, `created_by`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, '01755560225', 'login', 3, 1, NULL, 1, 0, NULL, NULL, '6749 is your login code for Dakbd.com. Thank You.', NULL, 1, 1, 1, NULL, NULL, '2021-01-08 17:24:44', '2021-01-08 17:24:44'),
(2, NULL, NULL, '01755560225', 'login', 3, 1, NULL, 1, 0, NULL, NULL, '5625 is your login code for Dakbd.com. Thank You.', NULL, 1, 1, 1, NULL, NULL, '2021-01-08 18:45:24', '2021-01-08 18:45:24'),
(3, NULL, NULL, '01755560225', 'login', 3, 1, NULL, 1, 0, NULL, NULL, '4742 is your login code for Dakbd.com. Thank You.', NULL, 1, 1, 1, NULL, NULL, '2021-01-09 04:10:22', '2021-01-09 04:10:22'),
(4, NULL, NULL, '01988139009', 'login', 10, 1, NULL, 1, 0, NULL, NULL, '5127 is your login code for Dakbd.com. Thank You.', NULL, 1, 1, 1, NULL, NULL, '2021-01-09 05:12:31', '2021-01-09 05:12:31'),
(5, NULL, NULL, '01755560225', 'login', 3, 1, NULL, 1, 0, NULL, NULL, '6497 is your login code for Dakbd.com. Thank You.', NULL, 1, 1, 1, NULL, NULL, '2021-01-09 05:40:01', '2021-01-09 05:40:01'),
(6, NULL, NULL, '01755560225', 'login', 3, 1, NULL, 1, 0, NULL, NULL, '1226 is your login code for Dakbd.com. Thank You.', NULL, 1, 1, 1, NULL, NULL, '2021-01-09 06:01:38', '2021-01-09 06:01:38'),
(7, NULL, NULL, '01755560225', 'login', 3, 1, NULL, 1, 0, NULL, NULL, '2194 is your login code for Dakbd.com. Thank You.', NULL, 1, 1, 1, NULL, NULL, '2021-01-10 11:05:46', '2021-01-10 11:05:46'),
(8, NULL, NULL, '01755560225', 'login', 3, 1, NULL, 1, 0, NULL, NULL, '9326 is your login code for Dakbd.com. Thank You.', NULL, 1, 1, 1, NULL, NULL, '2021-01-25 12:52:46', '2021-01-25 12:52:46'),
(9, NULL, NULL, '01755560225', 'login', 3, 1, NULL, 1, 0, NULL, NULL, '6755 is your login code for Dakbd.com. Thank You.', NULL, 1, 1, 1, NULL, NULL, '2021-01-25 16:18:36', '2021-01-25 16:18:36'),
(10, NULL, NULL, '01755560225', 'login', 3, 1, NULL, 1, 0, NULL, NULL, '1885 is your login code for Dakbd.com. Thank You.', NULL, 1, 1, 1, NULL, NULL, '2021-01-27 05:03:07', '2021-01-27 05:03:07');

-- --------------------------------------------------------

--
-- Table structure for table `sub_office_detail_informations`
--

CREATE TABLE `sub_office_detail_informations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_verified` tinyint(4) NOT NULL DEFAULT 1,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `thanas`
--

CREATE TABLE `thanas` (
  `id` int(2) UNSIGNED NOT NULL,
  `district_id` int(2) UNSIGNED NOT NULL,
  `name` varchar(80) NOT NULL,
  `bn_name` varchar(50) DEFAULT NULL,
  `upazila_type` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `thanas`
--

INSERT INTO `thanas` (`id`, `district_id`, `name`, `bn_name`, `upazila_type`) VALUES
(1, 34, 'Amtali Upazila', 'আমতলী', 1),
(2, 34, 'Bamna Upazila', 'বামনা', 1),
(3, 34, 'Barguna Sadar Upazila', 'বরগুনা সদর', 1),
(4, 34, 'Betagi Upazila', 'বেতাগি', 1),
(5, 34, 'Patharghata Upazila', 'পাথরঘাটা', 1),
(6, 34, 'Taltali Upazila', 'তালতলী', 1),
(7, 35, 'Muladi Upazila', 'মুলাদি', 1),
(8, 35, 'Babuganj Upazila', 'বাবুগঞ্জ', 1),
(9, 35, 'Agailjhara Upazila', 'আগাইলঝরা', 1),
(10, 35, 'Barisal Sadar Upazila', 'বরিশাল সদর', 1),
(11, 35, 'Bakerganj Upazila', 'বাকেরগঞ্জ', 1),
(12, 35, 'Banaripara Upazila', 'বানাড়িপারা', 1),
(13, 35, 'Gaurnadi Upazila', 'গৌরনদী', 1),
(14, 35, 'Hizla Upazila', 'হিজলা', 1),
(15, 35, 'Mehendiganj Upazila', 'মেহেদিগঞ্জ ', 1),
(16, 35, 'Wazirpur Upazila', 'ওয়াজিরপুর', 1),
(17, 36, 'Bhola Sadar Upazila', 'ভোলা সদর', 1),
(18, 36, 'Burhanuddin Upazila', 'বুরহানউদ্দিন', 1),
(19, 36, 'Char Fasson Upazila', 'চর ফ্যাশন', 1),
(20, 36, 'Daulatkhan Upazila', 'দৌলতখান', 1),
(21, 36, 'Lalmohan Upazila', 'লালমোহন', 1),
(22, 36, 'Manpura Upazila', 'মনপুরা', 1),
(23, 36, 'Tazumuddin Upazila', 'তাজুমুদ্দিন', 1),
(24, 37, 'Jhalokati Sadar Upazila', 'ঝালকাঠি সদর', 1),
(25, 37, 'Kathalia Upazila', 'কাঁঠালিয়া', 1),
(26, 37, 'Nalchity Upazila', 'নালচিতি', 1),
(27, 37, 'Rajapur Upazila', 'রাজাপুর', 1),
(28, 38, 'Bauphal Upazila', 'বাউফল', 1),
(29, 38, 'Dashmina Upazila', 'দশমিনা', 1),
(30, 38, 'Galachipa Upazila', 'গলাচিপা', 1),
(31, 38, 'Kalapara Upazila', 'কালাপারা', 1),
(32, 38, 'Mirzaganj Upazila', 'মির্জাগঞ্জ ', 1),
(33, 38, 'Patuakhali Sadar Upazila', 'পটুয়াখালী সদর', 1),
(34, 38, 'Dumki Upazila', 'ডুমকি', 1),
(35, 38, 'Rangabali Upazila', 'রাঙ্গাবালি', 1),
(36, 39, 'Bhandaria', 'ভ্যান্ডারিয়া', 1),
(37, 39, 'Kaukhali', 'কাউখালি', 1),
(38, 39, 'Mathbaria', 'মাঠবাড়িয়া', 1),
(39, 39, 'Nazirpur', 'নাজিরপুর', 1),
(40, 39, 'Nesarabad', 'নেসারাবাদ', 1),
(41, 39, 'Pirojpur Sadar', 'পিরোজপুর সদর', 1),
(42, 39, 'Zianagar', 'জিয়ানগর', 1),
(43, 40, 'Bandarban Sadar', 'বান্দরবন সদর', 1),
(44, 40, 'Thanchi', 'থানচি', 1),
(45, 40, 'Lama', 'লামা', 1),
(46, 40, 'Naikhongchhari', 'নাইখংছড়ি ', 1),
(47, 40, 'Ali kadam', 'আলী কদম', 1),
(48, 40, 'Rowangchhari', 'রউয়াংছড়ি ', 1),
(49, 40, 'Ruma', 'রুমা', 1),
(50, 41, 'Brahmanbaria Sadar Upazila', 'ব্রাহ্মণবাড়িয়া সদর', 1),
(51, 41, 'Ashuganj Upazila', 'আশুগঞ্জ', 1),
(52, 41, 'Nasirnagar Upazila', 'নাসির নগর', 1),
(53, 41, 'Nabinagar Upazila', 'নবীনগর', 1),
(54, 41, 'Sarail Upazila', 'সরাইল', 1),
(55, 41, 'Shahbazpur Town', 'শাহবাজপুর টাউন', 1),
(56, 41, 'Kasba Upazila', 'কসবা', 1),
(57, 41, 'Akhaura Upazila', 'আখাউরা', 1),
(58, 41, 'Bancharampur Upazila', 'বাঞ্ছারামপুর', 1),
(59, 41, 'Bijoynagar Upazila', 'বিজয় নগর', 1),
(60, 42, 'Chandpur Sadar', 'চাঁদপুর সদর', 1),
(61, 42, 'Faridganj', 'ফরিদগঞ্জ', 1),
(62, 42, 'Haimchar', 'হাইমচর', 1),
(63, 42, 'Haziganj', 'হাজীগঞ্জ', 1),
(64, 42, 'Kachua', 'কচুয়া', 1),
(65, 42, 'Matlab Uttar', 'মতলব উত্তর', 1),
(66, 42, 'Matlab Dakkhin', 'মতলব দক্ষিণ', 1),
(67, 42, 'Shahrasti', 'শাহরাস্তি', 1),
(68, 43, 'Anwara Upazila', 'আনোয়ারা', 1),
(69, 43, 'Banshkhali Upazila', 'বাশখালি', 1),
(70, 43, 'Boalkhali Upazila', 'বোয়ালখালি', 1),
(71, 43, 'Chandanaish Upazila', 'চন্দনাইশ', 1),
(72, 43, 'Fatikchhari Upazila', 'ফটিকছড়ি', 1),
(73, 43, 'Hathazari Upazila', 'হাঠহাজারী', 1),
(74, 43, 'Lohagara Upazila', 'লোহাগারা', 1),
(75, 43, 'Mirsharai Upazila', 'মিরসরাই', 1),
(76, 43, 'Patiya Upazila', 'পটিয়া', 1),
(77, 43, 'Rangunia Upazila', 'রাঙ্গুনিয়া', 1),
(78, 43, 'Raozan Upazila', 'রাউজান', 1),
(79, 43, 'Sandwip Upazila', 'সন্দ্বীপ', 1),
(80, 43, 'Satkania Upazila', 'সাতকানিয়া', 1),
(81, 43, 'Sitakunda Upazila', 'সীতাকুণ্ড', 1),
(82, 44, 'Barura Upazila', 'বড়ুরা', 1),
(83, 44, 'Brahmanpara Upazila', 'ব্রাহ্মণপাড়া', 1),
(84, 44, 'Burichong Upazila', 'বুড়িচং', 1),
(85, 44, 'Chandina Upazila', 'চান্দিনা', 1),
(86, 44, 'Chauddagram Upazila', 'চৌদ্দগ্রাম', 1),
(87, 44, 'Daudkandi Upazila', 'দাউদকান্দি', 1),
(88, 44, 'Debidwar Upazila', 'দেবীদ্বার', 1),
(89, 44, 'Homna Upazila', 'হোমনা', 1),
(90, 44, 'Comilla Sadar Upazila', 'কুমিল্লা সদর', 1),
(91, 44, 'Laksam Upazila', 'লাকসাম', 1),
(92, 44, 'Monohorgonj Upazila', 'মনোহরগঞ্জ', 1),
(93, 44, 'Meghna Upazila', 'মেঘনা', 1),
(94, 44, 'Muradnagar Upazila', 'মুরাদনগর', 1),
(95, 44, 'Nangalkot Upazila', 'নাঙ্গালকোট', 1),
(96, 44, 'Comilla Sadar South Upazila', 'কুমিল্লা সদর দক্ষিণ', 1),
(97, 44, 'Titas Upazila', 'তিতাস', 1),
(98, 45, 'Chakaria Upazila', 'চকরিয়া', 1),
(100, 45, 'Cox\'s Bazar Sadar Upazila', 'কক্স বাজার সদর', 1),
(101, 45, 'Kutubdia Upazila', 'কুতুবদিয়া', 1),
(102, 45, 'Maheshkhali Upazila', 'মহেশখালী', 1),
(103, 45, 'Ramu Upazila', 'রামু', 1),
(104, 45, 'Teknaf Upazila', 'টেকনাফ', 1),
(105, 45, 'Ukhia Upazila', 'উখিয়া', 1),
(106, 45, 'Pekua Upazila', 'পেকুয়া', 1),
(107, 46, 'Feni Sadar', 'ফেনী সদর', 1),
(108, 46, 'Chagalnaiya', 'ছাগল নাইয়া', 1),
(109, 46, 'Daganbhyan', 'দাগানভিয়া', 1),
(110, 46, 'Parshuram', 'পরশুরাম', 1),
(111, 46, 'Fhulgazi', 'ফুলগাজি', 1),
(112, 46, 'Sonagazi', 'সোনাগাজি', 1),
(113, 47, 'Dighinala Upazila', 'দিঘিনালা ', 1),
(114, 47, 'Khagrachhari Upazila', 'খাগড়াছড়ি', 1),
(115, 47, 'Lakshmichhari Upazila', 'লক্ষ্মীছড়ি', 1),
(116, 47, 'Mahalchhari Upazila', 'মহলছড়ি', 1),
(117, 47, 'Manikchhari Upazila', 'মানিকছড়ি', 1),
(118, 47, 'Matiranga Upazila', 'মাটিরাঙ্গা', 1),
(119, 47, 'Panchhari Upazila', 'পানছড়ি', 1),
(120, 47, 'Ramgarh Upazila', 'রামগড়', 1),
(121, 48, 'Lakshmipur Sadar Upazila', 'লক্ষ্মীপুর সদর', 1),
(122, 48, 'Raipur Upazila', 'রায়পুর', 1),
(123, 48, 'Ramganj Upazila', 'রামগঞ্জ', 1),
(124, 48, 'Ramgati Upazila', 'রামগতি', 1),
(125, 48, 'Komol Nagar Upazila', 'কমল নগর', 1),
(126, 49, 'Noakhali Sadar Upazila', 'নোয়াখালী সদর', 1),
(127, 49, 'Begumganj Upazila', 'বেগমগঞ্জ', 1),
(128, 49, 'Chatkhil Upazila', 'চাটখিল', 1),
(129, 49, 'Companyganj Upazila', 'কোম্পানীগঞ্জ', 1),
(130, 49, 'Shenbag Upazila', 'শেনবাগ', 1),
(131, 49, 'Hatia Upazila', 'হাতিয়া', 1),
(132, 49, 'Kobirhat Upazila', 'কবিরহাট ', 1),
(133, 49, 'Sonaimuri Upazila', 'সোনাইমুরি', 1),
(134, 49, 'Suborno Char Upazila', 'সুবর্ণ চর ', 1),
(135, 50, 'Rangamati Sadar Upazila', 'রাঙ্গামাটি সদর', 1),
(136, 50, 'Belaichhari Upazila', 'বেলাইছড়ি', 1),
(137, 50, 'Bagaichhari Upazila', 'বাঘাইছড়ি', 1),
(138, 50, 'Barkal Upazila', 'বরকল', 1),
(139, 50, 'Juraichhari Upazila', 'জুরাইছড়ি', 1),
(140, 50, 'Rajasthali Upazila', 'রাজাস্থলি', 1),
(141, 50, 'Kaptai Upazila', 'কাপ্তাই', 1),
(142, 50, 'Langadu Upazila', 'লাঙ্গাডু', 1),
(143, 50, 'Nannerchar Upazila', 'নান্নেরচর ', 1),
(144, 50, 'Kaukhali Upazila', 'কাউখালি', 1),
(145, 1, 'Dhamrai Upazila', 'ধামরাই', 1),
(146, 1, 'Dohar Upazila', 'দোহার', 1),
(147, 1, 'Keraniganj Upazila', 'কেরানীগঞ্জ', 1),
(148, 1, 'Nawabganj Upazila', 'নবাবগঞ্জ', 1),
(149, 1, 'Savar Upazila', 'সাভার', 1),
(150, 2, 'Faridpur Sadar Upazila', 'ফরিদপুর সদর', 1),
(151, 2, 'Boalmari Upazila', 'বোয়ালমারী', 1),
(152, 2, 'Alfadanga Upazila', 'আলফাডাঙ্গা', 1),
(153, 2, 'Madhukhali Upazila', 'মধুখালি', 1),
(154, 2, 'Bhanga Upazila', 'ভাঙ্গা', 1),
(155, 2, 'Nagarkanda Upazila', 'নগরকান্ড', 1),
(156, 2, 'Charbhadrasan Upazila', 'চরভদ্রাসন ', 1),
(157, 2, 'Sadarpur Upazila', 'সদরপুর', 1),
(158, 2, 'Shaltha Upazila', 'শালথা', 1),
(159, 3, 'Gazipur Sadar-Joydebpur', 'গাজীপুর সদর', 1),
(160, 3, 'Kaliakior', 'কালিয়াকৈর', 1),
(161, 3, 'Kapasia', 'কাপাসিয়া', 1),
(162, 3, 'Sripur', 'শ্রীপুর', 1),
(163, 3, 'Kaliganj', 'কালীগঞ্জ', 1),
(164, 3, 'Tongi', 'টঙ্গি', 1),
(165, 4, 'Gopalganj Sadar Upazila', 'গোপালগঞ্জ সদর', 1),
(166, 4, 'Kashiani Upazila', 'কাশিয়ানি', 1),
(167, 4, 'Kotalipara Upazila', 'কোটালিপাড়া', 1),
(168, 4, 'Muksudpur Upazila', 'মুকসুদপুর', 1),
(169, 4, 'Tungipara Upazila', 'টুঙ্গিপাড়া', 1),
(170, 5, 'Dewanganj Upazila', 'দেওয়ানগঞ্জ', 1),
(171, 5, 'Baksiganj Upazila', 'বকসিগঞ্জ', 1),
(172, 5, 'Islampur Upazila', 'ইসলামপুর', 1),
(173, 5, 'Jamalpur Sadar Upazila', 'জামালপুর সদর', 1),
(174, 5, 'Madarganj Upazila', 'মাদারগঞ্জ', 1),
(175, 5, 'Melandaha Upazila', 'মেলানদাহা', 1),
(176, 5, 'Sarishabari Upazila', 'সরিষাবাড়ি ', 1),
(177, 5, 'Narundi Police I.C', 'নারুন্দি', 1),
(178, 6, 'Astagram Upazila', 'অষ্টগ্রাম', 1),
(179, 6, 'Bajitpur Upazila', 'বাজিতপুর', 1),
(180, 6, 'Bhairab Upazila', 'ভৈরব', 1),
(181, 6, 'Hossainpur Upazila', 'হোসেনপুর ', 1),
(182, 6, 'Itna Upazila', 'ইটনা', 1),
(183, 6, 'Karimganj Upazila', 'করিমগঞ্জ', 1),
(184, 6, 'Katiadi Upazila', 'কতিয়াদি', 1),
(185, 6, 'Kishoreganj Sadar Upazila', 'কিশোরগঞ্জ সদর', 1),
(186, 6, 'Kuliarchar Upazila', 'কুলিয়ারচর', 1),
(187, 6, 'Mithamain Upazila', 'মিঠামাইন', 1),
(188, 6, 'Nikli Upazila', 'নিকলি', 1),
(189, 6, 'Pakundia Upazila', 'পাকুন্ডা', 1),
(190, 6, 'Tarail Upazila', 'তাড়াইল', 1),
(191, 7, 'Madaripur Sadar', 'মাদারীপুর সদর', 1),
(192, 7, 'Kalkini', 'কালকিনি', 1),
(193, 7, 'Rajoir', 'রাজইর', 1),
(194, 7, 'Shibchar', 'শিবচর', 1),
(195, 8, 'Manikganj Sadar Upazila', 'মানিকগঞ্জ সদর', 1),
(196, 8, 'Singair Upazila', 'সিঙ্গাইর', 1),
(197, 8, 'Shibalaya Upazila', 'শিবালয়', 1),
(198, 8, 'Saturia Upazila', 'সাঠুরিয়া', 1),
(199, 8, 'Harirampur Upazila', 'হরিরামপুর', 1),
(200, 8, 'Ghior Upazila', 'ঘিওর', 1),
(201, 8, 'Daulatpur Upazila', 'দৌলতপুর', 1),
(202, 9, 'Lohajang Upazila', 'লোহাজং', 1),
(203, 9, 'Sreenagar Upazila', 'শ্রীনগর', 1),
(204, 9, 'Munshiganj Sadar Upazila', 'মুন্সিগঞ্জ সদর', 1),
(205, 9, 'Sirajdikhan Upazila', 'সিরাজদিখান', 1),
(206, 9, 'Tongibari Upazila', 'টঙ্গিবাড়ি', 1),
(207, 9, 'Gazaria Upazila', 'গজারিয়া', 1),
(208, 10, 'Bhaluka', 'ভালুকা', 1),
(209, 10, 'Trishal', 'ত্রিশাল', 1),
(210, 10, 'Haluaghat', 'হালুয়াঘাট', 1),
(211, 10, 'Muktagachha', 'মুক্তাগাছা', 1),
(212, 10, 'Dhobaura', 'ধবারুয়া', 1),
(213, 10, 'Fulbaria', 'ফুলবাড়িয়া', 1),
(214, 10, 'Gaffargaon', 'গফরগাঁও', 1),
(215, 10, 'Gauripur', 'গৌরিপুর', 1),
(216, 10, 'Ishwarganj', 'ঈশ্বরগঞ্জ', 1),
(217, 10, 'Mymensingh Sadar', 'ময়মনসিং সদর', 1),
(218, 10, 'Nandail', 'নন্দাইল', 1),
(219, 10, 'Phulpur', 'ফুলপুর', 1),
(220, 11, 'Araihazar Upazila', 'আড়াইহাজার', 1),
(221, 11, 'Sonargaon Upazila', 'সোনারগাঁও', 1),
(222, 11, 'Bandar', 'বান্দার', 1),
(223, 11, 'Naryanganj Sadar Upazila', 'নারায়ানগঞ্জ সদর', 1),
(224, 11, 'Rupganj Upazila', 'রূপগঞ্জ', 1),
(225, 11, 'Siddirgonj Upazila', 'সিদ্ধিরগঞ্জ', 1),
(226, 12, 'Belabo Upazila', 'বেলাবো', 1),
(227, 12, 'Monohardi Upazila', 'মনোহরদি', 1),
(228, 12, 'Narsingdi Sadar Upazila', 'নরসিংদী সদর', 1),
(229, 12, 'Palash Upazila', 'পলাশ', 1),
(230, 12, 'Raipura Upazila, Narsingdi', 'রায়পুর', 1),
(231, 12, 'Shibpur Upazila', 'শিবপুর', 1),
(232, 13, 'Kendua Upazilla', 'কেন্দুয়া', 1),
(233, 13, 'Atpara Upazilla', 'আটপাড়া', 1),
(234, 13, 'Barhatta Upazilla', 'বরহাট্টা', 1),
(235, 13, 'Durgapur Upazilla', 'দুর্গাপুর', 1),
(236, 13, 'Kalmakanda Upazilla', 'কলমাকান্দা', 1),
(237, 13, 'Madan Upazilla', 'মদন', 1),
(238, 13, 'Mohanganj Upazilla', 'মোহনগঞ্জ', 1),
(239, 13, 'Netrakona-S Upazilla', 'নেত্রকোনা সদর', 1),
(240, 13, 'Purbadhala Upazilla', 'পূর্বধলা', 1),
(241, 13, 'Khaliajuri Upazilla', 'খালিয়াজুরি', 1),
(242, 14, 'Baliakandi Upazila', 'বালিয়াকান্দি', 1),
(243, 14, 'Goalandaghat Upazila', 'গোয়ালন্দ ঘাট', 1),
(244, 14, 'Pangsha Upazila', 'পাংশা', 1),
(245, 14, 'Kalukhali Upazila', 'কালুখালি', 1),
(246, 14, 'Rajbari Sadar Upazila', 'রাজবাড়ি সদর', 1),
(247, 15, 'Shariatpur Sadar -Palong', 'শরীয়তপুর সদর ', 1),
(248, 15, 'Damudya Upazila', 'দামুদিয়া', 1),
(249, 15, 'Naria Upazila', 'নড়িয়া', 1),
(250, 15, 'Jajira Upazila', 'জাজিরা', 1),
(251, 15, 'Bhedarganj Upazila', 'ভেদারগঞ্জ', 1),
(252, 15, 'Gosairhat Upazila', 'গোসাইর হাট ', 1),
(253, 16, 'Jhenaigati Upazila', 'ঝিনাইগাতি', 1),
(254, 16, 'Nakla Upazila', 'নাকলা', 1),
(255, 16, 'Nalitabari Upazila', 'নালিতাবাড়ি', 1),
(256, 16, 'Sherpur Sadar Upazila', 'শেরপুর সদর', 1),
(257, 16, 'Sreebardi Upazila', 'শ্রীবরদি', 1),
(258, 17, 'Tangail Sadar Upazila', 'টাঙ্গাইল সদর', 1),
(259, 17, 'Sakhipur Upazila', 'সখিপুর', 1),
(260, 17, 'Basail Upazila', 'বসাইল', 1),
(261, 17, 'Madhupur Upazila', 'মধুপুর', 1),
(262, 17, 'Ghatail Upazila', 'ঘাটাইল', 1),
(263, 17, 'Kalihati Upazila', 'কালিহাতি', 1),
(264, 17, 'Nagarpur Upazila', 'নগরপুর', 1),
(265, 17, 'Mirzapur Upazila', 'মির্জাপুর', 1),
(266, 17, 'Gopalpur Upazila', 'গোপালপুর', 1),
(267, 17, 'Delduar Upazila', 'দেলদুয়ার', 1),
(268, 17, 'Bhuapur Upazila', 'ভুয়াপুর', 1),
(269, 17, 'Dhanbari Upazila', 'ধানবাড়ি', 1),
(270, 55, 'Bagerhat Sadar Upazila', 'বাগেরহাট সদর', 1),
(271, 55, 'Chitalmari Upazila', 'চিতলমাড়ি', 1),
(272, 55, 'Fakirhat Upazila', 'ফকিরহাট', 1),
(273, 55, 'Kachua Upazila', 'কচুয়া', 1),
(274, 55, 'Mollahat Upazila', 'মোল্লাহাট ', 1),
(275, 55, 'Mongla Upazila', 'মংলা', 1),
(276, 55, 'Morrelganj Upazila', 'মরেলগঞ্জ', 1),
(277, 55, 'Rampal Upazila', 'রামপাল', 1),
(278, 55, 'Sarankhola Upazila', 'স্মরণখোলা', 1),
(279, 56, 'Damurhuda Upazila', 'দামুরহুদা', 1),
(280, 56, 'Chuadanga-S Upazila', 'চুয়াডাঙ্গা সদর', 1),
(281, 56, 'Jibannagar Upazila', 'জীবন নগর ', 1),
(282, 56, 'Alamdanga Upazila', 'আলমডাঙ্গা', 1),
(283, 57, 'Abhaynagar Upazila', 'অভয়নগর', 1),
(284, 57, 'Keshabpur Upazila', 'কেশবপুর', 1),
(285, 57, 'Bagherpara Upazila', 'বাঘের পাড়া ', 1),
(286, 57, 'Jessore Sadar Upazila', 'যশোর সদর', 1),
(287, 57, 'Chaugachha Upazila', 'চৌগাছা', 1),
(288, 57, 'Manirampur Upazila', 'মনিরামপুর ', 1),
(289, 57, 'Jhikargachha Upazila', 'ঝিকরগাছা', 1),
(290, 57, 'Sharsha Upazila', 'সারশা', 1),
(291, 58, 'Jhenaidah Sadar Upazila', 'ঝিনাইদহ সদর', 1),
(292, 58, 'Maheshpur Upazila', 'মহেশপুর', 1),
(293, 58, 'Kaliganj Upazila', 'কালীগঞ্জ', 1),
(294, 58, 'Kotchandpur Upazila', 'কোট চাঁদপুর ', 1),
(295, 58, 'Shailkupa Upazila', 'শৈলকুপা', 1),
(296, 58, 'Harinakunda Upazila', 'হাড়িনাকুন্দা', 1),
(297, 59, 'Terokhada Upazila', 'তেরোখাদা', 1),
(298, 59, 'Batiaghata Upazila', 'বাটিয়াঘাটা ', 1),
(299, 59, 'Dacope Upazila', 'ডাকপে', 1),
(300, 59, 'Dumuria Upazila', 'ডুমুরিয়া', 1),
(301, 59, 'Dighalia Upazila', 'দিঘলিয়া', 1),
(302, 59, 'Koyra Upazila', 'কয়ড়া', 1),
(303, 59, 'Paikgachha Upazila', 'পাইকগাছা', 1),
(304, 59, 'Phultala Upazila', 'ফুলতলা', 1),
(305, 59, 'Rupsa Upazila', 'রূপসা', 1),
(306, 60, 'Kushtia Sadar', 'কুষ্টিয়া সদর', 1),
(307, 60, 'Kumarkhali', 'কুমারখালি', 1),
(308, 60, 'Daulatpur', 'দৌলতপুর', 1),
(309, 60, 'Mirpur', 'মিরপুর', 1),
(310, 60, 'Bheramara', 'ভেরামারা', 1),
(311, 60, 'Khoksa', 'খোকসা', 1),
(312, 61, 'Magura Sadar Upazila', 'মাগুরা সদর', 1),
(313, 61, 'Mohammadpur Upazila', 'মোহাম্মাদপুর', 1),
(314, 61, 'Shalikha Upazila', 'শালিখা', 1),
(315, 61, 'Sreepur Upazila', 'শ্রীপুর', 1),
(316, 62, 'angni Upazila', 'আংনি', 1),
(317, 62, 'Mujib Nagar Upazila', 'মুজিব নগর', 1),
(318, 62, 'Meherpur-S Upazila', 'মেহেরপুর সদর', 1),
(319, 63, 'Narail-S Upazilla', 'নড়াইল সদর', 1),
(320, 63, 'Lohagara Upazilla', 'লোহাগাড়া', 1),
(321, 63, 'Kalia Upazilla', 'কালিয়া', 1),
(322, 64, 'Satkhira Sadar Upazila', 'সাতক্ষীরা সদর', 1),
(323, 64, 'Assasuni Upazila', 'আসসাশুনি ', 1),
(324, 64, 'Debhata Upazila', 'দেভাটা', 1),
(325, 64, 'Tala Upazila', 'তালা', 1),
(326, 64, 'Kalaroa Upazila', 'কলরোয়া', 1),
(327, 64, 'Kaliganj Upazila', 'কালীগঞ্জ', 1),
(328, 64, 'Shyamnagar Upazila', 'শ্যামনগর', 1),
(329, 18, 'Adamdighi', 'আদমদিঘী', 1),
(330, 18, 'Bogra Sadar', 'বগুড়া সদর', 1),
(331, 18, 'Sherpur', 'শেরপুর', 1),
(332, 18, 'Dhunat', 'ধুনট', 1),
(333, 18, 'Dhupchanchia', 'দুপচাচিয়া', 1),
(334, 18, 'Gabtali', 'গাবতলি', 1),
(335, 18, 'Kahaloo', 'কাহালু', 1),
(336, 18, 'Nandigram', 'নন্দিগ্রাম', 1),
(337, 18, 'Sahajanpur', 'শাহজাহানপুর', 1),
(338, 18, 'Sariakandi', 'সারিয়াকান্দি', 1),
(339, 18, 'Shibganj', 'শিবগঞ্জ', 1),
(340, 18, 'Sonatala', 'সোনাতলা', 1),
(341, 19, 'Joypurhat S', 'জয়পুরহাট সদর', 1),
(342, 19, 'Akkelpur', 'আক্কেলপুর', 1),
(343, 19, 'Kalai', 'কালাই', 1),
(344, 19, 'Khetlal', 'খেতলাল', 1),
(345, 19, 'Panchbibi', 'পাঁচবিবি', 1),
(346, 20, 'Naogaon Sadar Upazila', 'নওগাঁ সদর', 1),
(347, 20, 'Mohadevpur Upazila', 'মহাদেবপুর', 1),
(348, 20, 'Manda Upazila', 'মান্দা', 1),
(349, 20, 'Niamatpur Upazila', 'নিয়ামতপুর', 1),
(350, 20, 'Atrai Upazila', 'আত্রাই', 1),
(351, 20, 'Raninagar Upazila', 'রাণীনগর', 1),
(352, 20, 'Patnitala Upazila', 'পত্নীতলা', 1),
(353, 20, 'Dhamoirhat Upazila', 'ধামইরহাট ', 1),
(354, 20, 'Sapahar Upazila', 'সাপাহার', 1),
(355, 20, 'Porsha Upazila', 'পোরশা', 1),
(356, 20, 'Badalgachhi Upazila', 'বদলগাছি', 1),
(357, 21, 'Natore Sadar Upazila', 'নাটোর সদর', 1),
(358, 21, 'Baraigram Upazila', 'বড়াইগ্রাম', 1),
(359, 21, 'Bagatipara Upazila', 'বাগাতিপাড়া', 1),
(360, 21, 'Lalpur Upazila', 'লালপুর', 1),
(361, 21, 'Natore Sadar Upazila', 'নাটোর সদর', 1),
(362, 21, 'Baraigram Upazila', 'বড়াই গ্রাম', 1),
(363, 22, 'Bholahat Upazila', 'ভোলাহাট', 1),
(364, 22, 'Gomastapur Upazila', 'গোমস্তাপুর', 1),
(365, 22, 'Nachole Upazila', 'নাচোল', 1),
(366, 22, 'Nawabganj Sadar Upazila', 'নবাবগঞ্জ সদর', 1),
(367, 22, 'Shibganj Upazila', 'শিবগঞ্জ', 1),
(368, 23, 'Atgharia Upazila', 'আটঘরিয়া', 1),
(369, 23, 'Bera Upazila', 'বেড়া', 1),
(370, 23, 'Bhangura Upazila', 'ভাঙ্গুরা', 1),
(371, 23, 'Chatmohar Upazila', 'চাটমোহর', 1),
(372, 23, 'Faridpur Upazila', 'ফরিদপুর', 1),
(373, 23, 'Ishwardi Upazila', 'ঈশ্বরদী', 1),
(374, 23, 'Pabna Sadar Upazila', 'পাবনা সদর', 1),
(375, 23, 'Santhia Upazila', 'সাথিয়া', 1),
(376, 23, 'Sujanagar Upazila', 'সুজানগর', 1),
(377, 24, 'Bagha', 'বাঘা', 1),
(378, 24, 'Bagmara', 'বাগমারা', 1),
(379, 24, 'Charghat', 'চারঘাট', 1),
(380, 24, 'Durgapur', 'দুর্গাপুর', 1),
(381, 24, 'Godagari', 'গোদাগারি', 1),
(382, 24, 'Mohanpur', 'মোহনপুর', 1),
(383, 24, 'Paba', 'পবা', 1),
(384, 24, 'Puthia', 'পুঠিয়া', 1),
(385, 24, 'Tanore', 'তানোর', 1),
(386, 25, 'Sirajganj Sadar Upazila', 'সিরাজগঞ্জ সদর', 1),
(387, 25, 'Belkuchi Upazila', 'বেলকুচি', 1),
(388, 25, 'Chauhali Upazila', 'চৌহালি', 1),
(389, 25, 'Kamarkhanda Upazila', 'কামারখান্দা', 1),
(390, 25, 'Kazipur Upazila', 'কাজীপুর', 1),
(391, 25, 'Raiganj Upazila', 'রায়গঞ্জ', 1),
(392, 25, 'Shahjadpur Upazila', 'শাহজাদপুর', 1),
(393, 25, 'Tarash Upazila', 'তারাশ', 1),
(394, 25, 'Ullahpara Upazila', 'উল্লাপাড়া', 1),
(395, 26, 'Birampur Upazila', 'বিরামপুর', 1),
(396, 26, 'Birganj', 'বীরগঞ্জ', 1),
(397, 26, 'Biral Upazila', 'বিড়াল', 1),
(398, 26, 'Bochaganj Upazila', 'বোচাগঞ্জ', 1),
(399, 26, 'Chirirbandar Upazila', 'চিরিরবন্দর', 1),
(400, 26, 'Phulbari Upazila', 'ফুলবাড়ি', 1),
(401, 26, 'Ghoraghat Upazila', 'ঘোড়াঘাট', 1),
(402, 26, 'Hakimpur Upazila', 'হাকিমপুর', 1),
(403, 26, 'Kaharole Upazila', 'কাহারোল', 1),
(404, 26, 'Khansama Upazila', 'খানসামা', 1),
(405, 26, 'Dinajpur Sadar Upazila', 'দিনাজপুর সদর', 1),
(406, 26, 'Nawabganj', 'নবাবগঞ্জ', 1),
(407, 26, 'Parbatipur Upazila', 'পার্বতীপুর', 1),
(408, 27, 'Fulchhari', 'ফুলছড়ি', 1),
(409, 27, 'Gaibandha sadar', 'গাইবান্ধা সদর', 1),
(410, 27, 'Gobindaganj', 'গোবিন্দগঞ্জ', 1),
(411, 27, 'Palashbari', 'পলাশবাড়ী', 1),
(412, 27, 'Sadullapur', 'সাদুল্যাপুর', 1),
(413, 27, 'Saghata', 'সাঘাটা', 1),
(414, 27, 'Sundarganj', 'সুন্দরগঞ্জ', 1),
(415, 28, 'Kurigram Sadar', 'কুড়িগ্রাম সদর', 1),
(416, 28, 'Nageshwari', 'নাগেশ্বরী', 1),
(417, 28, 'Bhurungamari', 'ভুরুঙ্গামারি', 1),
(418, 28, 'Phulbari', 'ফুলবাড়ি', 1),
(419, 28, 'Rajarhat', 'রাজারহাট', 1),
(420, 28, 'Ulipur', 'উলিপুর', 1),
(421, 28, 'Chilmari', 'চিলমারি', 1),
(422, 28, 'Rowmari', 'রউমারি', 1),
(423, 28, 'Char Rajibpur', 'চর রাজিবপুর', 1),
(424, 29, 'Lalmanirhat Sadar', 'লালমনিরহাট সদর', 1),
(425, 29, 'Aditmari', 'আদিতমারি', 1),
(426, 29, 'Kaliganj', 'কালীগঞ্জ', 1),
(427, 29, 'Hatibandha', 'হাতিবান্ধা', 1),
(428, 29, 'Patgram', 'পাটগ্রাম', 1),
(429, 30, 'Nilphamari Sadar', 'নীলফামারী সদর', 1),
(430, 30, 'Saidpur', 'সৈয়দপুর', 1),
(431, 30, 'Jaldhaka', 'জলঢাকা', 1),
(432, 30, 'Kishoreganj', 'কিশোরগঞ্জ', 1),
(433, 30, 'Domar', 'ডোমার', 1),
(434, 30, 'Dimla', 'ডিমলা', 1),
(435, 31, 'Panchagarh Sadar', 'পঞ্চগড় সদর', 1),
(436, 31, 'Debiganj', 'দেবীগঞ্জ', 1),
(437, 31, 'Boda', 'বোদা', 1),
(438, 31, 'Atwari', 'আটোয়ারি', 1),
(439, 31, 'Tetulia', 'তেতুলিয়া', 1),
(440, 32, 'Badarganj', 'বদরগঞ্জ', 1),
(441, 32, 'Mithapukur', 'মিঠাপুকুর', 1),
(442, 32, 'Gangachara', 'গঙ্গাচরা', 1),
(443, 32, 'Kaunia', 'কাউনিয়া', 1),
(444, 32, 'Rangpur Sadar', 'রংপুর সদর', 1),
(445, 32, 'Pirgachha', 'পীরগাছা', 1),
(446, 32, 'Pirganj', 'পীরগঞ্জ', 1),
(447, 32, 'Taraganj', 'তারাগঞ্জ', 1),
(448, 33, 'Thakurgaon Sadar Upazila', 'ঠাকুরগাঁও সদর', 1),
(449, 33, 'Pirganj Upazila', 'পীরগঞ্জ', 1),
(450, 33, 'Baliadangi Upazila', 'বালিয়াডাঙ্গি', 1),
(451, 33, 'Haripur Upazila', 'হরিপুর', 1),
(452, 33, 'Ranisankail Upazila', 'রাণীসংকইল', 1),
(453, 51, 'Ajmiriganj', 'আজমিরিগঞ্জ', 1),
(454, 51, 'Baniachang', 'বানিয়াচং', 1),
(455, 51, 'Bahubal', 'বাহুবল', 1),
(456, 51, 'Chunarughat', 'চুনারুঘাট', 1),
(457, 51, 'Habiganj Sadar', 'হবিগঞ্জ সদর', 1),
(458, 51, 'Lakhai', 'লাক্ষাই', 1),
(459, 51, 'Madhabpur', 'মাধবপুর', 1),
(460, 51, 'Nabiganj', 'নবীগঞ্জ', 1),
(461, 51, 'Shaistagonj Upazila', 'শায়েস্তাগঞ্জ', 1),
(462, 52, 'Moulvibazar Sadar', 'মৌলভীবাজার', 1),
(463, 52, 'Barlekha', 'বড়লেখা', 1),
(464, 52, 'Juri', 'জুড়ি', 1),
(465, 52, 'Kamalganj', 'কামালগঞ্জ', 1),
(466, 52, 'Kulaura', 'কুলাউরা', 1),
(467, 52, 'Rajnagar', 'রাজনগর', 1),
(468, 52, 'Sreemangal', 'শ্রীমঙ্গল', 1),
(469, 53, 'Bishwamvarpur', 'বিসশম্ভারপুর', 1),
(470, 53, 'Chhatak', 'ছাতক', 1),
(471, 53, 'Derai', 'দেড়াই', 1),
(472, 53, 'Dharampasha', 'ধরমপাশা', 1),
(473, 53, 'Dowarabazar', 'দোয়ারাবাজার', 1),
(474, 53, 'Jagannathpur', 'জগন্নাথপুর', 1),
(475, 53, 'Jamalganj', 'জামালগঞ্জ', 1),
(476, 53, 'Sulla', 'সুল্লা', 1),
(477, 53, 'Sunamganj Sadar', 'সুনামগঞ্জ সদর', 1),
(478, 53, 'Shanthiganj', 'শান্তিগঞ্জ', 1),
(479, 53, 'Tahirpur', 'তাহিরপুর', 1),
(480, 54, 'Sylhet Sadar', 'সিলেট সদর', 1),
(481, 54, 'Beanibazar', 'বেয়ানিবাজার', 1),
(482, 54, 'Bishwanath', 'বিশ্বনাথ', 1),
(483, 54, 'Dakshin Surma Upazila', 'দক্ষিণ সুরমা', 1),
(484, 54, 'Balaganj', 'বালাগঞ্জ', 1),
(485, 54, 'Companiganj', 'কোম্পানিগঞ্জ', 1),
(486, 54, 'Fenchuganj', 'ফেঞ্চুগঞ্জ', 1),
(487, 54, 'Golapganj', 'গোলাপগঞ্জ', 1),
(488, 54, 'Gowainghat', 'গোয়াইনঘাট', 1),
(489, 54, 'Jaintiapur', 'জয়ন্তপুর', 1),
(490, 54, 'Kanaighat', 'কানাইঘাট', 1),
(491, 54, 'Zakiganj', 'জাকিগঞ্জ', 1),
(492, 54, 'Nobigonj', 'নবীগঞ্জ', 1),
(493, 1, 'Adabor Police Station', NULL, 2),
(494, 1, 'Badda Police Station', NULL, 1),
(495, 1, 'Badda Police Station', NULL, 1),
(496, 1, 'Badda Police Station', NULL, 1),
(497, 1, 'Badda Police Station', NULL, 2),
(498, 1, 'Banani Police Station', NULL, 1),
(499, 1, 'Banani Police Station', NULL, 2),
(500, 1, 'Bangshal Police Station', NULL, 1),
(501, 1, 'Bangshal Police Station', NULL, 2),
(502, 1, 'Bimanbandar Police Station', NULL, 1),
(503, 1, 'Bimanbandar Police Station', NULL, 2),
(504, 1, 'Cantonment Police Station', NULL, 1),
(505, 1, 'Cantonment Police Station', NULL, 2),
(506, 1, 'halkbazar Police Station', NULL, 1),
(507, 1, 'halkbazar Police Station', NULL, 2),
(508, 1, 'Dakshin Khan Police Station', NULL, 1),
(509, 1, 'Dakshin Khan Police Station', NULL, 2),
(510, 1, 'Darus-Salam Police Station', NULL, 1),
(511, 1, 'Darus-Salam Police Station', NULL, 2),
(512, 1, 'Demra Police Station', NULL, 1),
(513, 1, 'Demra Police Station', NULL, 2),
(514, 1, 'Dhanmondi Police Station', NULL, 1),
(515, 1, 'Dhanmondi Police Station', NULL, 2),
(516, 1, 'Gandaria Police Station', NULL, 1),
(517, 1, 'Gandaria Police Station', NULL, 2),
(518, 1, 'Gulshan Police Station', NULL, 1),
(519, 1, 'Gulshan Police Station', NULL, 2),
(520, 1, 'Hazaribag Police Station', NULL, 1),
(521, 1, 'Hazaribag Police Station', NULL, 2),
(522, 1, 'Jattrabari Police Station', NULL, 1),
(523, 1, 'Jattrabari Police Station', NULL, 2),
(524, 1, 'Kafrul Police Station', NULL, 1),
(525, 1, 'Kafrul Police Station', NULL, 2),
(526, 1, 'Kalabagan Police Station', NULL, 1),
(527, 1, 'Kalabagan Police Station', NULL, 2),
(528, 1, 'Kamrangirchar Police Station', NULL, 1),
(529, 1, 'Kamrangirchar Police Station', NULL, 2),
(530, 1, 'KhilgoanPolice Station', NULL, 1),
(531, 1, 'KhilgoanPolice Station', NULL, 2),
(532, 1, 'Khilkhet Police Station', NULL, 1),
(533, 1, 'Khilkhet Police Station', NULL, 2),
(534, 1, 'Kodomtali Police Station', NULL, 1),
(535, 1, 'Kodomtali Police Station', NULL, 2),
(536, 1, 'Kotwali Police Station', NULL, 1),
(537, 1, 'Kotwali Police Station', NULL, 2),
(538, 1, 'Lalbagh Police Station', NULL, 1),
(539, 1, 'Lalbagh Police Station', NULL, 2),
(540, 1, 'Mirpur Model Police Station', NULL, 1),
(541, 1, 'Mirpur Model Police Station', NULL, 2),
(542, 1, 'ohammadpur Police Station', NULL, 1),
(543, 1, 'ohammadpur Police Station', NULL, 2),
(544, 1, 'Motijheel Police Station', NULL, 1),
(545, 1, 'Motijheel Police Station', NULL, 2),
(546, 1, 'Mugda Police Station', NULL, 1),
(547, 1, 'Mugda Police Station', NULL, 2),
(548, 1, 'New Market Police Station', NULL, 1),
(549, 1, 'New Market Police Station', NULL, 2),
(550, 1, 'Pallabi Police Station', NULL, 1),
(551, 1, 'Pallabi Police Station', NULL, 2),
(552, 1, 'Paltan Police Station', NULL, 1),
(553, 1, 'Paltan Police Station', NULL, 2),
(554, 1, 'Ramna Police Station', NULL, 1),
(555, 1, 'Ramna Police Station', NULL, 2),
(556, 1, 'Rampura Police Station', NULL, 1),
(557, 1, 'Rampura Police Station', NULL, 2),
(558, 1, 'Rupnagar Police Station', NULL, 1),
(559, 1, 'Rupnagar Police Station', NULL, 2),
(560, 1, 'Sabujbag Police Station', NULL, 1),
(561, 1, 'Sabujbag Police Station', NULL, 2),
(562, 1, 'Shah Ali Police Station', NULL, 1),
(563, 1, 'Shah Ali Police Station', NULL, 2),
(564, 1, 'Shahbag Police Station', NULL, 1),
(565, 1, 'Shahbag Police Station', NULL, 2),
(566, 1, 'Shahjahanpur Police Station', NULL, 1),
(567, 1, 'Shahjahanpur Police Station', NULL, 2),
(568, 1, 'Sutrapur Police Station', NULL, 1),
(569, 1, 'Sutrapur Police Station', NULL, 2),
(570, 1, 'Shyampur Police Station', NULL, 1),
(571, 1, 'Shyampur Police Station', NULL, 2),
(572, 1, 'Sher e Bangla Nagar Police Station', NULL, 1),
(573, 1, 'Sher e Bangla Nagar Police Station', NULL, 2),
(574, 1, 'Tejgoan Industrial Police Station', NULL, 1),
(575, 1, 'Tejgoan Industrial Police Station', NULL, 2),
(576, 1, 'Tejgoan Police Station', NULL, 1),
(577, 1, 'Tejgoan Police Station', NULL, 2),
(578, 1, 'Turag Police Station', NULL, 1),
(579, 1, 'Turag Police Station', NULL, 2),
(580, 1, 'Uttara East Police Station', NULL, 1),
(581, 1, 'Uttara East Police Station', NULL, 2),
(582, 1, 'Uttara West Police Station', NULL, 1),
(583, 1, 'Uttara West Police Station', NULL, 2),
(584, 1, 'Uttar Khan Police Station', NULL, 1),
(585, 1, 'Uttar Khan Police Station', NULL, 2),
(586, 1, 'Bsahantek Police Station', NULL, 1),
(587, 1, 'Bsahantek Police Station', NULL, 2),
(588, 1, 'Vatara Police Station', NULL, 1),
(589, 1, 'Vatara Police Station', NULL, 2),
(590, 1, 'Wari Police Station', NULL, 1),
(591, 1, 'Wari Police Station', NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `third_party_services`
--

CREATE TABLE `third_party_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `help_line_phone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contract_person` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contract_person_phone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_verified` tinyint(4) NOT NULL DEFAULT 1,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transports`
--

CREATE TABLE `transports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `license_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `car_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_verified` tinyint(4) NOT NULL DEFAULT 1,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transport_services`
--

CREATE TABLE `transport_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_verified` tinyint(4) NOT NULL DEFAULT 1,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `useruid` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `login_otp` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `login_otp_expire_time` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `show_password` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `user_approval_status_id` int(11) DEFAULT NULL,
  `login_status` tinyint(4) NOT NULL,
  `verified_by` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `permission_power` tinyint(4) NOT NULL DEFAULT 1,
  `is_verified` tinyint(4) NOT NULL DEFAULT 1,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `useruid`, `name`, `phone`, `login_otp`, `login_otp_expire_time`, `email`, `password`, `show_password`, `email_verified_at`, `branch_id`, `role_id`, `user_approval_status_id`, `login_status`, `verified_by`, `status`, `is_active`, `permission_power`, `is_verified`, `deleted_at`, `created_by`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '2021001', 'Super Admin', '01712794034', '3935', '11:14:44', 'superadmin@gmail.com', '$2y$12$tln1TvduZij2Ps3.uNXUCeUIW6p1Q6fPdTc.XuqnXwhOZiurrhqp6', '121', NULL, 1, 1, 2, 1, NULL, 1, 1, 1, 1, NULL, NULL, NULL, '2020-12-08 06:36:02', '2021-01-09 04:42:10'),
(2, '2021002', 'Salauddin Islam Lablu', '01704977777', NULL, NULL, 'dakbd7@gmail.com', '$2y$10$q6W8jFQETx2srNSz9KIOjuTJX7f.eIxShTFo9geBjATrruFkOoM3.', '123', NULL, 1, 2, 2, 1, NULL, 1, 1, 1, 1, NULL, NULL, NULL, '2021-01-08 16:09:43', '2021-01-08 16:09:43'),
(3, '2021003', 'Muhammad Rakib', '01755560225', NULL, '11:04:07', 'believestorebd@gmail.com', NULL, '01755560225', NULL, 1, 4, 2, 0, NULL, 1, 1, 1, 1, NULL, NULL, NULL, '2021-01-08 16:52:58', '2021-01-27 05:51:39'),
(4, '2021004', 'Kazi Raihanul Islam', '01815450466', NULL, NULL, 'dreamlessarman@gmail.com', '$2y$10$7A4VFM3nkjYQIUfJt8liq.Es/RS8zj2fFqC73IzaZJEio6eiVY5IW', '123123', NULL, 2, 9, 2, 1, NULL, 1, 1, 1, 1, NULL, NULL, NULL, '2021-01-08 17:05:41', '2021-01-30 07:51:05'),
(5, '2021005', 'Mohammed Sabirul Islam', '01842501005', NULL, NULL, 'sabirtazulislam@gmail.com', '$2y$10$GWUaC8SPF7il3HQ12VWry.IY22R1m9.LKWCNwCs3Wgh1bcT1N7nwq', '123123', NULL, 3, 9, 2, 0, NULL, 1, 1, 1, 1, NULL, NULL, NULL, '2021-01-08 17:07:18', '2021-01-31 13:10:30'),
(6, '2021006', 'Opi Ahmed', '01720265692', NULL, NULL, 'mdopi185059@gmail.com', '$2y$10$nkLUlluksYZvE5e/D4P75uwq8RDZAG0kAV0xIHQQg8Cvj0KreT7wS', '123123', NULL, 1, 5, 2, 1, NULL, 1, 1, 1, 1, NULL, NULL, NULL, '2021-01-08 17:10:22', '2021-01-08 17:10:22'),
(7, '2021007', 'Rabu', '01920993474', NULL, NULL, 'robo126@gmail.com', '$2y$10$cnuNyi6J0OjIhevM9HN2bOL4C8IjqTM7BO/jYW5ljx6JMFNrueOmC', '123123', NULL, 2, 5, 2, 0, NULL, 1, 1, 1, 1, NULL, NULL, NULL, '2021-01-08 17:11:56', '2021-01-31 13:33:50'),
(8, '2021008', 'Rockybul islam', '01776649180', NULL, NULL, 'rockybulislam258@gmail.com', '$2y$10$.0FTmV.XDElfNDL/bBfpBeGKRW4sn0cuoOfTZi1i2c6ceamasl2LO', '123123', NULL, 3, 5, 2, 1, NULL, 1, 1, 1, 1, NULL, NULL, NULL, '2021-01-08 17:12:45', '2021-01-08 17:12:45'),
(9, '2021009', 'Md Ibrahim', '01723019477', NULL, NULL, 'ibrahim@gmail.com', '$2y$10$.Z8jxZxwx9NIedlpOBNaR.ayd50cES0Vq/vs/yjyiSQ41NhA6G/3q', '121', NULL, 1, 5, 2, 1, NULL, 1, 1, 1, 1, NULL, NULL, NULL, '2021-01-09 04:46:13', '2021-01-09 04:46:13'),
(10, '2021010', 'Nazrul Islam', '01988139009', NULL, '11:13:30', 'nazrul@gmail.com', NULL, '123123', NULL, 2, 4, 2, 0, NULL, 1, 1, 1, 1, NULL, NULL, NULL, '2021-01-09 05:03:49', '2021-01-09 05:39:25');

-- --------------------------------------------------------

--
-- Table structure for table `user_approval_statuses`
--

CREATE TABLE `user_approval_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `verified_by` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_verified` tinyint(4) NOT NULL DEFAULT 1,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_role_assignes`
--

CREATE TABLE `user_role_assignes` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `is_active` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `status` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `verified` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_deleted` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_role_menu_actions`
--

CREATE TABLE `user_role_menu_actions` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_role_menu_title_id` int(11) DEFAULT NULL,
  `action_name` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `controller_name` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `action_checker_route_or_url` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `verified` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_deleted` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_role_menu_action_permitions`
--

CREATE TABLE `user_role_menu_action_permitions` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_role_menu_action_id` int(11) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `is_active` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `status` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `verified` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_deleted` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_role_menu_titles`
--

CREATE TABLE `user_role_menu_titles` (
  `id` int(10) UNSIGNED NOT NULL,
  `menu_title` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `menu_title_checker_route_or_url` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `menu_module_type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '3',
  `status` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `verified` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_deleted` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_role_menu_title_permitions`
--

CREATE TABLE `user_role_menu_title_permitions` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_role_menu_title_id` int(11) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `is_active` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `status` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `verified` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_deleted` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_role_modules`
--

CREATE TABLE `user_role_modules` (
  `id` int(10) UNSIGNED NOT NULL,
  `table_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `module_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `verified` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_deleted` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_role_module_actions`
--

CREATE TABLE `user_role_module_actions` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_role_module_id` int(11) DEFAULT NULL,
  `action_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `action_checker_route_or_url` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `verified` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_deleted` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_role_module_action_permitions`
--

CREATE TABLE `user_role_module_action_permitions` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_role_module_action_id` int(11) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `is_active` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `status` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `verified` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_deleted` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `warehouses`
--

CREATE TABLE `warehouses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_verified` tinyint(4) NOT NULL DEFAULT 1,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `weights`
--

CREATE TABLE `weights` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `calculation` decimal(20,2) NOT NULL DEFAULT 1.00,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_verified` tinyint(4) NOT NULL DEFAULT 1,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `weights`
--

INSERT INTO `weights` (`id`, `name`, `calculation`, `status`, `is_active`, `is_verified`, `deleted_at`, `created_by`, `created_at`, `updated_at`) VALUES
(1, '500 gm', '60.00', 1, 1, 1, NULL, NULL, '2020-12-09 04:21:06', '2020-12-09 04:21:06'),
(2, '1 kg', '60.00', 1, 1, 1, NULL, NULL, '2020-12-09 04:22:13', '2020-12-09 04:22:13'),
(3, '1.5 kg', '72.00', 1, 1, 1, NULL, NULL, '2020-12-09 04:22:31', '2020-12-09 04:22:31'),
(4, '2 kg', '84.00', 1, 1, 1, NULL, NULL, '2020-12-09 04:22:42', '2020-12-09 04:22:42'),
(5, '2.5 kg', '96.00', 1, 1, 1, NULL, NULL, '2020-12-09 04:22:56', '2020-12-09 04:22:56'),
(6, '3 kg', '108.00', 1, 1, 1, NULL, NULL, '2020-12-09 04:23:10', '2020-12-09 04:23:10'),
(7, '3 kg Above', '150.00', 1, 1, 1, NULL, NULL, '2020-12-09 04:41:32', '2020-12-09 04:41:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_typies`
--
ALTER TABLE `account_typies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `account_typies_name_unique` (`name`);

--
-- Indexes for table `agents`
--
ALTER TABLE `agents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `agent_detail_informations`
--
ALTER TABLE `agent_detail_informations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `areas_area_name_unique` (`area_name`);

--
-- Indexes for table `area_branch`
--
ALTER TABLE `area_branch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `banks_name_unique` (`name`);

--
-- Indexes for table `bank_accounts`
--
ALTER TABLE `bank_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `branches_company_name_unique` (`company_name`);

--
-- Indexes for table `branch_commissions`
--
ALTER TABLE `branch_commissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branch_commission_settings`
--
ALTER TABLE `branch_commission_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branch_commission_typies`
--
ALTER TABLE `branch_commission_typies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `branch_commission_typies_name_unique` (`name`);

--
-- Indexes for table `branch_pay_to_merchant_client_invoices`
--
ALTER TABLE `branch_pay_to_merchant_client_invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branch_pay_to_merchant_client_invoice_details`
--
ALTER TABLE `branch_pay_to_merchant_client_invoice_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branch_profits`
--
ALTER TABLE `branch_profits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branch_typies`
--
ALTER TABLE `branch_typies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `branch_typies_name_unique` (`name`);

--
-- Indexes for table `business_typies`
--
ALTER TABLE `business_typies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `business_typies_name_unique` (`name`);

--
-- Indexes for table `commission_typies`
--
ALTER TABLE `commission_typies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `commission_typies_name_unique` (`name`);

--
-- Indexes for table `company_profits`
--
ALTER TABLE `company_profits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery_men`
--
ALTER TABLE `delivery_men`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery_otps`
--
ALTER TABLE `delivery_otps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivey_charge_typies`
--
ALTER TABLE `delivey_charge_typies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `delivey_charge_typies_name_unique` (`name`);

--
-- Indexes for table `delivey_parcel_amount_typies`
--
ALTER TABLE `delivey_parcel_amount_typies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `delivey_parcel_amount_typies_name_unique` (`name`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `final_success_cancel_statuses`
--
ALTER TABLE `final_success_cancel_statuses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `final_success_cancel_statuses_name_unique` (`name`);

--
-- Indexes for table `general_customers`
--
ALTER TABLE `general_customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `head_office_pay_to_branch_invoices`
--
ALTER TABLE `head_office_pay_to_branch_invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `head_office_pay_to_branch_invoice_details`
--
ALTER TABLE `head_office_pay_to_branch_invoice_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hub_detail_informations`
--
ALTER TABLE `hub_detail_informations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `instant_all_charge_received_statuses`
--
ALTER TABLE `instant_all_charge_received_statuses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `instant_all_charge_received_statuses_name_unique` (`name`);

--
-- Indexes for table `manpower_assign_to_areas`
--
ALTER TABLE `manpower_assign_to_areas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manpower_commission_settings`
--
ALTER TABLE `manpower_commission_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manpower_detail_informations`
--
ALTER TABLE `manpower_detail_informations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manpower_income_histories`
--
ALTER TABLE `manpower_income_histories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manpower_typies`
--
ALTER TABLE `manpower_typies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `manpower_typies_name_unique` (`name`);

--
-- Indexes for table `merchants`
--
ALTER TABLE `merchants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `merchant_settings`
--
ALTER TABLE `merchant_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `merchant_shops`
--
ALTER TABLE `merchant_shops`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_assigning_statuses`
--
ALTER TABLE `order_assigning_statuses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `order_assigning_statuses_name_unique` (`name`);

--
-- Indexes for table `order_assigns`
--
ALTER TABLE `order_assigns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_descriptions`
--
ALTER TABLE `order_descriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_destinations`
--
ALTER TABLE `order_destinations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_notes`
--
ALTER TABLE `order_notes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_pickup_delivery_canceling_reasons`
--
ALTER TABLE `order_pickup_delivery_canceling_reasons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `order_pickup_delivery_canceling_reasons_name_unique` (`name`);

--
-- Indexes for table `order_pickup_delivery_cancels`
--
ALTER TABLE `order_pickup_delivery_cancels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_pickup_delivery_holding_reasons`
--
ALTER TABLE `order_pickup_delivery_holding_reasons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `order_pickup_delivery_holding_reasons_name_unique` (`name`);

--
-- Indexes for table `order_pickup_delivery_reschedules`
--
ALTER TABLE `order_pickup_delivery_reschedules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_processing_histories`
--
ALTER TABLE `order_processing_histories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_processing_typies`
--
ALTER TABLE `order_processing_typies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `order_processing_typies_name_unique` (`name`);

--
-- Indexes for table `order_receiving_sending_statuses`
--
ALTER TABLE `order_receiving_sending_statuses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `order_receiving_sending_statuses_name_unique` (`name`);

--
-- Indexes for table `order_sms_sendings`
--
ALTER TABLE `order_sms_sendings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_statuses`
--
ALTER TABLE `order_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_third_parties`
--
ALTER TABLE `order_third_parties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parcel_amount_payment_statuses`
--
ALTER TABLE `parcel_amount_payment_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parcel_amount_payment_typies`
--
ALTER TABLE `parcel_amount_payment_typies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `parcel_amount_payment_typies_name_unique` (`name`);

--
-- Indexes for table `parcel_categories`
--
ALTER TABLE `parcel_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `parcel_categories_name_unique` (`name`);

--
-- Indexes for table `parcel_in_transports`
--
ALTER TABLE `parcel_in_transports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parcel_in_warehouses`
--
ALTER TABLE `parcel_in_warehouses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parcel_typies`
--
ALTER TABLE `parcel_typies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `parcel_typies_name_unique` (`name`);

--
-- Indexes for table `parce_owner_typies`
--
ALTER TABLE `parce_owner_typies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `parce_owner_typies_name_unique` (`name`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `payment_methods_name_unique` (`name`);

--
-- Indexes for table `pay_to_head_office_invoices`
--
ALTER TABLE `pay_to_head_office_invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pay_to_head_office_invoice_details`
--
ALTER TABLE `pay_to_head_office_invoice_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receive_amount_histories`
--
ALTER TABLE `receive_amount_histories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receive_amount_typies`
--
ALTER TABLE `receive_amount_typies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `receive_amount_typies_name_unique` (`name`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `service_charge_payment_statuses`
--
ALTER TABLE `service_charge_payment_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_charge_settings`
--
ALTER TABLE `service_charge_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_city_typies`
--
ALTER TABLE `service_city_typies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `service_city_typies_name_unique` (`name`);

--
-- Indexes for table `service_cod_payment_statuses`
--
ALTER TABLE `service_cod_payment_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_delivery_payment_statuses`
--
ALTER TABLE `service_delivery_payment_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_typies`
--
ALTER TABLE `service_typies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `service_typies_name_unique` (`name`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sms_authenticates`
--
ALTER TABLE `sms_authenticates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_office_detail_informations`
--
ALTER TABLE `sub_office_detail_informations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `thanas`
--
ALTER TABLE `thanas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `third_party_services`
--
ALTER TABLE `third_party_services`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `third_party_services_help_line_phone_unique` (`help_line_phone`),
  ADD UNIQUE KEY `third_party_services_contract_person_phone_unique` (`contract_person_phone`),
  ADD UNIQUE KEY `third_party_services_name_unique` (`name`);

--
-- Indexes for table `transports`
--
ALTER TABLE `transports`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `transports_name_unique` (`name`),
  ADD UNIQUE KEY `transports_license_no_unique` (`license_no`);

--
-- Indexes for table `transport_services`
--
ALTER TABLE `transport_services`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `transport_services_name_unique` (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_approval_statuses`
--
ALTER TABLE `user_approval_statuses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_approval_statuses_name_unique` (`name`);

--
-- Indexes for table `user_role_assignes`
--
ALTER TABLE `user_role_assignes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role_menu_actions`
--
ALTER TABLE `user_role_menu_actions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_role_menu_actions_action_checker_route_or_url_unique` (`action_checker_route_or_url`);

--
-- Indexes for table `user_role_menu_action_permitions`
--
ALTER TABLE `user_role_menu_action_permitions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role_menu_titles`
--
ALTER TABLE `user_role_menu_titles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_role_menu_titles_menu_title_checker_route_or_url_unique` (`menu_title_checker_route_or_url`);

--
-- Indexes for table `user_role_menu_title_permitions`
--
ALTER TABLE `user_role_menu_title_permitions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role_modules`
--
ALTER TABLE `user_role_modules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role_module_actions`
--
ALTER TABLE `user_role_module_actions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_role_module_actions_action_checker_route_or_url_unique` (`action_checker_route_or_url`);

--
-- Indexes for table `user_role_module_action_permitions`
--
ALTER TABLE `user_role_module_action_permitions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `warehouses`
--
ALTER TABLE `warehouses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `warehouses_name_unique` (`name`);

--
-- Indexes for table `weights`
--
ALTER TABLE `weights`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `weights_name_unique` (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_typies`
--
ALTER TABLE `account_typies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `agents`
--
ALTER TABLE `agents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `agent_detail_informations`
--
ALTER TABLE `agent_detail_informations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `areas`
--
ALTER TABLE `areas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=455;

--
-- AUTO_INCREMENT for table `area_branch`
--
ALTER TABLE `area_branch`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `bank_accounts`
--
ALTER TABLE `bank_accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `branch_commissions`
--
ALTER TABLE `branch_commissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `branch_commission_settings`
--
ALTER TABLE `branch_commission_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `branch_commission_typies`
--
ALTER TABLE `branch_commission_typies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `branch_pay_to_merchant_client_invoices`
--
ALTER TABLE `branch_pay_to_merchant_client_invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `branch_pay_to_merchant_client_invoice_details`
--
ALTER TABLE `branch_pay_to_merchant_client_invoice_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `branch_profits`
--
ALTER TABLE `branch_profits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `branch_typies`
--
ALTER TABLE `branch_typies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `business_typies`
--
ALTER TABLE `business_typies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `commission_typies`
--
ALTER TABLE `commission_typies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `company_profits`
--
ALTER TABLE `company_profits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `delivery_men`
--
ALTER TABLE `delivery_men`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `delivery_otps`
--
ALTER TABLE `delivery_otps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `delivey_charge_typies`
--
ALTER TABLE `delivey_charge_typies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `delivey_parcel_amount_typies`
--
ALTER TABLE `delivey_parcel_amount_typies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `final_success_cancel_statuses`
--
ALTER TABLE `final_success_cancel_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `general_customers`
--
ALTER TABLE `general_customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `head_office_pay_to_branch_invoices`
--
ALTER TABLE `head_office_pay_to_branch_invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `head_office_pay_to_branch_invoice_details`
--
ALTER TABLE `head_office_pay_to_branch_invoice_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hub_detail_informations`
--
ALTER TABLE `hub_detail_informations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `instant_all_charge_received_statuses`
--
ALTER TABLE `instant_all_charge_received_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `manpower_assign_to_areas`
--
ALTER TABLE `manpower_assign_to_areas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `manpower_commission_settings`
--
ALTER TABLE `manpower_commission_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `manpower_detail_informations`
--
ALTER TABLE `manpower_detail_informations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `manpower_income_histories`
--
ALTER TABLE `manpower_income_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `manpower_typies`
--
ALTER TABLE `manpower_typies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `merchants`
--
ALTER TABLE `merchants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `merchant_settings`
--
ALTER TABLE `merchant_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `merchant_shops`
--
ALTER TABLE `merchant_shops`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order_assigning_statuses`
--
ALTER TABLE `order_assigning_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `order_assigns`
--
ALTER TABLE `order_assigns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `order_descriptions`
--
ALTER TABLE `order_descriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_destinations`
--
ALTER TABLE `order_destinations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `order_notes`
--
ALTER TABLE `order_notes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_pickup_delivery_canceling_reasons`
--
ALTER TABLE `order_pickup_delivery_canceling_reasons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_pickup_delivery_cancels`
--
ALTER TABLE `order_pickup_delivery_cancels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_pickup_delivery_holding_reasons`
--
ALTER TABLE `order_pickup_delivery_holding_reasons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `order_pickup_delivery_reschedules`
--
ALTER TABLE `order_pickup_delivery_reschedules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_processing_histories`
--
ALTER TABLE `order_processing_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `order_processing_typies`
--
ALTER TABLE `order_processing_typies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order_receiving_sending_statuses`
--
ALTER TABLE `order_receiving_sending_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_sms_sendings`
--
ALTER TABLE `order_sms_sendings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `order_statuses`
--
ALTER TABLE `order_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `order_third_parties`
--
ALTER TABLE `order_third_parties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `parcel_amount_payment_statuses`
--
ALTER TABLE `parcel_amount_payment_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `parcel_amount_payment_typies`
--
ALTER TABLE `parcel_amount_payment_typies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `parcel_categories`
--
ALTER TABLE `parcel_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `parcel_in_transports`
--
ALTER TABLE `parcel_in_transports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `parcel_in_warehouses`
--
ALTER TABLE `parcel_in_warehouses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `parcel_typies`
--
ALTER TABLE `parcel_typies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `parce_owner_typies`
--
ALTER TABLE `parce_owner_typies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pay_to_head_office_invoices`
--
ALTER TABLE `pay_to_head_office_invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pay_to_head_office_invoice_details`
--
ALTER TABLE `pay_to_head_office_invoice_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `receive_amount_histories`
--
ALTER TABLE `receive_amount_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `receive_amount_typies`
--
ALTER TABLE `receive_amount_typies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `service_charge_payment_statuses`
--
ALTER TABLE `service_charge_payment_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `service_charge_settings`
--
ALTER TABLE `service_charge_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `service_city_typies`
--
ALTER TABLE `service_city_typies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `service_cod_payment_statuses`
--
ALTER TABLE `service_cod_payment_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `service_delivery_payment_statuses`
--
ALTER TABLE `service_delivery_payment_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `service_typies`
--
ALTER TABLE `service_typies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sms_authenticates`
--
ALTER TABLE `sms_authenticates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sub_office_detail_informations`
--
ALTER TABLE `sub_office_detail_informations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `thanas`
--
ALTER TABLE `thanas`
  MODIFY `id` int(2) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=592;

--
-- AUTO_INCREMENT for table `third_party_services`
--
ALTER TABLE `third_party_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transports`
--
ALTER TABLE `transports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transport_services`
--
ALTER TABLE `transport_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_approval_statuses`
--
ALTER TABLE `user_approval_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_role_assignes`
--
ALTER TABLE `user_role_assignes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_role_menu_actions`
--
ALTER TABLE `user_role_menu_actions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_role_menu_action_permitions`
--
ALTER TABLE `user_role_menu_action_permitions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_role_menu_titles`
--
ALTER TABLE `user_role_menu_titles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_role_menu_title_permitions`
--
ALTER TABLE `user_role_menu_title_permitions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_role_modules`
--
ALTER TABLE `user_role_modules`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_role_module_actions`
--
ALTER TABLE `user_role_module_actions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_role_module_action_permitions`
--
ALTER TABLE `user_role_module_action_permitions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `warehouses`
--
ALTER TABLE `warehouses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `weights`
--
ALTER TABLE `weights`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
