<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Periksa apakah barang digunakan dalam transaksi_detail
    $checkQuery = "SELECT COUNT(*) AS count FROM transaksi_detail WHERE barang_id = '$id'";
    $checkResult = mysqli_query($conn, $checkQuery);
    $checkRow = mysqli_fetch_assoc($checkResult);

    if ($checkRow['count'] > 0) {
        // Jika barang digunakan dalam transaksi_detail
        echo "<script>
                alert('Apakah Anda yakin ingin menghapus data ini?');
                alert('Barang tidak dapat dihapus karena sudah digunakan dalam transaksi detail');
                window.location.href='tampilan.php';
            </script>";
    } else {
        // Jika barang tidak digunakan, konfirmasi penghapusan
        echo "<script>
                if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
                    window.location.href = 'delete_barang.php?id=$id&confirm=true';
                } else {
                    window.location.href = 'tampilan.php';
                }
            </script>";
    }
} elseif (isset($_GET['confirm']) && $_GET['confirm'] == 'true') {
    // Jika konfirmasi untuk menghapus barang
    $deleteQuery = "DELETE FROM barang WHERE id = '$id'";
    if (mysqli_query($conn, $deleteQuery)) {
        echo "<script>
                alert('Barang berhasil dihapus.');
                window.location.href='tampilan.php';
            </script>";
    } else {
        echo "<script>
                alert('Terjadi kesalahan saat menghapus barang.');
                window.location.href='tampilan.php';
            </script>";
    }
} else {
    header("Location: tampilan.php");
    exit;
}
?>
