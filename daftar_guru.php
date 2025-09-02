<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Daftar Guru</title>

  <!-- CSS DataTables & Bootstrap -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

  <style>
    body {
      font-family: 'Inter', sans-serif;
      background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
      min-height: 100vh;
    }
    .main-container {
      padding: 20px;
    }
    .header-section {
      background: #1d4ed8;
      color: white;
      padding: 20px;
      border-radius: 12px;
      margin-bottom: 20px;
      text-align: center;
    }
    .table-container {
      background: white;
      padding: 20px;
      border-radius: 12px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.05);
    }
    .table thead th {
      background: rgba(0,0,0,0.03);
      font-weight: 600;
      text-transform: uppercase;
      font-size: 12px;
    }
    .table td {
      font-size: 14px;
    }
  </style>
</head>
<body>

<div class="main-container">
  <!-- Header -->
  <div class="header-section">
    <h1 class="mb-0">Daftar Guru</h1>
  </div>

  <!-- Table -->
  <div class="table-container">
    <div class="table-responsive">
      <table id="guruTable" class="table table-striped table-hover" style="width:100%">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nama Guru</th>
            <th>NIP</th>
            <th>NUPTK</th>
            <th>Tempat Lahir</th>
            <th>Tanggal Lahir</th>
            <th>Usia</th>
            <th>NIK</th>
            <th>Jenis Kelamin</th>
            <th>Agama</th>
            <th>Status Pernikahan</th>
            <th>Alamat KTP</th>
            <th>RT</th>
            <th>RW</th>
            <th>Desa/Kel</th>
            <th>Kecamatan</th>
            <th>Kab/Kota</th>
            <th>Provinsi</th>
            <th>Sumber Gaji</th>
            <th>Status Pegawai</th>
            <th>Jenis Kepegawaian</th>
            <th>Golongan Ruang</th>
            <th>Jenjang</th>
            <th>Nama Lembaga</th>
            <th>Program Studi</th>
            <th>Tahun Lulus</th>
            <th>Jenis Jabatan</th>
            <th>Status Jabatan</th>
            <th>Masa Kerja</th>
            <th>TMT Pensiun</th>
            <th>Jabatan PTK</th>
            <th>Mapel</th>
            <th>Tunjangan Sertifikasi</th>
            <th>Unit Kerja</th>
            <th>Golongan Ruang CPNS</th>
            <th>TMT CPNS</th>
            <th>No SK Awal</th>
            <th>Tgl SK Awal</th>
            <th>No SK Terakhir</th>
            <th>Tgl SK Terakhir</th>
            <th>No HP</th>
          </tr>
        </thead>
        <tbody></tbody>
      </table>
    </div>
  </div>
</div>

<!-- JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

<script>
$(document).ready(function() {
  $('#guruTable').DataTable({
    ajax: {
      url: 'tampil_guru.php', // ganti dengan file PHP yang mengambil data dari database
      dataSrc: ''
    },
    dom: 'Bfrtip',
    buttons: ['excel'],
    columns: [
      { data: 'id' },
      { data: 'nama_guru' },
      { data: 'nip' },
      { data: 'NUPTK' },
      { data: 'TEMPAT_LAHIR' },
      { data: 'TANGGAL_LAHIR' },
      { data: 'USIA' },
      { data: 'NIK' },
      { data: 'JENIS_KELAMIN' },
      { data: 'AGAMA' },
      { data: 'STATUS_PERNIKAHAN' },
      { data: 'ALAMAT_KTP' },
      { data: 'RT' },
      { data: 'RW' },
      { data: 'DESA_KEL' },
      { data: 'KECAMATAN' },
      { data: 'ALAMAT_KABKOTA' },
      { data: 'ALAMAT_PROVINSI' },
      { data: 'SUMBER_GAJI' },
      { data: 'STATUS_PEGAWAI' },
      { data: 'JENIS_KEPEGAWAIAN' },
      { data: 'GOLONGAN_RUANG' },
      { data: 'JENJANG' },
      { data: 'NAMA_LEMBAGA' },
      { data: 'PROGRAM_STUDI' },
      { data: 'THN_LULUS' },
      { data: 'JENIS_JABATAN' },
      { data: 'STATUS_JABATAN' },
      { data: 'MASA_KERJA' },
      { data: 'TMT_PENSIUN' },
      { data: 'JABATAN_PTK' },
      { data: 'MAPEL' },
      { data: 'TUNJANGAN_SERTIFIKASI' },
      { data: 'UNIT_KERJA' },
      { data: 'GOLONGAN_RUANG_CPNS' },
      { data: 'TMT_CPNS' },
      { data: 'NOMOR_SK_AWAL' },
      { data: 'TANGGAL_SK_AWAL' },
      { data: 'NOMOR_SK_TERAKHIR' },
      { data: 'TANGGAL_SK_TERAKHIR' },
      { data: 'NOMOR_HANDPHONE' }
    ]
  });
});
</script>
</body>
</html>
