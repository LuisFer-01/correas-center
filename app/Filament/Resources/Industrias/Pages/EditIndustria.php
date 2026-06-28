<?php

namespace App\Filament\Resources\Industrias\Pages;

use App\Filament\Resources\Industrias\IndustriaResource;
use App\Filament\Traits\ToggleEstadoTrait;
use Filament\Resources\Pages\EditRecord;

class EditIndustria extends EditRecord
{
    use ToggleEstadoTrait;

    protected static string $resource = IndustriaResource::class;

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
        return 'Industria actualizada correctamente';
    }
}
