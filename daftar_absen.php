<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Daftar Presensi Guru - GARIS</title>

  <!-- CSS DataTables dan Bootstrap -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">
  <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>


  <!-- Custom Style -->
  <style>
    /* ======= Reset & Base Styles ======= */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    html, body {
      height: 100%;
      overflow-x: hidden;
    }

    body {
      font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
      background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
      min-height: 100vh;
    }

    /* ======= Main Container ======= */
    .main-container {
      min-height: 100vh;
      display: flex;
      flex-direction: column;
    }

    /* ======= Header Section ======= */
    .header-section {
      background: url('gambar sekolah.jpg') no-repeat center center;
      background-size: cover;
      height: 120px;
      position: relative;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-shrink: 0;
    }

    .header-section::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: rgba(0, 0, 0, 0.6);
    }

    .header-title {
      position: relative;
      z-index: 2;
      color: white;
      font-size: 1.75rem;
      font-weight: 700;
      text-align: center;
      text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
    }

    .back-btn {
      position: absolute;
      top: 1rem;
      left: 1rem;
      z-index: 10;
      display: inline-flex;
      align-items: center;
      gap: 0.5rem;
      color: white;
      text-decoration: none;
      font-weight: 500;
      font-size: 0.9rem;
      padding: 0.5rem 1rem;
      background: rgba(255, 255, 255, 0.2);
      backdrop-filter: blur(10px);
      border-radius: 50px;
      transition: all 0.3s ease;
    }

    .back-btn:hover {
      background: rgba(255, 255, 255, 0.3);
      color: white;
      transform: translateX(-3px);
    }

    /* ======= Content Section ======= */
    .content-section {
      flex: 1;
      background: white;
      border-radius: 24px 24px 0 0;
      margin-top: -20px;
      position: relative;
      z-index: 3;
      box-shadow: 0 -4px 20px rgba(0, 0, 0, 0.1);
      padding: 2rem;
    }

    /* ======= Filter Section ======= */
    .filter-section {
      background: #f8fafc;
      padding: 1.5rem;
      border-radius: 16px;
      margin-bottom: 1.5rem;
      border: 1px solid #e2e8f0;
    }

    .filter-section .form-label {
      font-weight: 600;
      color: #374151;
      font-size: 0.875rem;
      margin-bottom: 0.5rem;
    }

    .form-control {
      padding: 0.75rem 1rem;
      border-radius: 12px;
      border: 1px solid #d1d5db;
      font-size: 0.875rem;
      transition: all 0.2s ease;
      background: white;
    }

    .form-control:focus {
      outline: none;
      border-color: #3b82f6;
      box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
    }

    /* ======= Modern Date Input Styling ======= */
    .date-input-group {
      position: relative;
    }

    .date-input-group .form-control[type="date"] {
      padding-left: 3rem;
      background: white;
      cursor: pointer;
    }

    .date-input-group .form-control[type="date"]::-webkit-calendar-picker-indicator {
      opacity: 0;
      position: absolute;
      right: 0;
      width: 100%;
      height: 100%;
      cursor: pointer;
    }

    .date-input-group::before {
      content: '\f073';
      font-family: 'Font Awesome 6 Free';
      font-weight: 900;
      position: absolute;
      left: 1rem;
      top: 50%;
      transform: translateY(-50%);
      color: #6b7280;
      z-index: 1;
      pointer-events: none;
    }

    .date-input-group .form-control[type="date"]:focus::before {
      color: #3b82f6;
    }

    .date-input-group .form-control[type="date"]:valid {
      color: #374151;
    }

    .date-input-group .form-control[type="date"]:invalid {
      color: #9ca3af;
    }

    .btn {
      padding: 0.75rem 1.5rem;
      border-radius: 50px;
      font-weight: 600;
      font-size: 0.875rem;
      transition: all 0.3s ease;
      border: none;
    }

    .btn-primary {
      background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
      color: white;
      box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
    }

    .btn-primary:hover {
      transform: translateY(-2px);
      box-shadow: 0 6px 20px rgba(59, 130, 246, 0.4);
    }

    .btn-success {
      background: linear-gradient(135deg, #10b981 0%, #047857 100%);
      color: white;
      box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);
    }

    .btn-success:hover {
      transform: translateY(-2px);
      box-shadow: 0 6px 20px rgba(16, 185, 129, 0.4);
    }

    /* ======= Notion-Style Table ======= */
    .table-container {
      background: white;
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05), 0 1px 2px rgba(0, 0, 0, 0.1);
      border: 1px solid rgba(0, 0, 0, 0.06);
    }

    .table {
      margin: 0;
      border-collapse: separate;
      border-spacing: 0;
      font-size: 14px;
      line-height: 1.5;
    }

    /* Notion-style header */
    .table thead th {
      background: rgba(0, 0, 0, 0.02);
      font-weight: 500;
      color: rgba(0, 0, 0, 0.65);
      border: none;
      padding: 12px 16px;
      font-size: 12px;
      text-transform: uppercase;
      letter-spacing: 0.5px;
      border-bottom: 1px solid rgba(0, 0, 0, 0.06);
      position: sticky;
      top: 0;
      z-index: 10;
    }

    /* Notion-style cells */
    .table tbody td {
      vertical-align: middle;
      padding: 14px 16px;
      border: none;
      border-bottom: 1px solid rgba(0, 0, 0, 0.04);
      font-size: 14px;
      color: rgba(0, 0, 0, 0.8);
      line-height: 1.4;
      transition: background-color 0.1s ease;
    }

    /* Remove default striped styling */
    .table-striped tbody tr:nth-of-type(odd) {
      background-color: transparent;
    }

    /* Notion-style hover effect */
    .table tbody tr {
      transition: all 0.1s ease;
    }

    .table tbody tr:hover {
      background-color: rgba(0, 0, 0, 0.02);
    }

    /* Enhanced photo styling */
    .table-photo {
      width: 48px;
      height: 48px;
      border-radius: 6px;
      object-fit: cover;
      border: 1px solid rgba(0, 0, 0, 0.1);
      transition: transform 0.2s ease, box-shadow 0.2s ease;
      cursor: pointer;
    }

    .table-photo:hover {
      transform: scale(1.05);
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }

    /* Notion-style text styling */
    .table-name {
      font-weight: 500;
      color: rgba(0, 0, 0, 0.9);
    }

    .table-nip {
      color: rgba(0, 0, 0, 0.6);
      font-size: 13px;
      font-family: 'SF Mono', Monaco, 'Cascadia Code', 'Roboto Mono', Consolas, 'Courier New', monospace;
    }

    .table-status {
      display: inline-block;
      padding: 4px 8px;
      border-radius: 4px;
      font-size: 11px;
      font-weight: 500;
      text-transform: uppercase;
      letter-spacing: 0.3px;
      border: 1px solid;
    }

    .table-status.pns {
      background: rgba(59, 130, 246, 0.1);
      color: rgba(59, 130, 246, 0.8);
      border-color: rgba(59, 130, 246, 0.3);
    }

    .table-status.honorer {
      background: rgba(245, 158, 11, 0.1);
      color: rgba(245, 158, 11, 0.8);
      border-color: rgba(245, 158, 11, 0.3);
    }

    .table-status.kontrak {
      background: rgba(16, 185, 129, 0.1);
      color: rgba(16, 185, 129, 0.8);
      border-color: rgba(16, 185, 129, 0.3);
    }

    .table-time {
      color: rgba(0, 0, 0, 0.7);
      font-size: 13px;
      font-family: 'SF Mono', Monaco, 'Cascadia Code', 'Roboto Mono', Consolas, 'Courier New', monospace;
    }

    .table-date {
      color: rgba(0, 0, 0, 0.6);
      font-size: 13px;
      white-space: nowrap;
    }

    .table-day {
      color: rgba(0, 0, 0, 0.5);
      font-size: 12px;
      text-transform: capitalize;
    }

    /* Empty state styling */
    .table tbody tr.empty-state td {
      text-align: center;
      padding: 48px 16px;
      color: rgba(0, 0, 0, 0.4);
      font-style: italic;
    }

    .empty-state-icon {
      font-size: 32px;
      color: rgba(0, 0, 0, 0.2);
      margin-bottom: 12px;
    }

    /* ======= Notion-Style DataTables Controls ======= */
    .dataTables_wrapper {
      padding: 20px;
    }

    .dataTables_wrapper .dataTables_length,
    .dataTables_wrapper .dataTables_filter {
      margin-bottom: 16px;
    }

    .dataTables_wrapper .dataTables_length label,
    .dataTables_wrapper .dataTables_filter label {
      font-size: 13px;
      font-weight: 500;
      color: rgba(0, 0, 0, 0.65);
      margin-bottom: 0;
      display: flex;
      align-items: center;
      gap: 8px;
    }

    .dataTables_wrapper .dataTables_filter input {
      padding: 8px 12px;
      border-radius: 6px;
      border: 1px solid rgba(0, 0, 0, 0.15);
      font-size: 14px;
      background: white;
      transition: all 0.1s ease;
      margin-left: 8px;
    }

    .dataTables_wrapper .dataTables_filter input:focus {
      outline: none;
      border-color: rgba(59, 130, 246, 0.5);
      box-shadow: 0 0 0 2px rgba(59, 130, 246, 0.1);
    }

    .dataTables_wrapper .dataTables_length select {
      padding: 6px 8px;
      border-radius: 4px;
      border: 1px solid rgba(0, 0, 0, 0.15);
      font-size: 13px;
      background: white;
      margin-left: 8px;
    }

    .dataTables_wrapper .dataTables_info {
      font-size: 13px;
      color: rgba(0, 0, 0, 0.5);
      margin-top: 16px;
    }

    .dataTables_wrapper .dataTables_paginate {
      margin-top: 16px;
    }

    /* Notion-style pagination */
    .pagination {
      justify-content: center;
      margin: 0;
    }

    .pagination .page-item {
      margin: 0 2px;
    }

    .pagination .page-link {
      color: rgba(0, 0, 0, 0.6);
      border: 1px solid rgba(0, 0, 0, 0.1);
      border-radius: 4px;
      padding: 6px 12px;
      font-size: 13px;
      font-weight: 500;
      transition: all 0.1s ease;
      background: white;
    }

    .pagination .page-link:hover {
      background: rgba(0, 0, 0, 0.04);
      border-color: rgba(0, 0, 0, 0.15);
      color: rgba(0, 0, 0, 0.8);
    }

    .pagination .page-item.active .page-link {
      background: rgba(59, 130, 246, 1);
      border-color: rgba(59, 130, 246, 1);
      color: white;
    }

    .pagination .page-item.disabled .page-link {
      color: rgba(0, 0, 0, 0.3);
      background: rgba(0, 0, 0, 0.02);
      border-color: rgba(0, 0, 0, 0.06);
    }

    /* No data state */
    .dataTables_empty {
      text-align: center;
      padding: 48px 16px !important;
      color: rgba(0, 0, 0, 0.4) !important;
      font-style: italic;
    }

    .dataTables_empty::before {
      content: '\f508';
      font-family: 'Font Awesome 6 Free';
      font-weight: 400;
      font-size: 32px;
      color: rgba(0, 0, 0, 0.2);
      display: block;
      margin-bottom: 12px;
    }

    /* ======= Responsive Design ======= */
    @media (max-width: 768px) {
      .header-title {
        font-size: 1.5rem;
      }

      .content-section {
        padding: 1rem;
      }

      .filter-section {
        padding: 1rem;
      }

      .btn {
        padding: 0.625rem 1.25rem;
        font-size: 0.8rem;
      }
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
  <div class="main-container">
    <!-- Header Section -->
    <div class="header-section">
      <a href="index.php" class="back-btn">
        <i class="fas fa-arrow-left"></i>
        Kembali
      </a>
      <h1 class="header-title">Daftar Absensi Guru</h1>
    </div>

    <!-- Content Section -->
    <div class="content-section">
      <!-- Filter Section -->
      <div class="filter-section">
        <div class="row align-items-end">
          <div class="col-md-4">
            <label for="startDate" class="form-label">Dari Tanggal:</label>
            <div class="date-input-group">
              <input type="date" id="startDate" class="form-control">
            </div>
          </div>
          <div class="col-md-4">
            <label for="endDate" class="form-label">Sampai Tanggal:</label>
            <div class="date-input-group">
              <input type="date" id="endDate" class="form-control">
            </div>
          </div>
          <div class="col-md-4">
            <div class="d-flex gap-2 justify-content-md-end">
              <button id="filterBtn" class="btn btn-success">
                <i class="fas fa-filter me-2"></i>Filter
              </button>
              <button id="exportBtn" class="btn btn-primary">
                <i class="fas fa-file-excel me-2"></i>Export
              </button>
            </div>
          </div>
        </div>
      </div>

      <!-- Table Container -->
      <div class="table-container">
        <div class="table-responsive">
          <table id="absensiTable" class="table table-striped table-hover" style="width:100%">
            <thead>
              <tr>
                <th>Tanggal</th>
                <th>Nama Guru</th>
                <th>NIP</th>
                <th>Status Pegawai</th>
                <th>Hari</th>
                <th>Jam Masuk</th>
                <th>Jam Keluar</th>
                <th>Foto Masuk</th>
                <th>Foto Keluar</th>
                <th>Aksi<th>
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
          responsive: true,
          dom: 'Bfrtip',
          buttons: ['excel'] 
        });
      }

      data.forEach(row => {
dataTable.row.add([
  `<span class="table-date">${formatDateShort(row.tanggal)}</span>`,
  `<span class="table-name">${row.nama_guru}</span>`,
  `<span class="table-nip">${row.nip || '-'}</span>`,
  `<span class="table-status ${row.status_pegawai.toLowerCase()}">${row.status_pegawai}</span>`,
  `<span class="table-day">${row.hari}</span>`,
  `<span class="table-time">${row.jam_masuk || '-'}</span>`,
  `<span class="table-time">${row.jam_keluar || '-'}</span>`,
  row.foto_masuk ? `<img src="${row.foto_masuk}" class="table-photo" alt="Foto Masuk ${row.nama_guru}" onclick="showPhotoModal('${row.foto_masuk}', '${row.nama_guru} - Masuk')">` : '<span style="color: rgba(0,0,0,0.3);">-</span>',
  row.foto_keluar ? `<img src="${row.foto_keluar}" class="table-photo" alt="Foto Keluar ${row.nama_guru}" onclick="showPhotoModal('${row.foto_keluar}', '${row.nama_guru} - Keluar')">` : '<span style="color: rgba(0,0,0,0.3);">-</span>',
  `<button class="btn btn-danger btn-sm" onclick="hapusAbsensi(${row.id})">
     <i class="fas fa-trash"></i>
   </button>`
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

$('#exportBtn').click(function () {
  const start = $('#startDate').val();
  const end = $('#endDate').val();
  const url = `export_excel.php?startDate=${start}&endDate=${end}`;
  window.open(url, '_blank');
});

    // Format tanggal pendek untuk tabel
    function formatDateShort(dateString) {
      const date = new Date(dateString);
      const day = date.getDate().toString().padStart(2, '0');
      const month = (date.getMonth() + 1).toString().padStart(2, '0');
      const year = date.getFullYear();
      return `${day}/${month}/${year}`;
    }

    // Show photo modal
    function showPhotoModal(photoSrc, name) {
      // Create modal if it doesn't exist
      if (!document.getElementById('photoModal')) {
        const modalHTML = `
          <div class="modal fade" id="photoModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header border-0">
                  <h5 class="modal-title">Foto Absensi</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body text-center p-4">
                  <img id="modalPhoto" src="" alt="" class="img-fluid rounded" style="max-height: 400px;">
                  <p id="modalName" class="mt-3 mb-0 fw-medium"></p>
                </div>
              </div>
            </div>
          </div>
        `;
        document.body.insertAdjacentHTML('beforeend', modalHTML);
      }
      
      // Update modal content
      document.getElementById('modalPhoto').src = photoSrc;
      document.getElementById('modalPhoto').alt = `Foto ${name}`;
      document.getElementById('modalName').textContent = name;
      
      // Show modal
      const modal = new bootstrap.Modal(document.getElementById('photoModal'));
      modal.show();
    }

    function hapusAbsensi(id) {
  if (confirm("Yakin ingin menghapus data ini?")) {
    $.ajax({
      url: 'hapus_data.php',
      method: 'POST',
      data: { id: id },
      success: function (res) {
        if (res == 'OK') {
          alert('Data berhasil dihapus');
          loadAbsensi($('#startDate').val(), $('#endDate').val());
        } else {
          alert('Gagal menghapus data');
        }
      }
    });
  }
}


    // Make showPhotoModal globally accessible
    window.showPhotoModal = showPhotoModal;

    // Load awal saat halaman siap
    $(document).ready(function () {
      loadAbsensi();
    });
  </script>
</body>
</html>
