<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-900 antialiased">
    <section class="min-h-screen bg-white flex items-center justify-center">
        <div class="container h-full px-6 py-12 mx-auto">
            <div class="flex h-full flex-wrap items-center justify-center lg:justify-between">
                <div class="mb-12 md:mb-0 md:w-8/12 lg:w-6/12 hidden lg:block">
                    <img src="https://tecdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg"
                        class="w-full" alt="Phone image" />
                </div>
                <div class="md:w-8/12 lg:ms-6 lg:w-5/12 w-full bg-white p-8 md:p-12">
                    <div class="mb-8 text-center lg:text-left">
                        <a href="/" class="flex items-center justify-center lg:justify-start gap-2 mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="w-8 h-8 text-indigo-600">
                                <path
                                    d="M11.25 4.533A9.707 9.707 0 006 3a9.735 9.735 0 00-3.25.555.75.75 0 00-.5.707v14.25a.75.75 0 001 .707A8.237 8.237 0 016 18.75c1.995 0 3.823.707 5.25 1.886V4.533zM12.75 20.636A8.214 8.214 0 0118 18.75c.966 0 1.89.166 2.75.477V5.25c0-1.424-.879-2.72-2.25-3.226a9.707 9.707 0 00-5.25-.524v19.136z" />
                            </svg>
                            <h2 class="text-3xl font-bold text-gray-900 tracking-tight">
                                Kevna
                            </h2>
                        </a>
                        <p class="text-gray-500 text-sm">Masuk untuk mengelola peminjaman buku.</p>
                    </div>
                    {{ $slot }}
                </div>
            </div>
        </div>
    </section>
</body>

</html>
