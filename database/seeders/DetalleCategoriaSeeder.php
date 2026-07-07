<?php

namespace Database\Seeders;

use App\Models\Aplicacion;
use App\Models\Caracteristica;
use App\Models\Categoria;
use App\Models\Composicion;
use App\Models\DetalleCategoria;
use App\Models\Medida;
use Illuminate\Database\Seeder;

class DetalleCategoriaSeeder extends Seeder
{
    public function run(): void
    {
        $categorias = Categoria::all();
        $caracteristicas = Caracteristica::all();
        $medidas = Medida::all();
        $composiciones = Composicion::all();
        $aplicaciones = Aplicacion::all();

        foreach ($categorias as $categoria) {
            // Crear 5-8 detalles por categoría
            $numDetalles = rand(1, 3);

            for ($i = 0; $i < $numDetalles; $i++) {
                DetalleCategoria::create([
                    'categoria_id' => $categoria->id,
                    'caracteristica_id' => $caracteristicas->random()->id,
                    'medida_id' => $medidas->random()->id,
                    'composicion_id' => $composiciones->random()->id,
                    'aplicacion_id' => $aplicaciones->random()->id,
                    'orden' => $i + 1,
                    'estado' => 'activo',
                ]);
            }
        }

        $this->command->info('✅ Detalles de categoría creados correctamente');
    }
}
