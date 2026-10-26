@extends('layouts.app')

@section('content')
<div class="space-y-6">
    <h1 class="text-2xl font-semibold">Ringkasan Buah {{ $year }}</h1>
    <div class="grid sm:grid-cols-2 lg:grid-cols-5 gap-4">
        @foreach(['dituai' => 'Jumlah Buah Dituai', 'muda' => 'Buah Muda', 'busuk' => 'Buah Busuk', 'panjang' => 'Tangkai Panjang', 'kosong' => 'Tandan Kosong'] as $field => $label)
            <div class="p-5 bg-white border rounded-xl shadow-sm">
                <p class="text-sm text-gray-600">{{ $label }}</p>
                <p class="mt-2 text-2xl font-semibold">{{ number_format($totals[$field]) }}</p>
            </div>
        @endforeach
    </div>
    <div class="p-5 bg-white border rounded-xl shadow-sm">
        <div class="flex items-center justify-between mb-4">
            <h2 class="text-lg font-semibold">Jumlah Dituai Mengikut Bulan</h2>
            <a class="text-blue-600 hover:underline" href="{{ route('user-view-report') }}">Lihat Laporan</a>
        </div>
        @if($monthlyTotals->isEmpty())
            <p class="text-gray-600">Tiada rekod buah untuk {{ $year }}.</p>
        @else
            <table class="w-full divide-y divide-gray-200">
                <thead><tr><th class="py-2 text-left">Bulan</th><th class="py-2 text-right">Jumlah Dituai</th></tr></thead>
                <tbody>
                    @for($month = 1; $month <= 12; $month++)
                        <tr>
                            <td class="py-2">{{ \Carbon\Carbon::create($year, $month, 1)->format('F') }}</td>
                            <td class="py-2 text-right">{{ number_format($monthlyTotals->get(sprintf('%02d', $month), 0)) }}</td>
                        </tr>
                    @endfor
                </tbody>
            </table>
        @endif
    </div>
</div>
@endsection
