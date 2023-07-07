<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $size = ["x", "xs", "m", "l", "xxl", "all size", "41", "42", "43"];
        for ($i = 1; $i <= 5; $i++) {
            DB::table('products')->insert([
                [
                    "name" => "Product" . $i,
                    "size" => $size[rand(0, 8)],
                    "stock" => rand(30, 100),
                    "price" => rand(1, 50) * 100000,
                    "url_gambar" => "https://i5.walmartimages.com/asr/a20dda95-0bfc-4e68-921f-9087b610748d_1.482c874caf518816cf60db8837ea35bd.jpeg",
                    "categories_id" => rand(1, 5),
                    "brands_id" => rand(1, 5),
                    "types_id" => rand(1, 5)
                ]
            ]);
        }
    }
}
