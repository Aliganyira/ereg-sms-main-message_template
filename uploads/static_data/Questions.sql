-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 30, 2021 at 12:14 PM
-- Server version: 10.6.4-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hpvdb`
--

--
-- Truncate table before insert `questions`
--

TRUNCATE TABLE `questions`;
--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `week_no`, `message`, `language`, `dose`, `mode`, `has_options`, `expected_response`, `created_at`, `updated_at`, `created_by`, `updated_by`, `deleted_at`) VALUES
(1, 1, 'HPV DOSE: Girls who are 9-14 years like [CHILD NAME] need 2 HPV vaccine doses for protection against cervical cancer. It is safe.', 'english', 'uninitiated', 'sms', 'no', '[\n    {\n        \"option\": null\n    }\n]', '2021-12-28 08:28:21', '2021-12-28 08:28:21', 4, 4, NULL),
(2, 2, 'HPV DOSE: [CHILD NAME] needs 2 HPV doses! It is free and safe. Do you want more information? Send 1 for Yes, 2 for No.', 'english', 'uninitiated', 'sms', 'yes', '[\n    {\n        \"option\": \"1\",\n        \"expected_message_to_response\": [\n            \"The HPV vaccine protects against cervical cancer. Two doses are needed to help protect her health and future.\",\n            \"HPV vaccines are safe and strongly protect your daughter. They are provided for free at any public health facility through the Ministry of Health!\",\n            \"HPV vaccines are safe! They do not cause cancer or infertility and are approved by the Ministry of Health. Mild pain may occur, but is short-lived.\"\n        ]\n    },\n    {\n        \"option\": \"2\"\n    },\n    {\n        \"option\": \"any\",\n        \"expected_message_to_response\": [\n            \"HPV Dose: Response incorrect or not understood. Reply with only a number 1 OR 2. Send 1 for Yes, 2 for No.\"\n        ]\n    }\n]', '2021-12-28 08:33:59', '2021-12-28 12:23:19', 4, 4, NULL),
(3, 3, 'HPV DOSE: The earlier the better! Girls 9-14 only need 2 doses of HPV vaccine to protect them from cervical cancer.', 'english', 'uninitiated', 'sms', 'no', '[\n    {\n        \"option\": null\n    }\n]', '2021-12-28 08:34:54', '2021-12-28 08:34:54', 4, 4, NULL),
(4, 4, 'HPV DOSE: Plan to get [CHILD NAME] vaccinated against HPV! Get ready to go to your nearest government health facility to get the safe and free vaccine.', 'english', 'uninitiated', 'sms', 'no', '[\n    {\n        \"option\": null\n    }\n]', '2021-12-28 08:35:13', '2021-12-28 08:35:13', 4, 4, NULL),
(5, 5, 'HPV DOSE: Don\'t let [CHILD NAME] miss joining the 8 million Ugandan girls vaccinated against HPV! Getting her vaccinated protects her from cervical cancer.', 'english', 'uninitiated', 'sms', 'no', '[\n    {\n        \"option\": null\n    }\n]', '2021-12-28 08:35:34', '2021-12-28 08:35:34', 4, 4, NULL),
(6, 6, 'HPV DOSE: Was [CHILD NAME] able to get her 1st HPV dose? Reply 1=Yes, 2= No. If she did not get it yet, she can get it free at any government health facility!', 'english', 'uninitiated', 'sms', 'yes', '{\n    \"1\": {\n        \"option\": \"1\"\n    },\n    \"2\": {\n        \"option\": \"2\"\n    },\n    \"3\": {\n        \"option\": \"any\",\n        \"expected_message_to_response\": [\n            \"HPV Dose: Response incorrect or not understood. Reply with only a number 1 OR 2. Reply 1=Yes, 2= No\"\n        ]\n    }\n}', '2021-12-28 08:36:40', '2021-12-29 14:11:08', 4, 4, NULL),
(7, 7, 'HPV DOSE: [CHILD NAME] needs 2 HPV doses! It is free and safe. Do you want more information? Send 1 for Yes, 2 for No', 'english', 'uninitiated', 'sms', 'yes', '[\n    {\n        \"option\": \"1\",\n        \"expected_message_to_response\": [\n            \"The HPV vaccine protects against cervical cancer. Two doses are needed to help protect her health and future.\",\n            \"HPV vaccines are safe and strongly protect your daughter. They are provided for free at any public health facility through the Ministry of Health!\",\n            \"HPV vaccines are safe! They do not cause cancer or infertility and are approved by the Ministry of Health. Mild pain may occur, but is short-lived.\"\n        ]\n    },\n    {\n        \"option\": \"2\"\n    },\n    {\n        \"option\": \"any\",\n        \"expected_message_to_response\": [\n            \"HPV Dose: Response incorrect or not understood. Reply with only a number 1 OR 2. Send 1 for Yes, 2 for No.\"\n        ]\n    }\n]', '2021-12-30 08:49:54', '2021-12-30 08:49:54', 4, 4, NULL),
(8, 8, 'HPV DOSE: Was [CHILD NAME] able to get her 1st HPV dose? Reply 1=Yes, 2= No. If she did not get it yet, she can get it free at any government health facility!', 'english', 'uninitiated', 'sms', 'yes', '[\n    {\n        \"option\": \"1\"\n    },\n    {\n        \"option\": \"2\"\n    },\n    {\n        \"option\": \"any\",\n        \"expected_message_to_response\": [\n            \"HPV Dose: Response incorrect or not understood. Reply with only a number 1 OR 2. Reply 1=Yes, 2= No\"\n        ]\n    }\n]', '2021-12-30 08:58:34', '2021-12-30 08:58:34', 4, 4, NULL),
(9, 9, 'HPV DOSE: Make a plan for how [CHILD NAME] will get her 1st HPV dose. It’s safe and free at any public health facility through the Ministry of Health.', 'english', 'uninitiated', 'sms', 'no', '{}', '2021-12-30 08:59:05', '2021-12-30 08:59:05', 4, 4, NULL),
(10, 12, 'HPV DOSE: Was [CHILD NAME] able to get her 1st HPV dose? Reply 1=Yes, 2= No. If she did not get it yet, she can get it free at any government health facility!', 'english', 'uninitiated', 'sms', 'yes', '[\n    {\n        \"option\": \"1\"\n    },\n    {\n        \"option\": \"2\"\n    },\n    {\n        \"option\": \"any\",\n        \"expected_message_to_response\": [\n            \"HPV Dose: Response incorrect or not understood. Reply with only a number 1 OR 2. Reply 1=Yes, 2= No\"\n        ]\n    }\n]', '2021-12-30 09:00:00', '2021-12-30 09:00:00', 4, 4, NULL),
(11, 13, 'HPV DOSE: Have [CHILD NAME] get vaccinated against HPV! More than 8 million girls in Uganda have received the HPV vaccine and it’s used safely around the world!', 'english', 'uninitiated', 'sms', 'no', '{}', '2021-12-30 09:00:41', '2021-12-30 09:00:41', 4, 4, NULL),
(12, 16, 'HPV DOSE: Was [CHILD NAME] able to get her 1st HPV dose? Reply 1=Yes, 2= No. If she did not get it yet, she can get it free at any government health facility!', 'english', 'uninitiated', 'sms', 'yes', '[\n    {\n        \"option\": \"1\"\n    },\n    {\n        \"option\": \"2\"\n    },\n    {\n        \"option\": \"any\",\n        \"expected_message_to_response\": [\n            \"HPV Dose: Response incorrect or not understood. Reply with only a number 1 OR 2. Reply 1=Yes, 2= No\"\n        ]\n    }\n]', '2021-12-30 09:01:33', '2021-12-30 09:01:33', 4, 4, NULL),
(13, 17, 'HPV DOSE: Very many women in Uganda die from cervical cancer each year. Protect [CHILD NAME] against the leading cause of cervical cancer: HPV!', 'english', 'uninitiated', 'sms', 'no', '{}', '2021-12-30 09:02:10', '2021-12-30 09:02:10', 4, 4, NULL),
(14, 20, 'HPV DOSE: Was [CHILD NAME] able to get her 1st HPV dose? Reply 1=Yes, 2= No. If she did not get it yet, she can get it free at any government health facility!', 'english', 'uninitiated', 'sms', 'yes', '[\n    {\n        \"option\": \"1\"\n    },\n    {\n        \"option\": \"2\"\n    },\n    {\n        \"option\": \"any\",\n        \"expected_message_to_response\": [\n            \"HPV Dose: Response incorrect or not understood. Reply with only a number 1 OR 2. Reply 1=Yes, 2= No\"\n        ]\n    }\n]', '2021-12-30 09:02:51', '2021-12-30 09:02:51', 4, 4, NULL),
(15, 21, 'HPV DOSE: It is not too late for [CHILD NAME]’s 1st HPV vaccine dose! Get her vaccinated at any  government health facility for cervical cancer prevention!', 'english', 'uninitiated', 'sms', 'no', '{}', '2021-12-30 09:03:17', '2021-12-30 09:03:17', 4, 4, NULL),
(16, 24, 'HPV DOSE: Was [CHILD NAME] able to get her 1st HPV dose? Reply 1=Yes, 2= No. If she did not get it yet, she can get it free at any government health facility!', 'english', 'uninitiated', 'sms', 'yes', '[\n    {\n        \"option\": \"1\"\n    },\n    {\n        \"option\": \"2\"\n    },\n    {\n        \"option\": \"any\",\n        \"expected_message_to_response\": [\n            \"HPV Dose: Response incorrect or not understood. Reply with only a number 1 OR 2. Reply 1=Yes, 2= No\"\n        ]\n    }\n]', '2021-12-30 09:03:57', '2021-12-30 09:03:57', 4, 4, NULL);

--
-- Truncate table before insert `question_responses`
--

TRUNCATE TABLE `question_responses`;
--
-- Dumping data for table `question_responses`
--

INSERT INTO `question_responses` (`id`, `question_id`, `response`, `response_no`, `created_at`, `updated_at`, `created_by`, `updated_by`, `deleted_at`) VALUES
(1, 1, NULL, 1, '2021-12-28 08:28:21', '2021-12-28 08:28:21', 4, 4, NULL),
(2, 2, '34567890', 1, '2021-12-28 08:33:59', '2021-12-28 08:33:59', 4, 4, NULL),
(3, 3, NULL, 1, '2021-12-28 08:34:54', '2021-12-28 08:34:54', 4, 4, NULL),
(4, 4, NULL, 1, '2021-12-28 08:35:13', '2021-12-28 08:35:13', 4, 4, NULL),
(5, 5, NULL, 1, '2021-12-28 08:35:34', '2021-12-28 08:35:34', 4, 4, NULL),
(6, 6, 'any', 1, '2021-12-28 08:36:40', '2021-12-29 14:11:08', 4, 4, NULL),
(7, 7, 'any', 1, '2021-12-30 08:49:54', '2021-12-30 08:49:54', 4, 4, NULL),
(8, 8, 'any', 1, '2021-12-30 08:58:34', '2021-12-30 08:58:34', 4, 4, NULL),
(9, 10, 'any', 1, '2021-12-30 09:00:00', '2021-12-30 09:00:00', 4, 4, NULL),
(10, 12, 'any', 1, '2021-12-30 09:01:33', '2021-12-30 09:01:33', 4, 4, NULL),
(11, 14, 'any', 1, '2021-12-30 09:02:51', '2021-12-30 09:02:51', 4, 4, NULL),
(12, 16, 'any', 1, '2021-12-30 09:03:57', '2021-12-30 09:03:57', 4, 4, NULL);

--
-- Truncate table before insert `question_responses_messages`
--

TRUNCATE TABLE `question_responses_messages`;
--
-- Dumping data for table `question_responses_messages`
--

INSERT INTO `question_responses_messages` (`id`, `question_id`, `response_id`, `message_to_response`, `created_at`, `updated_at`, `created_by`, `updated_by`, `deleted_at`) VALUES
(1, 2, 2, 'The HPV vaccine protects against cervical cancer. Two doses are needed to help protect her health and future.', '2021-12-28 08:33:59', '2021-12-28 08:33:59', 4, 4, NULL),
(2, 2, 2, 'HPV vaccines are safe and strongly protect your daughter. They are provided for free at any public health facility through the Ministry of Health!', '2021-12-28 08:33:59', '2021-12-28 08:33:59', 4, 4, NULL),
(3, 2, 2, 'HPV vaccines are safe! They do not cause cancer or infertility and are approved by the Ministry of Health. Mild pain may occur, but is short-lived.', '2021-12-28 08:33:59', '2021-12-28 08:33:59', 4, 4, NULL),
(4, 2, 2, 'HPV Dose: Response incorrect or not understood. Reply with only a number 1 OR 2. Send 1 for Yes, 2 for No.', '2021-12-28 08:33:59', '2021-12-28 08:33:59', 4, 4, NULL),
(6, 6, 6, 'HPV Dose: Response incorrect or not understood. Reply with only a number 1 OR 2. Reply 1=Yes, 2= No', '2021-12-29 14:11:08', '2021-12-29 14:11:08', 4, 4, NULL),
(10, 7, 7, 'HPV Dose: Response incorrect or not understood. Reply with only a number 1 OR 2. Send 1 for Yes, 2 for No.', '2021-12-30 08:49:54', '2021-12-30 08:49:54', 4, 4, NULL),
(11, 8, 8, 'HPV Dose: Response incorrect or not understood. Reply with only a number 1 OR 2. Reply 1=Yes, 2= No', '2021-12-30 08:58:34', '2021-12-30 08:58:34', 4, 4, NULL),
(12, 10, 9, 'HPV Dose: Response incorrect or not understood. Reply with only a number 1 OR 2. Reply 1=Yes, 2= No', '2021-12-30 09:00:00', '2021-12-30 09:00:00', 4, 4, NULL),
(13, 12, 10, 'HPV Dose: Response incorrect or not understood. Reply with only a number 1 OR 2. Reply 1=Yes, 2= No', '2021-12-30 09:01:33', '2021-12-30 09:01:33', 4, 4, NULL),
(14, 14, 11, 'HPV Dose: Response incorrect or not understood. Reply with only a number 1 OR 2. Reply 1=Yes, 2= No', '2021-12-30 09:02:51', '2021-12-30 09:02:51', 4, 4, NULL),
(15, 16, 12, 'HPV Dose: Response incorrect or not understood. Reply with only a number 1 OR 2. Reply 1=Yes, 2= No', '2021-12-30 09:03:57', '2021-12-30 09:03:57', 4, 4, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
