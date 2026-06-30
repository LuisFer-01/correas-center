<?php

namespace App\Filament\Resources\Suscriptors\Pages;

use App\Filament\Resources\Suscriptors\SuscriptorResource;
use Filament\Actions\Action;
use Filament\Resources\Pages\ViewRecord;

class ViewSuscriptor extends ViewRecord
{
    protected static string $resource = SuscriptorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('activar')
                ->label('Activar')
                ->icon('heroicon-o-check-circle')
                ->color('success')
                ->action(function () {
                    $this->record->update(['estado' => 'activo']);
                    $this->redirect($this->getResource()::getUrl('index'));
                })
                ->visible(fn () => $this->record->estado !== 'activo'),

            Action::make('desactivar')
                ->label('Desactivar')
                ->icon('heroicon-o-pause-circle')
                ->color('warning')
                ->action(function () {
                    $this->record->update(['estado' => 'inactivo']);
                    $this->redirect($this->getResource()::getUrl('index'));
                })
                ->visible(fn () => $this->record->estado === 'activo'),

            Action::make('desuscribir')
                ->label('Desuscribir')
                ->icon('heroicon-o-x-circle')
                ->color('danger')
                ->requiresConfirmation()
                ->action(function () {
                    $this->record->update(['estado' => 'desuscrito']);
                    $this->redirect($this->getResource()::getUrl('index'));
                })
                ->visible(fn () => $this->record->estado !== 'desuscrito'),

            Action::make('enviarEmail')
                ->label('Enviar Email')
                ->icon('heroicon-o-envelope')
                ->color('primary')
                ->url(fn () => "mailto:{$this->record->email}?subject=Newsletter - Correas Center")
                ->openUrlInNewTab(),
        ];
    }
}
