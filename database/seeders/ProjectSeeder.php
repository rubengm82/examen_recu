<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $projects = [
            [
                'nombre' => 'Projecte 1',
                'descripcion' => 'Es un proyecto bonito 01',
                'fecha_inicio' => now()->subDays(30),
                'fecha_fin' => now()->subDays(10),
                'user_id' => 1,
            ],
            [
                'nombre' => 'Projecte 2',
                'descripcion' => 'Es un proyecto bonito 02',
                'fecha_inicio' => now()->subDays(24),
                'fecha_fin' => now()->subDays(8),
                'user_id' => 1,
            ],
            [
                'nombre' => 'Projecte 3',
                'descripcion' => 'Es un proyecto bonito 03',
                'fecha_inicio' => now()->subDays(18),
                'fecha_fin' => now()->subDays(6),
                'user_id' => 1,
            ],
            [
                'nombre' => 'Projecte 4',
                'descripcion' => 'Es un proyecto bonito 04',
                'fecha_inicio' => now()->subDays(12),
                'fecha_fin' => now()->subDays(3),
                'user_id' => 1,
            ],
            [
                'nombre' => 'Projecte 5',
                'descripcion' => 'Es un proyecto bonito 05',
                'fecha_inicio' => now()->subDays(6),
                'fecha_fin' => now(),
                'user_id' => 2,
            ],
        ];

        foreach ($projects as $project) {
            Project::create($project);
        }
    }
}
