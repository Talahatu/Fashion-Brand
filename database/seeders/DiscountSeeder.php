<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DiscountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 5; $i++) {
            DB::table('discounts')->insert([
                [
                    "name" => "Discount" . $i,
                    "nominal" => rand(1, 10) * 0.1
                ]
            ]);
        }
    }
}
