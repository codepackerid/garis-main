<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Buku Tamu Digital - GARIS</title>

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.26/webcam.min.js"></script>

  <style>
    /* ======= Reset & Base Styles ======= */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    html, body {
      height: 100%;
      overflow: hidden;
    }

    body {
      font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
      background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
    }

    /* ======= Main Container ======= */
    .main-container {
      height: 100vh;
      display: flex;
      flex-direction: column;
    }

    /* ======= Header Section ======= */
    .header-section {
      background: url('gambar sekolah.jpg') no-repeat center center;
      background-size: cover;
      height: 100px;
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
      display: flex;
      background: white;
      border-radius: 24px 24px 0 0;
      margin-top: -20px;
      position: relative;
      z-index: 3;
      box-shadow: 0 -4px 20px rgba(0, 0, 0, 0.1);
      overflow: hidden;
    }

    /* ======= Left Panel - Camera ======= */
    .camera-panel {
      flex: 0 0 45%;
      padding: 1.5rem;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      background: #f8fafc;
      border-right: 1px solid #e2e8f0;
    }

    .camera-title {
      font-size: 1rem;
      font-weight: 600;
      color: #1e293b;
      margin-bottom: 1rem;
      text-align: center;
    }

    .camera-container {
      position: relative;
      margin-bottom: 1rem;
    }

    .camera-status {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 0.5rem;
      margin-bottom: 0.75rem;
      padding: 0.5rem;
      background: rgba(34, 197, 94, 0.1);
      border: 1px solid #86efac;
      border-radius: 8px;
      font-size: 0.8rem;
      color: #15803d;
    }

    .camera-status.waiting {
      background: rgba(251, 191, 36, 0.1);
      border-color: #fde047;
      color: #a16207;
    }

    .camera-status.error {
      background: rgba(239, 68, 68, 0.1);
      border-color: #fca5a5;
      color: #dc2626;
    }

    #my_camera {
      width: 280px;
      height: 210px;
      border-radius: 16px;
      overflow: hidden;
      border: 3px solid #e2e8f0;
      background: #f1f5f9;
      position: relative;
    }

    .camera-placeholder {
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      background: #f8fafc;
      color: #64748b;
      font-size: 0.9rem;
      text-align: center;
      padding: 1rem;
    }

    .camera-placeholder i {
      font-size: 2rem;
      margin-bottom: 0.5rem;
      opacity: 0.5;
    }

    #results {
      margin-top: 1rem;
      position: relative;
    }

    #results img {
      width: 280px;
      height: 210px;
      object-fit: cover;
      border-radius: 16px;
      border: 3px solid #10b981;
      box-shadow: 0 4px 12px rgba(16, 185, 129, 0.2);
    }

    .photo-feedback {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 0.5rem;
      margin-top: 0.75rem;
      padding: 0.5rem 1rem;
      background: rgba(16, 185, 129, 0.1);
      border: 1px solid #6ee7b7;
      border-radius: 8px;
      font-size: 0.85rem;
      font-weight: 500;
      color: #047857;
    }

    .retake-btn {
      background: rgba(59, 130, 246, 0.1);
      color: #1d4ed8;
      border: 1px solid #93c5fd;
      padding: 6px 12px;
      border-radius: 6px;
      font-size: 0.75rem;
      font-weight: 500;
      cursor: pointer;
      transition: all 0.2s ease;
      margin-top: 0.5rem;
    }

    .retake-btn:hover {
      background: rgba(59, 130, 246, 0.15);
      border-color: #60a5fa;
    }

    .camera-btn {
      background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
      color: white;
      border: none;
      padding: 12px 24px;
      border-radius: 50px;
      font-weight: 600;
      font-size: 0.95rem;
      transition: all 0.3s ease;
      box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
    }

    .camera-btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 6px 20px rgba(59, 130, 246, 0.4);
    }

    /* ======= Right Panel - Form ======= */
    .form-panel {
      flex: 1;
      padding: 1rem;
      display: flex;
      flex-direction: column;
      overflow: hidden;
    }

    .datetime-info {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 0.75rem;
      padding: 0.5rem 0.75rem;
      background: #f8fafc;
      border-radius: 8px;
      border: 1px solid #e2e8f0;
      flex-shrink: 0;
    }

    .date-info, .time-info {
      text-align: center;
    }

    .date-info span, .time-info span {
      display: block;
      font-size: 0.7rem;
      color: #64748b;
      margin-bottom: 0.1rem;
    }

    .date-info strong, .time-info strong {
      font-size: 0.85rem;
      font-weight: 600;
      color: #1e293b;
    }

    .form-container {
      flex: 1;
      display: flex;
      flex-direction: column;
      overflow: hidden;
    }

    .form-fields-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 0.75rem;
      margin-bottom: 0.75rem;
    }

    .form-group {
      margin-bottom: 0.75rem;
      flex-shrink: 0;
    }

    .form-group.full-width {
      grid-column: 1 / -1;
    }

    .form-label {
      font-size: 0.8rem;
      font-weight: 600;
      color: #374151;
      margin-bottom: 0.375rem;
      display: block;
    }

    .form-control {
      width: 100%;
      padding: 0.625rem 0.875rem;
      border: 1px solid #d1d5db;
      border-radius: 8px;
      font-size: 0.85rem;
      transition: all 0.2s ease;
      background: white;
      position: relative;
    }

    .form-control:focus {
      outline: none;
      border-color: #3b82f6;
      box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
      transform: translateY(-1px);
    }

    .form-control:valid {
      border-color: #10b981;
    }

    .form-control:invalid:not(:focus):not(:placeholder-shown) {
      border-color: #ef4444;
      box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.1);
    }

    /* Form validation feedback */
    .form-group {
      position: relative;
    }

    .form-feedback {
      position: absolute;
      top: 100%;
      left: 0;
      font-size: 0.75rem;
      margin-top: 0.25rem;
      opacity: 0;
      transform: translateY(-5px);
      transition: all 0.2s ease;
    }

    .form-feedback.show {
      opacity: 1;
      transform: translateY(0);
    }

    .form-feedback.error {
      color: #ef4444;
    }

    .form-feedback.success {
      color: #10b981;
    }

    /* Input icons */
    .form-group.has-icon {
      position: relative;
    }

    .form-group.has-icon .form-control {
      padding-left: 2.5rem;
    }

    .form-group.has-icon .form-control {
      position: relative;
    }

    .form-group.has-icon::after {
      content: '';
      position: absolute;
      left: 0.875rem;
      top: 50%;
      transform: translateY(-50%);
      margin-top: 0.6875rem; /* (label font-size * line-height + margin-bottom) / 2 */
      font-family: 'Font Awesome 6 Free';
      font-weight: 900;
      color: #9ca3af;
      z-index: 2;
      transition: color 0.2s ease;
      pointer-events: none;
      line-height: 1;
    }

    .form-group.has-icon.name::after {
      content: '\f007';
    }

    .form-group.has-icon.building::after {
      content: '\f1ad';
    }

    .form-group.has-icon.message::after {
      content: '\f4ad';
      margin-top: 0.9rem; /* slightly more for textarea */
    }

    .form-group.has-icon:focus-within::after {
      color: #3b82f6;
    }

    .radio-group {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
      gap: 0.75rem;
      margin-top: 0.5rem;
    }

    .radio-item {
      position: relative;
    }

    .radio-item input[type="radio"] {
      position: absolute;
      opacity: 0;
      width: 0;
      height: 0;
    }

    .radio-item label {
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 12px 8px;
      background: #f8fafc;
      border: 2px solid #e2e8f0;
      border-radius: 12px;
      font-size: 0.8rem;
      font-weight: 500;
      color: #64748b;
      cursor: pointer;
      transition: all 0.3s ease;
      position: relative;
      min-height: 48px;
      text-align: center;
      line-height: 1.2;
    }

    .radio-item label:hover {
      background: #f1f5f9;
      border-color: #cbd5e1;
      transform: translateY(-1px);
    }

    .radio-item input[type="radio"]:checked + label {
      background: rgba(59, 130, 246, 0.1);
      border-color: #93c5fd;
      color: #1e40af;
      box-shadow: 0 2px 8px rgba(59, 130, 246, 0.15);
    }



    .submit-btn {
      background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
      color: white;
      border: none;
      padding: 14px 24px;
      border-radius: 50px;
      font-weight: 600;
      font-size: 1rem;
      transition: all 0.3s ease;
      box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
      margin-top: 1rem;
      position: relative;
      overflow: hidden;
    }

    .submit-btn:hover:not(:disabled) {
      transform: translateY(-2px);
      box-shadow: 0 6px 20px rgba(59, 130, 246, 0.4);
    }

    .submit-btn:disabled {
      opacity: 0.7;
      cursor: not-allowed;
      transform: none;
    }

    .submit-btn::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
      transition: left 0.5s;
    }

    .submit-btn:hover:not(:disabled)::before {
      left: 100%;
    }

    /* ======= Responsive Design ======= */
    @media (max-width: 1024px) {
      .camera-panel {
        flex: 0 0 40%;
        padding: 1.5rem;
      }

      #my_camera, #results img {
        width: 240px;
        height: 180px;
      }
    }

    @media (max-width: 768px) {
      .content-section {
        flex-direction: column;
      }

      .camera-panel {
        flex: none;
        padding: 1.5rem;
        border-right: none;
        border-bottom: 1px solid #e2e8f0;
      }

      #my_camera, #results img {
        width: 240px;
        height: 180px;
      }

      .form-panel {
        padding: 1.5rem;
      }

      .datetime-info {
        flex-direction: column;
        gap: 1rem;
      }

      .radio-group {
        justify-content: center;
      }

      .form-fields-grid {
        grid-template-columns: 1fr;
      }
    }

    @media (max-width: 480px) {
      .header-title {
        font-size: 1.5rem;
      }

      .camera-panel, .form-panel {
        padding: 1rem;
      }

      #my_camera, #results img {
        width: 200px;
        height: 150px;
      }
    }

    /* ======= Reduced motion support ======= */
    @media (prefers-reduced-motion: reduce) {
      * {
        transition-duration: 0.01ms !important;
      }
    }
  </style>
