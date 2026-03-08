<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>{{ $title ?? config("app.name", "Portfolio Saya") }}</title>

        <!-- Scripts & Styles via Vite -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            [x-cloak] {
                display: none !important;
            }
        </style>
    </head>
    {{-- PERBAIKAN: Tambah min-h-screen agar footer selalu di bawah --}}
    <body
        class="min-h-screen bg-zinc-50 dark:bg-zinc-950 text-zinc-900 dark:text-zinc-100 transition-colors duration-300 flex flex-col font-sans"
    >
        <x-header.nav-bar />

        {{-- PERBAIKAN: flex-grow akan mendorong footer ke ujung bawah layar --}}
        <main class="flex-grow flex flex-col">
            {{ $slot }}
        </main>

        <x-footer />
    </body>
</html>
