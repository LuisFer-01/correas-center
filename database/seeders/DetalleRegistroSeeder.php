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
            $this->command->error(" No se encontró la empresa. Ejecuta primero el EmpresaSeeder.");
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

        // Por Qué Elegirnos
        $porque = Registro::where('identificador', 'porque_elegirnos')->first();
        if ($porque) {
            $porqueItems = [
                ['titulo' => 'Calidad Garantizada', 'descripcion' => 'Productos de las mejores marcas internacionales con garantía de calidad', 'icono' => 'CheckCircle2', 'orden' => 1],
                ['titulo' => 'Asesoría Técnica Especializada', 'descripcion' => 'Equipo técnico capacitado para brindarte la mejor solución', 'icono' => 'CheckCircle2', 'orden' => 2],
                ['titulo' => 'Cobertura Nacional', 'descripcion' => '4 sucursales estratégicamente ubicadas para atenderte mejor', 'icono' => 'CheckCircle2', 'orden' => 3],
                ['titulo' => 'Entregas Rápidas', 'descripcion' => 'Amplio inventario para entregas inmediatas en todo Bolivia', 'icono' => 'CheckCircle2', 'orden' => 4],
                ['titulo' => 'Fabricante Autorizado SKF', 'descripcion' => 'Únicos autorizados para fabricar sellos SKF en Bolivia', 'icono' => 'CheckCircle2', 'orden' => 5],
                ['titulo' => 'Servicio Personalizado', 'descripcion' => 'Soluciones a medida para cada cliente y cada industria', 'icono' => 'CheckCircle2', 'orden' => 6],
            ];
            foreach ($porqueItems as $item) {
                DetalleRegistro::updateOrCreate(
                    [
                        'empresa_id' => $empresa->id,
                        'registro_id' => $porque->id,
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

        // ✅ Estadísticas: Sincronizar desde Diferencial usando el comando artisan
        $this->command->info("🔄 Sincronizando estadísticas desde Diferencial...");
        Artisan::call('diferencials:sync');
        $this->command->info(Artisan::output());

        $this->command->info("✅ Detalles de registro creados/sincronizados correctamente");
    }
}
