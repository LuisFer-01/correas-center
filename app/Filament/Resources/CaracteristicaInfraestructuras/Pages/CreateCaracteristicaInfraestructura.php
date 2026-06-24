<?php

namespace App\Filament\Resources\CaracteristicaInfraestructuras\Pages;

use App\Filament\Resources\CaracteristicaInfraestructuras\CaracteristicaInfraestructuraResource;
use Filament\Resources\Pages\CreateRecord;

class CreateCaracteristicaInfraestructura extends CreateRecord
{
    protected static string $resource = CaracteristicaInfraestructuraResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Característica creada correctamente';
    }
}
