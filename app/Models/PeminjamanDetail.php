<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeminjamanDetail extends Model
{
    /** @use HasFactory<\Database\Factories\PeminjamanDetailFactory> */
    use HasFactory;
    protected $table = 'peminjaman_details';
    protected $fillable = ['peminjaman_id', 'buku_id'];

    public function peminjaman(){
        return $this->belongsTo(Peminjaman::class);
    }
    public function buku(){
        return $this->belongsTo(Buku::class);
    }
}
