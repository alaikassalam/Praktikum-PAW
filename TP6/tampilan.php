<?php include 'koneksi.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Master-Detail Transaksi</title>
    <style>
        a {
            display: inline-block;
            padding: 10px 20px;
            margin: 5px;
            text-decoration: none;
            color: white;
            background-color: #007BFF;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .delete-button {
            background-color: #dc3545;
        }
    </style>
</head>
<body>
    <h2>Pengelolaan Master Detail</h2>
    
    <!-- Tabel Barang -->
    <h4>Data Barang</h4>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Nama Supplier</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = "SELECT barang.id, kode_barang, nama_barang, harga, stok, supplier.nama AS nama_supplier FROM barang JOIN supplier ON barang.supplier_id = supplier.id ORDER BY barang.id";
            $result = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['kode_barang']}</td>
                    <td>{$row['nama_barang']}</td>
                    <td>{$row['harga']}</td>
                    <td>{$row['stok']}</td>
                    <td>{$row['nama_supplier']}</td>
                    <td><a class='delete-button' href='hapus.php?id={$row['id']}'>Delete</a></td>
                </tr>";
            }
            ?>
        </tbody>
    </table>
    
    <!-- Tabel Transaksi -->
    <h4>Data Transaksi</h4>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Waktu Transaksi</th>
                <th>Keterangan</th>
                <th>Total</th>
                <th>Nama Pelanggan</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = "SELECT transaksi.id, waktu_transaksi, keterangan, total, pelanggan.nama AS nama_pelanggan FROM transaksi JOIN pelanggan ON transaksi.pelanggan_id = pelanggan.id ORDER BY transaksi.id";
            $result = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['waktu_transaksi']}</td>
                    <td>{$row['keterangan']}</td>
                    <td>{$row['total']}</td>
                    <td>{$row['nama_pelanggan']}</td>
                </tr>";
            }
            ?>
        </tbody>
    </table>

    <!-- Tabel Detail Transaksi -->
    <h4>Data Detail Transaksi</h4>
    <table border="1">
        <thead>
            <tr>
                <th>Transaksi ID</th>
                <th>Nama Barang</th>
                <th>Harga</th>
                <th>Qty</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = "SELECT transaksi_detail.transaksi_id, barang.nama_barang, transaksi_detail.harga, transaksi_detail.qty FROM transaksi_detail JOIN barang ON transaksi_detail.barang_id = barang.id";
            $result = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                    <td>{$row['transaksi_id']}</td>
                    <td>{$row['nama_barang']}</td>
                    <td>{$row['harga']}</td>
                    <td>{$row['qty']}</td>
                </tr>";
            }
            ?>
        </tbody>
    </table>

    <div>
        <a href="tambahTransaksi.php">Tambah Transaksi</a>
        <a href="tambahTransaksiDetail.php">Tambah Detail Transaksi</a>
    </div>
</body>
</html>
