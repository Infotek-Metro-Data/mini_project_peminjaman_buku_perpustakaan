<x-guest-layout>
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="mb-5">
            <x-input-label for="email" :value="__('Email Address')" />
            <x-text-input id="email"
                class="block mt-1 w-full p-3 bg-gray-50 border-gray-200 focus:bg-white focus:border-indigo-500 focus:ring-indigo-500 rounded-lg"
                type="email" name="email" :value="old('email')" required autofocus autocomplete="username"
                placeholder="nama@email.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        <div class="mb-5">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password"
                class="block mt-1 w-full p-3 bg-gray-50 border-gray-200 focus:bg-white focus:border-indigo-500 focus:ring-indigo-500 rounded-lg"
                type="password" name="password" required autocomplete="current-password" placeholder="********" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>
        <div class="flex items-center justify-between mb-8">
            <label for="remember_me" class="inline-flex items-center cursor-pointer">
                <input id="remember_me" type="checkbox"
                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500 cursor-pointer"
                    name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Ingat Saya') }}</span>
            </label>
            @if (Route::has('password.request'))
                <a class="underline text-sm text-indigo-600 hover:text-indigo-800 font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    href="{{ route('password.request') }}">
                    {{ __('Lupa Password?') }}
                </a>
            @endif
        </div>
        <div class="flex flex-col gap-4">
            <x-primary-button
                class="w-full justify-center py-3 bg-indigo-600 hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900 rounded-lg text-white font-bold uppercase tracking-wider transition ease-in-out duration-150 shadow-lg hover:shadow-xl">
                {{ __('Masuk') }}
            </x-primary-button>

            @if (Route::has('register'))
                <p class="text-center text-sm text-gray-600">
                    Belum punya akun?
                    <a href="{{ route('register') }}"
                        class="text-indigo-600 hover:text-indigo-800 font-bold hover:underline transition duration-150">
                        Daftar Sekarang
                    </a>
                </p>
            @endif
        </div>
    </form>
</x-guest-layout>
