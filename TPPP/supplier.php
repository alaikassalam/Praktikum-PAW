<?php
include 'koneksi.php';

// Menyimpan data supplier
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['simpan_supplier'])) {
    $nama = $_POST['nama'];
    $telp = $_POST['telp'];
    $alamat = $_POST['alamat'];

    $sql = "INSERT INTO supplier (nama, telp, alamat) VALUES ('$nama', '$telp', '$alamat')";
    if ($conn->query($sql) === TRUE) {
        echo "Data supplier berhasil ditambahkan.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Tambah Data Supplier</title>
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
        <h3>Tambah Data Supplier</h3>
        <form action="" method="post">
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" required pattern="[A-Za-z\s]+" title="Hanya huruf yang diizinkan" placeholder="Masukkan nama supplier">
            </div>
            <div class="form-group">
                <label for="telp">Telepon</label>
                <input type="text" class="form-control" id="telp" name="telp" required pattern="\d{10,12}" title="Hanya angka, panjang digit 10-12" placeholder="Masukkan nomor telepon">
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" required placeholder="Masukkan alamat supplier">
            </div>
            <button type="submit" name="simpan_supplier" class="btn btn-primary btn-custom">Simpan Supplier</button>
        </form>
    </div>
</body>
</html>

<?php
$conn->close();
?>