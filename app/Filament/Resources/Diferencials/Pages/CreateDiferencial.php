<?php

namespace App\Filament\Resources\Diferencials\Pages;

use App\Filament\Resources\Diferencials\DiferencialResource;
use Filament\Resources\Pages\CreateRecord;

class CreateDiferencial extends CreateRecord
{
    protected static string $resource = DiferencialResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Diferencial creado correctamente';
    }
}
