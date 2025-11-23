<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    /** @use HasFactory<\Database\Factories\PeminjamanFactory> */
    use HasFactory;
    protected $table ='peminjaman';
    protected $fillable = [
        'user_id', 'tanggal_pinjam', 'tanggal_kembali', 'status'
    ];
    protected $dates = ['tanggal_pinjam', 'tanggal_kembali'];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function detail(){
        return $this->hasMany(PeminjamanDetail::class, 'peminjaman_id');
    }
}
