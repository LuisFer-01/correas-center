<?php

namespace App\Filament\Resources\Caracteristicas\Pages;

use App\Filament\Resources\Caracteristicas\CaracteristicaResource;
use App\Filament\Traits\ToggleEstadoTrait;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditCaracteristica extends EditRecord
{
    use ToggleEstadoTrait;

    protected static string $resource = CaracteristicaResource::class;

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
        return 'Característica actualizada correctamente';
    }
}
