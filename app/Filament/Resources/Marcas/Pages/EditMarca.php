<?php

namespace App\Filament\Resources\Marcas\Pages;

use App\Filament\Resources\Marcas\MarcaResource;
use App\Filament\Traits\ToggleEstadoTrait;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditMarca extends EditRecord
{
    use ToggleEstadoTrait;

    protected static string $resource = MarcaResource::class;

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
        return 'Marca actualizada correctamente';
    }
}
