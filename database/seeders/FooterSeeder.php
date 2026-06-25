<?php

namespace Database\Seeders;

use App\Models\Empresa;
use App\Models\Footer;
use App\Models\Industria;
use App\Models\Producto;
use App\Models\Servicio;
use Illuminate\Database\Seeder;

class FooterSeeder extends Seeder
{
    public function run(): void
    {
        $empresa = Empresa::first();

        if (!$empresa) {
            $this->command->error(" No se encontró la empresa. Ejecuta primero el EmpresaSeeder.");
            return;
        }

        // Productos (primeros 7)
        $productos = Producto::where('estado', 'activo')->orderBy('orden')->limit(7)->get();
        foreach ($productos as $index => $producto) {
            Footer::create([
                'empresa_id' => $empresa->id,
                'tipo' => 'producto',
                'campo_id' => $producto->id,
                'orden' => $index + 1,
                'mostrar' => true,
                'estado' => 'activo',
            ]);
        }

        // Industrias (primeras 5)
        $industrias = Industria::where('estado', 'activo')->orderBy('orden')->limit(5)->get();
        foreach ($industrias as $index => $industria) {
            Footer::create([
                'empresa_id' => $empresa->id,
                'tipo' => 'industria',
                'campo_id' => $industria->id,
                'orden' => $index + 1,
                'mostrar' => true,
                'estado' => 'activo',
            ]);
        }

        // Servicios (primeros 4)
        $servicios = Servicio::where('estado', 'activo')->limit(4)->get();
        foreach ($servicios as $index => $servicio) {
            Footer::create([
                'empresa_id' => $empresa->id,
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
            ['titulo' => 'TikTok', 'url' => 'https://www.tiktok.com/@correas.center.ltda', 'icono' => 'faTiktok', 'orden' => 3],
            ['titulo' => 'YouTube', 'url' => 'https://www.youtube.com/@CorreasCenterLtda', 'icono' => 'faYoutube', 'orden' => 4],
        ];

        foreach ($redesSociales as $red) {
            Footer::create([
                'empresa_id' => $empresa->id,
                'tipo' => 'red_social',
                'titulo' => $red['titulo'],
                'url' => $red['url'],
                'icono' => $red['icono'],
                'orden' => $red['orden'],
                'mostrar' => true,
                'estado' => 'activo',
            ]);
        }

        $this->command->info("✅ Footer creado correctamente con " . Footer::count() . " elementos");
    }
}
