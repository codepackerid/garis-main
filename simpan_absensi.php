<?php
require 'config.php';

$id_guru = $_POST['id_guru'] ?? null;
$tipe = $_POST['tipe'] ?? null;

if (!$id_guru || !$tipe) {
  echo json_encode(['success' => false, 'message' => 'Data tidak lengkap']);
  exit;
}

$tanggal = date('Y-m-d');
$jam = date('H:i:s');
$hari = date('l');

// Logika Absen Masuk
if ($tipe === 'masuk') {
  // Cek apakah sudah absen hari ini
  $cek = $conn->prepare("SELECT * FROM absensi WHERE id_guru = ? AND tanggal = ?");
  $cek->bind_param("is", $id_guru, $tanggal);
  $cek->execute();
  $result = $cek->get_result();

  if ($result->num_rows > 0) {
    echo json_encode(['success' => false, 'message' => 'Anda sudah absen masuk hari ini.']);
  } else {
    $stmt = $conn->prepare("INSERT INTO absensi (id_guru, tanggal, hari, jam_masuk) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("isss", $id_guru, $tanggal, $hari, $jam);
    if ($stmt->execute()) {
      echo json_encode(['success' => true, 'message' => 'Absen masuk berhasil!']);
    } else {
      echo json_encode(['success' => false, 'message' => 'Gagal menyimpan data absen masuk']);
    }
  }

// Logika Absen Pulang
} elseif ($tipe === 'pulang') {
  $stmt = $conn->prepare("UPDATE absensi SET jam_keluar = ? WHERE id_guru = ? AND tanggal = ?");
  $stmt->bind_param("sis", $jam, $id_guru, $tanggal);
  if ($stmt->execute()) {
    echo json_encode(['success' => true, 'message' => 'Absen pulang berhasil!']);
  } else {
    echo json_encode(['success' => false, 'message' => 'Gagal memperbarui jam keluar']);
  }

} else {
  echo json_encode(['success' => false, 'message' => 'Tipe absen tidak valid']);
}
?>
