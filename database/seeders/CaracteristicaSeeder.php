<?php

namespace Database\Seeders;

use App\Models\Caracteristica;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CaracteristicaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $caracteristicas = [
            ['nombre' => 'Construcción UniMatch', 'descripcion' => 'Rendimiento consistente en múltiples unidades de correa en V - asegura todas las correas medirán dentro normas de coincidencia ARPM'],
            ['nombre' => 'Dual Branding', 'descripcion' => 'Secciones A & B de doble marca con clásica y números de pieza de FHP - reduce el inventario al permitirle suspender 4L y 5L'],
            ['nombre' => 'Aceite y resistente al calor', 'descripcion' => 'Durabilidad en ambientes difíciles'],
        ];

        $orden = 1;
        foreach ($caracteristicas as $car) {
            Caracteristica::create([
                'nombre' => $car['nombre'],
                'descripcion' => $car['descripcion'],
                'orden' => $orden++,
                'estado' => 'activo',
            ]);
        }
    }
}
