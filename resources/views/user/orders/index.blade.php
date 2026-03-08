@extends('layouts.user.app')

@section('content')
<div class="bg-gray-50 py-12 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-coffee mb-8">Riwayat Pesanan Saya</h1>

        @if($orders->isEmpty())
        <div class="bg-white rounded-3xl p-12 text-center shadow-sm border border-gray-100">
            <div class="text-6xl mb-6">📦</div>
            <h2 class="text-2xl font-bold text-gray-800">Anda belum pernah melakukan pemesanan.</h2>
            <p class="text-gray-500 mt-2 mb-8">Hidangan spesial kami menunggu untuk dicicipi!</p>
            <a href="{{ route('menu.index') }}" class="bg-olive text-white px-8 py-3 rounded-full font-bold hover:shadow-lg transition-all">Lihat Menu</a>
        </div>
        @else
        <div class="space-y-6">
            @foreach($orders as $order)
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:border-olive transition-colors group">
                <div class="p-6 md:p-8 flex flex-col md:flex-row md:items-center justify-between">
                    <div class="flex items-center space-x-6">
                        <div class="w-16 h-16 bg-gray-50 rounded-2xl flex items-center justify-center text-2xl group-hover:bg-olive transition-colors group-hover:text-white">
                            📜
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-coffee">Order #{{ str_pad($order->id, 5, '0', STR_PAD_LEFT) }}</h3>
                            <p class="text-sm text-gray-400">{{ $order->created_at->format('d M Y, H:i') }}</p>
                        </div>
                    </div>

                    <div class="mt-6 md:mt-0 flex items-center justify-between md:space-x-12">
                        <div>
                            <span class="text-xs text-gray-400 block uppercase font-bold tracking-widest mb-1">Total Bayar</span>
                            <span class="text-xl font-bold text-olive">Rp {{ number_format($order->total_harga, 0, ',', '.') }}</span>
                        </div>
                        <div>
                            <span class="text-xs text-gray-400 block uppercase font-bold tracking-widest mb-1">Status</span>
                            <span class="px-3 py-1 rounded-full text-xs font-bold 
                                    @if($order->status == 'selesai') bg-green-100 text-green-700
                                    @elseif($order->status == 'dikirim') bg-blue-100 text-blue-700
                                    @elseif($order->status == 'diproses') bg-yellow-100 text-yellow-700
                                    @else bg-gray-100 text-gray-700 @endif">
                                {{ ucfirst($order->status) }}
                            </span>
                        </div>
                        <a href="{{ route('orders.show', $order) }}" class="bg-white text-coffee border border-gray-200 px-6 py-2 rounded-lg font-bold hover:bg-gray-50 transition-all text-sm">Lihat Detail</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endif
    </div>
</div>
@endsection