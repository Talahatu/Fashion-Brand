<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = ["owner", "pembeli", "staff"];
        for ($i = 1; $i <= 5; $i++) {
            DB::table('users')->insert([
                [
                    "name" => "User" . ($i),
                    "email" => "User" . ($i) . "@gmail.com",
                    "password" => "User" . ($i),
                    "role" => $roles[rand(0, 2)],
                    "poin" => 0,
                    "membership" => 0
                ]
            ]);
        }
    }
}
