-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2024 at 01:05 AM
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
-- Database: `myhms`
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
(28, 5, 23, '2024-06-25', '01:01', 1),
(29, 5, 25, '2024-06-26', '03:03', 4),
(30, 6, 24, '2024-06-18', '03:04', 4),
(32, 4, 26, '2024-06-17', '02:02', 5),
(33, 4, 26, '2024-06-19', '12:45', 1),
(34, 5, 26, '2024-06-28', '19:48', 4),
(37, 5, 25, '2024-06-18', '16:06', 5),
(38, 5, 25, '2024-06-21', '11:22', 3),
(40, 4, 30, '2024-06-23', '22:02', 4),
(42, 4, 30, '2024-07-01', '22:02', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `email` varchar(50) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `phone` varchar(11) DEFAULT NULL,
  `msg` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`email`, `name`, `phone`, `msg`) VALUES
('prajjwal@gmail.com', 'Prajjwal Gwachha', '9323222222', 'this is nice');

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
(23, 'Bhagwan Koirala', 'General', 2147483647, 'bhagwankoirala@gmail.com', '02324424', 'bk123', 'Kathmandu', 1),
(24, 'Bhaktaman Shrestha', 'Cardiologist', 2147483647, 'bhakta@gmail.com', 'lsoefneo34', 'bhakta123', 'Chabahil, Kathmandu', 0),
(25, 'Bhola Rijal', 'Dermatologist', 2147483647, 'rijabhola@gmail.com', 'laeofo3452', 'bhola123', 'Bhairab-road', 1),
(26, 'Issac Newton', 'Neurologist', 1011011100, 'issacnewton@gmail.com', 'london1231', 'isacc', 'London', 1),
(27, 'yes pj', 'General', 2147483647, 'admin@gmail.com', '34454545', 'admin', 'Hetauda', 0),
(28, 'Sabin Karki', 'General', 2147483647, 'admin123@gmail.com', 'dfdsfsdfsdf', 'admin', 'hetauda', 0),
(29, 'Adolf Hitler', 'Cardiologist', 2147483647, 'adolf@gmail.com', 'aaeaeaeeae1', 'admin', 'Berlin', 0),
(30, 'Joseph Stalin', 'Neurologist', 2147483647, 'stalin@gmail.com', '1111123', 'cmos', 'Moscow', 1),
(31, 'Aj styles', 'General', 2147483647, 'aj@gmail.com', 'sfsdfs34', 'admin', 'sfsdfds', 0);

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
  `password` varchar(255) NOT NULL,
  `is_deleted` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`pid`, `name`, `cont`, `dob`, `gender`, `email`, `password`, `is_deleted`) VALUES
(4, 'Ram Guragain', 2147483647, '2024-06-25', 'male', 'ram@gmail.com', 'ram123', 0),
(5, 'Damodar Rijal', 2147483647, '2024-06-26', 'male', 'damodar@gmail.com', 'damodar', 0),
(6, 'Dibash Sunar', 2147483647, '2024-06-28', 'male', 'sunardibash@gmail.com', 'sunar', 1),
(10, 'Adele Hitler', 2147483647, '2024-06-21', 'male', 'admin123@gmail.com', 'admin', 1);

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
(9, 4, 23, 'Antacids', '200ml', 'Twice a day after meal and din', '2024-06-16', 'Gastric'),
(10, 6, 24, 'aspirin', '100ml', 'Thrice a day', '2024-06-16', 'Heart Failure'),
(11, 4, 24, 'warfin', '400ml', 'Twice a day', '2024-06-16', 'Heart Attack'),
(12, 6, 24, 'Aspirin 2', '200ml', 'thrice a day', '2024-06-16', 'Tuberculosis'),
(13, 5, 25, 'Hoble', '500ml', 'twice a day', '2024-06-16', 'Hepatitis'),
(14, 4, 25, 'Aspirin', '400ml', 'thrice a day e', '2024-06-18', 'Gastric'),
(15, 5, 26, 'Hepera t230', '500ml', 'Thrice a day', '2024-06-18', 'Hepatitis B'),
(16, 4, 30, 'astecide 2', '400ml', 'thrice a day', '2024-06-21', 'helicopter');

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
(13, 10, 6, 24, 'Thank you so much', '2024-06-16 07:27:12'),
(15, 13, 5, 25, 'nice11', '2024-06-16 12:44:57');

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
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`did`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `lic` (`lic`);

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
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `did` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `prescription`
--
ALTER TABLE `prescription`
  MODIFY `pres_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `prescriptionfeedback`
--
ALTER TABLE `prescriptionfeedback`
  MODIFY `fid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

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
