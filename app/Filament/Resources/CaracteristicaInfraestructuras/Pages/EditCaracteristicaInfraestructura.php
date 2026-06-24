<?php

namespace App\Filament\Resources\CaracteristicaInfraestructuras\Pages;

use App\Filament\Resources\CaracteristicaInfraestructuras\CaracteristicaInfraestructuraResource;
use App\Filament\Traits\ToggleEstadoTrait;
use Filament\Resources\Pages\EditRecord;

class EditCaracteristicaInfraestructura extends EditRecord
{
    use ToggleEstadoTrait;

    protected static string $resource = CaracteristicaInfraestructuraResource::class;

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
        return 'Característica actualizada correctamente';
    }
}
