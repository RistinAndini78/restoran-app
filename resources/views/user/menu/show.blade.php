@extends('layouts.user.app')

@section('content')
<div class="bg-white py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-start">
            <!-- Product Image -->
            <div class="sticky top-28">
                <div class="bg-gray-50 rounded-[40px] overflow-hidden shadow-2xl-soft aspect-square relative group">
                    <img src="{{ $produk->image_url }}" alt="{{ $produk->nama_produk }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-1000">
                    <div class="absolute top-8 left-8 bg-white/90 backdrop-blur px-5 py-2 rounded-2xl font-bold text-olive shadow-sm">
                        {{ $produk->kategori->nama_kategori }}
                    </div>
                </div>
            </div>

            <!-- Product Info -->
            <div class="py-8">
                <nav class="flex mb-8" aria-label="Breadcrumb">
                    <ol class="flex items-center space-x-2 text-sm text-gray-400">
                        <li><a href="{{ route('home') }}" class="hover:text-coffee transition-colors">Home</a></li>
                        <li><span>/</span></li>
                        <li><a href="{{ route('menu.index') }}" class="hover:text-coffee transition-colors">Menu</a></li>
                        <li><span>/</span></li>
                        <li class="text-coffee font-semibold">{{ $produk->nama_produk }}</li>
                    </ol>
                </nav>

                <h1 class="text-4xl lg:text-5xl font-bold text-coffee leading-tight mb-4">{{ $produk->nama_produk }}</h1>
                <p class="text-2xl font-bold text-olive mb-8">Rp {{ number_format($produk->harga, 0, ',', '.') }}</p>

                <div class="prose prose-coffee max-w-none text-gray-500 mb-10 leading-relaxed">
                    {{ $produk->deskripsi }}
                </div>

                <div class="bg-gray-50 p-6 rounded-2xl mb-12 flex items-center justify-between border border-gray-100">
                    <div class="flex items-center">
                        <span class="text-sm font-medium text-gray-400 mr-4">Stok Tersedia:</span>
                        <span class="text-lg font-bold {{ $produk->stok < 5 ? 'text-red-500' : 'text-coffee' }}">{{ $produk->stok }} Porsi</span>
                    </div>
                    @if($produk->stok > 0)
                    <form action="{{ route('cart.add', $produk) }}" method="POST">
                        @csrf
                        <button class="bg-olive text-white px-10 py-4 rounded-2xl font-extrabold text-lg hover:bg-coffee hover:shadow-2xl transition-all active:scale-95 shadow-lg shadow-olive/20">
                            PESAN SEKARANG 🛒
                        </button>
                    </form>
                    @else
                    <button class="bg-gray-300 text-white px-8 py-3 rounded-xl font-bold cursor-not_allowed" disabled>Stok Habis</button>
                    @endif
                </div>

                <div class="grid grid-cols-2 gap-6 border-t border-gray-100 pt-10">
                    <div class="flex items-center space-x-4">
                        <div class="bg-green-50 w-10 h-10 rounded-full flex items-center justify-center text-green-500 text-xl">✅</div>
                        <span class="text-sm font-medium text-gray-500">Bahan Segar Berkualitas</span>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="bg-green-50 w-10 h-10 rounded-full flex items-center justify-center text-green-500 text-xl">✅</div>
                        <span class="text-sm font-medium text-gray-500">Dimasak Oleh Chef Profesional</span>
                    </div>
                </div>
            </div>
        </div>

        @if(!$rekomendasi->isEmpty())
        <!-- Recommendations -->
        <div class="mt-32">
            <h2 class="text-2xl font-bold text-coffee mb-12">Rekomendasi Lainnya</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach($rekomendasi as $item)
                <a href="{{ route('menu.show', $item) }}" class="group">
                    <div class="bg-gray-50 rounded-2xl overflow-hidden aspect-square relative mb-4">
                        <img src="{{ $item->image_url }}" alt="" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                    </div>
                    <h4 class="font-bold text-coffee group-hover:text-olive transition-colors">{{ $item->nama_produk }}</h4>
                    <p class="text-sm text-olive font-bold mt-1">Rp {{ number_format($item->harga, 0, ',', '.') }}</p>
                </a>
                @endforeach
            </div>
        </div>
        @endif
    </div>
</div>
@endsection