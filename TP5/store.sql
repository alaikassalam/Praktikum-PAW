-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2024 at 08:43 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `store`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `kode_barang` varchar(10) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `kode_barang`, `nama_barang`, `harga`, `stok`, `supplier_id`) VALUES
(1, 'BRG001', 'Barang A', 50000, 10, 1),
(2, 'BRG002', 'Barang B', 75000, 20, 2),
(3, 'BRG003', 'Barang C', 120000, 15, 3),
(4, 'BRG004', 'Barang D', 45000, 30, 4),
(5, 'BRG005', 'Barang E', 60000, 25, 5),
(6, 'BRG006', 'Barang F', 80000, 18, 6),
(7, 'BRG007', 'Barang G', 95000, 12, 7),
(8, 'BRG008', 'Barang H', 110000, 22, 8),
(9, 'BRG009', 'Barang I', 130000, 10, 9),
(10, 'BRG010', 'Barang J', 70000, 5, 10);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `telp` varchar(12) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `nama`, `jenis_kelamin`, `telp`, `alamat`) VALUES
(1, 'Andi', 'L', '081234567890', 'Jl. Mawar No.1'),
(2, 'Budi', 'L', '081234567891', 'Jl. Melati No.2'),
(3, 'Cici', 'P', '081234567892', 'Jl. Kenanga No.3'),
(4, 'Dina', 'P', '081234567893', 'Jl. Anggrek No.4'),
(5, 'Eka', 'L', '081234567894', 'Jl. Cempaka No.5'),
(6, 'Fajar', 'L', '081234567895', 'Jl. Dahlia No.6'),
(7, 'Gita', 'P', '081234567896', 'Jl. Teratai No.7'),
(8, 'Heri', 'L', '081234567897', 'Jl. Mawar No.8'),
(9, 'Ira', 'P', '081234567898', 'Jl. Melati No.9'),
(10, 'Joko', 'L', '081234567899', 'Jl. Kenanga No.10'),
(14, 'salam', 'L', '980', 'telang'),
(16, 'salam', 'L', '980', 'telang'),
(18, 'allll', 'L', '980', 'telang');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(11) NOT NULL,
  `waktu_bayar` datetime NOT NULL,
  `total` int(11) NOT NULL,
  `metode` enum('TUNAI','TRANSFER','EDC') NOT NULL,
  `transaksi_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `waktu_bayar`, `total`, `metode`, `transaksi_id`) VALUES
(1, '2024-10-01 11:00:00', 50000, 'TUNAI', 1),
(2, '2024-10-02 12:00:00', 75000, 'TRANSFER', 2),
(3, '2024-10-03 13:00:00', 120000, 'EDC', 3),
(4, '2024-10-04 14:00:00', 45000, 'TUNAI', 4),
(5, '2024-10-05 15:00:00', 60000, 'TRANSFER', 5),
(6, '2024-10-06 16:00:00', 80000, 'EDC', 6),
(7, '2024-10-07 17:00:00', 95000, 'TUNAI', 7),
(8, '2024-10-08 18:00:00', 110000, 'TRANSFER', 8),
(9, '2024-10-09 19:00:00', 130000, 'EDC', 9),
(10, '2024-10-10 20:00:00', 70000, 'TUNAI', 10);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `telp` varchar(12) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `nama`, `telp`, `alamat`) VALUES
(1, 'Supplier A', '081234561111', 'Jl. Cempaka No.1'),
(2, 'Supplier B', '081234562222', 'Jl. Cempaka No.2'),
(3, 'Supplier C', '081234563333', 'Jl. Cempaka No.3'),
(4, 'Supplier D', '081234564444', 'Jl. Cempaka No.4'),
(5, 'Supplier E', '081234565555', 'Jl. Cempaka No.5'),
(6, 'Supplier F', '081234566666', 'Jl. Cempaka No.6'),
(7, 'Supplier G', '081234567777', 'Jl. Cempaka No.7'),
(8, 'Supplier H', '081234568888', 'Jl. Cempaka No.8'),
(9, 'Supplier I', '081234569999', 'Jl. Cempaka No.9'),
(10, 'Supplier J', '081234560000', 'Jl. Cempaka No.10'),
(11, 'PT Maju Bersama', '081234561122', 'Surabaya 0'),
(12, 'PT Senang Sekali', '08123456114', 'Bangkalan 1'),
(13, 'PT Segar Segar', '081234561122', 'Surabaya 2'),
(14, 'Coba ini yang dihapus', '081234561122', 'Jl. Cempaka No.12');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `waktu_transaksi` date NOT NULL,
  `keterangan` text NOT NULL,
  `total` int(11) NOT NULL,
  `pelanggan_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `waktu_transaksi`, `keterangan`, `total`, `pelanggan_id`) VALUES
