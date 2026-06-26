<?php

namespace App\Filament\Resources\GamaProductos\Pages;

use App\Filament\Resources\GamaProductos\GamaProductoResource;
use App\Filament\Traits\ToggleEstadoTrait;
use Filament\Resources\Pages\EditRecord;

class EditGamaProducto extends EditRecord
{
    use ToggleEstadoTrait;

    protected static string $resource = GamaProductoResource::class;

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
        return 'Gama actualizada correctamente';
    }
}
