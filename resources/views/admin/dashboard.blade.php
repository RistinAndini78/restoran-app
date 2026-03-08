@extends('layouts.admin.app')

@section('header', 'Dashboard')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-500 font-medium">Total Kategori</p>
                <h3 class="text-2xl font-bold text-gray-800 mt-1">{{ $total_kategori }}</h3>
            </div>
            <div class="w-12 h-12 bg-blue-50 rounded-lg flex items-center justify-center text-blue-500 text-xl">📂</div>
        </div>
    </div>

    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-500 font-medium">Total Produk</p>
                <h3 class="text-2xl font-bold text-gray-800 mt-1">{{ $total_produk }}</h3>
            </div>
            <div class="w-12 h-12 bg-green-50 rounded-lg flex items-center justify-center text-green-500 text-xl">🍲</div>
        </div>
    </div>

    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-500 font-medium">Total Pesanan</p>
                <h3 class="text-2xl font-bold text-gray-800 mt-1">{{ $total_pesanan }}</h3>
            </div>
            <div class="w-12 h-12 bg-orange-50 rounded-lg flex items-center justify-center text-orange-500 text-xl">📝</div>
        </div>
    </div>

    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-500 font-medium">Pendapatan</p>
                <h3 class="text-2xl font-bold text-gray-800 mt-1">Rp {{ number_format($total_pendapatan, 0, ',', '.') }}</h3>
            </div>
            <div class="w-12 h-12 bg-purple-50 rounded-lg flex items-center justify-center text-purple-500 text-xl">💰</div>
        </div>
    </div>
</div>

<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="p-6 border-b border-gray-100 flex items-center justify-between">
        <h3 class="text-lg font-bold text-gray-800">Pesanan Terbaru</h3>
        <a href="{{ route('admin.order.index') }}" class="text-olive font-semibold hover:underline text-sm">Lihat Semua</a>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-left">
            <thead>
                <tr class="bg-gray-50 text-gray-600 text-xs font-semibold uppercase tracking-wider">
                    <th class="px-6 py-4">ID Pesanan</th>
                    <th class="px-6 py-4">Pelanggan</th>
                    <th class="px-6 py-4">Total</th>
                    <th class="px-6 py-4">Status</th>
                    <th class="px-6 py-4">Tanggal</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @foreach($pesanan_terbaru as $order)
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="px-6 py-4 font-medium">#{{ str_pad($order->id, 5, '0', STR_PAD_LEFT) }}</td>
                    <td class="px-6 py-4">{{ $order->user->name }}</td>
                    <td class="px-6 py-4 font-semibold text-gray-800">Rp {{ number_format($order->total_harga, 0, ',', '.') }}</td>
                    <td class="px-6 py-4">
                        <span class="px-2 py-1 rounded-full text-xs font-bold 
                            @if($order->status == 'selesai') bg-green-100 text-green-700
                            @elseif($order->status == 'dikirim') bg-blue-100 text-blue-700
                            @elseif($order->status == 'diproses') bg-yellow-100 text-yellow-700
                            @else bg-gray-100 text-gray-700 @endif">
                            {{ ucfirst($order->status) }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-500">{{ $order->created_at->format('d M Y, H:i') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection