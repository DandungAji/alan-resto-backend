# Alan Resto Backend

Ini adalah proyek backend **Alan Resto** yang dibangun menggunakan **Laravel**. Dokumen ini berisi panduan lengkap untuk menjalankan backend secara lokal, terutama untuk keperluan pengujian atau pengembangan.

## 🔧 Prasyarat

Sebelum mulai, pastikan perangkat kamu sudah terpasang:

-   PHP >= 8.1
-   Composer (versi terbaru)
-   MySQL
-   Git

## 🚀 Langkah Instalasi

### 1. Kloning Repository

Clone repo ke lokal:

```bash
git clone https://github.com/DandungAji/alan-resto-backend.git
cd alan-resto-backend
```

### 2. Install Dependensi

Jalankan perintah berikut untuk install dependensi PHP:

```bash
composer install
```

### 3. Konfigurasi `.env`

Salin file `.env.example` jadi `.env`:

```bash
cp .env.example .env
```

Edit isi file `.env` sesuai kebutuhan, khususnya bagian database:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=alan_resto
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

Lalu, generate kunci aplikasi:

```bash
php artisan key:generate
```

### 4. Setup Database

Buat database dengan nama yang sesuai `.env`:

```bash
mysql -u your_username -p -e "CREATE DATABASE alan_resto;"
```

Lanjutkan dengan migrasi:

```bash
php artisan migrate
```

Kalau ada seeder, bisa dijalankan juga:

```bash
php artisan db:seed
```

### 5. Jalankan Aplikasi

Untuk menjalankan server lokal Laravel:

```bash
php artisan serve
```

Aplikasi akan aktif di `http://127.0.0.1:8000`.

## 🧪 Uji API

API utama digunakan untuk mengelola menu restoran.

Contoh endpoint:

-   `GET /api/products` → ambil semua produk
-   `POST /api/products` → tambah produk baru

Contoh uji pakai cURL:

```bash
curl -X POST http://127.0.0.1:8000/api/products \
  -F "name=Menu Contoh" \
  -F "price=50000" \
  -F "image=@/path/to/image.jpg"
```

Selengkapnya bisa dicek langsung di source code.
