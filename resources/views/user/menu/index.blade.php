@extends('layouts.user.app')

@section('content')
<div class="bg-gray-50 py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-12">
            <div>
                <h1 class="text-4xl font-bold text-coffee">Daftar Menu Kami</h1>
                <p class="text-gray-500 mt-2">Pilih hidangan favorit Anda dari berbagai kategori.</p>
            </div>

            <!-- Category Filter -->
            <div class="mt-6 md:mt-0 overflow-x-auto pb-4 md:pb-0">
                <div class="flex space-x-2">
                    <a href="{{ route('menu.index') }}" class="px-6 py-2 rounded-full font-bold transition-all {{ !request('kategori') ? 'bg-olive text-white shadow-lg' : 'bg-white text-gray-600 hover:bg-gray-100' }}">Semua</a>
                    @foreach($kategoris as $kat)
                    <a href="{{ route('menu.index', ['kategori' => $kat->id]) }}" class="px-6 py-2 rounded-full font-bold transition-all {{ request('kategori') == $kat->id ? 'bg-olive text-white shadow-lg' : 'bg-white text-gray-600 hover:bg-gray-100' }}">
                        {{ $kat->nama_kategori }}
                    </a>
                    @endforeach
                </div>
            </div>
        </div>

        @if($produks->isEmpty())
        <div class="text-center py-20 bg-white rounded-3xl shadow-sm border border-gray-100">
            <div class="text-6xl mb-4">🍽️</div>
            <h3 class="text-xl font-bold text-gray-800">Maaf, belum ada menu di kategori ini.</h3>
            <a href="{{ route('menu.index') }}" class="text-olive font-bold mt-4 inline-block hover:underline">Kembali ke semua menu</a>
        </div>
        @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach($produks as $produk)
            <div class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all group flex flex-col h-full border border-gray-100">
                <div class="relative overflow-hidden h-48 flex-shrink-0">
                    <img src="{{ $produk->image_url }}" alt="{{ $produk->nama_produk }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                    <div class="absolute top-3 right-3 bg-white/95 px-3 py-1 rounded-full text-olive font-bold shadow-sm">
                        Rp {{ number_format($produk->harga, 0, ',', '.') }}
                    </div>
                </div>
                <div class="p-6 flex flex-col flex-1">
                    <div class="flex-1">
                        <span class="text-[10px] font-bold text-olive uppercase tracking-extra-widest">{{ $kategori->nama_kategori ?? '-' }}</span>
                        <h3 class="text-lg font-bold text-coffee mt-1 mb-2">{{ $produk->nama_produk }}</h3>
                        <p class="text-gray-500 text-xs line-clamp-2">{{ $produk->deskripsi }}</p>
                    </div>
                    <div class="mt-6 flex items-center justify-between">
                        <form action="{{ route('cart.add', $produk) }}" method="POST">
                            @csrf
                            <button class="bg-olive text-white px-5 py-2 rounded-lg font-bold text-sm hover:bg-coffee transition-all">Tambah 🛒</button>
                        </form>
                        <a href="{{ route('menu.show', $produk) }}" class="text-gray-400 hover:text-coffee transition-colors text-sm font-bold">Detail →</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endif
    </div>
</div>
@endsection