<?php

namespace App\Filament\Resources\PasoWizards\Pages;

use App\Filament\Resources\PasoWizards\PasoWizardResource;
use App\Filament\Traits\ToggleEstadoTrait;
use Filament\Resources\Pages\EditRecord;

class EditPasoWizard extends EditRecord
{
    use ToggleEstadoTrait;

    protected static string $resource = PasoWizardResource::class;

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
        return 'Paso actualizado correctamente';
    }
}
