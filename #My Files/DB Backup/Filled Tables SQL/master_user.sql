-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2022 at 10:05 PM
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `master_user`
--
ALTER TABLE `master_user`
  ADD PRIMARY KEY (`idmaster_user`),
  ADD KEY `fk_master_user_user_role_idx` (`user_role_iduser_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `master_user`
--
ALTER TABLE `master_user`
  MODIFY `idmaster_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `master_user`
--
ALTER TABLE `master_user`
  ADD CONSTRAINT `fk_master_user_user_role` FOREIGN KEY (`user_role_iduser_role`) REFERENCES `user_role` (`iduser_role`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
