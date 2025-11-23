<x-app-layout>
    <section class="container px-4 mx-auto py-12">
        <div class="max-w-2xl mx-auto">
            <div class="flex items-center justify-between mb-8">
                <h2 class="text-xl font-bold text-gray-800">Edit Kategori: {{ $kategori->nama }}</h2>
                <a href="{{ route('admin.kategori.index') }}"
                    class="flex items-center text-sm text-gray-600 hover:text-gray-900 transition">
                    ← <span class="ml-1">Kembali</span>
                </a>
            </div>
            <div class="bg-white shadow-sm border border-gray-300 rounded-lg overflow-hidden">
                <div class="p-6">

                    <form action="{{ route('admin.kategori.update', $kategori) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-6">
                            <label for="nama" class="block text-sm font-semibold text-gray-700 mb-2">Nama
                                Kategori</label>
                            <input type="text" name="nama" id="nama"
                                value="{{ old('nama', $kategori->nama) }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500 transition"
                                placeholder="Misal: Fiksi, Teknologi, Sejarah" required>
                            @error('nama')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="flex justify-end gap-x-3">
                            <a href="{{ route('admin.kategori.index') }}"
                                class="px-5 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-200 transition drop-shadow-lg">
                                Batal
                            </a>
                            <button type="submit"
                                class="px-5 py-2 text-sm font-medium text-white bg-indigo-600 rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition drop-shadow-lg">
                                Perbarui Kategori
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
