<?php

namespace Database\Seeders;

use App\Models\Type;
use App\Models\User;
use App\Models\Merek;
use App\Models\Product;
use App\Models\ProductGallery;
use App\Models\Transaction;
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
            "email" => "azzam@gmail.com",
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
            "price" => 100000,
            "mereks_id" => 1,
            "types_id" => 2,
            "slug" => "avanza-2022"
        ]);

        Product::create([
            "name" => "Kijang Innova",
            "description" => "Tipe tahun 2022",
            "price" => 120000,
            "mereks_id" => 1,
            "types_id" => 2,
            "slug" => "kijang-innova-2022"
        ]);

        ProductGallery::create([
            "products_id" => 1,
            "url" => "public/gallery/IQxUeQswiwpxWFpxgAQ2l6d101kU0Xovx5FBL0dq.jpg"
        ]);

        ProductGallery::create([
            "products_id" => 2,
            "url" => "public/gallery/dzDRIuk6Hkwh0k9a2G5TFnr315TObKgukzXdnhuS.jpg"
        ]);

        Type::create([
            "name" => "Sedan"
        ]);

        Type::create([
            "name" => "Minibus"
        ]);

        Type::create([
            "name" => "Sport"
        ]);

        Type::create([
            "name" => "SUV"
        ]);

        Merek::create([
            "name" => "Toyota"
        ]);

        Merek::create([
            "name" => "Daihatsu"
        ]);

        Merek::create([
            "name" => "Nissan"
        ]);

        Transaction::create([
            'users_id' => 1,
            'name' => "Joko",
            'email' => "jokowi@gmail.com",
            'address'=> "Solo",
            'phone'=> "088880008880",
            'courier' => "JNE",
            'payment'=> "GOPAY",
            'payment_url'=> "gopay.com",
            'total_price'=> 500000,
            'status' => "SUCCESs"
        ]);

    }
}
