<?php
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Border;
include 'koneksi.php';

if (isset($_GET['start_date']) && isset($_GET['end_date'])) {
    $start_date = $_GET['start_date'];
    $end_date = $_GET['end_date'];

    // Query untuk mendapatkan laporan transaksi berdasarkan tanggal
    $query = "SELECT DATE(waktu_transaksi) AS tanggal, SUM(total) AS total_pendapatan FROM transaksi WHERE waktu_transaksi BETWEEN '$start_date' AND '$end_date' GROUP BY DATE(waktu_transaksi)";
    $result = mysqli_query($conn, $query);

    // Query untuk menghitung jumlah pelanggan dan total pendapatan kumulatif
    $query_kumulatif = "SELECT COUNT(DISTINCT pelanggan_id) AS jumlah_pelanggan, SUM(total) AS total_pendapatan FROM transaksi WHERE waktu_transaksi BETWEEN '$start_date' AND '$end_date'";
    $result_kumulatif = mysqli_query($conn, $query_kumulatif);
    $data_total_kumulatif = mysqli_fetch_assoc($result_kumulatif); // Ambil hasil kumulatif

    // Membuat objek Spreadsheet
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    // Menulis judul laporan
    $sheet->setCellValue('A1', 'Rekap Laporan Penjualan');
    $sheet->setCellValue('A2', 'Dari Tanggal: ' . $start_date . ' Sampai Tanggal: ' . $end_date);

    // Membuat judul tabel dengan 2 kolom digabungkan
    $sheet->mergeCells('A4:A5');
    $sheet->setCellValue('A4', 'No');

    $sheet->mergeCells('B4:C4');
    $sheet->setCellValue('B4', 'Tanggal Transaksi');

    $sheet->mergeCells('D4:E4');
    $sheet->setCellValue('D4', 'Total Pendapatan');

    // Menulis data transaksi ke dalam Excel
    $row = 6;
    $no = 1;
    while ($data = mysqli_fetch_assoc($result)) {
        $sheet->setCellValue('A' . $row, $no++);
        $sheet->setCellValue('B' . $row, $data['tanggal']);
        $sheet->setCellValue('D' . $row, 'Rp ' . number_format($data['total_pendapatan'], 2, ',', '.'));
        $row++;
    }

    // Menambahkan baris kosong tanpa garis batas sebagai pemisah antara tabel
    $row++;

    // Menambahkan tabel jumlah pelanggan dan total pendapatan kumulatif tanpa border
    $sheet->mergeCells('A' . $row . ':B' . $row);
    $sheet->setCellValue('A' . $row, 'Jumlah Pelanggan');
    $sheet->setCellValue('C' . $row, $data_total_kumulatif['jumlah_pelanggan']);
    $row++;

    // Menambahkan tabel jumlah pendapatan dengan border
    $sheet->mergeCells('A' . $row . ':B' . $row);
    $sheet->setCellValue('A' . $row, 'Jumlah Pendapatan');
    $sheet->setCellValue('C' . $row, 'Rp ' . number_format($data_total_kumulatif['total_pendapatan'], 2, ',', '.'));

    // Menambahkan border pada tabel transaksi dan jumlah pendapatan
    $styleArray = [
        'borders' => [
            'allBorders' => [
                'borderStyle' => Border::BORDER_THIN,
                'color' => ['argb' => '000000'], // Warna garis border hitam
            ],
        ],
    ];

    // Border untuk tabel transaksi
    $sheet->getStyle('A4:E' . ($row - 3))->applyFromArray($styleArray);
    
    // Border untuk tabel jumlah pelanggan dan jumlah pendapatan
    $sheet->getStyle('A' . ($row - 1) . ':C' . $row)->applyFromArray($styleArray);

    // Menyimpan file Excel
    $writer = new Xlsx($spreadsheet);
    $filename = 'LaporanTransaksi.xlsx';

    // Mengirim file Excel ke browser untuk diunduh
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="' . $filename . '"');
    header('Cache-Control: max-age=0');
    
    $writer->save('php://output');
    exit;
}
?>
