<?php
require 'vendor/autoload.php'; // pastikan path Composer sudah benar
require 'config.php'; // koneksi ke database

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

// Ambil parameter tanggal jika ada
$startDate = $_GET['startDate'] ?? '';
$endDate = $_GET['endDate'] ?? '';

// Query data absensi
$sql = "SELECT * FROM absensi WHERE 1=1";
if ($startDate && $endDate) {
    $sql .= " AND tanggal BETWEEN '$startDate' AND '$endDate'";
}
$sql .= " ORDER BY tanggal DESC";
$result = $conn->query($sql);

// Buat spreadsheet baru
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setTitle('Data Absensi');

// Header kolom
$headers = ['Tanggal', 'Nama Guru', 'NIP', 'Status Pegawai', 'Hari', 'Jam Masuk', 'Jam Keluar', 'Foto Masuk', 'Foto Keluar'];
$sheet->fromArray($headers, NULL, 'A1');

// Mulai dari baris ke-2
$rowNum = 2;

while ($row = $result->fetch_assoc()) {
    // Isi data teks
    $sheet->setCellValue("A{$rowNum}", $row['tanggal']);
    $sheet->setCellValue("B{$rowNum}", $row['nama_guru']);
    $sheet->setCellValue("C{$rowNum}", $row['nip']);
    $sheet->setCellValue("D{$rowNum}", $row['status_pegawai']);
    $sheet->setCellValue("E{$rowNum}", $row['hari']);
    $sheet->setCellValue("F{$rowNum}", $row['jam_masuk']);
    $sheet->setCellValue("G{$rowNum}", $row['jam_keluar']);

    // Tambahkan Foto Masuk jika ada
    if (!empty($row['foto_masuk']) && file_exists($row['foto_masuk'])) {
        $drawingMasuk = new Drawing();
        $drawingMasuk->setPath($row['foto_masuk']);
        $drawingMasuk->setCoordinates("H{$rowNum}");
        $drawingMasuk->setHeight(60);
        $drawingMasuk->setWorksheet($sheet);
    }

    // Tambahkan Foto Keluar jika ada
    if (!empty($row['foto_keluar']) && file_exists($row['foto_keluar'])) {
        $drawingKeluar = new Drawing();
        $drawingKeluar->setPath($row['foto_keluar']);
        $drawingKeluar->setCoordinates("I{$rowNum}");
        $drawingKeluar->setHeight(60);
        $drawingKeluar->setWorksheet($sheet);
    }

    // Tinggi baris agar gambar muat
    $sheet->getRowDimension($rowNum)->setRowHeight(70);

    $rowNum++;
}

// Set auto-width kolom
foreach (range('A', 'I') as $col) {
    $sheet->getColumnDimension($col)->setAutoSize(true);
}

// Output sebagai file download
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="absensi_guru.xlsx"');
header('Cache-Control: max-age=0');

$writer = new Xlsx($spreadsheet);
$writer->save('php://output');
exit;
