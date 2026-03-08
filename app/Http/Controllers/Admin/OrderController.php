<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pesanan;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $pesanans = Pesanan::with('user')->latest()->get();
        return view('admin.order.index', compact('pesanans'));
    }

    public function show(Pesanan $order)
    {
        $order->load(['user', 'detailPesanans.produk']);
        return view('admin.order.show', compact('order'));
    }

    public function update(Request $request, Pesanan $order)
    {
        $request->validate([
            'status' => 'required|in:menunggu,diproses,dikirim,selesai',
        ]);

        $order->update(['status' => $request->status]);
        return redirect()->route('admin.order.show', $order)->with('success', 'Status pesanan berhasil diperbarui.');
    }
}
