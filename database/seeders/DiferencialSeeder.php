<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Diferencial;

class DiferencialSeeder extends Seeder
{
    public function run(): void
    {
        $diferenciales = [
            [
                'titulo' => '+25 Años',
                'subtitulo' => 'Experiencia Comprobada',
                'descripcion' => 'Más de dos décadas liderando el mercado industrial boliviano',
                'icon' => 'Clock',
            ],
            [
                'titulo' => 'SKF',
                'subtitulo' => 'Licencia Exclusiva',
                'descripcion' => 'Únicos autorizados para fabricar sellos SKF en Bolivia',
                'icon' => 'Award',
            ],
            [
                'titulo' => '10,000+',
                'subtitulo' => 'Productos en Stock',
                'descripcion' => 'Amplio inventario para entregas inmediatas',
                'icon' => 'Package',
            ],
            [
                'titulo' => '24/7',
                'subtitulo' => 'Soporte Técnico',
                'descripcion' => 'Asesoría especializada cuando la necesites',
                'icon' => 'HeadphonesIcon',
            ],
            [
                'titulo' => '4',
                'subtitulo' => 'Sucursales',
                'descripcion' => 'Cobertura nacional para estar cerca de ti',
                'icon' => 'MapPin',
            ],
            [
                'titulo' => '100%',
                'subtitulo' => 'Atención Personalizada',
                'descripcion' => 'Soluciones a medida para cada cliente',
                'icon' => 'Users',
            ],
        ];

        $orden = 1;
        foreach ($diferenciales as $diferencial) {
            Diferencial::create([
                ...$diferencial,
                'orden' => $orden++,
                'estado' => 'activo',
            ]);
        }
    }
}
