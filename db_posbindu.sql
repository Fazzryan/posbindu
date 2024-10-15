-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Sep 2024 pada 16.42
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
-- Database: `db_posbindu`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `autentikasi`
--

CREATE TABLE `autentikasi` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` enum('admin','pasien') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `autentikasi`
--

INSERT INTO `autentikasi` (`id`, `user_id`, `email`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1, 1, 'dinda@gmail.com', '594280c6ddc94399a392934cac9d80d5', 'admin', '2024-09-11 07:51:14', '2024-09-12 04:41:15'),
(2, 2, 'maya@gmail.com', '871f8d97dac6f1c4612c6cb94128468a', 'pasien', '2024-09-11 14:00:20', '2024-09-11 14:00:20'),
(3, 3, 'zidan@gmail.com', 'dda542322951ee590e8cb5dc932f676b', 'pasien', '2024-09-12 07:35:12', '2024-09-12 07:35:12'),
(5, 7, 'saepul@gmail.com', '4297f44b13955235245b2497399d7a93', 'admin', '2024-09-12 16:02:23', '2024-09-12 16:28:04'),
(6, 8, 'rima@gmail.com', '3526b962b520a2f893fd093ca673b030', 'admin', '2024-09-12 16:04:36', '2024-09-12 16:04:36'),
(7, 9, 'wulan@gmail.com', 'aae79912250d18756900f742270de7e1', 'admin', '2024-09-12 16:07:11', '2024-09-12 16:07:11'),
(8, 11, 'dewi@gmail.com', 'ed1d859c50262701d92e5cbf39652792', 'pasien', '2024-09-17 06:21:37', '2024-09-17 06:21:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemeriksaan`
--

CREATE TABLE `pemeriksaan` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tgl_input` date NOT NULL,
  `keluhan_utama` text NOT NULL,
  `tekanan_darah` varchar(30) NOT NULL,
  `bb` int(11) NOT NULL,
  `sistol` varchar(30) NOT NULL,
  `diastol` varchar(30) NOT NULL,
  `gula_darah` varchar(30) NOT NULL,
  `kolesterol` varchar(30) NOT NULL,
  `asam_urat` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pemeriksaan`
--

