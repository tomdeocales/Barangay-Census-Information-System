-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2023 at 06:46 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php-crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `crud`
--

CREATE TABLE `crud` (
  `id` int(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `family_number` int(20) DEFAULT NULL,
  `suffix` varchar(255) DEFAULT NULL,
  `civil_status` varchar(255) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `philhealth_number` int(11) DEFAULT NULL,
  `mothers_maiden_name` varchar(255) DEFAULT NULL,
  `contact_number` varchar(255) DEFAULT NULL,
  `blood_type` varchar(255) DEFAULT NULL,
  `pwd` varchar(255) DEFAULT NULL,
  `indigenous_people` varchar(255) DEFAULT NULL,
  `has_consent` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `crud`
--

INSERT INTO `crud` (`id`, `first_name`, `last_name`, `middle_name`, `gender`, `family_number`, `suffix`, `civil_status`, `birth_date`, `philhealth_number`, `mothers_maiden_name`, `contact_number`, `blood_type`, `pwd`, `indigenous_people`, `has_consent`) VALUES
(35, 'DASDAS', 'ASDAS', 'ASD', 'Male', 11111, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(40, 'DEOCALES', 'tom ', 'ASDASD', 'Male', 0, 'III', 'Single', '0000-00-00', 123123213, '', '09456623468', '', 'No', '', 'Yes'),
(45, '', '', '', '', 0, '', '', '2023-05-03', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(52, 'c', 'c', 'c', '', 1, 'I', 'Single', '0000-00-00', 0, '', '000', NULL, NULL, NULL, NULL),
(53, '', '', '', '', 9, '', '', '0000-00-00', 0, '', '1', NULL, NULL, NULL, NULL),
(54, '', '', '', '', 0, '', '', '0000-00-00', 0, '', '1', NULL, NULL, NULL, NULL),
(55, '', 'tae', '', '', 123, '', '', '0000-00-00', 0, '', '1', 'O+', NULL, NULL, NULL),
(56, '', 'tasda', '', '', 0, '', '', '0000-00-00', 0, '', '1', 'O-', 'Yes', 'No', NULL),
(57, 'asdasd', 'asdasd', '', '', 0, '', '', '0000-00-00', 0, '', '1', '', '', '', 'Yes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `crud`
--
ALTER TABLE `crud`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `crud`
--
ALTER TABLE `crud`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
