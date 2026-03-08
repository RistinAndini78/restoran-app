<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Pesanan;
use App\Models\DetailPesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        $total = array_sum(array_map(fn($item) => $item['harga'] * $item['quantity'], $cart));
        return view('user.cart', compact('cart', 'total'));
    }

    public function add(Produk $produk)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$produk->id])) {
            $cart[$produk->id]['quantity']++;
        } else {
            $cart[$produk->id] = [
                "nama" => $produk->nama_produk,
                "quantity" => 1,
                "harga" => $produk->harga,
                "gambar" => $produk->image_url
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Menu berhasil ditambahkan ke keranjang.');
    }

    public function update(Request $request, $id)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            $cart[$id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Keranjang diperbarui.');
        }
        return redirect()->back();
    }

    public function remove($id)
    {
        $cart = session()->get('cart');
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }
        return redirect()->back()->with('success', 'Menu dihapus dari keranjang.');
    }

    public function checkout(Request $request)
    {
        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect()->back()->with('error', 'Keranjang Anda kosong.');
        }

        DB::transaction(function () use ($cart) {
            $total = array_sum(array_map(fn($item) => $item['harga'] * $item['quantity'], $cart));

            $pesanan = Pesanan::create([
                'user_id' => Auth::id(),
                'total_harga' => $total,
                'status' => 'menunggu'
            ]);

            foreach ($cart as $id => $item) {
                DetailPesanan::create([
                    'pesanan_id' => $pesanan->id,
                    'produk_id' => $id,
                    'jumlah' => $item['quantity'],
                    'subtotal' => $item['harga'] * $item['quantity']
                ]);

                // Kurangi stok
                $produk = Produk::find($id);
                if ($produk) {
                    $produk->decrement('stok', $item['quantity']);
                }
            }
        });

        session()->forget('cart');
        return redirect()->route('orders.index')->with('success', 'Pesanan berhasil dibuat! Mohon tunggu konfirmasi admin.');
    }
}
