-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2020 at 02:58 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `book_movie`
--

-- --------------------------------------------------------

--
-- Table structure for table `review_table`
--

CREATE TABLE `review_table` (
  `re_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `re_date` date NOT NULL,
  `descrip` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `seat_book_table`
--

CREATE TABLE `seat_book_table` (
  `id` int(11) NOT NULL,
  `theatre_id` int(11) NOT NULL,
  `book_date` date NOT NULL,
  `no_seats` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `show_id` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seat_book_table`
--

INSERT INTO `seat_book_table` (`id`, `theatre_id`, `book_date`, `no_seats`, `user_id`, `show_id`, `price`) VALUES
(1, 1, '2020-03-05', 3, 1, 3, 0),
(2, 1, '2020-03-03', 4, 1, 3, 0),
(3, 1, '2020-03-12', 4, 1, 3, 0),
(4, 0, '0000-00-00', 1, 1, 1, 0),
(5, 0, '0000-00-00', 1, 1, 5, 0),
(6, 1, '2020-03-24', 7, 1, 1, 0),
(7, 1, '2020-03-12', 3, 1, 1, 0),
(8, 1, '2020-03-11', 2, 1, 1, 0),
(9, 0, '0000-00-00', 1, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `seat_table`
--

CREATE TABLE `seat_table` (
  `seat_id` int(11) NOT NULL,
  `seat_no` varchar(20) NOT NULL,
  `seat_row` varchar(20) NOT NULL,
  `theatre_id` int(11) NOT NULL,
  `booked` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seat_table`
--

INSERT INTO `seat_table` (`seat_id`, `seat_no`, `seat_row`, `theatre_id`, `booked`) VALUES
(1, '1', 'A', 1, ''),
(2, '2', 'A', 1, ''),
(3, '3', 'A', 1, ''),
(4, '4', 'A', 1, ''),
(5, '5', 'A', 1, ''),
(6, '6', 'A', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `show_table`
--

CREATE TABLE `show_table` (
  `show_id` int(11) NOT NULL,
  `theatre_id` int(11) NOT NULL,
  `show_name` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  `show_descr` varchar(500) NOT NULL,
  `show_img` varchar(200) NOT NULL,
  `run_status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `show_table`
--

INSERT INTO `show_table` (`show_id`, `theatre_id`, `show_name`, `user_id`, `show_descr`, `show_img`, `run_status`) VALUES
(1, 1, 'Dark Knight Rises', 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'images.jpeg', 1),
(2, 1, 'Joker', 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'images.jpeg', 1),
(4, 0, 'Avengers', 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'images.jpeg', 1),
(5, 0, 'Pokemon', 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'images.jpeg', 0),
(6, 0, 'Captain America', 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'images.jpeg', 0),
(7, 0, 'One Direction', 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'images.jpeg', 0),
(8, 0, 'Castlevania', 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'images.jpeg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `theatre_table`
--

CREATE TABLE `theatre_table` (
  `theat_id` int(11) NOT NULL,
  `theatre_name` varchar(50) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `owner_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `theatre_table`
--

INSERT INTO `theatre_table` (`theat_id`, `theatre_name`, `owner_id`, `owner_name`) VALUES
(1, 'Lonisa', 0, 'kimi');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id` int(11) NOT NULL,
  `role` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(500) NOT NULL,
  `usertype` int(2) NOT NULL,
  `theatre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `role`, `name`, `username`, `email`, `password`, `usertype`, `theatre`) VALUES
(1, 'Customer', 'dwdw', 'dwd', 'dwdw', 'd41d8cd98f00b204e9800998ecf8427e', 1, 'dwdw'),
(2, 'Owner', 'wdwd', 'dwdwd', 'wdwd', 'd41d8cd98f00b204e9800998ecf8427e', 1, 'dwdw'),
(3, 'Customer', 'fefef', 'ff', 'ewfef', 'd41d8cd98f00b204e9800998ecf8427e', 2, 'efef'),
(4, 'Customer', 'reer', 'rere', 'reere', 'd41d8cd98f00b204e9800998ecf8427e', 2, 'dwdw'),
(5, 'Customer', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', 2, ''),
(6, 'Owner', 'kimi', 'kimi', 'sd@vfvf', '202cb962ac59075b964b07152d234b70', 1, 'dfg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `seat_book_table`
--
ALTER TABLE `seat_book_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seat_table`
--
ALTER TABLE `seat_table`
  ADD PRIMARY KEY (`seat_id`);

--
-- Indexes for table `show_table`
--
ALTER TABLE `show_table`
  ADD PRIMARY KEY (`show_id`);

--
-- Indexes for table `theatre_table`
--
ALTER TABLE `theatre_table`
  ADD PRIMARY KEY (`theat_id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `seat_book_table`
--
ALTER TABLE `seat_book_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `seat_table`
--
ALTER TABLE `seat_table`
  MODIFY `seat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `show_table`
--
ALTER TABLE `show_table`
  MODIFY `show_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `theatre_table`
--
ALTER TABLE `theatre_table`
  MODIFY `theat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
