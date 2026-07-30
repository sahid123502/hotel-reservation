# Sistem Reservasi Hotel
## Tugas UAS Mata Kuliah Cloud Computing

### Anggota Kelompok
1. Sahit Hidayat (141241018)
2. Elysa Dika Permatasari (141241022)

### Deskripsi Singkat
Aplikasi sistem reservasi kamar hotel berbasis web. Dibangun menggunakan Laravel 11 dan Filament, di-deploy ke layanan cloud nyata. Memenuhi seluruh syarat tugas.

### Teknologi
- Laravel 11 + Filament PHP
- Basis Data: PostgreSQL (Supabase)
- Penyimpanan: Cloudflare R2
- Platform: Render
- Otomatisasi: GitHub Actions CI/CD

### Fitur Utama
✅ 3 Peran Pengguna: Tamu, Resepsionis, Manajer
✅ Proses persetujuan reservasi
✅ Unggah bukti pembayaran
✅ Notifikasi otomatis
✅ Pembatalan otomatis reservasi kadaluarsa

### Cara Jalankan
git clone https://github.com/[nama-akun]/hotel-reservation.git
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve
