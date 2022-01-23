-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 23, 2022 at 02:01 PM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `deptmental_result_archive`
--

-- --------------------------------------------------------

--
-- Table structure for table `batches`
--

CREATE TABLE `batches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `session` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `batches`
--

INSERT INTO `batches` (`id`, `name`, `session`, `department_id`, `created_at`, `updated_at`) VALUES
(1, '4th', '2016-17', 1, '2022-01-11 23:08:56', '2022-01-11 23:08:56'),
(2, '5th', '2017-18', 1, '2022-01-20 02:30:24', '2022-01-20 02:30:24');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `credit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `code`, `credit`, `created_at`, `updated_at`) VALUES
(1, 'Computer Networks', 'CSE-3205', '3.0', '2022-01-11 11:13:00', '2022-01-11 11:17:06'),
(2, 'Theory of Computation', 'CSE-3203', '3.0', '2022-01-17 13:13:53', '2022-01-18 12:23:21'),
(3, 'Mathematical Analysis for Computer Science', 'CSE-3201', '3.0', '2022-01-18 11:08:57', '2022-01-18 11:08:57'),
(4, 'Computer Networks Lab', 'CSE-3206', '1.5', '2022-01-18 11:09:31', '2022-01-18 11:09:31'),
(5, 'Microprocessor and Microcontrollers', 'CSE-3207', '3.0', '2022-01-20 02:27:15', '2022-01-20 02:27:15'),
(6, 'Assembly Language, Microprocessor and Microcontrollers Lab', 'CSE-3208', '1.5', '2022-01-20 02:28:12', '2022-01-20 02:28:12'),
(7, 'Economics', 'HUM-3209', '2.0', '2022-01-20 02:28:39', '2022-01-20 02:29:23'),
(8, 'Professional Ethics and Industrial Management', 'HUM-3211', '3.0', '2022-01-20 02:29:11', '2022-01-20 02:29:11');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `faculty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `faculty`, `created_at`, `updated_at`) VALUES
(1, 'CSE', 'Science and Engineering', '2022-01-11 09:25:52', '2022-01-11 09:35:30');

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `batch_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`id`, `name`, `year`, `status`, `batch_id`, `created_at`, `updated_at`) VALUES
(1, '6th Semester Final', '2020', 'Completed', 1, '2022-01-15 13:04:56', '2022-01-17 11:06:23');

-- --------------------------------------------------------

--
-- Table structure for table `exam_courses`
--

