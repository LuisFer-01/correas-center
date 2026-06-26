<?php

namespace App\Filament\Resources\GamaProductos\Pages;

use App\Filament\Resources\GamaProductos\GamaProductoResource;
use Filament\Resources\Pages\CreateRecord;

class CreateGamaProducto extends CreateRecord
{
    protected static string $resource = GamaProductoResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Gama creada correctamente';
    }
}
