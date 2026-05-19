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
                'descripcion' => 'Descripcion projective 1',
                'fecha_inicio' => now()->subDays(30),
                'fecha_fin' => now()->subDays(10),
                'user_id' => 1,
            ],
            [
                'nombre' => 'Projecte 2',
                'descripcion' => 'Descripcion projective 2',
                'fecha_inicio' => now()->subDays(24),
                'fecha_fin' => now()->subDays(8),
                'user_id' => 1,
            ],
            [
                'nombre' => 'Projecte 3',
                'descripcion' => 'Descripcion projective 3',
                'fecha_inicio' => now()->subDays(18),
                'fecha_fin' => now()->subDays(6),
                'user_id' => 1,
            ],
            [
                'nombre' => 'Projecte 4',
                'descripcion' => 'Descripcion projective 4',
                'fecha_inicio' => now()->subDays(12),
                'fecha_fin' => now()->subDays(3),
                'user_id' => 1,
            ],
            [
                'nombre' => 'Projecte 5',
                'descripcion' => 'Descripcion projective 5',
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
