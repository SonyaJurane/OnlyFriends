-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 24, 2020 at 03:58 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id15483164_members`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `from` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `message`, `from`, `created`) VALUES
(1, 'Hello', 'Jack Wang', '2020-11-24 01:45:09'),
(2, 'sup bro', 'Roisin Riddle', '2020-11-24 01:45:23'),
(3, 'how u doin', 'Roisin Riddle', '2020-11-24 01:45:25'),
(4, 'Doing fine', 'Jack Wang', '2020-11-24 01:45:33'),
(5, 'I just joined this app', 'John  Smith', '2020-11-24 01:46:27'),
(6, 'anyone make anyfriends yet?', 'John  Smith', '2020-11-24 01:46:36'),
(7, 'Yes', 'Jack Wang', '2020-11-24 01:46:46'),
(8, 'damn im lonely as hell', 'Bertha Warner', '2020-11-24 01:47:17'),
(9, 'havent left my house in 8 months', 'Bertha Warner', '2020-11-24 01:47:24'),
(10, 'me2', 'Jack Wang', '2020-11-24 01:50:05'),
(21, 'good evening gentleman', 'Billy Harry', '2020-11-24 03:43:59'),
(22, 'i hope everyone is doing well and dandy', 'Billy Harry', '2020-11-24 03:44:05');

-- --------------------------------------------------------

--
-- Table structure for table `dm`
--

CREATE TABLE `dm` (
  `id` int(11) NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `sender` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `recipient` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dm`
--

INSERT INTO `dm` (`id`, `message`, `sender`, `recipient`, `created`) VALUES
(1, 'hello', 'JackWang123', 'Roisin', '2020-11-24 01:47:56'),
(2, 'yo hello', 'VNikolasx', 'Johnsm', '2020-11-24 01:48:25'),
(3, 'hello ', 'VNikolasx', 'Roisin', '2020-11-24 01:48:53'),
(4, 'sup bro', 'Roisin', 'VNikolasx', '2020-11-24 01:48:56'),
(5, 'how u doin', 'Roisin', 'VNikolasx', '2020-11-24 01:48:58'),
(6, 'wassup', 'VNikolasx', 'Roisin', '2020-11-24 01:48:59'),
(7, 'lookin extra fat today', 'Roisin', 'VNikolasx', '2020-11-24 01:49:01'),
(8, 'no wtf im a football player u bitch', 'VNikolasx', 'Roisin', '2020-11-24 01:49:11'),
(9, 'sup jackman', 'Roisin', 'JackWang123', '2020-11-24 01:49:20'),
(10, 'u lookin extra thicc today as well', 'Roisin', 'JackWang123', '2020-11-24 01:49:25'),
(11, 'rip', 'JackWang123', 'Roisin', '2020-11-24 01:49:39'),
(12, 'test 123', 'Roisin', 'Tvick', '2020-11-24 01:50:10'),
(13, 'yo how u doing', 'Roisin', 'Tvick', '2020-11-24 01:50:17'),
(14, 'test', 'Roisin', 'Milesg', '2020-11-24 01:50:27'),
(15, 'test', 'Roisin', 'Milesg', '2020-11-24 01:50:27'),
(16, 'test', 'Roisin', 'Milesg', '2020-11-24 01:50:28'),
(17, 'mooo', 'Roisin', 'DanyalH', '2020-11-24 01:50:36'),
(18, 'you good', 'Roisin', 'DanyalH', '2020-11-24 01:50:37'),
(19, 'dfkasfasd', 'Roisin', 'TristanF', '2020-11-24 01:50:46'),
(20, 'dsadas', 'Roisin', 'TristanF', '2020-11-24 01:50:48'),
(21, 'sdadsadas', 'Roisin', 'HabibaCummings', '2020-11-24 01:50:55'),
(22, 'dsadasdas', 'Roisin', 'HabibaCummings', '2020-11-24 01:50:58'),
(25, 'please dont ever contact me again', 'Tvick', 'Roisin', '2020-11-24 02:57:41'),
(26, 'you are scaring me and my family', 'Tvick', 'Roisin', '2020-11-24 02:57:44'),
(27, 'we have called the police', 'Tvick', 'Roisin', '2020-11-24 02:57:46'),
(28, ':(', 'Roisin', 'Tvick', '2020-11-24 02:57:50'),
(29, 'i literally just met you', 'Roisin', 'Tvick', '2020-11-24 02:57:55'),
(30, 'how are u gonna say im harassing you when i have crippling depression', 'Roisin', 'Tvick', '2020-11-24 02:58:23'),
(31, 'you good today sir', 'Roisin', 'VNikolasx', '2020-11-24 02:58:35'),
(32, 'cause u certainly seem so', 'Roisin', 'VNikolasx', '2020-11-24 02:58:48'),
(33, 'if u catch my drift ;)', 'Roisin', 'VNikolasx', '2020-11-24 02:58:52'),
(34, 'wow u really gonn \"rip\" me', 'Roisin', 'JackWang123', '2020-11-24 02:59:59'),
(35, 'after all i SAID', 'Roisin', 'JackWang123', '2020-11-24 03:00:02'),
(36, 'to compliment you', 'Roisin', 'JackWang123', '2020-11-24 03:00:05'),
(37, 'this is why i cant stand men', 'Roisin', 'JackWang123', '2020-11-24 03:00:08'),
(38, 'hey billy', 'Roisin', 'BillyH', '2020-11-24 03:46:05'),
(39, 'sup ', 'BillyH', 'Roisin', '2020-11-24 03:46:08'),
(40, 'how u doin', 'BillyH', 'Roisin', '2020-11-24 03:46:11');