CREATE TABLE `exam_courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `exam_id` bigint(20) UNSIGNED DEFAULT NULL,
  `course_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exam_courses`
--

INSERT INTO `exam_courses` (`id`, `exam_id`, `course_id`, `created_at`, `updated_at`) VALUES
(14, 1, 1, '2022-01-18 12:39:24', '2022-01-18 12:39:24'),
(15, 1, 2, '2022-01-18 12:39:24', '2022-01-18 12:39:24'),
(16, 1, 3, '2022-01-18 12:39:24', '2022-01-18 12:39:24'),
(17, 1, 4, '2022-01-18 12:39:24', '2022-01-18 12:39:24');

-- --------------------------------------------------------

--
-- Table structure for table `exam_grades`
--

CREATE TABLE `exam_grades` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grade_category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `grade_point` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mark_from` int(11) UNSIGNED NOT NULL,
  `mark_upto` int(11) UNSIGNED NOT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exam_grades`
--

INSERT INTO `exam_grades` (`id`, `name`, `grade_category_id`, `grade_point`, `mark_from`, `mark_upto`, `comment`, `created_at`, `updated_at`) VALUES
(1, 'A+', 1, '4', 80, 100, 'First Class', '2022-01-13 11:15:55', '2022-01-13 11:39:43'),
(2, 'A', 1, '3.75', 75, 79, 'First Class', '2022-01-13 11:30:12', '2022-01-13 11:39:49'),
(3, 'A-', 1, '3.50', 70, 74, 'First Class', '2022-01-13 11:30:47', '2022-01-13 11:39:54'),
(4, 'B+', 1, '3.25', 65, 69, 'First Class', '2022-01-13 11:31:35', '2022-01-13 11:40:03'),
(5, 'B', 1, '3.00', 60, 64, 'First Class', '2022-01-13 11:32:01', '2022-01-13 11:40:14'),
(6, 'B-', 1, '2.75', 55, 59, 'Second Class', '2022-01-13 11:32:44', '2022-01-13 11:40:32'),
(7, 'C+', 1, '2.50', 50, 54, 'Second Class', '2022-01-13 11:33:53', '2022-01-13 11:40:48'),
(8, 'C', 1, '2.25', 45, 49, 'Second Class Upper', '2022-01-13 11:34:34', '2022-01-13 11:41:07'),
(9, 'D', 1, '2.00', 40, 44, 'Third Class', '2022-01-13 11:35:05', '2022-01-13 11:41:57'),
(10, 'F', 1, '0', 0, 39, 'Fail', '2022-01-13 11:37:11', '2022-01-13 11:42:04');

-- --------------------------------------------------------

--
-- Table structure for table `exam_marks`
--

CREATE TABLE `exam_marks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cgpa` double(10,2) DEFAULT NULL,
  `exam_position` int(10) UNSIGNED DEFAULT NULL,
  `batch_position` int(10) UNSIGNED DEFAULT NULL,
  `department_position` int(10) UNSIGNED DEFAULT NULL,
  `batch_id` bigint(20) UNSIGNED DEFAULT NULL,
  `department_id` bigint(20) UNSIGNED DEFAULT NULL,
  `student_id` bigint(20) UNSIGNED DEFAULT NULL,
  `exam_id` bigint(20) UNSIGNED DEFAULT NULL,
  `course_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `total_marks` double(10,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exam_marks`
--

INSERT INTO `exam_marks` (`id`, `cgpa`, `exam_position`, `batch_position`, `department_position`, `batch_id`, `department_id`, `student_id`, `exam_id`, `course_id`, `user_id`, `total_marks`, `created_at`, `updated_at`) VALUES
(1, 3.75, NULL, NULL, NULL, 1, 1, 2, 1, 1, 1, 77.00, '2022-01-18 05:23:02', '2022-01-20 02:56:35'),
(2, 4.00, NULL, NULL, NULL, 1, 1, 2, 1, 2, 1, 85.00, '2022-01-18 05:23:09', '2022-01-20 02:56:38'),
(3, 4.00, NULL, NULL, NULL, 1, 1, 1, 1, 1, 1, 90.00, '2022-01-18 05:24:28', '2022-01-22 09:59:33'),
(4, 0.00, NULL, NULL, NULL, 1, 1, 1, 1, 2, 1, 33.00, '2022-01-18 05:25:30', '2022-01-22 09:43:18'),
(5, 3.00, NULL, NULL, NULL, 1, 1, 1, 1, 3, 1, 60.00, '2022-01-18 11:10:50', '2022-01-22 10:03:00'),
(6, 4.00, NULL, NULL, NULL, 1, 1, 1, 1, 4, 1, 90.00, '2022-01-18 11:10:51', '2022-01-22 10:00:10'),
(7, 3.75, NULL, NULL, NULL, 1, 1, 2, 1, 3, 1, 75.00, '2022-01-18 11:11:07', '2022-01-20 02:56:39'),
(8, 3.00, NULL, NULL, NULL, 1, 1, 2, 1, 4, 1, 60.00, '2022-01-18 11:11:11', '2022-01-20 02:56:41'),
(9, 4.00, NULL, NULL, NULL, 1, 1, 3, 1, 1, 1, 80.00, '2022-01-20 02:31:07', '2022-01-20 02:31:07'),
(10, 3.50, NULL, NULL, NULL, 1, 1, 3, 1, 2, 1, 70.00, '2022-01-20 02:31:09', '2022-01-20 02:31:09'),
(11, 3.00, NULL, NULL, NULL, 1, 1, 3, 1, 3, 1, 60.00, '2022-01-20 02:31:10', '2022-01-20 02:31:10'),
(12, 4.00, NULL, NULL, NULL, 1, 1, 3, 1, 4, 1, 80.00, '2022-01-20 02:31:11', '2022-01-20 02:31:11'),
(13, 4.00, NULL, NULL, NULL, 1, 1, 4, 1, 1, 1, 80.00, '2022-01-20 02:53:35', '2022-01-20 02:53:35'),
(14, 3.50, NULL, NULL, NULL, 1, 1, 4, 1, 2, 1, 70.00, '2022-01-20 02:53:37', '2022-01-20 02:53:37'),
(15, 3.75, NULL, NULL, NULL, 1, 1, 4, 1, 3, 1, 77.00, '2022-01-20 02:53:38', '2022-01-20 02:53:38'),
(16, 3.50, NULL, NULL, NULL, 1, 1, 4, 1, 4, 1, 70.00, '2022-01-20 02:53:39', '2022-01-20 02:53:39');

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
-- Table structure for table `grade_categories`
--

CREATE TABLE `grade_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mark` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `grade_categories`
--

INSERT INTO `grade_categories` (`id`, `name`, `mark`, `created_at`, `updated_at`) VALUES
(1, 'Default System', '100', '2022-01-13 04:45:12', '2022-01-13 04:45:12');

-- --------------------------------------------------------

--
-- Table structure for table `mark_distributions`
--

CREATE TABLE `mark_distributions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mark` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mark_distributions`
--

INSERT INTO `mark_distributions` (`id`, `title`, `mark`, `created_at`, `updated_at`) VALUES
(1, 'Final Written Exam', 60, '2022-01-13 09:28:16', '2022-01-13 09:28:16'),
(2, 'Internal Assessment', 40, '2022-01-13 09:28:38', '2022-01-13 09:28:38');

-- --------------------------------------------------------

--
-- Table structure for table `mark_distribution_values`
--

CREATE TABLE `mark_distribution_values` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `marks` double(10,2) DEFAULT NULL,
  `mark_distribution_id` bigint(20) UNSIGNED DEFAULT NULL,
  `batch_id` bigint(20) UNSIGNED DEFAULT NULL,
  `department_id` bigint(20) UNSIGNED DEFAULT NULL,
  `student_id` bigint(20) UNSIGNED DEFAULT NULL,
  `exam_id` bigint(20) UNSIGNED DEFAULT NULL,
  `mark_id` bigint(20) UNSIGNED DEFAULT NULL,
  `course_id` bigint(20) UNSIGNED DEFAULT NULL,
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
(1, '2012_01_07_093930_create_roles_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2022_01_07_093355_create_departments_table', 1),
(7, '2022_01_07_093500_create_batches_table', 1),
(8, '2022_01_07_093709_create_courses_table', 1),
(9, '2022_01_07_093739_create_students_table', 1),
(10, '2022_01_07_094134_create_mark_distributions_table', 1),
(11, '2022_01_07_094627_create_grade_categories_table', 1),
(12, '2022_01_07_095340_create_exams_table', 2),
(13, '2022_01_07_095445_create_exam_grades_table', 2),
(14, '2022_01_07_095507_create_exam_marks_table', 3),
(15, '2022_01_07_096321_create_mark_distribution_values_table', 3),
(16, '2022_01_08_140837_create_ranks_table', 3),
(17, '2022_01_17_134108_create_exam_courses_table', 4);

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
-- Table structure for table `ranks`
--

CREATE TABLE `ranks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `batch_id` bigint(20) UNSIGNED DEFAULT NULL,
  `department_id` bigint(20) UNSIGNED DEFAULT NULL,
  `student_id` bigint(20) UNSIGNED DEFAULT NULL,
  `exam_id` bigint(20) UNSIGNED DEFAULT NULL,
  `gpa` double(10,2) DEFAULT NULL,
  `failed` int(10) UNSIGNED DEFAULT '0',
  `status` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'promoted',
  `credit` double(10,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ranks`
--

INSERT INTO `ranks` (`id`, `batch_id`, `department_id`, `student_id`, `exam_id`, `gpa`, `failed`, `status`, `credit`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 2, 1, 3.71, 0, 'promoted', 10.50, '2022-01-18 11:02:08', '2022-01-22 10:03:07'),
(2, 1, 1, 1, 1, 2.57, 1, 'promoted', 10.50, '2022-01-18 11:02:08', '2022-01-22 10:03:07'),
(3, 1, 1, 3, 1, 3.57, 0, 'promoted', 10.50, '2022-01-20 02:31:48', '2022-01-22 10:03:07'),
(4, 1, 1, 4, 1, 3.71, 0, 'promoted', 10.50, '2022-01-20 02:54:19', '2022-01-22 10:03:07');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permissions` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `permissions`, `created_at`, `updated_at`) VALUES
(1, 'Admin', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reg_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roll` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `session` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department_id` bigint(20) UNSIGNED DEFAULT NULL,
  `batch_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `reg_no`, `roll`, `email`, `address`, `session`, `department_id`, `batch_id`, `created_at`, `updated_at`) VALUES
