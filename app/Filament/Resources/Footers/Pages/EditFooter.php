<?php

namespace App\Filament\Resources\Footers\Pages;

use App\Filament\Resources\Footers\FooterResource;
use App\Filament\Traits\ToggleEstadoTrait;
use Filament\Resources\Pages\EditRecord;

class EditFooter extends EditRecord
{
    use ToggleEstadoTrait;

    protected static string $resource = FooterResource::class;

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
        return 'Elemento del footer actualizado correctamente';
    }
}
