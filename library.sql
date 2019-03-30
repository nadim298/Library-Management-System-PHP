-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2019 at 07:36 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '4d813d28f0aaaa4e9da0fb6e55293607');

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `author_id` int(11) NOT NULL,
  `author_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`author_id`, `author_name`) VALUES
(3, 'Humayun Ahmed'),
(4, 'Bjarne Stroustrup'),
(5, 'Jafor Iqbal'),
(6, 'Jojo Moyes');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `book_id` int(11) NOT NULL,
  `book_name` varchar(100) NOT NULL,
  `author_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `isbn` int(13) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `book_img` varchar(200) NOT NULL,
  `added_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `view` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `book_name`, `author_id`, `category_id`, `isbn`, `description`, `book_img`, `added_date`, `view`) VALUES
(17, 'Himu', 3, 17, 12345678, 'The real name of the character is Himalay, a name given by his father. He follows a lifestyle that was instructed by his psychopathic father who wanted him to be a great man.[2]\r\n\r\nHimu wears a yellow panjabi that does not have a pocket and lives like a vagabond or a gypsy.[3] He walks barefoot on the streets of Dhaka without certain destination. He does not have a job and, therefore, no source of income. He prefers the life of a beggar than that of a hard worker, often praising begging. However', 'Himu-Humayun_Ahmed_(1993).jpg', '2019-03-09 17:49:39', 3),
(18, 'C++', 4, 16, 2147483647, 'fgdfgfgddggdfgfd', '51KEqIsBa4L._SX370_BO1,204,203,200_.jpg', '2019-03-09 17:50:11', 0),
(19, 'c', 4, 16, 2147483647, 'rtretregffddfgfdgd', '51KEqIsBa4L._SX370_BO1,204,203,200_.jpg', '2019-03-09 18:18:55', 4),
(21, 'Me before you', 6, 17, 1234567890, 'Twenty-six-year-old Louisa Clark lives with her working-class family. Unambitious and with few qualifications, she feels constantly outshone by her younger sister, Treena, an outgoing single mother. Louisa, who helps support her family, loses her job at a local cafÃ© when the cafÃ© closes. She goes to the Job Centre and, after several failed attempts, is offered a unique employment opportunity: help care for Will Traynor, a successful, wealthy, and once-active young man who developed quadriplegia in a pedestrian-motorcycle accident two years earlier. ', 'me before you.jpg', '2019-03-21 06:10:25', 1);

-- --------------------------------------------------------

--
-- Table structure for table `book_issue`
--

CREATE TABLE `book_issue` (
  `issue_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `issue_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `return_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `fine` int(11) DEFAULT NULL,
  `return_status` int(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book_issue`
--

INSERT INTO `book_issue` (`issue_id`, `student_id`, `book_id`, `issue_date`, `return_date`, `fine`, `return_status`) VALUES
(5, 1, 17, '2019-03-02 08:30:18', '2019-03-12 08:26:51', 10, 1),
(6, 2, 17, '2019-03-01 09:09:15', '2019-03-12 08:26:51', 10, 1),
(7, 1, 17, '2019-03-10 10:53:46', '2019-03-12 08:50:19', 0, 1),
(8, 1, 17, '2019-03-10 11:28:50', '2019-03-12 08:55:35', 0, 1),
(10, 1, 19, '2019-03-01 08:58:58', NULL, NULL, 0),
(11, 2, 19, '2019-03-12 09:10:41', NULL, NULL, 0),
(12, 1, 17, '2019-03-12 17:35:49', '2019-03-13 05:20:22', 0, 1),
(13, 1, 17, '2019-03-13 05:20:38', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `status`) VALUES
(16, 'Programming', 1),
(17, 'Novels', 1),
(18, 'Poems', 1);

-- --------------------------------------------------------

--
-- Table structure for table `display_content`
--

CREATE TABLE `display_content` (
  `id` int(11) NOT NULL,
  `fb` varchar(100) NOT NULL,
  `twitter` varchar(100) NOT NULL,
  `linkedin` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `display_content`
--

INSERT INTO `display_content` (`id`, `fb`, `twitter`, `linkedin`, `address`, `email`, `mobile`) VALUES
(1, 'google.com', 'twitter/stamford', 'linkedin/stamford', '52 Shiddeswari, Dhaka', 'stamford@mail.com', '1680079653');

-- --------------------------------------------------------

--
-- Table structure for table `issue_request`
--

CREATE TABLE `issue_request` (
  `request_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `request_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `issue_request`
--

INSERT INTO `issue_request` (`request_id`, `student_id`, `book_id`, `request_date`) VALUES
(2, 2, 19, '2019-03-12 06:40:45'),
(4, 1, 19, '2019-03-12 06:48:08');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `registration_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `password` varchar(200) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `image`, `email`, `mobile`, `registration_date`, `password`, `status`) VALUES
(1, 'Nasrullah Al Nadim', 'IMG_5682.jpg', 'abc@abc.com', '01680079653', '2019-03-10 05:05:08', '4d813d28f0aaaa4e9da0fb6e55293607', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_comments`
--

CREATE TABLE `user_comments` (
  `comment_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `comment` varchar(500) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_comments`
--

INSERT INTO `user_comments` (`comment_id`, `student_id`, `comment`, `date`) VALUES
(4, 1, 'Good site', '2019-03-21 07:52:34'),
(5, 4, 'Hi I m appreciating this site', '2019-03-21 08:05:59'),
(6, 5, 'Good', '2019-03-21 09:09:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`author_id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `book_issue`
--
ALTER TABLE `book_issue`
  ADD PRIMARY KEY (`issue_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `display_content`
--
ALTER TABLE `display_content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `issue_request`
--
ALTER TABLE `issue_request`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_comments`
--
ALTER TABLE `user_comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `author_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `book_issue`
--
ALTER TABLE `book_issue`
  MODIFY `issue_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `display_content`
--
ALTER TABLE `display_content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `issue_request`
--
ALTER TABLE `issue_request`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_comments`
--
ALTER TABLE `user_comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
