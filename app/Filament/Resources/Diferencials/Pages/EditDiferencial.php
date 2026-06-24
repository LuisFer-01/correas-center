<?php

namespace App\Filament\Resources\Diferencials\Pages;

use App\Filament\Resources\Diferencials\DiferencialResource;
use App\Filament\Traits\ToggleEstadoTrait;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditDiferencial extends EditRecord
{
    use ToggleEstadoTrait;

    protected static string $resource = DiferencialResource::class;

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
        return 'Diferencial actualizado correctamente';
    }
}
