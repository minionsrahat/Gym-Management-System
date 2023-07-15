-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 02, 2021 at 04:55 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gym_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `admin_contact` varchar(10) NOT NULL,
  `admin_password` varchar(100) NOT NULL,
  `admin_picture` varchar(100) NOT NULL,
  `admin_cdate` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_contact`, `admin_password`, `admin_picture`, `admin_cdate`) VALUES
(1, 'admin', 'c@gmail.com', '1234567890', 'admin@123', 'dog-f2.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `instructors`
--

CREATE TABLE `instructors` (
  `instructor_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `picture` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instructors`
--

INSERT INTO `instructors` (`instructor_id`, `name`, `contact`, `picture`, `address`, `email`, `user_id`) VALUES
(1, 'Khair AHmed', '012834566', '', 'chittagong halisohor', 'kahir1234@gmail.com', 0),
(2, 'Rifat Ahmed', '01834678901', '', 'dhaka uttara road 12', 'rifat123@gmail.com', 0),
(3, 'Pabel', '0184567898', '', 'chittagong', 'pabel1234@gmail.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `member_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `weight` float NOT NULL,
  `joining_date` datetime NOT NULL DEFAULT current_timestamp(),
  `end_of_membership` datetime NOT NULL,
  `membership_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `picture` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`member_id`, `name`, `weight`, `joining_date`, `end_of_membership`, `membership_id`, `user_id`, `picture`) VALUES
(5, 'Zaman', 60, '2021-05-20 00:00:00', '2021-06-20 00:00:00', 8, 4, ''),
(6, 'Imran', 60, '2021-08-29 00:00:00', '2021-10-29 00:00:00', 9, 6, ''),
(7, 'Kayum', 60, '2021-08-30 00:00:00', '2022-03-02 00:00:00', 10, 7, ''),
(8, 'Faysal', 60, '2021-08-30 00:00:00', '2021-12-30 00:00:00', 11, 8, ''),
(9, 'Pabel', 34, '2021-09-09 07:25:47', '2021-09-22 07:25:47', 3, 9, 'tyyu.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `membershiptype`
--

CREATE TABLE `membershiptype` (
  `membership_id` int(11) NOT NULL,
  `type_name` varchar(100) NOT NULL,
  `membership_period` int(11) NOT NULL,
  `amount` decimal(10,0) NOT NULL,
  `user_id` int(11) NOT NULL,
  `sign_up_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `membershiptype`
--

INSERT INTO `membershiptype` (`membership_id`, `type_name`, `membership_period`, `amount`, `user_id`, `sign_up_date`) VALUES
(6, 'Premium Package', 4, '12000', 1, '2021-05-19 19:11:24'),
(7, 'Premium Package', 4, '12000', 3, '2021-05-20 05:20:20'),
(8, 'Basic Package', 1, '5000', 4, '2021-05-20 07:58:49'),
(9, 'Standard Package', 2, '8000', 6, '2021-08-29 20:27:53'),
(10, 'Golden Package+Extra Feature', 6, '16000', 7, '2021-08-30 15:38:47'),
(11, 'Premium Package', 4, '12000', 8, '2021-08-30 17:58:53');

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE `notices` (
  `notice_id` int(11) NOT NULL,
  `notice_title` varchar(200) NOT NULL,
  `notice_content` varchar(1000) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notices`
--

INSERT INTO `notices` (`notice_id`, `notice_title`, `notice_content`, `date`) VALUES
(4, 'Important Notice', 'Gym will open at 10am and closed at 4pm. Gym will closed on Friday', '2021-08-30');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp(),
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `pk_id` int(11) NOT NULL,
  `pk_name` varchar(100) NOT NULL,
  `pk_period` int(11) NOT NULL,
  `cost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`pk_id`, `pk_name`, `pk_period`, `cost`) VALUES
(1, 'Basic Package', 1, 5000),
(2, 'Standard Package', 2, 8000),
(3, 'Premium Package', 4, 12000),
(4, 'Golden Package+Extra Feature', 6, 16000);

-- --------------------------------------------------------

--
-- Table structure for table `packages_request`
--

CREATE TABLE `packages_request` (
  `req_id` int(11) NOT NULL,
  `pk_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `txid` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `packages_request`
--

INSERT INTO `packages_request` (`req_id`, `pk_id`, `user_id`, `txid`) VALUES
(3, 1, 3, 'tfdf123455bb'),
(4, 4, 3, 'tfdf123455bb'),
(8, 1, 1, 'tfdf123455bb'),
(9, 2, 1, 'tfdf123455bb'),
(10, 2, 1, 'tfdf123455bb'),
(12, 2, 6, 'tfdf123455bb'),
(15, 1, 8, 'tfdf123455bb');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` float NOT NULL,
  `payment_type` varchar(10) NOT NULL,
  `payment_date` datetime NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_des` varchar(500) NOT NULL,
  `product_pic` varchar(100) NOT NULL,
  `exported_from` varchar(100) NOT NULL,
  `num_avl_product` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_des`, `product_pic`, `exported_from`, `num_avl_product`, `price`) VALUES
