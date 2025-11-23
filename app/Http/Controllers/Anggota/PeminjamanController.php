<?php

namespace App\Http\Controllers\Anggota;

use App\Http\Controllers\Controller;
use App\Models\Peminjaman;
use Illuminate\Support\Facades\Auth;

class PeminjamanController extends Controller
{
    public function history()
    {
        $peminjamen = Peminjaman::with(['detail.buku'])
                        ->where('user_id', Auth::id()) 
                        ->latest()
                        ->paginate(10);

        return view('anggota.peminjaman.history', compact('peminjamen'));
    }
}