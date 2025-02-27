-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2025 at 03:53 PM
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
-- Database: `login_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `subject`, `message`) VALUES
(1, 'Ajay', 'ajay@gmail.com', 'qdeeas', 'dsgffhgjhmhjm');

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `id` int(11) NOT NULL,
  `images` text NOT NULL,
  `type` varchar(50) NOT NULL,
  `sq_ft` int(11) NOT NULL,
  `description` text NOT NULL,
  `features` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`id`, `images`, `type`, `sq_ft`, `description`, `features`, `price`, `created_at`) VALUES
(9, '1738941046_67a62276165cb.jpg,1738941046_67a6227616840.jpg,1738941046_67a6227616a07.jpg', 'Villa', 44, '', 'JKLMNOP', 48.00, '2025-02-07 15:10:46'),
(10, '1738941290_67a6236a6888b.jpg,1738941290_67a6236a68a61.jpg,1738941290_67a6236a68c2f.jpg', '2 BHK', 48, '', 'JKLMNOP', 47.00, '2025-02-07 15:14:50'),
(11, '1738941656_67a624d899334.jpeg,1738941656_67a624d8994a0.jpeg,1738941656_67a624d899634.jpeg', '2 BHK', 12, '', 'sdozifbnset', 12.00, '2025-02-07 15:20:56'),
(12, '1738941763_67a62543b0af5.jpg,1738941763_67a62543b0dd8.jpg,1738941763_67a62543b0f28.jpg', '1 BHK', 122, '', 'zdsijf', 56.00, '2025-02-07 15:22:43'),
(13, '1738942086_67a62686ec8cc.jpg,1738942086_67a62686eca60.jpg,1738942086_67a62686ecbd8.jpg', '1 BHK', 12, '', 'aebteaf', 46.00, '2025-02-07 15:28:06'),
(14, '1738942199_67a626f76a624.jpeg,1738942199_67a626f76a808.jpeg,1738942199_67a626f76a979.png', '1 BHK', 132, '', 'sdvijns', 23.00, '2025-02-07 15:29:59'),
(15, '1738943413_67a62bb5cb796.jpg,1738943413_67a62bb5cb96c.jpg,1738943413_67a62bb5cf4f6.jpg,1738943413_67a62bb5cf684.jpg', '3 BHK', 34, '', 'JKLMNOP', 45.00, '2025-02-07 15:50:13'),
(16, '1738943744_67a62d00b8aa8.jpeg,1738943744_67a62d00b8d99.jpeg,1738943744_67a62d00b8f8a.jpeg', '2 BHK', 45, '', 'sdozifbnset', 58.00, '2025-02-07 15:55:44'),
(17, '1738943744_67a62d00b8aa8.jpeg,1738943744_67a62d00b8d99.jpeg,1738943744_67a62d00b8f8a.jpeg', '2 BHK', 45, '', 'sdozifbnset', 58.00, '2025-02-07 15:55:44'),
(18, '1738944689_67a630b1caf59.jpeg,1738944689_67a630b1cb197.jpeg,1738944689_67a630b1cb398.jpeg,1738944689_67a630b1ceee5.png', '1 BHK', 45, '', 'FGHIJ', 48.00, '2025-02-07 16:11:29'),
(19, '1738944689_67a630b1caf59.jpeg,1738944689_67a630b1cb197.jpeg,1738944689_67a630b1cb398.jpeg,1738944689_67a630b1ceee5.png', '1 BHK', 45, '', 'FGHIJ', 48.00, '2025-02-07 16:11:29'),
(20, '1738947095_67a63a176e49f.jpg,1738947095_67a63a176e6ce.jpg,1738947095_67a63a176e878.jpg', '1 BHK', 25, '', 'zdsijf', 98.00, '2025-02-07 16:51:35'),
(21, '1738947095_67a63a176e49f.jpg,1738947095_67a63a176e6ce.jpg,1738947095_67a63a176e878.jpg', '1 BHK', 25, '', 'zdsijf', 98.00, '2025-02-07 16:51:35'),
(22, '1738947164_67a63a5cc053c.jpg,1738947164_67a63a5cc08aa.jpg,1738947164_67a63a5cc0a7f.jpg', '2 BHK', 45, '', 'sdve', 78.00, '2025-02-07 16:52:44'),
(23, '1738947164_67a63a5cc053c.jpg,1738947164_67a63a5cc08aa.jpg,1738947164_67a63a5cc0a7f.jpg', '2 BHK', 45, '', 'sdve', 78.00, '2025-02-07 16:52:44'),
(24, '1738947527_67a63bc7a25fd.jpg,1738947527_67a63bc7a2902.jpg,1738947527_67a63bc7a2ae7.jpg,1738947527_67a63bc7a2c89.jpg,1738947527_67a63bc7a2e38.jpg', '2 BHK', 12, '', 'Fully Furnished and Wifi', 56.00, '2025-02-07 16:58:47'),
(25, '1738947527_67a63bc7a25fd.jpg,1738947527_67a63bc7a2902.jpg,1738947527_67a63bc7a2ae7.jpg,1738947527_67a63bc7a2c89.jpg,1738947527_67a63bc7a2e38.jpg', '2 BHK', 12, '', 'Fully Furnished and Wifi', 56.00, '2025-02-07 16:58:47'),
(26, '1738947669_67a63c5539c6a.jpg,1738947669_67a63c5539f75.jpg,1738947669_67a63c553a1c1.jpg', '1 BHK', 23, '', 'A house stands tall, a shelter from the storm, its walls embracing the warmth of family within. With each creak and groan, it whispers stories of lives lived and memories made.', 56.00, '2025-02-07 17:01:09'),
(27, '1738947669_67a63c5539c6a.jpg,1738947669_67a63c5539f75.jpg,1738947669_67a63c553a1c1.jpg', '1 BHK', 23, '', 'A house stands tall, a shelter from the storm, its walls embracing the warmth of family within. With each creak and groan, it whispers stories of lives lived and memories made.', 56.00, '2025-02-07 17:01:09'),
(28, '1738948285_67a63ebd23653.jpeg,1738948285_67a63ebd23863.jpeg,1738948285_67a63ebd239e5.jpeg', '1 BHK', 45, '', 'A house stands tall, a shelter from the storm, its walls embracing the warmth of family within. With each creak and groan, it whispers stories of lives lived and memories made.', 48.00, '2025-02-07 17:11:25'),
(29, '1738948285_67a63ebd23653.jpeg,1738948285_67a63ebd23863.jpeg,1738948285_67a63ebd239e5.jpeg', '1 BHK', 45, '', 'A house stands tall, a shelter from the storm, its walls embracing the warmth of family within. With each creak and groan, it whispers stories of lives lived and memories made.', 48.00, '2025-02-07 17:11:25'),
(30, '1738948926_67a6413e78d81.jpg,1738948926_67a6413e78f87.jpg,1738948926_67a6413e7bfd6.jpg,1738948926_67a6413e7c1ba.jpg', 'Villa', 46, '', 'A house stands tall, a shelter from the storm, its walls embracing the warmth of family within. With each creak and groan, it whispers stories of lives lived and memories made.', 48.00, '2025-02-07 17:22:06'),
(31, '1738948926_67a6413e78d81.jpg,1738948926_67a6413e78f87.jpg,1738948926_67a6413e7bfd6.jpg,1738948926_67a6413e7c1ba.jpg', 'Villa', 46, '', 'A house stands tall, a shelter from the storm, its walls embracing the warmth of family within. With each creak and groan, it whispers stories of lives lived and memories made.', 48.00, '2025-02-07 17:22:06'),
(32, '1738949341_67a642dd29fe3.jpeg,1738949341_67a642dd2a157.jpeg,1738949341_67a642dd2a300.jpeg', '1 BHK', 46, 'A house stands tall, a shelter from the storm, its walls embracing the warmth of family within. With each creak and groan, it whispers stories of lives lived and memories made.', 'Fully Furnished and Wifi', 54.00, '2025-02-07 17:29:01'),
(33, '1738950619_67a647db02f1e.jpeg,1738950619_67a647db031e8.jpg,1738950619_67a647db03395.jpg,1738950619_67a647db03549.jpg', '3 BHK', 77, 'Balcony etc', 'Furnished', 89.00, '2025-02-07 17:50:19');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(6, 'reetam', 'reet@gmail.com', 'reet123'),
(10, 'abc', 'abc@gmail.com', '$2y$10$Mj492UXzAi7vyyERX.5VtuMcCMSk88iYMLyS3cLsSmOscovGHJb2q'),
(11, 'admin', 'admin@gmail.com', '$2y$10$SIWITC.vWhFhur85raeCHeY18WagVlP/0P8LS5Hxngb2wI9C1lSz2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
