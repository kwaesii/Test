-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2025 at 06:20 PM
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
-- Database: `db_labact3`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `username` varchar(50) NOT NULL,
  `first_name` varchar(150) NOT NULL,
  `last_name` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(50) NOT NULL,
  `jersey_num` int(11) NOT NULL,
  `profile_picture` varchar(255) NOT NULL,
  `college_code` varchar(20) NOT NULL,
  `position_code` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`username`, `first_name`, `last_name`, `email`, `password`, `jersey_num`, `profile_picture`, `college_code`, `position_code`) VALUES
('Username1', 'Aaron Paul', 'Dela Rosa', 'aaronpaul.delarosa@bulsu.edu.ph', 'User1_01', 6, 'profiles\\paul.jpg', 'CICT', 'MB2'),
('Username10', 'Ruben', 'Ramos', 'ruben.ramos@bulsu.edu.ph', 'User10_10', 2, 'profiles\\ruben.jpg', 'OSFAS', 'OH2'),
('Username11', 'Mark Clemen', 'Ignacio', 'markclemen.ignacio@bulsu.edu.ph', 'User11_11', 3, 'profiles\\clemen.jpg', 'OCA', 'OH1'),
('Username12', 'Luis Mariae ', 'Agtarap', 'luismariae.agtarap@bulsu.edu.ph', 'User12_12', 12, 'profiles\\luis.jpg', 'COED', 'MB1'),
('Username13', 'Aaron', 'Degaños', 'aaron.degaños@bulsu.edu.ph', 'User13_13', 18, 'profiles\\aki.jpg', 'CSSP', 'L'),
('Username14', 'Carl Adrian', 'Manzano', 'carladrian.manzano@bulsu.edu.ph', 'User14_14', 7, 'profiles\\carl.jpg', 'MC', 'MB2'),
('Username15', 'Rowell', 'Castro', 'rowell.castro@bulsu.edu.ph', 'User15_15', 29, 'profiles\\rowell.jpg', 'COED', 'OPP'),
('Username2', 'Rawil Paul', 'Abad', 'rawilpaul.abad@bulsu.edu.ph', 'User2_02', 1, 'profiles\\rawil.jpg', 'COED', 'OH1'),
('Username3', 'Mark Louie', 'Martinez', 'marklouie.martinez@bulsu.edu.ph', 'User3_03', 11, 'profiles\\louie.jpg', 'COE', 'OPP'),
('Username4', 'Martin James', 'Esteban', 'martinjames.esteban@bulsu.edu.ph', 'User4_04', 67, 'profiles\\martin.jpg', 'CSER', 'MB1'),
('Username5', 'Jose Malvin', 'Espadilla', 'josemalvin.espadilla@bulsu.edu.ph', 'User5_05', 4, 'profiles\\jose.jpg', 'CICT', 'OH1'),
('Username6', 'John Allen', 'Evangelista', 'johnallen.evangelista@bulsu.edu.ph', 'User6_06', 13, 'profiles\\allen.jpg', 'CSER', 'MB1'),
('Username7', 'Lester', 'Gatchalian', 'lester.gatchalian@bulsu.edu.ph', 'User7_07', 5, 'profiles\\lester.jpg', 'CON', 'OH2'),
('Username8', 'Ramon', 'Lazaro', 'ramon.lazaro@bulsu.edu.ph', 'User8_08', 9, 'profiles\\michi.jpg', 'CHTM', 'OH2'),
('Username9', 'Christian Paul', 'Briones', 'christianpaul.briones@bulsu.edu.ph', 'User9_09', 10, 'profiles\\chrispaul.jpg', 'OUR', 'S');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email_address` varchar(100) NOT NULL,
  `password` varchar(65) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `first_name`, `last_name`, `email_address`, `password`) VALUES
(1, 'Kristin Camilla', 'Silvestre', 'kcsilvestre@gmail.com', 'password001'),
(2, 'Risecel Ann', 'Cruz', 'risecelcruz@gmail.com', 'password002'),
(3, 'Lincoln Abraham', 'Murillo', 'lincolmurillo@gmail.com', 'password003');

-- --------------------------------------------------------

--
-- Table structure for table `college_office`
--

CREATE TABLE `college_office` (
  `college_code` varchar(20) NOT NULL,
  `college_desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `college_office`
--

INSERT INTO `college_office` (`college_code`, `college_desc`) VALUES
('CHTM', 'College of Hospitality and Tourism Management'),
('CICT', 'College of Information and Communications Technology'),
('COE', 'College of Engineering'),
('COED', 'College of Education'),
('CON', 'College of Nursing'),
('CSER', 'College of Sports, Exercise, and Recreation'),
('CSSP', 'College of Social Sciences and Philosopy'),
('MC', 'Meneses Campus'),
('OCA', 'Office of Culture and Arts'),
('OSFAS', 'Office of the Student Financial Assistance and Scholarships'),
('OUR', 'Office of the University Registrar');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_code` varchar(20) NOT NULL,
  `event_desc` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_code`, `event_desc`) VALUES
('ASCU-SN 2024', 'Association of State Colleges and Universities-Solid North 2024'),
('ASCU-SN 2025', 'Association of State Colleges and Universities-Solid North 2025'),
('SCUFAR3 2024', 'State Colleges and Universities Faculty Associations of Region 3 2024'),
('SCUFAR3 2025', 'State Colleges and Universities Faculty Associations of Region 3 2025');

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `position_code` varchar(20) NOT NULL,
  `position_desc` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`position_code`, `position_desc`) VALUES
