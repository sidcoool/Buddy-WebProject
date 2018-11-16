-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2018 at 07:36 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `buddy`
--

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `qid` int(11) NOT NULL,
  `ques` varchar(255) NOT NULL,
  `A` varchar(255) NOT NULL,
  `B` varchar(255) NOT NULL,
  `C` varchar(255) NOT NULL,
  `D` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`qid`, `ques`, `A`, `B`, `C`, `D`) VALUES
(1, ' What''s Your Favorite TV Show?', 'Suits', 'Game of Thrones', 'Stranger Things', 'Prison Break'),
(2, 'What''s Your Favorite Dessert?', 'Ice Cream', 'Fruit Cream', 'Cake', 'Gulab Jamun'),
(3, 'Where would you like to live?\r\n\r\n', 'Amsterdam', 'Paris', 'New York', 'Singapore'),
(4, 'What is your favorite summer drink?', 'Lemonade', 'Cold Coffee', 'Mojito', 'Smoothie'),
(5, 'Who  is your favourite  cricketer?', 'Virat Kohli', 'Rohit Sharma', 'M S Dhoni', 'Sachin Tendulkar'),
(6, 'What''s your favorite form of exercise?', 'Jogging', 'Swimming', 'Cycling', 'Walking'),
(7, 'Who is your favourite Marvel character?', 'Iron Man', 'Spiderman', 'Thor', 'Captain America'),
(8, 'What is your favourite kind of vacation?', 'Road Trip', 'Beach', 'Amusement Park', 'Cultural'),
(9, 'What is Your Favorite Season?', 'Winter', 'Summer', 'Spring', 'Fall'),
(10, ' Which Color Looks Best On You?', 'Black', 'Yellow', 'Blue', 'White'),
(11, 'What Is Your Spirit Animal?', 'Horse', 'Tiger', 'Peacock', 'Wolf'),
(12, 'What''s Your Dream Job?', 'Computer Engineer', 'Pilot', 'Musician', 'Tour guide'),
(13, 'What celebrity do you admire the most?', 'Tom Cruise', 'Amitabh Bachchan', 'Leonardo Dicaprio', 'Hrithik Roshan'),
(14, 'Which political party do you support?', 'BJP', 'Congress', 'Aam  Aadmi Party', 'Samajwadi Party'),
(15, 'Which type of song do you enjoy?', 'Rock', 'Party', 'EDM', 'Retro'),
(16, 'What’s on your bucket list this year?', 'Get a pet', 'Travel all around the world', 'Go scuba diving', 'Go on a blind date'),
(17, 'What type of house do you prefer?', 'Sea facing', 'Compact house with advance technology', 'Palace', 'Boat-house'),
(18, 'What is your favourite sport?', 'Badminton', 'Cricket', 'Soccer', 'Table Tennis'),
(19, 'What animal is your favorite pet?', 'Dog', 'Cat', 'Parrot', 'Fish'),
(20, 'What is your favurite smartphone brand?', 'Samsung', 'Oneplus', 'Apple', 'Google pixel'),
(21, 'What''s your favourite smell?', 'Vine peaches', 'Forests in autumn', 'Rain storm', 'Odour of coffee'),
(22, 'Which car brand do you admire the most?', 'Ferrari', 'Lamborghini', 'Porsche', 'Maserati'),
(23, 'What is your favourite flavor of ice cream?', 'Chocolate chip', 'Vanilla', 'Butterscotch', 'Cookie Dough'),
(24, 'If you could turn back the hands of time, what would you spend a Saturday doing', 'Grandparent''s farm', 'College party', 'Neighborhood park', 'Spend time with family'),
(25, 'How do you spend your weekends?', 'Make time for family and friends', 'Socializing with people', 'Disconnect', 'Pursue a passion'),
(26, 'What website do you visit most often?', 'Geeksforgeeks', 'Facebook', 'Youtube', 'Amazon'),
(27, 'If you had four wishes, what would you wish for?', 'Becoming a billionaire', 'Immortality', 'Become Invisible', 'Happy family life');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`qid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
