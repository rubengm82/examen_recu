<?php

namespace Database\Seeders;

use App\Models\Part;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $parts = [
            [
                'nombre' => 'Pieza-01',
                'precio' => 11,
                'bike_id' => 1
            ],
            [
                'nombre' => 'Pieza-02',
                'precio' => 22,
                'bike_id' => 1
            ],
            [
                'nombre' => 'Pieza-03',
                'precio' => 33,
                'bike_id' => 3
            ],
            [
                'nombre' => 'Pieza-04',
                'precio' => 44,
                'bike_id' => 4
            ],
            [
                'nombre' => 'Pieza-05',
                'precio' => 55,
                'bike_id' => 5
            ],
        ];
        
        foreach ($parts as $part) {
            Part::create($part);
        }
    }
}
