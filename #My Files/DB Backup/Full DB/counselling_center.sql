-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2022 at 10:04 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.3.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `counselling_center`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `idappointment` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `master_user_idmaster_user` int(11) NOT NULL,
  `time_slot_idtime_slot` int(11) NOT NULL,
  `counsellor_id` int(11) NOT NULL,
  `category_idcategory` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`idappointment`, `date`, `status`, `created_at`, `updated_at`, `amount`, `master_user_idmaster_user`, `time_slot_idtime_slot`, `counsellor_id`, `category_idcategory`) VALUES
(120, '2022-05-31', 1, '2022-05-30 19:51:25', '2022-05-30 19:56:23', 2000, 63, 1, 65, 43),
(121, '2022-05-31', 1, '2022-05-30 19:51:49', '2022-05-30 19:56:26', 1500, 63, 2, 65, 44),
(122, '2022-05-31', 1, '2022-05-30 19:53:21', '2022-05-30 19:56:29', 1500, 72, 3, 65, 45),
(123, '2022-05-31', 1, '2022-05-30 19:54:01', '2022-05-30 19:56:33', 1500, 73, 4, 65, 46),
(124, '2022-06-13', 0, '2022-05-30 19:56:56', '2022-05-30 19:56:56', 1500, 63, 1, 65, 44),
(125, '2022-06-12', 0, '2022-05-30 19:57:17', '2022-05-30 19:57:17', 1500, 63, 1, 65, 46),
(126, '2022-06-11', 2, '2022-05-30 19:57:34', '2022-05-30 19:58:45', 1500, 63, 1, 65, 46);

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

CREATE TABLE `assignment` (
  `idassignment` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `idcategory` int(11) NOT NULL,
  `category_name` varchar(45) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`idcategory`, `category_name`, `amount`, `status`, `created_at`, `updated_at`) VALUES
(43, 'MENTAL HEALTH COUNSELLING', 2000, 1, '2022-05-19 06:59:28', '2022-05-19 06:59:28'),
(44, 'GUIDANCE AND CAREER COUNSELLING', 1500, 1, '2022-05-19 07:00:24', '2022-05-19 07:00:24'),
(45, 'EDUCATIONAL COUNSELLING', 1500, 1, '2022-05-19 07:00:38', '2022-05-24 03:09:47'),
(46, 'PRE-MARITAL COUNSELLING', 1500, 1, '2022-05-19 07:01:13', '2022-05-19 07:01:13'),
(47, 'MARITAL COUNSELLING', 2000, 1, '2022-05-19 07:01:29', '2022-05-19 07:01:29'),
(48, 'FAMILY COUNSELLING', 2500, 1, '2022-05-19 07:01:45', '2022-05-19 07:01:45');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `idclient` int(11) NOT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `contact_number` varchar(10) DEFAULT NULL,
  `gender` varchar(45) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `master_user_idmaster_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`idclient`, `first_name`, `last_name`, `contact_number`, `gender`, `dob`, `updated_at`, `created_at`, `master_user_idmaster_user`) VALUES
(46, 'CLIENT', 'ACCOUNT', '0778114322', 'Male', '1994-09-23', '2022-05-30 19:25:06', '2022-05-30 19:25:06', 63),
(47, 'KASUN', 'RAJITHA', '0783456785', 'Male', '1968-05-20', '2022-05-30 19:44:02', '2022-05-30 19:44:02', 72),
(48, 'WARUN', 'SIDDARTH', '0783456767', 'Male', '1994-05-12', '2022-05-30 19:45:07', '2022-05-30 19:45:07', 73),
(49, 'WENUSHI', 'KAVISHA', '0783456745', 'Female', '1988-05-13', '2022-05-30 19:45:59', '2022-05-30 19:45:59', 74),
(50, 'MIHILI', 'SILVA', '0773456785', 'Female', '1995-05-13', '2022-05-30 19:46:48', '2022-05-30 19:46:48', 75);

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `idcontact_us` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `message` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `idfeedback` int(11) NOT NULL,
  `rating` varchar(45) DEFAULT NULL,
  `comment` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `appointment_idappointment` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `gdf`
--

CREATE TABLE `gdf` (
  `idgdf` int(11) NOT NULL,
  `main_problem` varchar(200) DEFAULT NULL,
  `severity_level` varchar(45) DEFAULT NULL,
  `appearance_behavior` varchar(200) DEFAULT NULL,
  `previous_treatment` varchar(200) DEFAULT NULL,
  `social_life` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `master_user_idmaster_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `master_user`
--

