<?php

namespace Database\Seeders;

use App\Models\Bike;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BikeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bikes = [
            [
                'marca' => 'Honda',
                'modelo' => 'CBR600RR',
                'anyo' => '2022',
                'user_id' => 1,
            ],
            [
                'marca' => 'Yamaha',
                'modelo' => 'MT-07',
                'anyo' => '2021',
                'user_id' => 1,
            ],
            [
                'marca' => 'Kawasaki',
                'modelo' => 'Ninja 400',
                'anyo' => '2023',
                'user_id' => 1,
            ],
            [
                'marca' => 'Ducati',
                'modelo' => 'Monster',
                'anyo' => '2020',
                'user_id' => 2,
            ],
            [
                'marca' => 'BMW',
                'modelo' => 'S1000RR',
                'anyo' => '2024',
                'user_id' => 2,
            ],
        ];

        foreach ($bikes as $bike) {
            Bike::create($bike);
        }
    }
    
}
