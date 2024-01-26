-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2024 at 06:31 PM
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
-- Table structure for table `contact_form_data`
--

CREATE TABLE `contact_form_data` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `fiance_first_name` varchar(50) NOT NULL,
  `fiance_last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `event_date` date NOT NULL,
  `event_type` varchar(20) NOT NULL,
  `event_location` varchar(255) NOT NULL,
  `guests` varchar(20) NOT NULL,
  `love_story` text NOT NULL,
  `contact_method` varchar(20) NOT NULL,
  `how_found` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_form_data`
--

INSERT INTO `contact_form_data` (`id`, `first_name`, `last_name`, `fiance_first_name`, `fiance_last_name`, `email`, `phone`, `event_date`, `event_type`, `event_location`, `guests`, `love_story`, `contact_method`, `how_found`) VALUES
(7, 'Nora', 'Krasniqi', 'Arton ', 'Hoti', 'norak@gmail.com', '044500500', '2024-12-30', 'wedding', 'Diamond Hotel', '200-300', 'We are engaged and planning to get married in Decemeber', 'email', 'google'),
(8, 'Bleard', 'Kadrija', 'Serxhan', 'Kadrija', 'bkadrija@gmail.com', '044430223', '2024-04-30', 'engagement', 'Restaurant Lulja', '100-200', 'We are planning a big engagement party.', 'phone', 'referral'),
(9, 'Arta', 'Selimaj', 'Arton ', 'Selmani', 'artas@gmail.com', '045667452', '2024-06-05', 'other', 'Restaurant Luxury', '20-50', 'I have a birthday party and i want a photoshoot ', 'email', 'social-media'),
(10, 'Manushaqe', 'Gashi', 'Bardh', 'Blakaj', 'mana@gmail.com', '045667452', '2024-12-31', 'other', 'Cloud Lounge', '20-50', 'New Year\'s party with my fiance and our friends', 'phone', 'referral');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter_subscribers`
--

CREATE TABLE `newsletter_subscribers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `newsletter_subscribers`
--

