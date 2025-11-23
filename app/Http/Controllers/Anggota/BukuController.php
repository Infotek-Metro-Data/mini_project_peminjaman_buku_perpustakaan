<?php

namespace App\Http\Controllers\Anggota;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    
    public function index(Request $request)
    {
        $query = Buku::with('kategori');
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('judul', 'like', "%{$search}%")
                  ->orWhere('penulis', 'like', "%{$search}%");
            });
        }
        if ($request->filled('kategori_id')) {
            $query->whereHas('kategori', function($q) use ($request) {
                $q->where('kategoris.id', $request->kategori_id);
            });
        }
        $bukus = $query->latest()->paginate(12)->withQueryString();
                $kategoris = Kategori::all();
        return view('anggota.buku.index', compact('bukus', 'kategoris'));
    }

    public function show(Buku $buku)
    {
        return view('anggota.buku.show', compact('buku'));
    }
}