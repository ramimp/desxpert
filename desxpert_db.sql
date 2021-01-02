-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2020 at 11:09 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `desxpert_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(11) NOT NULL,
  `oauth_uid` varchar(200) NOT NULL,
  `professional_id` int(11) NOT NULL,
  `booking_type` varchar(20) NOT NULL,
  `booking_status` varchar(20) DEFAULT NULL,
  `start_date` varchar(100) NOT NULL,
  `duration` varchar(5) NOT NULL,
  `meeting_id` text DEFAULT NULL,
  `meeting_pass` text DEFAULT NULL,
  `join_url` text DEFAULT NULL,
  `str_url` text DEFAULT NULL,
  `payment_type` varchar(30) NOT NULL,
  `transaction_id` text NOT NULL,
  `short_desc` text DEFAULT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `oauth_uid`, `professional_id`, `booking_type`, `booking_status`, `start_date`, `duration`, `meeting_id`, `meeting_pass`, `join_url`, `str_url`, `payment_type`, `transaction_id`, `short_desc`, `date_created`) VALUES
(1, 'f196209772f4ad45124776442fae3686', 2, 'Scheduled Booking', NULL, '2020-10-10T09:00:00', '60', '123322', '112233', 'https://portal.azure.com/Error/UE_SessionExpired?shown=true#@thecogitosolutions.com/resource/subscriptions/c7cc6492-9304-4e06-a98a-7703286406d7/resourceGroups/desxpert/providers/Microsoft.Web/sites/desxpert-app/vstscd', 'https://portal.azure.com/Error/UE_SessionExpired?shown=true#@thecogitosolutions.com/resource/subscriptions/c7cc6492-9304-4e06-a98a-7703286406d7/resourceGroups/desxpert/providers/Microsoft.Web/sites/desxpert-app/vstscd', 'Paypal', 'PAYID-L577OYI2TX56612R2847490F', 'Short Desc', '2020-10-09 13:39:12');

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `education_id` int(11) NOT NULL,
  `professional_id` int(11) NOT NULL,
  `university` text NOT NULL,
  `honor` text DEFAULT NULL,
  `trainings` text DEFAULT NULL,
  `date_graduated` year(4) NOT NULL,
  `location_id` int(11) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`education_id`, `professional_id`, `university`, `honor`, `trainings`, `date_graduated`, `location_id`, `date_created`) VALUES
(1, 1, 'Ateneo de Manila University', NULL, NULL, 1995, 2, '2020-10-02 01:19:53'),
(2, 2, 'San Beda College', 'Suma Cum Laude', NULL, 1995, 4, '2020-10-09 03:51:12');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `location_id` int(11) NOT NULL,
  `city` text NOT NULL,
  `state` text DEFAULT NULL,
  `zipcode` int(11) NOT NULL,
  `location_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`location_id`, `city`, `state`, `zipcode`, `location_type`) VALUES
(1, 'Laguna', 'San Pedro', 4027, 'professional'),
(2, 'Manila', 'Manila', 4075, 'education'),
(3, 'Laguna', 'San Pedro', 4023, 'professional'),
(4, 'Manila', 'Manila', 4075, 'education');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `transaction_id` text NOT NULL,
  `booking_id` int(11) NOT NULL,
  `payment_type` varchar(50) NOT NULL,
  `payment_amount` double NOT NULL,
  `payment_status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `transaction_id`, `booking_id`, `payment_type`, `payment_amount`, `payment_status`) VALUES
(1, 'PAYID-L577OYI2TX56612R2847490F', 1, 'Paypal', 1000, 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `professionals`
--

CREATE TABLE `professionals` (
  `professional_id` int(11) NOT NULL,
  `oauth_pid` varchar(200) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `prof_type` varchar(50) NOT NULL,
  `status` varchar(25) NOT NULL,
  `email_verified` tinyint(1) NOT NULL,
  `phone_verified` tinyint(1) NOT NULL,
  `login_status` tinyint(1) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `picture` text NOT NULL,
  `experience` varchar(20) NOT NULL,
  `location_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `professionals`
--

INSERT INTO `professionals` (`professional_id`, `oauth_pid`, `email`, `password`, `fname`, `lname`, `phone`, `prof_type`, `status`, `email_verified`, `phone_verified`, `login_status`, `created`, `modified`, `picture`, `experience`, `location_id`) VALUES
(1, '111', 'ramil.imperial@gmal.com', '12345678', 'Ramil', 'Imperial', '09672614272', 'Lawyer', 'Verified', 1, 1, 0, '2020-10-02 09:15:00', '2020-10-02 09:15:00', '100_5.jpg', '5 yrs', 1),
(2, '222', 'randy.paraon@gmail.com', '12345678', 'Randy', 'Faraon', '09178907929', 'Lawyer', 'Verified', 1, 1, 0, '2020-10-09 11:48:38', '2020-10-09 11:48:47', '100_3.jpg', '10 yrs', 3);

