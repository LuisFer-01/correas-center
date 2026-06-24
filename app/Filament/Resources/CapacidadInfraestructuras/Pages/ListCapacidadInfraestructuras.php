<?php

namespace App\Filament\Resources\CapacidadInfraestructuras\Pages;

use App\Filament\Resources\CapacidadInfraestructuras\CapacidadInfraestructuraResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCapacidadInfraestructuras extends ListRecords
{
    protected static string $resource = CapacidadInfraestructuraResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label('Nueva Capacidad'),
        ];
    }
}
