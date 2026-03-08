<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Admin User
        User::create([
            'name' => 'Admin Restoran',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        // Sample User
        User::create([
            'name' => 'User Biasa',
            'email' => 'user@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'user',
        ]);

        // Categories
        $categories = [
            ['nama_kategori' => 'Makanan Utama', 'deskripsi' => 'Menu hidangan utama yang lezat.'],
            ['nama_kategori' => 'Minuman', 'deskripsi' => 'Berbagai macam minuman segar.'],
            ['nama_kategori' => 'Cemilan', 'deskripsi' => 'Makanan ringan untuk menemani santai Anda.'],
            ['nama_kategori' => 'Pencuci Mulut', 'deskripsi' => 'Hidangan manis setelah makan.'],
        ];

        foreach ($categories as $category) {
            \App\Models\Kategori::create($category);
        }
    }
}
