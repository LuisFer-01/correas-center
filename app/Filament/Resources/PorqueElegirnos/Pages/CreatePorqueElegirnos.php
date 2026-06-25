<?php

namespace App\Filament\Resources\PorqueElegirnos\Pages;

use App\Filament\Resources\PorqueElegirnos\PorqueElegirnosResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePorqueElegirnos extends CreateRecord
{
    protected static string $resource = PorqueElegirnosResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Elemento creado correctamente';
    }
}
