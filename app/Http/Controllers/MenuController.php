<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index(Request $request)
    {
        $kategoris = Kategori::all();
        $query = Produk::with('kategori');

        if ($request->has('kategori')) {
            $query->where('kategori_id', $request->kategori);
        }

        $produks = $query->latest()->get();
        return view('user.menu.index', compact('kategoris', 'produks'));
    }

    public function show(Produk $produk)
    {
        $produk->load('kategori');
        $rekomendasi = Produk::where('kategori_id', $produk->kategori_id)
            ->where('id', '!=', $produk->id)
            ->take(4)
            ->get();

        return view('user.menu.show', compact('produk', 'rekomendasi'));
    }
}
