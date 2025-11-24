<x-app-layout>
    <div class="min-h-screen bg-gray-50 py-12">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <nav class="flex mb-8" aria-label="Breadcrumb">
                <a href="{{ route('anggota.buku.index') }}"
                    class="inline-flex items-center text-sm font-medium text-gray-500 hover:text-indigo-600 transition-colors">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Kembali ke Katalog
                </a>
            </nav>

            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
                <div class="md:flex">
                    <div
                        class="md:w-2/5 bg-gray-50 p-8 lg:p-10 flex flex-col items-center justify-center border-r border-gray-100">
                        <div
                            class="relative w-48 sm:w-56 shadow-2xl rounded-lg transform hover:scale-105 transition duration-500 rotate-1 hover:rotate-0">
                            <img src="{{ $buku->cover_url }}" alt="{{ $buku->judul }}"
                                class="w-full h-auto rounded-lg object-cover">
                        </div>
                        <div class="mt-8 text-center">
                            <p class="text-xs text-gray-400 uppercase tracking-widest mb-2 font-semibold">Status Stok
                            </p>
                            <span
                                class="inline-flex items-center px-4 py-2 rounded-full text-sm font-bold shadow-sm {{ $buku->stok > 0 ? 'bg-emerald-100 text-emerald-700 ring-1 ring-emerald-500/20' : 'bg-rose-100 text-rose-700 ring-1 ring-rose-500/20' }}">
                                <span
                                    class="w-2 h-2 rounded-full mr-2 {{ $buku->stok > 0 ? 'bg-emerald-500' : 'bg-rose-500' }}"></span>
                                {{ $buku->stok > 0 ? $buku->stok . ' Tersedia' : 'Habis Dipinjam' }}
                            </span>
                        </div>
                    </div>
                    <div class="md:w-3/5 p-8 lg:p-10 flex flex-col justify-between">
                        <div>
                            <div class="flex flex-wrap gap-2 mb-4">
                                @foreach ($buku->kategori as $kat)
                                    <span
                                        class="px-3 py-1 rounded-md text-[10px] font-bold uppercase tracking-wider bg-indigo-50 text-indigo-600 border border-indigo-100">
                                        {{ $kat->nama }}
                                    </span>
                                @endforeach
                            </div>

                            <h1 class="text-3xl sm:text-4xl font-extrabold text-gray-900 mb-2 leading-tight">
                                {{ $buku->judul }}
                            </h1>
                            <p class="text-lg text-gray-500 font-medium mb-6">
                                Penulis: <span class="text-indigo-600">{{ $buku->penulis }}</span>
                            </p>
                            <div class="grid grid-cols-2 gap-6 py-6 border-t border-b border-gray-100">
                                <div>
                                    <span
                                        class="block text-xs text-gray-400 uppercase tracking-wider font-bold mb-1">Tahun
                                        Terbit</span>
                                    <span class="block text-xl font-bold text-gray-800">{{ $buku->tahun_terbit }}</span>
                                </div>
                                <div>
                                    <span
                                        class="block text-xs text-gray-400 uppercase tracking-wider font-bold mb-1">Diperbarui</span>
                                    <span
                                        class="block text-xl font-bold text-gray-800">{{ $buku->updated_at->format('d M Y') }}</span>
                                </div>
                            </div>

                            <div class="mt-8">
                                <h3 class="text-lg font-bold text-gray-900 mb-3 flex items-center">
                                    <svg class="w-5 h-5 mr-2 text-indigo-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 6h16M4 12h16M4 18h7"></path>
                                    </svg>
                                    Sinopsis
                                </h3>
                                <div class="prose prose-indigo text-gray-600 text-justify leading-relaxed">
                                    <p>{{ $buku->deskripsi ?? 'Tidak ada deskripsi yang tersedia untuk buku ini.' }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="mt-10 pt-6 border-t border-gray-100">
                            <div class="bg-blue-50 border border-blue-100 rounded-xl p-4 flex items-start gap-3">
                                <svg class="w-6 h-6 text-blue-500 flex-shrink-0 mt-0.5" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <div>
                                    <h4 class="text-sm font-bold text-blue-900">Ingin meminjam buku ini?</h4>
                                    <p class="text-sm text-blue-700 mt-1">
                                        Silakan kunjungi perpustakaan dan tunjukkan halaman ini kepada petugas untuk
                                        diproses.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
