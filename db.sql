-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 10, 2022 at 05:43 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

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

DROP TABLE IF EXISTS `bloodgroup_list`;
CREATE TABLE IF NOT EXISTS `bloodgroup_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `blood_type` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

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

DROP TABLE IF EXISTS `designation_list`;
CREATE TABLE IF NOT EXISTS `designation_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `design_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `designation_list`
--

INSERT INTO `designation_list` (`id`, `design_name`) VALUES
(1, 'Asst. Sr. Officer'),
(2, 'Computer Executive'),
(3, 'Junior Assistant Programmer'),
(4, 'Intern'),
(5, 'Project Coordinator');

-- --------------------------------------------------------

--
-- Table structure for table `user_data`
--

DROP TABLE IF EXISTS `user_data`;
CREATE TABLE IF NOT EXISTS `user_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` varchar(200) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `designation_id` int(11) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `blood_group_id` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_data`
--

INSERT INTO `user_data` (`id`, `employee_id`, `name`, `email`, `designation_id`, `contact`, `blood_group_id`, `photo`) VALUES
(18, '20001', 'Sudipto Hasan Shuvo', 'khaladkhan250@gmail.com', 3, '01643390270', 7, '74687226.jpg'),
(20, '20002', 'MD. Alamgir Sohan', 'alamgirshohan24@gmail.com', 2, '01648500116', 7, '1590175.jpeg'),
(21, '20003', 'MD. Anik Ahmed', 'anik98170@gmail.com', 1, '0132197847', 3, '96224322.jpeg'),
(22, '20004', 'MD. Jahid Hasan', 'jahidHasan33748@gmail.com', 3, '01743463321', 3, '50076831.jpeg'),
(23, '20005', 'Mahmodul Hasan Redoy', 'mahmodulredoy@gmail.com', 3, '01645282578', 3, '96884974.jpeg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
