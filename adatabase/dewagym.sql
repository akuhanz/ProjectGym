-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2024 at 01:26 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dewagym`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_02_01_032824_tbl_paket', 1),
(6, '2024_02_01_040137_tbl_produk', 1),
(7, '2024_02_01_040340_tbl_transaksi', 1),
(8, '2024_05_14_135614_transaksi_details', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblpaket`
--

CREATE TABLE `tblpaket` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idpaket` text NOT NULL,
  `Paket` varchar(255) NOT NULL,
  `deskripsipaket` text NOT NULL,
  `harga` decimal(10,2) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tblpaket`
--

INSERT INTO `tblpaket` (`id`, `idpaket`, `Paket`, `deskripsipaket`, `harga`, `gambar`, `created_at`, `updated_at`) VALUES
(1, 'RRQ-0001', 'Paket Bulanan', 'Paket Bulanan adalah opsi yang umumnya ditawarkan oleh gym di mana Anda membayar biaya bulanan untuk mendapatkan akses tak terbatas ke fasilitas gym dan pelatihan. Ini adalah cara yang sangat populer untuk menjaga kebugaran Anda secara konsisten.', '220000.00', '24-05-15bulanan.jpeg', '2024-05-14 19:24:03', '2024-05-14 21:18:15'),
(2, 'RRQ-002', 'Paket Harian atau Pergi', 'Paket Harian atau Pergi adalah opsi yang sangat fleksibel untuk anda yang ingin mengakses fasilitas gym tanpa harus berlangganan jangka panjang. Ini adalah solusi ideal jika Anda tidak ingin berkomitmen dalam jangka waktu tertentu, atau jika Anda hanya ingin sesekali menggunakan fasilitas gym.', '100000.00', '24-05-26harian.jpeg', '2024-05-26 03:02:10', '2024-05-26 03:02:10'),
(3, 'RRQ-003', 'Paket Student atau Pelajar', 'Paket ini ditujukan untuk siswa atau mahasiswa dengan harga yang lebih terjangkau. Ini memberikan akses ke fasilitas gym dengan syarat identitas pelajar yang valid.  paket ini membuat keanggotaan gym lebih terjangkau bagi kalangan pelajar. Ini memungkinkan mereka untuk tetap aktif dan sehat tanpa memberatkan anggaran belajar mereka.', '75000.00', '24-05-26Gym.jpeg', '2024-05-26 03:03:44', '2024-05-26 03:03:44');

-- --------------------------------------------------------

--
-- Table structure for table `tblproduk`
--

CREATE TABLE `tblproduk` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idProduk` text NOT NULL,
  `nameproduk` varchar(200) NOT NULL,
  `stok` int(11) NOT NULL,
  `deskripsiproduk` text NOT NULL,
  `harga` decimal(10,2) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tblproduk`
--

INSERT INTO `tblproduk` (`id`, `idProduk`, `nameproduk`, `stok`, `deskripsiproduk`, `harga`, `gambar`, `created_at`, `updated_at`) VALUES
(1, 'PRX-000', 'Handgrip', 6, 'Dapatkan kekuatan tangan yang optimal dengan Handgrip. Dirancang khusus untuk melatih dan meningkatkan kekuatan genggaman Anda, alat ini adalah pilihan sempurna bagi atlet, pecinta kebugaran, dan siapa pun yang ingin meningkatkan performa tangan mereka.', '50000.00', '24-05-15handgripp.jpeg', '2024-05-14 18:15:08', '2024-05-14 18:15:08'),
(2, 'PRX-001', 'Baseus True Wireless', 3, 'Baseus True Wireless adalah serangkaian earbud nirkabel yang dirancang untuk memberikan pengalaman mendengarkan musik yang bebas kabel dengan kenyamanan dan kualitas suara yang tinggi. Earbud nirkabel ini sangat cocok untuk pengguna yang menginginkan kebebasan bergerak tanpa harus terikat oleh kabel.', '120000.00', '24-05-15tws.jpeg', '2024-05-14 18:37:16', '2024-05-14 21:20:13'),
(4, 'PRX-002', 'Barbel', 10, 'Alat barbel mini adalah perangkat fitness yang dirancang untuk latihan kekuatan dan keseimbangan tubuh.', '25000.00', '24-05-15barbel.jpeg', '2024-05-14 21:23:27', '2024-05-14 21:23:27');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idTransaksi` text NOT NULL,
  `idpaket` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `Paket` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `harga` decimal(10,2) NOT NULL,
  `metode` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `idTransaksi`, `idpaket`, `gambar`, `Paket`, `name`, `number`, `harga`, `metode`, `created_at`, `updated_at`) VALUES
(1, 'TRNSP-0001', 'RRQ-0001', '24-05-15bulanan.jpeg', 'Paket Bulanan', 'Hanz Yozakura', '087655443299', '220000.00', 'Alfamart', '2024-05-24 03:01:39', '2024-05-24 03:01:39');

-- --------------------------------------------------------

--
-- Table structure for table `transactiondetails`
--

CREATE TABLE `transactiondetails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idTransaksi` text NOT NULL,
  `name` varchar(255) NOT NULL,
  `idProduk` text NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `nameproduk` varchar(200) NOT NULL,
  `jumlah` int(10) UNSIGNED NOT NULL,
  `harga` decimal(10,2) NOT NULL,
  `metode` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactiondetails`
--

