-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2018 at 04:53 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbms_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `coursename` varchar(30) NOT NULL,
  `courseno` int(5) NOT NULL DEFAULT '0',
  `instructorid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`coursename`, `courseno`, `instructorid`) VALUES
('xyz', 124, 1),
('dbms', 456, 3);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `dno` int(5) NOT NULL DEFAULT '0',
  `dname` varchar(30) NOT NULL,
  `hodid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dno`, `dname`, `hodid`) VALUES
(10001, 'Computer  Science & Engg.', 2),
(10002, 'Electronics & Communication En', 1),
(10003, 'Mechanical Engg.', 4),
(10004, 'Civil Engg.', 3),
(10005, 'Electrical Engg.', 8),
(10006, 'Chemical Engg.', 5),
(10007, 'Material Science & Metallurgic', 6),
(10008, 'Architecture & Planning', 7),
(10011, 'xyz', 2);

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `scholarno` int(11) NOT NULL DEFAULT '0',
  `courseno` int(5) NOT NULL DEFAULT '0',
  `grade` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`scholarno`, `courseno`, `grade`) VALUES
(151112026, 124, 'a');

-- --------------------------------------------------------

--
-- Table structure for table `instructor`
--

CREATE TABLE `instructor` (
  `instructorid` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `dno` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instructor`
--

INSERT INTO `instructor` (`instructorid`, `name`, `dno`) VALUES
(1, 'Dr.R.K. Baghel', 10002),
(2, 'Dr.R.K.Pateriya', 10001),
(3, 'Dr.P.K.Jain', 10004),
(4, 'Dr.J.L.Bhagoria', 10003),
(5, 'Dr.Bharathkumar K. Modhera', 10006),
(6, 'Dr.Sanjay Srivastva', 10007),
(7, 'Dr.Anupama Sharma', 10008),
(8, 'Dr.Savita Nema ', 10005);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `scholarno` int(11) NOT NULL DEFAULT '0',
  `name` varchar(30) NOT NULL,
  `dno` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`scholarno`, `name`, `dno`) VALUES
(151112023, 'Abhishek Jain', 10001),
(151112026, 'Amritesh Patidar', 10001),
(151112064, 'Vipul Patil', 10001),
(151112067, 'Shubham Malviya', 10001),
(151112080, 'Ayush shrivastava', 10001);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`courseno`),
  ADD KEY `instructorid` (`instructorid`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dno`),
  ADD KEY `hodid` (`hodid`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`scholarno`,`courseno`),
  ADD KEY `courseno` (`courseno`);

--
-- Indexes for table `instructor`
--
ALTER TABLE `instructor`
  ADD PRIMARY KEY (`instructorid`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `dno` (`dno`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`scholarno`),
  ADD KEY `dno` (`dno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `instructor`
--
ALTER TABLE `instructor`
  MODIFY `instructorid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`instructorid`) REFERENCES `instructor` (`instructorid`);

--
-- Constraints for table `department`
--
ALTER TABLE `department`
  ADD CONSTRAINT `department_ibfk_1` FOREIGN KEY (`hodid`) REFERENCES `instructor` (`instructorid`);

--
-- Constraints for table `grades`
--
ALTER TABLE `grades`
  ADD CONSTRAINT `grades_ibfk_1` FOREIGN KEY (`scholarno`) REFERENCES `student` (`scholarno`),
  ADD CONSTRAINT `grades_ibfk_2` FOREIGN KEY (`courseno`) REFERENCES `course` (`courseno`),
  ADD CONSTRAINT `grades_ibfk_3` FOREIGN KEY (`scholarno`) REFERENCES `student` (`scholarno`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `grades_ibfk_4` FOREIGN KEY (`courseno`) REFERENCES `course` (`courseno`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `instructor`
--
ALTER TABLE `instructor`
  ADD CONSTRAINT `instructor_ibfk_1` FOREIGN KEY (`dno`) REFERENCES `department` (`dno`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`dno`) REFERENCES `department` (`dno`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
