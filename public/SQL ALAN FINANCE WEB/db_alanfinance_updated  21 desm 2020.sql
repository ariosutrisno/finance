-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Des 2020 pada 10.05
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
-- Database: `db_alanfinance`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `hutang`
--

CREATE TABLE `hutang` (
  `idx_hutang` int(11) NOT NULL,
  `user_id` bigint(11) UNSIGNED DEFAULT NULL,
  `idx_kategori` int(11) DEFAULT NULL,
  `hutang_tanggal` date DEFAULT NULL,
  `hutang_jatuh` date DEFAULT NULL,
  `hutang_client` varchar(200) DEFAULT NULL,
  `hutang_deskripsi` varchar(200) DEFAULT NULL,
  `hutang_nominal` varchar(50) DEFAULT NULL,
  `status` enum('aktif','non-aktif') DEFAULT 'aktif',
  `created_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `hutang`
--

INSERT INTO `hutang` (`idx_hutang`, `user_id`, `idx_kategori`, `hutang_tanggal`, `hutang_jatuh`, `hutang_client`, `hutang_deskripsi`, `hutang_nominal`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2020-12-11', '2020-12-18', 'indah', 'saya', '500000', 'aktif', '2020-12-11 14:03:16', '2020-12-11 07:03:16'),
(2, 1, 1, '2020-12-11', '2020-12-19', 'rio', 'fgfh', '1000000', 'aktif', '2020-12-11 13:58:47', '2020-12-11 06:58:47'),
(3, 1, 1, '2020-12-11', '2020-12-30', 'ario', 'oke', '200000', 'aktif', '2020-12-13 13:24:23', NULL),
(4, 1, 1, '2020-12-11', '2020-12-30', 'ario', 'oke', '200000', 'aktif', '2020-12-13 13:25:40', NULL);

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
(3, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(4, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(6, '2016_06_01_000004_create_oauth_clients_table', 1),
(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(8, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(11) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('164e9a03b57c43ef2a8afbe72576d6a3c14411aac4dd393c7be916118db8220a2a0255fff67c4a70', 1, 1, 'sutrisnoario@gmail.com', '[]', 0, '2020-12-17 03:01:29', '2020-12-17 03:01:29', '2021-12-17 10:01:29'),
('cc57ce95f75509e1ddc0ada01d7764d52b05c223cbb4c2b53e0dac3b5b8af029cbb663de9fae03e5', 1, 1, 'sutrisnoario@gmail.com', '[]', 0, '2020-12-17 21:48:48', '2020-12-17 21:48:48', '2021-12-18 04:48:48'),
('e9963c1b6a9bffc0be9aab12ff8735eea22785f6a88a8cf98cb61454afec0a481ac39a60517c296b', 1, 1, 'sutrisnoario@gmail.com', '[]', 0, '2020-12-09 03:35:47', '2020-12-09 03:35:47', '2021-12-09 10:35:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'wK11cdol29hso4TY9e8ZWh5IAU5B1yBm1lqUsH0n', NULL, 'http://localhost', 1, 0, 0, '2020-11-06 01:44:50', '2020-11-06 01:44:50'),
(2, NULL, 'Laravel Password Grant Client', 'neKrnDMe1KQam0W0SwcmRZSfmrDYicYLNQl69Q3R', 'users', 'http://localhost', 0, 1, 0, '2020-11-06 01:44:50', '2020-11-06 01:44:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2020-11-06 01:44:50', '2020-11-06 01:44:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Struktur dari tabel `piutang`
--

CREATE TABLE `piutang` (
  `idx_piutang` int(11) NOT NULL,
  `user_id` bigint(11) UNSIGNED DEFAULT NULL,
  `idx_kategori` int(11) DEFAULT NULL,
  `piutang_tanggal` date DEFAULT NULL,
  `piutang_jatuh` date DEFAULT NULL,
  `piutang_client` varchar(200) DEFAULT NULL,
  `piutang_deskripsi` varchar(200) DEFAULT NULL,
  `piutang_nominal` varchar(200) DEFAULT NULL,
  `status` enum('aktif','non-aktif') DEFAULT 'aktif',
  `created_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `piutang`
--

INSERT INTO `piutang` (`idx_piutang`, `user_id`, `idx_kategori`, `piutang_tanggal`, `piutang_jatuh`, `piutang_client`, `piutang_deskripsi`, `piutang_nominal`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '2020-12-11', '2020-12-30', 'niken', 'bayar utang', '300000', 'aktif', '2020-12-13 13:48:13', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_buku_kas`
--

CREATE TABLE `tbl_buku_kas` (
  `idx_buku_kas` int(11) NOT NULL,
  `id` bigint(11) UNSIGNED DEFAULT NULL,
  `buku_nama` varchar(50) DEFAULT NULL,
  `buku_zonawaktu` varchar(50) DEFAULT NULL,
  `buku_deskripsi` varchar(50) DEFAULT NULL,
  `buku_mata_uang` varchar(50) DEFAULT NULL,
  `buku_saldo_awal` varchar(50) DEFAULT NULL,
  `buku_saldo` varchar(50) DEFAULT NULL,
  `status` enum('aktif','non-aktif') DEFAULT 'aktif',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_catatan_buku`
--

CREATE TABLE `tbl_catatan_buku` (
  `idx_catatan_buku` int(11) NOT NULL,
  `id_user` bigint(20) UNSIGNED DEFAULT NULL,
  `idx_buku_kas` int(11) DEFAULT NULL,
  `idx_kategori` int(11) DEFAULT NULL,
  `idx_sub_kategori` int(11) DEFAULT NULL,
  `idx_piutang` int(11) DEFAULT NULL,
  `idx_hutang` int(11) DEFAULT NULL,
  `catatan_jumlah` varchar(50) DEFAULT NULL,
  `catatan_jam` time DEFAULT NULL,
  `catatan_tgl` date DEFAULT NULL,
  `catatan_keterangan` varchar(50) DEFAULT NULL,
  `status` enum('aktif','non-aktif') DEFAULT 'aktif',
  `created_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_daftar_pelanggan`
--

CREATE TABLE `tbl_daftar_pelanggan` (
  `idx_pelanggan` int(11) NOT NULL,
  `user_id` bigint(11) UNSIGNED DEFAULT NULL,
  `pelanggan_nama` varchar(50) DEFAULT NULL,
  `pelanggan_alamat` varchar(50) DEFAULT NULL,
  `pelanggan_telepon` varchar(50) DEFAULT NULL,
  `pelanggan_email` varchar(50) DEFAULT NULL,
  `perusahaan` varchar(50) DEFAULT NULL,
  `status` enum('aktif','nonaktif') DEFAULT 'aktif',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_daftar_pelanggan`
--

INSERT INTO `tbl_daftar_pelanggan` (`idx_pelanggan`, `user_id`, `pelanggan_nama`, `pelanggan_alamat`, `pelanggan_telepon`, `pelanggan_email`, `perusahaan`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'dimas', 'bekasi', '082210923215', 'dimas@gmail.com', 'PT.ABC', 'aktif', '2020-12-09 15:18:21', NULL),
(2, 1, 'Indah', 'Jakarta Timur', '0876566424', 'indah@gmail.com', 'Astra Honda', 'aktif', '2020-12-10 04:10:23', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_invoice`
--

CREATE TABLE `tbl_invoice` (
  `idx_invoice` int(11) NOT NULL,
  `user_id` bigint(11) UNSIGNED DEFAULT NULL,
  `id_pelanggan` int(11) DEFAULT NULL,
  `tanggal_invoice` date DEFAULT NULL,
  `jatuh_tempo_invoice` date DEFAULT NULL,
  `nomor_surat` varchar(255) DEFAULT NULL,
  `perihal` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `jumlah_tagihan` varchar(255) DEFAULT NULL,
  `status_pembayaran` enum('paid','unpaid') DEFAULT 'unpaid',
  `status` enum('aktif','nonaktif') DEFAULT 'aktif',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_item_project`
--

CREATE TABLE `tbl_item_project` (
  `id_item` int(11) NOT NULL,
  `id_quotation` int(11) DEFAULT NULL,
  `id_invoice` int(11) DEFAULT NULL,
  `nama_project` varchar(50) DEFAULT NULL,
  `biaya_project` varchar(50) DEFAULT NULL,
  `status` enum('aktif','non-aktif') DEFAULT 'aktif',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_item_project`
--

INSERT INTO `tbl_item_project` (`id_item`, `id_quotation`, `id_invoice`, `nama_project`, `biaya_project`, `status`, `created_at`, `updated_at`) VALUES
(4, 1, NULL, 'website1', '2000000', 'aktif', '2020-12-10 20:50:10', '2020-12-10 20:50:10'),
(5, 1, NULL, 'dekstop', '200000', 'aktif', '2020-12-10 20:50:10', '2020-12-10 20:50:10'),
(6, 3, NULL, 'a', '200000', 'aktif', '2020-12-18 01:07:40', '2020-12-18 01:07:40'),
(7, 3, NULL, 'c', '200000', 'aktif', '2020-12-18 01:07:41', '2020-12-18 01:07:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `idx_kategori` int(11) NOT NULL,
  `kategori_nama` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `update_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`idx_kategori`, `kategori_nama`, `created_at`, `update_at`) VALUES
(1, 'pemasukan', '2020-09-30 09:29:44', '2020-09-30 09:29:44'),
(2, 'pengeluaran', '2020-09-30 09:27:36', '2020-09-30 09:27:36');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_offering_letter`
--

CREATE TABLE `tbl_offering_letter` (
  `idx_offering_letter` int(11) NOT NULL,
  `user_id` bigint(11) UNSIGNED DEFAULT NULL,
  `nomor_surat` varchar(50) DEFAULT NULL,
  `letter_nama` varchar(255) DEFAULT NULL,
  `letter_email` varchar(255) DEFAULT NULL,
  `letter_telepon` varchar(255) DEFAULT NULL,
  `letter_alamat` varchar(255) DEFAULT NULL,
  `letter_peruntukan` varchar(50) DEFAULT NULL,
  `letter_tanggal_lamar` date DEFAULT NULL,
  `letter_tanggal_mulai` date DEFAULT NULL,
  `letter_tanggal_selesai` date DEFAULT NULL,
  `letter_jam_mulai` time DEFAULT NULL,
  `letter_jam_selesai` time DEFAULT NULL,
  `letter_narahubung` varchar(255) DEFAULT NULL,
  `letter_telepon_pembimbing` varchar(255) DEFAULT NULL,
  `status` enum('aktif','non-aktif') DEFAULT 'aktif',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_quotation`
--

CREATE TABLE `tbl_quotation` (
  `id_quotation` int(11) NOT NULL,
  `nomor_surat` varchar(50) DEFAULT NULL,
  `perihal` varchar(50) DEFAULT NULL,
  `user_id` bigint(11) UNSIGNED DEFAULT NULL,
  `id_pelanggan` int(11) DEFAULT NULL,
  `tgl_quotation` date DEFAULT NULL,
  `tgl_jatuh_tempo` date DEFAULT NULL,
  `jumlah_pembayaran` varchar(50) DEFAULT NULL,
  `keterangan` varchar(50) DEFAULT NULL,
  `status` enum('aktif','non-aktif') DEFAULT 'aktif',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_quotation`
--

INSERT INTO `tbl_quotation` (`id_quotation`, `nomor_surat`, `perihal`, `user_id`, `id_pelanggan`, `tgl_quotation`, `tgl_jatuh_tempo`, `jumlah_pembayaran`, `keterangan`, `status`, `created_at`, `updated_at`) VALUES
(1, '001/ALAN-D/XII/2020', 'tagihan1', 1, 2, '2020-12-11', '2020-12-12', '2200000', 'tagihan 1', 'aktif', '2020-12-11 02:24:43', '2020-12-10 20:50:10'),
(3, '002/ALAN-C/XII/2020', 'pajak', 1, 1, '2020-12-18', '2020-12-28', '400000', 'yes', 'aktif', '2020-12-18 08:07:39', NULL),
(4, '003/ALAN-D/XII/2020', 'coba', 1, 2, '2020-12-09', '2020-12-30', '400000', 'coba', 'aktif', '2020-12-18 08:39:57', NULL),
(5, '004/ALAN-D/XII/2020', 'coba', 1, 2, '2020-12-09', '2020-12-30', '400000', 'coba', 'aktif', '2020-12-18 08:52:47', NULL),
(6, '005/ALAN-D/XII/2020', 'coba', 1, 2, '2020-12-09', '2020-12-30', '400000', 'coba', 'aktif', '2020-12-18 08:54:12', NULL),
(7, '006/ALAN-D/XII/2020', 'coba', 1, 2, '2020-12-09', '2020-12-30', '400000', 'coba', 'aktif', '2020-12-18 09:45:39', NULL),
(8, '006/ALAN-D/XII/2020', 'coba', 1, 2, '2020-12-09', '2020-12-30', '400000', 'coba', 'aktif', '2020-12-18 09:46:56', NULL),
(9, '006/ALAN-D/XII/2020', 'coba', 1, 2, '2020-12-09', '2020-12-30', '400000', 'coba', 'aktif', '2020-12-18 09:54:01', NULL),
(10, '006/ALAN-D/XII/2020', 'coba', 1, 2, '2020-12-09', '2020-12-30', '400000', 'coba', 'aktif', '2020-12-18 09:54:24', NULL),
(11, '006/ALAN-D/XII/2020', 'coba', 1, 2, '2020-12-09', '2020-12-30', '400000', 'coba', 'aktif', '2020-12-18 09:56:06', NULL),
(12, '006/ALAN-D/XII/2020', 'coba', 1, 2, '2020-12-09', '2020-12-30', '400000', 'coba', 'aktif', '2020-12-18 10:00:50', NULL),
(13, '006/ALAN-D/XII/2020', 'coba', 1, 2, '2020-12-09', '2020-12-30', '400000', 'coba', 'aktif', '2020-12-18 10:01:32', NULL),
(14, '006/ALAN-D/XII/2020', 'coba', 1, 2, '2020-12-09', '2020-12-30', '400000', 'coba', 'aktif', '2020-12-18 10:03:12', NULL),
(15, '006/ALAN-D/XII/2020', 'coba', 1, 2, '2020-12-09', '2020-12-30', '400000', 'coba', 'aktif', '2020-12-18 10:21:26', NULL),
(16, '006/ALAN-D/XII/2020', 'coba', 1, 2, '2020-12-09', '2020-12-30', '400000', 'coba', 'aktif', '2020-12-18 10:22:46', NULL),
(17, '006/ALAN-D/XII/2020', 'coba', 1, 2, '2020-12-09', '2020-12-30', '400000', 'coba', 'aktif', '2020-12-18 10:39:56', NULL),
(18, '006/ALAN-D/XII/2020', 'coba', 1, 2, '2020-12-09', '2020-12-30', '400000', 'coba', 'aktif', '2020-12-18 10:46:02', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_sub_kategori`
--

CREATE TABLE `tbl_sub_kategori` (
  `idx_sub_kat` int(11) NOT NULL,
  `user_id` bigint(11) UNSIGNED DEFAULT NULL,
  `idx_kategori` int(11) DEFAULT NULL,
  `sub_nama` varchar(50) DEFAULT NULL,
  `status` enum('aktif','non-aktif') DEFAULT 'aktif',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_sub_kategori`
--

INSERT INTO `tbl_sub_kategori` (`idx_sub_kat`, `user_id`, `idx_kategori`, `sub_nama`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, 1, 'Penjualan', 'aktif', '2020-12-10 06:04:03', '2020-12-10 06:04:03'),
(2, NULL, 1, 'Pendapatan Jasa', 'aktif', '2020-12-10 06:04:12', NULL),
(3, NULL, 1, 'Komisi/Fee', 'aktif', '2020-12-10 06:04:36', NULL),
(4, NULL, 1, 'Pendapatan Lain - lain', 'aktif', '2020-12-10 06:04:50', NULL),
(5, NULL, 1, 'Penerimaan Piutang', 'aktif', '2020-12-10 06:05:06', '2020-12-10 06:05:06'),
(6, NULL, 1, 'Modal', 'aktif', '2020-12-10 06:05:16', '2020-12-10 06:05:16'),
(7, NULL, 1, 'Hibah', 'aktif', '2020-12-10 06:05:24', NULL),
(8, NULL, 1, 'Pinjaman', 'aktif', '2020-12-10 06:05:35', NULL),
(9, NULL, 2, 'Pembelian Persediaan', 'aktif', '2020-12-10 06:05:47', NULL),
(10, NULL, 2, 'Pembelian Bahan Baku', 'aktif', '2020-12-10 06:05:58', NULL),
(11, NULL, 2, 'Biaya Kemasan', 'aktif', '2020-12-10 06:06:09', NULL),
(12, NULL, 2, 'Beban Ongkos Kirim', 'aktif', '2020-12-10 06:06:22', NULL),
(13, NULL, 2, 'Beban Iklan/Promosi', 'aktif', '2020-12-10 06:06:36', NULL),
(14, NULL, 2, 'Beban Gaji Pegawai', 'aktif', '2020-12-10 06:06:52', NULL),
(15, NULL, 2, 'Beban Gedung', 'aktif', '2020-12-10 06:07:04', NULL),
(16, NULL, 2, 'Beban Lain - lain', 'aktif', '2020-12-10 06:07:20', NULL),
(17, NULL, 2, 'Perlengkapan', 'aktif', '2020-12-10 06:07:28', NULL),
(18, NULL, 2, 'Peralatan', 'aktif', '2020-12-10 06:07:37', NULL),
(19, NULL, 2, 'Investasi', 'aktif', '2020-12-10 06:07:49', NULL),
(20, NULL, 2, 'Pembayaran Utang', 'aktif', '2020-12-10 06:08:02', NULL),
(21, NULL, 2, 'Pengeluaran Pribadi', 'aktif', '2020-12-10 06:08:12', NULL),
(22, NULL, 2, 'Sedekah', 'aktif', '2020-12-10 06:08:21', NULL),
(23, 1, 1, 'gaji bulanan', 'aktif', '2020-12-13 10:59:19', NULL),
(24, 1, 2, 'bayar spp', 'aktif', '2020-12-13 10:59:30', NULL),
(26, 1, 2, 'angsuran motor', 'aktif', '2020-12-13 11:02:36', NULL),
(27, 1, 1, 'gaji harian', 'aktif', '2020-12-13 11:23:47', NULL),
(28, 1, 2, 'makan - makan', 'aktif', '2020-12-13 11:25:40', NULL),
(29, 1, 2, 'makan - makan', 'aktif', '2020-12-13 11:30:42', NULL),
(30, 1, 2, 'makan - makan', 'aktif', '2020-12-13 11:34:23', NULL),
(31, 1, 1, 'THR', 'aktif', '2020-12-13 11:35:43', NULL),
(32, 1, 1, 'THR', 'aktif', '2020-12-13 11:51:06', NULL),
(33, 1, 1, 'THR', 'aktif', '2020-12-13 12:29:38', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_sub_kategori_user`
--

CREATE TABLE `tbl_sub_kategori_user` (
  `idx_user_kategori` int(11) NOT NULL,
  `user_kategori` varchar(50) DEFAULT NULL,
  `status_kategori` enum('pemasukan','pengeluaran') DEFAULT 'pemasukan',
  `status` enum('aktif','non-aktif') DEFAULT 'aktif',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_term`
--

CREATE TABLE `tbl_term` (
  `idx_term` int(11) NOT NULL,
  `id_invoice` int(11) DEFAULT NULL,
  `standar_pembayaran` varchar(50) DEFAULT NULL,
  `Dp` varchar(50) DEFAULT NULL,
  `term` varchar(50) DEFAULT NULL,
  `status` enum('aktif','nonaktif') DEFAULT 'aktif',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(11) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_user` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_user` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `province_user` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city_user` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `api_token` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `address_user`, `company_user`, `province_user`, `city_user`, `email_verified_at`, `password`, `remember_token`, `api_token`, `created_at`, `updated_at`) VALUES
(1, 'ario sutrisno', 'sutrisnoario@gmail.com', NULL, NULL, NULL, NULL, NULL, '$2y$10$dr3JkoQCTXby5Nj6OsYnXeTMWyFedlO3G5O0BmnseeLJL2y9049Tm', NULL, NULL, '2020-12-09 03:34:50', '2020-12-09 03:34:50'),
(2, 'ario', 'ariosutrisno99@gmail.com', NULL, NULL, NULL, NULL, NULL, '$2y$10$QSZfJy0lK12mGTS6D0YM8.MehQE3/MyBsDltKdNFZe8cqoE30EPg.', NULL, NULL, '2020-12-15 23:58:51', '2020-12-15 23:58:51');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `hutang`
--
ALTER TABLE `hutang`
  ADD PRIMARY KEY (`idx_hutang`) USING BTREE,
  ADD KEY `idx_kategori` (`idx_kategori`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indeks untuk tabel `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indeks untuk tabel `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indeks untuk tabel `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `piutang`
--
ALTER TABLE `piutang`
  ADD PRIMARY KEY (`idx_piutang`),
  ADD KEY `idx_kategori` (`idx_kategori`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `tbl_buku_kas`
--
ALTER TABLE `tbl_buku_kas`
  ADD PRIMARY KEY (`idx_buku_kas`),
  ADD KEY `idx_user` (`id`) USING BTREE;

--
-- Indeks untuk tabel `tbl_catatan_buku`
--
ALTER TABLE `tbl_catatan_buku`
  ADD PRIMARY KEY (`idx_catatan_buku`) USING BTREE,
  ADD KEY `id` (`idx_buku_kas`) USING BTREE,
  ADD KEY `idx_piutang` (`idx_piutang`),
  ADD KEY `idx_hutang` (`idx_hutang`),
  ADD KEY `idx_sub_kategori` (`idx_sub_kategori`),
  ADD KEY `idx_kategori` (`idx_kategori`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `tbl_daftar_pelanggan`
--
ALTER TABLE `tbl_daftar_pelanggan`
  ADD PRIMARY KEY (`idx_pelanggan`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `tbl_invoice`
--
ALTER TABLE `tbl_invoice`
  ADD PRIMARY KEY (`idx_invoice`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- Indeks untuk tabel `tbl_item_project`
--
ALTER TABLE `tbl_item_project`
  ADD PRIMARY KEY (`id_item`),
  ADD KEY `id_invoice` (`id_invoice`),
  ADD KEY `id_quotation` (`id_quotation`);

--
-- Indeks untuk tabel `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`idx_kategori`) USING BTREE;

--
-- Indeks untuk tabel `tbl_offering_letter`
--
ALTER TABLE `tbl_offering_letter`
  ADD PRIMARY KEY (`idx_offering_letter`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `tbl_quotation`
--
ALTER TABLE `tbl_quotation`
  ADD PRIMARY KEY (`id_quotation`),
  ADD KEY `id_pelanggan` (`id_pelanggan`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `tbl_sub_kategori`
--
ALTER TABLE `tbl_sub_kategori`
  ADD PRIMARY KEY (`idx_sub_kat`),
  ADD KEY `idx_kategori` (`idx_kategori`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `tbl_sub_kategori_user`
--
ALTER TABLE `tbl_sub_kategori_user`
  ADD PRIMARY KEY (`idx_user_kategori`);

--
-- Indeks untuk tabel `tbl_term`
--
ALTER TABLE `tbl_term`
  ADD PRIMARY KEY (`idx_term`) USING BTREE,
  ADD KEY `id_invoice` (`id_invoice`);

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
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `hutang`
--
ALTER TABLE `hutang`
  MODIFY `idx_hutang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `piutang`
--
ALTER TABLE `piutang`
  MODIFY `idx_piutang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_buku_kas`
--
ALTER TABLE `tbl_buku_kas`
  MODIFY `idx_buku_kas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_catatan_buku`
--
ALTER TABLE `tbl_catatan_buku`
  MODIFY `idx_catatan_buku` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_daftar_pelanggan`
--
ALTER TABLE `tbl_daftar_pelanggan`
  MODIFY `idx_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tbl_invoice`
--
ALTER TABLE `tbl_invoice`
  MODIFY `idx_invoice` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_item_project`
--
ALTER TABLE `tbl_item_project`
  MODIFY `id_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `idx_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_offering_letter`
--
ALTER TABLE `tbl_offering_letter`
  MODIFY `idx_offering_letter` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_quotation`
--
ALTER TABLE `tbl_quotation`
  MODIFY `id_quotation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `tbl_sub_kategori`
--
ALTER TABLE `tbl_sub_kategori`
  MODIFY `idx_sub_kat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `tbl_sub_kategori_user`
--
ALTER TABLE `tbl_sub_kategori_user`
  MODIFY `idx_user_kategori` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_term`
--
ALTER TABLE `tbl_term`
  MODIFY `idx_term` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `hutang`
--
ALTER TABLE `hutang`
  ADD CONSTRAINT `FK_hutang_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hutang_ibfk_1` FOREIGN KEY (`idx_kategori`) REFERENCES `tbl_kategori` (`idx_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `piutang`
--
ALTER TABLE `piutang`
  ADD CONSTRAINT `FK_piutang_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `piutang_ibfk_1` FOREIGN KEY (`idx_kategori`) REFERENCES `tbl_kategori` (`idx_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_buku_kas`
--
ALTER TABLE `tbl_buku_kas`
  ADD CONSTRAINT `FK_tbl_buku_kas_users` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_catatan_buku`
--
ALTER TABLE `tbl_catatan_buku`
  ADD CONSTRAINT `FK_tbl_catatan_buku_hutang` FOREIGN KEY (`idx_hutang`) REFERENCES `hutang` (`idx_hutang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_tbl_catatan_buku_tbl_kategori` FOREIGN KEY (`idx_kategori`) REFERENCES `tbl_kategori` (`idx_kategori`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_tbl_catatan_buku_tbl_sub_kategori` FOREIGN KEY (`idx_sub_kategori`) REFERENCES `tbl_sub_kategori` (`idx_sub_kat`),
  ADD CONSTRAINT `FK_tbl_catatan_buku_users` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_buku_kas` FOREIGN KEY (`idx_buku_kas`) REFERENCES `tbl_buku_kas` (`idx_buku_kas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_catatan_buku_ibfk_1` FOREIGN KEY (`idx_piutang`) REFERENCES `piutang` (`idx_piutang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_daftar_pelanggan`
--
ALTER TABLE `tbl_daftar_pelanggan`
  ADD CONSTRAINT `FK_tbl_daftar_pelanggan_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_invoice`
--
ALTER TABLE `tbl_invoice`
  ADD CONSTRAINT `FK_tbl_invoice_tbl_daftar_pelanggan` FOREIGN KEY (`id_pelanggan`) REFERENCES `tbl_daftar_pelanggan` (`idx_pelanggan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_tbl_invoice_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_item_project`
--
ALTER TABLE `tbl_item_project`
  ADD CONSTRAINT `FK_tbl_item_project_tbl_invoice` FOREIGN KEY (`id_invoice`) REFERENCES `tbl_invoice` (`idx_invoice`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_tbl_item_project_tbl_quotation` FOREIGN KEY (`id_quotation`) REFERENCES `tbl_quotation` (`id_quotation`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_offering_letter`
--
ALTER TABLE `tbl_offering_letter`
  ADD CONSTRAINT `FK_tbl_offering_letter_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_quotation`
--
ALTER TABLE `tbl_quotation`
  ADD CONSTRAINT `FK__tbl_daftar_pelanggan` FOREIGN KEY (`id_pelanggan`) REFERENCES `tbl_daftar_pelanggan` (`idx_pelanggan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_tbl_quotation_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_sub_kategori`
--
ALTER TABLE `tbl_sub_kategori`
  ADD CONSTRAINT `FK_tbl_sub_kategori_tbl_kategori` FOREIGN KEY (`idx_kategori`) REFERENCES `tbl_kategori` (`idx_kategori`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_tbl_sub_kategori_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_term`
--
ALTER TABLE `tbl_term`
  ADD CONSTRAINT `FK_tbl_term_tbl_invoice` FOREIGN KEY (`id_invoice`) REFERENCES `tbl_invoice` (`idx_invoice`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
