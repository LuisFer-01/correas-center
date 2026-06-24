<?php

namespace App\Filament\Resources\Sucursals\Pages;

use App\Filament\Resources\Sucursals\SucursalResource;
use Filament\Resources\Pages\CreateRecord;

class CreateSucursal extends CreateRecord
{
    protected static string $resource = SucursalResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Sucursal creada correctamente';
    }
}
