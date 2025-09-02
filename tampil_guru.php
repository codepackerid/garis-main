<?php
include 'config.php';

header('Content-Type: application/json');

// Query ambil data guru
$sql = "SELECT 
    id,
    nama_guru,
    nip,
    NUPTK,
    TEMPAT_LAHIR,
    TANGGAL_LAHIR,
    USIA,
    NIK,
    JENIS_KELAMIN,
    AGAMA,
    STATUS_PERNIKAHAN,
    ALAMAT_KTP,
    RT,
    RW,
    DESA_KEL,
    KECAMATAN,
    ALAMAT_KABKOTA,
    ALAMAT_PROVINSI,
    SUMBER_GAJI,
    STATUS_PEGAWAI,
    JENIS_KEPEGAWAIAN,
    GOLONGAN_RUANG,
    JENJANG,
    NAMA_LEMBAGA,
    PROGRAM_STUDI,
    THN_LULUS,
    JENIS_JABATAN,
    STATUS_JABATAN,
    MASA_KERJA,
    TMT_PENSIUN,
    JABATAN_PTK,
    MAPEL,
    TUNJANGAN_SERTIFIKASI,
    UNIT_KERJA,
    GOLONGAN_RUANG_CPNS,
    TMT_CPNS,
    NOMOR_SK_AWAL,
    TANGGAL_SK_AWAL,
    NOMOR_SK_TERAKHIR,
    TANGGAL_SK_TERAKHIR,
    NOMOR_HANDPHONE
FROM identitas_guru";

$result = $conn->query($sql);

$data = [];
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

// Output dalam format JSON
echo json_encode($data, JSON_UNESCAPED_UNICODE);

$conn->close();
