-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 14, 2021 at 04:13 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fbi_amri`
--

-- --------------------------------------------------------

--
-- Table structure for table `datapenduduk`
--

CREATE TABLE `datapenduduk` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `kartukeluarga_id` int(11) NOT NULL,
  `nik` varchar(100) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `tempatlahir` varchar(200) NOT NULL,
  `tgllahir` varchar(200) NOT NULL,
  `jeniskelamin` varchar(100) NOT NULL,
  `statuskawin` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `jenispenduduk` varchar(100) NOT NULL,
  `pekerjaan` varchar(200) NOT NULL,
  `pendidikan` varchar(100) NOT NULL,
  `agama` varchar(100) NOT NULL,
  `lurahdesa` varchar(200) NOT NULL,
  `kecamatan` varchar(200) NOT NULL,
  `kabupaten` varchar(200) NOT NULL,
  `provinsi` varchar(100) NOT NULL,
  `negara` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `datapenduduk`
--

INSERT INTO `datapenduduk` (`id`, `user_id`, `kartukeluarga_id`, `nik`, `nama`, `tempatlahir`, `tgllahir`, `jeniskelamin`, `statuskawin`, `alamat`, `jenispenduduk`, `pekerjaan`, `pendidikan`, `agama`, `lurahdesa`, `kecamatan`, `kabupaten`, `provinsi`, `negara`, `created_at`, `updated_at`) VALUES
(5, 9, 3, '2131312', 'udin', 'Jambi', '2021-05-20 00:00:00', 'Laki-Laki', 'Sudah Kawin', 'asdsadsa', 'Tetap', 'Mahasiswa', 'D1', 'Islam', 'Pematang Gajah', 'Jambi Luar Kota', 'Muaro Jambi', 'Jambi', 'WNI', '2021-05-23 22:39:10', '2021-05-24 05:39:10'),
(6, 10, 6, '55555', 'dante', 'jambi', '2021-05-12 00:00:00', 'Laki-Laki', 'Sudah Kawin', 'jambi', 'Tidak Tetap', 'Mahasiswa', 'SD', 'Islam', 'Mendalo', 'jaluko', 'muarojambi', 'jambi', 'WNI', '2021-05-27 00:53:20', '2021-05-27 07:53:20'),
(7, 13, 3, '55511', 'Febri', 'jambi', '2021-07-07 00:00:00', 'Laki-Laki', 'Sudah Kawin', 'feadaw', 'Tidak Tetap', 'mahasiswa', 'SMP', 'Islam', 'dad', 'awdad', 'wdaawd', 'awdaw', 'WNI', '2021-07-12 07:24:05', '2021-07-12 15:31:39');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kartukeluarga`
--

