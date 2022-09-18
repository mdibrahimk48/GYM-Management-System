-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2018 at 07:56 AM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `m3_fitness`
--

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `m_no` int(11) NOT NULL,
  `m_name` varchar(40) NOT NULL,
  `m_price` double NOT NULL,
  `m_quantity` int(11) NOT NULL,
  `m_image` varchar(500) NOT NULL,
  `m_detail` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`m_no`, `m_name`, `m_price`, `m_quantity`, `m_image`, `m_detail`) VALUES
(1, 'NIL', 400, 50, 'image/71b4377a42e1c3f3bbe89d7ea0b335db--vanilla-cupcakes-lean-protein.jpg', 'Very Effective for muscle '),
(2, 'supliment', 3500, 50, 'image/biotrustlowcarb-1mbg-vanillacream.png', 'this protin powder is best for any gym memebers'),
(3, 'ISOLET', 30000, 2, 'image/819ouP1BsEL._SY606_.jpg', 'Very Powerful powder for Strength');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_no` int(11) NOT NULL,
  `m_no` int(11) DEFAULT NULL,
  `m_name` varchar(40) NOT NULL,
  `m_price` double NOT NULL,
  `m_quantity` int(11) NOT NULL,
  `total_price` double DEFAULT NULL,
  `mobile` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_no`, `m_no`, `m_name`, `m_price`, `m_quantity`, `total_price`, `mobile`) VALUES
(6, 2, 'supliment', 3500, 2, 7000, '01689569599'),
(7, 2, 'supliment', 3500, 2, 7000, '01689569599'),
(8, 3, 'ISOLET', 30000, 1, 30000, '01689569599'),
(9, 0, 'ISOLET', 30000, 2, 60000, '01689569599'),
(10, 2, 'supliment', 3500, 12, 42000, '01234567890');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `name` varchar(30) NOT NULL,
  `address` varchar(300) NOT NULL,
  `zip_code` varchar(50) NOT NULL,
  `occupation` varchar(50) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `timestamp` int(11) NOT NULL,
  `attempt` int(11) NOT NULL,
  `utype` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`name`, `address`, `zip_code`, `occupation`, `mobile`, `email`, `gender`, `password`, `timestamp`, `attempt`, `utype`) VALUES
('name', 'diit', '12', 'teacher', '01234567890', 'rumisir@gmail.com', 'Male', '123', 0, 0, 'user'),
('Kawsar', 'Nakhalpara', 'd123', 'student', '01515663965', 'kawsar@gmail.com', 'male', '1234', 0, 0, 'admin'),
('name', 'famget', '1208', 'bodybuilding', '01689569599', 'charlos@gmail.com', 'Male', '123', 0, 0, 'user'),
('name', 'dhaka', '2018', 'student', '01835446679', 'jhon@gmail.com', 'Male', '123', 0, 0, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `traineeschedule`
--

CREATE TABLE `traineeschedule` (
  `id` int(11) NOT NULL,
  `ts_id` int(11) DEFAULT NULL,
  `mobile` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `traineeschedule`
--

INSERT INTO `traineeschedule` (`id`, `ts_id`, `mobile`) VALUES
(1, 8, '01689569599'),
(13, 9, '01835446679'),
(14, 8, '01234567890');

-- --------------------------------------------------------

--
-- Table structure for table `trainerschedule`
--

CREATE TABLE `trainerschedule` (
  `ts_id` int(11) NOT NULL,
  `trainer_name` varchar(40) NOT NULL,
  `trainer_address` varchar(200) NOT NULL,
  `trainer_email` varchar(50) NOT NULL,
  `trainer_mobile` varchar(20) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `trainer_gender` varchar(15) NOT NULL,
  `trainer_image` varchar(500) NOT NULL,
  `max_trainee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trainerschedule`
--

INSERT INTO `trainerschedule` (`ts_id`, `trainer_name`, `trainer_address`, `trainer_email`, `trainer_mobile`, `start_time`, `end_time`, `trainer_gender`, `trainer_image`, `max_trainee`) VALUES
(8, 'jonnye', 'danmondi', 'jonnye@gmail.com', '12137462123', '12:59:00', '12:59:00', 'Male', 'image/maxresdefault.jpg', 44),
(9, 'jhon', 'Tejgaon', 'jhon@gmail.com', '01817092094', '07:00:00', '11:00:00', 'Male', 'image/handsome-male-personal-trainer-in-gym-CX5J5F.jpg', 46),
(10, 'hasib', 'Mogbazar', 'hasib@gmail.com', '12345678912', '12:00:00', '15:00:00', 'Male', 'image/iStock_000010733496_Medium.15475954_std.jpg', 45),
(11, 'abc', 'dj', 'ac@gmail.com', '12334456789', '12:59:00', '13:59:00', 'Male', 'image/71OqeYeYiKL._SL1500_.jpg', 50);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`m_no`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_no`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`mobile`);

--
-- Indexes for table `traineeschedule`
--
ALTER TABLE `traineeschedule`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mobile` (`mobile`);

--
-- Indexes for table `trainerschedule`
--
ALTER TABLE `trainerschedule`
  ADD PRIMARY KEY (`ts_id`),
  ADD UNIQUE KEY `trainer_mobile` (`trainer_mobile`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `m_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `traineeschedule`
--
ALTER TABLE `traineeschedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `trainerschedule`
--
ALTER TABLE `trainerschedule`
  MODIFY `ts_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
