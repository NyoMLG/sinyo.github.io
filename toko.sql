-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2019 at 06:49 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_lengkap` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama_lengkap`) VALUES
(1, 'admin', 'admin', 'Sinyo {NyoSec}');

-- --------------------------------------------------------

--
-- Table structure for table `ongkir`
--

CREATE TABLE `ongkir` (
  `id_ongkir` int(100) NOT NULL,
  `nama_prov` varchar(100) NOT NULL,
  `tarif` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ongkir`
--

INSERT INTO `ongkir` (`id_ongkir`, `nama_prov`, `tarif`) VALUES
(1, 'sumatra', 100000),
(2, 'kalimantan', 100000),
(3, 'Jawa Tengah', 80000),
(4, 'Jawa Barat', 80000),
(6, 'Jawa Timur', 50000),
(7, 'Bali', 60000);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `email_pelanggan` varchar(100) NOT NULL,
  `password_pelanggan` varchar(100) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `telephone_pelanggan` varchar(100) NOT NULL,
  `alamat_pelanggan` text NOT NULL,
  `ftprofile` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `email_pelanggan`, `password_pelanggan`, `nama_pelanggan`, `telephone_pelanggan`, `alamat_pelanggan`, `ftprofile`) VALUES
(1, 'nyo@nyo.com', 'nyo', 'sinyo Sec', '14045', '', ''),
(2, '1@1.com', 'admin', 'admin', '0000001112', '', ''),
(31, 'email@email.com', 'password', 'nama', 'hp', 'alamat', 'sinyo.jpg'),
(32, 'email@email.com', 'password', 'nama', 'hp', 'alamat', 'sinyo.jpg'),
(33, 'email@email.com', 'nyo', 'sinyo', '123123', '123123123', 'skema item based collaborative.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(255) NOT NULL,
  `id_pembelian` int(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `bank` varchar(255) NOT NULL,
  `jumlah` int(255) NOT NULL,
  `tanggal` date NOT NULL,
  `bukti` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_pembelian`, `nama`, `bank`, `jumlah`, `tanggal`, `bukti`) VALUES
