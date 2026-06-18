<?php

namespace Database\Seeders;

use App\Models\DetalleProducto;
use App\Models\Marca;
use App\Models\Producto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DetalleProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $productos = Producto::all();
        $marcas = Marca::all();

        // Asociar marcas a productos (ejemplo simplificado)
        foreach ($productos as $producto) {
            foreach ($marcas as $marca) {
                DetalleProducto::create([
                    'producto_id' => $producto->id,
                    'marca_id' => $marca->id,
                    'estado' => 'activo',
                ]);
            }
        }
    }
}
