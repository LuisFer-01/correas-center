<?php

namespace App\Filament\Resources\Composicions\Pages;

use App\Filament\Resources\Composicions\ComposicionResource;
use Filament\Resources\Pages\CreateRecord;

class CreateComposicion extends CreateRecord
{
    protected static string $resource = ComposicionResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Composición creada correctamente';
    }
}
