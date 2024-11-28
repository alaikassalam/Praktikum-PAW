<?php
session_start();
include('koneksi.php');
if (!isset($_SESSION['username'])) {
    $_SESSION['username'] = 'admin';
}
$sql = "SELECT * FROM user";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Menambahkan warna latar belakang khusus untuk tombol */
        .btn-warning {
            background-color: #ffc107;
            border-color: #ffc107;
        }
        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }
        .btn-warning:hover {
            background-color: #e0a800;
            border-color: #d39e00;
        }
        .btn-danger:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }
    </style>
</head>

<body>
    <div class="container mt-4" style="max-width: 60%;">
        <h2>Daftar User</h2>
        <a href="tambah_user.php" class="btn btn-success mb-3 float-end">Tambah User</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Nama</th>
                    <th>Level</th>
                    <th>Tindakan</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM user";
                $result = mysqli_query($conn, $query);
                $no = 1;
                while ($user = mysqli_fetch_assoc($result)):
                ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $user['username']; ?></td>
                        <td><?php echo $user['nama']; ?></td>
                        <td><?php echo $user['level'] == 1 ? 'Admin' : 'User Biasa'; ?></td>
                        <td>
                            <a href="#?id=<?php echo $user['id_user']; ?>" class="btn btn-warning btn-sm me-1">Edit</a>
                            <a href="#?id=<?php echo $user['id_user']; ?>" onclick="return confirm('Yakin ingin menghapus?')" class="btn btn-danger btn-sm">Hapus</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>

</html>
