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
    <body class="bg-white text-black font-sans antialiased min-h-screen flex flex-col">
        <!-- Top bar with horizontal divider line exactly matching wireframe -->
        <header class="w-full h-12 sm:h-14 border-b border-[#CCCCCC] bg-white"></header>

        <!-- Centered content matching wireframe -->
        <main class="flex-1 w-full max-w-[430px] mx-auto px-6 pt-10 pb-16">
            {{ $slot }}
        </main>
    </body>
</html>
