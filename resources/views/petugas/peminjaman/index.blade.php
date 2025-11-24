<x-app-layout>
    <section class="container px-4 mx-auto py-12">
        <div class="sm:flex sm:items-center sm:justify-between mb-8">
            <div class="flex items-center gap-x-3">
                <h2 class="text-lg font-semibold text-gray-800">Transaksi Peminjaman</h2>
                <span class="px-3 py-1 text-xs font-bold text-black bg-white rounded-full drop-shadow-lg">
                    {{ $peminjamen->total() }} transaksi
                </span>
            </div>

            <a href="{{ route('petugas.peminjaman.create') }}"
                class="flex items-center justify-center px-5 py-2 text-sm text-black bg-white rounded-lg gap-x-2 hover:bg-gray-200 font-bold transition drop-shadow-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
                <span>Catat Peminjaman</span>
            </a>
        </div>
        @if (session('success'))
            <div class="bg-emerald-100 border border-emerald-400 text-emerald-700 px-4 py-3 rounded mb-6"
                role="alert">
                <strong class="font-bold">Berhasil!</strong>
                <span class="block sm:inline"> {{ session('success') }}</span>
            </div>
        @endif
        @if (session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6" role="alert">
                <strong class="font-bold">Gagal!</strong>
                <span class="block sm:inline"> {{ session('error') }}</span>
            </div>
        @endif

        <div class="overflow-hidden border border-gray-300 rounded-lg shadow-sm">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="py-3.5 px-4 text-sm font-semibold text-left text-gray-800">Peminjam</th>
                        <th class="px-4 py-3.5 text-sm font-semibold text-left text-gray-800">Buku Dipinjam</th>
                        <th class="px-4 py-3.5 text-sm font-semibold text-left text-gray-800">Tanggal</th>
                        <th class="px-4 py-3.5 text-sm font-semibold text-left text-gray-800">Status</th>
                        <th class="px-4 py-3.5 text-sm font-semibold text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($peminjamen as $peminjaman)
                        <tr class="hover:bg-gray-50 transition duration-100">
                            <td class="px-4 py-4 text-sm font-medium text-gray-700">
                                <div class="flex items-center gap-x-3">
                                    <div
                                        class="w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center font-bold text-gray-600 text-sm uppercase">
                                        {{ substr($peminjaman->user->name ?? 'X', 0, 2) }}
                                    </div>
                                    <div>
                                        <h2 class="text-gray-800 font-semibold">
                                            {{ $peminjaman->user->name ?? 'User Terhapus' }}</h2>
                                        <p class="text-sm text-gray-600">{{ $peminjaman->user->email ?? '-' }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-4 text-sm text-gray-600">
                                <div class="flex flex-col gap-1">
                                    @foreach ($peminjaman->detail as $detail)
                                        <span
                                            class="inline-flex items-center px-2.5 py-0.5 text-xs font-medium bg-gray-100 text-gray-800 rounded">
                                             {{ $detail->buku->judul ?? 'Buku Terhapus' }}
                                        </span>
                                    @endforeach
                                </div>
                            </td>
                            <td class="px-4 py-4 text-sm text-gray-600">
                                <div class="flex flex-col">
                                    <span class="text-xs text-gray-500">Pinjam:</span>
                                    <span class="font-medium">{{ $peminjaman->tanggal_pinjam->format('d M Y') }}</span>

                                    <span class="text-xs text-gray-500 mt-1">Tenggat:</span>
                                    <span
                                        class="{{ now() > $peminjaman->tanggal_kembali && $peminjaman->status == 'dipinjam' ? 'text-red-600 font-semibold' : 'font-medium' }}">
                                        {{ $peminjaman->tanggal_kembali->format('d M Y') }}
                                    </span>
                                </div>
                            </td>
                            <td class="px-4 py-4 text-sm">
                                @if ($peminjaman->status == 'dipinjam')
                                    @if (now() > $peminjaman->tanggal_kembali)
                                        <span
                                            class="inline-flex items-center px-3 py-1 text-xs font-bold text-red-700 bg-red-100 rounded-full">
                                            <span class="w-2 h-2 bg-red-500 rounded-full mr-1.5"></span>
                                            Terlambat
                                        </span>
                                    @else
                                        <span
                                            class="inline-flex items-center px-3 py-1 text-xs font-bold text-yellow-700 bg-yellow-100 rounded-full">
                                            <span class="w-2 h-2 bg-yellow-500 rounded-full mr-1.5"></span>
                                            Sedang Dipinjam
                                        </span>
                                    @endif
                                @else
                                    <span
                                        class="inline-flex items-center px-3 py-1 text-xs font-bold text-emerald-700 bg-emerald-100 rounded-full">
                                        <span class="w-2 h-2 bg-emerald-500 rounded-full mr-1.5"></span>
                                        Dikembalikan
                                    </span>
                                @endif
                            </td>
                            <td class="px-4 py-4 text-sm text-right">
                                @if ($peminjaman->status == 'dipinjam')
                                    <form action="{{ route('petugas.peminjaman.kembalikan', $peminjaman) }}"
                                        method="POST"
                                        onsubmit="return confirm('Yakin buku ini sudah dikembalikan? Stok buku akan bertambah otomatis.');">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit"
                                            class="flex items-center gap-x-2 px-4 py-2 text-sm font-medium text-white bg-emerald-500 rounded-lg hover:bg-emerald-600 focus:outline-none focus:ring-2 focus:ring-emerald-300 transition">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            <span>Selesaikan</span>
                                        </button>
                                    </form>
                                @else
                                    <span class="text-gray-400 text-xs italic">Selesai</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-6">
            {{ $peminjamen->links() }}
        </div>
    </section>
</x-app-layout>
