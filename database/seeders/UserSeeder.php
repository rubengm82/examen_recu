<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        DB::table("users")->insert(
            [
                "email" => "user@email.com",
                "name" => "Usuario Demo",
                "password" => Hash::make("user"),
                "created_at" => now(),
                "updated_at" => now(),
            ],

        );
    }
}
