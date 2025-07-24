<?php
include 'config.php';

header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=export_data.xls");

$type = $_GET['type'] ?? 'bukutamu';
$startDate = $_GET['startDate'] ?? '';
$endDate = $_GET['endDate'] ?? '';

echo "<table border='1'>";

if ($type === 'absensi') {
    echo "<tr>
            <th>Tanggal</th>
            <th>Nama Guru</th>
            <th>Hari</th>
            <th>Jam Masuk</th>
            <th>Jam Keluar</th>
          </tr>";

    $sql = "SELECT a.*, g.nama FROM absensi a 
            LEFT JOIN guru g ON a.id_guru = g.id";

    if (!empty($startDate) && !empty($endDate)) {
        $sql .= " WHERE a.tanggal BETWEEN '$startDate' AND '$endDate'";
    }

    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['tanggal']}</td>
                <td>{$row['nama']}</td>
                <td>{$row['hari']}</td>
                <td>{$row['jam_masuk']}</td>
                <td>{$row['jam_keluar']}</td>
              </tr>";
    }
} else {
    echo "<tr>
            <th>Nama</th>
            <th>Tujuan</th>
            <th>Asal</th>
            <th>Keperluan</th>
            <th>Tanggal</th>
            <th>Waktu</th>
          </tr>";

    $sql = "SELECT * FROM buku_tamu";
    if (!empty($startDate) && !empty($endDate)) {
        $sql .= " WHERE tanggal_kunjungan BETWEEN '$startDate' AND '$endDate'";
    }

    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['nama']}</td>
                <td>{$row['tujuan']}</td>
                <td>{$row['asal']}</td>
                <td>{$row['keperluan']}</td>
                <td>{$row['tanggal_kunjungan']}</td>
                <td>{$row['waktu_kunjungan']}</td>
              </tr>";
    }
}

echo "</table>";
