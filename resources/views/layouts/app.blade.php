<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Fruit Counting System') }}</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>
<body class="bg-gray-50 dark:bg-neutral-900">
    @include('layouts.partials.header')

    @include('layouts.partials.sidebar')

    <main class="app-content min-h-[calc(100dvh-4rem)] bg-orange-500 w-full min-w-0 lg:ps-[260px]">
        <div class="p-3 sm:p-6 space-y-4 sm:space-y-6">
            @yield('content')
            {{ $slot ?? '' }}
        </div>
    </main>

    @stack('scripts')
</body>
</html>
