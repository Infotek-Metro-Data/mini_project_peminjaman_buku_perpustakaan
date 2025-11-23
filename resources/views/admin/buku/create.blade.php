<x-app-layout>
    <section class="container px-4 mx-auto py-12">
        <div class="max-w-4xl mx-auto">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-xl font-bold text-gray-800">Tambah Buku Baru</h2>
                <a href="{{ route('admin.buku.index') }}"
                    class="flex items-center text-sm text-gray-600 hover:text-gray-900 transition">
                    ← <span class="ml-1">Kembali</span>
                </a>
            </div>
            <div class="bg-white shadow-sm border border-gray-300 rounded-lg overflow-hidden">
                <div class="p-6">

                    <form action="{{ route('admin.buku.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div>
                                <x-input-label for="judul" :value="__('Judul Buku')"
                                    class="text-sm font-semibold text-gray-700" />
                                <x-text-input id="judul"
                                    class="block mt-1 w-full border-gray-300 rounded-lg focus:ring-indigo-200 focus:border-indigo-500"
                                    type="text" name="judul" :value="old('judul')" required autofocus />
                                <x-input-error :messages="$errors->get('judul')" class="mt-1 text-xs text-red-500" />
                            </div>

                            <div>
                                <x-input-label for="penulis" :value="__('Penulis')"
                                    class="text-sm font-semibold text-gray-700" />
                                <x-text-input id="penulis"
                                    class="block mt-1 w-full border-gray-300 rounded-lg focus:ring-indigo-200 focus:border-indigo-500"
                                    type="text" name="penulis" :value="old('penulis')" required />
                                <x-input-error :messages="$errors->get('penulis')" class="mt-1 text-xs text-red-500" />
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div>
                                <x-input-label for="tahun_terbit" :value="__('Tahun Terbit')"
                                    class="text-sm font-semibold text-gray-700" />
                                <x-text-input id="tahun_terbit"
                                    class="block mt-1 w-full border-gray-300 rounded-lg focus:ring-indigo-200 focus:border-indigo-500"
                                    type="number" name="tahun_terbit" min="1900" max="{{ date('Y') + 1 }}"
                                    :value="old('tahun_terbit')" />
                                <p class="mt-1 text-xs text-gray-500">Contoh: 2025</p>
                                <x-input-error :messages="$errors->get('tahun_terbit')" class="mt-1 text-xs text-red-500" />
                            </div>

                            <div>
                                <x-input-label for="stok" :value="__('Stok Awal')"
                                    class="text-sm font-semibold text-gray-700" />
                                <x-text-input id="stok"
                                    class="block mt-1 w-full border-gray-300 rounded-lg focus:ring-indigo-200 focus:border-indigo-500"
                                    type="number" name="stok" min="0" :value="old('stok', 0)" required />
                                <x-input-error :messages="$errors->get('stok')" class="mt-1 text-xs text-red-500" />
                            </div>
                        </div>
                        <div class="mb-6">
                            <x-input-label :value="__('Kategori')" class="text-sm font-semibold text-gray-700 mb-2" />
                            <div
                                class="grid grid-cols-2 md:grid-cols-3 gap-4 p-4 border border-gray-200 rounded-lg bg-gray-50">
                                @foreach ($kategoris as $kategori)
                                    <label
                                        class="inline-flex items-center cursor-pointer hover:bg-gray-100 p-2 rounded transition">
                                        <input type="checkbox" name="kategori[]" value="{{ $kategori->id }}"
                                            class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500"
                                            {{ is_array(old('kategori')) && in_array($kategori->id, old('kategori')) ? 'checked' : '' }}>
                                        <span class="ml-2 text-sm text-gray-700">{{ $kategori->nama }}</span>
                                    </label>
                                @endforeach
                            </div>
                            <x-input-error :messages="$errors->get('kategori')" class="mt-2 text-xs text-red-500" />
                        </div>
                        <div class="mb-6">
                            <x-input-label for="cover" :value="__('Cover Buku')"
                                class="text-sm font-semibold text-gray-700" />
                            <input type="file" name="cover" id="cover"
                                class="mt-1 block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-200"
                                accept="image/*" required>
                            <p class="mt-1 text-xs text-gray-500">Format: JPG, PNG, WEBP | Maks: 2MB</p>
                            <x-input-error :messages="$errors->get('cover')" class="mt-1 text-xs text-red-500" />
                        </div>
                        <div class="mb-6">
                            <x-input-label for="deskripsi" :value="__('Deskripsi')"
                                class="text-sm font-semibold text-gray-700" />
                            <textarea id="deskripsi" name="deskripsi" rows="4"
                                class="block w-full mt-1 text-sm text-gray-900 border border-gray-300 rounded-lg focus:ring-indigo-200 focus:border-indigo-500 bg-white"
                                placeholder="Tulis deskripsi atau sinopsis buku...">{{ old('deskripsi') }}</textarea>
                            <x-input-error :messages="$errors->get('deskripsi')" class="mt-1 text-xs text-red-500" />
                        </div>
                        <div class="flex justify-end gap-x-3">
                            <a href="{{ route('admin.buku.index') }}"
                                class="px-5 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-200 transition drop-shadow-lg">
                                Batal
                            </a>
                            <button type="submit"
                                class="px-5 py-2 text-sm font-medium text-white bg-indigo-600 rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition drop-shadow-lg">
                                Simpan Buku
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>
</x-app-layout>
