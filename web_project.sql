-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2024 at 12:59 PM
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
-- Database: `web_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `portofolio`
--

CREATE TABLE `portofolio` (
  `id` int(11) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `portofolio`
--

INSERT INTO `portofolio` (`id`, `image_path`, `description`) VALUES
(1, 'Portofolio_Pictures/p1.png', 'Eloping In Utah? Here\'s 7 Places to Say I Do!'),
(2, 'Portofolio_Pictures/p2.png', 'Jack & Brie | Great Salt Lake'),
(3, 'Portofolio_Pictures/p3.png', 'Yosemite National Park Intimate Wedding'),
(4, 'Portofolio_Pictures/p4.png', 'Ela & Dallin | First Look'),
(5, 'Portofolio_Pictures/p5.png', 'Hannah & Stephanie | Patagonia Elopment'),
(6, 'Portofolio_Pictures/p6.png', 'Selena & Jonathan | Zion National Park'),
(7, 'Portofolio_Pictures/p7.png', 'Meghan & Nanu | Redwoods'),
(8, 'Portofolio_Pictures/p8.png', 'Karen & Ben | National Park'),
(9, 'Portofolio_Pictures/p9.png', 'Mollie & Drew | Moody PNW Couples Session'),
(10, 'Portofolio_Pictures/p10.png', 'By The Sea | Greece'),
(11, 'Portofolio_Pictures/p11.png', 'Somewhere, Someone Took A Pic Of The Sunset'),
(12, 'Portofolio_Pictures/p12.png', 'WildFlower Adventure Session'),
(13, 'Portofolio_Pictures/p13.png', 'Al & Ben | Adventurous Couples Shoot'),
(14, 'Portofolio_Pictures/p14.png', 'Shrine Pass Hut Summer Wedding'),
(15, 'Portofolio_Pictures/p15.png', 'Relaxed And Fun Summer Wedding'),
(16, 'Portofolio_Pictures/p16.png', 'The Ultimate Elopment Packing List');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `surname` varchar(30) NOT NULL,
  `age` int(11) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `roli` varchar(20) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `surname`, `age`, `email`, `password`, `roli`) VALUES
(1, 'Ela', 'Doe', 29, 'eladoe@gmail.com', 'elaa123', 'admin'),
(2, 'Drena', 'Muja', 28, 'drenamuja@gmail.com', 'drena123', 'admin'),
(3, 'Arta', 'Selimaj', 22, 'artas@gmail.com', 'arta99', 'user'),
(4, 'Andi', 'Cenaj', 19, 'andicenaj@gmail.com', 'cenaj567', 'user'),
(5, 'Nora', 'Kurti', 23, 'norak@gmail.com', 'norak11', 'user'),
(6, 'Elsa', 'Murati', 25, 'elsamurati@gmail.com', 'murati98', 'user'),
(7, 'Liam', 'Kapllani', 27, 'liamm@gmail.com', 'liamk22', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `portofolio`
--
ALTER TABLE `portofolio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `portofolio`
--
ALTER TABLE `portofolio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
