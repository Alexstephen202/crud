-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2023 at 01:39 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `foods`
--

CREATE TABLE `foods` (
  `id` int(11) NOT NULL,
  `student_name` varchar(21) DEFAULT NULL,
  `e_mail` varchar(20) DEFAULT NULL,
  `age` int(10) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `food` varchar(20) DEFAULT NULL,
  `file_upload` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `foods`
--

INSERT INTO `foods` (`id`, `student_name`, `e_mail`, `age`, `gender`, `food`, `file_upload`) VALUES
(20, 'Aleak', 'aleak@234gmail.com', 24, 'Male', 'pongal', 'pillsbury.png'),
(21, 'femila', 'femi@gmail.com', 19, 'Female', 'Array', 'south.png'),
(22, 'candy', 'hgh@gmail.com', 12, 'Female', 'idle', 'wipro.jfif'),
(23, 'edison', 'edi@gmail.com', 40, 'Male', 'pongal', 'apple.png'),
(24, 'alex', 'alex@234gmail.com', 39, 'Male', 'buri', 'codex.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `foods`
--
ALTER TABLE `foods`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `foods`
--
ALTER TABLE `foods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
