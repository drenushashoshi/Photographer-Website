-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2024 at 11:48 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

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
  `description` text NOT NULL,
  `last_edited_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `portofolio`
--

INSERT INTO `portofolio` (`id`, `image_path`, `description`, `last_edited_by`) VALUES
(1, 'Portofolio_Pictures/p1.png', 'Eloping In Utah. Here\'s 7 Places to Say I Do!', 1),
(2, 'Portofolio_Pictures/p2.png', 'Jack & Briey | Greatt Salt Lake', 1),
(3, 'Portofolio_Pictures/p3.png', 'Yosemite National Park Intimate Wedding', NULL),
(4, 'Portofolio_Pictures/p4.png', 'Ela & Dallin | First Look', NULL),
(5, 'Portofolio_Pictures/p5.png', 'Hannah & Stephanie | Patagonia Elopment', NULL),
(6, 'Portofolio_Pictures/p6.png', 'Selena & Jonathan | Zion National Park', NULL),
(7, 'Portofolio_Pictures/p7.png', 'Meghan & Nanu | Redwoods', 1),
(8, 'Portofolio_Pictures/p8.png', 'Karen & Ben | National Park', NULL),
(9, 'Portofolio_Pictures/p9.png', 'Mollie & Drew | Moody PNW Couples Session', NULL),
(10, 'Portofolio_Pictures/p10.png', 'By The Sea | Greece', NULL),
(11, 'Portofolio_Pictures/p11.png', 'Somewhere, Someone Took A Pic Of The Sunset', NULL),
(12, 'Portofolio_Pictures/p12.png', 'WildFlower Adventure Session', NULL),
(13, 'Portofolio_Pictures/p13.png', 'Al & Ben | Adventurous Couples Shoot', NULL),
(14, 'Portofolio_Pictures/p14.png', 'Shrine Pass Hut Summer Wedding', NULL),
(15, 'Portofolio_Pictures/p15.png', 'Relaxed And Fun Summer Wedding', NULL),
(16, 'Portofolio_Pictures/p16.png', 'The Ultimate Elopment Packing List', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `portofolio_couples`
--

CREATE TABLE `portofolio_couples` (
  `id` int(11) NOT NULL,
  `image_path` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL,
  `last_edited_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `portofolio_couples`
--

INSERT INTO `portofolio_couples` (`id`, `image_path`, `description`, `last_edited_by`) VALUES
(1, 'Portofolio_Pictures/Couples/Couples1.jpg', 'WILDFLOWER ADVENTURE SESSIONS | LARA & SCOTTIE', 1),
(2, 'Portofolio_Pictures/Couples/Couples2.jpg', 'ASHLEY & ALEX | WILDFLOWER ENGAGEMENT PHOTOS', 1),
(3, 'Portofolio_Pictures/Couples/Couples3.jpg', 'AL & BEN | ADVENTUROUS COUPLES SHOOT', NULL),
(4, 'Portofolio_Pictures/Couples/Couples10.png', 'MOLIE & DREW | MOODY PNW COUPLES SESSION', 1),
(5, 'Portofolio_Pictures/Couples/Couples4.jpg', 'EMILY & DYLAN | CANYONLANDS NATIONAL PARK ENGAGEMENTS', NULL),
(6, 'Portofolio_Pictures/Couples/Couples5.jpg', 'KAREN & BEN | JOSHUA TREE NATIONAL PARK', NULL),
(7, 'Portofolio_Pictures/Couples/Couples6.jpg', 'MEAGAN & NANU PROPOSAL STORY | PROVO, UTAH', NULL),
(8, 'Portofolio_Pictures/Couples/Couples7.png', 'BROOKE & JONATHAN | PALM SPRINGS, CA', NULL),
(9, 'Portofolio_Pictures/Couples/Couples8.png', 'MOUNTAIN ENGAGEMENT SESSION | AUDREY + CONNOR', NULL),
(10, 'Portofolio_Pictures/Couples/Couples9.png', 'VAIL VILLAGE WINTER ELOPEMENT | SAM + JARED', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `portofolio_nature`
--

CREATE TABLE `portofolio_nature` (
  `id` int(11) NOT NULL,
  `image_path` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL,
  `last_edited_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `portofolio_nature`
--

INSERT INTO `portofolio_nature` (`id`, `image_path`, `description`, `last_edited_by`) VALUES
(1, 'Portofolio_Pictures/Nature/Nature1.png', 'HURRICANE RIDGE AMAZING VIEW', NULL),
(2, 'Portofolio_Pictures/Nature/Nature2.png', 'MOUNT ADAMS VIEW FROM TRAIN', 1),
(3, 'Portofolio_Pictures/Nature/Nature3.png', 'CANNON BEACH UNDER SMOG', NULL),
(4, 'Portofolio_Pictures/Nature/Nature4.png', 'MOUNT OLYMPUS POINT OF VIEW', NULL),
(5, 'Portofolio_Pictures/Nature/Nature5.png', 'SOL DUC FALLS DURING SPRING', NULL),
(6, 'Portofolio_Pictures/Nature/Nature6.png', 'RESURRECTION RIVER', NULL),
(7, 'Portofolio_Pictures/Nature/Nature7.png', 'SKATEBOARDING IN THE STREETS OF CALIFORNIA', NULL),
(8, 'Portofolio_Pictures/Nature/Nature8.png', 'MORNING GLOW IN SNOW', NULL),
(9, 'Portofolio_Pictures/Nature/Nature9.png', 'COLUMBIA RIVER GORGE HOUSE', NULL),
(10, 'Portofolio_Pictures/Nature/Nature10.png', 'FIDALGO ISLAND', NULL);

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
(4, 'Amar', 'Cenaj', 19, 'andicenaj@gmail.com', 'cenaj567', 'user'),
(9, 'Nora', 'Kurti', 22, 'norak@gmail.com', 'norak11', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `portofolio_couples`
--
ALTER TABLE `portofolio_couples`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portofolio_nature`
--
ALTER TABLE `portofolio_nature`
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
-- AUTO_INCREMENT for table `portofolio_couples`
--
ALTER TABLE `portofolio_couples`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `portofolio_nature`
--
ALTER TABLE `portofolio_nature`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
