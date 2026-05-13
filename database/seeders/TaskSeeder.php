<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TaskSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        DB::table("tasks")->insert([
            [
                "descripcion" => "Descripcion projecto 1",
                "project_id" => 1,
            ],
            [
                "descripcion" => "Descripcion projecto 2",
                "project_id" => 1,
            ],
            [
                "descripcion" => "Descripcion projecto 3",
                "project_id" => 1,
            ],
        ]);
    }
}