(1, 'Sarwar Hossain', '110-016-17', '17CSE016', 'sarwar.cse4.bu@gmail.com', 'chairmanpara, nachole-6310, nachole, chapainawabgonj', '2016-17', 1, 1, '2022-01-12 00:13:36', '2022-01-12 00:20:28'),
(2, 'Aspia', '110-023-17', '17CSE023', 'aspia.cse4.bu@gmail.com', 'Dhaka', '2016-17', 1, 1, '2022-01-17 13:12:43', '2022-01-17 13:12:43'),
(3, 'Rimon Chandra Paul', '110-030-17', '17CSE030', 'rimon.cse4.bu@gmail.com', 'Barishal', '2016-17', 1, 1, '2022-01-20 02:22:36', '2022-01-20 02:22:36'),
(4, 'Mst. Halima', '110-018-17', '17CSE018', 'sonia.cse4.bu@gmail.com', 'Barishal, Bangladesh', '2016-17', 1, 1, '2022-01-20 02:23:44', '2022-01-20 02:23:44'),
(5, 'Ashikur Rahman Ashik', '110-048-17', '17CSE048', 'ashik.cse4.bu@gmail.com', 'Barishal, Bangladesh', '2016-17', 1, 1, '2022-01-20 02:25:48', '2022-01-20 02:25:48'),
(6, 'Tamanna Ferdaus', '110-012-17', '17CSE012', 'ferdaustamanna@gmail.com', 'Barishal', '2016-17', 1, 1, '2022-01-20 02:49:00', '2022-01-20 02:49:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `isDeleted` tinyint(1) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `image`, `email`, `mobile`, `gender`, `address`, `DOB`, `isDeleted`, `email_verified_at`, `role_id`, `is_active`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin', 'user.png', 'admin@gmail.com', '1234567890', 'male', 'Barishal University', '2000-01-01', NULL, NULL, 1, 1, '$2y$10$/vKrnWNhlv/FBPTp6Be.5ev/CPdLLPz5VU21VoB7v.UnxCbaL74iq', NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `batches`
--
ALTER TABLE `batches`
  ADD PRIMARY KEY (`id`),
  ADD KEY `batches_department_id_foreign` (`department_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `exams_batch_id_foreign` (`batch_id`);

--
-- Indexes for table `exam_courses`
--
ALTER TABLE `exam_courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `exam_courses_exam_id_foreign` (`exam_id`),
  ADD KEY `exam_courses_course_id_foreign` (`course_id`);

--
-- Indexes for table `exam_grades`
--
ALTER TABLE `exam_grades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `exam_grades_grade_category_id_foreign` (`grade_category_id`);

--
-- Indexes for table `exam_marks`
--
ALTER TABLE `exam_marks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `exam_marks_department_id_foreign` (`department_id`),
  ADD KEY `exam_marks_batch_id_foreign` (`batch_id`),
  ADD KEY `exam_marks_user_id_foreign` (`user_id`),
  ADD KEY `exam_marks_student_id_foreign` (`student_id`),
  ADD KEY `exam_marks_exam_id_foreign` (`exam_id`),
  ADD KEY `exam_marks_course_id_foreign` (`course_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `grade_categories`
--
ALTER TABLE `grade_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mark_distributions`
--
ALTER TABLE `mark_distributions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mark_distribution_values`
--
ALTER TABLE `mark_distribution_values`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mark_distribution_values_department_id_foreign` (`department_id`),
  ADD KEY `mark_distribution_values_batch_id_foreign` (`batch_id`),
  ADD KEY `mark_distribution_values_mark_distribution_id_foreign` (`mark_distribution_id`),
  ADD KEY `mark_distribution_values_student_id_foreign` (`student_id`),
  ADD KEY `mark_distribution_values_exam_id_foreign` (`exam_id`),
  ADD KEY `mark_distribution_values_mark_id_foreign` (`mark_id`),
  ADD KEY `mark_distribution_values_course_id_foreign` (`course_id`);

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
-- Indexes for table `ranks`
--
ALTER TABLE `ranks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ranks_department_id_foreign` (`department_id`),
  ADD KEY `ranks_batch_id_foreign` (`batch_id`),
  ADD KEY `ranks_student_id_foreign` (`student_id`),
  ADD KEY `ranks_exam_id_foreign` (`exam_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `students_reg_no_unique` (`reg_no`),
  ADD UNIQUE KEY `students_roll_unique` (`roll`),
  ADD KEY `students_department_id_foreign` (`department_id`),
  ADD KEY `students_batch_id_foreign` (`batch_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `batches`
--
ALTER TABLE `batches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `exam_courses`
--
ALTER TABLE `exam_courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `exam_grades`
--
ALTER TABLE `exam_grades`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `exam_marks`
--
ALTER TABLE `exam_marks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grade_categories`
--
ALTER TABLE `grade_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mark_distributions`
--
ALTER TABLE `mark_distributions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mark_distribution_values`
--
ALTER TABLE `mark_distribution_values`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ranks`
--
ALTER TABLE `ranks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `batches`
--
ALTER TABLE `batches`
  ADD CONSTRAINT `batches_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `exams`
--
ALTER TABLE `exams`
  ADD CONSTRAINT `exams_batch_id_foreign` FOREIGN KEY (`batch_id`) REFERENCES `batches` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `exam_courses`
--
ALTER TABLE `exam_courses`
  ADD CONSTRAINT `exam_courses_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `exam_courses_exam_id_foreign` FOREIGN KEY (`exam_id`) REFERENCES `exams` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `exam_grades`
--
ALTER TABLE `exam_grades`
  ADD CONSTRAINT `exam_grades_grade_category_id_foreign` FOREIGN KEY (`grade_category_id`) REFERENCES `grade_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `exam_marks`
--
ALTER TABLE `exam_marks`
  ADD CONSTRAINT `exam_marks_batch_id_foreign` FOREIGN KEY (`batch_id`) REFERENCES `batches` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `exam_marks_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `exam_marks_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `exam_marks_exam_id_foreign` FOREIGN KEY (`exam_id`) REFERENCES `exams` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `exam_marks_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `exam_marks_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `mark_distribution_values`
--
ALTER TABLE `mark_distribution_values`
  ADD CONSTRAINT `mark_distribution_values_batch_id_foreign` FOREIGN KEY (`batch_id`) REFERENCES `batches` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `mark_distribution_values_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `mark_distribution_values_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `mark_distribution_values_exam_id_foreign` FOREIGN KEY (`exam_id`) REFERENCES `exams` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `mark_distribution_values_mark_distribution_id_foreign` FOREIGN KEY (`mark_distribution_id`) REFERENCES `mark_distributions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `mark_distribution_values_mark_id_foreign` FOREIGN KEY (`mark_id`) REFERENCES `exam_marks` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `mark_distribution_values_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ranks`
--
ALTER TABLE `ranks`
  ADD CONSTRAINT `ranks_batch_id_foreign` FOREIGN KEY (`batch_id`) REFERENCES `batches` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ranks_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ranks_exam_id_foreign` FOREIGN KEY (`exam_id`) REFERENCES `exams` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ranks_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_batch_id_foreign` FOREIGN KEY (`batch_id`) REFERENCES `batches` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `students_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
