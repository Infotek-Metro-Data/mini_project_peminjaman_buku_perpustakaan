<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kategori;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@admin.com', 
            'password' => Hash::make('password'), 
            'role' => 'admin',
        ]);
        User::create([
            'name' => 'Petugas Perpus',
            'email' => 'petugas@petugas.com',
            'password' => Hash::make('password'),
            'role' => 'petugas',
        ]);
        User::create([
            'name' => 'Siswa Teladan',
            'email' => 'siswa@siswa.com',
            'password' => Hash::make('password'),
            'role' => 'anggota',
        ]);
        Kategori::create(['nama' => 'Fiksi']);
        Kategori::create(['nama' => 'Sains']);
        Kategori::create(['nama' => 'Sejarah']);
        Kategori::create(['nama' => 'Teknologi']);
    }
}
