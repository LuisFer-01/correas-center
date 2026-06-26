<?php

namespace App\Filament\Resources\Composicions\Pages;

use App\Filament\Resources\Composicions\ComposicionResource;
use App\Filament\Traits\ToggleEstadoTrait;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditComposicion extends EditRecord
{
    use ToggleEstadoTrait;

    protected static string $resource = ComposicionResource::class;

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
        return 'Composición actualizada correctamente';
    }
}
