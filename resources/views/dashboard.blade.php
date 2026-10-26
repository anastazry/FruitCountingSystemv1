@extends('layouts.app')


@section('content')
<div class="py-3 sm:py-8">

    <div class="max-w-8xl mx-auto sm:px-6 lg:px-8" >
        <div class="card-container">
            <a href="#" class="block p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 uniform-card">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Jumlah Pengguna</h5>
                <p class="font-normal text-gray-700 dark:text-gray-400">{{ $userCounts->sum() }}</p>
            </a>
            <a href="#" class="block p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 uniform-card">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Jumlah Super</h5>
                <p class="font-normal text-gray-700 dark:text-gray-400">{{ $userCounts->get('Super', 0) }}</p>
            </a>
            <a href="#" class="block p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 uniform-card">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Jumlah Admin</h5>
                <p class="font-normal text-gray-700 dark:text-gray-400">{{ $userCounts->get('Admin', 0) }}</p>
            </a>
            <a href="#" class="block p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 uniform-card">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Jumlah Mandor</h5>
                <p class="font-normal text-gray-700 dark:text-gray-400">{{ $userCounts->get('Mandor', 0) }}</p>
            </a>
        </div>
    </div>
</div>

@endsection
