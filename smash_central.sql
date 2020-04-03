-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2020 at 10:08 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smash_central`
--

-- --------------------------------------------------------

--
-- Table structure for table `characters`
--

CREATE TABLE `characters` (
  `charID` int(3) NOT NULL,
  `charName` varchar(128) NOT NULL,
  `win` int(4) DEFAULT NULL,
  `loss` int(4) DEFAULT NULL,
  `total` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `characters`
--

INSERT INTO `characters` (`charID`, `charName`, `win`, `loss`, `total`) VALUES
(1, 'Mario', 0, 0, 0),
(2, 'Donkey Kong', 0, 0, 0),
(3, 'Link', 0, 0, 0),
(4, 'Samus', 0, 0, 0),
(5, 'Dark Samus', 0, 0, 0),
(6, 'Yoshi', 0, 0, 0),
(7, 'Kirby', 0, 0, 0),
(8, 'Fox', 0, 0, 0),
(9, 'Pikachu', 0, 0, 0),
(10, 'Luigi', 0, 0, 0),
(11, 'Ness', 0, 0, 0),
(12, 'Captain Falcon', 0, 0, 0),
(13, 'Jigglypuff', 0, 0, 0),
(14, 'Peach', 0, 0, 0),
(15, 'Daisy', 0, 0, 0),
(16, 'Bowser', 0, 0, 0),
(17, 'Ice Climbers', 0, 0, 0),
(18, 'Sheik', 0, 0, 0),
(19, 'Zelda', 0, 0, 0),
(20, 'Dr. Mario', 0, 0, 0),
(21, 'Pichu', 0, 0, 0),
(22, 'Falco', 0, 0, 0),
(23, 'Marth', 0, 0, 0),
(24, 'Lucina', 0, 0, 0),
(25, 'Young Link', 0, 0, 0),
(26, 'Ganondorf', 0, 0, 0),
(27, 'Mewtwo', 0, 0, 0),
(28, 'Roy', 0, 0, 0),
(29, 'Chrom', 0, 0, 0),
(30, 'Mr. Game & Watch', 0, 0, 0),
(31, 'Meta Knight', 0, 0, 0),
(32, 'Pit', 0, 0, 0),
(33, 'Dark Pit', 0, 0, 0),
(34, 'Zero Suit Samus', 0, 0, 0),
(35, 'Wario', 0, 0, 0),
(36, 'Snake', 0, 0, 0),
(37, 'Ike', 0, 0, 0),
(38, 'Pokemon Trainer', 0, 0, 0),
(39, 'Diddy Kong', 0, 0, 0),
(40, 'Lucas', 0, 0, 0),
(41, 'Sonic', 0, 0, 0),
(42, 'King Dedede', 0, 0, 0),
(43, 'Olimar', 0, 0, 0),
(44, 'Lucario', 0, 0, 0),
(45, 'R.O.B.', 0, 0, 0),
(46, 'Toon Link', 0, 0, 0),
(47, 'Wolf', 0, 0, 0),
(48, 'Villager', 0, 0, 0),
(49, 'Mega Man', 0, 0, 0),
(50, 'Wii Fit Trainer', 0, 0, 0),
(51, 'Rosalina & Luma', 0, 0, 0),
(52, 'Little Mac', 0, 0, 0),
(53, 'Greninja', 0, 0, 0),
(54, 'Mii Brawler', 0, 0, 0),
(55, 'Mii Swordfighter', 0, 0, 0),
(56, 'Mii Gunner', 0, 0, 0),
(57, 'Robin', 0, 0, 0),
(58, 'Shulk', 0, 0, 0),
(59, 'Bowser Jr', 0, 0, 0),
(60, 'Duck Hunt', 0, 0, 0),
(61, 'Ryu', 0, 0, 0),
(62, 'Ken', 0, 0, 0),
(63, 'Cloud', 0, 0, 0),
(64, 'Corrin', 0, 0, 0),
(65, 'Bayonetta', 0, 0, 0),
(66, 'Inkling', 0, 0, 0),
(67, 'Ridley', 0, 0, 0),
(68, 'Simon', 0, 0, 0),
(69, 'Richter', 0, 0, 0),
(70, 'King K. Rool', 0, 0, 0),
(71, 'Isabelle', 0, 0, 0),
(72, 'Incineroar', 0, 0, 0),
(73, 'Piranha Plant', 0, 0, 0),
(74, 'Joker', 0, 0, 0),
(75, 'Hero', 0, 0, 0),
(76, 'Banjo & Kazooie', 0, 0, 0),
(77, 'Terry', 0, 0, 0),
(78, 'Byleth', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `matches`
--

CREATE TABLE `matches` (
  `matchID` int(4) NOT NULL,
  `player1_name` int(128) NOT NULL,
  `player1_ID` int(4) NOT NULL,
  `char1_ID` int(4) NOT NULL,
  `player2_name` int(128) NOT NULL,
  `player2_ID` int(4) NOT NULL,
  `char2_ID` int(4) NOT NULL,
  `winner_name` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE `players` (
  `playerID` int(4) NOT NULL,
  `playerName` varchar(128) NOT NULL,
  `firstName` varchar(64) NOT NULL,
  `lastName` varchar(64) NOT NULL,
  `password` varchar(256) NOT NULL,
  `email` varchar(128) NOT NULL,
  `win` int(4) DEFAULT NULL,
  `loss` int(4) DEFAULT NULL,
  `total` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `characters`
--
ALTER TABLE `characters`
  ADD PRIMARY KEY (`charID`);

--
-- Indexes for table `matches`
--
ALTER TABLE `matches`
  ADD PRIMARY KEY (`matchID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `characters`
--
ALTER TABLE `characters`
  MODIFY `charID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `matches`
--
ALTER TABLE `matches`
  MODIFY `matchID` int(4) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
