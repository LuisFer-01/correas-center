<?php

namespace App\Console\Commands;

use App\Models\DetalleRegistro;
use App\Models\Empresa;
use App\Models\PorqueElegirnos;
use App\Models\Registro;
use Illuminate\Console\Command;

class SyncPorqueElegirnosToDetalleRegistros extends Command
{
    protected $signature = 'porque-elegirnos:sync';
    protected $description = 'Sincroniza todos los elementos de "Por qué elegirnos" hacia la tabla detalle_registros';

    public function handle(): int
    {
        $this->info('🔄 Iniciando sincronización de "Por qué elegirnos"...');

        $empresa = Empresa::first();
        if (!$empresa) {
            $this->error(' No se encontró la empresa. Ejecuta primero el EmpresaSeeder.');
            return Command::FAILURE;
        }

        $registro = Registro::where('identificador', 'porque_elegirnos')->first();
        if (!$registro) {
            $this->error('❌ No se encontró el registro con identificador "porque_elegirnos". Ejecuta primero el RegistroSeeder.');
            return Command::FAILURE;
        }

        $items = PorqueElegirnos::all();
        $this->info(" Encontrados {$items->count()} elementos para sincronizar.");

        $creados = 0;
        $actualizados = 0;
        $eliminados = 0;

        foreach ($items as $item) {
            // Buscar si ya existe un DetalleRegistro para este item
            $detalleRegistro = DetalleRegistro::where('registro_id', $registro->id)
                ->where('empresa_id', $item->empresa_id)
                ->where('titulo', $item->titulo)
                ->first();

            $datos = [
                'titulo' => $item->titulo,
                'descripcion' => $item->descripcion,
                'icono' => $item->icono,
                'orden' => $item->orden,
                'estado' => $item->estado,
            ];

            if ($detalleRegistro) {
                // Actualizar existente
                $detalleRegistro->update($datos);
                $actualizados++;
                $this->line("  ✏️  Actualizado: {$item->titulo}");
            } else {
                // Crear nuevo
                DetalleRegistro::create([
                    'empresa_id' => $item->empresa_id,
                    'registro_id' => $registro->id,
                    ...$datos,
                ]);
                $creados++;
                $this->line("  ✅ Creado: {$item->titulo}");
            }
        }

        // Eliminar DetalleRegistros huérfanos
        $huerfanos = DetalleRegistro::where('registro_id', $registro->id)
            ->where('empresa_id', $empresa->id)
            ->whereNotIn('titulo', function ($query) use ($empresa) {
                $query->select('titulo')
                    ->from('porque_elegirnos')
                    ->where('empresa_id', $empresa->id);
            })
            ->get();

        foreach ($huerfanos as $huerfano) {
            $huerfano->delete();
            $eliminados++;
            $this->line("  🗑️  Eliminado huérfano: {$huerfano->titulo}");
        }

        $this->newLine();
        $this->info("✅ Sincronización completada:");
        $this->line("   • Creados: {$creados}");
        $this->line("   • Actualizados: {$actualizados}");
        $this->line("   • Eliminados (huérfanos): {$eliminados}");

        return Command::SUCCESS;
    }
}
