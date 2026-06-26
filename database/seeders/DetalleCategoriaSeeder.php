<?php

namespace Database\Seeders;

use App\Models\Aplicacion;
use App\Models\Caracteristica;
use App\Models\Categoria;
use App\Models\Composicion;
use App\Models\DetalleCategoria;
use App\Models\GamaProducto;
use App\Models\Marca;
use App\Models\Medida;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DetalleCategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categorias = Categoria::all();
        $marcas = Marca::all();
        $gamas = GamaProducto::all();
        $caracteristicas = Caracteristica::all();
        $medidas = Medida::all();
        $composiciones = Composicion::all();
        $aplicaciones = Aplicacion::all();

        // Crear relaciones de ejemplo
        foreach ($categorias as $index => $categoria) {
            DetalleCategoria::create([
                'categoria_id' => $categoria->id,
                'marca_id' => $marcas->random()->id,
                'gama_producto_id' => $gamas->random()->id,
                'caracteristica_id' => $caracteristicas->random()->id,
                'medida_id' => $medidas->random()->id,
                'composicion_id' => $composiciones->random()->id,
                'aplicacion_id'=> $aplicaciones->random()->id,
                'orden' => $index + 1,
                'estado' => 'activo',
            ]);
        }
    }
}
