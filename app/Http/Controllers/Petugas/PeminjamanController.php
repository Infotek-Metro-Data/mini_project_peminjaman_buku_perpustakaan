<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Models\Peminjaman;
use App\Models\User;
use App\Models\Buku;
use App\Models\PeminjamanDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 

class PeminjamanController extends Controller
{
   
    public function index()
    {
        $peminjamen = Peminjaman::with(['user', 'detail.buku'])
            ->latest()
            ->paginate(10);

        return view('petugas.peminjaman.index', compact('peminjamen'));
    }

    public function create()
    {
        $anggotas = User::where('role', 'anggota')->orderBy('name')->get();

        $bukus = Buku::where('stok', '>', 0)->orderBy('judul')->get();

        return view('petugas.peminjaman.create', compact('anggotas', 'bukus'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'required|date|after_or_equal:tanggal_pinjam',
            'buku_ids' => 'required|array|min:1', 
            'buku_ids.*' => 'exists:bukus,id',
        ]);
        DB::beginTransaction();

        try {
            $peminjaman = Peminjaman::create([
                'user_id' => $request->user_id,
                'tanggal_pinjam' => $request->tanggal_pinjam,
                'tanggal_kembali' => $request->tanggal_kembali,
                'status' => 'dipinjam',
            ]);
            foreach ($request->buku_ids as $bukuId) {
                $buku = Buku::find($bukuId);

                if ($buku->stok < 1) {
                    DB::rollBack();
                    return back()->with('error', 'Stok buku "' . $buku->judul . '" habis saat proses!');
                }

                $buku->decrement('stok');
                PeminjamanDetail::create([
                    'peminjaman_id' => $peminjaman->id,
                    'buku_id' => $bukuId,
                ]);
            }
            DB::commit();

            return redirect()->route('petugas.peminjaman.index')
                ->with('success', 'Peminjaman berhasil dicatat!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function kembalikan(Peminjaman $peminjaman)
    {
        if ($peminjaman->status == 'dikembalikan') {
            return back()->with('error', 'Transaksi sudah selesai.');
        }

        DB::beginTransaction();

        try {
            $peminjaman->update([
                'status' => 'dikembalikan',
            ]);
            foreach ($peminjaman->detail as $detail) {
                $buku = Buku::find($detail->buku_id);
                if ($buku) {
                    $buku->increment('stok'); 
                }
            }

            DB::commit();
            return redirect()->route('petugas.peminjaman.index')
                ->with('success', 'Buku berhasil dikembalikan & stok bertambah!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Gagal memproses pengembalian: ' . $e->getMessage());
        }
    }
}
