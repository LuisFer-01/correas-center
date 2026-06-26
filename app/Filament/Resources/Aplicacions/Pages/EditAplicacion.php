<?php

namespace App\Filament\Resources\Aplicacions\Pages;

use App\Filament\Resources\Aplicacions\AplicacionResource;
use App\Filament\Traits\ToggleEstadoTrait;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditAplicacion extends EditRecord
{
    use ToggleEstadoTrait;

    protected static string $resource = AplicacionResource::class;

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
        return 'Aplicación actualizada correctamente';
    }
}
