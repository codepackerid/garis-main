<?php
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_guru          = $_POST['nama_guru'];
    $nip                = $_POST['nip'];
    $nuptk              = $_POST['nuptk'];
    $tempat_lahir       = $_POST['tempat_lahir'];
    $tanggal_lahir      = $_POST['tanggal_lahir'];
    $usia               = $_POST['usia'];
    $nik                = $_POST['nik'];
    $jenis_kelamin      = $_POST['jenis_kelamin'];
    $agama              = $_POST['agama'];
    $status_pernikahan  = $_POST['status_pernikahan'];
    $alamat_ktp         = $_POST['alamat_ktp'];
    $rt                 = $_POST['rt'];
    $rw                 = $_POST['rw'];
    $desa_kel           = $_POST['desa_kel'];
    $kecamatan          = $_POST['kecamatan'];
    $alamat_kabkota     = $_POST['alamat_kabkota'];
    $alamat_provinsi    = $_POST['alamat_provinsi'];
    $sumber_gaji        = $_POST['sumber_gaji'];
    $status_pegawai     = $_POST['status_pegawai'];
    $jenis_kepegawaian  = $_POST['jenis_kepegawaian'];
    $golongan_ruang     = $_POST['golongan_ruang'];
    $jenjang            = $_POST['jenjang'];
    $nama_lembaga       = $_POST['nama_lembaga'];
    $program_studi      = $_POST['program_studi'];
    $thn_lulus          = $_POST['thn_lulus'];
    $jenis_jabatan      = $_POST['jenis_jabatan'];
    $status_jabatan     = $_POST['status_jabatan'];
    $masa_kerja         = $_POST['masa_kerja'];
    $tmt_pensiun        = $_POST['tmt_pensiun'];
    $jabatan_ptk        = $_POST['jabatan_ptk'];
    $mapel              = $_POST['mapel'];
    $tunjangan_sertifikasi = $_POST['tunjangan_sertifikasi'];
    $unit_kerja         = $_POST['unit_kerja'];
    $golongan_ruang_cpns = $_POST['golongan_ruang_cpns'];
    $tmt_cpns           = $_POST['tmt_cpns'];
    $nomor_sk_awal      = $_POST['nomor_sk_awal'];
    $tanggal_sk_awal    = $_POST['tanggal_sk_awal'];
    $nomor_sk_terakhir  = $_POST['nomor_sk_terakhir'];
    $tanggal_sk_terakhir= $_POST['tanggal_sk_terakhir'];
    $nomor_handphone    = $_POST['nomor_handphone'];

    $sql = "INSERT INTO identitas_guru (
        nama_guru, nip, nuptk, tempat_lahir, tanggal_lahir, usia, nik, jenis_kelamin, agama, status_pernikahan,
        alamat_ktp, rt, rw, desa_kel, kecamatan, alamat_kabkota, alamat_provinsi,
        sumber_gaji, status_pegawai, jenis_kepegawaian, golongan_ruang, jenjang, nama_lembaga, program_studi, thn_lulus,
        jenis_jabatan, status_jabatan, masa_kerja, tmt_pensiun, jabatan_ptk, mapel, tunjangan_sertifikasi,
        unit_kerja, golongan_ruang_cpns, tmt_cpns, nomor_sk_awal, tanggal_sk_awal,
        nomor_sk_terakhir, tanggal_sk_terakhir, nomor_handphone
    ) VALUES (
        '$nama_guru','$nip','$nuptk','$tempat_lahir','$tanggal_lahir','$usia','$nik','$jenis_kelamin','$agama','$status_pernikahan',
        '$alamat_ktp','$rt','$rw','$desa_kel','$kecamatan','$alamat_kabkota','$alamat_provinsi',
        '$sumber_gaji','$status_pegawai','$jenis_kepegawaian','$golongan_ruang','$jenjang','$nama_lembaga','$program_studi','$thn_lulus',
        '$jenis_jabatan','$status_jabatan','$masa_kerja','$tmt_pensiun','$jabatan_ptk','$mapel','$tunjangan_sertifikasi',
        '$unit_kerja','$golongan_ruang_cpns','$tmt_cpns','$nomor_sk_awal','$tanggal_sk_awal',
        '$nomor_sk_terakhir','$tanggal_sk_terakhir','$nomor_handphone'
    )";

    if ($conn->query($sql) === TRUE) {
        echo "✅ Data guru berhasil disimpan";
    } else {
        echo "❌ Error: " . $conn->error;
    }
}
?>
