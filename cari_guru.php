<?php
require 'config.php'; // pastikan ini sesuai dengan file koneksi database kamu

$q = $_GET['q'] ?? '';

if (empty($q)) {
    echo json_encode([]);
    exit;
}

// Amankan input
$q = $conn->real_escape_string($q);

// Cari berdasarkan nama atau NIP
$sql = "SELECT nama_guru, nip, status_pegawai FROM identitas_guru
        WHERE nama_guru LIKE '%$q%' OR nip LIKE '%$q%' LIMIT 1";

$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    echo json_encode($result->fetch_assoc());
} else {
    echo json_encode([]);
}
?>
