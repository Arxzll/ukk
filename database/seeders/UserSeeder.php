<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("user")->insert([
            "username" => "admin",
            "password" => Hash::make("admin"),
            "Email" => "admin@gmail.com",
            "NamaLengkap" => "admin",
            "Alamat" => "admin",
            "level" => "admin",
        ]);
    }
}
