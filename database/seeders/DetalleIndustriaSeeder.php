<?php

namespace Database\Seeders;

use App\Models\Categoria;
use App\Models\DetalleIndustria;
use App\Models\Industria;
use App\Models\Servicio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DetalleIndustriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $industrias = Industria::all();
        $categorias = Categoria::all();
        $servicios = Servicio::all();

        foreach ($industrias as $industria) {
            // Asociar categorías aleatorias
            foreach ($categorias->random(3) as $categoria) {
                DetalleIndustria::create([
                    'industria_id' => $industria->id,
                    'grupo' => 'Categoria',
                    'campo_id' => $categoria->id,
                    'estado' => 'activo',
                ]);
            }

            // Asociar servicios aleatorios
            foreach ($servicios->random(2) as $servicio) {
                DetalleIndustria::create([
                    'industria_id' => $industria->id,
                    'grupo' => 'Servicio',
                    'campo_id' => $servicio->id,
                    'estado' => 'activo',
                ]);
            }
        }
    }
}