INSERT INTO `pemeriksaan` (`id`, `user_id`, `tgl_input`, `keluhan_utama`, `tekanan_darah`, `bb`, `sistol`, `diastol`, `gula_darah`, `kolesterol`, `asam_urat`, `created_at`, `updated_at`) VALUES
(3, 11, '2024-09-20', 'Sering sakit kepala', 'Normal (120/80 mmHg)', 65, '90', '100', 'Normal (90 mg/dL)', 'Normal (180 mg/dL)', 'Normal (5 mg/dL)', '2024-09-20 06:16:22', '2024-09-20 06:33:16'),
(4, 3, '2024-09-20', 'Batuk pilek euy', 'Normal (115/75 mmHg)', 60, '91', '111', 'Normal (95 mg/dL)', 'Normal (175 mg/dL)', 'Normal (10 mg/dL)', '2024-09-20 06:24:23', '2024-09-20 06:32:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemeriksaan_pasien`
--

CREATE TABLE `pemeriksaan_pasien` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tgl_input` date NOT NULL,
  `riwayat_sakit_keluarga` varchar(30) NOT NULL,
  `riwayat_ptm_sendiri` varchar(30) NOT NULL,
  `status_kes_bln_terakhir` varchar(30) NOT NULL,
  `status_kes_bln_skrng` varchar(30) NOT NULL,
  `konsumsi_sayur_buah` varchar(30) NOT NULL,
  `aktivitas_fisik` varchar(30) NOT NULL,
  `merokok` varchar(200) NOT NULL,
  `berhenti_merokok` varchar(30) NOT NULL,
  `alkohol` varchar(100) NOT NULL,
  `keluhan_utama` text NOT NULL,
  `tekanan_darah` varchar(30) NOT NULL,
  `bb` varchar(30) NOT NULL,
  `sistol` varchar(30) NOT NULL,
  `diastol` varchar(30) NOT NULL,
  `gula_darah` varchar(30) NOT NULL,
  `kolesterol` varchar(30) NOT NULL,
  `asam_urat` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat`
--

CREATE TABLE `riwayat` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tgl_input` date DEFAULT NULL,
  `r_sakit_kel` varchar(100) NOT NULL DEFAULT '-',
  `r_sakit_man` varchar(100) NOT NULL DEFAULT '-',
  `stat_kes_bln_ter` varchar(100) NOT NULL DEFAULT '-',
  `stat_kes_bln_skrg` varchar(100) NOT NULL DEFAULT '-',
  `tb` int(11) NOT NULL DEFAULT 0,
  `bb` int(11) NOT NULL DEFAULT 0,
  `gula_darah` varchar(100) NOT NULL DEFAULT '-',
  `tekanan_darah` varchar(100) NOT NULL DEFAULT '-',
  `kolesterol` varchar(100) NOT NULL DEFAULT '-',
  `asam_urat` varchar(100) NOT NULL DEFAULT '-',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `riwayat`
--

INSERT INTO `riwayat` (`id`, `user_id`, `tgl_input`, `r_sakit_kel`, `r_sakit_man`, `stat_kes_bln_ter`, `stat_kes_bln_skrg`, `tb`, `bb`, `gula_darah`, `tekanan_darah`, `kolesterol`, `asam_urat`, `created_at`, `updated_at`) VALUES
(1, 3, '2024-09-19', 'tidak pernah', 'tidak ada', 'sehat', 'sehat', 170, 65, 'Normal (90 mg/dL)', 'Normal (120/80 mmHg)', 'Normal (180 mg/dL)', 'Normal (5 mg/dL)', '2024-09-19 08:51:01', '2024-09-20 06:46:44'),
(3, 3, '2024-09-21', 'Tidak pernah', 'Kolesterol', 'Badan lemas', 'Sedang perawatan', 165, 60, 'Normal (95 mg/dL)', 'Normal (120/80 mmHg)', 'Tinggi (220 mg/dL)', 'Normal (6 mg/dL)', '2024-09-19 10:05:44', '2024-09-20 06:46:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nm_lengkap` varchar(100) NOT NULL DEFAULT '-',
  `nik` varchar(25) NOT NULL DEFAULT '-',
  `no_hp` varchar(15) NOT NULL DEFAULT '-',
  `tgl_lahir` date DEFAULT NULL,
  `tmp_lahir` varchar(100) NOT NULL DEFAULT '-',
  `jenis_kelamin` enum('laki_laki','perempuan','lainnya') NOT NULL DEFAULT 'lainnya',
  `goldar` varchar(5) NOT NULL DEFAULT '-',
  `alamat` text NOT NULL DEFAULT '-',
  `rt` varchar(10) NOT NULL DEFAULT '-',
  `rw` varchar(10) NOT NULL DEFAULT '-',
  `keldes` varchar(100) NOT NULL DEFAULT '-',
  `kecamatan` varchar(100) NOT NULL DEFAULT '-',
  `agama` varchar(50) NOT NULL DEFAULT '-',
  `status_kawin` enum('belum_menikah','menikah') NOT NULL DEFAULT 'belum_menikah',
  `gambar` varchar(100) NOT NULL DEFAULT '-',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nm_lengkap`, `nik`, `no_hp`, `tgl_lahir`, `tmp_lahir`, `jenis_kelamin`, `goldar`, `alamat`, `rt`, `rw`, `keldes`, `kecamatan`, `agama`, `status_kawin`, `gambar`, `created_at`, `updated_at`) VALUES
(1, 'Dinda Fazryan', '3207010911010004', '087731137537', '2024-09-11', 'ciamis', 'laki_laki', 'O', 'lingkungan bojongsari', '01', '012', 'maleber', 'ciamis', 'islam', 'belum_menikah', 'gambarprofile-1299461446.jpg', '2024-09-11 03:54:18', '2024-09-17 08:25:21'),
(2, 'Sukma Eka Juliani', '3207010902010003', '085223424195', '2004-09-23', 'Ciamis', 'perempuan', 'A', 'Jl Sadananya, Ciamis', '03', '05', 'Sadananya', 'Ciamis', 'kristen', 'menikah', '-', '2024-09-11 13:59:55', '2024-09-17 13:02:55'),
(3, 'Zidan Ramadhan', '3207010902010004', '0895647287638', '2001-09-10', 'Ciamis', 'laki_laki', 'A', 'Jl. Kertaharja, Ciamis', '2', '4', 'Kertaharja', 'Ciamis', 'islam', 'belum_menikah', '-', '2024-09-12 07:35:12', '2024-09-18 07:32:37'),
(7, 'Saepul Akbar', '-', '08952952371', NULL, '-', 'laki_laki', '-', '-', '-', '-', '-', '-', '-', 'belum_menikah', 'gambarprofile-1557226591.jpg', '2024-09-12 16:02:23', '2024-09-12 16:28:04'),
(8, 'Rima Nuary', '-', '0873636172636', NULL, '-', 'perempuan', '-', '-', '-', '-', '-', '-', '-', 'belum_menikah', 'gambarprofile-1332499083.jpg', '2024-09-12 16:04:36', '2024-09-16 16:20:38'),
(9, 'Wulan Budi Mulyati', '-', '08223712383', NULL, '-', 'perempuan', '-', '-', '-', '-', '-', '-', '-', 'belum_menikah', 'gambarprofile-1139821954.jpg', '2024-09-12 16:07:11', '2024-09-12 16:07:28'),
(11, 'Dewi Sri Wijaya', '3207010902010002', '0822134523781', '2003-12-06', 'Banjarsari', 'perempuan', 'A', 'Banjarsari, Ciamis', '1', '5', 'Banjar', 'Banjarsari', 'islam', 'belum_menikah', '-', '2024-09-17 06:21:37', '2024-09-18 07:25:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `wawancara`
--

CREATE TABLE `wawancara` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tgl_input` date NOT NULL,
  `r_sakit_kel` varchar(30) NOT NULL,
  `r_sakit_man` varchar(30) NOT NULL,
  `stat_kes_bln_ter` varchar(30) NOT NULL,
  `stat_kes_bln_skrg` varchar(30) NOT NULL,
  `aktivitas_fisik` varchar(30) NOT NULL,
  `kons_sayur_buah` varchar(30) NOT NULL,
  `merokok` varchar(30) NOT NULL,
  `alkohol` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `wawancara`
--

INSERT INTO `wawancara` (`id`, `user_id`, `tgl_input`, `r_sakit_kel`, `r_sakit_man`, `stat_kes_bln_ter`, `stat_kes_bln_skrg`, `aktivitas_fisik`, `kons_sayur_buah`, `merokok`, `alkohol`, `created_at`, `updated_at`) VALUES
(2, 2, '2024-09-19', 'penyakit jantung', 'riwayat cidera', 'tidak sehat', 'lebih buruk', 'ya', 'tidak', 'pernah', 'tidak pernah', '2024-09-19 16:23:47', '2024-09-20 06:07:55'),
(4, 3, '2024-09-20', 'asma', 'hipertensi', 'tidak sehat', 'sama dengan bulan sebelumnya', 'ya', 'ya', 'pernah', 'pernah', '2024-09-20 04:26:05', '2024-09-20 04:26:05'),
(5, 2, '2024-09-20', 'tidak ada', 'tidak ada', 'sangat sehat', 'lebih baik', 'ya', 'ya', 'pernah', 'pernah', '2024-09-20 04:34:21', '2024-09-20 04:34:21');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `autentikasi`
--
ALTER TABLE `autentikasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pemeriksaan`
--
ALTER TABLE `pemeriksaan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pemeriksaan_pasien`
--
ALTER TABLE `pemeriksaan_pasien`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `riwayat`
--
ALTER TABLE `riwayat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `wawancara`
--
ALTER TABLE `wawancara`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `autentikasi`
--
ALTER TABLE `autentikasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `pemeriksaan`
--
ALTER TABLE `pemeriksaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pemeriksaan_pasien`
--
ALTER TABLE `pemeriksaan_pasien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `riwayat`
--
ALTER TABLE `riwayat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `wawancara`
--
ALTER TABLE `wawancara`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
