-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2020 at 09:31 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `service`
--

-- --------------------------------------------------------

--
-- Table structure for table `antrian`
--

CREATE TABLE IF NOT EXISTS `antrian` (
`id_antrian` int(11) NOT NULL,
  `kode_antrian` varchar(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `tanggal_masuk` date DEFAULT NULL,
  `waktu_masuk` time DEFAULT NULL,
  `tipe_antrian` varchar(50) DEFAULT NULL,
  `kode_jam_antrian` varchar(5) DEFAULT NULL,
  `name_file_antrian` varchar(100) DEFAULT NULL,
  `status` varchar(25) DEFAULT NULL,
  `token` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` text,
  `deleted` int(11) NOT NULL,
  `updated_by` text
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=65 ;

--
-- Dumping data for table `antrian`
--

INSERT INTO `antrian` (`id_antrian`, `kode_antrian`, `username`, `tanggal_masuk`, `waktu_masuk`, `tipe_antrian`, `kode_jam_antrian`, `name_file_antrian`, `status`, `token`, `created_at`, `created_by`, `deleted`, `updated_by`) VALUES
(39, 'A001', 'admin', '2020-04-26', '19:42:50', 'Bengkel', NULL, NULL, '0', 'adminwYGWd4O9A6', '2020-04-26 12:43:52', 'Created by - Aji Firman Admin (admin)', 1, NULL),
(40, 'A002', 'admin', '2020-04-26', '19:43:31', 'Bengkel', NULL, NULL, '0', 'adminAhaFIpwdlT', '2020-04-26 12:43:36', 'Created by - Aji Firman Admin (admin)', 0, NULL),
(41, 'A003', 'admin', '2020-04-26', '19:45:55', 'Bengkel', NULL, NULL, '0', 'admini8OfD97g3A', '2020-04-26 12:46:07', 'Created by - Aji Firman Admin (admin)', 0, NULL),
(43, 'A004', 'admin', '2020-04-26', '19:52:59', 'Bengkel', NULL, NULL, '0', 'adminOI30s1WgeE', '2020-04-26 12:53:09', 'Created by - Aji Firman Admin (admin)', 0, NULL),
(46, 'A005', 'admin', '2020-04-26', '20:19:05', 'Bengkel', NULL, NULL, '0', 'adminIQs8GeFhoq', '2020-04-26 13:19:15', 'Created by - Aji Firman Admin (admin)', 0, NULL),
(48, 'B001', 'admin', '2020-04-27', '15:10:29', 'HomeService', 'H2', NULL, '0', 'adminMavWIyPQjV', '2020-04-27 08:10:56', 'Created by - Aji Firman Admin (admin)', 0, NULL),
(49, 'B002', 'admin', '2020-04-27', '15:11:26', 'HomeService', 'H1', NULL, '0', 'adminBxFhvjDm46', '2020-04-27 08:12:51', 'Created by - Aji Firman Admin (admin)', 0, NULL),
(50, 'B001', 'admin', '2020-05-06', '17:08:42', 'HomeService', 'A1', NULL, '1', 'admin5GuyFrQoLi', '2020-05-06 16:00:35', 'Created by - Aji Firman Admin (admin)', 0, 'Updated Status by - Aji Firman Admin (admin) At 2020-05-06 23:00:35'),
(51, 'B002', 'admin', '2020-05-06', '17:16:31', 'HomeService', 'A1', NULL, '0', 'adminP4oMwaxN89', '2020-05-06 10:16:39', 'Created by - Aji Firman Admin (admin)', 0, NULL),
(52, 'B003', 'admin', '2020-05-06', '17:16:42', 'HomeService', 'A1', NULL, '0', 'adminr6nJYfkKQe', '2020-05-06 10:16:51', 'Created by - Aji Firman Admin (admin)', 0, NULL),
(53, 'B004', 'admin', '2020-05-06', '17:34:27', 'HomeService', 'A2', NULL, '0', 'adminOV4E9jMQHd', '2020-05-06 10:34:36', 'Created by - Aji Firman Admin (admin)', 0, NULL),
(54, 'B005', 'admin', '2020-05-06', '17:34:39', 'HomeService', 'E2', NULL, '0', 'admina71hFo5z9N', '2020-05-06 10:35:14', 'Created by - Aji Firman Admin (admin)', 0, NULL),
(55, 'B006', 'admin', '2020-05-06', '17:35:17', 'HomeService', 'F1', NULL, '0', 'adminAxJmVfIBn5', '2020-05-06 10:35:24', 'Created by - Aji Firman Admin (admin)', 0, NULL),
(56, 'B007', 'admin', '2020-05-06', '17:35:28', 'HomeService', 'F1', NULL, '0', 'adminUER9mGXbYt', '2020-05-06 10:35:42', 'Created by - Aji Firman Admin (admin)', 0, NULL),
(57, 'B008', 'admin', '2020-05-06', '17:36:30', 'HomeService', 'F2', NULL, '0', 'adminjhTP4cGKQM', '2020-05-06 10:36:38', 'Created by - Aji Firman Admin (admin)', 0, NULL),
(58, 'B001', 'admin', '2020-05-07', '01:47:26', 'HomeService', 'A1', NULL, '1', 'adminegq3pkA2XB', '2020-05-06 18:47:46', 'Created by - Aji Firman Admin (admin)', 0, 'Updated Status by - Aji Firman Admin (admin) At 2020-05-07 01:47:46'),
(59, 'B002', 'admin', '2020-05-07', '02:01:09', 'HomeService', 'A1', NULL, '0', 'adminm2K813N4dG', '2020-05-06 19:01:35', 'Created by - Aji Firman Admin (admin)', 0, NULL),
(60, 'B003', 'admin', '2020-05-07', '02:01:55', 'HomeService', 'A1', NULL, '0', 'adminTIVdNgxGa1', '2020-05-06 19:02:06', 'Created by - Aji Firman Admin (admin)', 0, NULL),
(61, 'B004', 'admin', '2020-05-07', '02:13:33', 'HomeService', 'A2', NULL, '0', 'adminjhHpo6S7Dl', '2020-05-06 19:13:58', 'Created by - Aji Firman Admin (admin)', 0, NULL),
(62, 'B005', 'admin', '2020-05-07', '02:15:04', 'HomeService', 'A2', NULL, '0', 'admindwXbtaHmMy', '2020-05-06 19:15:09', 'Created by - Aji Firman Admin (admin)', 0, NULL),
(63, 'B006', 'admin', '2020-05-07', '02:16:34', 'HomeService', 'A2', NULL, '0', 'adminVwTKlqektB', '2020-05-06 19:19:33', 'Created by - Aji Firman Admin (admin)', 0, NULL),
(64, 'B007', 'admin', '2020-05-07', '02:30:39', 'HomeService', 'B1', NULL, '0', 'adminrwmADtpFBI', '2020-05-06 19:30:44', 'Created by - Aji Firman Admin (admin)', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `detail_antrian`
--

CREATE TABLE IF NOT EXISTS `detail_antrian` (
`id_detail_antrian` int(11) NOT NULL,
  `id_antrian` int(11) NOT NULL,
  `kode_jam_antrian` varchar(5) NOT NULL,
  `detail_jam` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `detail_po`
--

CREATE TABLE IF NOT EXISTS `detail_po` (
`id_detail_po` int(11) NOT NULL,
  `nomor_po` varchar(15) DEFAULT NULL,
  `sku` varchar(8) NOT NULL,
  `nama_sparepart` varchar(200) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `total_harga` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` text
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `detail_po`
--

INSERT INTO `detail_po` (`id_detail_po`, `nomor_po`, `sku`, `nama_sparepart`, `qty`, `total_harga`, `created_at`, `created_by`) VALUES
(1, 'PO-001', '1', NULL, 1, NULL, '0000-00-00 00:00:00', ''),
(2, 'PO-001', '3', NULL, 5, NULL, '0000-00-00 00:00:00', ''),
(3, 'PO-002', '3', NULL, 90, NULL, '2020-05-04 14:46:31', 'Created by - Aji Firman Admin (admin)'),
(4, 'PO-004', 'SKU-001', NULL, 2, NULL, '2020-05-04 14:57:13', 'Created by - Aji Firman Admin (admin)'),
(5, 'PO-004', 'SKU-002', NULL, 2, NULL, '2020-05-04 14:57:14', 'Created by - Aji Firman Admin (admin)'),
(6, 'PO-005', 'SKU-002', NULL, 7, NULL, '2020-05-04 15:09:29', 'Created by - Aji Firman Admin (admin)'),
(7, 'PO-006', 'SKU-003', NULL, 7, NULL, '2020-05-04 15:10:08', 'Created by - Aji Firman Admin (admin)'),
(8, 'PO-007', 'SKU-001', NULL, 2, NULL, '2020-05-04 15:49:53', 'Created by - Aji Firman Admin (admin)'),
(9, 'PO-007', 'SKU-002', NULL, 3, NULL, '2020-05-04 15:49:54', 'Created by - Aji Firman Admin (admin)'),
(10, 'PO-007', 'SKU-003', NULL, 4, NULL, '2020-05-04 15:49:54', 'Created by - Aji Firman Admin (admin)'),
(11, 'PO-008', 'SKU-001', 'OLI Honda All Beat', 2, 90000, '2020-05-04 15:52:24', 'Created by - Aji Firman Admin (admin)'),
(12, 'PO-008', 'SKU-002', 'OLI Yamaha All Beat', 3, 144000, '2020-05-04 15:52:24', 'Created by - Aji Firman Admin (admin)'),
(13, 'PO-008', 'SKU-003', 'Sobraker Honda all', 4, 360000, '2020-05-04 15:52:24', 'Created by - Aji Firman Admin (admin)'),
(14, 'PO-009', 'SKU-001', 'OLI Honda All Beat', 5, 225000, '2020-05-05 15:10:36', 'Created by - Aji Firman Admin (admin)'),
(15, 'PO-009', 'SKU-002', 'OLI Yamaha All Beat', 2, 96000, '2020-05-05 15:10:36', 'Created by - Aji Firman Admin (admin)');

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE IF NOT EXISTS `detail_transaksi` (
`id_detail_transaksi` int(11) NOT NULL,
  `no_invoice` varchar(100) DEFAULT NULL,
  `sku` varchar(15) DEFAULT NULL,
  `nama_sparepart` varchar(100) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `total_harga` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` text
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id_detail_transaksi`, `no_invoice`, `sku`, `nama_sparepart`, `qty`, `total_harga`, `created_at`, `created_by`) VALUES
(3, 'INV/2020/IV/0001', '0', 'OLI Honda All Beat', 1, 45000, '2020-05-06 18:03:14', '0'),
(4, 'INV/2020/IV/0001', '0', 'OLI Yamaha All Beat', 1, 48000, '2020-05-06 18:03:14', '0'),
(5, 'INV/2020/IV/0002', 'SKU-001', 'OLI Honda All Beat', 1, 45000, '2020-05-06 18:08:46', 'Created by - Aji Firman Admin (admin)'),
(6, 'INV/2020/IV/0002', 'SKU-002', 'OLI Yamaha All Beat', 1, 48000, '2020-05-06 18:08:46', 'Created by - Aji Firman Admin (admin)'),
(7, 'INV/2020/IV/0002', 'SKU-003', 'Sobraker Honda all', 1, 90000, '2020-05-06 18:08:46', 'Created by - Aji Firman Admin (admin)');

-- --------------------------------------------------------

--
-- Table structure for table `home_service`
--

CREATE TABLE IF NOT EXISTS `home_service` (
`id_home_service` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `no_hp` varchar(25) NOT NULL,
  `tgl_reservasi` date NOT NULL,
  `waktu_reservasi` varchar(10) DEFAULT NULL,
  `alamat` text NOT NULL,
  `keluhan` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` text,
  `deleted` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `home_service`
--

INSERT INTO `home_service` (`id_home_service`, `nama`, `no_hp`, `tgl_reservasi`, `waktu_reservasi`, `alamat`, `keluhan`, `created_at`, `created_by`, `deleted`) VALUES
(1, 'firman Syahputra', '08131694879522', '2020-05-02', '01:11:18', 'Tanah sereal 17', 'Tidak bisa di Stater aja', '2020-05-01 11:57:24', 'created by aji', 0),
(2, 'Gina', '0813169487952', '2020-05-01', '17:09:55', 'Tanah Sereal', 'Oli bocor', '2020-05-01 11:42:25', 'Created by - Aji Firman Admin (admin)', 1),
(3, 'Tini', '081092312', '2020-05-07', '12:10', 'Tanah Sereal', 'Ada aja pokoknya mah', '2020-05-06 14:35:09', 'Created by - Aji Firman Admin (admin)', 0);

-- --------------------------------------------------------

--
-- Table structure for table `mekanik`
--

CREATE TABLE IF NOT EXISTS `mekanik` (
`id_mekanik` int(11) NOT NULL,
  `nip` varchar(8) NOT NULL,
  `nama_mekanik` varchar(50) NOT NULL,
  `tempat_lahir` varchar(200) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk` char(2) NOT NULL,
  `no_hp` varchar(25) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` text,
  `deleted` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `mekanik`
--

INSERT INTO `mekanik` (`id_mekanik`, `nip`, `nama_mekanik`, `tempat_lahir`, `tgl_lahir`, `jk`, `no_hp`, `alamat`, `created_at`, `created_by`, `deleted`) VALUES
(1, 'K-001', 'Aji A', 'Jakarta', '1991-12-20', '1', '2147483647', 'Tanah Sereal', '2020-05-01 06:02:38', 'By aji', 0),
(2, 'K-002', 'Tini B', 'Jakarta', '1991-12-20', '2', '2147483647', 'Jakarta', '2020-05-01 06:10:43', 'by aji', 0),
(3, 'K-003', 'Aji Firman', 'Jakarta barat', '1991-12-21', '1', '08131694879511', 'jakarta barat', '2020-05-01 07:12:37', 'by aji', 0),
(4, 'K-004', 'Gina', 'Jakarta', '2020-05-04', '2', '081316948795', 'asdfas', '2020-05-01 06:53:00', 'Created by - Aji Firman Admin (admin)', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE IF NOT EXISTS `pelanggan` (
`id_pel` int(11) NOT NULL,
  `kode_pel` varchar(8) DEFAULT NULL,
  `username` varchar(25) NOT NULL,
  `nama_pel` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk` char(2) NOT NULL,
  `no_hp` varchar(25) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` text,
  `deleted` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pel`, `kode_pel`, `username`, `nama_pel`, `email`, `tempat_lahir`, `tgl_lahir`, `jk`, `no_hp`, `alamat`, `created_at`, `created_by`, `deleted`) VALUES
(1, 'PL-001', 'dinda', 'Dinda RR', 'dinda@ymail.com', 'jakarta', '1991-12-20', '2', '081316948795', 'jakarta', '2020-05-01 08:06:24', 'Creted by aji', 0),
(2, 'PL-002', 'pelanggan', 'Hany', 'hany@ymail.com', 'jakarta', '1991-12-20', '2', '081316948795', 'jakarta', '2020-05-01 09:15:20', 'Creted by aji', 1),
(4, 'PL-004', 'firman', 'firman Syahputra', 'firman@ymail.com', 'Jakarta barat', '2020-05-03', '1', '081316948799122', 'hanura III Barat', '2020-05-01 09:10:52', 'Created by - Aji Firman Admin (admin)', 0);

-- --------------------------------------------------------

--
-- Table structure for table `penitipan_motor`
--

CREATE TABLE IF NOT EXISTS `penitipan_motor` (
`id_penitipan` int(11) NOT NULL,
  `no_penitipan` varchar(8) NOT NULL,
  `no_kendaraan` varchar(50) NOT NULL,
  `nama_pemilik` varchar(50) NOT NULL,
  `no_telp` varchar(25) NOT NULL,
  `nama_penerima` varchar(100) NOT NULL,
  `tgl_penitipan` date NOT NULL,
  `tgl_ambil` date NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` text,
  `deleted` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `penitipan_motor`
--

INSERT INTO `penitipan_motor` (`id_penitipan`, `no_penitipan`, `no_kendaraan`, `nama_pemilik`, `no_telp`, `nama_penerima`, `tgl_penitipan`, `tgl_ambil`, `status`, `created_at`, `created_by`, `deleted`) VALUES
(1, 'P001', 'B 11IJ90', 'Shinta', '0892910033', 'Oktaria', '2020-05-03', '2020-05-04', 0, '2020-05-01 13:02:51', 'Created by aji', 0);

-- --------------------------------------------------------

--
-- Table structure for table `po`
--

CREATE TABLE IF NOT EXISTS `po` (
`id_po` int(11) NOT NULL,
  `nomor_po` varchar(8) NOT NULL,
  `tanggal_po` date NOT NULL,
  `nama_po` varchar(100) NOT NULL,
  `keterangan` text,
  `status` int(11) NOT NULL,
  `total` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` text,
  `deleted` int(11) NOT NULL,
  `deleted_by` text
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `po`
--

INSERT INTO `po` (`id_po`, `nomor_po`, `tanggal_po`, `nama_po`, `keterangan`, `status`, `total`, `created_at`, `created_by`, `deleted`, `deleted_by`) VALUES
(1, 'PO-001', '2020-05-04', 'Testing', 'Hanya testing aja ko bro', 0, 495000, '2020-05-04 15:04:30', '', 1, 'Deleted by - Aji Firman Admin (admin) AT2020-05-04 22:04:30'),
(2, 'PO-002', '2020-05-04', 'Testing 2', 'Hanya testing 2 aja ko bro', 0, 8100000, '2020-05-04 14:46:31', 'Created by - Aji Firman Admin (admin)', 0, NULL),
(3, 'PO-003', '2020-05-04', 'Testing 4', 'Testing 4', 0, 270000, '2020-05-04 14:56:40', 'Created by - Aji Firman Admin (admin)', 0, NULL),
(4, 'PO-004', '2020-05-04', 'Testing 4', 'Testing 4', 0, 186000, '2020-05-04 14:57:13', 'Created by - Aji Firman Admin (admin)', 0, NULL),
(5, 'PO-005', '2020-05-04', 'asdfsa', 'asdfsa sadf ', 0, 336000, '2020-05-04 15:09:28', 'Created by - Aji Firman Admin (admin)', 0, NULL),
(6, 'PO-006', '2020-05-11', 'sadfa sadf', 'fasdfsa', 0, 630000, '2020-05-04 15:10:08', 'Created by - Aji Firman Admin (admin)', 0, NULL),
(7, 'PO-007', '2020-05-04', 'asdf asd', 'hahaha haha', 0, 594000, '2020-05-04 15:49:53', 'Created by - Aji Firman Admin (admin)', 0, NULL),
(8, 'PO-008', '2020-05-05', 'sadf asdfsa', 'gagagag', 0, 594000, '2020-05-04 15:52:24', 'Created by - Aji Firman Admin (admin)', 0, NULL),
(9, 'PO-009', '2020-05-04', 'TEsting malam', 'Malam', 0, 321000, '2020-05-05 15:10:36', 'Created by - Aji Firman Admin (admin)', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `relasi_ms`
--

CREATE TABLE IF NOT EXISTS `relasi_ms` (
  `nik` varchar(8) NOT NULL,
  `id_sparepart` varchar(8) NOT NULL,
  `ket` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `spare_part`
--

CREATE TABLE IF NOT EXISTS `spare_part` (
`id_sparepart` int(11) NOT NULL,
  `sku` varchar(8) DEFAULT NULL,
  `nama_sparepart` varchar(50) NOT NULL,
  `qty` int(10) NOT NULL,
  `harga` int(100) NOT NULL,
  `status` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `sku_suplier` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` text,
  `deleted` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `spare_part`
--

INSERT INTO `spare_part` (`id_sparepart`, `sku`, `nama_sparepart`, `qty`, `harga`, `status`, `tanggal`, `sku_suplier`, `created_at`, `created_by`, `deleted`) VALUES
(1, 'SKU-001', 'OLI Honda All Beat', 80, 45000, 1, '2020-05-13', 'SKU-092001', '2020-05-06 17:47:22', 'By aji', 0),
(2, 'SKU-002', 'OLI Yamaha All Beat', 50, 48000, 1, '2020-05-13', 'SKU-092001', '2020-05-06 17:47:26', 'By aji', 0),
(3, 'SKU-003', 'Sobraker Honda all', 60, 90000, 0, '2020-05-24', 'SKU-001201', '2020-05-06 17:47:30', 'Created by - Aji Firman Admin (admin)', 0),
(4, 'SKU-004', 'Testing Sparepart', 45, 88000, 1, '2020-05-04', 'SKU-00120122', '2020-05-06 17:47:36', 'Created by - Aji Firman Admin (admin)', 1);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE IF NOT EXISTS `transaksi` (
`id_transaksi` int(11) NOT NULL,
  `no_invoice` varchar(50) DEFAULT NULL,
  `tanggal` date NOT NULL,
  `no_nota` int(11) NOT NULL,
  `nama_pel` varchar(50) NOT NULL,
  `jenis_service` varchar(100) NOT NULL,
  `nip` varchar(15) NOT NULL,
  `biaya_jasa` int(11) NOT NULL,
  `keterangan` text,
  `merk_motor` varchar(100) DEFAULT NULL,
  `model_motor` varchar(100) DEFAULT NULL,
  `tipe_motor` varchar(100) DEFAULT NULL,
  `total` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `kode_antrian` varchar(15) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` text,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` text
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `no_invoice`, `tanggal`, `no_nota`, `nama_pel`, `jenis_service`, `nip`, `biaya_jasa`, `keterangan`, `merk_motor`, `model_motor`, `tipe_motor`, `total`, `status`, `kode_antrian`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(3, 'INV/2020/IV/0001', '2020-05-07', 1234, 'Firman', 'ServiceUmum', 'K-001', 100000, 'Hanya Service umum saja dengan ganti oli.', 'Honda', 'Matic', '123NV', 193000, 0, 'B001', '2020-05-06 18:03:14', 'Created by - Aji Firman Admin (admin)', NULL, NULL),
(4, 'INV/2020/IV/0002', '2020-05-07', 1222, 'Firman', 'ServiceUmum', 'K-001', 200000, 'Hanya Ganti Oli Mesin.', 'Honda', 'Matic', '1212IC', 383000, 0, 'B001', '2020-05-06 18:08:46', 'Created by - Aji Firman Admin (admin)', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Username` varchar(50) NOT NULL DEFAULT '',
  `Emailaddress` varchar(50) DEFAULT NULL,
  `Password` varchar(50) NOT NULL,
  `Role` int(11) NOT NULL,
  `acess_key` int(11) DEFAULT NULL,
  `Address` varchar(250) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` text,
  `updated_at` text,
  `updated_by` text
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `Name`, `Username`, `Emailaddress`, `Password`, `Role`, `acess_key`, `Address`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'Syahputra Mekanik', 'pemilik', 'syahputra@gmail.com', '1234567', 1, 123321, '', '2020-04-24 14:21:12', NULL, '2020-03-14 09:24:56', 'Updated by -  (superadmin)'),
(2, 'Aji Firman Admin', 'admin', 'ajifirman2@gmail.com', '1234567', 0, 123321, '919b7f832b4f3a30c629ebd4729d697e43beaa74', '2020-05-02 00:23:20', NULL, '2020-03-14 09:25:22', 'Updated by -  (superadmin)'),
(3, 'Aji Kasir', 'pelanggan', 'firmanaji601@mail.com', '1234567', 2, 1234, NULL, '2020-04-24 14:21:34', 'Created by - Administrator (admin)', '2020-03-14 09:47:35', 'Updated by -  (admin)'),
(4, 'Aji Kasir test', 'pelanggan', 'firmanaji601@mail.com', '1234567', 2, 1234, NULL, '2020-04-24 14:21:34', 'Created by - Administrator (admin)', '2020-03-14 09:47:35', 'Updated by -  (admin)'),
(5, 'Dinda R', 'dinda', NULL, '1234567', 2, NULL, NULL, '2020-05-01 07:49:04', 'Created by Form Register', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `antrian`
--
ALTER TABLE `antrian`
 ADD PRIMARY KEY (`id_antrian`), ADD UNIQUE KEY `id_antrian` (`id_antrian`);

--
-- Indexes for table `detail_antrian`
--
ALTER TABLE `detail_antrian`
 ADD PRIMARY KEY (`id_detail_antrian`);

--
-- Indexes for table `detail_po`
--
ALTER TABLE `detail_po`
 ADD PRIMARY KEY (`id_detail_po`);

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
 ADD PRIMARY KEY (`id_detail_transaksi`);

--
-- Indexes for table `home_service`
--
ALTER TABLE `home_service`
 ADD PRIMARY KEY (`id_home_service`);

--
-- Indexes for table `mekanik`
--
ALTER TABLE `mekanik`
 ADD PRIMARY KEY (`id_mekanik`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
 ADD PRIMARY KEY (`id_pel`);

--
-- Indexes for table `penitipan_motor`
--
ALTER TABLE `penitipan_motor`
 ADD PRIMARY KEY (`id_penitipan`);

--
-- Indexes for table `po`
--
ALTER TABLE `po`
 ADD PRIMARY KEY (`id_po`);

--
-- Indexes for table `spare_part`
--
ALTER TABLE `spare_part`
 ADD PRIMARY KEY (`id_sparepart`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
 ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `antrian`
--
ALTER TABLE `antrian`
MODIFY `id_antrian` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=65;
--
-- AUTO_INCREMENT for table `detail_antrian`
--
ALTER TABLE `detail_antrian`
MODIFY `id_detail_antrian` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `detail_po`
--
ALTER TABLE `detail_po`
MODIFY `id_detail_po` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
MODIFY `id_detail_transaksi` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `home_service`
--
ALTER TABLE `home_service`
MODIFY `id_home_service` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `mekanik`
--
ALTER TABLE `mekanik`
MODIFY `id_mekanik` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
MODIFY `id_pel` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `penitipan_motor`
--
ALTER TABLE `penitipan_motor`
MODIFY `id_penitipan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `po`
--
ALTER TABLE `po`
MODIFY `id_po` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `spare_part`
--
ALTER TABLE `spare_part`
MODIFY `id_sparepart` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
