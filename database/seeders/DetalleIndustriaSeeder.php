<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DetalleIndustria;
use App\Models\Industria;
use App\Models\Categoria;
use App\Models\Servicio;

class DetalleIndustriaSeeder extends Seeder
{
    public function run(): void
    {
        $industrias = Industria::all();
        $categorias = Categoria::all();
        $servicios = Servicio::all();

        $orden = 1;
        foreach ($industrias as $industria) {
            // Asociar categorías aleatorias con orden
            foreach ($categorias->random(min(3, $categorias->count())) as $categoria) {
                DetalleIndustria::create([
                    'industria_id' => $industria->id,
                    'grupo' => 'Categoria',
                    'campo_id' => $categoria->id,
                    'orden' => $orden++,
                    'estado' => 'activo',
                ]);
            }

            // Asociar servicios aleatorios con orden
            foreach ($servicios->random(min(2, $servicios->count())) as $servicio) {
                DetalleIndustria::create([
                    'industria_id' => $industria->id,
                    'grupo' => 'Servicio',
                    'campo_id' => $servicio->id,
                    'orden' => $orden++,
                    'estado' => 'activo',
                ]);
            }
        }
    }
}
