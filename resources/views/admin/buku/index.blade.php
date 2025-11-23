<x-app-layout>
    <section class="container px-4 mx-auto py-12">
        <div class="sm:flex sm:items-center sm:justify-between mb-8">
            <div class="flex items-center gap-x-3">
                <h2 class="text-lg font-semibold text-gray-800">Daftar Buku</h2>
                <span class="px-3 py-1 text-xs font-bold text-black bg-white rounded-full drop-shadow-lg">
                    {{ $bukus->total() }} buku
                </span>
            </div>

            <a href="{{ route('admin.buku.create') }}"
                class="flex items-center justify-center px-5 py-2 text-sm text-black bg-white rounded-lg gap-x-2 hover:bg-gray-200 font-bold transition drop-shadow-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>Tambah Buku</span>
            </a>
        </div>


        <div class="mb-8 space-y-4">
            <form method="GET" action="{{ route('admin.buku.index') }}" class="relative max-w-md">
                @if (request('kategori'))
                    <input type="hidden" name="kategori" value="{{ request('kategori') }}">
                @endif
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </span>
                    <input type="text" name="search" value="{{ request('search') }}"
                        class="w-full py-2 pl-10 pr-4 text-black bg-white border border-transparent rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-200 focus:border-transparent drop-shadow-2xl"
                        placeholder="Cari Judul atau Penulis...">
                </div>
            </form>

            <div class="flex overflow-x-auto pb-2 gap-2 hide-scrollbar">
                <a href="{{ route('admin.buku.index', ['search' => request('search')]) }}"
                    class="px-4 py-2 text-sm font-medium rounded-full border whitespace-nowrap transition
                          {{ !request('kategori') ? 'bg-gray-800 text-white border-gray-800' : 'bg-white text-gray-700 border-gray-300 hover:bg-gray-200 drop-shadow-lg' }}">
                    Semua
                </a>
                @foreach ($kategoris as $cat)
                    <a href="{{ route('admin.buku.index', array_merge(request()->query(), ['kategori' => $cat->id])) }}"
                        class="px-4 py-2 text-sm font-medium rounded-full border whitespace-nowrap transition
                              {{ request('kategori') == $cat->id ? 'bg-gray-800 text-white border-gray-800' : 'bg-white text-gray-700 border-gray-300 hover:bg-gray-200 drop-shadow-lg' }}">
                        {{ $cat->nama }}
                    </a>
                @endforeach
            </div>
        </div>
        @if (session('success'))
            <div class="bg-emerald-100 border border-emerald-400 text-emerald-700 px-4 py-3 rounded mb-6"
                role="alert">
                <strong class="font-bold">Berhasil!</strong>
                <span class="block sm:inline"> {{ session('success') }}</span>
            </div>
        @endif
        <div class="overflow-hidden border border-gray-300 rounded-lg shadow-sm">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="py-3.5 px-4 text-sm font-semibold text-left text-gray-800">Buku</th>
                        <th class="px-12 py-3.5 text-sm font-semibold text-left text-gray-800">Kategori</th>
                        <th class="px-4 py-3.5 text-sm font-semibold text-left text-gray-800">Stok</th>
                        <th class="px-4 py-3.5 text-sm font-semibold text-left text-gray-800">Penulis</th>
                        <th class="px-4 py-3.5 text-sm font-semibold text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($bukus as $buku)
                        <tr class="hover:bg-gray-50 transition duration-100">
                            <td class="px-4 py-4 text-sm font-medium text-gray-700">
                                <div class="flex items-center gap-x-3">
                                    <img class="w-10 h-14 object-cover rounded border border-gray-200 shadow-sm"
                                        src="{{ $buku->cover ? asset('storage/' . $buku->cover) : asset('images/no-cover.jpg') }}"
                                        alt="Cover Buku">
                                    <div>
                                        <h2 class="font-bold text-gray-800">{{ Str::limit($buku->judul, 30) }}</h2>
                                        <p class="text-sm text-gray-600">{{ $buku->tahun_terbit }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-12 py-4 text-sm text-gray-700">
                                <div class="flex flex-wrap gap-1">
                                    @foreach ($buku->kategori as $kat)
                                        <span
                                            class="inline-flex px-2.5 py-0.5 text-xs font-bold text-indigo-700 bg-indigo-100 rounded-full">
                                            {{ $kat->nama }}
                                        </span>
                                    @endforeach
                                </div>
                            </td>
                            <td class="px-4 py-4 text-sm font-bold text-gray-600">
                                {{ $buku->stok }} Eks
                            </td>
                            <td class="px-4 py-4 text-sm font-bold text-gray-600">
                                {{ $buku->penulis }}
                            </td>
                            <td class="px-4 py-4 text-sm text-right">
                                <div class="flex items-center justify-end gap-x-4">
                                    <a href="{{ route('admin.buku.show', $buku) }}"
                                        class="text-gray-700 hover:text-indigo-600 transition duration-200"
                                        title="Lihat Detail">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                        </svg>
                                    </a>
                                    <a href="{{ route('admin.buku.edit', $buku) }}"
                                        class="text-gray-700 hover:text-yellow-500 transition duration-200"
                                        title="Edit Buku">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                        </svg>
                                    </a>
                                    <form action="{{ route('admin.buku.destroy', $buku) }}" method="POST"
                                        class="inline-flex">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="text-gray-700 hover:text-red-500 transition duration-200"
                                            title="Hapus Buku"
                                            onclick="return confirm('Yakin ingin menghapus buku ini? Data tidak dapat dikembalikan.');">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-6">
            {{ $bukus->links() }}
        </div>
    </section>
</x-app-layout>
