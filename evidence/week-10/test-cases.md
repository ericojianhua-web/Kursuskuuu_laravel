
# Test Cases - Praktikum Week 10

## Pengujian Laravel Database & CRUD I

| No. | Pengujian | Hasil yang Diharapkan | Hasil Aktual | Status |
|---|---|---|---|---|
| 1 | Menambahkan kursus | Data tersimpan ke database | Data berhasil tersimpan | Berhasil |
| 2 | Menampilkan kursus | Minimal 8 data tampil | 8 data tampil | Berhasil |
| 3 | Kode duplikat | Sistem menolak data | Pesan merah muncul | Berhasil |
| 4 | Biaya negatif | Sistem menolak data | Data ditolak | Berhasil |
| 5 | Kuota nol | Sistem menolak data | Data ditolak | Berhasil |
| 6 | Nama kursus kosong | Sistem menolak data | Pesan validasi muncul | Berhasil |

## Kesimpulan

Fitur Create dan Read pada aplikasi KursusKu berhasil dijalankan menggunakan Laravel dan database MySQL.

Validasi input juga berjalan sesuai dengan aturan yang telah ditentukan.
