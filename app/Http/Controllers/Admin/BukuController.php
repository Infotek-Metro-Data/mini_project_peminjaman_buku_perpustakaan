<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BukuController extends Controller
{
    public function index(Request $request)
    {
        $query = Buku::with('kategori');
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('judul', 'like', "%{$search}%")
                    ->orWhere('penulis', 'like', "%{$search}%");
            });
        }
        if ($request->filled('kategori')) {
            $kategoriId = $request->kategori;
            $query->whereHas('kategori', function ($q) use ($kategoriId) {
                $q->where('kategoris.id', $kategoriId);
            });
        }
        $bukus = $query->latest()->paginate(10)->withQueryString();
        $kategoris = \App\Models\Kategori::all();

        return view('admin.buku.index', compact('bukus', 'kategoris'));
    }

    public function create()
    {
        $kategoris = Kategori::all();
        return view('admin.buku.create', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'kategori' => 'required|array',
            'kategori.*' => 'exists:kategoris,id',
            'tahun_terbit' => 'nullable|integer|between:1000,' . (date('Y') + 5),
            'stok' => 'required|integer|min:0',
            'cover' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'deskripsi' => 'nullable|string',
        ]);

        $data = $request->except(['kategori', 'cover']);

        if ($request->hasFile('cover')) {
            $data['cover'] = $request->file('cover')->store('covers', 'public');
        }

        $buku = Buku::create($data);
        $buku->kategori()->attach($request->kategori);


        return redirect()->route('admin.buku.index')->with('success', 'Buku berhasil ditambahkan.');
    }

    public function edit(Buku $buku)
    {
        $kategoris = Kategori::all();
        return view('admin.buku.edit', compact('buku', 'kategoris'));
    }

    public function update(Request $request, Buku $buku)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategoris,id',
            'tahun_terbit' => 'nullable|integer|between:1000,' . (date('Y') + 5),
            'stok' => 'required|integer|min:0',
            'cover' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'deskripsi' => 'nullable|string',
        ]);

        $data = $request->only(['kategori_id', 'judul', 'penulis', 'tahun_terbit', 'stok', 'deskripsi']);

        if ($request->hasFile('cover')) {
            $data['cover'] = $request->file('cover')->store('covers', 'public');
        }

        $buku->update($data);

        $buku->kategori()->sync($request->kategori);

        return redirect()->route('admin.buku.index')->with('success', 'Buku berhasil diperbarui.');
    }
    public function show(Buku $buku)
    {
        return view('admin.buku.show', compact('buku'));
    }

    public function destroy(Buku $buku)
    {
        if ($buku->cover && Storage::exists('public/' . $buku->cover)) {
            Storage::delete('public/' . $buku->cover);
        }
        $buku->delete();

        return redirect()->route('admin.buku.index')->with('success', 'Buku berhasil dihapus.');
    }
}
