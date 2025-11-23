<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Buku') }}: {{ $buku->judul }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg border border-gray-200">
                <div class="p-8">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                        <div class="md:col-span-1 text-center">
                            <img src="{{ $buku->cover ? asset('storage/' . $buku->cover) : asset('images/no-cover.jpg') }}"
                                alt="Cover {{ $buku->judul }}"
                                class="w-full max-w-xs mx-auto rounded-lg shadow-md border border-gray-200 object-cover transition-transform duration-300 hover:scale-105">

                            <div class="mt-6">
                                <span
                                    class="inline-flex items-center px-4 py-1.5 text-sm font-semibold rounded-full 
                                    {{ $buku->stok > 0 ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    Stok: {{ $buku->stok }} eks
                                </span>
                            </div>
                        </div>
                        <div class="md:col-span-2">
                            <div class="flow-root">
                                <dl class="divide-y divide-gray-200">

                                    <div class="py-3 sm:grid sm:grid-cols-3 sm:gap-4">
                                        <dt class="text-sm font-semibold text-gray-700">Judul Buku</dt>
                                        <dd class="mt-1 text-sm text-gray-800 sm:col-span-2 sm:mt-0">{{ $buku->judul }}
                                        </dd>
                                    </div>

                                    <div class="py-3 sm:grid sm:grid-cols-3 sm:gap-4">
                                        <dt class="text-sm font-semibold text-gray-700">Kategori</dt>
                                        <dd class="mt-1 text-sm text-gray-800 sm:col-span-2 sm:mt-0">
                                            @if ($buku->kategori->count() > 0)
                                                <div class="flex flex-wrap gap-2">
                                                    @foreach ($buku->kategori as $kat)
                                                        <span
                                                            class="bg-indigo-50 text-indigo-700 text-xs font-bold px-3 py-1 rounded-full border border-indigo-200">
                                                            {{ $kat->nama }}
                                                        </span>
                                                    @endforeach
                                                </div>
                                            @else
                                                <span class="text-gray-500 italic text-sm">Tidak ada kategori</span>
                                            @endif
                                        </dd>
                                    </div>

                                    <div class="py-3 sm:grid sm:grid-cols-3 sm:gap-4">
                                        <dt class="text-sm font-semibold text-gray-700">Penulis</dt>
                                        <dd class="mt-1 text-sm text-gray-800 sm:col-span-2 sm:mt-0">
                                            {{ $buku->penulis }}</dd>
                                    </div>

                                    <div class="py-3 sm:grid sm:grid-cols-3 sm:gap-4">
                                        <dt class="text-sm font-semibold text-gray-700">Tahun Terbit</dt>
                                        <dd class="mt-1 text-sm text-gray-800 sm:col-span-2 sm:mt-0">
                                            {{ $buku->tahun_terbit }}</dd>
                                    </div>

                                    <div class="py-3 sm:grid sm:grid-cols-3 sm:gap-4">
                                        <dt class="text-sm font-semibold text-gray-700">Terakhir Diupdate</dt>
                                        <dd class="mt-1 text-sm text-gray-800 sm:col-span-2 sm:mt-0">
                                            {{ $buku->updated_at->format('d F Y, H:i') }} WIB
                                        </dd>
                                    </div>

                                    <div class="py-3 sm:grid sm:grid-cols-3 sm:gap-4">
                                        <dt class="text-sm font-semibold text-gray-700">Deskripsi / Sinopsis</dt>
                                        <dd
                                            class="mt-1 text-sm text-gray-800 sm:col-span-2 sm:mt-0 text-justify leading-relaxed">
                                            {{ $buku->deskripsi ?? 'Tidak tersedia.' }}
                                        </dd>
                                    </div>

                                </dl>
                            </div>
                            <div class="mt-10 flex flex-wrap gap-3">
                                <a href="{{ route('admin.buku.index') }}"
                                    class="px-5 py-2.5 text-sm font-medium text-white bg-gray-600 rounded-lg hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition">
                                    ← Kembali
                                </a>
                                <a href="{{ route('admin.buku.edit', $buku) }}"
                                    class="px-5 py-2.5 text-sm font-medium text-white bg-indigo-600 rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition">
                                    Edit Buku
                                </a>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
