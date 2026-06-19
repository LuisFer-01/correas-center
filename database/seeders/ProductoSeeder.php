<?php

namespace Database\Seeders;

use App\Models\Producto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $productos = [
            ['nombre' => 'Correas', 'imagen' => 'storage/producto/Correas.jpg'],
            ['nombre' => 'Mangueras', 'imagen' => 'storage/producto/Mangueras.jpg'],
            ['nombre' => 'Rodamientos', 'imagen' => 'storage/producto/Rodamientos.jpg'],
            ['nombre' => 'Retenes, Sellos y O-rings', 'imagen' => 'storage/producto/Retenes_Sellos_Cubetas.png'],
            ['nombre' => 'Bandas Transportadoras Pesadas', 'imagen' => 'storage/producto/Bandas_Transportadoras_Pesadas.jpg'],
            ['nombre' => 'Bandas Transportadoras Livianas', 'imagen' => 'storage/producto/Bandas_Transportadoras_Livianas.png'],
            ['nombre' => 'Cadenas', 'imagen' => 'storage/producto/Cadenas.jpg'],
            ['nombre' => 'Poleas', 'imagen' => 'storage/producto/Poleas.jpg'],
            ['nombre' => 'Piñones', 'imagen' => 'storage/producto/Piñones.jpg'],
            ['nombre' => 'Niples, Conexiones y Conectores', 'imagen' => 'storage/producto/Niples_Casquillos_ConectoresHidraulicos.png'],
            ['nombre' => 'Cilindros', 'imagen' => 'storage/producto/Cilindro_Neumatico.jpg'],
            ['nombre' => 'Cangilones', 'imagen' => 'storage/producto/Cangilon.jpg'],
            ['nombre' => 'Cardanes', 'imagen' => 'storage/producto/Cardanes.jpg'],
            ['nombre' => 'Cajas de Comandos', 'imagen' => 'storage/producto/Comandos.jpg'],
            ['nombre' => 'Abrazaderas', 'imagen' => 'storage/producto/Abrazaderas.jpg'],
        ];

        $orden = 1;
        foreach ($productos as $producto) {
            Producto::create([
                'nombre' => $producto['nombre'],
                'slug' => Str::slug($producto['nombre']),
                'imagen' => $producto['imagen'],
                'orden' => $orden++,
                'estado' => 'activo',
            ]);
        }
    }
}
