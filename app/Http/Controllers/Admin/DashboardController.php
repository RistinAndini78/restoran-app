<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Models\Produk;
use App\Models\Pesanan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $total_kategori = Kategori::count();
        $total_produk = Produk::count();
        $total_pesanan = Pesanan::count();
        $total_pendapatan = Pesanan::where('status', 'selesai')->sum('total_harga');

        $pesanan_terbaru = Pesanan::with('user')->latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'total_kategori',
            'total_produk',
            'total_pesanan',
            'total_pendapatan',
            'pesanan_terbaru'
        ));
    }
}
