<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetailNotesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 5; $i++) {
            DB::table('detail_notes')->insert([
                [
                    "quantity" => rand(1, 5),
                    "subTotal" => rand(1, 10) * 100000,
                    "products_id" => rand(1, 5),
                    "notes_id" => rand(1, 5),
                ]
            ]);
        }
    }
}
