-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2017 at 06:29 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `storedb_rpl`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` varchar(5) NOT NULL,
  `id_penjual` varchar(5) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jenis` varchar(30) NOT NULL,
  `harga` int(30) NOT NULL,
  `stock` varchar(30) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `gambar` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `id_penjual`, `nama`, `jenis`, `harga`, `stock`, `keterangan`, `gambar`) VALUES
('00001', 'pen01', 'Cabai', 'rempah-rempah', 6000, '15', 'baik', 'cabai.jpg'),
('00002', 'pen01', 'Ayam', 'daging', 50000, '23', 'baik', 'daging-ayam-dipasar-banjar.jpg'),
('00003', 'pen01', 'Wortel', 'sayur-sayuran', 10000, '45', 'baik', 'wortel.jpg'),
('00004', 'pen01', 'Bawang Putih', 'rempah-rempah', 5000, '15', 'baik', 'bwg-putih2.jpg'),
('00005', 'pen01', 'Ikan Tuna', 'daging', 30000, '19', 'baik', '20423-pindang-kepala-ikan-tongkol.jpg'),
('00006', 'pen01', 'Bumbu Royco', 'lain-lainnya', 2000, '3', 'baik', 'mg_7162.jpg'),
('00007', 'pen01', 'Tomat', 'sayur-sayuran', 12000, '59', 'baik', '1058-784303-15-Feb.jpg'),
('00008', 'pen01', 'Bayam', 'sayur-sayuran', 3000, '41', 'baik', 'bayam.jpg'),
('00009', 'pen01', 'Kecap Bango', 'lain-lainnya', 4000, '0', 'baik', 'kecap-bango_20160722_163612.jpg'),
('00010', 'pen02', 'Kecap Bango', 'lain-lainnya', 3000, '12', 'baik', 'kecap-bango_20160722_163612.jpg'),
('00011', 'pen02', 'Ayam', 'daging', 50000, '40', 'baik', 'daging-ayam-dipasar-banjar.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pembeli`
--

CREATE TABLE `pembeli` (
  `id_pembeli` varchar(5) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `no_hp` int(12) NOT NULL,
  `plat_kendaraan` varchar(10) DEFAULT NULL,
  `jenis_kendaraan` varchar(10) DEFAULT NULL,
  `tarif` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembeli`
--

INSERT INTO `pembeli` (`id_pembeli`, `password`, `nama`, `alamat`, `no_hp`, `plat_kendaraan`, `jenis_kendaraan`, `tarif`) VALUES
('abcd1', '1234', 'fuad', 'darusaalam', 2147483647, 'Tidak ada', 'Tidak Ada', 0),
('abcd2', '1234', 'taufik', 'tanjung pura', 2147483647, 'bl 1234 ag', 'mobil', 2000),
('ira10', '123', 'Ira Sartika', 'darussalam', 2147483647, 'BL205CH', 'motor', 1000),
('nina1', '123', 'nina', 'Seutui', 2147483647, '3526', 'mobil', 2000),
('saf10', '12', 'safrul huda', 'darussalam', 2147483647, 'Tidak ada', 'Tidak Ada', 0);

-- --------------------------------------------------------

--
-- Table structure for table `penjual`
--

CREATE TABLE `penjual` (
  `id_penjual` varchar(5) NOT NULL,
  `password` varchar(15) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `toko` varchar(20) NOT NULL,
  `no_hp` bigint(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjual`
--

INSERT INTO `penjual` (`id_penjual`, `password`, `nama`, `toko`, `no_hp`) VALUES
('pen01', 'safrul', 'safrul huda', '1', 82360937399),
('pen02', 'setia', 'Setia Masyitah', '2', 82360937392);

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pembeli` varchar(5) NOT NULL,
  `id_barang` varchar(5) NOT NULL,
  `jumlah` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id_pembeli`, `id_barang`, `jumlah`) VALUES
('nina1', '00005', 4),
('abcd2', '00005', 1),
('abcd2', '00002', 2),
('abcd2', '00004', 10);

--
-- Triggers `pesanan`
--
DELIMITER $$
CREATE TRIGGER `rekap_pesanan` AFTER DELETE ON `pesanan` FOR EACH ROW INSERT INTO rekapitulasi VALUES (OLD.id_pembeli,OLD.id_barang,OLD.jumlah)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_stock` AFTER INSERT ON `pesanan` FOR EACH ROW UPDATE barang SET stock=stock-NEW.jumlah WHERE id_barang=NEW.id_barang
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `rekapitulasi`
--

CREATE TABLE `rekapitulasi` (
  `id_pembeli` varchar(5) NOT NULL,
  `id_barang` varchar(5) NOT NULL,
  `jumlah` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rekapitulasi`
--

INSERT INTO `rekapitulasi` (`id_pembeli`, `id_barang`, `jumlah`) VALUES
('saf10', '00007', 1),
('saf10', '00008', 1),
('saf10', '00008', 2),
('saf10', '00007', 1),
('saf10', '00005', 4),
('saf10', '00002', 1),
('saf10', '00008', 1),
('abcd1', '00002', 4),
('abcd1', '00005', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `fk_id_penjual` (`id_penjual`);

--
-- Indexes for table `pembeli`
--
ALTER TABLE `pembeli`
  ADD PRIMARY KEY (`id_pembeli`);

--
-- Indexes for table `penjual`
--
ALTER TABLE `penjual`
  ADD PRIMARY KEY (`id_penjual`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD KEY `fk_id_pembeli` (`id_pembeli`),
  ADD KEY `fk_id_barang` (`id_barang`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `fk_id_penjual` FOREIGN KEY (`id_penjual`) REFERENCES `penjual` (`id_penjual`);

--
-- Constraints for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `fk_id_barang` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`),
  ADD CONSTRAINT `fk_id_pembeli` FOREIGN KEY (`id_pembeli`) REFERENCES `pembeli` (`id_pembeli`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
