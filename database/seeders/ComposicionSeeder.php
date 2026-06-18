<?php

namespace Database\Seeders;

use App\Models\Composicion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ComposicionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $composiciones = [
            ['nombre' => 'Compuesto', 'descripcion' => 'Natural rubber/SBR'],
            ['nombre' => 'Cordón', 'descripcion' => 'Poliéster'],
            ['nombre' => 'Cubierta', 'descripcion' => 'Mezcla de algodón/poliéster'],
        ];

        $orden = 1;
        foreach ($composiciones as $comp) {
            Composicion::create([
                'nombre' => $comp['nombre'],
                'descripcion' => $comp['descripcion'],
                'orden' => $orden++,
                'estado' => 'activo',
            ]);
        }
    }
}