-- --------------------------------------------------------

--
-- Table structure for table `seminar`
--

CREATE TABLE `seminar` (
  `seminar_id` int(11) NOT NULL,
  `professional_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `date_conducted` date DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `oauth_provider` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `oauth_uid` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `locale` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `picture` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone_verified` tinyint(4) NOT NULL,
  `login_status` tinyint(1) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `oauth_provider`, `oauth_uid`, `phone`, `email`, `password`, `locale`, `picture`, `phone_verified`, `login_status`, `created`, `modified`) VALUES
(1, 'individual', 'f196209772f4ad45124776442fae3686', '09672614272', 'asisjhode09@gmail.com', '12345678', NULL, 'ZjE5NjIwOTc3MmY0YWQ0NTEyNDc3NjQ0MmZhZTM2ODY.jpg', 1, NULL, '2020-10-08 09:38:45', '2020-10-08 09:38:45');

-- --------------------------------------------------------

--
-- Table structure for table `user_company`
--

CREATE TABLE `user_company` (
  `id` int(11) NOT NULL,
  `oauth_uid` varchar(200) NOT NULL,
  `company_name` varchar(200) NOT NULL,
  `representative` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_individual`
--

CREATE TABLE `user_individual` (
  `id` int(11) NOT NULL,
  `oauth_uid` varchar(200) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `mname` varchar(50) DEFAULT NULL,
  `gender` varchar(7) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_individual`
--

INSERT INTO `user_individual` (`id`, `oauth_uid`, `fname`, `lname`, `mname`, `gender`, `link`) VALUES
(1, 'f196209772f4ad45124776442fae3686', 'Jud', 'Asi', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_otp`
--

CREATE TABLE `user_otp` (
  `id` int(11) NOT NULL,
  `email` varchar(150) NOT NULL,
  `otp` int(11) NOT NULL,
  `expiration` datetime NOT NULL DEFAULT current_timestamp(),
  `status` varchar(20) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_otp`
--

INSERT INTO `user_otp` (`id`, `email`, `otp`, `expiration`, `status`, `date_created`) VALUES
(1, 'asisjhode09@gmail.com', 25684, '2020-10-07 19:51:36', 'verified', '2020-10-08 01:38:45');

-- --------------------------------------------------------

--
-- Table structure for table `user_register`
--

CREATE TABLE `user_register` (
  `id` int(11) NOT NULL,
  `oauth_provider` varchar(10) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(75) NOT NULL,
  `otp_verified` tinyint(1) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_register`
--

INSERT INTO `user_register` (`id`, `oauth_provider`, `fname`, `lname`, `phone`, `email`, `password`, `otp_verified`, `date_created`) VALUES
(1, 'individual', 'Jhode', 'Asis', '09672614272', 'asisjhode09@gmail.com', '12345678', 1, '2020-10-08 01:38:45');

-- --------------------------------------------------------

--
-- Table structure for table `user_register_company`
--

CREATE TABLE `user_register_company` (
  `id` int(11) NOT NULL,
  `oauth_provider` varchar(10) NOT NULL,
  `company_name` varchar(200) NOT NULL,
  `representative` varchar(150) DEFAULT NULL,
  `phone` varchar(12) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(75) NOT NULL,
  `otp_verified` tinyint(1) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`education_id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`location_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `professionals`
--
ALTER TABLE `professionals`
  ADD PRIMARY KEY (`professional_id`);

--
-- Indexes for table `seminar`
--
ALTER TABLE `seminar`
  ADD PRIMARY KEY (`seminar_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_company`
--
ALTER TABLE `user_company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_individual`
--
ALTER TABLE `user_individual`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_otp`
--
ALTER TABLE `user_otp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_register`
--
ALTER TABLE `user_register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_register_company`
--
ALTER TABLE `user_register_company`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `education_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `professionals`
--
ALTER TABLE `professionals`
  MODIFY `professional_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `seminar`
--
ALTER TABLE `seminar`
  MODIFY `seminar_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_company`
--
ALTER TABLE `user_company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_individual`
--
ALTER TABLE `user_individual`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_otp`
--
ALTER TABLE `user_otp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_register`
--
ALTER TABLE `user_register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_register_company`
--
ALTER TABLE `user_register_company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