CREATE TABLE `master_user` (
  `idmaster_user` int(11) NOT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `contact_number` varchar(10) DEFAULT NULL,
  `gender` varchar(45) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `user_name` varchar(150) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_role_iduser_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `master_user`
--

INSERT INTO `master_user` (`idmaster_user`, `first_name`, `last_name`, `contact_number`, `gender`, `dob`, `user_name`, `password`, `status`, `created_at`, `updated_at`, `user_role_iduser_role`) VALUES
(1, 'ADMIN', 'ACCOUNT', '0702691196', 'Male', '1995-01-19', 'admin@gmail.com', '6vEq7td1at4WW3g24dFqLQ==', 1, '2022-02-09 07:35:03', '2022-05-30 19:21:49', 1),
(63, 'CLIENT', 'ACCOUNT', '0778114322', 'Male', '1994-09-23', 'client@gmail.com', '6vEq7td1at4WW3g24dFqLQ==', 1, '2022-05-30 19:25:06', '2022-05-30 19:25:06', 4),
(64, 'EMPLOYEE', 'ACCOUNT', '0713678333', 'Male', '1996-05-20', 'employee@gmail.com', '6vEq7td1at4WW3g24dFqLQ==', 1, '2022-05-30 19:27:53', '2022-05-30 19:27:53', 3),
(65, 'COUNSELLOR', 'ACCOUNT', '0752345678', 'Male', '1998-05-13', 'counsellor@gmail.com', '6vEq7td1at4WW3g24dFqLQ==', 1, '2022-05-30 19:30:02', '2022-05-30 19:30:02', 2),
(66, 'DIVYANGANI', 'SANDAREKHA', '0786666666', 'Male', '1998-04-28', 'divya@gmail.com', '6vEq7td1at4WW3g24dFqLQ==', 1, '2022-05-30 19:34:56', '2022-05-30 19:34:56', 3),
(67, 'KAMAL', 'PERERA', '0786543456', 'Male', '1995-05-12', 'kamal@gmail.com', '6vEq7td1at4WW3g24dFqLQ==', 1, '2022-05-30 19:36:06', '2022-05-30 19:36:06', 3),
(68, 'JAGATH', 'PERERA', '0775645654', 'Male', '1995-05-06', 'jagath@gmail.com', '6vEq7td1at4WW3g24dFqLQ==', 1, '2022-05-30 19:37:58', '2022-05-30 19:37:58', 2),
(69, 'ASELA', 'MALLIKARATHNA', '0764532453', 'Male', '1994-05-13', 'asela@gmail.com', '6vEq7td1at4WW3g24dFqLQ==', 1, '2022-05-30 19:38:51', '2022-05-30 19:38:51', 2),
(70, 'RAJITHA', 'FERNADO', '0782345678', 'Male', '1993-05-05', 'rajitha@gmail.com', '6vEq7td1at4WW3g24dFqLQ==', 1, '2022-05-30 19:39:51', '2022-05-30 19:39:51', 2),
(71, 'DUSHANTHI', 'SILVA', '0782345678', 'Female', '1993-05-13', 'dushanthi@gmail.com', '6vEq7td1at4WW3g24dFqLQ==', 1, '2022-05-30 19:41:09', '2022-05-30 19:41:09', 2),
(72, 'KASUN', 'RAJITHA', '0783456785', 'Male', '1968-05-20', 'kasun@gmail.com', '6vEq7td1at4WW3g24dFqLQ==', 1, '2022-05-30 19:44:02', '2022-05-30 19:44:02', 4),
(73, 'WARUN', 'SIDDARTH', '0783456767', 'Male', '1994-05-12', 'warun@gmail.com', '6vEq7td1at4WW3g24dFqLQ==', 1, '2022-05-30 19:45:07', '2022-05-30 19:45:07', 4),
(74, 'WENUSHI', 'KAVISHA', '0783456745', 'Female', '1988-05-13', 'wenushi@gmail.com', '6vEq7td1at4WW3g24dFqLQ==', 1, '2022-05-30 19:45:59', '2022-05-30 19:45:59', 4),
(75, 'MIHILI', 'SILVA', '0773456785', 'Female', '1995-05-13', 'mihili@gmail.com', '6vEq7td1at4WW3g24dFqLQ==', 1, '2022-05-30 19:46:48', '2022-05-30 19:46:48', 4);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `idpayment` int(11) NOT NULL,
  `appointment_idappointment` int(11) NOT NULL,
  `amount` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`idpayment`, `appointment_idappointment`, `amount`, `created_at`, `updated_at`) VALUES
(27, 120, 2000, '2022-05-30 19:56:23', '2022-05-30 19:56:23'),
(28, 121, 1500, '2022-05-30 19:56:26', '2022-05-30 19:56:26'),
(29, 122, 1500, '2022-05-30 19:56:29', '2022-05-30 19:56:29'),
(30, 123, 1500, '2022-05-30 19:56:33', '2022-05-30 19:56:33');

-- --------------------------------------------------------

--
-- Table structure for table `session_report`
--

