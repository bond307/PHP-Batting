-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2021 at 08:34 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `batting`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `user`, `pass`, `status`) VALUES
(1, 'admin', 'admin', 'Online');

-- --------------------------------------------------------

--
-- Table structure for table `cashin_time`
--

CREATE TABLE `cashin_time` (
  `id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cashin_time`
--

INSERT INTO `cashin_time` (`id`, `status`) VALUES
(1, '1');

-- --------------------------------------------------------

--
-- Table structure for table `cashout_time`
--

CREATE TABLE `cashout_time` (
  `id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cashout_time`
--

INSERT INTO `cashout_time` (`id`, `status`) VALUES
(1, '1');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `team1` varchar(255) NOT NULL,
  `team1_titel` varchar(255) NOT NULL,
  `team1_price` varchar(255) NOT NULL,
  `team1_bid` varchar(255) NOT NULL,
  `team1_bid_limit` varchar(255) NOT NULL,
  `team2` varchar(255) NOT NULL,
  `team2_titel` varchar(255) NOT NULL,
  `team2_price` varchar(255) NOT NULL,
  `team2_bid` varchar(255) NOT NULL,
  `team2_bid_limit` varchar(255) NOT NULL,
  `team3` varchar(255) NOT NULL,
  `team3_titel` varchar(255) NOT NULL,
  `team3_price` varchar(255) NOT NULL,
  `team3_bid` varchar(255) NOT NULL,
  `team3_bid_limit` varchar(255) NOT NULL,
  `team4` varchar(255) NOT NULL,
  `team4_titel` varchar(255) NOT NULL,
  `team4_price` varchar(255) NOT NULL,
  `team4_bid` varchar(255) NOT NULL,
  `tem4_bid_limit` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `dateTime` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `team1`, `team1_titel`, `team1_price`, `team1_bid`, `team1_bid_limit`, `team2`, `team2_titel`, `team2_price`, `team2_bid`, `team2_bid_limit`, `team3`, `team3_titel`, `team3_price`, `team3_bid`, `team3_bid_limit`, `team4`, `team4_titel`, `team4_price`, `team4_bid`, `tem4_bid_limit`, `status`, `dateTime`) VALUES
(5, 'Bangladesh VS Windis (Tes Match) 2nd In', 'Bangladesh', 'যদি বাংলাদেশ জিতে বা ড্রো করে তাহলে ১২০% ', '1200', '120%', '100', 'Windis ', 'ওস্টেন্ডিস এর মেস জিতলে ১৪০% ', '1400', '140%', '10', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'Active', '09-02-21 - 10:02:59');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_add_blance`
--

CREATE TABLE `tbl_add_blance` (
  `id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_add_blance`
--

INSERT INTO `tbl_add_blance` (`id`, `user_id`, `user_name`, `type`, `number`, `amount`, `status`, `date`) VALUES
(2, '4', 'bond', 'bKash', '0181456974', '5000', 'Approve', '23-01-21 - 11:01:28'),
(3, '4', 'bond', 'bKash', '01814569747', '5000', 'Approve', '23-01-21 - 12:01:15'),
(4, '6', 'nayon1', 'bKash', '01814569747', '1000', 'Approve', '23-01-21 - 01:01:53'),
(5, '4', 'bond', 'bKash', '1814569747', '500', 'Approve', '23-01-21 - 06:01:13'),
(6, '6', 'nayon1', 'bKash', '01814569747', '5000', 'Approve', '07-02-21 - 03:02:52'),
(7, '6', 'nayon1', 'Roket', '018145697748', '6000', 'Approve', '08-02-21 - 07:02:51');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_add_numner`
--

CREATE TABLE `tbl_add_numner` (
  `id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `number1` varchar(255) NOT NULL,
  `number2` varchar(255) NOT NULL,
  `number3` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_add_numner`
--

INSERT INTO `tbl_add_numner` (`id`, `user_id`, `user_name`, `number1`, `number2`, `number3`, `status`, `date`) VALUES
(1, '6', 'nayon1', '01814569747', '01760058205', '', 'Approve', '23-01-21 - 01:01:46'),
(2, '4', 'bond', '01814597844', '015845852', '', 'Approve', '23-01-21 - 01:01:57');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bid_report`
--

CREATE TABLE `tbl_bid_report` (
  `id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `Match Name` varchar(255) NOT NULL,
  `bet` varchar(255) NOT NULL,
  `best_status` varchar(255) NOT NULL,
  `best_result` varchar(255) NOT NULL,
  `bet_price` varchar(255) NOT NULL,
  `bet_amount` varchar(255) NOT NULL,
  `profit` varchar(255) NOT NULL,
  `old_balance` varchar(255) NOT NULL,
  `nest_blance` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_bid_report`
--

INSERT INTO `tbl_bid_report` (`id`, `user_id`, `product_id`, `Match Name`, `bet`, `best_status`, `best_result`, `bet_price`, `bet_amount`, `profit`, `old_balance`, `nest_blance`, `date`) VALUES
(19, '6', '5', 'Bangladesh VS Windis (Tes Match) 2nd In', 'Bangladesh', 'OK', 'Win', '1200', '100', '20', '8100', '8000', '07-02-21 - 04:02:35'),
(20, '6', '5', 'Bangladesh VS Windis (Tes Match) 2nd In', 'Bangladesh', 'OK', 'Loss', '1200', '100', '20', '8120', '8020', '07-02-21 - 04:02:11'),
(21, '6', '5', 'Bangladesh VS Windis (Tes Match) 2nd In', 'Bangladesh', 'OK', 'Loss', '1200', '1000', '200', '8000', '7000', '07-02-21 - 04:02:36'),
(22, '4', '5', 'Bangladesh VS Windis (Tes Match) 2nd In', 'Bangladesh', 'OK', 'Loss', '1200', '2000', '400', '7000', '5000', '07-02-21 - 05:02:04'),
(23, '4', '5', 'Bangladesh VS Windis (Tes Match) 2nd In', 'Bangladesh', 'OK', 'Win', '1200', '2000', '400', '5000', '3000', '07-02-21 - 05:02:16'),
(24, '4', '5', 'Bangladesh VS Windis (Tes Match) 2nd In', 'Bangladesh', 'OK', 'Win', '1200', '2000', '400', '5400', '3400', '08-02-21 - 03:02:26');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_blance_transfer`
--

CREATE TABLE `tbl_blance_transfer` (
  `id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `holder_name` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_blance_transfer`
--

INSERT INTO `tbl_blance_transfer` (`id`, `user_id`, `holder_name`, `user_name`, `amount`, `status`, `date`) VALUES
(1, '4', 'bond', 'nayon1', '5000', 'Approve', '23-01-21 - 12:01:10'),
(2, '4', 'bond', 'nayon3', '900', 'Approve', '23-01-21 - 01:01:41'),
(3, '6', 'nayon1', 'bond', '3000', 'Approve', '23-01-21 - 01:01:38'),
(4, '4', 'bond', 'nayon1', '7000', 'Approve', '23-01-21 - 01:01:26'),
(5, '6', 'nayon1', 'bond', '6900', 'Approve', '23-01-21 - 01:01:31'),
(6, '4', 'bond', 'nayon2', '500', 'Approve', '23-01-21 - 06:01:08'),
(7, '4', 'bond', 'nayon3', '1000', 'Approve', '08-02-21 - 08:02:08');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_blnc_trnsfr_nuser_name`
--

CREATE TABLE `tbl_blnc_trnsfr_nuser_name` (
  `id` int(11) NOT NULL,
  `uname1` varchar(255) NOT NULL,
  `uname2` varchar(255) NOT NULL,
  `uname3` varchar(255) NOT NULL,
  `uname4` varchar(255) NOT NULL,
  `uname5` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `user_id` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_blnc_trnsfr_nuser_name`
--

INSERT INTO `tbl_blnc_trnsfr_nuser_name` (`id`, `uname1`, `uname2`, `uname3`, `uname4`, `uname5`, `status`, `user_id`) VALUES
(8, 'nayon1', 'nayon2', 'nayon3', '', '', 'Approve', '4'),
(10, 'bond', 'nayon2', 'nayon3', 'nayon4', 'jhumu', 'Approve', '6');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cashout`
--

CREATE TABLE `tbl_cashout` (
  `id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `options` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `w_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_cashout`
--

INSERT INTO `tbl_cashout` (`id`, `user_id`, `user_name`, `options`, `number`, `amount`, `date`, `status`, `w_time`) VALUES
(1, '6', 'nayon1', 'Bkash', '01814569747', '2020', '08-02-21 08:02:32', 'Success', 0),
(2, '6', 'nayon1', 'Bkash', '01814569747', '1000', '08-02-21 02:02:32', 'Success', 0),
(3, '4', 'bond', 'Roket', '01814597844', '800', '08-02-21 03:02:02', 'Success', 0),
(4, '4', 'bond', '', '', '400', '09-02-21 04:02:14', 'Success', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `user_name`, `number`, `password`, `status`) VALUES
(4, 'bond', '01814569747', '123456', 'Approved'),
(5, 'jhumu', '0181459987', '123456', 'OFF'),
(6, 'nayon1', '0181459987', '1234567', 'Approved'),
(7, 'nayon2', '018145697', '123456', 'Approved'),
(8, 'nayon3', '018145697', '123456', 'OFF'),
(9, 'nayon4', '123456', '123456', 'OFF');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cashin_time`
--
ALTER TABLE `cashin_time`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cashout_time`
--
ALTER TABLE `cashout_time`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_add_blance`
--
ALTER TABLE `tbl_add_blance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_add_numner`
--
ALTER TABLE `tbl_add_numner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_bid_report`
--
ALTER TABLE `tbl_bid_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_blance_transfer`
--
ALTER TABLE `tbl_blance_transfer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_blnc_trnsfr_nuser_name`
--
ALTER TABLE `tbl_blnc_trnsfr_nuser_name`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_cashout`
--
ALTER TABLE `tbl_cashout`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cashin_time`
--
ALTER TABLE `cashin_time`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cashout_time`
--
ALTER TABLE `cashout_time`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_add_blance`
--
ALTER TABLE `tbl_add_blance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_add_numner`
--
ALTER TABLE `tbl_add_numner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_bid_report`
--
ALTER TABLE `tbl_bid_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_blance_transfer`
--
ALTER TABLE `tbl_blance_transfer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_blnc_trnsfr_nuser_name`
--
ALTER TABLE `tbl_blnc_trnsfr_nuser_name`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_cashout`
--
ALTER TABLE `tbl_cashout`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
