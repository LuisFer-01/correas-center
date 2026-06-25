<?php

namespace App\Filament\Resources\Footers\Pages;

use App\Filament\Resources\Footers\FooterResource;
use Filament\Resources\Pages\CreateRecord;

class CreateFooter extends CreateRecord
{
    protected static string $resource = FooterResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Elemento del footer creado correctamente';
    }
}
