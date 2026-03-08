@extends('layouts.user.app')

@section('content')
<div class="bg-gray-50 py-12 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-coffee mb-8">Keranjang Belanja</h1>

        @if(empty($cart))
        <div class="bg-white rounded-3xl p-12 text-center shadow-sm border border-gray-100">
            <div class="text-6xl mb-6">🏜️</div>
            <h2 class="text-2xl font-bold text-gray-800">Keranjang Anda masih kosong.</h2>
            <p class="text-gray-500 mt-2 mb-8">Yuk, cari menu lezat di daftar kami!</p>
            <a href="{{ route('menu.index') }}" class="bg-olive text-white px-8 py-3 rounded-full font-bold hover:shadow-lg transition-all">Lihat Daftar Menu</a>
        </div>
        @else
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            <!-- Item List -->
            <div class="lg:col-span-2 space-y-4">
                @foreach($cart as $id => $item)
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex items-center">
                    <img src="{{ $item['gambar'] }}" alt="{{ $item['nama'] }}" class="w-24 h-24 object-cover rounded-xl">
                    <div class="ml-6 flex-1">
                        <h3 class="text-lg font-bold text-coffee">{{ $item['nama'] }}</h3>
                        <p class="text-olive font-bold">Rp {{ number_format($item['harga'], 0, ',', '.') }}</p>
                    </div>
                    <div class="flex items-center space-x-4">
                        <form action="{{ route('cart.update', $id) }}" method="POST" class="flex items-center">
                            @csrf
                            @method('PATCH')
                            <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1" class="w-16 rounded-lg border-gray-200 text-center" onchange="this.form.submit()">
                        </form>
                        <form action="{{ route('cart.remove', $id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-400 hover:text-red-600 font-bold p-2">🗑️</button>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Order Summary -->
            <div>
                <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100 sticky top-28">
                    <h3 class="text-xl font-bold text-coffee mb-6">Ringkasan Pesanan</h3>
                    <div class="space-y-4 mb-8">
                        <div class="flex justify-between text-gray-600">
                            <span>Subtotal:</span>
                            <span>Rp {{ number_format($total, 0, ',', '.') }}</span>
                        </div>
                        <div class="flex justify-between text-gray-600">
                            <span>Biaya Layanan:</span>
                            <span>Rp 0</span>
                        </div>
                        <div class="border-t border-gray-100 pt-4 flex justify-between items-end">
                            <span class="font-bold text-coffee">Total Bayar:</span>
                            <span class="text-2xl font-bold text-olive">Rp {{ number_format($total, 0, ',', '.') }}</span>
                        </div>
                    </div>

                    <form action="{{ route('checkout') }}" method="POST">
                        @csrf
                        <button type="submit" class="w-full bg-olive text-white py-4 rounded-xl font-bold text-lg hover:shadow-xl transition-all">Pesan Sekarang</button>
                    </form>
                    <p class="text-center text-[10px] text-gray-400 mt-4">Pesanan akan diproses oleh admin segera.</p>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection