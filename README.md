# RS UMS

Portal informasi dan manajemen konten Rumah Sakit Universitas Muhammadiyah Surakarta (RS UMS). Aplikasi ini menyediakan halaman publik untuk informasi rumah sakit serta panel internal untuk mengelola artikel, layanan, dokter, spesialisasi, dan jadwal praktik.

## Daftar Isi

- [Fitur](#fitur)
- [Teknologi](#teknologi)
- [Persyaratan](#persyaratan)
- [Instalasi](#instalasi)
- [Menjalankan Aplikasi](#menjalankan-aplikasi)
- [Akun dan Hak Akses](#akun-dan-hak-akses)
- [Halaman dan Endpoint](#halaman-dan-endpoint)
- [Struktur Data](#struktur-data)
- [Struktur Direktori](#struktur-direktori)
- [Pengujian dan Quality Check](#pengujian-dan-quality-check)
- [Konfigurasi Produksi](#konfigurasi-produksi)
- [Troubleshooting](#troubleshooting)
- [Kontribusi](#kontribusi)
- [Lisensi](#lisensi)

## Fitur

### Portal publik

- Beranda dengan kategori layanan dan artikel terbaru.
- Daftar artikel yang sudah berstatus `published`.
- Pencarian dan filter artikel berdasarkan kategori.
- Pengurutan artikel berdasarkan terbaru atau popularitas.
- Halaman detail artikel dengan penghitung jumlah kunjungan.
- Daftar jadwal dokter yang aktif.
- Filter jadwal berdasarkan spesialisasi, hari, dan nama dokter.

### Panel internal

- Autentikasi, registrasi, verifikasi email, lupa password, dan reset password.
- Dashboard terpisah untuk administrator dan editor.
- CRUD artikel dan kategori artikel.
- CRUD kategori layanan dan layanan.
- CRUD spesialisasi dan dokter.
- Pengelolaan jadwal praktik dokter.
- Pengaturan profil, password, dan tampilan akun.

## Teknologi

| Komponen | Versi/Implementasi |
| --- | --- |
| Backend | PHP `^8.2`, Laravel `^12.0` |
| UI interaktif | Livewire Volt, Livewire Flux |
| Styling | Tailwind CSS 4 |
| Asset bundler | Vite 7 |
| Database default | SQLite |
| Testing | Pest 3 dan PHPUnit |
| Code style | Laravel Pint |

## Persyaratan

Pastikan perangkat pengembangan memiliki:

- PHP 8.2 atau lebih baru dengan ekstensi Laravel yang diperlukan.
- Composer 2.
- Node.js dan npm (CI menggunakan Node.js 22).
- Git.
- Akses kredensial Flux UI jika Composer meminta autentikasi paket `livewire/flux`.

## Instalasi

### 1. Clone repository

```bash
git clone https://github.com/nabilamani/rs_ums.git
cd rs_ums
```

### 2. Pasang dependency PHP dan JavaScript

```bash
composer install
npm install
```

Jika instalasi Composer meminta kredensial Flux UI, konfigurasikan kredensial yang diberikan maintainer atau organisasi:

```bash
composer config http-basic.composer.fluxui.dev USERNAME LICENSE_KEY
composer install
```

Jangan commit kredensial ke repository.

### 3. Siapkan environment

Linux/macOS:

```bash
cp .env.example .env
```

PowerShell:

```powershell
Copy-Item .env.example .env
```

Buat application key:

```bash
php artisan key:generate
```

### 4. Siapkan database

Konfigurasi bawaan menggunakan SQLite. Buat file database jika belum ada:

PowerShell:

```powershell
New-Item -ItemType File -Path database/database.sqlite -Force
```

Linux/macOS:

```bash
touch database/database.sqlite
```

Jalankan migration:

```bash
php artisan migrate
```

Seeder utama saat ini membuat 100 dokter menggunakan spesialisasi yang sudah tersedia:

```bash
php artisan db:seed
```

Seeder akun tersedia secara terpisah. Jalankan jika membutuhkan akun awal:

```bash
php artisan db:seed --class=UserSeeder
```

Akun seed:

| Role | Email | Password |
| --- | --- | --- |
| Admin | `admin@example.com` | `123123123` |
| Editor | `editor@example.com` | `123123123` |

Segera ganti password akun seed pada lingkungan bersama atau produksi.

## Menjalankan Aplikasi

### Mode pengembangan

Jalankan backend dan Vite secara terpisah:

Terminal 1:

```bash
php artisan serve
```

Terminal 2:

```bash
npm run dev
```

Buka [http://localhost:8000](http://localhost:8000).

Alternatif, jalankan seluruh proses development yang didefinisikan Composer:

```bash
composer run dev
```

Perintah tersebut menjalankan server Laravel, queue listener, dan Vite secara bersamaan.

### Build asset

```bash
npm run build
```

## Akun dan Hak Akses

Role disimpan pada kolom `users.role` dan saat ini mendukung:

- **Admin**: dapat mengakses `/admin/dashboard`.
- **Editor**: dapat mengakses `/editor/dashboard`.

Route pengelolaan konten memerlukan autentikasi. Middleware `admin` dan `editor` membatasi dashboard berdasarkan role yang tepat. Jangan menggunakan akun seed dengan password default di produksi.

## Halaman dan Endpoint

### Publik

| Method | URL | Keterangan |
| --- | --- | --- |
| GET | `/` | Beranda RS UMS |
| GET | `/artikel` | Daftar artikel terbit |
| GET | `/artikel/{slug}` | Detail artikel dan pencatatan view |
| GET | `/jadwaldokter` | Daftar dan filter jadwal dokter |
| GET | `/login` | Login |
| GET | `/register` | Registrasi |
| GET | `/forgot-password` | Meminta reset password |

Parameter yang tersedia pada `/artikel`:

- `category`: ID kategori artikel.
- `search`: pencarian pada judul, ringkasan, atau isi.
- `sort=popular`: urutkan berdasarkan jumlah view; default mengurutkan berdasarkan tanggal publikasi terbaru.

Parameter filter pada `/jadwaldokter`:

- `specialty`: ID spesialisasi.
- `day`: hari dalam bahasa Inggris, misalnya `monday`.
- `search`: nama dokter atau nama spesialisasi.

### Terautentikasi

| URL | Keterangan |
| --- | --- |
| `/admin/dashboard` | Dashboard admin |
| `/editor/dashboard` | Dashboard editor |
| `/articles` | Daftar artikel |
| `/articles/create` | Membuat artikel |
| `/articles/update/{slug}` | Mengubah artikel |
| `/category-articles` | Mengelola kategori artikel |
| `/service-categories` | Mengelola kategori layanan |
| `/services/category/{id}` | Mengelola layanan pada kategori |
| `/specialties` | Mengelola spesialisasi |
| `/doctors` | Mengelola dokter |
| `/schedules` | Melihat seluruh jadwal |
| `/schedules/{doctor}` | Mengelola jadwal dokter tertentu |
| `/settings/profile` | Mengubah profil |
| `/settings/password` | Mengubah password |
| `/settings/appearance` | Mengubah tampilan |

## Struktur Data

Entitas utama aplikasi:

- `users`: akun dan role pengguna.
- `service_categories` dan `services`: katalog layanan rumah sakit.
- `specialties`: daftar spesialisasi dokter.
- `doctors`: data dokter yang terhubung ke spesialisasi.
- `schedules`: slot praktik dokter, termasuk hari, waktu, status aktif, dan catatan.
- `category_articles` dan `articles`: kategori, konten, status publikasi, penulis, thumbnail, dan jumlah view.

Relasi penting:

- Satu spesialisasi memiliki banyak dokter.
- Satu dokter memiliki banyak jadwal.
- Satu kategori artikel memiliki banyak artikel.
- Artikel dapat memiliki penulis dari `users`.

## Struktur Direktori

```text
app/
  Http/Controllers/       Controller halaman publik dan autentikasi
  Http/Middleware/        Pembatasan akses admin/editor
  Livewire/               Komponen UI dan aksi interaktif
  Models/                 Model Eloquent
database/
  migrations/             Definisi skema database
  seeders/                Data awal dan data contoh
resources/
  css/                    Style Tailwind
  js/                     Entry point JavaScript
  views/                  Template Blade dan view Livewire
routes/
  web.php                 Route publik dan panel internal
  auth.php                Route autentikasi
public/                   Asset statis dan entry point aplikasi
.github/workflows/        Workflow test dan lint CI
```

## Pengujian dan Quality Check

Jalankan test:

```bash
php artisan test
```

Atau gunakan script Composer:

```bash
composer test
```

Jalankan Laravel Pint:

```bash
vendor/bin/pint
```

Test menggunakan SQLite in-memory sehingga tidak mengubah database development. Workflow CI menjalankan test pada PHP 8.4, membangun asset dengan `npm run build`, dan menjalankan Pest. Workflow lint menjalankan Pint pada push atau pull request ke branch `main` dan `develop`.

## Konfigurasi Produksi

Sebelum deployment:

1. Atur `APP_ENV=production`, `APP_DEBUG=false`, dan `APP_URL` sesuai domain.
2. Gunakan database produksi dan isi kredensial `DB_*` pada `.env`.
3. Jalankan `php artisan key:generate` hanya saat aplikasi belum memiliki key.
4. Jalankan `php artisan migrate --force`.
5. Pasang dependency tanpa package development:

   ```bash
   composer install --no-dev --optimize-autoloader
   npm ci
   npm run build
   ```

6. Pastikan web server mengarah ke direktori `public`.
7. Konfigurasikan worker queue karena default `QUEUE_CONNECTION=database`.
8. Atur mailer yang benar jika verifikasi email atau reset password digunakan.
9. Jangan memakai akun seed dan password default di produksi.
10. Jika menggunakan penyimpanan file publik, jalankan `php artisan storage:link`.

## Troubleshooting

### `No application encryption key has been specified`

Jalankan:

```bash
php artisan key:generate
```

### Database SQLite tidak ditemukan

Buat `database/database.sqlite`, lalu jalankan:

```bash
php artisan migrate
```

### Perubahan frontend tidak terlihat

Pastikan Vite berjalan dengan `npm run dev`, atau build ulang:

```bash
npm run build
```

### Composer gagal mengambil Flux UI

Paket Flux UI membutuhkan kredensial repository privat. Minta `FLUX_USERNAME` dan `FLUX_LICENSE_KEY` kepada maintainer, lalu jalankan konfigurasi Composer tanpa menuliskan nilainya ke file yang di-commit.

### Cache konfigurasi menyebabkan nilai `.env` lama

```bash
php artisan optimize:clear
```

## Kontribusi

1. Buat branch fitur dari `develop`.
2. Ikuti struktur Livewire, model, migration, dan route yang sudah ada.
3. Jalankan `php artisan test`, `vendor/bin/pint`, dan `npm run build`.
4. Buat pull request ke `develop` dengan ringkasan perubahan dan langkah pengujian.

## Lisensi

Project ini menggunakan lisensi MIT sesuai metadata `composer.json`. Pastikan penggunaan asset, logo, dan konten RS UMS mengikuti izin pemiliknya.
