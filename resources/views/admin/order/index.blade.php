@extends('layouts.admin.app')

@section('header', 'Kelola Pesanan')

@section('content')
<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="p-6 border-b border-gray-100">
        <h3 class="text-lg font-bold text-gray-800">Daftar Semua Pesanan</h3>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-left">
            <thead>
                <tr class="bg-gray-50 text-gray-600 text-xs font-semibold uppercase tracking-wider">
                    <th class="px-6 py-4">ID Pesanan</th>
                    <th class="px-6 py-4">Pelanggan</th>
                    <th class="px-6 py-4">Total Harga</th>
                    <th class="px-6 py-4">Status</th>
                    <th class="px-6 py-4">Waktu</th>
                    <th class="px-6 py-4">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @foreach($pesanans as $order)
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="px-6 py-4 font-medium">#{{ str_pad($order->id, 5, '0', STR_PAD_LEFT) }}</td>
                    <td class="px-6 py-4">
                        <div class="font-medium text-gray-800">{{ $order->user->name }}</div>
                        <div class="text-xs text-gray-500">{{ $order->user->email }}</div>
                    </td>
                    <td class="px-6 py-4 font-bold text-gray-800">Rp {{ number_format($order->total_harga, 0, ',', '.') }}</td>
                    <td class="px-6 py-4">
                        <span class="px-2 py-1 rounded-full text-xs font-bold 
                            @if($order->status == 'selesai') bg-green-100 text-green-700
                            @elseif($order->status == 'dikirim') bg-blue-100 text-blue-700
                            @elseif($order->status == 'diproses') bg-yellow-100 text-yellow-700
                            @else bg-gray-100 text-gray-700 @endif">
                            {{ ucfirst($order->status) }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-500">{{ $order->created_at->format('d/m/Y H:i') }}</td>
                    <td class="px-6 py-4">
                        <a href="{{ route('admin.order.show', $order) }}" class="inline-flex items-center px-3 py-1 bg-olive text-white rounded text-sm font-semibold hover:bg-opacity-90">
                            Detail 👁️
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection