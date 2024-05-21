-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2024 at 09:19 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`email`, `password`, `username`) VALUES
('admin@gmail.com', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `aid` int(11) NOT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `doctor_id` int(11) DEFAULT NULL,
  `apt_date` varchar(50) NOT NULL,
  `apt_time` varchar(50) NOT NULL,
  `apt_status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`aid`, `patient_id`, `doctor_id`, `apt_date`, `apt_time`, `apt_status`) VALUES
(1, 2, 1, '2024-03-16', '20:40', 0),
(2, 2, 1, '2024-03-16', '20:40', 1),
(3, 2, 15, '2024-03-16', '20:51', 1),
(5, 2, 15, '2024-03-29', '05:05', 4),
(6, 2, 21, '2024-03-22', '18:49', 3),
(7, 1, 4, '2024-03-23', '05:03', 4),
(8, 1, 15, '2024-04-05', '06:06', 0),
(9, 1, 15, '2024-03-28', '02:03', 4),
(10, 1, 15, '2024-03-25', '02:23', 4),
(11, 2, 4, '2024-04-29', '04:03', 3);

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `did` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `spec` varchar(30) NOT NULL,
  `contact` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `lic` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`did`, `name`, `spec`, `contact`, `email`, `lic`, `password`, `address`, `status`) VALUES
(1, 'Issac Newton', 'Neurologist', 111111111, 'issacnewton@gmail.com', 'ntntntntntnt', 'newton', 'Hetauda-4', 1),
(4, 'Prajjwal Gwachha', 'Neurologist', 2147483647, 'prajjwal5853@gmail.com', 'alsjfsldfjsf', 'pj123', 'Hetauda-4', 1),
(15, 'df', 'General', 3444, 'admin@gmail.com', 'alsjfsos34', 'admin', 'Hetauda-4', 1),
(21, 'Baburam Bhattarai', 'Dermatologist', 2147483647, 'babu@gmail.com', 'alsjfsldfjsf3', 'babu', 'Hetauda-4', 1),
(22, 'Robert Jr. Oppenheimer', 'General', 2147483647, 'manhattanproject@gmail.com', 'P1ut0n1um', 'cillian', 'California', 0);

-- --------------------------------------------------------

--
-- Table structure for table `nurse`
--

CREATE TABLE `nurse` (
  `nid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `gender` varchar(7) DEFAULT NULL,
  `dob` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nurse`
--

INSERT INTO `nurse` (`nid`, `name`, `email`, `contact`, `gender`, `dob`) VALUES
(1, 'Adele', 'rollinginthedeep@gmail.com', '333333333333', 'Female', '2002-02-23'),
(3, 'Katy Perrie', 'kattiperrie@gmail.com', '34234443434', 'Female', '2002-02-23'),
(5, 'Jayoma', 'attorneyjayoma@gmail.com', '1100110010', 'male', '2001-03-27');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `pid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `cont` int(11) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `gender` varchar(7) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`pid`, `name`, `cont`, `dob`, `gender`, `email`, `password`) VALUES
(1, 'Madhav Kumar Nepal', 2147483647, '2024-03-27', 'male', 'makune@gmail.com', 'admin'),
(2, 'Jhalanath Khanal', 2147483647, '2024-03-19', 'male', 'jhanal@gmail.com', 'jhanal');

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE `prescription` (
  `pres_id` int(11) NOT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `doctor_id` int(11) DEFAULT NULL,
  `medication` varchar(50) DEFAULT NULL,
  `dosage` varchar(10) DEFAULT NULL,
  `frequency` varchar(30) DEFAULT NULL,
  `date` varchar(20) DEFAULT NULL,
  `diagnosis` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prescription`
--

INSERT INTO `prescription` (`pres_id`, `patient_id`, `doctor_id`, `medication`, `dosage`, `frequency`, `date`, `diagnosis`) VALUES
(4, 1, 4, 'Antibiotic', '100mg', 'Twice a day after meal and din', '2024-03-22', 'Malaria'),
(5, 1, 4, 'fgh', 'gh', 'hg', '2024-03-22', 'gh'),
(6, 1, 4, 'fgh', 'gh', 'hg', '2024-03-22', 'gh'),
(8, 1, 15, 'PSG', '200ml', '4 times a day', '2024-04-08', 'Tuberculosis');

-- --------------------------------------------------------

--
-- Table structure for table `prescriptionfeedback`
--

CREATE TABLE `prescriptionfeedback` (
  `fid` int(11) NOT NULL,
  `pid` int(11) DEFAULT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `doctor_id` int(11) DEFAULT NULL,
  `txt` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prescriptionfeedback`
--

INSERT INTO `prescriptionfeedback` (`fid`, `pid`, `patient_id`, `doctor_id`, `txt`, `date`) VALUES
(12, 4, 1, 4, 'I am all better now thanks to this', '2024-05-20 20:11:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`aid`),
  ADD KEY `patient_id` (`patient_id`),
  ADD KEY `doctor_id` (`doctor_id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`did`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `lic` (`lic`);

--
-- Indexes for table `nurse`
--
ALTER TABLE `nurse`
  ADD PRIMARY KEY (`nid`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`pid`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `prescription`
--
ALTER TABLE `prescription`
  ADD PRIMARY KEY (`pres_id`),
  ADD KEY `patient_id` (`patient_id`),
  ADD KEY `doctor_id` (`doctor_id`);

--
-- Indexes for table `prescriptionfeedback`
--
ALTER TABLE `prescriptionfeedback`
  ADD PRIMARY KEY (`fid`),
  ADD KEY `pid` (`pid`),
  ADD KEY `patient_id` (`patient_id`),
  ADD KEY `doctor_id` (`doctor_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `did` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `nurse`
--
ALTER TABLE `nurse`
  MODIFY `nid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `prescription`
--
ALTER TABLE `prescription`
  MODIFY `pres_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `prescriptionfeedback`
--
ALTER TABLE `prescriptionfeedback`
  MODIFY `fid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`pid`),
  ADD CONSTRAINT `appointment_ibfk_2` FOREIGN KEY (`doctor_id`) REFERENCES `doctor` (`did`);

--
-- Constraints for table `prescription`
--
ALTER TABLE `prescription`
  ADD CONSTRAINT `prescription_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`pid`),
  ADD CONSTRAINT `prescription_ibfk_2` FOREIGN KEY (`doctor_id`) REFERENCES `doctor` (`did`);

--
-- Constraints for table `prescriptionfeedback`
--
ALTER TABLE `prescriptionfeedback`
  ADD CONSTRAINT `prescriptionfeedback_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `prescription` (`pres_id`),
  ADD CONSTRAINT `prescriptionfeedback_ibfk_2` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`pid`),
  ADD CONSTRAINT `prescriptionfeedback_ibfk_3` FOREIGN KEY (`doctor_id`) REFERENCES `doctor` (`did`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
