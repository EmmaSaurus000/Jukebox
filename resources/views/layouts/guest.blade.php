<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="corporate">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Jukebox') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <div class="min-h-screen bg-gray-50">
        @include('layouts.navigation-guest')

        <!-- new page heading -->
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
               <!-- { { $header }} -->
                <h1 class="p-0 text-red-500 font-black text-xl">Welcome to the noise</h1>
            </div>
        </header>

        <!-- new page content -->
        <main class="font-sans text-gray-900 antialiased">
            {{ $slot }}
        </main>
    </div>
</html>
