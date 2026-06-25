<?php

namespace App\Console\Commands;

use App\Models\DetalleRegistro;
use App\Models\Diferencial;
use App\Models\Empresa;
use App\Models\Registro;
use Illuminate\Console\Command;

class SyncDiferencialsToDetalleRegistros extends Command
{
    protected $signature = 'diferencials:sync';
    protected $description = 'Sincroniza todos los diferenciales existentes hacia la tabla detalle_registros (estadísticas)';

    public function handle(): int
    {
        $this->info('🔄 Iniciando sincronización de diferenciales...');

        $empresa = Empresa::first();
        if (!$empresa) {
            $this->error('❌ No se encontró la empresa. Ejecuta primero el EmpresaSeeder.');
            return Command::FAILURE;
        }

        $registro = Registro::where('identificador', 'estadisticas')->first();
        if (!$registro) {
            $this->error('❌ No se encontró el registro con identificador "estadisticas". Ejecuta primero el RegistroSeeder.');
            return Command::FAILURE;
        }

        $diferenciales = Diferencial::all();
        $this->info("📊 Encontrados {$diferenciales->count()} diferenciales para sincronizar.");

        $creados = 0;
        $actualizados = 0;
        $eliminados = 0;

        // IDs de diferenciales activos para eliminar los huérfanos después
        $diferencialIdsActivos = [];

        foreach ($diferenciales as $diferencial) {
            $diferencialIdsActivos[] = $diferencial->id;

            // Buscar si ya existe un DetalleRegistro para este diferencial
            $detalleRegistro = DetalleRegistro::where('registro_id', $registro->id)
                ->where('empresa_id', $diferencial->empresa_id)
                ->where('titulo', $diferencial->titulo)
                ->first();

            $datos = [
                'titulo' => $diferencial->titulo,
                'subtitulo' => $diferencial->subtitulo,
                'descripcion' => $diferencial->descripcion,
                'icono' => $diferencial->icon,
                'orden' => $diferencial->orden,
                'estado' => $diferencial->estado,
            ];

            if ($detalleRegistro) {
                // Actualizar existente
                $detalleRegistro->update($datos);
                $actualizados++;
                $this->line("  ✏️  Actualizado: {$diferencial->titulo}");
            } else {
                // Crear nuevo
                DetalleRegistro::create([
                    'empresa_id' => $diferencial->empresa_id,
                    'registro_id' => $registro->id,
                    ...$datos,
                ]);
                $creados++;
                $this->line("  ✅ Creado: {$diferencial->titulo}");
            }
        }

        // Eliminar DetalleRegistros huérfanos (que ya no tienen un Diferencial asociado)
        $huerfanos = DetalleRegistro::where('registro_id', $registro->id)
            ->where('empresa_id', $empresa->id)
            ->whereNotIn('titulo', function ($query) use ($registro, $empresa) {
                $query->select('titulo')
                    ->from('diferenciales')
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
