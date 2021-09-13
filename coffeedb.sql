-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2021 at 08:48 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coffeedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `level_id` int(10) NOT NULL,
  `level_des` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`level_id`, `level_des`) VALUES
(1, 'Admin'),
(2, 'Customer'),
(1, 'Admin'),
(2, 'Customer');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orders_id` int(4) NOT NULL,
  `user_id` int(4) NOT NULL,
  `orders_date` date NOT NULL,
  `orders_pickup_date` date NOT NULL,
  `orders_pickup_time` time(4) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orders_id`, `user_id`, `orders_date`, `orders_pickup_date`, `orders_pickup_time`, `status`) VALUES
(1, 2, '2021-05-01', '2021-05-01', '10:13:25.0000', 'complete'),
(2, 3, '2021-05-01', '2021-06-01', '16:43:00.0000', 'complete'),
(3, 4, '2021-05-01', '2021-06-01', '16:47:00.0000', 'complete'),
(4, 2, '2021-05-02', '2021-06-02', '16:48:00.0000', 'complete'),
(5, 5, '2021-05-02', '2021-05-02', '19:02:00.0000', 'complete'),
(6, 3, '2021-05-02', '2021-05-02', '00:00:00.0000', 'complete'),
(7, 4, '2021-05-02', '2021-06-02', '10:13:25.0000', 'complete'),
(8, 4, '2021-05-02', '2021-05-02', '19:30:00.0000', 'complete'),
(9, 5, '2021-05-02', '2021-06-02', '17:14:00.0000', 'complete'),
(10, 5, '2021-05-03', '2021-05-03', '17:14:00.0000', 'complete'),
(11, 4, '2021-05-03', '2021-05-03', '17:14:00.0000', 'complete'),
(12, 3, '2021-05-03', '2021-05-03', '17:14:00.0000', 'complete'),
(13, 2, '2021-05-03', '2021-05-03', '17:14:00.0000', 'complete'),
(14, 2, '2021-05-03', '2021-05-04', '17:18:00.0000', 'complete'),
(15, 2, '2021-05-03', '2021-05-05', '17:18:00.0000', 'complete'),
(16, 2, '2021-05-03', '2021-05-06', '17:24:00.0000', 'complete'),
(17, 2, '2021-05-03', '2021-05-06', '14:30:00.0000', 'complete'),
(18, 5, '2021-05-04', '2021-05-04', '14:30:00.0000', 'complete'),
(19, 3, '2021-05-04', '2021-05-04', '10:34:00.7820', 'complete'),
(20, 5, '2021-06-01', '2021-06-10', '16:23:00.0000', 'processing'),
(21, 4, '2021-06-01', '2021-06-17', '16:23:00.0000', 'processing'),
(22, 2, '2021-06-01', '2021-06-15', '16:23:00.0000', 'processing'),
(23, 5, '2021-06-02', '2021-06-14', '23:00:00.0000', 'processing'),
(24, 3, '2021-06-02', '2021-06-06', '15:09:00.0000', 'processing');

-- --------------------------------------------------------

--
-- Table structure for table `orders_detail`
--

CREATE TABLE `orders_detail` (
  `detail_id` int(4) NOT NULL,
  `orders_id` int(4) NOT NULL,
  `product_id` int(4) NOT NULL,
  `qty` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders_detail`
--

INSERT INTO `orders_detail` (`detail_id`, `orders_id`, `product_id`, `qty`) VALUES
(1, 1, 3, 1),
(2, 1, 9, 1),
(3, 1, 9, 1),
(4, 1, 4, 1),
(5, 1, 1, 1),
(6, 2, 10, 1),
(7, 4, 7, 2),
(8, 5, 3, 1),
(9, 5, 7, 2),
(10, 6, 3, 1),
(11, 7, 3, 1),
(12, 8, 3, 1),
(13, 9, 3, 1),
(14, 10, 3, 1),
(15, 11, 3, 1),
(16, 12, 3, 1),
(17, 13, 3, 1),
(18, 14, 3, 1),
(19, 15, 3, 1),
(20, 16, 1, 1),
(21, 17, 4, 1),
(22, 18, 4, 1),
(23, 19, 9, 1),
(24, 20, 3, 1),
(25, 20, 11, 1),
(26, 21, 3, 1),
(27, 21, 11, 1),
(28, 22, 3, 1),
(29, 22, 11, 1),
(30, 23, 3, 1),
(31, 23, 7, 1),
(32, 23, 6, 1),
(33, 24, 3, 1),
(34, 24, 11, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(4) NOT NULL,
  `product_name` varchar(20) NOT NULL,
  `product_description` varchar(500) NOT NULL,
  `product_status` varchar(20) NOT NULL,
  `product_category` varchar(50) NOT NULL,
  `product_size` varchar(10) NOT NULL,
  `product_price` decimal(10,2) NOT NULL,
  `picture` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_description`, `product_status`, `product_category`, `product_size`, `product_price`, `picture`) VALUES
