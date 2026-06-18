<?php

namespace Database\Seeders;

use App\Models\Categoria;
use App\Models\DetalleMenu;
use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DetalleMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $menus = Menu::where('grupo', 'Producto')->get();
        $categorias = Categoria::all();

        foreach ($menus as $menu) {
            $productoCategorias = $categorias->where('producto_id', $menu->campo_id);

            foreach ($productoCategorias as $categoria) {
                DetalleMenu::create([
                    'menu_id' => $menu->id,
                    'ruta' => '/producto/' . Str::slug($categoria->producto->nombre) . '/' . $categoria->slug,
                    'estado' => 'activo',
                ]);
            }
        }
    }
}
