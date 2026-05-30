<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Bike;

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
                'modelo' => 'CBR 600 RR',
                'cilindrada' => 600,
                'gasolina' => true,
                'user_id' => 1,
            ],
            [
                'marca' => 'Yamaha',
                'modelo' => 'MT-07',
                'cilindrada' => 689,
                'gasolina' => true,
                'user_id' => 1,
            ],
            [
                'marca' => 'Kawasaki',
                'modelo' => 'Ninja 400',
                'cilindrada' => 399,
                'gasolina' => true,
                'user_id' => 2,
            ],
            [
                'marca' => 'Ducati',
                'modelo' => 'Monster',
                'cilindrada' => 937,
                'gasolina' => true,
                'user_id' => 2,
            ],
            [
                'marca' => 'BMW',
                'modelo' => 'CE 04',
                'cilindrada' => 0,
                'gasolina' => false,
                'user_id' => 1,
            ],
        ];
        
        foreach ($bikes as $bike) {
            Bike::create($bike);
        }
    }
}
