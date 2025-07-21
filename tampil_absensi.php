<?php
include 'config.php';

$startDate = isset($_GET['startDate']) ? $_GET['startDate'] : '';
$endDate = isset($_GET['endDate']) ? $_GET['endDate'] : '';

$sql = "SELECT id, nama_guru, tanggal, hari, jam_masuk, foto_masuk, jam_keluar, foto_keluar, nip, status_pegawai FROM absensi";

if (!empty($startDate) && !empty($endDate)) {
    $sql .= " WHERE tanggal BETWEEN '$startDate' AND '$endDate'";
}

$sql .= " ORDER BY tanggal DESC";

$result = $conn->query($sql);
$data = [];

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Ubah null menjadi string kosong untuk aman di frontend
        foreach ($row as $key => $value) {
            $row[$key] = $value ?? '';
        }

        $data[] = $row;
    }
}

header('Content-Type: application/json');
echo json_encode($data);
?>
