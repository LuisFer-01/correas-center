<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CaracteristicaInfraestructura;
use App\Models\CapacidadInfraestructura;

class InfraestructuraSeeder extends Seeder
{
    public function run(): void
    {
        // Características principales
        $caracteristicas = [
            [
                'titulo' => 'Planta de Fabricación',
                'descripcion' => 'Instalaciones modernas equipadas con tecnología de punta para la fabricación de sellos SKF',
                'stats' => '500m²',
                'icon' => 'Factory',
            ],
            [
                'titulo' => 'Centro de Distribución',
                'descripcion' => 'Almacén estratégico con más de 10,000 productos en stock para entregas inmediatas',
                'stats' => '10,000+ productos',
                'icon' => 'Truck',
            ],
            [
                'titulo' => 'Equipo Técnico',
                'descripcion' => 'Personal altamente capacitado con certificaciones internacionales',
                'stats' => '+25 técnicos',
                'icon' => 'Users',
            ],
            [
                'titulo' => 'Certificaciones',
                'descripcion' => 'Licencia exclusiva SKF y certificaciones de calidad internacionales',
                'stats' => 'SKF Autorizado',
                'icon' => 'Award',
            ],
        ];

        $orden = 1;
        foreach ($caracteristicas as $caracteristica) {
            CaracteristicaInfraestructura::create([
                ...$caracteristica,
                'orden' => $orden++,
                'estado' => 'activo',
            ]);
        }

        // Capacidades
        $capacidades = [
            ['nombre' => 'Fabricación de sellos SKF a medida', 'icon' => 'CheckCircle2'],
            ['nombre' => 'Prensado de mangueras hidráulicas', 'icon' => 'CheckCircle2'],
            ['nombre' => 'Reparación de cilindros industriales', 'icon' => 'CheckCircle2'],
            ['nombre' => 'Empalmes y montaje de bandas transportadoras', 'icon' => 'CheckCircle2'],
            ['nombre' => 'Asesoría técnica especializada', 'icon' => 'CheckCircle2'],
            ['nombre' => 'Entregas a todo Bolivia', 'icon' => 'CheckCircle2'],
        ];

        $orden = 1;
        foreach ($capacidades as $capacidad) {
            CapacidadInfraestructura::create([
                ...$capacidad,
                'orden' => $orden++,
                'estado' => 'activo',
            ]);
        }
    }
}