-- --------------------------------------------------------

--
-- Table structure for table `Error`
--

CREATE TABLE `Error` (
  `Message` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Login`
--

CREATE TABLE `Login` (
  `ID` int(11) NOT NULL,
  `Username` text COLLATE utf8_unicode_ci NOT NULL,
  `Password` text COLLATE utf8_unicode_ci NOT NULL,
  `Email` text COLLATE utf8_unicode_ci NOT NULL,
  `Names` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `LastName` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `Gender` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `Preference` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `City` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `ProfilePic` text COLLATE utf8_unicode_ci DEFAULT 'defaultpic.png',
  `Age` int(11) DEFAULT NULL,
  `maxdistance` int(11) DEFAULT NULL,
  `maxage` int(11) DEFAULT NULL,
  `interests` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `matches` text COLLATE utf8_unicode_ci DEFAULT '',
  `friends` text COLLATE utf8_unicode_ci DEFAULT '',
  `occupation` text COLLATE utf8_unicode_ci DEFAULT 'None',
  `bio` text COLLATE utf8_unicode_ci DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Login`
--

INSERT INTO `Login` (`ID`, `Username`, `Password`, `Email`, `Names`, `LastName`, `Gender`, `Preference`, `City`, `ProfilePic`, `Age`, `maxdistance`, `maxage`, `interests`, `matches`, `friends`, `occupation`, `bio`) VALUES
(1, 'Johnsm', 'johnsun', 'john22smith@gmail.com', 'John ', 'Smith', 'male', 'both', '43.3255|79.7990|Burlington', '../ProfilePic/pic3.jpeg', 22, 10, 30, 'Food|Art|Music', 'Milesg|Daphh|BerthaW|Tvick|VNikolasx|JackWang123|Marcie|TristanF|', 'Milesg|BerthaW|VNikolasx|Marcie|TristanF|JackWang123|', 'Teacher', 'I have just graduated, and am now teaching at Burlington elementary. I enjoy music and hikes.'),
(2, 'Milesg', '1234', 'Miles321@gmail.com', 'Miles', 'Griffin', 'male', 'both', '44.2312|76.4860|Kingston', '../ProfilePic/pexels-photo-2040189.jpg', 23, 44, 32, 'Food|Music|Traveling', 'Johnsm|Roisin|WayneS|BretB|', 'Johnsm|Roisin|', 'Barber', 'Dropped out of highschool. Became a barber, made bank. So what'),
(3, 'JackWang123', 'jackson321', 'jackuwangu@gmail.com', 'Jack', 'Wang', 'male', 'both', '43.6532|79.3832|Toronto', '../ProfilePic/pic8.jpeg', 19, 5, 25, 'Anime|Cooking|Water', 'HabibaCummings|VNikolasx|Marcie|Roisin|Johnsm|Milesg|Daphh|WayneS|', 'HabibaCummings|VNikolasx|Marcie|Roisin|Johnsm|', 'Student', 'Hello, I am a student at UofT I am studying Kinesiology.\r\nI Enjoy studying 24/7.XD           \r\n           '),
(4, 'BerthaW', 'bernie', 'bigbootybertha@gmail.com', 'Bertha', 'Warner', 'female', 'female', '43.8561|79.3370|Markham', '../ProfilePic/pexels-photo-4066498.png', 43, 67, 74, 'Food|Art|Sports|Music|Politics', 'TristanF|Johnsm|Milesg|JackWang123|WayneS|Marcie|BretB|', 'Johnsm|Marcie|TristanF|', 'Caregiver', 'Let me tell you stories of when I was a kid so I can pass down my knowledge!'),
(5, 'Sallyb', 'sabby', 'Sabby@gmail.com', 'Sally', 'Barker', 'female', 'female', '43.2557|79.8711|Hamilton', '../ProfilePic/pic7.jpeg', 27, 17, 35, 'Food|Sports', 'Johnsm|Tvick|Roisin|Milesg|BretB|DanyalH|Daphh|WayneS|TristanF|HabibaCummings|JackWang123|Marcie|', 'Tvick|Roisin|DanyalH|TristanF|HabibaCummings|Marcie|', 'Accountant', 'Hello I am a CPA, I enjoy eating out and love sports'),
(6, 'DanyalH', 'debeers', 'hancock@gmail.com', 'Danyal', 'Hancock', 'male', 'female', '42.9922|79.2483|Welland', '../ProfilePic/pexels-phot2o-3030332.png', 21, 43, 62, 'Music|Anime|Politics', 'Roisin|Milesg|JackWang123|Daphh|Tvick|WayneS|TristanF|HabibaCummings|BretB|Sallyb|', 'Tvick|Roisin|TristanF|HabibaCummings|Sallyb|', 'Farmer', 'Hi Diddly Ho Neighborinos'),
(7, 'Daphh', 'fuller123', 'dafull@gmail.com', 'Daphne', 'Fuller', 'female', 'both', '45.5509|75.2804|Clarence-Rockland', '../ProfilePic/pic6.jpeg', 26, 5, 32, 'Art|Music|Cooking', '', '', 'Artist', 'Hello, I am a freelance artist and I hope that we can draw a beautiful relationship'),
(8, 'Tvick', 'tvickrules', 'Thomf22@gmail.com', 'Thomas', 'Vickers', 'male', 'both', '43.8563|79.5085|Vaughan', '../ProfilePic/pexels-photo-3912984.png', 32, 59, 66, 'Food|Art|Sports|Movies|Water', 'Roisin|TristanF|JackWang123|Sallyb|HabibaCummings|Milesg|Daphh|WayneS|DanyalH|', 'DanyalH|Roisin|TristanF|Sallyb|', 'Engineer', '“Engineers like to solve problems. If there are no problems handily available, they will create their own problems.\"\r\n- Scott Adams \r\n\r\n\r\n\r\n'),
(9, 'VNikolasx', 'vinegag', 'vnick@gmail.com', 'Nikolas', 'Valdez', 'male', 'male', '43.4643|80.5204|Waterloo', '../ProfilePic/unknown.png', 18, 35, 24, 'Music|Traveling|Movies|Water', 'HabibaCummings|Milesg|WayneS|Marcie|TristanF|Johnsm|JackWang123|Tvick|DanyalH|Roisin|', 'Johnsm|Marcie|Roisin|TristanF|JackWang123|', 'Football Player', 'Hey! I\'m a member of the varsity team at the University of Waterloo! Hit me up if you ever wanna chat, I\'m a really friendly guy!\r\n              '),
(10, 'WayneS', '1234', 'waynn@gmail.com', 'Wayne', 'Samsom', 'male', 'both', '43.4643|80.5204|Waterloo', '../ProfilePic/pic2.jpeg', 22, 3, 25, 'Sports|Traveling', '', '', 'Hocky Player', 'Im a Goalie at the local waterloo hocky team.              \r\n              '),
(11, 'Marcie', 'Marcie 123', 'Marcie@gmail.com', 'Marcie ', 'Watt', 'female', 'both', '45.5509|75.2804|Clarence-Rockland', '../ProfilePic/pexels-photo-698928.png', 17, 33, 21, 'Music|Anime|Traveling', 'HabibaCummings|Milesg|JackWang123|DanyalH|Daphh|VNikolasx|Roisin|TristanF|Johnsm|BerthaW|WayneS|BretB|Sallyb|Tvick|', 'VNikolasx|Johnsm|BerthaW|Roisin|TristanF|HabibaCummings|JackWang123|Sallyb|', 'Student', 'Tell me a funny joke!'),
(12, 'Roisin', 'rosalina', 'Rois23in@gmail.com', 'Roisin', 'Riddle', 'female', 'both', '49.7670|94.4894|Kenora', '../ProfilePic/pexels-photo-5196811.png', 24, 44, 34, 'Food|Art|Sports|Music|Anime', 'Johnsm|BerthaW|Tvick|Milesg|Sallyb|DanyalH|Daphh|TristanF|JackWang123|WayneS|Marcie|HabibaCummings|BretB|VNikolasxBillyH|', 'Tvick|Milesg|DanyalH|Marcie|VNikolasx|TristanF|HabibaCummings|JackWang123|Sallyb|BillyH|', 'Accountant', 'disappointed but not surprised | blm today, tomorrow, forever | she/her | i\'m a queen, treat me as such | venmo me then talk'),
(13, 'TristanF', 'tritan', 'tritan@gmail.com', 'Tristan', 'Steeler', 'male', 'female', '43.4516|80.4925|Kitchener', '../ProfilePic/pexels-photo-4584665.jpg', 44, 56, 44, 'Art|Sports|Music|Traveling|Water', 'Tvick|VNikolasx|BerthaW|WayneS|Roisin|HabibaCummings|Johnsm|Milesg|Daphh|Marcie|BretB|JackWang123|Sallyb|DanyalH|', 'Tvick|VNikolasx|BerthaW|Roisin|Johnsm|Marcie|DanyalH|Sallyb|', 'Garbage Man', '              \r\n              day in day out......'),
(14, 'HabibaCummings', 'HabibaCummings', 'HabibaCummings@gmail.com', 'Habiba', 'Cummings', 'male', 'both', '44.2312|76.4860|Kingston', '../ProfilePic/pexels-photo-1007066.jpg', 18, 43, 21, 'Food|Music|Cooking|Traveling|Water', 'Milesg|JackWang123|Marcie|Johnsm|Daphh|Roisin|BerthaW|WayneS|Sallyb|DanyalH|', 'Marcie|Roisin|DanyalH|JackWang123|Sallyb|', 'Student', '              \r\n              “Education is the passport to the future, for tomorrow belongs to those who prepare for it today.” — Malcolm X | Kingston University\r\n\r\n'),
(15, 'BretB', 'bb123', 'brett@gmail.com', 'Bret', 'Bishop', 'male', 'both', '43.3616|80.3144|Cambridge', '../ProfilePic/pic1.jpeg', 34, 14, 40, 'Food|Traveling', '', '', 'Lawyer', 'I Enjoy traveling so much I have visted 52% of the world\r\n              '),
(23, 'BillyH', '1234', 'BillyH@gmail.com', 'Billy', 'Harry', 'male', 'both', '45.4215|75.6972|Ottawa', '../ProfilePic/billy.png', 43, 500, 60, 'Food|Art|Sports|Movies|Politics', 'Johnsm|Roisin|TristanF|', 'Roisin|', 'Actor', '                            \r\n              hi im billy the harry man\r\n              ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dm`
--
ALTER TABLE `dm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Login`
--
ALTER TABLE `Login`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `dm`
--
ALTER TABLE `dm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `Login`
--
ALTER TABLE `Login`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
