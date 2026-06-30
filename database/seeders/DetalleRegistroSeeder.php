<?php

namespace Database\Seeders;

use App\Models\DetalleRegistro;
use App\Models\Empresa;
use App\Models\Registro;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

class DetalleRegistroSeeder extends Seeder
{
    public function run(): void
    {
        $empresa = Empresa::first();

        if (!$empresa) {
            $this->command->error("❌ No se encontró la empresa. Ejecuta primero el EmpresaSeeder.");
            return;
        }

        // Filosofía Corporativa (Visión, Misión, Valores)
        $filosofia = Registro::where('identificador', 'filosofia')->first();
        if ($filosofia) {
            $filosofiaItems = [
                [
                    'titulo' => 'Visión',
                    'descripcion' => 'Ser la empresa líder en soluciones industriales, hidráulicas y neumáticas en Bolivia, reconocida por nuestra calidad, servicio técnico especializado y compromiso con el desarrollo industrial del país.',
                    'icono' => 'Eye',
                    'orden' => 1,
                ],
                [
                    'titulo' => 'Misión',
                    'descripcion' => 'Proveer soluciones integrales de transmisión de potencia, sistemas hidráulicos y neumáticos con los más altos estándares de calidad, brindando asesoría técnica especializada y servicio personalizado a nuestros clientes.',
                    'icono' => 'Target',
                    'orden' => 2,
                ],
                [
                    'titulo' => 'Valores',
                    'descripcion' => 'Ética decidida, integridad, compromiso, calidad, innovación, servicio al cliente, responsabilidad social y trabajo en equipo.',
                    'icono' => 'Heart',
                    'orden' => 3,
                ],
            ];
            foreach ($filosofiaItems as $item) {
                DetalleRegistro::updateOrCreate(
                    [
                        'empresa_id' => $empresa->id,
                        'registro_id' => $filosofia->id,
                        'titulo' => $item['titulo'],
                    ],
                    [
                        'descripcion' => $item['descripcion'],
                        'icono' => $item['icono'],
                        'orden' => $item['orden'],
                        'estado' => 'activo',
                    ]
                );
            }
        }

        // ✅ Estadísticas: Sincronizar desde Diferencial
        $this->command->info("🔄 Sincronizando estadísticas desde Diferencial...");
        Artisan::call('diferencials:sync');
        $this->command->info(Artisan::output());

        // ✅ Por Qué Elegirnos: Sincronizar desde PorqueElegirnos
        $this->command->info("🔄 Sincronizando 'Por qué elegirnos'...");
        Artisan::call('porque-elegirnos:sync');
        $this->command->info(Artisan::output());

        // Timeline/Historia
        $timeline = Registro::where('identificador', 'timeline')->first();
        if ($timeline) {
            $timelineItems = [
                [
                    'titulo' => '1998',
                    'subtitulo' => 'Fundación',
                    'descripcion' => 'Correas Center inicia operaciones en La Paz, Bolivia, enfocándose en la venta de correas industriales y servicios de asesoría técnica.',
                    'icono' => 'Calendar',
                    'orden' => 1,
                ],
                [
                    'titulo' => '2005',
                    'subtitulo' => 'Expansión Nacional',
                    'descripcion' => 'Apertura de sucursales en Santa Cruz y Cochabamba, ampliando nuestra cobertura a las principales ciudades del país.',
                    'icono' => 'MapPin',
                    'orden' => 2,
                ],
                [
                    'titulo' => '2010',
                    'subtitulo' => 'Licencia SKF',
                    'descripcion' => 'Obtención de la licencia exclusiva para fabricar sellos SKF en Bolivia, consolidándonos como líderes en el mercado.',
                    'icono' => 'Award',
                    'orden' => 3,
                ],
                [
                    'titulo' => '2015',
                    'subtitulo' => 'Diversificación',
                    'descripcion' => 'Ampliación del catálogo para incluir sistemas hidráulicos, neumáticos y bandas transportadoras, ofreciendo soluciones integrales.',
                    'icono' => 'Package',
                    'orden' => 4,
                ],
                [
                    'titulo' => '2020',
                    'subtitulo' => 'Innovación Tecnológica',
                    'descripcion' => 'Implementación de sistemas digitales para mejorar la atención al cliente y optimizar los procesos internos.',
                    'icono' => 'Zap',
                    'orden' => 5,
                ],
                [
                    'titulo' => '2024',
                    'subtitulo' => 'Líderes del Mercado',
                    'descripcion' => 'Más de 25 años de experiencia, 4 sucursales y más de 1000 clientes satisfechos en todo Bolivia.',
                    'icono' => 'Crown',
                    'orden' => 6,
                ],
            ];
            foreach ($timelineItems as $item) {
                DetalleRegistro::updateOrCreate(
                    [
                        'empresa_id' => $empresa->id,
                        'registro_id' => $timeline->id,
                        'titulo' => $item['titulo'],
                    ],
                    [
                        'subtitulo' => $item['subtitulo'],
                        'descripcion' => $item['descripcion'],
                        'icono' => $item['icono'],
                        'orden' => $item['orden'],
                        'estado' => 'activo',
                    ]
                );
            }
        }

        $this->command->info("✅ Detalles de registro creados/actualizados correctamente");
    }
}
