-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Nov 2021 pada 07.49
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pcvs`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `appointments`
--

CREATE TABLE `appointments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `batch`
--

CREATE TABLE `batch` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `batchNo` int(11) NOT NULL,
  `expiryDate` timestamp NULL DEFAULT NULL,
  `quantityAvailable` int(11) NOT NULL,
  `quantityAdministered` int(11) DEFAULT NULL,
  `vaccineId` int(11) NOT NULL,
  `centreId` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `batch`
--

INSERT INTO `batch` (`id`, `batchNo`, `expiryDate`, `quantityAvailable`, `quantityAdministered`, `vaccineId`, `centreId`, `created_at`, `updated_at`) VALUES
(1, 1, '2021-10-30 03:23:24', 10, 2, 2, 1, '2021-10-27 03:23:24', NULL),
(2, 2, '2021-10-30 03:32:57', 21, 2, 3, 5, '2021-10-27 03:32:57', NULL),
(3, 121, '2021-10-14 16:00:00', 30, NULL, 2, 1, '2021-10-26 21:54:01', '2021-10-26 21:54:01'),
(4, 3, '2021-10-29 16:00:00', 22, NULL, 1, 1, '2021-10-26 21:54:24', '2021-10-26 21:54:24'),
(5, 52, '2021-11-05 16:00:00', 52, NULL, 4, 1, '2021-10-27 21:47:39', '2021-10-27 21:47:39'),
(6, 84, '2021-10-05 16:00:00', 7, NULL, 2, 1, '2021-10-27 21:47:56', '2021-10-27 21:47:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `centre`
--

CREATE TABLE `centre` (
  `id` int(11) NOT NULL,
  `centreName` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `centre`
--

INSERT INTO `centre` (`id`, `centreName`, `address`, `updated_at`, `created_at`) VALUES
(1, 'Kasih Ibu', 'Jalan Pulau Manggarai No.2', NULL, NULL),
(5, 'das34', '434', '2021-10-25 22:44:23', '2021-10-25 22:44:23'),
(6, 'd', 'd', '2021-10-25 22:49:52', '2021-10-25 22:49:52'),
(7, 'd', 'd', '2021-10-25 22:57:04', '2021-10-25 22:57:04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_10_27_021839_create_batch_table', 2),
(6, '2021_10_27_031724_create_batches_table', 3),
(7, '2021_10_27_035429_create_vaccines_table', 3),
(8, '2021_10_28_080234_create_appointments_table', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `centreName` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `staffID` int(11) DEFAULT NULL,
  `ic` int(20) DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `role`, `name`, `username`, `centreName`, `email`, `staffID`, `ic`, `password`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(15, 'admin', 'admin1', 'admin1', '1', 'admin@gmail.com', 1, NULL, '$2y$10$NxikORlLq8QtBHJ8Sh7UTubtUjPev8gKUhHVHIayZU5p3cx316ok6', '2021-10-31 20:13:09', NULL, '2021-10-26 00:15:22', '2021-10-31 20:13:09'),
(16, 'patient', 'patient1', 'patient1', NULL, 'patient@gmail.com', NULL, 234574435, '$2y$10$nPNOE3QWS4o3QAfcG02WHOyAZnSi8Ccev7peqUYrUFtHQQtcQ0avS', '2021-10-31 20:14:46', NULL, '2021-10-27 01:52:47', '2021-10-31 20:14:46'),
(17, 'admin', 'admin', 'admin', '1', 'hotaruaether2@gmail.com', 1235678, NULL, '$2y$10$PmwZ4osgU0FYvceKiGZN1OVS9djPuOqla/CgIIbFywF0CzusyF.UG', '2021-10-31 19:49:33', NULL, '2021-10-31 19:01:38', '2021-10-31 19:49:33'),
(18, 'patient', 'Lukman hadis', 'patient2', NULL, 'hotaruaether1@gmail.com', NULL, 1234567, '$2y$10$YOkM3lps1kNx2O0bNIykNOgLPh.eL9T34zh6R4heWanlwhpF8/8WG', '2021-10-31 20:16:12', NULL, '2021-10-31 19:56:35', '2021-10-31 20:16:12'),
(19, 'patient', 'Rasa Rui', 'patient3', NULL, 'patient3@gmail.com', NULL, 2341124, '$2y$10$TIUf7B.uYsNwT9bvhk1RRuoxjVVcGvnVPvta5tGf9x5zx5JqXb61.', NULL, NULL, '2021-10-31 20:17:13', '2021-10-31 20:17:13'),
(20, 'patient', 'patient4', 'patient4', NULL, 'patient4@gmail.com', NULL, 2312134, '$2y$10$oDNAcupB/BrT6Ci8gciQdOEMzKAxctVKAeOWnNlwxd0YdpAVAHBku', '2021-10-31 20:24:57', NULL, '2021-10-31 20:22:07', '2021-10-31 20:24:57'),
(21, 'patient', 'patient5', 'patient5', NULL, 'patient5@gmail.com', NULL, 3123213, '$2y$10$lj6vVoHNpS0tsD/RRhcJNurhxC4mG8DtPwE2IxQdJ3g1003wtUvbe', NULL, NULL, '2021-10-31 21:48:20', '2021-10-31 21:48:20'),
(22, 'patient', 'patient6', 'patient6', NULL, 'patient6@gmail.com', NULL, 1421412, '$2y$10$EfUcAZDKN6EA3Vmrd10Gbu6cbg1L/2W5cNEQyO5UHCOFnLqcc.6YC', NULL, NULL, '2021-10-31 21:59:58', '2021-10-31 21:59:58'),
(23, 'patient', 'patient7', 'patient7', NULL, 'patient7@gmail.com', NULL, 12, '$2y$10$zKpU/qHvY4e7w/J4uzH.Ze0jOwwsu5GRuoacXmo6TJ8nq9bKYmen.', '2021-10-31 22:05:30', NULL, '2021-10-31 22:03:28', '2021-10-31 22:05:30'),
(24, 'patient', 'patient8', 'patient8', NULL, 'patient8@gmail.com', NULL, 1221342134, '$2y$10$TUuwdGkpvjMD/sAmUIazSel.RFzLG0Gcl2ilz3y3v5oezi7sRkK1u', '2021-10-31 22:39:11', NULL, '2021-10-31 22:06:53', '2021-10-31 22:39:11'),
(25, 'patient', 'Kupo Hidaki', 'patient10', NULL, 'patient10@gmail.com', NULL, 9875643, '$2y$10$s7ITIm1BvXhnO46EZGu2YehlGJ46a9U7ZCAhHBGCqb27vzykEtkIW', '2021-11-01 02:35:13', NULL, '2021-11-01 00:49:22', '2021-11-01 02:35:13'),
(26, 'patient', 'Putu Solana Near', 'patient12', NULL, 'patient12@gmail.com', NULL, 1234566, '$2y$10$1MD2l52NFroRXc.PxdqkGO2Q.BdKjgJpuN7ZdNfn7ASRVB0MrcNvm', '2021-11-11 19:39:57', NULL, '2021-11-11 19:25:19', '2021-11-11 19:39:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `vaccination`
--

CREATE TABLE `vaccination` (
  `id` int(11) NOT NULL,
  `patientId` int(11) NOT NULL,
  `batchId` int(11) NOT NULL,
  `centreId` int(11) NOT NULL,
  `appointmentDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(255) NOT NULL DEFAULT 'confirmed,pending, administered',
  `remarks` text DEFAULT NULL,
  `number` int(11) NOT NULL DEFAULT 1,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `vaccination`
--

INSERT INTO `vaccination` (`id`, `patientId`, `batchId`, `centreId`, `appointmentDate`, `status`, `remarks`, `number`, `updated_at`, `created_at`) VALUES
(1, 16, 1, 1, '2021-11-12 06:30:35', 'Confirmed', 'Confirmed thanks for using our PCVS, please come at time', 1, '2021-11-11 22:30:35', '2021-10-28 00:41:28'),
(2, 16, 1, 1, '2021-11-09 05:24:31', 'Rejected', 'Check ur appointment data', 1, '2021-11-08 21:24:31', '2021-10-28 00:42:55'),
(3, 16, 1, 1, '2021-11-09 09:18:19', 'Rejected', 'Check ur appointment data', 1, '2021-11-09 01:18:19', '2021-10-28 01:32:43'),
(4, 23, 3, 1, '2021-11-09 05:43:05', 'Confirmed', 'Confirmed thanks for using our PCVS, please come at time', 1, '2021-11-08 21:43:05', '2021-10-31 23:53:08');

--
-- Trigger `vaccination`
--
DELIMITER $$
CREATE TRIGGER `appointment_vaccine` AFTER INSERT ON `vaccination` FOR EACH ROW BEGIN
	UPDATE batch SET quantityAvailable = quantityAvailable - NEW.number
    WHERE id = new.batchId;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `vaccine`
--

CREATE TABLE `vaccine` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `manufacture` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `vaccine`
--

INSERT INTO `vaccine` (`id`, `name`, `manufacture`, `created_at`, `updated_at`) VALUES
(1, 'Sinovac Biotech', 'Sinovac Biotech Co.Ltd.', '2021-10-21 06:05:04', NULL),
(2, 'AstraZeneca', 'Siam Bioscience', '2021-10-19 06:05:09', NULL),
(3, 'Bio Farma\r\n', 'PT Bio Farma\r\n', '2021-10-15 06:05:12', NULL),
(4, 'Moderna', 'Moderna Inc', '2021-10-23 06:05:14', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `vaccines`
--

CREATE TABLE `vaccines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `batch`
--
ALTER TABLE `batch`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vaccineId` (`vaccineId`);

--
-- Indeks untuk tabel `centre`
--
ALTER TABLE `centre`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `staffID` (`staffID`,`ic`);

--
-- Indeks untuk tabel `vaccination`
--
ALTER TABLE `vaccination`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `vaccine`
--
ALTER TABLE `vaccine`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `vaccines`
--
ALTER TABLE `vaccines`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `batch`
--
ALTER TABLE `batch`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `centre`
--
ALTER TABLE `centre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `vaccination`
--
ALTER TABLE `vaccination`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `vaccine`
--
ALTER TABLE `vaccine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `vaccines`
--
ALTER TABLE `vaccines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `batch`
--
ALTER TABLE `batch`
  ADD CONSTRAINT `batch_ibfk_1` FOREIGN KEY (`vaccineId`) REFERENCES `vaccine` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
