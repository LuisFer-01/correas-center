<?php

namespace App\Filament\Resources\TipoMedidas\Pages;

use App\Filament\Resources\TipoMedidas\TipoMedidaResource;
use Filament\Resources\Pages\CreateRecord;

class CreateTipoMedida extends CreateRecord
{
    protected static string $resource = TipoMedidaResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Tipo de medida creado correctamente';
    }
}