INSERT INTO `transactiondetails` (`id`, `idTransaksi`, `name`, `idProduk`, `gambar`, `nameproduk`, `jumlah`, `harga`, `metode`, `alamat`, `created_at`, `updated_at`) VALUES
(2, 'Trans-0002', 'Hanz Yozakura', 'PRX-002', '24-05-15barbel.jpeg', 'Barbel', 1, '25000.00', 'Indomaret', 'sdawdasdaw', '2024-05-21 22:58:25', '2024-05-21 22:58:25'),
(3, 'Trans-0003', 'Hanz Yozakura', 'PRX-001', '24-05-15tws.jpeg', 'Baseus True Wireless', 1, '120000.00', 'OVO', 'jln. alalah Utara', '2024-05-22 00:07:27', '2024-05-22 00:07:27'),
(4, 'Trans-0004', 'Hanz Yozakura', 'PRX-000', '24-05-15handgripp.jpeg', 'Handgrip', 1, '50000.00', 'Indomaret', 'Jln. HKSN', '2024-05-22 05:18:13', '2024-05-22 05:18:13'),
(5, 'Trans-0005', 'Hanz Yozakura', 'PRX-001', '24-05-15tws.jpeg', 'Baseus True Wireless', 1, '120000.00', 'Indomaret', 'jln.cemara', '2024-05-22 17:40:27', '2024-05-22 17:40:27'),
(6, 'Trans-0006', 'Hanz Yozakura', 'PRX-001', '24-05-15tws.jpeg', 'Baseus True Wireless', 1, '120000.00', 'OVO', 'sadaw', '2024-05-22 17:56:33', '2024-05-22 17:56:33'),
(7, 'Trans-0007', 'Hanz Yozakura', 'PRX-002', '24-05-15barbel.jpeg', 'Barbel', 5, '25000.00', 'OVO', 'jln.alalak', '2024-05-23 01:46:12', '2024-05-23 01:46:12'),
(8, 'Trans-0008', 'Hanz Yozakura', 'PRX-002', '24-05-15barbel.jpeg', 'Barbel', 5, '25000.00', 'Indomaret', 'jln.cemara', '2024-05-23 01:47:18', '2024-05-23 01:47:18'),
(9, 'Trans-0009', 'Hanz Yozakura', 'PRX-002', '24-05-15barbel.jpeg', 'Barbel', 50, '25000.00', 'OVO', 'jln.alalak', '2024-05-23 01:47:32', '2024-05-23 01:47:32'),
(10, 'Trans-0010', 'Hanz Yozakura', 'PRX-002', '24-05-15barbel.jpeg', 'Barbel', 50, '25000.00', 'OVO', 'jln.cemara', '2024-05-23 01:52:52', '2024-05-23 01:52:52'),
(11, 'Trans-0011', 'Hanz Yozakura', 'PRX-002', '24-05-15barbel.jpeg', 'Barbel', 50, '1250000.00', 'OVO', 'jln.alalak', '2024-05-23 01:53:05', '2024-05-23 01:53:05'),
(12, 'Trans-0012', 'Hanz Yozakura', 'PRX-001', '24-05-15tws.jpeg', 'Baseus True Wireless', 1, '120000.00', 'Alfamart', 'dasdaw', '2024-05-23 02:38:35', '2024-05-23 02:38:35'),
(13, 'Trans-0013', 'Hanz Yozakura', 'PRX-001', '24-05-15tws.jpeg', 'Baseus True Wireless', 2, '240000.00', 'Dana', 'jln.cemara', '2024-05-23 02:38:49', '2024-05-23 02:38:49'),
(14, 'Trans-0014', 'Hanz Yozakura', 'PRX-000', '24-05-15handgripp.jpeg', 'Handgrip', 10, '500000.00', 'Indomaret', 'jln. kuala lumpur', '2024-05-23 04:05:04', '2024-05-23 04:05:04'),
(15, 'TRNSP-015', 'Mutsumi Yozakura', 'PRX-001', '24-05-15tws.jpeg', 'Baseus True Wireless', 3, '360000.00', 'Indomaret', 'Jln pernikahan', '2024-05-25 17:37:28', '2024-05-25 17:37:28'),
(16, 'TRNSP-016', 'Mutsumi Yozakura', 'PRX-000', '24-05-15handgripp.jpeg', 'Handgrip', 2, '100000.00', 'Dana', 'jln.cemara', '2024-05-26 03:12:27', '2024-05-26 03:12:27'),
(17, 'TRNSP-017', 'Mutsumi Yozakura', 'PRX-000', '24-05-15handgripp.jpeg', 'Handgrip', 1, '50000.00', 'Dana', 'jl.mid lane', '2024-05-26 03:18:09', '2024-05-26 03:18:09');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idUsers` text NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `idUsers`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Hoyo-0000', 'Hanz Yozakura', 'HanzYozakura@gmail.com', NULL, '$2y$12$ev/aZq1tYXJIWQyK/8ll.Ok//9jGgBsRtYIbl.Xfu2SxZFN3.NlB2', 'user', NULL, '2024-05-14 17:59:27', '2024-05-14 17:59:27'),
(2, 'Hoyo-0001', 'Mutsumi Yozakura', 'MutsumiYozakura@gmail.com', NULL, '$2y$12$Zy72Lr4YY4nu8rWXbBWvq.x/yBldYjVBLYjKc.mcx2JwiU899zTRy', 'admin', NULL, '2024-05-14 18:01:30', '2024-05-14 18:01:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `tblpaket`
--
ALTER TABLE `tblpaket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblproduk`
--
ALTER TABLE `tblproduk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactiondetails`
--
ALTER TABLE `transactiondetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblpaket`
--
ALTER TABLE `tblpaket`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblproduk`
--
ALTER TABLE `tblproduk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transactiondetails`
--
ALTER TABLE `transactiondetails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
