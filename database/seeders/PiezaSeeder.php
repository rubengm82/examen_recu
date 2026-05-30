<?php

namespace Database\Seeders;

use App\Models\Pieza;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PiezaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $piezas = [
            [
                'nombre' => 'Pieza-01',
                'precio' => 10,
                'bike_id' => 1
            ],
            [
                'nombre' => 'Pieza-02',
                'precio' => 11,
                'bike_id' => 1
            ],
            [
                'nombre' => 'Pieza-03',
                'precio' => 11,
                'bike_id' => 1
            ],
            [
                'nombre' => 'Pieza-04',
                'precio' => 20,
                'bike_id' => 2
            ],
            [
                'nombre' => 'Pieza-05',
                'precio' => 22,
                'bike_id' => 2
            ],
            [
                'nombre' => 'Pieza-06',
                'precio' => 33,
                'bike_id' => 3
            ],
        ];
        
        foreach ($piezas as $pieza) {
            Pieza::create($pieza);
        }
    }
}
