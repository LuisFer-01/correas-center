<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Medida;
use App\Models\TipoMedida;

class MedidaSeeder extends Seeder
{
    public function run(): void
    {
        $tipos = TipoMedida::all()->keyBy('nombre');

        $medidas = [
            ['nombre' => 'Ancho externo', 'tipo' => 'Milímetro', 'magnitud' => null],
            ['nombre' => 'Longitud', 'tipo' => 'Milímetro', 'magnitud' => null],
            ['nombre' => 'Diámetro interno', 'tipo' => 'Pulgada', 'magnitud' => null],
            ['nombre' => 'Ángulo', 'tipo' => 'Grado', 'magnitud' => null],
            ['nombre' => 'Presión máxima', 'tipo' => 'Libra por pulgada cuadrada', 'magnitud' => 3000],
            ['nombre' => 'Diámetro exterior', 'tipo' => 'Milímetro', 'magnitud' => 40.00],
        ];

        $orden = 1;
        foreach ($medidas as $medida) {
            Medida::create([
                'tipo_medida_id' => $tipos[$medida['tipo']]->id,
                'nombre' => $medida['nombre'],
                'magnitud' => $medida['magnitud'],
                'orden' => $orden++,
                'estado' => 'activo',
            ]);
        }
    }
}
