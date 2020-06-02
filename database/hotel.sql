-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2020 at 11:46 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `national_number` bigint(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `marital_statues` varchar(7) NOT NULL,
  `gender` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`national_number`, `name`, `email`, `phone`, `marital_statues`, `gender`) VALUES
(1234567891423, 'راجيا ', 'ragia@gmail.com', '01158380535', 'اعزب', 'انثى'),
(1234567891425, 'احمد', 'wonox27128@eroyal.net', '01158380536', 'اعزب', 'ذكر');

-- --------------------------------------------------------

--
-- Table structure for table `customer_fav`
--

CREATE TABLE `customer_fav` (
  `id` int(11) NOT NULL,
  `customer_id` bigint(20) NOT NULL,
  `fav_id` int(11) NOT NULL,
  `desc_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer_fav`
--

INSERT INTO `customer_fav` (`id`, `customer_id`, `fav_id`, `desc_id`) VALUES
(3, 1234567891423, 1, 2),
(4, 1234567891423, 2, 5),
(5, 1234567891425, 1, 2),
(6, 1234567891425, 2, 4),
(7, 1234567891425, 3, 7),
(8, 1234567891423, 3, 6);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `emp_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`emp_id`, `name`, `username`, `password`) VALUES
(1, 'احمد محمد', 'ahmed1', '40bd001563085fc35165329ea1ff5c5ecbdbbeef');

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `fav_id` int(11) NOT NULL,
  `fav_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `favorites`
--

INSERT INTO `favorites` (`fav_id`, `fav_name`) VALUES
(1, 'درجة التكييف'),
(2, 'نوع الطعام'),
(3, 'القهوة');

-- --------------------------------------------------------

--
-- Table structure for table `fav_desc`
--

CREATE TABLE `fav_desc` (
  `desc_id` int(11) NOT NULL,
  `fav_id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fav_desc`
--

INSERT INTO `fav_desc` (`desc_id`, `fav_id`, `description`) VALUES
(1, 1, 'دافئ'),
(2, 1, 'بارد'),
(3, 2, 'طعام صحى'),
(4, 2, 'طعام نباتى'),
(5, 2, 'الطعام المتنوع'),
(6, 3, 'مظبوط'),
(7, 3, 'سادة');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `room_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `floor` varchar(10) NOT NULL,
  `number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`room_id`, `cat_id`, `floor`, `number`) VALUES
(1, 1, 'الاول', 101),
(2, 1, 'الاول', 102),
(3, 1, 'الاول', 103),
(4, 2, 'الثانى', 201);

-- --------------------------------------------------------

--
-- Table structure for table `room_categories`
--

CREATE TABLE `room_categories` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(50) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `room_categories`
--

INSERT INTO `room_categories` (`cat_id`, `cat_name`, `image`, `description`) VALUES
(1, 'غرفة أحادية', 'about-2.jpg', 'تحتوى على سرير مريح وتطل على حمام السباحة, ربما الصورة لا توضح مدى جودة واريحية الغرفة.'),
(2, 'غرفة ثنائية', 'room-3.jpg', 'تحتوى على سرير مريح وتطل على حمام السباحة, ربما الصورة لا توضح مدى جودة واريحية الغرفة. ييسبؤ نبقب صنمثقبةثص '),
(3, 'جناح', 'room-4.jpg', 'تحتوى على سرير مريح وتطل على حمام السباحة, ربما الصورة لا توضح مدى جودة واريحية الغرفة.');

-- --------------------------------------------------------

--
-- Table structure for table `room_reservation`
--

CREATE TABLE `room_reservation` (
  `reserve_id` int(11) NOT NULL,
  `customer_id` bigint(20) NOT NULL,
  `room_cat` int(11) NOT NULL,
  `room_id` int(11) NOT NULL DEFAULT '0',
  `reservation_date` date NOT NULL,
  `check_in_date` varchar(20) NOT NULL,
  `duration` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `room_reservation`
--

INSERT INTO `room_reservation` (`reserve_id`, `customer_id`, `room_cat`, `room_id`, `reservation_date`, `check_in_date`, `duration`) VALUES
(1, 1234567891423, 1, 101, '2020-05-01', '02/05/2020', 3),
(2, 1234567891425, 1, 0, '2020-05-05', '05/10/2020', 5);

-- --------------------------------------------------------

--
-- Table structure for table `trips`
--

CREATE TABLE `trips` (
  `trip_id` int(11) NOT NULL,
  `place` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` varchar(10) NOT NULL,
  `date` date NOT NULL,
  `place_image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `trips`
--

INSERT INTO `trips` (`trip_id`, `place`, `description`, `price`, `date`, `place_image`) VALUES
(1, 'الشاطئ', 'حفلة شواء على شاطئ البحر والاستمتاع بلعبة كرة اليد وقضاء وقت ممتع مع الاصدقاء التحرك الساعة العاشرة صباحا والعودة منتصف الليل ', '200', '2020-05-13', 'service-1.jpg'),
(2, 'الغردقة', 'سوف تستمتع فى هذه الرحلة كثيرا سيبدا يومنا صباحا ونستمتع بالشاطئ والاماكن السياحية ثم رحلة غوص ورؤية الشعاب المرجانية ', '1000', '2020-05-25', 'service-8.jpg'),
(4, 'لميمبل', 'ليليولموفل', '300', '2020-06-03', '3679_kid-img.png');

-- --------------------------------------------------------

--
-- Table structure for table `trips_reservation`
--

CREATE TABLE `trips_reservation` (
  `id` int(11) NOT NULL,
  `customer_id` bigint(20) NOT NULL,
  `trip_id` int(11) NOT NULL,
  `reservation_date` date NOT NULL,
  `wait` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `trips_reservation`
--

INSERT INTO `trips_reservation` (`id`, `customer_id`, `trip_id`, `reservation_date`, `wait`) VALUES
(1, 1234567891423, 1, '2020-05-05', 1),
(2, 1234567891425, 2, '2020-05-05', 0);

-- --------------------------------------------------------

--
-- Table structure for table `try`
--

CREATE TABLE `try` (
  `the_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `try`
--

INSERT INTO `try` (`the_date`) VALUES
('2020-05-06'),
('2020-05-04'),
('2020-05-04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`national_number`);

--
-- Indexes for table `customer_fav`
--
ALTER TABLE `customer_fav`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `fav_id` (`fav_id`),
  ADD KEY `desc_id` (`desc_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`fav_id`);

--
-- Indexes for table `fav_desc`
--
ALTER TABLE `fav_desc`
  ADD PRIMARY KEY (`desc_id`),
  ADD KEY `fav_id` (`fav_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`room_id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Indexes for table `room_categories`
--
ALTER TABLE `room_categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `room_reservation`
--
ALTER TABLE `room_reservation`
  ADD PRIMARY KEY (`reserve_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `room_id` (`room_id`),
  ADD KEY `room_cat` (`room_cat`);

--
-- Indexes for table `trips`
--
ALTER TABLE `trips`
  ADD PRIMARY KEY (`trip_id`);

--
-- Indexes for table `trips_reservation`
--
ALTER TABLE `trips_reservation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `trip_id` (`trip_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer_fav`
--
ALTER TABLE `customer_fav`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `favorites`
--
ALTER TABLE `favorites`
  MODIFY `fav_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `fav_desc`
--
ALTER TABLE `fav_desc`
  MODIFY `desc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `room_categories`
--
ALTER TABLE `room_categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `room_reservation`
--
ALTER TABLE `room_reservation`
  MODIFY `reserve_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `trips`
--
ALTER TABLE `trips`
  MODIFY `trip_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `trips_reservation`
--
ALTER TABLE `trips_reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer_fav`
--
ALTER TABLE `customer_fav`
  ADD CONSTRAINT `cus_desc` FOREIGN KEY (`desc_id`) REFERENCES `fav_desc` (`desc_id`),
  ADD CONSTRAINT `cus_fav` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`national_number`),
  ADD CONSTRAINT `customer_fav_desc` FOREIGN KEY (`fav_id`) REFERENCES `favorites` (`fav_id`);

--
-- Constraints for table `fav_desc`
--
ALTER TABLE `fav_desc`
  ADD CONSTRAINT `fav_desc_fk` FOREIGN KEY (`fav_id`) REFERENCES `favorites` (`fav_id`);

--
-- Constraints for table `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `fk_cat` FOREIGN KEY (`cat_id`) REFERENCES `room_categories` (`cat_id`);

--
-- Constraints for table `room_reservation`
--
ALTER TABLE `room_reservation`
  ADD CONSTRAINT `custo` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`national_number`),
  ADD CONSTRAINT `romm` FOREIGN KEY (`room_cat`) REFERENCES `room_categories` (`cat_id`);

--
-- Constraints for table `trips_reservation`
--
ALTER TABLE `trips_reservation`
  ADD CONSTRAINT `cust_tr` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`national_number`),
  ADD CONSTRAINT `trip_tr` FOREIGN KEY (`trip_id`) REFERENCES `trips` (`trip_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
