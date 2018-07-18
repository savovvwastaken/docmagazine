-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2018 at 10:55 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `docmagazine`
--

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

DROP TABLE IF EXISTS `documents`;
CREATE TABLE `documents` (
  `id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `text` text COLLATE utf8_unicode_ci NOT NULL,
  `pic` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `doc` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `pay` int(5) NOT NULL,
  `status` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`id`, `date`, `name`, `text`, `pic`, `doc`, `pay`, `status`) VALUES
(7, '2018-07-17 18:54:01', 'Документ 1', 'Lorem Ipsum е елементарен примерен текст, използван в печатарската и типографската индустрия. ', 'pic_1531842841.jpg', 'doc1531842841.pdf', 1, 0),
(8, '2018-07-17 18:55:08', 'Документ 2', 'Lorem Ipsum е елементарен примерен текст, използван в печатарската и типографската индустрия. ', 'pic_1531842908.jpg', 'doc1531842908.pdf', 0, 0),
(9, '2018-07-17 22:25:34', 'Документ 3', 'Lorem Ipsum е елементарен примерен текст, използван в печатарската и типографската индустрия. ', 'pic_1531855534.jpg', 'doc1531855534.jpg', 1, 0),
(10, '2018-07-17 22:26:22', 'Документ 4', 'Lorem Ipsum е елементарен примерен текст, използван в печатарската и типографската индустрия. ', 'pic_1531855582.jpg', 'doc1531855582.docx', 1, 0),
(11, '2018-07-17 22:40:53', 'Документ 5', 'Lorem Ipsum е елементарен примерен текст, използван в печатарската и типографската индустрия. ', 'pic_1531856453.jpg', 'doc1531856453.jpg', 0, 0),
(12, '2018-07-17 22:41:32', 'Документ 6', 'Lorem Ipsum е елементарен примерен текст, използван в печатарската и типографската индустрия. ', 'pic_1531856492.jpg', 'doc1531856492.png', 1, 0),
(13, '2018-07-17 22:42:20', 'Документ 7', 'Lorem Ipsum е елементарен примерен текст, използван в печатарската и типографската индустрия. ', 'pic_1531856540.jpg', 'doc1531856540.jpg', 0, 0),
(14, '2018-07-17 22:44:18', 'Документ 8', 'Lorem Ipsum е елементарен примерен текст, използван в печатарската и типографската индустрия. ', 'pic_1531856658.jpg', 'doc1531856658.jpg', 1, 0),
(15, '2018-07-17 22:44:37', 'Документ 9', 'Lorem Ipsum е елементарен примерен текст, използван в печатарската и типографската индустрия. ', 'pic_1531856677.jpg', 'doc1531856677.jpg', 1, 0),
(16, '2018-07-17 22:45:14', 'Документ 10', 'Lorem Ipsum е елементарен примерен текст, използван в печатарската и типографската индустрия. ', 'pic_1531856714.jpg', 'doc1531856714.jpg', 1, 0),
(17, '2018-07-17 22:45:33', 'Документ 11', 'Lorem Ipsum е елементарен примерен текст, използван в печатарската и типографската индустрия. ', 'pic_1531856733.jpg', 'doc1531856733.jpg', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `documents_log`
--

DROP TABLE IF EXISTS `documents_log`;
CREATE TABLE `documents_log` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `doc_id` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `documents_log`
--

INSERT INTO `documents_log` (`id`, `user_id`, `doc_id`, `date`) VALUES
(1, 2, 17, '2018-07-17 23:26:15'),
(2, 2, 16, '2018-07-17 23:29:10'),
(3, 2, 12, '2018-07-17 23:29:17'),
(4, 2, 9, '2018-07-17 23:29:25'),
(5, 2, 7, '2018-07-17 23:29:36'),
(6, 1, 9, '2018-07-17 23:31:49');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `IP` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `uname` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `upass` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(5) NOT NULL,
  `link` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `subscription` int(5) NOT NULL,
  `date_subsr` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `date`, `IP`, `uname`, `upass`, `email`, `status`, `link`, `subscription`, `date_subsr`) VALUES
(1, '2018-07-16 23:16:23', '::1', 'admin', 'e4c051190770b33df58480f4ce34206f2cc9efe6', 'vpeykova@gmail.com', 1, '51OcICYmwKWjFX41915539105', 1, '0000-00-00 00:00:00'),
(2, '2018-07-17 17:22:50', '192.168.110.189', 'vera', 'ea62406305369ad787a22a1ca7d5a84288d410ae', 'vpeykova@abcbg.com', 1, 'NkJpbnGBDzE3wQC1842444018', 1, '2018-07-17 17:27:53');

-- --------------------------------------------------------

--
-- Table structure for table `users_log`
--

DROP TABLE IF EXISTS `users_log`;
CREATE TABLE `users_log` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_login` datetime NOT NULL,
  `date_logout` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users_log`
--

INSERT INTO `users_log` (`id`, `user_id`, `date_login`, `date_logout`) VALUES
(1, 1, '2018-07-16 23:44:03', '2018-07-16 23:56:04'),
(2, 1, '2018-07-16 23:49:59', '0000-00-00 00:00:00'),
(3, 1, '2018-07-16 23:57:49', '2018-07-17 00:18:39'),
(4, 1, '2018-07-17 00:20:07', '0000-00-00 00:00:00'),
(5, 1, '2018-07-17 17:21:03', '2018-07-17 17:22:32'),
(6, 2, '2018-07-17 17:27:53', '2018-07-17 18:11:44'),
(7, 1, '2018-07-17 18:11:50', '0000-00-00 00:00:00'),
(8, 1, '2018-07-17 22:24:00', '2018-07-17 22:35:42'),
(9, 1, '2018-07-17 22:40:10', '2018-07-17 22:47:39'),
(10, 2, '2018-07-17 22:47:48', '2018-07-17 23:09:38'),
(11, 2, '2018-07-17 23:26:09', '2018-07-17 23:31:22'),
(12, 1, '2018-07-17 23:31:29', '2018-07-17 23:34:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pay` (`pay`),
  ADD KEY `status` (`status`);

--
-- Indexes for table `documents_log`
--
ALTER TABLE `documents_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doc_id` (`doc_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `link` (`link`),
  ADD KEY `status` (`status`);

--
-- Indexes for table `users_log`
--
ALTER TABLE `users_log`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `documents_log`
--
ALTER TABLE `documents_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users_log`
--
ALTER TABLE `users_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
