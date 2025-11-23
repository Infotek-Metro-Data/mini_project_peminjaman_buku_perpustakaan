<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tentang Kami') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-white">
        <div class="max-w-4xl mx-auto px-6 sm:px-8 lg:px-10">
            <div class="text-center mb-16">
                <h1 class="text-3xl font-bold text-gray-800 mb-4">Kevna</h1>
                <p class="text-lg text-gray-600 leading-relaxed">
                    Sebuah proyek kecil yang lahir dari kecintaan terhadap buku dan keinginan agar lebih banyak orang
                    bisa membaca — tanpa hambatan.
                </p>
            </div>
          <section class="mb-16 grid grid-cols-1 lg:grid-cols-2 gap-10 items-center">
                <div class="lg:order-1">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6">Awal Mula</h2>
                    <p class="text-gray-700 leading-relaxed mb-4">
                        Perpustakaan Digital dimulai pada tahun <strong>2023</strong> sebagai proyek akhir kuliah oleh
                        mahasiswa Teknik Informatika. Awalnya hanya platform sederhana untuk
                        meminjam buku kampus, tapi perlahan berkembang karena respons positif dari komunitas.
                    </p>
                    <p class="text-gray-700 leading-relaxed">
                        Kami melihat begitu banyak teman yang ingin baca buku, tapi terkendala waktu, lokasi, atau
                        biaya. Maka kami putuskan untuk terus mengembangkan platform ini — meski sudah lulus.
                    </p>
                </div>
                <div class="flex justify-center lg:order-2">
                    <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&q=80&w=800&h=600"
                        alt="Mahasiswa sedang mengerjakan proyek di kampus"
                        class="rounded-2xl shadow-lg object-cover h-72 w-full max-w-md lg:max-w-lg transition-transform duration-300 hover:scale-105" />
                </div>
            </section>
            <section class="mb-16">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-6xl mx-auto">
                    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200 transition hover:shadow-md">
                        <div class="flex justify-center md:justify-end -mt-10">
                            <img class="w-20 h-20 object-cover border-4 border-white rounded-full shadow-md"
                                src="{{ asset('images/aku.jpg') }}" alt="Budi Santoso">
                        </div>
                        <h2 class="mt-4 text-xl font-semibold text-gray-800 text-center md:text-left">Budi Santoso</h2>
                        <p class="text-sm text-gray-600 text-center md:text-left">Pengembang & Founder</p>
                        <p class="mt-3 text-sm text-gray-700 leading-relaxed">
                            Lulusan Teknik Informatika yang memulai proyek ini sebagai tugas akhir. Kini terus
                            mengembangkan platform agar lebih banyak orang bisa baca buku secara gratis.
                        </p>
                        <div class="mt-4 text-center md:text-right">
                            <span
                                class="text-xs font-medium text-gray-500 border-b border-dashed border-gray-400">Pengembang
                                Utama</span>
                        </div>
                    </div>
                    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200 transition hover:shadow-md">
                        <div class="flex justify-center md:justify-end -mt-10">
                            <img class="w-20 h-20 object-cover border-4 border-white rounded-full shadow-md"
                                src="{{ asset('images/ghina.jpg') }}" alt="Rina Wijaya">
                        </div>
                        <h2 class="mt-4 text-xl font-semibold text-gray-800 text-center md:text-left">Rina Wijaya</h2>
                        <p class="text-sm text-gray-600 text-center md:text-left">Kurator Konten</p>
                        <p class="mt-3 text-sm text-gray-700 leading-relaxed">
                            Guru Bahasa Indonesia yang peduli pada literasi. Memilih buku-buku yang edukatif, menarik,
                            dan sesuai untuk pelajar dan umum.
                        </p>
                        <div class="mt-4 text-center md:text-right">
                            <span
                                class="text-xs font-medium text-gray-500 border-b border-dashed border-gray-400">Pengelola
                                Buku</span>
                        </div>
                    </div>
                </div>
            </section>
            <section>
                <h2 class="text-2xl font-bold text-gray-800 mb-6 border-b border-gray-300 pb-2 inline-block">Tujuan ke
                    Depan</h2>
                <p class="text-gray-700 leading-relaxed mb-4">
                    Kami tidak ingin berhenti di sini. Ke depan, kami bercita-cita:
                </p>
                <ul class="space-y-3 text-gray-700 ml-6 list-disc">
                    <li>Meluncurkan aplikasi mobile agar lebih mudah diakses.</li>
                    <li>Bekerja sama dengan penerbit untuk menambah koleksi buku terbaru.</li>
                    <li>Membuka program relawan “Sahabat Baca” untuk komunitas lokal.</li>
                    <li>Menjangkau pelajar di daerah terpencil melalui kerja sama dengan sekolah.</li>
                </ul>
                <p class="text-gray-700 leading-relaxed mt-6 italic">
                    Kami percaya: <strong>“Satu buku bisa menginspirasi seribu mimpi.”</strong> Dan kami ingin menjadi
                    jembatan antara buku-buku itu dengan pembaca yang membutuhkannya.
                </p>
            </section>

        </div>
    </div>
</x-app-layout>
