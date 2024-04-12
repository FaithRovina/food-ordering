-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3308
-- Generation Time: Apr 12, 2024 at 09:20 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food-ordering`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminid` int(10) UNSIGNED NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminid`, `fullname`, `username`, `password`) VALUES
(4, 'Faith Rovina', 'faith_rovina', '$2y$10$CyxUU3oNYkoH6guwdPb/Xe/i8pGVJSv9sq8E9EH95wzeTCjYLrd1O'),
(5, 'Hillary Otuom', 'hihi', '$2y$10$nlKyL6AiHaXGSg3aw8zMo.eSbhl0V377lN4vmfOVoEziu5HpA1ACq'),
(15, 'Felix Kasyoka', 'kilimani_manager', '$2y$10$q4HZdGR.IZjC7bgBJZrNLOTUfXsp/SY2CSPX5p/6cV6YyLAoAZFou'),
(16, 'admin', 'admin_user', '$2y$10$DUNORP81PHy3mbT.gYonW.myXhJahCULB4MziiHvzXmepV4hgOiWO');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `catid` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `catimage` varchar(255) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`catid`, `title`, `catimage`, `featured`, `active`) VALUES
(2, 'Smoothies', 'smoothies_cover.jpg', 'yes', 'yes'),
(3, 'Desserts', 'desserts_cover.jpg', 'yes', 'yes'),
(4, 'Burgers', 'burger1.jpg', 'yes', 'yes'),
(6, 'Main Dishes', 'main_meals_cover.jpg', 'yes', 'yes'),
(8, 'Pizza', 'pizzacrust.jpg', 'yes', 'yes'),
(9, 'Veggies', 'veggies_cover.jpg', 'yes', 'yes'),
(10, 'Breakfast', 'expresso.jpg', 'yes', 'yes'),
(11, 'Drinks', 'cottonmandymocktail.jpg', 'yes', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customerId` int(10) UNSIGNED NOT NULL,
  `customerName` varchar(50) NOT NULL,
  `email` text NOT NULL,
  `phoneno` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customerId`, `customerName`, `email`, `phoneno`, `password`) VALUES
(1, 'Irma Cantu', 'mirebazu@mailinator.com', '+1 (329) 1985293', ''),
(2, 'Keane Gallagher', 'mamaha@mailinator.com', '+1 (729) 769-6849', ''),
(3, 'September Bernard', 'zuguhuc@mailinator.com', '+1 (113) 806-7713', ''),
(4, 'Cade Macias', 'lamymyry@mailinator.com', '+1 (756) 555-7351', ''),
(5, 'Alika Molina', 'cakizejoby@mailinator.com', '+1 (131) 286-5736', ''),
(6, 'Ferris Conner', 'nunubez@mailinator.com', '+1 (437) 188-9826', ''),
(7, 'Thaddeus Dalton', 'hymor@mailinator.com', '+1 (521) 658-6754', ''),
(8, 'Jordan Mcintosh', 'tepeqy@mailinator.com', '+1 (151) 181-2495', ''),
(9, 'Ivana Harrington', 'fifexule@mailinator.com', '+1 (786) 239-6641', ''),
(10, 'Iris Wong', 'pypomul@mailinator.com', '+1 (924) 446-6545', ''),
(11, 'Haviva Ellis', 'laxebi@mailinator.com', '+1 (264) 591-1798', ''),
(12, 'Tatyana Dotson', 'vapysiteba@mailinator.com', '+1 (561) 519-8812', ''),
(13, 'Katell Mason', 'vecejagew@mailinator.com', '+1 (212) 464-9175', ''),
(14, 'September Huber', 'befitomufu@mailinator.com', '+1 (316) 926-4224', ''),
(15, 'Malcolm Armstrong', 'qicy@mailinator.com', '+1 (286) 341-4047', ''),
(16, 'Mara Flores', 'xadifig@mailinator.com', '+1 (919) 297-6215', ''),
(17, 'Noel Dean', 'nukitijuto@mailinator.com', '+1 (636) 709-2306', ''),
(18, 'Phelan Vaughn', 'kypapup@mailinator.com', '+1 (542) 692-8584', ''),
(19, 'Kermit Chang', 'gyluqux@mailinator.com', '+1 (962) 538-7543', ''),
(20, 'Maisie Hull', 'pakuwoqo@mailinator.com', '+1 (226) 307-7373', ''),
(21, 'Sydnee Delgado', 'libopymere@mailinator.com', '+1 (592) 787-8878', ''),
(22, 'Kylee Jimenez', 'noxy@mailinator.com', '+1 (189) 162-9756', ''),
(23, 'Mechelle Allison', 'jopizoce@mailinator.com', '+1 (958) 367-9521', ''),
(24, 'Samson Ward', 'cavyqyc@mailinator.com', '+1 (336) 166-7949', '');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `fid` int(10) UNSIGNED NOT NULL,
  `fname` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `food_image` varchar(255) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`fid`, `fname`, `description`, `price`, `food_image`, `category_id`, `featured`, `active`) VALUES
(23, 'Rosemary proseco', 'Savory herb meets bubbly, elegant prosecco. Delightful.', 10.00, 'rosemaryproseco.jpg', 11, 'yes', 'yes'),
(24, 'Cotton Mandy Mocktail', 'Fluffy cotton candy flavors in a mocktail.\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 12.00, 'cottonmandymocktail.jpg', 11, 'yes', 'yes'),
(25, 'Blue Curacao Margarita', 'Tropical twist on classic margarita', 11.00, 'bluecuracaomargarita.jpg', 11, 'yes', 'yes'),
(26, 'Crepes', 'Thin, delicate pancakes: versatile, delicious fillings inside.\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 20.00, 'Crepes.jpg', 10, 'yes', 'yes'),
(27, 'Vitumbua', 'Tanzanian coconut rice cakes: soft, aromatic bites.\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 14.00, 'vitumbua.jpg', 10, 'yes', 'yes'),
(28, 'BlueBerry', 'Refreshing blend: blueberries swirl in creamy goodness.\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 12.00, 'blueberry.jpg', 2, 'yes', 'yes'),
(29, 'Black noodles', 'Dark, sleek noodles: rich, savory indulgence awaits.\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 20.00, 'black_noodles.jpg', 6, 'yes', 'yes'),
(30, 'Avocado salad', 'Creamy avocado with crisp, fresh vegetables.\r\n\r\n\r\n\r\n', 9.00, 'avocado_salad.jpg', 9, 'yes', 'yes'),
(31, 'Cheesecake', 'Rich, creamy, decadent dessert with luscious topping.\r\n\r\n\r\n\r\n', 15.00, 'cheesecake.jpg', 3, 'yes', 'yes'),
(32, 'Asparagus', 'Tender spears with earthy, nutty flavor.\r\n\r\n\r\n\r\n', 25.00, 'asparagus.jpg', 9, 'yes', 'yes'),
(33, 'Bacon & Bread', 'Crispy bacon meets toasted bread', 15.00, 'bacon_bread.jpg', 10, 'yes', 'yes'),
(34, 'Beef pasta', 'Hearty beef sauce over al dente pasta.\r\n\r\n\r\n\r\n', 25.00, 'beef_pasta.jpg', 6, 'yes', 'yes'),
(35, 'Brownie Kebabs', 'Brownie cubes on skewers for easy snacking.', 9.00, 'browniekebabs.jpg', 3, 'yes', 'yes'),
(36, 'Barbeque Chicken Pizza', 'Grilled chicken on pizza with BBQ sauce.\r\n\r\n\r\n\r\n', 30.00, 'bbqchickenpizza.jpg', 8, 'yes', 'yes'),
(37, 'Mangostone Juice', 'Refreshing tropical juice with sweet, tangy flavor.\r\n\r\n\r\n\r\n', 10.00, 'mangostone.jpg', 11, 'yes', 'yes'),
(38, 'Chicken Teriyaki', 'Grilled chicken glazed in savory teriyaki sauce.\r\n\r\n\r\n\r\n', 20.00, 'chicken_teriyaki.jpg', 6, 'yes', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(10) UNSIGNED NOT NULL,
  `food_id` int(11) NOT NULL,
  `quantity` int(10) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `status_id` varchar(50) NOT NULL DEFAULT '1',
  `customer_id` varchar(100) NOT NULL,
  `orderDate` datetime NOT NULL,
  `tableNumber` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `food_id`, `quantity`, `total`, `status_id`, `customer_id`, `orderDate`, `tableNumber`) VALUES
(23, 10, 1, 90.00, '1', '23', '2024-04-12 12:08:25', 7),
(24, 26, 4, 80.00, '1', '24', '2024-04-12 19:08:35', 4);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `sname` varchar(50) NOT NULL DEFAULT '1',
  `sid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`sname`, `sid`) VALUES
('Ordered', 1),
('Processing', 2),
('Delivered', 3),
('Cancelled', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminid`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`catid`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customerId`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`fid`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`sid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `catid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customerId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `fid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `sid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
