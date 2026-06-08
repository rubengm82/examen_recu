<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $users = [
            [
                'email' => 'user@email.com',
                'name' => 'Ruben Gallardo',
                'password' => Hash::make('user'),
            ],
            [
                'email' => 'admin@email.com',
                'name' => 'Juan Pepito',
                'password' => Hash::make('admin'),
            ],
            [
                'email' => 'it@email.com',
                'name' => 'Joan Valles',
                'password' => Hash::make('admin'),
            ],
            [
                'email' => 'rrhh@email.com',
                'name' => 'Maria Vila',
                'password' => Hash::make('admin'),
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
