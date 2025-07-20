<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Absensi Guru</title>

  <!-- CSS DataTables dan Bootstrap -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">

  <!-- Custom Style -->
      <style>
      body {
  font-family: 'Nunito', sans-serif;
  background: linear-gradient(135deg, #eef2f7 0%, #dbe9f4 100%);
  padding: 30px 0;
  min-height: 100vh;
}

.container {
  max-width: 1200px;
}

.back-btn {
  display: inline-block;
  color: #4e73df;
  font-weight: 600;
  margin-bottom: 20px;
  text-decoration: none;
  transition: 0.3s;
}

.back-btn i {
  margin-right: 8px;
}

.back-btn:hover {
  color: #6a11cb;
  transform: translateX(-4px);
}

/* Card */
.card {
  border: none;
  border-radius: 18px;
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
  overflow: hidden;
}

/* Card Header */
.card-header {
  background: linear-gradient(90deg, #4e73df 0%, #6a11cb 100%);
  color: white;
  padding: 20px;
  border: none;
}

.card-header h3 {
  margin: 0;
  font-weight: 700;
}

/* Card Body */
.card-body {
  padding: 30px;
}

/* Filter Section */
.filter-section {
  background-color: #f8f9fc;
  border-radius: 12px;
  padding: 20px;
  margin-bottom: 20px;
}

.filter-section label {
  color: #4e73df;
  font-weight: 600;
}

.form-control, .form-select {
  border-radius: 10px;
  padding: 10px 15px;
  border: 1px solid #ddd;
}

.form-control:focus, .form-select:focus {
  border-color: #6a11cb;
  box-shadow: 0 0 0 0.2rem rgba(106, 17, 203, 0.2);
}

/* Tombol */
.btn-success {
  background-color: #00c896;
  color: white;
  border: none;
  border-radius: 50px;
  padding: 10px 20px;
  font-weight: 600;
  transition: 0.3s;
}

.btn-success:hover {
  background-color: #00b08a;
  transform: translateY(-2px);
}

.btn-primary {
  background-color: #7f3dfc;
  color: white;
  border: none;
  border-radius: 50px;
  padding: 10px 20px;
  font-weight: 600;
  transition: 0.3s;
}

.btn-primary:hover {
  background-color: #6a11cb;
  transform: translateY(-2px);
}

/* Tabel */
.table thead {
  background-color: #eef0ff;
  color: #4e73df;
}

.table th, .table td {
  vertical-align: middle;
  padding: 14px;
  border: none;
}

.table-striped tbody tr:nth-of-type(odd) {
  background-color: #f8f9fc;
}

.table-hover tbody tr:hover {
  background-color: #e9ecf6;
}

/* DataTables Custom */
.dataTables_wrapper .dataTables_filter input {
  border-radius: 30px;
  padding: 8px 15px;
  border: 1px solid #ccc;
}

.dataTables_wrapper .dataTables_length select {
  border-radius: 8px;
  padding: 6px 10px;
  border: 1px solid #ccc;
}

.pagination .page-item .page-link {
  border-radius: 10px;
  margin: 0 2px;
  color: #4e73df;
  border: none;
}

.pagination .page-item.active .page-link {
  background-color: #4e73df;
  color: white;
}

/* Gambar Thumbnail */
.img-thumbnail {
  border-radius: 10px;
  border: 2px solid #4e73df;
  padding: 3px;
  max-height: 60px;
}

    </style>

        <!-- JS Libraries -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.3/xlsx.full.min.js"></script>
</head>

<body>
  <div class="container">
    <!-- Tombol Kembali -->
    <a href="index.php" class="back-btn">
      <i class="bi bi-arrow-left-circle-fill"></i> Kembali ke Beranda
    </a>

    <!-- Card Absensi -->
    <div class="card">
      <div class="card-header">
        <h3><i class="bi bi-person-check-fill me-2"></i>Absensi Guru</h3>
      </div>

      <div class="card-body">
        <!-- Filter -->
        <div class="row filter-section">
          <div class="col-md-3">
            <label class="col-form-label">Dari Tanggal:</label>
            <input type="date" id="startDate" class="form-control">
          </div>
          <div class="col-md-3">
            <label class="col-form-label">Sampai Tanggal:</label>
            <input type="date" id="endDate" class="form-control">
          </div>
          <div class="col-md-6 d-flex align-items-end justify-content-md-end mt-3 mt-md-0">
            <button id="filterBtn" class="btn btn-success me-2">
              <i class="bi bi-funnel-fill"></i> Filter
            </button>
            <button id="exportBtn" class="btn btn-primary">
              <i class="bi bi-file-earmark-excel-fill"></i> Export
            </button>
          </div>
        </div>

        <!-- Tabel Absensi -->
        <div class="table-responsive mt-4">
          <table id="absensiTable" class="display nowrap table table-striped table-hover" style="width:100%">
            <thead>
              <tr>
                <th>Tanggal</th>
                <th>Nama Guru</th>
                <th>Hari</th>
                <th>Jam Masuk</th>
                <th>Jam Keluar</th>
                <th>Foto Masuk</th>
                <th>Foto Keluar</th>
              </tr>
            </thead>
            <tbody></tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <!-- Script JS -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.js"></script>

  <script>
    let dataTable;

    // Fungsi untuk load data absensi
    function loadAbsensi(startDate = '', endDate = '') {
      $.ajax({
        url: 'tampil_absensi.php',
        method: 'GET',
        data: {
          startDate: startDate,
          endDate: endDate
        },
        dataType: 'json',
        success: function (data) {
          if (dataTable) {
            dataTable.clear().draw();
          } else {
            dataTable = $('#absensiTable').DataTable({
              responsive: true
            });
          }

          data.forEach(row => {
            dataTable.row.add([
              row.tanggal,
              row.nama_guru,
              row.hari,
              row.jam_masuk ?? '-',
              row.jam_keluar ?? '-',
              row.foto_masuk ? `<img src="${row.foto_masuk}" width="60" class="img-thumbnail">` : '-',
              row.foto_keluar ? `<img src="${row.foto_keluar}" width="60" class="img-thumbnail">` : '-'
            ]);
          });

          dataTable.draw();
        }
      });
    }

    // Tombol filter
    $('#filterBtn').click(function () {
      const start = $('#startDate').val();
      const end = $('#endDate').val();
      loadAbsensi(start, end);
    });

    // Tombol export
    $('#exportBtn').click(function () {
      $('.buttons-excel').click();
    });

    // Load awal saat halaman siap
    $(document).ready(function () {
      loadAbsensi();
    });
  </script>
</body>
</html>
