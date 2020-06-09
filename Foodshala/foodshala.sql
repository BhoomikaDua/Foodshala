-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2020 at 03:54 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `foodshala`
--

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE IF NOT EXISTS `items` (
`id` int(11) NOT NULL,
  `title` varchar(70) NOT NULL,
  `companyId` varchar(36) NOT NULL,
  `descr` text NOT NULL,
  `preference` varchar(1) DEFAULT NULL,
  `price` varchar(36) NOT NULL,
  `creationDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `title`, `companyId`, `descr`, `preference`, `price`, `creationDate`) VALUES
(1, 'Lasagna', '2', 'This classic lasagna is made with an easy meat sauce as the base. Layer the sauce with noodles and cheese, then bake until bubbly! This is great for feeding a big family, and freezes well, too.', '2', '299.99', '2020-05-31 18:10:42'),
(2, 'Vegetable Pasta', '2', 'A  vegetarian pasta loaded with a whole head of broccoli, corn, zucchinis, capsicum/peppers and onion, and smothered in a garlic herb tomato sauce.', '1', '150.00', '2020-05-31 18:13:10'),
(3, 'Vanilla Cake', '2', 'Eggless Creamy Vanilla Cake slice topped with cherries and icing.', '1', '99.99', '2020-05-31 18:15:30'),
(4, 'Caesar Salad', '3', 'Classic Caesar Salad made with romaine lettuce, croutons, parmesan cheese, and fresh caesar dressing.', '1', '210.00', '2020-05-31 18:18:17'),
(5, 'Grilled Lemon Herb Mediterranean Chicken Salad', '3', 'Full of Mediterranean flavours: olives, tomatoes, cucumber, avocados, and chicken for a complete meal in a salad bowl!', '2', '200.00', '2020-05-31 18:20:23'),
(6, 'Egg Salad', '3', 'Made with Boiled eggs, mayonnaise, a touch of a mustard and elegant toppings with dill and chives to add that extra touch of perfection.', '2', '140.00', '2020-05-31 18:24:35'),
(7, 'Peanut Butter Mousse Parfait', '2', 'A sweet and salty parfait made with layers of heavenly peanut butter mousse and dark chocolate ganache, and optional layers of peanuts, brownies, and more.\n\n', '1', '199.99', '2020-05-31 18:30:26');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
`id` int(11) NOT NULL,
  `customerId` varchar(36) NOT NULL,
  `restaurantId` varchar(36) NOT NULL,
  `itermId` varchar(36) NOT NULL,
  `orderNumber` varchar(11) NOT NULL,
  `completed` varchar(1) DEFAULT NULL,
  `orderDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customerId`, `restaurantId`, `itermId`, `orderNumber`, `completed`, `orderDate`) VALUES
(1, '1', '2', '2', '15909300919', '1', '2020-05-31 18:31:31'),
(2, '1', '3', '5', '15909300961', '1', '2020-05-31 18:31:36'),
(3, '1', '3', '5', '15909301027', '1', '2020-05-31 18:31:42'),
(4, '1', '2', '1', '15909301091', '0', '2020-05-31 18:31:49'),
(5, '1', '2', '1', '15909301131', '1', '2020-05-31 18:31:53'),
(6, '1', '2', '7', '15909301203', '0', '2020-05-31 18:32:00'),
(7, '1', '3', '6', '15909302531', '1', '2020-05-31 18:34:13'),
(8, '1', '3', '6', '15909314391', '0', '2020-05-31 18:53:59');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(36) NOT NULL,
  `username` varchar(36) NOT NULL,
  `email` varchar(36) NOT NULL,
  `address` varchar(100) NOT NULL,
  `usertype` varchar(1) NOT NULL,
  `userpassword` varchar(36) NOT NULL,
  `preference` varchar(1) DEFAULT NULL,
  `signupDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `address`, `usertype`, `userpassword`, `preference`, `signupDate`) VALUES
(1, 'Bhoomika Dua', 'bd@bd.com', 'Delhi', '1', '459bb86ecb77b1a8cdecf9bd1ce885a9', '2', '2020-05-31 18:06:45'),
(2, 'FoodHub', 'fh@fh.com', 'Delhi', '2', '43592a3ac709925e02153f5bd79f8860', '', '2020-05-31 18:08:12'),
(3, 'Salad Plaza', 'sp@sp.com', 'Delhi', '2', '5eeed0a517c84b610630629bf54900e2', '', '2020-05-31 18:16:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `items`
--
ALTER TABLE `items`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
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
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(36) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
