<?php

namespace App\Filament\Resources\Aplicacions\Pages;

use App\Filament\Resources\Aplicacions\AplicacionResource;
use Filament\Resources\Pages\CreateRecord;

class CreateAplicacion extends CreateRecord
{
    protected static string $resource = AplicacionResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Aplicación creada correctamente';
    }
}
