-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2021 at 08:30 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `panda4`
--

-- --------------------------------------------------------

--
-- Table structure for table `shop`
--

CREATE TABLE `shop` (
  `id` int(11) NOT NULL,
  `cat` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `shop`
--

INSERT INTO `shop` (`id`, `cat`, `name`, `price`, `image`) VALUES
(1, 'food', 'Milk', 6, 'https://cdn.pixabay.com/photo/2017/07/05/15/41/milk-2474993_150.jpg'),
(2, 'food', 'Bread', 8, 'https://cdn.pixabay.com/photo/2014/07/22/09/59/bread-399286_150.jpg'),
(3, 'clothing', 'Winter coat', 120, 'https://cdn.pixabay.com/photo/2015/05/29/19/19/person-789663_150.jpg'),
(4, 'food', 'Eggs', 12, 'https://cdn.pixabay.com/photo/2015/09/17/17/19/egg-944495_150.jpg'),
(5, 'clothing', 'Dress', 4000, 'https://cdn.pixabay.com/photo/2016/06/29/04/17/wedding-dresses-1485984_150.jpg'),
(6, 'clothing', 'Shirt', 70, 'https://cdn.pixabay.com/photo/2014/08/05/10/31/waiting-410328_150.jpg'),
(7, 'animals', 'Dog food', 70, 'https://cdn.pixabay.com/photo/2017/04/07/10/53/dog-2210717_150.jpg'),
(8, 'animals', 'Cat toy', 50, 'https://cdn.pixabay.com/photo/2018/07/21/09/17/cat-3552143_150.jpg'),
(9, 'food', 'Pasta', 25, '/spaghetti-2931846_960_720.jpg'),
(11, 'clothing', 'Jeans', 150, ''),
(12, 'animals', 'Dog toy', 40, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `shop`
--
ALTER TABLE `shop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
