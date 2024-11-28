<?php 
// Menghubungkan ke database
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekap Laporan Penjualan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .hidden { display: none; }
        .container { max-width: 1000px; }
        .filter-container { margin-top: 20px; }
        .chart-container { margin-bottom: 20px; }
        .card-header-custom {
            background-color: #007bff;
            color: white;
        }
        @media print {
            .no-print { display: none; }
        }
        
    </style>
</head>
<body>
    <!-- Konten utama -->
    <div class="container mt-4">
        <div class="card">
            <div class="card-header card-header-custom">
                <h2><center>Rekap Laporan Penjualan</center></h2>
            </div>
            <div class="card-body">
                <?php
                // Mengambil tanggal dari input filter, atau memberi nilai default jika tidak ada
                $start_date = isset($_GET['start_date']) ? $_GET['start_date'] : '';
                $end_date = isset($_GET['end_date']) ? $_GET['end_date'] : '';
                ?>

                <!-- Tombol Kembali (hanya muncul saat tidak cetak) -->
                <a href="tampilan.php" class="btn btn-primary mb-3 no-print">< Kembali</a>

                <!-- Form filter tanggal -->
                <form method="GET" action="report_transaksi.php" class="mb-3 filter-container <?php echo ($start_date && $end_date) ? 'hidden' : ''; ?>" id="filterForm">
                    <div class="row">
                        <div class="col-md-3">
                            <input type="date" name="start_date" class="form-control" required placeholder="Tanggal Mulai">
                        </div>
                        <div class="col-md-3">
                            <input type="date" name="end_date" class="form-control" required placeholder="Tanggal Selesai">
                        </div>
                        <div class="col-md-3">
                            <button type="submit" class="btn btn-success" onclick="hideFilter()">Tampilkan</button>
                        </div>
                    </div>
                </form>

                <!-- Konten Laporan -->
                <div id="reportContent" class="<?php echo ($start_date && $end_date) ? '' : 'hidden'; ?>">
                    <?php
                    if ($start_date && $end_date) {
                        echo "<div class='mb-3'>
                                <button class='btn btn-warning no-print' onclick='window.print()'>Cetak PDF</button>
                                <a href='cetak_csv.php?start_date=$start_date&end_date=$end_date' class='btn btn-warning no-print'>Cetak CSV</a>
                            </div>";
                    }
                    ?>

                    <?php
                    // Mendapatkan data transaksi dari database berdasarkan rentang tanggal
                    $transaksi = [];
                    if ($start_date && $end_date) {
                        $query = "SELECT waktu_transaksi AS tanggal, total FROM transaksi 
                                WHERE waktu_transaksi BETWEEN '$start_date' AND '$end_date'
                                ORDER BY waktu_transaksi";
                        $result = mysqli_query($conn, $query);

                        while ($row = mysqli_fetch_assoc($result)) {
                            $transaksi[] = $row;
                        }
                    }

                    // Memproses data untuk grafik dan tabel
                    $labels = [];
                    $data = [];
                    $total_pendapatan = 0;
                    $jumlah_pelanggan = count($transaksi);

                    foreach ($transaksi as $row) {
                        $labels[] = $row['tanggal'];
                        $data[] = $row['total'];
                        $total_pendapatan += $row['total'];
                    }

                    // Menampilkan Grafik di atas tabel
                    echo "<div class='chart-container'>
                            <canvas id='salesChart' width='400' height='200'></canvas>
                        </div>";

                    // Menampilkan tabel rekap transaksi
                    echo "<table class='table mt-4'>
                            <thead class='thead-light'>
                                <tr>
                                    <th>No</th>
                                    <th>Total</th>
                                    <th>Tanggal</th>
                                </tr>
                            </thead>
                            <tbody>";
                    foreach ($transaksi as $index => $row) {
                        echo "<tr>
                                <td>" . ($index + 1) . "</td>
                                <td>Rp" . number_format($row['total'], 0, ',', '.') . "</td>
                                <td>" . $row['tanggal'] . "</td>
                            </tr>";
                    }
                    echo "</tbody></table>";

                    // Menampilkan total jumlah pelanggan dan pendapatan
                    echo "<div class='row'>
                            <div class='col-md-6'>
                                <table class='table'>
                                <thead class='thead-light'>
                                    <tr>
                                        <th>Jumlah Pelanggan</th>
                                        <th>Jumlah Pendapatan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>" . $jumlah_pelanggan . " Orang</td>
                                    <td>Rp" . number_format($total_pendapatan, 0, ',', '.') . "</td>
                                </tr>
                                </tbody>
                                </table>
                            </div>
                        </div>";
                    ?>

                    <script>
                        // Fungsi untuk menyembunyikan form filter
                        function hideFilter() {
                            document.getElementById('filterForm').classList.add('hidden');
                            document.getElementById('reportContent').classList.remove('hidden');
                        }

                        // Grafik batang menggunakan Chart.js
                        const ctx = document.getElementById('salesChart').getContext('2d');
                        const salesChart = new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: <?php echo json_encode($labels); ?>,
                                datasets: [{
                                    label: 'Total',
                                    data: <?php echo json_encode($data); ?>,
                                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                    borderColor: 'rgba(75, 192, 192, 1)',
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                scales: {
                                    y: {
                                        beginAtZero: true,
                                        ticks: {
                                            callback: function(value) {
                                                return 'Rp' + value.toLocaleString();
                                            }
                                        }
                                    }
                                }
                            }
                        });

                        // Fungsi untuk mengunduh Excel
                        function printExcel() {
                            window.location.href = 'cetak_excel.php?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>';
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>
</body>
</html>