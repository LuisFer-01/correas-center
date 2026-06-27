<?php

namespace App\Filament\Resources\TipoMedidas\Pages;

use App\Filament\Resources\TipoMedidas\TipoMedidaResource;
use App\Filament\Traits\ToggleEstadoTrait;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditTipoMedida extends EditRecord
{
    use ToggleEstadoTrait;

    protected static string $resource = TipoMedidaResource::class;

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
        return 'Tipo de medida actualizado correctamente';
    }
}
