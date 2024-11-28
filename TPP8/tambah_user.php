<?php
session_start();
include('koneksi.php');
if (!isset($_SESSION['username'])) {
    $_SESSION['username'] = 'admin';
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $hp = $_POST['hp'];
    $level = $_POST['level'];
    $sql = "INSERT INTO user (username, password, nama, alamat, hp, level) 
            VALUES ('$username', '$password', '$nama', '$alamat', '$hp', '$level')";
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('User berhasil ditambahkan'); window.location.href='index.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah User Baru</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4" style="max-width: 500px;">
        <h2>Tambah User Baru</h2>
        <form method="POST" action="">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan username" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password" required>
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama User</label>
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama lengkap" required>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea class="form-control" id="alamat" name="alamat" rows="3" placeholder="Masukkan alamat lengkap" required></textarea>
            </div>
            <div class="mb-3">
                <label for="hp" class="form-label">Nomor HP</label>
                <input type="text" class="form-control" id="hp" name="hp" placeholder="Masukkan nomor HP" required>
            </div>
            <div class="mb-3">
                <label for="level" class="form-label">Jenis User</label>
                <select class="form-control" id="level" name="level" required>
                    <option value="" disabled selected>-- Pilih Jenis User --</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success me-2">Simpan</button>
            <a href="index.php" class="btn btn-danger">Kembali</a>

        </form>
    </div>
</body>
</html>
