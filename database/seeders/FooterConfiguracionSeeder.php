<?php

namespace Database\Seeders;

use App\Models\FooterConfiguracion;
use Illuminate\Database\Seeder;

class FooterConfiguracionSeeder extends Seeder
{
    public function run(): void
    {
        // Productos (primeros 7)
        $productos = \App\Models\Producto::where('estado', 'activo')->orderBy('orden')->limit(7)->get();
        foreach ($productos as $index => $producto) {
            FooterConfiguracion::create([
                'tipo' => 'producto',
                'campo_id' => $producto->id,
                'orden' => $index + 1,
                'mostrar' => true,
                'estado' => 'activo',
            ]);
        }

        // Industrias (primeras 5)
        $industrias = \App\Models\Industria::where('estado', 'activo')->orderBy('orden')->limit(5)->get();
        foreach ($industrias as $index => $industria) {
            FooterConfiguracion::create([
                'tipo' => 'industria',
                'campo_id' => $industria->id,
                'orden' => $index + 1,
                'mostrar' => true,
                'estado' => 'activo',
            ]);
        }

        // Servicios (primeros 4)
        $servicios = \App\Models\Servicio::where('estado', 'activo')->limit(4)->get();
        foreach ($servicios as $index => $servicio) {
            FooterConfiguracion::create([
                'tipo' => 'servicio',
                'campo_id' => $servicio->id,
                'orden' => $index + 1,
                'mostrar' => true,
                'estado' => 'activo',
            ]);
        }

        // Redes Sociales
        $redesSociales = [
            ['titulo' => 'Facebook', 'url' => 'https://www.facebook.com/CorreasCenterLtda', 'icono' => 'faFacebookF', 'orden' => 1],
            ['titulo' => 'Instagram', 'url' => 'https://www.instagram.com/correascenterltda', 'icono' => 'faInstagram', 'orden' => 2],
            ['titulo' => 'TikTok', 'url' => '#', 'icono' => 'faTiktok', 'orden' => 3],
            ['titulo' => 'YouTube', 'url' => '#', 'icono' => 'faYoutube', 'orden' => 4],
        ];

        foreach ($redesSociales as $index => $red) {
            FooterConfiguracion::create([
                'tipo' => 'red_social',
                'titulo' => $red['titulo'],
                'url' => $red['url'],
                'icono' => $red['icono'],
                'orden' => $red['orden'],
                'mostrar' => true,
                'estado' => 'activo',
            ]);
        }
    }
}