</head>
<body>
  <div class="main-container">
    <!-- Header Section -->
    <div class="header-section">
      <a href="index.php" class="back-btn">
        <i class="fas fa-arrow-left"></i>
        Kembali
      </a>
      <h1 class="header-title">Buku Tamu Digital</h1>
    </div>

    <!-- Content Section -->
    <div class="content-section">
      <!-- Left Panel - Camera -->
      <div class="camera-panel">
        <h3 class="camera-title">Ambil Foto</h3>
        <div class="camera-status" id="camera-status">
          <i class="fas fa-video"></i>
          <span>Kamera siap digunakan</span>
        </div>
        <div class="camera-container">
          <div id="my_camera">
            <div class="camera-placeholder" id="camera-placeholder">
              <i class="fas fa-camera"></i>
              <div>Memuat kamera...</div>
            </div>
          </div>
          <div id="results"></div>
        </div>
        <button type="button" class="camera-btn" onclick="takeSnapshot()">
          <i class="fas fa-camera me-2"></i>Ambil Foto
        </button>
      </div>

      <!-- Right Panel - Form -->
      <div class="form-panel">
        <!-- Date Time Info -->
        <div class="datetime-info">
          <div class="date-info">
            <span id="tanggal-display"></span>
            <strong id="hari-display"></strong>
          </div>
          <div class="time-info">
            <span>Waktu</span>
            <strong id="jam-display"></strong>
          </div>
        </div>

        <!-- Form Container -->
        <div class="form-container">
          <form id="bukutamu-form" method="POST">
            <!-- Hidden inputs -->
            <input type="hidden" name="tujuan" value="-">
            <input type="hidden" name="telepon" value="-">
            <input type="hidden" name="email" value="-">
            <input type="hidden" name="foto" id="foto">

            <!-- Form fields in single column -->
            <div class="form-group has-icon name">
              <label class="form-label">Nama Lengkap</label>
              <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan nama lengkap" required>
              <div class="form-feedback" id="nama-feedback"></div>
            </div>

            <div class="form-group has-icon building">
              <label class="form-label">Asal</label>
              <input type="text" class="form-control" name="instansi" id="instansi_input" placeholder="Nama Instansi / Sekolah / Organisasi" required>
              <div class="form-feedback" id="instansi-feedback"></div>
            </div>

            <div class="form-group">
              <label class="form-label">Kategori Asal</label>
              <div class="radio-group">
                <div class="radio-item">
                  <input type="radio" name="asal" id="instansi" value="Instansi" required>
                  <label for="instansi">Instansi</label>
                </div>
                <div class="radio-item">
                  <input type="radio" name="asal" id="siswa" value="Siswa">
                  <label for="siswa">Siswa</label>
                </div>
                <div class="radio-item">
                  <input type="radio" name="asal" id="umum" value="Umum">
                  <label for="umum">Umum / Orang Tua</label>
                </div>
              </div>
            </div>

            <div class="form-group has-icon message">
              <label class="form-label">Keperluan</label>
              <textarea class="form-control" name="keperluan" id="keperluan" rows="2" placeholder="Jelaskan keperluan kunjungan Anda" required></textarea>
              <div class="form-feedback" id="keperluan-feedback"></div>
            </div>

            <button type="submit" class="submit-btn">
              <i class="fas fa-paper-plane me-2"></i>Kirim Data
            </button>
          </form>
        </div>
      </div>
    </div>

    <!-- Modal Notification -->
    <div class="modal fade" id="notifikasiModal" tabindex="-1" aria-labelledby="notifikasiLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content text-center">
          <div class="modal-header border-0 pb-0">
            <h5 class="modal-title w-100 fw-bold text-primary">GARIS - Buku Tamu</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body py-4">
            <div class="mb-3">
              <i class="fas fa-check-circle text-success" style="font-size: 3rem;"></i>
            </div>
            <h4 class="mb-3 fw-bold">Terima Kasih!</h4>
            <p class="mb-0">Data berhasil disimpan dalam buku tamu.</p>
          </div>
          <div class="modal-footer border-0 pt-0 justify-content-center">
            <button type="button" class="btn btn-primary px-4 py-2" data-bs-dismiss="modal">OK</button>
          </div>
        </div>
      </div>
    </div>
  </div>



