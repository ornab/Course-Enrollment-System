-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2016 at 08:51 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.5.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ors`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts_excel_import`
--

CREATE TABLE `accounts_excel_import` (
  `accounts_id` int(11) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `request` int(11) NOT NULL,
  `permission` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `accounts_panel`
--

CREATE TABLE `accounts_panel` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `accounted_id` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts_panel`
--

INSERT INTO `accounts_panel` (`id`, `name`, `accounted_id`, `password`) VALUES
(1, 'abdul Khalek', 'Acc', '123');

-- --------------------------------------------------------

--
-- Table structure for table `addmission`
--

CREATE TABLE `addmission` (
  `student_id` int(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `admission_fee` int(11) NOT NULL,
  `batch` int(11) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `mobile_no` int(11) NOT NULL,
  `trimister` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `permission` int(11) NOT NULL,
  `co_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `addmission`
--

INSERT INTO `addmission` (`student_id`, `password`, `date`, `admission_fee`, `batch`, `dept_id`, `mobile_no`, `trimister`, `name`, `status`, `permission`, `co_id`) VALUES
(1, '123', '2016-08-22 06:10:13', 15000, 1, 5, 1111, 1, 'Ali Ahmed', 0, 0, 6),
(2, '123', '2016-08-22 06:10:30', 15000, 1, 5, 1111, 1, 'Abdul kader', 0, 0, 6),
(3, '123', '2016-08-22 06:10:46', 15000, 2, 5, 1111, 1, 'Nazmul', 0, 0, 7),
(4, '123', '2016-08-22 06:11:02', 15000, 2, 5, 1111, 1, 'kaium', 0, 0, 7);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `dept_id` int(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `status` int(11) NOT NULL,
  `admin_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `dept_id`, `password`, `status`, `admin_id`) VALUES
(7, 'MS.FUZAILA SAHANAZ', 5, '123', 0, 'hasan'),
(8, 'MR.SAYED ANAYET KARIM', 4, '123', 0, 'SAK'),
(9, 'MD.SAHADAT HOSSAIN', 6, '123', 0, 'MSH'),
(10, 'MSB', 7, '123', 0, 'TEXT00123'),
(11, 'yasin kabir', 5, '123', 0, 'YASIN1'),
(12, 'hasnat riaz', 4, '123', 0, 'HASNAT'),
(13, 'nahida akter', 8, '123', 0, 'NAHIDA2');

-- --------------------------------------------------------

--
-- Table structure for table `admindetails`
--

CREATE TABLE `admindetails` (
  `admin_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phnnumber` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admindetails`
--

INSERT INTO `admindetails` (`admin_id`, `name`, `email`, `phnnumber`, `image`) VALUES
(1, 'hasan zamil', 'hasan@gmail.com', '1268632', '1479367926pp.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `admin_details`
--

CREATE TABLE `admin_details` (
  `master_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_details`
--

INSERT INTO `admin_details` (`master_id`, `email`, `phone`, `image`) VALUES
(7, 'mfs@gmail.com', 98765432, '1470085726images.jpg'),
(8, 'SAK@HR', 1231234, '1470086601SignUp.jpg'),
(9, 's@gmail.com', 68641, '147935509131.jpg'),
(8, 'jkh@gmail.com', 13213, '147936093512821370_960183754036416_1728010063602160236_n.jpg'),
(8, 'beauty@gmail.com', 2147483647, '1479361194beauty.jpg'),
(8, '', 0, '147936140313051492_984846061570185_3559295428772034200_n.jpg'),
(8, '', 0, '147936182831.jpg'),
(8, '', 0, '');

-- --------------------------------------------------------

--
-- Stand-in structure for view `admission_co_id_view`
--
CREATE TABLE `admission_co_id_view` (
`student_id` varchar(62)
,`admission_fee` int(11)
,`batch` int(11)
,`dept_id` int(11)
,`mobile` int(11)
,`trimister` int(11)
,`name` varchar(255)
,`department` varchar(30)
,`co_id` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `admission_view`
--
CREATE TABLE `admission_view` (
`student_id` varchar(62)
,`password` varchar(255)
,`admission_fee` int(11)
,`batch` int(11)
,`dept_id` int(11)
,`mobile` int(11)
,`trimister` int(11)
,`name` varchar(255)
,`department` varchar(30)
);

-- --------------------------------------------------------

--
-- Table structure for table `batch`
--

CREATE TABLE `batch` (
  `id` int(11) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `batch`
--

INSERT INTO `batch` (`id`, `dept_id`, `number`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 2, 2),
(5, 4, 1),
(6, 4, 2),
(7, 5, 1),
(8, 5, 2),
(9, 6, 1),
(10, 6, 2),
(11, 4, 3),
(12, 5, 3),
(14, 4, 4),
(15, 5, 4),
(16, 7, 1),
(17, 4, 5),
(18, 4, 5),
(19, 5, 5),
(20, 5, 5),
(21, 5, 4),
(22, 4, 1),
(23, 4, 8),
(24, 8, 4);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `c_code` varchar(100) NOT NULL,
  `c_title` varchar(100) NOT NULL,
  `credit` varchar(255) NOT NULL,
  `dept_id` int(50) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `trimister` int(11) NOT NULL,
  `per` int(11) NOT NULL DEFAULT '1200'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `c_code`, `c_title`, `credit`, `dept_id`, `status`, `trimister`, `per`) VALUES
(2, 'CSE 112', 'COMPUTER FUNDAMENTAL AND PROGRAMMING TECH.SESSIONAL', '1.5', 5, NULL, 1, 1200),
(3, 'ENG 100', 'ENGLISH FUNDAMENTAL', '3', 5, NULL, 1, 1200),
(5, 'CSE 113', 'ELECTRICAL ENGINEERING', '3', 5, NULL, 2, 1200),
(6, 'CSE 121', 'STRUCTURED PROGRAMMING LANGUAGE ', '3', 5, NULL, 2, 1200),
(7, 'CSE 122', 'STRUCTURED PROGRAMMING LANGUAGE SESSIONAL', '1.5', 5, NULL, 2, 1200),
(8, 'CSE 123', 'ELECTRONICS', '3', 5, NULL, 2, 1200),
(9, 'CSE 211', 'OBJECT ORIENTED PROGRAMMING', '3', 5, NULL, 3, 1200),
(10, 'CSE 212', 'OBJECT ORIENTED PROGRAMMING SESSIONAL', '1.5', 5, NULL, 3, 1200),
(11, 'CSE 217', 'DATA STRUCTURE', '3', 5, NULL, 3, 1200),
(12, 'CSE 218', 'DATA STRUCTURE SESSIONAL', '1.5', 5, NULL, 3, 1200),
(13, 'CSE 135', 'DISCREATE MATHMATICS', '3', 5, NULL, 3, 1200),
(14, 'CSE 213', 'DLD', '3', 5, NULL, 4, 1200),
(15, 'CSE 214', 'DLD SESSIONAL', '1.5', 5, NULL, 4, 1200),
(16, 'STAT 235', 'STATISTICS', '3', 5, NULL, 4, 1200),
(17, 'CSE 227', 'ALGORITHM', '3', 5, NULL, 5, 1200),
(18, 'CSE 228', 'ALGORITHM SESSIONAL', '1.5', 5, NULL, 5, 1200),
(19, 'CSE 233', 'COMPUTER ORGANIZATION & ARCHITECHTURE ', '3', 5, NULL, 5, 1200),
(20, 'CSE 234', 'COMPUTER ORGANIZATION & ARCHITECHTURE SESSIONAL', '1.5', 5, NULL, 5, 1200),
(21, 'CSE 231', 'OPERATING SYSTEM CONCEPTS', '3', 5, NULL, 6, 1200),
(22, 'CSE 232', 'OPERATING SYSTEM CONCEPTS SESSIONAL', '1.5', 5, NULL, 6, 1200),
(23, 'CSE 317', 'THEORY OF COMPUTING', '3', 5, NULL, 6, 1200),
(24, 'CSE 413', 'MICROPROCESSOR & ASSEMBLY PROGRAMMING', '3', 5, NULL, 6, 1200),
(25, 'CSE 414', 'MICROPROCESSOR & ASSEMBLY PROGRAMMING SESSIONAL', '1.5', 5, NULL, 6, 1200),
(26, 'CSE 221', 'DATABASE MANAGEMENT SYSTEM', '3', 5, NULL, 7, 1200),
(27, 'CSE 222', 'DATABASE MANAGEMENT SYSTEM SESSIONAL', '1.5', 5, NULL, 7, 1200),
(28, 'CSE 321', 'SOFTWARE ENGINEERING', '3', 5, NULL, 7, 1200),
(29, 'CSE 322', 'SOFTWARE ENGINEERING SESSIONAL', '1.5', 5, NULL, 7, 1200),
(30, 'CSE 333', 'COMPUTER PERIPHERALS & INTERFACING', '3', 5, NULL, 7, 1200),
(31, 'CSE 421', 'COMPUTER GRAPHICS', '3', 5, NULL, 8, 1200),
(32, 'CSE 422', 'COMPUTER GRAPHICS SESSIONAL', '1.5', 5, NULL, 8, 1200),
(33, 'CSE 435', 'DATA COMMUNICATION', '3', 5, NULL, 8, 1200),
(34, 'CSE 323', 'COMPUTER NETWORK', '3', 5, NULL, 9, 1200),
(35, 'CSE 324', 'COMPUTER NETWORK SESSIONAL', '1.5', 5, NULL, 9, 1200),
(36, 'CSE 331', 'PATTERN RECOGNITION', '3', 5, NULL, 9, 1200),
(37, 'CSE 332', 'PATTERN RECOGNITION SESSIONAL', '1.5', 5, NULL, 9, 1200),
(38, 'CSE 411', 'COMPILER', '3', 5, NULL, 9, 1200),
(39, 'CSE 412', 'COMPILER SESSIONAL', '1.5', 5, NULL, 9, 1200),
(40, 'CSE 450', 'SIMULATION & MODELLING', '3', 5, NULL, 10, 1200),
(41, 'CSE 451', 'SIMULATION & MODELLING SESSIONAL', '1.5', 5, NULL, 10, 1200),
(42, 'CSE 460', 'ARTIFICIAL INTELLIGENCE', '3', 5, NULL, 10, 1200),
(43, 'CSE 461', 'ARTIFICIAL INTELLIGENCE SESSIONAL', '1.5', 5, NULL, 10, 1200),
(44, 'CSE987', 'tset', '3', 6, NULL, 1, 1200),
(46, 'CSTE10', 'Java', '3.00', 5, NULL, 2, 1200),
(47, 'CSTE988', 'C++', '3.00', 5, NULL, 1, 1200),
(48, 'GHG', 'ghgjg', '3.00', 6, NULL, 1, 1200);

-- --------------------------------------------------------

--
-- Table structure for table `co_odinator`
--

CREATE TABLE `co_odinator` (
  `id` int(11) NOT NULL,
  `co_id` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `batch_id` int(11) DEFAULT NULL,
  `number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `co_odinator`
--

INSERT INTO `co_odinator` (`id`, `co_id`, `name`, `password`, `dept_id`, `batch_id`, `number`) VALUES
(1, 'MSD123', 'sss', '123', 2, NULL, 1),
(2, 'DDD123', 'DDDD', '123', 1, NULL, 1),
(5, 'MSD123', 'mmm', '123', 6, NULL, 1),
(6, 'NKN', 'NAYAN KANTI NATH', '123', 5, NULL, 1),
(7, 'MMB', 'MS.MONOARA BEGUM', '123', 5, NULL, 2),
(9, 'MIA', 'MD.IFTEKHARUL AZIM', '123', 4, NULL, 1),
(10, 'MTH', 'MD.TANVIR HOSSAIN', '123', 4, NULL, 2),
(11, 'MJM', 'MD.JUEL MAHMUD', '123', 4, NULL, 3),
(12, 'MSD', 'sowmitra das', '123', 5, NULL, 4),
(13, 'NKN', 'Nayan Kumar Nath', '123', 5, NULL, 1),
(14, 'javed1', 'javed hossain', '123', 6, NULL, 2),
(15, 'javed1', 'javed hossain', '123', 4, NULL, 5);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `name`, `status`) VALUES
(4, 'FIMS', 0),
(5, 'CSE', 0),
(8, 'ICT', 0);

-- --------------------------------------------------------

--
-- Table structure for table `enroll_details`
--

CREATE TABLE `enroll_details` (
  `master_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enroll_details`
--

INSERT INTO `enroll_details` (`master_id`, `course_id`, `amount`, `status`) VALUES
(1, 1, 3600, 0),
(1, 2, 1800, 0),
(1, 3, 3600, 0),
(2, 1, 3600, 0),
(2, 2, 1800, 0),
(2, 3, 3600, 0),
(3, 1, 3600, 0),
(3, 2, 1800, 0),
(3, 3, 3600, 0),
(4, 1, 3600, 0),
(4, 2, 1800, 0),
(4, 3, 3600, 0);

-- --------------------------------------------------------

--
-- Table structure for table `enroll_master`
--

CREATE TABLE `enroll_master` (
  `id` int(11) NOT NULL,
  `std_id` int(11) NOT NULL,
  `trimister` int(11) NOT NULL,
  `total_credit` float NOT NULL,
  `total_amount` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enroll_master`
--

INSERT INTO `enroll_master` (`id`, `std_id`, `trimister`, `total_credit`, `total_amount`, `status`) VALUES
(1, 1, 1, 7.5, 9000, 0),
(2, 2, 1, 7.5, 9000, 0),
(3, 3, 1, 7.5, 9000, 0),
(4, 4, 1, 7.5, 9000, 0);

-- --------------------------------------------------------

--
-- Stand-in structure for view `enroll_master_admission_view`
--
CREATE TABLE `enroll_master_admission_view` (
`id` int(11)
,`std_id` int(11)
,`student_id` varchar(58)
,`trimister` int(11)
,`total_credit` float
,`total_amount` int(11)
,`status` int(11)
,`admission_fee` int(11)
,`dept_id` int(11)
,`name` varchar(255)
,`batch` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `offer_course`
--

CREATE TABLE `offer_course` (
  `id` int(11) NOT NULL,
  `course_id` varchar(255) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `offer_course`
--

INSERT INTO `offer_course` (`id`, `course_id`, `student_id`, `status`) VALUES
(2, '6,7,8', '8,9,10', 0);

-- --------------------------------------------------------

--
-- Table structure for table `registered_course_details`
--

CREATE TABLE `registered_course_details` (
  `master_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registered_course_details`
--

INSERT INTO `registered_course_details` (`master_id`, `course_id`, `status`) VALUES
(1, 1, 1),
(1, 2, 1),
(1, 3, 1),
(2, 1, 1),
(2, 2, 1),
(2, 3, 1),
(3, 1, 1),
(3, 2, 1),
(3, 3, 1),
(4, 1, 1),
(4, 2, 1),
(4, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `registered_course_master`
--

CREATE TABLE `registered_course_master` (
  `id` int(11) NOT NULL,
  `std_id` varchar(255) NOT NULL,
  `trimster` int(11) NOT NULL,
  `total_credit` float NOT NULL,
  `status` int(11) NOT NULL,
  `co_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registered_course_master`
--

INSERT INTO `registered_course_master` (`id`, `std_id`, `trimster`, `total_credit`, `status`, `co_id`) VALUES
(1, '1', 1, 7.5, 1, 6),
(2, '2', 1, 7.5, 1, 6),
(3, '3', 1, 7.5, 1, 7),
(4, '4', 1, 7.5, 1, 7);

-- --------------------------------------------------------

--
-- Stand-in structure for view `registered_course_master_view`
--
CREATE TABLE `registered_course_master_view` (
`id` int(11)
,`student_id` varchar(62)
,`name` varchar(255)
,`department` varchar(30)
,`trimster` int(11)
,`total_credit` float
,`status` varchar(13)
,`co_id` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `id` int(15) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `date_of_request` varchar(255) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `feedback` varchar(255) NOT NULL,
  `status` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_details`
--

CREATE TABLE `student_details` (
  `master_id` int(11) NOT NULL,
  `co_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_details`
--

INSERT INTO `student_details` (`master_id`, `co_id`) VALUES
(1, 6),
(2, 6),
(3, 7),
(4, 7),
(5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `student_master`
--

CREATE TABLE `student_master` (
  `id` int(11) NOT NULL,
  `std_id` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_master`
--

INSERT INTO `student_master` (`id`, `std_id`, `name`, `password`, `dept_id`, `batch`) VALUES
(1, 'koli', 'sazeda', '123', 5, 1),
(2, '2', 'Abdul kader', '123', 5, 1),
(3, '3', 'Nazmul', '123', 5, 2),
(4, '4', 'kaium', '123', 5, 2),
(5, 'zamil', 'hasan', '123', 5, 5);

-- --------------------------------------------------------

--
-- Stand-in structure for view `student_master_view`
--
CREATE TABLE `student_master_view` (
`id` int(11)
,`student_id` varchar(77)
,`batch` int(11)
,`password` varchar(255)
,`dept_id` int(11)
,`name` varchar(30)
,`department` varchar(30)
);

-- --------------------------------------------------------

--
-- Table structure for table `superadmin`
--

CREATE TABLE `superadmin` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `superadmin`
--

INSERT INTO `superadmin` (`id`, `username`, `password`, `status`) VALUES
(2, 'sazeda', 'admin', 0);

-- --------------------------------------------------------

--
-- Table structure for table `superadmindetails`
--

CREATE TABLE `superadmindetails` (
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phnnumber` int(20) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `superadmindetails`
--

INSERT INTO `superadmindetails` (`name`, `email`, `phnnumber`, `image`) VALUES
('sazeda1', 'ssazeda@gmail.com', 1234, '147936169814686122_1116605171721737_1570439782_n.jpg');

-- --------------------------------------------------------

--
-- Structure for view `admission_co_id_view`
--
DROP TABLE IF EXISTS `admission_co_id_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `admission_co_id_view`  AS  select concat(`b`.`name`,'00',`a`.`batch`,'0500',`a`.`student_id`) AS `student_id`,`a`.`admission_fee` AS `admission_fee`,`a`.`batch` AS `batch`,`a`.`dept_id` AS `dept_id`,`a`.`mobile_no` AS `mobile`,`a`.`trimister` AS `trimister`,`a`.`name` AS `name`,`b`.`name` AS `department`,`c`.`id` AS `co_id` from ((`addmission` `a` join `department` `b`) join `co_odinator` `c`) where ((`a`.`dept_id` = `b`.`id`) and (`a`.`dept_id` = `c`.`dept_id`) and (`a`.`batch` = `c`.`number`)) ;

-- --------------------------------------------------------

--
-- Structure for view `admission_view`
--
DROP TABLE IF EXISTS `admission_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `admission_view`  AS  select concat(`b`.`name`,'00',`a`.`batch`,'0500',`a`.`student_id`) AS `student_id`,`a`.`password` AS `password`,`a`.`admission_fee` AS `admission_fee`,`a`.`batch` AS `batch`,`a`.`dept_id` AS `dept_id`,`a`.`mobile_no` AS `mobile`,`a`.`trimister` AS `trimister`,`a`.`name` AS `name`,`b`.`name` AS `department` from (`addmission` `a` join `department` `b`) where (`a`.`dept_id` = `b`.`id`) ;

-- --------------------------------------------------------

--
-- Structure for view `enroll_master_admission_view`
--
DROP TABLE IF EXISTS `enroll_master_admission_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `enroll_master_admission_view`  AS  select `a`.`id` AS `id`,`a`.`std_id` AS `std_id`,concat(`c`.`name`,'00',`b`.`batch`,'0500',`a`.`std_id`) AS `student_id`,`a`.`trimister` AS `trimister`,`a`.`total_credit` AS `total_credit`,`a`.`total_amount` AS `total_amount`,`a`.`status` AS `status`,`b`.`admission_fee` AS `admission_fee`,`b`.`dept_id` AS `dept_id`,`b`.`name` AS `name`,`b`.`batch` AS `batch` from ((`enroll_master` `a` join `addmission` `b`) join `department` `c`) where ((`b`.`student_id` = `a`.`std_id`) and (`c`.`id` = `b`.`dept_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `registered_course_master_view`
--
DROP TABLE IF EXISTS `registered_course_master_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `registered_course_master_view`  AS  select `c`.`id` AS `id`,concat(`b`.`name`,'00',`a`.`batch`,'0500',`a`.`student_id`) AS `student_id`,`a`.`name` AS `name`,`b`.`name` AS `department`,`c`.`trimster` AS `trimster`,`c`.`total_credit` AS `total_credit`,(case `c`.`status` when 1 then 'Registered' else 'Not registerd' end) AS `status`,`c`.`co_id` AS `co_id` from ((`addmission` `a` join `department` `b`) join `registered_course_master` `c`) where ((`a`.`dept_id` = `b`.`id`) and (`a`.`student_id` = `c`.`std_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `student_master_view`
--
DROP TABLE IF EXISTS `student_master_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `student_master_view`  AS  select `a`.`id` AS `id`,concat(`b`.`name`,'00',`a`.`batch`,'0500',`a`.`std_id`) AS `student_id`,`a`.`batch` AS `batch`,`a`.`password` AS `password`,`a`.`dept_id` AS `dept_id`,`a`.`name` AS `name`,`b`.`name` AS `department` from (`student_master` `a` join `department` `b`) where (`a`.`dept_id` = `b`.`id`) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts_excel_import`
--
ALTER TABLE `accounts_excel_import`
  ADD PRIMARY KEY (`accounts_id`);

--
-- Indexes for table `accounts_panel`
--
ALTER TABLE `accounts_panel`
  ADD PRIMARY KEY (`id`,`accounted_id`);

--
-- Indexes for table `addmission`
--
ALTER TABLE `addmission`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_id` (`admin_id`);

--
-- Indexes for table `admindetails`
--
ALTER TABLE `admindetails`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `batch`
--
ALTER TABLE `batch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `co_odinator`
--
ALTER TABLE `co_odinator`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enroll_master`
--
ALTER TABLE `enroll_master`
  ADD PRIMARY KEY (`id`,`std_id`);

--
-- Indexes for table `offer_course`
--
ALTER TABLE `offer_course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registered_course_details`
--
ALTER TABLE `registered_course_details`
  ADD KEY `master_id` (`master_id`,`course_id`);

--
-- Indexes for table `registered_course_master`
--
ALTER TABLE `registered_course_master`
  ADD PRIMARY KEY (`id`),
  ADD KEY `std_id` (`std_id`),
  ADD KEY `co_id` (`co_id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_details`
--
ALTER TABLE `student_details`
  ADD PRIMARY KEY (`master_id`);

--
-- Indexes for table `student_master`
--
ALTER TABLE `student_master`
  ADD PRIMARY KEY (`id`,`std_id`),
  ADD UNIQUE KEY `std_id` (`std_id`);

--
-- Indexes for table `superadmin`
--
ALTER TABLE `superadmin`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts_excel_import`
--
ALTER TABLE `accounts_excel_import`
  MODIFY `accounts_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `accounts_panel`
--
ALTER TABLE `accounts_panel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `addmission`
--
ALTER TABLE `addmission`
  MODIFY `student_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `admindetails`
--
ALTER TABLE `admindetails`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `batch`
--
ALTER TABLE `batch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `co_odinator`
--
ALTER TABLE `co_odinator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `enroll_master`
--
ALTER TABLE `enroll_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `offer_course`
--
ALTER TABLE `offer_course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `registered_course_master`
--
ALTER TABLE `registered_course_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `student_master`
--
ALTER TABLE `student_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `superadmin`
--
ALTER TABLE `superadmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
