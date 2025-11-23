<x-app-layout>
    <section class="container px-4 mx-auto py-12">
        <div class="max-w-4xl mx-auto">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-xl font-bold text-gray-800">Dashboard Petugas</h2>
                <span class="text-sm text-gray-600">{{ now()->format('d M Y') }}</span>
            </div>
            <div class="bg-white shadow-sm border border-gray-300 rounded-lg overflow-hidden mb-6">
                <div class="p-6 text-center">
                    <h3 class="text-2xl font-bold text-gray-800 mb-2">
                        Halo, {{ Auth::user()->name }}!
                    </h3>
                    <p class="text-gray-600 mb-6">
                        Selamat bertugas. Fokus hari ini adalah melayani peminjaman dan pengembalian buku.
                    </p>

                    <a href="{{ route('petugas.peminjaman.create') }}"
                        class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-white bg-indigo-600 rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        Catat Peminjaman Baru
                    </a>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>