<!-- JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
  // Camera status management
  function updateCameraStatus(status, message, icon = 'fas fa-video') {
    const statusEl = document.getElementById('camera-status');
    statusEl.className = `camera-status ${status}`;
    statusEl.innerHTML = `<i class="${icon}"></i><span>${message}</span>`;
  }

  // Check camera permission first
  async function checkCameraPermission() {
    try {
      const stream = await navigator.mediaDevices.getUserMedia({ video: true });
      stream.getTracks().forEach(track => track.stop()); // Stop the stream immediately
      return true;
    } catch (err) {
      console.error('Camera permission error:', err);
      return false;
    }
  }

  // Initialize camera
  async function initCamera() {
    updateCameraStatus('waiting', 'Memeriksa akses kamera...', 'fas fa-spinner fa-spin');
    
    // Check permission first
    const hasPermission = await checkCameraPermission();
    
    if (!hasPermission) {
      updateCameraStatus('error', 'Akses kamera ditolak. Silakan izinkan akses kamera.', 'fas fa-exclamation-triangle');
      document.getElementById('camera-placeholder').innerHTML = `
        <i class="fas fa-video-slash"></i>
        <div>Akses kamera diperlukan</div>
        <small style="margin-top: 0.5rem; opacity: 0.7;">Klik tombol kamera di browser untuk mengizinkan</small>
      `;
      return;
    }

    updateCameraStatus('waiting', 'Memuat kamera...', 'fas fa-spinner fa-spin');
    
    Webcam.set({
      width: 320,
      height: 240,
      image_format: 'jpeg',
      jpeg_quality: 90
    });
    
    // Set timeout to handle stuck loading
    const timeout = setTimeout(() => {
      updateCameraStatus('error', 'Kamera tidak merespon. Coba refresh halaman.', 'fas fa-exclamation-triangle');
      document.getElementById('camera-placeholder').innerHTML = `
        <i class="fas fa-redo"></i>
        <div>Kamera tidak merespon</div>
        <small style="margin-top: 0.5rem; opacity: 0.7;">Silakan refresh halaman</small>
      `;
    }, 10000); // 10 second timeout
    
    try {
      Webcam.attach('#my_camera');
      
      // Check if camera is actually working after a short delay
      setTimeout(() => {
        const video = document.querySelector('#my_camera video');
        if (video && video.videoWidth > 0) {
          clearTimeout(timeout);
          updateCameraStatus('', 'Kamera siap digunakan', 'fas fa-video');
          document.getElementById('camera-placeholder').style.display = 'none';
        } else {
          clearTimeout(timeout);
          updateCameraStatus('error', 'Kamera tidak dapat dimuat', 'fas fa-exclamation-triangle');
          document.getElementById('camera-placeholder').innerHTML = `
            <i class="fas fa-camera-slash"></i>
            <div>Kamera tidak tersedia</div>
            <small style="margin-top: 0.5rem; opacity: 0.7;">Pastikan kamera tidak digunakan aplikasi lain</small>
          `;
        }
      }, 3000); // Check after 3 seconds
      
    } catch (err) {
      clearTimeout(timeout);
      updateCameraStatus('error', 'Gagal mengakses kamera', 'fas fa-exclamation-triangle');
      document.getElementById('camera-placeholder').style.display = 'flex';
    }
  }

  function takeSnapshot() {
    const button = document.querySelector('.camera-btn');
    const originalText = button.innerHTML;
    
    // Show loading state
    button.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Mengambil foto...';
    button.disabled = true;
    
    Webcam.snap(function(data_uri) {
      document.getElementById('foto').value = data_uri;
      
      // Hide camera and show photo result instead
      document.getElementById('my_camera').style.display = 'none';
      document.getElementById('results').innerHTML = `
        <img src="${data_uri}" alt="Foto yang diambil">
        <div class="photo-feedback">
          <i class="fas fa-check-circle"></i>
          <span>Foto berhasil diambil!</span>
        </div>
      `;
      
      // Change main button to retake button
      button.innerHTML = '<i class="fas fa-redo me-2"></i>Ambil Ulang';
      button.style.background = 'linear-gradient(135deg, #f59e0b 0%, #d97706 100%)';
      button.onclick = retakePhoto;
      button.disabled = false;
      
      // Update status
      updateCameraStatus('', 'Foto siap untuk dikirim', 'fas fa-check-circle');
    });
  }

  function retakePhoto() {
    // Show camera again and hide results
    document.getElementById('my_camera').style.display = 'block';
    document.getElementById('results').innerHTML = '';
    document.getElementById('foto').value = '';
    
    // Reset button to original state
    const button = document.querySelector('.camera-btn');
    button.innerHTML = '<i class="fas fa-camera me-2"></i>Ambil Foto';
    button.style.background = 'linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%)';
    button.onclick = takeSnapshot;
    
    // Reset status
    updateCameraStatus('', 'Kamera siap digunakan', 'fas fa-video');
  }

  // Initialize camera when page loads
  initCamera();

  // Update waktu real-time
  function updateWaktu() {
    const now = new Date();
    const hari = now.toLocaleDateString('id-ID', { weekday: 'long' });
    const tanggal = now.toLocaleDateString('id-ID');
    const jam = now.toLocaleTimeString('id-ID');

    // Update display elements in datetime-info
    document.getElementById('tanggal-display').textContent = tanggal;
    document.getElementById('hari-display').textContent = hari;
    document.getElementById('jam-display').textContent = jam;
  }
  setInterval(updateWaktu, 1000);
  updateWaktu();

  // Enhanced form validation
  function showFeedback(fieldId, message, type = 'error') {
    const feedback = document.getElementById(`${fieldId}-feedback`);
    if (feedback) {
      feedback.textContent = message;
      feedback.className = `form-feedback ${type} show`;
      
      // Auto hide success messages after 3 seconds
      if (type === 'success') {
        setTimeout(() => {
          feedback.classList.remove('show');
        }, 3000);
      }
    }
  }

  function hideFeedback(fieldId) {
    const feedback = document.getElementById(`${fieldId}-feedback`);
    if (feedback) {
      feedback.classList.remove('show');
    }
  }

  function validateField(field) {
    const value = field.value.trim();
    const fieldId = field.id;
    
    // Clear previous feedback
    hideFeedback(fieldId);
    
    if (!value) {
      showFeedback(fieldId, 'Field ini wajib diisi');
      return false;
    }
    
    // Specific validations
    switch (fieldId) {
      case 'nama':
        if (value.length < 2) {
          showFeedback(fieldId, 'Nama minimal 2 karakter');
          return false;
        }
        if (!/^[a-zA-Z\s.'-]+$/.test(value)) {
          showFeedback(fieldId, 'Nama hanya boleh berisi huruf dan spasi');
          return false;
        }
        showFeedback(fieldId, '✓ Nama valid', 'success');
        break;
        
      case 'instansi_input':
        if (value.length < 3) {
          showFeedback(fieldId, 'Nama instansi minimal 3 karakter');
          return false;
        }
        showFeedback(fieldId, '✓ Instansi valid', 'success');
        break;
        
      case 'keperluan':
        if (value.length < 5) {
          showFeedback(fieldId, 'Keperluan minimal 5 karakter');
          return false;
        }
        if (value.length > 200) {
          showFeedback(fieldId, 'Keperluan maksimal 200 karakter');
          return false;
        }
        showFeedback(fieldId, '✓ Keperluan valid', 'success');
        break;
    }
    
    return true;
  }

  // Real-time validation
  document.addEventListener('DOMContentLoaded', function() {
    const formFields = ['nama', 'instansi_input', 'keperluan'];
    
    formFields.forEach(fieldId => {
      const field = document.getElementById(fieldId);
      if (field) {
        // Validate on blur
        field.addEventListener('blur', () => validateField(field));
        
        // Clear error on focus
        field.addEventListener('focus', () => {
          const feedback = document.getElementById(`${fieldId}-feedback`);
          if (feedback && feedback.classList.contains('error')) {
            hideFeedback(fieldId);
          }
        });
        
        // Real-time validation for textarea
        if (fieldId === 'keperluan') {
          field.addEventListener('input', () => {
            const charCount = field.value.length;
            if (charCount > 200) {
              showFeedback(fieldId, `Keperluan terlalu panjang (${charCount}/200 karakter)`);
            } else if (charCount > 180) {
              showFeedback(fieldId, `${200 - charCount} karakter tersisa`, 'success');
            } else {
              hideFeedback(fieldId);
            }
          });
        }
      }
    });

    // Radio button validation
    const radioButtons = document.querySelectorAll('input[name="asal"]');
    radioButtons.forEach(radio => {
      radio.addEventListener('change', function() {
        // Add visual feedback for radio selection
        const allLabels = document.querySelectorAll('.radio-item label');
        allLabels.forEach(label => label.style.transform = '');
        
        if (this.checked) {
          this.nextElementSibling.style.transform = 'scale(1.02)';
          setTimeout(() => {
            this.nextElementSibling.style.transform = '';
          }, 200);
        }
      });
    });
  });

  // Enhanced form submission
  document.getElementById('bukutamu-form').addEventListener('submit', function(event) {
    event.preventDefault();
    
    // Validate photo first
    if (!document.getElementById('foto').value) {
      alert('Silakan ambil foto terlebih dahulu!');
      return false;
    }
    
    // Validate all form fields
    const formFields = ['nama', 'instansi_input', 'keperluan'];
    let isValid = true;
    
    formFields.forEach(fieldId => {
      const field = document.getElementById(fieldId);
      if (field && !validateField(field)) {
        isValid = false;
      }
    });
    
    // Check radio button
    const radioChecked = document.querySelector('input[name="asal"]:checked');
    if (!radioChecked) {
      alert('Silakan pilih kategori asal!');
      isValid = false;
    }
    
    if (!isValid) {
      return false;
    }
    
    // Show loading state
    const submitBtn = document.querySelector('.submit-btn');
    const originalText = submitBtn.innerHTML;
    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Mengirim data...';
    submitBtn.disabled = true;
    
    let formData = new FormData(this);

    fetch('simpan_bukutamu.php', {
      method: 'POST',
      body: formData
    })
    .then(response => response.json())
    .then(data => {
      if (data.success) {
        const myModal = new bootstrap.Modal(document.getElementById('notifikasiModal'));
        myModal.show();
        
        // Reset form and camera
        document.getElementById('bukutamu-form').reset();
        document.getElementById('results').innerHTML = "";
        document.getElementById('foto').value = '';
        
        // Reset camera button if photo was taken
        const cameraBtn = document.querySelector('.camera-btn');
        if (cameraBtn.innerHTML.includes('Ambil Ulang')) {
          retakePhoto();
        }
        
        // Clear all feedback messages
        const feedbacks = document.querySelectorAll('.form-feedback');
        feedbacks.forEach(feedback => feedback.classList.remove('show'));
        
      } else {
        alert(data.message || 'Terjadi kesalahan saat menyimpan data');
      }
    })
    .catch(error => {
      console.error('Error:', error);
      alert('Terjadi kesalahan jaringan. Silakan coba lagi.');
    })
    .finally(() => {
      // Reset button state
      submitBtn.innerHTML = originalText;
      submitBtn.disabled = false;
    });
  });
</script>

</body>
</html>
