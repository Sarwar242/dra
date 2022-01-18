-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 18, 2022 at 07:05 AM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";



INSERT INTO `exam_grades` (`id`, `name`, `grade_category_id`, `grade_point`, `point_from`, `point_to`, `mark_from`, `mark_upto`, `comment`, `created_at`, `updated_at`) VALUES
(1, 'A+', 1, '4', NULL, NULL, '80', '100', 'First Class', '2022-01-13 11:15:55', '2022-01-13 11:39:43'),
(2, 'A', 1, '3.75', NULL, NULL, '79', '75', 'First Class', '2022-01-13 11:30:12', '2022-01-13 11:39:49'),
(3, 'A-', 1, '3.50', NULL, NULL, '60', '64', 'First Class', '2022-01-13 11:30:47', '2022-01-13 11:39:54'),
(4, 'B+', 1, '3.25', NULL, NULL, '65', '69', 'First Class', '2022-01-13 11:31:35', '2022-01-13 11:40:03'),
(5, 'B', 1, '3.00', NULL, NULL, '60', '64', 'First Class', '2022-01-13 11:32:01', '2022-01-13 11:40:14'),
(6, 'B-', 1, '2.75', NULL, NULL, '55', '59', 'Second Class', '2022-01-13 11:32:44', '2022-01-13 11:40:32'),
(7, 'C+', 1, '2.50', NULL, NULL, '50', '54', 'Second Class', '2022-01-13 11:33:53', '2022-01-13 11:40:48'),
(8, 'C', 1, '2.25', NULL, NULL, '45', '49', 'Second Class Upper', '2022-01-13 11:34:34', '2022-01-13 11:41:07'),
(9, 'D', 1, '2.00', NULL, NULL, '40', '44', 'Third Class', '2022-01-13 11:35:05', '2022-01-13 11:41:57'),
(10, 'F', 1, '0', NULL, NULL, '0', '39', 'Fail', '2022-01-13 11:37:11', '2022-01-13 11:42:04');



INSERT INTO `mark_distributions` (`id`, `title`, `mark`, `created_at`, `updated_at`) VALUES
(1, 'Final Written Exam', 60, '2022-01-13 09:28:16', '2022-01-13 09:28:16'),
(2, 'Internal Assessment', 40, '2022-01-13 09:28:38', '2022-01-13 09:28:38');


COMMIT;
