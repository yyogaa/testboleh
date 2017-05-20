-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2017 at 11:39 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `boleh_db2`
--

-- --------------------------------------------------------

--
-- Table structure for table `has_item`
--

CREATE TABLE `has_item` (
  `quantity` int(11) NOT NULL,
  `id_item` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id_item` int(11) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `price` int(25) NOT NULL,
  `type` int(11) NOT NULL,
  `pic` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id_item`, `item_name`, `price`, `type`, `pic`, `description`, `location`) VALUES
(1, 'cimol', 50000, 0, '', '', ''),
(2, 'martabak', 400000, 1, '', '', ''),
(3, 'Lapis Legit', 19000, 0, '15052017074029sangkuriang2.jpg', ' tes1', ''),
(4, 'lapis Legit Sangkuriang 2', 17000, 0, '15052017074215sangkuriang3.jpg', 'Tes2', ''),
(5, 'Baju Bogor', 90000, 1, '17052017111336tshirtjabar.jpg', 'Baju Bogor Very comfy', '');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `order_total` int(11) NOT NULL,
  `price_total` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_item` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `code` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `password`, `name`, `address`, `phone`, `email`, `code`) VALUES
(5, 'secret', 'Johan', 'Mansion', '0999777171717', 'johan@mansion.com', 0),
(8, '5ebe2294ecd0e0f08eab7690d2a6ee69', 'Stevie Wonder', 'Depok Baru', '0777777777', 'stevie@mail.com', 0),
(9, '5ebe2294ecd0e0f08eab7690d2a6ee69', 'Irawan', 'Depok Lama', '0988819732', 'irawan@gmail.com', 0),
(10, '5ebe2294ecd0e0f08eab7690d2a6ee69', 'Bambang Shop', 'Kebon Waru', '0217727722', 'bambang@mail.com', 0),
(11, '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'hah', 'dramaga', '083917193012', 'haha@gmail.com', 0),
(12, '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'yoga', 'dramaga', '0418490819401', 'yogapermana.s12@gmail.com', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `has_item`
--
ALTER TABLE `has_item`
  ADD KEY `id_item` (`id_item`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id_item`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_item` (`id_item`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `has_item`
--
ALTER TABLE `has_item`
  ADD CONSTRAINT `has_item_id_item` FOREIGN KEY (`id_item`) REFERENCES `items` (`id_item`),
  ADD CONSTRAINT `has_item_id_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_id_item` FOREIGN KEY (`id_item`) REFERENCES `items` (`id_item`),
  ADD CONSTRAINT `orders_id_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
