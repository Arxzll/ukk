<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Hash;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

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
