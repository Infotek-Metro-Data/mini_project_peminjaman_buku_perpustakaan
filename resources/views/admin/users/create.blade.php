<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Pengguna Baru') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm border border-gray-300 rounded-lg overflow-hidden p-6">

                <form method="POST" action="{{ route('admin.users.store') }}">
                    @csrf

                    <!-- Nama Lengkap -->
                    <div class="mb-6">
                        <x-input-label for="name" :value="__('Nama Lengkap')" class="text-sm font-semibold text-gray-700" />
                        <x-text-input id="name"
                            class="block mt-1 w-full border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500"
                            type="text" name="name" :value="old('name')" required autofocus />
                        <x-input-error :messages="$errors->get('name')" class="mt-1 text-xs text-red-500" />
                    </div>

                    <!-- Email -->
                    <div class="mb-6">
                        <x-input-label for="email" :value="__('Email')" class="text-sm font-semibold text-gray-700" />
                        <x-text-input id="email"
                            class="block mt-1 w-full border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500"
                            type="email" name="email" :value="old('email')" required />
                        <x-input-error :messages="$errors->get('email')" class="mt-1 text-xs text-red-500" />
                    </div>

                    <!-- Role -->
                    <div class="mb-6">
                        <x-input-label for="role" :value="__('Peran (Role)')" class="text-sm font-semibold text-gray-700" />
                        <select id="role" name="role"
                            class="mt-1 block w-full border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500 dark:bg-gray-900 dark:text-gray-300">
                            <option value="anggota" {{ old('role') == 'anggota' ? 'selected' : '' }}>Anggota</option>
                            <option value="petugas" {{ old('role') == 'petugas' ? 'selected' : '' }}>Petugas</option>
                            <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                        </select>
                        <x-input-error :messages="$errors->get('role')" class="mt-1 text-xs text-red-500" />
                    </div>

                    <!-- Password -->
                    <div class="mb-6">
                        <x-input-label for="password" :value="__('Password')" class="text-sm font-semibold text-gray-700" />
                        <x-text-input id="password"
                            class="block mt-1 w-full border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500"
                            type="password" name="password" required />
                        <x-input-error :messages="$errors->get('password')" class="mt-1 text-xs text-red-500" />
                    </div>

                    <!-- Konfirmasi Password -->
                    <div class="mb-6">
                        <x-input-label for="password_confirmation" :value="__('Konfirmasi Password')"
                            class="text-sm font-semibold text-gray-700" />
                        <x-text-input id="password_confirmation"
                            class="block mt-1 w-full border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500"
                            type="password" name="password_confirmation" required />
                    </div>

                    <!-- Tombol Aksi -->
                    <div class="flex justify-end gap-x-3">
                        <a href="{{ route('admin.users.index') }}"
                            class="px-5 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-200 transition drop-shadow-lg">
                            Batal
                        </a>
                        <button type="submit"
                            class="px-5 py-2 text-sm font-medium text-white bg-indigo-600 rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition drop-shadow-lg">
                            Simpan User
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
