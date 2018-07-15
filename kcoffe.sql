-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2017 at 07:09 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kcoffe`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_pemesanan`
--

CREATE TABLE `detail_pemesanan` (
  `id_pemesanan` varchar(5) NOT NULL,
  `id_makanan` varchar(5) NOT NULL,
  `jumlah` int(2) NOT NULL,
  `status` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hak_akses`
--

CREATE TABLE `hak_akses` (
  `id_hak_akses` varchar(4) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hak_akses`
--

INSERT INTO `hak_akses` (`id_hak_akses`, `nama`) VALUES
('HA01', 'SuperAdmin'),
('HA02', 'Admin'),
('HA03', 'Kasir'),
('HA04', 'Waiters'),
('HA05', 'Dapur'),
('HA06', 'Pelanggan (meja)');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id_prod` varchar(5) NOT NULL,
  `jumlah` int(2) NOT NULL,
  `id_session` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keranjang`
--

INSERT INTO `keranjang` (`id_prod`, `jumlah`, `id_session`) VALUES
('MK1', 1, '47nibiehgs3u2b3jf6csa876v4');

-- --------------------------------------------------------

--
-- Table structure for table `makanan`
--

CREATE TABLE `makanan` (
  `id_makanan` varchar(4) NOT NULL,
  `nama_makanan` varchar(30) NOT NULL,
  `harga_makanan` int(11) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `makanan`
--

INSERT INTO `makanan` (`id_makanan`, `nama_makanan`, `harga_makanan`, `stok`) VALUES
('MK1', 'Spageti', 20000, 29),
('MK2', 'Ayam', 1000, 25),
('MK3', 'Tahu Krispi', 8000, 20);

-- --------------------------------------------------------

--
-- Table structure for table `minuman`
--

CREATE TABLE `minuman` (
  `id_minuman` varchar(4) NOT NULL,
  `nama_minuman` varchar(30) NOT NULL,
  `harga_minuman` int(11) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `minuman`
--

INSERT INTO `minuman` (`id_minuman`, `nama_minuman`, `harga_minuman`, `stok`) VALUES
('MN1', 'ICE LEMON TEA', 5000, 50),
('MN2', 'Good Day Cappucino', 5000, 25);

-- --------------------------------------------------------

--
-- Table structure for table `paket`
--

CREATE TABLE `paket` (
  `id_paket` varchar(5) NOT NULL,
  `nama_paket` varchar(30) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paket`
--

INSERT INTO `paket` (`id_paket`, `nama_paket`, `harga`) VALUES
('PKT1', 'Murah Meriah', 23000),
('PKT2', 'Ayam Good', 15000);

-- --------------------------------------------------------

--
-- Table structure for table `paket_mak_min`
--

CREATE TABLE `paket_mak_min` (
  `id_paket` varchar(5) NOT NULL,
  `id_makanan` varchar(5) NOT NULL,
  `id_minuman` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paket_mak_min`
--

INSERT INTO `paket_mak_min` (`id_paket`, `id_makanan`, `id_minuman`) VALUES
('PKT1', 'MK1', 'MN1'),
('PKT2', 'MK2', 'MN2');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_nota` int(5) NOT NULL,
  `id_pesan` int(5) NOT NULL,
  `bayar` double NOT NULL,
  `kembalian` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pesan` int(4) NOT NULL,
  `id_konsumen` varchar(4) NOT NULL,
  `id_pelayan` varchar(4) NOT NULL,
  `waktu_tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `jumlah` int(20) NOT NULL,
  `status` int(1) NOT NULL,
  `no_meja` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` varchar(5) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `jk` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `password`, `nama`, `alamat`, `no_hp`, `jk`) VALUES
('AD1', '21232f297a57a5a743894a0e4a801fc3', 'Admin Toko', 'jalanin aja', '081234567890', 'Laki-Laki'),
('DP1', 'de20b1d289dd6005ba8116085122f144', 'Dapur Toko', 'jalan ini', '081234567890', 'Laki-Laki'),
('KS1', 'c7911af3adbd12a035b289556d96470a', 'Kasir Toko', 'Jalan jalan', '081234567890', 'Laki-Laki'),
('PL1', '7f78f06d2d1262a0a222ca9834b15d9d', 'Meja 1', 'jalan situ', '081234567890', 'Laki-Laki'),
('SA1', '17c4520f6cfd1ab53d8745e84681eb49', 'Pemilik Toko', 'Jalan Sini', '081234567890', 'Laki-Laki'),
('SA2', '2bcc993d28750eed4976a3e6c0d6d210', 'Ahmad Dwi Alfian', 'Jalan Kusnandar Gang Samidi no. 53B', '089627868764', 'Laki-Laki'),
('WT1', 'f4c12413d02f5efd359e06eebd344aad', 'Waiters Toko', 'Jalan apa ya', '081234567890', 'Laki-Laki');

-- --------------------------------------------------------

--
-- Table structure for table `user_hak_akses`
--

CREATE TABLE `user_hak_akses` (
  `id_user` varchar(5) NOT NULL,
  `id_hak_akses` varchar(4) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_hak_akses`
--

INSERT INTO `user_hak_akses` (`id_user`, `id_hak_akses`, `status`) VALUES
('SA1', 'HA01', 1),
('AD1', 'HA02', 1),
('KS1', 'HA03', 1),
('WT1', 'HA04', 1),
('DP1', 'HA05', 1),
('PL1', 'HA06', 1),
('SA2', 'HA01', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hak_akses`
--
ALTER TABLE `hak_akses`
  ADD PRIMARY KEY (`id_hak_akses`);

--
-- Indexes for table `makanan`
--
ALTER TABLE `makanan`
  ADD PRIMARY KEY (`id_makanan`);

--
-- Indexes for table `minuman`
--
ALTER TABLE `minuman`
  ADD PRIMARY KEY (`id_minuman`);

--
-- Indexes for table `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`id_paket`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_nota`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
