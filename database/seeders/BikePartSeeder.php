<?php

namespace Database\Seeders;

use App\Models\Bike;
use App\Models\Part;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BikePartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $assignments = [
            // Honda CBR600RR (id 1) → Pieza 1, 3, 5
            1 => [1, 3, 5],
            // Yamaha MT-07 (id 2) → Pieza 2, 4
            2 => [2, 4],
            // Kawasaki Ninja 400 (id 3) → Pieza 1, 2, 6
            3 => [1, 2, 6],
        ];
        
        foreach ($assignments as $bikeId => $partIds) {
            Bike::find($bikeId)->parts()->sync($partIds);
        }
    }
}
