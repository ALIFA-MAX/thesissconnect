-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2026 at 06:24 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thesisconnect`
--

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `student_id` varchar(50) NOT NULL,
  `teacher_id` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`student_id`, `teacher_id`, `status`) VALUES
('23', '111', 'accepted');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(6) NOT NULL,
  `role` varchar(20) DEFAULT 'student',
  `student_id` varchar(20) DEFAULT NULL,
  `teacher_id` varchar(20) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `department` varchar(100) DEFAULT NULL,
  `semester` varchar(20) DEFAULT NULL,
  `designation` varchar(50) DEFAULT NULL,
  `research_interests` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `password`, `role`, `student_id`, `teacher_id`, `phone`, `department`, `semester`, `designation`, `research_interests`, `created_at`) VALUES
(1, 'Alif', 'alif@student.com', '123456', 'student', '23-50169-1', NULL, '01956935593', 'CSE', '10th', NULL, NULL, '2026-01-19 17:56:38'),
(2, 'Fatima', 'fatima@professor.com', '123456', 'professor', NULL, '123456', '01898765432', 'CSE', NULL, 'Professor', NULL, '2026-01-19 17:56:38');

-- --------------------------------------------------------

--
-- Table structure for table `user_data`
--

CREATE TABLE `user_data` (
  `role` varchar(50) NOT NULL,
  `email` varchar(150) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `department` varchar(50) NOT NULL,
  `student_id` varchar(50) NOT NULL,
  `major` varchar(50) NOT NULL,
  `semester` varchar(50) NOT NULL,
  `batch` varchar(50) NOT NULL,
  `cgpa` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `teacher_id` varchar(50) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `research_fields` varchar(500) NOT NULL,
  `status` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_data`
--

INSERT INTO `user_data` (`role`, `email`, `phone`, `department`, `student_id`, `major`, `semester`, `batch`, `cgpa`, `password`, `full_name`, `teacher_id`, `designation`, `research_fields`, `status`) VALUES
('professor', '23-50170-1@student.aiub.edu', '01408661776', 'Computer Science', '', '', '', '', '', '111111', 'Fatima', '111', 'Professor', 'naswdasd sa', ''),
('student', 'mubin9516@gmail.com', '0187050065', 'Electrical Engineering', '23', 'dsadasdas', '10', '2021', '3.5', '111111', 'Abdullah al mubin', '', '', '', 'Not currently seeking'),
('professor', '23-50170-1@student.aiub.edu', '01408661776', 'Computer Science', '', '', '', '', '', '11111', 'Fatima', '111', 'Professor', 'naswdasd sa', ''),
('professor', '23-50170-1@student.aiub.edu', '01408661776', 'Computer Science', '', '', '', '', '', '1111', 'Fatima', '111', 'Professor', 'naswdasd sa', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
