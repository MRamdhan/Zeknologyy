<?php

namespace Database\Seeders;

use App\Models\Kategori;
use App\Models\Produk;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User:: create([
            'nama'=> 'pelangga1',
            'username'=>'pelangga',
            'role'=>'pelanggan',
            'password'=> bcrypt(1)
        ]);

        User:: create([
            'nama'=> 'admin',
            'username'=> 'admin',
            'role'=> 'admin',
            'password' => bcrypt(1)
        ]);


        $kategori=Kategori::create([
            'nama'=>'HP'
        ]);
        $kategori=Kategori::create([
            'nama'=>'Aksesori'
        ]);
        $kategori=Kategori::create([
            'nama'=>'Cassing'
        ]);

        Produk::create([
            'kategori_id'=>1,
            'nama'=> 'Iphone 16',
            'harga'=>1800000,
            'foto'=>'img/ip.jpg'
        ]);
        Produk::create([
            'kategori_id'=>1,
            'nama'=> 'Samsung A54',
            'harga'=>600000,
            'foto'=>'img/hp2.jpg'
        ]);
        Produk::create([
            'kategori_id'=>2,   
            'nama'=> 'Gantungan Hp',
            'harga'=> 20000,
            'foto'=>'img/aksesori1.jpeg'
        ]);
        Produk::create([
            'kategori_id'=>3,
            'nama' => 'Casing Naga Keren',
            'harga' => 30000,
            'foto' => 'img/casing1.jpg'
        ]);

    }
}
