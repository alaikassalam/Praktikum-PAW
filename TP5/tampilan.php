<?php
include 'koneksi.php';

if (isset($_GET['hapus_id'])) {
    $id = $_GET['hapus_id'];

    $query = "DELETE FROM supplier WHERE id = $id";
    mysqli_query($conn, $query);

    header("Location: tampilan.php");
    exit();
}

$query = "SELECT * FROM supplier";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Supplier</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2 class="text-info">Data Master Supplier</h2>
        <div class="d-flex justify-content-end mb-3">
            <a href="tambahData.php" class="btn bg-success text-light">Tambah Data</a>
        </div>
        <hr>
        <table class="table table-bordered">
            <thead class="bg-info-subtle">
                <tr>
                    <th>ID</th>
                    <th>Nama Supplier</th>
                    <th>Telepon</th>
                    <th>Alamat</th>
                    <th>Tindakan</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?= $row['id']; ?></td>
                        <td><?= $row['nama']; ?></td>
                        <td><?= $row['telp']; ?></td>
                        <td><?= $row['alamat']; ?></td>
                        <td>
                            <a href="editData.php?id=<?= $row['id']; ?>" class="btn btn-warning btn-sm text-light">Edit</a>
                            <button onclick="confirmDelete(<?= $row['id']; ?>)" class="btn btn-danger btn-sm text-light">Hapus</button>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <script>
        function confirmDelete(id) {
            if (confirm('Anda yakin akan menghapus supplier ini?')) {
                window.location.href = 'tampilan.php?hapus_id=' + id;
            }
        }
    </script>
</body>
</html>