<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::create([
            "name" => "admin",
            "email" => "admin@gmail.com",
            "password" => bcrypt("admin"),
            "roles" => "ADMIN"
        ]);

        User::create([
            "name" => "azzam",
            "email" => "a
            zzam@gmail.com",
            "password" => bcrypt("azzam"),
            "roles" => "ADMIN"
        ]);

        User::create([
            "name" => "nova",
            "email" => "nova@gmail.com",
            "password" => bcrypt("nova"),
            "roles" => "ADMIN"
        ]);

        User::create([
            "name" => "zakiya",
            "email" => "zakiya@gmail.com",
            "password" => bcrypt("zakiya"),
            "roles" => "ADMIN"
        ]);

        Product::create([
            "name" => "Avanza",
            "description" => "Tipe tahun 2022",
            "price" => 10000,
            "merek" => 1,
            "jenis" => 1,
            "jumlahSewa" => 10,
            "slug" => "avanza-2022"
        ]);

        Product::create([
            "name" => "Kijang Innova",
            "description" => "Tipe tahun 2022",
            "price" => 120000,
            "merek" => 1,
            "jenis" => 1,
            "jumlahSewa" => 10,
            "slug" => "kijang-innova-2022"
        ]);

    }
}
