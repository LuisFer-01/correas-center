<?php

namespace App\Filament\Resources\Medidas\Pages;

use App\Filament\Resources\Medidas\MedidaResource;
use Filament\Resources\Pages\CreateRecord;

class CreateMedida extends CreateRecord
{
    protected static string $resource = MedidaResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Medida creada correctamente';
    }
}
