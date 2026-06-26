<?php

namespace App\Filament\Resources\Caracteristicas\Pages;

use App\Filament\Resources\Caracteristicas\CaracteristicaResource;
use Filament\Resources\Pages\CreateRecord;

class CreateCaracteristica extends CreateRecord
{
    protected static string $resource = CaracteristicaResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Característica creada correctamente';
    }
}
