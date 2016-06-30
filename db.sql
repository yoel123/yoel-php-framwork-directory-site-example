-- phpMyAdmin SQL Dump
-- version 4.3.8
-- http://www.phpmyadmin.net
--
-- Host: localhost:33063
-- Generation Time: Jun 28, 2016 at 02:56 PM
-- Server version: 5.5.42
-- PHP Version: 5.4.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ydir`
--

-- --------------------------------------------------------

--
-- Table structure for table `activation_codes`
--

CREATE TABLE IF NOT EXISTS `activation_codes` (
  `user_id` int(11) NOT NULL,
  `activation_code` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `activation_codes`
--

INSERT INTO `activation_codes` (`user_id`, `activation_code`) VALUES
(12, 5040771),
(13, 4959747),
(14, 7237487),
(15, 5196228),
(16, 7256988),
(0, 2064025);

-- --------------------------------------------------------

--
-- Table structure for table `cat`
--

CREATE TABLE IF NOT EXISTS `cat` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `desc` varchar(255) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cat`
--

INSERT INTO `cat` (`id`, `name`, `desc`, `parent_id`, `img`) VALUES
(2, 'EDUCATION', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor ', 0, '1379_education.jpg'),
(3, 'BUSINESS ', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor ', 0, '4745_bis.jpg'),
(4, 'consultents', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor ', 3, '0'),
(6, 'advertising', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor ', 3, 'img/0BXvcdE.jpg'),
(7, 'food', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor ', 0, '3641_food.jpg'),
(26, 'travel', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor ', 0, '1745_travel.jpg'),
(27, 'shoping', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor ', 0, '2920_shoping.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `dir`
--

CREATE TABLE IF NOT EXISTS `dir` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `desc` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `phone` int(10) NOT NULL,
  `website` text NOT NULL,
  `facebook` text NOT NULL,
  `twitter` text NOT NULL,
  `googleplus` text NOT NULL,
  `user_id` int(255) NOT NULL,
  `opening_h` text NOT NULL,
  `main_img` varchar(255) NOT NULL,
  `location_id` int(11) NOT NULL,
  `cats_id` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dir`
--

INSERT INTO `dir` (`id`, `name`, `desc`, `email`, `address`, `phone`, `website`, `facebook`, `twitter`, `googleplus`, `user_id`, `opening_h`, `main_img`, `location_id`, `cats_id`) VALUES
(10, 'buisness1', 'Nam vitae dolor nec diam egestas semper quis sit amet leo. Nulla posuere tortor ut lorem pretium, sit amet eleifend arcu adipiscing. Mauris nec magna fermentum', 'bla@bla.com', 'zimbabwe', 35523636, 'http://www.google.com', 'https://www.facebook.com/leadingbyexample/', 'https://twitter.com/example', 'https://plus.google.com/collections/featured', 1, '7:00-10:00\r\nclosed on sunday', '4785_placeholder.jpg', 1, '3'),
(11, 'buisness2', 'Nam vitae dolor nec diam egestas semper quis sit amet leo. Nulla posuere tortor ut lorem pretium, sit amet eleifend arcu adipiscing. Mauris nec magna fermentum', 'bla@bla.com', 'new york wall street', 35523636, 'http://www.google.com', 'https://www.facebook.com/leadingbyexample/', 'https://twitter.com/example', 'https://plus.google.com/collections/featured', 1, '7:00-10:00\r\nclosed on sunday', '4785_placeholder.jpg', 2, '3'),
(12, 'buisness3', 'Nam vitae dolor nec diam egestas semper quis sit amet leo. Nulla posuere tortor ut lorem pretium, sit amet eleifend arcu adipiscing. Mauris nec magna fermentum', 'bla@bla.com', 'los angeles', 35523636, 'http://www.google.com', 'https://www.facebook.com/leadingbyexample/', 'https://twitter.com/example', 'https://plus.google.com/collections/featured', 1, '7:00-10:00\r\nclosed on sunday', '4785_placeholder.jpg', 1, '2'),
(13, 'buisness4', 'Nam vitae dolor nec diam egestas semper quis sit amet leo. Nulla posuere tortor ut lorem pretium, sit amet eleifend arcu adipiscing. Mauris nec magna fermentum', 'bla@bla.com', 'franch', 35523636, 'http://www.google.com', 'https://www.facebook.com/leadingbyexample/', 'https://twitter.com/example', 'https://plus.google.com/collections/featured', 1, '7:00-10:00\r\nclosed on sunday', '4785_placeholder.jpg', 2, '2'),
(14, 'buisness5', 'Nam vitae dolor nec diam egestas semper quis sit amet leo. Nulla posuere tortor ut lorem pretium, sit amet eleifend arcu adipiscing. Mauris nec magna fermentum', 'bla@bla.com', 'africa', 35523636, 'http://www.google.com', 'https://www.facebook.com/leadingbyexample/', 'https://twitter.com/example', 'https://plus.google.com/collections/featured', 1, '7:00-10:00\r\nclosed on sunday', '4785_placeholder.jpg', 1, '7'),
(15, 'buisness6', 'Nam vitae dolor nec diam egestas semper quis sit amet leo. Nulla posuere tortor ut lorem pretium, sit amet eleifend arcu adipiscing. Mauris nec magna fermentum', 'bla@bla.com', 'china', 35523636, 'http://www.google.com', 'https://www.facebook.com/leadingbyexample/', 'https://twitter.com/example', 'https://plus.google.com/collections/featured', 1, '7:00-10:00\r\nclosed on sunday', '4785_placeholder.jpg', 2, '7'),
(16, 'buisness7', 'Nam vitae dolor nec diam egestas semper quis sit amet leo. Nulla posuere tortor ut lorem pretium, sit amet eleifend arcu adipiscing. Mauris nec magna fermentum', 'bla@bla.com', 'tel aviv', 35523636, 'http://www.google.com', 'https://www.facebook.com/leadingbyexample/', 'https://twitter.com/example', 'https://plus.google.com/collections/featured', 1, '7:00-10:00\r\nclosed on sunday', '4785_placeholder.jpg', 2, '26'),
(17, 'buisness8', 'Nam vitae dolor nec diam egestas semper quis sit amet leo. Nulla posuere tortor ut lorem pretium, sit amet eleifend arcu adipiscing. Mauris nec magna fermentum', 'bla@bla.com', 'belguim', 35523636, 'http://www.google.com', 'https://www.facebook.com/leadingbyexample/', 'https://twitter.com/example', 'https://plus.google.com/collections/featured', 1, '7:00-10:00\r\nclosed on sunday', '4785_placeholder.jpg', 2, '26'),
(18, 'buisness9', 'Nam vitae dolor nec diam egestas semper quis sit amet leo. Nulla posuere tortor ut lorem pretium, sit amet eleifend arcu adipiscing. Mauris nec magna fermentum', 'bla@bla.com', 'italy', 35523636, 'http://www.google.com', 'https://www.facebook.com/leadingbyexample/', 'https://twitter.com/example', 'https://plus.google.com/collections/featured', 1, '7:00-10:00\r\nclosed on sunday', '4785_placeholder.jpg', 1, '27'),
(19, 'buisness10', 'Nam vitae dolor nec diam egestas semper quis sit amet leo. Nulla posuere tortor ut lorem pretium, sit amet eleifend arcu adipiscing. Mauris nec magna fermentum', 'bla@bla.com', 'germany', 35523636, 'http://www.google.com', 'https://www.facebook.com/leadingbyexample/', 'https://twitter.com/example', 'https://plus.google.com/collections/featured', 1, '7:00-10:00\r\nclosed on sunday', '4785_placeholder.jpg', 2, '27'),
(20, 'buisness11', 'Nam vitae dolor nec diam egestas semper quis sit amet leo. Nulla posuere tortor ut lorem pretium, sit amet eleifend arcu adipiscing. Mauris nec magna fermentum', 'bla@bla.com', 'zimbabwe', 35523636, 'http://www.google.com', 'https://www.facebook.com/leadingbyexample/', 'https://twitter.com/example', 'https://plus.google.com/collections/featured', 1, '7:00-10:00\r\nclosed on sunday', '4785_placeholder.jpg', 3, '3'),
(21, 'buisness12', 'Nam vitae dolor nec diam egestas semper quis sit amet leo. Nulla posuere tortor ut lorem pretium, sit amet eleifend arcu adipiscing. Mauris nec magna fermentum', 'bla@bla.com', 'zimbabwe', 35523636, 'http://www.google.com', 'https://www.facebook.com/leadingbyexample/', 'https://twitter.com/example', 'https://plus.google.com/collections/featured', 1, '7:00-10:00\r\nclosed on sunday', '4785_placeholder.jpg', 4, '3'),
(22, 'buisness13', 'Nam vitae dolor nec diam egestas semper quis sit amet leo. Nulla posuere tortor ut lorem pretium, sit amet eleifend arcu adipiscing. Mauris nec magna fermentum', 'bla@bla.com', 'zimbabwe', 35523636, 'http://www.google.com', 'https://www.facebook.com/leadingbyexample/', 'https://twitter.com/example', 'https://plus.google.com/collections/featured', 1, '7:00-10:00\r\nclosed on sunday', '4785_placeholder.jpg', 3, '2');

-- --------------------------------------------------------

--
-- Table structure for table `featured`
--

CREATE TABLE IF NOT EXISTS `featured` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `dir_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `featured`
--

INSERT INTO `featured` (`id`, `cat_id`, `dir_id`) VALUES
(2, 2, 10),
(3, 3, 11),
(4, 2, 12),
(5, 7, 15),
(6, 26, 18),
(7, 27, 20);

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE IF NOT EXISTS `gallery` (
  `id` int(11) NOT NULL,
  `dir_id` int(11) NOT NULL,
  `use_id` int(11) NOT NULL,
  `src` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `dir_id`, `use_id`, `src`) VALUES
(1, 2, 1, '0BXvcdE.jpg'),
(2, 1, 12, '0'),
(6, 1, 3, '0'),
(7, 2, 1, '7174_benter.png'),
(8, 10, 1, '9222_food.jpg'),
(9, 10, 1, '2136_education.jpg'),
(10, 10, 1, '5780_placeholder.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE IF NOT EXISTS `location` (
  `id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `name`) VALUES
(1, 'new york'),
(2, 'los angeles'),
(3, 'manhattan'),
(4, 'brooklyn');

-- --------------------------------------------------------

--
-- Table structure for table `reset_pasword_codes`
--

CREATE TABLE IF NOT EXISTS `reset_pasword_codes` (
  `user_id` int(11) NOT NULL,
  `reset_code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE IF NOT EXISTS `review` (
  `id` int(11) NOT NULL,
  `dir_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `stars` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `dir_id`, `name`, `content`, `stars`) VALUES
(1, 3, 'mktmu', 'mumy', 0),
(2, 0, '', 'jsrjr', 5),
(6, 1, '', 'aaaaaaaaa', 5),
(7, 1, '', 'gheeh', 3),
(8, 1, '', 'r', 3);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `pas` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `user_level` int(11) NOT NULL,
  `activated` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `pas`, `mail`, `user_level`, `activated`) VALUES
(1, '123', '202cb962ac59075b964b07152d234b70', 'admin@admin.com', 0, 1),
(2, '12', '34', 'wgge', 0, 1),
(3, '0', '', 'huiop', 0, 1),
(4, '0', '', 'hgyiuhp', 0, 1),
(5, 'test', '202cb962ac59075b964b07152d234b70', 'tst@bla.com', 5, 1),
(6, 'some_name', '202cb962ac59075b964b07152d234b70', 'tst@bla.com', 0, 1),
(7, 'rqw', 'ae21934e60297ec4bf7b051385e2c57e', 'fwqe@gw.com', 3, 0),
(8, 'hreq', '202cb962ac59075b964b07152d234b70', 'gwr@ewg.com', 3, 0),
(9, '123', '7c3daa31f887c333291d5cf04e541db5', 'fwqe@gw.com', 3, 0),
(10, '123', '202cb962ac59075b964b07152d234b70', 'rrr@aa.com', 3, 0),
(11, '123', '202cb962ac59075b964b07152d234b70', 'rrr@aa.com', 3, 0),
(12, '123', '202cb962ac59075b964b07152d234b70', 'rrr@aa.com', 3, 0),
(13, '123', '202cb962ac59075b964b07152d234b70', 'rrr@aa.com', 3, 0),
(14, 'aaaaaaa', '202cb962ac59075b964b07152d234b70', 'aaaa@aa.com', 3, 0),
(15, 'ggggg', '202cb962ac59075b964b07152d234b70', 'gggg@gg.com', 3, 0),
(16, 'ff', '202cb962ac59075b964b07152d234b70', 'ed@s.com', 3, 0),
(17, 'rrr', '202cb962ac59075b964b07152d234b70', 'rrr22222@aa.com', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `zt`
--

CREATE TABLE IF NOT EXISTS `zt` (
  `id` int(11) NOT NULL,
  `txt` varchar(55) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `zt`
--

INSERT INTO `zt` (`id`, `txt`) VALUES
(1, 'hst'),
(2, 'p8rf8p'),
(3, 'yjx'),
(4, 'zzzzzz'),
(5, 'bbbbbbb'),
(6, 'aaaaa'),
(7, 'asaasa'),
(8, 'xcxcccx');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cat`
--
ALTER TABLE `cat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dir`
--
ALTER TABLE `dir`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `featured`
--
ALTER TABLE `featured`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zt`
--
ALTER TABLE `zt`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cat`
--
ALTER TABLE `cat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `dir`
--
ALTER TABLE `dir`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `featured`
--
ALTER TABLE `featured`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `zt`
--
ALTER TABLE `zt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
