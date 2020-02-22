-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Feb 17, 2020 at 07:43 PM
-- Server version: 5.6.33
-- PHP Version: 7.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `grocery_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `item` text NOT NULL,
  `price` text NOT NULL,
  `price_type` text NOT NULL,
  `brand` text NOT NULL,
  `location` text NOT NULL,
  `servings` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `item`, `price`, `price_type`, `brand`, `location`, `servings`) VALUES
(190, 'bananas', '.59', 'Regular', 'Chiquita', 'Family Fare', '4'),
(193, 'pizza', '5', 'Sale', 'Frescetta', 'Family Fare', '4'),
(194, 'apples', '4.99', 'Regular', 'Golden Deliscious', 'Family Fare', '8');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=195;