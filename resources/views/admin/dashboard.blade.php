<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Administrator') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm border border-gray-300 rounded-lg overflow-hidden mb-8">
                <div class="p-8 text-center">
                    <h3 class="text-3xl font-bold text-gray-800 mb-2">
                        Selamat Datang, {{ Auth::user()->name }}!
                    </h3>
                    <p class="text-lg text-gray-600">
                        Anda login sebagai:
                        <span
                            class="inline-flex items-center px-4 py-1.5 text-sm font-bold text-indigo-700 bg-indigo-100 rounded-full">
                            {{ strtoupper(Auth::user()->role) }}
                        </span>
                    </p>
                </div>
            </div>
            <div class="bg-white shadow-sm border border-gray-300 rounded-lg overflow-hidden">
                <div class="p-6 border-b border-gray-200">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-x-3">
                            <h2 class="text-lg font-semibold text-gray-800">Transaksi Terbaru</h2>
                            <span class="px-3 py-1 text-xs font-bold text-black bg-white rounded-full drop-shadow-lg">
                                {{ $peminjamen->total() }} Transaksi
                            </span>
                        </div>
                        <a href="{{ route('petugas.peminjaman.index') }}"
                            class="text-sm text-indigo-600 hover:text-indigo-800 font-medium transition">
                            Lihat Semua →
                        </a>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="py-3.5 px-4 text-sm font-semibold text-left text-gray-800">Peminjam</th>
                                <th class="px-12 py-3.5 text-sm font-semibold text-left text-gray-800">Status</th>
                                <th class="px-4 py-3.5 text-sm font-semibold text-left text-gray-800">Tgl Pinjam</th>
                                <th class="px-4 py-3.5 text-sm font-semibold text-left text-gray-800">Buku</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($peminjamen as $peminjaman)
                                <tr class="hover:bg-gray-50 transition duration-100">
                                    <td class="px-4 py-4 text-sm font-medium text-gray-700">
                                        <div class="flex items-center gap-x-3">
                                            <div
                                                class="w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center font-bold text-gray-600 text-sm uppercase">
                                                {{ substr($peminjaman->user->name, 0, 2) }}
                                            </div>
                                            <div>
                                                <h2 class="text-gray-800 font-semibold">{{ $peminjaman->user->name }}
                                                </h2>
                                                <p class="text-sm text-gray-600">{{ $peminjaman->user->email }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-12 py-4 text-sm">
                                        @if ($peminjaman->status == 'dipinjam')
                                            <span
                                                class="inline-flex items-center px-3 py-1 text-xs font-bold text-yellow-700 bg-yellow-100 rounded-full">
                                                <span class="w-2 h-2 bg-yellow-500 rounded-full mr-1.5"></span>
                                                Dipinjam
                                            </span>
                                        @else
                                            <span
                                                class="inline-flex items-center px-3 py-1 text-xs font-bold text-emerald-700 bg-emerald-100 rounded-full">
                                                <span class="w-2 h-2 bg-emerald-500 rounded-full mr-1.5"></span>
                                                Dikembalikan
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-4 py-4 text-sm text-gray-600">
                                        {{ $peminjaman->tanggal_pinjam->format('d M Y') }}
                                    </td>
                                    <td class="px-4 py-4 text-sm text-gray-600">
                                        <div class="flex flex-col gap-1">
                                            @foreach ($peminjaman->detail as $detail)
                                                <span class="text-xs bg-gray-100 px-2 py-1 rounded text-gray-700">
                                                    {{ $detail->buku->judul ?? 'Buku dihapus' }}
                                                </span>
                                            @endforeach
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="p-6 border-t border-gray-200">
                    {{ $peminjamen->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
