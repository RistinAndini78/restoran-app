@extends('layouts.admin.app')

@section('header', 'Kelola Kategori')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h3 class="text-lg font-bold text-gray-800">Daftar Kategori</h3>
    <a href="{{ route('admin.kategori.create') }}" class="bg-olive text-white px-4 py-2 rounded-lg font-semibold hover:bg-opacity-90 transition-all flex items-center">
        <span class="mr-2">+</span> Tambah Kategori
    </a>
</div>

<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left">
            <thead>
                <tr class="bg-gray-50 text-gray-600 text-xs font-semibold uppercase tracking-wider">
                    <th class="px-6 py-4">Nama Kategori</th>
                    <th class="px-6 py-4">Deskripsi</th>
                    <th class="px-6 py-4">Produk</th>
                    <th class="px-6 py-4">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @foreach($kategoris as $kategori)
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="px-6 py-4 font-medium text-gray-800">{{ $kategori->nama_kategori }}</td>
                    <td class="px-6 py-4 text-sm text-gray-600">{{ $kategori->deskripsi ?? '-' }}</td>
                    <td class="px-6 py-4 text-sm font-semibold">{{ $kategori->produks()->count() }}</td>
                    <td class="px-6 py-4 flex space-x-2">
                        <a href="{{ route('admin.kategori.edit', $kategori) }}" class="p-2 bg-yellow-50 text-yellow-600 rounded-lg hover:bg-yellow-100 transition-colors">
                            ✏️
                        </a>
                        <form action="{{ route('admin.kategori.destroy', $kategori) }}" method="POST" onsubmit="return confirm('Hapus kategori ini? Semua produk di dalamnya juga akan terhapus.')">
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