(1, 41, 'sinyo', 'BRI', 70000, '2019-05-21', '20190521084157depositphotos_114331722-stock-illustration-initial-letter-rm-red-swoosh.jpg'),
(2, 41, 'andy', 'BRI', 100000000, '2019-05-21', '20190521084643500_F_145868966_WoBAMFpJZ6EyqFMeMkVQBXHDdBpSvKfH.jpg'),
(3, 41, 'sinyo', 'BRI', 70000, '2019-05-21', '20190521084830skema item based collaborative.jpg'),
(4, 41, '2', 'BRI', 10000000, '2019-05-21', '20190521085015asset.5744711.jpg'),
(5, 44, 'sinyo', 'BRI', 2147483647, '2019-05-22', '20190522014509Untitled.png'),
(6, 42, '123', '123', 2147483647, '2019-05-22', '20190522022651skema item based collaborative.jpg'),
(7, 43, 'sinyo', 'BRI', 123123123, '2019-05-22', '20190522023827skema item based collaborative.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_ongkir` int(11) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `total_pembelian` int(11) NOT NULL,
  `nama_prov` varchar(100) NOT NULL,
  `tarif` int(11) NOT NULL,
  `alamat_pengiriman` text NOT NULL,
  `status_pembelian` varchar(100) NOT NULL DEFAULT 'pending',
  `resi_pengiriman` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_pelanggan`, `id_ongkir`, `tanggal_pembelian`, `total_pembelian`, `nama_prov`, `tarif`, `alamat_pengiriman`, `status_pembelian`, `resi_pengiriman`) VALUES
(30, 1, 7, '2019-05-20', 80000, '', 0, '', 'pending', ''),
(31, 1, 7, '2019-05-20', 70000, '', 0, '', 'pending', ''),
(32, 1, 0, '2019-05-20', 0, '', 0, '', 'pending', ''),
(33, 1, 7, '2019-05-20', 70000, '', 0, '', 'pending', ''),
(34, 1, 1, '2019-05-20', 36094000, '', 0, '', 'pending', ''),
(35, 1, 0, '2019-05-20', 17997000, '', 0, '', 'pending', ''),
(36, 1, 2, '2019-05-20', 18097000, '', 0, '', 'pending', ''),
(37, 1, 0, '2019-05-20', 20000, '', 0, '', 'pending', ''),
(38, 1, 7, '2019-05-20', 70000, '', 0, '', 'pending', ''),
(39, 1, 7, '2019-05-20', 100000, '', 0, '', 'pending', ''),
(40, 1, 7, '2019-05-20', 60100, 'Bali', 60000, '', 'pending', ''),
(41, 1, 7, '2019-05-20', 60050, 'Bali', 60000, 'Contoh jalan yang saya ketik dan kode poss', 'barang dikirim', 'abd123123'),
(42, 2, 2, '2019-05-21', 100050, 'kalimantan', 100000, 'kedalpayak', 'lunas', ''),
(43, 1, 7, '2019-05-21', 60150, 'Bali', 60000, 'dasdasdasd', 'barang dikirim', 'BACODDDDDD'),
(44, 1, 3, '2019-05-22', 80050, 'Jawa Tengah', 80000, 'asdasd', 'lunas', 'BACOOODDDDDD');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_produk`
--

CREATE TABLE `pembelian_produk` (
  `id_pembelian_produk` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `subberat` int(11) NOT NULL,
  `subharga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian_produk`
--

INSERT INTO `pembelian_produk` (`id_pembelian_produk`, `id_pembelian`, `id_produk`, `jumlah`, `nama`, `harga`, `berat`, `subberat`, `subharga`) VALUES
(24, 39, 16, 2, 'mmmmmmm', 20000, 100, 200, 40000),
(25, 40, 16, 2, 'mmmmmmm', 50, 100, 200, 100),
(26, 41, 16, 1, 'mmmmmmm', 50, 100, 100, 50),
(27, 42, 16, 1, 'mmmmmmm', 50, 100, 100, 50),
(28, 43, 16, 3, 'mmmmmmm', 50, 100, 300, 150),
(29, 44, 16, 1, 'mmmmmmm', 50, 100, 100, 50);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga_produk` int(100) NOT NULL,
  `berat_produk` varchar(10) NOT NULL,
  `foto_produk` varchar(100) NOT NULL,
  `deskripsi_produk` text NOT NULL,
  `stock_produk` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `harga_produk`, `berat_produk`, `foto_produk`, `deskripsi_produk`, `stock_produk`) VALUES
(17, 'ASUS ROG Strix GL503', 14299000, '100', 'ASUS_ROG_Strix_GL503_L_1.jpg', 'A 15.6-inch Anti-Glare, wide-view display gaming laptop powered by Core i5/Core i7 processor coupled with Intel HM175 and GeForce GTX GPU', 10),
(18, 'ASUS ROG GL553VD', 12990000, '100', 'ASUS_ROG_GL553VD_L_1.jpg', 'Laptop gaming dengan layar 15.6\", dilengkapi dengan platform GeForce GTX 1050, dan didukung oleh Microsoft DirectX 12', 10),
(19, 'ASUS ROG Zephyrus GX501', 31599000, '100', 'ASUS_ROG_Zephyrus_GX501_L_1.jpg', 'ASUS ROG Zephyrus GX501', 10),
(21, 'ASUS ROG G501JW', 17997000, '100', 'ASUS_ROG_G501JW_L_1.jpg', 'An ultra-thin Laptop with powerful IntelÂ® Coreâ„¢ processor and NVIDIAÂ® GeForceÂ® GTXâ„¢ 900 series graphics', 10),
(22, 'DI JUAL TEMAN GG', 10000, '', 'skema item based collaborative.jpg', 'GOOD', 1),
(23, 'di jual orang GG', 2147483647, '', 'find_user.jpg', 'GGGWP', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `ongkir`
--
ALTER TABLE `ongkir`
  ADD PRIMARY KEY (`id_ongkir`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indexes for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  ADD PRIMARY KEY (`id_pembelian_produk`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ongkir`
--
ALTER TABLE `ongkir`
  MODIFY `id_ongkir` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  MODIFY `id_pembelian_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
