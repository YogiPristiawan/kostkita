-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Jun 2021 pada 10.31
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kostkita`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(11) NOT NULL,
  `booking_at` date NOT NULL,
  `produk_id` int(11) NOT NULL,
  `pay_invoice` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `booking`
--

INSERT INTO `booking` (`booking_id`, `booking_at`, `produk_id`, `pay_invoice`) VALUES
(18, '2021-06-16', 18, '1d68f719bcdb19964c8f3ad16cddc26f');

-- --------------------------------------------------------

--
-- Struktur dari tabel `payment`
--

CREATE TABLE `payment` (
  `invoice` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `nama_pemesan` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `jumlah` decimal(9,0) NOT NULL,
  `bukti_tf` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `payment`
--

INSERT INTO `payment` (`invoice`, `tanggal`, `nama_produk`, `nama_pemesan`, `alamat`, `no_telp`, `jumlah`, `bukti_tf`) VALUES
('1d68f719bcdb19964c8f3ad16cddc26f', '2021-06-16', 'Softdude', 'Yogi Pristiawan', 'Gunungkidul', '085290444021', '2000000', 'maxresdefault.jpg'),
('1f6e33af0aefcd6880af1e55a5358583', '2021-06-16', 'Cabinsoft', 'Yogi Pristiawan', 'Yogyakarta', '085290444021', '2000000', 'maxresdefault.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `produk_id` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga` decimal(9,0) NOT NULL,
  `deskripsi` varchar(500) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`produk_id`, `nama_produk`, `harga`, `deskripsi`, `gambar`, `status`) VALUES
(16, 'Cabinsoft', '500000', 'Kamar tidur lokasi lantai 2, tersedia meja belajar, selimut, jendela menghadap langsung ke jalan raya.', 'Cabinsoft.jpg', '0'),
(17, 'Telesweet', '450000', 'Lokasi kamar di lantai2, ruangan minmalis, tidak tersedia ranjang tidur, tidak ada meja belajar', 'Telesweet.jpg', '0'),
(18, 'Softdude', '450000', 'Lokasi kamar di lantai 2, ruangan minimalis, tersedia meja belajar', 'Softdude.jpg', '1'),
(19, 'Funvita', '700000', 'Lokasi kamar di lantai 1, ada tempat tidur, meja belajar, tersedia AC, ruangan nyaman.', 'Funvita.jpg', '0'),
(20, 'Royalprimary', '800000', 'Lokasi kamar di lantai 2, ruangan mewah, nayaman, tersedia tempat tidur, meja belajar, jendela menghadap taman, juga tersedia AC.', 'Safetyvita.jpg', '0'),
(21, 'Onlynova', '600000', 'Lokasi kamar di lantai 1, kamar tidur nyaman, tersedia lemari, bersih.', 'Onlynova.jpg', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$hqMXva.LFwMr.kzJnK73Me9NO8XyAtkpbC07Fi8ciF9kh79aqqbO6', '0');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`),
  ADD UNIQUE KEY `produk_id` (`produk_id`) USING BTREE,
  ADD UNIQUE KEY `pay_invoice` (`pay_invoice`);

--
-- Indeks untuk tabel `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`invoice`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`produk_id`),
  ADD UNIQUE KEY `nama_produk` (`nama_produk`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `produk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `fk_booking_invoice` FOREIGN KEY (`pay_invoice`) REFERENCES `payment` (`invoice`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_booking_produk` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`produk_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
