-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 09, 2026 at 10:10 AM
-- Server version: 8.4.3
-- PHP Version: 8.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `joybite_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id` int NOT NULL,
  `nama_dessert` varchar(255) NOT NULL,
  `harga` int NOT NULL,
  `jumlah` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` int NOT NULL,
  `rating` decimal(2,1) NOT NULL,
  `jumlah_ulasan` int NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `nama_produk`, `deskripsi`, `harga`, `rating`, `jumlah_ulasan`, `kategori`, `gambar`) VALUES
(1, 'Strawberry Cheesecake', 'Strawberry Cheesecake yang lembut dan lezat akan membuat harimu lebih sempurna. segera penuhi craving mu!', 45000, 4.5, 7, 'Dessert', 'strawberrycheesecake.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `produk_dessert`
--

CREATE TABLE `produk_dessert` (
  `id` int NOT NULL,
  `nama_dessert` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `harga` int NOT NULL,
  `stok` int NOT NULL,
  `deskripsi` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk_dessert`
--

INSERT INTO `produk_dessert` (`id`, `nama_dessert`, `harga`, `stok`, `deskripsi`) VALUES
(1, 'Dubai Chewy Cookie', 20, 1, ''),
(2, 'Strawberry Shortcake', 0, 0, ''),
(3, 'Fudgy Brownies', 0, 0, ''),
(4, 'Tiramissu', 0, 0, ''),
(5, 'Eclair', 0, 0, ''),
(6, 'Shortcake', 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `nama_lengkap`, `password`, `role`) VALUES
(1, 'rere', 'reruy', 'rere123', 'pembeli'),
(2, 'andita', 'andituy', 'andita123', 'admin'),
(3, 'lais', 'laisuy', 'lais123', 'penjual');

-- --------------------------------------------------------

--
-- Table structure for table `validasi_prdouk`
--

CREATE TABLE `validasi_prdouk` (
  `id_validasi` int NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `nama_toko` varchar(255) NOT NULL,
  `status` text NOT NULL,
  `deskripsi` text NOT NULL,
  `dibuat_pada` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk_dessert`
--
ALTER TABLE `produk_dessert`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `validasi_prdouk`
--
ALTER TABLE `validasi_prdouk`
  ADD PRIMARY KEY (`id_validasi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `produk_dessert`
--
ALTER TABLE `produk_dessert`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `validasi_prdouk`
--
ALTER TABLE `validasi_prdouk`
  MODIFY `id_validasi` int NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
