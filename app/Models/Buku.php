<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    /** @use HasFactory<\Database\Factories\BukuFactory> */
    use HasFactory;
    protected $fillable = [
        'kategori_id',
        'judul',
        'penulis',
        'tahun_terbit',
        'stok',
        'cover',
        'deskripsi'
    ];
    protected $casts = [
        'tahun_terbit' => 'integer'
    ];

    public function kategori()
    {
        return $this->belongsToMany(Kategori::class, 'buku_kategori', 'buku_id', 'kategori_id');
    }
    public function peminjamanDetail()
    {
        return $this->hasMany(PeminjamanDetail::class);
    }
    public function getCoverUrlAttribute()
    {
        if ($this->cover) {
            return asset('storage/' . $this->cover);
        }
        return asset('images/no-cover.jpg');
    }
}
