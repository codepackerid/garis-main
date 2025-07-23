# GARIS - Sistem Buku Tamu Digital & Absensi Guru

Aplikasi web modern untuk mengelola registrasi tamu digital dan absensi guru dengan integrasi kamera dan fitur ekspor data.

## Apa itu GARIS?

GARIS adalah aplikasi berbasis web yang dirancang untuk SMKN 4 MALANG untuk:

- **Buku Tamu Digital** - Mendaftarkan pengunjung dengan pengambilan foto dan kategorisasi
- **Absensi Guru** - Melacak check-in/check-out staff dengan timestamp dan foto
- **Manajemen Data** - Melihat, memfilter, dan mengekspor data absensi/pengunjung ke Excel

## Fitur

- 📸 **Integrasi Kamera** - Pengambilan foto real-time untuk tamu dan staff
- 📊 **Tabel Data** - Tabel modern dengan filtering, sorting, dan pencarian
- 📅 **Date Picker Kustom** - Komponen kalender yang indah (mengganti default browser)
- 📈 **Ekspor Excel** - Generate laporan dengan rentang tanggal kustom
- 📱 **Desain Responsif** - Bekerja di desktop, tablet, dan mobile
- ✅ **Validasi Form** - Validasi input real-time dengan feedback visual

## Tech Stack

- **Backend**: PHP 8.0+, MySQL/MariaDB
- **Frontend**: HTML5, CSS3, JavaScript ES6+
- **Framework**: Bootstrap 5.3
- **Libraries**: 
  - WebcamJS (integrasi kamera)
  - DataTables (tabel advanced)
  - SheetJS (ekspor Excel)
  - Font Awesome (icon)

## Cara Menggunakan

### Untuk Pengguna

1. **Registrasi Tamu**: 
   - Buka halaman utama → "Buku Tamu"
   - Isi form, ambil foto, kirim

2. **Absensi Guru**:
   - Buka halaman utama → "Absensi Guru" 
   - Masukkan detail, ambil foto untuk check-in/check-out

3. **Lihat Data**:
   - "Daftar Tamu" - Lihat semua entri tamu
   - "Daftar Absensi" - Lihat catatan absensi guru
   - Gunakan filter tanggal dan ekspor ke Excel

### Untuk Development (Menggunakan XAMPP)

1. **Install XAMPP**
   - Download dan install XAMPP
   - Jalankan service Apache dan MySQL

2. **Setup Project**
   ```bash
   # Clone ke folder htdocs
   cd C:\xampp\htdocs
   git clone https://github.com/codepackerid/garis-main.git
   cd garis
   ```

3. **Setup Database**
   - Buka phpMyAdmin (http://localhost/phpmyadmin)
   - Buat database dengan nama `db_garis`
   - Import file `db_garis.sql`

4. **Konfigurasi Database**
   ```php
   // Edit config.php
   $host = "localhost";
   $user = "root";
   $pass = "";
   $dbname = "db_garis";
   ```

5. **Jalankan Aplikasi**
   - Buka browser: `http://localhost/garis`
   - Aplikasi siap digunakan!

## Struktur Project

```
garis/
├── index.php              # Halaman utama
├── form.php               # Form registrasi tamu
├── form_guru.php          # Form absensi guru
├── tabel.php              # Tabel data tamu
├── daftar_absen.php       # Tabel data absensi
├── config.php             # Konfigurasi database
├── db_garis.sql           # Schema database
├── simpan_bukutamu.php    # Proses data tamu
├── simpan_absensi.php     # Proses data absensi
├── tampil_bukutamu.php    # API data tamu
├── tampil_absensi.php     # API data absensi
├── export_excel.php       # Ekspor Excel
└── assets/                # CSS, JS, gambar
```

## Kebutuhan Sistem

- **Server**: Apache/Nginx dengan PHP 8.0+
- **Database**: MySQL 8.0+ atau MariaDB 10.4+
- **Browser**: Browser modern dengan dukungan kamera
- **Development**: XAMPP/WAMP/LAMP stack