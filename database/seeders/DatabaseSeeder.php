<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Paket;
use App\Models\Produk;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Produk::create([
            'paket' => 'PAKET 1',
            'harga' => 25000,
            'deskripsi' => 'Paket 1 : Mobil anda akan di bersihkan bagian atas dan dalam mobil saja.',
        ]);

        Produk::create([
            'paket' => 'PAKET 2',
            'harga' => 30000,
            'deskripsi' => 'Paket 2 : Mobil anda akan di bersihkan bagian atas,bawah dan dalam mobilnya.'
        ]);

        Produk::create([
            'paket' => 'PAKET 3',
            'harga' => 50000,
            'deskripsi' => 'Paket 3 : Mobil anda akan di bersihkan di bagian seluruh mobil baik itu atas,bawah dalam mobil dan mesin mobil.'
        ]);

        User::create([
            'name' => 'Kasir',
            'role' => 'kasir',
            'email' => 'kasir@a.com',
            'password' => bcrypt(1),
        ]);
        User::create([
            'name' => 'Admin',
            'role' => 'admin',
            'email' => 'admin@a.com',
            'password' => bcrypt(1),
        ]);
        User::create([
            'name' => 'Owner',
            'role' => 'owner',
            'email' => 'owner@a.com',
            'password' => bcrypt(1),
        ]);
    }
}
