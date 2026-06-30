<?php

namespace App\Filament\Resources\Contactos\Pages;

use App\Filament\Resources\Contactos\ContactoResource;
use Filament\Actions\Action;
use Filament\Resources\Pages\ViewRecord;

class ViewContacto extends ViewRecord
{
    protected static string $resource = ContactoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('marcarLeido')
                ->label('Marcar como Leído')
                ->icon('heroicon-o-envelope-open')
                ->color('warning')
                ->action(function () {
                    $this->record->update(['estado' => 'leido']);
                    $this->redirect($this->getResource()::getUrl('index'));
                })
                ->visible(fn () => $this->record->estado === 'nuevo'),

            Action::make('marcarRespondido')
                ->label('Marcar como Respondido')
                ->icon('heroicon-o-check-circle')
                ->color('success')
                ->action(function () {
                    $this->record->update(['estado' => 'respondido']);
                    $this->redirect($this->getResource()::getUrl('index'));
                })
                ->visible(fn () => in_array($this->record->estado, ['nuevo', 'leido'])),

            Action::make('archivar')
                ->label('Archivar')
                ->icon('heroicon-o-archive-box')
                ->color('gray')
                ->action(function () {
                    $this->record->update(['estado' => 'archivado']);
                    $this->redirect($this->getResource()::getUrl('index'));
                })
                ->visible(fn () => $this->record->estado !== 'archivado'),

            Action::make('enviarEmail')
                ->label('Responder por Email')
                ->icon('heroicon-o-envelope')
                ->color('primary')
                ->url(fn () => "mailto:{$this->record->email}?subject=Re: Consulta desde Correas Center")
                ->openUrlInNewTab(),
        ];
    }
}
