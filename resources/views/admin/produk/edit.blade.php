@extends('layouts.admin.app')

@section('header', 'Edit Menu: ' . $produk->nama_produk)

@section('content')
<div class="max-w-3xl bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="p-6 border-b border-gray-100">
        <h3 class="text-lg font-bold text-gray-800">Form Update Menu</h3>
    </div>
    <form action="{{ route('admin.produk.update', $produk) }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-6">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="nama_produk" class="block text-sm font-medium text-gray-700 mb-1">Nama Menu</label>
                <input type="text" name="nama_produk" id="nama_produk" value="{{ $produk->nama_produk }}" class="w-full rounded-lg border-gray-300 focus:border-olive focus:ring-olive" required>
                @error('nama_produk') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="kategori_id" class="block text-sm font-medium text-gray-700 mb-1">Kategori</label>
                <select name="kategori_id" id="kategori_id" class="w-full rounded-lg border-gray-300 focus:border-olive focus:ring-olive" required>
                    @foreach($kategoris as $kategori)
                    <option value="{{ $kategori->id }}" {{ $produk->kategori_id == $kategori->id ? 'selected' : '' }}>{{ $kategori->nama_kategori }}</option>
                    @endforeach
                </select>
                @error('kategori_id') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="harga" class="block text-sm font-medium text-gray-700 mb-1">Harga (Rp)</label>
                <input type="number" name="harga" id="harga" value="{{ (int)$produk->harga }}" class="w-full rounded-lg border-gray-300 focus:border-olive focus:ring-olive" required>
                @error('harga') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="stok" class="block text-sm font-medium text-gray-700 mb-1">Stok</label>
                <input type="number" name="stok" id="stok" value="{{ $produk->stok }}" class="w-full rounded-lg border-gray-300 focus:border-olive focus:ring-olive" required>
                @error('stok') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>
        </div>

        <div>
            <label for="deskripsi" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi Menu</label>
            <textarea name="deskripsi" id="deskripsi" rows="4" class="w-full rounded-lg border-gray-300 focus:border-olive focus:ring-olive">{{ $produk->deskripsi }}</textarea>
            @error('deskripsi') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="flex items-start space-x-6">
            @if($produk->gambar)
            <div class="flex-shrink-0">
                <span class="block text-sm font-medium text-gray-700 mb-1">Gambar Saat Ini</span>
                <img src="{{ $produk->image_url }}" alt="" class="w-32 h-32 object-cover rounded-xl border border-gray-200">
            </div>
            @endif
            <div class="flex-1">
                <label for="gambar" class="block text-sm font-medium text-gray-700 mb-1">Ganti Gambar (Opsional)</label>
                <input type="file" name="gambar" id="gambar" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-olive file:text-white hover:file:bg-opacity-90">
                <p class="text-xs text-gray-400 mt-2">Biarkan kosong jika tidak ingin mengganti gambar.</p>
                @error('gambar') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>
        </div>

        <div class="flex justify-end space-x-3 pt-4 border-t border-gray-100">
            <a href="{{ route('admin.produk.index') }}" class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 font-medium transition-colors">Batal</a>
            <button type="submit" class="px-6 py-2 bg-olive text-white rounded-lg font-bold hover:bg-opacity-90 transition-all">Update Menu</button>
        </div>
    </form>
</div>
@endsection