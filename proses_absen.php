<?php
require 'config.php';
date_default_timezone_set('Asia/Jakarta');

$nama_guru = $_POST['nama_guru'] ?? '';
$nip = $_POST['nip'] ?? '';
$status_pegawai = $_POST['status_pegawai'] ?? '';
$status_absen = $_POST['status_absen'] ?? '';
$image_data = $_POST['image_data'] ?? '';

$tanggal = date('Y-m-d');
$hari = date('l');
$jam = date('H:i:s');

// Simpan foto dari base64
$foto_path = null;
if (!empty($image_data)) {
    $folderPath = "uploads/";
    if (!is_dir($folderPath)) mkdir($folderPath, 0777, true);

    $image_parts = explode(";base64,", $image_data);
    if (count($image_parts) == 2) {
        $image_base64 = base64_decode($image_parts[1]);
        $filename = uniqid("absen_") . '.jpg';
        $file_path = $folderPath . $filename;
        file_put_contents($file_path, $image_base64);
        $foto_path = $file_path;
    }
}

// Validasi input
if (empty($nama_guru) || empty($status_absen)) {
    echo "Semua field harus diisi.";
    exit;
}

// Cek apakah guru sudah absen hari ini
$cek = $conn->prepare("SELECT * FROM absensi WHERE nama_guru = ? AND tanggal = ?");
$cek->bind_param("ss", $nama_guru, $tanggal);
$cek->execute();
$result = $cek->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    if ($status_absen == 'masuk') {
        if (!empty($row['jam_masuk'])) {
            echo "Anda sudah absen masuk hari ini.";
        } else {
            $sql = "UPDATE absensi SET jam_masuk=?, foto_masuk=? WHERE nama_guru=? AND tanggal=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssss", $jam, $foto_path, $nama_guru, $tanggal);
            $stmt->execute();
            echo "Absen masuk berhasil diupdate.";
        }
    } elseif ($status_absen == 'pulang') {
        if (!empty($row['jam_keluar'])) {
            echo "Anda sudah absen pulang hari ini.";
        } else {
            $sql = "UPDATE absensi SET jam_keluar=?, foto_keluar=? WHERE nama_guru=? AND tanggal=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssss", $jam, $foto_path, $nama_guru, $tanggal);
            $stmt->execute();
            echo "Absen pulang berhasil dicatat.";
        }
    }
} else {
    // Belum ada data, maka insert sesuai status
    if ($status_absen == 'masuk') {
        $sql = "INSERT INTO absensi (nama_guru, nip, status_pegawai, tanggal, hari, jam_masuk, foto_masuk)
                VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssss", $nama_guru, $nip, $status_pegawai, $tanggal, $hari, $jam, $foto_path);
        $stmt->execute();
        echo "Absen masuk berhasil dicatat.";
} elseif ($status_absen == 'pulang') {
    // Guru belum absen sama sekali hari ini, maka catat sebagai absen masuk saja
    $sql = "INSERT INTO absensi (nama_guru, nip, status_pegawai, tanggal, hari, jam_masuk, foto_masuk)
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssss", $nama_guru, $nip, $status_pegawai, $tanggal, $hari, $jam, $foto_path);
    $stmt->execute();
    echo "Karena Anda belum absen masuk, sistem mencatatnya sebagai absen masuk.";
}
}
?>
