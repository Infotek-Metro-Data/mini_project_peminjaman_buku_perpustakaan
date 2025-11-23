<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * @property int $id
 * @property int $kategori_id
 * @property string $judul
 * @property string $penulis
 * @property mixed|null $tahun_terbit
 * @property int $stok
 * @property string|null $cover
 * @property string $deskripsi
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Kategori $kategori
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\PeminjamanDetail> $peminjamanDetail
 * @property-read int|null $peminjaman_detail_count
 * @method static \Database\Factories\BukuFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Buku newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Buku newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Buku query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Buku whereCover($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Buku whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Buku whereDeskripsi($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Buku whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Buku whereJudul($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Buku whereKategoriId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Buku wherePenulis($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Buku whereStok($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Buku whereTahunTerbit($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Buku whereUpdatedAt($value)
 */
	class Buku extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $nama
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Buku> $buku
 * @property-read int|null $buku_count
 * @method static \Database\Factories\KategoriFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Kategori newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Kategori newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Kategori query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Kategori whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Kategori whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Kategori whereNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Kategori whereUpdatedAt($value)
 */
	class Kategori extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $user_id
 * @property string $tanggal_pinjam
 * @property string $tanggal_kembali
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\PeminjamanDetail> $detail
 * @property-read int|null $detail_count
 * @property-read \App\Models\User $user
 * @method static \Database\Factories\PeminjamanFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Peminjaman newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Peminjaman newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Peminjaman query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Peminjaman whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Peminjaman whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Peminjaman whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Peminjaman whereTanggalKembali($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Peminjaman whereTanggalPinjam($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Peminjaman whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Peminjaman whereUserId($value)
 */
	class Peminjaman extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $peminjaman_id
 * @property int $buku_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Buku $buku
 * @property-read \App\Models\Peminjaman $peminjaman
 * @method static \Database\Factories\PeminjamanDetailFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PeminjamanDetail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PeminjamanDetail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PeminjamanDetail query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PeminjamanDetail whereBukuId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PeminjamanDetail whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PeminjamanDetail whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PeminjamanDetail wherePeminjamanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PeminjamanDetail whereUpdatedAt($value)
 */
	class PeminjamanDetail extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $role
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

