<?php

namespace App\Filament\Resources\CapacidadInfraestructuras\Pages;

use App\Filament\Resources\CapacidadInfraestructuras\CapacidadInfraestructuraResource;
use Filament\Resources\Pages\CreateRecord;

class CreateCapacidadInfraestructura extends CreateRecord
{
    protected static string $resource = CapacidadInfraestructuraResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Capacidad creada correctamente';
    }
}
