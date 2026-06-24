<?php

namespace App\Filament\Resources\Menus\Pages;

use App\Filament\Resources\Menus\MenuResource;
use App\Filament\Traits\ToggleEstadoTrait;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditMenu extends EditRecord
{
    use ToggleEstadoTrait;

    protected static string $resource = MenuResource::class;

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
        return 'Menú actualizado correctamente';
    }
}
