@extends('layouts.admin.app')

@section('header', 'Tambah Menu Baru')

@section('content')
<div class="max-w-3xl bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="p-6 border-b border-gray-100">
        <h3 class="text-lg font-bold text-gray-800">Form Menu Makanan</h3>
    </div>
    <form action="{{ route('admin.produk.store') }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-6">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="nama_produk" class="block text-sm font-medium text-gray-700 mb-1">Nama Menu</label>
                <input type="text" name="nama_produk" id="nama_produk" class="w-full rounded-lg border-gray-300 focus:border-olive focus:ring-olive" placeholder="Contoh: Nasi Goreng Spesial" required>
                @error('nama_produk') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="kategori_id" class="block text-sm font-medium text-gray-700 mb-1">Kategori</label>
                <select name="kategori_id" id="kategori_id" class="w-full rounded-lg border-gray-300 focus:border-olive focus:ring-olive" required>
                    <option value="">Pilih Kategori</option>
                    @foreach($kategoris as $kategori)
                    <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                    @endforeach
                </select>
                @error('kategori_id') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="harga" class="block text-sm font-medium text-gray-700 mb-1">Harga (Rp)</label>
                <input type="number" name="harga" id="harga" class="w-full rounded-lg border-gray-300 focus:border-olive focus:ring-olive" placeholder="Contoh: 25000" required>
                @error('harga') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="stok" class="block text-sm font-medium text-gray-700 mb-1">Stok</label>
                <input type="number" name="stok" id="stok" class="w-full rounded-lg border-gray-300 focus:border-olive focus:ring-olive" placeholder="Contoh: 50" required>
                @error('stok') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>
        </div>

        <div>
            <label for="deskripsi" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi Menu</label>
            <textarea name="deskripsi" id="deskripsi" rows="4" class="w-full rounded-lg border-gray-300 focus:border-olive focus:ring-olive" placeholder="Jelaskan bahan-bahan atau rasa menu ini..."></textarea>
            @error('deskripsi') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label for="gambar" class="block text-sm font-medium text-gray-700 mb-1">Gambar Menu</label>
            <input type="file" name="gambar" id="gambar" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-olive file:text-white hover:file:bg-opacity-90">
            <p class="text-xs text-gray-400 mt-2">Format: JPG, PNG, JPEG. Max: 2MB.</p>
            @error('gambar') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="flex justify-end space-x-3 pt-4 border-t border-gray-100">
            <a href="{{ route('admin.produk.index') }}" class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 font-medium transition-colors">Batal</a>
            <button type="submit" class="px-6 py-2 bg-olive text-white rounded-lg font-bold hover:bg-opacity-90 transition-all">Simpan Menu</button>
        </div>
    </form>
</div>
@endsection