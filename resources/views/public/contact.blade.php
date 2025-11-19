<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kontak Kami') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-3xl font-bold text-gray-800 mb-6">Hubungi Kami</h1>
                    <p class="text-gray-700 mb-6">
                        Hubungi kami di bawah ini
                    </p>
                    <div class="space-y-6">
                        <div class="flex items-start">
                            <div>
                                <strong class="text-gray-800">Email:</strong>
                                <p class="text-gray-600">rajasinga@gmail.com</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div>
                                <strong class="text-gray-800">Telepon:</strong>
                                <p class="text-gray-600">0812345678</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                                <strong class="text-gray-800">Alamat:</strong>
                                <p class="text-gray-600">
                                    Jl. Binje
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="mt-8 border rounded-lg overflow-hidden">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.211382266517!2d106.82513247481598!3d-6.229605993737345!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f3f1f66d0b0f%3A0x6b45e675e23f1d0!2sPerpustakaan+Digital!5e0!3m2!1sid!2sid!4v1700000000000!5m2!1sid!2sid"
                            width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
