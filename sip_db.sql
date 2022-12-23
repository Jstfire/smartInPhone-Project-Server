-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 23 Des 2022 pada 12.55
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
-- Database: `sip_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `handphones`
--

CREATE TABLE `handphones` (
  `id` int NOT NULL,
  `phone_photo` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT 'phone_defaul.png',
  `name` varchar(50) NOT NULL,
  `network` text NOT NULL,
  `launch` date NOT NULL,
  `body` text NOT NULL,
  `display` text NOT NULL,
  `platform` text NOT NULL,
  `memory` text NOT NULL,
  `maincam` text NOT NULL,
  `selfcam` text NOT NULL,
  `sound` text NOT NULL,
  `comms` text NOT NULL,
  `features` text NOT NULL,
  `battery` text NOT NULL,
  `tests` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data untuk tabel `handphones`
--

INSERT INTO `handphones` (`id`, `phone_photo`, `name`, `network`, `launch`, `body`, `display`, `platform`, `memory`, `maincam`, `selfcam`, `sound`, `comms`, `features`, `battery`, `tests`) VALUES
(3, NULL, 'POCO ', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', ''),
(4, NULL, 'Oppo', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', ''),
(5, NULL, 'Vivo2', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', ''),
(6, NULL, 'ccc', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', ''),
(7, NULL, 'afe', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', ''),
(8, NULL, 'eadfe', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', ''),
(9, NULL, 'eaf', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', ''),
(10, NULL, 'eafe', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', ''),
(11, 'phone_default.png', 'eafde', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', ''),
(12, 'phone_default.png', 'eaf', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', ''),
(14, 'phone_default.png', 'aefa', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', ''),
(23, 'POCO F4.png', 'POCO F4', '5G, WIFI 6', '2022-01-01', 'POLYCARBONAT', 'AMOLED FULL HD+ 90HZ', '-', '8/256', '64MP', '20MP', 'STEREO', '-', 'GPS, NFC', '4500MAH', '700000 ANTUTU');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int NOT NULL,
  `batch` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2022-10-16-083142', 'App\\Database\\Migrations\\Users', 'default', 'App', 1665909250, 1),
(2, '2022-10-16-090044', 'App\\Database\\Migrations\\Handphones', 'default', 'App', 1665921075, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `avatar` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT 'avatar_default.png',
  `email` varchar(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `role` varchar(10) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `avatar`, `email`, `name`, `username`, `password`, `role`) VALUES
(1, '', 'mmahbubbillah@gmail.com', 'M.Mahbubbillah', 'Jstfire', '$2y$10$nRNHWbv16XLiK/K/NZSZY.Iking1n..bfIUmm0EQIS/GiiPGB4mFe', 'admin'),
(2, '', 'test@gmail.com', 'Minatozaki Sana', 'test', '$2y$10$C0VLgRjJG.qSqfGpH5BpOeY5yQPQ6CZUZwWVvcgtGaLTNEHzRNBQC', 'user'),
(14, '', 'yirenluv@gmail.com', 'Wang Yiren', 'yirenluv', '$2y$10$FWKwNOPMGW3TxKDpwiMUKuAMT8aTckBzJzhLykUpbMUrTHaiBN9W6', 'user'),
(15, '', 'ibnu@stis.ac.id', 'Ibnu Santoso', 'ibnuS', '12345678', 'admin'),
(30, 'jstfire150802.png', 'stressbgt1@gmail.com', 'M.Mahbubbillah', 'jstfire150802', '$2y$10$1ML6fk2Byv.v7klRGG1XB.pddgN7slSN47lFg6imxgurB.FIwAHZC', 'admin'),
(34, 'mahbubbb.png', 'tpoc@gmail.com', 'Mahbub ', 'mahbubbb', '$2y$10$jGyHFnZbwEHqkYRAyDsp0emj6oHdMrgdGiB3TBPtd3LFsS7yq.qe2', 'admin'),
(35, 'avatar_default.png', 'stressbgt15@gmail.com', 'M.Mahbubbillah', 'jstfire15', '$2y$10$VPM1Yr14gWfRAyXkTAXa1Oecfjq7SX9AugkivwxgKOLD5PWf2U4Fu', 'user'),
(36, 'jstfire1508.png', 'stressbgt1508@gmail.com', 'M.Mahbubbillah', 'jstfire1508', '$2y$10$GRfHteC1L09jSgX5b5eGxeHSRwNj01uaJ6G2s5QjxZgk7N7C93XXK', 'user');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `handphones`
--
ALTER TABLE `handphones`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `handphones`
--
ALTER TABLE `handphones`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
