-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2022 at 04:00 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `regi_form`
--

-- --------------------------------------------------------

--
-- Table structure for table `bloodgroup_list`
--

CREATE TABLE `bloodgroup_list` (
  `id` int(11) NOT NULL,
  `blood_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bloodgroup_list`
--

INSERT INTO `bloodgroup_list` (`id`, `blood_type`) VALUES
(1, 'A(+ve)'),
(2, 'A(-ve)'),
(3, 'B(+ve)'),
(4, 'B(-ve)'),
(5, 'AB(+ve)'),
(6, 'AB(-ve)'),
(7, 'O(+ve)'),
(8, 'O(-ve)');

-- --------------------------------------------------------

--
-- Table structure for table `designation_list`
--

CREATE TABLE `designation_list` (
  `id` int(11) NOT NULL,
  `design_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `designation_list`
--

INSERT INTO `designation_list` (`id`, `design_name`) VALUES
(1, 'Senior Software Architect'),
(2, 'Programmer'),
(3, 'Junior Assistant Programmer'),
(4, 'Intern'),
(5, 'Project Coordinator');

-- --------------------------------------------------------

--
-- Table structure for table `user_data`
--

CREATE TABLE `user_data` (
  `id` int(11) NOT NULL,
  `employee_id` varchar(200) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `designation_id` int(11) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `blood_group_id` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_data`
--

INSERT INTO `user_data` (`id`, `employee_id`, `name`, `email`, `designation_id`, `contact`, `blood_group_id`, `photo`) VALUES
(18, '20220101003', 'Sudipto Hasan Shuvo', 'dddds@gmail.com', 1, '+8801643390270', 2, '15824830.jpg'),
(20, '20220101008', 'Sudipto Hasan Shuvo', 'dddzds@gmail.com', 1, '+8801643390270', 1, '45610582.jpg'),
(21, '21', 'a', 'khaladkhan250@gmail.co', 1, '+8801643390270', 1, '32097240.jpg'),
(22, '20220101005415', 'Sudipto Hasan Shuvo', 'khaladkhan250@gmail.com', 4, '+8801643902700', 2, '6113246.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bloodgroup_list`
--
ALTER TABLE `bloodgroup_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designation_list`
--
ALTER TABLE `designation_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_data`
--
ALTER TABLE `user_data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bloodgroup_list`
--
ALTER TABLE `bloodgroup_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `designation_list`
--
ALTER TABLE `designation_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_data`
--
ALTER TABLE `user_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
