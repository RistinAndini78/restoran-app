<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $kategoris = Kategori::all();
        $featured_produks = Produk::with('kategori')->latest()->take(6)->get();
        return view('home', compact('kategoris', 'featured_produks'));
    }
}