(1, '2024-10-01', 'Pembelian barang A', 50000, 1),
(2, '2024-10-02', 'Pembelian barang B', 75000, 2),
(3, '2024-10-03', 'Pembelian barang C', 120000, 3),
(4, '2024-10-04', 'Pembelian barang D', 45000, 4),
(5, '2024-10-05', 'Pembelian barang E', 60000, 5),
(6, '2024-10-06', 'Pembelian barang F', 80000, 6),
(7, '2024-10-07', 'Pembelian barang G', 95000, 7),
(8, '2024-10-08', 'Pembelian barang H', 110000, 8),
(9, '2024-10-09', 'Pembelian barang I', 130000, 9),
(10, '2024-10-10', 'Pembelian barang J', 70000, 10);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_detail`
--

CREATE TABLE `transaksi_detail` (
  `transaksi_id` int(11) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi_detail`
--

INSERT INTO `transaksi_detail` (`transaksi_id`, `barang_id`, `harga`, `qty`) VALUES
(1, 1, 50000, 1),
(2, 2, 75000, 1),
(3, 3, 120000, 1),
(4, 4, 45000, 1),
(5, 5, 60000, 1),
(6, 6, 80000, 1),
(7, 7, 95000, 1),
(8, 8, 110000, 1),
(9, 9, 130000, 1),
(10, 10, 70000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` tinyint(2) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(35) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `hp` varchar(20) NOT NULL,
  `level` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama`, `alamat`, `hp`, `level`) VALUES
(1, 'admin', 'password123', 'Administrator', 'Jl. Kantor No.1', '081234500001', 0),
(2, 'kasir1', 'password123', 'Kasir Pertama', 'Jl. Pasar No.1', '081234500002', 0),
(3, 'kasir2', 'password123', 'Kasir Kedua', 'Jl. Pasar No.2', '081234500003', 0),
(4, 'gudang1', 'password123', 'Petugas Gudang', 'Jl. Gudang No.1', '081234500004', 0),
(5, 'gudang2', 'password123', 'Petugas Gudang 2', 'Jl. Gudang No.2', '081234500005', 0),
(6, 'admin2', 'password123', 'Admin Kedua', 'Jl. Kantor No.2', '081234500006', 0),
(7, 'kasir3', 'password123', 'Kasir Ketiga', 'Jl. Pasar No.3', '081234500007', 0),
(8, 'gudang3', 'password123', 'Petugas Gudang 3', 'Jl. Gudang No.3', '081234500008', 0),
(9, 'admin3', 'password123', 'Admin Ketiga', 'Jl. Kantor No.3', '081234500009', 0),
(10, 'kasir4', 'password123', 'Kasir Keempat', 'Jl. Pasar No.4', '081234500010', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `barang` (`supplier_id`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pembayaran` (`transaksi_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaksi` (`pelanggan_id`);

--
-- Indexes for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  ADD KEY `transaksi_detail1` (`transaksi_id`),
  ADD KEY `transaksi_detail2` (`barang_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` tinyint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran` FOREIGN KEY (`transaksi_id`) REFERENCES `transaksi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi` FOREIGN KEY (`pelanggan_id`) REFERENCES `pelanggan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  ADD CONSTRAINT `transaksi_detail1` FOREIGN KEY (`transaksi_id`) REFERENCES `transaksi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_detail2` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
