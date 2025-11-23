<x-app-layout>
    <section class="container px-4 mx-auto py-12">
        <div class="max-w-4xl mx-auto">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-xl font-bold text-gray-800">Edit Buku: {{ $buku->judul }}</h2>
                <a href="{{ route('admin.buku.index') }}"
                    class="flex items-center text-sm text-gray-600 hover:text-gray-900 transition">
                    ← <span class="ml-1">Kembali</span>
                </a>
            </div>
            <div class="bg-white shadow-sm border border-gray-300 rounded-lg overflow-hidden">
                <div class="p-6">

                    <form action="{{ route('admin.buku.update', $buku) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-6">
                            <label for="judul" class="block text-sm font-semibold text-gray-700 mb-2">Judul
                                Buku</label>
                            <input type="text" name="judul" id="judul" value="{{ old('judul', $buku->judul) }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500 transition"
                                required>
                            @error('judul')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label for="penulis" class="block text-sm font-semibold text-gray-700 mb-2">Penulis</label>
                            <input type="text" name="penulis" id="penulis"
                                value="{{ old('penulis', $buku->penulis) }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500 transition"
                                required>
                            @error('penulis')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Kategori</label>
                            <div
                                class="grid grid-cols-2 md:grid-cols-3 gap-4 p-4 border border-gray-200 rounded-lg bg-gray-50">
                                @foreach ($kategoris as $kategori)
                                    <label
                                        class="inline-flex items-center cursor-pointer hover:bg-gray-100 p-2 rounded transition">
                                        <input type="checkbox" name="kategori[]" value="{{ $kategori->id }}"
                                            class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500"
                                            {{ $buku->kategori->contains($kategori->id) || (is_array(old('kategori')) && in_array($kategori->id, old('kategori'))) ? 'checked' : '' }}>
                                        <span class="ml-2 text-sm text-gray-700">{{ $kategori->nama }}</span>
                                    </label>
                                @endforeach
                            </div>
                            @error('kategori')
                                <p class="mt-2 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div>
                                <label for="tahun_terbit" class="block text-sm font-semibold text-gray-700 mb-2">Tahun
                                    Terbit</label>
                                <input type="number" name="tahun_terbit" id="tahun_terbit"
                                    value="{{ old('tahun_terbit', $buku->tahun_terbit) }}" min="1000"
                                    max="{{ date('Y') + 5 }}"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500 transition">
                                @error('tahun_terbit')
                                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="stok"
                                    class="block text-sm font-semibold text-gray-700 mb-2">Stok</label>
                                <input type="number" name="stok" id="stok"
                                    value="{{ old('stok', $buku->stok) }}" min="0" required
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500 transition">
                                @error('stok')
                                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-6">
                            <label for="cover" class="block text-sm font-semibold text-gray-700 mb-2">Cover
                                Buku</label>
                            <p class="text-xs text-gray-500 mb-2">Biarkan kosong jika tidak ingin mengubah.</p>
                            <input type="file" name="cover" id="cover"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-200 cursor-pointer bg-gray-50"
                                accept="image/*">
                            @error('cover')
                                <p class="mt-2 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label for="deskripsi"
                                class="block text-sm font-semibold text-gray-700 mb-2">Deskripsi</label>
                            <textarea name="deskripsi" id="deskripsi" rows="4"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500 bg-white"
                                placeholder="Tulis deskripsi buku...">{{ old('deskripsi', $buku->deskripsi) }}</textarea>
                            @error('deskripsi')
                                <p class="mt-2 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex justify-end gap-x-3">
                            <a href="{{ route('admin.buku.index') }}"
                                class="px-5 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-200 transition drop-shadow-lg">
                                Batal
                            </a>
                            <button type="submit"
                                class="px-5 py-2 text-sm font-medium text-white bg-indigo-600 rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition drop-shadow-lg">
                                Perbarui Buku
                            </button>
                        </div>
                    </form>
                    @if ($errors->any())
                        <div class="mt-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg">
                            <strong class="font-bold">Terjadi kesalahan!</strong>
                            <ul class="list-disc list-inside mt-1">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
