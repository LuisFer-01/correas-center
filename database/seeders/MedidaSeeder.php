<?php

namespace Database\Seeders;

use App\Models\Medida;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MedidaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $medidas = [
            ['nombre' => 'Ancho superior', 'medida' => 'pulgadas'],
            ['nombre' => 'Longitud interior', 'medida' => 'pulgadas'],
            ['nombre' => 'Espesor', 'medida' => 'pulgadas'],
            ['nombre' => 'Ángulo', 'medida' => 'grados'],
        ];

        $orden = 1;
        foreach ($medidas as $med) {
            Medida::create([
                'nombre' => $med['nombre'],
                'medida' => $med['medida'],
                'orden' => $orden++,
                'estado' => 'activo',
            ]);
        }
    }
}
