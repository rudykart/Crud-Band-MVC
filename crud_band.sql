-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Bulan Mei 2021 pada 20.29
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud_band`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `band`
--

CREATE TABLE `band` (
  `id_band` int(11) NOT NULL,
  `nama_band` varchar(50) NOT NULL,
  `genre_id` int(11) NOT NULL,
  `negara` varchar(50) NOT NULL,
  `foto_band` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `band`
--

INSERT INTO `band` (`id_band`, `nama_band`, `genre_id`, `negara`, `foto_band`) VALUES
(3, 'Nile', 5, 'United States', '60a542af9f1e6.jpg'),
(5, 'Noise Fermentation', 4, 'Indonesia', ''),
(26, 'Hate Eternal', 5, 'United States', '60a4ccff7e64e.jpg'),
(31, 'Deadsquad', 5, 'Indonesia', '60a4dcf650fb5.jpg'),
(32, 'Unfathomable Ruination', 5, 'United Kingdom', '60a4dd78ddfbd.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `genre`
--

CREATE TABLE `genre` (
  `id_genre` int(11) NOT NULL,
  `nama_genre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `genre`
--

INSERT INTO `genre` (`id_genre`, `nama_genre`) VALUES
(1, 'Unknow'),
(2, 'Brutal Death'),
(3, 'Black Metal'),
(4, 'Goregrind'),
(5, 'Death Metal'),
(8, 'Death Core');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `email_user` varchar(50) NOT NULL,
  `password_user` varchar(255) NOT NULL,
  `foto_user` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `email_user`, `password_user`, `foto_user`) VALUES
(1, 'Rudy Kart', 'rudy@gmail.com', '$2y$10$uL5/7DcPtb3CbW45oknSkesp4.52ZmUVKuGL9FUIzmXoF.n.4RuoS', '60a540b9480c5.jpg'),
(5, 'Yoyo', 'yoyo@gmail.com', '$2y$10$gnFTXHZxccvnWArgis4GWeJiZex5Ck7tDjxIgJZR9/R9AjaN8Q93O', ''),
(8, 'Lita', 'lita@gmail.com', '$2y$10$FXoxKeUxKcGpYR5u9q3V4.WshqfpsR6fTjN6xut7AJAITojGCWzNm', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `band`
--
ALTER TABLE `band`
  ADD PRIMARY KEY (`id_band`),
  ADD KEY `genre_id` (`genre_id`);

--
-- Indeks untuk tabel `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id_genre`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `band`
--
ALTER TABLE `band`
  MODIFY `id_band` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `genre`
--
ALTER TABLE `genre`
  MODIFY `id_genre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `band`
--
ALTER TABLE `band`
  ADD CONSTRAINT `band_ibfk_1` FOREIGN KEY (`genre_id`) REFERENCES `genre` (`id_genre`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
