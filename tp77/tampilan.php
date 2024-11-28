<?php include 'koneksi.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <html>

    <head>
        <title>Penjualan XYZ</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <style>
            body {
                font-family: Arial, sans-serif;
            }

            .navbar {
                background-color: #343a40;
            }

            .navbar-brand,
            .nav-link {
                color: #fff !important;
            }

            .table-container {
                margin: 20px;
            }

            .table-header {
                background-color: #007bff;
                color: #fff;
                padding: 10px;
            }

            .btn-custom {
                margin-right: 10px;
            }

            .btn-detail {
                background-color: #17a2b8;
                color: #fff;
            }

            .btn-delete {
                background-color: #dc3545;
                color: #fff;
            }

            a {
            text-decoration: none !important;
            color: white !important;
            }

        </style>
    </head>

    <body>
        <nav class="navbar navbar-expand-lg navbar-dark">
            <a class="navbar-brand" href="#">Penjualan XYZ</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Supplier</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Barang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Transaksi</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="table-container">
            <div class="table-header">
                <h5>Data Master Transaksi</h5>
            </div> <br><br>
            <div class="float-end">
                <button class="btn btn-primary btn-custom"><a href="report_transaksi.php">Lihat Laporan Penjualan</a></button>
                <button class="btn btn-success"><a href="#">Tambah Transaksi</a></button>

            </div> <br><br><br><br>
            <table class="table table-bordered">
                <thead class="table-primary">
                    <tr>
                        <th>ID</th>
                        <th>Waktu Transaksi</th>
                        <th>Keterangan</th>
                        <th>Total</th>
                        <th>Nama Pelanggan</th>
                        <th>Aksi</th>
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
                    <td>
                        <button class=\"btn btn-detail\">Lihat Detail</button>
                        <button class=\"btn btn-delete\">Hapus</button>
                    </td>
                </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </body>

    </html>
</body>

</html>