<?php

namespace Database\Seeders;

use App\Models\Categoria;
use App\Models\DetalleMenu;
use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DetalleMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Obtener todos los menús de tipo Producto
        $menusProductos = Menu::where('grupo', 'Producto')
            ->where('estado', 'activo')
            ->orderBy('campo_id')
            ->get();

        foreach ($menusProductos as $menu) {
            // Obtener las categorías del producto asociado, ordenadas
            $categorias = Categoria::where('producto_id', $menu->campo_id)
                ->where('estado', 'activo')
                ->orderBy('orden')
                ->get();

            $orden = 1;
            foreach ($categorias as $categoria) {
                DetalleMenu::create([
                    'menu_id' => $menu->id,
                    'ruta' => '/products/' . $categoria->producto->slug . '/' . $categoria->slug,
                    'orden' => $orden++,
                    'estado' => 'activo',
                ]);
            }
        }

        // Opcional: Crear submenús para Aplicaciones (si aplica)
        $menusAplicaciones = Menu::where('grupo', 'Aplicacion')
            ->where('estado', 'activo')
            ->orderBy('campo_id')
            ->get();

        foreach ($menusAplicaciones as $menu) {
            // Las aplicaciones no tienen submenús por defecto, pero puedes agregarlos aquí si es necesario
            // Por ahora, dejamos vacío o agregamos un placeholder
        }

        // Opcional: Crear submenús para Servicios (si aplica)
        $menusServicios = Menu::where('grupo', 'Servicio')
            ->where('estado', 'activo')
            ->orderBy('campo_id')
            ->get();

        foreach ($menusServicios as $menu) {
            // Los servicios no tienen submenús por defecto, pero puedes agregarlos aquí si es necesario
            // Por ahora, dejamos vacío o agregamos un placeholder
        }

        $this->command->info("✅ Submenús creados correctamente");
    }
}
