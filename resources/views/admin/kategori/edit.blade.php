@extends('layouts.admin.app')

@section('header', 'Edit Kategori: ' . $kategori->nama_kategori)

@section('content')
<div class="max-w-2xl bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="p-6 border-b border-gray-100">
        <h3 class="text-lg font-bold text-gray-800">Form Update Kategori</h3>
    </div>
    <form action="{{ route('admin.kategori.update', $kategori) }}" method="POST" class="p-6 space-y-6">
        @csrf
        @method('PUT')
        <div>
            <label for="nama_kategori" class="block text-sm font-medium text-gray-700 mb-1">Nama Kategori</label>
            <input type="text" name="nama_kategori" id="nama_kategori" value="{{ $kategori->nama_kategori }}" class="w-full rounded-lg border-gray-300 focus:border-olive focus:ring-olive" required>
            @error('nama_kategori')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="deskripsi" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi (Opsional)</label>
            <textarea name="deskripsi" id="deskripsi" rows="4" class="w-full rounded-lg border-gray-300 focus:border-olive focus:ring-olive">{{ $kategori->deskripsi }}</textarea>
            @error('deskripsi')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex justify-end space-x-3 pt-4">
            <a href="{{ route('admin.kategori.index') }}" class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 font-medium transition-colors">Batal</a>
            <button type="submit" class="px-6 py-2 bg-olive text-white rounded-lg font-bold hover:bg-opacity-90 transition-all">Update Kategori</button>
        </div>
    </form>
</div>
@endsection