INSERT INTO `newsletter_subscribers` (`id`, `name`, `email`) VALUES
(1, 'Ema', 'ema@gmail.com'),
(9, 'Drena', 'Drena@hotmail.com'),
(10, 'Leta', 'Leta@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `portofolio`
--

CREATE TABLE `portofolio` (
  `id` int(11) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `last_edited_by` int(11) DEFAULT NULL,
  `added_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `portofolio`
--

INSERT INTO `portofolio` (`id`, `image_path`, `description`, `last_edited_by`, `added_by`) VALUES
(1, 'Portofolio_Pictures/p1.png', 'Eloping In Utah. Here\'s 7 Places to Say I Do!', 1, NULL),
(2, 'Portofolio_Pictures/p2.png', 'Jack & Briey | Greatt Salt Lake', 1, NULL),
(3, 'Portofolio_Pictures/p3.png', 'Yosemite National Park Intimate Wedding', NULL, NULL),
(4, 'Portofolio_Pictures/p4.png', 'Ela & Dallin | First Look', NULL, NULL),
(5, 'Portofolio_Pictures/p5.png', 'Hannah & Stephanie | Patagonia Elopment', NULL, NULL),
(6, 'Portofolio_Pictures/p6.png', 'Selena & Jonathan | Zion National Park', NULL, NULL),
(7, 'Portofolio_Pictures/p7.png', 'Meghan & Nanu | Redwoods', 1, NULL),
(8, 'Portofolio_Pictures/p8.png', 'Karen & Ben | National Park', NULL, NULL),
(9, 'Portofolio_Pictures/p9.png', 'Mollie & Drew | Moody PNW Couples Session', NULL, NULL),
(10, 'Portofolio_Pictures/p10.png', 'By The Sea | Greece', NULL, NULL),
(11, 'Portofolio_Pictures/p11.png', 'Somewhere, Someone Took A Pic Of The Sunset', NULL, NULL),
(12, 'Portofolio_Pictures/p12.png', 'WildFlower Adventure Session', NULL, NULL),
(13, 'Portofolio_Pictures/p13.png', 'Al & Ben | Adventurous Couples Shoot', NULL, NULL),
(14, 'Portofolio_Pictures/p14.png', 'Shrine Pass Hut Summer Wedding', NULL, NULL),
(15, 'Portofolio_Pictures/p15.png', 'Relaxed And Fun Summer Wedding', NULL, 2),
(32, 'Portofolio_Pictures/p16.png', 'The Ultimate Elopment Packing List', NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `portofolio_couples`
--

CREATE TABLE `portofolio_couples` (
  `id` int(11) NOT NULL,
  `image_path` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL,
  `last_edited_by` int(11) DEFAULT NULL,
  `added_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `portofolio_couples`
--

INSERT INTO `portofolio_couples` (`id`, `image_path`, `description`, `last_edited_by`, `added_by`) VALUES
(1, 'Portofolio_Pictures/Couples/Couples1.jpg', 'WILDFLOWER ADVENTURE SESSIONS | LARA & SCOTTIE', 1, NULL),
(2, 'Portofolio_Pictures/Couples/Couples2.jpg', 'ASHLEY & ALEX | WILDFLOWER ENGAGEMENT PHOTOS', 1, NULL),
(3, 'Portofolio_Pictures/Couples/Couples3.jpg', 'AL & BEN | ADVENTUROUS COUPLES SHOOT', NULL, NULL),
(4, 'Portofolio_Pictures/Couples/Couples10.png', 'MOLIE & DREW | MOODY PNW COUPLES SESSION', 1, NULL),
(5, 'Portofolio_Pictures/Couples/Couples4.jpg', 'EMILY & DYLAN | CANYONLANDS NATIONAL PARK ENGAGEMENTS', NULL, NULL),
(6, 'Portofolio_Pictures/Couples/Couples5.jpg', 'KAREN & BEN | JOSHUA TREE NATIONAL PARK', NULL, NULL),
(7, 'Portofolio_Pictures/Couples/Couples6.jpg', 'MEAGAN & NANU PROPOSAL STORY | PROVO, UTAH', NULL, NULL),
(8, 'Portofolio_Pictures/Couples/Couples7.png', 'BROOKE & JONATHAN | PALM SPRINGS, CA', NULL, NULL),
(9, 'Portofolio_Pictures/Couples/Couples8.png', 'MOUNTAIN ENGAGEMENT SESSION | AUDREY + CONNOR', NULL, NULL),
(10, 'Portofolio_Pictures/Couples/Couples9.png', 'VAIL VILLAGE WINTER ELOPEMENT | SAM + JARED', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `portofolio_nature`
--

CREATE TABLE `portofolio_nature` (
  `id` int(11) NOT NULL,
  `image_path` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL,
  `last_edited_by` int(11) DEFAULT NULL,
  `added_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `portofolio_nature`
--

INSERT INTO `portofolio_nature` (`id`, `image_path`, `description`, `last_edited_by`, `added_by`) VALUES
(1, 'Portofolio_Pictures/Nature/Nature1.png', 'HURRICANE RIDGE AMAZING VIEW', NULL, NULL),
(2, 'Portofolio_Pictures/Nature/Nature2.png', 'MOUNT ADAMS VIEW FROM TRAIN', 1, NULL),
(3, 'Portofolio_Pictures/Nature/Nature3.png', 'CANNON BEACH UNDER SMOG', NULL, NULL),
(4, 'Portofolio_Pictures/Nature/Nature4.png', 'MOUNT OLYMPUS POINT OF VIEW', NULL, NULL),
(5, 'Portofolio_Pictures/Nature/Nature5.png', 'SOL DUC FALLS DURING SPRING', NULL, NULL),
(6, 'Portofolio_Pictures/Nature/Nature6.png', 'RESURRECTION RIVER', NULL, NULL),
(7, 'Portofolio_Pictures/Nature/Nature7.png', 'SKATEBOARDING IN THE STREETS OF CALIFORNIA', NULL, NULL),
(8, 'Portofolio_Pictures/Nature/Nature8.png', 'MORNING GLOW IN SNOW', NULL, NULL),
(9, 'Portofolio_Pictures/Nature/Nature9.png', 'COLUMBIA RIVER GORGE HOUSE', NULL, NULL),
(10, 'Portofolio_Pictures/Nature/Nature10.png', 'FIDALGO ISLAND', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `portofolio_weddings`
--

CREATE TABLE `portofolio_weddings` (
  `id` int(11) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `last_edited_by` int(11) DEFAULT NULL,
  `added_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `portofolio_weddings`
--

INSERT INTO `portofolio_weddings` (`id`, `description`, `image_path`, `last_edited_by`, `added_by`) VALUES
(1, 'Eloping In Utah? Here\'s 7 Places to Say I Do!', 'Portofolio_Pictures/Weddings/p1.png', NULL, NULL),
(2, 'Jack & Brie | Great Salt Lake', 'Portofolio_Pictures/Weddings/p2.png', NULL, NULL),
(3, 'Mike&Kelsy | West Desert Elopement', 'Portofolio_Pictures/Weddings/p3.png', 2, NULL),
(4, 'Selena & Jonathan | Zion National Park', 'Portofolio_Pictures/Weddings/p4.png', NULL, NULL),
(5, 'Ela & Dallin | First Look', 'Portofolio_Pictures/Weddings/p5.png', NULL, NULL),
(6, 'Audrey & Connor | Stanley, Idaho', 'Portofolio_Pictures/Weddings/p6.png', NULL, NULL),
(7, 'Candid Winter Wedding | Vail, Colorado', 'Portofolio_Pictures/Weddings/p7.png', NULL, NULL),
(8, 'Shelby & Aaron | Non-Traditional Wedding', 'Portofolio_Pictures/Weddings/p8.png', NULL, NULL),
(9, 'The Manor House | The Manor House Wedding', 'Portofolio_Pictures/Weddings/p9.png', NULL, NULL),
(10, 'Micah & Taylor | Union On 8th Winter Wedding', 'Portofolio_Pictures/Weddings/p10.png', NULL, NULL),
(11, 'Broch & Wajiha | Prospect House Wedding', 'Portofolio_Pictures/Weddings/p11.png', NULL, NULL),
(12, 'Krista & Denise | Ma Maison Wedding', 'Portofolio_Pictures/Weddings/p12.png', NULL, NULL),
(13, 'Taylor & Taylor | Hacienda Del Ago', 'Portofolio_Pictures/Weddings/p13.png', NULL, NULL),
(14, 'Hannah & Stephanie | Patagonia Elopment', 'Portofolio_Pictures/Weddings/p14.png', NULL, NULL),
(15, 'Ela & Jack | Great Salt Lake First Look', 'Portofolio_Pictures/Weddings/p15.png', NULL, NULL),
(16, 'Mauri & Kenna | Monument Valley, UT', 'Portofolio_Pictures/Weddings/p16.png', NULL, NULL);

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
(9, 'Nora', 'Kurti', 22, 'norak@gmail.com', 'norak11', 'user'),
(11, 'Petrit', 'Shoshi', 30, 'petritsh@gmail.com', 'shoshi12', 'user'),
(13, 'Teuta', 'Dervishi', 26, 'teutad@gmail.com', 'teuta44', 'user'),
(14, 'Liamra', 'Maraj', 29, 'liamra@gmail.com', 'liamra99', 'user'),
(17, 'Delfina', 'Krasniqi', 30, 'delfinak@gmail.com', 'delfi22', 'user'),
(21, 'Erion', 'Mustafa', 22, 'erion@gmail.com', 'eri17', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact_form_data`
--
ALTER TABLE `contact_form_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletter_subscribers`
--
ALTER TABLE `newsletter_subscribers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `portofolio`
--
ALTER TABLE `portofolio`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `portofolio_weddings`
--
ALTER TABLE `portofolio_weddings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `last_edit_by` (`last_edited_by`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact_form_data`
--
ALTER TABLE `contact_form_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `newsletter_subscribers`
--
ALTER TABLE `newsletter_subscribers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `portofolio`
--
ALTER TABLE `portofolio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

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
-- AUTO_INCREMENT for table `portofolio_weddings`
--
ALTER TABLE `portofolio_weddings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `portofolio_weddings`
--
ALTER TABLE `portofolio_weddings`
  ADD CONSTRAINT `portofolio_weddings_ibfk_1` FOREIGN KEY (`last_edited_by`) REFERENCES `web15`.`user` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
