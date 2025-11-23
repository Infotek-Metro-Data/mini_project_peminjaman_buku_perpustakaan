<x-app-layout>
    <section class="container px-4 mx-auto py-12">
        <div class="mb-8">
            <h2 class="text-2xl font-bold text-gray-800">Riwayat Peminjaman Saya</h2>
            <p class="mt-1 text-sm text-gray-500">
                Total transaksi Anda: <span class="font-bold text-indigo-600">{{ $peminjamen->total() }}</span>
            </p>
        </div>
        <div class="flex flex-col">
            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                    <div class="overflow-hidden border border-gray-200 shadow-sm rounded-lg bg-white">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="py-4 px-6 text-xs font-bold text-left text-gray-500 uppercase tracking-wider">
                                        Buku yang Dipinjam
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-4 text-xs font-bold text-left text-gray-500 uppercase tracking-wider">
                                        Tanggal Pinjam
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-4 text-xs font-bold text-left text-gray-500 uppercase tracking-wider">
                                        Batas Kembali
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-4 text-xs font-bold text-left text-gray-500 uppercase tracking-wider">
                                        Status
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse ($peminjamen as $peminjaman)
                                    <tr class="hover:bg-gray-50 transition-colors">
                                        <td class="px-6 py-4">
                                            <div class="flex flex-col gap-3">
                                                @foreach ($peminjaman->detail as $detail)
                                                    <div class="flex items-center gap-3">
                                                        <div
                                                            class="h-12 w-9 rounded border border-gray-200 shadow-sm overflow-hidden flex-shrink-0 bg-gray-100">
                                                            <img src="{{ $detail->buku->cover_url }}"
                                                                class="h-full w-full object-cover" alt="Cover">
                                                        </div>

                                                        <div>
                                                            <span
                                                                class="block font-medium text-gray-900 text-sm truncate max-w-xs">
                                                                {{ $detail->buku->judul ?? 'Data Buku Dihapus' }}
                                                            </span>
                                                            <span class="text-xs text-gray-500">
                                                                {{ $detail->buku->penulis ?? '-' }}
                                                            </span>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $peminjaman->tanggal_pinjam->format('d M Y') }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                                            <div class="flex items-center gap-1.5">
                                                <svg class="w-4 h-4 {{ $peminjaman->status == 'dipinjam' && now() > $peminjaman->tanggal_kembali ? 'text-red-500' : 'text-gray-400' }}"
                                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                                    </path>
                                                </svg>

                                                <span
                                                    class="{{ $peminjaman->status == 'dipinjam' && now() > $peminjaman->tanggal_kembali ? 'text-red-600 font-bold' : 'text-gray-700' }}">
                                                    {{ $peminjaman->tanggal_kembali->format('d M Y') }}
                                                </span>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @if ($peminjaman->status == 'dipinjam')
                                                @if (now() > $peminjaman->tanggal_kembali)
                                                    <span
                                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800 border border-red-200">
                                                        <span class="w-1.5 h-1.5 rounded-full bg-red-600 mr-1.5"></span>
                                                        Terlambat
                                                    </span>
                                                @else
                                                    <span
                                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800 border border-yellow-200">
                                                        <span
                                                            class="w-1.5 h-1.5 rounded-full bg-yellow-600 mr-1.5 animate-pulse"></span>
                                                        Sedang Dipinjam
                                                    </span>
                                                @endif
                                            @else
                                                <span
                                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-emerald-100 text-emerald-800 border border-emerald-200">
                                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-600 mr-1.5"></span>
                                                    Dikembalikan
                                                </span>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="px-6 py-16 text-center text-gray-500">
                                            <div class="flex flex-col items-center justify-center">
                                                <svg class="w-12 h-12 text-gray-300 mb-3" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                                                    </path>
                                                </svg>
                                                <p class="text-base font-medium text-gray-900">Belum ada riwayat
                                                    peminjaman.</p>
                                                <p class="text-sm mt-1">Ayo mulai pinjam buku di perpustakaan!</p>
                                                <a href="{{ route('anggota.buku.index') }}"
                                                    class="mt-4 inline-flex items-center text-indigo-600 hover:text-indigo-500 font-medium text-sm">
                                                    Lihat Katalog Buku →
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-6">
            {{ $peminjamen->links() }}
        </div>
    </section>
</x-app-layout>
