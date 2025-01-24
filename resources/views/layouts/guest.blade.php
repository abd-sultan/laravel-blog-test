<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Blog') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="w-full font-sans antialiased text-gray-900">
        <div class="flex flex-col items-center min-h-screen pt-6 bg-gray-900 sm:justify-center sm:pt-0">
            <div>
                <a href="/" class="flex items-center gap-4 text-2xl font-extrabold text-center text-gray-100">
                    <x-application-logo class="w-20 h-20 text-gray-500 fill-current" />
                    Mon Blog
                </a>
            </div>

            {{-- <div class="w-full px-6 py-4 mt-6 overflow-hidden bg-white shadow-md sm:max-w-md sm:rounded-lg"> --}}
                {{ $slot }}
            {{-- </div> --}}
        </div>
    </body>
</html>
