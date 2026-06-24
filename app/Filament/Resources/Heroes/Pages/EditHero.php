<?php

namespace App\Filament\Resources\Heroes\Pages;

use App\Filament\Resources\Heroes\HeroResource;
use App\Filament\Traits\ToggleEstadoTrait;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditHero extends EditRecord
{
    use ToggleEstadoTrait;

    protected static string $resource = HeroResource::class;

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
        return 'Hero actualizado correctamente';
    }
}
