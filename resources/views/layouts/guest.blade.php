<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="bg-orange-400 min-h-screen flex flex-col sm:justify-center items-center px-4 py-6 sm:py-0 ">
            <div>
                <a href="/">
                <img class="w-24 h-auto" src="{{ asset('images/icons/FELDA_logo.png') }}" alt="Icon">

                    {{-- <x-application-logo class="w-20 h-20 fill-current text-gray-500" /> --}}
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-orange-300 shadow-md overflow-hidden rounded-lg">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