(4, 'Wall Mounted Pull Up Chin Up Bar - Black ,6 GRIP', 'Wall Mounted Pull Up Chin Up Bar - Black ,6 GRIP', '94057.jpg', 'Germany', 10, 349),
(5, 'AB Carver pro wheel - Body Accessories', 'AB Carver pro wheel - Body Accessories', '63875.jpg', 'Germany', 20, 1140),
(6, 'Self-Suction Sit-up Bar Assistor - Gym Workout Fitness Equipment - Red', 'Self-Suction Sit-up Bar Assistor - Gym Workout Fitness Equipment - Red', '86390.jpg', 'Australia', 10, 519),
(7, 'Ab Roller Wheel', 'Ab Roller Wheel', '46953.jpg', 'Germany', 20, 650),
(8, 'Tummy Trimmer - Double Spring - Black', 'Tummy Trimmer - Double Spring - Black', '64207.jpg', 'Australia', 20, 749),
(9, 'Combo Pack of 2 Pieces Push Up Bar - Silver and Black', 'Combo Pack of 2 Pieces Push Up Bar - Silver and Black', '84923.jpg', 'Germany', 30, 400),
(10, 'Foot Expender - Yellow and Black', 'Foot Expender - Yellow and Black', '57018.jpg', 'Germany', 20, 400),
(11, '1 Pair Occlusion Bands Red Blood Flow Restriction Bands BFR', '1 Pair Occlusion Bands Red Blood Flow Restriction Bands BFR', '40231.jpg', 'Germany', 10, 1200);

-- --------------------------------------------------------

--
-- Table structure for table `trainer_application`
--

CREATE TABLE `trainer_application` (
  `request_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone_num` varchar(50) NOT NULL,
  `date_of_birth` varchar(50) NOT NULL,
  `experience` int(11) NOT NULL,
  `gender` int(11) NOT NULL,
  `qualification` varchar(30) NOT NULL,
  `cv_file_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trainer_application`
--

INSERT INTO `trainer_application` (`request_id`, `name`, `email`, `phone_num`, `date_of_birth`, `experience`, `gender`, `qualification`, `cv_file_name`) VALUES
(4, 'rahat', 'rahatuddin786@gmail.com', '01878517664', '2021-08-12', 2, 1, 'HSE', 'CSE311.ASS2.P3.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lame` varchar(100) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `birth_date` varchar(30) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `phone_num` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `fname`, `lame`, `gender`, `birth_date`, `username`, `password`, `address`, `phone_num`) VALUES
(4, 'Zaman', 'Himu', '1', '24', 'zaman123@gmail.com', '12345', 'dhaka uttara road 4', '01878517664'),
(6, 'Imran', 'Hossen', '1', '2021-08-05', 'imran45@gmail.com', '1234', 'dhaka uttara road 4', '01878457664'),
(7, 'Kayum', 'Ahmed', '1', '2021-08-26', 'kayum2345@gmai.com', '1234', 'dhaka uttara road 4', '01878517664'),
(8, 'Faysal', 'Ahmed', '1', '2021-08-26', 'faysal12@gmail.com', '4567', 'dhaka uttara road 4', '01878517664'),
(9, 'Pabel', 'Rahman', '1', '8-12.1999', 'pabel@gmail.com', '12345', 'djhgdlgj', '018712345');

-- --------------------------------------------------------

--
-- Table structure for table `workoutplans`
--

CREATE TABLE `workoutplans` (
  `plan_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `schdule_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `workoutplans`
--

INSERT INTO `workoutplans` (`plan_id`, `member_id`, `schdule_id`) VALUES
(30, 8, 6);

-- --------------------------------------------------------

--
-- Table structure for table `workout_schedule`
--

CREATE TABLE `workout_schedule` (
  `id` int(11) NOT NULL,
  `instructor_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `workout_schedule`
--

INSERT INTO `workout_schedule` (`id`, `instructor_id`, `status`, `time`) VALUES
(9, 1, 0, '7.00AM - 8.30AM'),
(10, 1, 0, '9.00AM - 10.30AM'),
(11, 1, 0, '2.00PM -3.30PM'),
(12, 1, 0, '8.00PM - 9.30PM'),
(13, 1, 0, '10.00PM - 11.30 PM'),
(15, 2, 0, '9.00AM - 10.30AM'),
(21, 2, 0, '11.00AM - 12.30PM'),
(22, 2, 0, '2.00PM -3.30PM'),
(23, 2, 0, '8.00PM - 9.30PM'),
(24, 3, 0, '11.00AM - 12.30PM'),
(25, 3, 0, '2.00PM -3.30PM'),
(26, 3, 0, '4.00PM - 5.30PM'),
(27, 3, 0, '10.00PM - 11.30 PM');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `instructors`
--
ALTER TABLE `instructors`
  ADD PRIMARY KEY (`instructor_id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `membershiptype`
--
ALTER TABLE `membershiptype`
  ADD PRIMARY KEY (`membership_id`);

--
-- Indexes for table `notices`
--
ALTER TABLE `notices`
  ADD PRIMARY KEY (`notice_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`pk_id`);

--
-- Indexes for table `packages_request`
--
ALTER TABLE `packages_request`
  ADD PRIMARY KEY (`req_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `trainer_application`
--
ALTER TABLE `trainer_application`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `workoutplans`
--
ALTER TABLE `workoutplans`
  ADD PRIMARY KEY (`plan_id`);

--
-- Indexes for table `workout_schedule`
--
ALTER TABLE `workout_schedule`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `instructors`
--
ALTER TABLE `instructors`
  MODIFY `instructor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `membershiptype`
--
ALTER TABLE `membershiptype`
  MODIFY `membership_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `notices`
--
ALTER TABLE `notices`
  MODIFY `notice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `pk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `packages_request`
--
ALTER TABLE `packages_request`
  MODIFY `req_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `trainer_application`
--
ALTER TABLE `trainer_application`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `workoutplans`
--
ALTER TABLE `workoutplans`
  MODIFY `plan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `workout_schedule`
--
ALTER TABLE `workout_schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