CREATE TABLE `kartukeluarga` (
  `id` int(11) NOT NULL,
  `nokk` varchar(100) NOT NULL,
  `kepalakeluarga` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kartukeluarga`
--

INSERT INTO `kartukeluarga` (`id`, `nokk`, `kepalakeluarga`, `created_at`, `updated_at`) VALUES
(3, '2525251', 'Santoro1', '2021-05-23 01:57:29', '2021-05-23 15:20:30'),
(5, '1231333', 'Ramlah', '2021-05-23 18:09:52', '2021-05-24 01:09:52'),
(6, '125556', 'dawdaadawdaw', '2021-05-23 21:30:17', '2021-05-24 04:30:17'),
(8, '1231231', 'Santoroa', '2021-05-23 22:53:47', '2021-05-24 05:53:47'),
(9, '1234654566', 'budi', '2021-07-07 23:36:32', '2021-07-08 06:36:32');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2014_10_12_200000_add_two_factor_columns_to_users_table', 2),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 2),
(6, '2021_05_01_081504_create_sessions_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nohp` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `pertanyaan` text NOT NULL,
  `filepengaduan` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pengaduan`
--

INSERT INTO `pengaduan` (`id`, `nama`, `nohp`, `email`, `pertanyaan`, `filepengaduan`, `status`, `created_at`, `updated_at`) VALUES
(9, 'dante', '112333', NULL, 'dawdawddaw', 'transkip nilai.pdf', 'Selesai', '2021-07-13 19:24:52', '2021-07-14 02:32:51');

-- --------------------------------------------------------

--
-- Table structure for table `permintaan`
--

CREATE TABLE `permintaan` (
  `id` int(11) NOT NULL,
  `author` varchar(200) NOT NULL,
  `deskripsi` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL,
  `filesurat` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `permintaan`
--

INSERT INTO `permintaan` (`id`, `author`, `deskripsi`, `status`, `filesurat`, `created_at`, `updated_at`) VALUES
(2, 'dante', 'surat 2', 'Selesai', 'fdokumen.com_contoh-surat-keterangan-kepala-desa (1).doc', '2021-07-08 00:23:28', '2021-07-14 00:15:53'),
(3, 'Febri', 'surat 2', 'Selesai', 'SURAT_PERNYATAAN_AHLI_WARIS.docx', '2021-07-08 00:27:01', '2021-07-14 00:15:43');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `surat`
--

CREATE TABLE `surat` (
  `id` int(11) NOT NULL,
  `namasurat` varchar(200) NOT NULL,
  `contohsurat` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `surat`
--

INSERT INTO `surat` (`id`, `namasurat`, `contohsurat`, `created_at`, `updated_at`) VALUES
(8, 'Surat Keterangan Desa', 'fdokumen.com_contoh-surat-keterangan-kepala-desa (1).doc', '2021-07-07 23:44:15', '2021-07-08 06:44:15'),
(9, 'Surat Pernyataan Cerai', 'SURAT_PERNYATAAN_CERAI_docx.docx', '2021-07-07 23:49:28', '2021-07-08 06:49:28'),
(10, 'Surat Pernyataan Nikah', 'SURAT_PERNYATAAN_NIKAH.odt', '2021-07-07 23:51:04', '2021-07-08 06:51:04'),
(11, 'Surat Pertanyaan Ahli Waris', 'SURAT_PERNYATAAN_AHLI_WARIS.docx', '2021-07-07 23:52:57', '2021-07-08 06:52:57'),
(12, 'Surat Keterangan Usaha', 'Surat_Keterangan_Usaha.docx', '2021-07-07 23:53:50', '2021-07-08 06:53:50');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(111) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `role` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `nik`, `email`, `email_verified_at`, `role`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '1234', 'admin@admin.com', NULL, 'admin', '$2y$10$z6YLGFzXGnyNOtVysCvBROAilWD18Mr7SkXdnrXTkJp.D0t1MTJke', NULL, NULL, NULL, '2021-05-10 05:39:26', '2021-05-10 05:39:26'),
(9, 'udin', '2131312', NULL, NULL, 'user', '$2y$10$oj/JtZGJCgfy9ASRNXUvSuPXzxbF8vWjBqchz084lTf/EDKxw9/WW', NULL, NULL, '25J0qJPVoS0SzCs47ht49XtKrOczOz6tlx6v9Nq9jwhUO25oLaq2y9zdQZKf', '2021-05-23 22:39:10', '2021-05-23 22:39:10'),
(10, 'dante', '55555', NULL, NULL, 'user', '$2y$10$QRvclKyjJA5.XmSFDl1UGeXtTaIK1yt9phqs4eMXtq62J6qlBI0Fm', NULL, NULL, 'aTeCMO6jdmLlzNctFF2IC7cwgFAbIVi54kbP8DSWwxxthlX41VsJsTaSWKG6', '2021-05-27 00:53:20', '2021-05-27 00:53:20'),
(13, 'Febri', '55511', NULL, NULL, 'user', '$2y$10$q6sjjYg3pFcSuOpKEReBEumQvemsOBmKEHrHS0lLgzcPSNETYhZra', NULL, NULL, '9X1JeiEYOT7WnciImcI9b5LUqFEgsffzyVCHBPE0jMg66MUXFUXnSkvBeCRf', '2021-07-12 07:24:05', '2021-07-12 08:31:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `datapenduduk`
--
ALTER TABLE `datapenduduk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `kartukeluarga`
--
ALTER TABLE `kartukeluarga`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permintaan`
--
ALTER TABLE `permintaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `surat`
--
ALTER TABLE `surat`
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
-- AUTO_INCREMENT for table `datapenduduk`
--
ALTER TABLE `datapenduduk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kartukeluarga`
--
ALTER TABLE `kartukeluarga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `permintaan`
--
ALTER TABLE `permintaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `surat`
--
ALTER TABLE `surat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
