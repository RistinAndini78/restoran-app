<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserOrderController extends Controller
{
    public function index()
    {
        $orders = Pesanan::where('user_id', Auth::id())->latest()->get();
        return view('user.orders.index', compact('orders'));
    }

    public function show(Pesanan $order)
    {
        if ($order->user_id !== Auth::id()) {
            abort(403);
        }
        $order->load('detailPesanans.produk');
        return view('user.orders.show', compact('order'));
    }
}
