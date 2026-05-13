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
        DB::table("users")->insert([
            [
                "email" => "user@email.com",
                "name" => "Usuario Demo",
                "username" => "user",
                "departamento" => "test",
                "password" => Hash::make("user"),
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "email" => "admin@email.com",
                "name" => "Usuario admin",
                "username" => "admin",
                "departamento" => "admin",
                "password" => Hash::make("admin"),
                "created_at" => now(),
                "updated_at" => now(),
            ],
            ]);
    }
}