('L', 'Libero'),
('MB1', 'Middle Blocker'),
('MB2', 'Middle Blocker'),
('OH1', 'Outside Hitter'),
('OH2', 'Outside Hitter'),
('OPP', 'Opposite Spiker'),
('S', 'Setter');

-- --------------------------------------------------------

--
-- Table structure for table `score`
--

CREATE TABLE `score` (
  `event_code` varchar(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `opposing_team` varchar(50) NOT NULL,
  `attack` int(11) NOT NULL,
  `block` int(11) NOT NULL,
  `ace` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `score`
--

INSERT INTO `score` (`event_code`, `username`, `opposing_team`, `attack`, `block`, `ace`) VALUES
('SCUFAR3 2024', 'Username1', 'NEUST', 3, 3, 1),
('SCUFAR3 2024', 'Username2', 'NEUST', 8, 1, 1),
('SCUFAR3 2024', 'Username4', 'NEUST', 5, 3, 0),
('SCUFAR3 2024', 'Username7', 'NEUST', 3, 0, 0),
('SCUFAR3 2024', 'Username9', 'NEUST', 0, 0, 1),
('SCUFAR3 2024', 'Username11', 'NEUST', 10, 1, 1),
('SCUFAR3 2024', 'Username1', 'TSU', 3, 4, 2),
('SCUFAR3 2024', 'Username2', 'TSU', 9, 2, 0),
('SCUFAR3 2024', 'Username4', 'TSU', 7, 3, 0),
('SCUFAR3 2024', 'Username7', 'TSU', 2, 0, 1),
('SCUFAR3 2024', 'Username9', 'TSU', 0, 0, 0),
('SCUFAR3 2024', 'Username11', 'TSU', 8, 2, 2),
('SCUFAR3 2024', 'Username1', 'CLSU', 1, 2, 0),
('SCUFAR3 2024', 'Username2', 'CLSU', 10, 0, 0),
('SCUFAR3 2024', 'Username3', 'CLSU', 2, 0, 0),
('SCUFAR3 2024', 'Username4', 'CLSU', 8, 4, 0),
('SCUFAR3 2024', 'Username9', 'CLSU', 1, 0, 0),
('SCUFAR3 2024', 'Username11', 'CLSU', 11, 2, 0),
('ASCU-SN 2024', 'Username1', 'MMSU', 3, 3, 0),
('ASCU-SN 2024', 'Username2', 'MMSU', 5, 0, 1),
('ASCU-SN 2024', 'Username3', 'MMSU', 3, 0, 0),
('ASCU-SN 2024', 'Username4', 'MMSU', 4, 2, 0),
('ASCU-SN 2024', 'Username6', 'MMSU', 2, 1, 0),
('ASCU-SN 2024', 'Username7', 'MMSU', 4, 0, 1),
('ASCU-SN 2024', 'Username8', 'MMSU', 3, 0, 0),
('ASCU-SN 2024', 'Username9', 'MMSU', 1, 0, 0),
('ASCU-SN 2024', 'Username10', 'MMSU', 3, 0, 0),
('ASCU-SN 2024', 'Username10', 'MMSU', 4, 1, 1),
('ASCU-SN 2024', 'Username12', 'MMSU', 2, 0, 0),
('ASCU-SN 2024', 'Username13', 'MMSU', 0, 0, 0),
('ASCU-SN 2024', 'Username14', 'MMSU', 2, 0, 0),
('ASCU-SN 2024', 'Username1', 'CSU', 6, 2, 2),
('ASCU-SN 2024', 'Username2', 'CSU', 4, 0, 2),
('ASCU-SN 2024', 'Username3', 'CSU', 3, 0, 0),
('ASCU-SN 2024', 'Username4', 'CSU', 3, 1, 0),
('ASCU-SN 2024', 'Username7', 'CSU', 4, 0, 0),
('ASCU-SN 2024', 'Username8', 'CSU', 2, 0, 0),
('ASCU-SN 2024', 'Username9', 'CSU', 1, 0, 0),
('ASCU-SN 2024', 'Username10', 'CSU', 2, 0, 0),
('ASCU-SN 2024', 'Username11', 'CSU', 5, 1, 0),
('ASCU-SN 2024', 'Username12', 'CSU', 3, 1, 0),
('ASCU-SN 2024', 'Username13', 'CSU', 0, 0, 0),
('ASCU-SN 2024', 'Username14', 'CSU', 2, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `UNIQUE` (`email`),
  ADD KEY `college_code` (`college_code`),
  ADD KEY `position_code` (`position_code`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `college_office`
--
ALTER TABLE `college_office`
  ADD PRIMARY KEY (`college_code`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_code`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`position_code`);

--
-- Indexes for table `score`
--
ALTER TABLE `score`
  ADD KEY `username` (`username`),
  ADD KEY `event_code` (`event_code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `college_code` FOREIGN KEY (`college_code`) REFERENCES `college_office` (`college_code`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `position_code` FOREIGN KEY (`position_code`) REFERENCES `position` (`position_code`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `score`
--
ALTER TABLE `score`
  ADD CONSTRAINT `score_ibfk_1` FOREIGN KEY (`username`) REFERENCES `account` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `score_ibfk_2` FOREIGN KEY (`event_code`) REFERENCES `events` (`event_code`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
