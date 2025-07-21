<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Form Absensi Guru</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

  <!-- Webcam.js -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.26/webcam.min.js"></script>

  <style>
    body {
      background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
      font-family: 'Nunito', sans-serif;
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 30px;
    }
    .main-box {
      background: #fff;
      border-radius: 20px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
      overflow: hidden;
      max-width: 1000px;
      width: 100%;
    }
    .row.no-gutters {
      margin: 0;
    }
    .left-col {
      background: url('flyergkp.png') no-repeat center center;
      background-size: cover;
      position: relative;
      min-height: 500px;
    }
    .left-col::before {
      content: '';
      position: absolute;
      top: 0; left: 0; right: 0; bottom: 0;
      background: rgba(0, 0, 0, 0.5);
    }
    .left-col-content {
      position: relative;
      z-index: 2;
      color: white;
      padding: 20px;
      text-align: center;
      height: 100%;
      display: flex;
      flex-direction: column;
      justify-content: center;
    }
    .left-col-content h2 {
      font-size: 2.2rem;
      margin-bottom: 10px;
    }
    .form-container {
      padding: 30px;
    }
    #my_camera {
      width: 100%;
      height: auto;
      border-radius: 10px;
      overflow: hidden;
      border: 3px solid #4e73df;
      margin-bottom: 10px;
    }
    #results img {
      max-width: 100%;
      border: 3px solid #4e73df;
      border-radius: 10px;
    }
    .camera-btn, .submit-btn {
      background: linear-gradient(135deg, #4e73df 0%, #6610f2 100%);
      color: white;
      font-weight: 600;
      border: none;
      padding: 10px 20px;
      border-radius: 50px;
      transition: all 0.3s;
      width: 100%;
    }
    .camera-btn:hover, .submit-btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
    }
    .form-label {
      color: #4e73df;
      font-weight: bold;
    }
    @media (max-width: 768px) {
      .left-col {
        display: none;
      }
    }
  </style>
</head>
<body>

<div class="main-box">
  <div class="row no-gutters">
    <div class="col-md-7 left-col">
      <div class="left-col-content">
        <h2>Absensi Guru</h2>
        <p>Gunakan kamera untuk mengambil foto saat absen.</p>
      </div>
    </div>
    <div class="col-md-5">
      <div class="form-container">
        <h3 class="text-center mb-4">Form Absensi</h3>
        <form id="formAbsen" method="POST" action="proses_absen.php">
          <div id="my_camera"></div>
          <button type="button" class="camera-btn mb-3" onclick="takeSnapshot()">Ambil Foto</button>
          <input type="hidden" name="image_data" id="image_data">
          <div id="results" class="mb-3 text-center"></div>

          <div class="mb-3">
            <label class="form-label">Cari Nama atau NIP</label>
            <input type="text" id="search_guru" class="form-control" placeholder="Ketik Nama atau NIP...">
          </div>

          <div class="mb-3">
            <label class="form-label">Nama Guru</label>
            <input type="text" name="nama_guru" id="nama_guru" class="form-control" readonly>
          </div>

          <div class="mb-3">
            <label class="form-label">NIP</label>
            <input type="text" name="nip" id="nip" class="form-control" readonly>
          </div>

          <div class="mb-3">
            <label class="form-label">Status Pegawai</label>
            <input type="text" name="status_pegawai" id="status_pegawai" class="form-control" readonly>
          </div>

          <div class="mb-3">
            <label class="form-label">Tanggal</label>
            <input type="text" name="tanggal" id="tanggal" class="form-control" readonly>
          </div>

          <div class="mb-3">
            <label class="form-label">Hari</label>
            <input type="text" name="hari" id="hari" class="form-control" readonly>
          </div>

          <div class="mb-3">
            <label class="form-label">Jam</label>
            <input type="text" name="jam" id="jam" class="form-control" readonly>
          </div>

          <div class="mb-3">
            <label class="form-label">Status Absen</label><br />
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="status_absen" value="masuk" required>
              <label class="form-check-label">Masuk</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="status_absen" value="pulang">
              <label class="form-check-label">Pulang</label>
            </div>
          </div>

          <button type="submit" class="submit-btn">Submit Absensi</button>
        </form>

        <div class="modal fade" id="modalNotif" tabindex="-1" aria-labelledby="modalNotifLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="modalNotifLabel">Berhasil</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Tutup"></button>
              </div>
              <div class="modal-body" id="modalBody">
                Absen berhasil dicatat.
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">OK</button>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
  Webcam.set({
    width: 320,
    height: 240,
    image_format: 'jpeg',
    jpeg_quality: 90
  });
  Webcam.attach('#my_camera');

  function takeSnapshot() {
    Webcam.snap(function(data_uri) {
      document.getElementById('image_data').value = data_uri;
      document.getElementById('results').innerHTML = `
        <img src="${data_uri}" class="img-thumbnail mt-2" alt="Hasil Foto">
        <p class="mt-2 text-success fw-semibold">Foto berhasil diambil.</p>
      `;
    });
  }

  function updateWaktu() {
    const now = new Date();
    document.getElementById('hari').value = now.toLocaleDateString('id-ID', { weekday: 'long' });
    document.getElementById('tanggal').value = now.toLocaleDateString('id-ID');
    document.getElementById('jam').value = now.toLocaleTimeString('id-ID');
  }
  setInterval(updateWaktu, 1000);
  updateWaktu();

  document.getElementById("formAbsen").addEventListener("submit", function(e) {
    e.preventDefault();
    if (!document.getElementById("image_data").value) {
      alert("Silakan ambil foto terlebih dahulu!");
      return;
    }

    const formData = new FormData(this);
    fetch('proses_absen.php', {
      method: 'POST',
      body: formData
    })
    .then(res => res.text())
    .then(data => {
      document.getElementById("modalBody").innerHTML = data;
      new bootstrap.Modal(document.getElementById("modalNotif")).show();
    })
    .catch(err => {
      alert("Gagal mengirim data: " + err);
    });
  });

  document.getElementById("search_guru").addEventListener("input", function () {
    const query = this.value.trim();
    if (query.length < 3) return;
    fetch(`cari_guru.php?q=${encodeURIComponent(query)}`)
      .then(response => response.json())
      .then(data => {
        if (data && data.nama_guru) {
          document.getElementById("nama_guru").value = data.nama_guru;
          document.getElementById("nip").value = data.nip;
          document.getElementById("status_pegawai").value = data.status_pegawai;
        } else {
          document.getElementById("nama_guru").value = '';
          document.getElementById("nip").value = '';
          document.getElementById("status_pegawai").value = '';
        }
      })
      .catch(err => {
        console.error("Gagal mengambil data guru:", err);
      });
  });
</script>

</body>
</html>
