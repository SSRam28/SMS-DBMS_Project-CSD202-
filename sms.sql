-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2020 at 08:44 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_details`
--

CREATE TABLE `admin_details` (
  `name` varchar(30) DEFAULT NULL,
  `admin_id` varchar(30) DEFAULT NULL,
  `password` varchar(150) DEFAULT NULL,
  `ph_no` varchar(13) DEFAULT NULL,
  `unique_id` int(11) NOT NULL,
  `session_id` varchar(100) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_details`
--

INSERT INTO `admin_details` (`name`, `admin_id`, `password`, `ph_no`, `unique_id`, `session_id`) VALUES
('Ram', 'r@e.c', '6f96ef06a6715f12989353fc970f6353', '9963829696', 1, '0'),
('ssr', 'ssr@e.c', 'e9bd76dd7fbd0c16356c88e1eec4802d', '9963829595', 4, 'ipm5ut0628ql9a6gbg0enm1gog'),
('nene', 'nene@gmail.com', '4601b847d7fd415b37f8edcbf508a5b2', '6303292131', 5, '0'),
('vikram', 'vikram@gmail.com', '9f425e851442213557ff17fba9b7dbb7', '9876543210', 6, 'dbp99qpmu9e5komdpvo2f7cise'),
('abc', 'abc@e.c', 'd466a7763d60c2caba7b9f1f3145f968', '9963825252', 7, '0'),
('jyoti kirar', 'jk999@snu.edu.in', 'ae42cd69d3ffe0542671da01dae70923', '9963847575', 8, '0'),
('ankur tyagi', 'at007@snu.edu.in', 'ae42cd69d3ffe0542671da01dae70923', '9963857495', 9, '0');

-- --------------------------------------------------------

--
-- Table structure for table `admin_log`
--

