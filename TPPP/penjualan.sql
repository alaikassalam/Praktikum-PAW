-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2024 at 01:12 PM
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
-- Database: `penjualan`
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
  `supplier_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `kode_barang`, `nama_barang`, `harga`, `stok`, `supplier_id`) VALUES
(1, 'B001', 'Pensil', 2000, 100, 1),
(2, 'B002', 'Buku Tulis', 5000, 50, 1),
(3, 'B003', 'Penghapus', 1500, 200, 2),
(4, 'B004', 'Pulpen', 3000, 150, 2),
(5, 'B005', 'Spidol', 4000, 100, 3),
(6, 'B006', 'Penggaris', 2500, 100, 3),
(7, 'B007', 'Binder', 7000, 80, 4),
(8, 'B008', 'Crayon', 8000, 70, 4),
(9, 'B009', 'Pensil Warna', 10000, 60, 5),
(10, 'B010', 'Sticky Note', 3000, 90, 5),
(11, 'BA00A', 'Mouse', 21000, 2, 7);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `jenis_kelamin` enum('L','P') DEFAULT NULL,
  `telp` varchar(12) DEFAULT NULL,
  `alamat` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `nama`, `jenis_kelamin`, `telp`, `alamat`) VALUES
(1, 'Andi', 'L', '081234567890', 'Jl. Merdeka No.1'),
(2, 'Budi', 'L', '081234567891', 'Jl. Melati No.2'),
(3, 'Citra', 'P', '081234567892', 'Jl. Mawar No.3'),
(4, 'Dewi', 'P', '081234567893', 'Jl. Anggrek No.4'),
(5, 'Eko', 'L', '081234567894', 'Jl. Kenanga No.5');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(11) NOT NULL,
  `waktu_bayar` datetime DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `metode` enum('TUNAI','TRANSFER','EDC') DEFAULT NULL,
  `transaksi_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `waktu_bayar`, `total`, `metode`, `transaksi_id`) VALUES
(11, '2024-01-10 10:30:00', 7000, 'TUNAI', 1),
(12, '2024-01-11 11:00:00', 4500, 'TRANSFER', 2),
(13, '2024-01-12 12:00:00', 6500, 'EDC', 3),
(14, '2024-01-13 13:30:00', 15000, 'TUNAI', 4),
(15, '2024-01-14 14:00:00', 13000, 'TRANSFER', 5),
(16, '2024-01-15 15:30:00', 8000, 'TUNAI', 1),
(17, '2024-01-16 16:00:00', 12000, 'EDC', 2),
(18, '2024-01-17 17:15:00', 9000, 'TRANSFER', 3),
(19, '2024-01-18 18:30:00', 11000, 'TUNAI', 4),
(20, '2024-01-19 19:45:00', 14000, 'EDC', 5);

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
(1, 'PT Makmur Sejahtera', '081234567890', 'Jl. Jaya Abadi No.1'),
(2, 'PT Sumber Berkah', '081234567891', 'Jl. Maju Bersama No.2'),
(3, 'PT Tumbuh Bersama', '081234567892', 'Jl. Sejahtera No.3'),
(4, 'PT Sukses Selalu', '081234567893', 'Jl. Damai No.4'),
(5, 'PT Gemilang', '081234567894', 'Jl. Pahlawan No.5'),
(6, 'PT Senang Sekali', '08123456114', 'Jl. Cempaka No.13'),
(7, 'PT Senang Banget', '081234561123', 'Jl. Cempaka No.14');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `waktu_transaksi` date DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `pelanggan_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `waktu_transaksi`, `keterangan`, `total`, `pelanggan_id`) VALUES
(1, '2024-01-10', 'Pembelian pensil dan buku tulis', 7000, 1),
(2, '2024-01-11', 'Pembelian penghapus dan pulpen', 4500, 2),
(3, '2024-01-12', 'Pembelian spidol dan penggaris', 6500, 3),
(4, '2024-01-13', 'Pembelian binder dan crayon', 15000, 4),
(5, '2024-01-14', 'Pembelian pensil warna dan sticky note', 13000, 5),
(6, '2024-01-15', 'Pembelian alat tulis kantor', 8000, 1),
(7, '2024-01-16', 'Pembelian kertas HVS', 6000, 2),
(8, '2024-01-17', 'Pembelian buku gambar', 10000, 3),
(9, '2024-01-18', 'Pembelian map dan stapler', 7500, 4),
(10, '2024-01-19', 'Pembelian cat air', 9500, 5);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_detail`
--

CREATE TABLE `transaksi_detail` (
  `transaksi_id` int(11) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `harga` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi_detail`
--

INSERT INTO `transaksi_detail` (`transaksi_id`, `barang_id`, `harga`, `qty`) VALUES
(1, 1, 2000, 2),
(1, 2, 5000, 1),
(2, 3, 1500, 2),
(2, 4, 3000, 1),
(3, 5, 4000, 1),
(3, 6, 2500, 1),
(4, 7, 7000, 1),
(4, 8, 8000, 1),
(5, 9, 10000, 1),
(5, 10, 3000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `userr`
--

CREATE TABLE `userr` (
  `id_user` tinyint(2) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `alamat` varchar(150) DEFAULT NULL,
  `hp` varchar(20) DEFAULT NULL,
  `level` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userr`
--

INSERT INTO `userr` (`id_user`, `username`, `password`, `nama`, `alamat`, `hp`, `level`) VALUES
(1, 'admin', 'password1', 'Admin', 'Jl. Mangga No.1', '081234567890', 1),
(2, 'user1', 'password2', 'User1', 'Jl. Mangga No.2', '081234567891', 2),
(3, 'user2', 'password3', 'User2', 'Jl. Mangga No.3', '081234567892', 2),
(4, 'user3', 'password4', 'User3', 'Jl. Mangga No.4', '081234567893', 2),
(5, 'user4', 'password5', 'User4', 'Jl. Mangga No.5', '081234567894', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `supplier_id` (`supplier_id`);

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
  ADD KEY `transaksi_id` (`transaksi_id`);

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
  ADD KEY `transaksi_ibfk_1` (`pelanggan_id`);

--
-- Indexes for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  ADD PRIMARY KEY (`transaksi_id`,`barang_id`),
  ADD KEY `barang_id` (`barang_id`);

--
-- Indexes for table `userr`
--
ALTER TABLE `userr`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `userr`
--
ALTER TABLE `userr`
  MODIFY `id_user` tinyint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`id`);

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`transaksi_id`) REFERENCES `transaksi` (`id`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`pelanggan_id`) REFERENCES `pelanggan` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  ADD CONSTRAINT `transaksi_detail_ibfk_1` FOREIGN KEY (`transaksi_id`) REFERENCES `transaksi` (`id`),
  ADD CONSTRAINT `transaksi_detail_ibfk_2` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
