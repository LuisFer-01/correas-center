<?php

namespace Database\Seeders;

use App\Models\FooterEstadistica;
use Illuminate\Database\Seeder;

class FooterEstadisticaSeeder extends Seeder
{
    public function run(): void
    {
        $datos = [
            ['titulo' => '+25 Años', 'subtitulo' => 'Experiencia Comprobada', 'icono' => 'Clock', 'orden' => 1],
            ['titulo' => '1000+', 'subtitulo' => 'Clientes Satisfechos', 'icono' => 'Users', 'orden' => 2],
            ['titulo' => 'SKF', 'subtitulo' => 'Fabricante Autorizado', 'icono' => 'Award', 'orden' => 3],
        ];

        foreach ($datos as $dato) {
            FooterEstadistica::create([
                'titulo' => $dato['titulo'],
                'subtitulo' => $dato['subtitulo'],
                'icono' => $dato['icono'],
                'orden' => $dato['orden'],
                'mostrar' => true,
                'estado' => 'activo',
            ]);
        }
    }
}
