-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2023 at 08:57 PM
-- Server version: 5.5.27
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecvs`
--

-- --------------------------------------------------------

--
-- Table structure for table `certificates`
--

CREATE TABLE `certificates` (
  `id` int(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `gpa` varchar(100) NOT NULL,
  `course` varchar(100) NOT NULL,
  `hash` varchar(100) NOT NULL,
  `year` varchar(100) NOT NULL,
  `studentid` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `certificates`
--

INSERT INTO `certificates` (`id`, `name`, `gpa`, `course`, `hash`, `year`, `studentid`) VALUES
(1, 'John Doe', '3.5', 'Computer Science', '1cc6731b19b49d0defd5e40c8ad27310a4b8617254ade54b85a455a00b23db37', '2023', '1001'),
(2, 'John Doe', '3.5', 'Computer Science', '1cc6731b19b49d0defd5e40c8ad27310a4b8617254ade54b85a455a00b23db37', '2023', '1001'),
(3, 'Jane Doe', '3.8', 'Mathematics', '388d37320aa354313937222eb09a7c91920dd751886f133cca6f4ea3d9d4b101', '2023', '1002'),
(4, 'Jim Smith', '3.2', 'Electrical Engineering', '36c2d3aa5a1eb2e53cac7849aba22cf5efaf4b3c209b1279eb47abedb08c3c76', '2023', '1003'),
(5, 'Sarah Johnson', '3.9', 'Mechanical Engineering', 'af5591c8c59c6a5e5d43f4ed584f34e53367116ee9b502f03972ff82f7a17559', '2023', '1004'),
(6, 'Alice Davis', '3.7', 'Chemistry', '32de06f2013206cabd84b1926730aa6d87ffe92071972cda227a7e423b64afd3', '2023', '1006'),
(7, 'Lisa Parker', '3.6', 'Geology', '58358d57ea8edd8845c9c6295c1d79ca58665920652103df0f6b2bfa20129036', '2023', '1008'),
(8, 'Karen Anderson', '3.1', 'Civil Engineering', '725970a60688c2b3fe5bf6e4c366b1d75c94888384e7bbef1d85c42fbf65bb32', '2023', '1010'),
(9, 'Emily Adams', '3.5', 'Computer Engineering', 'd19523437c68151674e7b9c1aa01c00f26a3cbbba96852b20419f289325ce51f', '2023', '1012'),
(10, 'William Davis', '3.2', 'Environmental Engineering', '9fab1822b57199c75ab228ecaa00aecdf4337ac6ec25a0b35c22b4841cc51ecc', '2023', '1013'),
(11, 'Mary Lee', '3.8', 'Electronics Engineering', '6ea3a971b77429f020641b64227730efc39d90868b357253c5c0a13b0b7d32c8', '2023', '1014'),
(12, 'Emily Clark', '3.7', 'Computer Science', '7038503fd39a93796e169a286cb4a0a87e2e98db2094187ef52e509bea3f93f5', '2023', '1016'),
(13, 'William Martin', '3.3', 'Mathematics', 'cfc0e159d18e9dd54a27dda2eb1f31fed12b055aa39a2f5d58e8e8bdfd5cf241', '2023', '1017'),
(14, 'Mary Wilson', '3.5', 'Electrical Engineering', 'b4779eeca90977255f6135f8b7a80133819135f7762136aeb8afad17b4feda47', '2023', '1018'),
(15, 'Daniel Taylor', '3.9', 'Mechanical Engineering', '7331f701ebccf472f933ea84b86e1697f4bdebca912b79c8b9ac038c1e58ec2b', '2023', '1019'),
(16, 'John Lee', '3.1', 'Biology', 'd3a3faf1b60522ace344577a34759e06755ca466a81f0c976a41bdd7171dbb7d', '2023', '1020'),
(17, 'Jane Smith', '3.8', 'Chemistry', 'd4dc9dda29b7f583bee76d0614e28bef71794e27086a40094cd51cb74430b3b8', '2023', '1021'),
(18, 'Sarah Anderson', '3.6', 'Geology', '91ebf28a3ca78c3e6463f8d92b94733647c1a3e270db79894f91b777cd5a5fc3', '2023', '1023'),
(19, 'Alice Parker', '3.2', 'Civil Engineering', '4e602fbdb1a652ab4fcb155c0c2df562413946c8aa0db557f7ce09a6c64fff4e', '2023', '1025');

-- --------------------------------------------------------

--
-- Table structure for table `school_info`
--

CREATE TABLE `school_info` (
  `id` int(11) NOT NULL,
  `institution_name` varchar(255) NOT NULL,
  `acronym` varchar(10) NOT NULL,
  `category` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `salt` varchar(255) NOT NULL,
  `yearly_key` varchar(255) NOT NULL,
  `year` varchar(11) NOT NULL,
  `agents_key` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `school_info`
--

INSERT INTO `school_info` (`id`, `institution_name`, `acronym`, `category`, `type`, `salt`, `yearly_key`, `year`, `agents_key`) VALUES
(2, 'Elgon View Collage', 'EVC', 'Collage', 'Private', 'KeepUsSecure', 'Keep2023Secure', '2023', 'SecureAgent');

-- --------------------------------------------------------

--
-- Table structure for table `student_info`
--

CREATE TABLE `student_info` (
  `student_id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `GPA` decimal(2,1) DEFAULT NULL,
  `fee_balance` decimal(6,2) DEFAULT NULL,
  `course` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_info`
--

INSERT INTO `student_info` (`student_id`, `name`, `GPA`, `fee_balance`, `course`) VALUES
(1001, 'John Doe', '3.5', '1000.00', 'Computer Science'),
(1002, 'Jane Doe', '3.8', '1500.00', 'Mathematics'),
(1003, 'Jim Smith', '3.2', '2000.00', 'Electrical Engineering'),
(1004, 'Sarah Johnson', '3.9', '500.00', 'Mechanical Engineering'),
(1005, 'Tom Brown', '3.0', '2500.00', 'Biology'),
(1006, 'Alice Davis', '3.7', '1200.00', 'Chemistry'),
(1007, 'Michael Lee', '2.5', '1700.00', 'Physics'),
(1008, 'Lisa Parker', '3.6', '800.00', 'Geology'),
(1009, 'David Wilson', '2.8', '2000.00', 'Environmental Science'),
(1010, 'Karen Anderson', '3.1', '1500.00', 'Civil Engineering'),
(1011, 'Andrew Thompson', '2.9', '2000.00', 'Materials Science'),
(1012, 'Emily Adams', '3.5', '1300.00', 'Computer Engineering'),
(1013, 'William Davis', '3.2', '1700.00', 'Environmental Engineering'),
(1014, 'Mary Lee', '3.8', '500.00', 'Electronics Engineering'),
(1015, 'Daniel Smith', '3.0', '1500.00', 'Mechatronics Engineering'),
(1016, 'Emily Clark', '3.7', '1500.00', 'Computer Science'),
(1017, 'William Martin', '3.3', '2000.00', 'Mathematics'),
(1018, 'Mary Wilson', '3.5', '500.00', 'Electrical Engineering'),
(1019, 'Daniel Taylor', '3.9', '2500.00', 'Mechanical Engineering'),
(1020, 'John Lee', '3.1', '1200.00', 'Biology'),
(1021, 'Jane Smith', '3.8', '1700.00', 'Chemistry'),
(1022, 'Jim Davis', '2.9', '800.00', 'Physics'),
(1023, 'Sarah Anderson', '3.6', '2000.00', 'Geology'),
(1024, 'Tom Johnson', '2.8', '1500.00', 'Environmental Science'),
(1025, 'Alice Parker', '3.2', '2000.00', 'Civil Engineering');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varbinary(255) NOT NULL,
  `first_name` varbinary(255) NOT NULL,
  `last_name` varbinary(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `first_name`, `last_name`, `created_at`) VALUES
(3, '10smJw==', '10smJ2ojbPODK0RgVA==', 0x24327924313024706c73537a62755276674c443278517763535059712e763553495569723236316d39635a2f4b39684758456a34486b71696667666d, 0x3130736d4a773d3d, 0x3130736d4a773d3d, '2023-01-30 15:41:06'),
(5, '10smJxs=', '10smJxsXfeWEcRYhWucv', 0x62616438383334633864663639373036316536363463633163633862643337313332316365616235373664303738363263313639376463663138616264313865, 0x3130736d4a78733d, 0x3130736d4a78733d, '2023-01-31 00:27:05'),
(7, '10smJxg=', '10smJxgXfeWEcRUhWucv', 0x35356662306666393030626236626530656539386164313130346261323063363732396536353531626562303539343561623963376533386266363835383233, 0x3130736d4a78673d, 0x3130736d4a78673d, '2023-01-31 00:30:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `certificates`
--
ALTER TABLE `certificates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `school_info`
--
ALTER TABLE `school_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_info`
--
ALTER TABLE `student_info`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `certificates`
--
ALTER TABLE `certificates`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `school_info`
--
ALTER TABLE `school_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
