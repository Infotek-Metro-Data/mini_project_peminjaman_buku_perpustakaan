<x-app-layout>

    <div class="relative bg-indigo-700 overflow-hidden">
        <div class="absolute inset-0">
        </div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 sm:py-24 text-center">
            <h1 class="text-4xl font-extrabold text-white tracking-tight sm:text-5xl mb-4 drop-shadow-md">
                Jelajahi Samudra Ilmu
            </h1>
            <p class="max-w-2xl mx-auto text-xl text-indigo-100 mb-8">
                Temukan ribuan koleksi buku, dari fiksi hingga sains, siap untuk Anda pinjam.
            </p>
            <form action="{{ route('anggota.buku.index') }}" method="GET" class="max-w-xl mx-auto relative">
                @if (request('kategori_id'))
                    <input type="hidden" name="kategori_id" value="{{ request('kategori_id') }}">
                @endif

                <div class="relative group">
                    <input type="text" name="search" value="{{ request('search') }}"
                        class="block w-full py-4 pl-6 pr-12 text-gray-900 placeholder-gray-500 bg-white border-0 rounded-full shadow-2xl focus:outline-none focus:ring-4 focus:ring-indigo-400/50 transition-all"
                        placeholder="Cari judul buku, penulis, atau topik...">
                    <button type="submit"
                        class="absolute right-2 top-2 p-2.5 bg-indigo-600 text-white rounded-full hover:bg-indigo-700 focus:outline-none shadow-md transition-transform active:scale-95">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </button>
                </div>
            </form>
        </div>
    </div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="flex items-center gap-2 overflow-x-auto pb-4 mb-8 hide-scrollbar">
            <span class="text-sm font-semibold text-gray-500 mr-2 uppercase tracking-wider">Filter:</span>

            <a href="{{ route('anggota.buku.index', ['search' => request('search')]) }}"
                class="px-5 py-2 rounded-full text-sm font-medium transition-all duration-200 border shadow-sm whitespace-nowrap
               {{ !request('kategori_id') ? 'bg-indigo-600 text-white border-indigo-600 ring-2 ring-indigo-200' : 'bg-white text-gray-600 border-gray-200 hover:border-indigo-300 hover:text-indigo-600 hover:bg-gray-50' }}">
                Semua
            </a>

            @foreach ($kategoris as $kategori)
                <a href="{{ route('anggota.buku.index', array_merge(request()->query(), ['kategori_id' => $kategori->id])) }}"
                    class="px-5 py-2 rounded-full text-sm font-medium transition-all duration-200 border shadow-sm whitespace-nowrap
                   {{ request('kategori_id') == $kategori->id ? 'bg-indigo-600 text-white border-indigo-600 ring-2 ring-indigo-200' : 'bg-white text-gray-600 border-gray-200 hover:border-indigo-300 hover:text-indigo-600 hover:bg-gray-50' }}">
                    {{ $kategori->nama }}
                </a>
            @endforeach
        </div>
        @if ($bukus->count() > 0)
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-6 lg:gap-8">
                @foreach ($bukus as $buku)
                    <div
                        class="group bg-white rounded-xl shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 border border-gray-100 overflow-hidden flex flex-col h-full">
                        <div class="relative aspect-[2/3] overflow-hidden bg-gray-100">
                            <img src="{{ $buku->cover_url }}" alt="{{ $buku->judul }}"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            </div>
                            <div class="absolute top-3 right-3">
                                <span
                                    class="px-2.5 py-1 text-[10px] font-bold uppercase tracking-wide rounded-md shadow-sm {{ $buku->stok > 0 ? 'bg-emerald-500 text-white' : 'bg-rose-500 text-white' }}">
                                    {{ $buku->stok > 0 ? 'Ada' : 'Habis' }}
                                </span>
                            </div>
                        </div>
                        <div class="p-4 flex flex-col flex-grow">
                            <div class="text-xs font-bold text-indigo-500 mb-1.5 uppercase tracking-wider">
                                {{ $buku->kategori->first()->nama ?? 'Umum' }}
                            </div>

                            <h3 class="text-gray-900 font-bold text-base leading-snug mb-1 line-clamp-2 group-hover:text-indigo-600 transition-colors"
                                title="{{ $buku->judul }}">
                                {{ $buku->judul }}
                            </h3>

                            <p class="text-gray-500 text-sm mb-4 line-clamp-1">
                                {{ $buku->penulis }}
                            </p>

                            <div class="mt-auto pt-3 border-t border-gray-50">
                                <a href="{{ route('anggota.buku.show', $buku) }}"
                                    class="flex items-center justify-center w-full py-2.5 bg-gray-50 hover:bg-indigo-600 text-gray-700 hover:text-white text-sm font-bold rounded-lg transition-colors duration-200 group-hover:shadow-md">
                                    <span>Detail Buku</span>
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="h-4 w-4 ml-1 opacity-0 group-hover:opacity-100 transition-opacity duration-200 transform translate-x-[-5px] group-hover:translate-x-0"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="mt-12">
                {{ $bukus->links() }}
            </div>
        @else            <div
                class="flex flex-col items-center justify-center py-16 bg-white rounded-2xl border border-gray-100 shadow-sm text-center">
                <div class="bg-indigo-50 rounded-full p-4 mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-indigo-400" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 16l2.879-2.879m0 0a3 3 0 104.243-4.242 3 3 0 00-4.243 4.242zM21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900">Buku tidak ditemukan</h3>
                <p class="text-gray-500 mt-2 max-w-sm">Kami tidak dapat menemukan buku dengan kata kunci tersebut. Coba
                    cari dengan judul atau penulis lain.</p>
                <a href="{{ route('anggota.buku.index') }}"
                    class="mt-6 inline-flex items-center text-indigo-600 hover:text-indigo-700 font-semibold">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                    </svg>
                    Reset Pencarian
                </a>
            </div>
        @endif
    </div>
</x-app-layout>