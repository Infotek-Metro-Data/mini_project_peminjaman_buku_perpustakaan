<x-app-layout>
    <section class="container px-4 mx-auto py-12">
        <div class="sm:flex sm:items-center sm:justify-between mb-8">
            <div class="flex items-center gap-x-3">
                <h2 class="text-lg font-semibold text-gray-800">Manajemen Pengguna</h2>
                <span class="px-3 py-1 text-xs font-bold text-black bg-white rounded-full drop-shadow-lg">
                    {{ $users->total() }} akun
                </span>
            </div>

            <a href="{{ route('admin.users.create') }}"
                class="flex items-center justify-center px-5 py-2 text-sm text-black bg-white rounded-lg gap-x-2 hover:bg-gray-200 font-bold transition drop-shadow-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>Tambah User Baru</span>
            </a>
        </div>
        <div class="flex flex-col md:flex-row gap-4 justify-between items-center mb-8">
            <div class="flex gap-2 overflow-x-auto pb-2 md:pb-0 hide-scrollbar w-full md:w-auto">
                <a href="{{ route('admin.users.index', ['search' => request('search')]) }}"
                    class="px-4 py-2 text-sm font-medium rounded-lg border whitespace-nowrap transition
                          {{ !request('role') ? 'bg-gray-800 text-white border-gray-800' : 'bg-white text-gray-700 border-gray-300 hover:bg-gray-200 drop-shadow-lg' }}">
                    Semua
                </a>

                @foreach (['admin', 'petugas', 'anggota'] as $role)
                    <a href="{{ route('admin.users.index', array_merge(request()->query(), ['role' => $role])) }}"
                        class="px-4 py-2 text-sm font-medium rounded-lg border capitalize whitespace-nowrap transition
                              {{ request('role') == $role ? 'bg-indigo-600 text-white border-indigo-600' : 'bg-white text-gray-700 border-gray-300 hover:bg-gray-200 drop-shadow-lg' }}">
                        {{ ucfirst($role) }}
                    </a>
                @endforeach
            </div>
            <form method="GET" action="{{ route('admin.users.index') }}" class="relative w-full md:w-72">
                @if (request('role'))
                    <input type="hidden" name="role" value="{{ request('role') }}">
                @endif
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <circle cx="11" cy="11" r="8" />
                            <line x1="21" y1="21" x2="16.65" y2="16.65" />
                        </svg>
                    </span>
                    <input type="text" name="search" value="{{ request('search') }}"
                        class="w-full py-2 pl-10 pr-4 text-sm text-gray-700 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500 transition"
                        placeholder="Cari Nama atau Email...">
                </div>
            </form>
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
                        <th class="py-3.5 px-4 text-sm font-semibold text-left text-gray-800">Pengguna</th>
                        <th class="px-12 py-3.5 text-sm font-semibold text-left text-gray-800">Role</th>
                        <th class="px-4 py-3.5 text-sm font-semibold text-left text-gray-800">Bergabung</th>
                        <th class="px-4 py-3.5 text-sm font-semibold text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($users as $user)
                        <tr class="hover:bg-gray-50 transition duration-100">
                            <td class="px-4 py-4 text-sm font-medium text-gray-700">
                                <div class="flex items-center gap-x-3">
                                    <img class="w-10 h-10 rounded-full object-cover"
                                        src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=random"
                                        alt="Avatar {{ $user->name }}">
                                    <div>
                                        <h2 class="text-gray-800 font-semibold">{{ $user->name }}</h2>
                                        <p class="text-sm text-gray-600">{{ $user->email }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-12 py-4 text-sm">
                                @php
                                    $roleColors = [
                                        'admin' => ['bg-red-100', 'text-red-600'],
                                        'petugas' => ['bg-indigo-100', 'text-indigo-600'],
                                        'anggota' => ['bg-emerald-100', 'text-emerald-600'],
                                    ];
                                    [$bg, $text] = $roleColors[$user->role] ?? ['bg-gray-100', 'text-gray-600'];
                                @endphp
                                <span
                                    class="inline-flex px-3 py-1 text-xs font-bold rounded-full {{ $bg }} {{ $text }}">
                                    {{ ucfirst($user->role) }}
                                </span>
                            </td>
                            <td class="px-4 py-4 text-sm text-gray-600">
                                {{ $user->created_at->format('d M Y') }}
                            </td>
                            <td class="px-4 py-4 text-sm text-right space-x-4">
                                <a href="{{ route('admin.users.edit', $user) }}"
                                    class="text-gray-700 hover:text-yellow-500 transition duration-200"
                                    title="Edit User">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                    </svg>
                                </a>
                                <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="inline"
                                    onsubmit="return confirm('Yakin ingin menghapus pengguna ini? Tindakan ini tidak dapat dibatalkan.');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="text-gray-700 hover:text-red-500 transition duration-200"
                                        title="Hapus User">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                        </svg>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            {{ $users->links() }}
        </div>
    </section>
</x-app-layout>
