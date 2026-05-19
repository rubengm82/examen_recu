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
                'descripcion' => 'Descripcion tarefa 1',
                'completada' => false,
                'project_id' => 1,
            ],
            [
                'descripcion' => 'Descripcion tarefa 2',
                'completada' => true,
                'project_id' => 1,
            ],
            [
                'descripcion' => 'Descripcion tarefa 3',
                'completada' => false,
                'project_id' => 1,
            ],
        ];

        foreach ($tasks as $task) {
            Task::create($task);
        }
    }
}
