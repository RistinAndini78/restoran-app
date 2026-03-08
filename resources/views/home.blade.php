@extends('layouts.user.app')

@section('content')
<!-- Hero Section -->
<section class="relative bg-cream h-[600px] flex items-center overflow-hidden">
    <div class="bg-olive/10 absolute top-0 right-0 w-1/2 h-full rounded-l-full"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
        <div class="animate-fade-in-up">
            <h1 class="text-5xl lg:text-7xl font-bold text-coffee leading-tight">
                Rasakan Kelezatan <br> <span class="text-olive">Menu Spesial</span> Kami
            </h1>
            <p class="mt-6 text-lg text-gray-600 max-w-lg">
                Pesan hidangan favorit Anda secara online dengan mudah dan cepat. Kami siap mengantarkan kehangatan makanan terbaik ke rumah Anda.
            </p>
            <div class="mt-10 flex space-x-4">
                <a href="{{ route('menu.index') }}" class="bg-olive text-white px-8 py-4 rounded-full font-bold text-lg hover:shadow-xl hover:-translate-y-1 transition-all">Lihat Menu</a>
                <a href="#kategori" class="bg-white text-coffee border-2 border-coffee px-8 py-4 rounded-full font-bold text-lg hover:bg-coffee hover:text-white transition-all">Jelajahi Kategori</a>
            </div>
        </div>
        <div class="hidden lg:block">
            <img src="https://images.unsplash.com/photo-1504674900247-0877df9cc836?auto=format&fit=crop&q=80&w=1000" alt="Delicious Food" class="rounded-3xl shadow-2xl rotate-3 hover:rotate-0 transition-all duration-700">
        </div>
    </div>
</section>

<!-- Categories Section -->
<section id="kategori" class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-bold text-coffee">Kategori Pilihan</h2>
            <div class="w-20 h-1 bg-olive mx-auto mt-4"></div>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
            @foreach($kategoris as $kategori)
            <a href="{{ route('menu.index', ['kategori' => $kategori->id]) }}" class="group bg-gray-50 p-8 rounded-2xl text-center hover:bg-olive transition-all duration-300 shadow-sm">
                <div class="text-4xl mb-4 group-hover:scale-110 transition-transform">
                    @if($kategori->nama_kategori == 'Minuman') 🥤
                    @elseif($kategori->nama_kategori == 'Minuman') 🥤
                    @elseif($kategori->nama_kategori == 'Cemilan') 🍟
                    @elseif($kategori->nama_kategori == 'Pencuci Mulut') 🍰
                    @else 🍲 @endif
                </div>
                <h3 class="font-bold text-coffee group-hover:text-white">{{ $kategori->nama_kategori }}</h3>
                <p class="text-xs text-gray-400 mt-2 group-hover:text-olive-100">{{ $kategori->produks()->count() }} Menu</p>
            </a>
            @endforeach
        </div>
    </div>
</section>

<!-- Featured Menu -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-end mb-12">
            <div>
                <h2 class="text-3xl font-bold text-coffee">Menu Terpopuler</h2>
                <p class="text-gray-500 mt-2">Pilihan terbaik dari pelanggan setia kami.</p>
            </div>
            <a href="{{ route('menu.index') }}" class="text-olive font-bold hover:underline">Lihat Semua →</a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($featured_produks as $produk)
            <div class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all group">
                <div class="relative overflow-hidden h-64">
                    <img src="{{ $produk->image_url }}" alt="{{ $produk->nama_produk }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                    <div class="absolute top-4 right-4 bg-white/90 backdrop-blur px-3 py-1 rounded-full text-olive font-bold">
                        Rp {{ number_format($produk->harga, 0, ',', '.') }}
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-coffee mb-2">{{ $produk->nama_produk }}</h3>
                    <p class="text-gray-500 text-sm line-clamp-2 mb-6">{{ $produk->deskripsi }}</p>
                    <div class="flex items-center justify-between">
                        <form action="{{ route('cart.add', $produk) }}" method="POST">
                            @csrf
                            <button class="bg-coffee text-white px-6 py-2 rounded-lg font-bold hover:bg-olive transition-colors">Tambah 🛒</button>
                        </form>
                        <a href="{{ route('menu.show', $produk) }}" class="text-gray-400 hover:text-coffee transition-colors font-medium">Detail →</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection