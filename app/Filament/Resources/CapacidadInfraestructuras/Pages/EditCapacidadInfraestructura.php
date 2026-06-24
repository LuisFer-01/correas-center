<?php

namespace App\Filament\Resources\CapacidadInfraestructuras\Pages;

use App\Filament\Resources\CapacidadInfraestructuras\CapacidadInfraestructuraResource;
use App\Filament\Traits\ToggleEstadoTrait;
use Filament\Resources\Pages\EditRecord;

class EditCapacidadInfraestructura extends EditRecord
{
    use ToggleEstadoTrait;

    protected static string $resource = CapacidadInfraestructuraResource::class;

    protected function getHeaderActions(): array
    {
        return [
            $this->getToggleEstadoAction(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getSavedNotificationTitle(): ?string
    {
        return 'Capacidad actualizada correctamente';
    }
}
