<?php
include 'koneksi.php';

$errorNama = "";
$errorTelp = "";
$errorAlamat = "";
$nama = "";
$telp = "";
$alamat = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $telp = $_POST['telp'];
    $alamat = $_POST['alamat'];

    if (empty($nama) || !preg_match("/^[a-zA-Z\s]+$/", $nama)) {
        $errorNama = "Tidak boleh kosong, hanya boleh huruf";
    }

    if (empty($telp) || !preg_match("/^[0-9]+$/", $telp)) {
        $errorTelp = "Tidak boleh kosong, hanya boleh angka";
    }

    if (empty($alamat) || !preg_match("/^(?=.*[A-Za-z])(?=.*\d).+$/", $alamat)) {
        $errorAlamat = "Tidak boleh kosong, isian harus alfanumerik (minimal harus ada 1 angka dan 1 huruf)";
    }

    if (empty($errorNama) && empty($errorTelp) && empty($errorAlamat)) {
        $query = "INSERT INTO supplier (nama, telp, alamat) VALUES ('$nama', '$telp', '$alamat')";
        mysqli_query($conn, $query);
        header("Location: tampilan.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Data Supplier</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2 class="text-info">Tambah Data Master Supplier Baru</h2>
        <hr>
        
        <form action="" method="POST">
            <div class="mb-3 row">
                <label for="nama" class="col-md-2 col-form-label"><b>Nama</b></label>
                <div class="col-md-10">
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" value="<?= $nama; ?>">
                    <span class="text-danger"><?= $errorNama; ?></span>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="telp" class="col-md-2 col-form-label"><b>Telp</b></label>
                <div class="col-md-8">
                    <input type="text" class="form-control" id="telp" name="telp" placeholder="telp" value="<?= $telp; ?>">
                    <span class="text-danger"><?= $errorTelp; ?></span>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="alamat" class="col-md-2 col-form-label"><b>Alamat</b></label>
                <div class="col-md-8">
                    <input type="text" class="form-control" id="alamat" name="alamat" placeholder="alamat" value="<?= $alamat; ?>">
                    <span class="text-danger"><?= $errorAlamat; ?></span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-10 offset-md-2">
                    <button type="submit" class="btn btn-success">Simpan</button>
                    <a href="tampilan.php" class="btn btn-danger">Batal</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
