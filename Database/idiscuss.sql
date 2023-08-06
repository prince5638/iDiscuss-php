-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2023 at 08:36 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `idiscuss`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(8) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_description` varchar(255) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `category_description`, `created`) VALUES
(1, 'Python', 'Python is a high-level, general-purpose programming language. Its design philosophy emphasizes code readability with the use of significant indentation via the off-side rule. Python is dynamically typed and garbage-collected. ', '2023-04-17 15:18:48'),
(2, 'JavaScript', 'JavaScript, often abbreviated as JS, is a programming language that is one of the core technologies of the World Wide Web, alongside HTML and CSS.', '2023-04-17 15:20:09'),
(3, 'Django\r\n', 'Django is a free and open-source, Python-based web framework that follows the model–template–views architectural pattern. It is maintained by the Django Software Foundation, an independent organization established in the US as a 501 non-profit.', '2023-04-17 18:32:32'),
(4, 'PHP', 'PHP is a general-purpose scripting language geared toward web development. It was originally created by Danish-Canadian programmer Rasmus Lerdorf in 1993 and released in 1995. The PHP reference implementation is now produced by The PHP Group.', '2023-04-17 18:33:16');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(8) NOT NULL,
  `comment_content` text NOT NULL,
  `thread_id` int(8) NOT NULL,
  `comment_by` int(8) NOT NULL,
  `comment_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_content`, `thread_id`, `comment_by`, `comment_time`) VALUES
(1, 'Try again by implementing all the steps carefully.', 1, 2, '2023-04-18 18:20:02'),
(5, 'Before installing please read the documentation for installing Pyaudio.', 1, 1, '2023-04-18 18:39:32'),
(6, 'try again\r\n', 1, 3, '2023-04-18 21:20:26'),
(7, 'You can run python code in google colab.', 3, 4, '2023-04-19 10:06:11'),
(8, 'Try again with another trick.', 5, 2, '2023-04-19 17:03:05'),
(9, 'ab to ho raha hai na.', 5, 2, '2023-04-19 17:26:14'),
(10, 'smit ki comment hai.', 5, 4, '2023-04-19 17:27:03'),
(11, 'Django is an python web-based framework.', 7, 2, '2023-04-19 17:32:43'),
(12, 'php is used for handling the backend part of the websites. ', 8, 6, '2023-04-19 19:19:55'),
(13, 'Just trying the exception\'s', 8, 3, '2023-04-19 19:25:09'),
(14, 'Here is the solution for your problem ------&gt;  &lt;?php echo \'Hello Guy\'s\'; ?&gt;\r\nReplace the \' with forward slash followed by \'.', 10, 6, '2023-04-19 19:30:27'),
(15, 'jvce uiekr iervt b kv', 11, 7, '2023-07-31 08:20:57');

-- --------------------------------------------------------

--
-- Table structure for table `threads`
--

CREATE TABLE `threads` (
  `thread_id` int(7) NOT NULL,
  `thread_title` varchar(255) NOT NULL,
  `thread_desc` text NOT NULL,
  `thread_cat_id` int(7) NOT NULL,
  `thread_user_id` int(7) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `threads`
--

INSERT INTO `threads` (`thread_id`, `thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `timestamp`) VALUES
(1, 'Unable to install Pyaudio.', 'I am not able to install Pyaudio in Window OS.', 1, 1, '2023-04-18 10:02:19'),
(2, 'Not able to install python.', 'Please help me!', 1, 2, '2023-04-18 11:17:16'),
(3, 'Where to run python code?', 'Is there any online platform for running the python code? ', 1, 4, '2023-04-18 17:34:18'),
(4, 'Why to use Python?', 'What are the uses of the python.', 1, 5, '2023-04-18 17:41:45'),
(5, 'Fetch API is not working', 'I am into trouble my fetch API is not working in Ms Edge.', 2, 3, '2023-04-18 17:47:21'),
(7, 'What is Django.', 'Why to use Django.', 3, 3, '2023-04-19 17:31:29'),
(8, 'What is PHP?', 'where to use php in web development. ', 4, 6, '2023-04-19 19:16:56'),
(10, 'Hoe to solve the below line of code ...', '&lt;?php echo \'Hello guy\'s\'; ?&gt;', 4, 3, '2023-04-19 19:27:35'),
(11, 'Can any one brief me about the framework of python?', 'Which are the python framework used mostly and for which purpose we need to use them.', 1, 2, '2023-05-22 07:21:45'),
(13, 'Make me learn python ?', 'Provide me an roadmap to learn an python.', 1, 8, '2023-08-06 13:18:56'),
(14, 'Hello World in python', 'How to run the code in python \"Hello World\"', 1, 8, '2023-08-06 17:40:57'),
(15, 'What is Django', 'Where it is use ?', 3, 9, '2023-08-06 17:44:50'),
(16, 'From were to learn the python', 'How to write an Hello World Program in python.', 1, 11, '2023-08-06 22:02:41');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `sno` int(8) NOT NULL,
  `user_email` varchar(30) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `timestamp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`sno`, `user_email`, `user_pass`, `timestamp`) VALUES
(1, 'test@test.com', '$2y$10$32So0.2hX4rpPnDOplSlmu327egDrqKuu8hfAhvvqa8ROOoPcn3K2', '2023-04-19 10:01:39'),
(2, 'prince@prince.com', '$2y$10$8ayqwEpxYtS1WfI91s0puO0tA3/JvsHRaKmJsdufUCK1xlyF5MhCG', '2023-04-19 10:04:09'),
(3, 'harry@harry.com', '$2y$10$yuxeNCi50Ur1exSmTymbm.KhiUYm6hO/qa.MSdhvc.eO1BPNZTw9.', '2023-04-19 10:11:25'),
(4, 'smit@smit.com', '$2y$10$.CAnepQYsltfz8VumLqZtu9oWQgrdPwHxsXOMY4KHMud7TFq4fTEy', '2023-04-19 10:14:13'),
(5, 'sanat@sanat.com', '$2y$10$Zd414rLIc672wFg0DTyNMuVLASlOCASbAahJQcdrYDxB9YHPD8lQK', '2023-04-19 11:38:30'),
(6, 'Prince', '$2y$10$am3SCFNafHSSVkeSEFjIZets00cUdOnR8Cy.OQg.FcC0b6rYzN3Ha', '2023-04-19 19:15:46'),
(7, 'meet@123', '$2y$10$r7VgHqHe4DVkFyCk6LiuzerTfs.QHd7UGFEij0UZy0diKQYtq7LyG', '2023-07-30 23:15:02'),
(8, 'PrinceChangani', '$2y$10$PqYgYlKYeWFhA3jqzD9SZOUR9XmLkOkHiVgRn8/bpW.BwGcFMg.km', '2023-08-06 13:17:42'),
(9, 'MeetPaladiya', '$2y$10$LnfDPvUn1X2HvUaslqFnce2UJopPADHtwVY0sAsy5TcL.xvUvysdK', '2023-08-06 17:43:45'),
(10, 'Test', '$2y$10$lYcUS2S0PIosGqEnsaL/auJpi56vXsqrYAG45l/wdTaiQj1k3u0FC', '2023-08-06 21:56:48'),
(11, 'Test@123', '$2y$10$yL1H11Gz7rjShP5fr1KQwu8Cz8NNSOZlpt5gVSPj4ngMSG/2Y8f8m', '2023-08-06 22:01:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `threads`
--
ALTER TABLE `threads`
  ADD PRIMARY KEY (`thread_id`);
ALTER TABLE `threads` ADD FULLTEXT KEY `thread_title` (`thread_title`,`thread_desc`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `threads`
--
ALTER TABLE `threads`
  MODIFY `thread_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `sno` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
