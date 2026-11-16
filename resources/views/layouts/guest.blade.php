<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'SudahRusak') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased bg-indigo-50 min-h-screen flex flex-col">
        <!-- Header with shadow & branding -->
        <header class="w-full h-16 bg-white shadow-md border-b border-gray-100 flex items-center px-6 sm:px-12 sticky top-0 z-50">
            <div class="max-w-7xl mx-auto w-full flex items-center justify-between">
                <a href="/" class="text-xl font-bold tracking-tight text-gray-900 hover:text-indigo-600 transition">
                    Sudah<span class="text-indigo-600">Rusak</span>
                </a>
            </div>
        </header>

        <!-- Main container with shadow card -->
        <main class="flex-1 flex flex-col sm:justify-center items-center py-8 sm:py-12 px-4 sm:px-6">
            <div class="w-full sm:max-w-md bg-white shadow-xl border border-gray-100 rounded-2xl p-6 sm:p-8">
                {{ $slot }}
            </div>
        </main>
    </body>
</html>
