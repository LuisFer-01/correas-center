<?php

namespace App\Filament\Resources\Industrias\Pages;

use App\Filament\Resources\Industrias\IndustriaResource;
use Filament\Resources\Pages\CreateRecord;

class CreateIndustria extends CreateRecord
{
    protected static string $resource = IndustriaResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Industria creada correctamente';
    }
}