CREATE TABLE `admin_log` (
  `serial_no` int(11) NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ip_address` varchar(50) DEFAULT NULL,
  `session_id` varchar(100) DEFAULT NULL,
  `admin_unique_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_log`
--

INSERT INTO `admin_log` (`serial_no`, `time_stamp`, `ip_address`, `session_id`, `admin_unique_id`) VALUES
(1, '2020-04-29 11:35:58', '::1', 'a4okgguud91ndqeijprbec0f21', 1),
(2, '2020-04-29 11:36:28', '::1', 'a4okgguud91ndqeijprbec0f21', 1),
(3, '2020-04-29 11:40:51', '::1', 'a4okgguud91ndqeijprbec0f21', 1),
(4, '2020-04-29 12:07:04', '::1', 'a4okgguud91ndqeijprbec0f21', 1),
(5, '2020-04-29 12:09:35', '::1', 'a4okgguud91ndqeijprbec0f21', 1),
(6, '2020-04-30 04:54:42', '::1', 'i5r6cjnu6l81jnnjnspq35qpim', 1),
(7, '2020-04-30 09:49:35', '::1', 'i5r6cjnu6l81jnnjnspq35qpim', 1),
(8, '2020-04-30 09:50:41', '::1', 'i5r6cjnu6l81jnnjnspq35qpim', 1),
(9, '2020-04-30 09:51:16', '::1', 'i5r6cjnu6l81jnnjnspq35qpim', 1),
(10, '2020-04-30 09:51:54', '::1', 'i5r6cjnu6l81jnnjnspq35qpim', 4),
(11, '2020-04-30 13:36:51', '::1', '81n6h24l43qnmmdib6pfauanq0', 1),
(12, '2020-04-30 13:37:26', '::1', '81n6h24l43qnmmdib6pfauanq0', 1),
(13, '2020-04-30 13:52:41', '::1', '81n6h24l43qnmmdib6pfauanq0', 5),
(14, '2020-04-30 13:56:11', '::1', '81n6h24l43qnmmdib6pfauanq0', 1),
(15, '2020-05-01 05:32:16', '::1', 't5fqdpog0gi11ve127kj6530h1', 1),
(16, '2020-05-01 10:05:27', '::1', 't5fqdpog0gi11ve127kj6530h1', 1),
(17, '2020-05-01 14:26:09', '::1', '7hevbhs2f86s3gok9hejb1atkv', 1),
(18, '2020-05-02 04:35:22', '::1', 'hm6116tc61dsiqc67e5uja2d3r', 1),
(19, '2020-05-02 06:45:57', '::1', 'r7b93rbi6hhokvg761hm5g6bad', 1),
(20, '2020-05-02 06:52:46', '::1', 'dbp99qpmu9e5komdpvo2f7cise', 1),
(21, '2020-05-02 06:55:11', '::1', 'dbp99qpmu9e5komdpvo2f7cise', 1),
(22, '2020-05-02 06:55:57', '::1', 'dbp99qpmu9e5komdpvo2f7cise', 6),
(23, '2020-05-02 07:08:57', '::1', 'hm6116tc61dsiqc67e5uja2d3r', 1),
(24, '2020-05-02 09:27:03', '::1', 'hm6116tc61dsiqc67e5uja2d3r', 1),
(25, '2020-05-02 09:34:33', '::1', 'dbp99qpmu9e5komdpvo2f7cise', 1),
(26, '2020-05-02 09:35:01', '::1', 'dbp99qpmu9e5komdpvo2f7cise', 1),
(27, '2020-05-02 09:38:02', '::1', 'hm6116tc61dsiqc67e5uja2d3r', 4),
(28, '2020-05-02 09:59:41', '::1', '3goqavdssd5icqttt0ksqpu9ft', 1),
(29, '2020-05-02 10:03:14', '::1', '3goqavdssd5icqttt0ksqpu9ft', 1),
(30, '2020-05-02 10:04:00', '::1', 'dbp99qpmu9e5komdpvo2f7cise', 1),
(31, '2020-05-02 10:09:08', '::1', '3goqavdssd5icqttt0ksqpu9ft', 1),
(32, '2020-05-02 10:12:20', '::1', 'dbp99qpmu9e5komdpvo2f7cise', 1),
(33, '2020-05-03 08:22:30', '::1', '298u9qk0dl07unnonbt73lki39', 1),
(34, '2020-05-05 06:53:15', '::1', 'sg80qua8gqj4h8c8qmqtk43c89', 1),
(35, '2020-05-05 07:15:35', '::1', 'sg80qua8gqj4h8c8qmqtk43c89', 1),
(36, '2020-05-05 10:30:47', '::1', 'sg80qua8gqj4h8c8qmqtk43c89', 1),
(37, '2020-05-05 11:24:47', '::1', 'sg80qua8gqj4h8c8qmqtk43c89', 1),
(38, '2020-05-05 12:38:56', '::1', 'i5vjsc8fd15nhqlc29c4ngh79n', 1),
(39, '2020-05-05 12:39:24', '::1', 'i5vjsc8fd15nhqlc29c4ngh79n', 1),
(40, '2020-05-05 12:49:09', '::1', 'a9ibfiehup7h24i79vee5hkg8i', 1),
(41, '2020-05-05 12:51:56', '::1', 'sg80qua8gqj4h8c8qmqtk43c89', 1),
(42, '2020-05-05 12:52:17', '::1', 'a9ibfiehup7h24i79vee5hkg8i', 1),
(43, '2020-05-05 12:53:07', '::1', 'sg80qua8gqj4h8c8qmqtk43c89', 4),
(44, '2020-05-05 13:45:40', '::1', 'sg80qua8gqj4h8c8qmqtk43c89', 1),
(45, '2020-05-06 15:47:50', '::1', 'u2s3i4mc73tdolvccttks7flsq', 1),
(46, '2020-05-06 16:25:19', '::1', 'af592btdvihc78sjhh3qh8dalu', 1),
(47, '2020-05-06 16:31:48', '::1', 'af592btdvihc78sjhh3qh8dalu', 1),
(48, '2020-05-06 16:34:04', '::1', 'af592btdvihc78sjhh3qh8dalu', 1),
(49, '2020-05-06 16:38:00', '::1', '1inl683icib5mtsopnalkiqm1c', 4),
(50, '2020-05-07 04:23:29', '::1', 'jlandp0b3js5bn39j2ngipn5bi', 1),
(51, '2020-05-07 04:51:45', '::1', 'pe60o9q68oif7jo78jis2g0bek', 4),
(52, '2020-05-07 04:59:48', '::1', 'iri05hd37qhjhfd92sr9p8amf3', 1),
(53, '2020-05-07 05:30:39', '::1', 'c9hjpc579uvis0dtds630d3ohf', 1),
(54, '2020-05-07 05:36:34', '::1', 'c9hjpc579uvis0dtds630d3ohf', 1),
(55, '2020-05-07 05:42:07', '::1', 'c9hjpc579uvis0dtds630d3ohf', 1),
(56, '2020-05-07 12:00:41', '::1', 'pe60o9q68oif7jo78jis2g0bek', 4),
(57, '2020-05-08 06:46:56', '::1', 'nuuujntiuerpeart8l8ibj72l8', 1),
(58, '2020-05-08 06:48:18', '::1', '7ca33ao88kc01neq7t4lv3hqds', 4),
(59, '2020-05-08 07:01:34', '::1', 'jue174daohsevbfvr65d157h84', 1),
(60, '2020-05-08 07:11:50', '::1', 'uuv4631lj7d4jqh0mtd8349a6h', 1),
(61, '2020-05-08 07:12:40', '::1', 'uuv4631lj7d4jqh0mtd8349a6h', 1),
(62, '2020-05-08 07:32:55', '::1', 'k7rba5ic5asbkuu9vf744nv2l8', 1),
(63, '2020-05-08 07:37:13', '::1', '1rncb84jtohog61e79d845tqjl', 1),
(64, '2020-05-08 09:58:44', '::1', 'vh4ir0ccblmo2gj50dos6tk97j', 1),
(65, '2020-05-08 16:48:29', '::1', '7ca33ao88kc01neq7t4lv3hqds', 1),
(66, '2020-05-09 10:22:32', '::1', '6jjo3m5jb8flu9et9itfqfj8ec', 1),
(67, '2020-05-09 10:23:03', '::1', '6jjo3m5jb8flu9et9itfqfj8ec', 1),
(68, '2020-05-09 10:25:16', '::1', 'l88khlk2ca57nv72v102sbbu21', 4),
(69, '2020-05-09 13:35:17', '::1', 'h4bsvdr9ncss1785e265ekdt0q', 4),
(70, '2020-05-10 16:10:11', '::1', 'gm2slik50unfdctvmvsgtrlibf', 4),
(71, '2020-05-11 10:11:42', '::1', 'pp0hj3252035qv2rtk3kip15gb', 4),
(72, '2020-05-11 11:04:56', '::1', 'pp0hj3252035qv2rtk3kip15gb', 4),
(73, '2020-05-11 11:39:25', '::1', '1knijmndvjjgcc13ksts3v0jfn', 1),
(74, '2020-05-11 12:02:51', '::1', '1knijmndvjjgcc13ksts3v0jfn', 1),
(75, '2020-05-11 12:09:59', '::1', 'pp0hj3252035qv2rtk3kip15gb', 1),
(76, '2020-05-11 12:20:16', '::1', '07n8f8mfbpl7lvv065au4bu4hb', 1),
(77, '2020-05-11 14:14:19', '::1', 'pp0hj3252035qv2rtk3kip15gb', 8),
(78, '2020-05-11 14:14:36', '::1', 'pp0hj3252035qv2rtk3kip15gb', 9),
(79, '2020-05-11 15:25:24', '::1', 'pp0hj3252035qv2rtk3kip15gb', 4),
(80, '2020-05-11 15:27:56', '::1', 'pp0hj3252035qv2rtk3kip15gb', 4),
(81, '2020-05-11 15:31:27', '::1', 'pp0hj3252035qv2rtk3kip15gb', 4),
(82, '2020-05-11 15:54:21', '::1', 'pp0hj3252035qv2rtk3kip15gb', 4),
(83, '2020-05-12 05:42:12', '::1', '1jj9fv44941h79pt6frr9h1ocq', 1),
(84, '2020-05-12 06:19:27', '::1', 'ipm5ut0628ql9a6gbg0enm1gog', 4);

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `serial_no` int(11) NOT NULL,
  `From` varchar(40) DEFAULT NULL,
  `To` varchar(40) DEFAULT NULL,
  `txn_id` varchar(30) DEFAULT NULL,
  `img_ref` varchar(100) DEFAULT NULL,
  `user_uniqueID` int(11) DEFAULT NULL,
  `unique_tripID` int(11) DEFAULT NULL,
  `payment_method` varchar(10) DEFAULT NULL,
  `timestamp` datetime DEFAULT NULL,
  `isValidated` char(1) NOT NULL DEFAULT 'P'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`serial_no`, `From`, `To`, `txn_id`, `img_ref`, `user_uniqueID`, `unique_tripID`, `payment_method`, `timestamp`, `isValidated`) VALUES
(24, 'depot station', 'SNU', '0', NULL, 1008, 5, 'cash', '2020-04-27 14:18:13', 'P'),
(25, '', '', '0', NULL, 1006, 1, 'cash', '2020-04-27 14:22:41', 'A'),
(26, 'SNU', 'airport', '0', NULL, 1006, 1, 'cash', '2020-04-28 21:58:31', 'P'),
(27, 'depot station', 'SNU', '0', NULL, 1008, 5, 'cash', '2020-04-29 15:51:12', 'P'),
(28, '', '', '0', NULL, 1001, 5, 'cash', '2020-04-29 21:09:10', 'P'),
(29, 'depot station', 'SNU', '22341323212133', 'Sai Krishna Karthik_5_2020-04-29 211016.jpg', 1001, 5, 'paytm', '2020-04-29 21:10:17', 'P'),
(30, 'SNU', 'sector 16', '0', NULL, 1001, 2, 'cash', '2020-04-29 21:25:22', 'A'),
(31, 'SNU', 'botanical garden', '0', NULL, 1008, 2, 'cash', '2020-04-30 18:48:09', 'P'),
(32, 'snu', 'Ansal Plaza', '123456781234', 'ssr_13_2020-05-01 175921.jpg', 1008, 13, 'paytm', '2020-05-01 17:59:21', 'A'),
(33, 'snu', 'depot station', '0', NULL, 1008, 8, 'cash', '2020-05-01 17:59:38', 'R'),
(34, 'snu', 'Venice Mall', '111111111111', 'ssr_13_2020-05-01 191903.jpg', 1008, 13, 'gpay', '2020-05-01 19:19:03', 'P'),
(35, 'SNU', 'hehe', '0', NULL, 1001, 15, 'cash', '2020-05-02 15:26:32', 'R'),
(36, '', '', '545246664662222', 'Ram_15_2020-05-02 152913.png', 1001, 15, 'gpay', '2020-05-02 15:29:15', 'A'),
(37, 'snu', 'Inner gate', '0', NULL, 1006, 13, 'cash', '2020-05-05 15:27:43', 'P'),
(38, 'snu', 'Inner gate', '0', NULL, 1006, 13, 'cash', '2020-05-05 15:36:06', 'P'),
(39, 'snu', 'Inner gate', '0', NULL, 1006, 13, 'cash', '2020-05-05 15:41:02', 'P'),
(40, 'snu', 'Inner gate', '0', NULL, 1006, 13, 'cash', '2020-05-05 18:06:46', 'P'),
(41, 'snu', 'Inner gate', '0', NULL, 1006, 14, 'cash', '2020-05-06 22:14:35', 'A'),
(42, 'SNU', 'Venice Mall', '0', NULL, 1001, 15, 'cash', '2020-05-07 10:27:10', 'R'),
(43, 'snu', 'Inner gate', '345634563456', 't_14_2020-05-07 105641.jpg', 1006, 14, 'paytm', '2020-05-07 10:56:42', 'A'),
(44, 'snu', 'Inner gate', '0', NULL, 1006, 14, 'cash', '2020-05-07 11:58:05', 'P'),
(45, 'snu', 'Inner gate', '0', NULL, 1006, 14, 'cash', '2020-05-08 12:14:55', 'P'),
(46, 'snu', 'Inner gate', '0', NULL, 1008, 17, 'cash', '2020-05-08 12:38:44', 'A'),
(47, 'snu', 'MSX Mall', '987654543217654', 't_14_2020-05-08 124009.jpg', 1006, 14, 'paytm', '2020-05-08 12:40:10', 'P'),
(48, 'snu', 'Ansal Plaza', '0', NULL, 1006, 14, 'cash', '2020-05-08 15:26:30', 'A'),
(49, 'SNU', 'Main gate', '0', NULL, 1015, 15, 'cash', '2020-05-08 17:02:22', 'P'),
(50, 'SNU', 'Inner gate', '0', NULL, 1008, 15, 'cash', '2020-05-08 22:17:22', 'A'),
(51, 'snu', 'Inner gate', '0', NULL, 1004, 17, 'cash', '2020-05-11 16:42:59', 'P'),
(52, 'snu', 'Inner gate', '123422562254', 'Romannof_18_2020-05-11 164733.png', 1004, 18, 'paytm', '2020-05-11 16:47:33', 'A'),
(53, 'dadri', 'SNU', '123456789587', 'Romannof_19_2020-05-11 165124.png', 1004, 19, 'gpay', '2020-05-11 16:51:24', 'P'),
(54, 'snu', 'MSX Mall', '0', NULL, 1005, 17, 'cash', '2020-05-11 17:09:07', 'P'),
(55, 'SNU', 'Pari chowk metro station', '95469944888', 'Ajay Kumar_18_2020-05-11 171206.jpg', 1005, 18, 'paytm', '2020-05-11 17:12:07', 'P'),
(56, 'dadri', 'SNU', '645367855555', 'Ajay Kumar_19_2020-05-11 171447.jpg', 1005, 19, 'gpay', '2020-05-11 17:14:48', 'A'),
(57, '', '', '0', NULL, 1015, 11, 'cash', '2020-05-11 17:41:07', 'P'),
(58, 'snu', 'Inner gate', '0', NULL, 1006, 17, 'cash', '2020-05-12 11:11:00', 'P');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `serial_no` int(11) NOT NULL,
  `Name` varchar(40) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `ph_no` decimal(10,0) DEFAULT NULL,
  `comments` varchar(1500) DEFAULT NULL,
  `experience` varchar(10) DEFAULT NULL,
  `timestamp` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`serial_no`, `Name`, `email`, `ph_no`, `comments`, `experience`, `timestamp`) VALUES
(1, 'ssr', 's@e.c', '6303292131', 'very nice website', 'good', '2020-04-27 12:46:00'),
(2, 'ssr', 's@e.c', '6303292131', 'loved it', 'average', '2020-04-27 12:48:11'),
(3, 'tghhgh', 't@e.c', '9963829696', 'awsome', 'good', '2020-04-27 13:01:14'),
(4, 'Sai Krishna Karthik', 'dk984@snu.edu.in', '9121696999', 'cheppali kadha ra babu edho okati......', 'average', '2020-04-27 13:40:00'),
(5, 'ram', 'abcd@efgh', '9963829696', 'hello world', 'good', '2020-04-27 15:58:43'),
(6, 'ff', 't@e.c', '9876543211', 'great experience...very happy!!', 'good', '2020-04-28 19:47:50'),
(7, 't', 't@e.c', '9963829696', 'can improve', 'good', '2020-05-02 15:38:56'),
(10, 't', 't@e.c', '9963829696', 'awesome experience ', 'good', '2020-05-07 10:57:03'),
(12, 't', 't@e.c', '9963829696', 'nice feel', 'good', '2020-05-11 17:38:37'),
(13, 't', 't@e.c', '9963829696', '', 'good', '2020-05-12 11:11:56');

-- --------------------------------------------------------

--
-- Table structure for table `route`
--

CREATE TABLE `route` (
  `route_id` int(11) NOT NULL,
  `Time` time DEFAULT NULL,
  `From` varchar(30) DEFAULT NULL,
  `runs_on` varchar(30) DEFAULT 'NO INFO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `route`
--

INSERT INTO `route` (`route_id`, `Time`, `From`, `runs_on`) VALUES
(1, '11:30:00', 'SNU', 'All Weekdays'),
(2, '12:30:00', 'SNU', 'NO INFO'),
(3, '13:30:00', 'SNU', 'Before Semester breaks'),
(4, '14:30:00', 'SNU', 'NO INFO'),
(5, '08:00:00', 'Botanical Garden', 'NO INFO'),
(6, '09:30:00', 'Dadri', 'Daily');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `serial_no` int(11) NOT NULL,
  `Time` time DEFAULT NULL,
  `stop_name` varchar(50) DEFAULT NULL,
  `route_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`serial_no`, `Time`, `stop_name`, `route_id`) VALUES
