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
                'nombre' => 'Pieza 1',
            ],
            [
                'nombre' => 'Pieza 2',
            ],
            [
                'nombre' => 'Pieza 3',
            ],
            [
                'nombre' => 'Pieza 4',
            ],
            [
                'nombre' => 'Pieza 5',
            ],
            [
                'nombre' => 'Pieza 6',
            ],
            [
                'nombre' => 'Pieza 7',
            ],
            [
                'nombre' => 'Pieza 8',
            ],
            [
                'nombre' => 'Pieza 9',
            ],
            [
                'nombre' => 'Pieza 10',
            ],
        ];

        foreach ($parts as $part) {
            Part::create($part);
        }
    }
}
