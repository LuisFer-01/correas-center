<?php

namespace App\Filament\Resources\PorqueElegirnos\Pages;

use App\Filament\Resources\PorqueElegirnos\PorqueElegirnosResource;
use App\Filament\Traits\ToggleEstadoTrait;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditPorqueElegirnos extends EditRecord
{
    use ToggleEstadoTrait;

    protected static string $resource = PorqueElegirnosResource::class;

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
        return 'Elemento actualizado correctamente';
    }
}
