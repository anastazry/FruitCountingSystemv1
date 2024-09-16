@extends('layouts.app')
@section('content')

{{-- <form method="GET" action="{{ route('products.index') }}" class="mb-6"> --}}
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
        
        <select name="stock" class="p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
            <option value="">All Stock</option>
            <option value="in_stock" {{ request('stock') == 'in_stock' ? 'selected' : '' }}>In Stock</option>
            <option value="out_of_stock" {{ request('stock') == 'out_of_stock' ? 'selected' : '' }}>Out of Stock</option>
        </select>
        
        <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">Filter</button>
    </div>
</form>
<a href="{{route('exportUsers')}}">Download</a>

<div class="overflow-x-auto">
    <table class="min-w-full divide-y divide-gray-200 bg-white shadow-md rounded-md">
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
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">1</td>
                <td class="px-6 py-4 whitespace-nowrap">8</td>
                <td class="px-6 py-4 whitespace-nowrap">8</td>
                <td class="px-6 py-4 whitespace-nowrap">8</td>
                <td class="px-6 py-4 whitespace-nowrap">Zainal Hakim</td>
                <td class="px-6 py-4 whitespace-nowrap">31/7/2024</td>
                <td class="px-6 py-4 whitespace-nowrap">37</td>
                <td class="px-6 py-4 whitespace-nowrap">42</td>
                <td class="px-6 py-4 whitespace-nowrap">620</td>
                <td class="px-6 py-4 whitespace-nowrap">27</td>
                <td class="px-6 py-4 whitespace-nowrap">43</td>
                <td class="px-6 py-4 whitespace-nowrap">33</td>
            </tr>
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">2</td>
                <td class="px-6 py-4 whitespace-nowrap">2</td>
                <td class="px-6 py-4 whitespace-nowrap">2</td>
                <td class="px-6 py-4 whitespace-nowrap">2</td>
                <td class="px-6 py-4 whitespace-nowrap">Siti Aisyah</td>
                <td class="px-6 py-4 whitespace-nowrap">25/7/2024</td>
                <td class="px-6 py-4 whitespace-nowrap">32</td>
                <td class="px-6 py-4 whitespace-nowrap">42</td>
                <td class="px-6 py-4 whitespace-nowrap">560</td>
                <td class="px-6 py-4 whitespace-nowrap">30</td>
                <td class="px-6 py-4 whitespace-nowrap">40</td>
                <td class="px-6 py-4 whitespace-nowrap">25</td>
            </tr>
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">3</td>
                <td class="px-6 py-4 whitespace-nowrap">3</td>
                <td class="px-6 py-4 whitespace-nowrap">3</td>
                <td class="px-6 py-4 whitespace-nowrap">3</td>
                <td class="px-6 py-4 whitespace-nowrap">Ali Ibrahim</td>
                <td class="px-6 py-4 whitespace-nowrap">26/7/2024</td>
                <td class="px-6 py-4 whitespace-nowrap">28</td>
                <td class="px-6 py-4 whitespace-nowrap">39</td>
                <td class="px-6 py-4 whitespace-nowrap">570</td>
                <td class="px-6 py-4 whitespace-nowrap">31</td>
                <td class="px-6 py-4 whitespace-nowrap">37</td>
                <td class="px-6 py-4 whitespace-nowrap">30</td>
            </tr>
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">4</td>
                <td class="px-6 py-4 whitespace-nowrap">4</td>
                <td class="px-6 py-4 whitespace-nowrap">4</td>
                <td class="px-6 py-4 whitespace-nowrap">4</td>
                <td class="px-6 py-4 whitespace-nowrap">Lina Binti</td>
                <td class="px-6 py-4 whitespace-nowrap">27/7/2024</td>
                <td class="px-6 py-4 whitespace-nowrap">35</td>
                <td class="px-6 py-4 whitespace-nowrap">45</td>
                <td class="px-6 py-4 whitespace-nowrap">580</td>
                <td class="px-6 py-4 whitespace-nowrap">29</td>
                <td class="px-6 py-4 whitespace-nowrap">44</td>
                <td class="px-6 py-4 whitespace-nowrap">28</td>
            </tr>
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">5</td>
                <td class="px-6 py-4 whitespace-nowrap">5</td>
                <td class="px-6 py-4 whitespace-nowrap">5</td>
                <td class="px-6 py-4 whitespace-nowrap">5</td>
                <td class="px-6 py-4 whitespace-nowrap">Kamal Abu</td>
                <td class="px-6 py-4 whitespace-nowrap">28/7/2024</td>
                <td class="px-6 py-4 whitespace-nowrap">33</td>
                <td class="px-6 py-4 whitespace-nowrap">41</td>
                <td class="px-6 py-4 whitespace-nowrap">590</td>
                <td class="px-6 py-4 whitespace-nowrap">32</td>
                <td class="px-6 py-4 whitespace-nowrap">47</td>
                <td class="px-6 py-4 whitespace-nowrap">26</td>
            </tr>
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">6</td>
                <td class="px-6 py-4 whitespace-nowrap">6</td>
                <td class="px-6 py-4 whitespace-nowrap">6</td>
                <td class="px-6 py-4 whitespace-nowrap">6</td>
                <td class="px-6 py-4 whitespace-nowrap">Nurul Aida</td>
                <td class="px-6 py-4 whitespace-nowrap">29/7/2024</td>
                <td class="px-6 py-4 whitespace-nowrap">30</td>
                <td class="px-6 py-4 whitespace-nowrap">46</td>
                <td class="px-6 py-4 whitespace-nowrap">600</td>
                <td class="px-6 py-4 whitespace-nowrap">33</td>
                <td class="px-6 py-4 whitespace-nowrap">45</td>
                <td class="px-6 py-4 whitespace-nowrap">29</td>
            </tr>
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">7</td>
                <td class="px-6 py-4 whitespace-nowrap">7</td>
                <td class="px-6 py-4 whitespace-nowrap">7</td>
                <td class="px-6 py-4 whitespace-nowrap">7</td>
                <td class="px-6 py-4 whitespace-nowrap">Farid Haziq</td>
                <td class="px-6 py-4 whitespace-nowrap">30/7/2024</td>
                <td class="px-6 py-4 whitespace-nowrap">29</td>
                <td class="px-6 py-4 whitespace-nowrap">40</td>
                <td class="px-6 py-4 whitespace-nowrap">610</td>
                <td class="px-6 py-4 whitespace-nowrap">28</td>
                <td class="px-6 py-4 whitespace-nowrap">41</td>
                <td class="px-6 py-4 whitespace-nowrap">31</td>
            </tr>
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">8</td>
                <td class="px-6 py-4 whitespace-nowrap">8</td>
                <td class="px-6 py-4 whitespace-nowrap">8</td>
                <td class="px-6 py-4 whitespace-nowrap">8</td>
                <td class="px-6 py-4 whitespace-nowrap">Zainal Hakim</td>
                <td class="px-6 py-4 whitespace-nowrap">31/7/2024</td>
                <td class="px-6 py-4 whitespace-nowrap">37</td>
                <td class="px-6 py-4 whitespace-nowrap">42</td>
                <td class="px-6 py-4 whitespace-nowrap">620</td>
                <td class="px-6 py-4 whitespace-nowrap">27</td>
                <td class="px-6 py-4 whitespace-nowrap">43</td>
                <td class="px-6 py-4 whitespace-nowrap">33</td>
            </tr>
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">9</td>
                <td class="px-6 py-4 whitespace-nowrap">9</td>
                <td class="px-6 py-4 whitespace-nowrap">9</td>
                <td class="px-6 py-4 whitespace-nowrap">9</td>
                <td class="px-6 py-4 whitespace-nowrap">Rina Farhana</td>
                <td class="px-6 py-4 whitespace-nowrap">01/8/2024</td>
                <td class="px-6 py-4 whitespace-nowrap">34</td>
                <td class="px-6 py-4 whitespace-nowrap">44</td>
                <td class="px-6 py-4 whitespace-nowrap">630</td>
                <td class="px-6 py-4 whitespace-nowrap">35</td>
                <td class="px-6 py-4 whitespace-nowrap">42</td>
                <td class="px-6 py-4 whitespace-nowrap">35</td>
            </tr>
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">10</td>
                <td class="px-6 py-4 whitespace-nowrap">10</td>
                <td class="px-6 py-4 whitespace-nowrap">10</td>
                <td class="px-6 py-4 whitespace-nowrap">10</td>
                <td class="px-6 py-4 whitespace-nowrap">Shamsul Idris</td>
                <td class="px-6 py-4 whitespace-nowrap">02/8/2024</td>
                <td class="px-6 py-4 whitespace-nowrap">31</td>
                <td class="px-6 py-4 whitespace-nowrap">46</td>
                <td class="px-6 py-4 whitespace-nowrap">640</td>
                <td class="px-6 py-4 whitespace-nowrap">32</td>
                <td class="px-6 py-4 whitespace-nowrap">38</td>
                <td class="px-6 py-4 whitespace-nowrap">37</td>
            </tr>
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">11</td>
                <td class="px-6 py-4 whitespace-nowrap">11</td>
                <td class="px-6 py-4 whitespace-nowrap">11</td>
                <td class="px-6 py-4 whitespace-nowrap">11</td>
                <td class="px-6 py-4 whitespace-nowrap">Laila Hana</td>
                <td class="px-6 py-4 whitespace-nowrap">03/8/2024</td>
                <td class="px-6 py-4 whitespace-nowrap">28</td>
                <td class="px-6 py-4 whitespace-nowrap">43</td>
                <td class="px-6 py-4 whitespace-nowrap">650</td>
                <td class="px-6 py-4 whitespace-nowrap">33</td>
                <td class="px-6 py-4 whitespace-nowrap">39</td>
                <td class="px-6 py-4 whitespace-nowrap">40</td>
            </tr>
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">12</td>
                <td class="px-6 py-4 whitespace-nowrap">12</td>
                <td class="px-6 py-4 whitespace-nowrap">12</td>
                <td class="px-6 py-4 whitespace-nowrap">12</td>
                <td class="px-6 py-4 whitespace-nowrap">Eka Zulaika</td>
                <td class="px-6 py-4 whitespace-nowrap">04/8/2024</td>
                <td class="px-6 py-4 whitespace-nowrap">35</td>
                <td class="px-6 py-4 whitespace-nowrap">47</td>
                <td class="px-6 py-4 whitespace-nowrap">660</td>
                <td class="px-6 py-4 whitespace-nowrap">34</td>
                <td class="px-6 py-4 whitespace-nowrap">42</td>
                <td class="px-6 py-4 whitespace-nowrap">42</td>
            </tr>
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">13</td>
                <td class="px-6 py-4 whitespace-nowrap">13</td>
                <td class="px-6 py-4 whitespace-nowrap">13</td>
                <td class="px-6 py-4 whitespace-nowrap">13</td>
                <td class="px-6 py-4 whitespace-nowrap">Aminah Yusuf</td>
                <td class="px-6 py-4 whitespace-nowrap">05/8/2024</td>
                <td class="px-6 py-4 whitespace-nowrap">38</td>
                <td class="px-6 py-4 whitespace-nowrap">50</td>
                <td class="px-6 py-4 whitespace-nowrap">670</td>
                <td class="px-6 py-4 whitespace-nowrap">36</td>
                <td class="px-6 py-4 whitespace-nowrap">39</td>
                <td class="px-6 py-4 whitespace-nowrap">45</td>
            </tr>
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">14</td>
                <td class="px-6 py-4 whitespace-nowrap">14</td>
                <td class="px-6 py-4 whitespace-nowrap">14</td>
                <td class="px-6 py-4 whitespace-nowrap">14</td>
                <td class="px-6 py-4 whitespace-nowrap">Zulfiqar Ahmad</td>
                <td class="px-6 py-4 whitespace-nowrap">06/8/2024</td>
                <td class="px-6 py-4 whitespace-nowrap">29</td>
                <td class="px-6 py-4 whitespace-nowrap">52</td>
                <td class="px-6 py-4 whitespace-nowrap">680</td>
                <td class="px-6 py-4 whitespace-nowrap">37</td>
                <td class="px-6 py-4 whitespace-nowrap">44</td>
                <td class="px-6 py-4 whitespace-nowrap">47</td>
            </tr>
            
            {{-- @forelse ($products as $product)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $product->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $product->category }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $product->price }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $product->stock }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="13" class="px-6 py-4 text-center text-gray-500">No products found</td>
                </tr>
            @endforelse --}}
        </tbody>
    </table>
</div>

@endsection
