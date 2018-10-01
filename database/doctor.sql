-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2018 at 10:46 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `doctor`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog_attachments`
--

CREATE TABLE `blog_attachments` (
  `id` int(255) NOT NULL,
  `blog_id` int(255) NOT NULL,
  `file_name` varchar(1024) NOT NULL,
  `regDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog_attachments`
--

INSERT INTO `blog_attachments` (`id`, `blog_id`, `file_name`, `regDate`) VALUES
(1, 1, '1017761492.jpg', '2018-05-17 08:08:33'),
(2, 1, '578779427.jpg', '2018-05-17 08:10:35'),
(3, 1, '459502746.jpg', '2018-05-17 08:12:23'),
(4, 2, '1793758519.jpg', '2018-05-17 08:25:22'),
(5, 3, '1564907609.png', '2018-05-17 08:29:29'),
(6, 3, '179599625.jpg', '2018-05-17 08:51:19'),
(7, 3, '75305124.jpg', '2018-05-17 08:51:19');

-- --------------------------------------------------------

--
-- Table structure for table `counter_referrals`
--

CREATE TABLE `counter_referrals` (
  `counter_ref_id` int(100) NOT NULL,
  `referral_id` int(100) NOT NULL,
  `patient_name` varchar(1024) NOT NULL,
  `patient_surname` varchar(1024) NOT NULL,
  `patient_id_no` varchar(1024) NOT NULL,
  `patient_phone` varchar(100) NOT NULL,
  `patient_dob` varchar(100) NOT NULL,
  `patient_sex` varchar(100) NOT NULL,
  `from_hospital_name` varchar(1024) NOT NULL,
  `from_hospital_id` int(100) NOT NULL,
  `to_hospital_name` varchar(1024) NOT NULL,
  `to_hospital_id` int(100) NOT NULL,
  `physician_names` varchar(1024) NOT NULL,
  `physician_phone` varchar(100) NOT NULL,
  `mode_of_transport` varchar(100) NOT NULL,
  `receive_department` varchar(100) NOT NULL,
  `hospital_admission_date` varchar(200) NOT NULL,
  `stay_length` varchar(100) NOT NULL,
  `transfer_date` varchar(100) NOT NULL,
  `transfer_reasons` text NOT NULL,
  `patient_diagnostics` text NOT NULL,
  `illness_history` text NOT NULL,
  `past_medical` text NOT NULL,
  `info_summary` text NOT NULL,
  `recommendations` text NOT NULL,
  `status` varchar(100) NOT NULL,
  `regDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `counter_referrals`
--

INSERT INTO `counter_referrals` (`counter_ref_id`, `referral_id`, `patient_name`, `patient_surname`, `patient_id_no`, `patient_phone`, `patient_dob`, `patient_sex`, `from_hospital_name`, `from_hospital_id`, `to_hospital_name`, `to_hospital_id`, `physician_names`, `physician_phone`, `mode_of_transport`, `receive_department`, `hospital_admission_date`, `stay_length`, `transfer_date`, `transfer_reasons`, `patient_diagnostics`, `illness_history`, `past_medical`, `info_summary`, `recommendations`, `status`, `regDate`) VALUES
(5, 4, 'Bizimana', 'Fred', '1234567890123456', '076655443322', '05/16/1980', 'M', 'Gasabo District', 9, 'NewLife Center  Hospital', 2, 'Sugira', '0788998826', 'Ambulance', 'dsdsdsdsd', '27.05.2018', '2', '27.05.2018', 'to_hospital_name', 'to_hospital_name', 'to_hospital_name', 'to_hospital_name', 'to_hospital_name', 'to_hospital_name', '', '2018-05-27 11:11:50'),
(6, 1, 'samuel', 'manikiza', '1234567890', '70556789456', '12/12/12', 'M', 'Bugoyi Hospital', 2, 'center clinic', 3, 'gakwandi', '09876543', 'Ambulance', 'Testing', '12/12/2018', '12', '12/12/12', 'transfer_reasons', 'transfer_reasons', 'transfer_reasons', 'transfer_reasons', 'transfer_reasons', 'transfer_reasons', '', '2018-05-27 13:05:50'),
(7, 2, 'Igiraneza', 'Joseph', '1234567890123456', '0788899882', '02/15/1997', 'M', 'gasogi hospital', 2, 'Kacyiru Police Hospital', 8, 'doctor test', '0788665544', 'Family', 'Cardiology', '27.05.2018', '5', '27.05.2018', 'this patient have critical disease so we can afford any issue with him', 'this patient have critical disease so we can afford any issue with him', 'this patient have critical disease so we can afford any issue with him', 'this patient have critical disease so we can afford any issue with him', 'this patient have critical disease so we can afford any issue with him', 'this patient have critical disease so we can afford any issue with him', '', '2018-05-27 14:11:12');

-- --------------------------------------------------------

--
-- Table structure for table `counter_ref_attachments`
--

