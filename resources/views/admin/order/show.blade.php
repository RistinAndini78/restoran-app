@extends('layouts.admin.app')

@section('header', 'Detail Pesanan #' . str_pad($order->id, 5, '0', STR_PAD_LEFT))

@section('content')
<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    <!-- Order Items -->
    <div class="lg:col-span-2 space-y-6">
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="p-6 border-b border-gray-100">
                <h3 class="text-lg font-bold text-gray-800">Item Pesanan</h3>
            </div>
            <div class="p-6">
                <table class="w-full">
                    <thead>
                        <tr class="text-xs font-bold text-gray-500 uppercase tracking-wider border-b border-gray-100">
                            <th class="py-3 text-left">Produk</th>
                            <th class="py-3 text-center">Harga</th>
                            <th class="py-3 text-center">Jumlah</th>
                            <th class="py-3 text-right">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        @foreach($order->detailPesanans as $detail)
                        <tr>
                            <td class="py-4">
                                <div class="flex items-center">
                                    <img src="{{ $detail->produk->image_url }}" alt="" class="w-10 h-10 object-cover rounded mr-3">
                                    <span class="font-medium text-gray-800">{{ $detail->produk->nama_produk }}</span>
                                </div>
                            </td>
                            <td class="py-4 text-center">Rp {{ number_format($detail->produk->harga, 0, ',', '.') }}</td>
                            <td class="py-4 text-center">{{ $detail->jumlah }}</td>
                            <td class="py-4 text-right font-bold text-gray-800">Rp {{ number_format($detail->subtotal, 0, ',', '.') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr class="border-t border-gray-100">
                            <td colspan="3" class="py-4 text-right font-bold text-gray-800">Total Harga:</td>
                            <td class="py-4 text-right font-bold text-2xl text-olive">Rp {{ number_format($order->total_harga, 0, ',', '.') }}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

    <!-- Order Sidebar -->
    <div class="space-y-6">
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            <h3 class="text-lg font-bold text-gray-800 mb-4">Informasi Pelanggan</h3>
            <div class="space-y-3 text-sm">
                <div>
                    <span class="text-gray-500 block">Nama:</span>
                    <span class="font-semibold text-gray-800">{{ $order->user->name }}</span>
                </div>
                <div>
                    <span class="text-gray-500 block">Email:</span>
                    <span class="font-semibold text-gray-800">{{ $order->user->email }}</span>
                </div>
                <div>
                    <span class="text-gray-500 block">Waktu Pesanan:</span>
                    <span class="font-semibold text-gray-800">{{ $order->created_at->format('d M Y, H:i') }}</span>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            <h3 class="text-lg font-bold text-gray-800 mb-4">Status Pesanan</h3>
            <form action="{{ route('admin.order.update', $order) }}" method="POST" class="space-y-4">
                @csrf
                @method('PATCH')
                <select name="status" class="w-full rounded-lg border-gray-300 focus:border-olive focus:ring-olive">
                    <option value="menunggu" {{ $order->status == 'menunggu' ? 'selected' : '' }}>Menunggu</option>
                    <option value="diproses" {{ $order->status == 'diproses' ? 'selected' : '' }}>Diproses</option>
                    <option value="dikirim" {{ $order->status == 'dikirim' ? 'selected' : '' }}>Dikirim</option>
                    <option value="selesai" {{ $order->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                </select>
                <button type="submit" class="w-full py-2 bg-olive text-white rounded-lg font-bold hover:bg-opacity-90 transition-all">
                    Update Status
                </button>
            </form>
        </div>
    </div>
</div>
@endsection