(1, '11:30:00', 'Inner gate', 1),
(2, '11:40:00', 'Main gate', 1),
(3, '11:50:00', 'MSX Mall', 1),
(4, '12:00:00', 'Venice Mall', 1),
(5, '12:10:00', 'Ansal Plaza', 1),
(6, '12:20:00', 'Pari chowk metro station', 1),
(7, '12:30:00', 'airport', 2),
(8, '12:40:00', 'terminal 3', 2),
(11, '13:30:00', 'botanical garden', 3),
(12, '13:40:00', 'sector 16', 3),
(13, '13:50:00', 'nizammudin station', 3),
(15, '14:30:00', 'depot station', 4),
(16, '14:40:00', 'sector 17', 4),
(17, '14:50:00', 'airport liner', 4),
(20, '08:30:00', 'pari chowk', 5),
(21, '08:35:00', 'msx mall', 5),
(22, '08:45:00', 'depot station', 5),
(23, '09:00:00', 'SNU', 5),
(24, '10:00:00', 'SNU', 6);

-- --------------------------------------------------------

--
-- Table structure for table `stu_details`
--

CREATE TABLE `stu_details` (
  `name` varchar(50) NOT NULL,
  `email_id` varchar(40) DEFAULT NULL,
  `password` varchar(70) NOT NULL,
  `ph_no` varchar(13) NOT NULL,
  `unique_id` int(11) NOT NULL,
  `session_id` varchar(100) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stu_details`
--

INSERT INTO `stu_details` (`name`, `email_id`, `password`, `ph_no`, `unique_id`, `session_id`) VALUES
('Sai Krishna Karthik', 'dk984@snu.edu.in', 'ed7609b36a1d83f3eec1879ad0b880f4', '9121696999', 1001, '0'),
('Ben Tennison', 'bt010@snu.edu.in', '724ba3015486ab7b33c826029b88a7aa', '9876543210', 1002, '0'),
('Peter Parker', 'pp456@snu.edu.in', '29fbb59d1896848ee35069469a8cfda3', '7896547320', 1003, '0'),
('Romannof', 'bw345@snu.edu.in', '0e7ac88136b05e8694db19c1fad0d4c8', '9867543260', 1004, '0'),
('Ajay Kumar', 'ak047@snu.edu.in', '675865b4cf4c8a5dcefc801f38695041', '8679540321', 1005, '8jcggia5qn8u709qedtunl5p1e'),
('t', 't@e.c', 'c7466d26115fabcab51ed3cd6e1ce82f', '9963829696', 1006, '1jj9fv44941h79pt6frr9h1ocq'),
('mahendra', 'vk767@snu.edu.in', '176b5fb9a2677d6dc952dbacaf6a5bcd', '9247541234', 1007, '0s0smnjtrf50tqls86t4leq9j2'),
('ssr', 's@e.c', '859954d8f26909be52ad6fa05eb5e819', '6303292131', 1008, '0'),
('jaj', 'gg@gmail.com', '838b4a165bc48fb83b50e7269799865a', '5678942222', 1009, 'ep0v9eu6jltp2mnlm3s0e27s1b'),
('mahendra', 'nj789@snu.edu.in', 'c7466d26115fabcab51ed3cd6e1ce82f', '9876543211', 1010, 's4pbmo8aav8muccb7is0jbd9c3'),
('jjhjh', 'jkhf@gmail.commmmm', 'ee4aa092d091d736dee745bf27655986', '8767878787', 1012, '0'),
('kanna', 'k@e.c', '5a418bcb95f0eb470a6304bf3618f29a', '8585624785', 1013, '0'),
('mahendra', 'm@1.com', '3fc7008a2baead72a1a83d6b05a7025e', '9876543212', 1014, '0'),
('Nitin Moturu', 'nm412@snu.edu.in', '30c3a65ee2feb9f0300dc319466225ca', '9502950306', 1015, 'ih8t6tkv10d1mrh0sc8f4d9sq8');

-- --------------------------------------------------------

--
-- Table structure for table `trip_details`
--

CREATE TABLE `trip_details` (
  `Unique_tripID` int(11) NOT NULL,
  `From` varchar(40) DEFAULT NULL,
  `To` varchar(40) DEFAULT NULL,
  `Availability` int(11) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `Start_time` time DEFAULT NULL,
  `Cost` decimal(10,0) DEFAULT NULL,
  `route_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `trip_details`
--

INSERT INTO `trip_details` (`Unique_tripID`, `From`, `To`, `Availability`, `Date`, `Start_time`, `Cost`, `route_id`) VALUES
(1, 'SNU', 'Terminal 3- IGI', 1, '2020-04-29', '12:30:00', '499', 2),
(2, 'SNU', 'nizamuddin station', 5, '2020-05-01', '13:30:00', '299', 3),
(3, 'SNU', 'Pari chowk metro station', 7, '2020-04-29', '11:30:00', '50', 1),
(4, 'SNU', 'Airport', 3, '2020-04-28', '14:30:00', '399', 4),
(5, 'Botanical Garden', 'SNU', 26, '2020-04-30', '08:00:00', '100', 5),
(6, 'Dadri', 'SNU', 32, '2020-04-30', '09:30:00', '105', 6),
(7, 'Dadri', 'SNU', 100, '2020-05-02', '09:30:00', '59', 6),
(8, 'snu', 'Khammam', 10, '2020-05-03', '14:30:00', '450', 4),
(11, 'snu', 'abc', 0, '2020-05-12', NULL, '2', 1),
(13, 'snu', 'abc', 4, '2020-05-06', NULL, '50', 1),
(14, 'snu', 'abc', 6, '2020-05-09', NULL, '234', 1),
(15, 'SNU', 'hehehe', 0, '2020-05-10', NULL, '999', 1),
(16, 'snu', 'abc', 25, '2020-06-02', NULL, '250', 1),
(17, 'snu', 'abcdef', 48, '2020-05-15', NULL, '254', 1),
(18, 'snu', 'pari chowk metro station', 27, '2020-05-13', NULL, '50', 1),
(19, 'dadri', 'snu', 23, '2020-05-13', NULL, '25', 6);

-- --------------------------------------------------------

--
-- Table structure for table `user_log`
--

CREATE TABLE `user_log` (
  `serial_no` int(11) NOT NULL,
  `time_stamp` timestamp NULL DEFAULT NULL,
  `ip_address` varchar(50) DEFAULT NULL,
  `session_id` varchar(100) DEFAULT NULL,
  `user_unique_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_log`
--

INSERT INTO `user_log` (`serial_no`, `time_stamp`, `ip_address`, `session_id`, `user_unique_id`) VALUES
(1, '2020-04-25 12:35:10', '::1', 'u0gj6o6a2oklp720emqn0uonvn', 1006),
(2, '2020-04-25 12:50:08', '2405:204:8189:16ef:f8bc:c654:3fb5:7983', 'fd5e7vlq71mmbr1lak4a6kpple', 1006),
(3, '2020-04-25 12:50:41', '2409:4070:2313:fb81:e903:b7fd:537c:afca', '0rrq8pddsfipin0fb816eug5un', 1001),
(4, '2020-04-25 12:52:47', '2401:4900:4828:e4ef:301b:2549:2776:b156', 'nveddtbaoi7v4fg25jv1s9t2dk', 1006),
(5, '2020-04-25 15:56:01', '::1', 'u0gj6o6a2oklp720emqn0uonvn', 1006),
(6, '2020-04-25 17:33:13', '::1', 'u0gj6o6a2oklp720emqn0uonvn', 1006),
(7, '2020-04-25 18:50:31', '::1', 'u0gj6o6a2oklp720emqn0uonvn', 1006),
(8, '2020-04-25 19:27:30', '::1', 'u12qevh7qevvcms4fd4f12h8h2', 1006),
(9, '2020-04-25 19:27:44', '::1', 'u12qevh7qevvcms4fd4f12h8h2', 1006),
(10, '2020-04-26 01:59:00', '::1', '5hbkqq73pddh2qqj2mekh8bihk', 1006),
(11, '2020-04-26 03:39:02', '2409:4070:2481:4f51:b8a4:af1b:afe9:66e6', 'iq84ime7rnnmkg8gdpppl6jhva', 1001),
(12, '2020-04-26 12:16:29', '::1', '5hbkqq73pddh2qqj2mekh8bihk', 1006),
(13, '2020-04-26 19:16:07', '::1', '5hbkqq73pddh2qqj2mekh8bihk', 1006),
(14, '2020-04-26 19:28:04', '::1', '5hbkqq73pddh2qqj2mekh8bihk', 1006),
(15, '2020-04-26 19:36:04', '::1', '5hbkqq73pddh2qqj2mekh8bihk', 1006),
(16, '2020-04-26 19:39:17', '::1', '5hbkqq73pddh2qqj2mekh8bihk', 1006),
(17, '2020-04-26 19:41:37', '::1', '5hbkqq73pddh2qqj2mekh8bihk', 1006),
(18, '2020-04-26 19:42:27', '::1', '5hbkqq73pddh2qqj2mekh8bihk', 1006),
(19, '2020-04-26 19:43:00', '::1', '5hbkqq73pddh2qqj2mekh8bihk', 1006),
(20, '2020-04-26 19:45:18', '::1', '5hbkqq73pddh2qqj2mekh8bihk', 1006),
(21, '2020-04-27 03:16:05', '157.32.124.238', '69o014o712j646hdamv9gplg69', 1006),
(22, '2020-04-27 03:25:01', '2401:4900:4828:e4ef:2:2:1489:f246', 'hj6gac707g66dnmd3qdfppdch2', 1006),
(23, '2020-04-27 03:41:16', '2409:4070:2e97:386f:9093:a787:4351:6705', '0s0smnjtrf50tqls86t4leq9j2', 1001),
(24, '2020-04-27 03:47:14', '2409:4070:2e97:386f:9093:a787:4351:6705', '0s0smnjtrf50tqls86t4leq9j2', 1001),
(25, '2020-04-27 03:51:36', '157.44.203.46', '0s0smnjtrf50tqls86t4leq9j2', 1001),
(26, '2020-04-27 03:53:48', '2409:4070:2e97:386f:9093:a787:4351:6705', '0s0smnjtrf50tqls86t4leq9j2', 1001),
(27, '2020-04-27 03:57:57', '2409:4070:2e97:386f:9093:a787:4351:6705', '0s0smnjtrf50tqls86t4leq9j2', 1007),
(28, '2020-04-27 03:58:59', '2409:4070:2e97:386f:9093:a787:4351:6705', '0s0smnjtrf50tqls86t4leq9j2', 1001),
(29, '2020-04-27 04:10:58', '175.101.107.112', 'c55gqnj7l0175u5n9pj9ugpnq4', 1006),
(30, '2020-04-27 04:12:08', '2409:4070:2e97:386f:9093:a787:4351:6705', '0s0smnjtrf50tqls86t4leq9j2', 1001),
(31, '2020-04-27 04:17:23', '175.101.107.112', 'c55gqnj7l0175u5n9pj9ugpnq4', 1006),
(32, '2020-04-27 04:17:58', '157.44.203.46', '2b6vicegmcfbh8f406slg7f9k1', 1001),
(33, '2020-04-27 04:18:01', '2409:4070:2e97:386f:ffd0:d285:1d8d:2520', '2b6vicegmcfbh8f406slg7f9k1', 1001),
(34, '2020-04-27 04:19:43', '2409:4070:106:fcec:7d9a:c4b0:a07d:2a72', '0s0smnjtrf50tqls86t4leq9j2', 1001),
(35, '2020-04-27 04:46:19', '::1', '5is8s2ern1725r9jns1s9sms8e', 1006),
(36, '2020-04-27 05:00:15', '2401:4900:4828:e4ef:41b8:3f80:c3d6:45aa', 'c55gqnj7l0175u5n9pj9ugpnq4', 1006),
(37, '2020-04-27 05:01:56', '::1', '5is8s2ern1725r9jns1s9sms8e', 1006),
(38, '2020-04-27 05:12:04', '::1', '5is8s2ern1725r9jns1s9sms8e', 1006),
(39, '2020-04-27 05:12:52', '2401:4900:4828:e4ef:41b8:3f80:c3d6:45aa', 'c55gqnj7l0175u5n9pj9ugpnq4', 1006),
(40, '2020-04-27 05:13:57', '::1', '5is8s2ern1725r9jns1s9sms8e', 1006),
(41, '2020-04-27 05:18:14', '2401:4900:4828:e4ef:41b8:3f80:c3d6:45aa', 'c55gqnj7l0175u5n9pj9ugpnq4', 1006),
(42, '2020-04-27 05:21:57', '::1', '5is8s2ern1725r9jns1s9sms8e', 1008),
(43, '2020-04-27 05:24:24', '2401:4900:4828:e4ef:41b8:3f80:c3d6:45aa', 'c55gqnj7l0175u5n9pj9ugpnq4', 1006),
(44, '2020-04-27 05:50:36', '2401:4900:4828:e4ef:41b8:3f80:c3d6:45aa', 'r59mvjop525liupe4k35ong94b', 1006),
(45, '2020-04-27 05:54:22', '2401:4900:4828:e4ef:41b8:3f80:c3d6:45aa', 'r59mvjop525liupe4k35ong94b', 1006),
(46, '2020-04-27 06:02:52', '::1', '5is8s2ern1725r9jns1s9sms8e', 1008),
(47, '2020-04-27 06:48:49', '::1', '5is8s2ern1725r9jns1s9sms8e', 1008),
(48, '2020-04-27 07:25:48', '::1', '5is8s2ern1725r9jns1s9sms8e', 1006),
(49, '2020-04-27 07:26:20', '::1', '3ato1suh86v099g474r67gs3c2', 1006),
(50, '2020-04-27 07:31:14', '::1', '5is8s2ern1725r9jns1s9sms8e', 1008),
(51, '2020-04-27 07:35:01', '::1', '3ato1suh86v099g474r67gs3c2', 1006),
(52, '2020-04-27 07:45:07', '::1', '5is8s2ern1725r9jns1s9sms8e', 1008),
(53, '2020-04-27 07:45:14', '::1', '3ato1suh86v099g474r67gs3c2', 1006),
(54, '2020-04-27 07:46:42', '::1', '5is8s2ern1725r9jns1s9sms8e', 1008),
(55, '2020-04-27 07:50:51', '::1', '3ato1suh86v099g474r67gs3c2', 1006),
(56, '2020-04-27 07:53:07', '::1', '3ato1suh86v099g474r67gs3c2', 1006),
(57, '2020-04-27 07:56:35', '::1', '3ato1suh86v099g474r67gs3c2', 1006),
(58, '2020-04-27 08:00:25', '::1', '0s0smnjtrf50tqls86t4leq9j2', 1001),
(59, '2020-04-27 08:12:53', '::1', 'mhg2ln28fd7udndp5u52mfsfal', 1006),
(60, '2020-04-27 08:47:17', '::1', 'e7faft6i5svivmkgbk78t30453', 1008),
(61, '2020-04-27 08:50:44', '::1', 'aip1o7mr0ooh9po4ar9i8k5a8e', 1006),
(62, '2020-04-28 15:33:37', '::1', 'e4acftf5d853u0snem8qptkac1', 1008),
(63, '2020-04-28 15:37:41', '::1', 'e4acftf5d853u0snem8qptkac1', 1008),
(64, '2020-04-28 16:27:54', '::1', 'mt0bre5ffhatutc5cahvlqdonf', 1006),
(65, '2020-04-29 10:18:17', '::1', 'a4okgguud91ndqeijprbec0f21', 1008),
(66, '2020-04-29 10:20:53', '::1', 'a4okgguud91ndqeijprbec0f21', 1008),
(67, '2020-04-29 12:42:41', '::1', 'a4okgguud91ndqeijprbec0f21', 1008),
(68, '2020-04-29 15:37:02', '::1', 'ep0v9eu6jltp2mnlm3s0e27s1b', 1001),
(69, '2020-04-29 15:46:52', '::1', 'ep0v9eu6jltp2mnlm3s0e27s1b', 1009),
(70, '2020-04-29 15:49:16', '::1', 'ep0v9eu6jltp2mnlm3s0e27s1b', 1001),
(71, '2020-04-29 15:54:07', '::1', 'ep0v9eu6jltp2mnlm3s0e27s1b', 1001),
(72, '2020-04-30 05:42:07', '::1', 'i5r6cjnu6l81jnnjnspq35qpim', 1008),
(73, '2020-04-30 13:17:53', '::1', 'i5r6cjnu6l81jnnjnspq35qpim', 1008),
(74, '2020-05-01 12:28:32', '::1', 't5fqdpog0gi11ve127kj6530h1', 1008),
(75, '2020-05-02 04:35:31', '::1', 'hm6116tc61dsiqc67e5uja2d3r', 1008),
(76, '2020-05-02 06:58:07', '::1', 'dbp99qpmu9e5komdpvo2f7cise', 1001),
(77, '2020-05-02 07:11:01', '::1', 'hm6116tc61dsiqc67e5uja2d3r', 1008),
(78, '2020-05-02 10:04:40', '::1', '3goqavdssd5icqttt0ksqpu9ft', 1006),
(79, '2020-05-02 10:24:39', '::1', 'nuid535kg7jqikkvnn1lb8e5db', 1006),
(80, '2020-05-02 11:33:49', '::1', 's4pbmo8aav8muccb7is0jbd9c3', 1010),
(81, '2020-05-03 08:15:39', '::1', '298u9qk0dl07unnonbt73lki39', 1006),
(82, '2020-05-04 15:20:09', '::1', '4vtv3q7q7766rp2f8767lo1kof', 1008),
(83, '2020-05-05 07:38:47', '::1', 'sg80qua8gqj4h8c8qmqtk43c89', 1008),
(84, '2020-05-05 09:56:24', '::1', 'i5vjsc8fd15nhqlc29c4ngh79n', 1006),
(85, '2020-05-05 10:01:03', '::1', 'jkaoij4vagji77vbdbi0r55o4h', 1008),
(86, '2020-05-05 10:05:25', '::1', 'i5vjsc8fd15nhqlc29c4ngh79n', 1006),
(87, '2020-05-05 10:09:37', '::1', 'i5vjsc8fd15nhqlc29c4ngh79n', 1006),
(88, '2020-05-05 12:09:35', '::1', 'a9ibfiehup7h24i79vee5hkg8i', 1001),
(89, '2020-05-05 12:20:53', '::1', 'a9ibfiehup7h24i79vee5hkg8i', 1001),
(90, '2020-05-05 12:25:51', '::1', 'a9ibfiehup7h24i79vee5hkg8i', 1001),
(91, '2020-05-05 12:36:21', '::1', 'i5vjsc8fd15nhqlc29c4ngh79n', 1006),
(92, '2020-05-05 13:00:16', '::1', 'a9ibfiehup7h24i79vee5hkg8i', 1001),
(93, '2020-05-06 16:29:38', '::1', 'af592btdvihc78sjhh3qh8dalu', 1006),
(94, '2020-05-06 16:35:16', '::1', 'af592btdvihc78sjhh3qh8dalu', 1006),
(95, '2020-05-06 16:39:14', '::1', '1inl683icib5mtsopnalkiqm1c', 1008),
(96, '2020-05-07 04:48:20', '::1', 'c9hjpc579uvis0dtds630d3ohf', 1006),
(97, '2020-05-07 04:55:14', '::1', 'iri05hd37qhjhfd92sr9p8amf3', 1001),
(98, '2020-05-07 05:16:32', '::1', 'c9hjpc579uvis0dtds630d3ohf', 1006),
(99, '2020-05-07 05:38:58', '::1', 'c9hjpc579uvis0dtds630d3ohf', 1006),
(100, '2020-05-07 05:53:52', '::1', 'pe60o9q68oif7jo78jis2g0bek', 1013),
(101, '2020-05-07 06:06:21', '::1', 'c9hjpc579uvis0dtds630d3ohf', 1014),
(102, '2020-05-07 06:27:30', '::1', 'c9hjpc579uvis0dtds630d3ohf', 1006),
(103, '2020-05-07 06:27:33', '::1', 'c9hjpc579uvis0dtds630d3ohf', 1006),
(104, '2020-05-07 06:27:36', '::1', 'c9hjpc579uvis0dtds630d3ohf', 1006),
(105, '2020-05-07 06:27:39', '::1', 'c9hjpc579uvis0dtds630d3ohf', 1006),
(106, '2020-05-07 06:27:42', '::1', 'c9hjpc579uvis0dtds630d3ohf', 1006),
(107, '2020-05-08 06:43:58', '::1', 'nuuujntiuerpeart8l8ibj72l8', 1006),
(108, '2020-05-08 06:55:10', '::1', '7ca33ao88kc01neq7t4lv3hqds', 1008),
(109, '2020-05-08 07:09:12', '::1', 'uuv4631lj7d4jqh0mtd8349a6h', 1006),
(110, '2020-05-08 07:13:54', '::1', 'uuv4631lj7d4jqh0mtd8349a6h', 1006),
(111, '2020-05-08 07:31:28', '::1', 'k7rba5ic5asbkuu9vf744nv2l8', 1014),
(112, '2020-05-08 07:35:52', '::1', '1rncb84jtohog61e79d845tqjl', 1001),
(113, '2020-05-08 07:48:30', '::1', 't29mvoprjlr0rlllp7meaeotou', 1015),
(114, '2020-05-08 09:55:39', '::1', 'vh4ir0ccblmo2gj50dos6tk97j', 1006),
(115, '2020-05-08 16:22:16', '::1', 'tcib3l00fh21anvvkmlpuhbqp0', 1008),
(116, '2020-05-08 16:46:07', '::1', '7ca33ao88kc01neq7t4lv3hqds', 1008),
(117, '2020-05-09 13:33:40', '::1', 'h4bsvdr9ncss1785e265ekdt0q', 1008),
(118, '2020-05-10 15:06:36', '::1', 'gm2slik50unfdctvmvsgtrlibf', 1008),
(119, '2020-05-10 16:18:53', '::1', 'gm2slik50unfdctvmvsgtrlibf', 1008),
(120, '2020-05-11 10:36:43', '::1', 'pp0hj3252035qv2rtk3kip15gb', 1004),
(121, '2020-05-11 11:11:11', '::1', '1p05dm596jodbq5r3ck8uqcb5r', 1004),
(122, '2020-05-11 11:11:59', '::1', 'pp0hj3252035qv2rtk3kip15gb', 1004),
(123, '2020-05-11 11:28:08', '::1', '1p05dm596jodbq5r3ck8uqcb5r', 1005),
(124, '2020-05-11 11:32:06', '::1', '8jcggia5qn8u709qedtunl5p1e', 1005),
(125, '2020-05-11 11:34:53', '::1', '1knijmndvjjgcc13ksts3v0jfn', 1006),
(126, '2020-05-11 11:37:37', '::1', '1knijmndvjjgcc13ksts3v0jfn', 1005),
(127, '2020-05-11 11:38:43', '::1', '8jcggia5qn8u709qedtunl5p1e', 1005),
(128, '2020-05-11 12:07:35', '::1', 'ih8t6tkv10d1mrh0sc8f4d9sq8', 1015),
(129, '2020-05-11 12:07:54', '::1', 'ih8t6tkv10d1mrh0sc8f4d9sq8', 1015),
(130, '2020-05-11 12:08:11', '::1', '07n8f8mfbpl7lvv065au4bu4hb', 1006),
(131, '2020-05-11 12:10:02', '::1', '1fm281oapsfvi0btb1d0vrqi0f', 1008),
(132, '2020-05-11 12:11:24', '::1', '07n8f8mfbpl7lvv065au4bu4hb', 1006),
(133, '2020-05-11 12:12:43', '::1', 'pp0hj3252035qv2rtk3kip15gb', 1004),
(134, '2020-05-11 12:16:20', '::1', 'pp0hj3252035qv2rtk3kip15gb', 1008),
(135, '2020-05-11 12:17:48', '::1', 'pp0hj3252035qv2rtk3kip15gb', 1006),
(136, '2020-05-11 12:19:50', '::1', '07n8f8mfbpl7lvv065au4bu4hb', 1006),
(137, '2020-05-12 05:39:48', '::1', '1jj9fv44941h79pt6frr9h1ocq', 1006);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_details`
--
ALTER TABLE `admin_details`
  ADD PRIMARY KEY (`unique_id`);

--
-- Indexes for table `admin_log`
--
ALTER TABLE `admin_log`
  ADD PRIMARY KEY (`serial_no`),
  ADD KEY `admin_unique_id` (`admin_unique_id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`serial_no`),
  ADD KEY `bookings_ibfk_1` (`unique_tripID`),
  ADD KEY `bookings_ibfk_2` (`user_uniqueID`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`serial_no`);

--
-- Indexes for table `route`
--
ALTER TABLE `route`
  ADD PRIMARY KEY (`route_id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`serial_no`),
  ADD KEY `route_id` (`route_id`);

--
-- Indexes for table `stu_details`
--
ALTER TABLE `stu_details`
  ADD PRIMARY KEY (`unique_id`);

--
-- Indexes for table `trip_details`
--
ALTER TABLE `trip_details`
  ADD PRIMARY KEY (`Unique_tripID`),
  ADD KEY `route_id` (`route_id`);

--
-- Indexes for table `user_log`
--
ALTER TABLE `user_log`
  ADD PRIMARY KEY (`serial_no`),
  ADD KEY `user_unique_id` (`user_unique_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_details`
--
ALTER TABLE `admin_details`
  MODIFY `unique_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `admin_log`
--
ALTER TABLE `admin_log`
  MODIFY `serial_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `serial_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `serial_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `route`
--
ALTER TABLE `route`
  MODIFY `route_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `serial_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `stu_details`
--
ALTER TABLE `stu_details`
  MODIFY `unique_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1016;

--
-- AUTO_INCREMENT for table `trip_details`
--
ALTER TABLE `trip_details`
  MODIFY `Unique_tripID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user_log`
--
ALTER TABLE `user_log`
  MODIFY `serial_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_log`
--
ALTER TABLE `admin_log`
  ADD CONSTRAINT `admin_log_ibfk_1` FOREIGN KEY (`admin_unique_id`) REFERENCES `admin_details` (`unique_id`);

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`unique_tripID`) REFERENCES `trip_details` (`Unique_tripID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `bookings_ibfk_2` FOREIGN KEY (`user_uniqueID`) REFERENCES `stu_details` (`unique_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `schedule_ibfk_1` FOREIGN KEY (`route_id`) REFERENCES `route` (`route_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trip_details`
--
ALTER TABLE `trip_details`
  ADD CONSTRAINT `trip_details_ibfk_1` FOREIGN KEY (`route_id`) REFERENCES `route` (`route_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_log`
--
ALTER TABLE `user_log`
  ADD CONSTRAINT `user_log_ibfk_1` FOREIGN KEY (`user_unique_id`) REFERENCES `stu_details` (`unique_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
