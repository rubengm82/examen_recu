<?php

namespace Database\Seeders;

use App\Models\Mensaje;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MensajeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mensajes = [
            [
                'remitente_id' => 1,
                'destinatario_id' => 2,
                'asunto' => 'Asunto-01',
                'mensaje' => 'Mensaje-01',
                'leido' => false,
            ],
            [
                'remitente_id' => 1,
                'destinatario_id' => 3,
                'asunto' => 'Asunto-02',
                'mensaje' => 'Mensaje-02',
                'leido' => false,
            ],
            [
                'remitente_id' => 1,
                'destinatario_id' => 4,
                'asunto' => 'Asunto-03',
                'mensaje' => 'Mensaje-03',
                'leido' => true,
            ],
            [
                'remitente_id' => 2,
                'destinatario_id' => 1,
                'asunto' => 'Asunto-04',
                'mensaje' => 'Mensaje-04',
                'leido' => false,
            ],
            [
                'remitente_id' => 2,
                'destinatario_id' => 3,
                'asunto' => 'Asunto-05',
                'mensaje' => 'Mensaje-05',
                'leido' => true,
            ],
        ];
        
        foreach ($mensajes as $mensaje) {
            Mensaje::create($mensaje);
        }
    }
}
