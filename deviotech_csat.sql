-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 21, 2021 at 06:46 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `deviotech_csat`
--

-- --------------------------------------------------------

--
-- Table structure for table `assistances`
--

CREATE TABLE `assistances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `assistance` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assistances`
--

INSERT INTO `assistances` (`id`, `assistance`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Other Assistance', 1, '2021-03-11 12:56:56', '2021-03-11 12:56:56'),
(2, 'Physiotherapy', 1, '2021-03-24 17:18:08', '2021-03-24 17:18:08'),
(3, 'Speech and Language', 1, '2021-03-24 17:18:23', '2021-03-24 17:18:23'),
(4, 'Meals on Wheels', 1, '2021-03-24 17:18:35', '2021-03-24 17:18:35');

-- --------------------------------------------------------

--
-- Table structure for table `care_givers`
--

CREATE TABLE `care_givers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `care_givers`
--

INSERT INTO `care_givers` (`id`, `user_id`, `name`, `id_number`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Jim', '5', 1, '2021-03-11 12:57:39', '2021-04-13 14:13:58'),
(2, 1, 'Mary', '4', 1, '2021-03-11 13:01:11', '2021-04-13 14:13:51'),
(3, 1, 'Sarah', '3', 1, '2021-03-24 00:58:10', '2021-04-13 14:13:43'),
(5, 1, 'Laura', '2', 1, '2021-03-24 00:59:12', '2021-05-06 02:04:35'),
(6, 1, 'Ger', '1', 1, '2021-04-06 20:27:06', '2021-04-06 20:27:06');

-- --------------------------------------------------------

--
-- Table structure for table `care_giver_records`
--

CREATE TABLE `care_giver_records` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `care_giver_id` int(11) NOT NULL,
  `care_giver_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attitude` int(11) DEFAULT NULL,
  `ability` int(11) DEFAULT NULL,
  `reliability` int(11) DEFAULT NULL,
  `average_giver` double(8,2) NOT NULL DEFAULT 0.00,
  `cg_comment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `average_giver_total` double(8,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `care_giver_records`
--

INSERT INTO `care_giver_records` (`id`, `client_id`, `care_giver_id`, `care_giver_name`, `attitude`, `ability`, `reliability`, `average_giver`, `cg_comment`, `average_giver_total`, `created_at`, `updated_at`) VALUES
(101, 50, 2, 'Laura', 8, 8, 7, 7.67, 'Hi, what are you doing care giver comment testing...', 7.67, '2021-05-06 02:09:08', '2021-05-06 02:09:08'),
(106, 49, 1, 'Ger', 10, 10, 10, 8.50, NULL, 8.50, '2021-05-06 02:58:20', '2021-05-06 02:58:20'),
(107, 49, 2, 'Laura', 7, 7, 7, 8.50, NULL, 8.50, '2021-05-06 02:58:20', '2021-05-06 02:58:20'),
(108, 49, 3, 'Sarah', 8, 8, 8, 8.50, NULL, 8.50, '2021-05-06 02:58:20', '2021-05-06 02:58:20'),
(109, 49, 4, 'Mary', 9, 9, 9, 8.50, NULL, 8.50, '2021-05-06 02:58:20', '2021-05-06 02:58:20'),
(112, 51, 3, 'Sarah', 9, 9, 7, 8.33, NULL, 8.33, '2021-05-06 03:20:20', '2021-05-06 03:20:20'),
(114, 52, 3, 'Sarah', 4, 9, 6, 6.33, NULL, 6.33, '2021-05-06 04:15:55', '2021-05-06 04:15:55'),
(120, 53, 1, 'Ger', 9, 9, 8, 8.67, NULL, 8.67, '2021-05-10 05:14:42', '2021-05-10 05:14:42'),
(122, 55, 1, 'Ger', 3, 8, 9, 6.67, 'Test', 6.67, '2021-05-19 04:25:31', '2021-05-19 04:25:31');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Public', 1, '2021-03-11 12:54:47', '2021-03-24 20:32:29'),
(2, 'Private', 1, '2021-03-24 17:19:35', '2021-03-24 20:31:50'),
(3, 'Public & Private', 1, '2021-03-24 17:19:57', '2021-03-24 20:32:19');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `care_start_date` date NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `condition` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `county` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `locality` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `eircode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `care_manager` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `care_manager_id` int(10) UNSIGNED DEFAULT NULL,
  `status` enum('Active','Suspend') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `province` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `care_start_date`, `name`, `id_number`, `dob`, `type`, `condition`, `county`, `locality`, `eircode`, `care_manager`, `care_manager_id`, `status`, `deleted_at`, `created_at`, `updated_at`, `province`) VALUES
(21, '2021-04-30', 'John', '123', '2021-04-29', 'Public', 'Cognitive', 'Cork', 'abc', '123', 'John', 7, 'Active', NULL, '2021-04-30 19:25:39', '2021-04-30 19:25:39', 'Munster'),
(22, '2021-04-30', 'CPA', '1234', '2021-04-30', 'Private', 'Physical', 'Carlow', 'PKer', '54', 'Mairead', 19, 'Active', NULL, '2021-04-30 19:30:25', '2021-04-30 19:30:25', 'Leinster'),
(23, '2021-01-04', 'John Test', '34234', '2006-02-02', 'Private', 'Cognitive', 'Carlow', 'test', '213214324', 'John', 7, 'Active', NULL, '2021-05-04 18:19:33', '2021-05-04 18:19:33', 'Leinster'),
(24, '2021-05-17', 'Test Client', '800', '1996-05-08', 'Public', 'Physical', 'Waterford', 'Test', 'test234', 'test', 24, 'Active', NULL, '2021-05-19 04:30:51', '2021-05-19 04:30:51', 'Munster');

-- --------------------------------------------------------

--
-- Table structure for table `client_records`
--

CREATE TABLE `client_records` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `qa_visit_date` date NOT NULL,
  `category` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `visit_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `county` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `locality` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `province` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_health_diagnose` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_dob` date NOT NULL,
  `care_start_date` date NOT NULL,
  `duration_of_visit` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `care_manager_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(191) DEFAULT NULL,
  `care_manager` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Cm_attitud` int(11) DEFAULT NULL,
  `Cm_ability` int(11) DEFAULT NULL,
  `Cm_reliability` int(11) DEFAULT NULL,
  `Cm_comment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Cm_average` double(8,2) NOT NULL DEFAULT 0.00,
  `Off_help` int(11) DEFAULT NULL,
  `Off_service` int(11) DEFAULT NULL,
  `Off_communication` int(11) DEFAULT NULL,
  `Off_average` double(8,2) NOT NULL DEFAULT 0.00,
  `Off_comment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `csat` int(11) DEFAULT NULL,
  `who` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adv_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expectations` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adv_disc` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adv_rec` int(11) DEFAULT NULL,
  `adv_comment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quality_of_Life` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cp_details` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `review_care_needs` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `review_care_plan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expand_on_unmet_needs` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `add_other_yes` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `add_other` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cg_meals` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `medi_set_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cg_hm_key` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cg_hm_key_sign` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cg_key_info` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cg_key_info_safe` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bath_hoist` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bt_hoist_service_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `starlift` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `starlift_service_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hoist` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hoist_service_date` date DEFAULT NULL,
  `profile_bed` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_service_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wheelchair_service_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ewchair` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sr_other` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sr_follow_up` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hygine` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hygine_detail` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cjournal` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cj_detail` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pref_sheet` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pref_sheet_detail` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `refill` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `refill_detail` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guidline` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guidline_detail` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_in` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_in_detail` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cg_content_log` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cg_content_log_detail` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cj_comment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `compatible` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `compatible_detail` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dependable` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dependable_detail` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `capable` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `capable_detail` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `recomm` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dementia` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pmh` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cater_care` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `per_care` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meal_prep` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `st_care` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pp_update` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pp_date` date DEFAULT NULL,
  `train_other` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `train_note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `care_giver` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dementia_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pm_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cater_carers_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `personal_care_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meal_preprations_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stoma_care_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `client_id_number` varchar(90) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Active','Disable') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `client_signatue` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `caremanager_signatue` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `eircode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agree_update_next_schedule` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nps` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `form_status` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '1 for draft, 2 for submitted'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `client_records`
--

INSERT INTO `client_records` (`id`, `qa_visit_date`, `category`, `visit_type`, `county`, `locality`, `province`, `client_number`, `client_health_diagnose`, `client_name`, `client_dob`, `care_start_date`, `duration_of_visit`, `care_manager_id`, `client_id`, `care_manager`, `Cm_attitud`, `Cm_ability`, `Cm_reliability`, `Cm_comment`, `Cm_average`, `Off_help`, `Off_service`, `Off_communication`, `Off_average`, `Off_comment`, `csat`, `who`, `adv_name`, `expectations`, `adv_disc`, `adv_rec`, `adv_comment`, `quality_of_Life`, `cp_details`, `review_care_needs`, `review_care_plan`, `expand_on_unmet_needs`, `add_other_yes`, `add_other`, `cg_meals`, `medi_set_type`, `cg_hm_key`, `cg_hm_key_sign`, `cg_key_info`, `cg_key_info_safe`, `bath_hoist`, `bt_hoist_service_date`, `starlift`, `starlift_service_date`, `hoist`, `hoist_service_date`, `profile_bed`, `profile_service_date`, `wheelchair_service_date`, `ewchair`, `sr_other`, `sr_follow_up`, `hygine`, `hygine_detail`, `cjournal`, `cj_detail`, `pref_sheet`, `pref_sheet_detail`, `refill`, `refill_detail`, `guidline`, `guidline_detail`, `time_in`, `time_in_detail`, `cg_content_log`, `cg_content_log_detail`, `cj_comment`, `compatible`, `compatible_detail`, `dependable`, `dependable_detail`, `capable`, `capable_detail`, `recomm`, `dementia`, `pmh`, `cater_care`, `per_care`, `meal_prep`, `st_care`, `pp_update`, `pp_date`, `train_other`, `train_note`, `care_giver`, `dementia_name`, `pm_name`, `cater_carers_name`, `personal_care_name`, `meal_preprations_name`, `stoma_care_name`, `created_at`, `updated_at`, `client_id_number`, `status`, `client_signatue`, `caremanager_signatue`, `eircode`, `agree_update_next_schedule`, `nps`, `form_status`) VALUES
(52, '2021-05-06', 'Public', 'Remote', 'Cork', 'abc', 'Munster', '123', 'Cognitive', 'John', '2021-04-29', '2021-04-30', '0', 22, 21, 'Brendon Macallum', 6, 6, 5, 'Test', 5.67, 5, 5, 8, 6.00, 'Test', 61, 'Sponsor', 'Test', 'Meeting Expectations', 'Test', 5, 'Test', 'Improved', 'Test', 'Test', 'Test', 'Test', 'No', 'Physiotherapy', 'No', NULL, 'No', NULL, 'No', NULL, 'yes', '21/01/1970', 'yes', '20/05/2021', 'No', '2021-05-26', 'No', NULL, NULL, 'No', 'test', 'test', 'Yes', NULL, 'Yes', NULL, 'Yes', NULL, 'Yes', NULL, 'Yes', NULL, 'Yes', NULL, 'Yes', NULL, NULL, 'Yes', NULL, 'Yes', NULL, 'Yes', NULL, 'Test', 'No', 'No', 'No', 'No', 'No', 'No', 'Yes', '2021-05-07', 'Test', 'Test', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-06 03:55:23', '2021-05-06 04:15:55', '123', 'Active', 'signature/U6573lzoXO.png', 'signature/QkR310Ty6L.png', '123', 'Test', 'Detractor', '1'),
(53, '2021-05-10', 'Public', 'Remote', 'Cork', 'abc', 'Munster', '123', 'Cognitive', 'John', '2021-04-29', '2021-04-30', '0', 19, 21, 'Mairead', 8, 9, 9, 'test', 8.67, 9, 9, 9, 9.00, 'test', 88, 'Client', 'test', 'Not meeting Expectations', 'test', 9, 'test', 'Same', 'test', 'test', 'test', 'test', 'No', NULL, 'No', NULL, 'No', 'No', 'No', 'No', 'No', NULL, 'No', NULL, 'No', NULL, 'No', NULL, NULL, 'No', 'test', 'test', 'Yes', NULL, 'Yes', NULL, 'Yes', NULL, 'Yes', NULL, 'Yes', NULL, 'Yes', NULL, 'Yes', NULL, 'test', 'Yes', NULL, 'Yes', NULL, 'Yes', NULL, 'test', 'No', 'No', 'No', 'No', 'No', 'No', 'Yes', '2021-05-26', 'test', 'test', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-10 05:04:51', '2021-05-10 05:14:42', '123', 'Active', 'signature/d3HeuIf8Wy.png', 'signature/8gh4MwEtfz.png', '123', 'test', 'Promoter', '1'),
(55, '2021-05-19', 'Private', 'Remote', 'Carlow', 'PKer', 'Leinster', '1234', 'Physical', 'CPA', '2021-04-30', '2021-04-30', '0', 7, 22, 'John', 10, 7, 10, 'TEst', 9.00, 6, 7, 8, 7.00, 'Test', 73, 'Client', 'Test', 'Not meeting Expectations', 'Test', 8, 'Test', 'Same', 'Test', 'Test', 'Test', 'Test', 'No', NULL, 'No', NULL, 'No', 'No', 'No', 'No', 'No', NULL, 'No', NULL, 'No', NULL, 'No', NULL, NULL, 'No', 'Test', 'Test', 'Yes', NULL, 'Yes', NULL, 'Yes', NULL, 'Yes', NULL, 'Yes', NULL, 'Yes', NULL, 'Yes', NULL, 'Test', 'Yes', NULL, 'Yes', NULL, 'Yes', NULL, 'Test', 'No', 'No', 'No', 'No', 'No', 'No', 'Yes', '2021-04-21', 'Test', 'sldkjf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-19 04:25:31', '2021-05-19 04:25:31', '1234', 'Active', 'signature/Kl3AidoOK1.png', 'signature/ea1kUBhSSg.png', '54', 'Test', 'Passive', '1');

-- --------------------------------------------------------

--
-- Table structure for table `counties`
--

CREATE TABLE `counties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `county` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `province_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `counties`
--

INSERT INTO `counties` (`id`, `county`, `province_id`, `status`, `created_at`, `updated_at`) VALUES
(5, 'Cork', 6, 1, '2021-03-31 14:27:58', '2021-04-02 01:04:11'),
(10, 'Waterford', 6, 1, '2021-04-06 19:46:56', '2021-04-06 19:46:56'),
(11, 'Carlow', 12, 1, '2021-04-13 14:15:43', '2021-04-13 14:15:43'),
(12, 'india', 6, 1, '2021-04-28 13:46:50', '2021-04-28 13:46:50');

-- --------------------------------------------------------

--
-- Table structure for table `diagnoses`
--

CREATE TABLE `diagnoses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `diagnose` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `diagnoses`
--

INSERT INTO `diagnoses` (`id`, `diagnose`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Cognitive', 1, '2021-03-11 12:55:09', '2021-03-24 20:34:25'),
(2, 'Physical', 1, '2021-03-24 20:39:32', '2021-03-24 20:39:32'),
(3, 'Cognitive & Physical', 1, '2021-03-24 20:39:46', '2021-03-24 20:39:46');

-- --------------------------------------------------------

--
-- Table structure for table `expectations`
--

CREATE TABLE `expectations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `expect` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expectations`
--

INSERT INTO `expectations` (`id`, `expect`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Meeting Expectations', 1, '2021-03-11 12:56:20', '2021-03-24 22:50:06'),
(2, 'Not meeting Expectations', 1, '2021-03-24 22:50:20', '2021-03-24 22:50:20'),
(3, 'Exceeding Expectations', 1, '2021-03-24 22:50:32', '2021-03-24 22:50:32');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `localities`
--

CREATE TABLE `localities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `locality` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `county_id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `localities`
--

INSERT INTO `localities` (`id`, `locality`, `county_id`, `status`, `created_at`, `updated_at`) VALUES
(10, 'locality cork a', 5, '1', '2021-04-02 01:37:32', '2021-04-02 01:37:32'),
(13, 'Nore Valley', 10, '1', '2021-04-06 19:47:11', '2021-04-06 19:47:11');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_02_17_044609_create_settings_table', 1),
(5, '2021_02_17_060816_create_counties_table', 1),
(6, '2021_02_17_064910_create_localities_table', 1),
(7, '2021_02_17_074321_create_provinces_table', 1),
(8, '2021_02_18_065555_create_user_profiles_table', 1),
(9, '2021_02_18_072228_create_categories_table', 1),
(10, '2021_02_18_084657_create_diagnoses_table', 1),
(11, '2021_02_18_121527_create_visit_types_table', 1),
(12, '2021_02_19_051942_create_care_givers_table', 1),
(13, '2021_02_19_064610_create_clients_table', 1),
(14, '2021_02_19_135025_create_surveys_table', 1),
(15, '2021_02_22_094304_create_client_records_table', 1),
(16, '2021_02_22_105320_create_care_giver_records_table', 1),
(17, '2021_02_23_070220_add_column_to_client_records', 1),
(18, '2021_02_23_074449_create_w_h_o_s_table', 1),
(19, '2021_02_23_091719_create_expectations_table', 1),
(20, '2021_02_23_094233_create_qualities_table', 1),
(21, '2021_02_23_100105_create_assistances_table', 1),
(22, '2021_02_23_125555_alter_client_records_for_remove_signature', 1),
(23, '2021_02_23_125703_alter_client_records_for_add_both_signature', 1),
(24, '2021_02_24_042919_change_client_records_column', 1),
(26, '2021_03_04_114443_remove_constrains_reference', 1),
(27, '2021_03_09_071847_alter_column_to_client_records', 1),
(28, '2021_03_11_065646_add_column_to_client_record', 2),
(29, '2021_04_01_114424_create_sessions_table', 2),
(30, '2021_04_02_052530_alter_provinces_table_for_remove_country_id', 3),
(31, '2021_04_02_053547_alter_countries_table_for_province_id_column', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('admin@csat.com', '$2y$10$QU7nA/Fcsf9hBy7I0Yzpfe8ttTDtmwnDJ5XT59mDydKVa4BJw/hcS', '2021-05-12 02:24:21');

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

CREATE TABLE `provinces` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `province` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `provinces`
--

INSERT INTO `provinces` (`id`, `province`, `status`, `created_at`, `updated_at`) VALUES
(6, 'Munster', '1', '2021-04-02 00:48:13', '2021-04-02 00:49:26'),
(12, 'Leinster', '1', '2021-04-06 19:46:38', '2021-04-06 19:46:38');

-- --------------------------------------------------------

--
-- Table structure for table `qualities`
--

CREATE TABLE `qualities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quality` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `qualities`
--

INSERT INTO `qualities` (`id`, `quality`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Improved', 1, '2021-03-11 12:56:38', '2021-03-24 22:49:19'),
(2, 'Same', 1, '2021-03-24 22:49:31', '2021-03-24 22:49:31'),
(3, 'Deteriorated', 1, '2021-03-24 22:49:43', '2021-03-24 22:49:43');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('cfe29AOyMWr4heH9lHbvdP057pcOq9Kxl1vZ10nH', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.212 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiYjdrVGZmS3pIWU5VbGp0SHg1ZHE3UU5OSG5jdmtzRXZkZGhYSGVBRSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozMzoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2NsaWVudC9saXN0Ijt9fQ==', 1621418003),
('d8g3IW9vE195e5GxFFSn899GZiY4hfU2DnsJrOEI', 24, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.212 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoibTBkYmZXeUNsdEJOQVpkUkZuUE1XNTltZU92WjBDZkhCalk4eThrbCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jYXJlLW1hbmFnZXIvc3VydmV5LWxpc3QiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToyNDt9', 1621418144),
('rLCbcSd2jqN9A1qyePQT4S193OLhZgloejKd6X8c', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:91.0) Gecko/20100101 Firefox/91.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZkhjb3F6amI4WGt2V0JiS1ptbjVybGF6cEFpZk9mMnExWHlyU3p2WSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTEwOiJodHRwOi8vbG9jYWxob3N0L0RldmlvdGVjaC9wcm9qZWN0cy9DU0FUL3B1YmxpYy9xdWFsaXR5LWFzc3VyYW5jZT9jPU1qTSUzRCZjYXJlX209TnclM0QlM0QmY2xpZW50PVNtOW9iaUJVWlhOMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1630582136),
('XtLvBcbewtykPWkPHWGj0d0dq07HLB2NGEobInuT', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiRjVUaW1qYjdVN2k0TmpGNm5TSkhLTndOT1VGMjRLamdnN1IydlI4aiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTEwOiJodHRwOi8vbG9jYWxob3N0L0RldmlvdGVjaC9wcm9qZWN0cy9DU0FUL3B1YmxpYy9xdWFsaXR5LWFzc3VyYW5jZT9jPU1qTSUzRCZjYXJlX209TnclM0QlM0QmY2xpZW50PVNtOW9iaUJVWlhOMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1630581283);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `setting` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `setting`, `created_at`, `updated_at`) VALUES
(1, 'logo', '/cms/home/HISC_Logo_png_file.png', '2021-03-24 20:42:26', '2021-03-24 20:42:26'),
(2, 'copyright_text', 'Copyright DLS 2021, All rights reserved.', '2021-03-24 20:43:03', '2021-03-24 20:43:03'),
(3, 'favicon', '/cms/home/WeCanDoThis.jpg', '2021-03-24 21:20:41', '2021-03-24 21:20:41');

-- --------------------------------------------------------

--
-- Table structure for table `surveys`
--

CREATE TABLE `surveys` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'uploads/users/default.png',
  `role` enum('admin','ops_manager','care_manager') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'care_manager',
  `status` enum('Active','Suspend') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `comment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `avatar`, `role`, `status`, `comment`, `deleted_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@csat.com', '2020-08-07 12:00:00', '$2y$10$8K2Rb5YJfLj1ttIfKuOjGu5qSau2UZgGOaJHcxGRXausdkwurHGqS', 'images/1619766459.jpg', 'admin', 'Active', NULL, NULL, '8nQoNXlz5pfVOJxD1W9E2No6BEP1Qa7rD7cxhBflwGr7yGHyqFvlsI2F50f0', '2021-03-10 08:13:52', '2021-05-12 02:23:51'),
(5, 'DuncanKerin33', 'duncan@digi-lean.ie', NULL, '$2y$12$F1cH8BE8LUjunP6umGR5De3fqC82KQ9ghXlqOt7RV5b6rBoYGPz7i', 'uploads/users/1616518431-5-11-20-DSL-Ltd--26.jpg', 'care_manager', 'Suspend', 'DuncanK Clare Mgr3', '2021-05-11 06:56:33', NULL, '2021-03-23 23:53:51', '2021-05-11 06:56:33'),
(6, 'DuncanKerinChanged', 'dunc.kerin@gmail.com', NULL, '$2y$10$7hCRlkaAl2XA1zKLspAmvuV5zxxANFVchiTLSuVe0Djp2RinnXXW6', 'images/1616659813.png', 'care_manager', 'Active', 'DK Lmk CareMgr', '2021-04-28 12:38:02', NULL, '2021-03-24 00:55:15', '2021-05-11 06:57:23'),
(7, 'John', 'johnoshanahan@leanbpi.ie', NULL, '$2y$10$rz4dYeK6/mKsL9.bfXHe0OWYd1P.WFUJQm9X3WGx3a8PcqED6naSO', 'uploads/users/1617175048-newbaze.jpg', 'care_manager', 'Active', 'test care manager', NULL, NULL, '2021-03-31 14:17:28', '2021-04-28 13:20:40'),
(8, 'Jimmy', 'oshanahanj@gmail.com', NULL, '$2y$10$zJomqnmMm1iv35vZFk4s5.24iBOo0QNRmtXn93zt3JaTd9ndvtpf.', 'uploads/users/1617175125-IPRALogoLarge.jpg', 'care_manager', 'Active', 'test', '2021-04-23 07:15:04', NULL, '2021-03-31 14:18:45', '2021-04-23 07:15:04'),
(10, 'Martin Guptill', 'martin@gmail.com', NULL, '$2y$10$MDMZOnRk.S3G5RXTRQfIheT0kdQ5nID.UZU8FgqLtUlHN3VWgzGG2', 'uploads/users/1617275282-martinguptill-cropped1s1lya62p85to1esrwtue4pbuejpg.jpg', 'ops_manager', 'Active', 'test comment', NULL, NULL, '2021-04-01 06:08:02', '2021-04-01 06:08:02'),
(12, 'Kashif Ali', 'kashif@gmail.com', NULL, '$2y$10$cXkMWxbIOVo4MOuYDiaXJemapdm4U3qCDlUMGPtfvRGZwjHfmSQVK', 'uploads/users/1617276864-download-(1).jpg', 'ops_manager', 'Active', NULL, NULL, NULL, '2021-04-01 06:34:24', '2021-04-01 06:34:24'),
(14, 'Test', 'test@test.com', NULL, '$2y$10$umWigL7fwpxatfq.jchR1.S.NUtLwKSqdXxTIrnKbmhTXeZuWBIya', 'uploads/users/1617363635-1607537071-sharecar.jpg', 'ops_manager', 'Active', NULL, NULL, NULL, '2021-04-02 18:40:35', '2021-04-02 18:40:35'),
(17, 'ambreen', 'iamambreenali@gmail.com', NULL, '$2y$10$ZmHiy8X.PaElbGJX3h2NVuqlA8I8ncHWX.6zDLX0f3PdKnyeNJc0a', 'uploads/users/1617607819-Screenshot_10.png', 'ops_manager', 'Active', NULL, NULL, NULL, '2021-04-05 14:30:19', '2021-04-05 14:30:19'),
(18, 'John Test', 'johnoshanahan@aol.com', NULL, '$2y$10$z4Ghx/u3eRUI0edwqK6BRemmOGdO8qj5PyCs8dfp6SwHDaAekjtsa', 'uploads/users/default.png', 'ops_manager', 'Active', NULL, NULL, NULL, '2021-04-06 19:42:58', '2021-04-06 19:42:58'),
(19, 'Mairead', 'johnmairead@aol.com', NULL, '$2y$10$BDUXxJ5n15xVpcX1jFYEtO5NFDrExa7PUMeWs5oiMtRITI/xz42se', 'uploads/users/default.png', 'care_manager', 'Active', 'test comment add care manager', NULL, NULL, '2021-04-06 20:28:24', '2021-04-28 13:55:55'),
(21, 'arslan', 'arslan.arshad370@gmail.com', NULL, '$2y$10$cp.woVx2lY1LKxQfailfzekVB42O9hpavtM//CnDOKdBGOPPXqXeu', 'uploads/users/default.png', 'care_manager', 'Active', 'test', NULL, NULL, '2021-05-04 12:33:37', '2021-05-04 12:33:37'),
(22, 'Brendon Macallum', 'brendon@gmail.com', NULL, '$2y$10$3TlmWbpInluEFF5jUI6Qwe7xRIIVBYD1Dfms/JvJZdgclGPOc1GVi', 'uploads/users/1620284200-jeremy_kessler_1.jpg', 'care_manager', 'Active', 'Brendon Comment', NULL, NULL, '2021-05-06 01:56:40', '2021-05-06 01:56:40'),
(24, 'test', 'test@gmail.com', NULL, '$2y$10$JHViqknqGTzZFBujkj4agO1QP0f8iUt/93ypiqyBopB3qDrxw9Qfm', 'uploads/users/default.png', 'care_manager', 'Active', 'test', NULL, NULL, '2021-05-19 04:26:23', '2021-05-19 04:26:23');

-- --------------------------------------------------------

--
-- Table structure for table `user_profiles`
--

CREATE TABLE `user_profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `province` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_profiles`
--

INSERT INTO `user_profiles` (`id`, `user_id`, `phone`, `country`, `province`, `city`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL, NULL, NULL, 1, '2021-03-10 08:13:52', '2021-03-10 08:13:52'),
(5, 5, NULL, NULL, NULL, NULL, 1, '2021-03-23 23:53:51', '2021-03-23 23:53:51'),
(6, 6, NULL, NULL, NULL, NULL, 1, '2021-03-24 00:55:15', '2021-03-24 00:55:15'),
(7, 7, NULL, NULL, NULL, NULL, 1, '2021-03-31 14:17:28', '2021-03-31 14:17:28'),
(8, 8, NULL, NULL, NULL, NULL, 1, '2021-03-31 14:18:45', '2021-03-31 14:18:45'),
(9, 10, NULL, NULL, NULL, NULL, 1, '2021-04-01 06:08:02', '2021-04-01 06:08:02'),
(11, 12, NULL, NULL, NULL, NULL, 1, '2021-04-01 06:34:24', '2021-04-01 06:34:24'),
(13, 14, NULL, NULL, NULL, NULL, 1, '2021-04-02 18:40:35', '2021-04-02 18:40:35'),
(16, 17, NULL, NULL, NULL, NULL, 1, '2021-04-05 14:30:19', '2021-04-05 14:30:19'),
(17, 18, NULL, NULL, NULL, NULL, 1, '2021-04-06 19:42:58', '2021-04-06 19:42:58'),
(18, 19, NULL, NULL, NULL, NULL, 1, '2021-04-06 20:28:24', '2021-04-06 20:28:24'),
(20, 21, NULL, NULL, NULL, NULL, 1, '2021-05-04 12:33:37', '2021-05-04 12:33:37'),
(21, 22, NULL, NULL, NULL, NULL, 1, '2021-05-06 01:56:40', '2021-05-06 01:56:40'),
(23, 24, NULL, NULL, NULL, NULL, 1, '2021-05-19 04:26:23', '2021-05-19 04:26:23');

-- --------------------------------------------------------

--
-- Table structure for table `visit_types`
--

CREATE TABLE `visit_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `visit_types`
--

INSERT INTO `visit_types` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Remote', 1, '2021-03-11 12:54:59', '2021-04-28 13:43:01'),
(2, 'Onsite', 1, '2021-03-24 17:20:33', '2021-03-24 22:25:33');

-- --------------------------------------------------------

--
-- Table structure for table `w_h_o_s`
--

CREATE TABLE `w_h_o_s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `who` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `w_h_o_s`
--

INSERT INTO `w_h_o_s` (`id`, `who`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Sponsor', 1, '2021-03-11 12:56:08', '2021-04-28 13:52:15'),
(2, 'Client', 1, '2021-03-24 22:45:30', '2021-03-24 22:45:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assistances`
--
ALTER TABLE `assistances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `care_givers`
--
ALTER TABLE `care_givers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `care_givers_id_number_unique` (`id_number`),
  ADD KEY `care_givers_user_id_foreign` (`user_id`);

--
-- Indexes for table `care_giver_records`
--
ALTER TABLE `care_giver_records`
  ADD PRIMARY KEY (`id`),
  ADD KEY `care_giver_records_client_id_foreign` (`client_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_records`
--
ALTER TABLE `client_records`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_records_care_manager_id_foreign` (`care_manager_id`);

--
-- Indexes for table `counties`
--
ALTER TABLE `counties`
  ADD PRIMARY KEY (`id`),
  ADD KEY `counties_province_id_foreign` (`province_id`);

--
-- Indexes for table `diagnoses`
--
ALTER TABLE `diagnoses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expectations`
--
ALTER TABLE `expectations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `localities`
--
ALTER TABLE `localities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `localities_county_id_foreign` (`county_id`);

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
-- Indexes for table `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `qualities`
--
ALTER TABLE `qualities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surveys`
--
ALTER TABLE `surveys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_profiles`
--
ALTER TABLE `user_profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_profiles_user_id_foreign` (`user_id`);

--
-- Indexes for table `visit_types`
--
ALTER TABLE `visit_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `w_h_o_s`
--
ALTER TABLE `w_h_o_s`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assistances`
--
ALTER TABLE `assistances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `care_givers`
--
ALTER TABLE `care_givers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `care_giver_records`
--
ALTER TABLE `care_giver_records`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `client_records`
--
ALTER TABLE `client_records`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `counties`
--
ALTER TABLE `counties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `diagnoses`
--
ALTER TABLE `diagnoses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `expectations`
--
ALTER TABLE `expectations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `localities`
--
ALTER TABLE `localities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `provinces`
--
ALTER TABLE `provinces`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `qualities`
--
ALTER TABLE `qualities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `surveys`
--
ALTER TABLE `surveys`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `user_profiles`
--
ALTER TABLE `user_profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `visit_types`
--
ALTER TABLE `visit_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `w_h_o_s`
--
ALTER TABLE `w_h_o_s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `care_givers`
--
ALTER TABLE `care_givers`
  ADD CONSTRAINT `care_givers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `client_records`
--
ALTER TABLE `client_records`
  ADD CONSTRAINT `client_records_care_manager_id_foreign` FOREIGN KEY (`care_manager_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
