@extends('layouts.user.app')

@section('content')
<div class="bg-gray-50 py-12 min-h-screen">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <a href="{{ route('orders.index') }}" class="text-olive font-bold flex items-center mb-8 hover:underline">
            <span class="mr-2">←</span> Kembali ke Riwayat Pesanan
        </a>

        <div class="bg-white rounded-[2rem] shadow-sm border border-gray-100 overflow-hidden">
            <div class="p-8 md:p-12 border-b border-gray-50 flex flex-col md:flex-row md:items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-coffee">Detail Pesanan #{{ str_pad($order->id, 5, '0', STR_PAD_LEFT) }}</h1>
                    <p class="text-gray-400 mt-1">Dipesan pada {{ $order->created_at->format('d M Y, H:i') }}</p>
                </div>
                <div class="mt-6 md:mt-0">
                    <span class="px-6 py-2 rounded-xl text-sm font-extrabold uppercase tracking-widest
                        @if($order->status == 'selesai') bg-green-100 text-green-700
                        @elseif($order->status == 'dikirim') bg-blue-100 text-blue-700
                        @elseif($order->status == 'diproses') bg-yellow-100 text-yellow-700
                        @else bg-gray-100 text-gray-700 @endif">
                        {{ $order->status }}
                    </span>
                </div>
            </div>

            <div class="p-8 md:p-12">
                <table class="w-full">
                    <thead>
                        <tr class="text-xs font-bold text-gray-400 uppercase tracking-widest border-b border-gray-50">
                            <th class="py-4 text-left">Menu Hidangan</th>
                            <th class="py-4 text-center">Harga</th>
                            <th class="py-4 text-center">Jumlah</th>
                            <th class="py-4 text-right">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        @foreach($order->detailPesanans as $detail)
                        <tr>
                            <td class="py-6">
                                <div class="flex items-center">
                                    <img src="{{ $detail->produk->image_url }}" alt="" class="w-12 h-12 object-cover rounded-xl mr-4">
                                    <span class="font-bold text-coffee">{{ $detail->produk->nama_produk }}</span>
                                </div>
                            </td>
                            <td class="py-6 text-center text-gray-600 font-medium">Rp {{ number_format($detail->produk->harga, 0, ',', '.') }}</td>
                            <td class="py-6 text-center text-gray-800 font-bold">{{ $detail->jumlah }}x</td>
                            <td class="py-6 text-right font-bold text-coffee">Rp {{ number_format($detail->subtotal, 0, ',', '.') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr class="border-t-2 border-dashed border-gray-100">
                            <td colspan="3" class="py-8 text-right text-lg font-bold text-gray-500">Total Pembayaran:</td>
                            <td class="py-8 text-right text-3xl font-extrabold text-olive">Rp {{ number_format($order->total_harga, 0, ',', '.') }}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>

            <div class="bg-olive/5 p-8 border-t border-gray-50">
                <div class="flex items-start">
                    <div class="text-3xl mr-6">ℹ️</div>
                    <p class="text-sm text-gray-600 leading-relaxed">
                        <strong class="text-coffee">Informasi Penting:</strong> <br>
                        Pesanan Anda sedang dalam pemantauan admin. Harap tunggu status berubah menjadi <span class="text-olive font-bold italic">Diproses</span> atau <span class="text-olive font-bold italic">Dikirim</span>. Jika ada kendala, hubungi kami melalui layanan pelanggan.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection