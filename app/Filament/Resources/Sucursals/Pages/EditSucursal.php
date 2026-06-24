<?php

namespace App\Filament\Resources\Sucursals\Pages;

use App\Filament\Resources\Sucursals\SucursalResource;
use App\Filament\Traits\ToggleEstadoTrait;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditSucursal extends EditRecord
{
    use ToggleEstadoTrait;

    protected static string $resource = SucursalResource::class;

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
        return 'Sucursal actualizada correctamente';
    }
}
