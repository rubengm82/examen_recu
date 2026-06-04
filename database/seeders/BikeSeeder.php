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
                'marca' => 'marca-01',
                'modelo' => 'modelo-01',
                'user_id' => 1,
            ],
            [
                'marca' => 'marca-02',
                'modelo' => 'modelo-02',
                'user_id' => 1,
            ],
            [
                'marca' => 'marca-03',
                'modelo' => 'modelo-03',
                'user_id' => 2,
            ],
            [
                'marca' => 'marca-04',
                'modelo' => 'modelo-04',
                'user_id' => 2,
            ],
            [
                'marca' => 'marca-05',
                'modelo' => 'modelo-05',
                'user_id' => 1,
            ],
        ];
        
       
        foreach ($bikes as $bike) {
            Bike::create($bike);
        }
    }
}
