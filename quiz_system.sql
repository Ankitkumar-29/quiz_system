-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 15, 2018 at 04:34 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quiz_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` varchar(50) NOT NULL,
  `pass` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `pass`) VALUES
('lalit', 'lalit'),
('muradia', 'muradia');

-- --------------------------------------------------------

--
-- Table structure for table `qb`
--

CREATE TABLE `qb` (
  `q_id` int(11) NOT NULL,
  `ques` varchar(300) NOT NULL,
  `o1` varchar(100) NOT NULL,
  `o2` varchar(100) NOT NULL,
  `o3` varchar(100) NOT NULL,
  `o4` varchar(100) NOT NULL,
  `ans` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `qb`
--

INSERT INTO `qb` (`q_id`, `ques`, `o1`, `o2`, `o3`, `o4`, `ans`) VALUES
(1, 'get lost do a job this is to test over flow how r you this is awome get lost again hahahaa yo man i m iron man the fastest man alive ', '1', '2', '3', '4', 'o1'),
(2, 'hey ', 'a', 'b', 'c', 'd', 'o4'),
(3, 'best ninja', 'naruto', 'shikamaru', 'sauske', 'kakashi ', 'o4');

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `id` int(11) NOT NULL,
  `passkey` varchar(50) NOT NULL,
  `noq` int(11) NOT NULL,
  `p_marks` int(11) NOT NULL,
  `n_marks` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`id`, `passkey`, `noq`, `p_marks`, `n_marks`) VALUES
(1, 'x123', 3, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `rights`
--

CREATE TABLE `rights` (
  `pagename` varchar(50) NOT NULL,
  `pagefunc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rights`
--

INSERT INTO `rights` (`pagename`, `pagefunc`) VALUES
('add_ques', 'ADD QUESTIONS'),
('add_school', 'ADD SCHOOL'),
('create_quiz', 'CREATE QUIZ'),
('show_quiz', 'ALL QUIZ'),
('show_school', 'SHOW SCHOOLS'),
('show_user', 'SHOW USER'),
('user_resp', 'USER RESPONSE'),
('view_quiz', 'VIEW QUIZ');

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

CREATE TABLE `school` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `town` varchar(50) NOT NULL,
  `phn` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `principle` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `school`
--

INSERT INTO `school` (`id`, `name`, `address`, `town`, `phn`, `email`, `principle`) VALUES
(1, 'GHPS', 'GK II', 'DELHI', '98104', 'ghps@gmail.com', 'ramakrishna'),
(2, 'BNPS', 'SAKET', 'DELHI', '1234', 'BNPS@gmail.com', 'Kalicharan');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `school_id` int(11) NOT NULL,
  `phone_no` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `course` varchar(15) NOT NULL,
  `class` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `school_id`, `phone_no`, `email`, `course`, `class`) VALUES
(5, 'test', 102, '45689133', 'te@gamil.com', 'pcb', '12'),
(6, 'xyz', 102, '45689133', 'teasss@gamil.com', 'pcb', '12'),
(7, 'naruto', 0, '154673', 'nar@gmail.com', 'ad', 'sadas'),
(8, 'sauske', 0, '4596', 'sauske@gmail.com', 'tijutsu', 'uchiha'),
(9, 'kilua', 0, '21541', 'A@GMIAL.COM', 'HHH', '14');

-- --------------------------------------------------------

--
-- Table structure for table `user_response`
--

CREATE TABLE `user_response` (
  `user_id` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `correct` int(11) NOT NULL,
  `wrong` int(11) NOT NULL,
  `result` varchar(5) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_response`
--

INSERT INTO `user_response` (`user_id`, `quiz_id`, `correct`, `wrong`, `result`, `date`) VALUES
(5, 1, 1, 2, 'Pass', '2018-01-14 22:30:54'),
(6, 1, 0, 3, 'Fail', '2018-01-14 22:31:44'),
(7, 1, 0, 3, 'Fail', '2018-01-15 00:11:56'),
(8, 1, 3, 0, 'Pass', '2018-01-15 00:13:40');

-- --------------------------------------------------------

--
-- Table structure for table `x123`
--

CREATE TABLE `x123` (
  `q_id` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `x123`
--

INSERT INTO `x123` (`q_id`) VALUES
('1'),
('2'),
('3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `qb`
--
ALTER TABLE `qb`
  ADD PRIMARY KEY (`q_id`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rights`
--
ALTER TABLE `rights`
  ADD PRIMARY KEY (`pagename`);

--
-- Indexes for table `school`
--
ALTER TABLE `school`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_response`
--
ALTER TABLE `user_response`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `x123`
--
ALTER TABLE `x123`
  ADD PRIMARY KEY (`q_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `qb`
--
ALTER TABLE `qb`
  MODIFY `q_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `school`
--
ALTER TABLE `school`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
