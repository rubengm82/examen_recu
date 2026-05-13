<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProjectSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        DB::table("projects")->insert([
            [
                "nombre" => "Projecte 1",
                "descripcion" => "Descripcion projecto 1",
                "fecha_inicio" => Date::now(),
                "fecha_fin" => Date::now(),

                "user_id" => 1,
            ],
            [
                "nombre" => "Projecte 2",
                "descripcion" => "Descripcion projecto 2",
                "fecha_inicio" => Date::now(),
                "fecha_fin" => Date::now(),

                "user_id" => 1,
            ],
            [
                "nombre" => "Projecte 3",
                "descripcion" => "Descripcion projecto 3",
                "fecha_inicio" => Date::now(),
                "fecha_fin" => Date::now(),

                "user_id" => 1,
            ],
            [
                "nombre" => "Projecte 4",
                "descripcion" => "Descripcion projecto 4",
                "fecha_inicio" => Date::now(),
                "fecha_fin" => Date::now(),

                "user_id" => 1,
            ],            [
                "nombre" => "Projecte 5",
                "descripcion" => "Descripcion projecto 5",
                "fecha_inicio" => Date::now(),
                "fecha_fin" => Date::now(),

                "user_id" => 2,
            ],
        ]);
    }
}
