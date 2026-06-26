<?php

namespace App\Filament\Resources\GamaProductos\Pages;

use App\Filament\Resources\GamaProductos\GamaProductoResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListGamaProductos extends ListRecords
{
    protected static string $resource = GamaProductoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label('Nueva Gama'),
        ];
    }
}
