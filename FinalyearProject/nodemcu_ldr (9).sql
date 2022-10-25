-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2020 at 10:32 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nodemcu_ldr`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(11) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `email`, `password`) VALUES
('linkon', 'srilinkon@gmail.com', 123456);

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `course_code` varchar(10) NOT NULL,
  `registration_no` varchar(16) NOT NULL,
  `day` varchar(9) NOT NULL,
  `time` varchar(20) NOT NULL,
  `status` varchar(8) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`course_code`, `registration_no`, `day`, `time`, `status`, `Date`) VALUES
('CSE 121', '160103020026', 'Wednesday', '03:09', 'present', '2020-01-22'),
('CSE 121', '160103020035', 'Wednesday', '03:09', 'present', '2020-01-22');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_code` varchar(10) NOT NULL,
  `course_title` varchar(50) NOT NULL,
  `dept_name` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_code`, `course_title`, `dept_name`) VALUES
('CSE 121', 'Basic Electrical Eng', 'CSE'),
('CSE 122', 'Basic Electrical Eng', 'CSE'),
('CSE 123', 'Discrete Mathematics', 'CSE'),
('CSE 131', 'Data Structure', 'CSE'),
('CSE 132', 'Data Structure Lab', 'CSE'),
('CSE 211', 'Object Oriented Programming Language', 'CSE'),
('CSE 212', 'Object Oriented Programming Language Lab', 'CSE'),
('CSE 221', 'Digital Logic Design', 'CSE'),
('CSE 222', 'Digital Logic Design Lab', 'CSE'),
('CSE 223', 'Theory of Computation', 'CSE'),
('CSE 311', 'Computer Architecture', 'CSE'),
('CSE 315', 'Communication Engineering', 'CSE'),
('CSE 325', 'Computer Networking', 'CSE'),
('CSE 326', 'Computer Networking Lab', 'CSE'),
('CSE 421', 'Compiler Construction', 'CSE'),
('CSE 449', 'Bio-informatics', 'CSE'),
('CSE 450', 'Bio-informatics Lab', 'CSE'),
('CSE 455', 'Machine Learning', 'CSE'),
('CSE 456', 'Machine Learning Lab', 'CSE'),
('ENG 101', 'English Language', 'CSE'),
('GED 101', 'Bangladesh Studies', 'CSE'),
('MATH 201', 'Complex Variable', 'MATHEMATICS');

-- --------------------------------------------------------

--
-- Table structure for table `course taken`
--

CREATE TABLE `course taken` (
  `tname` varchar(30) NOT NULL,
  `course_code` varchar(10) NOT NULL,
  `registration_no` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course taken`
--

INSERT INTO `course taken` (`tname`, `course_code`, `registration_no`) VALUES
('nomoskar', 'CSE 121', '160103020035'),
('nomoskar', 'CSE 131', '160103020035'),
('nomoskar', 'CSE 326', '160103020035'),
('nomoskar', 'CSE 121', '160103020026'),
('nomoskar', 'CSE 122', '160103020026');

-- --------------------------------------------------------

--
-- Table structure for table `day`
--

