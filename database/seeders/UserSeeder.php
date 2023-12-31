<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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
                    "password" => Hash::make("User" . ($i)),
                    "role" => $roles[rand(0, 2)],
                    "poin" => 0,
                    "membership" => 0
                ]
            ]);
        }
        DB::table('users')->insert([
            [
                "name" => "ken",
                "email" => "ken@ken.com",
                "password" => Hash::make("kenkenken"),
                "role" => $roles[1],
                "poin" => 0,
                "membership" => 0
            ]
        ]);
    }
}
