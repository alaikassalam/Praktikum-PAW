<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $waktu_transaksi = $_POST['waktu_transaksi'];
    $keterangan = $_POST['keterangan'];
    $total = $_POST['total'];
    $pelanggan_id = $_POST['pelanggan_id'];

    // Validasi waktu transaksi
    if ($waktu_transaksi < date('Y-m-d')) {
        echo "Tanggal tidak boleh kurang dari hari ini.";
        exit;
    }

    // Validasi keterangan
    if (strlen($keterangan) < 3) {
        echo "Keterangan minimal 3 karakter.";
        exit;
    }

    // Validasi total
    if ($total < 0) {
        echo "Total tidak boleh kurang dari 0.";
        exit;
    }

    // Insert data
    $query = "INSERT INTO transaksi (waktu_transaksi, keterangan, total, pelanggan_id) VALUES ('$waktu_transaksi', '$keterangan', '$total', '$pelanggan_id')";
    if (mysqli_query($conn, $query)) {
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
    <title>Tambah Data Transaksi</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="card shadow-sm" style="width: 100%; max-width: 400px; padding: 20px;">
            <h4 class="text-center mb-4">Tambah Data Transaksi</h4>
            <form action="tambahTransaksi.php" method="post">
                <div class="form-group mb-3">
                    <label for="waktu_transaksi">Waktu Transaksi</label>
                    <input type="datetime-local" id="waktu_transaksi" name="waktu_transaksi" class="form-control" required min="<?= date('Y-m-d\TH:i') ?>">
                </div>

                <div class="form-group mb-3">
                    <label for="keterangan">Keterangan</label>
                    <textarea id="keterangan" name="keterangan" class="form-control" minlength="3" required placeholder="Masukkan keterangan transaksi"></textarea>
                </div>

                <div class="form-group mb-3">
                    <label for="total">Total</label>
                    <input type="number" id="total" name="total" class="form-control" value="0" readonly>
                </div>

                <div class="form-group mb-3">
                    <label for="pelanggan_id">Pelanggan</label>
                    <select id="pelanggan_id" name="pelanggan_id" class="form-control" required>
                        <option value="">Pilih Pelanggan</option>
                        <?php
                        $query = "SELECT * FROM pelanggan";
                        $result = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<option value='{$row['id']}'>{$row['nama']}</option>";
                        }
                        ?>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary w-100">Tambah Transaksi</button>
            </form>
        </div>
    </div>
</body>

</html>