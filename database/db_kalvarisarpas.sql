-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Jul 2023 pada 02.45
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kalvarisarpas`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_akses`
--

CREATE TABLE `log_akses` (
  `id_log` int(11) NOT NULL,
  `id_user` varchar(10) NOT NULL,
  `tanggal_log` datetime NOT NULL,
  `activity_log` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `log_akses`
--

INSERT INTO `log_akses` (`id_log`, `id_user`, `tanggal_log`, `activity_log`) VALUES
(142, 'ADM001', '2023-06-22 14:40:19', 'login'),
(143, 'JUVE123', '2023-06-22 16:11:17', 'login'),
(144, 'ADM001', '2023-06-22 16:18:12', 'login'),
(145, 'OPR001', '2023-06-24 15:10:46', 'login'),
(146, 'OPR001', '2023-06-24 16:07:26', 'login'),
(147, 'ADM001', '2023-06-24 16:07:57', 'login'),
(148, 'OPR001', '2023-06-25 01:50:11', 'login'),
(149, 'ADM001', '2023-06-25 02:02:02', 'login'),
(150, 'US001', '2023-06-25 02:06:35', 'login'),
(151, 'OPR001', '2023-06-25 02:42:55', 'login'),
(152, 'ADM001', '2023-06-25 02:43:01', 'login'),
(153, 'ADM001', '2023-06-25 20:09:09', 'login'),
(154, 'OPR001', '2023-06-25 20:09:20', 'login'),
(155, 'ADM001', '2023-06-25 20:12:12', 'login'),
(156, 'ADMIN', '2023-06-25 20:30:15', 'login'),
(157, 'ADMIN', '2023-06-25 20:32:00', 'login'),
(158, 'OPR001', '2023-06-25 23:46:15', 'login'),
(159, 'OPR001', '2023-06-26 00:43:22', 'login'),
(160, 'ADMIN', '2023-06-26 01:18:21', 'login'),
(161, 'ADMIN', '2023-06-26 09:54:07', 'login'),
(162, 'OPR001', '2023-06-26 11:58:19', 'login'),
(163, 'ADMIN', '2023-06-26 18:09:47', 'login'),
(164, 'SUPER', '2023-06-26 18:11:11', 'login'),
(165, 'SUPER', '2023-06-27 10:54:56', 'login'),
(166, 'SUPER', '2023-06-27 10:59:47', 'login'),
(167, 'SUPER', '2023-06-27 13:05:23', 'login'),
(168, 'ADMIN', '2023-06-27 13:08:04', 'login'),
(169, 'ADMIN', '2023-06-27 13:09:28', 'login'),
(170, 'ADMIN', '2023-06-27 13:10:24', 'login'),
(171, 'ADMIN', '2023-06-27 13:24:36', 'login'),
(172, 'US001', '2023-06-27 13:32:52', 'login'),
(173, 'OPR001', '2023-07-04 12:05:28', 'login'),
(174, 'ADMIN', '2023-07-04 12:38:00', 'login'),
(175, 'ADM001', '2023-07-08 14:31:23', 'login'),
(176, 'OPR001', '2023-07-08 15:05:00', 'login'),
(177, 'ADM001', '2023-07-15 08:19:04', 'login'),
(178, 'ANG001', '2023-07-15 08:28:11', 'login'),
(179, 'KET001', '2023-07-15 08:35:35', 'login'),
(180, 'PMJ001', '2023-07-15 08:40:27', 'login');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_barang`
--

CREATE TABLE `tbl_barang` (
  `id` int(11) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `kd_barang` varchar(25) NOT NULL,
  `tanggal_pembukuan` date NOT NULL,
  `keterangan` varchar(20) NOT NULL,
  `satuan` varchar(10) NOT NULL,
  `asal_perolehan` varchar(10) NOT NULL,
  `tanggal_perolehan` date NOT NULL,
  `kondisi_barang` varchar(20) NOT NULL,
  `jumlah_satuan` int(11) NOT NULL,
  `harga_satuan` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `lokasi` varchar(25) NOT NULL,
  `status` varchar(25) NOT NULL,
  `keterangan_lainnya` text NOT NULL,
  `foto` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_barang`
--

INSERT INTO `tbl_barang` (`id`, `nama_barang`, `kategori`, `kd_barang`, `tanggal_pembukuan`, `keterangan`, `satuan`, `asal_perolehan`, `tanggal_perolehan`, `kondisi_barang`, `jumlah_satuan`, `harga_satuan`, `total`, `lokasi`, `status`, `keterangan_lainnya`, `foto`) VALUES
(4, 'Meja Operator LCD', 'Alat Sakramen Ibadah', 'B.9.290 - 337', '2020-10-01', 'Kayu', 'unit', 'APBJ', '2014-03-04', 'Baik', 1, 150000, 150000, 'Pastori 1', 'Aktif', '-', '647488ec15e6d.jpg'),
(5, 'Mic Krezt', 'Sound System, Alat Audio Visual', 'B.2.220 - 13', '2011-12-02', 'Krezt', 'buah', 'APBJ', '2014-05-28', 'Baik', 1, 375000, 375000, 'Gedung Gereja', 'Aktif', '-', '64748bca96f37.jpg'),
(7, 'Printer', 'Peralatan Kantor (termasuk Laptop, Printer, dll)', 'B.1.210 -  9', '2020-10-01', 'Epson L110', 'unit', 'APBJ', '2014-05-13', 'Baik', 1, 1750000, 1750000, 'Pastori 1', 'Aktif', '-', '647af67a487a4.png'),
(10, 'Kipas Angin', 'Perabot', 'B.9.290 - 340', '2020-10-01', '-', 'buah', 'Konven', '2014-05-20', 'Rusak ringan', 1, 350000, 350000, 'Pastori 1', 'Aktif', '-', '649866729748c.png'),
(11, 'Kipas Angin', 'Perabot', 'B.9.290 - 341', '2020-10-01', 'Maspion', 'buah', 'APBJ', '2014-05-21', 'Baik', 1, 385000, 385000, 'Gedung Gereja', 'Aktif', '-', '647afb3a3b2d3.png'),
(13, 'Mic Wireless', 'Sound System, Alat Audio Visual', 'B.2.220 - 14', '2020-10-01', '-', 'buah', 'APBJ', '2014-05-28', 'Baik', 1, 675000, 675000, 'Gedung Gereja', 'Aktif', '-', '647afcf7d5e77.png'),
(14, 'Kain Gorden', 'Perabot', 'B.9.290 - 342', '2020-10-01', 'warna hijau', 'set', 'APBJ', '2014-05-28', 'Baik', 1, 15100000, 15100000, 'Gedung Gereja', 'Aktif', '-', '647afd6a7f017.png'),
(15, 'Laptop', 'Peralatan Kantor (termasuk Laptop, Printer, dll)', 'B.1.210 -  12', '2014-10-01', 'Toshiba C40A 14 Inch', 'unit', 'APBJ', '2014-06-26', 'Baik', 1, 5650000, 5650000, 'Kantor gereja', 'Aktif', '-', '647b011f44933.jpg'),
(16, 'Lemari Makan', 'Perabot', 'B.9.290 - 343', '2020-10-01', 'Kayu', 'unit', 'APBJ', '2014-10-13', 'Baik', 1, 2500000, 2500000, 'Pastori 1', 'Aktif', '-', '647b01aabf1b6.png'),
(17, 'Tempat Berlutut Nikah', 'Alat Sakramen Ibadah', 'B.5.250 - 4', '2014-10-01', 'Kayu', 'unit', 'APBJ', '2014-10-13', 'Baik', 1, 1250000, 1250000, 'Gedung Gereja', 'Aktif', '-', '647b026d2e06c.png'),
(18, 'Lemari KL', 'Perabot', 'B.9.290 - 1', '2020-10-01', '-', 'unit', 'APBJ', '2011-06-22', 'Rusak ringan', 1, 350000, 350000, 'Gedung Gereja', 'Aktif', '-', '647d9cb43b4cd.png'),
(19, 'Sofa', 'Perabot', 'B.9.290 - 10', '2020-10-01', 'Big Pop', 'set', 'APBJ', '2011-06-20', 'Baik', 1, 4500000, 4500000, 'Pastori 1', 'Aktif', '-', '647d9db56b6a2.png'),
(20, 'Meja + Kaki Dispenser', 'Perabot', 'B.9.290 - 11', '2020-10-01', '-', 'set', 'APBJ', '2021-07-16', 'Baik', 1, 500000, 500000, 'Pastori 1', 'Aktif', '-', '647d9ea22c536.png'),
(21, 'Kursi', 'Perabot', 'B.9.290 - 12 s/d 212', '2020-10-01', 'Napoli', 'buah', 'APBJ', '2011-12-16', 'Baik', 200, 50000, 10000000, 'Gedung Gereja', 'Aktif', '-', '647d9fde8b772.png'),
(22, 'Kursi', 'Perabot', 'B.9.290 - 213 s/d 313', '2020-10-01', 'Victoria', 'buah', 'APBJ', '2011-12-27', 'Baik', 100, 47000, 4700000, 'Gedung Gereja', 'Aktif', '-', '647da082e3cca.png'),
(24, 'Meja Biro', 'Perabot', 'B.9.290 - 317', '2020-10-01', 'Toppan', 'unit', 'APBJ', '2012-03-19', 'Rusak berat', 1, 700000, 700000, 'Pastori 1', 'Tidak aktif', '-', '647da30c7ede3.jpg'),
(25, 'Lemari Pintu Dorong', 'Perabot', 'B.9.290 - 318', '2020-10-01', 'Siantano', 'unit', 'APBJ', '2012-03-19', 'Baik', 1, 2000000, 2000000, 'Gedung Gereja', 'Aktif', '-', '647da4fd5db89.jpg'),
(26, 'Lemari Kayu Jati', 'Perabot', 'B.9.290 - 319', '2020-10-01', '-', 'unit', 'sumbangan', '2012-03-19', 'Baik', 1, 0, 0, 'Gedung Gereja', 'Aktif', '-', '647da6230539c.jpg'),
(27, 'Tatakan Lilin Gandeng warna Emas', 'Alat Sakramen Ibadah', 'B.5.250 - 1', '2013-10-01', 'Besi', 'buah', 'sumbangan', '2012-08-22', 'Baik', 1, 0, 0, 'Gedung Gereja', 'Aktif', '-', '647da79ad1784.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id` int(11) NOT NULL,
  `kode_kategori` varchar(25) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id`, `kode_kategori`, `nama_kategori`) VALUES
(1, 'A.1.110 - ', 'Tanah'),
(2, 'A.2.120 - ', 'Tanaman '),
(4, 'A.4.140 - ', 'Rumah tinggal'),
(5, 'A.5.150 - ', 'Bangunan Lain2'),
(6, 'B.1.210 -  ', 'Peralatan Kantor (termasuk Laptop, Printer, dll)'),
(7, 'B.2.220 - ', 'Sound System, Alat Audio Visual'),
(8, 'B.3.230 - ', 'Alat Olahraga & Kesehatan'),
(9, 'B.4.240 - ', 'Alat Music (kibord, Gitar, dll)'),
(10, 'B.5.250 - ', 'Alat Sakramen Ibadah'),
(11, 'B.6.260 - ', 'Alat Rumah Tangga'),
(12, 'B.7.270 - ', 'Buku Bacaan Perpustakaan'),
(13, 'B.8.280 - ', 'Kendaraan Bermotor'),
(14, 'B.9.290 - ', 'Perabot'),
(15, 'C.300 - ', 'Hewan'),
(16, 'D.400 - ', 'Barang Habis Pakai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_komisi`
--

CREATE TABLE `tbl_komisi` (
  `id` int(11) NOT NULL,
  `kode_komisi` varchar(10) NOT NULL,
  `nama_komisi` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_komisi`
--

INSERT INTO `tbl_komisi` (`id`, `kode_komisi`, `nama_komisi`) VALUES
(1, 'MULMED', 'Multimedia'),
(2, 'PERBEN', 'Perbendaharaan'),
(3, 'SOUND', 'Operator Sound'),
(4, 'KB', 'KAUM BAPAK');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kondisi`
--

CREATE TABLE `tbl_kondisi` (
  `id` int(11) NOT NULL,
  `nama_kondisi` varchar(25) NOT NULL,
  `kd_kondisi` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_kondisi`
--

INSERT INTO `tbl_kondisi` (`id`, `nama_kondisi`, `kd_kondisi`) VALUES
(1, 'Baik', 'K001 '),
(2, 'Rusak berat', 'K003 '),
(3, 'Rusak ringan', 'K002 ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_merk`
--

CREATE TABLE `tbl_merk` (
  `id` int(11) NOT NULL,
  `nama_merk` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_merk`
--

INSERT INTO `tbl_merk` (`id`, `nama_merk`) VALUES
(13, 'asfhkjsfkhas'),
(14, 'sfkfs');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pemeliharaan`
--

CREATE TABLE `tbl_pemeliharaan` (
  `id` int(11) NOT NULL,
  `id_pemeliharaan` varchar(20) NOT NULL,
  `kd_barang` varchar(50) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `keterangan_pemeliharaan` text NOT NULL,
  `interval` int(11) NOT NULL,
  `periode` enum('hari','bulan','tahun') NOT NULL,
  `biaya` int(11) NOT NULL,
  `tanggal_disetujui` datetime NOT NULL,
  `gambar` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pemeliharaan`
--

INSERT INTO `tbl_pemeliharaan` (`id`, `id_pemeliharaan`, `kd_barang`, `nama_barang`, `keterangan_pemeliharaan`, `interval`, `periode`, `biaya`, `tanggal_disetujui`, `gambar`) VALUES
(2, 'PM20230622004', 'B.9.290 - 1', 'Lemari KL', 'perbaikan kaki meja', 2, 'hari', 500000, '2023-06-22 13:08:16', '647d9cb43b4cd.png'),
(3, 'PM20230625005', 'B.9.290 - 317', 'Meja Biro', 'beli kayu untuk perbaiki kaki meja', 5, 'hari', 100000, '2023-06-25 20:28:07', '647da30c7ede3.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_peminjaman`
--

CREATE TABLE `tbl_peminjaman` (
  `id` int(11) NOT NULL,
  `id_peminjaman` varchar(15) NOT NULL,
  `kd_barang` varchar(50) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `jumlah` varchar(11) NOT NULL,
  `nama_peminjam` varchar(50) NOT NULL,
  `no_telp` varchar(12) NOT NULL,
  `keterangan_peminjaman` text NOT NULL,
  `status` enum('pending','sedang dipinjam','sudah dikembalikan') NOT NULL,
  `tanggal_peminjaman` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_peminjaman`
--

INSERT INTO `tbl_peminjaman` (`id`, `id_peminjaman`, `kd_barang`, `nama_barang`, `jumlah`, `nama_peminjam`, `no_telp`, `keterangan_peminjaman`, `status`, `tanggal_peminjaman`) VALUES
(22, 'PJ20230607002', 'B.1.210 -  11', 'Hardisk', '700.000', 'zolla', '081337409423', 'Penyimpanan Konten Youtube', 'sedang dipinjam', '2023-06-07 23:18:38'),
(23, 'PJ20230608005', 'B.9.290 - 12 s/d 212', 'Kursi', '50.000', 'zolla', '081337409423', 'Orang Mati', 'pending', '2023-06-08 01:01:53'),
(24, 'PJ20230607003', 'B.9.290 - 341', 'Kipas Angin', '385.000', 'zolla', '081337409423', 'RAPAT MJH', 'sedang dipinjam', '2023-06-08 01:16:14'),
(25, 'PJ20230619006', 'B.1.210 -  9', 'Printer', '1.750.000', 'Peminjam', '084274724822', 'Print Dokumen gereja', 'sudah dikembalikan', '2023-06-19 10:14:59'),
(26, 'PJ20230625007', 'B.9.290 - 337', 'Meja Operator LCD', '150.000', 'om Ruben', '082147247924', 'untuk keperluan ibadah syukuran', 'sudah dikembalikan', '2023-06-25 20:37:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pengadaan`
--

CREATE TABLE `tbl_pengadaan` (
  `id` int(11) NOT NULL,
  `id_Pengadaan` varchar(50) NOT NULL,
  `komisi` varchar(25) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `harga` varchar(100) NOT NULL,
  `keterangan_usulan` varchar(50) NOT NULL,
  `status_usulan` varchar(50) NOT NULL,
  `tanggal_disetujui` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pengadaan`
--

INSERT INTO `tbl_pengadaan` (`id`, `id_Pengadaan`, `komisi`, `nama_barang`, `harga`, `keterangan_usulan`, `status_usulan`, `tanggal_disetujui`) VALUES
(5, 'UP20230602', 'Perbendaharaan', 'Komputer Rendering', '17000000', 'untuk keperluan pembuatan konten youtube', 'ok', '2023-06-02 12:54:54'),
(6, 'UP20230604002', 'Perbendaharaan', 'Operator LCD', '350000', 'untuk keperluan ibadah kaum bapak', 'ok', '2023-06-05 03:10:43'),
(7, 'UP20230605003', 'Perbendaharaan', 'vhvhjvhjvjh', '6000000', 'jbjbkjbjjk', 'ok', '2023-06-05 03:11:54'),
(8, 'UP20230605004', 'Operator Sound', 'batre', '50000', 'untuk mic', 'ok', '2023-06-10 01:46:33'),
(9, 'UP20230602001', 'Perbendaharaan', 'Komputer Rendering', '17000000', 'untuk keperluan pembuatan konten youtube', 'ok', '2023-06-12 11:36:41'),
(10, 'UP20230604002', 'Perbendaharaan', 'Operator LCD', '350000', 'untuk keperluan ibadah kaum bapak', 'ok', '2023-06-12 12:09:19'),
(12, 'UP20230602001', 'Perbendaharaan', 'Komputer Rendering', '17000000', 'untuk keperluan pembuatan konten youtube', 'ok', '2023-06-24 15:13:30'),
(13, 'UP20230604002', 'Perbendaharaan', 'Operator LCD', '350000', 'untuk keperluan ibadah kaum bapak', 'ok', '2023-06-25 20:01:43'),
(14, 'UP20230625005', 'KAUM BAPAK', 'Printer', '2000000', 'untuk keperluan print dokumen', 'ok', '2023-06-25 20:20:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pengajuan_peminjaman`
--

CREATE TABLE `tbl_pengajuan_peminjaman` (
  `id` int(11) NOT NULL,
  `id_pengajuan` varchar(25) NOT NULL,
  `kd_barang` varchar(30) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `harga` varchar(25) NOT NULL,
  `keterangan_peminjaman` text NOT NULL,
  `nama_peminjam` varchar(50) NOT NULL,
  `no_telp` varchar(12) NOT NULL,
  `status` enum('pending','sedang dipinjam','disetujui','ditolak','sudah dikembalikan') NOT NULL,
  `tanggal_pengajuan` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pengajuan_peminjaman`
--

INSERT INTO `tbl_pengajuan_peminjaman` (`id`, `id_pengajuan`, `kd_barang`, `nama_barang`, `harga`, `keterangan_peminjaman`, `nama_peminjam`, `no_telp`, `status`, `tanggal_pengajuan`) VALUES
(43, 'PJ20230607002', 'Hardisk', 'B.1.210 -  11', '700.000', 'Penyimpanan Konten Youtube', 'zolla', '081337409423', 'sudah dikembalikan', '2023-06-07 17:00:40'),
(44, 'PJ20230607003', 'Kipas Angin', 'B.9.290 - 341', '385.000', 'RAPAT MJH', 'zolla', '081337409423', 'sedang dipinjam', '2023-06-07 18:16:15'),
(45, 'PJ20230607004', 'Lemari Makan', 'B.9.290 - 343', '2.500.000', 'Pemnyimpanan Barang Ibu Pendeta Dhyana', 'zolla', '081337409423', 'ditolak', '2023-06-25 12:35:43'),
(46, 'PJ20230608005', 'Kursi', 'B.9.290 - 12 s/d 212', '50.000', 'Orang Mati', 'zolla', '081337409423', 'disetujui', '2023-06-07 18:29:04'),
(47, 'PJ20230619006', 'Printer', 'B.1.210 -  9', '1.750.000', 'Print Dokumen gereja', 'Peminjam', '084274724822', 'sudah dikembalikan', '2023-06-19 02:15:42'),
(48, 'PJ20230625007', 'Meja Operator LCD', 'B.9.290 - 337', '150.000', 'untuk keperluan ibadah syukuran', 'om Ruben', '082147247924', 'sudah dikembalikan', '2023-06-25 12:38:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pengembalian`
--

CREATE TABLE `tbl_pengembalian` (
  `id` int(11) NOT NULL,
  `id_pengembalian` varchar(15) NOT NULL,
  `kd_barang` varchar(50) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `jumlah` varchar(11) NOT NULL,
  `nama_peminjam` varchar(50) NOT NULL,
  `no_telp` varchar(12) NOT NULL,
  `keterangan_pengembalian` text NOT NULL,
  `status` enum('selesai') NOT NULL,
  `tanggal_kembali` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pengembalian`
--

INSERT INTO `tbl_pengembalian` (`id`, `id_pengembalian`, `kd_barang`, `nama_barang`, `jumlah`, `nama_peminjam`, `no_telp`, `keterangan_pengembalian`, `status`, `tanggal_kembali`) VALUES
(14, 'PJ20230607002', 'B.1.210 -  11', 'Hardisk', '700.000', 'zolla', '081337409423', 'Terima Kasih', 'selesai', '2023-06-07 23:24:48'),
(15, 'PJ20230619006', 'B.1.210 -  9', 'Printer', '1.750.000', 'Peminjam', '084274724822', 'Terima Kasih', 'selesai', '2023-06-19 10:15:42'),
(16, 'PJ20230625007', 'B.9.290 - 337', 'Meja Operator LCD', '150.000', 'om Ruben', '082147247924', 'Terima Kasih', 'selesai', '2023-06-25 20:38:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_penghapusan`
--

CREATE TABLE `tbl_penghapusan` (
  `id` int(11) NOT NULL,
  `kd_penghapusan` varchar(16) NOT NULL,
  `kd_barang` varchar(25) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `keterangan_usulan` text NOT NULL,
  `status_usulan` enum('ok') NOT NULL,
  `tanggal_disetujui` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_penghapusan`
--

INSERT INTO `tbl_penghapusan` (`id`, `kd_penghapusan`, `kd_barang`, `nama_barang`, `keterangan_usulan`, `status_usulan`, `tanggal_disetujui`) VALUES
(5, 'UPH20230621004', 'B.9.290 - 313 s/d 316', 'Meja 1/2 Biro', 'tidak layak dipakai sudah rusak', 'ok', '2023-06-21 22:53:07'),
(6, 'UPH20230625005', 'B.1.210 -  11', 'Hardisk', 'bisektor', 'ok', '2023-06-25 20:23:31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_ruangan`
--

CREATE TABLE `tbl_ruangan` (
  `id` int(11) NOT NULL,
  `nama_ruangan` varchar(50) NOT NULL,
  `kode_ruangan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_ruangan`
--

INSERT INTO `tbl_ruangan` (`id`, `nama_ruangan`, `kode_ruangan`) VALUES
(1, 'Pastori 1', 'R001  '),
(2, 'Pastori 2', 'R002  '),
(3, 'Pastori 3', 'R003'),
(4, 'Gedung Gereja', 'R004'),
(6, 'Kantor gereja', 'R005 '),
(7, 'Gudang', 'R006');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_status`
--

CREATE TABLE `tbl_status` (
  `id` int(11) NOT NULL,
  `kd_status` varchar(10) NOT NULL,
  `nama_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_status`
--

INSERT INTO `tbl_status` (`id`, `kd_status`, `nama_status`) VALUES
(1, 'S001 ', 'Aktif'),
(2, 'S002 ', 'Tidak aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `kd_user` varchar(10) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tempat_lahir` varchar(25) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `no_telp` varchar(12) NOT NULL,
  `alamat` text NOT NULL,
  `level` enum('admin','operator','anggota','peminjam') NOT NULL,
  `foto` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `nama_lengkap`, `kd_user`, `password`, `email`, `tempat_lahir`, `tanggal_lahir`, `no_telp`, `alamat`, `level`, `foto`) VALUES
(1, 'Om Samuel Sing', 'KET001', '202cb962ac59075b964b07152d234b70', 'samuel@gmail.com', 'Kupang', '1999-05-13', '081337409423', 'Waioti', 'admin', '648fa8c4d5ff8.jpg'),
(4, 'Anggota UPP', 'ANG001', 'e10adc3949ba59abbe56e057f20f883e', 'andy@gmail.com', 'MAUMERE', '2021-05-02', '089247247942', 'Waioti', 'operator', '648fa91023fe6.jpg'),
(6, 'Peminjam', 'PMJ001', '202cb962ac59075b964b07152d234b70', 'exel@gmail.com', 'Ende', '1999-02-03', '081937324974', 'batarank', 'peminjam', '646c8b6e66a84.png'),
(13, 'Ardy manoe a', 'OPR002', '202cb962ac59075b964b07152d234b70', 'ruben@gmail.com', 'kupang', '2023-06-19', '08923724724', 'Maumere Jln Teka Iku', 'peminjam', '6498ef65c8d6a.png'),
(14, 'Agly Kedoh', 'SUPER', '202cb962ac59075b964b07152d234b70', 'aglykedoh@gmail.com', 'Kupang', '1999-05-13', '081337409423', 'Jlan Teka IKu', 'admin', '649963c2b9b64.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_usulan_pemeliharaan`
--

CREATE TABLE `tbl_usulan_pemeliharaan` (
  `id` int(11) NOT NULL,
  `id_pemeliharaan` varchar(20) NOT NULL,
  `kd_barang` varchar(50) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `keterangan_pemeliharaan` text NOT NULL,
  `interval` int(11) NOT NULL,
  `periode` enum('hari','bulan','tahun') NOT NULL,
  `biaya` int(11) NOT NULL,
  `tanggal_usulan` datetime NOT NULL,
  `gambar` varchar(64) NOT NULL,
  `status_usulan` enum('pending','ditolak','berhasil dikonfirmasi') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_usulan_pemeliharaan`
--

INSERT INTO `tbl_usulan_pemeliharaan` (`id`, `id_pemeliharaan`, `kd_barang`, `nama_barang`, `keterangan_pemeliharaan`, `interval`, `periode`, `biaya`, `tanggal_usulan`, `gambar`, `status_usulan`) VALUES
(4, 'PM20230622004', 'B.9.290 - 1', 'Lemari KL', 'perbaikan kaki meja', 2, 'hari', 500000, '2023-06-22 13:00:32', '647d9cb43b4cd.png', 'berhasil dikonfirmasi'),
(5, 'PM20230625005', 'B.9.290 - 317', 'Meja Biro', 'beli kayu untuk perbaiki kaki meja', 5, 'hari', 100000, '2023-06-25 20:26:28', '647da30c7ede3.jpg', 'berhasil dikonfirmasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_usulan_pengadaan`
--

CREATE TABLE `tbl_usulan_pengadaan` (
  `id` int(11) NOT NULL,
  `id_usulan` varchar(25) NOT NULL,
  `komisi` varchar(50) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `harga` varchar(50) NOT NULL,
  `keterangan_usulan` text NOT NULL,
  `status_usulan` enum('pending','ditolak','sudah dikonfirmasi') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_usulan_pengadaan`
--

INSERT INTO `tbl_usulan_pengadaan` (`id`, `id_usulan`, `komisi`, `nama_barang`, `harga`, `keterangan_usulan`, `status_usulan`) VALUES
(27, 'UP20230602001', 'Perbendaharaan', 'Komputer Rendering', '17000000', 'untuk keperluan pembuatan konten youtube', 'sudah dikonfirmasi'),
(28, 'UP20230604002', 'Perbendaharaan', 'Operator LCD', '350000', 'untuk keperluan ibadah kaum bapak', 'sudah dikonfirmasi'),
(29, 'UP20230605003', 'Perbendaharaan', 'Camera DSLR', '6000000', 'Live streaming', 'pending'),
(30, 'UP20230605004', 'Operator Sound', 'batre', '50000', 'untuk mic', 'ditolak'),
(31, 'UP20230625005', 'KAUM BAPAK', 'Printer', '2000000', 'untuk keperluan print dokumen', 'sudah dikonfirmasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_usulan_penghapusan`
--

CREATE TABLE `tbl_usulan_penghapusan` (
  `id` int(11) NOT NULL,
  `kd_usulan_penghapusan` varchar(16) NOT NULL,
  `kode_barang` varchar(30) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `keterangan_usulan` text NOT NULL,
  `status_usulan_penghapusan` enum('pending','ditolak','sudah dikonfirmasi') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_usulan_penghapusan`
--

INSERT INTO `tbl_usulan_penghapusan` (`id`, `kd_usulan_penghapusan`, `kode_barang`, `nama_barang`, `keterangan_usulan`, `status_usulan_penghapusan`) VALUES
(4, 'UPH20230621004', 'B.9.290 - 313 s/d 316', 'Meja 1/2 Biro', 'tidak layak dipakai sudah rusak', 'sudah dikonfirmasi'),
(5, 'UPH20230625005', 'B.1.210 -  11', 'Hardisk', 'bisektor', 'sudah dikonfirmasi'),
(6, 'UPH20230626006', '', 'Meja Operator LCD', 'sfsfsfsfs', 'ditolak'),
(7, 'UPH20230626007', 'B.1.210 -  12', 'Laptop', 'sffsfs', 'pending'),
(8, 'UPH20230626008', 'B.5.250 - 4', 'Tempat Berlutut Nikah', 'hfhfhjfhjfhj', 'pending');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `log_akses`
--
ALTER TABLE `log_akses`
  ADD PRIMARY KEY (`id_log`);

--
-- Indeks untuk tabel `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_komisi`
--
ALTER TABLE `tbl_komisi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_kondisi`
--
ALTER TABLE `tbl_kondisi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_merk`
--
ALTER TABLE `tbl_merk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_pemeliharaan`
--
ALTER TABLE `tbl_pemeliharaan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_peminjaman`
--
ALTER TABLE `tbl_peminjaman`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_pengadaan`
--
ALTER TABLE `tbl_pengadaan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_pengajuan_peminjaman`
--
ALTER TABLE `tbl_pengajuan_peminjaman`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_pengembalian`
--
ALTER TABLE `tbl_pengembalian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_penghapusan`
--
ALTER TABLE `tbl_penghapusan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_ruangan`
--
ALTER TABLE `tbl_ruangan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_status`
--
ALTER TABLE `tbl_status`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_usulan_pemeliharaan`
--
ALTER TABLE `tbl_usulan_pemeliharaan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_usulan_pengadaan`
--
ALTER TABLE `tbl_usulan_pengadaan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_usulan_penghapusan`
--
ALTER TABLE `tbl_usulan_penghapusan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `log_akses`
--
ALTER TABLE `log_akses`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=181;

--
-- AUTO_INCREMENT untuk tabel `tbl_barang`
--
ALTER TABLE `tbl_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `tbl_komisi`
--
ALTER TABLE `tbl_komisi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_kondisi`
--
ALTER TABLE `tbl_kondisi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_merk`
--
ALTER TABLE `tbl_merk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `tbl_pemeliharaan`
--
ALTER TABLE `tbl_pemeliharaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_peminjaman`
--
ALTER TABLE `tbl_peminjaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `tbl_pengadaan`
--
ALTER TABLE `tbl_pengadaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `tbl_pengajuan_peminjaman`
--
ALTER TABLE `tbl_pengajuan_peminjaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT untuk tabel `tbl_pengembalian`
--
ALTER TABLE `tbl_pengembalian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `tbl_penghapusan`
--
ALTER TABLE `tbl_penghapusan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tbl_ruangan`
--
ALTER TABLE `tbl_ruangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tbl_status`
--
ALTER TABLE `tbl_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `tbl_usulan_pemeliharaan`
--
ALTER TABLE `tbl_usulan_pemeliharaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tbl_usulan_pengadaan`
--
ALTER TABLE `tbl_usulan_pengadaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `tbl_usulan_penghapusan`
--
ALTER TABLE `tbl_usulan_penghapusan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
