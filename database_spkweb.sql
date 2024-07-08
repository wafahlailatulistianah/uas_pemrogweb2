-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Jun 2024 pada 10.24
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database_spkweb`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `alternatif`
--

CREATE TABLE `alternatif` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `merek` varchar(255) NOT NULL,
  `C1` int(11) DEFAULT NULL,
  `C2` int(11) DEFAULT NULL,
  `C3` int(11) DEFAULT NULL,
  `C4` int(11) DEFAULT NULL,
  `C5` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `alternatif`
--

INSERT INTO `alternatif` (`id`, `merek`, `C1`, `C2`, `C3`, `C4`, `C5`, `created_at`, `updated_at`) VALUES
(1, 'SHARP AC Split 1 PK AH-XP10WHY', 6000000, 710, 29, 7, 9000, '2024-06-26 05:45:11', '2024-06-26 05:45:11'),
(2, 'POLYTRON AC Split 0.5 PK Neuva ICE Series PAC05VX', 3000000, 490, 38, 8, 3000, '2024-06-26 05:47:25', '2024-06-26 05:47:25'),
(3, 'SAMSUNG AC Split 0.5 PK Standard R410A AR05NRFLDWK', 4000000, 400, 36, 6, 4850, '2024-06-26 05:48:41', '2024-06-26 05:48:41'),
(4, 'DAIKIN AC Split 1.5 PK Lite Standard (MY) FTV35CXV', 5000000, 1100, 32, 9, 12000, '2024-06-26 05:50:02', '2024-06-27 23:17:53'),
(5, 'LG AC Split 2 PK S19EV4', 7000000, 1540, 27, 9, 18000, '2024-06-26 05:51:33', '2024-06-26 05:55:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_ac`
--

CREATE TABLE `data_ac` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_ac` varchar(255) NOT NULL,
  `merek` varchar(255) NOT NULL,
  `tipe` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `data_ac`
--

INSERT INTO `data_ac` (`id`, `id_ac`, `merek`, `tipe`, `created_at`, `updated_at`) VALUES
(7, '1', 'SHARP AC Split 1 PK AH-XP10WHY', 'AC Split', '2024-06-26 04:18:31', '2024-06-26 04:18:31'),
(8, '2', 'POLYTRON AC Split 0.5 PK Neuva ICE Series PAC05VX', 'Ac Split', '2024-06-26 11:36:37', '2024-06-26 11:36:37'),
(9, '3', 'SAMSUNG AC Split 0.5 PK Standard R410A AR05NRFLDWK', 'Ac Split', '2024-06-26 11:36:54', '2024-06-26 11:36:54'),
(10, '4', 'DAIKIN AC Split 1.5 PK Lite Standard (MY) FTV35CXV', 'Ac Split', '2024-06-26 11:37:11', '2024-06-26 11:37:11'),
(11, '5', 'LG AC Split 2 PK S19EV4', 'Ac Split', '2024-06-26 11:37:31', '2024-06-26 11:37:31'),
(12, '6', 'MIDEA AC Split Blanc Series 2 PK MSBC-18CRN1', 'Ac Split', '2024-06-26 11:37:47', '2024-06-26 11:37:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriterias`
--

CREATE TABLE `kriterias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `flag` varchar(255) NOT NULL,
  `nama_kriteria` varchar(255) NOT NULL,
  `bobot` decimal(5,2) NOT NULL,
  `keterangan` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kriterias`
--

INSERT INTO `kriterias` (`id`, `flag`, `nama_kriteria`, `bobot`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'C1', 'Harga', 5.00, 'cost', '2024-06-25 19:53:12', '2024-06-26 03:32:54'),
(2, 'C2', 'Daya', 5.00, 'cost', '2024-06-25 23:51:47', '2024-06-25 23:51:47'),
(3, 'C3', 'Tingkat Kebisingan', 4.00, 'cost', '2024-06-26 00:30:07', '2024-06-26 00:30:07'),
(4, 'C4', 'Berat', 3.00, 'cost', '2024-06-26 03:12:36', '2024-06-26 03:12:36'),
(5, 'C5', 'kapasitas pendingin', 5.00, 'benefit', '2024-06-26 03:34:11', '2024-06-27 06:07:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_06_20_050258_create_kriteria_table', 2),
(6, '2024_06_22_203726_create_alternatifs_table', 3),
(7, '2024_06_25_194017_create_data_ac_table', 3),
(8, '2024_06_25_222725_create_kriteria_table', 4),
(9, '2024_06_25_230551_create_alternatif_table', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('customer','admin') NOT NULL DEFAULT 'customer',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'wafah', 'wafahistianah1@gmail.com', NULL, '$2y$10$hYnFrjqfNscyAaWYDqbAuuTjjdD1DbWf061qvzYwBD0sGDDQMG0la', 'customer', NULL, '2024-06-11 23:56:58', '2024-06-11 23:56:58'),
(2, 'wafah', 'wafahlailatulistianahwafah@gmail.com', NULL, '$2y$10$Tg8x9ILzYH99rq5HWIm5quxLr/aOR8qUBqChKI6MyS7I/EqhYmouG', 'customer', NULL, '2024-06-12 00:12:42', '2024-06-12 00:12:42'),
(3, 'renia', 'renia123@gmail.com', NULL, '$2y$10$UffzPVH0GURggVFYiWit5O2OPdw0rWwHubKRKc7W/rdJNsMNCMUjK', 'customer', NULL, '2024-06-15 00:21:08', '2024-06-15 00:21:08'),
(4, 'lia', 'lia123@gmail.com', NULL, '$2y$10$w6pz0yEwgp6I8Plx22nB5OLGSKI1QykRNQOmjL/q4bIhvD67WEAEi', 'customer', NULL, '2024-06-15 04:29:01', '2024-06-15 04:29:01'),
(5, 'rahma', 'rahma123@gmail.com', NULL, '$2y$10$ER0YCbtV94UgBjQEmk7Gduf4dcl1sNhmK.oHgpvrx0m2o1UC6hfGS', 'customer', NULL, '2024-06-16 22:44:33', '2024-06-16 22:44:33'),
(6, 'mila', 'mila123@gmail.com', NULL, '$2y$10$oD.dBE0BAp7//OYFa7D1huSzPK67BAyainw0B4omYdIsVdTH87HqK', 'customer', NULL, '2024-06-17 03:11:57', '2024-06-17 03:11:57');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_ac`
--
ALTER TABLE `data_ac`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `data_ac_id_ac_unique` (`id_ac`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `kriterias`
--
ALTER TABLE `kriterias`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `alternatif`
--
ALTER TABLE `alternatif`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `data_ac`
--
ALTER TABLE `data_ac`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kriterias`
--
ALTER TABLE `kriterias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
