@extends('layouts.admin.app')

@section('header', 'Kelola Menu Makanan')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h3 class="text-lg font-bold text-gray-800">Daftar Menu</h3>
    <a href="{{ route('admin.produk.create') }}" class="bg-olive text-white px-4 py-2 rounded-lg font-semibold hover:bg-opacity-90 transition-all flex items-center">
        <span class="mr-2">+</span> Tambah Menu Baru
    </a>
</div>

<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left">
            <thead>
                <tr class="bg-gray-50 text-gray-600 text-xs font-semibold uppercase tracking-wider">
                    <th class="px-6 py-4">Gambar</th>
                    <th class="px-6 py-4">Nama Menu</th>
                    <th class="px-6 py-4">Kategori</th>
                    <th class="px-6 py-4">Harga</th>
                    <th class="px-6 py-4">Stok</th>
                    <th class="px-6 py-4">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @foreach($produks as $produk)
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="px-6 py-4">
                        <img src="{{ $produk->image_url }}" alt="{{ $produk->nama_produk }}" class="w-12 h-12 object-cover rounded-lg">
                    </td>
                    <td class="px-6 py-4 font-medium text-gray-800">{{ $produk->nama_produk }}</td>
                    <td class="px-6 py-4">
                        <span class="text-xs bg-gray-100 px-2 py-1 rounded text-gray-600 font-medium">
                            {{ $kategori->nama_kategori ?? '-' }}
                        </span>
                    </td>
                    <td class="px-6 py-4 font-semibold">Rp {{ number_format($produk->harga, 0, ',', '.') }}</td>
                    <td class="px-6 py-4">
                        <span class="{{ $produk->stok < 5 ? 'text-red-500 font-bold' : 'text-gray-700' }}">
                            {{ $produk->stok }}
                        </span>
                    </td>
                    <td class="px-6 py-4 flex space-x-2 mt-2">
                        <a href="{{ route('admin.produk.edit', $produk) }}" class="p-2 bg-yellow-50 text-yellow-600 rounded-lg hover:bg-yellow-100 transition-colors">
                            ✏️
                        </a>
                        <form action="{{ route('admin.produk.destroy', $produk) }}" method="POST" onsubmit="return confirm('Hapus menu ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="p-2 bg-red-50 text-red-600 rounded-lg hover:bg-red-100 transition-colors">
                                🗑️
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection