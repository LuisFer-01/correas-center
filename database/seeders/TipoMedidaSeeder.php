<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TipoMedida;

class TipoMedidaSeeder extends Seeder
{
    public function run(): void
    {
        $tipos = [
            ['nombre' => 'Milímetro', 'abreviatura' => 'mm', 'representacion' => 'mm'],
            ['nombre' => 'Centímetro', 'abreviatura' => 'cm', 'representacion' => 'cm'],
            ['nombre' => 'Metro', 'abreviatura' => 'm', 'representacion' => 'm'],
            ['nombre' => 'Pulgada', 'abreviatura' => 'in', 'representacion' => '"'],
            ['nombre' => 'Grado', 'abreviatura' => 'deg', 'representacion' => '°'],
            ['nombre' => 'Libra por pulgada cuadrada', 'abreviatura' => 'psi', 'representacion' => 'psi'],
            ['nombre' => 'Bar', 'abreviatura' => 'bar', 'representacion' => 'bar'],
        ];

        foreach ($tipos as $tipo) {
            TipoMedida::create([
                ...$tipo,
                'estado' => 'activo',
            ]);
        }
    }
}
