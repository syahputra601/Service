-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2020 at 03:13 PM
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
  `deleted` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=50 ;

--
-- Dumping data for table `antrian`
--

INSERT INTO `antrian` (`id_antrian`, `kode_antrian`, `username`, `tanggal_masuk`, `waktu_masuk`, `tipe_antrian`, `kode_jam_antrian`, `name_file_antrian`, `status`, `token`, `created_at`, `created_by`, `deleted`) VALUES
(39, 'A001', 'admin', '2020-04-26', '19:42:50', 'Bengkel', NULL, NULL, '0', 'adminwYGWd4O9A6', '2020-04-26 12:43:52', 'Created by - Aji Firman Admin (admin)', 1),
(40, 'A002', 'admin', '2020-04-26', '19:43:31', 'Bengkel', NULL, NULL, '0', 'adminAhaFIpwdlT', '2020-04-26 12:43:36', 'Created by - Aji Firman Admin (admin)', 0),
(41, 'A003', 'admin', '2020-04-26', '19:45:55', 'Bengkel', NULL, NULL, '0', 'admini8OfD97g3A', '2020-04-26 12:46:07', 'Created by - Aji Firman Admin (admin)', 0),
(43, 'A004', 'admin', '2020-04-26', '19:52:59', 'Bengkel', NULL, NULL, '0', 'adminOI30s1WgeE', '2020-04-26 12:53:09', 'Created by - Aji Firman Admin (admin)', 0),
(46, 'A005', 'admin', '2020-04-26', '20:19:05', 'Bengkel', NULL, NULL, '0', 'adminIQs8GeFhoq', '2020-04-26 13:19:15', 'Created by - Aji Firman Admin (admin)', 0),
(48, 'B001', 'admin', '2020-04-27', '15:10:29', 'HomeService', 'H2', NULL, '0', 'adminMavWIyPQjV', '2020-04-27 08:10:56', 'Created by - Aji Firman Admin (admin)', 0),
(49, 'B002', 'admin', '2020-04-27', '15:11:26', 'HomeService', 'H1', NULL, '0', 'adminBxFhvjDm46', '2020-04-27 08:12:51', 'Created by - Aji Firman Admin (admin)', 0);

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
  `id_po` int(11) NOT NULL,
  `sku` varchar(8) NOT NULL,
  `qty` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `created_at` int(11) NOT NULL,
  `created_by` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `home_service`
--

CREATE TABLE IF NOT EXISTS `home_service` (
`id_home_service` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `no_hp` varchar(25) NOT NULL,
  `tgl_reservasi` date NOT NULL,
  `waktu_reservasi` time NOT NULL,
  `alamat` text NOT NULL,
  `keluhan` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` text,
  `deleted` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `home_service`
--

INSERT INTO `home_service` (`id_home_service`, `nama`, `no_hp`, `tgl_reservasi`, `waktu_reservasi`, `alamat`, `keluhan`, `created_at`, `created_by`, `deleted`) VALUES
(1, 'firman Syahputra', '08131694879522', '2020-05-02', '01:11:18', 'Tanah sereal 17', 'Tidak bisa di Stater aja', '2020-05-01 11:57:24', 'created by aji', 0),
(2, 'Gina', '0813169487952', '2020-05-01', '17:09:55', 'Tanah Sereal', 'Oli bocor', '2020-05-01 11:42:25', 'Created by - Aji Firman Admin (admin)', 1);

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
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` text,
  `deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
(1, 'SKU-001', 'OLI Honda All Beat', 10, 45000, 1, '2020-05-13', 'SKU-092001', '2020-05-01 09:32:28', 'By aji', 0),
(2, 'SKU-002', 'OLI Yamaha All Beat', 15, 48000, 1, '2020-05-13', 'SKU-092001', '2020-05-01 09:33:07', 'By aji', 0),
(3, 'SKU-003', 'Sobraker Honda all', 0, 90000, 0, '2020-05-24', 'SKU-001201', '2020-05-01 10:11:27', 'Created by - Aji Firman Admin (admin)', 0),
(4, 'SKU-004', 'Testing Sparepart', 12, 88000, 1, '2020-05-04', 'SKU-00120122', '2020-05-01 10:09:55', 'Created by - Aji Firman Admin (admin)', 1);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE IF NOT EXISTS `transaksi` (
  `kd_trx` varchar(8) NOT NULL,
  `tanggal` date NOT NULL,
  `nama_pel` varchar(50) NOT NULL,
  `jenis_service` varchar(100) NOT NULL,
  `total` int(100) NOT NULL,
  `merk_motor` varchar(50) NOT NULL,
  `model` varchar(50) NOT NULL,
  `tipe` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(2, 'Aji Firman Admin', 'admin', 'ajifirman@gmail.com', '1234567', 0, 123321, '919b7f832b4f3a30c629ebd4729d697e43beaa74', '2020-04-12 13:45:46', NULL, '2020-03-14 09:25:22', 'Updated by -  (superadmin)'),
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
MODIFY `id_antrian` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `detail_antrian`
--
ALTER TABLE `detail_antrian`
MODIFY `id_detail_antrian` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `detail_po`
--
ALTER TABLE `detail_po`
MODIFY `id_detail_po` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `home_service`
--
ALTER TABLE `home_service`
MODIFY `id_home_service` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
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
MODIFY `id_po` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `spare_part`
--
ALTER TABLE `spare_part`
MODIFY `id_sparepart` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
