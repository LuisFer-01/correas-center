<?php

namespace App\Filament\Resources\PasoWizards\Pages;

use App\Filament\Resources\PasoWizards\PasoWizardResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePasoWizard extends CreateRecord
{
    protected static string $resource = PasoWizardResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Paso creado correctamente';
    }
}
