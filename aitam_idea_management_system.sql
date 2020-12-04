-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2020 at 12:35 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aitam_idea_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `applicant_details`
--

CREATE TABLE `applicant_details` (
  `sno` int(11) NOT NULL,
  `first_name` varchar(225) NOT NULL,
  `last_name` varchar(225) NOT NULL,
  `id_number` varchar(100) NOT NULL,
  `contact_number` varchar(14) NOT NULL,
  `email` varchar(50) NOT NULL,
  `applicant_type` varchar(25) NOT NULL,
  `branch` varchar(10) NOT NULL DEFAULT 'faculty',
  `year` varchar(10) NOT NULL,
  `section` varchar(10) NOT NULL DEFAULT 'faculty',
  `proposal_id` varchar(50) NOT NULL,
  `datm` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `applicant_details`
--

INSERT INTO `applicant_details` (`sno`, `first_name`, `last_name`, `id_number`, `contact_number`, `email`, `applicant_type`, `branch`, `year`, `section`, `proposal_id`, `datm`) VALUES
(1, 'GOTETI JAYACHANDRA MOHAN LAKSHMI', 'MURTHY', 'xxxxxxxx', '+919491694195', 'gotetijayachandra@gmail.com', 'Student', 'Select', 'Student', 'Student', 'AIM0KXwZDM', '2020-07-13 10:34:52'),
(2, 'GOTETI JAYACHANDRA MOHAN LAKSHMI', 'MURTHY', 'xxxxxxxx', '+919491694195', 'gotetijayachandra@gmail.com', 'Student', 'Select', 'Student', 'Student', 'AIM0Dn4IW7', '2020-07-13 10:35:28'),
(3, 'GOTETI JAYACHANDRA MOHAN LAKSHMI', 'MURTHY', 'xxxxxxxx', '+919491694195', 'gotetijayachandra@gmail.com', 'Faculty', 'cse', 'Faculty', 'Faculty', 'AIM0IHZRgL', '2020-07-13 12:25:18'),
(4, 'abhi', 'MURTHY', 'xxxxxxxx', '9100269303', 'gotetijayachandra@gmail.com', 'Student', 'Select', 'Student', 'Student', 'AIM0JXZUWH', '2020-07-14 11:24:15'),
(5, 'GOTETI JAYACHANDRA MOHAN LAKSHMI', 'MURTHY', 'xxxxxxxx', '+919491694195', 'gotetijayachandra@gmail.com', 'Student', 'ece', '1st', 'A', 'AIM0xVNJrR', '2020-07-14 11:27:46'),
(6, 'GOTETI JAYACHANDRA MOHAN LAKSHMI', 'MURTHY', 'xxxxxxxx', '+919491694195', 'gotetijayachandra@gmail.com', 'Faculty', 'cse', 'Faculty', 'Faculty', 'AIM03pxWG1', '2020-07-14 11:34:52');

-- --------------------------------------------------------

--
-- Table structure for table `project_proposals`
--

CREATE TABLE `project_proposals` (
  `sno` int(11) NOT NULL,
  `project_title` varchar(225) NOT NULL,
  `estimated_amount` varchar(11) NOT NULL,
  `project_description` longtext NOT NULL,
  `priject_file` varchar(50) NOT NULL,
  `proposal_id` varchar(50) NOT NULL,
  `branch` varchar(10) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'Pending at department',
  `department_remarks` mediumtext DEFAULT NULL,
  `central_remarks` mediumtext DEFAULT NULL,
  `approved_amount` varchar(15) NOT NULL,
  `datm` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `project_proposals`
--

INSERT INTO `project_proposals` (`sno`, `project_title`, `estimated_amount`, `project_description`, `priject_file`, `proposal_id`, `branch`, `status`, `department_remarks`, `central_remarks`, `approved_amount`, `datm`) VALUES
(1, 'E-out pass system', '1000', 'nnnnnnnnnnnnnnnnnn', 'AIM0KXwZDM.pdf', 'AIM0KXwZDM', 'cse', 'Project is approved for funding.', 'all thing are good', 'accepted all are ok', '5', '2020-07-14 12:08:00'),
(2, 'E-out pass system', '1000', 'nnnnnnnnnnnnnnnnnn', 'AIM0Dn4IW7.pdf', 'AIM0Dn4IW7', 'cse', 'Rejected at central committee.', 'all ok', 'large amount', '', '2020-07-14 19:10:43'),
(3, 'E-out pass system', '1000', '1234567890', 'AIM0IHZRgL.pdf', 'AIM0IHZRgL', 'cse', 'Accepted at department and pendging at central committee.', 'all thing are good', '', '', '2020-07-14 19:35:19'),
(4, 'E-out pass system', '1000', 'Hon’Ble Director, AITAM instructed the undersigned to constitute an expert committee to examine the AIM Policy\r\nproposal No.___________ submitted by Mr./ Mrs./Miss.______________________________ and team from the\r\nDept. (s) ___________________________ through SAC for novelty and sustainability of the idea.\r\nHence, the undersigned is pleased to constitute the following committee with a request to give their ', 'AIM0JXZUWH.pdf', 'AIM0JXZUWH', 'cse', 'Project is approved for funding.', 'all ok', 'all thing are good', '1122', '2020-07-14 19:57:55'),
(5, 'E-out pass system', '1000', 'ggg', 'AIM0xVNJrR.pdf', 'AIM0xVNJrR', 'ece', 'Pending at department', '-', '-', '', '2020-07-14 11:27:46'),
(6, 'E-out pass system', '1000', 'hhh', 'AIM03pxWG1.pdf', 'AIM03pxWG1', 'cse', 'Project is approved for funding.', 'all thing are good', 'accepted all are ok', '12000', '2020-07-14 19:11:14');

-- --------------------------------------------------------

--
-- Table structure for table `team_details`
--

CREATE TABLE `team_details` (
  `proposal_id` varchar(225) NOT NULL,
  `name` varchar(225) NOT NULL,
  `year` varchar(10) NOT NULL,
  `branch` varchar(10) NOT NULL,
  `id_number` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `team_details`
--

INSERT INTO `team_details` (`proposal_id`, `name`, `year`, `branch`, `id_number`) VALUES
('AIM0JXZUWH', 'GOTETI JAYACHANDRA MOHAN LAKSHMI NARASIMHA MURTHY', '1', 'CSE', '1'),
('AIM0JXZUWH', 'GOTETI JAYACHANDRA MOHAN LAKSHMI NARASIMHA MURTHY', '2', 'CSE', '2'),
('AIM0JXZUWH', 'GOTETI JAYACHANDRA MOHAN LAKSHMI NARASIMHA MURTHY', '3', 'CSE', '3'),
('AIM0JXZUWH', 'GOTETI JAYACHANDRA MOHAN LAKSHMI NARASIMHA MURTHY', '2', 'CIVIL', '4'),
('AIM0JXZUWH', 'GOTETI JAYACHANDRA MOHAN LAKSHMI NARASIMHA MURTHY', '1', 'CSE', '5');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `sno` int(11) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `user_type` varchar(225) NOT NULL,
  `name` varchar(225) NOT NULL,
  `branch` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` varchar(14) NOT NULL,
  `datm` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`sno`, `username`, `password`, `user_type`, `name`, `branch`, `email`, `contact`, `datm`) VALUES
(1, 'admin@cse', 'admin@cse', 'department_admin', 'admin@cse', 'cse', 'admincse@gmail.com', 'XXXXXXXXXX', '2020-07-14 15:19:19'),
(2, 'admin@ece', 'admin@ece', 'department_admin', 'admin@ece', 'ece', 'adminece@gmail.com', 'XXXXXXXXXX', '2020-07-14 15:14:12'),
(3, 'admin@eee', 'admin@eee', 'department_admin', 'admin@eee', 'eee', 'admineee@gmail.com', 'XXXXXXXXXX', '2020-07-14 15:14:03'),
(4, 'admin@it', 'admin@it', 'department_admin', 'admin@it', 'it', 'adminit@gmail.com', 'XXXXXXXXXX', '2020-07-14 15:13:20'),
(5, 'admin@civil', 'admin@civil', 'department_admin', 'admin@civil', 'civil', 'admincivil@gmail.com', 'XXXXXXXXXX', '2020-07-14 15:13:20'),
(6, 'admin@mech', 'admin@mech', 'department_admin', 'admin@mech', 'mech', 'adminmech@gmail.com', 'XXXXXXXXXX', '2020-07-14 15:14:17'),
(7, 'centraladmin@cse', 'centraladmin@cse', 'central_community', 'admin@cse', 'cse', 'admincse@gmail.com', 'XXXXXXXXXX', '2020-07-14 15:22:42'),
(8, 'centraladmin@ece', 'centraladmin@ece', 'central_community', 'admin@ece', 'ece', 'adminece@gmail.com', 'XXXXXXXXXX', '2020-07-14 15:22:49'),
(9, 'centraladmin@eee', 'centraladmin@eee', 'central_community', 'admin@eee', 'eee', 'admineee@gmail.com', 'XXXXXXXXXX', '2020-07-14 15:22:55'),
(10, 'centraladmin@it', 'centraladmin@it', 'central_community', 'admin@it', 'it', 'adminit@gmail.com', 'XXXXXXXXXX', '2020-07-14 15:23:02'),
(11, 'centraladmin@civil', 'centraladmin@civil', 'central_community', 'admin@civil', 'civil', 'admincivil@gmail.com', 'XXXXXXXXXX', '2020-07-14 15:23:09'),
(12, 'centraladmin@mech', 'centraladmin@mech', 'central_community', 'admin@mech', 'mech', 'adminmech@gmail.com', 'XXXXXXXXXX', '2020-07-14 15:23:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applicant_details`
--
ALTER TABLE `applicant_details`
  ADD PRIMARY KEY (`sno`),
  ADD UNIQUE KEY `proposal_id` (`proposal_id`);

--
-- Indexes for table `project_proposals`
--
ALTER TABLE `project_proposals`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applicant_details`
--
ALTER TABLE `applicant_details`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `project_proposals`
--
ALTER TABLE `project_proposals`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
