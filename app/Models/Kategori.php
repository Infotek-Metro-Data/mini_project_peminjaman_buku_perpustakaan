<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    /** @use HasFactory<\Database\Factories\KategoriFactory> */
    use HasFactory;
    protected $fillable = ['nama'];

    public function buku(){
        return $this->belongsToMany(Buku::class, 'buku_kategori', 'buku_id', 'kategori_id');
    }
}
