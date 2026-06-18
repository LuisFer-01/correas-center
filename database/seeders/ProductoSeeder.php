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
            ['nombre' => 'Correas', 'imagen' => '/producto/Correas.jpg'],
            ['nombre' => 'Mangueras', 'imagen' => '/producto/Mangueras.jpg'],
            ['nombre' => 'Rodamientos', 'imagen' => '/producto/Rodamientos.jpg'],
            ['nombre' => 'Retenes, Sellos y O-rings', 'imagen' => '/producto/Retenes_Sellos_Cubetas.jpg'],
            ['nombre' => 'Bandas Transportadoras Pesadas', 'imagen' => '/producto/Bandas_Transportadoras_Pesadas.jpg'],
            ['nombre' => 'Bandas Transportadoras Livianas', 'imagen' => '/producto/Bandas_Transportadoras_Livianas.png'],
            ['nombre' => 'Cadenas', 'imagen' => '/producto/Cadenas.jpg'],
            ['nombre' => 'Poleas', 'imagen' => '/producto/Poleas.jpg'],
            ['nombre' => 'Piñones', 'imagen' => '/producto/Piñones.jpg'],
            ['nombre' => 'Niples, Conexiones y Conectores', 'imagen' => '/producto/Niples_Casquillos_ConectoresHidraulicos.png'],
            ['nombre' => 'Cilindros', 'imagen' => '/producto/Cilindro_Neumatico.jpg'],
            ['nombre' => 'Cangilones', 'imagen' => '/producto/Cangilones.jpg'],
            ['nombre' => 'Cardanes', 'imagen' => '/producto/Cardanes.jpg'],
            ['nombre' => 'Cajas de Comandos', 'imagen' => '/producto/Comandos.jpg'],
            ['nombre' => 'Abrazaderas', 'imagen' => '/producto/Abrazaderas.jpg'],
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