CREATE TABLE `session_report` (
  `idsesion_report` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `action_taken` varchar(200) DEFAULT NULL,
  `next_appointment_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `master_user_idmaster_user` int(11) NOT NULL,
  `assignment_idassignment` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `time_slot`
--

CREATE TABLE `time_slot` (
  `idtime_slot` int(11) NOT NULL,
  `time_slot` varchar(45) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `time_slot`
--

INSERT INTO `time_slot` (`idtime_slot`, `time_slot`, `status`) VALUES
(1, '09:00AM - 10:00AM', 1),
(2, '10:00AM - 11:00AM', 1),
(3, '11:00AM - 12:00PM', 1),
(4, '01:00PM - 02:00PM', 1),
(5, '02:00PM - 03:00PM', 1),
(6, '03:00PM - 04:00PM', 1),
(7, '04:00PM - 05:00PM', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `iduser_role` int(11) NOT NULL,
  `role_name` varchar(45) DEFAULT NULL,
  `role_description` varchar(50) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`iduser_role`, `role_name`, `role_description`, `status`) VALUES
(1, 'Owner', 'System administrator', 1),
(2, 'Counsellor', 'Counsellors', 1),
(3, 'Employee', 'Front office staff', 1),
(4, 'Client', 'Global Mind\'s clients', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`idappointment`),
  ADD KEY `fk_appointment_master_user1_idx` (`master_user_idmaster_user`),
  ADD KEY `fk_appointment_time_slot1_idx` (`time_slot_idtime_slot`),
  ADD KEY `fk_appointment_master_user2_idx` (`counsellor_id`),
  ADD KEY `fk_appointment_category1_idx` (`category_idcategory`);

--
-- Indexes for table `assignment`
--
ALTER TABLE `assignment`
  ADD PRIMARY KEY (`idassignment`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`idcategory`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`idclient`),
  ADD KEY `fk_client_master_user1_idx` (`master_user_idmaster_user`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`idcontact_us`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`idfeedback`),
  ADD KEY `fk_feedback_appointment1_idx` (`appointment_idappointment`);

--
-- Indexes for table `gdf`
--
ALTER TABLE `gdf`
  ADD PRIMARY KEY (`idgdf`),
  ADD KEY `fk_gdf_master_user1_idx` (`master_user_idmaster_user`);

--
-- Indexes for table `master_user`
--
ALTER TABLE `master_user`
  ADD PRIMARY KEY (`idmaster_user`),
  ADD KEY `fk_master_user_user_role_idx` (`user_role_iduser_role`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`idpayment`),
  ADD KEY `fk_payment_appointment1_idx` (`appointment_idappointment`);

--
-- Indexes for table `session_report`
--
ALTER TABLE `session_report`
  ADD PRIMARY KEY (`idsesion_report`),
  ADD KEY `fk_sesion_report_master_user1_idx` (`master_user_idmaster_user`),
  ADD KEY `fk_sesion_report_assignment1_idx` (`assignment_idassignment`);

--
-- Indexes for table `time_slot`
--
ALTER TABLE `time_slot`
  ADD PRIMARY KEY (`idtime_slot`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`iduser_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `idappointment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `assignment`
--
ALTER TABLE `assignment`
  MODIFY `idassignment` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `idcategory` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `idclient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `idcontact_us` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gdf`
--
ALTER TABLE `gdf`
  MODIFY `idgdf` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `master_user`
--
ALTER TABLE `master_user`
  MODIFY `idmaster_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `idpayment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `session_report`
--
ALTER TABLE `session_report`
  MODIFY `idsesion_report` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `time_slot`
--
ALTER TABLE `time_slot`
  MODIFY `idtime_slot` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `iduser_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `fk_appointment_category1` FOREIGN KEY (`category_idcategory`) REFERENCES `category` (`idcategory`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_appointment_master_user1` FOREIGN KEY (`master_user_idmaster_user`) REFERENCES `master_user` (`idmaster_user`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_appointment_master_user2` FOREIGN KEY (`counsellor_id`) REFERENCES `master_user` (`idmaster_user`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_appointment_time_slot1` FOREIGN KEY (`time_slot_idtime_slot`) REFERENCES `time_slot` (`idtime_slot`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `fk_client_master_user1` FOREIGN KEY (`master_user_idmaster_user`) REFERENCES `master_user` (`idmaster_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `fk_feedback_appointment1` FOREIGN KEY (`appointment_idappointment`) REFERENCES `appointment` (`idappointment`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `gdf`
--
ALTER TABLE `gdf`
  ADD CONSTRAINT `fk_gdf_master_user1` FOREIGN KEY (`master_user_idmaster_user`) REFERENCES `master_user` (`idmaster_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `master_user`
--
ALTER TABLE `master_user`
  ADD CONSTRAINT `fk_master_user_user_role` FOREIGN KEY (`user_role_iduser_role`) REFERENCES `user_role` (`iduser_role`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `fk_payment_appointment1` FOREIGN KEY (`appointment_idappointment`) REFERENCES `appointment` (`idappointment`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `session_report`
--
ALTER TABLE `session_report`
  ADD CONSTRAINT `fk_sesion_report_assignment1` FOREIGN KEY (`assignment_idassignment`) REFERENCES `assignment` (`idassignment`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sesion_report_master_user1` FOREIGN KEY (`master_user_idmaster_user`) REFERENCES `master_user` (`idmaster_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
