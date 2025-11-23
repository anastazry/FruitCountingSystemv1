@extends('layouts.app')
@section('content')

<div class=" bg-white lg:flex lg:items-center lg:justify-between rounded-lg" >
    <div class="min-w-0 flex-1 px-1" style="height:20%">
      <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight">Laporan</h2>
      <div class="mt-1 flex flex-col sm:mt-0 sm:flex-row sm:flex-wrap sm:space-x-6">
    </div>
    </div>
  </div>
<form method="GET" action="#" class="mb-6">

      
    <div class="flex flex-wrap gap-4">
        <input type="text" name="name" placeholder="Name" value="{{ request('name') }}" class="p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
        
        <select name="category" class="p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
            <option value="">Peringkat</option>
            <option value="electronics" {{ request('category') == 'electronics' ? 'selected' : '' }}>1</option>
            <option value="furniture" {{ request('category') == 'furniture' ? 'selected' : '' }}>2</option>
            <option value="furniture" {{ request('category') == 'furniture' ? 'selected' : '' }}>3</option>
            <option value="furniture" {{ request('category') == 'furniture' ? 'selected' : '' }}>4</option>
        </select>
        
        <select name="blok" class="p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
            <option value="">Blok</option>
            <option value="1" {{ request('blok') == '1' ? 'selected' : '' }}>1</option>
            <option value="2" {{ request('blok') == '2' ? 'selected' : '' }}>2</option>
            <option value="3" {{ request('blok') == '3' ? 'selected' : '' }}>3</option>
            <option value="4" {{ request('blok') == '4' ? 'selected' : '' }}>4</option>
        </select>
        
        <input type="date" name="price_min" placeholder="Min Price" value="{{ request('price_min') }}" class="p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
        
        {{-- <select name="stock" class="p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
            <option value="">All Stock</option>
            <option value="in_stock" {{ request('stock') == 'in_stock' ? 'selected' : '' }}>In Stock</option>
            <option value="out_of_stock" {{ request('stock') == 'out_of_stock' ? 'selected' : '' }}>Out of Stock</option>
        </select> --}}
        
        <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">Filter</button>
        <div class="ml-auto h-full py-3">
            <a href="{{ route('exportUsers') }}" class="bg-indigo-600 text-white px-4 py-2 rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">Export Excel</a>
        </div>
    </div>
</form>
{{-- <a href="{{route('exportUsers')}}">Download</a> --}}

<div class="overflow-x-auto">

    <table class="min-w-full divide-y divide-gray-200 bg-white shadow-md rounded-md table-auto">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-800uppercase tracking-wider">No.</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-800uppercase tracking-wider">Peringkat</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-800uppercase tracking-wider">Blok</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-800uppercase tracking-wider">No Platform</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-800uppercase tracking-wider">Dilaksanakan</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-800uppercase tracking-wider">Tarikh</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-800uppercase tracking-wider">Muda</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-800uppercase tracking-wider">Busuk</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-800uppercase tracking-wider">Kosong</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-800uppercase tracking-wider">Panjang</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-800uppercase tracking-wider">Serangan Lama</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-800uppercase tracking-wider">Serangan Baru</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach($fruits as $index => $fruit)
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">{{ $index + 1 }}</td>
                <td class="px-6 py-4 whitespace-nowrap">
                    {{ $fruit->peringkat ?? '-' }}
                </td>
                
                <td class="px-6 py-4 whitespace-nowrap">
                    {{ $fruit->blok ?? '-' }}
                </td>
                
                <td class="px-6 py-4 whitespace-nowrap">
                    {{ $fruit->n_lot ?? '-' }}
                </td>
                
                <td class="px-6 py-4 whitespace-nowrap">
                    {{ $fruit->n_p_tuai ?? '-' }}
                </td>
                

                <td class="px-6 py-4 whitespace-nowrap">{{ $fruit->tarikh }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $fruit->muda }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $fruit->busuk }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $fruit->kosong }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $fruit->panjang }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $fruit->s_lama }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $fruit->s_baru }}</td>
            </tr>
            @endforeach
        
            @if($fruits->isEmpty())
            <tr>
                <td colspan="12" class="px-6 py-4 text-center text-gray-500">
                    No data found
                </td>
            </tr>
            @endif
        </tbody>
    </table>
</div>

@endsection
