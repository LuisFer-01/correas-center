<?php

namespace Database\Seeders;

use App\Models\DetalleRegistro;
use App\Models\Empresa;
use App\Models\Registro;
use Illuminate\Database\Seeder;

class DetalleRegistroSeeder extends Seeder
{
    public function run(): void
    {
        $empresa = Empresa::first();

        if (!$empresa) {
            $this->command->error("❌ No se encontró la empresa. Ejecuta primero el EmpresaSeeder.");
            return;
        }

        // Estadísticas
        $estadisticas = Registro::where('identificador', 'estadisticas')->first();
        if ($estadisticas) {
            $stats = [
                ['titulo' => '+25 Años', 'subtitulo' => 'De experiencia en el mercado boliviano', 'icono' => 'Clock', 'orden' => 1],
                ['titulo' => '1000+', 'subtitulo' => 'Clientes satisfechos en todo el país', 'icono' => 'Users', 'orden' => 2],
                ['titulo' => 'SKF', 'subtitulo' => 'Fabricante autorizado exclusivo', 'icono' => 'Award', 'orden' => 3],
            ];
            foreach ($stats as $stat) {
                DetalleRegistro::create([
                    'empresa_id' => $empresa->id,
                    'registro_id' => $estadisticas->id,
                    ...$stat,
                    'estado' => 'activo',
                ]);
            }
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
                DetalleRegistro::create([
                    'empresa_id' => $empresa->id,
                    'registro_id' => $filosofia->id,
                    ...$item,
                    'estado' => 'activo',
                ]);
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
                DetalleRegistro::create([
                    'empresa_id' => $empresa->id,
                    'registro_id' => $porque->id,
                    ...$item,
                    'estado' => 'activo',
                ]);
            }
        }

        $this->command->info("✅ Detalles de registro creados correctamente");
    }
}
