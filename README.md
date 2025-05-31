Sistem Pengadaan Barang dan Jasa

Nama: Muhammad Nazlul Ramadhyan
NIM: 2308107010036

Deskripsi Proyek
Sistem Pengadaan Barang dan Jasa adalah aplikasi web berbasis Laravel untuk mengelola proses pengadaan dalam suatu organisasi. Aplikasi ini memiliki dua role utama yaitu Vendor dan Admin dengan fitur-fitur sebagai berikut:

Fitur Vendor:
- Registrasi dan manajemen profil vendor
- Input dan update persediaan barang/jasa
- Melihat dan merespons permintaan pengadaan

Fitur Admin:
- Manajemen vendor
- Membuat dan mengelola permintaan pengadaan
- Generate laporan riwayat pengadaan
- Dashboard analytics dan monitoring

Penjelasan Code & User Interface
Struktur Aplikasi:
Models: User.php, Vendor.php, Barang.php, Pengadaan.php, PengadaanDetail.php
Controllers:
- AuthController.php (Authentication)
- BarangController.php (Manajemen Barang)
- LaporanController.php (Generate Laporan)
- PengadaanController.php (Proses Pengadaan)
- VendorController.php (Manajemen Vendor)
    
Views:
- auth/ (Login/Register)
- barang/ (CRUD Barang)
- laporan/ (Reporting)
- pengadaan/ (Pengadaan Process)
- vendor/ (Vendor Management)
- layouts/ (Template)

Database Schema:
- users: Data pengguna dengan role authentication
- vendors: Data profil dan informasi vendor
- barangs: Katalog barang/jasa yang tersedia
- pengadaans: Data permintaan pengadaan
- pengadaan_details: Detail item dalam setiap pengadaan

User Interface:
Dashboard Admin: 
- Overview dengan statistics cards: Total Barang, Total Vendor, Pengadaan Aktif
- Aksi cepat: Tambah Vendor, Buat Pengadaan, Lihat Laporan
- Widget Aktivitas Terbaru dengan status real-time
- Navigation menu: Vendor, Pengadaan, Laporan

Dashboard Vendor: 
- Interface untuk vendor menyediakan dan mengelola barang
- Form Daftar Barang: Input ketersediaan stok barang penyediaan
- Status tracking pengadaan yang melibatkan vendor

Cara Instalasi
    Prerequisites:
    PHP >= 8.1
    Composer
    MySQL/PostgreSQL
    Node.js & NPM (untuk asset compilation)

Langkah Instalasi:
- Clone Repository
      bashgit clone https://github.com/username/sistem-pengadaan.git
      cd sistem-pengadaan

- Install Dependencies
    composer install
    npm install

- Environment Setup
    cp .env.example .env
    php artisan key:generate

- Database Configuration
    Edit file .env dan sesuaikan konfigurasi database:
    envDB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=pengadaan
    DB_USERNAME=root
    DB_PASSWORD=

- Database Migration & Seeding
    bashphp artisan migrate
    php artisan db:seed

- Compile Assets
    npm run dev
    # atau untuk production:
    npm run build

- Storage Link
    php artisan storage:link

- Run Application
    php artisan serve
    Aplikasi akan berjalan di http://localhost:8000
