<?php

namespace App\Filament\Traits;

use Filament\Actions\Action;
use Filament\Notifications\Notification;

trait ToggleEstadoTrait
{
    /**
     * Obtiene la acción de cambio de estado (activar/desactivar)
     * en lugar de eliminar el registro.
     *
     * @return Action
     */
    protected function getToggleEstadoAction(): Action
    {
        return Action::make('toggleEstado')
            ->label(function ($record) {
                return $record->estado === 'activo'
                    ? 'Desactivar Registro'
                    : 'Activar Registro';
            })
            ->icon(function ($record) {
                return $record->estado === 'activo'
                    ? 'heroicon-o-x-circle'
                    : 'heroicon-o-check-circle';
            })
            ->color(function ($record) {
                return $record->estado === 'activo'
                    ? 'danger'
                    : 'success';
            })
            ->requiresConfirmation()
            ->modalHeading(function ($record) {
                return $record->estado === 'activo'
                    ? '¿Desactivar este registro?'
                    : '¿Activar este registro?';
            })
            ->modalDescription(function ($record) {
                $modelo = class_basename($this->getModel());

                return $record->estado === 'activo'
                    ? "¿Estás seguro de desactivar este {$modelo}? No se mostrará en el sitio web, pero podrás reactivarlo cuando lo necesites."
                    : "¿Estás seguro de activar este {$modelo}? Se mostrará nuevamente en el sitio web.";
            })
            ->modalSubmitActionLabel(function ($record) {
                return $record->estado === 'activo'
                    ? 'Sí, Desactivar'
                    : 'Sí, Activar';
            })
            ->action(function ($record) {
                $nuevoEstado = $record->estado === 'activo' ? 'inactivo' : 'activo';
                $record->update(['estado' => $nuevoEstado]);

                // ✅ FORMA CORRECTA EN FILAMENT 4: Usar Notification::make()
                Notification::make()
                    ->title($record->estado === 'activo'
                        ? 'Registro activado correctamente'
                        : 'Registro desactivado correctamente')
                    ->icon($record->estado === 'activo'
                        ? 'heroicon-o-check-circle'
                        : 'heroicon-o-x-circle')
                    ->color($record->estado === 'activo' ? 'success' : 'warning')
                    ->send();

                // Redirigir al listado
                return $this->redirect($this->getResource()::getUrl('index'));
            });
    }
}
