<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Form Input Guru</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      background-color: #f8f9fa;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    .card {
      border: none;
      border-radius: 15px;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
    }
    .card-header {
      background: linear-gradient(90deg, #0d6efd, #0dcaf0);
      color: white;
      font-size: 1.2rem;
      font-weight: bold;
      border-top-left-radius: 15px;
      border-top-right-radius: 15px;
    }
    label {
      font-weight: 500;
      margin-top: 10px;
    }
    .btn-primary {
      background-color: #0d6efd;
      border-radius: 10px;
      padding: 10px 20px;
      font-size: 1rem;
    }
  </style>
</head>
<body>

<div class="container my-5">
      <div class="header-section">
      <a href="index_admin.php" class="back-btn">
        <i class="fas fa-arrow-left"></i>
        Kembali
      </a>
    </div>
  <div class="card">
    <div class="card-header">
      Form Input Data Guru
    </div>
    <div class="card-body">
      <form action="simpan_guru.php" method="POST">
        <div class="row">
          <!-- Kolom Kiri -->
          <div class="col-md-6">
            <label>Nama Guru</label>
            <input type="text" name="nama_guru" class="form-control" required>

            <label>NIP</label>
            <input type="text" name="nip" class="form-control">

            <label>NUPTK</label>
            <input type="text" name="nuptk" class="form-control">

            <label>Tempat Lahir</label>
            <input type="text" name="tempat_lahir" class="form-control">

            <label>Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" class="form-control">

            <label>Usia</label>
            <input type="number" name="usia" class="form-control">

            <label>NIK</label>
            <input type="text" name="nik" class="form-control">

            <label>Jenis Kelamin</label>
            <select name="jenis_kelamin" class="form-control">
              <option value="Laki-laki">Laki-laki</option>
              <option value="Perempuan">Perempuan</option>
            </select>

            <label>Agama</label>
            <input type="text" name="agama" class="form-control">

            <label>Status Pernikahan</label>
            <input type="text" name="status_pernikahan" class="form-control">

            <label>Alamat KTP</label>
            <textarea name="alamat_ktp" class="form-control"></textarea>

            <label>RT</label>
            <input type="text" name="rt" class="form-control">

            <label>RW</label>
            <input type="text" name="rw" class="form-control">

            <label>Desa/Kel</label>
            <input type="text" name="desa_kel" class="form-control">

            <label>Kecamatan</label>
            <input type="text" name="kecamatan" class="form-control">
          </div>

          <!-- Kolom Kanan -->
          <div class="col-md-6">
            <label>Kabupaten/Kota</label>
            <input type="text" name="alamat_kabkota" class="form-control">

            <label>Provinsi</label>
            <input type="text" name="alamat_provinsi" class="form-control">

            <label>Sumber Gaji</label>
            <input type="text" name="sumber_gaji" class="form-control">

            <label>Status Pegawai</label>
            <input type="text" name="status_pegawai" class="form-control">

            <label>Jenis Kepegawaian</label>
            <input type="text" name="jenis_kepegawaian" class="form-control">

            <label>Golongan Ruang</label>
            <input type="text" name="golongan_ruang" class="form-control">

            <label>Jenjang</label>
            <input type="text" name="jenjang" class="form-control">

            <label>Nama Lembaga</label>
            <input type="text" name="nama_lembaga" class="form-control">

            <label>Program Studi</label>
            <input type="text" name="program_studi" class="form-control">

            <label>Tahun Lulus</label>
            <input type="number" name="thn_lulus" class="form-control">

            <label>Jenis Jabatan</label>
            <input type="text" name="jenis_jabatan" class="form-control">

            <label>Status Jabatan</label>
            <input type="text" name="status_jabatan" class="form-control">

            <label>Masa Kerja</label>
            <input type="text" name="masa_kerja" class="form-control">

            <label>TMT Pensiun</label>
            <input type="date" name="tmt_pensiun" class="form-control">

            <label>Jabatan PTK</label>
            <input type="text" name="jabatan_ptk" class="form-control">

            <label>Mapel</label>
            <input type="text" name="mapel" class="form-control">

            <label>Tunjangan Sertifikasi</label>
            <input type="text" name="tunjangan_sertifikasi" class="form-control">

            <label>Unit Kerja</label>
            <input type="text" name="unit_kerja" class="form-control">

            <label>Golongan Ruang CPNS</label>
            <input type="text" name="golongan_ruang_cpns" class="form-control">

            <label>TMT CPNS</label>
            <input type="date" name="tmt_cpns" class="form-control">

            <label>Nomor SK Awal</label>
            <input type="text" name="nomor_sk_awal" class="form-control">

            <label>Tanggal SK Awal</label>
            <input type="date" name="tanggal_sk_awal" class="form-control">

            <label>Nomor SK Terakhir</label>
            <input type="text" name="nomor_sk_terakhir" class="form-control">

            <label>Tanggal SK Terakhir</label>
            <input type="date" name="tanggal_sk_terakhir" class="form-control">

            <label>Nomor Handphone</label>
            <input type="text" name="nomor_handphone" class="form-control">
          </div>
        </div>

        <div class="text-end mt-4">
          <button type="submit" class="btn btn-primary">Simpan Data</button>
        </div>
      </form>
    </div>
  </div>
</div>

</body>
</html>
