<?php

namespace App\Filament\Resources\CaracteristicaInfraestructuras\Pages;

use App\Filament\Resources\CaracteristicaInfraestructuras\CaracteristicaInfraestructuraResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCaracteristicaInfraestructuras extends ListRecords
{
    protected static string $resource = CaracteristicaInfraestructuraResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label('Nueva Característica'),
        ];
    }
}
