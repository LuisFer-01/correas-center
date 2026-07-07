<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Medida;

class MedidaSeeder extends Seeder
{
    public function run(): void
    {
        $medidas = [
            ['nombre' => 'Ancho externo'],
            ['nombre' => 'Longitud'],
            ['nombre' => 'Diámetro interno'],
            ['nombre' => 'Ángulo'],
            ['nombre' => 'Presión máxima'],
            ['nombre' => 'Diámetro exterior'],
        ];

        $orden = 1;
        foreach ($medidas as $medida) {
            Medida::create([
                'nombre' => $medida['nombre'],
                'orden' => $orden++,
                'estado' => 'activo',
            ]);
        }
    }
}
