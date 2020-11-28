-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 28 Nov 2020 pada 16.35
-- Versi server: 10.3.27-MariaDB
-- Versi PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `psjznxpm_school`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `accesses`
--

CREATE TABLE `accesses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `menu_id` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_access_id` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `accesses`
--

INSERT INTO `accesses` (`id`, `menu_id`, `role_access_id`, `created_at`, `updated_at`) VALUES
(3, '5', '1', '2020-11-19 04:03:34', '2020-11-19 04:03:34'),
(4, '6', '1', '2020-11-19 04:03:34', '2020-11-19 04:03:34'),
(5, '7', '1', '2020-11-19 04:03:34', '2020-11-19 04:03:34'),
(6, '8', '1', '2020-11-19 04:03:34', '2020-11-19 04:03:34'),
(7, '9', '1', '2020-11-19 04:03:34', '2020-11-19 04:03:34'),
(8, '10', '1', '2020-11-19 04:03:34', '2020-11-19 04:03:34'),
(9, '11', '1', '2020-11-19 04:03:34', '2020-11-19 04:03:34'),
(10, '12', '1', '2020-11-19 04:03:34', '2020-11-19 04:03:34'),
(11, '13', '1', '2020-11-19 04:04:22', '2020-11-19 04:04:22'),
(12, '14', '1', '2020-11-19 04:04:22', '2020-11-19 04:04:22'),
(13, '15', '1', '2020-11-19 04:04:22', '2020-11-19 04:04:22'),
(14, '16', '1', '2020-11-19 04:04:22', '2020-11-19 04:04:22'),
(15, '17', '1', '2020-11-19 04:04:22', '2020-11-19 04:04:22'),
(16, '18', '1', '2020-11-19 04:04:22', '2020-11-19 04:04:22'),
(17, '19', '1', '2020-11-19 04:04:22', '2020-11-19 04:04:22'),
(18, '20', '1', '2020-11-19 04:04:22', '2020-11-19 04:04:22'),
(19, '21', '1', '2020-11-19 04:04:23', '2020-11-19 04:04:23'),
(20, '22', '1', '2020-11-19 04:04:23', '2020-11-19 04:04:23'),
(21, '23', '1', '2020-11-19 04:04:23', '2020-11-19 04:04:23'),
(23, '25', '1', '2020-11-19 04:04:23', '2020-11-19 04:04:23'),
(24, '26', '1', '2020-11-19 04:04:23', '2020-11-19 04:04:23'),
(25, '27', '1', '2020-11-19 04:04:23', '2020-11-19 04:04:23'),
(26, '28', '1', '2020-11-19 04:04:23', '2020-11-19 04:04:23'),
(27, '29', '1', '2020-11-19 04:04:23', '2020-11-19 04:04:23'),
(28, '30', '1', '2020-11-19 04:04:23', '2020-11-19 04:04:23'),
(29, '1', '1', '2020-11-19 07:56:14', '2020-11-19 07:56:14'),
(30, '4', '1', '2020-11-19 07:56:14', '2020-11-19 07:56:14'),
(31, '31', '1', '2020-11-21 08:41:04', '2020-11-21 08:41:04'),
(32, '32', '1', '2020-11-21 08:41:04', '2020-11-21 08:41:04'),
(33, '33', '1', '2020-11-21 08:41:04', '2020-11-21 08:41:04'),
(34, '34', '1', '2020-11-21 08:41:04', '2020-11-21 08:41:04'),
(35, '35', '1', '2020-11-21 08:41:04', '2020-11-21 08:41:04'),
(36, '36', '1', '2020-11-21 08:41:04', '2020-11-21 08:41:04'),
(37, '37', '1', '2020-11-21 08:41:04', '2020-11-21 08:41:04'),
(38, '38', '1', '2020-11-21 08:41:05', '2020-11-21 08:41:05'),
(39, '39', '1', '2020-11-21 08:41:05', '2020-11-21 08:41:05'),
(40, '40', '1', '2020-11-21 08:41:05', '2020-11-21 08:41:05'),
(41, '41', '1', '2020-11-21 08:41:05', '2020-11-21 08:41:05'),
(42, '42', '1', '2020-11-21 08:41:05', '2020-11-21 08:41:05'),
(43, '1', '2', '2020-11-21 08:42:12', '2020-11-21 08:42:12'),
(44, '4', '2', '2020-11-21 08:42:12', '2020-11-21 08:42:12'),
(45, '5', '2', '2020-11-21 08:42:12', '2020-11-21 08:42:12'),
(46, '6', '2', '2020-11-21 08:42:12', '2020-11-21 08:42:12'),
(47, '7', '2', '2020-11-21 08:42:12', '2020-11-21 08:42:12'),
(48, '8', '2', '2020-11-21 08:42:12', '2020-11-21 08:42:12'),
(49, '9', '2', '2020-11-21 08:42:12', '2020-11-21 08:42:12'),
(50, '10', '2', '2020-11-21 08:42:12', '2020-11-21 08:42:12'),
(51, '11', '2', '2020-11-21 08:42:13', '2020-11-21 08:42:13'),
(52, '12', '2', '2020-11-21 08:42:13', '2020-11-21 08:42:13'),
(53, '13', '2', '2020-11-21 08:42:13', '2020-11-21 08:42:13'),
(54, '22', '2', '2020-11-21 08:42:13', '2020-11-21 08:42:13'),
(55, '23', '2', '2020-11-21 08:42:13', '2020-11-21 08:42:13'),
(56, '25', '2', '2020-11-21 08:42:13', '2020-11-21 08:42:13'),
(57, '28', '2', '2020-11-21 08:42:13', '2020-11-21 08:42:13'),
(58, '29', '2', '2020-11-21 08:42:13', '2020-11-21 08:42:13'),
(59, '30', '2', '2020-11-21 08:42:13', '2020-11-21 08:42:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `akses_ci`
--

CREATE TABLE `akses_ci` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `hak_akses` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `akses_ci`
--

INSERT INTO `akses_ci` (`id`, `menu_id`, `hak_akses`) VALUES
(1, 43, 1),
(2, 44, 1),
(3, 45, 1),
(4, 46, 1),
(5, 47, 1),
(6, 48, 1),
(7, 49, 1),
(8, 50, 1),
(9, 51, 1),
(10, 52, 1),
(11, 53, 1),
(12, 54, 1),
(13, 55, 1),
(14, 56, 1),
(15, 57, 1),
(16, 58, 1),
(17, 59, 1),
(18, 60, 1),
(19, 61, 1),
(20, 62, 1),
(21, 63, 1),
(22, 64, 1),
(23, 65, 1),
(24, 66, 1),
(25, 67, 1),
(26, 68, 1),
(27, 69, 1),
(28, 70, 1),
(29, 71, 1),
(30, 72, 1),
(31, 73, 1),
(32, 74, 1),
(33, 75, 1),
(34, 76, 1),
(35, 77, 1),
(36, 78, 1),
(38, 79, 1),
(39, 80, 1),
(40, 81, 1),
(41, 82, 1),
(42, 83, 1),
(43, 84, 1),
(44, 85, 1),
(45, 86, 1),
(46, 87, 1),
(47, 88, 1),
(48, 89, 1),
(49, 90, 1),
(50, 91, 1),
(51, 43, 2),
(52, 44, 2),
(53, 46, 2),
(54, 47, 2),
(55, 48, 2),
(56, 49, 2),
(57, 51, 2),
(58, 52, 2),
(59, 53, 2),
(60, 54, 2),
(61, 55, 2),
(62, 56, 2),
(63, 57, 2),
(64, 58, 2),
(65, 60, 2),
(66, 61, 2),
(67, 62, 2),
(68, 63, 2),
(69, 64, 2),
(70, 65, 2),
(71, 66, 2),
(72, 67, 2),
(73, 68, 2),
(74, 70, 2),
(75, 71, 2),
(76, 72, 2),
(77, 73, 2),
(78, 74, 2),
(79, 76, 2),
(80, 77, 2),
(81, 78, 2),
(82, 79, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_tagihan_sma`
--

CREATE TABLE `data_tagihan_sma` (
  `id` int(11) NOT NULL,
  `siswa_id` int(11) NOT NULL,
  `tagihan_sma_id` int(11) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `data_tagihan_sma`
--

INSERT INTO `data_tagihan_sma` (`id`, `siswa_id`, `tagihan_sma_id`, `status`) VALUES
(36, 3, 1, 1),
(37, 3, 2, 0),
(38, 3, 3, 0),
(39, 3, 4, 0),
(40, 3, 5, 0),
(41, 3, 6, 0),
(42, 3, 8, 0),
(43, 3, 9, 0),
(44, 4, 1, 1),
(45, 4, 2, 1),
(46, 4, 3, 1),
(47, 4, 4, 1),
(48, 4, 5, 1),
(49, 4, 6, 1),
(50, 4, 7, 1),
(51, 4, 9, 1),
(60, 5, 1, 1),
(61, 5, 2, 1),
(62, 5, 3, 1),
(63, 5, 4, 1),
(64, 5, 5, 1),
(65, 5, 6, 1),
(66, 5, 8, 1),
(67, 5, 9, 1),
(90, 6, 14, 1),
(91, 6, 15, 1),
(92, 6, 3, 0),
(93, 6, 4, 0),
(94, 6, 5, 0),
(95, 6, 6, 0),
(96, 6, 9, 0),
(97, 7, 1, 1),
(98, 7, 2, 0),
(99, 7, 3, 0),
(100, 7, 5, 0),
(101, 7, 7, 0),
(104, 3, 14, 0),
(105, 7, 14, 0),
(106, 8, 1, 1),
(107, 8, 2, 1),
(108, 8, 3, 1),
(109, 8, 4, 1),
(110, 8, 5, 1),
(111, 8, 6, 0),
(112, 8, 8, 0),
(113, 8, 9, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `divisi`
--

CREATE TABLE `divisi` (
  `id` int(11) NOT NULL,
  `divisi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `divisi`
--

INSERT INTO `divisi` (`id`, `divisi`) VALUES
(2, 'Marketing');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dormitory`
--

CREATE TABLE `dormitory` (
  `id` int(11) NOT NULL,
  `siswa_id` int(11) NOT NULL,
  `kamar_id` int(11) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `status_boarding` int(1) NOT NULL,
  `pemberi_kunci` int(1) NOT NULL,
  `note` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `dormitory`
--

INSERT INTO `dormitory` (`id`, `siswa_id`, `kamar_id`, `tanggal_mulai`, `status_boarding`, `pemberi_kunci`, `note`) VALUES
(6, 6, 2, '2020-10-21', 1, 1, ''),
(7, 8, 3, '2020-10-21', 1, 0, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gurus`
--

CREATE TABLE `gurus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nip` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` smallint(6) NOT NULL,
  `poto` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `gurus`
--

INSERT INTO `gurus` (`id`, `nip`, `nama`, `tempat`, `tanggal_lahir`, `jenis_kelamin`, `poto`, `alamat`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, '321', 'Desti Angelia', 'Bekasi', '1997-12-19', 0, NULL, 'Villa Nusa Indah, Kab.Bogor', NULL, '2020-11-13 12:42:56', '2020-11-13 12:42:56'),
(3, '123', 'Riway Restu Islami Yudha', 'Bandung', '1997-03-29', 1, 'images/guru/WuajDZ6pLR5LC7O4Yy3Nyc2lW6r2naXA6vWdbg3r.jpeg', 'Cibitung Bekasi', NULL, '2020-11-13 13:02:56', '2020-11-13 13:27:59'),
(4, '456', 'Gian Dzaky', 'Bekasi', '2014-06-24', 1, 'images/guru/qhHRWPTO7gDfE9mObSAdLqyiQhbriHeX4ZrksSMs.jpeg', 'Cibitung, Bekasi', '2020-11-13 13:33:50', '2020-11-13 13:33:22', '2020-11-13 13:33:50'),
(5, '9879', 'User', 'User', '1994-05-11', 1, NULL, 'User', '2020-11-21 08:04:58', '2020-11-21 08:04:46', '2020-11-21 08:04:58'),
(6, '678', 'User', 'User', '1995-11-09', 1, NULL, 'User', NULL, '2020-11-21 08:06:13', '2020-11-21 08:06:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwals`
--

CREATE TABLE `jadwals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kelas` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jurusan` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postfix` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jadwals`
--

INSERT INTO `jadwals` (`id`, `kelas`, `jurusan`, `postfix`, `created_at`, `updated_at`) VALUES
(2, 'X', 'IPA', '1', '2020-11-16 01:26:12', '2020-11-16 01:50:03'),
(4, 'XI', 'IPA', '1', '2020-11-16 01:50:20', '2020-11-16 01:50:20'),
(5, 'XII', 'IPA', '1', '2020-11-16 01:50:29', '2020-11-16 01:50:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_gurus`
--

CREATE TABLE `jadwal_gurus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mapel_id` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guru_id` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jadwal_id` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hari` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `jam_pelajaran_id` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jadwal_gurus`
--

INSERT INTO `jadwal_gurus` (`id`, `mapel_id`, `guru_id`, `jadwal_id`, `hari`, `created_at`, `updated_at`, `jam_pelajaran_id`) VALUES
(13, '00', NULL, '2', '1', NULL, '2020-11-17 12:50:47', '2'),
(14, NULL, NULL, '2', '1', NULL, NULL, '3'),
(15, NULL, NULL, '2', '1', NULL, NULL, '4'),
(16, NULL, NULL, '2', '1', NULL, NULL, '5'),
(17, NULL, NULL, '2', '1', NULL, NULL, '6'),
(18, NULL, NULL, '2', '1', NULL, NULL, '7'),
(19, NULL, NULL, '2', '1', NULL, NULL, '8'),
(20, NULL, NULL, '2', '1', NULL, NULL, '9'),
(21, NULL, NULL, '2', '1', NULL, NULL, '10'),
(22, NULL, NULL, '2', '1', NULL, NULL, '11'),
(23, '1', '2', '2', '2', NULL, NULL, '2'),
(24, '1', '2', '2', '2', NULL, NULL, '3'),
(25, '1', '2', '2', '2', NULL, NULL, '4'),
(26, '0', NULL, '2', '2', NULL, NULL, '5'),
(27, '4', '3', '2', '2', NULL, NULL, '6'),
(28, '4', '3', '2', '2', NULL, NULL, '7'),
(29, '0', NULL, '2', '2', NULL, NULL, '8'),
(30, '5', '2', '2', '2', NULL, NULL, '9'),
(31, '5', '2', '2', '2', NULL, NULL, '10'),
(32, '5', '2', '2', '2', NULL, NULL, '11'),
(33, '1', '3', '2', '3', NULL, NULL, '2'),
(34, '1', '3', '2', '3', NULL, NULL, '3'),
(35, '1', '3', '2', '3', NULL, NULL, '4'),
(36, NULL, NULL, '2', '3', NULL, NULL, '5'),
(37, '8', '6', '2', '3', NULL, '2020-11-21 08:29:59', '6'),
(38, '8', '6', '2', '3', NULL, '2020-11-21 08:29:54', '7'),
(39, NULL, NULL, '2', '3', NULL, NULL, '8'),
(40, '8', '6', '2', '3', NULL, '2020-11-21 08:30:24', '9'),
(41, NULL, NULL, '2', '3', NULL, NULL, '10'),
(42, NULL, NULL, '2', '3', NULL, NULL, '11'),
(48, '13', '3', '2', '4', '2020-11-17 09:45:34', '2020-11-17 09:45:34', '3'),
(55, '13', '3', '2', '4', '2020-11-17 12:49:48', '2020-11-17 12:49:48', '2'),
(56, '1', '3', '4', '1', '2020-11-18 09:39:21', '2020-11-18 13:10:59', '2'),
(57, '1', '3', '4', '1', '2020-11-18 09:39:41', '2020-11-18 13:11:14', '3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_siswas`
--

CREATE TABLE `jadwal_siswas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `siswa_id` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jadwal_id` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jadwal_siswas`
--

INSERT INTO `jadwal_siswas` (`id`, `siswa_id`, `jadwal_id`, `created_at`, `updated_at`) VALUES
(1, '6', '2', NULL, NULL),
(3, '7', '2', NULL, NULL),
(4, '8', '4', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jam_pelajarans`
--

CREATE TABLE `jam_pelajarans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jam_awal` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jam_akhir` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jam_pelajarans`
--

INSERT INTO `jam_pelajarans` (`id`, `jam_awal`, `jam_akhir`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '7:45', '8:45', '2020-11-13 23:23:45', '2020-11-13 23:16:29', '2020-11-13 23:23:45'),
(2, '7:45', '8:30', NULL, '2020-11-13 23:24:06', '2020-11-13 23:24:06'),
(3, '8:30', '9:15', NULL, '2020-11-13 23:24:35', '2020-11-13 23:24:35'),
(4, '9:15', '10:00', NULL, '2020-11-13 23:25:15', '2020-11-13 23:25:15'),
(5, '10:00', '10:15', NULL, '2020-11-13 23:25:45', '2020-11-13 23:25:45'),
(6, '10:15', '11:00', NULL, '2020-11-13 23:26:19', '2020-11-13 23:26:19'),
(7, '11:00', '11:45', NULL, '2020-11-13 23:26:48', '2020-11-13 23:26:48'),
(8, '11:45', '13:00', NULL, '2020-11-13 23:27:14', '2020-11-13 23:27:14'),
(9, '13:00', '13:45', NULL, '2020-11-13 23:28:15', '2020-11-13 23:28:15'),
(10, '13:45', '14:30', NULL, '2020-11-13 23:28:42', '2020-11-13 23:28:42'),
(11, '14:30', '15:15', NULL, '2020-11-13 23:29:15', '2020-11-13 23:29:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kamar`
--

CREATE TABLE `kamar` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenis` int(1) NOT NULL,
  `tipe` int(11) NOT NULL,
  `sisa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `kamar`
--

INSERT INTO `kamar` (`id`, `nama`, `jenis`, `tipe`, `sisa`) VALUES
(1, 'Kamar 200', 1, 3, 3),
(2, 'Kamar 201', 1, 3, 2),
(3, 'Kamar 300', 0, 5, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_pembayaran`
--

CREATE TABLE `kategori_pembayaran` (
  `id` int(11) NOT NULL,
  `kategori` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `kategori_pembayaran`
--

INSERT INTO `kategori_pembayaran` (`id`, `kategori`) VALUES
(1, 'Registration Fee'),
(2, 'Uang Gedung SMA'),
(3, 'Buku Paket'),
(4, 'Seragam SMA'),
(5, 'Ektrakulikuler SMA'),
(6, 'Wisuda SMA'),
(7, 'Overseas SMA'),
(8, 'Boarding SMA'),
(9, 'SPP SMA'),
(10, 'Biaya Lainnya'),
(11, 'Denda Perpus'),
(12, 'Tuition Fee Beasiswa SMA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mapels`
--

CREATE TABLE `mapels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `mapels`
--

INSERT INTO `mapels` (`id`, `nama`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Matematika', '2020-11-12 19:39:17', '2020-11-13 01:29:18', NULL),
(2, 'B. Indonesia', '2020-11-13 01:33:24', '2020-11-13 01:39:59', '2020-11-13 01:39:59'),
(3, 'B. Indonesia', '2020-11-13 01:46:00', '2020-11-13 01:46:19', '2020-11-13 01:46:19'),
(4, 'B. Indonesia', '2020-11-13 01:47:41', '2020-11-13 01:47:41', NULL),
(5, 'B. Inggris', '2020-11-13 01:48:53', '2020-11-13 01:48:53', NULL),
(6, 'B. Sunda', '2020-11-13 01:49:07', '2020-11-13 01:49:07', NULL),
(7, 'B. Jepang', '2020-11-13 01:49:20', '2020-11-13 01:49:20', NULL),
(8, 'Fisika', '2020-11-13 01:49:32', '2020-11-13 01:49:32', NULL),
(9, 'Geografi', '2020-11-13 01:49:48', '2020-11-13 01:49:48', NULL),
(10, 'Sejarah', '2020-11-13 01:50:01', '2020-11-13 01:50:01', NULL),
(11, 'Biologi', '2020-11-13 01:50:15', '2020-11-13 01:50:15', NULL),
(12, 'Kimia', '2020-11-13 01:50:24', '2020-11-13 01:50:24', NULL),
(13, 'TIK', '2020-11-13 01:50:35', '2020-11-13 01:50:35', NULL),
(14, 'Sosiologi', '2020-11-13 01:50:47', '2020-11-13 01:50:47', NULL),
(15, 'Ekonomi', '2020-11-13 01:50:57', '2020-11-13 01:50:57', NULL),
(16, 'Seni Budaya', '2020-11-13 01:51:07', '2020-11-13 01:51:07', NULL),
(17, 'PENJASKES', '2020-11-13 01:51:20', '2020-11-13 01:51:20', NULL),
(18, 'PAI', '2020-11-13 01:51:32', '2020-11-13 01:51:32', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `marketer`
--

CREATE TABLE `marketer` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nip` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `marketer`
--

INSERT INTO `marketer` (`id`, `nama`, `nip`) VALUES
(2, 'Mr. Dummy ', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `menus`
--

INSERT INTO `menus` (`id`, `nama`, `url`, `jenis`, `created_at`, `updated_at`) VALUES
(1, 'Lihat Siswa', 'siswa', '1', NULL, NULL),
(4, 'Detail Siswa', 'siswa/id', '1', NULL, NULL),
(5, 'Lihat Mata Pelajaran', 'mapel', '1', NULL, NULL),
(6, 'Tambah Mata Pelajaran', 'mapel/create', '1', NULL, NULL),
(7, 'Edit Mata Pelajaran', 'mapel/id/edit', '1', NULL, NULL),
(8, 'Hapus Mata Pelajaran', 'mapel/destroy/id', '1', NULL, NULL),
(9, 'Lihat Data Guru', 'guru', '1', NULL, NULL),
(10, 'Detail Guru', 'guru/id', '1', NULL, NULL),
(11, 'Tambah Guru', 'guru/create', '1', NULL, NULL),
(12, 'Edit Guru', 'guru/id/edit', '1', NULL, NULL),
(13, 'Hapus Guru', 'guru/destroy/id', '1', NULL, NULL),
(14, 'Lihat Jam Pelajaran', 'jam-pelajaran', '1', NULL, NULL),
(15, 'Tambah Jam', 'jam-pelajaran/create', '1', NULL, NULL),
(16, 'Edit Jam', 'jam-pelajaran/id/edit', '1', NULL, NULL),
(17, 'Hapus Jam', 'jam-pelajaran/destroy/id', '1', NULL, NULL),
(18, 'Lihat Kelas', 'jadwal', '1', NULL, NULL),
(19, 'Tambah Kelas', 'jadwal/create', '1', NULL, NULL),
(20, 'Edit Kelas', 'jadwal/id/edit', '1', NULL, NULL),
(21, 'Hapus Kelas', 'jadwal/destroy/id', '1', NULL, NULL),
(22, 'Lihat Jadwal Pelajaran', 'jadwal-pelajaran', '1', NULL, NULL),
(23, 'Tambah Jadwal Pelajaran', 'jadwal-pelajaran/create', '1', NULL, NULL),
(25, 'Lihat Kelas Siswa', 'jadwal-siswa', '1', NULL, NULL),
(26, 'Tambah Kelas Siswa', 'jadwal-siswa/create', '1', NULL, NULL),
(27, 'Delete Siswa Kelas', 'jadwal-siswa/destroy/id', '1', NULL, NULL),
(28, 'Lihat Report', 'report', '1', NULL, NULL),
(29, 'Tambah Report', 'report/create', '1', NULL, NULL),
(30, 'Edit Report', 'report/id', '1', NULL, NULL),
(31, 'Lihat Role Akses', 'role-access', '1', NULL, NULL),
(32, 'Tambah Role Akses', 'role-access/create', '1', NULL, NULL),
(33, 'Edit Role Akses', 'role-access/id/edit', '1', NULL, NULL),
(34, 'Hapus Role Akses', 'role-access/destroy/id', '1', NULL, NULL),
(35, 'Lihat Menu Role Akses', 'access', '1', NULL, NULL),
(36, 'Tambah Menu Role Akses', 'access/create', '1', NULL, NULL),
(37, 'Edit Menu Role Akses', 'access/id/edit', '1', NULL, NULL),
(38, 'Hapus Menu Role Akses', 'access/destroy/id', '1', NULL, NULL),
(39, 'Lihat User', 'user', '1', NULL, NULL),
(40, 'Tambah User', 'user/create', '1', NULL, NULL),
(41, 'Edit User', 'user/id/edit', '1', NULL, NULL),
(42, 'Hapus User', 'user/destroy/id', '1', NULL, NULL),
(43, 'Lihat Siswa', 'siswa_sma', '2', NULL, NULL),
(44, 'Edit Siswa', 'siswa_sma/edit', '2', NULL, NULL),
(45, 'Hapus Siswa', 'siswa_sma/delete', '2', NULL, NULL),
(46, 'Detail Siswa', 'siswa_sma/detail', '2', NULL, NULL),
(47, 'Tambah Calon Siswa', 'registration_sma/create', '2', NULL, NULL),
(48, 'Lihat Calon Siswa', 'registration_sma', '2', NULL, NULL),
(49, 'Edit Calon Siswa', 'registration_sma/edit', '2', NULL, NULL),
(50, 'Hapus Calon Siswa', 'registration_sma/delete', '2', NULL, NULL),
(51, 'Detail Calon Siswa', 'registration_sma/detail', '2', NULL, NULL),
(52, 'Lihat Dormitory', 'dormitory_sma', '2', NULL, NULL),
(53, 'Tambah Dormitory', 'dormitory_sma/create', '2', NULL, NULL),
(54, 'Edit Dormitory', 'dormitory_sma/edit', '2', NULL, NULL),
(55, 'Detail Dormitory', 'dormitory_sma/detail', '2', NULL, NULL),
(56, 'Lihat Data Tagihan', 'tagihan_sma', '2', NULL, NULL),
(57, 'Tambh Tagihan', 'tagihan_sma/create', '2', NULL, NULL),
(58, 'Edit Tagihan', 'tagihan_sma/edit', '2', NULL, NULL),
(59, 'Hapus Tagihan', 'tagihan_sma/delete', '2', NULL, NULL),
(60, 'Template Tagihan', 'template_tagihan', '2', NULL, NULL),
(61, 'Edit Template Tagihan', 'template_tagihan/edit', '2', NULL, NULL),
(62, 'Lihat Tagihan Siswa', 'tagihan_sma/tagihanSiswa', '2', NULL, NULL),
(63, 'Tambah Tagihan Siswa', 'tagihan_sma/addTagihanSiswa', '2', NULL, NULL),
(64, 'Pembayaran Siswa Baru', 'pembayaran_sma/create', '2', NULL, NULL),
(65, 'Pembayaran Fullday', 'pembayaran_sma_fullday/create', '2', NULL, NULL),
(66, 'Pembayaran Boarding', 'pembayaran_sma_boarding/create', '2', NULL, NULL),
(67, 'Riwayat Pembayaran', 'riwayat', '2', NULL, NULL),
(68, 'Detail Pembayaran', 'pembayaran_sma/detailSiswa', '2', NULL, NULL),
(69, 'Print Pembayaran', 'pembayaran_sma/printSiswa', '2', NULL, NULL),
(70, 'Report Pembayran', 'report', '2', NULL, NULL),
(71, 'Tunggakan Pembayaran', 'report/tunggakan', '2', NULL, NULL),
(72, 'Lihat Kategori', 'kategori', '2', NULL, NULL),
(73, 'Tambah Kategori', 'kategori/create', '2', NULL, NULL),
(74, 'Edit Kategori', 'kategori/edit', '2', NULL, NULL),
(75, 'Hapus Kategori', 'kategori/delete', '2', NULL, NULL),
(76, 'Lihat Marketer', 'marketer', '2', NULL, NULL),
(77, 'Tambah Marketer', 'marketer/create', '2', NULL, NULL),
(78, 'Edit Marketer', 'marketer/edit', '2', NULL, NULL),
(79, 'Hapus Marketer', 'marketer/delete', '2', NULL, NULL),
(80, 'Lihat Role', 'role', '2', NULL, NULL),
(81, 'Tambah Role', 'role/create', '2', NULL, NULL),
(82, 'Edit Role', 'role/edit', '2', NULL, NULL),
(83, 'Hapus Role', 'role/delete', '2', NULL, NULL),
(84, 'Lihat Akses', 'akses', '2', NULL, NULL),
(85, 'Tambah Akses', 'akses/create', '2', NULL, NULL),
(86, 'Edit Akses', 'akses/edit', '2', NULL, NULL),
(87, 'Hapus Akses', 'akses/delete', '2', NULL, NULL),
(88, 'Lihat User', 'user', '2', NULL, NULL),
(89, 'Tambah User', 'user/create', '2', NULL, NULL),
(90, 'Edit User', 'user/edit', '2', NULL, NULL),
(91, 'Hapus User', 'user/delete', '2', NULL, NULL);

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
(1, '2020_11_13_015123_create_mapels_table', 1),
(2, '2020_11_13_020612_add_soft_deletedd_to_mapelss_table', 2),
(3, '2020_11_13_085733_create_gurus_table', 3),
(4, '2020_11_13_203830_create_jam_pelajarans_table', 4),
(5, '2020_11_14_063459_create_jadwals_table', 5),
(6, '2020_11_14_064141_create_jadwal_gurus_table', 6),
(7, '2020_11_16_092611_add_jam_pelajaran_id_to_jadwal_gurus_table', 7),
(8, '2020_11_17_195859_create_jadwal_siswas_table', 8),
(9, '2020_11_18_101121_create_reports_table', 9),
(10, '2020_11_18_204317_add_tanggal_ujian_to_reports_table', 10),
(11, '2020_11_19_092255_create_menus_table', 11),
(12, '2020_11_19_093422_create_role_accesses_table', 11),
(13, '2020_11_19_093521_create_accesses_table', 11);

-- --------------------------------------------------------

--
-- Struktur dari tabel `orang_tua`
--

CREATE TABLE `orang_tua` (
  `id` int(11) NOT NULL,
  `siswa_id` int(11) NOT NULL,
  `ayah` varchar(50) NOT NULL,
  `ibu` varchar(50) NOT NULL,
  `hp` varchar(15) NOT NULL,
  `alamat_ortu` text NOT NULL,
  `telp` varchar(15) NOT NULL,
  `email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `orang_tua`
--

INSERT INTO `orang_tua` (`id`, `siswa_id`, `ayah`, `ibu`, `hp`, `alamat_ortu`, `telp`, `email`) VALUES
(1, 3, '1ubah', '1ubah', '11', '1ubah', '11', 'riway.restu@gmail.comubah'),
(2, 4, 'as', 'as', '1', 'as', '1', 'as@gmail.com'),
(3, 5, 'qw', 'qw', '2', 'qw', '2', 'qw@gmail.com'),
(4, 6, 'Ridwan', 'Dede Supriati', '085711191079', 'Bekasi', '1', 'riway.restu@gmail.com'),
(5, 7, 'Dummy', 'Dummy', '11', 'Dummy', '1', 'riway.restu@gmail.com'),
(6, 8, 'Father', 'Mother', '08671117897', 'Jakarta', '98751977', 'fater@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran_sma`
--

CREATE TABLE `pembayaran_sma` (
  `id` int(11) NOT NULL,
  `data_tagihan_sma_id` int(11) NOT NULL,
  `tagihan_sma_id` int(11) NOT NULL,
  `siswa_id` int(11) NOT NULL,
  `metode` varchar(10) NOT NULL,
  `jumlah` varchar(50) NOT NULL,
  `total_tagihan` varchar(50) NOT NULL,
  `nama_bank` varchar(50) DEFAULT NULL,
  `poto` text NOT NULL,
  `tanggal` datetime NOT NULL,
  `kasir_id` int(11) DEFAULT NULL,
  `nama_kasir` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `pembayaran_sma`
--

INSERT INTO `pembayaran_sma` (`id`, `data_tagihan_sma_id`, `tagihan_sma_id`, `siswa_id`, `metode`, `jumlah`, `total_tagihan`, `nama_bank`, `poto`, `tanggal`, `kasir_id`, `nama_kasir`) VALUES
(34, 44, 1, 4, 'cash', '100.000', '', NULL, '', '2020-10-16 00:00:00', NULL, NULL),
(35, 45, 2, 4, 'cash', '200.000', '', NULL, '', '2020-10-16 00:00:00', NULL, NULL),
(36, 46, 3, 4, 'cash', '300.000', '', NULL, '', '2020-10-16 00:00:00', NULL, NULL),
(37, 47, 4, 4, 'cash', '400.000', '', NULL, '', '2020-10-16 00:00:00', NULL, NULL),
(38, 48, 5, 4, 'cash', '500.000', '', NULL, '', '2020-10-16 00:00:00', NULL, NULL),
(39, 49, 6, 4, 'cash', '600.000', '', NULL, '', '2020-10-16 00:00:00', NULL, NULL),
(40, 50, 7, 4, 'cash', '700.000', '', NULL, '', '2020-10-16 00:00:00', NULL, NULL),
(41, 51, 9, 4, 'cash', '100.000', '', NULL, '', '2020-10-16 00:00:00', NULL, NULL),
(42, 60, 1, 5, 'transfer', '100.000', '', 'Bank Semua', 'logo-1.png', '2020-10-16 00:00:00', NULL, NULL),
(43, 61, 2, 5, 'transfer', '200.000', '', 'Bank Semua', 'logo-1.png', '2020-10-16 00:00:00', NULL, NULL),
(44, 62, 3, 5, 'transfer', '300.000', '', 'Bank Semua', 'logo-1.png', '2020-10-16 00:00:00', NULL, NULL),
(45, 63, 4, 5, 'transfer', '400.000', '', 'Bank Semua', 'logo-1.png', '2020-10-16 00:00:00', NULL, NULL),
(46, 64, 5, 5, 'transfer', '500.000', '', 'Bank Semua', 'logo-1.png', '2020-10-16 00:00:00', NULL, NULL),
(47, 65, 6, 5, 'transfer', '600.000', '', 'Bank Semua', 'logo-1.png', '2020-10-16 00:00:00', NULL, NULL),
(48, 66, 8, 5, 'transfer', '700.000', '', 'Bank Semua', 'logo-1.png', '2020-10-16 00:00:00', NULL, NULL),
(49, 67, 9, 5, 'transfer', '100.000', '', 'Bank Semua', 'logo-1.png', '2020-10-16 00:00:00', NULL, NULL),
(67, 36, 1, 3, 'cash', '100.000', '2.900.000', NULL, '', '2020-10-17 10:27:37', NULL, NULL),
(68, 37, 2, 3, 'cash', '100.000', '2.800.000', NULL, '', '2020-10-17 10:28:34', NULL, NULL),
(69, 38, 3, 3, 'cash', '100.000', '2.800.000', NULL, '', '2020-10-17 10:28:34', NULL, NULL),
(72, 90, 14, 6, 'cash', '100.000', '2.500.000', NULL, '', '2020-10-19 14:18:34', NULL, NULL),
(73, 91, 15, 6, 'cash', '100.000', '2.500.000', NULL, '', '2020-10-19 14:18:34', NULL, NULL),
(74, 91, 15, 6, 'cash', '400.000', '2.300.000', NULL, '', '2020-10-19 14:19:02', NULL, NULL),
(75, 97, 1, 7, 'cash', '100.000', '1.800.000', NULL, '', '2020-10-19 16:11:26', NULL, NULL),
(76, 106, 1, 8, 'cash', '100.000', '2.900.000', NULL, '', '2020-10-21 13:06:10', NULL, NULL),
(77, 107, 2, 8, 'cash', '200.000', '2.900.000', NULL, '', '2020-10-21 13:06:10', NULL, NULL),
(79, 108, 3, 8, 'cash', '300.000', '2.600.000', NULL, '', '2020-10-21 14:40:02', 1, 'Root'),
(80, 109, 4, 8, 'cash', '400.000', '2.300.000', NULL, '', '2020-10-21 15:55:36', 1, 'Root'),
(81, 110, 5, 8, 'cash', '200.000', '1.900.000', NULL, '', '2020-10-23 08:41:00', 1, 'Root'),
(82, 110, 5, 8, 'cash', '300.000', '1.700.000', NULL, '', '2020-10-23 08:44:37', 1, 'Root');

-- --------------------------------------------------------

--
-- Struktur dari tabel `registration_sma`
--

CREATE TABLE `registration_sma` (
  `id` int(11) NOT NULL,
  `kategori` varchar(10) NOT NULL,
  `nis` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nama_panggilan` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `tipe` varchar(15) NOT NULL,
  `kelas` varchar(2) NOT NULL,
  `jurusan` varchar(3) NOT NULL,
  `alamat` text NOT NULL,
  `cita` text NOT NULL,
  `hobi` text NOT NULL,
  `kwarganegaraan` text NOT NULL,
  `anak_ke` varchar(2) NOT NULL,
  `jml_saudara` varchar(2) NOT NULL,
  `berat` varchar(5) NOT NULL,
  `tinggi` varchar(5) NOT NULL,
  `gol_darah` varchar(2) NOT NULL,
  `bahasa` text NOT NULL,
  `tinggal` varchar(15) NOT NULL,
  `marketer_id` int(11) NOT NULL,
  `aktif` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `registration_sma`
--

INSERT INTO `registration_sma` (`id`, `kategori`, `nis`, `nama`, `nama_panggilan`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `tipe`, `kelas`, `jurusan`, `alamat`, `cita`, `hobi`, `kwarganegaraan`, `anak_ke`, `jml_saudara`, `berat`, `tinggi`, `gol_darah`, `bahasa`, `tinggal`, `marketer_id`, `aktif`) VALUES
(3, 'baru', '', '1ubah', '1ubah', '0', '1ubah', '2020-10-14', '0', '11', 'IPS', ' 1ubah', '1ubah', '1ubah', '1ubah', '11', '11', '10', '11', 'B', '11', 'Asrama', 0, 1),
(4, 'baru', '', 'as', 'as', '1', 'as', '1997-03-21', '1', '10', 'IPS', 'as', 'as', 'as', 'as', '1', '1', '1', '1', 'A', '1', 'Orang Tua', 2, 0),
(5, 'baru', '', 'qw1', 'qw1', '0', 'qw1', '2020-10-16', '0', '10', 'IPS', ' qw', 'qw', 'qw', 'qw', '2', '2', '2', '2', 'B', '2', 'Orang Tua', 2, 0),
(6, 'baru', '', 'Riway Restu Islami Yudha', 'Iway', '1', 'Bandung', '2020-10-19', '0', '10', 'IPA', '  Bekasi', 'Pemain Sepak Bola', 'Nonton Film', 'Indonesia', '2', '3', '55', '178', 'AB', '178', 'Orang Tua', 2, 1),
(7, 'baru', '', 'Dummy', 'Dummy', '1', 'Dummy', '2020-10-20', '1', '10', 'IPA', 'Dummy', 'Dummy', 'Dummy', 'Dummy', '1', '1', '1', '1', 'A', 'Dummy', 'Orang Tua', 2, 1),
(8, 'baru', '', 'Daisy', 'Daisy', '0', 'Jakarta', '2020-10-20', '0', '11', 'IPS', 'Jakarta', 'Programmer', 'Gaming', 'Indonesia', '1', '1', '60', '170', 'A', 'Indonesia', 'Orang Tua', 2, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `reports`
--

CREATE TABLE `reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `guru_id` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `siswa_id` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mapel_id` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelas` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilai` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tanggal_ujian` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `reports`
--

INSERT INTO `reports` (`id`, `guru_id`, `siswa_id`, `mapel_id`, `kelas`, `nilai`, `jenis`, `created_at`, `updated_at`, `tanggal_ujian`) VALUES
(4, '3', '6', '1', '2', '100', '1', '2020-11-18 13:48:57', '2020-11-18 13:48:57', '2020-11-18'),
(5, '3', '7', '1', '2', '98', '1', '2020-11-18 13:59:04', '2020-11-19 02:16:20', '2020-11-18'),
(6, '6', '6', '8', '2', '80', '1', '2020-11-24 13:37:08', '2020-11-24 13:37:08', '2020-11-24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_accesses`
--

CREATE TABLE `role_accesses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `role_accesses`
--

INSERT INTO `role_accesses` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Root', '2020-11-19 03:20:29', '2020-11-19 03:24:53'),
(2, 'Guru', '2020-11-19 03:25:07', '2020-11-19 03:25:07'),
(4, 'Siswa', '2020-11-20 01:45:46', '2020-11-20 01:45:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id` int(11) NOT NULL,
  `nisn` varchar(15) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `jurusan` varchar(10) NOT NULL,
  `poto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id`, `nisn`, `nama`, `kelas`, `jurusan`, `poto`) VALUES
(4, '123456', 'Riway Restu Islami Yudha', 'XII', 'IPA', 'Pas_Poto1.JPG');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa_sma`
--

CREATE TABLE `siswa_sma` (
  `id` int(11) NOT NULL,
  `kategori` varchar(10) DEFAULT NULL,
  `nis` varchar(50) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `nama_panggilan` varchar(50) DEFAULT NULL,
  `jenis_kelamin` varchar(15) DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `tipe` varchar(15) DEFAULT NULL,
  `kelas` varchar(2) DEFAULT NULL,
  `jurusan` varchar(3) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `cita` text DEFAULT NULL,
  `hobi` text DEFAULT NULL,
  `kwarganegaraan` text DEFAULT NULL,
  `anak_ke` varchar(2) DEFAULT NULL,
  `jml_saudara` varchar(2) DEFAULT NULL,
  `berat` varchar(5) DEFAULT NULL,
  `tinggi` varchar(5) DEFAULT NULL,
  `gol_darah` varchar(2) DEFAULT NULL,
  `bahasa` text DEFAULT NULL,
  `tinggal` varchar(15) DEFAULT NULL,
  `marketer_id` int(11) DEFAULT NULL,
  `aktif` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `siswa_sma`
--

INSERT INTO `siswa_sma` (`id`, `kategori`, `nis`, `nama`, `nama_panggilan`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `tipe`, `kelas`, `jurusan`, `alamat`, `cita`, `hobi`, `kwarganegaraan`, `anak_ke`, `jml_saudara`, `berat`, `tinggi`, `gol_darah`, `bahasa`, `tinggal`, `marketer_id`, `aktif`) VALUES
(3, 'baru', '', '1ubah', '1ubah', '0', '1ubah', '2020-10-14', '0', '11', 'IPS', ' 1ubah', '1ubah', '1ubah', '1ubah', '11', '11', '10', '11', 'B', '11', 'Asrama', 0, 1),
(6, 'baru', '', 'Riway Restu Islami Yudha', 'Iway', '1', 'Bandung', '2020-10-20', '0', '10', 'IPA', ' Bekasi', 'Pemain Sepak Bola', 'Nonton Film', 'Indonesia', '2', '3', '55', '178', 'AB', '178', 'Orang Tua', 2, 1),
(7, 'baru', '', 'Dummy', 'Dummy', '0', 'Dummy', '2020-10-20', '1', '10', 'IPA', 'Dummy', 'Dummy', 'Dummy', 'Dummy', '1', '1', '1', '1', 'A', 'Dummy', 'Orang Tua', 2, 1),
(8, 'baru', '', 'Daisy', 'Daisy', '0', 'Jakarta', '2020-10-20', '0', '11', 'IPA', 'Jakarta', 'Programmer', 'Gaming', 'Indonesia', '1', '1', '60', '170', 'A', 'Indonesia', 'Orang Tua', 2, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tagihan_sma`
--

CREATE TABLE `tagihan_sma` (
  `id` int(11) NOT NULL,
  `nama` text NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `besar_tagihan` varchar(50) NOT NULL,
  `batas_pembayaran` date NOT NULL,
  `target_tagihan` varchar(50) NOT NULL,
  `detail_tagihan` text NOT NULL,
  `tipe` int(1) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `tagihan_sma`
--

INSERT INTO `tagihan_sma` (`id`, `nama`, `kategori`, `besar_tagihan`, `batas_pembayaran`, `target_tagihan`, `detail_tagihan`, `tipe`, `status`) VALUES
(1, 'Dummy Registration', '1', '100.000', '2020-10-14', 'Semua Siswa SMA', '', 1, 1),
(2, 'Dummy uang gedung sma', '2', '200.000', '2020-10-14', 'Semua Siswa SMA', '12', 1, 1),
(3, 'Dummy buku', '3', '300.000', '2020-10-14', 'Semua Siswa SMA', '', 1, 1),
(4, 'dummy seragam', '4', '400.000', '2020-10-14', 'Semua Siswa SMA', '', 1, 1),
(5, 'dummy ektrakulikuler', '5', '500.000', '2020-10-14', 'Semua Siswa SMA', '', 1, 1),
(6, 'dummy wisuda', '6', '600.000', '2020-10-14', 'Semua Siswa SMA', '', 1, 1),
(7, 'dummy spp', '9', '700.000', '2020-10-14', 'Semua Siswa SMA', '', 1, 1),
(8, 'dummy boarding', '8', '700.000', '2020-10-14', 'Semua Siswa SMA', '', 1, 1),
(9, 'dummy biaya', '10', '100.000', '2020-10-14', 'Semua Siswa SMA', '', 1, 1),
(10, 'dummy denda', '11', '200.000', '2020-10-14', 'Semua Siswa SMA', '', 1, 1),
(11, 'dummy tuition', '12', '300.000', '2020-10-14', 'Semua Siswa SMA', '', 1, 1),
(12, 'dummy oversea', '7', '100.000', '2020-10-14', 'Semua Siswa SMA', '', 1, 1),
(14, 'add new', '1', '100.000', '2020-10-14', 'Semua Siswa SMA', '', 1, 1),
(15, 'uang gedung', '2', '500.000', '2020-10-14', 'Semua Siswa SMA', '', 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `template_tagihan`
--

CREATE TABLE `template_tagihan` (
  `id` int(11) NOT NULL,
  `jenjang` varchar(3) NOT NULL,
  `kategori` varchar(10) NOT NULL,
  `tipe` int(1) NOT NULL,
  `tagihan_id` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `template_tagihan`
--

INSERT INTO `template_tagihan` (`id`, `jenjang`, `kategori`, `tipe`, `tagihan_id`) VALUES
(6, 'sma', 'baru', 1, 1),
(7, 'sma', 'baru', 1, 14),
(8, 'sma', 'baru', 1, 2),
(9, 'sma', 'baru', 1, 15),
(10, 'sma', 'baru', 1, 3),
(11, 'sma', 'baru', 1, 4),
(12, 'sma', 'baru', 1, 5),
(13, 'sma', 'baru', 1, 6),
(14, 'sma', 'baru', 1, 12),
(15, 'sma', 'baru', 1, 8),
(16, 'sma', 'baru', 1, 7),
(17, 'sma', 'baru', 1, 9),
(18, 'sma', 'baru', 1, 10),
(19, 'sma', 'baru', 1, 11),
(20, 'sma', 'baru', 0, 1),
(21, 'sma', 'baru', 0, 14),
(22, 'sma', 'baru', 0, 2),
(23, 'sma', 'baru', 0, 15),
(24, 'sma', 'baru', 0, 3),
(25, 'sma', 'baru', 0, 4),
(26, 'sma', 'baru', 0, 5),
(27, 'sma', 'baru', 0, 6),
(28, 'sma', 'baru', 0, 8),
(29, 'sma', 'baru', 0, 9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `hak_akses` varchar(10) DEFAULT NULL,
  `tipe_user` int(1) NOT NULL,
  `no_hp` varchar(15) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `alamat` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `user_id`, `nama`, `username`, `password`, `hak_akses`, `tipe_user`, `no_hp`, `email`, `alamat`) VALUES
(5, 2, 'Desti Angelia', '321', '$2y$10$99R4dqrJGDBHLz5ciSqYJe.UqY8VkrtUa7jgZbkNnMVkRwsyAtCcW', '2', 2, NULL, 'riway.restu@gmail.com', NULL),
(6, NULL, 'Riway Restu Islami Yudha', 'IwayRiway21', '$2y$10$99R4dqrJGDBHLz5ciSqYJe.UqY8VkrtUa7jgZbkNnMVkRwsyAtCcW', '1', 1, NULL, 'riway.restu1@gmail.com', NULL),
(7, 7, 'Dummy', 'dd123', '$2y$10$99R4dqrJGDBHLz5ciSqYJe.UqY8VkrtUa7jgZbkNnMVkRwsyAtCcW', '4', 3, NULL, 'riway.restu@gmail.com', NULL),
(8, 6, 'User', 'user', '$2y$10$RAKvhoBkTYwXnYM3i0rAPe8Fx2e3L4o83IsDEX3tsvqQff5RHg5f.', '2', 2, NULL, 'user@gmail.com', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_ci`
--

CREATE TABLE `user_ci` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `hak_akses` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_ci`
--

INSERT INTO `user_ci` (`id`, `nama`, `username`, `email`, `password`, `hak_akses`) VALUES
(1, 'Riway Restu Islami Yudha', 'iwayriway21', 'riway.restu@gmail.com', '$2y$10$SN98BFpatyml6S7Yox3yQuOxMlnzE6IKJboRrbCRWLqfixGCQLb.2', 1),
(3, 'User', 'user', 'user@gmail.com', '$2y$10$gTk7x9L4WDeH1lmR3WhCm.lnpgGFvY7FhF3X9sZJJtC9CfeMNtK62', 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `accesses`
--
ALTER TABLE `accesses`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `akses_ci`
--
ALTER TABLE `akses_ci`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_tagihan_sma`
--
ALTER TABLE `data_tagihan_sma`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `divisi`
--
ALTER TABLE `divisi`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `dormitory`
--
ALTER TABLE `dormitory`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `gurus`
--
ALTER TABLE `gurus`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `jadwals`
--
ALTER TABLE `jadwals`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jadwal_gurus`
--
ALTER TABLE `jadwal_gurus`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jadwal_siswas`
--
ALTER TABLE `jadwal_siswas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jam_pelajarans`
--
ALTER TABLE `jam_pelajarans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `kategori_pembayaran`
--
ALTER TABLE `kategori_pembayaran`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `mapels`
--
ALTER TABLE `mapels`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `marketer`
--
ALTER TABLE `marketer`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `orang_tua`
--
ALTER TABLE `orang_tua`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `pembayaran_sma`
--
ALTER TABLE `pembayaran_sma`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `registration_sma`
--
ALTER TABLE `registration_sma`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `role_accesses`
--
ALTER TABLE `role_accesses`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `nisn` (`nisn`) USING BTREE;

--
-- Indeks untuk tabel `siswa_sma`
--
ALTER TABLE `siswa_sma`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `tagihan_sma`
--
ALTER TABLE `tagihan_sma`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `template_tagihan`
--
ALTER TABLE `template_tagihan`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`) USING BTREE;

--
-- Indeks untuk tabel `user_ci`
--
ALTER TABLE `user_ci`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `accesses`
--
ALTER TABLE `accesses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT untuk tabel `akses_ci`
--
ALTER TABLE `akses_ci`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT untuk tabel `data_tagihan_sma`
--
ALTER TABLE `data_tagihan_sma`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT untuk tabel `divisi`
--
ALTER TABLE `divisi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `dormitory`
--
ALTER TABLE `dormitory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `gurus`
--
ALTER TABLE `gurus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jadwals`
--
ALTER TABLE `jadwals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `jadwal_gurus`
--
ALTER TABLE `jadwal_gurus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT untuk tabel `jadwal_siswas`
--
ALTER TABLE `jadwal_siswas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `jam_pelajarans`
--
ALTER TABLE `jam_pelajarans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `kamar`
--
ALTER TABLE `kamar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kategori_pembayaran`
--
ALTER TABLE `kategori_pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `mapels`
--
ALTER TABLE `mapels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `marketer`
--
ALTER TABLE `marketer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `orang_tua`
--
ALTER TABLE `orang_tua`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `pembayaran_sma`
--
ALTER TABLE `pembayaran_sma`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT untuk tabel `registration_sma`
--
ALTER TABLE `registration_sma`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `reports`
--
ALTER TABLE `reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `role_accesses`
--
ALTER TABLE `role_accesses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tagihan_sma`
--
ALTER TABLE `tagihan_sma`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `template_tagihan`
--
ALTER TABLE `template_tagihan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `user_ci`
--
ALTER TABLE `user_ci`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
