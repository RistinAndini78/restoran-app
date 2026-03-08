<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Kategori;
use App\Models\DetailPesanan;

class Produk extends Model
{
    protected $fillable = ['kategori_id', 'nama_produk', 'deskripsi', 'harga', 'gambar', 'stok'];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function detailPesanans()
    {
        return $this->hasMany(DetailPesanan::class);
    }

    public function getImageUrlAttribute()
    {
        return $this->gambar ? asset('storage/' . $this->gambar) : asset('images/default-food.jpg');
    }
}
