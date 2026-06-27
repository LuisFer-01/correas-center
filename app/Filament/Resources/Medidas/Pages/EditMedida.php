<?php

namespace App\Filament\Resources\Medidas\Pages;

use App\Filament\Resources\Medidas\MedidaResource;
use App\Filament\Traits\ToggleEstadoTrait;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditMedida extends EditRecord
{
    use ToggleEstadoTrait;

    protected static string $resource = MedidaResource::class;

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
        return 'Medida actualizada correctamente';
    }
}
