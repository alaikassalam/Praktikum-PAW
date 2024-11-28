<?php
include 'koneksi.php';

$start_date = isset($_GET['start_date']) ? $_GET['start_date'] : '';
$end_date = isset($_GET['end_date']) ? $_GET['end_date'] : '';

// Set header untuk ekspor Excel
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=Laporan_Penjualan_{$start_date}_to_{$end_date}.xls");
header("Pragma: no-cache");
header("Expires: 0");

// Mulai output buffering untuk menangkap data
ob_start();

// Judul
echo "<table border='1'>";
echo "<tr><th colspan='3'>Rekap Laporan Penjualan $start_date sampai $end_date</th></tr>";

// Header tabel
echo "<tr><th>No</th><th>Total</th><th>Tanggal</th></tr>";

// Inisialisasi variabel total
$total_pendapatan = 0;
$total_pelanggan = 0;

// Jika rentang tanggal disediakan, ambil data dan tampilkan
if ($start_date && $end_date) {
    $query = "SELECT waktu_transaksi AS tanggal, total FROM transaksi 
              WHERE waktu_transaksi BETWEEN '$start_date' AND '$end_date'
              ORDER BY waktu_transaksi";
    $result = mysqli_query($conn, $query);

    $no = 1;
    while ($row = mysqli_fetch_assoc($result)) {
        // Tampilkan setiap baris data dalam sel tabel
        echo "<tr>";
        echo "<td>" . $no . "</td>";
        echo "<td>Rp" . number_format($row['total'], 0, ',', '.') . "</td>";
        echo "<td>" . date("d-M-y", strtotime($row['tanggal'])) . "</td>";
        echo "</tr>";
        
        // Update total
        $total_pendapatan += $row['total'];
        $total_pelanggan++;
        $no++;
    }
} else {
    echo "<tr><td colspan='3'>Tidak ada data transaksi untuk rentang tanggal yang dipilih.</td></tr>";
}

// Tambahkan baris ringkasan untuk total pelanggan dan total pendapatan
echo "<tr><td colspan='2'><strong>Jumlah Pelanggan</strong></td><td><strong>$total_pelanggan Orang</strong></td></tr>";
echo "<tr><td colspan='2'><strong>Jumlah Pendapatan</strong></td><td><strong>Rp" . number_format($total_pendapatan, 0, ',', '.') . "</strong></td></tr>";

// Akhiri tabel
echo "</table>";

// Akhiri output buffering dan kirimkan konten ke browser
ob_end_flush();
exit();
?>
