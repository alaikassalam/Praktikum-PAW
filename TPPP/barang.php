<?php
include 'koneksi.php';

// Menyimpan data barang
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['simpan_barang'])) {
    $kode_barang = $_POST['kode_barang'];
    $nama_barang = $_POST['nama_barang'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $supplier_id = $_POST['supplier_id'];

    $sql = "INSERT INTO barang (kode_barang, nama_barang, harga, stok, supplier_id) VALUES ('$kode_barang', '$nama_barang', '$harga', '$stok', '$supplier_id')";
    if ($conn->query($sql) === TRUE) {
        echo "Data barang berhasil ditambahkan.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Mengambil data supplier untuk dropdown
$supplier_query = "SELECT * FROM supplier";
$supplier_result = $conn->query($supplier_query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Tambah Data Barang</title>
    <style>
        .container {
            max-width: 500px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-top: 50px;
        }
        h3 {
            text-align: center;
        }
        .btn-custom {
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="container">
        <h3>Tambah Data Barang</h3>
        <form action="" method="post">
            <div class="form-group">
                <label for="kode_barang">Kode Barang</label>
                <input type="text" class="form-control" id="kode_barang" name="kode_barang" required placeholder="Masukkan kode barang">
            </div>
            <div class="form-group">
                <label for="nama_barang">Nama Barang</label>
                <input type="text" class="form-control" id="nama_barang" name="nama_barang" required placeholder="Masukkan nama barang">
            </div>
            <div class="form-group">
                <label for="harga">Harga</label>
                <input type="number" class="form-control" id="harga" name="harga" required placeholder="Masukkan harga barang">
            </div>
            <div class="form-group">
                <label for="stok">Stok</label>
                <input type="number" class="form-control" id="stok" name="stok" required placeholder="Masukkan jumlah barang">
            </div>
            <div class="form-group">
                <label for="supplier_id">Supplier</label>
                <select class="form-control" id="supplier_id" name="supplier_id" required placeholder="Pilih nama supplier">
                    <option value="">Pilih Supplier</option>
                    <?php while ($row = $supplier_result->fetch_assoc()): ?>
                        <option value="<?= $row['id'] ?>"><?= $row['nama'] ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
            <button type="submit" name="simpan_barang" class="btn btn-primary btn-custom">Simpan Barang</button>
        </form>
    </div>
</body>
</html>

<?php
$conn->close();
?>