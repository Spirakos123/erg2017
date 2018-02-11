-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2018 at 09:23 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vasso`
--

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `id` int(11) NOT NULL,
  `lesson_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `grade` int(10) NOT NULL,
  `examined` tinyint(4) UNSIGNED DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`id`, `lesson_id`, `user_id`, `grade`, `examined`) VALUES
(1, 1, 2, 3, 1),
(2, 3, 2, 10, 1),
(3, 5, 2, 0, 0),
(4, 6, 2, 0, 0),
(10, 1, 4, 8, 1),
(11, 3, 4, 6, 1),
(12, 1, 5, 7, 1),
(13, 3, 5, 7, 1),
(14, 2, 2, 10, 1),
(15, 2, 4, 7, 1),
(16, 2, 5, 3, 1),
(17, 1, 14, 0, 0),
(18, 2, 14, 0, 0),
(19, 3, 14, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `have_questions`
--

CREATE TABLE `have_questions` (
  `question_id` int(11) NOT NULL,
  `lesson_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `have_questions`
--

INSERT INTO `have_questions` (`question_id`, `lesson_id`) VALUES
(1, 1),
(2, 1),
(4, 1),
(5, 1),
(6, 1),
(1, 2),
(2, 2),
(3, 2),
(1, 3),
(2, 3),
(4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `lessons`
--

CREATE TABLE `lessons` (
  `id` int(11) NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `lessons`
--

INSERT INTO `lessons` (`id`, `title`) VALUES
(1, 'Μαθηματικα'),
(2, 'Φυσική'),
(3, 'Πληροφορική'),
(4, 'Τεχνητή Νοημοσύνη'),
(5, 'Ψηφιακά Συστήματα'),
(6, 'Συστήματα Αυτομάτου Ελέγχου');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `kind_question` text COLLATE utf8_unicode_ci NOT NULL,
  `answer` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `title`, `kind_question`, `answer`) VALUES
(1, '1+1=3;', 'Sosto/lathos', 'Λ'),
(2, '5+5=10;', 'Sosto/lathos', 'Σ'),
(3, 'Πόσο κάνει 5+5;', 'pollaplis', '10'),
(4, '5+3=7;', 'Sosto/lathos', 'Λ'),
(5, '5+8=13;', 'Sosto/lathos', 'Σ'),
(6, '5+5=11;', 'Sosto/lathos', 'Λ');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` text COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `role` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `username`, `password`, `role`) VALUES
(1, 'vasso', 'δδδ', 'vasso.fitrou@gmail.com', 'vasso', '$2y$10$y9IVeybFcCKR8Kt.G23KduVlMadUlsIDhE/1YDPI3V8PLJEmyG7SO', 'admin'),
(2, 'tzina', '22', 'vasso.fitrou@gmail.com', 'tzina', '$2y$10$ObmfOG9U5MwQ/N1REt8iIus1U0n7/meAls0PXJoOVA4sZcfhKmpkG', 'user'),
(4, 'spiros', 'malakas123', 'test@mail.com', 'paparas', '$2y$10$6P27zj59DLCTdGgL5wkOi.NLwCWV8zgZstivGtOdemi72ROZ.kACC', 'user'),
(5, 'spiros2', 'malakas2', 'test2@mail.com', 'paparas2', '123', 'user'),
(6, 'argyris2', 'touvlo', 'arg@mail.com', 'mpeto', '123', 'user'),
(7, 'kwstas', 'pagkozidis', 'kpagk@gmail.com', 'lala', '123', 'user'),
(8, 'gsdr', 'fgs', 'fsfdfsf@gmail.com', 'sfsfsfsf', '123', 'user'),
(9, 'fxdrghdf', 'ghffgfg', 'ghghhg@gmail.com', 'spirakos', '123', 'user'),
(10, 'gvhfg', 'fghfgh', 'xdfjkm@gmail.com', 'mike', '123', 'user'),
(11, 's', 's', 'test@mail.com', 'pipis', '123', 'user'),
(13, 'ss', 'ss', 'test2@mail.com', 'pipis2', '$2y$10$OKTnIqxth.2JCdY5S1qoZuupuqetkeoVHP11nGcQa3N', 'user'),
(14, 'ss', 'ss', 'test3@mail.com', 'pipis3', '123', 'user'),
(15, 'kwstas', 'malaka2222', 'test@mail.com', 'kp', '$2y$10$OEpDUw1.uaZEscLbQMlE.ev9iahkBZkogbZ6cJ4oHRhTpaZfs5Rcm', 'user'),
(16, 'kwstas', 'malakas2', 'test@mail.com', 'kp2', '123', 'user'),
(17, 'lalala', 'fdavjyhvbjh', 'rerte@mail.com', 'test', '$2y$10$idWhBApfu2oJVaH8qZPFNunBeg71twCAe3qp2cmyrnuPzWdCaF6sO', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `lesson_id` (`lesson_id`);

--
-- Indexes for table `have_questions`
--
ALTER TABLE `have_questions`
  ADD KEY `question_id` (`question_id`),
  ADD KEY `lesson_id` (`lesson_id`);

--
-- Indexes for table `lessons`
--
ALTER TABLE `lessons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
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
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `lessons`
--
ALTER TABLE `lessons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `grades`
--
ALTER TABLE `grades`
  ADD CONSTRAINT `lessonId` FOREIGN KEY (`lesson_id`) REFERENCES `lessons` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `userId` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `have_questions`
--
ALTER TABLE `have_questions`
  ADD CONSTRAINT `have_questions_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`),
  ADD CONSTRAINT `have_questions_ibfk_2` FOREIGN KEY (`lesson_id`) REFERENCES `lessons` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
