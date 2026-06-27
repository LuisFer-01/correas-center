<?php

namespace App\Filament\Resources\TipoMedidas\Pages;

use App\Filament\Resources\TipoMedidas\TipoMedidaResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListTipoMedidas extends ListRecords
{
    protected static string $resource = TipoMedidaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label('Nuevo Tipo'),
        ];
    }
}
