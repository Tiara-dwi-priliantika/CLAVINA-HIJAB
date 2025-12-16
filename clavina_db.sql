-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2025 at 08:44 AM
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
-- Database: `clavina_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `nama_produk` varchar(150) NOT NULL,
  `harga` int(11) NOT NULL,
  `diskon` int(11) DEFAULT 0,
  `gambar` varchar(255) NOT NULL,
  `stok` int(11) DEFAULT 100,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `nama_produk`, `harga`, `diskon`, `gambar`, `stok`, `created_at`) VALUES
(1, 'Sakura Set', 189000, 0, 'image/HIJABBBB 1.jpg', 50, '2025-12-14 07:03:56'),
(2, 'Primrose Scarf', 149000, 0, 'image/HIJAB SAKURA.jpg', 60, '2025-12-14 07:03:56'),
(3, 'Elegant Shawl', 179000, 0, 'image/HIJABBBB 2.jpg', 40, '2025-12-14 07:03:56'),
(4, 'Sakura Exclusive', 169000, 0, 'image/SAKURAAA.png', 30, '2025-12-14 07:03:56'),
(5, 'Bloom Scarf', 159000, 0, 'image/ELEGANNNN.png', 45, '2025-12-14 07:03:56'),
(6, 'Velvet Hijab', 155000, 0, 'image/HIJABBARU1.jpg', 70, '2025-12-14 07:03:56'),
(7, 'Rosemary Shawl', 165000, 0, 'image/HIJABBARU2.jpg', 50, '2025-12-14 07:03:56'),
(8, 'Luna Satin', 175000, 0, 'image/HIJABBARU3.jpg', 55, '2025-12-14 07:03:56'),
(9, 'Paris Premium Pink Soft', 135000, 0, 'image/pink soft.jpg', 80, '2025-12-14 07:03:56'),
(10, 'Paris Premium Turkish', 135000, 121500, 'image/turkish.jpg', 75, '2025-12-14 07:03:56'),
(11, 'Paris Premium Purple', 135000, 0, 'image/purple.jpg', 65, '2025-12-14 07:03:56'),
(12, 'Paris Premium Dusty Purple', 135000, 0, 'image/dusty purple.jpg', 60, '2025-12-14 07:03:56'),
(13, 'Paris Premium Soft Grey', 135000, 0, 'image/grey.jpg', 70, '2025-12-14 07:03:56'),
(14, 'Primrose Scarf - Variant 2', 149000, 0, 'image/HIJAB SAKURA.jpg', 40, '2025-12-14 07:07:39'),
(15, 'Sakura Set - Variant 2', 189000, 0, 'image/HIJABBBB 1.jpg', 35, '2025-12-14 07:07:39'),
(16, 'Elegant Shawl - Variant 2', 179000, 0, 'image/HIJABBBB 2.jpg', 31, '2025-12-14 07:07:39'),
(18, 'shawl green', 123000, 0, 'image/1765699099_WhatsApp Image 2025-12-14 at 14.57.35_f498d362.jpg', 32, '2025-12-14 07:58:19'),
(19, 'shawl peach', 120, 0, 'image/1765860206_WhatsApp Image 2025-12-14 at 14.57.35_f498d362.jpg', 150, '2025-12-16 04:43:26');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(1, 'user', 'c23a0b82eeaf0272abeff04574482865', 'user'),
(2, 'admin', '113ce3d26b8f5f4dbcc5f22ed782ded6', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
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
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
