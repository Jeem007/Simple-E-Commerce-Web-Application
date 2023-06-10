-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2022 at 04:09 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mid_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(250) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(2, 'admin', 'admin1234');

-- --------------------------------------------------------

--
-- Table structure for table `dman`
--

CREATE TABLE `dman` (
  `id` int(255) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `image` varchar(200) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dman`
--

INSERT INTO `dman` (`id`, `fullname`, `username`, `email`, `mobile`, `gender`, `image`, `password`) VALUES
(2, 'Farhan Sayef ', 'sayef68', 'sayef68@gmail.com', '01345784545', 'Male', '461.png', 'sayef1234'),
(3, 'Ashfak Rafi', 'rafi84', 'rafi84@gmail.com', '01457865485', 'Male', 'avatar-JohnDoe.jpg', 'rafi1234');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(250) NOT NULL,
  `sellername` varchar(250) NOT NULL,
  `name` varchar(250) NOT NULL,
  `image` varchar(250) NOT NULL,
  `price` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `sellername`, `name`, `image`, `price`) VALUES
(18, 'tareq12', 'Apple MacBook Pro 13.3-Inch Retina Display 8-core Apple M1 chip with 8GB RAM, 256GB SSD (MYD82)', 'macbook-myd92-500x500.jpg', '152000'),
(19, 'tareq12', 'Acer Aspire 3 A315-58 Core i3 11th Gen 15.6\" FHD Laptop', 'aspire-3-a315-58-001-500x500.jpg', '78550'),
(20, 'anwar12', 'SAMSUNG Galaxy S22 Ultra 5G', 's22_ultra_0.jpg', '144000'),
(21, 'anwar12', 'SAMSUNG Galaxy Watch 4 44mm-green', 'galaxy-watch4-44mm-green-01-500x500.jpg', '22500'),
(22, 'anwar12', 'Apple Watch Series 6 Silver', 'watch-6-53116.jpg', '60850'),
(23, 'anwar12', 'Apple-iPhone-14-Pro-Max-Space-Black	', 'Apple-iPhone-14-Pro-Max-Space-Black.jpg', '156500'),
(24, 'efat84', 'Aspire-3 A315 Laptop 15', 'aspire-3-a315-58-001-500x500.jpg', '74500'),
(28, 'tanveer1234', 'Laptop', 'lenovo-laptops-ideapad-5-15in-intel-hero.jpg', '75000');

-- --------------------------------------------------------

--
-- Table structure for table `purchasehistory`
--

CREATE TABLE `purchasehistory` (
  `purchase_token` int(250) NOT NULL,
  `username` varchar(250) NOT NULL,
  `product_name` varchar(250) NOT NULL,
  `price` varchar(250) NOT NULL,
  `quantity` varchar(250) NOT NULL,
  `total` varchar(250) NOT NULL,
  `date` date NOT NULL,
  `location` varchar(250) NOT NULL,
  `dstatus` varchar(250) NOT NULL,
  `dtime` datetime NOT NULL,
  `dman` varchar(250) NOT NULL DEFAULT '----'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchasehistory`
--

INSERT INTO `purchasehistory` (`purchase_token`, `username`, `product_name`, `price`, `quantity`, `total`, `date`, `location`, `dstatus`, `dtime`, `dman`) VALUES
(16, 'rakib007', 'SAMSUNG Galaxy Watch 4 44mm-green', '22500', '2', '45000', '2022-11-04', 'Kamal Khan Road,Mirpur-14', 'delivered', '2022-12-02 14:15:07', 'sayef68'),
(18, 'rakib007', 'Apple Watch Series 6 Silver', '60850', '1', '60850', '2022-11-05', 'Dhaka,Mirpur-14', 'delivered', '2022-12-02 14:28:20', 'sayef68'),
(19, 'rakib007', 'MSI Optix MAG245R2 23.8', '24999', '1', '24999', '2022-11-05', 'Dhaka,Mirpur-14', 'delivered', '2022-12-02 14:28:55', 'sayef68'),
(20, 'tushar48', 'Apple Watch Series 6 Silver', '60850', '1', '60850', '2022-11-05', 'Mirpur-10, Dhaka', 'delivered', '2022-12-02 14:10:20', 'sayef68'),
(21, 'rakib007', 'ASRock X570S PG Riptide AMD AM4 ATX Motherboard', '22800', '1', '22800', '2022-11-06', 'Kuril,Dhaka', 'delivered', '2022-12-03 03:56:49', 'rafi84'),
(22, 'tushar48', 'Razer Book 13 Core i7 11th Gen 512GB SSD 13.4', '190000', '2', '380000', '2022-11-06', 'Dhaka', 'delivered', '2022-12-02 14:32:18', 'rafi84'),
(23, 'tushar48', 'Apple MacBook Pro 13.3-Inch Retina Display 8-core Apple M1 chip with 8GB RAM, 256GB SSD (MYD82)', '152000', '2', '304000', '2022-12-02', 'Dhaka, Kafrul', 'delivered', '2022-12-02 14:32:03', 'rafi84'),
(24, 'alam68', 'SAMSUNG Galaxy Watch 4 44mm-green', '22500', '1', '22500', '2022-12-02', 'Kafrul,Dhaka', 'delivered', '2022-12-02 13:59:03', 'rafi84'),
(25, 'alam68', 'Acer Aspire 3 A315-58 Core i3 11th Gen 15.6', '78550', '1', '78550', '2022-12-02', 'Mirpur-Dhaka', 'delivered', '2022-12-02 14:33:00', 'rafi84'),
(26, 'tushar48', 'Acer Aspire 3 A315-58 Core i3 11th Gen 15.6', '78550', '1', '78550', '2022-12-03', 'Dhaka', 'delivered', '2022-12-03 03:56:38', 'rafi84'),
(27, 'tushar48', 'Apple Watch Series 6 Silver', '60850', '1', '60850', '2022-12-03', 'Mirpur', 'delivered', '2022-12-03 11:46:35', 'rafi84'),
(28, 'asad48', 'Acer Aspire 3 A315-58 Core i3 11th Gen 15.6', '78550', '1', '78550', '2022-12-03', 'Dhanmondi, Dhaka', 'delivered', '2022-12-03 22:22:26', 'rafi84'),
(29, 'tushar48', 'Apple-iPhone-14-Pro-Max-Space-Black	', '156500', '1', '156500', '2022-12-03', 'Dhaka, Mirpur-14', 'delivered', '2022-12-03 22:24:54', 'rafi84'),
(30, 'rafik48', 'SAMSUNG Galaxy Watch 4 44mm-green', '22500', '1', '22500', '2022-12-04', 'Dhaka, Mirpur-14', 'delivered', '2022-12-04 08:42:04', 'sayef68'),
(31, 'rafik48', 'Razer Book 13 Core i7 11th Gen 512GB SSD 13.4', '190000', '1', '190000', '2022-12-04', 'Dhaka', '', '0000-00-00 00:00:00', '----'),
(32, 'tushar48', 'Razer Book 13 Core i7 11th Gen 512GB SSD 13.4', '190000', '1', '190000', '2022-12-04', 'Dhaka', 'delivered', '2022-12-04 10:30:07', 'rafi84'),
(33, 'rakib4', 'SAMSUNG Galaxy S22 Ultra 5G', '144000', '2', '288000', '2022-12-11', 'Dhaka', 'delivered', '2022-12-11 08:20:35', 'rafi84');

-- --------------------------------------------------------

--
-- Table structure for table `sellers`
--

CREATE TABLE `sellers` (
  `id` int(250) NOT NULL,
  `fullname` varchar(250) NOT NULL,
  `username` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `mobile` varchar(30) NOT NULL,
  `gender` varchar(200) NOT NULL,
  `image` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sellers`
--

INSERT INTO `sellers` (`id`, `fullname`, `username`, `email`, `mobile`, `gender`, `image`, `password`) VALUES
(2, 'Anwar Sheikh Rana', 'anwar12', 'anwar12@gmail.com', '01452345245', 'Male', 'malecostume-512.jpg', 'anwar1234'),
(3, 'Tareq Rahman Shovon', 'tareq12', 'tareq12@gmail.com', '01785452452', 'Male', 'ima151ges.png', 'tareq1234'),
(4, 'Farhan Efat', 'efat84', 'efat89@gmail.com', '01845624521', 'Male', '8b167af653c2399dd93b952a48740620.jpg', 'efat1234'),
(7, 'Mehedi tanveer', 'tanveer1234', 'tanveer@gmail.com', '01457897897', 'Male', '8b167af653c2399dd93b952a48740620.jpg', 'tanvir1234');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(20) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `image` varchar(200) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `username`, `email`, `mobile`, `gender`, `image`, `password`) VALUES
(20, 'Rayhan Ahmed', 'rayhan45', 'rayhan45@gmail.com', '01423545868', 'Male', 'image2s.jpg', 'rayhan1234'),
(23, 'Akash Rahman', 'akash18', 'akash18@gmail.com', '01452345245', 'Male', 'img_504768.png', 'akash1234'),
(24, 'Sarika Sabah', 'sabah78', 'sabah78@gmail.com', '01354568785', 'Female', 'Aesthetic-PFP-2.jpg', 'sabah1234'),
(25, 'Shakib Khan', 'shakib18', 'shakib18@gmail.com', '01954523145', 'Male', '27b9464ddd198da1f76bdbd45d4d5078.jpg', 'shakib1234'),
(26, 'Tanvir Rahman Tushar', 'tushar48', 'tushar48@gmail.com', '01706525479', 'Male', 'png-transparent-avatar-user-computer-icons-software-developer-avatar-child-face-heroes.png', 'tushar1234'),
(42, 'Rahman Fahad', 'fahad68', 'fahad68@gmail.com', '01345789457', 'Male', '461.png', 'fahad1234'),
(56, 'Asad Rahman', 'asad48', 'asad48@gmail.com', '01345314789', 'Male', '461.png', 'asad1234'),
(57, 'Rafik Rahman', 'rafik48', 'rafik@gmail.com', '01234547878', 'Male', '461.png', 'rafik1234'),
(58, 'Rafik Rahn', 'rafik5', 'raff@gmail.com', '01545456444', 'Male', '8b167af653c2399dd93b952a48740620.jpg', 'rafik456'),
(59, 'Md Rakib Hasan', 'rakib007', 'rakib@gmail.com', '01580740792', 'Male', 'avetetsuya-studios-alien.jpg', 'rakib1234'),
(60, 'rakib hasan', 'rakib4', 'rakib1234@gmail.com', '01457897897', 'Male', '8b167af653c2399dd93b952a48740620.jpg', 'rakib1456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dman`
--
ALTER TABLE `dman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchasehistory`
--
ALTER TABLE `purchasehistory`
  ADD PRIMARY KEY (`purchase_token`);

--
-- Indexes for table `sellers`
--
ALTER TABLE `sellers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `dman`
--
ALTER TABLE `dman`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `purchasehistory`
--
ALTER TABLE `purchasehistory`
  MODIFY `purchase_token` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `sellers`
--
ALTER TABLE `sellers`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
