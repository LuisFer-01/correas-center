<?php

namespace App\Filament\Resources\Marcas\Pages;

use App\Filament\Resources\Marcas\MarcaResource;
use Filament\Resources\Pages\CreateRecord;

class CreateMarca extends CreateRecord
{
    protected static string $resource = MarcaResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Marca creada correctamente';
    }
}
