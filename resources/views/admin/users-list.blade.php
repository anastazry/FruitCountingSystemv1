@extends('layouts.app')

@section('content')
<div class="p-6 bg-white border rounded shadow">
    @if(session('success'))
        <p class="mb-4 text-green-700">{{ session('success') }}</p>
    @endif
    <div class="flex items-center justify-between mb-4">
        <h1 class="text-xl font-semibold">Manage Users</h1>
        <a class="text-blue-600 hover:underline" href="{{ route('admin-users-registration-form') }}">Add new user</a>
    </div>
    <div class="overflow-x-auto">
        <table class="mobile-records min-w-full divide-y divide-gray-200">
            <thead>
                <tr>
                    @foreach(['Name', 'Email', 'Worker ID', 'Username', 'Phone', 'Role'] as $heading)
                        <th class="px-4 py-3 text-left">{{ $heading }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse($users as $user)
                    <tr>
                        @foreach([$user->name, $user->email, $user->worker_id, $user->username, $user->phone_no, $user->role] as $column => $value)
                            <td data-label="{{ ['Name', 'Email', 'Worker ID', 'Username', 'Phone', 'Role'][$column] }}" class="px-4 py-3">{{ $value }}</td>
                        @endforeach
                    </tr>
                @empty
                    <tr><td class="px-4 py-3" colspan="6">No users found.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
