<?php

namespace Database\Seeders;

use App\Models\GamaProducto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GamaProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $gamas = [
            ['nombre' => 'Serie A'],
            ['nombre' => 'Serie B'],
            ['nombre' => 'Serie C'],
            ['nombre' => 'Serie D'],
        ];

        $orden = 1;
        foreach ($gamas as $gama) {
            GamaProducto::create([
                'nombre' => $gama['nombre'],
                'orden' => $orden++,
                'estado' => 'activo',
            ]);
        }
    }
}
