-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 20 Des 2023 pada 13.12
-- Versi server: 8.0.30
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sobat_telat`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id` bigint UNSIGNED NOT NULL,
  `kelas` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id`, `kelas`, `created_at`, `updated_at`) VALUES
(1, 'X TJKT 1', '2023-07-05 07:47:41', '2023-07-05 07:47:41'),
(2, 'X TJKT 2', '2023-07-05 07:47:41', '2023-07-05 07:47:41'),
(3, 'X TJKT 3', '2023-07-05 07:47:41', '2023-07-05 07:47:41'),
(4, 'X TJKT 4', '2023-07-05 07:47:41', '2023-07-05 07:47:41'),
(5, 'X TO 1', '2023-07-05 07:47:41', '2023-07-05 07:47:41'),
(6, 'X TO 2', '2023-07-05 07:47:41', '2023-07-05 07:47:41'),
(7, 'X TO 3', '2023-07-05 07:47:41', '2023-07-05 07:47:41'),
(8, 'X TO 4', '2023-07-05 07:47:41', '2023-07-05 07:47:41'),
(9, 'X TE 1', '2023-07-05 07:47:41', '2023-07-05 07:47:41'),
(10, 'X TE 2', '2023-07-05 07:47:41', '2023-07-05 07:47:41'),
(11, 'X TE 3', '2023-07-05 07:47:41', '2023-07-05 07:47:41'),
(12, 'X TE 4', '2023-07-05 07:47:41', '2023-07-05 07:47:41'),
(13, 'XI TJKT 1', '2023-07-05 07:47:41', '2023-07-05 07:47:41'),
(14, 'XI TJKT 2', '2023-07-05 07:47:41', '2023-07-05 07:47:41'),
(15, 'XI TJKT 3', '2023-07-05 07:47:41', '2023-07-05 07:47:41'),
(16, 'XI TJKT 4', '2023-07-05 07:47:41', '2023-07-05 07:47:41'),
(17, 'XI TO 1', '2023-07-05 07:47:41', '2023-07-05 07:47:41'),
(18, 'XI TO 2', '2023-07-05 07:47:41', '2023-07-05 07:47:41'),
(19, 'XI TO 3', '2023-07-05 07:47:41', '2023-07-05 07:47:41'),
(20, 'XI TO 4', '2023-07-05 07:47:41', '2023-07-05 07:47:41'),
(21, 'XI TE 1', '2023-07-05 07:47:41', '2023-07-05 07:47:41'),
(22, 'XI TE 2', '2023-07-05 07:47:41', '2023-07-05 07:47:41'),
(23, 'XI TE 3', '2023-07-05 07:47:41', '2023-07-05 07:47:41'),
(24, 'XI TE 4', '2023-07-05 07:47:41', '2023-07-05 07:47:41'),
(25, 'XII TKJ 1', '2023-07-05 07:47:41', '2023-07-05 07:47:41'),
(26, 'XII TKJ 2', '2023-07-05 07:47:41', '2023-07-05 07:47:41'),
(27, 'XII TKJ 3', '2023-07-05 07:47:41', '2023-07-05 07:47:41'),
(28, 'XII TKJ 4', '2023-07-05 07:47:41', '2023-07-05 07:47:41'),
(29, 'XII TKRO 1', '2023-07-05 07:47:41', '2023-07-05 07:47:41'),
(30, 'XII TKRO 2', '2023-07-05 07:47:41', '2023-07-05 07:47:41'),
(31, 'XII TKRO 3', '2023-07-05 07:47:41', '2023-07-05 07:47:41'),
(32, 'XII TKRO 4', '2023-07-05 07:47:41', '2023-07-05 07:47:41'),
(33, 'XII TAV 1', '2023-07-05 07:47:41', '2023-07-05 07:47:41'),
(34, 'XII TAV 2', '2023-07-05 07:47:41', '2023-07-05 07:47:41'),
(35, 'XII TAV 3', '2023-07-05 07:47:41', '2023-07-05 07:47:41'),
(36, 'XII TAV 4', '2023-07-05 07:47:41', '2023-07-05 07:47:41'),
(37, 'ADMIN', '2023-10-21 08:14:37', '2023-10-21 08:14:37'),
(38, 'UMUM', NULL, NULL),
(40, 'ALUMNI', NULL, NULL),
(41, 'Guru BK', '2023-12-17 12:02:00', '2023-12-17 12:02:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2023_10_11_000000_create_kelas_table', 1),
(5, '2023_10_11_000000_create_tahun_ajarans_table', 1),
(6, '2023_10_11_000000_create_tipe_barangs_table', 1),
(7, '2023_10_11_000001_create_users_table', 1),
(8, '2023_10_11_013049_create_barangs_table', 1),
(9, '2023_10_11_014254_create_pinjams_table', 1),
(10, '2023_10_11_014858_create_pengaturans_table', 1),
(11, '2023_12_14_141110_create_transaksis_table', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaturans`
--

CREATE TABLE `pengaturans` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_sekolah` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jurusan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksis`
--

CREATE TABLE `transaksis` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `kelas_id` bigint UNSIGNED NOT NULL,
  `jam_ke` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `waktu_terlambat` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `nis` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nisn` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` enum('L','P') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kelas_id` bigint UNSIGNED DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nis`, `nisn`, `nama`, `gender`, `kelas_id`, `password`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', 'Admin', 'L', 37, '$2y$10$wj8a0JrHqh2B2TYOvOsmhObrpY9O1YjhM7G.Ynu5OOIAyDRz9GS9i', '2023-10-22 07:47:12', '2023-12-13 15:40:55'),
(2, '0001', '0', 'User 1', 'L', 1, NULL, '2023-10-22 07:47:24', '2023-12-13 15:48:16'),
(3, '0002', '0', 'User 2', 'L', 1, NULL, '2023-10-22 07:47:24', '2023-10-22 07:47:24'),
(4, '0003', '0', 'User 3', 'P', 1, NULL, '2023-10-22 07:47:24', '2023-10-22 07:47:24'),
(5, '0004', '0', 'User 4', 'P', 1, NULL, '2023-10-22 07:47:24', '2023-10-22 07:47:24'),
(6, '0005', '0', 'User 5', 'P', 1, NULL, '2023-10-22 07:47:24', '2023-10-22 07:47:24'),
(7, '0006', '0', 'User 6', 'P', 1, NULL, '2023-10-22 07:47:24', '2023-10-22 07:47:24'),
(8, '0007', '0', 'User 7', 'L', 1, NULL, '2023-10-22 07:47:24', '2023-10-22 07:47:24'),
(9, '0008', '0', 'User 8', 'P', 1, NULL, '2023-10-22 07:47:24', '2023-10-22 07:47:24'),
(10, '0009', '0', 'User 9', 'P', 1, NULL, '2023-10-22 07:47:24', '2023-10-22 07:47:24');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `pengaturans`
--
ALTER TABLE `pengaturans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `transaksis`
--
ALTER TABLE `transaksis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaksis_user_id_foreign` (`user_id`),
  ADD KEY `transaksis_kelas_id_foreign` (`kelas_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_kelas_id_foreign` (`kelas_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `pengaturans`
--
ALTER TABLE `pengaturans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `transaksis`
--
ALTER TABLE `transaksis`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `transaksis`
--
ALTER TABLE `transaksis`
  ADD CONSTRAINT `transaksis_kelas_id_foreign` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`),
  ADD CONSTRAINT `transaksis_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_kelas_id_foreign` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
