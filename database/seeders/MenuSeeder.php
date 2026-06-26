<?php

namespace Database\Seeders;

use App\Models\Industria;
use App\Models\Menu;
use App\Models\Producto;
use App\Models\Servicio;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Menús de Productos
        $productos = Producto::all();
        $orden = 1;
        foreach ($productos as $producto) {
            Menu::create([
                'empresa_id'=> 1,
                'grupo' => 'Producto',
                'campo_id' => $producto->id,
                'ruta' => '/products/' . $producto->slug,
                'icon' => 'fa-box',
                'orden'=> $orden++,
                'estado' => 'activo',
            ]);
        }

        // Menús de Aplicaciones
        $industrias = Industria::all();
        $orden = 1;
        foreach ($industrias as $industria) {
            Menu::create([
                'empresa_id'=> 1,
                'grupo' => 'Aplicacion',
                'campo_id' => $industria->id,
                'ruta' => '/applications/' . $industria->slug,
                'icon' => 'fa-industry',
                'orden'=> $orden++,
                'estado' => 'activo',
            ]);
        }

        // Menús de Servicios
        $servicios = Servicio::all();
        $orden = 1;
        foreach ($servicios as $servicio) {
            Menu::create([
                'empresa_id'=> 1,
                'grupo' => 'Servicio',
                'campo_id' => $servicio->id,
                'ruta' => '/services/' . Str::slug($servicio->nombre),
                'icon' => 'fa-wrench',
                'orden'=> $orden++,
                'estado' => 'activo',
            ]);
        }
    }
}
