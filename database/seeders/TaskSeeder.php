<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $tasks = [
            [
                'descripcion' => 'Tarea 1',
                'completada' => false,
                'project_id' => 1,
            ],
            [
                'descripcion' => 'Tarea 2',
                'completada' => true,
                'project_id' => 1,
            ],
            [
                'descripcion' => 'Tarea 3',
                'completada' => false,
                'project_id' => 1,
            ],
            [
                'descripcion' => 'Tarea 4',
                'completada' => false,
                'project_id' => 1,
            ],
            [
                'descripcion' => 'Tarea 1',
                'completada' => false,
                'project_id' => 2,
            ],
            [
                'descripcion' => 'Tarea 2',
                'completada' => true,
                'project_id' => 2,
            ],
            [
                'descripcion' => 'Tarea 3',
                'completada' => true,
                'project_id' => 2,
            ],
            [
                'descripcion' => 'Tarea 1',
                'completada' => false,
                'project_id' => 3,
            ],
            [
                'descripcion' => 'Tarea 2',
                'completada' => true,
                'project_id' => 3,
            ],
        ];

        foreach ($tasks as $task) {
            Task::create($task);
        }
    }
}
