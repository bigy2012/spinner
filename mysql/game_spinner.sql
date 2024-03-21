-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2021 at 05:02 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `game_spinner`
--

-- --------------------------------------------------------

--
-- Table structure for table `game`
--

CREATE TABLE `game` (
  `g_id` varchar(100) NOT NULL,
  `g_coin` int(10) NOT NULL,
  `g_url` varchar(100) NOT NULL,
  `g_title` varchar(100) NOT NULL,
  `g_text` varchar(255) NOT NULL,
  `g_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `game`
--

INSERT INTO `game` (`g_id`, `g_coin`, `g_url`, `g_title`, `g_text`, `g_status`) VALUES
('spinner_point', 10, 'superwheel.php', 'หมุนวงล้อ point', 'จำเป็นต้องใช้ 10 coin ในการเล่น', 1);

-- --------------------------------------------------------

--
-- Table structure for table `spinner`
--

CREATE TABLE `spinner` (
  `s_id` int(11) NOT NULL,
  `s_text` varchar(100) NOT NULL,
  `s_message` varchar(100) NOT NULL,
  `s_background` varchar(10) NOT NULL,
  `s_custom_key` varchar(20) NOT NULL,
  `s_point` varchar(5) NOT NULL,
  `s_percent` varchar(3) NOT NULL,
  `s_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `spinner`
--

INSERT INTO `spinner` (`s_id`, `s_text`, `s_message`, `s_background`, `s_custom_key`, `s_point`, `s_percent`, `s_status`) VALUES
(1, '20 point', 'ยินดีด้วยคุณได้รับ 20 point', '#364C62', 'success', '+20', '50', 1),
(2, 'Lose', 'คุณไม่ได้รับ point', '#9575CD', 'error', '+0', '55', 1),
(3, '30 point', 'ยินดีด้วยคุณได้รับ 30 point', '#E67E22', 'success', '+30', '40', 1),
(4, 'Lose', 'คุณไม่ได้รับ point', '#E74C3C', 'error', '+0', '55', 1),
(5, '40 point', 'ยินดีด้วยคุณได้รับ 40 point', '#2196F3', 'success', '+40', '30', 1),
(6, 'lose', 'คุณไม่ได้รับ point', '#1ABC9C', 'error', '+0', '55', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `u_id` int(255) NOT NULL,
  `u_name` varchar(200) NOT NULL,
  `u_email` varchar(200) NOT NULL,
  `u_password` varchar(200) NOT NULL,
  `u_point` int(255) NOT NULL,
  `u_coin` int(255) NOT NULL,
  `u_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_id`, `u_name`, `u_email`, `u_password`, `u_point`, `u_coin`, `u_status`) VALUES
(1, 'prawit singkorn', 'prawit@gmail.com', '90eff7b526755d3207d5f04970ef7d74', 100, 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`g_id`);

--
-- Indexes for table `spinner`
--
ALTER TABLE `spinner`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `spinner`
--
ALTER TABLE `spinner`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `u_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
