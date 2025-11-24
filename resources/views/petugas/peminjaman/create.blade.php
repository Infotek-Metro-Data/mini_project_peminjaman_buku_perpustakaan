<x-app-layout>
    <section class="container px-4 mx-auto py-12">
        <div class="max-w-4xl mx-auto">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-xl font-bold text-gray-800">Catat Peminjaman Baru</h2>
                <a href="{{ route('petugas.peminjaman.index') }}"
                    class="flex items-center text-sm text-gray-600 hover:text-gray-900 transition">
                    ← <span class="ml-1">Batal</span>
                </a>
            </div>
            <div class="bg-white shadow-sm border border-gray-300 rounded-lg overflow-hidden">
                <div class="p-6">
                    <form action="{{ route('petugas.peminjaman.store') }}" method="POST">
                        @csrf
                        <div class="mb-6">
                            <x-input-label for="user_id" :value="__('Anggota Peminjam')"
                                class="text-sm font-semibold text-gray-700" />
                            <select id="user_id" name="user_id"
                                class="mt-1 block w-full border-gray-300 rounded-lg focus:ring-indigo-200 focus:border-indigo-500"
                                required>
                                <option value="">-- Pilih Anggota --</option>
                                @foreach ($anggotas as $anggota)
                                    <option value="{{ $anggota->id }}"
                                        {{ old('user_id') == $anggota->id ? 'selected' : '' }}>
                                        {{ $anggota->name }} ({{ $anggota->email }})
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('user_id')" class="mt-1 text-xs text-red-500" />
                        </div>
                        <div class="mb-6">
                            <x-input-label for="buku_ids" :value="__('Pilih Buku (Tekan Ctrl/Cmd untuk pilih banyak)')"
                                class="text-sm font-semibold text-gray-700" />
                            <select id="buku_ids" name="buku_ids[]" multiple
                                class="mt-1 block w-full h-40 border-gray-300 rounded-lg focus:ring-indigo-200 focus:border-indigo-500"
                                required>
                                @foreach ($bukus as $buku)
                                    <option value="{{ $buku->id }}"
                                        {{ collect(old('buku_ids'))->contains($buku->id) ? 'selected' : '' }}>
                                        {{ $buku->judul }} — Stok: {{ $buku->stok }}
                                    </option>
                                @endforeach
                            </select>
                            <p class="mt-1 text-xs text-gray-500">Hanya buku dengan stok tersedia yang tampil disini.
                            </p>
                            <x-input-error :messages="$errors->get('buku_ids')" class="mt-1 text-xs text-red-500" />
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div>
                                <x-input-label for="tanggal_pinjam" :value="__('Tanggal Pinjam')"
                                    class="text-sm font-semibold text-gray-700" />
                                <x-text-input id="tanggal_pinjam" class="block mt-1 w-full" type="date"
                                    name="tanggal_pinjam" :value="old('tanggal_pinjam', now()->toDateString())" required />
                                <x-input-error :messages="$errors->get('tanggal_pinjam')" class="mt-1 text-xs text-red-500" />
                            </div>
                            <div>
                                <x-input-label for="tanggal_kembali" :value="__('Rencana Kembali (Max 7 Hari)')"
                                    class="text-sm font-semibold text-gray-700" />
                                <x-text-input id="tanggal_kembali" class="block mt-1 w-full" type="date"
                                    name="tanggal_kembali" :value="old('tanggal_kembali', now()->addDays(7)->toDateString())" required />
                                <x-input-error :messages="$errors->get('tanggal_kembali')" class="mt-1 text-xs text-red-500" />
                            </div>
                        </div>
                        <div class="flex justify-end gap-x-3">
                            <a href="{{ route('petugas.peminjaman.index') }}"
                                class="px-5 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-200 transition drop-shadow-lg">
                                Batal
                            </a>
                            <button type="submit"
                                class="px-5 py-2 text-sm font-medium text-white bg-indigo-600 rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition drop-shadow-lg">
                                Simpan Transaksi
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
