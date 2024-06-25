-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2024 at 07:29 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tornado_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '0',
  `ip_address` varchar(16) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '0',
  `user_agent` varchar(150) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `last_activity` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `user_data` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('2e841f28491f4b7c492930fb6c09b8a1', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36', 1554634874, 'a:7:{s:9:\"user_data\";s:0:\"\";s:9:\"site_lang\";s:7:\"english\";s:7:\"user_id\";s:1:\"1\";s:8:\"username\";s:4:\"iiky\";s:6:\"status\";s:1:\"1\";s:5:\"roles\";a:1:{i:0;a:4:{s:7:\"role_id\";s:1:\"1\";s:4:\"role\";s:5:\"admin\";s:4:\"full\";s:13:\"Administrator\";s:7:\"default\";s:1:\"0\";}}s:12:\"user_profile\";a:13:{s:2:\"id\";s:1:\"1\";s:4:\"name\";s:16:\"Tintapuccino CMS\";s:6:\"gender\";s:1:\"m\";s:13:\"tanggal_lahir\";s:10:\"0000-00-00\";s:6:\"alamat\";s:0:\"\";s:4:\"kota\";s:0:\"\";s:12:\"tentang_saya\";s:0:\"\";s:4:\"foto\";s:12:\"no_image.jpg\";s:3:\"dob\";s:10:\"0000-00-00\";s:7:\"country\";s:0:\"\";s:8:\"timezone\";s:0:\"\";s:7:\"website\";s:0:\"\";s:8:\"modified\";s:19:\"2018-07-17 22:15:44\";}}');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(10) UNSIGNED NOT NULL,
  `ip_address` varchar(40) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `login` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `id_menu_parent` int(11) NOT NULL,
  `nama_menu` varchar(70) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `kategori` enum('Controller','Link') NOT NULL,
  `href` varchar(100) NOT NULL,
  `status` enum('Y','N') NOT NULL,
  `sort` char(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `id_menu_parent`, `nama_menu`, `icon`, `kategori`, `href`, `status`, `sort`) VALUES
(2, 7, 'Pengaturan Pengguna', 'fas fa-users-cog', 'Controller', 'Usersmanagement', 'Y', '1'),
(3, 7, 'Pengaturan Hak Akses', 'fas fa-universal-access', 'Controller', 'Roles', 'Y', '1'),
(6, 7, 'Pengaturan Menu', 'fas fa-list', 'Controller', 'Menu', 'Y', '2'),
(7, 0, 'Pengaturan', 'fas fa-cog', 'Controller', '', 'Y', '2'),
(8, 7, 'Pengaturan Modul', 'fab fa-buromobelexperte', 'Controller', 'Permission', 'Y', '3'),
(9, 0, 'Dashboard', 'fas fa-home', 'Controller', 'Dashboard', 'Y', '1'),
(37, 0, 'Pengguna Web', 'fas fa-user', 'Controller', '', 'Y', '1'),
(39, 0, 'Pegawai', 'fas fa-user-friends', 'Controller', 'Pegawai', 'Y', '1'),
(40, 0, 'Pelanggan', '\nfas fa-address-book', 'Controller', 'Pelanggan', 'Y', '1'),
(41, 0, 'Pesanan', 'fas fa-shopping-cart', 'Controller', 'Pesanan', 'Y', '1'),
(42, 0, 'Produksi', 'fas fa-hourglass-end', 'Controller', 'Produksi', 'Y', '1'),
(43, 0, 'Pembelian', '\nfas fa-shopping-bag', 'Controller', 'Pembelian', 'Y', '1'),
(44, 0, 'Kelola Produk', 'fas fa-box', 'Controller', '', 'Y', '1'),
(45, 44, 'Produk', 'fas fa-box-open', 'Controller', 'Produk', 'Y', '1'),
(46, 44, 'Kategori Produk', 'fas fa-boxes', 'Controller', 'Kategori_Produk', 'Y', '2');

-- --------------------------------------------------------

--
-- Table structure for table `overrides`
--

CREATE TABLE `overrides` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `permission_id` smallint(5) UNSIGNED NOT NULL,
  `allow` tinyint(1) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `permission_id` smallint(5) UNSIGNED NOT NULL,
  `permission` varchar(100) NOT NULL,
  `description` varchar(160) DEFAULT NULL,
  `parent` varchar(100) DEFAULT NULL,
  `sort` tinyint(3) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`permission_id`, `permission`, `description`, `parent`, `sort`) VALUES
(2, 'Menu', 'Menu Management', NULL, NULL),
(3, 'Permission', 'Permission Management', NULL, NULL),
(4, 'Roles', 'Role Management', NULL, NULL),
(5, 'Usersmanagement', 'User Management', NULL, NULL),
(6, 'Dashboard', 'Dashboard', NULL, NULL),
(7, 'Pegawai', 'Pegawai', NULL, NULL),
(8, 'Pelanggan', 'Pelanggan', NULL, NULL),
(9, 'Pesanan', 'Pesanan', NULL, NULL),
(10, 'Produksi', 'Produksi', NULL, NULL),
(11, 'Pembelian', 'Pembelian', NULL, NULL),
(12, 'Produk', 'Produk', NULL, NULL),
(13, 'Kategori_Produk', 'Kategori Produk', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` tinyint(3) UNSIGNED NOT NULL,
  `role` varchar(50) NOT NULL,
  `full` varchar(50) NOT NULL,
  `default` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role`, `full`, `default`) VALUES
(1, 'Admin', 'Administrator', 0),
(2, 'User', 'User', 1),
(3, 'Sup Admin', 'Super Admin', 0),
(4, 'Koor Produksi', 'Koor Produksi', 0),
(6, 'Koor Pesanan 1', 'Kordinator Pesanan 1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `role_permissions`
--

CREATE TABLE `role_permissions` (
  `role_id` tinyint(3) UNSIGNED NOT NULL,
  `permission_id` smallint(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `role_permissions`
--

INSERT INTO `role_permissions` (`role_id`, `permission_id`) VALUES
(0, 2),
(0, 3),
(0, 4),
(0, 5),
(0, 6),
(0, 0),
(2, 6),
(2, 9),
(2, 11),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(1, 13),
(3, 2),
(3, 3),
(3, 4),
(3, 5),
(3, 6),
(3, 7),
(3, 8),
(3, 9),
(3, 10),
(3, 11),
(3, 12),
(3, 13),
(3, 14),
(5, 10),
(6, 6),
(6, 9),
(6, 12),
(6, 13),
(4, 6),
(4, 10),
(4, 12),
(4, 13);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori_produk`
--

CREATE TABLE `tb_kategori_produk` (
  `id_kategori_produk` int(11) NOT NULL,
  `kategori_produk` varchar(128) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `update_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_kategori_produk`
--

INSERT INTO `tb_kategori_produk` (`id_kategori_produk`, `kategori_produk`, `created_at`, `update_at`) VALUES
(1, 'Sedotan', '2024-02-20 21:06:48', '2024-06-25 20:53:41'),
(2, 'Paper Cup', '2024-02-20 21:06:57', '2024-02-20 21:06:57'),
(3, 'Papper Bowl', '2024-02-20 21:07:10', '2024-02-20 21:07:10'),
(4, 'Megah Prima', '2024-02-20 21:07:21', '2024-02-20 21:07:21'),
(5, 'Mcup', '2024-02-20 21:07:29', '2024-02-20 21:07:29'),
(6, 'Injection', '2024-02-20 21:07:38', '2024-02-20 21:07:38'),
(7, 'Benxon', '2024-02-20 21:07:48', '2024-02-20 21:07:48');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pelanggan`
--

CREATE TABLE `tb_pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(128) NOT NULL,
  `last_date_order` varchar(128) NOT NULL,
  `last_status_order` varchar(128) NOT NULL,
  `total_order_revenue` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_pelanggan`
--

INSERT INTO `tb_pelanggan` (`id_pelanggan`, `name`, `address`, `phone`, `last_date_order`, `last_status_order`, `total_order_revenue`) VALUES
(1, 'Pelanggan 1', 'Cilacap', '08987654321', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembelian`
--

CREATE TABLE `tb_pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `nama_barang` varchar(128) NOT NULL,
  `tanggal_pembelian` date NOT NULL DEFAULT current_timestamp(),
  `status` enum('Paid','Unpaid','Term','') NOT NULL,
  `harga_barang` varchar(255) NOT NULL,
  `modified_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_pembelian`
--

INSERT INTO `tb_pembelian` (`id_pembelian`, `nama_barang`, `tanggal_pembelian`, `status`, `harga_barang`, `modified_at`) VALUES
(1, 'Barang 1 edit', '2024-06-25', 'Paid', '800000', '2024-06-25 16:52:10');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pesanan`
--

CREATE TABLE `tb_pesanan` (
  `id` int(11) NOT NULL,
  `id_pelanggan` int(10) NOT NULL,
  `id_produk` int(10) NOT NULL,
  `quantity` int(128) NOT NULL,
  `sell_price` int(255) NOT NULL,
  `sell_price_total` int(255) NOT NULL,
  `note` varchar(255) NOT NULL,
  `paid` int(255) NOT NULL,
  `unpaid` int(255) NOT NULL,
  `order_date` date NOT NULL DEFAULT current_timestamp(),
  `status` enum('Paid','Term','Unpaid','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_pesanan`
--

INSERT INTO `tb_pesanan` (`id`, `id_pelanggan`, `id_produk`, `quantity`, `sell_price`, `sell_price_total`, `note`, `paid`, `unpaid`, `order_date`, `status`) VALUES
(1, 1, 1, 7000, 400, 2800000, 'Pesanan Pertama', 2800000, 0, '2024-06-25', 'Paid');

-- --------------------------------------------------------

--
-- Table structure for table `tb_produk`
--

CREATE TABLE `tb_produk` (
  `id_produk` int(11) NOT NULL,
  `id_kategori_produk` int(11) NOT NULL,
  `produk` varchar(128) NOT NULL,
  `harga` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `update_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_produk`
--

INSERT INTO `tb_produk` (`id_produk`, `id_kategori_produk`, `produk`, `harga`, `created_at`, `update_at`) VALUES
(1, 7, '12 Benxon Ao', '400', '2024-02-20 21:27:00', '2024-02-20 21:32:17'),
(2, 6, '12 Inject Buram NJI', '410', '2024-02-20 21:32:59', '2024-02-20 21:34:41'),
(3, 6, '12 Inject Datar (NJI)', '420', '2024-02-20 21:33:23', '2024-02-20 21:34:55'),
(4, 7, '12 Oz Benxon', '430', '2024-02-20 21:34:01', '2024-02-20 21:34:01'),
(5, 6, '12 Inject Datar Jakarta', '440', '2024-02-20 21:35:42', '2024-02-20 21:35:42'),
(6, 6, '12 Oval Inject', '450', '2024-02-20 21:36:12', '2024-02-20 21:36:12'),
(7, 6, '12 Oz Injection Cina', '370', '2024-02-20 21:36:50', '2024-02-20 21:36:50'),
(8, 5, '12 Oz Mcup Ao', '360', '2024-02-20 21:41:16', '2024-02-20 21:42:24'),
(9, 4, '12 Oz Megah Prima Oval', '400', '2024-02-20 21:42:02', '2024-02-20 21:42:02'),
(10, 3, '17 Oz MBP', '1370', '2024-02-20 21:45:11', '2024-02-20 21:45:11'),
(11, 2, '8 Oz SHP ', '780', '2024-02-20 21:46:45', '2024-02-20 21:46:45'),
(12, 1, 'Bamboo Straw Go Green', '130', '2024-02-20 21:47:43', '2024-02-20 21:47:43');

-- --------------------------------------------------------

--
-- Table structure for table `tb_produksi`
--

CREATE TABLE `tb_produksi` (
  `id_produksi` int(11) NOT NULL,
  `id_produk` int(128) NOT NULL,
  `id_pegawai` int(128) NOT NULL,
  `status_pengiriman` enum('Sudah Dikirim','Belum Dikirim') NOT NULL,
  `target_produksi` int(128) NOT NULL,
  `barang_ditaro` int(128) NOT NULL,
  `penyok` int(128) NOT NULL,
  `packing` int(128) NOT NULL,
  `reject` int(128) NOT NULL,
  `status` enum('Stok','Kirim') NOT NULL,
  `modified_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `production_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_produksi`
--

INSERT INTO `tb_produksi` (`id_produksi`, `id_produk`, `id_pegawai`, `status_pengiriman`, `target_produksi`, `barang_ditaro`, `penyok`, `packing`, `reject`, `status`, `modified_at`, `production_at`) VALUES
(1, 1, 3, 'Sudah Dikirim', 4000, 4000, 200, 3800, 0, 'Kirim', '0000-00-00 00:00:00', '2024-06-25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `activated` tinyint(1) NOT NULL DEFAULT 1,
  `banned` tinyint(1) NOT NULL DEFAULT 0,
  `ban_reason` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `new_password_key` char(32) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `new_password_requested` datetime DEFAULT NULL,
  `new_email` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `new_email_key` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `approved` tinyint(1) DEFAULT NULL COMMENT 'For acct approval.',
  `meta` varchar(2000) DEFAULT '',
  `last_ip` varchar(45) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `last_login` datetime NOT NULL,
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `activated`, `banned`, `ban_reason`, `new_password_key`, `new_password_requested`, `new_email`, `new_email_key`, `approved`, `meta`, `last_ip`, `last_login`, `created`, `modified`) VALUES
(1, 'admin', '$2a$10$gtANPNMiG2UEL9fPbbJaBOKY1juVGP8PhYCKJWuV6yYIuz29qJF7W', 'm.jundi@gmail.com', 1, 0, NULL, NULL, NULL, NULL, NULL, 1, 'a:2:{s:4:\"foto\";s:13:\"62c4714b325a0\";s:4:\"name\";s:11:\"Raihan Arif\";}', '::1', '2024-02-25 08:16:53', '2022-07-05 19:13:47', '2024-02-25 07:16:53'),
(2, 'sup_admin', '$2a$10$.45q.HlDPIiFaaILIMJfHe7YXmqSKqB8AtZXlplDZgWLqTeBszIzu', 'khuzen.ard@gmail.com', 1, 0, NULL, NULL, NULL, NULL, NULL, 1, 'a:2:{s:4:\"foto\";s:13:\"65d085a3965ff\";s:4:\"name\";s:20:\"Khuzainil Ardiansyah\";}', '::1', '2024-06-25 19:05:35', '2024-02-17 11:08:35', '2024-06-25 17:05:35'),
(3, 'koor_prod_1', '$2a$10$eeLqCzyr72edDmPQJCZGaeZYUxacMrdpcEFCH2pjRoy0WMPYSgmGC', 'koor_prod_1@gmail.com', 1, 0, NULL, NULL, NULL, NULL, NULL, 1, 'a:2:{s:4:\"foto\";s:13:\"667a81fab929b\";s:4:\"name\";s:15:\"Koor Produksi 1\";}', '::1', '2024-06-25 19:05:18', '2024-06-25 10:38:18', '2024-06-25 17:05:18'),
(4, 'user_1', '$2a$10$GSwLKdaLEBUUJTm2kgGH8eyQsE5kI2V3r/4nP3LmHrX.8hX0JgF0i', 'user_1@gmail.com', 1, 0, NULL, NULL, NULL, NULL, NULL, 1, 'a:2:{s:4:\"foto\";s:13:\"667a825632b66\";s:4:\"name\";s:11:\"Pelanggan 1\";}', '::1', '0000-00-00 00:00:00', '2024-06-25 10:39:50', '2024-06-25 08:40:32'),
(5, 'koor_pesanan', '$2a$10$XA93IYoHjDIkmaYskwIKYe.vh6FQ.CQPiDSWxH0LzXAgN1aGP3QtC', 'koor_pesanan@gmail.com', 1, 1, NULL, NULL, NULL, NULL, NULL, 1, 'a:2:{s:4:\"foto\";s:13:\"667ae0640d90d\";s:4:\"name\";s:15:\"Koor Produksi 2\";}', '::1', '0000-00-00 00:00:00', '2024-06-25 17:21:08', '2024-06-25 17:08:37');

-- --------------------------------------------------------

--
-- Table structure for table `user_autologin`
--

CREATE TABLE `user_autologin` (
  `key_id` char(32) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `user_agent` varchar(150) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `last_ip` varchar(40) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `user_autologin`
--

INSERT INTO `user_autologin` (`key_id`, `user_id`, `user_agent`, `last_ip`, `last_login`) VALUES
('bbecaa5ab748280b48db65737ee04f49', 7, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', '172.16.10.1', '2022-03-13 16:25:53');

-- --------------------------------------------------------

--
-- Table structure for table `user_profiles`
--

CREATE TABLE `user_profiles` (
  `id` int(10) UNSIGNED NOT NULL,
  `nipeg` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT '',
  `gender` char(1) DEFAULT '',
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `foto` varchar(30) NOT NULL DEFAULT 'no_image.jpg',
  `modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `user_profiles`
--

INSERT INTO `user_profiles` (`id`, `nipeg`, `name`, `gender`, `tanggal_lahir`, `alamat`, `foto`, `modified`) VALUES
(1, NULL, 'Muhammad Jundi', 'P', '1998-02-17', 'Batam', '62c4714b325a0', '2024-06-25 14:50:08'),
(2, NULL, 'Khuzainil Ardiansyah', 'P', '2001-03-09', 'Mampang IV', '65d085a3965ff', '2024-02-17 10:12:45'),
(3, NULL, 'Koor Produksi 1', '', '0000-00-00', '', '667a81fab929b', '2024-06-25 08:38:18'),
(4, NULL, 'User 1', 'W', '2024-06-25', 'Makassar', '667a825632b66', '2024-06-25 08:40:32'),
(5, NULL, 'Koor Pesanan', 'W', '2024-06-26', 'Sleman', '667ae0640d90d', '2024-06-25 17:08:37');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` tinyint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`user_id`, `role_id`) VALUES
(1, 1),
(2, 3),
(3, 4),
(4, 2),
(5, 6);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_pelanggan`
-- (See below for the actual view)
--
CREATE TABLE `view_pelanggan` (
`id_pelanggan` int(11)
,`name` varchar(128)
,`address` varchar(255)
,`phone` varchar(128)
,`pesanan_id` int(11)
,`id_produk` int(10)
,`quantity` int(128)
,`sell_price` int(255)
,`sell_price_total` int(255)
,`note` varchar(255)
,`paid` int(255)
,`unpaid` int(255)
,`order_date` date
,`status` enum('Paid','Term','Unpaid','')
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_pesanan`
-- (See below for the actual view)
--
CREATE TABLE `view_pesanan` (
`pesanan_id` int(11)
,`id_pelanggan` int(11)
,`nama_pelanggan` varchar(128)
,`id_produk` int(11)
,`produk` varchar(128)
,`quantity` int(128)
,`sell_price` int(255)
,`sell_price_total` int(255)
,`note` varchar(255)
,`paid` int(255)
,`unpaid` int(255)
,`order_date` date
,`status` enum('Paid','Term','Unpaid','')
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_produk`
-- (See below for the actual view)
--
CREATE TABLE `view_produk` (
`id_produk` int(11)
,`id_kategori_produk` int(11)
,`kategori_produk` varchar(128)
,`harga` varchar(255)
,`produk` varchar(128)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_produksi`
-- (See below for the actual view)
--
CREATE TABLE `view_produksi` (
`id_produksi` int(11)
,`id_produk` int(128)
,`produk` varchar(128)
,`id_pegawai` int(128)
,`nama_pegawai` varchar(255)
,`status_pengiriman` enum('Sudah Dikirim','Belum Dikirim')
,`target_produksi` int(128)
,`barang_ditaro` int(128)
,`penyok` int(128)
,`packing` int(128)
,`reject` int(128)
,`status` enum('Stok','Kirim')
,`production_at` date
);

-- --------------------------------------------------------

--
-- Structure for view `view_pelanggan`
--
DROP TABLE IF EXISTS `view_pelanggan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_pelanggan`  AS SELECT `p`.`id_pelanggan` AS `id_pelanggan`, `p`.`name` AS `name`, `p`.`address` AS `address`, `p`.`phone` AS `phone`, `ps`.`id` AS `pesanan_id`, `ps`.`id_produk` AS `id_produk`, `ps`.`quantity` AS `quantity`, `ps`.`sell_price` AS `sell_price`, `ps`.`sell_price_total` AS `sell_price_total`, `ps`.`note` AS `note`, `ps`.`paid` AS `paid`, `ps`.`unpaid` AS `unpaid`, `ps`.`order_date` AS `order_date`, `ps`.`status` AS `status` FROM (`tb_pelanggan` `p` join `tb_pesanan` `ps` on(`p`.`id_pelanggan` = `ps`.`id_pelanggan`)) ;

-- --------------------------------------------------------

--
-- Structure for view `view_pesanan`
--
DROP TABLE IF EXISTS `view_pesanan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_pesanan`  AS SELECT `p`.`id` AS `pesanan_id`, `pel`.`id_pelanggan` AS `id_pelanggan`, `pel`.`name` AS `nama_pelanggan`, `pr`.`id_produk` AS `id_produk`, `pr`.`produk` AS `produk`, `p`.`quantity` AS `quantity`, `p`.`sell_price` AS `sell_price`, `p`.`sell_price_total` AS `sell_price_total`, `p`.`note` AS `note`, `p`.`paid` AS `paid`, `p`.`unpaid` AS `unpaid`, `p`.`order_date` AS `order_date`, `p`.`status` AS `status` FROM ((`tb_pesanan` `p` join `tb_pelanggan` `pel` on(`p`.`id_pelanggan` = `pel`.`id_pelanggan`)) join `tb_produk` `pr` on(`p`.`id_produk` = `pr`.`id_produk`)) ;

-- --------------------------------------------------------

--
-- Structure for view `view_produk`
--
DROP TABLE IF EXISTS `view_produk`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_produk`  AS SELECT `p`.`id_produk` AS `id_produk`, `p`.`id_kategori_produk` AS `id_kategori_produk`, `k`.`kategori_produk` AS `kategori_produk`, `p`.`harga` AS `harga`, `produk`.`produk` AS `produk` FROM ((`tb_produk` `p` join `tb_kategori_produk` `k` on(`p`.`id_kategori_produk` = `k`.`id_kategori_produk`)) join `tb_produk` `produk` on(`p`.`id_produk` = `produk`.`id_produk`)) ;

-- --------------------------------------------------------

--
-- Structure for view `view_produksi`
--
DROP TABLE IF EXISTS `view_produksi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_produksi`  AS SELECT `p`.`id_produksi` AS `id_produksi`, `p`.`id_produk` AS `id_produk`, `pr`.`produk` AS `produk`, `p`.`id_pegawai` AS `id_pegawai`, `up`.`name` AS `nama_pegawai`, `p`.`status_pengiriman` AS `status_pengiriman`, `p`.`target_produksi` AS `target_produksi`, `p`.`barang_ditaro` AS `barang_ditaro`, `p`.`penyok` AS `penyok`, `p`.`packing` AS `packing`, `p`.`reject` AS `reject`, `p`.`status` AS `status`, `p`.`production_at` AS `production_at` FROM ((`tb_produksi` `p` join `tb_produk` `pr` on(`p`.`id_produk` = `pr`.`id_produk`)) join `user_profiles` `up` on(`p`.`id_pegawai` = `up`.`id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`session_id`) USING BTREE;

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`permission_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `tb_kategori_produk`
--
ALTER TABLE `tb_kategori_produk`
  ADD PRIMARY KEY (`id_kategori_produk`);

--
-- Indexes for table `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `tb_pembelian`
--
ALTER TABLE `tb_pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indexes for table `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `tb_produksi`
--
ALTER TABLE `tb_produksi`
  ADD PRIMARY KEY (`id_produksi`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_profiles`
--
ALTER TABLE `user_profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`user_id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `permission_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_kategori_produk`
--
ALTER TABLE `tb_kategori_produk`
  MODIFY `id_kategori_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_pembelian`
--
ALTER TABLE `tb_pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_produksi`
--
ALTER TABLE `tb_produksi`
  MODIFY `id_produksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_profiles`
--
ALTER TABLE `user_profiles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_profiles`
--
ALTER TABLE `user_profiles`
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD CONSTRAINT `fk_role_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
