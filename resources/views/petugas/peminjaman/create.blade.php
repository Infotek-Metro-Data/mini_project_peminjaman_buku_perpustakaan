<x-app-layout>
    <section class="container px-4 mx-auto py-12">
        <div class="max-w-3xl mx-auto">

            <div class="flex items-center justify-between mb-6">
                <h2 class="text-lg font-medium text-gray-800 dark:text-white">Catat Peminjaman Baru</h2>
                <a href="{{ route('petugas.peminjaman.index') }}"
                    class="text-sm text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-gray-200">
                    &larr; Batal
                </a>
            </div>

            <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg overflow-hidden">
                <div class="p-6">
                    <form action="{{ route('petugas.peminjaman.store') }}" method="POST">
                        @csrf
                        <div class="mb-6">
                            <x-input-label for="user_id" :value="__('Anggota Peminjam')" />
                            <select id="user_id" name="user_id"
                                class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                                required>
                                <option value="">-- Pilih Anggota --</option>
                                @foreach ($anggotas as $anggota)
                                    <option value="{{ $anggota->id }}"
                                        {{ old('user_id') == $anggota->id ? 'selected' : '' }}>
                                        {{ $anggota->name }} ({{ $anggota->email }})
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('user_id')" class="mt-2" />
                        </div>
                        <div class="mb-6">
                            <x-input-label for="buku_ids" :value="__('Pilih Buku (Tekan Ctrl/Cmd untuk pilih banyak)')" />
                            <select id="buku_ids" name="buku_ids[]" multiple
                                class="mt-1 block w-full h-40 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                                required>
                                @foreach ($bukus as $buku)
                                    <option value="{{ $buku->id }}"
                                        {{ collect(old('buku_ids'))->contains($buku->id) ? 'selected' : '' }}>
                                        {{ $buku->judul }} — Stok: {{ $buku->stok }}
                                    </option>
                                @endforeach
                            </select>
                            <p class="text-xs text-gray-500 mt-1">Hanya buku dengan stok tersedia yang tampil disini.
                            </p>
                            <x-input-error :messages="$errors->get('buku_ids')" class="mt-2" />
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div>
                                <x-input-label for="tanggal_pinjam" :value="__('Tanggal Pinjam')" />
                                <x-text-input id="tanggal_pinjam" class="block mt-1 w-full" type="date"
                                    name="tanggal_pinjam" :value="old('tanggal_pinjam', now()->toDateString())" required />
                                <x-input-error :messages="$errors->get('tanggal_pinjam')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="tanggal_kembali" :value="__('Rencana Kembali (Max 7 Hari)')" />
                                <x-text-input id="tanggal_kembali" class="block mt-1 w-full" type="date"
                                    name="tanggal_kembali" :value="old('tanggal_kembali', now()->addDays(7)->toDateString())" required />
                                <x-input-error :messages="$errors->get('tanggal_kembali')" class="mt-2" />
                            </div>
                        </div>

                        <div class="flex justify-end">
                            <button type="submit"
                                class="px-6 py-2 text-sm font-medium text-white transition-colors duration-200 bg-indigo-600 rounded-lg hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Simpan Transaksi
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
