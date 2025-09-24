-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2023 at 09:07 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `key_application`
--

-- --------------------------------------------------------

--
-- Table structure for table `db_admin`
--

CREATE TABLE `db_admin` (
  `a_id` int(20) NOT NULL,
  `a_name` varchar(200) NOT NULL,
  `a_code` varchar(200) NOT NULL,
  `a_pwd` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `db_admin`
--

INSERT INTO `db_admin` (`a_id`, `a_name`, `a_code`, `a_pwd`) VALUES
(1, 'Miss Zana', '12121', 'admintest');

-- --------------------------------------------------------

--
-- Table structure for table `db_feedback`
--

CREATE TABLE `db_feedback` (
  `f_id` int(20) NOT NULL,
  `f_name` varchar(200) NOT NULL,
  `f_content` longtext NOT NULL,
  `f_status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `db_feedback`
--

INSERT INTO `db_feedback` (`f_id`, `f_name`, `f_content`, `f_status`) VALUES
(2, 'Norihan binti Alias ', 'tryy', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `db_key`
--

CREATE TABLE `db_key` (
  `k_id` int(20) NOT NULL,
  `k_keyname` varchar(200) NOT NULL,
  `k_category` varchar(200) NOT NULL,
  `k_year` varchar(20) NOT NULL,
  `k_pic` varchar(200) NOT NULL,
  `k_status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `db_key`
--

INSERT INTO `db_key` (`k_id`, `k_keyname`, `k_category`, `k_year`, `k_pic`, `k_status`) VALUES
(14, 'PJG 5468', 'PROTON SAGA 1.3 : AUTO', '2009', '', 'Available'),
(15, 'VCP 7440', 'DAIHATSU / GRAN MAX S402RV-BMRF JG', '2018', '', 'Not Available'),
(16, 'PJT 3244', 'PERODUA VIVA 850EX (GREY) : MANUAL', '2011', '', 'Available'),
(17, 'PKB 6335', 'PERODUA VIVA -850EX : MANUAL', '2011', '', 'Available'),
(18, 'PJE 1918', 'TOYOTA AVANZA 1.3E M', '2009', '', 'Available'),
(19, 'PKL 5403', 'PERODUA VIVA 850-EX : MANUAL', '2012', '', 'Not Available'),
(20, 'PHF 5918', 'TOYOTA AVANZA 1.3E M', '2007', '', 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `db_pickup`
--

CREATE TABLE `db_pickup` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(200) NOT NULL,
  `p_datetime` datetime(6) NOT NULL,
  `p_pic` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `db_pickup`
--

INSERT INTO `db_pickup` (`p_id`, `p_name`, `p_datetime`, `p_pic`) VALUES
(11, 'Abu Talib bin Johari', '2023-12-18 14:55:00.000000', 'Screenshot (46).png');

-- --------------------------------------------------------

--
-- Table structure for table `db_pwd_resets`
--

CREATE TABLE `db_pwd_resets` (
  `r_id` int(20) NOT NULL,
  `r_code` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `db_return`
--

CREATE TABLE `db_return` (
  `r_id` int(11) NOT NULL,
  `r_name` varchar(200) NOT NULL,
  `r_contact` varchar(200) NOT NULL,
  `r_plate` varchar(200) NOT NULL,
  `r_model` varchar(200) NOT NULL,
  `r_year` varchar(200) NOT NULL,
  `r_datetime` datetime(6) NOT NULL,
  `r_pic` varchar(100) NOT NULL,
  `r_status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `db_return`
--

INSERT INTO `db_return` (`r_id`, `r_name`, `r_contact`, `r_plate`, `r_model`, `r_year`, `r_datetime`, `r_pic`, `r_status`) VALUES
(16, 'Abu Talib bin Johari', '014-4421315', 'PKL 5403', 'PERODUA VIVA 850-EX : MANUAL', '2012', '2023-12-18 14:56:00.000000', 'Screenshot (46).png', 'Completed');

-- --------------------------------------------------------

--
-- Table structure for table `db_user`
--

CREATE TABLE `db_user` (
  `u_id` int(20) NOT NULL,
  `u_name` varchar(200) NOT NULL,
  `u_address` varchar(200) NOT NULL,
  `u_contact` varchar(200) NOT NULL,
  `u_email` varchar(200) NOT NULL,
  `u_position` varchar(200) NOT NULL,
  `u_depart` varchar(200) NOT NULL,
  `u_pic` varchar(200) NOT NULL,
  `u_code` varchar(5) NOT NULL,
  `u_pwd` varchar(200) NOT NULL,
  `u_keyname` varchar(200) NOT NULL,
  `u_key_category` varchar(200) NOT NULL,
  `u_year` varchar(20) NOT NULL,
  `u_purpose` varchar(200) NOT NULL,
  `u_key_applydate` varchar(200) NOT NULL,
  `u_license` varchar(200) NOT NULL,
  `u_key_status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `db_user`
--

INSERT INTO `db_user` (`u_id`, `u_name`, `u_address`, `u_contact`, `u_email`, `u_position`, `u_depart`, `u_pic`, `u_code`, `u_pwd`, `u_keyname`, `u_key_category`, `u_year`, `u_purpose`, `u_key_applydate`, `u_license`, `u_key_status`) VALUES
(1, 'Ahmad Lee', '32 Lorong Prima 2, Taman Prima Indah, 14000 BM, Penang', '012-1092382', 'lee@gmail.com', 'Technician', 'Services', '', '20223', 'test3', '', '', '', '', '', '', ''),
(2, 'Nur Farisya binti Azham', '4 Lorong Nusantara 7, Taman Nusantara, 12000 Bertam, Penang', '011-8910111', 'farisya@gmail.com', 'Supervisor', 'Marketing', '', '20222', 'test1', '', '', '', '', '', '', ''),
(3, 'Norihan binti Alias', '12 Lorong Emas 10, Taman Emas, 28000 Ipoh, Perak', '010-1234567', 'norihan1@gmail.com', 'Stock Manager', 'Stock Department', '', '20221', 'usertest1', '', '', '', '', '', '', ''),
(4, 'Abu Bakar bin Ramli', '1 Lorong Jenahak 3, Taman Jenahak, 13700 Perai , Penang', '013-45678910', 'abubakaq@gmail.com', 'Credit Manager', 'Credit Control', '', '20224', 'test4', 'VCP 7440', 'DAIHATSU / GRAN MAX S402RV-BMRF JG', '2018', 'buat newtest', '2023-12-17', 'Screenshot (37).png', 'Pending'),
(6, 'Abu Talib bin Johari', '10 Lorong 9, Taman Bunga Raya 13000 BM, Penang', '014-4421315', 'abutalib@gmail.com', 'Technician', 'Maintenance and Service', '', '20225', 'test5', 'PKL 5403', 'PERODUA VIVA 850-EX : MANUAL', '2012', 'buat newtest', '2023-12-18', '', 'Approved');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `db_admin`
--
ALTER TABLE `db_admin`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `db_feedback`
--
ALTER TABLE `db_feedback`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `db_key`
--
ALTER TABLE `db_key`
  ADD PRIMARY KEY (`k_id`);

--
-- Indexes for table `db_pickup`
--
ALTER TABLE `db_pickup`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `db_pwd_resets`
--
ALTER TABLE `db_pwd_resets`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `db_return`
--
ALTER TABLE `db_return`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `db_user`
--
ALTER TABLE `db_user`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `db_admin`
--
ALTER TABLE `db_admin`
  MODIFY `a_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `db_feedback`
--
ALTER TABLE `db_feedback`
  MODIFY `f_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `db_key`
--
ALTER TABLE `db_key`
  MODIFY `k_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `db_pickup`
--
ALTER TABLE `db_pickup`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `db_pwd_resets`
--
ALTER TABLE `db_pwd_resets`
  MODIFY `r_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `db_return`
--
ALTER TABLE `db_return`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `db_user`
--
ALTER TABLE `db_user`
  MODIFY `u_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
