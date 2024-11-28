<?php
// tambah_transaksi_detail.php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $transaksi_id = $_POST['transaksi_id'];
    $barang_id = $_POST['barang_id'];
    $qty = $_POST['qty'];
    
    // Validasi barang_id
    $query = "SELECT * FROM transaksi_detail WHERE transaksi_id = '$transaksi_id' AND barang_id = '$barang_id'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        echo "Barang ini sudah ada dalam transaksi.";
        exit;
    }

    // Ambil harga satuan barang
    $query = "SELECT harga FROM barang WHERE id = '$barang_id'";
    $result = mysqli_query($conn, $query);
    $barang = mysqli_fetch_assoc($result);
    $harga = $barang['harga'] * $qty;

    // Insert data
    $query = "INSERT INTO transaksi_detail (transaksi_id, barang_id, harga, qty) VALUES ('$transaksi_id', '$barang_id', '$harga', '$qty')";
    if (mysqli_query($conn, $query)) {
        // Update total transaksi
        $query = "UPDATE transaksi SET total = total + $harga WHERE id = '$transaksi_id'";
        mysqli_query($conn, $query);
        header("Location: tampilan.php");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Detail Transaksi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5" style="max-width: 400px;">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title text-center">Tambah Detail Transaksi</h4>
                <form action="tambahTransaksiDetail.php" method="post">
                    <div class="mb-3">
                        <label for="barang_id" class="form-label">Pilih Barang</label>
                        <select class="form-select" name="barang_id" id="barang_id" required>
                            <option value="">Pilih Barang</option>
                            <?php
                            include 'koneksi.php';
                            $query = "SELECT id, nama_barang FROM barang";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<option value='{$row['id']}'>{$row['nama_barang']}</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="transaksi_id" class="form-label">ID Transaksi</label>
                        <select class="form-select" name="transaksi_id" id="transaksi_id" required>
                            <option value="">Pilih ID Transaksi</option>
                            <?php
                            include 'koneksi.php';
                            $query = "SELECT id, waktu_transaksi FROM transaksi";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<option value='{$row['id']}'>ID {$row['id']} - {$row['waktu_transaksi']}</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="qty" class="form-label">Quantity</label>
                        <input type="number" class="form-control" name="qty" id="qty" min="1" required placeholder="Masukkan jumlah barang">
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Tambah Detail Transaksi</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>