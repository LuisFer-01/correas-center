<?php

namespace App\Observers;

use App\Models\DetalleRegistro;
use App\Models\PorqueElegirnos;
use App\Models\Registro;

class PorqueElegirnosObserver
{
    /**
     * Handle the PorqueElegirnos "created" event.
     */
    public function created(PorqueElegirnos $porqueElegirnos): void
    {
        $this->syncWithDetalleRegistro($porqueElegirnos);
    }

    /**
     * Handle the PorqueElegirnos "updated" event.
     */
    public function updated(PorqueElegirnos $porqueElegirnos): void
    {
        $this->syncWithDetalleRegistro($porqueElegirnos);
    }

    /**
     * Handle the PorqueElegirnos "deleted" event.
     */
    public function deleted(PorqueElegirnos $porqueElegirnos): void
    {
        // Eliminar el DetalleRegistro correspondiente
        $registro = Registro::where('identificador', 'porque_elegirnos')->first();

        if ($registro) {
            DetalleRegistro::where('registro_id', $registro->id)
                ->where('empresa_id', $porqueElegirnos->empresa_id)
                ->where('titulo', $porqueElegirnos->titulo)
                ->delete();
        }
    }

    /**
     * Sincronizar PorqueElegirnos con DetalleRegistro
     */
    private function syncWithDetalleRegistro(PorqueElegirnos $porqueElegirnos): void
    {
        // Buscar el registro con identificador 'porque_elegirnos'
        $registro = Registro::where('identificador', 'porque_elegirnos')->first();

        if (!$registro) {
            return;
        }

        // Buscar si ya existe un DetalleRegistro con el mismo título para esta empresa
        $detalleRegistro = DetalleRegistro::where('registro_id', $registro->id)
            ->where('empresa_id', $porqueElegirnos->empresa_id)
            ->where('titulo', $porqueElegirnos->titulo)
            ->first();

        // Mapear los datos de PorqueElegirnos a DetalleRegistro
        $datos = [
            'titulo' => $porqueElegirnos->titulo,
            'descripcion' => $porqueElegirnos->descripcion,
            'icono' => $porqueElegirnos->icono,
            'orden' => $porqueElegirnos->orden,
            'estado' => $porqueElegirnos->estado,
        ];

        if ($detalleRegistro) {
            // Actualizar existente
            $detalleRegistro->update($datos);
        } else {
            // Crear nuevo
            DetalleRegistro::create([
                'empresa_id' => $porqueElegirnos->empresa_id,
                'registro_id' => $registro->id,
                ...$datos,
            ]);
        }
    }
}
