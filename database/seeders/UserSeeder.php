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
                'departamento' => 'Client',
                'password' => Hash::make('user'),
            ],
            [
                'email' => 'admin@email.com',
                'name' => 'Usuario Admin',
                'departamento' => 'Administrador',
                'password' => Hash::make('admin'),
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
