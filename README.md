# E-Meteran - Tugas Akhir Universitas Subang

![E-Meteran Banner](assets/banner.png)

Repositori ini berisi kode sumber untuk aplikasi **E-Meteran**, yang dikembangkan sebagai Tugas Akhir (Skripsi) pada Program Studi Sistem Informasi, **Universitas Subang**.

Aplikasi ini dirancang untuk mempermudah interaksi antara pelanggan, petugas lapangan, dan administrator. Sistem memfasilitasi petugas dalam menginput data meteran secara real-time, memungkinkan pelanggan mengecek tagihan bulanan dengan mudah, serta membantu admin dalam memantau seluruh aktivitas transaksi dan laporan keuangan dalam satu dashboard terpusat.

## 📋 Tentang Proyek

- **Judul Skripsi:** SISTEM INFORMASI PENCATATAN METERAN AIR PELANGGAN EKSTERNAL BERBASIS WEBSITE
- **Pengembang:** ARI HARI SAPUTRA
- **Pembimbing:**
    1. Rakhmayudhi, M.Kom
    2. Santi Purwanti, SH.,M.Kom
- **Institusi:** Universitas Subang (UNSUB)

## 🚀 Fitur Utama

- **Manajemen Data Pelanggan:** Pengelolaan data pelanggan yang terintegrasi.
- **Pencatatan Meter:** Input data meteran bulanan yang akurat.
- **Laporan & Tagihan:** Generasi laporan penggunaan dan estimasi tagihan.
- **Dashboard Admin:** Ringkasan statistik penggunaan dan data sistem.

## 🛠️ Teknologi yang Digunakan

Proyek ini dibangun menggunakan teknologi berikut:

- **Bahasa Pemrograman:** PHP
- **Framework:** Laravel
- **Database:** MySQL / MariaDB
- **Frontend:** HTML, CSS, JavaScript, Bootstrap, Tailwind

## ⚙️ Instalasi dan Konfigurasi

Ikuti langkah-langkah berikut untuk menjalankan proyek ini di komputer lokal Anda:

### Prasyarat

- PHP >= 8.x
- Composer
- Web Server (XAMPP/Laragon/Nginx)
- MySQL

### Langkah Instalasi

1.  **Clone Repositori**

    ```bash
    git clone [https://github.com/username-anda/emeteran.git](https://github.com/username-anda/emeteran.git)
    cd emeteran
    ```

2.  **Install Dependencies** (Jika menggunakan Composer)

    ```bash
    composer install
    ```

3.  **Konfigurasi Environment**
    Salin file `.env.example` (jika ada) atau sesuaikan file `.env` yang sudah ada:

    ```bash
    cp .env.example .env
    ```

    Buka file `.env` dan sesuaikan konfigurasi database:

    ```env
    DB_DATABASE=emeteran
    DB_USERNAME=root
    DB_PASSWORD=
    ```

4.  **Generate Key** (Khusus jika menggunakan Laravel)

    ```bash
    php artisan key:generate
    ```

5.  **Migrasi Database**
    Import file SQL yang disertakan dalam folder `database/` atau jalankan migrasi:

    ```bash
    php artisan migrate
    # atau import manual file .sql ke phpMyAdmin
    ```

6.  **Jalankan Aplikasi**
    ```bash
    php artisan serve
    # atau akses melalui localhost/emeteran
    ```

## 📄 Lisensi

Proyek ini dilisensikan di bawah lisensi [MIT](LICENSE). Silakan lihat file `LICENSE` untuk informasi lebih lanjut.

---

**Catatan:** Proyek ini dipublikasikan untuk keperluan akademik dan portofolio.

## E-Meteran

## Admin : Email : admin@example.com, Pass : password123

## User : Email Pelanggan, Pass : 123456789

## Petugas : Email Petugas, Pass : 123456789

## E-Meteran - Tugas Akhir Universitas Subang
