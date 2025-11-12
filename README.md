<<<<<<< HEAD
<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework. You can also check out [Laravel Learn](https://laravel.com/learn), where you will be guided through building a modern Laravel application.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
=======
# 📚 Sistem Peminjaman Buku Perpustakaan — Mini Project Laravel

## Deadline tanggal 24

## 🎯 Tujuan Pembelajaran

- Membuat sistem login dengan autentikasi Laravel (Breeze/Fortify)
- Mengelola relasi antar tabel (One-to-Many & Many-to-Many)
- Membuat validasi data dan upload file
- Menggunakan storage Laravel dengan benar (`storage/public`)
- Membuat CRUD dengan tampilan Blade Template yang rapi

---

## 📘 Deskripsi Pengguna

Aplikasi memiliki tiga jenis pengguna dengan hak akses berbeda:

| Role     | Hak Akses                                                                 |
|----------|---------------------------------------------------------------------------|
| Admin    | Mengelola seluruh data dan pengguna                                       |
| Petugas  | Mencatat transaksi peminjaman dan pengembalian buku                      |
| Anggota  | Melihat daftar buku dan riwayat peminjaman miliknya                      |

---

## 🧩 Spesifikasi Fitur

### 1. 🔐 Autentikasi

- Menggunakan Laravel Breeze atau Fortify
- Tabel `users` memiliki field `role` (admin, petugas, anggota)
- Hanya admin yang dapat membuat user baru dan mengubah role

### 2. 📚 Manajemen Buku

Admin dan Petugas dapat:

- Menambah, mengedit, dan menghapus data buku

#### Struktur Tabel `buku`

| Field         | Tipe     | Keterangan                          |
|---------------|----------|-------------------------------------|
| id            | integer  | Primary key                         |
| kategori_id   | integer  | Relasi ke tabel kategori            |
| judul         | string   | Wajib diisi                         |
| penulis       | string   | Wajib diisi                         |
| tahun_terbit  | year     | Opsional                            |
| stok          | integer  | Minimal 0                           |
| cover         | string   | Nama file gambar                    |
| deskripsi     | text     | Opsional                            |

#### Validasi

- `judul`, `penulis`, `kategori_id` wajib diisi
- `cover` wajib diupload saat tambah data, opsional saat edit
- Format `cover`: jpg, jpeg, png, maksimal 2MB

#### Upload File

- Simpan di: `storage/app/public/covers`
- Akses di view: `asset('storage/covers/'.$buku->cover)`

### 3. 🗂️ Kategori Buku

- Setiap buku memiliki satu kategori (One-to-Many)
- Contoh kategori: Teknologi, Novel, Ekonomi

### 4. 🔄 Transaksi Peminjaman

#### Struktur Tabel

- `peminjaman`: id, user_id, tanggal_pinjam, tanggal_kembali, status
- `peminjaman_detail`: id, peminjaman_id, buku_id

#### Logika

- Saat peminjaman dibuat → stok buku berkurang
- Saat pengembalian → stok bertambah
- Hanya Petugas yang dapat membuat/mengubah transaksi

### 5. 📖 Riwayat Anggota

Halaman anggota menampilkan:

- Judul Buku
- Tanggal Pinjam
- Status (Dipinjam / Dikembalikan)
- Gambar Cover Buku

---

## 💾 Relasi Antar Tabel

- `users` → memiliki banyak `peminjaman`
- `kategori` → memiliki banyak `buku`
- `buku` → milik satu `kategori`
- `peminjaman` → memiliki banyak `peminjaman_detail`
- `peminjaman_detail` → berelasi ke `buku` dan `peminjaman`

---

## 🧠 Challenge

- Filter pencarian buku berdasarkan kategori & judul
- Tambahkan pagination dan notifikasi SweetAlert
- Tampilkan cover default jika file gambar tidak ditemukan

## Note
 Buat halaman page dengan menarik, menggunakan UI/UX yang minimalis, jangan lupa agar di buat mobile friendly, Wajib menggunakan tailwind sebagai CSS, tidak boleh menggunakan boostrap
>>>>>>> efdbf0b6bc6913b2d3ae40f304733b8a551fdc06
