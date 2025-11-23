<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>
    <section>
        <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 gap-4 md:grid-cols-2 md:items-center md:gap-8">
                <div>
                    <div class="max-w-prose md:max-w-none">
                        <h2 class="text-2xl font-semibold text-gray-900 sm:text-3xl">
                            Perpustakaan Virtual Nomor 1 di Indonesia.
                        </h2>

                        <p class="mt-4 text-pretty text-gray-700">
                            KEVNA merupakan perpustakaan digital modern dengan jutaan koleksi buku dari berbagai genre dan bahasa. Baca, pelajari, dan inspirasikan diri dengan akses unlimited ke koleksi perpustakaan kami. Satu platform untuk semua kebutuhan membaca digital Anda.
                        </p>
                    </div>
                </div>

                <div>
                    <img src={{ asset('images/perpus2.jpg') }}
                        class="rounded transition-transform duration-300 hover:scale-105" alt="">
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
            <div class="space-y-4 md:space-y-8">
                <div class="max-w-prose">
                    <h2 class="text-2xl font-semibold text-gray-900 sm:text-3xl">
                        KEVNA
                    </h2>

                    <p class="mt-4 text-pretty text-gray-700">
                        Perpustakaan Virtual kami menyediakan akses unlimited ke ribuan koleksi buku digital, jurnal, dan materi pembelajaran untuk semua kalangan. Akses ribuan buku, jurnal, dan referensi digital dari mana saja, kapan saja. Perpustakaan virtual kami dirancang untuk kenyamanan dan efisiensi Anda. Tingkatkan pengetahuan dan wawasan Anda dengan perpustakaan virtual yang menyediakan sumber daya pembelajaran berkualitas tinggi untuk semua tingkat pendidikan.
                    </p>
                </div>

                <img src={{ asset('images/perpus.jpg') }}
                    class="rounded transition-transform duration-300 hover:scale-105" alt="">
            </div>
        </div>
    </section>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 text-center">
                    <h1 class="text-3xl font-bold text-gray-800 mb-4"> Selamat Datang di KEVNA Perpustakaan Digital</h1>
                    <p class="text-lg text-gray-600 mb-6">
                        Temukan buku-buku menarik dan pinjam dengan mudah.
                    </p>
                    <a href="{{ route('about') }}"
                        class="inline-flex items-center px-4 py-2 bg-indigo-900 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                        Lihat Koleksi Buku
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
