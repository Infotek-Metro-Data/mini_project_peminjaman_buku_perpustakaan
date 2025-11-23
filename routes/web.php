<?php

use App\Http\Controllers\Admin\BukuController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Petugas\PeminjamanController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Anggota\BukuController as AnggotaBukuController;
use App\Http\Controllers\Anggota\PeminjamanController as AnggotaPeminjamanController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'public.home')->name('home');
Route::view('/about', 'public.about')->name('about');
Route::view('/contact', 'public.contact')->name('contact');

Route::get('/dashboard', function () {
    if (!Auth::check()) {
        return redirect()->route('login');
    }
    $role = Auth::user()->role;
    if ($role === 'admin') {
        return redirect()->route('admin.dashboard');
    } elseif ($role === 'petugas') {
        return redirect()->route('petugas.dashboard');
    } else {
        return redirect()->route('anggota.buku.index');
    }
})->middleware(['auth', 'verified'])->name('dashboard');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
Route::middleware(['auth', 'verified', 'check-access:admin,petugas'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::resource('buku', BukuController::class);
    });


Route::middleware(['auth', 'verified', 'check-access:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/dashboard', function () {
            $peminjamen = \App\Models\Peminjaman::with(['user', 'detail.buku'])
                ->latest()
                ->paginate(5);

            return view('admin.dashboard', compact('peminjamen'));
        })->name('dashboard');
        Route::resource('users', UserController::class);
        Route::resource('kategori', KategoriController::class);
    });


Route::middleware(['auth', 'verified', 'check-access:admin,petugas'])
    ->prefix('petugas')
    ->name('petugas.')
    ->group(function () {
        Route::view('/dashboard', 'petugas.dashboard')->name('dashboard');
        Route::resource('peminjaman', PeminjamanController::class)->except(['show']);
        Route::patch('peminjaman/{peminjaman}/kembalikan', [PeminjamanController::class, 'kembalikan'])->name('peminjaman.kembalikan');
    });

    
Route::middleware(['auth', 'verified', 'check-access:anggota'])
    ->prefix('anggota')
    ->name('anggota.')
    ->group(function () {
        Route::get('/buku', [AnggotaBukuController::class, 'index'])->name('buku.index');
        Route::get('/buku/{buku}', [AnggotaBukuController::class, 'show'])->name('buku.show');
        Route::get('/peminjaman/history', [AnggotaPeminjamanController::class, 'history'])->name('peminjaman.history');
    });
