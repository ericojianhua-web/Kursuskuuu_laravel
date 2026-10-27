# KursusKu Erik Ajaya

## Deskripsi
KursusKu Erik Ajaya adalah aplikasi web sederhana yang dibuat menggunakan Laravel untuk menampilkan informasi kursus pemrograman. Proyek ini merupakan praktikum Pemrograman Web III tentang framework Laravel dan konsep MVC.

## Teknologi
- PHP
- Laravel
- HTML
- CSS
- Blade Template
- Laragon
- Visual Studio Code

## Fitur
- Menampilkan halaman utama KursusKu.
- Menampilkan ilustrasi pada bagian hero.
- Menampilkan tiga kursus unggulan.
- Menggunakan desain responsif untuk layar kecil.
- Menggunakan route bernama `home`.
- Menggunakan `HomeController` untuk menyiapkan data kursus.
- Menggunakan Blade untuk menampilkan halaman.

## Struktur File Utama
- `routes/web.php` — mengatur route halaman utama.
- `app/Http/Controllers/HomeController.php` — menyiapkan data dan memanggil view.
- `resources/views/home.blade.php` — menampilkan halaman dengan Blade.
- `public/css/style.css` — mengatur tampilan website.
- `public/images/hero-kursus.svg` — ilustrasi halaman utama.

## Cara Menjalankan
1. Pastikan PHP, Composer, dan Laravel project sudah tersedia.
2. Buka terminal di folder proyek.
3. Jalankan perintah:

   ```bash
   php artisan serve
   ```

4. Buka browser dan kunjungi `http://127.0.0.1:8000`.

## Alur Request
Browser → Route → HomeController → Blade View → HTML Response → Browser.

## Catatan Praktikum
Proyek ini berfokus pada pemahaman Route, Controller, View, dan aset publik Laravel. Database, CRUD, dan fitur login belum ditambahkan karena bukan bagian dari target praktikum ini.