CREATE TABLE `counter_ref_attachments` (
  `attach_id` int(255) NOT NULL,
  `counter_ref_id` int(100) NOT NULL,
  `file_name` varchar(1024) NOT NULL,
  `file_type` varchar(1024) NOT NULL,
  `size` varchar(100) NOT NULL,
  `error` int(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  `regDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `department_id` int(11) NOT NULL,
  `hospital_id` varchar(10) NOT NULL,
  `name` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(50) NOT NULL,
  `regDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `hospital_id`, `name`, `description`, `status`, `regDate`) VALUES
(1, '1', 'Cardiology', 'this is the best and hardest department in every hospital', 'PENDING', '2018-04-02 09:26:33'),
(2, '2', 'dsdsdsdsd', 'dsdsdsdsssssssssssssssssssss', 'DELETED', '2018-04-02 10:56:09'),
(3, '2', 'sdsdsdsdsdsdsdsdsdsdsdsds', 'sssssssssssssssssssssssssssssssssss', 'DELETED', '2018-04-02 11:08:31'),
(4, '2', 'Cardiolody', 'this is the department that deals with heart and other internal diseases', 'PENDING', '2018-04-02 11:23:10'),
(5, '2', 'Umutwe', 'hano tuvura indwara zo mu mutwe', 'DELETED', '2018-04-04 12:33:21'),
(6, '8', 'Cardiology', 'Heart and other body based activities', 'PENDING', '2018-04-28 10:58:56'),
(7, '8', 'neuropathy', 'neuropathyneuropathyneuropathy', 'PENDING', '2018-04-28 10:59:42'),
(8, '9', 'Cardiology', 'description', 'PENDING', '2018-04-29 10:11:01'),
(9, '2', 'Analgesic', 'An analgesic or painkiller is any member of the group of drugs used to achieve analgesia, relief from pain. Analgesic drugs act in various ways on the peripheral and central nervous systems', 'PENDING', '2018-05-23 06:55:19'),
(10, '2', 'Gastroenterology', 'Gastroenterology is the branch of medicine focused on the digestive system and its disorders. Diseases affecting the gastrointestinal tract, which include the organs from mouth into anus, along the alimentary canal, are the focus of this speciality.', 'PENDING', '2018-05-25 10:12:06');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `doctor_id` int(11) NOT NULL,
  `hospital_id` int(10) NOT NULL,
  `names` varchar(1024) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `address` varchar(1024) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `department_id` int(10) NOT NULL,
  `department` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `profile_image` varchar(1024) NOT NULL,
  `regDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`doctor_id`, `hospital_id`, `names`, `email`, `password`, `address`, `phone`, `department_id`, `department`, `status`, `profile_image`, `regDate`) VALUES
(1, 1, 'kayishema egide', 'kayishema@gmail.com', 'account', 'Huye/Southern province', '+250788126578', 1234567890, '5', 'DELETED', 'null', '2018-04-10 10:31:27'),
(2, 2, 'Mnaikiza', 'samuel@gmail.com', '4afed532f06bff7d4d5b2dde81026df2', 'kigali/kacyiru', '+1234567890', 0, '4', 'ACTIVATED', 'null', '2018-04-10 10:34:53'),
(3, 2, 'Sugira', 'manikiza990@gmail.com', '4afed532f06bff7d4d5b2dde81026df2', 'kigali', '0788998826', 0, '4', 'ACTIVATED', '75778.jpg', '2018-04-16 08:59:38'),
(4, 8, 'eric ku mana', 'eric@gmail.com', 'optimus1', 'kigali/kacyiru', '0788996655', 0, '7', 'ACTIVATED', '74878.jpg', '2018-04-28 11:03:17'),
(5, 9, 'Dushime Emmanuel', 'em@gmail.com', '123456', 'Kigali/Kacyiru', '250788998877', 0, '8', 'ACTIVATED', 'null', '2018-04-29 10:12:11'),
(6, 2, 'Eric Sam', 'samuels@gmail.com', 'samuels', 'Kigali/Kacyiru', '0788998877', 0, '5', 'DELETED', 'null', '2018-05-06 09:53:46'),
(7, 8, 'doctor test', 'doctor@gmail.com', '4afed532f06bff7d4d5b2dde81026df2', 'Kigali/Kacyiru', '0788665544', 0, '7', 'ACTIVATED', '23262.jpeg', '2018-05-25 10:16:26');

-- --------------------------------------------------------

--
-- Table structure for table `hospitals`
--

CREATE TABLE `hospitals` (
  `hospital_id` int(11) NOT NULL,
  `hospital_code` varchar(50) NOT NULL,
  `hospital_name` varchar(1024) NOT NULL,
  `location` varchar(255) NOT NULL,
  `address` varchar(1024) NOT NULL,
  `director_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `category` varchar(255) NOT NULL,
  `address_location` varchar(1024) NOT NULL,
  `slogan` varchar(1024) NOT NULL,
  `description` text NOT NULL,
  `profile_picture` varchar(1024) NOT NULL,
  `cover_image` varchar(1024) NOT NULL,
  `regDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hospitals`
--

INSERT INTO `hospitals` (`hospital_id`, `hospital_code`, `hospital_name`, `location`, `address`, `director_name`, `email`, `phone`, `status`, `category`, `address_location`, `slogan`, `description`, `profile_picture`, `cover_image`, `regDate`) VALUES
(1, '84270', 'hospital name', '1', '1', 'manikiza samuel', 'samuel1@gmail.com', '250788998877', 'PENDING', '1', '', '', '', '', '', '2018-03-28 07:32:17'),
(2, '4474', 'NewLife Center  Hospital', '1', '1', 'Eric Gasana', 'info@hospital.com', '078877665544', 'PENDING', '1', 'Kigali/Rwanda', 'we live our life we must protect', 'welcome to our homeland of life we live by protecting each other and it is core of our mission to preserve better life for people', '', '', '2018-03-28 08:16:18'),
(3, '1544', 'ibtaro binini', '1', '1', 'Mnaikiza sugira', 'test@gmail.com', '250788776655', 'ACTIVATED', '4', '', '', '', '', '', '2018-03-28 09:02:34'),
(4, '65457', 'sssssssssssss', '1', '1', 'ssssssssssss', 'samuel@gmail.ocm', '1111111111', 'DELETED', '1', '', '', '', '', '', '2018-03-28 09:05:13'),
(5, '1688', 'ibitaro', '1', '1', 'manikiza', 'test1@gmail.com', '23456789098', 'ACTIVATED', '1', '', '', '', '', '', '2018-03-29 13:21:58'),
(6, '7829', 'sssssssssss', '1', '1', 'ssssssssssss', 'sam@gmail.com', '+250788998877', 'DELETED', '1', '', '', '', '', '', '2018-03-29 13:36:52'),
(7, '55143', 'sdsds', '1', '1', 'dsdsds', 'sdsds@gm.com', '11111111111', 'ACTIVATED', '1', '', '', '', '', '', '2018-03-30 09:19:36'),
(8, '1084', 'Kacyiru Police Hospital', '1', '1', 'Samson Drake', 'samson@gmail.com', '0788667766', 'ACTIVATED', '5', '', '', '', '', '', '2018-04-28 10:55:33'),
(9, '80743', 'Gasabo District', '1', '1', 'Sugira Emmanuel', 'info@hospital.rw', '0788667788', 'DELETED', '6', 'Kigali/Rwanda', '', 'welcome to our hospital', '', '', '2018-04-29 09:51:47');

-- --------------------------------------------------------

--
-- Table structure for table `hospitals_category`
--

CREATE TABLE `hospitals_category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` varchar(50) NOT NULL,
  `regdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hospitals_category`
--

INSERT INTO `hospitals_category` (`id`, `category_name`, `description`, `status`, `regdate`) VALUES
(1, 'Health posts', '', 'ACTIVE', '2018-03-27 08:07:55'),
(2, 'Prison dispensaries', '', 'ACTIVE', '2018-03-27 08:07:55'),
(3, 'Dispenseries', '', 'ACTIVE', '2018-03-27 08:08:40'),
(4, 'Health Centers', '', 'ACTIVE', '2018-03-27 08:08:40'),
(5, 'Police/Military hospitals', '', 'ACTIVE', '2018-03-27 08:09:33'),
(6, 'District Hospitals', '', 'ACTIVE', '2018-03-27 08:09:33'),
(7, 'National Referral Hospitals', '', 'ACTIVE', '2018-03-27 08:10:29'),
(8, 'Private Hospitals', '', 'ACTIVE', '2018-03-27 08:10:29'),
(9, 'dsssssssssss', 'dsdsdsdsdsdsdsdsdsdsdsdsdsdsds', 'DELETED', '2018-05-20 12:32:49');

-- --------------------------------------------------------

--
-- Table structure for table `hospital_regions`
--

CREATE TABLE `hospital_regions` (
  `id` int(11) NOT NULL,
  `region_title` varchar(255) NOT NULL,
  `description` varchar(1024) NOT NULL,
  `status` varchar(50) NOT NULL,
  `regDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hospital_regions`
--

INSERT INTO `hospital_regions` (`id`, `region_title`, `description`, `status`, `regDate`) VALUES
(1, 'Gasabo', '', 'ACTIVE', '2018-03-27 06:38:32'),
(2, '', 'sajbdkaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaadsadsjdsd', 'DELETED', '2018-05-20 09:44:24'),
(5, 'NYARUGENDESSSSS', 'sdddddddddddddd', 'DELETED', '2018-05-20 10:09:00'),
(6, 'Nyagatare', 'NyagatareNyagatareNyagatareNyagatareNyagatareNyagatareNyagatareNyagatareNyagatareNyagatare', 'ACTIVE', '2018-05-20 10:22:22'),
(7, 'Gatsibo', '', 'ACTIVE', '2018-05-20 10:36:35'),
(8, 'Rusizi', '', 'ACTIVE', '2018-05-20 10:36:44'),
(9, 'Rubavu', '', 'ACTIVE', '2018-05-20 10:38:12'),
(10, 'Gicumbi', '', 'ACTIVE', '2018-05-20 10:38:20'),
(11, 'Nyamasheke', '', 'ACTIVE', '2018-05-20 10:38:32'),
(12, 'Musanze', '', 'ACTIVE', '2018-05-20 10:38:41'),
(13, 'Bugesera', '', 'ACTIVE', '2018-05-20 10:38:49'),
(14, 'Kayonza', '', 'ACTIVE', '2018-05-20 10:39:01'),
(15, 'Kamonyi', '', 'ACTIVE', '2018-05-20 10:39:13'),
(16, 'Nyamagabe', '', 'ACTIVE', '2018-05-20 10:39:23'),
(17, 'Ngoma', '', 'ACTIVE', '2018-05-20 10:39:31');

-- --------------------------------------------------------

--
-- Table structure for table `navigations`
--

CREATE TABLE `navigations` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `url` varchar(100) NOT NULL,
  `user_access` int(11) NOT NULL,
  `restricted_users` varchar(255) NOT NULL,
  `regDat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nav_restriction`
--

CREATE TABLE `nav_restriction` (
  `nav_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `restrict_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nurses`
--

CREATE TABLE `nurses` (
  `nurse_id` int(10) NOT NULL,
  `hospital_id` int(50) NOT NULL,
  `names` varchar(1024) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(200) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `profile_image` varchar(1024) NOT NULL,
  `status` varchar(50) NOT NULL,
  `isOnline` int(10) NOT NULL,
  `regDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nurses`
--

INSERT INTO `nurses` (`nurse_id`, `hospital_id`, `names`, `email`, `password`, `address`, `phone`, `profile_image`, `status`, `isOnline`, `regDate`) VALUES
(1, 2, 'kayishema egide', 'kayishema123@gmail.com', 'account', 'Huye/Southern province', '+250788126578', 'https://www.tm-town.com/assets/default_male600x600-79218392a28f78af249216e097aaf683.png', 'ACTIVE', 0, '2018-04-17 10:09:10'),
(2, 2, 'sssss', 'sss@gmail.com', '12341111', 'kigali/kacyiru', '1234567899', '', 'DELETED', 0, '2018-04-18 07:21:49'),
(3, 2, 'Eric samsma', 'erictest@gmail.com', 'samuels', 'Kigali/Kacyiru', '0788990099', '', 'DELETED', 0, '2018-05-18 10:31:30'),
(4, 2, 'sddsdsd', 'dsdsds@gmail.com', 'samuels', 'kacyiru', '09988776622', '', 'PENDING', 0, '2018-05-18 10:32:40'),
(5, 2, 'manikiza', 'samtest@gmail.com', 'samuels', 'Kigali/Rwanda', '250788990099', '', 'PENDING', 0, '2018-05-20 08:21:58'),
(6, 2, 'placide', 'placide@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'kigali/kacyiru', '078866554433', '', 'PENDING', 0, '2018-05-25 04:31:45');

-- --------------------------------------------------------

--
-- Table structure for table `receptionists`
--

CREATE TABLE `receptionists` (
  `receptionist_id` int(50) NOT NULL,
  `hospital_id` int(10) NOT NULL,
  `names` varchar(1024) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `profile_image` varchar(1024) NOT NULL,
  `status` varchar(50) NOT NULL,
  `regDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `receptionists`
--

INSERT INTO `receptionists` (`receptionist_id`, `hospital_id`, `names`, `email`, `password`, `address`, `phone`, `profile_image`, `status`, `regDate`) VALUES
(1, 2, 'sssss', 'ssss@gmail.com', '1234567', 'kigali/rwanda', '0788998877', 'null', 'DELETED', '2018-04-18 08:39:49'),
(2, 2, 'kamanzi', 'email@gmail.com', 'test one', 'kigali', '00757689', 'null', 'DELETED', '2018-04-18 08:56:51'),
(3, 2, 'kamanzi', 'email@gmail.com', 'test one', 'kigali', '00757689', 'null', 'DELETED', '2018-04-18 08:56:51'),
(4, 9, 'Manikiza samuel', 'samuelsugira@gmail.com', 'samuels', 'Kigali/Rwanda', '250788998877', 'null', 'PENDING', '2018-05-18 09:45:16'),
(5, 2, 'Manikiza eric', 'manikiza@yahoo.fr', 'samuels', 'Kigali/Rwanda', '0788998872', 'null', 'PENDING', '2018-05-18 09:51:23'),
(6, 2, 'eric kanana', 'kanana@gmail.com', '123456', 'kigali/Rwanda', '0788998874', 'null', 'PENDING', '2018-05-18 09:52:23'),
(7, 2, 'receptionist', 'rec@gmail.com', 'samuels', 'kigali/rwanda', '0799887766', 'null', 'DELETED', '2018-05-18 09:54:45'),
(8, 2, 'nikolas tesla', 'tesla@gmail.com', '5b6cdffd66770de1e842cdecf98c4d56', 'kigali/rwanda', '076655443311', 'null', 'DELETED', '2018-05-25 04:32:45');

-- --------------------------------------------------------

--
-- Table structure for table `referrals`
--

CREATE TABLE `referrals` (
  `referral_id` int(50) NOT NULL,
  `patient_fname` varchar(255) NOT NULL,
  `patient_lname` varchar(255) NOT NULL,
  `patient_id_no` varchar(200) NOT NULL,
  `patient_phone` varchar(50) NOT NULL,
  `patient_dob` varchar(200) NOT NULL,
  `patient_sex` varchar(100) NOT NULL,
  `from_hospital_name` varchar(255) NOT NULL,
  `from_hospital_id` int(10) NOT NULL,
  `to_hospital_name` varchar(255) NOT NULL,
  `physician_name` varchar(255) NOT NULL,
  `physician_phone` varchar(100) NOT NULL,
  `to_hospital_id` int(10) NOT NULL,
  `mode_of_transport` varchar(255) NOT NULL,
  `mode_of_transport_id` int(10) NOT NULL,
  `receive_department` varchar(200) NOT NULL,
  `hospital_admission_date` varchar(50) NOT NULL,
  `stay_length` varchar(10) NOT NULL,
  `tranfer_date` varchar(100) NOT NULL,
  `transfer_reasons` text NOT NULL,
  `patient_diagnostic` text NOT NULL,
  `illness_history` text NOT NULL,
  `past_medical` text NOT NULL,
  `info_summary` text NOT NULL,
  `attachments` varchar(1024) NOT NULL,
  `status` varchar(50) NOT NULL,
  `scheduledDate` varchar(1024) NOT NULL,
  `regDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `referrals`
--

INSERT INTO `referrals` (`referral_id`, `patient_fname`, `patient_lname`, `patient_id_no`, `patient_phone`, `patient_dob`, `patient_sex`, `from_hospital_name`, `from_hospital_id`, `to_hospital_name`, `physician_name`, `physician_phone`, `to_hospital_id`, `mode_of_transport`, `mode_of_transport_id`, `receive_department`, `hospital_admission_date`, `stay_length`, `tranfer_date`, `transfer_reasons`, `patient_diagnostic`, `illness_history`, `past_medical`, `info_summary`, `attachments`, `status`, `scheduledDate`, `regDate`) VALUES
(1, 'Uwimana', 'Egide', '1234567890123456', '0788998877', '04/23/1999', 'M', 'gasogi hospital', 2, 'hospital name', 'Manikiza Sugira', '0788998877', 1, 'Ambulance', 0, 'Cardiology', '05/24/2018', '12', '05/24/2018', '', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'yes', 'PENDING', '', '2018-04-27 08:38:16'),
(2, 'Igiraneza', 'Joseph', '1234567890123456', '0788899882', '02/15/1997', 'M', 'gasogi hospital', 2, 'Kacyiru Police Hospital', 'Manikiza Samuel', '0788998877', 8, 'Ambulance', 0, 'Cardiology', '05/24/2018', '12', '05/24/2018', '', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'yes', 'SCHEDULED', '', '2018-04-28 11:16:45'),
(3, 'Sugira', 'Samuel', '1234567890123456', '0788998877', '02/13/1993', 'M', 'Gasabo District', 9, 'Gasabo District', 'Manikiza Samuel', '0788998877', 9, 'PRIVATE', 0, 'Cardiology', '05/24/2018', '12', '05/24/2018', '', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'yes', 'PENDING', '', '2018-04-29 10:14:43'),
(4, 'Bizimana', 'Fred', '1234567890123456', '076655443322', '05/16/1980', 'M', 'Gasabo District', 9, 'NewLife Center  Hospital', 'Samuel', '076655443322', 2, 'Ambulance', 0, 'dsdsdsdsd', '05/24/2018', '12', '05/24/2018', '', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'yes', 'RECEIVED', '', '2018-05-24 10:06:57');

-- --------------------------------------------------------

--
-- Table structure for table `referral_attachments`
--

CREATE TABLE `referral_attachments` (
  `attach_id` int(10) NOT NULL,
  `referral_id` int(10) NOT NULL,
  `file_name` varchar(1024) NOT NULL,
  `type` varchar(200) NOT NULL,
  `size` varchar(200) NOT NULL,
  `error` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `regDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `referral_attachments`
--

INSERT INTO `referral_attachments` (`attach_id`, `referral_id`, `file_name`, `type`, `size`, `error`, `status`, `regDate`) VALUES
(1, 1, '41af4bc16727292760dad816862ce082.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', '8553', '0', 'ACTIVE', '2018-04-27 08:39:45'),
(2, 1, '088fe91b34becdca76b8fff2cbacf9b7.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', '14417', '0', 'ACTIVE', '2018-04-27 08:39:45'),
(3, 2, '8cbd93077c210e906d9b8cd31f555652.jpg', 'image/jpeg', '119667', '0', 'ACTIVE', '2018-04-28 11:38:37'),
(4, 4, 'dec780faf90bfa70bd9b71fcc6546826.jpg', 'image/jpeg', '171354', '0', 'ACTIVE', '2018-05-24 10:08:12');

-- --------------------------------------------------------

--
-- Table structure for table `referral_chat`
--

CREATE TABLE `referral_chat` (
  `message_id` int(255) NOT NULL,
  `referral_id` int(255) NOT NULL,
  `sender_id` int(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `user_type` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  `regDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `referral_chat`
--

INSERT INTO `referral_chat` (`message_id`, `referral_id`, `sender_id`, `user_name`, `message`, `user_type`, `status`, `regDate`) VALUES
(2, 4, 3, 'Sugira', 'sddsdsdsdsdsdsds', 'doctor', 'ACTIVE', '2018-05-27 14:01:01'),
(3, 4, 3, 'Sugira', 'dsidjsdihygsdgsdjsdsdsdsdsdsddsd', 'doctor', 'ACTIVE', '2018-05-27 14:02:12'),
(4, 4, 3, 'Sugira', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'doctor', 'ACTIVE', '2018-05-27 14:02:24'),
(5, 2, 7, 'doctor test', 'yes you have to change the medication you offer this patient', 'doctor', 'ACTIVE', '2018-05-27 14:12:01');

-- --------------------------------------------------------

--
-- Table structure for table `referral_info`
--

CREATE TABLE `referral_info` (
  `info_id` int(100) NOT NULL,
  `referral_id` int(100) NOT NULL,
  `sender_id` int(100) NOT NULL,
  `receiver_id` int(255) NOT NULL,
  `senderType` varchar(100) NOT NULL,
  `received_date` varchar(200) NOT NULL,
  `sendDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `referral_notifications`
--

CREATE TABLE `referral_notifications` (
  `notification_id` int(11) NOT NULL,
  `referral_id` int(100) NOT NULL,
  `sender_id` int(50) NOT NULL,
  `receiver_hospital` int(20) NOT NULL,
  `title` varchar(200) NOT NULL,
  `body` text NOT NULL,
  `type` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `regDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `referral_notifications`
--

INSERT INTO `referral_notifications` (`notification_id`, `referral_id`, `sender_id`, `receiver_hospital`, `title`, `body`, `type`, `status`, `regDate`) VALUES
(1, 1, 2, 8, 'New Referral Received', 'welcome to my homealand of technology', 'REFERRAL', 'UNREAD', '2018-04-28 08:59:36');

-- --------------------------------------------------------

--
-- Table structure for table `superadmins`
--

CREATE TABLE `superadmins` (
  `Super_id` int(11) NOT NULL,
  `Super_key` varchar(100) NOT NULL,
  `Access_name` varchar(255) NOT NULL,
  `category` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `is_online` varchar(50) NOT NULL,
  `regDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `superadmins`
--

INSERT INTO `superadmins` (`Super_id`, `Super_key`, `Access_name`, `category`, `status`, `is_online`, `regDate`) VALUES
(1, '4afed532f06bff7d4d5b2dde81026df2', 'admin', 'ACTIVE', 'ACTIVATED', 'no', '2018-03-27 10:45:49');

-- --------------------------------------------------------

--
-- Table structure for table `system`
--

CREATE TABLE `system` (
  `id` int(11) NOT NULL,
  `name` varchar(1024) NOT NULL,
  `title` varchar(1024) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(100) NOT NULL,
  `system_email` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `bg_image` text NOT NULL,
  `logo` varchar(1024) NOT NULL,
  `login_page` varchar(1024) NOT NULL,
  `status` varchar(100) NOT NULL,
  `regDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `system`
--

INSERT INTO `system` (`id`, `name`, `title`, `address`, `phone`, `system_email`, `description`, `bg_image`, `logo`, `login_page`, `status`, `regDate`) VALUES
(1, 'Referral Managment System', 'Referral Managment System', 'Kigali/Rwanda', '250788998899', 'info@referral.com', 'Build and manage high-performance provider referral networks to increase revenue, reduce value-based risk, minimize leakage, while improving patient access and outcomes.', '', '', 'Login to system -Referral Managment System', 'ACTIVE', '2018-03-27 06:24:13');

-- --------------------------------------------------------

--
-- Table structure for table `system_announcements`
--

CREATE TABLE `system_announcements` (
  `ann_id` int(200) NOT NULL,
  `title` varchar(1024) NOT NULL,
  `category` varchar(200) NOT NULL,
  `target` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `status` varchar(50) NOT NULL,
  `regDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `system_announcements`
--

INSERT INTO `system_announcements` (`ann_id`, `title`, `category`, `target`, `description`, `status`, `regDate`) VALUES
(1, 'System has been changed', 'NOTIFICATION', '*', 'Welcome to my our new referral system', 'INACTIVE', '2018-05-21 07:12:40'),
(2, 'System has been upgraded', 'NOTIFICATION', '*', 'We would like to inform you that our system has been upgraded to new functionalities', 'INACTIVE', '2018-05-21 07:13:26'),
(3, 'sdsddsdsdsdsds', 'NOTIFICATION', '*', 'dsdsdsdsdsdsdsdsdsdsds', 'INACTIVE', '2018-05-21 07:13:26'),
(4, 'ddddddddddddddddd', 'NOTIFICATION', '*', 'dddddddddddddddddddddddddd', 'INACTIVE', '2018-05-23 08:58:38'),
(5, 'System has been upgraded', 'NOTIFICATION', '*', 'is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type \n\nspecimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', 'INACTIVE', '2018-05-23 09:04:32'),
(6, 'user_typeuser_typeuser_typeuser_typeuser_type', 'NOTIFICATION', '2', 'user_typeuser_typeuser_typeuser_typeuser_typeuser_typeuser_typeuser_typeuser_typeuser_typeuser_typeuser_typeuser_typeuser_typeuser_typeuser_typeuser_typeuser_typeuser_typeuser_type', 'INACTIVE', '2018-05-25 10:09:10'),
(7, 'System has been upgraded', 'NOTIFICATION', '2', 'nhbdscdZCx', 'INACTIVE', '2018-05-27 18:31:23'),
(8, 'Add new System MessagesAdd new System MessagesAdd new System Messages', 'MESSAGE', '*', 'Add new System MessagesAdd new System MessagesAdd new System MessagesAdd new System MessagesAdd new System MessagesAdd new System MessagesAdd new System MessagesAdd new System MessagesAdd new System MessagesAdd new System MessagesAdd new System Messages', 'ACTIVE', '2018-05-27 18:31:23');

-- --------------------------------------------------------

--
-- Table structure for table `system_blog`
--

CREATE TABLE `system_blog` (
  `blog_id` int(11) NOT NULL,
  `author` varchar(200) NOT NULL,
  `blog_title` varchar(1024) NOT NULL,
  `description` text NOT NULL,
  `category` varchar(50) NOT NULL,
  `special_text` text NOT NULL,
  `tags` varchar(1024) NOT NULL,
  `embed` varchar(1024) NOT NULL,
  `status` varchar(50) NOT NULL,
  `regDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `system_blog`
--

INSERT INTO `system_blog` (`blog_id`, `author`, `blog_title`, `description`, `category`, `special_text`, `tags`, `embed`, `status`, `regDate`) VALUES
(2, '', 'E.U. leader lights into Trump: â€˜With friends like that, who needs enemies?â€™', 'BRUSSELS â€” Even by the stressed standards of relations between Europe and the United States in the Trump era, European Council President Donald Tuskâ€™s Wednesday criticisms were unusually cutting.\r\n\r\nAt the outset of a summit of European leaders whose agenda items, point by point, have to do with the flames of crises that many Europeans see as ignited by President Trump, Tusk ripped into what he called â€œthe capricious assertiveness of the American administrationâ€ over issues including Iran, Gaza, trade tariffs and North Korea.\r\n\r\nIn comments to reporters and a subsequent tweet, he suggested the White House had lost touch with reality. He said Europe didnâ€™t need enemies when it had friends like the United States. And he exhorted European leaders not to be reliant on Washington.', 'BLOG', '', 'Article', '', 'PENDING', '2018-05-17 08:23:10');

-- --------------------------------------------------------

--
-- Table structure for table `system_departments`
--

CREATE TABLE `system_departments` (
  `id` int(11) NOT NULL,
  `name` varchar(1024) NOT NULL,
  `description` text NOT NULL,
  `status` varchar(50) NOT NULL,
  `regDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `system_departments`
--

INSERT INTO `system_departments` (`id`, `name`, `description`, `status`, `regDate`) VALUES
(1, 'Cardiology', 'Cardiology is heart based Deparment', 'ACTIVE', '2018-05-20 16:18:33'),
(2, 'Cardiology', 'Cardiology is heart based Deparment', 'DELETED', '2018-05-20 16:19:05'),
(3, 'ssssssssssssssss', 'sssssssssssssss', 'DELETED', '2018-05-20 16:19:18'),
(4, 'Anesthetics', 'An anesthetic is a drug to prevent pain during surgery. A wide variety of drugs are used in modern anesthetic practice. Many are rarely used outside anesthesia, although others are used commonly by all disciplines.', 'ACTIVE', '2018-05-20 16:31:07'),
(5, 'Analgesic', 'An analgesic or painkiller is any member of the group of drugs used to achieve analgesia, relief from pain. Analgesic drugs act in various ways on the peripheral and central nervous systems', 'ACTIVE', '2018-05-20 16:31:41'),
(6, 'Gastroenterology', 'Gastroenterology is the branch of medicine focused on the digestive system and its disorders. Diseases affecting the gastrointestinal tract, which include the organs from mouth into anus, along the alimentary canal, are the focus of this speciality.', 'ACTIVE', '2018-05-20 16:32:08');

-- --------------------------------------------------------

--
-- Table structure for table `system_users`
--

CREATE TABLE `system_users` (
  `user_id` int(11) NOT NULL,
  `Names` varchar(1024) NOT NULL,
  `user_mail` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `category` varchar(100) NOT NULL,
  `user_phone` varchar(100) NOT NULL,
  `hospital_id` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `user_profile` varchar(1024) NOT NULL,
  `is_logged_in` varchar(50) NOT NULL,
  `regDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `system_users`
--

INSERT INTO `system_users` (`user_id`, `Names`, `user_mail`, `user_password`, `category`, `user_phone`, `hospital_id`, `status`, `user_profile`, `is_logged_in`, `regDate`) VALUES
(1, 'manikiza samuel', 'ss@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'HospitalAdmin', '250788554433', '1', 'PENDING', 'system_images/profiles/1426707043.jpg', 'NO', '2018-03-28 07:32:17'),
(2, 'Gsabo hospital', 'sam@gmail.com', 'eb694a28c3b6ec3a1bf52ed4bf7294cc', 'HospitalAdmin', '+250788998877', '2', 'PENDING', 'system_images/profiles/hospital_admin/1094848417.PNG', 'NO', '2018-03-28 08:16:18'),
(3, 'Mnaikiza sugira', 'test@gmail.com', 'eb694a28c3b6ec3a1bf52ed4bf7294cc', 'HospitalAdmin', '250788665544', '3', 'PENDING', 'system_images/profiles/582153710.jpg', 'NO', '2018-03-28 09:02:35'),
(4, 'ssssssssssss', '', 'eb694a28c3b6ec3a1bf52ed4bf7294cc', 'HospitalAdmin', '', '4', 'PENDING', '', 'NO', '2018-03-28 09:05:13'),
(5, 'manikiza', 'ss@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'HospitalAdmin', '250788998877', '5', 'PENDING', 'system_images/profiles/hospital_admin/82329976.jpg', 'NO', '2018-03-29 13:21:58'),
(6, 'ssssssssssss', 'blue@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'HospitalAdmin', '+250788998877', '6', 'PENDING', 'system_images/profiles/hospital_admin/1223864898.jpg', 'NO', '2018-03-29 13:36:52'),
(7, 'dsdsds', '', 'b5c4abaf0be8c672ebdf4a9f0a9dc7b7', 'HospitalAdmin', '', '7', 'PENDING', '', 'NO', '2018-03-30 09:19:36'),
(8, 'Samson Drake', 'samson@gmail.com', '4afed532f06bff7d4d5b2dde81026df2', 'HospitalAdmin', '250788776655', '8', 'PENDING', 'system_images/profiles/hospital_admin/1461339738.jpg', 'NO', '2018-04-28 10:55:33'),
(9, 'Sugira Emmanuel', 'sam@gmail.com', '4afed532f06bff7d4d5b2dde81026df2', 'HospitalAdmin', '250788456789', '9', 'PENDING', 'system_images/profiles/hospital_admin/1504019796.jpg', 'NO', '2018-04-29 09:51:47');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `name` varchar(1024) NOT NULL,
  `category` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `name`, `category`) VALUES
(1, 'sam', '12');

-- --------------------------------------------------------

--
-- Table structure for table `transport_mode`
--

CREATE TABLE `transport_mode` (
  `id` int(11) NOT NULL,
  `transport_name` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL,
  `regDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transport_mode`
--

INSERT INTO `transport_mode` (`id`, `transport_name`, `status`, `regDate`) VALUES
(1, 'Ambulance', 'ACTIVE', '2018-04-12 08:53:47'),
(2, 'Family', 'ACTIVE', '2018-04-19 08:43:49'),
(3, 'PRIVATE', 'ACTIVE', '2018-04-19 08:44:23');

-- --------------------------------------------------------

--
-- Table structure for table `user_types`
--

CREATE TABLE `user_types` (
  `id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `regDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_types`
--

INSERT INTO `user_types` (`id`, `type`, `status`, `regDate`) VALUES
(1, 'SuperAdmin', 'ACTIVE', '2018-03-27 10:39:07'),
(2, 'HospitalAdmin', 'ACTIVE', '2018-03-27 10:39:07'),
(3, 'Doctor', 'ACTIVE', '2018-03-27 10:39:30'),
(4, 'Nurses', 'ACTIVE', '2018-03-27 10:39:30'),
(5, 'Receptionist', 'ACTIVE', '2018-03-27 10:40:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog_attachments`
--
ALTER TABLE `blog_attachments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `counter_referrals`
--
ALTER TABLE `counter_referrals`
  ADD PRIMARY KEY (`counter_ref_id`);

--
-- Indexes for table `counter_ref_attachments`
--
ALTER TABLE `counter_ref_attachments`
  ADD PRIMARY KEY (`attach_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`doctor_id`);

--
-- Indexes for table `hospitals`
--
ALTER TABLE `hospitals`
  ADD PRIMARY KEY (`hospital_id`);

--
-- Indexes for table `hospitals_category`
--
ALTER TABLE `hospitals_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hospital_regions`
--
ALTER TABLE `hospital_regions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `navigations`
--
ALTER TABLE `navigations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nurses`
--
ALTER TABLE `nurses`
  ADD PRIMARY KEY (`nurse_id`);

--
-- Indexes for table `receptionists`
--
ALTER TABLE `receptionists`
  ADD PRIMARY KEY (`receptionist_id`);

--
-- Indexes for table `referrals`
--
ALTER TABLE `referrals`
  ADD PRIMARY KEY (`referral_id`);

--
-- Indexes for table `referral_attachments`
--
ALTER TABLE `referral_attachments`
  ADD PRIMARY KEY (`attach_id`);

--
-- Indexes for table `referral_chat`
--
ALTER TABLE `referral_chat`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `referral_info`
--
ALTER TABLE `referral_info`
  ADD PRIMARY KEY (`info_id`);

--
-- Indexes for table `referral_notifications`
--
ALTER TABLE `referral_notifications`
  ADD PRIMARY KEY (`notification_id`);

--
-- Indexes for table `superadmins`
--
ALTER TABLE `superadmins`
  ADD PRIMARY KEY (`Super_id`);

--
-- Indexes for table `system`
--
ALTER TABLE `system`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_announcements`
--
ALTER TABLE `system_announcements`
  ADD PRIMARY KEY (`ann_id`);

--
-- Indexes for table `system_blog`
--
ALTER TABLE `system_blog`
  ADD PRIMARY KEY (`blog_id`);

--
-- Indexes for table `system_departments`
--
ALTER TABLE `system_departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_users`
--
ALTER TABLE `system_users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `transport_mode`
--
ALTER TABLE `transport_mode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_types`
--
ALTER TABLE `user_types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog_attachments`
--
ALTER TABLE `blog_attachments`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `counter_referrals`
--
ALTER TABLE `counter_referrals`
  MODIFY `counter_ref_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `counter_ref_attachments`
--
ALTER TABLE `counter_ref_attachments`
  MODIFY `attach_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `doctor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `hospitals`
--
ALTER TABLE `hospitals`
  MODIFY `hospital_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `hospitals_category`
--
ALTER TABLE `hospitals_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `hospital_regions`
--
ALTER TABLE `hospital_regions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `navigations`
--
ALTER TABLE `navigations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nurses`
--
ALTER TABLE `nurses`
  MODIFY `nurse_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `receptionists`
--
ALTER TABLE `receptionists`
  MODIFY `receptionist_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `referrals`
--
ALTER TABLE `referrals`
  MODIFY `referral_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `referral_attachments`
--
ALTER TABLE `referral_attachments`
  MODIFY `attach_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `referral_chat`
--
ALTER TABLE `referral_chat`
  MODIFY `message_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `referral_info`
--
ALTER TABLE `referral_info`
  MODIFY `info_id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `referral_notifications`
--
ALTER TABLE `referral_notifications`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `superadmins`
--
ALTER TABLE `superadmins`
  MODIFY `Super_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `system`
--
ALTER TABLE `system`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `system_announcements`
--
ALTER TABLE `system_announcements`
  MODIFY `ann_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `system_blog`
--
ALTER TABLE `system_blog`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `system_departments`
--
ALTER TABLE `system_departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `system_users`
--
ALTER TABLE `system_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `transport_mode`
--
ALTER TABLE `transport_mode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
