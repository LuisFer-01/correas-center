<?php

namespace Database\Seeders;

use App\Models\Registro;
use Illuminate\Database\Seeder;

class RegistroSeeder extends Seeder
{
    public function run(): void
    {
        $registros = [
            [
                'identificador' => 'header',
                'nombre' => 'Sobre Nosotros',
                'descripcion' => 'Líderes en soluciones industriales, hidráulicas, neumáticas y transmisión de potencia en Bolivia',
                'orden' => 1,
                'estado' => 'activo',
            ],
            [
                'identificador' => 'introduccion',
                'nombre' => 'Más de 25 Años de Experiencia',
                'descripcion' => 'En <span class="font-semibold text-[#EA0A2A]">Correas Center</span>, nos dedicamos a proveer soluciones integrales de transmisión de potencia, sistemas hidráulicos y neumáticos con los más altos estándares de calidad. Contamos con asesoría técnica especializada y servicio personalizado para nuestros clientes en todo Bolivia.',
                'orden' => 2,
                'estado' => 'activo',
            ],
            [
                'identificador' => 'estadisticas',
                'nombre' => 'Nuestras Estadísticas',
                'descripcion' => 'Cifras que respaldan nuestra trayectoria',
                'orden' => 3,
                'estado' => 'activo',
            ],
            [
                'identificador' => 'filosofia',
                'nombre' => 'Nuestra Filosofía Corporativa',
                'descripcion' => 'Los principios que guían nuestro trabajo diario',
                'orden' => 4,
                'estado' => 'activo',
            ],
            [
                'identificador' => 'porque_elegirnos',
                'nombre' => '¿Por Qué Elegirnos?',
                'descripcion' => 'Compromiso, calidad y experiencia al servicio de tu industria',
                'orden' => 5,
                'estado' => 'activo',
            ],
            [
                'identificador' => 'timeline',
                'nombre' => 'Nuestra Historia',
                'descripcion' => 'Un recorrido por los hitos más importantes de nuestra trayectoria',
                'orden' => 6,
                'estado' => 'activo',
            ],
        ];

        foreach ($registros as $registro) {
            Registro::create($registro);
        }

        $this->command->info("✅ " . count($registros) . " registros creados/actualizados");
    }
}
