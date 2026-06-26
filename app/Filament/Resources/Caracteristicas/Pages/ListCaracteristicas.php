<?php

namespace App\Filament\Resources\Caracteristicas\Pages;

use App\Filament\Resources\Caracteristicas\CaracteristicaResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCaracteristicas extends ListRecords
{
    protected static string $resource = CaracteristicaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label('Nueva Característica'),
        ];
    }
}
