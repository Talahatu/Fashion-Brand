<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class NoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 5; $i++) {
            DB::table('notes')->insert([
                [
                    "order_date" => Date::now(),
                    "total" => 0,
                    "Pembeli_id" => rand(1, 5),
                    "Discount_id" => rand(1, 5)
                ]
            ]);
        }
    }
}
