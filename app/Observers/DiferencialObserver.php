<?php

namespace App\Observers;

use App\Models\Diferencial;
use App\Models\DetalleRegistro;
use App\Models\Registro;
use App\Models\Empresa;

class DiferencialObserver
{
    /**
     * Handle the Diferencial "created" event.
     */
    public function created(Diferencial $diferencial): void
    {
        $this->syncWithDetalleRegistro($diferencial);
    }

    /**
     * Handle the Diferencial "updated" event.
     */
    public function updated(Diferencial $diferencial): void
    {
        $this->syncWithDetalleRegistro($diferencial);
    }

    /**
     * Handle the Diferencial "deleted" event.
     */
    public function deleted(Diferencial $diferencial): void
    {
        // Eliminar el DetalleRegistro correspondiente
        $registro = Registro::where('identificador', 'estadisticas')->first();

        if ($registro) {
            DetalleRegistro::where('registro_id', $registro->id)
                ->where('empresa_id', $diferencial->empresa_id)
                ->where('titulo', $diferencial->titulo)
                ->delete();
        }
    }

    /**
     * Sincronizar Diferencial con DetalleRegistro
     */
    private function syncWithDetalleRegistro(Diferencial $diferencial): void
    {
        // Buscar el registro con identificador 'estadisticas'
        $registro = Registro::where('identificador', 'estadisticas')->first();

        if (!$registro) {
            return;
        }

        // Buscar si ya existe un DetalleRegistro con el mismo título para esta empresa
        $detalleRegistro = DetalleRegistro::where('registro_id', $registro->id)
            ->where('empresa_id', $diferencial->empresa_id)
            ->where('titulo', $diferencial->titulo)
            ->first();

        // Mapear los datos de Diferencial a DetalleRegistro
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
        } else {
            // Crear nuevo
            DetalleRegistro::create([
                'empresa_id' => $diferencial->empresa_id,
                'registro_id' => $registro->id,
                ...$datos,
            ]);
        }
    }
}