CREATE TABLE `day` (
  `day` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `day`
--

INSERT INTO `day` (`day`) VALUES
('Saturday'),
('Sunday'),
('Monday'),
('Tuesday'),
('Wednesday'),
('Thursday');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `dept_name` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dept_name`) VALUES
('BBA'),
('CEE'),
('CSE'),
('EEE'),
('ENGLISH'),
('LAW'),
('MATHEMATICS');

-- --------------------------------------------------------

--
-- Table structure for table `nodemcu_ldr_table`
--

CREATE TABLE `nodemcu_ldr_table` (
  `NO` int(10) NOT NULL,
  `finger_id` int(10) NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nodemcu_ldr_table`
--

INSERT INTO `nodemcu_ldr_table` (`NO`, `finger_id`, `Date`, `Time`) VALUES
(1, 1, '2019-11-14', '11:00:05'),
(2, 2, '2019-11-14', '11:00:17'),
(149, 3, '2020-01-22', '03:18:00');

-- --------------------------------------------------------

--
-- Table structure for table `routine`
--

CREATE TABLE `routine` (
  `no` int(3) NOT NULL,
  `day` varchar(9) NOT NULL,
  `schedule` varchar(20) NOT NULL,
  `course_code` varchar(10) NOT NULL,
  `tname` varchar(30) NOT NULL,
  `dept_name` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `routine`
--

INSERT INTO `routine` (`no`, `day`, `schedule`, `course_code`, `tname`, `dept_name`) VALUES
(1, 'Wednesday', '00:05-04:00', 'CSE 121', 'nomoskar', 'CSE'),
(2, 'Sunday', '10:00-11:55', 'CSE 131', 'nomoskar', 'CSE'),
(3, 'Sunday', '11:30-12:55', 'CSE 131', 'nomoskar', 'CSE');

-- --------------------------------------------------------

--
-- Table structure for table `semseter`
--

CREATE TABLE `semseter` (
  `semester_id` int(12) NOT NULL,
  `semester_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `semseter`
--

INSERT INTO `semseter` (`semester_id`, `semester_name`) VALUES
(1, '1st'),
(2, '2nd'),
(3, '3rd'),
(4, '4th'),
(5, '5th'),
(6, '6th'),
(7, '7th'),
(8, '8th'),
(9, '9th'),
(10, '10th'),
(11, '11th'),
(12, '12th');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `fingerid` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `registration_no` varchar(16) NOT NULL,
  `dept_name` varchar(11) NOT NULL,
  `Gender` varchar(20) NOT NULL,
  `Contact_No` varchar(11) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Password` varchar(10) NOT NULL,
  `City` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`fingerid`, `Name`, `registration_no`, `dept_name`, `Gender`, `Contact_No`, `Email`, `Password`, `City`) VALUES
(1, 'suranjit ray', '160103020026', 'CSE', 'Male', '1714528831', 'suranjitray@gmail.com', '123456', 'sylhet'),
(2, 'sri linkon chandra das', '160103020035', 'CSE', 'Male', '1536170913', 'linkondas15@gmail.com', '123456', 'sylhet');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `tname` varchar(30) NOT NULL,
  `dept_name` varchar(12) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `contact` varchar(11) NOT NULL,
  `address` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`tname`, `dept_name`, `gender`, `contact`, `address`, `email`, `password`) VALUES
('nomoskar', 'CSE', 'Male', '01781444611', 'sylhet', 'nomoskar@gmail.com', '123456'),
('rased', 'MATHEMATICS', 'Male', '01734622299', 'sylhet', 'rased@gmail.com', '123456'),
('sojib', 'CSE', 'Male', '01839713176', 'sylhet', 'sojib@gmail.com', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_taken`
--

CREATE TABLE `teacher_taken` (
  `tname` varchar(30) CHARACTER SET latin1 NOT NULL,
  `course_code` varchar(10) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher_taken`
--

INSERT INTO `teacher_taken` (`tname`, `course_code`) VALUES
('nomoskar', 'CSE 121'),
('nomoskar', 'CSE 131'),
('nomoskar', 'CSE 326'),
('nomoskar', 'CSE 311'),
('rased', 'MATH 201'),
('nomoskar', 'CSE 122');

-- --------------------------------------------------------

--
-- Table structure for table `time1`
--

CREATE TABLE `time1` (
  `schedule` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `time1`
--

INSERT INTO `time1` (`schedule`) VALUES
('08:00-09:55'),
('10:00-11:55'),
('11:30-12:55'),
('01:00-02:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_code`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dept_name`);

--
-- Indexes for table `nodemcu_ldr_table`
--
ALTER TABLE `nodemcu_ldr_table`
  ADD PRIMARY KEY (`NO`);

--
-- Indexes for table `routine`
--
ALTER TABLE `routine`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `semseter`
--
ALTER TABLE `semseter`
  ADD PRIMARY KEY (`semester_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`registration_no`),
  ADD KEY `dept_name` (`dept_name`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`tname`),
  ADD KEY `dept_name` (`dept_name`);

--
-- Indexes for table `teacher_taken`
--
ALTER TABLE `teacher_taken`
  ADD KEY `tname` (`tname`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `nodemcu_ldr_table`
--
ALTER TABLE `nodemcu_ldr_table`
  MODIFY `NO` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

--
-- AUTO_INCREMENT for table `routine`
--
ALTER TABLE `routine`
  MODIFY `no` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `semseter`
--
ALTER TABLE `semseter`
  MODIFY `semester_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `teacher`
--
ALTER TABLE `teacher`
  ADD CONSTRAINT `teacher_ibfk_1` FOREIGN KEY (`dept_name`) REFERENCES `department` (`dept_name`);

--
-- Constraints for table `teacher_taken`
--
ALTER TABLE `teacher_taken`
  ADD CONSTRAINT `teacher_taken_ibfk_1` FOREIGN KEY (`tname`) REFERENCES `teacher` (`tname`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
