# CV. Gaspol Rem Blong - Sistem Manajemen Inventori Bengkel

Sistem informasi berbasis web yang dirancang untuk mengelola stok sparepart, transaksi pembelian, dan pelaporan pada bengkel. Project ini dikembangkan sebagai tugas besar untuk mata kuliah **Analisis dan Perancangan Berbasis Objek (APBO)** di **Teknik Informatika, Universitas Mataram**.

![Logo CV Gaspol Rem Blong](cy-bengkel/img/baner.png)*
## 🚀 Fitur Utama
- **Manajemen Sparepart**: Input, edit, dan hapus data stok barang.
- **Sistem Pembelian**: Pencatatan stok masuk secara terorganisir.
- **Laporan PDF**: Generate laporan otomatis menggunakan library Dompdf.
- **Dashboard Interaktif**: Ringkasan data inventori secara real-time.

## 🛠️ Teknologi yang Digunakan
- **Framework**: CodeIgniter 3 (PHP)
- **Database**: MySQL / MariaDB
- **Frontend**: Bootstrap, DataTables
- **Library**: Dompdf (via Composer)
- **Server**: XAMPP (Apache & MySQL)

## 📦 Persyaratan Sistem (Prerequisites)
Sebelum menjalankan project ini, pastikan sistem kamu sudah memenuhi syarat berikut:
1. **PHP version**: minimal 7.4 atau 8.2 (disarankan).
2. **Composer**: Ter-install di sistem.
3. **Ekstensi PHP Aktif**:
   - `extension=zip` (untuk install library via Composer).
   - `extension=gd` (untuk memproses gambar/logo di PDF).

## ⚙️ Cara Instalasi
1. **Clone atau Download** repository ini ke folder `C:\xampp\htdocs\` atau `D:\xampp\htdocs\`.
2. **Import Database**:
   - Buka `phpMyAdmin`.
   - Buat database baru (misal: `db_bengkel`).
   - Import file `.sql` yang ada di folder database project.
3. **Update Konfigurasi Database**:
   - Edit file `application/config/database.php` sesuai dengan nama database kamu.
4. **Instalasi Library (Composer)**:
   - Buka terminal di folder project (`cy-bengkel`).
   - Jalankan perintah: `composer install`.
5. **Aktifkan Autoload Composer**:
   - Buka `application/config/config.php`.
   - Pastikan `$config['composer_autoload'] = FCPATH . 'vendor/autoload.php';` sudah di-set.

## 👥 Tim Pengembang (Kelompok 6 - APBO)
Project ini dikerjakan oleh:
- **Ahmad Dani - F1D02410140**
- **Muhammad Farhan Maulana - F1D02410XXX**
- **Mustafida F1D02410XXX**

---
*Developed for Academic Purposes - Universitas Mataram 2026*