(1, 'Flat White', 'A flat white is a coffee drink consisting of espresso with microfoam (steamed milk with small, fine bubbles and a glossy or velvety consistency)', '1', '1', '2', '15.00', 'flat white.PNG'),
(3, 'Cappuccino', ' Made By Topping A Shot Of Espresso With Steamed Milk And Milk Foam. Typically, It Contains Equal Parts Of Each And Is Made Up Of About 1/3 Espresso, 1', '1', '1', '2', '15.00', 'cappuccino.PNG'),
(4, 'Espresso', '  Properly Pulled Shot Of Espresso, Topped With A “crema,” A Brown Foam That Forms When Air Bubbles Combine With The Soluble Oils Of Fine-ground Coffee.', '1', '1', '2', '12.00', 'espresso.PNG'),
(5, 'Latte', 'A Latte Begins With The Same Base — A Single Or Double Shot Of Espresso. This Espresso Is Then Combined With Several Ounces Of Steamed Milk To Create A Rich, Creamy Beverage That Has A More Subtle Espresso Taste. The Typical Ratio For Espresso To Steamed Milk Is About 1-to-2. The Latte Is Then Topped With A Layer Of Foam.', '2', '1', '2', '15.00', 'latte.PNG'),
(6, 'Mocha', 'Rich, Full-bodied Espresso Combined With Bittersweet Mocha Sauce And Steamed Milk, Then Topped With Sweetened Whipped Cream. The Classic Coffee Drink That Always Sweetly Satisfies.', '1', '2', '1', '18.00', 'mocha.PNG'),
(7, 'Mocha', 'Rich, Full-bodied Espresso Combined With Bittersweet Mocha Sauce And Steamed Milk, Then Topped With Sweetened Whipped Cream. The Classic Coffee Drink That Always Sweetly Satisfies.', '1', '1', '2', '15.00', 'mocha.PNG'),
(9, 'Flat White', 'Cold: A Flat White Is A Coffee Drink Consisting Of Espresso With Microfoam (steamed Milk With Small, Fine Bubbles And A Glossy Or Velvety Consistency)', '1', '2', '1', '18.00', 'flat white cold.PNG'),
(10, 'Latte', 'Cold: A Latte Begins With The Same Base — A Single Or Double Shot Of Espresso. This Espresso Is Then Combined With Several Ounces Of Steamed Milk To Create A Rich, Creamy Beverage That Has A More Subtle Espresso Taste. The Typical Ratio For Espresso To Steamed Milk Is About 1-to-2. The Latte Is Then Topped With A Layer Of Foam.', '1', '2', '1', '18.00', 'latte cold.PNG'),
(11, 'Latte', 'A Latte Begins With The Same Base — A Single Or Double Shot Of Espresso. This Espresso Is Then Combined With Several Ounces Of Steamed Milk To Create A Rich, Creamy Beverage That Has A More Subtle Espresso Taste. The Typical Ratio For Espresso To Steamed Milk Is About 1-to-2. The Latte Is Then Topped With A Layer Of Foam.', '1', '1', '2', '15.00', 'latte.PNG');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(4) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `gender` int(2) NOT NULL,
  `address` varchar(100) NOT NULL,
  `telephone` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `picture` varchar(100) NOT NULL,
  `level_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `name`, `gender`, `address`, `telephone`, `email`, `picture`, `level_id`) VALUES
(1, 'admin', 'a', 'Siti Nur', 2, 'No1, Jalan Bujang 12, Taman Lembah Bujang,  08400 Merbok, Sungai Petani, Kedah', '0195710562', 'sitinurbayaismail151@gmail.com', 'siti.PNG', 1),
(2, 'fitry', 'fitry', 'Fitry Hamid', 1, 'No 9, Taman Harum, Perlis', '0178989895', 'fitry@gmail.com', 'fitryhamid.jpg', 2),
(3, 'nadrah', 'nadrah', 'Nadrah Nazri', 2, 'No23, Jalan Selasih 3,Taman Bunga,81131 Johor Bahru, Johor', '0127897892', 'nadrah@gmail', 'nadrah.png', 2),
(4, 'tina', 'tina', 'Tina Sofea', 2, '12 Jalan Bahagia, Taman Sejahtera, 08000 Sungai Petani, Kedah', '0123456788', 'tina@gmail.com', 'tinasofea.png', 2),
(5, 'azra', 'a', 'Azra Alisha', 2, 'No 4, Jalan Lagenda 11, Lagenda Heights, 08000 Sungai Petani, Kedah', '0111234568', 'azra@gmail.com', 'azra.PNG', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orders_id`);

--
-- Indexes for table `orders_detail`
--
ALTER TABLE `orders_detail`
  ADD PRIMARY KEY (`detail_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orders_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `orders_detail`
--
ALTER TABLE `orders_detail`
  MODIFY `detail_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
