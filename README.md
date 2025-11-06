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
