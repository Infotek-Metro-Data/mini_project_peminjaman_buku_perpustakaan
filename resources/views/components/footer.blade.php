<footer class="bg-white dark:bg-gray-900">
    <div class="container px-6 py-8 mx-auto">
        <div class="flex flex-col items-center justify-between lg:flex-row">
            <div class="w-full lg:w-1/3">
                <a href="{{ url('/') }}" class="text-2xl font-bold text-gray-800 dark:text-white">
                    Kevna Perpustakaan Digital
                </a>
                <p class="max-w-md mt-2 text-gray-500 dark:text-gray-400">
                    Platform belajar berbasis virtual untuk akses buku, materi, dan dokumentasi secara digital.
                </p>
            </div>
            <div class="grid grid-cols-2 gap-8 mt-8 lg:mt-0 lg:grid-cols-3">
                <div>
                    <h3 class="text-sm font-semibold text-gray-700 uppercase dark:text-white">Tentang</h3>
                    <a href="{{ route('about') }}" class="block mt-2 text-sm text-gray-600 dark:text-gray-400 hover:underline">Tentang
                        Kami</a>
                    <a href="{{ route('contact') }}"
                        class="block mt-2 text-sm text-gray-600 dark:text-gray-400 hover:underline">Kontak</a>
                </div>

                <div>
                    <h3 class="text-sm font-semibold text-gray-700 uppercase dark:text-white">Layanan</h3>
                    <a href="#"
                        class="block mt-2 text-sm text-gray-600 dark:text-gray-400 hover:underline">E-Book</a>
                </div>
            </div>
        </div>
        <hr class="h-px my-6 bg-gray-200 border-none dark:bg-gray-700">
        <div class="flex flex-col items-center justify-center md:flex-row">
            <p class="text-gray-500 dark:text-gray-400">
                © {{ date('Y') }} Perpustakaan Digital. All rights reserved.
            </p>
        </div>
    </div>
</footer>
